<?php

namespace OurHome\Http;

class Request {
    protected $_curlHandle = null;
    protected $_url = null;
    protected $_requestHeaders = array();
    protected $_responseHeaders = array();
    protected $_responseStatus = null;

    public function __construct($url = null){
        $this->_curlHandle = curl_init();
        if($url !== null) $this->setUrl($url);

        curl_setopt($this->_curlHandle, CURLOPT_HEADERFUNCTION, array( $this,'_processHeaders'));
    }

    public function _processHeaders($ch, $header) {
        $matches = array();

        if ( preg_match('/^([^:]+)\s*:\s*([^\x0D\x0A]*)\x0D?\x0A?$/', $header, $matches) ){
            $this->_responseHeaders[$matches[1]][] = $matches[2];
        }
        return strlen($header);
    }

    public function setUrl($url){
        curl_setopt($this->_curlHandle, CURLOPT_URL, $url);
        $this->_url = $url;
    }

    public function _getHeaders(){
        $items = [];
        foreach($this->_requestHeaders as $key=>$value){
            $items[] = $key . ": $value";
        }
        return $items;
    }

    public function addRequestHeader($name, $value){
        $this->_requestHeaders[$name] = $value;
    }

    public function send($data = null){
        curl_setopt($this->_curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->_curlHandle, CURLINFO_HEADER_OUT, true);
        if($data !== null){
            curl_setopt($this->_curlHandle, CURLOPT_POST, true);
            curl_setopt($this->_curlHandle, CURLOPT_POSTFIELDS, json_encode($data));
            $this->addRequestHeader("Content-Type","application/json");
            $this->addRequestHeader("Content-Length", strlen(json_encode($data)));
        }
        curl_setopt($this->_curlHandle, CURLOPT_HTTPHEADER, $this->_getHeaders());
        $result = curl_exec($this->_curlHandle);

        $code = curl_getinfo($this->_curlHandle, CURLINFO_HTTP_CODE);
        $response = new Response($code, $this->_responseHeaders, $result);

        return $response;
    }
}
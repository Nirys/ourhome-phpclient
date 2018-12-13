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

    public function addRequestHeader($name, $value){
        $this->_requestHeaders[$name] = $value;
    }

    public function send($username = null, $password = null){
        curl_setopt($this->_curlHandle, CURLOPT_HEADER, $this->_requestHeaders);
        curl_setopt($this->_curlHandle, CURLOPT_RETURNTRANSFER, true);
        if($username && $password){
            curl_setopt($this->_curlHandle, CURLOPT_USERPWD, $username . ":" . $password);
        }
        $result = curl_exec($this->_curlHandle);
        $code = curl_getinfo($this->_curlHandle, CURLINFO_HTTP_CODE);
        $response = new Response($code, $this->_responseHeaders, $result);
        return $response;
    }
}
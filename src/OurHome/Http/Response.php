<?php

namespace OurHome\Http;

class Response {
    protected $_responseCode = null;
    protected $_responseHeaders = array();
    protected $_responseBody = null;
    protected $_cookies = null;

    public function __construct($code, $headers, $body){
        $this->_responseCode = $code;
        $this->_responseHeaders = $headers;
        $this->_responseBody = $body;

        $cookies = $this->getHeader('Set-Cookie');
        if(is_array($cookies)){
            $this->_cookies = array();
            foreach($cookies as $cookie){
                $this->_cookies[] = new Cookie($cookie);
            }
        }else{
            $this->_cookies = null;
        }
    }

    public function getCookies(){
        return $this->_cookies;
    }

    public function getStatusCode(){
        return $this->_responseCode;
    }

    public function getHeader($key, $default=null){
        return isset($this->_responseHeaders[$key]) ? $this->_responseHeaders[$key] : $default;
    }

    public function getBody(){
        return $this->_responseBody;
    }

    public function getHeaders(){
        return $this->_responseHeaders;
    }
}
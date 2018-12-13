<?php

namespace OurHome\Http;

class Response {
    protected $_responseCode = null;
    protected $_responseHeaders = array();
    protected $_responseBody = null;

    public function __construct($code, $headers, $body){
        $this->_responseCode = $code;
        $this->_responseHeaders = $headers;
        $this->_responseBody = $body;
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
}
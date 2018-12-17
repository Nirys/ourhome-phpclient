<?php
namespace OurHome\Http;

class Cookie {
    protected $_name = null;
    protected $_value = null;
    protected $_expires = null;
    protected $_maxAge = null;
    protected $_path = null;

    public function __construct($cookie){
        date_default_timezone_set('UTC');
        $parts = preg_split('/;/', $cookie);
        $name = null;
        foreach($parts as $part){
            $part = ltrim(rtrim($part));
            $items = preg_split('/=/', $part);
            if($this->_name == null){
                $this->_name = $items[0];
                $this->_value = $items[1];
            }else{
                switch($items[0]){
                    case 'Max-Age':
                        $this->_maxAge = $items[1];
                        break;
                    case 'expires':
                        $this->_expires = strtotime($items[1]);
                        break;
                    case 'Path':
                        $this->_path = $items[1];
                        break;
                }
            }
        }
    }

    public function getCookie(){
        return $this->_name . '=' . $this->_value;
    }

    public function getName(){
        return $this->_name;
    }

    public function getValue(){
        return $this->_value;
    }

    public function getExpires(){
        return $this->_expires;
    }

    public function getMaxAge(){
        return $this->_maxAge;
    }
}
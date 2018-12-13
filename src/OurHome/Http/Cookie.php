<?php
namespace OurHome\Http;

class Cookie {
    protected $_name = null;
    protected $_value = null;
    protected $_expires = null;
    protected $_maxAge = null;
    protected $_path = null;

    public function __construct($cookie){
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

                }
            }
        }
    }
}
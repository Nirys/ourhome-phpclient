<?php
namespace OurHome;

class AbstractEntityCollection implements \Iterator {
    private $_position = 0;
    private $_items = array();

    public function __construct(){
        $this->_position = 0;
    }

    public function rewind(){
        $this->_position = 0;
    }

    public function current(){
        return $this->_items[$this->_position];
    }

    public function key(){
        return $this->_position;
    }

    public function next(){
        $this->_position++;
    }

    public function valid(){
        return isset($this->_items[$this->_position]);
    }

    public function append($object){
        $this->_items[] = $object;
    }

}
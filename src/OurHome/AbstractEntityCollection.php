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

    public function findById($id){
        foreach($this->_items as $position => $item){
            if($item->getId() == $id) return $item;
        }
        return null;
    }

    public function findByResourceUri($uri){
        return $this->findByMethod($uri, 'getResourceUri');
    }

    public function findByMethod($value, $method){
        foreach($this->_items as $position => $item){
            if($item->{$method}() == $value){
                return $item;
            }
        }
        return null;
    }
}
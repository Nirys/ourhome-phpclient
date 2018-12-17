<?php

namespace OurHome\Shopping;

class Category {
    protected $_color = null;
    protected $_created = null;
    protected $_icon = null;
    protected $_id = null;
    protected $_modified = null;
    protected $_name = null;
    protected $_order = null;
    protected $_resourceUri = null;
    protected $_client = null;

    public function __construct($jsonObject, $client){
        $this->_client = $client;
        $attributes = array(
            '_color' => 'color',
            '_created' => 'created',
            '_icon' => 'icon',
            '_id' => 'id',
            '_modified' => 'modified',
            '_name' => 'name',
            '_order' => 'order',
            '_resourceUri' => 'resource_uri'
        );

        foreach($attributes as $key=>$value){
            $this->{$key} = property_exists($jsonObject, $value) ? $jsonObject->{$value} : null;
        }
    }

    public function getId(){
        return $this->_id;
    }

    public function getName(){
        return $this->_name;
    }

    public function getOrder(){
        return $this->_order;
    }
}
<?php

namespace OurHome\Shopping;

use OurHome\AbstractEntity;

/**
 * @method int getId()
 * @method void setId(int $value)
 * @method string getColor()
 * @method void setColor(string $value)
 * @method string getName()
 * @method void setName(string $value)
 */
class Category extends AbstractEntity {
    protected $_id = null;
    protected $_color = null;
    protected $_created = null;
    protected $_icon = null;
    protected $_modified = null;
    protected $_name = null;
    protected $_order = null;
    protected $_resourceUri = null;
    protected $_client = null;
    protected $_attributes = array(
        '_color' => 'color',
        '_created' => 'created',
        '_icon' => 'icon',
        '_id' => 'id',
        '_modified' => 'modified',
        '_name' => 'name',
        '_order' => 'order',
        '_resourceUri' => 'resource_uri'
    );

    public function __construct($jsonObject, $_client){
        parent::__construct($jsonObject, $_client);
    }

}
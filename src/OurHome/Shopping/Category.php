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
    protected $_attributes = array(
        '_color' => 'color',
        '_createdAt' => 'created',
        '_icon' => 'icon',
        '_id' => 'id',
        '_modifiedAt' => 'modified',
        '_name' => 'name',
        '_order' => 'order',
        '_resourceUri' => 'resource_uri'
    );
}
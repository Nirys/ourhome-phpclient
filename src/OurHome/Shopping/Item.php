<?php
namespace OurHome\Shopping;

use OurHome\AbstractEntity;
use OurHome\Users\User;

/**
 * Class Item
 * @package OurHome\Shopping
 * @method string getName()
 * @method User|null getLastAddedBy()
 */
class Item extends AbstractEntity {
    protected $_basePath = '/api/v1/shopping_items/';

    protected $_excludeExportAttributes = array(
      'added_to_current_house_list',
      'has_been_purchased',
      'id',
      'last_added_by',
      'last_purchased',
      'order',
      'priority_rank',
      'resource_uri'
    );

    protected $_attributes = array(
        '_onCurrentList' => 'added_to_current_house_list',
        '_categoryId' => 'cat',
        '_details' => 'details',
        '_wasPurchased' => 'has_been_purchased',
        '_id' => 'id',
        '_active' => 'is_active',
        '_upVoted' => 'is_upvoted',
        '_lastAddedBy' => 'last_added_by',
        '_lastPurchased' => 'last_purchased',
        '_listId' => 'list',
        '_name' => 'name',
        '_order' => 'order',
        '_picture' => 'picture',
        '_priority' => 'priority_rank',
        '_quantity' => 'quantity',
        '_resourceUri' => 'resource_uri'
    );


    protected function _parseLastAddedBy($value){
        if($value){
            $user = $this->_client->getHouse()->getUsers()->findByResourceUri($value);
            return $user;
        }else{
            return $value;
        }
    }
    
    protected function _parseListId($value){
        if($value === null) $value = 'B';
        return $value;
    }

    protected function _parseActive($value){
        if($value === null) $value = true;
        return $value;
    }

    protected function _parseUpvoted($value){
        if($value === null) $value = true;
        return $value;
    }

    public function save(){
        if($this->getId() == null){
            return $this->create();
        }else{
            return $this->update();
        }

    }

    public function delete(){
        $this->_client->postRequest($this->_resourceUri, array('is_active' => false), 'PATCH');
    }

    protected function create(){
        $itemObject = $this->toArray();
        $result = $this->_client->postRequest($this->_basePath, $itemObject);
        if($result->getStatusCode() == 201){
            $this->_loadData(json_decode($result->getBody()));
        }else{
            throw new \Exception("Invalid response: " . $result->getBody() );
        }
    }

    protected function update(){
        $itemObject = $this->toArray();
        $result = $this->_client->postRequest($this->_resourceUri, $itemObject, 'PATCH');
        if($result->getStatusCode() == 202){
            $this->_loadData(json_decode($result->getBody()));
        }else{
            throw new \Exception("Invalid response: " . $result->getBody() );
        }
    }
}
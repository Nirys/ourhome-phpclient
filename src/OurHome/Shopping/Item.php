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
        $user = $this->_client->getHouse()->getUsers()->findByResourceUri($value);
        return $user;
    }
}
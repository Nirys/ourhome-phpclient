<?php
namespace OurHome;

class User {
    const ROLE_PARENT=0;
    const ROLE_CHILD=1;

    protected $_id = null;
    protected $_firstName = null;
    protected $_lastName = null;
    protected $_email = null;
    protected $_role = null;
    protected $_roleName = null;
    protected $_isActive = null;
    protected $_hasPassword = null;
    protected $_profilePhoto = null;
    protected $_resourceUri = null;
    protected $_taskProfiles = array();
    protected $_settingsUri = null;
    protected $_username = null;
    protected $_currentHouseUri = null;
    protected $_currentHouseId = null;

    protected $_client = null;

    /**
     * User constructor.  Expects to be passed the JSON result from a login operation
     * @param $jsonObject
     */
    public function __construct($jsonObject, $_client){
        $this->_client = $_client;

        $attributes = array(
            '_role' => 'role',
            '_roleName' => 'role_name',
            '_isActive' => 'is_active',
            '_id' => 'id',
            '_hasPassword' => 'has_password',
            '_profilePhoto' => 'profile_photo',
            '_resourceUri' => 'resource_uri',
            '_taskProfiles' => 'task_profiles',
            '_settingsUri' => 'user_settings',
            '_username' => 'username',
            '_currentHouseUri' => 'current_house',
            '_currentHouseId' => 'current_house_id',
            '_email' => 'email',
            '_firstName' => 'first_name',
            '_lastName' => 'last_name'
        );

        foreach($attributes as $key=>$value){
            $this->{$key} = property_exists($jsonObject, $value) ? $jsonObject->{$value} : null;
        }
    }

    /**
     * Remote user ID
     * @return int
     */
    public function getId(){
        return $this->_id;
    }

    /**
     *
     */
    public function getCurrentHouse(){

    }
}
<?php
namespace OurHome\Users;

use OurHome\AbstractEntity;
use OurHome\House;

/**
 * Class User
 * @package OurHome\Users
 * @method string getAge()
 * @method void setAge($age)
 * @method string getAvatarIdentifier()
 * @method void setAvatarIdentifier($avatarIdentifier)
 * @method string getProfilePhotoUri()
 * @method void setProfilePhotoUri($profilePhotoUri)
 * @method string getTaskProfileUri()
 * @method void setTaskProfileUri($taskProfileUri)
 * @method string getRole()
 * @method void setRole($role)
 * @method string getRoleName()
 * @method void setRoleName($roleName)
 * @method string getIsActive()
 * @method void setIsActive($isActive)
 * @method string getId()
 * @method void setId($id)
 * @method string getHasPassword()
 * @method void setHasPassword($hasPassword)
 * @method string getProfilePhoto()
 * @method void setProfilePhoto($profilePhoto)
 * @method string getResourceUri()
 * @method void setResourceUri($resourceUri)
 * @method string getTaskProfiles()
 * @method void setTaskProfiles($taskProfiles)
 * @method string getSettingsUri()
 * @method void setSettingsUri($settingsUri)
 * @method string getUsername()
 * @method void setUsername($username)
 * @method string getCurrentHouseUri()
 * @method void setCurrentHouseUri($currentHouseUri)
 * @method string getCurrentHouseId()
 * @method void setCurrentHouseId($currentHouseId)
 * @method string getEmail()
 * @method void setEmail($email)
 * @method string getFirstName()
 * @method void setFirstName($firstName)
 * @method string getLastName()
 * @method void setLastName($lastName)
 **/
class User extends AbstractEntity {
    const ROLE_PARENT=0;
    const ROLE_CHILD=1;

    /** @var House  */
    protected $_currentHouse = null;
    protected $_attributes = array(
        '_age' => 'age',
        '_avatarIdentifier' => 'avatar_identifier',
        '_profilePhotoUri' => 'profile_photo_url',
        '_taskProfileUri' => 'task_profile_uri',
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

    /**
     * Gets the user's current House object
     * @return House
     */
    public function getCurrentHouse(){
        if($this->_currentHouse === null){
            $result = $this->_client->getRequest($this->getCurrentHouseUri());
            $dataObj = json_decode($result->getBody());
            file_put_contents('home.data', print_r($dataObj, true));
            $this->_currentHouse = new House($dataObj, $this->_client);
        }
        return $this->_currentHouse;
    }
}
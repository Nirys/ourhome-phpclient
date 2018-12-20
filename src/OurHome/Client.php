<?php

namespace OurHome;

use OurHome\Http\Request;
use OurHome\Shopping\Category;
use OurHome\Shopping\CategoryList;
use OurHome\Shopping\Item;
use OurHome\Shopping\ItemList;
use OurHome\Users\User;

class Client {
    const APP_ROOT = 'https://app.ourhomeapp.com/';
    const API_ROOT = 'https://api.ourhomeapp.com';

    protected $_config = null;
    protected $_username = null;
    protected $_password = null;
    protected $_cookies = null;
    protected $_loggedIn = null;

    /** @var User */
    protected $_currentUser = null;
    protected $_currentHouse = null;

    /**
     * Client constructor.
     * @throws \Exception
     */
    public function __construct(){
        $this->_cookies = array();
        $this->_getConfigData();
    }

    public function login($username, $password){
        $req = new Request(self::API_ROOT . "/api/v1/users/login/");
        $req->addRequestHeader("AUTHORIZATION", "ClientID: " . $this->_config->apiClientId);
        $req->addRequestHeader("X-AUTHORIZATION", "ClientID: " . $this->_config->apiClientId);
        $response = $req->send(array('email'=>$username, 'password'=>$password));

        if($response->getStatusCode() == 200){
            $this->_cookies = $response->getCookies();
            $data = json_decode($response->getBody());
            $this->_currentUser = new User($data, $this);
            return true;
        }else{
            return false;
        }
    }

    /**
     * @return User
     */
    public function getUser(){
        return $this->_currentUser;
    }

    public function getHouse(){
        return $this->_currentUser->getCurrentHouse();
    }

    /**
     * @return ItemList
     */
    public function getShoppingList(){
        $data = $this->getRequest("/api/v1/shopping_items/?is_active=true&sorting=true");
        $dataObj = json_decode($data->getBody());
        $items = new ItemList();
        foreach($dataObj->objects as $item){
            $items->append(new Item($item, $this));
        }
        return $items;
    }

    /**
     * @return CategoryList
     */
    public function getShoppingCategories(){
        $data = $this->getRequest('/api/v1/shopping_categories/');
        $dataObj = json_decode($data->getBody());

        $categories = new CategoryList();
        foreach($dataObj->objects as $item){
            $categories->append( new Category($item, $this));
        }
        return $categories;
    }

    /**
     * Make an abstracted request against the API
     * @param $uri
     * @return Http\Response
     */
    public function getRequest($uri){
        $req = $this->_createRequest($uri);
        $result = $req->send();
        return $result;
    }

    /**
     *
     */
    public function postRequest($uri, $data, $method = 'POST'){
        $req = $this->_createRequest($uri);
        return $req->send($data);
    }

    protected function _createRequest($uri){
        $req = new Request(self::API_ROOT . $uri);
        $req->addRequestHeader("AUTHORIZATION", "ClientID: " . $this->_config->apiClientId);
        $req->addRequestHeader("X-AUTHORIZATION", "ClientID: " . $this->_config->apiClientId);
        if(is_array($this->_cookies)){
            $cookies = '';
            foreach($this->_cookies as $cookie){
                $cookies .= $cookie->getCookie() . ';';
            }
            $req->setCookies($cookies);
        }
        return $req;
    }



    /**
     * @throws \Exception
     */
    protected function _getConfigData(){
        //$configReq = new Request(self::APP_ROOT);
        //$data = $configReq->send();
        $data = file_get_contents('temp.data');

        $data = preg_replace("/\n/"," ", $data);
        preg_match("/config = ([^\;]+);/", $data, $matches);
        $config = $matches[1];
        $config = preg_replace("/\'/","\"", $config);
        preg_match_all("/,([^:]+):/", "," . str_replace("{","", $config), $items);
        foreach($items[1] as $item){
            $config = str_replace($item, '"' . ltrim(rtrim($item)) . '"', $config);
        }

        $this->_config = json_decode($config);

        if(!property_exists($this->_config, 'apiClientId')){
            throw new \Exception("Unable to parse config");
        }
    }
}
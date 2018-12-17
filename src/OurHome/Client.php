<?php

namespace OurHome;

use OurHome\Http\Request;

class Client {
    const APP_ROOT = 'https://app.ourhomeapp.com/';
    const API_ROOT = 'https://api.ourhomeapp.com';

    protected $_config = null;
    protected $_username = null;
    protected $_password = null;
    protected $_cookies = null;
    protected $_loggedIn = null;

    protected $_currentUser = null;

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

    public function getRequest($uri){
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
        $result = $req->send();
        return $result;
    }

    public function getShoppingCategories(){
        $data = $this->getRequest('/api/v1/shopping_categories/');
        $dataObj = json_decode($data->getBody());
        file_put_contents('shoppingcats.data', print_r($dataObj, true));
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
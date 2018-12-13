<?php

namespace OurHome;

use OurHome\Http\Request;

class Client {
    const APP_ROOT = 'https://app.ourhomeapp.com/';
    const API_ROOT = 'https://api.ourhomeapp.com/api/v1';

    protected $_config = null;
    protected $_username = null;
    protected $_password = null;

    /**
     * Client constructor.
     * @throws \Exception
     */
    public function __construct(){
        $this->_getConfigData();
    }

    public function login($username, $password){

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
            $config = str_replace($item, "\"" . ltrim(rtrim($item\"", $config);
        }

        $this->_config = json_decode($config);

        if(!property_exists($this->_config, 'apiClientId')){
            throw new \Exception("Unable to parse config");
        }
    }
}
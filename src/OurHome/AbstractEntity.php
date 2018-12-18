<?php
namespace OurHome;

class AbstractEntity{
    protected $_attributes = array();
    protected $_attributeValues = array();
    protected $_client = null;

    /**
     * User constructor.  Expects to be passed the JSON result from a login operation
     * @param $jsonObject
     */
    public function __construct($jsonObject, $_client){
        $this->_client = $_client;

        foreach($this->_attributes as $key=>$value){
            $this->_attributeValues[$key] = property_exists($jsonObject, $value) ? $jsonObject->{$value} : null;
        }
    }

    public function __call($name, $arguments){
        $firstThree = substr($name, 0, 3);
        switch($firstThree){
            case 'get':
                $attrName = "_" . $this->dashesToCamelCase(substr($name, 3, strlen($name)));
                if( array_key_exists($attrName, $this->_attributes)){
                    return $this->_attributeValues[$attrName];
                }else{
                    return null;
                }
                break;
            case 'set':
                $attrName = "_" . $this->dashesToCamelCase(substr($name, 3, strlen($name)));
                if(array_key_exists($attrName, $this->_attributes)){
                    $this->_attributeValues[$attrName] = $arguments[0];
                }else{
                    return null;
                }
                break;
        }
    }

    /**
     *  Thanks webbiedave
     *  https://stackoverflow.com/questions/2791998/convert-dashes-to-camelcase-in-php
     */
    protected function dashesToCamelCase($string, $capitalizeFirstCharacter = false){

        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));

        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }

        return $str;
    }
}
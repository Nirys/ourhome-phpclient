<?php
namespace OurHome;

class AbstractEntity{
    protected $_attributes = array();
    protected $_attributeValues = array();
    /** @var Client  */
    protected $_client = null;

    /**
     * User constructor.  Expects to be passed the JSON result from a login operation
     * @param $jsonObject
     * @param $_client
     */
    public function __construct($jsonObject, $_client){
        $this->_client = $_client;

        foreach($this->_attributes as $key=>$value){
            $actualValue = property_exists($jsonObject, $value) ? $jsonObject->{$value} : null;
            $this->{'set' . ucfirst(substr($key, 1, strlen($key)))}($actualValue);
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
                $propertyName = $this->dashesToCamelCase(substr($name, 3, strlen($name)));
                $attrName = "_" . $propertyName;
                if(array_key_exists($attrName, $this->_attributes)){
                    $value = $arguments[0];
                    if(method_exists($this, '_parse' . ucfirst($propertyName))){
                        $value = $this->{'_parse' . ucfirst($propertyName)}($value);
                    }
                    $this->_attributeValues[$attrName] = $value;
                }else{
                    return null;
                }
                break;
        }
    }

    public static function generatePhpDoc(){
        $class = get_called_class();
        $object = new $class(new \stdClass(), null);
        echo "/**\n";

        $package = substr($class, 0, strrpos($class, "\\"));
        $class = substr($class, strlen($package)+1, strlen($class));

        echo '* Class ' . $class  . "\n";
        echo '* @package ' . $package . "\n";
        foreach($object->_attributes as $key=>$value){
            $property = ucfirst(substr($key, 1, strlen($key)));
            echo "* @method string get" . $property . "()\n";
            echo "* @method void set" . $property . "(\$" . lcfirst($property) . ")\n";
        }
        echo "**/";
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
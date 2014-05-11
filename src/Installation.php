<?php


namespace Giorgionetg\PortableBlog;

use Exception;

/**
 * Installation class permits to bring a setup in all Application
 */
class Installation {

    private $settings = NULL;
    public $name = NULL;
    public function __construct($name) {
        $this->name = $name;
    }
    
    /**
     * Records a Key and his Value
     * 
     * @param type $key
     * @param type $value
     * @return type
     */
    public function set($key, $value)
    {
        return $this->settings[$key] = $value;
    }
    
    /**
     * Returns Value of a Key
     * 
     * @param type $key
     * @return type
     */
    public function get($key)
    {
        return $this->settings[$key];
    }
    
}

<?php
/**
 * 
 */

namespace Giorgionetg\PortableBlog;

use Exception;

class Installation {

    private $settings = NULL;
    public $name = NULL;
    public function __construct($name) {
        $this->name = $name;
    }
    
    public function set($key, $value)
    {
        return $this->settings[$key] = $value;
    }
    
    public function get($key)
    {
        return $this->settings[$key];
    }
    
}

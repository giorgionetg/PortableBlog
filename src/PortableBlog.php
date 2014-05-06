<?php

namespace PortableBlog;

use Exception;

class PortableBlog {
    
    protected $dbSettings;
    
    public $appSettings;
    
    //public $appErrors;
    
    public function __construct($settings = array())
    {
        if (empty($settings['dbSettings'])) {
            throw new Exception('There is no Settings for Db Connection');
        }
        if (empty($settings['appSettings'])) {
            throw new Exception('There is no Settings for PortableBlog Application');
        }
        
        $commonDbSettings = array(
            "driver"    => "mysql",
            "host"      => "localhost",
            "username"  => "root",
            "password"  => "*********",
            "char"      => "utf8"
            );
        $commonAppSettings = array(
            "blogName"  => "Your Blog Name",
            "blogUrl"   => "Your Website Url",
            "usingType" => "api|admin|frontend"
        );
        
        $this->dbSettings = array_merge($commonDbSettings, $settings['dbSettings']);
        $this->appSettings = array_merge($commonAppSettings, $settings['appSettings']);
        
        
        
    }
    
    public function getContent($slug)
    {
        
    }
    
    public function __toString() {
        $settings = implode($this->appSettings, ', ');
        return $settings;
    }
    
}

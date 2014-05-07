<?php

namespace Giorgionetg\PortableBlog;

use Exception;
use Giorgionetg\PortableBlog\Installation;

class PortableBlog {
    
    protected $dbSettings;
    
    public $appSettings;
    
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
            "char"      => "utf8",
            "prefix"    => "pb_"
            );
        $commonAppSettings = array(
            "blogName"  => "Your Blog Name",
            "blogUrl"   => "Your Website Url",
            "usingType" => "api|admin|frontend",
            "tables"    => array(
                "posts"         => "",
                "keywords"      => "",
                "descriptions"  => "",
                "comments"      => "",
                "users"         => ""
            )
        );
        
        $this->dbSettings = array_merge($commonDbSettings, $settings['dbSettings']);
        $this->appSettings = array_merge($commonAppSettings, $settings['appSettings']);
        
        $installation = new Installation($this->dbSettings, $this->appSettings);
        
        if ($installation->fails()) {
            throw new Exception('Installation Fails, Try to make Manual Installation!');
        }
        
    }
    
    public function getContent($slug)
    {
        
    }
    
    public function __toString() {
        
        return 'It Works!';
    }
    
}

<?php

namespace Giorgionetg\PortableBlog;

use Exception;
use Giorgionetg\PortableBlog\Installation;
use Giorgionetg\PortableBlog\ApiBlog;
use Symfony\Component\HttpFoundation\Request;

class PortableBlog {
    
    protected $dbSettings;
    
    public $appSettings;
    
    public $pathInfo;
    
    public function __construct(Request $request, $settings = array())
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
            "mainRoute" => "/blog",
            "usingType" => "api|backend|frontend",
            "tables"    => array(
                "posts"         => "",
                "keywords"      => "",
                "descriptions"  => "",
                "comments"      => "",
                "users"         => ""
            )
        );
        
        
        $this->pathInfo = $request->getPathInfo();
        $this->dbSettings = array_merge($commonDbSettings, $settings['dbSettings']);
        $this->appSettings = array_merge($commonAppSettings, $settings['appSettings']);
        
        $installation = new Installation($this->dbSettings, $this->appSettings);
        
        if ($installation->fails()) {
            throw new Exception('Installation Fails, Try to make Manual Installation!');
        }
        
    }
    
    public function execute()
    {
        if (count(explode('|', $this->appSettings['usingType'])) > 1){
            throw new Exception('usingType should be set.');
        }
        switch ($this->appSettings['usingType']){
            case 'api':
                $apiBlog = new ApiBlog();
                return $apiBlog->getContent('Prova');
                break;
            case 'backend':
                
                break;
            case 'frontend':
                
                break;
            default:
                
                break;
        }
    }
    
    public function getApi($slug)
    {
        
    }
    
    public function getBackend()
    {
        
    }
    
    public function getFrontend()
    {
        
    }
    
    public function __toString() {
        
        return 'It Works!';
    }
    
}

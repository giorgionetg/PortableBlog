<?php

namespace Giorgionetg\PortableBlog;

use Symfony\Component\HttpFoundation\Request;
//use Giorgionetg\PortableBlog\Content;
use Giorgionetg\PortableBlog\BlogInterface;
use Giorgionetg\PortableBlog\Installation;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

class ApiBlog implements BlogInterface {

    public $config;
    public $conn;
    
    public function __construct(Installation $settings)
    {
        $this->config = new Configuration();
        $connectionParams = array(
            'dbname' => $settings->get('db_name'),
            'user' => $settings->get('db_user'),
            'password' => $settings->get('db_password'),
            'host' => $settings->get('db_host'),
            'driver' => 'pdo_mysql',
        );
        $this->conn = DriverManager::getConnection($connectionParams, $this->config);
        //$this->checkDbTables();
    }
    
    public function getContent()
    {
        $query = 'SELECT * FROM contents';
        $row = $this->conn->query($query);
            $content = '';
            foreach($row as $getContent){
                if (end($getContent)) {
                    $content .= $getContent['slug'] . '.';
                } else {
                    $content .= $getContent['slug'] . ', ';
                }
            }
            return $content;
    }
    
    public function getContentList($slug = null, $fields = array())
    {
        
    }

    public function getAuthor($slug)
    {
        
    }

    public function getSeoData($slug)
    {
        
    }

    public function getSingleContent($slug)
    {
        
    }

}

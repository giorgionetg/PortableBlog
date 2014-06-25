<?php

namespace Giorgionetg\CmsLib;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;

class Router {
    
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
        //$this->query = $this->conn->createQueryBuilder();
    }
    
    public function isARoute($query)
    {
        
    }
    
}
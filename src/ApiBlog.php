<?php

namespace Giorgionetg\PortableBlog;

use Symfony\Component\HttpFoundation\Request;
use Giorgionetg\PortableBlog\Content;
use Giorgionetg\PortableBlog\BlogInterface;
use Giorgionetg\PortableBlog\Installation;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;

class ApiBlog implements BlogInterface {

    public $config;
    public $conn;
    public $query;
    public $content = array();
    
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
    
    public function getContent()
    {
        switch($this->content){
            case array_key_exists('contents', $this->content):
                return $this->getSingleContent($this->content['contents']);
                break;
            case array_key_exists('terms', $this->content):
                return $this->getContentList($this->content['terms']);
                break;
            default:
                return $this->getContentList();
                break;
        }
    }
    
    public function getContentList($slug = null, $fields = array())
    {
        $this->setNewQuery();
        $this->query
            ->select('c.title', 'c.slug', 'c.content')
            ->from('contents', 'c');
        $getting = $this->conn->prepare($this->query->getSQL());
        $getting->execute();
        $content = $getting->fetchAll();
        return $content;
    }

    public function getAuthor($slug)
    {
        
    }

    public function getSeoData($slug)
    {
        
    }

    public function getSingleContent($slug)
    {
        $this->setNewQuery();
        $sql = $this->query
                ->select('c.title', 'c.slug', 'c.content')
                ->from('contents', 'c')
                ->where('c.slug = :slug')
                ->setFirstResult(0)
                ->setMaxResults(1);
        $content = $this->conn->prepare($sql);
        $content->bindParam('slug', $slug);
        $content->execute();
        $data = $content->fetchAll();
        
        $content = new Content();
        $content->setTitle($data[0]['title']);
        $content->setContent($data[0]['content']);
        return $content;
    }

    public function contentExist($slug)
    {
        //$pointer = false;
        // Check if there are slugs in terms
        $this->setNewQuery();
        $sql = $this->query
                ->select('t.slug')
                ->from('terms', 't')
                ->where('t.slug = :slug');
        $prepared = $this->conn->prepare($sql->getSQL());
        $prepared->bindParam('slug', $slug);
        $prepared->execute();
        $data = $prepared->fetchAll();
        if (count($data) >= 1){
            $this->content['terms'] = $slug;
            return 'terms';
        } else {
            $this->setNewQuery();
            $sql = $this->query
                ->select('t.slug')
                ->from('contents', 't')
                ->where('t.slug = :slug');
            $prepared = $this->conn->prepare($sql->getSQL());
            $prepared->bindParam('slug', $slug);
            $prepared->execute();
            $data = $prepared->fetchAll();
            if (count($data) >= 1) {
                $this->content['contents'] = $slug;
                return 'contents';
            }
        }
        $this->content['all'] = true;
        return false;
    }
    
    private function setNewQuery()
    {
        unset($this->query);
        $this->query = $this->conn->createQueryBuilder();
    }
    
    public function schemaInstall($what)
    {
        
    }
    
    public function checkDbTables()
    {
        // TO FINISH!!!
        $apiBlogTables = array(
            'terms',
            'contents',
            'relations'
        );
        $sm = $this->conn->getSchemaManager();
        $tables = $sm->listTables();
        foreach($tables as $table){
            $checkTable[] = $table->getName(); 
        }
    }
}

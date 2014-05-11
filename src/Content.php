<?php

namespace Giorgionetg\PortableBlog;

require_once 'rb.phar';
use R as RedBean;
use Giorgionetg\PortableBlog\Installation;

class Content {

    public $id;
    public $slug;
    public $title;
    public $content;
    public $categories;
    public $seo;
    public $author;
    public $comments;
    private static $isIstanced = FALSE;
    
    public function __construct(Installation $settings) {
        $host = $settings->get('host');
        var_dump($host);
        exit();
        RedBean::setup('mysql:host=localhost;dbname=mydatabase', 'user','password');
        $this->isIstanced = TRUE;
    }
    
    public function getSingleContent($slug)
    {
        
    }
    
    public function getMultipleContents($slug = array())
    {
        
    }
    
    public static function addContent($data = array())
    {
        
    }
    
    public static function editContent($slug, $data = array())
    {
        
    }
    
    public static function deleteContent($slug)
    {
        
    }
}
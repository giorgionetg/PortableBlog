<?php

namespace Giorgionetg\PortableBlog;

use Symfony\Component\HttpFoundation\Request;
use Giorgionetg\PortableBlog\Content;

class ApiBlog extends Content {
//class ApiBlog {
    
    
    
    /*public $type;
    public $post;
    public $comments;
    public $keywords;
    public $description;
    public $user; */
    
    public function __construct(Installation $settings) {
        
    }
    
    public function getContent(Request $request)
    {
        
        $this->type = 'page';
        $this->post = new \stdClass();
        $this->post->title = 'il titolo del Contenuto di prova';
        $this->post->content = 'Contenuto di prova';
        $this->seo = new \stdClass();
        $this->seo->keywords = array('system-platform' => 'Platform System');
        $this->seo->description = 'Breve descrizione..';
        return $this;
    }
    /*
    public function getContents($slug)
    {
        $post = new Post();
        return $post;
    }
    
    public function saveContent($slug)
    {
        $post = new Post();
        return $post;
    }
    
    public function deleteContent($slug)
    {
        $post = new Post();
        return $post;
    }*/
    
}

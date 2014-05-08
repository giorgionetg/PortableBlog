<?php

namespace Giorgionetg\PortableBlog;

class ApiBlog {
    
    public $type;
    public $post;
    public $comments;
    public $keywords;
    public $description;
    public $user;
    
    public function __construct($tables = array()) {
        
        
    }
    
    public function getContent($slug)
    {
        $this->type = 'page';
        $this->post->title = 'il titolo del Contenuto di prova';
        $this->post->content = 'Contenuto di prova';
        $this->keywords = array('system-platform' => 'Platform System');
        $this->description = 'Breve descrizione..';
        return $this;
    }
    
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
    }
}

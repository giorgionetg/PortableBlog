<?php

namespace Giorgionetg\PortableBlog;



class Content {

    public $id;
    public $slug;
    public $title;
    public $content;
    public $categories;
    public $seo;
    public $author;
    public $comments;
    
    
    public function __construct()
    {
        
    }
    
    public function setId($id)
    {
        return $this->id = $id;
    }
    
    public function setSlug($slug)
    {
        return $this->slug = $slug;
    }
    
    public function setTitle($title)
    {
        return $this->title = $title;
    }
    
    public function setContent($content)
    {
        return $this->content = $content;
    }
    
    public function setAuthor($author)
    {
        return $this->author = $author;
    }
    
}
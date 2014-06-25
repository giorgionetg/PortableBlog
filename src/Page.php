<?php

namespace Giorgionetg\CmsLib;

class Page {
    
    public $slug;
    public $title;
    public $description;
    public $content;
    
    public function __construct()
    {
        
    }
    
    public function setSlug($slug)
    {
        return $this->slug = $slug;
    }
    
    public function setTitle($title)
    {
        return $this->title = $title;
    }
    
    public function setDescription($description)
    {
        return $this->description = $description;
    }
    
    public function setContent($content)
    {
        return $this->content = $content;
    }
}
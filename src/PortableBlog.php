<?php

namespace Giorgionetg\PortableBlog;

use Exception;
use Giorgionetg\PortableBlog\Installation;
use Giorgionetg\PortableBlog\ApiBlog;
use Symfony\Component\HttpFoundation\Request;

class PortableBlog {
    
    private $plug = NULL;
    
    public function __construct($ownPlug)
    {
        
        switch ($ownPlug){
            case 'Portable':
                $this->plug = new ApiBlog();
                break;
            case 'WordPress':
                $this->plug = new WpBlog();
                break;
            default:
                $this->plug = new ApiBlog();
                break;
        }
        
    }
    
    public function getTitle()
    {
        $this->plug->getTitle();
    }
    
    public function getContent()
    {
        $this->plug->getContent();
    }
    
    public function getTime()
    {
        $this->plug->getTime();
    }
    
    public function getAuthor()
    {
        return $this->plug->getAuthor();
    }
    
}

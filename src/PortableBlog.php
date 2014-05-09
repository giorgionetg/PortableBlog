<?php
/**
 * PortableBlog library application permits a bridge with common CMS as Wordpress
 * to have own custom Api to make changements.
 */
namespace Giorgionetg\PortableBlog;

use Exception;
use Giorgionetg\PortableBlog\Installation;
use Giorgionetg\PortableBlog\ApiBlog;
use Symfony\Component\HttpFoundation\Request;

class PortableBlog {
    /**
     *
     * @var type 
     */
    private $plug = NULL;
    
    public function __construct($ownPlug)
    {
        
        switch ($ownPlug){
            case 'Portable':
                $this->plug = new ApiBlog();
                break;
            case 'PortableBackend':
                $this->plug = new PortableBackend();
                break;
            case 'PortableFrontend':
                $this->plug = new PortableFrontend();
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
        return $this->plug->getTitle();
    }
    
    public function getContent()
    {
        return $this->plug->getContent();
    }
    
    public function getTime()
    {
        return $this->plug->getTime();
    }
    
    public function getAuthor()
    {
        return $this->plug->getAuthor();
    }
    
    public function getSeo()
    {
        return $this->plug->getSeo();
    }
    
    public function getComments()
    {
        return $this->plug->getComments();
    }
    
    public function getList()
    {
        return $this->plug->getList();
    }
}

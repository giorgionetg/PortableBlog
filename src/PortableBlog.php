<?php
/**
 * PortableBlog library application permits a bridge with common CMS as Wordpress
 * to have own custom Api to make changements. In other hand we have a common
 * Library to make Page/News easy everywhere as StandAlone Application or inside
 * a Route of own preferred Framework.
 * 
 * This Library uses Strategy Pattern to make any kind of extension.
 * 
 * @package Giorgionetg\PortableBlog
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
    
    public $request = NULL;
    
    public function __construct($ownPlug, Installation $settings)
    {
        
        
        
        
        switch ($ownPlug){
            case 'Portable':
                $this->plug = new ApiBlog($settings);
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
                $this->plug = new ApiBlog($settings);
                break;
        }
        $this->request = Request::createFromGlobals();
    }
    
    public function overrideRequest(Request $ownRequest)
    {
        return $this->request = $ownRequest;
    }
    
    
    public function getContent()
    {
        return $this->plug->getContent($this->request);
    }
    
    
}

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
    
    private $plug = NULL;
    
    public $request = NULL;
    
    /**
     * 
     * @param type $ownPlug String
     * @param \Giorgionetg\PortableBlog\Installation $settings
     */
    public function __construct($ownPlug, Installation $settings)
    {
        
        switch ($ownPlug){
            case 'Portable':
                $this->plug = new ApiBlog($settings);
                break;
            /*case 'PortableBackend':
                $this->plug = new PortableBackend();
                break;
            case 'PortableFrontend':
                $this->plug = new PortableFrontend();
                break;
            case 'WordPress':
                $this->plug = new WpBlog();
                break; */
            default:
                $this->plug = new ApiBlog($settings);
                break;
        }
        $this->request = Request::createFromGlobals();
    }
    
    /**
     * OverrideRequest() permits to define custom Action Route.
     * 
     * @param \Symfony\Component\HttpFoundation\Request $ownRequest
     * @return void
     */
    public function overrideRequest(Request $ownRequest)
    {
        return $this->request = $ownRequest;
    }
    
    /**
     * GetContent() return a mixed item as a string, arry or an object.
     * 
     * It depends from Class called inside end if exist an Action Route defined
     * inside PortableBlog->execute()
     * 
     * Giorgionetg\PortableBlog\PortableBlog->__construct
     * 
     * 
     * @return mixed
     */
    public function getContent()
    {
        //$this->execute();
        //if ($this->plug->contentExist($this->request)){
            // Get Content
        //}
        
        if (!$this->plug->contentExist(str_replace('/Blog/', '', $this->request->getRequestUri()))) {
            if ($this->request->getRequestUri() != '/Blog/'){
                return '404: no content found';
            } else {
                return $this->plug->getContent();
            }
            
        } else {
            return $this->plug->getContent();
        }
        
        
        
    }
    
    /**
     * Execute return an Action Route to transforms URI to Action in PortableBlog
     * 
     * @return string
     */
    public function execute()
    {
        if (preg_match('^/api/.$', $this->request)) {
            switch ($this->request) {
                case preg_match('', $this->request):
                    break;
            }
        }
        return $string;
    }
    
}

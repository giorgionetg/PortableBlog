<?php

namespace Giorgionetg\PortableBlog;

use Giorgionetg\PortableBlog\PortableBlog;
/**
 * Description of ApiBlog
 *
 * @author giorgionetg
 */
class ApiBlog extends PortableBlog {
    
    public function __construct($settings = array()) {
        parent::__construct($settings);
        
    }
    
    public function getContent($slug)
    {
        $post = new Post();
        return $post;
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

<?php

namespace BlogApp;

use Symfony\Component\HttpFoundation\Request;
use BlogApp\Post;
use BlogApp\User;

class BlogApp implements BlogAppInterface {
    
    public function __construct($options = array());
    
    public function saveContent(Post $post, User $user);
    
    public function getContent($slug);
    
    public function updateContent($slug);
    
    public function deleteContent($slug);
    
    public function test()
    {
        return Request::createFromGlobals();
    }
    
}
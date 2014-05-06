<?php

namespace BlogApp\BaseInterface;

interface BlogAppInterface {
    
    public function __construct($options = array());
    
    public function getContent($slug);
    
    public function updateContent($slug);
    
    public function deleteContent($slug);
    
}
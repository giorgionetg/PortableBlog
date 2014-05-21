<?php
namespace Giorgionetg\PortableBlog;
use Giorgionetg\PortableBlog\Installation;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BlogInterface
 *
 * @author giorgionetg
 */
interface BlogInterface {
    
    public function __construct(Installation $settings);
    public function getContent();
    public function getContentList($term_slug=null, $fields = array('title' => 'title'));
    public function getSingleContent($slug);
    public function getSeoData($content_slug);
    public function getAuthor($content_slug);
    public function contentExist($slug);
    
    //public function checkDbTable();
    //public function startInstallation();
    
}

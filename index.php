<?php

require_once 'vendor/autoload.php';

/*$settings['dbSettings'] = array(
    "driver" => "mysql",
    "host" => "localhost",
    "username" => "root",
    "password" => "*****",
    "char" => "utf8"
);

$settings['appSettings'] = array(
    "blogName" => "giorgionetg",
    "usingType" => "api"
);*/

use Giorgionetg\PortableBlog\PortableBlog;
use Giorgionetg\PortableBlog\Installation;
use Symfony\Component\HttpFoundation\Request;

try {
    $ownRequest = Request::create('/get-all-blog');
    
    // Put your DB Settings
    $settings = new Installation('Base');
    $settings->set('db_name', 'portableblog_apiblog');
    $settings->set('db_host', 'localhost');
    $settings->set('db_user', 'root');
    $settings->set('db_password', 'root');
    
    $settings->set('base_url', 'PortableBlog');
    
    $portableBlog = new PortableBlog('ApiBlog', $settings);
    //$portableBlog->overrideRequest($ownRequest);
    echo '<pre>';
    //var_dump($portableBlog->request);
    //echo '</pre><hr /><pre>';
    var_dump($portableBlog->getContent());
    
} catch (Exception $msg) {
    echo $msg->getMessage();
}
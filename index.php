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
    
    $settings = new Installation('Base');
    $settings->set('driver', 'mysql');
    $settings->set('host', 'localhost');
    
    $portableBlog = new PortableBlog('ApiBlog', $settings);
    //$portableBlog->overrideRequest($ownRequest);
    echo '<pre>';
    var_dump($portableBlog);
    echo '</pre><hr /><pre>';
    var_dump($portableBlog->getContent());
    
} catch (Exception $msg) {
    echo $msg->getMessage();
}
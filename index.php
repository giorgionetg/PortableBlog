<?php

require_once 'vendor/autoload.php';

$settings['dbSettings'] = array(
    "driver" => "mysql",
    "host" => "localhost",
    "username" => "root",
    "password" => "*****",
    "char" => "utf8"
);

$settings['appSettings'] = array(
    "blogName" => "giorgionetg",
    "usingType" => "api"
);

use Giorgionetg\PortableBlog\PortableBlog;
use Symfony\Component\HttpFoundation\Request;

try {
    
    $request = Request::createFromGlobals();
    
    $obj = new PortableBlog($request, $settings);
    //var_dump($obj->appSettings);
    //var_dump(count(explode('|', $obj->appSettings['usingType'])) > 1);
    //exit();
    $nowWat = $obj->execute();
    var_dump($nowWat);
    //echo $obj;
} catch (Exception $msg) {
    echo $msg->getMessage();
}
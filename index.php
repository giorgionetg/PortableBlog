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
);

use PortableBlog\PortableBlog;

try {
    $obj = new PortableBlog($settings);
    echo $obj;
} catch (Exception $msg) {
    echo $msg->getMessage();
}
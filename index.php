<?php

require_once 'vendor/autoload.php';


$settings = new \Giorgionetg\CmsLib\Installation('Base');
$settings->set('db_name', 'portableblog_apiblog');
$settings->set('db_host', 'localhost');
$settings->set('db_user', 'root');
$settings->set('db_password', 'root');

$blog = new Giorgionetg\CmsLib\CmsTG($settings);

$page = $blog->getContent();

echo "<h1>" . $page->title . "</h1>";
<?php

require 'vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;

$loader = new Twig_Loader_String();
$twig = new Twig_Environment($loader);

echo $twig->render('Hello {{ name }}!', array('name' => 'Fabien'));
echo "I'm here!";
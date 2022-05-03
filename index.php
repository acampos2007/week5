<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base Class
$f3 = Base::instance();
//echo gettype($f3);

//Define a default route
$f3->route('GET /', function($f3)
{
    //Add variables to the f3 hive
    $f3->set('username', 'jshmo');
    $f3->set('password', sha1('Password01'));
    $f3->set('title', 'Working with Templates');

    //try it
    $f3->set('color', 'purple');
    $f3->set('radius', 10);
    //array test
    $f3->set('fruits', array('orange', ' banana', 'apple '));
    //associative array
    $f3->set('addresses', array('primary' => '1000 Summer Ln Auburn, WA 98002', 'secondary' => '2510 Apple Ln Seattle, WA 98999'));

    //display a template
    $view = new Template();
    echo $view->render('views/home.html');
    //echo '<h1>Week5!</h1>';

    //alternate syntax
    //echo Template::instance()->render('views/info.html');
}
);

//Run fat free
$f3->run();
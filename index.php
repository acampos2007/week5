<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base Class
$f3 = Base::instance();
//echo gettype($f3);

//Define a default route
$f3->route('GET /', function()
{
    $view = new Template();
    echo $view->render('views/home.html');
    //echo '<h1>Week 5</h1>';
}
);

//Define a breakfast route
$f3->route('GET /breakfast', function()
{
    $view = new Template();
    echo $view->render('views/breakfast.html');
    //echo '<h1>Breakfast Page</h1>';

}
);

//Define a lunch route
$f3->route('GET /lunch', function()
{
    $view = new Template();
    echo $view->render('views/lunch.html');
    //echo '<h1>Breakfast Page</h1>';

}
);

//Define a dinner route
$f3->route('GET /dinner', function()
{
    $view = new Template();
    echo $view->render('views/dinner.html');
    //echo '<h1>Breakfast Page</h1>';

}
);

//Define a order route
$f3->route('GET /order', function()
{
    $view = new Template();
    echo $view->render('views/orderForm1.html');
    //echo '<h1>Order Page</h1>';
}
);

//Define a order2 route
$f3->route('POST /order2', function()
{
    //var_dump ($_POST);
    //move orderForm1 data from POST to SESSION
    $_SESSION['food'] = $_POST['food'];
    $_SESSION['meal'] = $_POST['meal'];

    $view = new Template();
    echo $view->render('views/orderForm2.html');
    //echo '<h1>Order Page</h1>';
}
);

//Define a order2 route
$f3->route('POST /summary', function()
{
    //var_dump ($_POST);
    if(empty($_POST['conds']))
    {
        $conds = "none selected";
    }
    else
    {
        $conds = implode(", ", $_POST['conds']);
    }
    $_SESSION['conds'] = $conds;

    //before changing to above if statement:
    //$_SESSION['conds'] = implode(", ", $_POST['conds']);

    $view = new Template();
    echo $view->render('views/orderSummary.html');
    //echo '<h1>Order Page</h1>';
}
);

//Run fat free
$f3->run();
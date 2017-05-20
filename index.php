<?php

    //Require the autoload file
    require_once('vendor/autoload.php');

    
    session_start();
    
    //need to make this only for when users are not logged in
    include_once('pages/navbar.php');
    
    //Create an instance of the Base class
    $f3 = Base::instance();

    //Instantiate the database class
    $blogsDB = new BlogsDB();
    
    //Define a default route
    $f3->route('GET /', function() {
        $view = new View;
        echo $view->render('pages/home.html');         
        });
    
    $f3->route('GET /aboutus', function() {
        $view = new View;
        echo $view->render('pages/aboutus.html');
        });
    
    $f3->route('GET /becomeablogger', function() {
        $view = new View;
        echo $view->render('pages/becomeblogger.html');    
        });
    
    $f3->route('GET /login', function() {
        $view = new View;
        echo $view->render('pages/login.html');
        });
    
    $f3->route('GET /createblog', function() {
        $view = new View;
        echo $view->render('pages/createblog.html');
        });

    
    //Run fat free
    $f3->run();
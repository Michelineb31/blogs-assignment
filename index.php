<?php

    //Require the autoload file
    require_once('vendor/autoload.php');
    
    session_start();
    
    //Create an instance of the Base class
    $f3 = Base::instance();

    //Instantiate the database class
    $blogsDB = new BlogsDB();
    
    //Define a default route
    $f3->route('GET /', function() {
        $view = new View;
        //echo 'Hello World';
        echo $view->render('pages/home.html');         
        }
    );
    
    //Run fat free
    $f3->run();
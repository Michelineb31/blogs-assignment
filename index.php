<?php

    //Require the autoload file
    require_once('vendor/autoload.php');
	$f3 = require_once('vendor/bcosca/fatfree-core/base.php');
	

    
    session_start();

    //Create an instance of the Base class
    //$f3 = Base::instance();

    //Instantiate the database class
    $blogsDB = new BlogsDB();
    
	
	$f3->set('header', 'view/header.php');
	

    // home.php
    $f3->route('GET /',function($f3) {
        $controller = new Controller($f3);
		$controller->homepage();  
    });
	
	//becomeblogger.php
	$f3->route('GET /createbloggerpage', function($f3) {
		$controller = new Controller($f3);
		$controller->createBloggerPage();  
    });
	
	//creating the blogger account
	$f3->route('POST /submitcreateaccount', function($f3) {
		$controller = new Controller($f3);
		$controller->submitCreateAccount(); 
	});
	
	//gets create a blog page
	$f3->route('GET /createablog', function($f3) {
		$controller = new Controller($f3);
		$controller->blogEntry(); 
	});
	
	//posting the blog entry
	$f3->route('POST /addBlog', function($f3) {
		$controller = new Controller($f3);
		$controller->createBlogEntry(); 
	});
	
	
	
	
	
    /*
    
    $f3->route('GET /aboutus', function() {

        echo Template::instance()->render('pages/aboutus.html');
        });
        */
    
    
	/*
    
    $f3->route('GET /login', function() {
;
        echo Template::instance()->render('pages/login.html');
        });
    
    $f3->route('GET /createblog', function() {

        echo Template::instance()->render('pages/createblog.html');
        });
    
    $f3->route('GET /profile/@username, function($f3, $params') {
        //$f3->set('blogger', $GLOBALS['blogsDB']->getUsername($params['username']));
		
		$f3->set('blogpost', $GLOBALS['blogsDB']->getAllBlogs($params['username']));
		
		echo Template::instance()->render('pages/profile.html');   
    }
    
    //$f3->route('GET /blog/@username') need to finish this....not sure how to call certian blog unless add bog id to table
    
    */
	
	//set the images for the website
	$f3->set('trumpet', 'images/trumpet.png');
	$f3->set('userPic', 'images/user.png');
	$f3->set('logo', 'images/blog_logo.png');
	$f3->set('lock', 'images/lock.png');
	$f3->set('write', 'images/writing.png');
			 
    
    //Run fat free
    $f3->run();
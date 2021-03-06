<?php
    /*
     *This file provides the routes
     *for the website.
     *
     *Blogs Assignment
     *05/21/17
     *
     * PHP Version 5
     *
     * @author Micheline Bourque <mbourque@mail.greenriver.edu>
     * @version 1.0
     */

    //Require the autoload file
    require_once('vendor/autoload.php');
	$f3 = require_once('vendor/bcosca/fatfree-core/base.php');
	

    session_start();

    //Create an instance of the Base class
    $f3 = Base::instance();

    //Instantiate the database class
    $blogsDB = new BlogsDB();
	
	$f3->set('DEBUG',3);
    
	
	$f3->set('header', 'view/header.php');
	$f3->set('navbar', 'view/navbar.php');
	

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
	$f3->route('POST /addblog', function($f3) {
		$controller = new Controller($f3);
		$controller->createBlogEntry(); 
	});
	
	//all my blog posts
	$f3->route('GET /myblogs', function($f3) {
		$controller = new Controller($f3);
		$controller->allMyBlogs(); 		
	});
	
	//display page to log in
	$f3->route('GET /login', function($f3) {
		$controller = new Controller($f3);
		$controller->loginPage();
    });
	
    
    //display the about us page
    $f3->route('GET /aboutus', function($f3) {
		$controller = new Controller($f3);
		$controller->aboutUs();
    });
        
    
    
	/*
    $f3->route('GET /profile/@username, function($f3, $params') {
        //$f3->set('blogger', $GLOBALS['blogsDB']->getUsername($params['username']));
		
		$f3->set('blogpost', $GLOBALS['blogsDB']->getAllBlogs($params['username']));
		
		echo Template::instance()->render('pages/profile.html');   
    }
    
    //$f3->route('GET /blog/@username') need to finish this..
    
    */
	
	//set the images for the website
	$f3->set('trumpet', 'images/trumpet.png');
	$f3->set('userPic', 'images/user.png');
	$f3->set('logo', 'images/blog_logo.png');
	$f3->set('lock', 'images/lock.png');
	$f3->set('write', 'images/writing.png');
			 
    
    //Run fat free
    $f3->run();
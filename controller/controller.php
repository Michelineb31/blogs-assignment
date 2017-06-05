<?php
    /*
     *This file is the controller for the website
     *
     *Blogs Assignment
     *05/21/17
     *
     * PHP Version 5
     *
     * @author Micheline Bourque <mbourque@mail.greenriver.edu>
     * @version 1.0
     */

class Controller
{
    private $_f3;
    
    /**
     *This is the method to construct the controller
     *@param f4 variables
     */
    function __construct($f3)
    {
        $this->_f3 = $f3;
    }
    
    /*
     *Displays the homepage
     *that lists all bloggers
     */
    function homepage()
    {
       //$data = new BlogsDB();
       // $bloggers = $data->getAllBloggers();
       
       //saving the data to the router
       //$this->_f3->set('bloggers', $bloggers);
       
       $this->_f3->set('navbar', 'view/navbar.php');
       /*
       $bloggers = $data->allBloggers();
       
       $this->_f3->set('bloggers', $blogger);
       $bloggerID = $data->getUser($bloggers);
       
       $profileImage = array();
       $blogCounts = array();
       foreach ($bloggers as $blogger) {
            $blogCounts[ $user['username'] ]= $data-> getTotalBlogs($user['username']);
            $profileImage[$user['username']]= $user['path'];
            $firstBlog[ $user['username'] ] = $data-> getFirstBlog($user['username']); 
        }

        save data to the router
        $this->_f3->set('blogCounts', $blogCounts);
        $this->_f3->set('profileImage', $profileImage);
        $this->_f3->set('firstBlog',$firstBlog);
        */
       echo Template::instance()->render('view/home.php');   
    }
    
    /**
     *Displays page to become a blogger
     */
    function createBloggerPage()
    {
       $this->_f3->set('navbar', 'view/navbar.php');
       echo Template::instance()->render('view/becomeblogger.php'); 
    }
    
    /**
     *Allows a blogger to create an account and
     *sumits the information they entered
     */
    function submitCreateAccount()
    {
        
        $password = $_POST['password'];
        $username = $_POST['username'];
        
        $data = new BlogsDB();
       
        $passwordConstraint = $data->passwordConstraints($password);
        
        if(count($passwordConstraint) === 0)
        {
            
            if($data->checkUsername($username) == true)
            {
              $this->_f3->set('userError', 'Sorry username is taken');
              echo Template::instance()->render('view/becomeblogger.php');
              exit();
            } else {
                
            $createBlogger = $data->addBlogger();
            
            $addProfileImage = $data->uploadProfileImage();
            $this->_f3->reroute('/createablog');
            //echo Template::instance()->render('view/becomeblogger.php');
            exit();
            }
            
              
        } else {
           //var_dump($passwordConstraint);
           $this->_f3->set('username', $_POST['username']);
           $this->_f3->set('email', $_POST['email']);
           $this->_f3->set('biography', strip_tags($_POST['biography']));
           
           $this->_f3->set('passwordConstraint', $passwordConstraint);
           
           echo Template::instance()->render('view/becomeblogger.php');
           exit();
           
        }
        
        //$_SESSION['username'] = $_POST['username'];
        //echo '<pre>';
        //var_dump('test here' .$_SESSION['username']);
        //echo'</pre>';
           $_SESSION['username'] = $_POST['username'];
           $_SESSION['loggedIn'] = true;
            
           //$this->_f3->reroute('/createablog');
  
    }
    
    /**
     *Displays the page to create a blog
     */
    function blogEntry()
    {
        $this->_f3->set('username', $_SESSION['username']);
        //echo '<pre>';
        //    var_dump('test session' . $_SESSION['username']);
        //echo'</pre>';
        $this->_f3->set('navbar', 'view/usernav.php');
        echo Template::instance()->render('view/createablog.php'); 
    }
    
    /**
     *Takes input from creating the blog entry
     *and posts to DB
     */
    function createBlogEntry()
    {
        $data = new BlogsDB();
       
        $this->_f3->reroute('/myblogs');
        
        $createBlog = $data->addBlog($username);
        
        $this->_f3->set('write', 'images/writing.png');
        
        echo Template::instance()->render('view/createablog.php');
    }
    
    /**
     *Displays create a blog page
     *and submits the entry
     */
    function submitBlogEntry()
    {
        $data = new BlogsDB();
        $createBlogEntry = $data->addBlog($username);
        
        //echo Template::instance()->render('view/createablog.php'); 
    }
        
    /**
     *Displays the login page
     */
    function loginPage()
    {
        $this->_f3->set('navbar', 'view/navbar.php');
        
        echo Template::instance()->render('view/login.php');
    }
    
    /**
     *Displays the about us page
     */
    function aboutUs()
    {
        $this->_f3->set('navbar', 'view/navbar.php');
        
        echo Template::instance()->render('view/aboutus.php');
    }
    
    /**
     *Displays all of the blogs for a certain user
     */
    function allMyBlogs()
    {
        $this->_f3->set('navbar', 'view/usernav.php');
        
        echo Template::instance()->render('view/myblogs.php');
    }
}

?>
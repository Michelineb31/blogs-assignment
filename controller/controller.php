<?php

class Controller
{
    private $_f3;
    
    
    function __construct($f3)
    {
        $this->_f3 = $f3;
    }
    
    function homepage()
    {
        
       //$data = new BlogsDB();
       // $bloggers = $data->getAllBloggers();
       
       //saving the data to the router
       //$this->_f3->set('bloggers', $bloggers);
       
       $this->_f3->set('navbar', 'view/navbar.php');
    
       echo Template::instance()->render('view/home.php');   
    }
    
    /*
     *Displays page to become a blogger
     */
    function createBloggerPage()
    {
       echo Template::instance()->render('view/becomeblogger.php'); 
    }
    
    /*
     *Allows a blogger to create an account and
     *sumits the information they entered
     */
    function submitCreateAccount()
    {
        
        $data = new BlogsDB();
        $createBlogger = $data->addBlogger();
        $addProfileImage = $data->uploadProfileImage();
        
        //$_SESSION['username'] = $_POST['username'];
        //echo '<pre>';
        //var_dump('test here' .$_SESSION['username']);
        //echo'</pre>';
        
        //if($addProfileImage){
           $_SESSION['username'] = $_POST['username'];
           $_SESSION['loggedIn'] = true;
            
            //redirect
            $this->_f3->reroute('/createablog');
      //  } else {
      //    $this->_f3->reroute('/createbloggerpage');
       // }   
    }
    
    /*
     *Displays the page to create a blog
     */
    function blogEntry()
    {
        $this->_f3->set('username', $_SESSION['username']);
        //echo '<pre>';
        //    var_dump('test session' . $_SESSION['username']);
        //echo'</pre>';
        
        echo Template::instance()->render('view/createablog.php'); 
    }
    
    /*
     *Takes input from creating the blog entry
     *and posts to DB
     */
    function createBlogEntry()
    {
        $data = new BlogsDB();
       
        //$userId= $data->getUser($_SESSION['username']);

        
        $this->_f3->reroute('/myblogs');
        
        
        $createBlog = $data->addBlog($username);
        
        $this->_f3->set('write', 'images/writing.png');

        
        echo Template::instance()->render('view/createablog.php');
    }
    
    function submitBlogEntry()
    {
        $data = new BlogsDB();
        $createBlogEntry = $data->addBlog($username);
        
        
        //echo Template::instance()->render('view/createablog.php'); 
    }
    
    //make function to show all blogs
    /*
     *Displays all of a bloggers blogs
     */

    
    
    /*
     *Displays the login page
     */
    function loginPage()
    {
         echo Template::instance()->render('view/login.php');
    }
    
    /*
     *Displays the about us page
     */
    function aboutUs()
    {
        echo Template::instance()->render('view/aboutus.php');
    }
    
    function allMyBlogs()
    {
        echo Template::instance()->render('view/myblogs.php');
    }
}

?>
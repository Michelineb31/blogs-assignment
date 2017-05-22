<?php

class Controller
{
    private $_f3;
    
    
    public function __construct($f3)
    {
        $this->_f3 = $f3;
    }
    
    public function homepage()
    {
        
       // $data = new DataLayer();
       // $bloggers = $data->getAllBloggers();
       
       //saving the data to the router
       //$this->_f3->set('bloggers', $bloggers);
       
       $this->_f3->set('navbar', 'view/navbar.php');
    
       echo Template::instance()->render('view/home.php');   
    }
    
    public function createBloggerPage()
    {
       echo Template::instance()->render('view/becomeblogger.php'); 
    }
    
    public function submitCreateAccount()
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
    
    public function blogEntry()
    {
        $this->_f3->set('username', $_SESSION['username']);
        echo '<pre>';
            var_dump('test session' . $_SESSION['username']);
        echo'</pre>';
        
        echo Template::instance()->render('view/createablog.php'); 
    }
    
    public function createBlogEntry()
    {
        
        $data = new BlogsDB();
        $createBlog = $data->addBlog();
        
        $this->_f3->set('write', 'images/writing.png');
        echo 'Hello';
        
        ///echo Template::instance()->render('view/createablog.php');
    }
    
    public function submitBlogEntry()
    {
        $data = new BlogsDB();
        $createBlogEntry = $data->addBlog();
        
        
        //echo Template::instance()->render('view/createablog.php'); 
    }
    
}

?>
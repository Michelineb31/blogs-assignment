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
        
        //echo '<pre>';
        //var_dump($createBlogger);
        //echo'</pre>';
        
        if($addProfileImage){
            $_SESSION['username'] = $_POST['username'];
            $SESSION['loggedIn'] = true;
            
            //redirect
            $this->_f3reroute('/blogEntry');
        } else {
            $this->_f3->reroute('/createbloggerpage');
        }   
    }
}

?>
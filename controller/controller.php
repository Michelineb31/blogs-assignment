<?php

Class Controller
{
    private $_f3;
    
    
    public function __construct($f3)
    {
        $this->_f3 = $f3;
    }
    
    public function homepage()
    {
        $data = new DataLayer();
       // $bloggers = $data->getAllBloggers();
    }
}
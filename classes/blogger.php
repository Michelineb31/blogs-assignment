<?php
Class Blogger
{
    //variables
    protected $fname;
    protected $lname;
    
    
    function __construct($fname = "unknown", $lname = "unknown")
    {
        $this->fname = $fname;
        $this->lname = $lname;
        
    }
}

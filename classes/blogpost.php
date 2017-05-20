<?php


Class Blogpost
{
    //variables
    private $_title;
    private $_entry;
    private $_date;
    
    function __construct($title="Unknown", $entry="none")
    {
        $this->_title = $title;
        $this->_entry = $entry;
        $this->_date = date("m/d/y");//php method
    }
    
    function getTitle()
    {
        return $this->_title;
    }
    
    function getEntry()
    {
        return $this->_entry;
    }
    
    function getDate()
    {
        return $this->_date;
    }
    
    function setTitle($title)
    {
        $this->_title = $title;
    }
    
    function setEntry($entry)
    {
        $this->_entry = $entry;
    }
    
    function setDate()
    {
        $this->date = $date;
    }
}
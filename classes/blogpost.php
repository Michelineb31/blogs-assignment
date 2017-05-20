<?php


Class Blogpost
{
    //variables
    private $_title;
    private $_entry;
    private $_date;
    
    function __construct($title, $entry)
    {
        $this->_title = $title;
        $this->_entry = $entry;
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
    
    function setTitle()
    {
        $this->_title = $title;
    }
    
    function setEntry()
    {
        $this->_entry = $entry;
    }
    
    function setDate()
    {
        $this->date = $date;
    }
}
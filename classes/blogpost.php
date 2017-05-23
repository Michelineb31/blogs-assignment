<?php
    /*
     *This file contains the object for the
     *blogpost
     *
     *Blogs Assignment
     *05/21/17
     *
     * PHP Version 5
     *
     * @author Micheline Bourque <mbourque@mail.greenriver.edu>
     * @version 1.0
     */

Class Blogpost
{
    //variables
    private $_title;
    private $_entry;
    private $_date;
    
    /**
     *This method constructs the blogpost object
     *
     *@param title of the blog post entry for the blogpost
     */
    function __construct($title="Unknown", $entry="none")
    {
        $this->_title = $title;
        $this->_entry = $entry;
        $this->_date = date("m/d/y");//php method
    }
    
    /**
     *This method gets the title of the blogpost
     *
     *@return the title of the blogpost
     */
    function getTitle()
    {
        return $this->_title;
    }
    
    /*
     *This method get the entry from the blogpost
     *
     *@return the entry fo the blogpost
     */
    function getEntry()
    {
        return $this->_entry;
    }
    
    /**
     *This method gets the date of the blogpost
     *
     *@return the date of the blogpost
     */
    function getDate()
    {
        return $this->_date;
    }
    
    /**
     *This method sets the title fo the blogpost
     *
     *@param title of the blogpost
     */
    function setTitle($title)
    {
        $this->_title = $title;
    }
    
    /**
     *This method sets the blogpost entry
     *
     *@param entry for the blogpost
     */
    function setEntry($entry)
    {
        $this->_entry = $entry;
    }
    
    /**
     *This method set the date for when the blogpost
     *was entered
     */
    function setDate()
    {
        $this->date = $date;
    }
}
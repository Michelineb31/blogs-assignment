<?php
/**
 *This file contains a blogger object
 */

 /**
  *This file contains a blogger object
  *which contains some basic information
  *about the blogger as well as how many posts
  *they have.
  *
  * @author Micheline Bourque <mbourque@mail.greenriver.edu>
  *
  *@version 1.0
  *
  *PHP version 5
  *@link http://mbourque.greenrivertech.net/328/blogs-assignment/
  */
Class Blogger
{
    //variables
    private $_username;
    private $_email;
    private $_bio;
    private $_profileImage;
    private $_blogs[];
    
    
    function __construct($username, $email, $bio, $profileImage)
    {
        $this->_username = $username;
        $this->_email = $email;
        $this->_bio=$bio;
        $this->_profileImage=$profileImage;
        $this->_blog[]= $blog[];
           
    }
    
    /**
     *This function gets the value that is
     *stored as the bloggers first name
     *@return The bloggers first name
     **/
    function getUsername()
    {
        return $this->_username;
    }
    
    /**
     *This function gets the value that is
     *stored as the bloggers bio
     *@return the bloggers bio
     **/
    function getBio()
    {
        return $this->_bio;
    }
    
    /**
     *This function gets the value that is
     *stored as the file path for the profile image
     *
     *@return the file path for the profile image
     */
    function getProfileImage()
    {
        return $this->_profileImage;
    }
    
    /**
     *This function adds a blog
     *that contains a title and entry.
     *
     *@param title of the blog and the entry for the blog
     */
    function addBlog($title, $entry)
    {
        $this->blog[]= new Blogpost($title, $entry);
    }
    
    /**
     *This function returns all
     *of the blogs.
     *
     *@return array of blogs
     */
    function getAllBlogs()
    {
        return $this->blogs[];
    }
    
    /**
     *This function returns
     *the last element in the blogs array
     */
    function getRecentBlog()
    {
        echo end($blog);//orints the last element in an array
    }

    
    

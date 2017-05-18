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
    protected $fname;
    protected $lname;
    protected $numBlogs;
    protected $photo;
    protected $recentBlog;
    
    
    function __construct($fname = "unknown", $lname = "unknown")
    {
        $this->fname = $fname;
        $this->lname = $lname;
        
    }
    
    /**
     *This function gets the value that is
     *stored as the bloggers first name
     *@return The bloggers first name
     **/
    function getFName()
    {
        return $this->fname;
    }
    
    /**
     *This function gets the value that is
     *stored as the bloggers last name
     *@return The bloggers last name
     **/
    function getLName()
    {
        return $this->lname;
    }
    
    /**
     *This function gets the value that is
     *stored as the number of blogs the
     *blogger has posted
     *@return the number of blog posts
     */
    function getNumBlogs()
    {
        return $this->numBlogs;
    }
    
    /**
     *This function gets the name of the
     *file that is stored for the
     *bloggers profile photo
     *@return bloggers profile photo
     **/
    function getPhoto()
    {
        return $this->photo;
    }
    
    /**
     *This function get the most recent
     *blog that the blogger has posted
     *@return most recent blog
     */
    function getRecentBlog()
    {
        return $this->recentBlog;
    }
    
    /**
    *
    * This function sets the first name
    * of the blogger.
    *
    * @param type $fname first name of the blogger
    *
    */    
    function setFName($fname)
    {
        if (!ctype_alpha($fname)) {
            $this->lname = null;
        } else {
            $this->lname = $fname;            
        }
    }
    
    /**
    *
    * This function sets the last name
    * of the blogger.
    *
    * @param type $lname last name of the blogger
    *
    */    
    function setLName($lname)
    {
        if (!ctype_alpha($lname)) {
            $this->lname = null;
        } else {
            $this->lname = $lname;            
        }
    }
    
    /**
    *
    * This function sets the number of blogs
    * that the blogger has posted
    *
    * @param type $numBlogs number of blogs the blogger posted
    *
    */    
    function setNumBlogs($numBlogs)
    {
            $this->numBlogs = $numBlogs;            
    }
    
    /**
     *This function sets the file name for the photo that
     *the blogger uses as their profile picture
     *
     *@param type $photo file name for image the blogger has uploaded
     */
    function setPhoto($photo)
    {
        $this->photo = $photo;
    }
    
    /**
     *This function sets the most recent blog post
     *that the blogger has posted
     *
     *@param type $recentBlog is the most recent blog posted
     */
    function setRecentBlog($recentBlog)
    {
        $this->recentBlog = $recentBlog;
    }

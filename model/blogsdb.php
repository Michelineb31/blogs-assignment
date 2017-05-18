<?php
    /*
     *This file provides access to the bloggers
     *in the database.
     *
     * PHP Version 5
     *
     * @author Micheline Bourque <mbourque@mail.greenriver.edu>
     * @version 1.0
     */
    class BlogsDB
    {
        private $_pdo;
        
        function __construct()
        {
            //Require configuration file
            require_once '/home/mbourque/blogsconfig.php';
            
            try {
                //Establish database connection
                $this->_pdo = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                
                //Keep the connection open for reuse to improve performance
                $this->_pdo->setAttribute( PDO::ATTR_PERSISTENT, true);
                
                //Throw an exception whenever a database error occurs
                $this->_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            catch (PDOException $e) {
                die( "Error!: " . $e->getMessage());
            }
        }
        
        /**
         *This function adds a blogger object into the
         *database.
         *
         *@param takes a blogger object and adds it to
         *the database
         *
         *@return the id of the last inserted row
         */
        function addBlogger($blogger)
        {
            $insert = 'INSERT INTO bloggers (fname, lname, numBlogs, photo, recentblog)
            VALUES (:fname, :lname, :numBlogs, :photo, :recentBlog)';
            
            $statement = $this->_pdo->prepare($insert);
            
            $statement->bindValue(':fname', $blogger->getFName(), PDO::PARAM_STR);
            $statement->bindValue(':lname', $blogger->getLName(), PDO::PARAM_STR);
            $statement->bindValue(':photo', $blogger->getPhoto(), PDO::PARAM_STR);
            $statement->bindValue(':numBlogs', 0, PDO::PARAM_INT); 
            $statement->bindValue(':recentBlog', $blogger->getRecentBlog(), PDO::PARAM_STR);
            
            $statement->execute();
            
            //Return ID of inserted row
            return $this->_pdo->lastInsertId();
        
        }
        
        
        
        
        /**
         *This function is going to
         *increment the numnber of blog posts a blogger has
         *each time they create a new one.
         *
         *@param id of the blogger
         */
        function updateNumBlogs($blogger_id)
        {
            $update = 'UPDATE bloggers
            SET numBlogs = numBlogs + 1
            WHERE blogger_id = :blogger_id';
            
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':blogger_id', $blogger_id, PDO::PARAM_INT);
            
            $statement->execute();
        }
           
    }

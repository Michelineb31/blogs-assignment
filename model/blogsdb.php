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
        
        /**
         *This is a constructor that constructs a
         *PHP Database Object.
         */
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
            $insert = 'INSERT INTO bloggers (username, email, profileImage, bio)
            VALUES (:username, :email, :profileImage, :bio)';
            
            $statement = $this->_pdo->prepare($insert);
            
            $statement->bindValue(':username', $blogger->getUsername(), PDO::PARAM_STR);
            $statement->bindValue(':email', $blogger->getEmail(), PDO::PARAM_STR);
            //$statement->bindValue(':password', $blogger->getPassword(), PDO::PARAM_STR);
            $statement->bindValue(':profileImage', $blogger->getProfileImage(), PDO::PARAM_STR); 
            $statement->bindValue(':bio', $blogger->getBio(), PDO::PARAM_STR);
            
            $statement->execute();
            
            //Return ID of inserted row
            return $this->_pdo->lastInsertId();
        
        }
        
        function allBloggers() {
            $select = 'SELECT username, profileImage, bio FROM bloggers';
            $results = $this->_pdo->query($select);
            
            $resultsArray = array();
            
            //map each blogger to a row of data for that blogger
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['username']] = $row;
            }
             
            return $resultsArray;
            
        }
        
        function userBlogs($username) {
            $select = 'SELECT username, title, entry, date FROM blogposts WHERE username = $username ORDER BY date';
            $results = $this->_pdo->query($select);
            
            $resultsArray = array();
            
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['username']] = $row;
            }
            
            return $resultsArray;
        }
        
        /*if top one is not working properly come back to this one
         *function addBlogger($username, $email, $password, $profileImage, $bio) {
            $insert = 'INSERT INTO bloggers (username, email, password, profileImage, bio)
            VALUES (:username, :email, :password, :profileImage, :bio)';
            
            $statement = $this->_pdo->prepare($insert);
            $statement->bindvalue(':username', $username, PDO::PARAM_STR);
            $statement->bindvalue(':email', $email, PDO::PARAM_STR);
            $statement->bindvalue(':password', $password, PDO::PARAM_STR);
            $statement->bindvalue(':profileImage', $profileImage, PDO::PARAM_STR);
            $statement->bindvalue(':bio', $bio, PDO::PARAM_STR);
            
            $statement->execute;
        }
        */
        
        function addBlog($username, $title, $entry) {
            $insert = 'INSERT INTO blogposts (username, title, entry) VALUES (:username, :title, :entry)';
            
            $statement = $this->_pdo->prepare($insert);
            $statement->bindvalue(':username', $username, PDO::PARAM_STR);
            $statement->bindvalue(':title', $title, PDO::PARAM_STR);
            $statement->bindvalue(':entry', $entry, PDO::PARAM_STR);
            
            
            $statement->execute();
        }
        
        
        
        /**
         *This function is going to
         *increment the numnber of blog posts a blogger has
         *each time they create a new one.
         *
         *@param id of the blogger
         */
        
         /*took out blogger id....if have to put back.....
        function updateNumBlogs($blogger_id)
        {
            $update = 'UPDATE bloggers
            SET numBlogs = numBlogs + 1
            WHERE blogger_id = :blogger_id';
            
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':blogger_id', $blogger_id, PDO::PARAM_INT);
            
            $statement->execute();
        }
        */
           
    }

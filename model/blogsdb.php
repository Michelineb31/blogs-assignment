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
         */
        function addBlogger()
        {
            //echo '<pre>';
            //
            //var_dump($_POST);
            //var_dump($_FILES['pic']['name']);
            //echo '</pre>';
            
            $insert = 'INSERT INTO bloggers(username, email, password, profile_image, bio)
            VALUES (:username, :email, :password, :profile_image, :bio)';
            
            $statement = $this->_pdo->prepare($insert);
            
            $statement->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
            $statement->bindValue(':email', $_POST['email'], PDO::PARAM_STR); 
            $statement->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
            $statement->bindValue(':profile_image', 'images/'.$_FILES['pic']['name'], PDO::PARAM_STR); 
            $statement->bindValue(':bio', $_POST['biography'], PDO::PARAM_STR);
            
            $statement->execute(); 
        }
        
        /**
         *This function checks if the username is in the database
         *
         *@param $username username is the username for the blogger
         *@return false if username is not taken true if it is
         */
        function checkUsername($username)
        {    
            $sql ='SELECT username FROM bloggers WHERE username = :username';
            $statement = $this->_pdo->prepare($sql);
            $statement->bindValue(':username', $username, PDO::PARAM_STR);
            
            $statement->execute();
            
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                
                if($row[username] == $username){
                return true;
                $exists = true;
                exit();
                }
           }
           
           return false;
        
        }
        
        /**
         *This function returns errors if the password
         *does not meet criteria
         *
         *@param $password  password the user chooses
         *@return the error messages
         */
        function passwordConstraints($password)
        {
            //var_dump($password);
            //exit();
            if($_SERVER['REQUEST_METHOD']) {
                if (!isset($_POST['username'])) {
                    $errors['username'] = 'Please enter a username';
                }
                //making email field "sticky"
                if (!isset($_POST['email']) || !(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
                    $errors['email'] = 'Please enter a valid email';
                }
                if (isset($password)) {
                    if (strlen($password) < 6 || !preg_match( '~\d~', $password) || !preg_match('`[^0-9a-zA-Z]`',$password)) {
                        $errors['password'] = 'Password must be at least 6 characters long contain a number and a symbol';
                    }
                } else {
                    $errors['password'] = 'Please enter a password';
                }
                if (!isset($_POST['biography'])) {
                    $errors['biography'] = 'Please enter a bio';
                }
            } else {
                $errors[] = 'Must enter in all fields';
            }
            return $errors;
        }
        
        /*
         *This method accepts and image file
         *from what the user posts and then stores it
         *into the images folder
         */
        //this accepts an image file from the users post
        //and stores it into images folder
        function uploadProfileImage()
        {
            $errors = array();//check to insure file is actually an image file
            $target_directory ="images/";
            $target_file =$target_directory . basename($_FILES['pic']['name']);
            $uploadOK = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            
            //check if actual image
            if(isset($_POST['submit'])){
                
                $check = getimagesize($_FILES['pic']['tmp_name']);
                
                if($check != false){
                    //echo "File is an image - " . check["mime"] . ".";
                    $uploadOK = 1;
                } else{
                    $errors[] = "File us not an image";
                    $uploadOK = 0;          
                }
            }
            //check if the file already exists
            if(file_exists($target_file)){
                $errors[] = "File already exists.";
                $uploadOK = 0;
            }
            //check size of file
            if($_FILES['pic']['size'] > 200000){
                $errors[] = "Image size is too large";
                
                $uploadOK = 0;
            }
            //allow these file formats
            if($imageFileType != "jpg" && $imageFileType != "jpeg"
               && $imageFileType != "gif"){
                $errors[]="Only JPG, PNG, JPEG, GIF are allowed";
                $uploadOK = 0;
            }
            
            //check if $uploadOK nis set to 0 by error
            if($uploadOK == 0){
                $errors[] = "File not uploaded";
                //if all is ok try to upload file
            } else{
                if(move_uploaded_file($_FILES['pic']["tmp_name"], $target_file)){
                    return true;
                } else{
                    $errors[] ="Error uploading file";
                
                }
            }
        }
        
        /*
         *This retrieves the userid of blogger based on username
         *
         *@param string $username the bloggers username
         *@return $result the blogger id of the blogger
         */
        function getUser($username)
        {
            $select ='SELECT blogger_id FROM bloggers
                      WHERE username=:username';

            $statement = $pdo->prepare($select);
            
            $statement->bindValue(':username', $username, PDO::PARAM_STR);
            
            $statement->execute();
            
            $row = $statement->fetch(PDO::FETCH_ASSOC);
           
            $result = $row['blogger_id'];
           
            return $result;  
        }
        
        /*
         *Function to pull data from the
         *bloggers database
         */
        function allBloggers() {
            $select = 'SELECT username, profile_image, bio FROM bloggers';
            $results = $this->_pdo->query($select);
            
            $resultsArray = array();
            
            //map each blogger to a row of data for that blogger
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['username']] = $row;
            }
             
            return $resultsArray;
            
        }
        
        /*
         *This method gets data from
         *the blog posts database
         */
        function userBlogs($username) {
            $select = 'SELECT username, title, entry, date FROM blogposts WHERE username = $username ORDER BY date';
            $results = $this->_pdo->query($select);
            
            $resultsArray = array();
            
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $resultsArray[$row['username']] = $row;
            }
            
            return $resultsArray;
        }
        
        /*
         *This method adds a title, entry and
         *username to the blogposts database
         *
         *@param username for the blogger
         */
        function addBlog($username) {
            //var_dump($username);
            $insert = 'INSERT INTO blogposts (username, title, entry) VALUES (:username, :title, :entry)';
            
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
            $statement->bindValue(':title', $_POST['entry'], PDO::PARAM_STR);
            $statement->bindValue(':entry', $_POST['entry'], PDO::PARAM_STR);
            
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
    //$new = new BlogsDB();
    
    //$new-> passwordConstraints("qqwert!2");

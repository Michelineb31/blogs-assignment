# blogs-assignment
CREATE TABLE bloggers(blogger_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, username VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(100) NOT NULL, profile_image VARCHAR(255), bio VARCHAR(255) DEFAULT NULL);

CREATE TABLE blogposts(blog_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, blogger_id INT NOT NULL, title VARCHAR(255) NOT NULL, entry TEXT NOT NULL, date VARCHAR(40) NOT NULL);

ALTER TABLE `blogposts` CHANGE `blogger_id` `username` VARCHAR(50) NOT NULL;

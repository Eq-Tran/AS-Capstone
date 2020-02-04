
Database Table for User Login
CREATE TABLE `se266_001317108`.`users` (
  `userid` BIGINT(255) NOT NULL,
  `username` VARCHAR(16) NOT NULL,

CREATE TABLE `users` (
  `userid` BIGINT NOT NULL,
  `uname` VARCHAR(16) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `first` VARCHAR(45) NOT NULL,
  `middle` VARCHAR(45),
  `last` VARCHAR(45) NOT NULL,
  `birthday` DATE,
  `location` VARCHAR(45),
  `profile_image` LONGBLOB,
  `image_test` VARCHAR(45)
  PRIMARY KEY (`userid`));


Database Table for User Posts
CREATE TABLE `se266_001317108`.`posts` (




CREATE TABLE `posts` (

  `postid` BIGINT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `userid` BIGINT(255) NOT NULL,
  `post` VARCHAR(200) NOT NULL,
  `create_time` VARCHAR(45) NOT NULL DEFAULT 'CURRENT_TIMESTAMP');


Database Table for Admin Login
CREATE TABLE `se266_001317108`.`adminlogin` (
  `adminid` INT NOT NULL,
  `adminuser` VARCHAR(45) NOT NULL,
  `adminpass’ VARCHAR(45) NOT NULL,
  PRIMARY KEY (`adminid`));

Database Table for Post Comments
CREATE TABLE `se266_001317108`.`comments` (
  `commentid` BIGINT(255) NOT NULL AUTO_INCREMENT,
  `userid` BIGINT(255) NOT NULL,
  `postid` BIGINT(255) NOT NULL,
  `comment` VARCHAR(255) NULL,
  PRIMARY KEY (`commentid`));

Database Query for INNER JOIN Users/Posts
SELECT posts.userid, posts.postid, posts.post, users.uname
FROM posts
INNER JOIN users ON posts.userid = users.userid;
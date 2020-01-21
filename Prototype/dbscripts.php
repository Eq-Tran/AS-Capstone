Database Table for User Login
CREATE TABLE `se266_001317108`.`users` (
  `userid` BIGINT(255) NOT NULL,
  `username` VARCHAR(16) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `firstname` VARCHAR(45) NOT NULL,
  `middlename` VARCHAR(45),
  `lastname` VARCHAR(45) NOT NULL,
  `birthday` DATE,
  `profile_image` LONGBLOB,
  `image_test` VARCHAR(45),
  `create_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`));

Database Table for User Posts
CREATE TABLE `se266_001317108`.`posts` (
  `postid` BIGINT(255) NOT NULL,
  `userid` BIGINT(255) NOT NULL,
  `post` VARCHAR(200) NOT NULL,
  `create_time` VARCHAR(45) NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
  PRIMARY KEY (`postid`));


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


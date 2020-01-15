CREATE TABLE `se266_001317108`.`users` (
  `userid` INT NOT NULL,
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




CREATE TABLE `se266_001317108`.`posts` (
  `postid` BIGINT(255) NOT NULL,
  `userid` BIGINT(255) NOT NULL,
  `post` VARCHAR(200) NOT NULL,
  `create_time` VARCHAR(45) NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
  PRIMARY KEY (`postid`));


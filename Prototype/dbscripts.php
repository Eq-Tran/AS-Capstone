CREATE TABLE `users` (
  `userid` INT NOT NULL,
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




CREATE TABLE `posts` (
  `postid` BIGINT(255) NOT NULL,
  `userid` BIGINT(255) NOT NULL,
  `post` VARCHAR(200) NOT NULL,
  `create_time` VARCHAR(45) NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
  PRIMARY KEY (`postid`));


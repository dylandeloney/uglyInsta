# Dump File
#
# Database is ported from MS Access
#--------------------------------------------------------
# Program Version 5.1.232

DROP DATABASE IF EXISTS `users`;
CREATE DATABASE IF NOT EXISTS `users`;
USE `users`;

#
# Table structure for table 'registeredUsers'
#

DROP TABLE IF EXISTS `regiseredUsers`;

CREATE TABLE `registeredUsers` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL, 
  `password` VARCHAR(128) NOT NULL, 
  PRIMARY KEY (`ID`), 
  INDEX (`username`), 
  INDEX (`password`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'registeredUser'
#



-- create posts table
#
# Table structure for table 'posts'
#

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `image` LONGBLOB NOT NULL,
  `username` VARCHAR(30) NOT NULL, 
  `description` VARCHAR(180) NOT NULL, 
  PRIMARY KEY (`ID`), 
  INDEX (`username`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'posts'
#




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
  `ID` INT NOT NULL,
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

INSERT INTO `registeredUsers` (`ID`,`username`, `password`) VALUES ('0','Dylan', 'password');

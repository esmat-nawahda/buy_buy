-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 21, 2015 at 08:45 PM
-- Server version: 6.0.4
-- PHP Version: 6.0.0-dev

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `ali`
-- 
CREATE DATABASE `ali` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ali`;

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `adminId` int(10) NOT NULL AUTO_INCREMENT,
  `adminkey` int(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  ` email` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `mobile` int(10) NOT NULL,
  `privileges` varchar(30) NOT NULL,
  PRIMARY KEY (`adminId`),
  KEY `Admin_key` (`adminkey`,`password`,`firstName`,`lastName`,`country`,` email`,`phone`,`mobile`,`privileges`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `admin`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `category`
-- 

CREATE TABLE `category` (
  `categoryId` int(10) NOT NULL AUTO_INCREMENT,
  `catName` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `postId` int(10) NOT NULL,
  PRIMARY KEY (`categoryId`),
  KEY `Name` (`catName`,`description`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `category`
-- 

INSERT INTO `category` VALUES (1, 'car', 'BMW', 0);
INSERT INTO `category` VALUES (2, 'book', 'PC ', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `comment`
-- 

CREATE TABLE `comment` (
  `commentId` int(10) NOT NULL AUTO_INCREMENT,
  `content` varchar(40) NOT NULL,
  `publishDate` date NOT NULL,
  `postId` int(10) NOT NULL,
  PRIMARY KEY (`commentId`),
  KEY `Content` (`content`,`publishDate`,`postId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `comment`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `company`
-- 

CREATE TABLE `company` (
  `companyId` int(10) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  ` country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `moblie` int(10) NOT NULL,
  `fax` int(10) NOT NULL,
  `channelId` int(10) NOT NULL,
  `insert` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `x_location` float NOT NULL,
  `y_location` float NOT NULL,
  `companyKey` int(10) NOT NULL,
  PRIMARY KEY (`companyId`),
  KEY `Company_name` (`companyName`,`password`,` country`,`city`,`email`,`phone`,`moblie`,`fax`,`channelId`,`insert`,`description`,`x_location`,`y_location`,`companyKey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `company`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `company_publish`
-- 

CREATE TABLE `company_publish` (
  `companyId` int(10) NOT NULL,
  `postId` int(10) NOT NULL,
  KEY `Company_Id` (`companyId`,`postId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `company_publish`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `follow`
-- 

CREATE TABLE `follow` (
  `followId` int(10) NOT NULL AUTO_INCREMENT,
  `followerId` int(10) NOT NULL,
  `description` varchar(30) NOT NULL,
  PRIMARY KEY (`followId`),
  KEY `Follower_Id` (`followerId`,`description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `follow`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `live`
-- 

CREATE TABLE `live` (
  `liveId` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `startTime` date NOT NULL,
  `endTime` date NOT NULL,
  `postId` int(10) NOT NULL,
  PRIMARY KEY (`liveId`),
  KEY `Date` (`date`,`startTime`,`endTime`,`postId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `live`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `notification`
-- 

CREATE TABLE `notification` (
  `notificationId` int(10) NOT NULL AUTO_INCREMENT,
  `content` varchar(50) NOT NULL,
  `alarmDate` date NOT NULL,
  `userId` int(10) NOT NULL,
  PRIMARY KEY (`notificationId`),
  KEY `Content` (`content`,`alarmDate`,`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `notification`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `post`
-- 

CREATE TABLE `post` (
  `postId` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `content` varchar(30) NOT NULL,
  `puplishDate` date NOT NULL,
  `puplishTime` date NOT NULL,
  `dueDate` date NOT NULL,
  `isLive` tinyint(1) NOT NULL,
  `isPublic` tinyint(1) NOT NULL,
  PRIMARY KEY (`postId`),
  KEY `Title` (`title`,`content`,`puplishDate`,`puplishTime`,`dueDate`,`isLive`,`isPublic`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `post`
-- 

INSERT INTO `post` VALUES (1, 'car', 'hello php', '2015-03-14', '2015-03-20', '2015-03-27', 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `product`
-- 

CREATE TABLE `product` (
  `productId` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `categoryId` int(10) NOT NULL,
  `postId` int(10) NOT NULL,
  PRIMARY KEY (`productId`),
  KEY `Name` (`name`,`description`,`image`,`categoryId`,`postId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `product`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `userId` int(10) NOT NULL AUTO_INCREMENT,
  `userName` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `birthDay` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `mobile` int(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `job` varchar(20) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `X_location` float DEFAULT NULL,
  `Y_location` float DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`userId`),
  KEY `User_name` (`userName`,`password`,`firstName`,`lastName`,`birthDay`,`email`,`phone`,`mobile`,`gender`,`job`,`country`,`city`,`X_location`,`Y_location`),
  KEY `Address` (`address`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` VALUES (1, 'ali', '123', 'ali', 'nairat', '0000-00-00', 'alinairat@gmail.com', 599241775, 597241775, 'male', 'doctor', 'palistine', 'jenin', 20, 30, '');
INSERT INTO `user` VALUES (2, 'mohammad', '1234', 'mohammad', 'ahmad', '2015-03-03', 'mohammad@gmail.com', 59992455, 5995203, 'male', 'student', 'palistine ', 'jenin', 20, 30, '');
INSERT INTO `user` VALUES (3, '', '', 'a', 'a', NULL, '', 0, NULL, NULL, NULL, '', '', NULL, NULL, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `user_publish`
-- 

CREATE TABLE `user_publish` (
  `userId` int(10) NOT NULL,
  `postId` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `user_publish`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `wish_list`
-- 

CREATE TABLE `wish_list` (
  `wishId` int(10) NOT NULL AUTO_INCREMENT,
  `userId` int(10) NOT NULL,
  `thing` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`wishId`),
  KEY `User_Id` (`userId`,`thing`,`description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `wish_list`
-- 


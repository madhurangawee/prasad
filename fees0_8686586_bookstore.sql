-- phpMyAdmin SQL Dump
-- version 3.4.3.1
-- http://www.phpmyadmin.net
--
-- Host: sql100.0fees.net
-- Generation Time: Jun 26, 2012 at 01:03 PM
-- Server version: 5.1.55
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fees0_8686586_bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `ADMIN_ID` int(10) NOT NULL AUTO_INCREMENT,
  `ADMIN_NAME` varchar(50) NOT NULL,
  `ADMIN_TYPE` varchar(50) NOT NULL,
  `ADMIN_USERNAME` varchar(50) NOT NULL,
  `ADMIN_PASSWORD` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(100) NOT NULL,
  `STATUS` int(2) NOT NULL,
  `ADDED_DATE` varchar(20) NOT NULL,
  `EDITED_DATE` varchar(20) NOT NULL,
  PRIMARY KEY (`ADMIN_ID`),
  FULLTEXT KEY `DESCRIPTION` (`DESCRIPTION`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ADMIN_ID`, `ADMIN_NAME`, `ADMIN_TYPE`, `ADMIN_USERNAME`, `ADMIN_PASSWORD`, `DESCRIPTION`, `STATUS`, `ADDED_DATE`, `EDITED_DATE`) VALUES
(1, 'Test', 'Admin', 'admin', '123', '1234', 1, '2011-08-20', '2011-08-28'),
(3, 'Tst3', 'Clerk', 'clk', '222', '2222', 1, '2011-08-20', '2011-10-02'),
(4, 'rrre4', 'Admin', 'cher', '432', '3333', 0, '2011-08-20', '2011-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `BILL_ID` int(10) NOT NULL,
  `ITEM_ID` int(10) NOT NULL,
  `ITEM_TYPE` int(10) NOT NULL,
  `PRICE` int(10) NOT NULL,
  `QTY` int(10) NOT NULL,
  `TOTAL` int(10) NOT NULL,
  `ADDED_BY` int(10) NOT NULL,
  `ADDED_DATE` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`ID`, `BILL_ID`, `ITEM_ID`, `ITEM_TYPE`, `PRICE`, `QTY`, `TOTAL`, `ADDED_BY`, `ADDED_DATE`) VALUES
(13, 19, 9, 1, 333, 1, 333, 0, '2011-08-26'),
(12, 18, 6, 1, 891, 1, 891, 0, '2011-08-26'),
(11, 18, 10, 1, 333, 1, 333, 0, '2011-08-26'),
(10, 18, 3, 1, 0, 1, 0, 0, '2011-08-26'),
(7, 17, 8, 1, 1100, 1, 1100, 0, '2011-08-26'),
(8, 17, 4, 1, 1200, 1, 1200, 0, '2011-08-26'),
(9, 17, 2, 1, 680, 1, 680, 0, '2011-08-26'),
(14, 20, 2, 1, 680, 1, 680, 0, '2011-08-27'),
(15, 20, 2, 2, 2011, 2, 4022, 0, '2011-08-27'),
(16, 20, 4, 1, 1200, 1, 1200, 0, '2011-08-27'),
(17, 20, 2, 1, 680, 1, 680, 0, '2011-08-27'),
(18, 21, 7, 1, 1250, 1, 1250, 0, '2011-08-27'),
(19, 21, 2, 2, 2011, 1, 2011, 0, '2011-08-27'),
(20, 21, 2, 1, 680, 1, 680, 0, '2011-08-27'),
(21, 21, 9, 1, 333, 1, 333, 0, '2011-08-27'),
(22, 21, 2, 1, 680, 1, 680, 0, '2011-08-27'),
(23, 21, 7, 1, 1250, 1, 1250, 0, '2011-08-27'),
(24, 21, 2, 2, 2011, 1, 2011, 0, '2011-08-27'),
(25, 21, 4, 1, 1200, 1, 1200, 0, '2011-08-27'),
(26, 21, 4, 1, 1200, 1, 1200, 0, '2011-08-27'),
(27, 21, 10, 1, 333, 1, 333, 0, '2011-08-27'),
(28, 21, 7, 1, 1250, 1, 1250, 0, '2011-08-27'),
(29, 21, 7, 1, 1250, 1, 1250, 0, '2011-08-27'),
(30, 22, 7, 1, 1250, 1, 1250, 0, '2011-08-27'),
(31, 22, 4, 1, 1200, 1, 1200, 0, '2011-08-27'),
(32, 22, 9, 1, 333, 1, 333, 0, '2011-08-27'),
(33, 22, 6, 1, 891, 1, 891, 0, '2011-08-27'),
(34, 22, 7, 1, 1250, 5, 6250, 0, '2011-08-27'),
(35, 23, 7, 1, 1250, 1, 1250, 0, '2011-08-27'),
(36, 24, 7, 1, 1250, 1, 1250, 0, '2011-08-27'),
(37, 24, 4, 1, 1200, 1, 1200, 0, '2011-08-27'),
(38, 24, 10, 1, 333, 1, 333, 0, '2011-08-27'),
(39, 24, 4, 1, 1200, 1, 1200, 0, '2011-08-27'),
(40, 24, 5, 2, 25, 10, 250, 0, '2011-08-27'),
(41, 24, 9, 1, 333, 1, 333, 0, '2011-08-27'),
(42, 25, 5, 2, 25, 5, 125, 0, '2011-08-27'),
(43, 26, 9, 1, 333, 2, 666, 0, '2011-08-28'),
(44, 26, 2, 1, 680, 1, 680, 0, '2011-08-28'),
(45, 26, 2, 2, 2011, 1, 2011, 0, '2011-08-28'),
(46, 26, 8, 1, 1100, 1, 1100, 0, '2011-08-28'),
(47, 26, 9, 1, 333, 1, 333, 0, '2011-08-28'),
(48, 27, 2, 1, 680, 1, 680, 0, '2011-08-28'),
(49, 27, 10, 1, 333, 1, 333, 0, '2011-08-28'),
(50, 28, 6, 1, 891, 1, 891, 0, '2011-08-28'),
(51, 29, 9, 1, 333, 5, 1665, 1, '2011-09-03'),
(52, 29, 2, 2, 2011, 1, 2011, 1, '2011-09-03'),
(53, 48, 9, 1, 333, 1, 333, 0, '2011-10-03'),
(54, 48, 6, 1, 300, 1200, 360000, 0, '2011-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `BOOK_ID` int(20) NOT NULL AUTO_INCREMENT,
  `BOOK_NAME` varchar(50) NOT NULL,
  `ICBS_NO` varchar(30) NOT NULL,
  `BOOK_TYPE` varchar(50) NOT NULL,
  `BOOK_AUTHOR` varchar(50) NOT NULL,
  `BOOK_PUBLISHER` varchar(50) NOT NULL,
  `ISSUED_DATE` varchar(50) NOT NULL,
  `PURCHASE_PRICE` int(10) NOT NULL,
  `SELL_PRICE` int(10) NOT NULL,
  `QUANTITY` int(10) NOT NULL,
  `BOOK_COVER` varchar(200) DEFAULT 'nocover.png',
  `SAMPLE_PDF` varchar(200) DEFAULT NULL,
  `SUP_ID` int(10) NOT NULL,
  `STATUS` int(2) NOT NULL,
  `ADDED_BY` int(10) NOT NULL,
  `ADDED_DATE` varchar(20) NOT NULL,
  `EDITED_BY` int(10) NOT NULL,
  `EDITED_DATE` varchar(20) NOT NULL,
  `DESCRIPTION` varchar(10000) NOT NULL DEFAULT 'no description available.',
  `ITEM_TYPE` int(2) NOT NULL DEFAULT '1',
  `REVIEW` int(2) NOT NULL,
  PRIMARY KEY (`BOOK_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BOOK_ID`, `BOOK_NAME`, `ICBS_NO`, `BOOK_TYPE`, `BOOK_AUTHOR`, `BOOK_PUBLISHER`, `ISSUED_DATE`, `PURCHASE_PRICE`, `SELL_PRICE`, `QUANTITY`, `BOOK_COVER`, `SAMPLE_PDF`, `SUP_ID`, `STATUS`, `ADDED_BY`, `ADDED_DATE`, `EDITED_BY`, `EDITED_DATE`, `DESCRIPTION`, `ITEM_TYPE`, `REVIEW`) VALUES
(4, 'Senkala', '1234569', '40', 'w d harischandra', '5', '07/01/2008', 520, 1200, 111, 'gn0139-1314940955.jpg', 'Excerpt_9780801013997-1315046718.pdf', 2, 1, 0, '2011-07-20 ', 0, '2011-09-27', '<p>\n	Duis vel lacus ut ante lobortis tincidunt. Ut scelerisque imperdiet elit. Quisque facilisis feugiat est. Duis eget nulla. Aenean nisl lacus, tempus id, convallis in, vulputate vulputate, metus. Quisque condimentum aliquet nulla. Nullam dignissim dictum purus. Curabitur ullamcorper. Curabitur a dolor. Morbi tincidunt pede eu ante. Aliquam rhoncus, urna vitae semper pellentesque, lacus lorem tempus elit, sed scelerisque metus metus vel nisi. Aliquam fringilla ligula sed sapien. Phasellus imperdiet, tellus ac vulputate dictum, erat sapien gravida velit, non euismod odio tortor eget mauris. In hac habitasse platea dictumst. Sed urna tellus, mollis sit amet, ultrices et, adipiscing eget, nulla.</p>\n<p>\n	Cras accumsan lorem vitae lectus. Aliquam pretium ultricies neque. Cras sodales suscipit erat. In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices p</p>\n<p>\n	Duis vel lacus ut ante lobortis tincidunt. Ut scelerisque imperdiet elit. Quisque facilisis feugiat est. Duis eget nulla. Aenean nisl lacus, tempus id, convallis in, vulputate vulputate, metus. Quisque condimentum aliquet nulla. Nullam dignissim dictum purus. Curabitur ullamcorper. Curabitur a dolor. Morbi tincidunt pede eu ante. Aliquam rhoncus, urna vitae semper pellentesque, lacus lorem tempus elit, sed scelerisque metus metus vel nisi. Aliquam fringilla ligula sed sapien. Phasellus imperdiet, tellus ac vulputate dictum, erat sapien gravida velit, non euismod odio tortor eget mauris. In hac habitasse platea dictumst. Sed urna tellus, mollis sit amet, ultrices et, adipiscing eget, nulla.</p>\n<p>\n	Cras accumsan lorem vitae lectus. Aliquam pretium ultricies neque. Cras sodales suscipit erat. In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices p</p>\n', 1, 5),
(3, 'eeew', '12323', '40', '232', '1', '07/13/2011', 100, 150, -9, '61_update_bjii-1310967592.jpg', '', 2, 1, 0, '2011-07-18', 0, '2011-09-24', '<p>\n	asdsd</p>\n', 1, 0),
(7, 'testt', '4567895', '43', 'no Authro', '--Please Select--', '07/27/2011', 458, 1250, 65, '203482_112918762122021_2187988_n-1314941519.jpg', '', 1, 1, 0, '2011-07-30 ', 0, '2011-10-02', '', 1, 0),
(6, 'New book', '1234567', '43', 'd.w.e Wijenayake', '7', '07/09/2002', 150, 300, -1143, '8E1C0831-84E1-4CE5-85BD-3D6B8FAA2E98-1314940878.png', '2041707_PDF-1316847891.pdf', 1, 1, 0, '2011-07-30', 0, '2011-10-02', '<p>\n	Duis vel lacus ut ante lobortis tincidunt. Ut scelerisque imperdiet elit. Quisque facilisis feugiat est. Duis eget nulla. Aenean nisl lacus, tempus id, convallis in, vulputate vulputate, metus. Quisque condimentum aliquet nulla. Nullam dignissim dictum purus. Curabitur ullamcorper. Curabitur a dolor. Morbi tincidunt pede eu ante. Aliquam rhoncus, urna vitae semper pellentesque, lacus lorem tempus elit, sed scelerisque metus metus vel nisi. Aliquam fringilla ligula sed sapien. Phasellus imperdiet, tellus ac vulputate dictum, erat sapien gravida velit, non euismod odio tortor eget mauris. In hac habitasse platea dictumst. Sed urna tellus, mollis sit amet, ultrices et, adipiscing eget, nulla.</p>\n<p>\n	Cras accumsan lorem vitae lectus. Aliquam pretium ultricies neque. Cras sodales suscipit erat. In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices p</p>\n', 1, 0),
(8, 'ewrew', '3324', '42', 'werewr', '1', '07/26/2011', 410, 1100, 0, 'image004-1312109778.gif', '', 2, 1, 0, '2011-07-31', 0, '2011-10-03', '', 1, 0),
(9, '4565w', '21321', '41', 'testAuthor', '1', '07/28/2004', 222, 333, 2001, 'blackjack2-att-1313143324.jpg', 'Excerpt_9780801013997-1315047688.pdf', 2, 1, 0, '2011-07-31', 0, '2011-09-27', '<p>\n	Duis vel lacus ut ante lobortis tincidunt. Ut scelerisque imperdiet elit. Quisque facilisis feugiat est. Duis eget nulla. Aenean nisl lacus, tempus id, convallis in, vulputate vulputate, metus. Quisque condimentum aliquet nulla. Nullam dignissim dictum purus. Curabitur ullamcorper. Curabitur a dolor. Morbi tincidunt pede eu ante. Aliquam rhoncus, urna vitae semper pellentesque, lacus lorem tempus elit, sed scelerisque metus metus vel nisi. Aliquam fringilla ligula sed sapien. Phasellus imperdiet, tellus ac vulputate dictum, erat sapien gravida velit, non euismod odio tortor eget mauris. In hac habitasse platea dictumst. Sed urna tellus, mollis sit amet, ultrices et, adipiscing eget, nulla.</p>\n<p>\n	Cras accumsan lorem vitae lectus. Aliquam pretium ultricies neque. Cras sodales suscipit erat. In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices p</p>\n<p>\n	Duis vel lacus ut ante lobortis tincidunt. Ut scelerisque imperdiet elit. Quisque facilisis feugiat est. Duis eget nulla. Aenean nisl lacus, tempus id, convallis in, vulputate vulputate, metus. Quisque condimentum aliquet nulla. Nullam dignissim dictum purus. Curabitur ullamcorper. Curabitur a dolor. Morbi tincidunt pede eu ante. Aliquam rhoncus, urna vitae semper pellentesque, lacus lorem tempus elit, sed scelerisque metus metus vel nisi. Aliquam fringilla ligula sed sapien. Phasellus imperdiet, tellus ac vulputate dictum, erat sapien gravida velit, non euismod odio tortor eget mauris. In hac habitasse platea dictumst. Sed urna tellus, mollis sit amet, ultrices et, adipiscing eget, nulla.</p>\n<p>\n	Cras accumsan lorem vitae lectus. Aliquam pretium ultricies neque. Cras sodales suscipit erat. In hac habitasse platea dictumst. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices p</p>\n', 1, 4),
(10, 'rewr', '34234', '42', '23423', '--Please Select--', '08/09/2011', 234, 333, 100, 'android1-1312794243.gif', '', 0, 1, 0, '2011-08-08', 0, '2011-10-02', '<p>\n	serw rwe werwerwer werew</p>\n', 1, 0),
(17, 'Test21332', '256341', '38', 'Nooo', '1', '09/10/2007', 250, 300, 101, 'nocover.png', '', 2, 1, 0, '', 0, '2011-09-28', '<p>\n	Please tell us what you think and share your opinions with others. Be sure to focus your comments on the product.Please tell us what you think and share your opinions with others. Be sure to focus your comments on the product.Please tell us what you think and share your opinions with others. Be sure to focus your comments on the product.Please tell us what you think and share your opinions with others. Be sure to focus your comments on the product.</p>\n', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `book_catogery`
--

CREATE TABLE IF NOT EXISTS `book_catogery` (
  `CATOGERY_ID` int(5) NOT NULL AUTO_INCREMENT,
  `CATOGERY_NAME` varchar(20) NOT NULL,
  `STATUS` int(2) NOT NULL,
  `ADDED_BY` varchar(20) NOT NULL,
  `ADDED_DATE` varchar(20) NOT NULL,
  PRIMARY KEY (`CATOGERY_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `book_catogery`
--

INSERT INTO `book_catogery` (`CATOGERY_ID`, `CATOGERY_NAME`, `STATUS`, `ADDED_BY`, `ADDED_DATE`) VALUES
(42, 'adasdasd', 0, '', ''),
(41, 'Nice work', 0, '', ''),
(40, 'Testing123', 0, '', ''),
(49, 'ne wtest', 1, '', ''),
(38, 'firstOntest', 0, '', ''),
(37, 'tettss', 0, '', ''),
(36, 'testCatogery2', 0, '', ''),
(50, 'tESTTT', 1, '', ''),
(43, 'Novels', 0, '', ''),
(44, 'testnew', 0, '', ''),
(45, 'new cat', 0, '', ''),
(46, 'status chk', 1, '', ''),
(47, 'reload', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `CART_ID` int(10) NOT NULL,
  `CUS_ID` int(10) NOT NULL,
  `BOOK_ID` int(10) NOT NULL,
  `BOOK_NAME` varchar(50) NOT NULL,
  `IMAGE` varchar(100) NOT NULL,
  `QUANTITY` int(10) NOT NULL,
  `PRICE` int(10) NOT NULL,
  `TOTAL` int(10) NOT NULL,
  `ADDED_DATE` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `CART_ID`, `CUS_ID`, `BOOK_ID`, `BOOK_NAME`, `IMAGE`, `QUANTITY`, `PRICE`, `TOTAL`, `ADDED_DATE`) VALUES
(5, 0, 16, 8, 'ewrew', 'image004-1312109778.gif', 1, 1100, 1100, '2011-09-19'),
(2, 1, 16, 7, 'testt', '203482_112918762122021_2187988_n-1314941519.jpg', 1, 1250, 1250, '2011-09-09'),
(3, 1, 16, 3, 'eeew', '61_update_bjii-1310967592.jpg', 1, 0, 0, '2011-09-09'),
(6, 0, 16, 4, 'Senkala', 'gn0139-1314940955.jpg', 1, 1200, 1200, '2011-09-19'),
(7, 0, 16, 2, 'new book', '5 (1)-1310964964.jpg', 1, 680, 680, '2011-09-19'),
(8, 0, 16, 10, 'rewr', 'android1-1312794243.gif', 1, 333, 333, '2011-09-19'),
(9, 4, 16, 8, 'ewrew', 'image004-1312109778.gif', 1, 1100, 1100, '2011-09-19'),
(10, 4, 16, 4, 'Senkala', 'gn0139-1314940955.jpg', 1, 1200, 1200, '2011-09-19'),
(11, 4, 16, 2, 'new book', '5 (1)-1310964964.jpg', 1, 680, 680, '2011-09-19'),
(12, 4, 16, 10, 'rewr', 'android1-1312794243.gif', 1, 333, 333, '2011-09-19'),
(13, 4, 16, 3, 'eeew', '61_update_bjii-1310967592.jpg', 1, 0, 0, '2011-09-19'),
(14, 4, 16, 3, 'eeew', '61_update_bjii-1310967592.jpg', 1, 0, 0, '2011-09-19'),
(15, 4, 16, 10, 'rewr', 'android1-1312794243.gif', 1, 333, 333, '2011-09-19'),
(16, 5, 16, 8, 'ewrew', 'image004-1312109778.gif', 2, 1100, 2200, '2011-09-19'),
(17, 5, 16, 9, '4565w', 'blackjack2-att-1313143324.jpg', 1, 333, 333, '2011-09-19'),
(18, 7, 16, 8, 'ewrew', 'image004-1312109778.gif', 1, 1100, 1100, '2011-09-19'),
(19, 12, 16, 10, 'rewr', 'android1-1312794243.gif', 2, 333, 666, '2011-09-19'),
(20, 12, 16, 7, 'testt', '203482_112918762122021_2187988_n-1314941519.jpg', 2, 1250, 2500, '2011-09-19'),
(21, 12, 16, 7, 'testt', '203482_112918762122021_2187988_n-1314941519.jpg', 1, 1250, 1250, '2011-09-19'),
(22, 13, 16, 2, 'new book', '5 (1)-1310964964.jpg', 1, 680, 680, '2011-09-19'),
(23, 13, 16, 8, 'ewrew', 'image004-1312109778.gif', 1, 1100, 1100, '2011-09-19'),
(24, 13, 16, 4, 'Senkala', 'gn0139-1314940955.jpg', 1, 1200, 1200, '2011-09-19'),
(25, 13, 16, 7, 'testt', '203482_112918762122021_2187988_n-1314941519.jpg', 1, 1250, 1250, '2011-09-19'),
(26, 13, 16, 7, 'testt', '203482_112918762122021_2187988_n-1314941519.jpg', 1, 1250, 1250, '2011-09-19'),
(27, 13, 16, 3, 'eeew', '61_update_bjii-1310967592.jpg', 1, 0, 0, '2011-09-19'),
(28, 13, 16, 17, 'Test21332', 'nocover.png', 2, 300, 600, '2011-09-21'),
(29, 13, 16, 9, '4565w', 'blackjack2-att-1313143324.jpg', 1, 333, 333, '2011-09-21'),
(30, 13, 16, 10, 'rewr', 'android1-1312794243.gif', 1, 333, 333, '2011-09-21'),
(31, 14, 16, 9, '4565w', 'blackjack2-att-1313143324.jpg', 2, 333, 666, '2011-09-21'),
(32, 14, 16, 3, 'eeew', '61_update_bjii-1310967592.jpg', 2, 0, 0, '2011-09-21'),
(33, 18, 16, 9, '4565w', 'blackjack2-att-1313143324.jpg', 1, 333, 333, '2011-09-22'),
(34, 18, 16, 3, 'eeew', '61_update_bjii-1310967592.jpg', 1, 0, 0, '2011-09-22'),
(35, 18, 16, 10, 'rewr', 'android1-1312794243.gif', 5, 333, 1665, '2011-09-22'),
(36, 18, 16, 7, 'testt', '203482_112918762122021_2187988_n-1314941519.jpg', 1, 1250, 1250, '2011-09-22'),
(37, 18, 16, 4, 'Senkala', 'gn0139-1314940955.jpg', 1, 1200, 1200, '2011-09-22'),
(38, 18, 16, 9, '4565w', 'blackjack2-att-1313143324.jpg', 1, 333, 333, '2011-09-22'),
(39, 18, 16, 9, '4565w', 'blackjack2-att-1313143324.jpg', 1, 333, 333, '2011-09-22'),
(40, 19, 16, 9, '4565w', 'blackjack2-att-1313143324.jpg', 1, 333, 333, '2011-09-22'),
(41, 20, 16, 9, '4565w', 'blackjack2-att-1313143324.jpg', 1, 333, 333, '2011-09-22'),
(42, 21, 16, 9, '4565w', 'blackjack2-att-1313143324.jpg', 1, 333, 333, '2011-09-22'),
(43, 22, 16, 8, 'ewrew', 'image004-1312109778.gif', 1, 1100, 1100, '2011-09-22'),
(44, 22, 16, 7, 'testt', '203482_112918762122021_2187988_n-1314941519.jpg', 1, 1250, 1250, '2011-09-22'),
(45, 23, 16, 3, 'eeew', '61_update_bjii-1310967592.jpg', 1, 0, 0, '2011-09-22'),
(46, 23, 16, 9, '4565w', 'blackjack2-att-1313143324.jpg', 1, 333, 333, '2011-09-22'),
(47, 24, 16, 9, '4565w', 'blackjack2-att-1313143324.jpg', 1, 333, 333, '2011-09-22'),
(48, 24, 16, 8, 'ewrew', 'image004-1312109778.gif', 1, 1100, 1100, '2011-09-22'),
(49, 25, 16, 9, '4565w', 'blackjack2-att-1313143324.jpg', 1, 333, 333, '2011-09-22'),
(50, 25, 16, 8, 'ewrew', 'image004-1312109778.gif', 1, 1100, 1100, '2011-09-22'),
(51, 26, 16, 6, 'New book', '8E1C0831-84E1-4CE5-85BD-3D6B8FAA2E98-1314940878.pn', 1, 891, 891, '2011-09-22'),
(52, 26, 16, 9, '4565w', 'blackjack2-att-1313143324.jpg', 1, 333, 333, '2011-09-22'),
(53, 26, 16, 8, 'ewrew', 'image004-1312109778.gif', 1, 1100, 1100, '2011-09-22'),
(54, 27, 16, 6, 'New book', '8E1C0831-84E1-4CE5-85BD-3D6B8FAA2E98-1314940878.png', 1, 891, 891, '2011-09-25'),
(55, 27, 16, 4, 'Senkala', 'gn0139-1314940955.jpg', 2, 1200, 2400, '2011-09-25'),
(56, 27, 16, 7, 'testt', '203482_112918762122021_2187988_n-1314941519.jpg', 1, 1250, 1250, '2011-09-25'),
(57, 28, 21, 8, 'ewrew', 'image004-1312109778.gif', 1, 1100, 1100, '2011-10-01'),
(58, 29, 27, 6, 'New book', '8E1C0831-84E1-4CE5-85BD-3D6B8FAA2E98-1314940878.png', 1, 300, 300, '2011-10-06'),
(59, 29, 27, 9, '4565w', 'blackjack2-att-1313143324.jpg', 1, 333, 333, '2011-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `CUS_ID` int(10) NOT NULL AUTO_INCREMENT,
  `F_NAME` varchar(50) NOT NULL,
  `L_NAME` varchar(50) NOT NULL,
  `CUS_STREET` varchar(50) NOT NULL,
  `CUS_CITY` varchar(50) NOT NULL,
  `CUS_PROVINCE` varchar(50) NOT NULL,
  `CUS_POSTCODE` varchar(50) NOT NULL,
  `CUS_COUNTRY` varchar(50) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `CUS_MAIL` varchar(50) NOT NULL,
  `CUS_PASWRD` varchar(100) NOT NULL,
  `CUS_TEL` int(10) NOT NULL,
  `CUS_MOBILE` int(10) NOT NULL,
  `CUS_SUBCRIPTION` int(11) NOT NULL,
  `STATUS` int(2) NOT NULL,
  `CUS_DES` varchar(100) NOT NULL,
  `CONF_CODE` varchar(50) NOT NULL,
  `ADDED_BY` varchar(20) NOT NULL,
  `ADDED_DATE` varchar(20) NOT NULL,
  `EDITED_BY` varchar(20) NOT NULL,
  `EDITED_DATE` varchar(20) NOT NULL,
  `CONFIRM_CODE_STATUS` int(2) NOT NULL,
  PRIMARY KEY (`CUS_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUS_ID`, `F_NAME`, `L_NAME`, `CUS_STREET`, `CUS_CITY`, `CUS_PROVINCE`, `CUS_POSTCODE`, `CUS_COUNTRY`, `DOB`, `CUS_MAIL`, `CUS_PASWRD`, `CUS_TEL`, `CUS_MOBILE`, `CUS_SUBCRIPTION`, `STATUS`, `CUS_DES`, `CONF_CODE`, `ADDED_BY`, `ADDED_DATE`, `EDITED_BY`, `EDITED_DATE`, `CONFIRM_CODE_STATUS`) VALUES
(9, 'nimal', 'nuwan', 'chiththam', 'dehiwala', 'western', '10500', 'Sri Lanka', '', 'nimalnuwan@gmail.com', '42b7b9de765f553e293309763a159f2b', 112555555, 771234567, 0, 0, 'new Customer', '', '', '2011-07-30', '', '', 1),
(8, '1232', '236', '232', '3232', '3232', '323', '', '', '232323@ssdf.lkl', 'c349ce50e6e7bb6ed6e0725e566bfa25', 232, 12323, 0, 1, '233', '', '', '2011-07-30', '', '', 1),
(27, 'Samithri', 'Kariyawasam', '', '', '', '', 'Sri Lanka', '01/13/1987', 'samithriasanga@gmail.com', 'fa7c16a11a43b06cc6d4e0d7b76053a8', 0, 0, 0, 1, '', 'R50PHdBR', '', '', '', '', 1),
(11, 'reterter', 'erter', 'tert', 'ertre', 'tert', 'ret', 'retrt', '', 'tertrtertt@dfgf.lk', '8a71530233254e16373d4a89b2de3099', 464565, 45645, 0, 0, 'fhfghfgh', '', '', '2011-07-30', '', '', 1),
(12, 'dfd', 'fgdf', 'gdfg', 'dfgd', 'fgdf', '435', '4354', '', '454354@xdg.lkj', '77d87b7714cefa517c9c99061a2e265b', 435345, 45345, 0, 0, 'fhghfhfgh', '', '', '2011-07-30', '', '', 1),
(13, 'werew', 'Weerasinghe', '236 ddddd', 'dfsdf', 'Other', '10500', 'Sri Lanka', '', 'mpmadhuranga@gmail.com', 'e5d626349b763bdabd10766da34df586', 772712318, 772712318, 0, 1, '', '', '', '2011-07-30', '', '', 1),
(16, 'Madhuranga', 'Weerasinghe', '236', 'colombo', 'western', '11500', '', '12/10/2010', 'mpmadhuranga@www.com', '33a53926f5e0036b1816e4fbbd75cbf7', 1234567892, 1234567895, 0, 1, '', '', '', '', '', '', 1),
(15, 'asd', 'ddd', '', '', '', '', '', '09/15/1992', 'mpmadhuranga@aol.com', '3e970e6518972b7ef91868304ea13c25', 0, 0, 0, 0, '', '', '', '', '', '', 0),
(23, 'werer', 'werwer', 'wer', 'ere', 'werer', '4234', '', '', 'dd2223@gnaia.lk', '5debcbc2715d54ace449aa01f019a951', 2147483647, 2147483647, 0, 1, 'asdasd', '', '', '2011-10-02', '', '', 1),
(22, 'werer', 'werwer', 'wer', 'ere', 'werer', '4234', '', '', 'dd222@gnaia.lk', '5296daf0d7895b47dc9fd8697a43a1bb', 2147483647, 2147483647, 0, 1, 'asdasd', '', '', '2011-10-02', '', '', 0),
(18, 'gf', 'dgdf', '', '', '', '', '', '09/14/2011', 'niluweer@gmail.com', '79d886010186eb60e3611cd4a5d0bcae', 0, 0, 0, 0, '', 'Lvtgnbvc', '', '', '', '', 0),
(24, 'ww', 'wee', '', '', '', '', '', '', 'mamamammam@jjsjss.com', '087cd0463d338ea25674b55d3eff0eae', 2147483647, 253698745, 0, 1, '', '', '', '2011-10-02', '', '', 1),
(21, 'Mad', 'Weer', '236', 'no City', 'western', '11234', 'Sri Lanka', '09/05/1978', 'mpmadhuranga2@aol.com', '35bed450ed9ac9fcb3f5f8d547873be9', 0, 0, 0, 1, '', '34BEN1Qm', '', '', '', '', 1),
(25, 'asdas', 'dasdasdsad', '', '', '', '', '', '', 'asdasdasasd@sdsdfsd.lkl', '30bd06051983deeefc9b3f6749a745e5', 0, 0, 0, 1, '', '', '', '2011-10-02', '', '', 1),
(26, 'Madhuranga', 'weerasinghe', '', '', '', '', '', '10/20/2011', 'mpmadhuranga3@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 0, 0, 0, 0, '', 'c4IvPpeE', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `BILL_ID` int(10) NOT NULL AUTO_INCREMENT,
  `AMOUNT` int(10) NOT NULL,
  `ADDED_DATE` varchar(20) NOT NULL,
  `ADDED_BY` varchar(10) NOT NULL,
  PRIMARY KEY (`BILL_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`BILL_ID`, `AMOUNT`, `ADDED_DATE`, `ADDED_BY`) VALUES
(36, 333, '2011-09-14', ''),
(2, 3544, '2011-08-26', ''),
(3, 2331, '2011-08-26', ''),
(4, 680, '2011-08-26', ''),
(5, 1880, '2011-08-26', ''),
(6, 1200, '2011-08-26', ''),
(7, 1200, '2011-08-26', ''),
(8, 2011, '2011-08-26', ''),
(9, 2011, '2011-08-26', ''),
(10, 4459, '2011-08-26', ''),
(11, 3444, '2011-08-26', ''),
(12, 333, '2011-08-26', ''),
(13, 891, '2011-08-26', ''),
(14, 4224, '2011-08-26', ''),
(15, 5137, '2011-08-26', ''),
(16, 5137, '2011-08-26', ''),
(17, 2980, '2011-08-26', ''),
(18, 1224, '2011-08-26', ''),
(19, 333, '2011-08-26', ''),
(20, 6582, '2011-08-27', ''),
(21, 13448, '2011-08-27', ''),
(22, 9924, '2011-08-27', ''),
(23, 1250, '2011-08-27', ''),
(24, 4566, '2011-08-27', ''),
(25, 125, '2011-08-27', ''),
(26, 4790, '2011-08-28', ''),
(27, 1013, '2011-08-28', ''),
(28, 891, '2011-08-28', ''),
(29, 3676, '2011-09-03', '1'),
(30, 3341, '2011-09-13', ''),
(40, 333, '2011-09-14', ''),
(39, 333, '2011-09-14', ''),
(38, 333, '2011-09-14', ''),
(37, 333, '2011-09-14', ''),
(41, 333, '2011-09-14', ''),
(42, 333, '2011-09-14', ''),
(43, 666, '2011-09-21', ''),
(44, 666, '2011-09-21', ''),
(45, 1266, '2011-09-22', ''),
(46, 1100, '2011-09-22', ''),
(47, 1100, '2011-10-01', ''),
(48, 360333, '2011-10-03', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `INVOICE_ID` int(10) NOT NULL AUTO_INCREMENT,
  `PROD_ID` int(10) NOT NULL,
  `PROD_TYPE` int(10) NOT NULL,
  `SUP_ID` int(10) NOT NULL,
  `QUANTITY` int(10) NOT NULL,
  `PRICE` int(10) NOT NULL,
  `MESSAGE_ADMIN` varchar(100) NOT NULL,
  `MESSAGE_SUP` varchar(100) NOT NULL,
  `ADDED_DATE` varchar(20) NOT NULL,
  `EDITED_DATE` int(11) NOT NULL,
  `STATUS` int(11) NOT NULL,
  PRIMARY KEY (`INVOICE_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`INVOICE_ID`, `PROD_ID`, `PROD_TYPE`, `SUP_ID`, `QUANTITY`, `PRICE`, `MESSAGE_ADMIN`, `MESSAGE_SUP`, `ADDED_DATE`, `EDITED_DATE`, `STATUS`) VALUES
(1, 3, 1, 2, 20, 100, 'wedeesdf', '', '2011-10-05', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CUS_ID` int(10) NOT NULL,
  `CUS_NAME` varchar(50) NOT NULL,
  `SHIP_TYPE` varchar(50) NOT NULL,
  `ORDER_TOTAL` int(10) NOT NULL,
  `SHIP_STREET` varchar(50) NOT NULL,
  `SHIP_CITY` varchar(50) NOT NULL,
  `SHIP_PROVINCE` varchar(50) NOT NULL,
  `SHIP_POSTCODE` varchar(50) NOT NULL,
  `SHIP_COUNTRY` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(100) NOT NULL,
  `ADDED_DATE` varchar(11) NOT NULL,
  `STATUS` int(2) NOT NULL,
  `ADMIN_MSG` varchar(100) NOT NULL,
  `EDITED_DATE` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `CUS_ID`, `CUS_NAME`, `SHIP_TYPE`, `ORDER_TOTAL`, `SHIP_STREET`, `SHIP_CITY`, `SHIP_PROVINCE`, `SHIP_POSTCODE`, `SHIP_COUNTRY`, `DESCRIPTION`, `ADDED_DATE`, `STATUS`, `ADMIN_MSG`, `EDITED_DATE`) VALUES
(23, 16, 'Madhuranga Weerasinghe', 'Store pickup', 1200, '236', 'colombo', 'western', '11500', 'Sri Lanka', 'none', '2011-09-22', 0, '', ''),
(2, 16, 'Madhuranga Weerasinghe', 'Store pickup', 1433, '236', 'colombo', 'western', '11500', 'Sri Lanka', 'none', '2011-09-11', 1, 'sdfsdf gererre', '2011-09-14'),
(22, 16, 'Madhuranga Weerasinghe', 'Store pickup', 1100, '236', 'colombo', 'western', '11500', 'Sri Lanka', 'none', '2011-09-22', 1, '', '2011-09-22'),
(19, 16, 'Madhuranga Weerasinghe', 'Store pickup', 333, '236', 'colombo', 'western', '11500', 'Sri Lanka', 'none', '2011-09-22', 0, '', ''),
(18, 16, 'Madhuranga Weerasinghe', 'Store pickup', 333, '236', 'colombo', 'western', '11500', 'Sri Lanka', 'none', '2011-09-22', 0, '', ''),
(20, 16, 'Madhuranga Weerasinghe', 'Store pickup', 333, '236', 'colombo', 'western', '11500', 'Sri Lanka', 'none', '2011-09-22', 0, '', ''),
(10, 16, 'Madhuranga Weerasinghe', 'Store pickup', 1266, '', '', '', '', 'Sri Lanka', 'none', '2011-09-19', 0, '', ''),
(13, 16, 'Madhuranga Weerasinghe', 'Free Shipping', 1266, '236 ', 'colombo', 'wesyern', '10500', 'Sri Lanka', 'all done', '2011-09-19', 1, '', '2011-09-22'),
(14, 16, 'Madhuranga Weerasinghe', 'Store pickup', 666, '236', 'colombo', 'western', '11500', 'Sri Lanka', 'none', '2011-09-21', 1, '', ''),
(24, 16, 'Madhuranga Weerasinghe', 'Store pickup', 333, '236', 'colombo', 'western', '11500', 'Sri Lanka', 'none', '2011-09-22', 0, 'n onoo', '2011-09-27'),
(25, 16, 'Madhuranga Weerasinghe', 'Store pickup', 1433, '236', 'colombo', 'western', '11500', 'Sri Lanka', 'none', '2011-09-22', 0, '', ''),
(26, 16, 'Madhuranga Weerasinghe', 'Store pickup', 2324, '236', 'colombo', 'western', '11500', 'Sri Lanka', 'none', '2011-09-22', 0, '', ''),
(27, 16, 'Madhuranga Weerasinghe', 'Free Shipping', 4541, '236g', 'colombo', 'western', '11500', 'Sri Lanka', 'nonefhghgfh', '2011-09-25', 0, '', ''),
(28, 21, 'Mad Weer', 'Store pickup', 1100, '236', 'no City', 'western', '11234', 'Sri Lanka', 'none', '2011-10-01', 1, '', '2011-10-01'),
(29, 27, 'Samithri Kariyawasam', 'Store pickup', 633, '', '', '', '', 'Sri Lanka', 'none', '2011-10-06', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `PROD_ID` int(10) NOT NULL AUTO_INCREMENT,
  `PROD_NAME` varchar(50) NOT NULL,
  `PROD_TYPE` int(10) NOT NULL,
  `SUB_PROD_TYPE` int(10) NOT NULL,
  `PROD_QUANTITY` int(20) NOT NULL,
  `SUP_ID` int(10) NOT NULL,
  `PURCHASE_PRICE` int(20) NOT NULL,
  `SELL_PRICE` int(20) NOT NULL,
  `PROD_DESC` text NOT NULL,
  `PROD_PIC` varchar(100) NOT NULL,
  `STATUS` int(1) NOT NULL,
  `ADDED_BY` varchar(20) NOT NULL,
  `ADDED_DATE` varchar(20) NOT NULL,
  `EDITED_BY` varchar(20) NOT NULL,
  `EDITED_DATE` varchar(20) NOT NULL,
  `ITEM_TYPE` int(2) NOT NULL DEFAULT '2',
  PRIMARY KEY (`PROD_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PROD_ID`, `PROD_NAME`, `PROD_TYPE`, `SUB_PROD_TYPE`, `PROD_QUANTITY`, `SUP_ID`, `PURCHASE_PRICE`, `SELL_PRICE`, `PROD_DESC`, `PROD_PIC`, `STATUS`, `ADDED_BY`, `ADDED_DATE`, `EDITED_BY`, `EDITED_DATE`, `ITEM_TYPE`) VALUES
(2, 'test7', 5, 10, 1, 2, 1205, 2011, '', 'IFWTBIG-5-1312991139.jpg', 0, '', '2011-08-10', '', '2011-10-03', 2),
(5, 'Atlas', 8, 11, 5, 1, 10, 25, '<p>\n	nonee</p>\n', '49272015841497872867-1314450527.jpg', 1, '', '2011-08-27', '', '', 2),
(6, 'gfgfg', 2, 2, 0, 2, 0, 0, '', '', 1, '', '2011-09-22', '', '', 2),
(7, 'ertrt', 2, 2, 0, 1, 0, 0, '', '', 1, '', '2011-10-03', '', '', 2),
(8, 'sdfdf', 0, 0, 32, 0, 23, 232, '', '', 1, '', '2011-10-03', '', '', 2),
(9, 'sdfsdf', 2, 0, 343, 0, 234, 34, '', '', 1, '', '2011-10-03', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `prod_catogery`
--

CREATE TABLE IF NOT EXISTS `prod_catogery` (
  `CATOGERY_ID` int(5) NOT NULL AUTO_INCREMENT,
  `CATOGERY_NAME` varchar(20) NOT NULL,
  `STATUS` int(2) NOT NULL,
  `ADDED_BY` varchar(20) NOT NULL,
  `ADDED_DATE` varchar(20) NOT NULL,
  PRIMARY KEY (`CATOGERY_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `prod_catogery`
--

INSERT INTO `prod_catogery` (`CATOGERY_ID`, `CATOGERY_NAME`, `STATUS`, `ADDED_BY`, `ADDED_DATE`) VALUES
(1, 'test1d', 1, '', ''),
(2, 'TEST2', 1, '', ''),
(3, 'Tes3', 1, '', ''),
(6, 'TESTEDIT', 0, '', ''),
(5, 'test4', 0, '', ''),
(7, 'Pencils', 0, '', ''),
(8, 'Books', 0, '', ''),
(9, 'Files', 0, '', ''),
(10, 'Clips', 0, '', ''),
(11, 'Pens', 0, '', ''),
(12, 'Bats', 0, '', ''),
(13, 'Envelope', 0, '', ''),
(16, 'Wallpapers', 0, '', ''),
(15, 'Pencil Boxes', 0, '', ''),
(17, 'Sheets', 0, '', ''),
(18, 'test este etet testt', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `prod_sub_catogery`
--

CREATE TABLE IF NOT EXISTS `prod_sub_catogery` (
  `SUB_CATOGERY_ID` int(5) NOT NULL AUTO_INCREMENT,
  `CATOGERY_ID` int(10) NOT NULL,
  `SUB_CATOGERY_NAME` varchar(20) NOT NULL,
  `STATUS` int(2) NOT NULL,
  `ADDED_BY` varchar(20) NOT NULL,
  `ADDED_DATE` varchar(20) NOT NULL,
  PRIMARY KEY (`SUB_CATOGERY_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `prod_sub_catogery`
--

INSERT INTO `prod_sub_catogery` (`SUB_CATOGERY_ID`, `CATOGERY_ID`, `SUB_CATOGERY_NAME`, `STATUS`, `ADDED_BY`, `ADDED_DATE`) VALUES
(9, 3, 'Testing Progressz', 0, '', ''),
(2, 2, 'erwffs', 0, '', ''),
(3, 2, '123wfs', 1, '', ''),
(10, 5, 'nw??', 0, '', ''),
(8, 6, 'testBookzq', 0, '', ''),
(11, 8, '40 pages', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE IF NOT EXISTS `publishers` (
  `PUB_ID` int(10) NOT NULL AUTO_INCREMENT,
  `PUB_NAME` varchar(50) NOT NULL,
  `ADD_DATE` varchar(10) NOT NULL,
  `ADD_BY` int(10) NOT NULL,
  `EDITED_BY` varchar(20) NOT NULL,
  `EDITED_DATE` varchar(20) NOT NULL,
  PRIMARY KEY (`PUB_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`PUB_ID`, `PUB_NAME`, `ADD_DATE`, `ADD_BY`, `EDITED_BY`, `EDITED_DATE`) VALUES
(1, 'Beatle', '', 0, '', ''),
(5, 'King Fish', '', 0, '', ''),
(7, 'Gunasena', '', 0, '', ''),
(8, 'sarasavi', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `review_books`
--

CREATE TABLE IF NOT EXISTS `review_books` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `CUS_ID` int(10) NOT NULL,
  `BOOK_ID` int(10) NOT NULL,
  `COMMNT` varchar(200) NOT NULL,
  `STAR` int(10) NOT NULL,
  `ADDED_DATE` varchar(20) NOT NULL,
  `STATUS` int(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `review_books`
--

INSERT INTO `review_books` (`ID`, `CUS_ID`, `BOOK_ID`, `COMMNT`, `STAR`, `ADDED_DATE`, `STATUS`) VALUES
(1, 16, 4, 'sddsfsdf', 5, '2011-09-28', 0),
(14, 16, 4, 'sddsfsdf', 5, '2011-09-28', 0),
(13, 16, 4, 'sddsfsdf', 5, '2011-09-28', 0),
(15, 16, 4, 'sddsfsdf', 5, '2011-09-28', 1),
(16, 16, 4, 'sddsfsdfasds', 5, '2011-09-28', 0),
(18, 16, 4, 'sddsfsdfasds', 5, '2011-09-28', 0),
(20, 16, 4, 'sddsfsdfasds', 5, '2011-09-28', 1),
(21, 16, 9, 'great product..', 4, '2011-09-28', 1),
(22, 16, 17, 'great work', 5, '2011-09-28', 0),
(23, 16, 4, 'great bookz', 4, '2011-09-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `search_keys`
--

CREATE TABLE IF NOT EXISTS `search_keys` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `SEARCH_WORD` varchar(50) NOT NULL,
  `ADDED_DATE` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `search_keys`
--

INSERT INTO `search_keys` (`ID`, `SEARCH_WORD`, `ADDED_DATE`) VALUES
(1, 'wwwwwww', '2011-09-29'),
(2, 'hytrrr', '2011-09-29'),
(10, 'hytrrr', ''),
(9, 'ferere', '2011-10-01'),
(8, 'ferere', '2011-10-01'),
(11, 'hytrrr', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `SUP_ID` int(50) NOT NULL AUTO_INCREMENT,
  `SUP_TYPE` varchar(20) NOT NULL,
  `SUP_COM_NAME` varchar(50) NOT NULL,
  `SUP_COM_STREET` varchar(50) NOT NULL,
  `SUP_COM_CITY` varchar(50) NOT NULL,
  `SUP_COM_PROVINCE` varchar(50) NOT NULL,
  `SUP_COM_POSTCODE` varchar(50) NOT NULL,
  `SUP_COM_COUNTRY` varchar(50) NOT NULL,
  `SUP_COM_TEL` int(15) NOT NULL,
  `SUP_COM_EMAIL` varchar(50) NOT NULL,
  `SUP_COM_WEBSITE` varchar(50) NOT NULL,
  `SUP_CON_NAME` varchar(50) NOT NULL,
  `SUP_CON_EMAIL` varchar(50) NOT NULL,
  `SUP_CON_MOBILE` int(15) NOT NULL,
  `SUP_DET` varchar(100) NOT NULL,
  `SUP_PASSWORD` varchar(100) NOT NULL,
  `STATUS` int(2) NOT NULL,
  `ADDED_BY` varchar(20) NOT NULL,
  `ADDED_DATE` varchar(20) NOT NULL,
  `EDITED_BY` varchar(20) NOT NULL,
  `EDITED_DATE` varchar(20) NOT NULL,
  PRIMARY KEY (`SUP_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SUP_ID`, `SUP_TYPE`, `SUP_COM_NAME`, `SUP_COM_STREET`, `SUP_COM_CITY`, `SUP_COM_PROVINCE`, `SUP_COM_POSTCODE`, `SUP_COM_COUNTRY`, `SUP_COM_TEL`, `SUP_COM_EMAIL`, `SUP_COM_WEBSITE`, `SUP_CON_NAME`, `SUP_CON_EMAIL`, `SUP_CON_MOBILE`, `SUP_DET`, `SUP_PASSWORD`, `STATUS`, `ADDED_BY`, `ADDED_DATE`, `EDITED_BY`, `EDITED_DATE`) VALUES
(1, '2', 'test', 'TEST', 'test', 'test', '1234', 'TEST', 123456789, 'MPMA@m', 'WWW.EST.LK', 'ytytryty', 'testmail@test.lk', 1222222222, '', '', 0, '', '', '', '2011-10-02'),
(2, '', 'test123', 'TEST', 'test', 'test', '1234', 'TEST', 123456789, 'MPMA@m', 'WWW.EST.LK', 'testperson', 'testmail@test.lk', 1222222222, '', '', 1, '', '', '', '2011-08-15'),
(5, '', 'qwew', 'ewqew', 'ewew', 'wewe', 'wew', 'wewe', 1234567890, 'wewqwew@fsd.lk', '', 'sddf', 'wewqwew@fsd.lk', 1234567892, 'ertertrt', '', 1, '', '2011-10-02', '', ''),
(4, '', 'testtt', 'ew', 'ewe', 'wew', 'w', 'ewew', 12346, 'wew@dfdf.lk', 'sdf', 'asdsd', 'sssasd@sdfs.lk', 3545, '', '', 1, '', '2011-08-14', '', '2011-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `temp_bill`
--

CREATE TABLE IF NOT EXISTS `temp_bill` (
  `TEMP_BILL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ITEM_ID` int(10) NOT NULL,
  `ITEM_TYPE` int(2) NOT NULL,
  `ITEM_NAME` varchar(50) NOT NULL,
  `PRICE` int(10) NOT NULL,
  `QTY` int(10) NOT NULL,
  `TOTAL` int(10) NOT NULL,
  PRIMARY KEY (`TEMP_BILL_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_cart`
--

CREATE TABLE IF NOT EXISTS `temp_cart` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `SESSION_ID` varchar(100) NOT NULL,
  `CUS_ID` int(10) NOT NULL,
  `BOOK_ID` int(10) NOT NULL,
  `BOOK_NAME` varchar(100) NOT NULL,
  `IMAGE` varchar(200) NOT NULL,
  `QUANTITY` int(10) NOT NULL,
  `PRICE` int(10) NOT NULL,
  `TOTAL` int(10) NOT NULL,
  `ADDED_DATE` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `temp_cart`
--

INSERT INTO `temp_cart` (`ID`, `SESSION_ID`, `CUS_ID`, `BOOK_ID`, `BOOK_NAME`, `IMAGE`, `QUANTITY`, `PRICE`, `TOTAL`, `ADDED_DATE`) VALUES
(58, '0', 16, 6, 'New book', '8E1C0831-84E1-4CE5-85BD-3D6B8FAA2E98-1314940878.png', 1, 891, 300, '2011-09-29'),
(61, '0', 16, 4, 'Senkala', 'gn0139-1314940955.jpg', 1, 1200, 1200, '2011-09-29'),
(60, '0', 16, 7, 'testt', '203482_112918762122021_2187988_n-1314941519.jpg', 1, 1250, 1250, '2011-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `user_count`
--

CREATE TABLE IF NOT EXISTS `user_count` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `COUNT` int(20) NOT NULL,
  `DATE` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_count`
--

INSERT INTO `user_count` (`ID`, `COUNT`, `DATE`) VALUES
(1, 1, '2011-10-01'),
(2, 1, '2011-10-02'),
(3, 1, '2011-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE IF NOT EXISTS `wish_list` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `CUS_ID` int(10) NOT NULL,
  `BOOK_ID` int(10) NOT NULL,
  `COMMENT` varchar(100) NOT NULL,
  `ADDED_DATE` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`ID`, `CUS_ID`, `BOOK_ID`, `COMMENT`, `ADDED_DATE`) VALUES
(1, 16, 6, 'okzzsas', '2011-09-25'),
(6, 21, 9, 'great book', '2011-09-30'),
(4, 16, 4, ' cxcvsdfdfcd', '2011-09-25'),
(2, 16, 3, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2017 at 02:22 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mc_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE IF NOT EXISTS `admin_menu` (
  `AdminMenuID` int(20) NOT NULL AUTO_INCREMENT,
  `MenuName` varchar(255) DEFAULT NULL,
  `ParentID` varchar(255) DEFAULT '0',
  `ShowInNav` tinyint(1) NOT NULL,
  `IconClassName` text,
  `DisplayOrder` int(11) NOT NULL,
  `FeatureID` varchar(255) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  PRIMARY KEY (`AdminMenuID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`AdminMenuID`, `MenuName`, `ParentID`, `ShowInNav`, `IconClassName`, `DisplayOrder`, `FeatureID`, `Status`) VALUES
(2, 'Dashboard', '0', 1, 'mdi-action-dashboard', 0, '2', 1),
(4, 'Cms', '0', 1, 'mdi-device-now-widgets', 1, '5', 1),
(5, 'Pages', '4', 1, 'sss', 0, '5', 1),
(6, 'Manage Qp', '4', 1, 'ssss', 1, '7', 1),
(7, 'Role Managment', '0', 1, 'mdi-action-dashboard', 2, '14', 1),
(10, 'All Roles', '7', 1, 'sssss', 1, '14', 1),
(11, 'Add Role', '7', 1, 'sss', 0, '15', 1),
(12, 'Users', '0', 1, 'mdi-action-account-circle', 3, '3', 1),
(13, 'All Users', '12', 1, 'nill', 0, '3', 1),
(14, 'Add User', '12', 1, 'nill', 1, '4', 1),
(15, 'Administration', '0', 1, 'mdi-action-perm-data-setting', 4, '8', 1),
(16, 'All Menus', '15', 1, '', 0, '11', 1),
(17, 'Add Menu Item', '15', 1, '', 1, '19', 1),
(18, 'Features', '15', 1, '', 2, '22', 1),
(19, 'Add Feature', '15', 1, '', 3, '23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

DROP TABLE IF EXISTS `attribute`;
CREATE TABLE IF NOT EXISTS `attribute` (
  `AttributeID` int(20) DEFAULT NULL,
  `AttributeGroupID` int(20) DEFAULT NULL,
  `SortOrder` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_description`
--

DROP TABLE IF EXISTS `attribute_description`;
CREATE TABLE IF NOT EXISTS `attribute_description` (
  `AttributeID` int(20) DEFAULT NULL,
  `LanguageID` int(20) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_group`
--

DROP TABLE IF EXISTS `attribute_group`;
CREATE TABLE IF NOT EXISTS `attribute_group` (
  `AttributeGroupID` int(20) NOT NULL AUTO_INCREMENT,
  `SortOrder` int(5) DEFAULT NULL,
  PRIMARY KEY (`AttributeGroupID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_group_description`
--

DROP TABLE IF EXISTS `attribute_group_description`;
CREATE TABLE IF NOT EXISTS `attribute_group_description` (
  `AttributeGroupID` int(20) DEFAULT NULL,
  `LanguageID` int(20) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` int(20) NOT NULL AUTO_INCREMENT,
  `Image` varchar(255) DEFAULT NULL,
  `ParentID` int(20) DEFAULT NULL,
  `Top` tinyint(3) DEFAULT NULL,
  `Column` int(5) DEFAULT NULL,
  `SortOrder` int(5) DEFAULT NULL,
  `Status` tinyint(3) DEFAULT NULL,
  `DateAdded` datetime DEFAULT NULL,
  `DateModified` datetime DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category_description`
--

DROP TABLE IF EXISTS `category_description`;
CREATE TABLE IF NOT EXISTS `category_description` (
  `CategoryID` int(20) DEFAULT NULL,
  `LanguageID` int(20) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` mediumtext,
  `MetaKeyWord` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contentsections`
--

DROP TABLE IF EXISTS `contentsections`;
CREATE TABLE IF NOT EXISTS `contentsections` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ContentSectionName` varchar(100) DEFAULT NULL,
  `Content` longtext,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contentzone`
--

DROP TABLE IF EXISTS `contentzone`;
CREATE TABLE IF NOT EXISTS `contentzone` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ZoneName` varchar(100) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

DROP TABLE IF EXISTS `download`;
CREATE TABLE IF NOT EXISTS `download` (
  `DownloadID` bigint(20) NOT NULL AUTO_INCREMENT,
  `FileName` varchar(128) DEFAULT NULL,
  `Mask` varchar(128) DEFAULT NULL,
  `Remaining` int(11) DEFAULT NULL,
  `DateAdded` datetime DEFAULT NULL,
  PRIMARY KEY (`DownloadID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `download_description`
--

DROP TABLE IF EXISTS `download_description`;
CREATE TABLE IF NOT EXISTS `download_description` (
  `DownloadID` bigint(20) DEFAULT NULL,
  `LanguageID` int(20) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

DROP TABLE IF EXISTS `feature`;
CREATE TABLE IF NOT EXISTS `feature` (
  `FeatureID` int(20) NOT NULL AUTO_INCREMENT,
  `FeatureName` varchar(255) NOT NULL,
  `FeatureDescription` text,
  `UrlLink` varchar(255) DEFAULT NULL,
  `DisplayOrder` varchar(255) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`FeatureID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`FeatureID`, `FeatureName`, `FeatureDescription`, `UrlLink`, `DisplayOrder`, `Status`) VALUES
(2, 'Dashboard', 'This is dashboard feature.', 'admin/dashboard', '0', 0),
(3, 'Users', 'Users Feature , listing/Deleting/editing users information', 'admin/users', NULL, 1),
(4, 'Add User', 'This feature is for Admin Add user', 'admin/users/new_record', NULL, 1),
(5, 'Cms', 'This Feature is for admin to manage cms pages.', 'admin/cmspage', NULL, 1),
(6, 'Home Page Section', 'sdasd', 'admin/homepagesection', NULL, 1),
(7, 'Manage Qoute Page', 'sdasd', 'admin/manageqoute/page', NULL, 1),
(8, 'Administration', 'ssadasdasd', 'admin', NULL, 1),
(9, 'General Setting', 'sadasd', 'admin/generalsetting', NULL, 1),
(10, 'Edit Profile', 'asdasd', 'admin/editprofile', NULL, 1),
(11, 'Menu', 'Create update delete admin menu', 'admin/adminmenu', NULL, 1),
(12, 'Edit User', 'Edit User details', 'admin/users/edit_record/', NULL, 1),
(13, 'Delete User', 'Admin User delete Feature ', 'admin/users/delete', NULL, 1),
(14, 'Role', 'Role Management for System Users', 'admin/role', NULL, 1),
(15, 'Add Role', 'Add new user role', 'admin/role/new_record', NULL, 1),
(16, 'Edit Role', 'Edit system user role', 'admin/role/edit_record/', NULL, 1),
(17, 'Delete Role', 'Delete system Role', 'admin/role/delete', NULL, 1),
(18, 'Administration', 'Administration controls menus/features etc', 'Administration', NULL, 1),
(19, 'Add Menu Item', 'Add new admin menu', 'admin/adminmenu/new_record', NULL, 1),
(20, 'Edit Menu', 'Edit admin menu record', 'admin/adminmenu/edit_record/', NULL, 1),
(21, 'Delete Menu', 'Delete admin menu record', 'admin/adminmenu/delete', NULL, 1),
(22, 'Feature', 'Admin features', 'admin/feature', NULL, 1),
(23, 'Add Feature', 'Admin to add new feature', 'admin/feature/new_record', NULL, 1),
(24, 'Edit Feature', 'Admin Edit Feature', 'admin/feature/edit_record/', NULL, 1),
(25, 'Delete Feature', 'Admin feature to delete feature', 'admin/feature/delete', NULL, 1),
(26, 'Admin Cms Pages', 'This Feature is for admin to manage cms pages.', 'admin/cmspage', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `length_class`
--

DROP TABLE IF EXISTS `length_class`;
CREATE TABLE IF NOT EXISTS `length_class` (
  `LenghtClassID` int(20) NOT NULL AUTO_INCREMENT,
  `Value` decimal(15,8) DEFAULT NULL,
  PRIMARY KEY (`LenghtClassID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

DROP TABLE IF EXISTS `option`;
CREATE TABLE IF NOT EXISTS `option` (
  `OptionID` int(20) NOT NULL AUTO_INCREMENT,
  `Type` varchar(50) DEFAULT NULL,
  `SortOrder` int(3) DEFAULT NULL,
  PRIMARY KEY (`OptionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `ID` bigint(20) NOT NULL,
  `OptionName` varchar(100) DEFAULT NULL,
  `OptionValue` longtext,
  `Autoload` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `option_description`
--

DROP TABLE IF EXISTS `option_description`;
CREATE TABLE IF NOT EXISTS `option_description` (
  `OptionID` int(20) NOT NULL,
  `LanguageID` int(20) DEFAULT NULL,
  `Name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`OptionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `option_value`
--

DROP TABLE IF EXISTS `option_value`;
CREATE TABLE IF NOT EXISTS `option_value` (
  `OptionValueID` int(20) NOT NULL AUTO_INCREMENT,
  `OptionID` int(20) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `SortOrder` int(5) DEFAULT NULL,
  PRIMARY KEY (`OptionValueID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `option_value_description`
--

DROP TABLE IF EXISTS `option_value_description`;
CREATE TABLE IF NOT EXISTS `option_value_description` (
  `OptionValueID` int(20) NOT NULL AUTO_INCREMENT,
  `LanguageID` int(20) DEFAULT NULL,
  `OptionID` int(20) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `option_value_descriptioncol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`OptionValueID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pagetemplate`
--

DROP TABLE IF EXISTS `pagetemplate`;
CREATE TABLE IF NOT EXISTS `pagetemplate` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `PageTamplateName` varchar(100) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `Type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `PermissionID` int(20) NOT NULL AUTO_INCREMENT,
  `PermissionName` varchar(255) NOT NULL,
  PRIMARY KEY (`PermissionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`PermissionID`, `PermissionName`) VALUES
(1, 'Edit'),
(2, 'Add');

-- --------------------------------------------------------

--
-- Table structure for table `postdata`
--

DROP TABLE IF EXISTS `postdata`;
CREATE TABLE IF NOT EXISTS `postdata` (
  `ID` bigint(22) NOT NULL AUTO_INCREMENT,
  `PostID` bigint(22) NOT NULL,
  `Key` varchar(255) NOT NULL,
  `KeyType` varchar(255) NOT NULL,
  `Value` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `postdata`
--

INSERT INTO `postdata` (`ID`, `PostID`, `Key`, `KeyType`, `Value`) VALUES
(3, 16, 'custom-content-1', 'post_custom_content', 'asdasdasdasdasdasdasdasdasdasdasdasd'),
(4, 17, 'custom-content-2', 'post_custom_content', 'Content ContentContentContentContentContentContent'),
(5, 14, 'custom-content-2', 'post_custom_content', 'dasdasd'),
(13, 27, 'custom-content-1', 'post_custom_content', 'Existed Bingo'),
(14, 28, 'Chalie new Bingo Custom Content Field', 'post_custom_content', 'Custom Content Field Content'),
(15, 29, 'Chalie new Bingo Custom Content Field', 'post_custom_content', 'sdasdasddsad'),
(16, 30, 'Chalie new Bingo Custom Content Field', 'post_custom_content', 'Existed Bingo 1'),
(44, 40, 'asdasdasdasd', 'post_custom_content', 'ccffff'),
(45, 40, 'ssss', 'post_custom_content', 'ssss'),
(57, 40, 'vhiii', 'post_custom_content', 'bingo'),
(59, 40, 'sadasd', 'post_custom_content', 'asdasd'),
(68, 40, 'ggg', 'post_custom_content', 'ggggggg'),
(69, 40, 'asdasdasdasdads', 'post_custom_content', 'sdasd'),
(70, 40, 'sdasdasdasd', 'post_custom_content', 'asdasd'),
(71, 40, 'row', 'post_custom_content', 'sdsdsd'),
(72, 40, 'key', 'post_custom_content', 'sadasdasd'),
(73, 40, 'asdasd', 'post_custom_content', 'asdasdasd'),
(74, 40, 'asdasdasd', 'post_custom_content', 'asdasd'),
(82, 40, 'sadasdasdasd', 'post_custom_content', 'asdasdasdasdasdasd'),
(83, 40, 'sdfsdf', 'post_custom_content', 'sdfsdfsdfsdf'),
(84, 40, 'sdfsdf', 'post_custom_content', 'sdfsdf'),
(85, 40, 'sdasd', 'post_custom_content', 'asdasd'),
(86, 40, 'ssss', 'post_custom_content', 'ssssssssss'),
(87, 40, 'ssss', 'post_custom_content', 'sssssssss'),
(88, 40, 'sadasd', 'post_custom_content', 'asdasd'),
(97, 41, 'fffff', 'post_custom_content', ''),
(98, 41, 'fffffffffff', 'post_custom_content', ''),
(102, 42, 'ffff', 'post_custom_content', 'fffffff'),
(103, 42, 'Charlie', 'post_custom_content', ''),
(104, 42, 'fffffff', 'post_custom_content', 'vvvvv'),
(105, 42, 'sdsdsd', 'post_custom_content', 'sdasd'),
(106, 42, 'vvvvvvvvvv', 'post_custom_content', 'vvvvvvvvvvvvvv'),
(107, 42, 'asdasdasd', 'post_custom_content', 'dsdasd'),
(108, 42, 'sdsadsad', 'post_custom_content', 'sdasdasdasdasdadasd'),
(109, 42, 'sssss', 'post_custom_content', 'sfvf'),
(110, 42, 'sssssss', 'post_custom_content', 'vvvvcdcdcdcdc'),
(111, 43, 'dddd', 'post_custom_content', 'dddddddd'),
(112, 43, 'dsdsdsd', 'post_custom_content', 'sdsdsdsdsd'),
(113, 43, 'gbbb', 'post_custom_content', 'ggggg'),
(114, 43, 'sadasdasd', 'post_custom_content', 'asdasdasdasd'),
(115, 43, 'fdsdfsdf', 'post_custom_content', 'dfsdfsdfsfsdf'),
(116, 43, 'gfdgdgf', 'post_custom_content', 'dfgdfgd'),
(117, 43, 'sdasdasd', 'post_custom_content', 'sdsdsd'),
(118, 43, 'Vbbb', 'post_custom_content', 'sasdasdasd'),
(119, 43, 'sadasd', 'post_custom_content', 'asdasdasd'),
(120, 43, 'hello', 'post_custom_content', 'asdasdasd'),
(121, 43, 'asdasd', 'post_custom_content', 'asdasd'),
(122, 44, 'ssssss ssss ssss', 'post_custom_content', 'ssss sss ssss ssss'),
(123, 44, 'dasdasd', 'post_custom_content', 'asdasdasd'),
(124, 44, '', 'post_custom_content', ''),
(125, 45, 'dddd', 'post_custom_content', 'dddd'),
(126, 45, 'ddddvvv', 'post_custom_content', 'vvvvv');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `PostAuthor` bigint(20) DEFAULT NULL,
  `PostTitle` text,
  `PostContent` longtext,
  `ShortDescription` text NOT NULL,
  `PostParent` bigint(20) NOT NULL,
  `PostExcerpt` text NOT NULL,
  `PostStatus` varchar(255) DEFAULT 'publish',
  `PostType` varchar(255) DEFAULT 'post',
  `CreationDate` datetime DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `Postscol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `PostAuthor`, `PostTitle`, `PostContent`, `ShortDescription`, `PostParent`, `PostExcerpt`, `PostStatus`, `PostType`, `CreationDate`, `ModifiedDate`, `Postscol`) VALUES
(1, 1, 'First Cms Page', 'Dummy text page Content', '', 0, 'Dummy text page Content excerpt', 'publish', 'page', '2016-12-12 00:00:00', '2016-12-13 00:00:00', '2-col'),
(2, 2, 'Second Cms page', 'Second Cms page', '', 0, 'z', 'publish', 'page', '2016-12-13 00:00:00', '2016-12-14 00:00:00', '2-col'),
(3, 1, 'third Cms page', 'Second Cms page', '', 0, 'z', 'publish', 'page', '2016-12-13 00:00:00', '2016-12-14 00:00:00', '2-col'),
(30, 1, 'sdasd', 'sadasd', 'asdasd', 1, '', 'draft', 'page', '2016-12-28 08:30:13', '2016-12-28 08:44:32', NULL),
(31, 1, 'sdasd', 'sadsd', 'asdasd', 1, '', 'publish', 'page', '2016-12-28 08:45:00', '2016-12-28 08:46:00', NULL),
(32, 1, 'sadad', 'sdasd', 'asdad', 1, '', 'draft', 'page', '2016-12-28 08:46:41', '2016-12-28 08:47:21', NULL),
(33, 1, 'ggg', 'gggg', 'ggg', 1, '', 'draft', 'page', '2016-12-29 07:28:33', '2016-12-29 08:14:11', NULL),
(34, 1, 'hhh', 'hhhh', 'hhhh', 1, '', 'publish', 'page', '2016-12-29 08:14:21', '2016-12-29 08:14:35', NULL),
(35, 1, 'Auto Draft created at 2016-12-29 8:15:46', NULL, '', 0, '', 'draft', 'page', '2016-12-29 08:15:46', '2016-12-29 08:15:46', NULL),
(36, 1, 'Auto Draft created at 2016-12-30 7:17:19', NULL, '', 0, '', 'draft', 'page', '2016-12-30 07:17:19', '2016-12-30 07:17:19', NULL),
(37, 1, 'Auto Draft created at 2016-12-31 6:33:57', NULL, '', 0, '', 'draft', 'page', '2016-12-31 06:33:57', '2016-12-31 06:33:57', NULL),
(38, 1, 'Auto Draft created at 2016-12-31 23:36:48', NULL, '', 0, '', 'draft', 'page', '2016-12-31 23:36:48', '2016-12-31 23:36:48', NULL),
(39, 1, 'Auto Draft created at 2017-01-01 4:09:59', NULL, '', 0, '', 'draft', 'page', '2017-01-01 04:09:59', '2017-01-01 04:09:59', NULL),
(40, 1, 'Auto Draft created at 2017-01-01 7:30:18', NULL, '', 0, '', 'draft', 'page', '2017-01-01 07:30:18', '2017-01-01 07:30:18', NULL),
(41, 1, 'Auto Draft created at 2017-01-01 15:50:19', NULL, '', 0, '', 'draft', 'page', '2017-01-01 15:50:19', '2017-01-01 15:50:19', NULL),
(42, 1, 'Auto Draft created at 2017-01-07 9:47:46', NULL, '', 0, '', 'draft', 'page', '2017-01-07 09:47:46', '2017-01-07 09:47:46', NULL),
(43, 1, 'Auto Draft created at 2017-01-08 8:32:30', NULL, '', 0, '', 'draft', 'page', '2017-01-08 08:32:30', '2017-01-08 08:32:30', NULL),
(44, 1, 'sdsdsdsd', 'asdasdasd', 'sssdsdsdsd', 1, '', 'publish', 'page', '2017-01-08 14:58:44', '2017-01-08 15:41:54', NULL),
(45, 1, 'Auto Draft created at 2017-01-08 16:11:52', NULL, '', 0, '', 'draft', 'page', '2017-01-08 16:11:52', '2017-01-08 16:11:52', NULL),
(46, 1, 'Auto Draft created at 2017-01-10 17:41:09', NULL, '', 0, '', 'draft', 'page', '2017-01-10 17:41:09', '2017-01-10 17:41:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ProductID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Model` varchar(200) DEFAULT NULL,
  `Sku` varchar(200) DEFAULT NULL,
  `Upc` varchar(45) DEFAULT NULL,
  `Jan` varchar(45) DEFAULT NULL,
  `Isbn` varchar(45) DEFAULT NULL,
  `Mpn` varchar(125) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Quantity` int(20) DEFAULT NULL,
  `StockStatusID` int(20) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `ManufacturerID` int(20) DEFAULT NULL,
  `Shipping` int(10) DEFAULT NULL,
  `Price` decimal(15,4) DEFAULT NULL,
  `Points` int(8) DEFAULT NULL,
  `TaxClassID` int(20) DEFAULT NULL,
  `DateAvailable` date DEFAULT NULL,
  `Weight` decimal(15,8) DEFAULT NULL,
  `WeightClassID` int(20) DEFAULT NULL,
  `Length` decimal(15,8) DEFAULT NULL,
  `Width` decimal(15,8) DEFAULT NULL,
  `Height` decimal(15,8) DEFAULT NULL,
  `LengthClassID` int(18) DEFAULT NULL,
  `Subtract` int(12) DEFAULT NULL,
  `Minimum` int(2) DEFAULT NULL,
  `SortOrder` int(11) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `DateAdded` datetime DEFAULT NULL,
  `DateModified` datetime DEFAULT NULL,
  `Viewed` int(5) DEFAULT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

DROP TABLE IF EXISTS `product_attribute`;
CREATE TABLE IF NOT EXISTS `product_attribute` (
  `AttributeID` int(20) NOT NULL,
  `ProductID` bigint(20) DEFAULT NULL,
  `LanguageID` int(20) DEFAULT NULL,
  `Text` mediumtext,
  PRIMARY KEY (`AttributeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_description`
--

DROP TABLE IF EXISTS `product_description`;
CREATE TABLE IF NOT EXISTS `product_description` (
  `ProductDescriptionID` int(20) NOT NULL AUTO_INCREMENT,
  `ProductID` bigint(20) DEFAULT NULL,
  `LanguageID` int(20) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` mediumtext,
  `MetaDescription` varchar(255) DEFAULT NULL,
  `Tag` mediumtext,
  PRIMARY KEY (`ProductDescriptionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_discount`
--

DROP TABLE IF EXISTS `product_discount`;
CREATE TABLE IF NOT EXISTS `product_discount` (
  `ProductDiscountID` bigint(20) NOT NULL,
  `ProductID` bigint(20) DEFAULT NULL,
  `CustomerGroupID` bigint(20) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Priority` int(7) DEFAULT NULL,
  `Price` decimal(15,8) DEFAULT NULL,
  `DateStart` date DEFAULT NULL,
  `DateEnd` date DEFAULT NULL,
  PRIMARY KEY (`ProductDiscountID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE IF NOT EXISTS `product_image` (
  `ProductImageID` bigint(20) unsigned NOT NULL,
  `ProductID` bigint(20) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `SortOrder` int(4) DEFAULT NULL,
  PRIMARY KEY (`ProductImageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_option`
--

DROP TABLE IF EXISTS `product_option`;
CREATE TABLE IF NOT EXISTS `product_option` (
  `ProductOptionID` int(20) NOT NULL AUTO_INCREMENT,
  `ProductID` bigint(20) DEFAULT NULL,
  `OptionID` int(20) DEFAULT NULL,
  `OptionValue` mediumtext,
  `Required` int(1) DEFAULT NULL,
  PRIMARY KEY (`ProductOptionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_option_value`
--

DROP TABLE IF EXISTS `product_option_value`;
CREATE TABLE IF NOT EXISTS `product_option_value` (
  `ProductOptionValueID` int(20) NOT NULL AUTO_INCREMENT,
  `ProductOptionID` int(20) DEFAULT NULL,
  `ProductID` bigint(20) DEFAULT NULL,
  `OptionID` int(20) DEFAULT NULL,
  `OptionValueID` int(20) DEFAULT NULL,
  `Quantity` int(5) DEFAULT NULL,
  `Subtract` int(3) DEFAULT NULL,
  `Price` decimal(15,4) DEFAULT NULL,
  `PricePrefix` varchar(3) DEFAULT NULL,
  `Points` int(8) DEFAULT NULL,
  `PointsPrefix` varchar(3) DEFAULT NULL,
  `Weight` decimal(15,8) DEFAULT NULL,
  `WeightPrefix` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`ProductOptionValueID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_related`
--

DROP TABLE IF EXISTS `product_related`;
CREATE TABLE IF NOT EXISTS `product_related` (
  `ProductID` bigint(20) DEFAULT NULL,
  `RelatedID` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_reward`
--

DROP TABLE IF EXISTS `product_reward`;
CREATE TABLE IF NOT EXISTS `product_reward` (
  `ProductRewardID` bigint(20) DEFAULT NULL,
  `ProductID` bigint(20) DEFAULT NULL,
  `CustomerGroupID` bigint(20) DEFAULT NULL,
  `Points` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_special`
--

DROP TABLE IF EXISTS `product_special`;
CREATE TABLE IF NOT EXISTS `product_special` (
  `ProductSpecialID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ProductID` bigint(20) DEFAULT NULL,
  `CustomerGroupID` bigint(20) DEFAULT NULL,
  `Priority` bigint(5) DEFAULT NULL,
  `Price` decimal(15,4) DEFAULT NULL,
  `DateStart` date DEFAULT NULL,
  `DateEnd` date DEFAULT NULL,
  PRIMARY KEY (`ProductSpecialID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_to_category`
--

DROP TABLE IF EXISTS `product_to_category`;
CREATE TABLE IF NOT EXISTS `product_to_category` (
  `ProductID` bigint(20) DEFAULT NULL,
  `CategoryID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_to_download`
--

DROP TABLE IF EXISTS `product_to_download`;
CREATE TABLE IF NOT EXISTS `product_to_download` (
  `ProductID` bigint(20) DEFAULT NULL,
  `DownloadID` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_to_layout`
--

DROP TABLE IF EXISTS `product_to_layout`;
CREATE TABLE IF NOT EXISTS `product_to_layout` (
  `ProductID` bigint(20) DEFAULT NULL,
  `StoreID` bigint(20) DEFAULT NULL,
  `LayoutID` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_to_shop`
--

DROP TABLE IF EXISTS `product_to_shop`;
CREATE TABLE IF NOT EXISTS `product_to_shop` (
  `ProductToShopID` bigint(20) NOT NULL,
  `ProductID` bigint(20) DEFAULT NULL,
  `ShopID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ProductToShopID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `ReviewID` bigint(20) NOT NULL AUTO_INCREMENT,
  `CustomerID` bigint(20) DEFAULT NULL,
  `ProductID` bigint(20) DEFAULT NULL,
  `Author` varchar(255) DEFAULT NULL,
  `Text` mediumtext,
  `Rating` int(1) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `DateAdded` datetime DEFAULT NULL,
  `DateModified` datetime DEFAULT NULL,
  PRIMARY KEY (`ReviewID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `RoleID` int(20) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(255) NOT NULL,
  `RoleDescription` text NOT NULL,
  `RoleCode` varchar(255) NOT NULL,
  PRIMARY KEY (`RoleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleID`, `RoleName`, `RoleDescription`, `RoleCode`) VALUES
(1, 'Super Admin', 'Super Admin', 'SUPERADMIN'),
(2, 'Administrator', 'Administrator', 'ADMINISTRATOR'),
(3, 'Vendor', 'Vendor', 'VENDOR'),
(4, 'User', 'User', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE IF NOT EXISTS `role_permission` (
  `RolePermissionID` int(20) NOT NULL AUTO_INCREMENT,
  `RoleID` int(20) NOT NULL,
  `PermissionID` int(20) NOT NULL,
  `FeatureID` varchar(255) NOT NULL,
  `r_can_add` tinyint(1) DEFAULT '0',
  `r_can_edit` tinyint(1) DEFAULT '0',
  `r_can_delete` tinyint(1) DEFAULT '0',
  `r_can_view` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`RolePermissionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=248 ;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`RolePermissionID`, `RoleID`, `PermissionID`, `FeatureID`, `r_can_add`, `r_can_edit`, `r_can_delete`, `r_can_view`) VALUES
(59, 2, 0, '2', 1, 1, 1, 1),
(60, 2, 0, '3', 1, 0, 0, 0),
(61, 2, 0, '4', 0, 1, 0, 1),
(62, 4, 0, '2', 0, 0, 0, 0),
(63, 4, 0, '3', 0, 0, 0, 0),
(74, 3, 0, '2', 0, 0, 0, 0),
(75, 3, 0, '4', 0, 0, 0, 1),
(223, 1, 0, '2', 0, 0, 0, 0),
(224, 1, 0, '3', 0, 0, 0, 0),
(225, 1, 0, '4', 1, 1, 1, 0),
(226, 1, 0, '5', 0, 0, 0, 0),
(227, 1, 0, '6', 0, 0, 0, 0),
(228, 1, 0, '7', 0, 0, 0, 0),
(229, 1, 0, '8', 0, 0, 0, 0),
(230, 1, 0, '9', 0, 0, 0, 0),
(231, 1, 0, '10', 0, 0, 0, 0),
(232, 1, 0, '11', 0, 0, 0, 0),
(233, 1, 0, '12', 0, 0, 0, 0),
(234, 1, 0, '13', 0, 0, 0, 0),
(235, 1, 0, '14', 0, 0, 0, 0),
(236, 1, 0, '15', 0, 0, 0, 0),
(237, 1, 0, '16', 0, 0, 0, 0),
(238, 1, 0, '17', 0, 0, 0, 0),
(239, 1, 0, '18', 0, 0, 0, 0),
(240, 1, 0, '19', 0, 0, 0, 0),
(241, 1, 0, '20', 0, 0, 0, 0),
(242, 1, 0, '21', 0, 0, 0, 0),
(243, 1, 0, '22', 0, 0, 0, 0),
(244, 1, 0, '23', 0, 0, 0, 0),
(245, 1, 0, '24', 0, 0, 0, 0),
(246, 1, 0, '25', 0, 0, 0, 0),
(247, 1, 0, '26', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `r_postcontentsections`
--

DROP TABLE IF EXISTS `r_postcontentsections`;
CREATE TABLE IF NOT EXISTS `r_postcontentsections` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `PostID` bigint(20) DEFAULT NULL,
  `PageTemplateID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `r_templatecontentzone`
--

DROP TABLE IF EXISTS `r_templatecontentzone`;
CREATE TABLE IF NOT EXISTS `r_templatecontentzone` (
  `ID` bigint(20) NOT NULL,
  `ContentZoneID` bigint(20) DEFAULT NULL,
  `TemplateID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

DROP TABLE IF EXISTS `table1`;
CREATE TABLE IF NOT EXISTS `table1` (
  `LengthClassID` int(20) DEFAULT NULL,
  `LanguageID` int(20) DEFAULT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `Unit` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tax_class`
--

DROP TABLE IF EXISTS `tax_class`;
CREATE TABLE IF NOT EXISTS `tax_class` (
  `TaxClassID` int(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `DateAdded` datetime DEFAULT NULL,
  `DateModified` datetime DEFAULT NULL,
  PRIMARY KEY (`TaxClassID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tax_rate`
--

DROP TABLE IF EXISTS `tax_rate`;
CREATE TABLE IF NOT EXISTS `tax_rate` (
  `TaxRateID` int(20) NOT NULL,
  `GeoZoneID` int(20) DEFAULT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Rate` decimal(15,4) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `DateAdded` datetime DEFAULT NULL,
  `DateModified` datetime DEFAULT NULL,
  PRIMARY KEY (`TaxRateID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tax_rule`
--

DROP TABLE IF EXISTS `tax_rule`;
CREATE TABLE IF NOT EXISTS `tax_rule` (
  `TaxRuleID` int(20) DEFAULT NULL,
  `TaxClassID` int(20) DEFAULT NULL,
  `TaxRateID` int(20) DEFAULT NULL,
  `Based` varchar(45) DEFAULT NULL,
  `Priority` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ConfirmPassword` varchar(255) NOT NULL,
  `RegisteredDate` datetime DEFAULT NULL,
  `ActivationKey` varchar(100) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `DisplayName` varchar(100) DEFAULT NULL,
  `RoleID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FirstName`, `LastName`, `Username`, `Email`, `Password`, `ConfirmPassword`, `RegisteredDate`, `ActivationKey`, `Status`, `DisplayName`, `RoleID`) VALUES
(1, 'adil', 'shah', 'administrator', 'admin@admin.com', 'admin', '', NULL, NULL, NULL, NULL, '1'),
(2, 'wada', 'wada la', 'wadaa', 'wada@gmail.com', '123456', '123456', NULL, NULL, 'InActive', NULL, 'User'),
(3, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', '', NULL, NULL, NULL, NULL, NULL),
(4, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asd', '', NULL, NULL, NULL, NULL, NULL),
(5, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', '', NULL, NULL, NULL, NULL, NULL),
(6, 'asdasd', 'asdasd', 'asdasd', 'asdas@gmail.com', '123456', '123456', NULL, NULL, 'Active', NULL, 'User'),
(7, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', '', NULL, NULL, NULL, NULL, NULL),
(8, 'asdasd', 'asd', 'add', 'asd', 'asd', '', NULL, NULL, NULL, NULL, NULL),
(9, 'asdasd', 'asdasd', 'asdas', 'sadasd', 'asdasd', '', NULL, NULL, NULL, NULL, NULL),
(10, 'aasweqqq', 'asdasd', 'asdasd', 'aasweqqq@gmail.com', '123456', '123456', NULL, NULL, NULL, NULL, NULL),
(11, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', '', NULL, NULL, NULL, NULL, NULL),
(12, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasdasd', '', NULL, NULL, NULL, NULL, NULL),
(13, 'asd', 'asd', 'asdasd', 'admin@admin.com', '123456', '123456', NULL, NULL, 'InActive', NULL, 'User'),
(14, 'hello', 'new ss', 'adilss', 'admin@admin.com', '123456', '123456', NULL, NULL, 'Active', NULL, 'Admin'),
(15, 'ASdasd', 'asdasd', 'asdasdasd', 'dc@admin.com', 'admins', 'admins', NULL, NULL, 'Active', NULL, 'User'),
(16, 'asdasd', 'saasd', 'sadass', 'admin@admin.com', 'admin', 'admin', NULL, NULL, 'InActive', NULL, 'Admin'),
(17, 'asdad', 'asdasd', 'asdasd', 'admin@admin.com', 'admins', 'admins', NULL, NULL, 'Active', NULL, 'InActive'),
(18, 'adasd', 'asdasd', 'asdasdas', 'admin@admin.com', 'adilshah', 'adilshah', NULL, NULL, 'Active', NULL, 'Admin'),
(19, 'adil', 'shah', 'administrator', 'adil.shah.1995@gmail.com', 'adils', 'adils', NULL, NULL, 'Active', NULL, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `UserRoleID` int(20) NOT NULL AUTO_INCREMENT,
  `UserID` int(20) NOT NULL,
  `RoleID` int(20) NOT NULL,
  PRIMARY KEY (`UserRoleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `weight_class`
--

DROP TABLE IF EXISTS `weight_class`;
CREATE TABLE IF NOT EXISTS `weight_class` (
  `WeightClassID` int(20) NOT NULL AUTO_INCREMENT,
  `Value` decimal(15,8) DEFAULT NULL,
  PRIMARY KEY (`WeightClassID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `weight_class_description`
--

DROP TABLE IF EXISTS `weight_class_description`;
CREATE TABLE IF NOT EXISTS `weight_class_description` (
  `WeightClassID` int(20) DEFAULT NULL,
  `LanguageID` int(20) DEFAULT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Unit` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

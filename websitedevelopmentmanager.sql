-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2015 at 05:01 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `websitedevelopmentmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '14', 1448292370),
('projectmanager', '1', 1448292370);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1448292370, 1448292370),
('client', 1, NULL, NULL, NULL, 1448292370, 1448292370),
('createProject', 2, 'Allows the Projectmanager to create a new Project', NULL, NULL, 1448292370, 1448292370),
('editFile', 2, 'Allows the Client to edit the file', NULL, NULL, 1448292370, 1448292370),
('editFunctionality', 2, 'Allows the Projectmanager to edit the functionality', NULL, NULL, 1448292370, 1448292370),
('editProject', 2, 'Allows the Projectmanager to edit the Project', NULL, NULL, 1448292370, 1448292370),
('editTodo', 2, 'Allows the Client to edit the todo', NULL, NULL, 1448292370, 1448292370),
('maintainBackend', 2, 'Allows the Admin to maintain the backend', NULL, NULL, 1448379599, 1448379599),
('projectmanager', 1, NULL, NULL, NULL, 1448292370, 1448292370);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('projectmanager', 'client'),
('projectmanager', 'createProject'),
('client', 'editFile'),
('projectmanager', 'editFunctionality'),
('projectmanager', 'editProject'),
('client', 'editTodo'),
('admin', 'maintainBackend'),
('admin', 'projectmanager');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `zip_code` varchar(128) NOT NULL,
  `location` varchar(128) NOT NULL,
  `phone_number` varchar(128) NOT NULL,
  `website` varchar(128) NOT NULL,
  `kvk` varchar(128) NOT NULL,
  `btw` varchar(128) NOT NULL,
  `email_address` varchar(128) NOT NULL,
  `description` blob NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `user_id`, `name`, `address`, `zip_code`, `location`, `phone_number`, `website`, `kvk`, `btw`, `email_address`, `description`) VALUES
(3, 1, 'testcustomer', 'testaddress', '0011AB', 'testlocation', '0123456789', 'www.aabbcc.com', '--.--.--.--', '21%', 'test@aabbcc.com', 0x616466),
(6, 12, 'Usersusers', 'Address', 'zip', 'location', '0123456789', 'www.test.test', '0123456789', '21', 'user11@testusers.test', 0x4465736372697074696f6e),
(7, 13, 'Users', 'Address', 'Zip', 'Location', '0123456789', 'www.username1.users', 'kvk', '21', 'username1@usernames.users', 0x4465736372697074696f6e),
(8, 14, 'User', 'Address', 'Zip', 'Location', 'Number', 'Website.web', '123456789', '21', 'user@user.user', 0x446573636f6e6566),
(9, 15, 'Company1', 'Address', 'zip', 'location', '012456789', 'www.company1.comp', '01234568', '21', 'user1@company1.comp', 0x426c61626c61626c);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
`file_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` blob NOT NULL,
  `datetime_added` datetime,
  `deleted` tinyint(1) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `todo_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `datetime_updated` datetime,
  `updater_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`file_id`, `name`, `description`, `datetime_added`, `deleted`, `creator_id`, `todo_id`, `project_id`, `datetime_updated`, `updater_id`) VALUES
(1, 'File', 0x5465737466696c65, '2015-11-23 13:15:15', 1, 14, 1, 5, '2015-11-23 13:15:15', 14);

-- --------------------------------------------------------

--
-- Table structure for table `functionality`
--

CREATE TABLE IF NOT EXISTS `functionality` (
`functionality_id` int(11) NOT NULL,
  `description` blob NOT NULL,
  `datetime_added` datetime,
  `deleted` tinyint(1) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `datetime_updated` datetime,
  `updater_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `functionality`
--

INSERT INTO `functionality` (`functionality_id`, `description`, `datetime_added`, `deleted`, `project_id`, `name`, `creator_id`, `datetime_updated`, `updater_id`) VALUES
(1, 0x5061676520746f206c6f6720696e20746f20746865207765627369746520616e64206d616b65207468696e6773, '0000-00-00 00:00:00', 1, 5, 'Login page', 14, '0000-00-00 00:00:00', 14),
(3, 0x437265617465207468652066726f6e74656e64, '2015-11-23 10:44:20', 1, 5, 'Frontend', 14, '2015-11-23 10:44:20', 14),
(5, 0x4465736372697074696f6e, NULL, 1, 15, 'Name', 14, NULL, 14),
(6, 0x4465736372697074696f6e, '2015-11-25 10:23:47', 1, 15, 'Login page', 14, '2015-11-25 10:23:47', 14),
(7, 0x4465736372697074696f6e, '2015-11-25 10:29:16', 1, 20, 'Name', 14, '2015-11-25 10:29:16', 14),
(8, 0x66756e6369746f6e616c69747961, '2015-11-25 11:03:28', 1, 18, 'New functionality', 14, '2015-11-25 11:03:28', 14),
(9, 0x46756e6374696f6e616c69747931, '2015-11-25 12:04:39', 0, 15, 'Functionality1', 14, '2015-11-25 12:04:39', 14),
(10, 0x46756e6374696f6e616c69747932, '2015-11-25 12:04:53', 0, 15, 'Functionality2', 14, '2015-11-25 12:04:53', 14);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1448283036),
('m140506_102106_rbac_init', 1448283667);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
`project_id` int(11) NOT NULL,
  `description` blob NOT NULL,
  `datetime_added` datetime,
  `deleted` tinyint(1) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `projectmanager_id` int(11) NOT NULL,
  `datetime_updated` datetime ,
  `updater_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `description`, `datetime_added`, `deleted`, `creator_id`, `client_id`, `projectmanager_id`, `datetime_updated`, `updater_id`) VALUES
(5, 0x61736466616466, '2015-11-20 08:41:10', 0, 1, 6, 7, '2015-11-20 08:41:10', 1),
(6, 0x576562736974652031, '2015-11-20 08:42:52', 0, 1, 1, 1, '2015-11-20 08:42:52', 1),
(8, 0x4465736372697074696f6e32, '2015-11-20 09:23:45', 1, 1, 2, 2, '2015-11-20 09:23:45', 1),
(9, 0x44696e67656e, '2015-11-20 09:25:34', 1, 1, 2, 2, '2015-11-20 09:25:34', 1),
(10, 0x4e6f672065656e2070726f6a656374, '2015-11-20 12:20:41', 0, 1, 7, 8, '2015-11-20 12:20:41', 1),
(11, 0x4465736372697074696f6e, '2015-11-20 13:23:52', 0, 13, 5, 8, '2015-11-20 13:23:52', 13),
(12, 0x57656273697465207465737462656472696a66, '2015-11-20 13:39:06', 0, 13, 1, 1, '2015-11-20 13:39:06', 13),
(13, 0x61736466, '2015-11-20 15:51:56', 0, 13, 1, 1, '2015-11-20 15:51:56', 13),
(14, 0x52616e646f6d20776562736974652031, '2015-11-23 13:31:17', 1, 14, 6, 6, '2015-11-23 13:31:17', 14),
(15, 0x6b646b646b64, '2015-11-24 08:50:22', 0, 14, 8, 1, '2015-11-24 08:50:22', 14),
(16, 0x5765627369746520666f722061626a616b6a616b6c64666a, '2015-11-24 15:01:06', 0, 14, 8, 7, '2015-11-24 15:01:06', 14),
(17, 0x57656277696e6b656c, '2015-11-24 15:10:22', 0, 14, 15, 10, '2015-11-24 15:10:22', 14),
(18, 0x50726f6a656374, '2015-11-25 09:43:15', 0, 14, 15, 14, '2015-11-25 09:43:15', 14),
(19, 0x4e65772070726f6a656374, '2015-11-25 09:50:39', 0, 14, 2, 14, '2015-11-25 09:50:39', 14),
(20, 0x416e6f746865722077656273697465, '2015-11-25 10:28:30', 0, 14, 2, 14, '2015-11-25 10:28:30', 14);

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE IF NOT EXISTS `todo` (
`todo_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` blob NOT NULL,
  `datetime_added` datetime,
  `deleted` tinyint(1) NOT NULL,
  `status_id` tinyint(20) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `functionality_id` int(11) NOT NULL,
  `datetime_updated` datetime,
  `updater_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`todo_id`, `name`, `description`, `datetime_added`, `deleted`, `status_id`, `creator_id`, `functionality_id`, `datetime_updated`, `updater_id`) VALUES
(1, 'description', 0x6173646661736466, '2015-11-23 11:55:09', 0, 3, 6, 1, '2015-11-23 11:55:09', 9),
(5, '3', 0x34, '2015-11-23 11:58:54', 0, 5, 14, 1, '2015-11-23 11:58:54', 14),
(6, 'Name', 0x4465736372697074696f6e, '2015-11-23 12:04:48', 0, 127, 14, 1, '2015-11-23 12:04:48', 14);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password_hash` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password_hash`, `role_id`, `auth_key`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'user1', '$2y$13$fFrLMHwm.yrzYTpTvcfkHe2YTELiDcBRfiQ7D1QUCyDI.BR759x.6', 0, '8pNOAsPdE1tUSqfeXPhrnU2JqJhiwaz4', NULL, 'user1@users.user', 10, 1447939744, 1447939744),
(2, 'user2', '$2y$13$pX/CMgpIRT6YUJ0LLfXErOrean/ARwp4XVw01Mr7.e0gMHHtgUawq', 0, 'Z-rcOcMKMjIU1BOLE5qnGv9DCrC3Z7oV', NULL, 'user2@users.user', 10, 1447939767, 1447939767),
(3, 'user3', '$2y$13$q8Gw4VZSNnpvnTG9.LWpq.oTxYbfcjcV0wL2asfGXYOMXeTdYP8Ye', 0, 'C0IO21ds02NYBl0aq7uDE9VEIPnFPWWg', NULL, 'user@users.nl', 10, 1448008846, 1448008846),
(4, 'ad', '$2y$13$l8o/fz3.UzcBQnC5Sgx4pO7JR/JoVZxfPQ1/bSQ0DfXUQ.Xx1YA/e', 0, 'tqRGm2tJgf6PorDrq6MahMYZUUgnnFiB', NULL, 'ad@f.b', 10, 1448009621, 1448009621),
(5, 'User4', '$2y$13$/6jICDv9lMBDq/P5QevQuO/oPIJvSKApAigb9UOumJwDz4wdhDcsC', 0, 'A1zMdN_ee0eAvpPl2LtNPx585mr_elVQ', NULL, 'user4@testusers.test', 10, 1448013959, 1448013959),
(6, 'User5', '$2y$13$YrK9Jgfkn9o4zG8p5g3Gju0tA1xqkXxt3a/Xxe3itqsYgBB.6/0h6', 0, 'HMVpTqtyu81KWAH5EA5Xio8GV-gaTpcr', NULL, 'user4@testusers.testtest', 10, 1448013971, 1448013971),
(7, 'User6', '$2y$13$9fIycIBW.9KEuPehU6U3JeqAJlXMQ76vn4g2IGX3D2eGIdHMDs5bO', 0, 'qHRxrw_zvbjjfhjxRnPPahWzOMbXrloR', NULL, 'user6@testusers.test', 10, 1448014083, 1448014083),
(8, 'User7', '$2y$13$DwuS79q6GGT/O7992re4yOJPtbfTLePwps1S2XDKtTPc.gx7Afej2', 0, '1o39TsjWvREX0UoouGdVKJl7Z1mQgq5N', NULL, 'user7@testusers.test', 10, 1448014201, 1448014201),
(9, 'User8', '$2y$13$zjORyM8673MN9HyRhgPzBeI/50uIjXUh81hgO/7LW9lCV9Fcv3/a6', 0, 'gj3WQwnoGo_jdkvzjZvFzMAvBHMbvZMt', NULL, 'user8@testusers.test', 10, 1448014288, 1448014288),
(10, 'User9', '$2y$13$AWKPDdfxFFPwtkOjL8tf0.SB4z0JZChjXKln6GI87orM.hTXne9Hq', 0, 'tzU0k76JxyI9jYzz3RgxtrkmY_7Ius_F', NULL, 'user9@testusers.test', 10, 1448014421, 1448014421),
(11, 'user10', '$2y$13$AxQ7Dx1DTjEbRRGdwmZK7OtHWFeCiqURLyZKrBeHNjkpzpWm8KLJ2', 0, 'ym84zl4h_iOyPVOeS8_XaYH_yqHwJwia', NULL, 'user10@user.test', 10, 1448015019, 1448015019),
(12, 'user11', '$2y$13$wskdspdju4VkcEBJrzDjZeTmFnztT4Ay6Y368Xa5xuGnTTjEBuahC', 0, 'XQgpJDSjunXpRU8e19_7nF49ZlESTkFv', NULL, 'user11@testusers.test', 10, 1448015176, 1448015176),
(13, 'username1', '$2y$13$x/V01k61yIIPzE64d/J58uSBsVXYHq3jllpVvrnWxc4VctL/0kaBu', 0, 'Dw_gTSk53CHfQ_659A5yX3mQ37ZXxsSy', NULL, 'username1@usernames.users', 10, 1448020290, 1448020290),
(14, 'user19', '$2y$13$atCmvSDNy9WTpRpkMUcLxurT6RYe7r9qQVuFs7h86n5o5nPnkptle', 0, 'bLpBFOCSvsUEyPIUEw-067AeAZG2GS1M', NULL, 'user@user.user', 10, 1448265118, 1448265118),
(15, 'Company1', '$2y$13$is1ywuVN9YwnuRhO9gdzOuFNQ3N.kCjc8eYhWuU1xasKGJfa9DcyS', 0, '6KjExgVrwjA6FVckhhTtstj5vHbpEbXy', NULL, 'user1@company1.comp', 10, 1448374141, 1448374141);

-- --------------------------------------------------------

--
-- Table structure for table `user_todo`
--

CREATE TABLE IF NOT EXISTS `user_todo` (
`todo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_todo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
 ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
 ADD PRIMARY KEY (`name`), ADD KEY `rule_name` (`rule_name`), ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`customer_id`), ADD KEY `fk_Customer_User1_idx` (`user_id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
 ADD PRIMARY KEY (`file_id`), ADD KEY `fk_File_User1_idx` (`creator_id`), ADD KEY `fk_File_Todo1_idx` (`todo_id`), ADD KEY `fk_File_Project1_idx` (`project_id`), ADD KEY `fk_File_User2_idx` (`updater_id`);

--
-- Indexes for table `functionality`
--
ALTER TABLE `functionality`
 ADD PRIMARY KEY (`functionality_id`), ADD KEY `fk_Functionality_Project_idx` (`project_id`), ADD KEY `fk_Functionality_User1_idx` (`creator_id`), ADD KEY `fk_Functionality_User2_idx` (`updater_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
 ADD PRIMARY KEY (`version`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`project_id`), ADD KEY `fk_Project_User1_idx` (`creator_id`), ADD KEY `fk_Project_User2_idx` (`client_id`), ADD KEY `fk_Project_User3_idx` (`projectmanager_id`), ADD KEY `fk_Project_User4_idx` (`updater_id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
 ADD PRIMARY KEY (`todo_id`), ADD KEY `fk_Todo_User1_idx` (`creator_id`), ADD KEY `fk_Todo_Functionality1_idx` (`functionality_id`), ADD KEY `fk_Todo_User2_idx` (`updater_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username_UNIQUE` (`username`), ADD UNIQUE KEY `email_UNIQUE` (`email`), ADD UNIQUE KEY `password_reset_token_UNIQUE` (`password_reset_token`);

--
-- Indexes for table `user_todo`
--
ALTER TABLE `user_todo`
 ADD PRIMARY KEY (`todo_id`,`user_id`,`user_todo_id`), ADD KEY `fk_User_todo_User1_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `functionality`
--
ALTER TABLE `functionality`
MODIFY `functionality_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user_todo`
--
ALTER TABLE `user_todo`
MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
ADD CONSTRAINT `fk_Customer_User1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `file`
--
ALTER TABLE `file`
ADD CONSTRAINT `fk_File_Project1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_File_Todo1` FOREIGN KEY (`todo_id`) REFERENCES `todo` (`todo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_File_User1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_File_User2` FOREIGN KEY (`updater_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `functionality`
--
ALTER TABLE `functionality`
ADD CONSTRAINT `fk_Functionality_Project` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Functionality_User1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Functionality_User2` FOREIGN KEY (`updater_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
ADD CONSTRAINT `fk_Project_User1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Project_User2` FOREIGN KEY (`client_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Project_User3` FOREIGN KEY (`projectmanager_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Project_User4` FOREIGN KEY (`updater_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `todo`
--
ALTER TABLE `todo`
ADD CONSTRAINT `fk_Todo_Functionality1` FOREIGN KEY (`functionality_id`) REFERENCES `functionality` (`functionality_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Todo_User1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Todo_User2` FOREIGN KEY (`updater_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_todo`
--
ALTER TABLE `user_todo`
ADD CONSTRAINT `fk_User_todo_Todo1` FOREIGN KEY (`todo_id`) REFERENCES `todo` (`todo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_User_todo_User1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

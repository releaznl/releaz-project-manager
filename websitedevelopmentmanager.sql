-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2015 at 02:59 PM
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
('admin', '1', 1449663580),
('projectmanager', '2', 1449663580);

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
('admin', 1, NULL, NULL, NULL, 1449663580, 1449663580),
('client', 1, NULL, NULL, NULL, 1449663579, 1449663579),
('createProject', 2, 'Allows the Projectmanager to create a new Project', NULL, NULL, 1449663579, 1449663579),
('editFile', 2, 'Allows the Client to edit the file', NULL, NULL, 1449663579, 1449663579),
('editFunctionality', 2, 'Allows the Projectmanager to edit the functionality', NULL, NULL, 1449663579, 1449663579),
('editProject', 2, 'Allows the Projectmanager to edit the Project', NULL, NULL, 1449663579, 1449663579),
('editTodo', 2, 'Allows the Client to edit the todo', NULL, NULL, 1449663579, 1449663579),
('maintainBackend', 2, 'Allows the Admin to maintain the backend', NULL, NULL, 1449663579, 1449663579),
('projectmanager', 1, NULL, NULL, NULL, 1449663580, 1449663580);

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
('admin', 'maintainBackend');

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
-- Table structure for table `bid_category`
--

CREATE TABLE IF NOT EXISTS `bid_category` (
`id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `ordering` int(11) NOT NULL,
  `description` text,
  `creator_id` int(11) DEFAULT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `updater_id` int(11) DEFAULT NULL,
  `datetime_updated` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

-- --------------------------------------------------------

--
-- Table structure for table `bid_part`
--

CREATE TABLE IF NOT EXISTS `bid_part` (
`id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `bid_category_id` int(11) DEFAULT NULL,
  `description` text,
  `price` decimal(19,4) DEFAULT NULL,
  `file_upload` tinyint(1) DEFAULT NULL,
  `explanation` tinyint(1) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `updater_id` int(11) DEFAULT NULL,
  `datetime_updated` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `attribute_name` varchar(125) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

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
  `location` varchar(128) DEFAULT NULL,
  `phone_number` varchar(128) DEFAULT NULL,
  `website` varchar(128) DEFAULT NULL,
  `kvk` varchar(128) DEFAULT NULL,
  `btw` varchar(128) DEFAULT NULL,
  `email_address` varchar(128) NOT NULL,
  `description` blob
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
`file_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` blob NOT NULL,
  `datetime_added` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `todo_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `datetime_updated` datetime NOT NULL,
  `updater_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `functionality`
--

CREATE TABLE IF NOT EXISTS `functionality` (
`functionality_id` int(11) NOT NULL,
  `description` blob NOT NULL,
  `datetime_added` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `datetime_updated` datetime NOT NULL,
  `updater_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `price` decimal(19,4) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=110 ;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
`project_id` int(11) NOT NULL,
  `description` blob,
  `datetime_added` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `projectmanager_id` int(11) NOT NULL,
  `datetime_updated` datetime NOT NULL,
  `updater_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=114 ;

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE IF NOT EXISTS `todo` (
`todo_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` blob NOT NULL,
  `datetime_added` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `status_id` tinyint(20) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `functionality_id` int(11) NOT NULL,
  `datetime_updated` datetime NOT NULL,
  `updater_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81 ;

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
-- Indexes for table `bid_category`
--
ALTER TABLE `bid_category`
 ADD PRIMARY KEY (`id`), ADD KEY `bid_category_fk1` (`creator_id`), ADD KEY `bid_category_fk2` (`updater_id`);

--
-- Indexes for table `bid_part`
--
ALTER TABLE `bid_part`
 ADD PRIMARY KEY (`id`), ADD KEY `bid_part_fk1` (`creator_id`), ADD KEY `bid_part_fk2` (`updater_id`), ADD KEY `bid_part_fk3` (`bid_category_id`);

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
-- AUTO_INCREMENT for table `bid_category`
--
ALTER TABLE `bid_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `bid_part`
--
ALTER TABLE `bid_part`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `functionality`
--
ALTER TABLE `functionality`
MODIFY `functionality_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
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
-- Constraints for table `bid_category`
--
ALTER TABLE `bid_category`
ADD CONSTRAINT `bid_category_fk1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`),
ADD CONSTRAINT `bid_category_fk2` FOREIGN KEY (`updater_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `bid_part`
--
ALTER TABLE `bid_part`
ADD CONSTRAINT `bid_part_fk1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`),
ADD CONSTRAINT `bid_part_fk2` FOREIGN KEY (`updater_id`) REFERENCES `user` (`id`),
ADD CONSTRAINT `bid_part_fk3` FOREIGN KEY (`bid_category_id`) REFERENCES `bid_category` (`id`);

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
ADD CONSTRAINT `fk_Project_User2` FOREIGN KEY (`client_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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

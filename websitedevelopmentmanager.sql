-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2015 at 06:03 PM
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
('admin', '53', 1448292370),
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
  `location` varchar(128) DEFAULT NULL,
  `phone_number` varchar(128) DEFAULT NULL,
  `website` varchar(128) DEFAULT NULL,
  `kvk` varchar(128) DEFAULT NULL,
  `btw` varchar(128) DEFAULT NULL,
  `email_address` varchar(128) NOT NULL,
  `description` blob
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `user_id`, `name`, `address`, `zip_code`, `location`, `phone_number`, `website`, `kvk`, `btw`, `email_address`, `description`) VALUES
(1, 53, 'Name', 'addr', 'zip', 'loc', 'pn', 'site', 'kvk', 'btw', 'Email@mail.mail', 0x6465736372),
(2, 54, 'Test', 'addr', 'zip', 'loc', 'pn', 'www', 'kvk', 'btw', 'email', 0x4465736372),
(3, 55, 'Test', 'addr', 'zip', 'loc', 'pn', 'www', 'kvk', 'btw', 'emaile', 0x4465736372),
(4, 56, 'Test', 'addr', 'zip', 'loc', 'pn', 'www', 'kvk', 'btw', 'emailee', 0x4465736372),
(5, 57, 'Test', 'addr', 'zip', 'loc', 'pn', 'www', 'kvk', 'btw', 'emaileee', 0x4465736372),
(6, 58, 'Test', 'addr', 'zip', 'loc', 'pn', 'www', 'kvk', 'btw', 'emaileeee', 0x4465736372),
(7, 60, 'Test', 'addr', 'zip', 'loc', 'pn', 'www', 'kvk', 'btw', 'emaileeeee', 0x4465736372),
(8, 61, 'Test', 'addr', 'zip', 'loc', 'pn', 'www', 'kvk', 'btw', 'emaileeeeee', 0x4465736372),
(9, 62, 'Name', 'Dr', 'zip', 'loc', 'pn', 'www', 'kvk', 'btw', 'mail', 0x6465736372),
(10, 63, 'Name', 'Dr', 'zip', 'loc', 'pn', 'www', 'kvk', 'btw', 'maill', 0x6465736372),
(11, 64, 'Name', 'Dr', 'zip', 'loc', 'pn', 'www', 'kvk', 'btw', 'mailll', 0x6465736372),
(12, 65, 'adsfadf', 'asd', 'k', 'k', 'k', 'k', 'k', 'k', 'mailllllll', 0x646564);

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
  `todo_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `datetime_updated` datetime NOT NULL,
  `updater_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `price` float DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `functionality`
--

INSERT INTO `functionality` (`functionality_id`, `description`, `datetime_added`, `deleted`, `project_id`, `name`, `creator_id`, `datetime_updated`, `updater_id`, `amount`, `price`) VALUES
(14, 0x64, '2015-11-27 17:54:45', 0, 36, 'name', 53, '0000-00-00 00:00:00', 53, 7, 5);

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
  `description` blob NOT NULL,
  `datetime_added` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `projectmanager_id` int(11) NOT NULL,
  `datetime_updated` datetime NOT NULL,
  `updater_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `description`, `datetime_added`, `deleted`, `creator_id`, `client_id`, `projectmanager_id`, `datetime_updated`, `updater_id`) VALUES
(26, 0x54657374, '2015-11-27 17:32:45', 0, 53, 2, 52, '0000-00-00 00:00:00', 53),
(27, 0x54657374, '2015-11-27 17:33:55', 0, 53, 3, 52, '0000-00-00 00:00:00', 53),
(28, 0x54657374, '2015-11-27 17:35:11', 0, 53, 4, 52, '0000-00-00 00:00:00', 53),
(29, 0x54657374, '2015-11-27 17:35:54', 0, 53, 5, 52, '0000-00-00 00:00:00', 53),
(30, 0x54657374, '2015-11-27 17:36:36', 0, 53, 6, 52, '0000-00-00 00:00:00', 53),
(31, 0x54657374, '2015-11-27 17:38:03', 0, 53, 7, 52, '0000-00-00 00:00:00', 53),
(32, 0x54657374, '2015-11-27 17:39:18', 0, 53, 8, 52, '0000-00-00 00:00:00', 53),
(33, 0x64656372, '2015-11-27 17:43:13', 0, 53, 9, 52, '0000-00-00 00:00:00', 53),
(34, 0x64656372, '2015-11-27 17:43:50', 0, 53, 10, 52, '0000-00-00 00:00:00', 53),
(35, 0x64656372, '2015-11-27 17:47:20', 0, 53, 11, 52, '0000-00-00 00:00:00', 53),
(36, 0x6164, '2015-11-27 17:52:43', 0, 53, 12, 52, '0000-00-00 00:00:00', 53);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password_hash`, `role_id`, `auth_key`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(52, 'Admin', '', 0, '', NULL, '', 10, 0, 0),
(53, 'Name', '$2y$13$H73qoPpZfBEnpQy80FoLD.nsO/EJeABY9JoXjBROgL29TwJA4Nk6i', 0, 'emhjtB5tHuIwmO3ZvjqzyzINDuP2pO_g', NULL, 'Email@mail.mail', 10, 1448641871, 1448641871),
(54, 'email', '$2y$13$pCs4uKMvc.jjLzP/rVDSleCKge94iablOO8kEdY/o/X0fjhX4Y7eG', 0, '', NULL, 'email', 10, 1448641965, 1448641965),
(55, 'emaile', '$2y$13$IyxEssw5YZiiRuYtq5KXLebrQd7leVlh91rkPj/ZwpMEwKzDjn3IG', 0, '', NULL, 'emaile', 10, 1448642035, 1448642035),
(56, 'emailee', '$2y$13$XbCDHQuCopZkDjr.9FqJ4.YpVq6Oc1RL64sxrQ0WpeM2kcN4CXIJa', 0, '', NULL, 'emailee', 10, 1448642110, 1448642110),
(57, 'emaileee', '$2y$13$Q9DmIP8urpbcTu7NdLehk.UeZvHTW0bTi.Sni5W5T9Xf2kqXpi1JW', 0, '', NULL, 'emaileee', 10, 1448642153, 1448642153),
(58, 'emaileeee', '$2y$13$P0TQn1EpTMl/tEP1.uNo8O91/t3k.BDUMXk/JiUbomca6g8SRJx3m', 0, '', NULL, 'emaileeee', 10, 1448642196, 1448642196),
(60, 'emaileeeee', '$2y$13$KdKkTbEernFfkvRR8xp45OAgirO1ezkU6MGlomnWZpFuHiozWxqZG', 0, '', NULL, 'emaileeeee', 10, 1448642282, 1448642282),
(61, 'emaileeeeee', '$2y$13$dnHKN/Y61r18aE5IN8ZbOeT5JQZsoo/oZ1M1.qfkRzDsGk.K0jK/C', 0, '', NULL, 'emaileeeeee', 10, 1448642358, 1448642358),
(62, 'mail', '$2y$13$N832qh.q3Vb0XmNtPJvxXOaLPRv/buZ9HLJWMh2DhR6PK5gWwRlu6', 0, '', NULL, 'mail', 10, 1448642592, 1448642592),
(63, 'maill', '$2y$13$y.B48SHX9Q9v.lk1rd16hu5qfMD7FUxg1p11xaNhZFVwk1HeTIhNO', 0, '', NULL, 'maill', 10, 1448642630, 1448642630),
(64, 'mailll', '$2y$13$URLAWk0CIz6eB3DsQwVmNucJnW.WNPCcfAtrz90qnl94WN4WlV.Ji', 0, '', NULL, 'mailll', 10, 1448642840, 1448642840),
(65, 'mailllllll', '$2y$13$3LGNdP2QtWzBxNhviJt51e0MFnYpmxq7G7pNJylOMumasuCjLH0yy', 0, '', NULL, 'mailllllll', 10, 1448643161, 1448643161);

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
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `functionality`
--
ALTER TABLE `functionality`
MODIFY `functionality_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
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

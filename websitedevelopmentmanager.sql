-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2015 at 04:01 PM
-- Server version: 5.5.38
-- PHP Version: 5.5.18

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

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1449663580),
('client', '4', 1450709810),
('projectmanager', '2', 1449663580);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
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
('partOf', 2, 'Is part of the project', 'isPartOf', NULL, 1450358179, 1450358179),
('projectmanager', 1, NULL, NULL, NULL, 1449663580, 1449663580),
('viewProject', 2, 'Allows the user to view the a project', NULL, NULL, 1450358179, 1450358179);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
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
('client', 'partOf'),
('admin', 'projectmanager'),
('partOf', 'viewProject'),
('projectmanager', 'viewProject');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isPartOf', 'O:22:"common\\rbac\\PartOfRule":3:{s:4:"name";s:8:"isPartOf";s:9:"createdAt";i:1450358179;s:9:"updatedAt";i:1450358179;}', 1450358179, 1450358179);

-- --------------------------------------------------------

--
-- Table structure for table `bid_category`
--

CREATE TABLE `bid_category` (
`id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `ordering` int(11) NOT NULL,
  `description` text,
  `creator_id` int(11) DEFAULT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `updater_id` int(11) DEFAULT NULL,
  `datetime_updated` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid_category`
--

INSERT INTO `bid_category` (`id`, `name`, `ordering`, `description`, `creator_id`, `datetime_added`, `updater_id`, `datetime_updated`, `deleted`) VALUES
(1, 'Stap 1 - Strategie', 1, 'De eerste stap gaat over de strategie. Wilt u een brainstormsessie van waaruit wij een voorstel voor een meerjaren strategie gaan ontwikkelen? Vink dan deze optie aan. Als u niets aanvinkt, gaan we op basis van uw zelf vastgestelde doelen aan de gang met een nieuwe site.', 1, '2015-12-04 11:59:40', 1, '2015-12-21 15:47:19', 0),
(2, 'Stap 2 - Design', 2, 'Om een goed ontwerp te krijgen vragen we u voorbeelden door te geven van websites wat u mooi vindt. Tevens is het doel van uw website en de doelgroep ook van belang voor wat voor ontwerp er komt.\r\n\r\nHeeft u al een huisstijl document? Dan kunt u deze in een .zip file uploaden, onderaan deze pagina.', 1, '2015-12-04 11:59:40', 1, '2015-12-21 15:49:08', 0),
(3, 'Stap 3 - Planning', 3, 'Heeft u een realistische datum in gedachten waarop u de website wilt lanceren? Dan kijken wij of de planning mogelijk is. Geen deadline? Laat het veld leeg en ga door!', 1, '2015-12-04 11:59:40', 1, '2015-12-21 15:50:33', 0),
(4, 'Stap 4 - Hosting', 4, 'De hosting van de website houden we het liefst bij ons. Mocht u al een hosting hebben en wilt u deze blijven gebruiken, vul dan de naam van uw hostingpartij in. We rekenen hiervoor wel een eenmalige toeslag, omdat het meer tijd kost om met een andere hosting dan die bij ons een website live te zetten.', 1, '2015-12-04 11:59:40', 1, '2015-12-21 15:52:07', 0),
(5, 'Stap 5 - Promotie website', 5, 'Als de website live is, kunnen we u helpen met de online marketing. Vink hieronder de opties aan waarin u interesse heeft. De tarieven zijn maandelijkse tarieven.', 1, '2015-12-04 11:59:40', 1, '2015-12-21 15:53:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bid_part`
--

CREATE TABLE `bid_part` (
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
  `attribute_name` varchar(125) NOT NULL,
  `monthly_costs` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid_part`
--

INSERT INTO `bid_part` (`id`, `name`, `bid_category_id`, `description`, `price`, `file_upload`, `explanation`, `ordering`, `creator_id`, `datetime_added`, `updater_id`, `datetime_updated`, `deleted`, `attribute_name`, `monthly_costs`) VALUES
(1, 'Samen kijken', 1, 'Ik wil met jullie samen kijken waar ik met mijn organisatie heen wil en wat de website hierin kan bijdragen (? 210,-)', 210.0000, 0, 0, 1, 1, '2015-12-04 11:59:40', 1, '2015-12-04 11:59:40', 0, 'samenkijken', 0),
(3, 'Website 1', 2, 'Selecteer een website', 0.0000, 0, 0, 1, 1, '2015-12-04 11:59:40', 1, '2015-12-04 11:59:40', 0, 'website1', 0),
(4, 'Website 2', 2, 'Selecteer een website', 0.0000, 0, 0, 2, 1, '2015-12-04 11:59:40', 1, '2015-12-04 11:59:40', 0, 'website2', 0),
(5, 'Website 3', 2, 'Selecteer een website', 0.0000, 0, 0, 3, 1, '2015-12-04 11:59:40', 1, '2015-12-04 11:59:40', 0, 'website3', 0),
(6, 'Doel', 2, 'Beschrijf het doel', 0.0000, 0, 0, 4, 1, '2015-12-04 11:59:40', 1, '2015-12-04 11:59:40', 0, 'goal', 0),
(7, 'Huidige stijl', 2, 'Een upload van de huisstijl', 0.0000, 1, 0, 5, 1, '2015-12-04 11:59:40', 1, '2015-12-04 11:59:40', 0, 'current_style', 0),
(8, 'Doelgroep', 2, 'Een bepaling van de doelgroep', 0.0000, 0, 0, 5, 1, '2015-12-04 11:59:40', 1, '2015-12-04 11:59:40', 0, 'target_audience', 0),
(9, 'Deadline', 3, 'Je eigen deadline. (Laat het leeg als je geen deadline hebt)', 0.0000, 0, 0, 1, 1, '2015-12-04 11:59:40', 1, '2015-12-04 11:59:40', 0, 'deadline', 0),
(10, 'Hosting informatie', 4, 'Vul hier uw hostinginformatie in', 140.0000, 0, 0, 1, 1, '2015-12-04 11:59:40', 1, '2015-12-04 11:59:40', 0, 'informatie', 0),
(11, 'Ik heb al hosting', 4, 'Ik heb al hosting bij iemand anders (?140,-)', 140.0000, 0, 0, 2, 1, '2015-12-04 11:59:40', 1, '2015-12-04 11:59:40', 0, 'al_hosting', 0),
(12, 'Ik wil hosting', 4, 'Ik wil graag hosting bij jullie', 0.0000, 0, 0, 3, 1, '2015-12-04 11:59:40', 1, '2015-12-04 11:59:40', 0, 'wil_hosting', 0),
(14, 'SocialMedia service', 5, 'Hiermee kunt u uw website promoten met reclame op Social Media.', 100.0000, 0, 0, 1, 1, '2015-12-04 11:59:40', 1, '2015-12-04 11:59:40', 0, 'socialmedia_service', 1),
(15, 'Google Analytics service', 5, 'Hiermee krijgt u inzicht in het gedrag van uw bezoekers.', 50.0000, 0, 0, 2, 1, '2015-12-04 11:59:40', 1, '2015-12-04 11:59:40', 0, 'google_analytics_service', 1),
(16, 'Nieuwsbrief service', 5, 'Hiermee kunnen uw klanten op de hoogte blijven van uw aanbiedingen en acties.', 200.0000, 0, 0, 3, 1, '2015-12-04 11:59:40', 1, '2015-12-04 11:59:40', 0, 'nieuwsbrief_service', 1),
(17, 'Vaste eenmalige kosten', NULL, 'Dit zijn de vaste eenmalige kosten voor een project', 250.0000, 0, 0, 0, 1, '2015-12-04 11:59:40', 1, '2015-12-04 11:59:40', 0, 'oneoff_costs', 0),
(18, 'Vaste maandelijkse kosten', NULL, 'Dit zijn de vaste maandelijkse kosten voor een project', 39.9500, 0, 0, 0, 1, '2015-12-04 11:59:40', 1, '2015-12-04 11:59:40', 0, 'monthly_costs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
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
  `description` blob,
  `contact_type` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `user_id`, `name`, `address`, `zip_code`, `location`, `phone_number`, `website`, `kvk`, `btw`, `email_address`, `description`, `contact_type`) VALUES
(1, 1, 'Releaz', 'Zeewinde 3-11', '', NULL, NULL, NULL, NULL, NULL, 'admin@releaz.nl', NULL, 0),
(2, 2, 'Releaz', 'Zeewinde 3-11', '', NULL, NULL, NULL, NULL, NULL, 'projectmanager@releaz.nl', NULL, 0),
(3, 3, 'Releaz', 'Zeewinde 3-11', '', NULL, NULL, NULL, NULL, NULL, 'info@releaz.nl', NULL, 0),
(4, 4, 'Efactive', 'Oppenheimstraat 50', '9731AM', '', '', '', '', '', 'info@efactive.nl', 0x426573636872696a76696e673f, 0);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `functionality`
--

CREATE TABLE `functionality` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m151209_122441_insert_users', 1450358179),
('m151209_151526_insert_bid_data', 1450358179),
('m151215_125402_partof_rule', 1450358179),
('m151218_085523_insert_websitepromotion_bid', 1450707565),
('m151221_075500_monthly_costs_in_bid_part', 1450707565);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password_hash`, `role_id`, `auth_key`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$13$AweplNJVEdGxUm7tg.20.OHK8SFX9t/TsRAU05IOabVO7tcRb8/26', 0, '', NULL, 'admin@releaz.nl', 10, 0, 0),
(2, 'projectmanager', '$2y$13$aiojsa4yK1yypqKRNlWKXeluQChymtv8kVctRo.VtK4UpkQRWlaVm', 0, '', NULL, 'projectmanager@releaz.nl', 10, 0, 0),
(3, 'user', '$2y$13$QyeqsipcNtcnrUkjZraVJeP57V7pVONAJBMqatFnXlG7btRftOdMW', 0, '', NULL, 'info@releaz.nl', 10, 0, 0),
(4, 'info@efactive.nl', '$2y$13$oXWEqnXqDDLQxA7W3DK64ubyjvRm6tKm8Cw9avOV.9rGzdAWoO8Ry', 0, 'BKS03iVxl-riQE62CvA0A4D2M6LeUwvw', NULL, 'info@efactive.nl', 10, 1450709810, 1450709810);

-- --------------------------------------------------------

--
-- Table structure for table `user_todo`
--

CREATE TABLE `user_todo` (
`todo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_todo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bid_part`
--
ALTER TABLE `bid_part`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `functionality`
--
ALTER TABLE `functionality`
MODIFY `functionality_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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

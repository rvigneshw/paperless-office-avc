-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2019 at 03:36 PM
-- Server version: 5.7.19
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paperless_office`
--


CREATE DATABASE IF NOT EXISTS `paperless_office`  DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `paperless_office`;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `department`
--

TRUNCATE TABLE `department`;
--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `department_name`) VALUES
(1, 'secretary'),
(2, 'principal'),
(3, 'manager'),
(4, 'CSE'),
(5, 'ECE'),
(6, 'MECH'),
(7, 'EEE'),
(8, 'ICE'),
(9, 'IT'),
(10, 'CIVIL');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_table`
--

DROP TABLE IF EXISTS `expenses_table`;
CREATE TABLE IF NOT EXISTS `expenses_table` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `paper_id` int(10) UNSIGNED NOT NULL,
  `budget_id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `expenses_table_paper_id_foreign` (`paper_id`),
  KEY `expenses_table_budget_id_foreign` (`budget_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `expenses_table`
--

TRUNCATE TABLE `expenses_table`;
-- --------------------------------------------------------

--
-- Table structure for table `fund_tables`
--

DROP TABLE IF EXISTS `fund_tables`;
CREATE TABLE IF NOT EXISTS `fund_tables` (
  `budget_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `deparment_id` int(10) UNSIGNED NOT NULL,
  `year_of_allocation` year(4) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`budget_id`),
  KEY `fund_tables_deparment_id_foreign` (`deparment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `fund_tables`
--

TRUNCATE TABLE `fund_tables`;
--
-- Dumping data for table `fund_tables`
--

INSERT INTO `fund_tables` (`budget_id`, `deparment_id`, `year_of_allocation`, `amount`, `created_at`, `updated_at`) VALUES
(1, 4, 2017, 300000, NULL, NULL),
(2, 5, 2017, 300000, NULL, NULL),
(3, 6, 2017, 300000, NULL, NULL),
(4, 7, 2017, 300000, NULL, NULL),
(5, 8, 2017, 300000, NULL, NULL),
(6, 9, 2017, 300000, NULL, NULL),
(7, 10, 2017, 300000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

DROP TABLE IF EXISTS `papers`;
CREATE TABLE IF NOT EXISTS `papers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `paper_type` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isApproved` tinyint(1) NOT NULL DEFAULT '0',
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `associated_files_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paper_submitted_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `status_of_manager` int(11) NOT NULL,
  `status_of_principal` int(11) NOT NULL,
  `status_of_secretary` int(11) NOT NULL,
  `last_modified_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `papers_paper_type_foreign` (`paper_type`),
  KEY `papers_department_id_foreign` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `papers`
--

TRUNCATE TABLE `papers`;
-- --------------------------------------------------------

--
-- Table structure for table `papertype`
--

DROP TABLE IF EXISTS `papertype`;
CREATE TABLE IF NOT EXISTS `papertype` (
  `paper_type_id` int(10) UNSIGNED NOT NULL,
  `paper_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`paper_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `papertype`
--

TRUNCATE TABLE `papertype`;
--
-- Dumping data for table `papertype`
--

INSERT INTO `papertype` (`paper_type_id`, `paper_type_name`) VALUES
(1, 'Convocation'),
(2, 'Expenditure'),
(3, 'Furniture'),
(4, 'Electrical'),
(5, 'Symposium'),
(6, 'Renovation');

-- --------------------------------------------------------

--
-- Table structure for table `paper_all`
--

DROP TABLE IF EXISTS `paper_all`;
CREATE TABLE IF NOT EXISTS `paper_all` (
  `id` int(10) UNSIGNED DEFAULT NULL,
  `paper_type_name` varchar(255) DEFAULT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `subject` text,
  `isApproved` tinyint(1) DEFAULT NULL,
  `content` longtext,
  `associated_files_path` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `paper_submitted_person` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `status_of_manager` int(11) DEFAULT NULL,
  `status_of_principal` int(11) DEFAULT NULL,
  `status_of_secretary` int(11) DEFAULT NULL,
  `last_modified_person` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `paper_all`
--

TRUNCATE TABLE `paper_all`;
-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

DROP TABLE IF EXISTS `queries`;
CREATE TABLE IF NOT EXISTS `queries` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `paper_id` int(10) UNSIGNED NOT NULL,
  `query` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `on_delete` (`paper_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `queries`
--

TRUNCATE TABLE `queries`;
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `department` int(10) UNSIGNED NOT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `users_department_foreign` (`department`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `designation`, `remember_token`, `department`, `last_login`) VALUES
(1, 'secretary', 'secretary', 'secretary', 'OvhS0BXgNMhdg8yO5L3E0Hfz23NRorrx2cXDssw6kO6JZfCikG6vk4ujKcra', 1, '2018-11-24 13:38:07'),
(2, 'principal', 'principal', 'principal', '0', 2, '2018-11-24 13:38:07'),
(3, 'manager', 'manager', 'manager', 'Dslknv81eSrascleXHktw63R8Y4P7qU1iXuKMnHc9N5BCLZnEisuMD5j4U66', 3, '2018-11-24 13:38:07'),
(4, 'HOD-CSE', 'HOD-CSE', 'HOD-CSE', 'BUfDs83b78GA0cbBQ3UxSszjZgePHJrh3RcJgPMgSA7fwHcrPSUPCsq9CYbQ', 4, '2018-11-24 13:38:07'),
(5, 'HOD-ECE', 'HOD-ECE', 'HOD-ECE', '0', 5, '2018-11-24 13:38:07'),
(6, 'HOD-MECH', 'HOD-MECH', 'HOD-MECH', '0', 6, '2018-11-24 13:38:07'),
(7, 'HOD-EEE', 'HOD-EEE', 'HOD-EEE', '0', 7, '2018-11-24 13:38:07'),
(8, 'HOD-ICE', 'HOD-ICE', 'HOD-ICE', '0', 8, '2018-11-24 13:38:07'),
(9, 'HOD-IT', 'HOD-IT', 'HOD-IT', '0', 9, '2018-11-24 13:38:07'),
(10, 'HOD-CIVIL', 'HOD-CIVIL', 'HOD-CIVIL', '0', 10, '2018-11-24 13:38:08');

--
-- Constraints for dumped tables
--
DROP TABLE IF EXISTS `paper_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `paper_all`  AS  select `papers`.`id` AS `id`,`papertype`.`paper_type_name` AS `paper_type_name`,`department`.`department_name` AS `department_name`,`papers`.`subject` AS `subject`,`papers`.`isApproved` AS `isApproved`,`papers`.`content` AS `content`,`papers`.`associated_files_path` AS `associated_files_path`,`papers`.`priority` AS `priority`,`papers`.`created_at` AS `created_at`,`papers`.`paper_submitted_person` AS `paper_submitted_person`,`papers`.`amount` AS `amount`,`papers`.`status_of_manager` AS `status_of_manager`,`papers`.`status_of_principal` AS `status_of_principal`,`papers`.`status_of_secretary` AS `status_of_secretary`,`papers`.`last_modified_person` AS `last_modified_person`,`papers`.`updated_at` AS `updated_at` from ((`papers` join `papertype`) join `department`) where ((`papers`.`paper_type` = `papertype`.`paper_type_id`) and (`papers`.`department_id` = `department`.`dept_id`)) ;

--
-- Constraints for table `expenses_table`
--
ALTER TABLE `expenses_table`
  ADD CONSTRAINT `expenses_table_budget_id_foreign` FOREIGN KEY (`budget_id`) REFERENCES `fund_tables` (`budget_id`),
  ADD CONSTRAINT `expenses_table_paper_id_foreign` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`id`);

--
-- Constraints for table `fund_tables`
--
ALTER TABLE `fund_tables`
  ADD CONSTRAINT `fund_tables_deparment_id_foreign` FOREIGN KEY (`deparment_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `papers`
--
ALTER TABLE `papers`
  ADD CONSTRAINT `papers_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `papers_paper_type_foreign` FOREIGN KEY (`paper_type`) REFERENCES `papertype` (`paper_type_id`);

--
-- Constraints for table `queries`
--
ALTER TABLE `queries`
  ADD CONSTRAINT `on_delete` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_foreign` FOREIGN KEY (`department`) REFERENCES `department` (`dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

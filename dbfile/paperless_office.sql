-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2019 at 05:51 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `department_name`) VALUES
(1, 'secretary'),
(2, 'principal'),
(3, 'director'),
(4, 'manager\r\n'),
(5, 'ECE'),
(6, 'MECH'),
(7, 'EEE'),
(8, 'ICE'),
(9, 'IT'),
(10, 'CIVIL'),
(11, 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_table`
--

CREATE TABLE `expenses_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `paper_id` int(10) UNSIGNED NOT NULL,
  `budget_id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fund_tables`
--

CREATE TABLE `fund_tables` (
  `budget_id` int(10) UNSIGNED NOT NULL,
  `deparment_id` int(10) UNSIGNED NOT NULL,
  `year_of_allocation` year(4) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `status_of_director` int(11) NOT NULL,
  `status_of_principal` int(11) NOT NULL,
  `status_of_secretary` int(11) NOT NULL,
  `last_modified_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `returned_for_query` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `paper_type`, `department_id`, `subject`, `isApproved`, `content`, `associated_files_path`, `priority`, `created_at`, `paper_submitted_person`, `amount`, `status_of_manager`, `status_of_director`, `status_of_principal`, `status_of_secretary`, `last_modified_person`, `updated_at`, `returned_for_query`) VALUES
(4, 1, 11, 'kjbwjfjodbfdbf', 0, '&lt;p&gt;dlkfodbfdbf&lt;/p&gt;&lt;p&gt;&lt;!--EndFragment--&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/kjbwjfjodbfdbf-1575203478/', 3, '2019-12-01 18:01:18', 'HOD-CSE', 8789, 2, 2, 1, 0, 'director', '2019-12-07 22:46:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `papertype`
--

CREATE TABLE `papertype` (
  `paper_type_id` int(10) UNSIGNED NOT NULL,
  `paper_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Stand-in structure for view `paper_all`
-- (See below for the actual view)
--
CREATE TABLE `paper_all` (
`id` int(10) unsigned
,`paper_type_name` varchar(255)
,`department_name` varchar(255)
,`subject` text
,`isApproved` tinyint(1)
,`content` longtext
,`associated_files_path` varchar(255)
,`priority` int(11)
,`created_at` datetime
,`paper_submitted_person` varchar(255)
,`amount` double
,`status_of_manager` int(11)
,`status_of_director` int(11)
,`status_of_principal` int(11)
,`status_of_secretary` int(11)
,`last_modified_person` varchar(255)
,`updated_at` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(10) UNSIGNED NOT NULL,
  `paper_id` int(10) UNSIGNED NOT NULL,
  `query` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `paper_id`, `query`, `answer`, `created_at`, `updated_at`) VALUES
(6, 4, '<b>manager Asked:</b>kjjasjbdsajbdsajbdsads', '<b>HOD-CSE Answered:</b>ugiudgwdouw', '2019-12-01 18:02:40', '2019-12-01 18:21:56'),
(7, 4, '<b>manager Asked:</b>oheofew', '<b>manager Answered:</b>hjbdkvwevf', '2019-12-07 22:08:43', '2019-12-07 22:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `department` int(10) UNSIGNED NOT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `designation`, `remember_token`, `department`, `last_login`) VALUES
(1, 'secretary', 'secretary', 'secretary', 'OvhS0BXgNMhdg8yO5L3E0Hfz23NRorrx2cXDssw6kO6JZfCikG6vk4ujKcra', 1, '2018-11-24 13:38:07'),
(2, 'principal', 'principal', 'principal', '0', 2, '2018-11-24 13:38:07'),
(3, 'director', 'director', 'director', 'Dslknv81eSrascleXHktw63R8Y4P7qU1iXuKMnHc9N5BCLZnEisuMD5j4U66', 3, '2018-11-24 13:38:07'),
(4, 'manager', 'manager', 'manager', 'BUfDs83b78GA0cbBQ3UxSszjZgePHJrh3RcJgPMgSA7fwHcrPSUPCsq9CYbQ', 4, '2018-11-24 13:38:07'),
(5, 'HOD-ECE', 'HOD-ECE', 'HOD-ECE', '0', 5, '2018-11-24 13:38:07'),
(6, 'HOD-MECH', 'HOD-MECH', 'HOD-MECH', '0', 6, '2018-11-24 13:38:07'),
(7, 'HOD-EEE', 'HOD-EEE', 'HOD-EEE', '0', 7, '2018-11-24 13:38:07'),
(8, 'HOD-ICE', 'HOD-ICE', 'HOD-ICE', '0', 8, '2018-11-24 13:38:07'),
(9, 'HOD-IT', 'HOD-IT', 'HOD-IT', '0', 9, '2018-11-24 13:38:07'),
(10, 'HOD-CIVIL', 'HOD-CIVIL', 'HOD-CIVIL', '0', 10, '2018-11-24 13:38:08'),
(11, 'HOD-CSE', 'HOD-CSE', 'HOD-CSE', '0', 11, '2019-12-01 14:04:03');

-- --------------------------------------------------------

--
-- Structure for view `paper_all`
--
DROP TABLE IF EXISTS `paper_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `paper_all`  AS  select `papers`.`id` AS `id`,`papertype`.`paper_type_name` AS `paper_type_name`,`department`.`department_name` AS `department_name`,`papers`.`subject` AS `subject`,`papers`.`isApproved` AS `isApproved`,`papers`.`content` AS `content`,`papers`.`associated_files_path` AS `associated_files_path`,`papers`.`priority` AS `priority`,`papers`.`created_at` AS `created_at`,`papers`.`paper_submitted_person` AS `paper_submitted_person`,`papers`.`amount` AS `amount`,`papers`.`status_of_manager` AS `status_of_manager`,`papers`.`status_of_director` AS `status_of_director`,`papers`.`status_of_principal` AS `status_of_principal`,`papers`.`status_of_secretary` AS `status_of_secretary`,`papers`.`last_modified_person` AS `last_modified_person`,`papers`.`updated_at` AS `updated_at` from ((`papers` join `papertype`) join `department`) where ((`papers`.`paper_type` = `papertype`.`paper_type_id`) and (`papers`.`department_id` = `department`.`dept_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `expenses_table`
--
ALTER TABLE `expenses_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_table_paper_id_foreign` (`paper_id`),
  ADD KEY `expenses_table_budget_id_foreign` (`budget_id`);

--
-- Indexes for table `fund_tables`
--
ALTER TABLE `fund_tables`
  ADD PRIMARY KEY (`budget_id`),
  ADD KEY `fund_tables_deparment_id_foreign` (`deparment_id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `papers_paper_type_foreign` (`paper_type`),
  ADD KEY `papers_department_id_foreign` (`department_id`);

--
-- Indexes for table `papertype`
--
ALTER TABLE `papertype`
  ADD PRIMARY KEY (`paper_type_id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `on_delete` (`paper_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_department_foreign` (`department`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses_table`
--
ALTER TABLE `expenses_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fund_tables`
--
ALTER TABLE `fund_tables`
  MODIFY `budget_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

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

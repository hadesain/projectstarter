-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2016 at 06:45 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starter_pack`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0bc0c9443c6757a20df71a14d58933792b430e1d', '::1', 1470889690, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437303838393339323b63757272656e7455524c7c733a393a2264617368626f617264223b6261636b55524c7c733a31323a226c6f67696e2f617474656d70223b6d656d6f72795f75726c7c613a303a7b7d6c6f67696e7c613a353a7b733a323a226964223b733a313a2231223b733a383a22757365726e616d65223b733a393a22646576656c6f706572223b733a383a2267726f75705f6964223b733a313a2231223b733a31323a2270726f66696c655f6e616d65223b733a393a22446576656c6f706572223b733a383a226c6f67696e5f6174223b733a31393a22323031362d30382d31312031313a32383a3130223b7d),
('584b480e3c199e446c5e5bf501dd4858b8228d52', '::1', 1470890689, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437303839303533343b63757272656e7455524c7c733a393a2264617368626f617264223b6261636b55524c7c733a32313a2275736572732f67726f7570732f6163636573732f31223b6d656d6f72795f75726c7c613a303a7b7d6c6f67696e7c613a353a7b733a323a226964223b733a313a2231223b733a383a22757365726e616d65223b733a393a22646576656c6f706572223b733a383a2267726f75705f6964223b733a313a2231223b733a31323a2270726f66696c655f6e616d65223b733a393a22446576656c6f706572223b733a383a226c6f67696e5f6174223b733a31393a22323031362d30382d31312031313a32383a3130223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `rowstamps`
--

CREATE TABLE `rowstamps` (
  `rowstamps` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usr_access`
--

CREATE TABLE `usr_access` (
  `id` int(11) NOT NULL,
  `access` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usr_access`
--

INSERT INTO `usr_access` (`id`, `access`) VALUES
(1, 'Groups'),
(2, 'Users');

-- --------------------------------------------------------

--
-- Table structure for table `usr_access_key`
--

CREATE TABLE `usr_access_key` (
  `id` int(11) NOT NULL,
  `access_id` int(11) DEFAULT NULL,
  `access_key` varchar(16) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usr_access_key`
--

INSERT INTO `usr_access_key` (`id`, `access_id`, `access_key`, `description`) VALUES
(1, 1, 'groups_get', 'Lihat data grup'),
(2, 1, 'groups_create', 'Mebuat grup user baru'),
(3, 1, 'groups_edit', 'Mengubah data grup'),
(4, 1, 'groups_access', 'Mengubah hak akses grup'),
(5, 1, 'groups_delete', 'Menghapus data grup'),
(6, 2, 'users_get', 'Melihat data user'),
(7, 2, 'users_create', 'Membuat user baru'),
(8, 2, 'users_edit', 'Mengubah data user'),
(9, 2, 'users_delete', 'Menghapus data user');

-- --------------------------------------------------------

--
-- Table structure for table `usr_groups`
--

CREATE TABLE `usr_groups` (
  `id` int(11) NOT NULL,
  `group` varchar(64) DEFAULT NULL,
  `created_by` varchar(64) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(64) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rowstamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usr_groups`
--

INSERT INTO `usr_groups` (`id`, `group`, `created_by`, `created_at`, `updated_by`, `updated_at`, `rowstamp`) VALUES
(1, 'developer', 'system', '2016-07-31 17:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usr_group_access`
--

CREATE TABLE `usr_group_access` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `access_key` varchar(32) DEFAULT NULL,
  `permission` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usr_group_access`
--

INSERT INTO `usr_group_access` (`id`, `group_id`, `access_key`, `permission`) VALUES
(1, 1, 'groups_get', 1),
(2, 1, 'groups_create', 1),
(3, 1, 'groups_edit', 1),
(4, 1, 'groups_access', 1),
(5, 1, 'groups_delete', 1),
(6, 1, 'users_get', 1),
(7, 1, 'users_create', 1),
(8, 1, 'users_edit', 1),
(9, 1, 'users_delete', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usr_logs`
--

CREATE TABLE `usr_logs` (
  `id` int(11) NOT NULL,
  `username` varchar(64) DEFAULT NULL,
  `attemp` int(11) DEFAULT NULL,
  `success` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usr_users`
--

CREATE TABLE `usr_users` (
  `id` int(11) NOT NULL,
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `profile_name` varchar(64) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_by` varchar(64) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(64) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rowstamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usr_users`
--

INSERT INTO `usr_users` (`id`, `username`, `password`, `group_id`, `profile_name`, `last_login`, `created_by`, `created_at`, `updated_by`, `updated_at`, `rowstamp`) VALUES
(1, 'developer', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'Developer', '2016-08-11 04:28:10', 'system', '2016-07-31 17:00:00', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `usr_access`
--
ALTER TABLE `usr_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usr_access_key`
--
ALTER TABLE `usr_access_key`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usr_groups`
--
ALTER TABLE `usr_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usr_group_access`
--
ALTER TABLE `usr_group_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usr_logs`
--
ALTER TABLE `usr_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usr_users`
--
ALTER TABLE `usr_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usr_access`
--
ALTER TABLE `usr_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usr_access_key`
--
ALTER TABLE `usr_access_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usr_groups`
--
ALTER TABLE `usr_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usr_group_access`
--
ALTER TABLE `usr_group_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usr_logs`
--
ALTER TABLE `usr_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usr_users`
--
ALTER TABLE `usr_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2019 at 08:55 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `calender`
--

CREATE TABLE `calender` (
  `id` int(11) NOT NULL,
  `meeting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `meeting_time` time NOT NULL,
  `lead_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calender`
--

INSERT INTO `calender` (`id`, `meeting_date`, `meeting_time`, `lead_id`, `client_id`, `project_id`) VALUES
(1, '2018-11-12 19:00:00', '13:12:00', 4, 0, 0),
(2, '2018-11-21 19:00:00', '23:01:00', 4, 0, 0),
(3, '2018-11-21 19:00:00', '23:01:00', 4, 0, 0),
(4, '2019-03-10 19:00:00', '23:11:00', 4, 0, 0),
(5, '2019-03-10 19:00:00', '23:11:00', 4, 0, 0),
(6, '2018-11-19 19:00:00', '15:01:00', 4, 0, 0),
(7, '2018-12-02 19:00:00', '11:22:00', 0, 10, 0),
(8, '2018-12-10 19:00:00', '18:45:00', 0, 10, 0),
(9, '2018-12-10 19:00:00', '18:35:00', 4, 0, 0),
(10, '2018-12-30 19:00:00', '18:25:00', 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(150) DEFAULT NULL,
  `client_email` varchar(150) DEFAULT NULL,
  `client_phone` varchar(20) DEFAULT NULL,
  `client_address` varchar(200) DEFAULT NULL,
  `client_city` varchar(30) DEFAULT NULL,
  `client_state` varchar(30) DEFAULT NULL,
  `client_zip` varchar(8) DEFAULT NULL,
  `client_country` varchar(30) DEFAULT NULL,
  `client_source` varchar(30) DEFAULT NULL,
  `client_skype_id` varchar(30) DEFAULT NULL,
  `client_status` int(1) NOT NULL DEFAULT '0',
  `client_login_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_name`, `client_email`, `client_phone`, `client_address`, `client_city`, `client_state`, `client_zip`, `client_country`, `client_source`, `client_skype_id`, `client_status`, `client_login_id`) VALUES
(10, 'Jack Shows', 'jack@snow.com', '777533000', '4th Avenue, Billgates street 2', 'Los angeles', 'California', '92110', 'ENG', 'WEBSITE', 'jack.eer34', 2, 10),
(9, 'Jack Show', 'jack@snow.com', '777533000', '4th Avenue, Billgates street 2', 'Los angeles', 'California', '92110', 'USA', 'WEBSITE', 'jack.eer34', 2, 9),
(4, 'Jack Show', 'jack@snow.com', '777533000', '4th Avenue, Billgates street 2', 'Los angeles', 'California', '92110', 'USA', 'WEBSITE', 'jack.eer34', 3, 4),
(5, 'Jack Show', 'jack@snow.com', '777533000', '4th Avenue, Billgates street 2', 'Los angeles', 'California', '92110', 'USA', 'WEBSITE', 'jack.eer55', 2, 5),
(6, 'Jack Show', 'jack@snow.com', '777533000', '4th Avenue, Billgates street 2', 'Los angeles', 'California', '92110', 'USA', 'WEBSITE', 'jack.eer34', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `client_notes`
--

CREATE TABLE `client_notes` (
  `note_id` int(11) NOT NULL,
  `content` varchar(150) NOT NULL,
  `attachment` varchar(50) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lead`
--

CREATE TABLE `lead` (
  `lead_id` int(11) NOT NULL,
  `lead_name` varchar(200) DEFAULT NULL,
  `lead_email` varchar(200) DEFAULT NULL,
  `lead_phone` varchar(20) DEFAULT NULL,
  `lead_address` varchar(150) DEFAULT NULL,
  `lead_city` varchar(50) DEFAULT NULL,
  `lead_state` varchar(50) DEFAULT NULL,
  `lead_zip` varchar(8) DEFAULT NULL,
  `lead_country` varchar(4) DEFAULT NULL,
  `lead_source` varchar(20) DEFAULT NULL,
  `lead_skype_id` varchar(30) DEFAULT NULL,
  `lead_status` int(1) NOT NULL DEFAULT '0',
  `lead_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead`
--

INSERT INTO `lead` (`lead_id`, `lead_name`, `lead_email`, `lead_phone`, `lead_address`, `lead_city`, `lead_state`, `lead_zip`, `lead_country`, `lead_source`, `lead_skype_id`, `lead_status`, `lead_created`) VALUES
(5, 'Jack Show', 'jack@snow.com', '+923171212542', 'B-19 Block B, Kazimabad ,Karachi', 'Karachi', 'Sindh', '75100', 'USA', 'FREELANCER', 'jack.eer34', 0, '2019-01-01 13:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `lead_notes`
--

CREATE TABLE `lead_notes` (
  `note_id` int(11) NOT NULL,
  `contant` varchar(150) NOT NULL,
  `attachment` varchar(50) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lead_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `login_user` varchar(8) DEFAULT NULL,
  `login_pass` varchar(40) DEFAULT NULL,
  `login_salt` varchar(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_user`, `login_pass`, `login_salt`) VALUES
(1, 'ANNAS', 'c0a84ee6ab8bf06d6dca05e656b956f3', '85f8'),
(2, 'ANNAS', '0e2534a2e883e7cf78779f6e25ddf45c', 'e98e'),
(4, 'annas', 'ccf532ac84914b1e708a1799f40fe82a', '3b26'),
(5, 'jack', '6835424d13dfa413659762317e80fde7', 'd89e'),
(6, 'jack', '3523097c3f2e6ed1a9a5d89ccf814b04', '98a6'),
(9, 'ANNAS', 'e07a354c6ea2d2fe1e1e66293aee773a', 'ef13'),
(10, 'ANNAS', 'f6205ae7d35f6b95e79a01cf64643138', '6a94');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_status` int(5) NOT NULL,
  `project_definition` varchar(200) NOT NULL,
  `project_credential` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `client_id`, `project_status`, `project_definition`, `project_credential`) VALUES
(1, 'POS', 10, 0, 'lalalalala', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `project_notes`
--

CREATE TABLE `project_notes` (
  `note_id` int(11) NOT NULL,
  `contant` varchar(250) NOT NULL,
  `attachment` varchar(150) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `client_notes`
--
ALTER TABLE `client_notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `lead`
--
ALTER TABLE `lead`
  ADD PRIMARY KEY (`lead_id`);

--
-- Indexes for table `lead_notes`
--
ALTER TABLE `lead_notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_notes`
--
ALTER TABLE `project_notes`
  ADD PRIMARY KEY (`note_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calender`
--
ALTER TABLE `calender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `client_notes`
--
ALTER TABLE `client_notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lead`
--
ALTER TABLE `lead`
  MODIFY `lead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lead_notes`
--
ALTER TABLE `lead_notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `project_notes`
--
ALTER TABLE `project_notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

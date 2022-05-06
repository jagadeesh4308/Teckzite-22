-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2022 at 09:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teckzite22`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusrs`
--

CREATE TABLE `adminusrs` (
  `usrSno` int(255) NOT NULL,
  `usrEmail` varchar(255) NOT NULL,
  `usrRole` varchar(255) NOT NULL,
  `usrName` varchar(255) NOT NULL,
  `usrPwd` varchar(255) NOT NULL,
  `usrPriority` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminusrs`
--

INSERT INTO `adminusrs` (`usrSno`, `usrEmail`, `usrRole`, `usrName`, `usrPwd`, `usrPriority`) VALUES
(1, 'n170142@rguktn.ac.in', 'convenor', 'president@tz', '202cb962ac59075b964b07152d234b70', 1),
(2, 'n170143@rguktn.ac.in', 'manager', 'events@manager', '202cb962ac59075b964b07152d234b70', 2),
(3, 'n170144@rguktn.ac.in', 'coordinator', 'cse@coordinator', '202cb962ac59075b964b07152d234b70', 3),
(4, 'n170145@rguktn.ac.in', 'organizer', 'sql master@organizer', '202cb962ac59075b964b07152d234b70', 4),
(5, 'n170146@rguktn.ac.in', 'coordinator', 'ece@coordinator', '202cb962ac59075b964b07152d234b70', 3),
(6, 'n170147@rguktn.ac.in', 'organizer', 'anology@organizer', '202cb962ac59075b964b07152d234b70', 4),
(7, 'n170148@rguktn.ac.in', 'coordinator', 'civil@coordinator', '202cb962ac59075b964b07152d234b70', 3),
(8, 'n170149@rguktn.ac.in', 'organizer', 'metacivil@organizer', '202cb962ac59075b964b07152d234b70', 4),
(9, 'n170150@rguktn.ac.in', 'organizer', 'webthala@organizer', '202cb962ac59075b964b07152d234b70', 4),
(10, 'jaga@gmail.com', 'manager', 'infra@manager', '202cb962ac59075b964b07152d234b70', 2),
(11, 'j142@gmail.com', 'coordinator', 'mech@coordinator', '202cb962ac59075b964b07152d234b70', 3),
(12, 'j45@gmail.com', 'organizer', 'pixelz@organizer', '202cb962ac59075b964b07152d234b70', 4),
(13, 'j431@gmail.com', 'organizer', 'code ranger@organizer', '202cb962ac59075b964b07152d234b70', 4),
(14, 'j789@gmail.com', 'organizer', 'hackathon@organizer', '202cb962ac59075b964b07152d234b70', 4),
(15, 'chem@gmail.com', 'coordinator', 'chem@coordinator', '202cb962ac59075b964b07152d234b70', 3),
(16, 'thon@gmail.com', 'organizer', 'chemithon@organizer', '202cb962ac59075b964b07152d234b70', 4),
(17, 'renuka112@gmail.com', 'organizer', 'codemarathon@organizer', '202cb962ac59075b964b07152d234b70', 4);

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `eveSno` int(255) NOT NULL,
  `eveID` varchar(255) NOT NULL,
  `eveName` varchar(255) NOT NULL,
  `eveDepartment` varchar(255) NOT NULL,
  `eveImg` varchar(100) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `structure` text DEFAULT NULL,
  `timeline` text DEFAULT NULL,
  `faq` text DEFAULT NULL,
  `rules` text DEFAULT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `sponImg` varchar(100) DEFAULT NULL,
  `isRegistrationsOpened` int(10) NOT NULL DEFAULT 0,
  `minTeam` int(10) NOT NULL DEFAULT 1,
  `maxTeam` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`eveSno`, `eveID`, `eveName`, `eveDepartment`, `eveImg`, `about`, `structure`, `timeline`, `faq`, `rules`, `contact_info`, `sponImg`, `isRegistrationsOpened`, `minTeam`, `maxTeam`) VALUES
(1, 'TZCS01', 'sql master', 'cse', 'Screenshot from 2022-03-10 22-22-08.png', 'some about to be and held ghg g h gh hgc hfhfhfg trail', 'dd hj hgm ghmgj gjkg gj mg gb mgbb gb g mkggjj jhkxd', 'fg gfdxn gh fc fgcg fghd dgh nm', 'xkjgkd given kxjld kljdgks xnbk, jaffa', 'some rules to be  ghjj jagga', ' tyh jhkj info and regards given that there was a such a estaime', 'Screenshot from 2022-04-02 13-41-46.png', 0, 3, 6),
(2, 'TZCS01', 'anology', 'ece', NULL, 'anology  about hello', 'hik nkdfjlg ', 'hkgjj', 'kk;', 'anology rules', '', 'Screenshot from 2022-03-10 22-22-08.png', 0, 1, 1),
(3, 'TZCS01', 'metacivil', 'civil', NULL, 'meta civil events', NULL, NULL, NULL, 'meta civil rules go', NULL, NULL, 0, 1, 1),
(4, 'TZCS01', 'webthala', 'cse', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1),
(5, 'TZCS01', 'pixelz', 'cse', NULL, 'pixels sbout', NULL, NULL, NULL, 'pixels rules', NULL, NULL, 0, 1, 1),
(6, 'TZCS03', 'code ranger', 'cse', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1),
(7, 'TZCS05', 'hackathon', 'cse', 'Screenshot from 2022-03-11 10-46-33.png', '', '', '', '', '', 'hello contact here', NULL, 1, 1, 1),
(8, 'TZCHE01', 'chemithon', 'chem', 'Screenshot from 2022-04-02 13-41-46.png', 'about chemithon', '', '', '', '123', '', NULL, 0, 1, 1),
(9, 'TZCS06', 'codemarathon', 'cse', 'Screenshot from 2022-03-11 10-46-27.png', 'jhjhd hkjkfd ', 'ljkjfd', '', '', '', '', 'crop.jpg', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `eventsRegistrations`
--

CREATE TABLE `eventsRegistrations` (
  `sno` int(10) NOT NULL,
  `eveName` varchar(255) NOT NULL,
  `members` varchar(255) NOT NULL,
  `acceptedBy` varchar(255) DEFAULT NULL,
  `rejectedBy` varchar(255) DEFAULT NULL,
  `status` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventsRegistrations`
--

INSERT INTO `eventsRegistrations` (`sno`, `eveName`, `members`, `acceptedBy`, `rejectedBy`, `status`) VALUES
(1, 'sql master', 'TZ00001_TZ0002_TZ00004_TZ000005', 'TZ00001', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tzUsrs`
--

CREATE TABLE `tzUsrs` (
  `sno` int(11) NOT NULL,
  `tzID` varchar(255) NOT NULL,
  `usrEmail` varchar(255) NOT NULL,
  `usrName` varchar(255) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `collegeName` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `isProfileUpdated` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tzUsrs`
--

INSERT INTO `tzUsrs` (`sno`, `tzID`, `usrEmail`, `usrName`, `state`, `town`, `collegeName`, `year`, `branch`, `isProfileUpdated`) VALUES
(11, 'TZ00001', 'jagadeesh4308@gmail.com', 'Jagadeesh Koppula', '', '', '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusrs`
--
ALTER TABLE `adminusrs`
  ADD PRIMARY KEY (`usrSno`);

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`eveSno`);

--
-- Indexes for table `eventsRegistrations`
--
ALTER TABLE `eventsRegistrations`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `tzUsrs`
--
ALTER TABLE `tzUsrs`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminusrs`
--
ALTER TABLE `adminusrs`
  MODIFY `usrSno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `eveSno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `eventsRegistrations`
--
ALTER TABLE `eventsRegistrations`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tzUsrs`
--
ALTER TABLE `tzUsrs`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

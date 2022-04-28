-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2022 at 05:31 PM
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
(12, 'j45@gmail.com', 'organizer', 'pixelz@organizer', '202cb962ac59075b964b07152d234b70', 4);

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
  `sponImg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`eveSno`, `eveID`, `eveName`, `eveDepartment`, `eveImg`, `about`, `structure`, `timeline`, `faq`, `rules`, `contact_info`, `sponImg`) VALUES
(1, 'TZCS01', 'sql master', 'cse', NULL, 'some about to be and held ghg g h gh hgc hfhfhfg trail', 'dd hj hgm ghmgj gjkg gj mg gb mgbb gb g mkggjj jhkxd', ' fg gfdxn gh fc fgcg fghd dgh nm', 'xkjgkd given kxjld kljdgks xnbk, jaffa', 'some rules to be  ghjj jagga', ' tyh jhkj info and regards given', 'crop.jpg'),
(2, 'TZCS01', 'anology', 'ece', NULL, 'anology  about hello', 'hik nkdfjlg ', 'hkgjj', 'kk;', 'anology rules', '', 'Screenshot from 2022-03-10 22-22-08.png'),
(3, 'TZCS01', 'metacivil', 'civil', NULL, 'meta civil events', NULL, NULL, NULL, 'meta civil rules go', NULL, NULL),
(4, 'TZCS01', 'webthala', 'cse', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'TZCS01', 'pixelz', 'cse', NULL, 'pixels sbout', NULL, NULL, NULL, 'pixels rules', NULL, NULL);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminusrs`
--
ALTER TABLE `adminusrs`
  MODIFY `usrSno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `eveSno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

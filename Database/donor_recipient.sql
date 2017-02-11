-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2017 at 11:42 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donor_recipient`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor_details`
--

CREATE TABLE `donor_details` (
  `count` int(1) NOT NULL,
  `D_ID` varchar(10) NOT NULL,
  `D_Name` text NOT NULL,
  `D_DOB` date NOT NULL,
  `D_Gender` char(1) NOT NULL,
  `D_AadharNo` varchar(16) NOT NULL,
  `D_BloodGroup` varchar(3) NOT NULL,
  `D_Organ` varchar(20) NOT NULL,
  `D_PhoneNo` varchar(10) NOT NULL,
  `D_Address` varchar(50) NOT NULL,
  `D_MedicalReport` varchar(50) NOT NULL,
  `D_IdProof` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ID` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recipient_details`
--

CREATE TABLE `recipient_details` (
  `count` int(1) NOT NULL,
  `R_ID` varchar(10) NOT NULL,
  `R_Name` text NOT NULL,
  `R_DOB` date NOT NULL,
  `R_Gender` char(1) NOT NULL,
  `R_AadharNo` varchar(16) NOT NULL,
  `R_BloodGroup` varchar(3) NOT NULL,
  `R_Organ` varchar(20) NOT NULL,
  `R_PhoneNo` varchar(10) NOT NULL,
  `R_Address` varchar(50) NOT NULL,
  `R_MedicalReport` varchar(50) NOT NULL,
  `R_IdProof` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor_details`
--
ALTER TABLE `donor_details`
  ADD PRIMARY KEY (`count`),
  ADD UNIQUE KEY `D_ID` (`D_ID`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `email` (`email_id`);

--
-- Indexes for table `recipient_details`
--
ALTER TABLE `recipient_details`
  ADD PRIMARY KEY (`count`),
  ADD UNIQUE KEY `R_ID` (`R_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor_details`
--
ALTER TABLE `donor_details`
  MODIFY `count` int(1) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recipient_details`
--
ALTER TABLE `recipient_details`
  MODIFY `count` int(1) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

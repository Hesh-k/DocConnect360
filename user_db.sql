-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 08:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_reg`
--

CREATE TABLE `admin_reg` (
  `admin_ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_reg`
--

INSERT INTO `admin_reg` (`admin_ID`, `name`, `email`, `password`, `cpassword`, `user_type`) VALUES
(1, 'hesh', 'hesh@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pnumber` bigint(10) NOT NULL,
  `nic` varchar(13) NOT NULL,
  `birthday` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(50) NOT NULL,
  `user_type` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `fname`, `lname`, `email`, `pnumber`, `nic`, `birthday`, `gender`, `password`, `cpassword`, `user_type`) VALUES
(5, 'hesh', 'kodi', 'hesh@gmail.com', 714259878, '200034904611v', '2023-06-13', 'male', 'fcea920f7412b5da7be0cf42b8c93759', '', 'user'),
(6, 'kasun', 'kodi', 'kasun@gmailcom', 714259878, '200034904611v', '2023-06-27', 'female', '81dc9bdb52d04dc20036dbd8313ed055', '', 'admin'),
(7, 'hesh', 'kodi', 'gg@gmail.com', 71, '200034904611v', '2023-06-15', 'male', '289dff07669d7a23de0ef88d2f7129e7', '', 'user'),
(8, 'lana', 'jaya', 'lana@gmail.com', 714259878, '200034904611v', '2023-06-28', 'male', '81dc9bdb52d04dc20036dbd8313ed055', '', 'user'),
(9, 'lak', 'shan', 'lakshan@gmail.com', 714259878, '200034904611v', '2023-06-21', 'female', '202cb962ac59075b964b07152d234b70', '', 'user'),
(10, 'hesh', 'kodi', 'rathu@gmail.com', 714259878, '200034904611', '2023-06-13', 'male', '202cb962ac59075b964b07152d234b70', '', 'user'),
(12, 'ash', 'kodi', 'kas@gmail.com', 94763218252, '200034904611', '2023-06-29', 'female', '81dc9bdb52d04dc20036dbd8313ed055', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_reg`
--
ALTER TABLE `admin_reg`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_reg`
--
ALTER TABLE `admin_reg`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

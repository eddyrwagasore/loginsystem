-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 24, 2021 at 12:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `card_activation`
--

CREATE TABLE `card_activation` (
  `id` int(10) NOT NULL,
  `u_card` varchar(12) NOT NULL,
  `u_f_name` text NOT NULL,
  `u_l_name` text NOT NULL,
  `u_father` text NOT NULL,
  `u_aadhar` varchar(12) NOT NULL,
  `u_birthday` text NOT NULL,
  `u_gender` varchar(6) NOT NULL,
  `u_email` text NOT NULL,
  `u_phone` varchar(10) NOT NULL,
  `u_state` varchar(255) NOT NULL,
  `u_dist` text NOT NULL,
  `u_village` text NOT NULL,
  `u_police` text NOT NULL,
  `u_pincode` text NOT NULL,
  `file` longblob NOT NULL DEFAULT '1.svg',
  `u_mother` varchar(30) NOT NULL,
  `u_family` text NOT NULL,
  `staff_id` varchar(12) NOT NULL,
  `image` varchar(150) NOT NULL,
  `uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_activation`
--

INSERT INTO `card_activation` (`id`, `u_card`, `u_f_name`, `u_l_name`, `u_father`, `u_aadhar`, `u_birthday`, `u_gender`, `u_email`, `u_phone`, `u_state`, `u_dist`, `u_village`, `u_police`, `u_pincode`, `file`, `u_mother`, `u_family`, `staff_id`, `image`, `uploaded`) VALUES
(102, 'Lavkush', 'adsfasdf', 'asdfadf', 'asdf', '', '', '', '', 'asdf', '', '', '', '', '', '', 'aadsf', '', '', '', '2021-01-16 12:47:17'),
(103, '123333333333', 'Kush ', 'singh', '', '', '', 'Choose', '', '1222222222', 'Choose...', '', '', '', '', '', '', '', '', 'vandana_photo.jpeg', '2021-01-16 12:52:59'),
(106, '1234567890', 'Ilunga', 'Gisa', 'Daniel', '1234567890', '1994-08-26', 'Female', 'daniel@gamil.com', '1234567890', 'Delhi', 'mugogo', '123 Gisa Danie', 'Gisa', '44', 0x312e737667, 'danielerat', '3', '1234256', 'chatapplication.png', '2021-08-13 08:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `reservation_date` varchar(200) DEFAULT NULL,
  `reservation_time` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `first_name`, `last_name`, `email`, `phone`, `reservation_date`, `reservation_time`) VALUES
(1, 'Ilunga', 'gisa ', 'danielerat45@gmail.com', '98y5456789', '2021-08-13', '3'),
(2, 'Reservationtwo', 'Ilunga', 'daniele@gmail.com', '987654345678', '2021-08-20', '2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `hashed_password`) VALUES
(2, 'danielerat', 'danielerat', 'danielerat', 'davidodo2015@gmail.com', '$2y$10$lz5ECgxqQUDbbVT0bh0Iz.9s/dVgM7dhr4woQ/5Hoa70kp794R8eW'),
(7, 'ishimael', 'ndayambaje', 'ishimael', 'ishimael123@gmail.com', '$2y$10$jQynkYhv9.XO4IaBRBsk3OuebqGaoIgYAjHqiJtu3dZ9F1gWJovPK'),
(8, 'adsfkdfkf', 'sdlkfsad', 'flkasdfjkfdk', 'danielerat45@gmail.com', '$2y$10$ESgA72/rpkQkhyIzk21rIeyWiRD8DJyhX/01OPoeYDVNjKZMu9tu.'),
(9, 'theo', 'theotheo', 'theotheo', 'theo@theo.theo', '$2y$10$RTCwbtZuMyo8CSuXjfhr2uESyPGkjrA/.EHw9PMstorsW.JtAyX52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_activation`
--
ALTER TABLE `card_activation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card_activation`
--
ALTER TABLE `card_activation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

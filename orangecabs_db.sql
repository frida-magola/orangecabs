-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2018 at 01:11 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orangecabs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment_driver`
--

CREATE TABLE `assignment_driver` (
  `assignment_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `drive_id` int(11) NOT NULL,
  `departure_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `origine` int(50) NOT NULL,
  `destionation` varchar(50) NOT NULL,
  `current_location` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `postalcode` varchar(20) NOT NULL,
  `status_payement` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `carbrand` varchar(11) NOT NULL,
  `seatavailable` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `departureLongitude` varchar(30) NOT NULL,
  `departureLatitude` varchar(30) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `destinationLatitude` varchar(30) NOT NULL,
  `destinationLongitude` varchar(30) NOT NULL,
  `moreinformation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `name`, `carbrand`, `seatavailable`, `driver_id`, `departure`, `departureLongitude`, `departureLatitude`, `destination`, `destinationLatitude`, `destinationLongitude`, `moreinformation`) VALUES
(1, 'third post', 'cristly', 2, 0, '', '', '', '', '', '', ''),
(2, 'NIVA', '4x4', 5, 0, '', '', '', '', '', '', ''),
(3, 'ranger', '4x4', 6, 0, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `username`, `mobile`, `email`) VALUES
(1, 'Mzi', 638206725, 'mzi@co.za'),
(2, 'ruth sitinga', 2147483647, 'sitinga@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `forgotpassword`
--

CREATE TABLE `forgotpassword` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activation_key` varchar(64) NOT NULL,
  `time` int(11) NOT NULL,
  `status` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forgotpassword`
--

INSERT INTO `forgotpassword` (`id`, `user_id`, `activation_key`, `time`, `status`) VALUES
(13, 56, '$2y$10$WP5qrAlmICPWxOLfVRgx7ec5qtsXaPzw0O3f6Hz2Z4Gc2F/B3ARvG', 1538567192, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `nofication`
--

CREATE TABLE `nofication` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking` int(11) NOT NULL,
  `payement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payement`
--

CREATE TABLE `payement` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `location` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rememberme`
--

CREATE TABLE `rememberme` (
  `id` int(11) NOT NULL,
  `authentificator1` char(12) NOT NULL,
  `f2authentificator2` char(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `timetable_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `trip_id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `departure` char(30) DEFAULT NULL,
  `departureLatitude` float NOT NULL,
  `departureLongitude` float NOT NULL,
  `destination` char(30) DEFAULT NULL,
  `destinationLatitude` float NOT NULL,
  `destinationLongitude` float NOT NULL,
  `distance` varchar(30) NOT NULL,
  `duration` varchar(30) NOT NULL,
  `amountofriders` int(11) NOT NULL,
  `nameofonerider` varchar(20) NOT NULL,
  `price` varchar(20) DEFAULT NULL,
  `seatsavailable` char(2) DEFAULT NULL,
  `regular` char(1) DEFAULT NULL,
  `status_pay` char(10) DEFAULT 'unpaid',
  `date` datetime DEFAULT NULL,
  `time` char(10) DEFAULT NULL,
  `monday` char(1) DEFAULT NULL,
  `tuesday` char(1) DEFAULT NULL,
  `wednesday` char(1) DEFAULT NULL,
  `thursday` char(1) DEFAULT NULL,
  `friday` char(1) DEFAULT NULL,
  `saturday` char(1) DEFAULT NULL,
  `sunday` char(1) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`trip_id`, `user_id`, `departure`, `departureLatitude`, `departureLongitude`, `destination`, `destinationLatitude`, `destinationLongitude`, `distance`, `duration`, `amountofriders`, `nameofonerider`, `price`, `seatsavailable`, `regular`, `status_pay`, `date`, `time`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `is_delete`) VALUES
(6, 56, 'Bellville, Cape Town, South Af', -33.8943, 18.6294, 'Love Life Langa Centre - P.P.A', -33.9445, 18.5315, '', '', 0, '2', '', NULL, NULL, 'unpaid', '1970-01-01 01:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, 56, 'River Hamlet on Gie Road in Ta', -33.8195, 18.519, 'Bayside Mall, Blaauwberg Road,', -33.8228, 18.4894, '3.1 km', '6 mins', 3, 'nyira k', '26.40', NULL, NULL, 'unpaid', '1970-01-01 01:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, 56, 'River Hamlet on Gie Road in Ta', -33.8195, 18.519, 'Milestone Studios, Cape Town,', -33.9255, 18.4151, '22.9 km', '26 mins', 2, 'deby', '193.60', NULL, NULL, 'unpaid', '2018-10-14 05:56:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(9, 56, 'Western Cape, South Africa', -33.2278, 21.8569, 'Big Bay Boulevard, Cape Farms,', -33.7923, 18.4676, '417 km', '4 hours 55 mins', 1, 'mireille', '3669.60', NULL, NULL, 'unpaid', '2018-10-16 07:57:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(10, 56, 'Cape Town, South Africa', -33.9249, 18.4241, 'Johannesburg, South Africa', -26.2041, 28.0473, '1,398 km', '13 hours 46 mins', 3, 'kasongo', '12302.40', NULL, NULL, 'unpaid', '2018-10-15 08:04:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(11, 56, 'sea point', -33.917, 18.3875, 'Parklands, Cape Town, South Af', -33.8133, 18.5003, '22.9 km', '30 mins', 2, 'mbuyu', '193.60', NULL, NULL, 'unpaid', '2018-10-15 10:10:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(12, 56, 'kolwezi', -10.7275, 25.5089, 'Likasi, Democratic Republic of', -10.9884, 26.7379, '175 km', '2 hours 29 mins', 4, 'kabuiza', '1540.00', NULL, NULL, 'unpaid', '2018-10-15 05:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(13, 61, 'Bedford, UK', 52.136, -0.466655, 'London, UK', 51.5074, -0.127758, '91.7 km', '1 hour 31 mins', 5, 'once-off', '800.80', NULL, NULL, 'unpaid', '2018-10-18 11:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(14, 61, 'Bromham, UK', 52.1511, -0.52602, 'London, UK', 51.5074, -0.127758, '92.5 km', '1 hour 30 mins', 3, 'london', '809.60', NULL, NULL, 'unpaid', '1970-01-01 01:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(15, 61, 'Kempston, Bedford, UK', 52.1179, -0.496792, 'Croydon, UK', 51.3762, -0.098234, '149 km', '1 hour 51 mins', 3, 'kasonga', '1311.20', NULL, NULL, 'unpaid', '2018-10-24 11:22:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(16, 61, 'Pretoria, South Africa', -25.7479, 28.2293, 'Cape Town, South Africa', -33.9249, 18.4241, '1,455 km', '14 hours 22 mins', 3, 'Me test', '12804.00', NULL, NULL, 'unpaid', '1970-01-01 01:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(17, 61, 'Bellville, Cape Town, South Af', -33.8943, 18.6294, 'Table View, Cape Town, South A', -33.8275, 18.4948, '20.4 km', '22 mins', 3, 'nyira', '176.00', NULL, NULL, 'unpaid', '1970-01-01 01:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(18, 61, 'Parklands, Cape Town, South Af', -33.8133, 18.5003, 'Table View, Cape Town, South A', -33.8275, 18.4948, '2.6 km', '6 mins', 21, 'deby', '17.60', NULL, NULL, 'unpaid', '2018-10-23 01:48:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(19, 61, 'George, South Africa', -33.9881, 22.453, 'Riversdale, South Africa', -34.0317, 21.2487, '139 km', '1 hour 30 mins', 34, 'travel', '1223.20', NULL, NULL, 'unpaid', '2018-10-17 02:02:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(20, 61, 'Aberdeen, South Africa', -32.4762, 24.0369, 'Middelburg, South Africa', -25.7699, 29.4639, '1,045 km', '9 hours 52 mins', 34, 'travel2', '9196.00', NULL, NULL, 'unpaid', '2018-10-17 02:15:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(21, 61, 'Mafeteng, Lesotho', -29.8224, 27.2388, 'Maseru, Lesotho', -29.3151, 27.4869, '77.1 km', '1 hour 20 mins', 23, 'test', '677.60', NULL, NULL, 'unpaid', '2018-10-24 02:15:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` char(6) NOT NULL,
  `opt_hash` longtext NOT NULL,
  `verify` int(11) NOT NULL,
  `moreinformation` varchar(300) NOT NULL,
  `password` varchar(64) NOT NULL,
  `profilepicture` varchar(55) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `mobile`, `email`, `gender`, `opt_hash`, `verify`, `moreinformation`, `password`, `profilepicture`, `role`) VALUES
(56, 'Nyira', '0627495036', 'mwalilanyira@gmail.com', '', '', 1, '', 'ed36a6f4b79d7a60fa5b6689d1e4903ba777b3c49b5d58c57bc9b22fe9fbb6eb', 'profilepicture/30239f5145c36383275db0575331629f.png', ''),
(57, 'mwalilanyira@yahoo.com', '06274950364', 'mwalilanyira@yahoo.com', '', '$2y$10$1FnC7vDUFOJKVfWoyPZZkOCNNF3//Bj6OSI18nVbV/VPC8XAqnhJK', 0, '', 'ed36a6f4b79d7a60fa5b6689d1e4903ba777b3c49b5d58c57bc9b22fe9fbb6eb', '', ''),
(58, 'mwalila nyira', '062749503643', 'juniorkabemba82@gmail.com', '', '$2y$10$/dsxU5opZ7txkN.Vr19Yn.fxCeoLMhdaIYP2/auvX4ty33pmGY4E6', 0, '', 'ed36a6f4b79d7a60fa5b6689d1e4903ba777b3c49b5d58c57bc9b22fe9fbb6eb', '', ''),
(59, 'joel', '0345678912', 'joel@gmail.com', '', '$2y$10$6QmMeIw.he6onDXOsLCUFu/Tig9igGwkVgsUGD3Xo3vrIogOOf1Vy', 0, '', 'ed36a6f4b79d7a60fa5b6689d1e4903ba777b3c49b5d58c57bc9b22fe9fbb6eb', '', ''),
(60, 'Sihle Tshabalala', '0743753767', 'sihle@quirky30.co.za', '', '$2y$10$XlY9Py87kCHtbbQgoaAb2e.XiB58rDXOGIaThTb3cczzVfcHrk3U2', 0, '', '1a210f97843ba958c1e1b1c91083c6479263eb8ee1850ce07b7a199bb6fdac71', '', ''),
(61, 'Nwabisa', '0638206725', 'nwabisa@quirky30.co.za', '', '', 1, '', 'ad8e043a7e412c340e0662df170b614985731fca83c6919215260c59402e10b4', 'profilepicture/d27f9e639a26fd6e5abe951a976b0189.png', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment_driver`
--
ALTER TABLE `assignment_driver`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nofication`
--
ALTER TABLE `nofication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payement`
--
ALTER TABLE `payement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rememberme`
--
ALTER TABLE `rememberme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`timetable_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`trip_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment_driver`
--
ALTER TABLE `assignment_driver`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nofication`
--
ALTER TABLE `nofication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payement`
--
ALTER TABLE `payement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rememberme`
--
ALTER TABLE `rememberme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `timetable_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `trip_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

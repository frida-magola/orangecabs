-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2018 at 09:02 AM
-- Server version: 10.1.36-MariaDB
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
-- Database: `orangecabs_db`
--

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
  `vehicule_model` int(11) NOT NULL,
  `seatavailable` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `vehicule_registration` varchar(50) NOT NULL,
  `vehicule_licenceN` varchar(50) NOT NULL,
  `rate_per_km` varchar(20) NOT NULL,
  `status_car` varchar(20) NOT NULL DEFAULT 'A',
  `date_add` datetime NOT NULL,
  `date_pickup` datetime NOT NULL,
  `date_dropof` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `vehicule_model`, `seatavailable`, `driver_id`, `picture`, `vehicule_registration`, `vehicule_licenceN`, `rate_per_km`, `status_car`, `date_add`, `date_pickup`, `date_dropof`) VALUES
(12, 2, 2, 65, 'profilepicture/a828b847c808f9fcda399ccbc8f9f82d.jpg', 'hgfhg65445', '645625426ghfg', '50km', 'A', '2018-11-09 13:39:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 2, 3, 63, 'profilepicture/58902453586aa819313bf8d644e12ccb.png', 'hgfhg6541', '563578b x23', '12km', 'A', '2018-11-09 13:41:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 2, 4, 72, 'profilepicture/0167567b205ca4956f98893192de2d8a.jpg', 'hgfhg6542345', '563578b x23456', '80km', 'A', '2018-11-13 15:53:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 5, 4, 61, 'profilepicture/43df3e7c2c1541e4bfeb5bd1e6803817.jpg', 'hgfhg65423erd', '563578b xtrygh', '70km', 'A', '2018-11-15 10:24:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `status` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `status`, `timestamp`) VALUES
(1, 74, 74, 'heloo', 1, '0000-00-00 00:00:00'),
(2, 74, 74, 'hello', 1, '0000-00-00 00:00:00'),
(3, 74, 74, 'hello', 1, '0000-00-00 00:00:00'),
(4, 74, 74, 'hello hi', 1, '0000-00-00 00:00:00'),
(5, 76, 76, 'hello', 1, '0000-00-00 00:00:00'),
(6, 74, 74, 'hello', 1, '0000-00-00 00:00:00'),
(7, 74, 74, 'hello', 1, '0000-00-00 00:00:00'),
(8, 75, 75, 'hello', 1, '0000-00-00 00:00:00'),
(9, 74, 74, 'great', 1, '0000-00-00 00:00:00'),
(10, 74, 74, 'hellol', 1, '0000-00-00 00:00:00'),
(11, 74, 74, 'yambo', 1, '0000-00-00 00:00:00'),
(12, 75, 75, 'mira', 1, '0000-00-00 00:00:00'),
(13, 75, 75, 'ndije', 1, '0000-00-00 00:00:00'),
(14, 74, 74, 'hello', 2147483647, '0000-00-00 00:00:00'),
(15, 74, 74, 'great great', 1, '2018-11-24 19:16:11'),
(16, 75, 74, 'hello', 0, '2018-11-25 14:14:12'),
(17, 75, 74, 'bomnh', 0, '2018-11-25 14:14:12'),
(18, 74, 75, 'nidje', 0, '2018-11-25 14:14:12'),
(19, 75, 74, 'good afternoon', 0, '2018-11-25 14:14:12'),
(20, 74, 75, 'how are you?', 0, '2018-11-25 14:14:12'),
(21, 75, 74, 'i am good and you?', 0, '2018-11-25 14:14:12'),
(22, 75, 74, 'hello', 0, '2018-11-25 14:17:12'),
(23, 75, 74, 'comment', 0, '2018-11-25 14:17:12'),
(24, 74, 75, 'oui ca va bien', 0, '2018-11-25 14:17:38'),
(25, 74, 75, 'comment etait le service', 0, '2018-11-25 14:17:53'),
(26, 74, 75, 'comment ca ne marche', 0, '2018-11-25 14:48:23'),
(27, 74, 75, 'heh whay', 0, '2018-11-25 16:09:52'),
(28, 75, 74, 'and you', 0, '2018-11-25 16:10:39'),
(29, 74, 75, 'quiet', 0, '2018-11-25 16:12:27'),
(30, 74, 75, 'cool', 0, '2018-11-25 16:13:22'),
(31, 75, 74, 'i m not goog', 0, '2018-11-25 17:00:01'),
(32, 74, 75, 'herllokjgh', 0, '2018-11-25 19:47:30'),
(33, 75, 74, 'helolo', 0, '2018-11-25 19:47:52'),
(34, 75, 74, '🙃🤓', 0, '2018-11-25 21:00:29'),
(35, 74, 75, '😁 hello\n', 0, '2018-11-25 21:05:51'),
(36, 75, 74, '🙃🤓 cava', 0, '2018-11-25 21:06:14'),
(37, 75, 74, 'hello 😛', 0, '2018-11-25 21:06:54'),
(38, 74, 75, 'heloo😏🙁', 0, '2018-11-25 21:12:51'),
(39, 75, 74, 'clo😜', 0, '2018-11-25 21:13:15'),
(40, 74, 75, '😄hfghhfggh', 0, '2018-11-26 07:33:51'),
(41, 75, 74, 'gfgfhgfg😆', 0, '2018-11-26 07:37:46'),
(42, 76, 75, 'hello', 0, '2018-11-26 12:05:37'),
(43, 74, 75, 'heloo', 0, '2018-12-02 18:05:52'),
(44, 75, 74, 'fehtjl', 0, '2018-12-04 14:13:40'),
(45, 75, 74, 'deghy', 0, '2018-12-04 14:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `content_notification`
--

CREATE TABLE `content_notification` (
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date_add` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_notification`
--

INSERT INTO `content_notification` (`content_id`, `user_id`, `description`, `date_add`) VALUES
(2, 74, 'efdfd', '0000-00-00 00:00:00'),
(3, 74, 'hello', '0000-00-00 00:00:00'),
(4, 74, 'hello', '0000-00-00 00:00:00'),
(5, 74, 'hello', '0000-00-00 00:00:00'),
(6, 74, 'hellololo', '0000-00-00 00:00:00'),
(7, 74, '', '0000-00-00 00:00:00'),
(8, 0, 'lasss', '2018-11-20 15:48:36'),
(9, 74, 'hi', '2018-11-20 19:59:46'),
(10, 74, 'best', '2018-11-20 20:16:26'),
(11, 74, 'sdhsdfjgfggjdfkhy', '2018-11-20 21:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `car_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_adddriver` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `date_delete` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_name`, `username`, `mobile`, `email`, `car_id`, `trip_id`, `payment`, `status`, `date_adddriver`, `date_update`, `date_delete`) VALUES
(1, '', 'Mzi', 638206725, 'mzi@co.za', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '', 'ruth sitinga', 2147483647, 'sitinga@gmail.com', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'nyira', 'root', 2147483647, 'mwalilanyira@gmail.com', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'nyira', 'mira', 989765434, 'mwalila@gmail.com', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'nyira', 'mira', 989765434, 'mwalila@gmail.com', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'nyira', 'mira', 989765434, 'mwalila@gmail.com', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'nyira', 'mira', 989765434, 'mwalila@gmail.com', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'nyira', 'mira', 989765434, 'mwalila@gmail.com', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'nyira', 'mira', 989765434, 'mwalila@gmail.com', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'nyira', 'mira', 989765434, 'mwalila@gmail.com', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'nyira', 'mira', 989765434, 'mwalila@gmail.com', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'nyira', 'mira', 989765434, 'mwalila@gmail.com', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'nyira', 'mira', 989765434, 'mwalila@gmail.com', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(13, 56, '$2y$10$WP5qrAlmICPWxOLfVRgx7ec5qtsXaPzw0O3f6Hz2Z4Gc2F/B3ARvG', 1538567192, 'pending'),
(14, 77, '$2y$10$tz/Rsgn2zgTsAN7HbmA2R.LiyvJ5lbt.nCmYSeFPMMNEoKePS.MV2', 1543935006, 'pending'),
(15, 79, '$2y$10$NLOw8Xp.tkpNmbg4xPcQueru.ouHQuo9lgNVuG10VxtZQ641VUErC', 1543945093, 'pending'),
(16, 79, '$2y$10$rRhDT18e3FOimZR8.1TQ.u0db2OQD4HiehOWB9XzSbrJmh2IsYCQ2', 1543945438, 'pending'),
(17, 79, '$2y$10$lTsw82X2BjGfPPma8y7PxebOJxFVwfowQveXy7bAwuUuquGCQPPG.', 1543945475, 'pending'),
(18, 74, '$2y$10$9w07tUbB9P2GH62.zNpteu4Pmu78iZiC6fp8WssAvvswZZbn7uH02', 1543962382, 'pending'),
(19, 74, '$2y$10$DVJEVZL6hPSeacslaHjJtuUx3EBd8tJ2rbSKCkNbdHPWLMguC7Fam', 1543965607, 'pending'),
(20, 74, '$2y$10$FYKmak44X6a6bVWxBtZ1OeghX5TtlAB5ARXJxJMAsIRC7zL9oDgW.', 1543965702, 'pending'),
(21, 74, '$2y$10$v7sRWhQYjqyyD0QjYxJk2e3TlGmyMoRt1/NyVu90qoXKkgMq6Iqli', 1543997217, 'pending'),
(22, 74, '$2y$10$efDWzAbJxTjrGUQM0Sqy8eF6pYjkytqGyj9eV.o4PB1ayszFhfEsW', 1543997269, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `history_book`
--

CREATE TABLE `history_book` (
  `bookhistory_id` int(11) NOT NULL,
  `month` date NOT NULL,
  `yeah` date NOT NULL,
  `date_history` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history_travel`
--

CREATE TABLE `history_travel` (
  `travelhist_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `date_travel` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `brandcar_id` int(11) NOT NULL,
  `brand_title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`brandcar_id`, `brand_title`) VALUES
(1, 'BMW'),
(2, 'Honda'),
(3, 'Kia'),
(4, 'Mazda');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `status`, `is_type`) VALUES
(47, 74, '2018-11-25 16:25:47', 0, 'no'),
(48, 75, '2018-11-25 16:22:02', 0, 'no'),
(49, 74, '2018-11-25 16:26:45', 0, 'no'),
(50, 75, '2018-11-25 16:30:29', 0, 'no'),
(51, 74, '2018-11-25 16:47:17', 0, 'no'),
(52, 75, '2018-11-25 16:52:10', 0, 'no'),
(53, 74, '2018-11-25 16:56:42', 0, 'no'),
(54, 74, '2018-11-25 17:22:11', 0, 'no'),
(55, 75, '2018-11-25 17:34:11', 0, 'no'),
(56, 74, '2018-11-25 17:22:48', 0, 'no'),
(57, 74, '2018-11-25 18:05:14', 0, 'no'),
(58, 74, '2018-11-25 18:08:18', 0, 'no'),
(59, 75, '2018-11-25 18:08:00', 0, 'no'),
(60, 74, '2018-11-25 22:59:23', 0, 'no'),
(61, 75, '2018-11-25 21:41:12', 0, 'no'),
(62, 75, '2018-11-26 09:36:26', 0, 'no'),
(63, 74, '2018-11-26 13:41:42', 0, 'no'),
(64, 75, '2018-11-26 13:50:38', 0, 'no'),
(65, 74, '2018-11-26 13:46:53', 0, 'no'),
(66, 75, '2018-11-26 14:02:37', 0, 'no'),
(67, 75, '2018-11-26 13:52:22', 0, 'no'),
(68, 76, '2018-11-26 14:03:05', 0, 'no'),
(69, 76, '2018-11-26 14:03:36', 0, 'no'),
(70, 76, '2018-11-27 09:49:11', 0, 'no'),
(71, 75, '2018-11-26 14:35:19', 0, 'no'),
(72, 74, '2018-11-26 14:44:53', 0, 'no'),
(73, 74, '2018-11-26 15:21:26', 0, 'no'),
(74, 74, '2018-11-26 21:53:53', 0, 'no'),
(75, 74, '2018-11-27 09:50:51', 0, 'no'),
(76, 74, '2018-11-27 13:45:39', 0, 'no'),
(77, 75, '2018-11-28 21:28:36', 0, 'no'),
(78, 74, '2018-11-28 21:33:09', 0, 'no'),
(79, 74, '2018-12-03 11:10:29', 0, 'no'),
(80, 75, '2018-12-02 19:56:43', 0, 'no'),
(81, 76, '2018-12-02 19:57:30', 0, 'no'),
(82, 75, '2018-12-02 21:35:54', 0, 'no'),
(83, 74, '2018-12-03 16:45:07', 0, 'no'),
(84, 74, '2018-12-04 11:20:59', 0, 'no'),
(85, 74, '2018-12-04 11:27:36', 0, 'no'),
(86, 74, '2018-12-04 13:20:02', 0, 'no'),
(87, 74, '2018-12-04 13:27:33', 0, 'no'),
(88, 74, '2018-12-04 16:22:04', 0, 'no'),
(89, 75, '2018-12-04 15:27:26', 0, 'no'),
(90, 75, '2018-12-04 16:15:14', 0, 'no'),
(91, 75, '2018-12-05 01:36:19', 0, 'no'),
(92, 74, '2018-12-04 16:41:05', 0, 'no'),
(93, 79, '2018-12-04 19:27:25', 0, 'no'),
(94, 79, '2018-12-04 20:14:56', 0, 'no'),
(95, 79, '2018-12-04 21:15:33', 0, 'no'),
(96, 79, '2018-12-05 00:25:42', 0, 'no'),
(97, 74, '2018-12-05 01:19:49', 0, 'no'),
(98, 74, '2018-12-05 01:27:00', 0, 'no'),
(99, 74, '2018-12-05 15:28:59', 0, 'no'),
(100, 80, '2018-12-05 15:40:06', 0, 'no'),
(101, 75, '2018-12-05 16:01:40', 0, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `model_car`
--

CREATE TABLE `model_car` (
  `modelcar_id` int(11) NOT NULL,
  `model_type` varchar(30) NOT NULL,
  `color` varchar(50) NOT NULL,
  `brand_car` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model_car`
--

INSERT INTO `model_car` (`modelcar_id`, `model_type`, `color`, `brand_car`, `date`) VALUES
(1, 'Nissan Versa', 'blue', 'toyota', '0000-00-00 00:00:00'),
(2, 'Toyota Yaris', 'orange', 'Kia', '0000-00-00 00:00:00'),
(3, 'Hyundai Elantra', 'red', 'BMW', '0000-00-00 00:00:00'),
(4, 'Ford Focus', 'yellow', 'HN', '0000-00-00 00:00:00'),
(5, 'mercedes2', 'MC1', 'gray1', '2018-11-09 14:15:16');

-- --------------------------------------------------------

--
-- Table structure for table `nofications`
--

CREATE TABLE `nofications` (
  `notification_id` int(11) NOT NULL,
  `user_details` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking` int(11) NOT NULL,
  `payement` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `date_comment` datetime NOT NULL,
  `comment_status` int(11) NOT NULL DEFAULT '0'
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

--
-- Dumping data for table `payement`
--

INSERT INTO `payement` (`id`, `title`, `location`, `user_id`, `status`, `date`) VALUES
(1, 'payPay', 0, 0, '', '0000-00-00 00:00:00'),
(2, 'credit card', 0, 0, '', '0000-00-00 00:00:00'),
(3, 'promo code', 0, 0, '', '0000-00-00 00:00:00');

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
  `payment` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `time` char(10) DEFAULT NULL,
  `monday` char(1) DEFAULT NULL,
  `tuesday` char(1) DEFAULT NULL,
  `wednesday` char(1) DEFAULT NULL,
  `thursday` char(1) DEFAULT NULL,
  `friday` char(1) DEFAULT NULL,
  `saturday` char(1) DEFAULT NULL,
  `sunday` char(1) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `date_payement` datetime NOT NULL,
  `pay_information` varchar(50) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`trip_id`, `user_id`, `departure`, `departureLatitude`, `departureLongitude`, `destination`, `destinationLatitude`, `destinationLongitude`, `distance`, `duration`, `amountofriders`, `nameofonerider`, `price`, `seatsavailable`, `regular`, `status_pay`, `payment`, `date`, `time`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `is_delete`, `date_payement`, `pay_information`, `driver_id`, `car_id`) VALUES
(6, 56, 'Bellville, Cape Town, South Af', -33.8943, 18.6294, 'Love Life Langa Centre - P.P.A', -33.9445, 18.5315, '', '', 0, '2', '', NULL, NULL, 'unpaid', 0, '1970-01-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(7, 56, 'River Hamlet on Gie Road in Ta', -33.8195, 18.519, 'Bayside Mall, Blaauwberg Road,', -33.8228, 18.4894, '3.1 km', '6 mins', 3, 'nyira k', '26.40', NULL, NULL, 'unpaid', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(8, 56, 'River Hamlet on Gie Road in Ta', -33.8195, 18.519, 'Milestone Studios, Cape Town,', -33.9255, 18.4151, '22.9 km', '26 mins', 2, 'deby', '193.60', NULL, NULL, 'unpaid', 0, '2018-11-15 05:56:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', '', 0, 0),
(9, 56, 'Western Cape, South Africa', -33.2278, 21.8569, 'Big Bay Boulevard, Cape Farms,', -33.7923, 18.4676, '417 km', '4 hours 55 mins', 1, 'mireille', '3669.60', NULL, NULL, 'unpaid', 0, '2018-11-15 07:57:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', '', 0, 0),
(10, 79, 'Cape Town, South Africa', -33.9249, 18.4241, 'Johannesburg, South Africa', -26.2041, 28.0473, '1,398 km', '13 hours 46 mins', 3, 'kasongo', '12302.40', NULL, NULL, 'paid', 0, '2018-11-16 08:04:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 5),
(11, 56, 'sea point', -33.917, 18.3875, 'Parklands, Cape Town, South Af', -33.8133, 18.5003, '22.9 km', '30 mins', 2, 'mbuyu', '193.60', NULL, NULL, 'unpaid', 0, '2018-11-15 10:10:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(12, 56, 'kolwezi', -10.7275, 25.5089, 'Likasi, Democratic Republic of', -10.9884, 26.7379, '175 km', '2 hours 29 mins', 4, 'kabuiza', '1540.00', NULL, NULL, 'unpaid', 0, '2018-11-15 05:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(13, 61, 'Bedford, UK', 52.136, -0.466655, 'London, UK', 51.5074, -0.127758, '91.7 km', '1 hour 31 mins', 5, 'once-off', '800.80', NULL, NULL, 'unpaid', 0, '2018-10-18 11:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(14, 61, 'Bromham, UK', 52.1511, -0.52602, 'London, UK', 51.5074, -0.127758, '92.5 km', '1 hour 30 mins', 3, 'london', '809.60', NULL, NULL, 'unpaid', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(15, 61, 'Kempston, Bedford, UK', 52.1179, -0.496792, 'Croydon, UK', 51.3762, -0.098234, '149 km', '1 hour 51 mins', 3, 'kasonga', '1311.20', NULL, NULL, 'unpaid', 0, '2018-10-24 11:22:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(16, 61, 'Pretoria, South Africa', -25.7479, 28.2293, 'Cape Town, South Africa', -33.9249, 18.4241, '1,455 km', '14 hours 22 mins', 3, 'Me test', '12804.00', NULL, NULL, 'unpaid', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(17, 61, 'Bellville, Cape Town, South Af', -33.8943, 18.6294, 'Table View, Cape Town, South A', -33.8275, 18.4948, '20.4 km', '22 mins', 3, 'nyira', '176.00', NULL, NULL, 'unpaid', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', '', 0, 0),
(18, 61, 'Parklands, Cape Town, South Af', -33.8133, 18.5003, 'Table View, Cape Town, South A', -33.8275, 18.4948, '2.6 km', '6 mins', 21, 'deby', '17.60', NULL, NULL, 'unpaid', 0, '2018-10-23 01:48:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(19, 61, 'George, South Africa', -33.9881, 22.453, 'Riversdale, South Africa', -34.0317, 21.2487, '139 km', '1 hour 30 mins', 34, 'travel', '1223.20', NULL, NULL, 'unpaid', 0, '2018-10-17 02:02:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', '', 0, 0),
(20, 61, 'Aberdeen, South Africa', -32.4762, 24.0369, 'Middelburg, South Africa', -25.7699, 29.4639, '1,045 km', '9 hours 52 mins', 34, 'travel2', '9196.00', NULL, NULL, 'unpaid', 0, '2018-10-17 02:15:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', '', 0, 0),
(21, 61, 'Mafeteng, Lesotho', -29.8224, 27.2388, 'Maseru, Lesotho', -29.3151, 27.4869, '77.1 km', '1 hour 20 mins', 23, 'test', '677.60', NULL, NULL, 'unpaid', 0, '2018-10-24 02:15:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', '', 0, 0),
(22, 56, 'Pretoria, South Africa', -25.7479, 28.2293, 'Table View, Cape Town, South A', -33.8275, 18.4948, '1,452 km', '14 hours 23 mins', 3, 'once-off', '12777.60', NULL, NULL, 'unpaid', 1, '2018-11-06 02:49:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', '', 0, 0),
(23, 56, 'Table View, Cape Town, South A', -33.8275, 18.4948, 'Parklands, Cape Town, South Af', -33.8133, 18.5003, '2.7 km', '7 mins', 3, 'mwalila', '17.60', NULL, NULL, 'unpaid', 0, '2018-11-05 11:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(24, 67, 'Table View, Cape Town, South A', -33.8275, 18.4948, 'Love Life Langa Centre - P.P.A', -33.9417, 18.5275, '21.3 km', '28 mins', 4, 'nwabisa', '184.80', NULL, NULL, 'unpaid', 0, '2018-11-06 11:01:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(25, 68, 'Bellville, Cape Town, South Af', -33.8943, 18.6294, 'Love Life Langa Centre - P.P.A', -33.9417, 18.5275, '25.1 km', '21 mins', 3, 'mwallila', '220.00', NULL, NULL, 'unpaid', 0, '2018-11-09 12:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(26, 0, 'Bellville, Cape Town, South Af', -33.8943, 18.6294, 'Love Life Langa Centre - P.P.A', -33.9417, 18.5275, '25.1 km', '21 mins', 0, '', '212.50', NULL, NULL, 'unpaid', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(27, 68, 'Table View, Cape Town, South A', -33.8275, 18.4948, 'Flamingo Vlei, Cape Town, Sout', -33.8351, 18.5077, '1.8 km', '4 mins', 3, 'mwallila', '8.50', NULL, NULL, 'unpaid', 0, '2018-11-11 08:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(28, 74, 'Table View, Cape Town, South A', -33.8275, 18.4948, 'Parklands, Cape Town, South Af', -33.8133, 18.5003, '2.7 km', '7 mins', 3, 'mwallila', '17.00', NULL, NULL, 'unpaid', 0, '2018-11-14 04:59:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(29, 74, 'Table View, Cape Town, South A', -33.8275, 18.4948, 'Parklands, Cape Town, South Af', -33.8133, 18.5003, '2.7 km', '7 mins', 2, 'mwallila', '17.00', NULL, NULL, 'unpaid', 0, '2018-11-16 11:15:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', '', 0, 0),
(30, 0, 'Parklands, Cape Town, South Af', -33.8133, 18.5003, 'Love Life Langa Centre - P.P.A', -33.9417, 18.5275, '22.8 km', '29 mins', 0, '', '187.00', NULL, NULL, 'unpaid', 0, '1970-01-01 01:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(31, 0, 'Goodwood Civic Center/Burgerse', -33.9099, 18.5507, 'Bellville, Cape Town, South Af', -33.8943, 18.6294, '11.7 km', '15 mins', 0, '', '93.50', NULL, NULL, 'unpaid', 0, '2018-11-16 12:09:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(32, 0, 'River Hamlet on Gie Road in Ta', -33.8195, 18.519, 'Bayside Mall, Blaauwberg Road,', -33.8228, 18.4894, '3.1 km', '6 mins', 5, 'mwallila', '25.50', NULL, NULL, 'unpaid', 0, '2018-11-18 05:57:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(33, 74, 'Parklands, Cape Town, South Af', -33.8133, 18.5003, 'Table View, Cape Town, South A', -33.8275, 18.4948, '2.6 km', '6 mins', 3, 'once-off', '17.00', NULL, NULL, 'unpaid', 0, '2018-11-18 06:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', '', 0, 0),
(34, 74, 'River Hamlet on Gie Road in Ta', -33.8195, 18.519, 'Table View, Cape Town, South A', -33.8228, 18.4894, '3.1 km', '6 mins', 3, 'nyira mwalila', '25.50', NULL, NULL, 'unpaid', 0, '2018-11-20 05:48:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(35, 74, 'Parklands, Cape Town, South Af', -33.8133, 18.5003, 'Nyanga, Cape Town, South Afric', -33.9954, 18.5849, '30.8 km', '37 mins', 1, 'bella', '255.00', NULL, NULL, 'unpaid', 0, '2018-11-19 04:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(36, 74, 'Table View, Cape Town, South A', -33.8275, 18.4948, 'Cape Town City Centre, Cape To', -33.9243, 18.4187, '17.9 km', '29 mins', 2, 'mwallila', '144.50', NULL, NULL, 'unpaid', 0, '2018-11-21 12:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(37, 74, 'Parklands, Cape Town, South Af', -33.8133, 18.5003, 'Bayside Mall, Blaauwberg Road,', -33.8228, 18.4894, '1.6 km', '3 mins', 3, 'mwallila', '8.50', NULL, NULL, 'unpaid', 0, '2018-11-25 02:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(38, 74, 'Parklands, Cape Town, South Af', -33.8133, 18.5003, 'Bayside Mall, Blaauwberg Road,', -33.8228, 18.4894, '1.6 km', '3 mins', 3, 'mwallila', '8.50', NULL, NULL, 'unpaid', 0, '2018-11-26 01:06:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(39, 74, 'Love Life Langa Centre - P.P.A', -33.9417, 18.5275, 'Cape Town City Centre, Cape To', -33.9243, 18.4187, '12.9 km', '18 mins', 1, 'mwallila', '102.00', NULL, NULL, 'unpaid', 0, '2018-11-26 02:44:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', '', 0, 0),
(40, 0, 'River Hamlet on Gie Road in Ta', -33.8195, 18.519, 'Table View, Cape Town, South A', -33.8275, 18.4948, '3.5 km', '7 mins', 3, 'once-off', '25.50', NULL, NULL, 'unpaid', 0, '2018-11-27 02:20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(41, 74, 'Parklands, Cape Town, South Af', -33.8133, 18.5003, 'Burgersfort, South Africa', -24.6814, 30.3349, '1,751 km', '17 hours 43 mins', 3, 'mwallila', '14883.50', NULL, NULL, 'unpaid', 0, '2018-11-27 03:26:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(42, 74, 'Table View, Cape Town, South A', -33.8275, 18.4948, 'Parklands, Cape Town, South Af', -33.8133, 18.5003, '2.7 km', '7 mins', 2, 'mwallila', '17.00', NULL, NULL, 'unpaid', 0, '2018-12-05 03:20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0),
(43, 74, 'Cape Town City Centre, Cape To', -33.9243, 18.4187, 'Delft South, Cape Town, South', -33.9933, 18.6324, '31.6 km', '34 mins', 3, 'Linkie', '263.50', NULL, NULL, 'unpaid', 0, '2018-12-20 04:37:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_connect` int(11) NOT NULL DEFAULT '0',
  `opt_hash` longtext NOT NULL,
  `verify` int(11) NOT NULL,
  `moreinformation` varchar(300) NOT NULL,
  `password` varchar(64) NOT NULL,
  `profilepicture` varchar(55) NOT NULL,
  `role` enum('rider','driver','admin') NOT NULL DEFAULT 'rider',
  `date_registration` datetime NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `mobile`, `email`, `is_connect`, `opt_hash`, `verify`, `moreinformation`, `password`, `profilepicture`, `role`, `date_registration`, `is_delete`) VALUES
(61, 'nyira3 iluba', '0627495032', 'mwalianyira@yahoo.com', 0, '', 1, '', 'ad8e043a7e412c340e0662df170b614985731fca83c6919215260c59402e10b4', 'profilepicture/31b4ed3042143a31361fb507ec6d0262.png', 'driver', '2018-11-13 00:00:00', 0),
(72, 'john    smith', '0812558505', 'sihle@quirky30.co.za', 0, '', 1, '', '', 'profilepicture/e7df06fbfa14aabd6391c720663ed965.jpg', 'driver', '2018-11-13 00:00:00', 0),
(73, 'nyira     d&#39', '062749503643', 'mwalila.mbumba@gmail.com', 0, '', 1, '', '', 'profilepicture/37201889158504c863fc3ac5965e9f70.png', 'driver', '2018-11-13 00:00:00', 0),
(74, 'Nyira mwalila', '0627495036', 'mwalilanyira@gmail.com', 0, '', 1, '', 'ae739c043bc4d4f3cb02cb9edc5e20bf7b6c824a56eb8d566b5ce89ec4656a38', 'profilepicture/59c5bb5559df52af4e672fabe8133538.png', '', '0000-00-00 00:00:00', 0),
(75, 'Nwabisa', '0638206725', 'nwabisa@quirky30.co.za', 0, '', 1, '', 'ed36a6f4b79d7a60fa5b6689d1e4903ba777b3c49b5d58c57bc9b22fe9fbb6eb', 'profilepicture/59c5bb5559df52af4e672fabe8133538.png', 'admin', '0000-00-00 00:00:00', 0),
(76, 'Vigne', '0717286020', 'mwalilanyira@yahoo.com', 0, '', 1, '', 'ed36a6f4b79d7a60fa5b6689d1e4903ba777b3c49b5d58c57bc9b22fe9fbb6eb', '', '', '0000-00-00 00:00:00', 0),
(79, 'mzi', '0843439290', 'mzi@quirky30.co.za', 0, '', 1, '', 'ec7508e1b42ed6132745285043ec242e71d29dbfc12be3150d5fcec05a397dc1', '', '', '0000-00-00 00:00:00', 0),
(80, 'Jason_S', '0823361377', 'jason@editorsink.co.za', 0, '', 1, '', '19513fdc9da4fb72a4a05eb66917548d3c90ff94d5419e1f2363eea89dfee1dd', '', '', '0000-00-00 00:00:00', 0),
(81, 'mbumba', '90897654', 'mbumba@gmail.com', 0, '', 0, '', 'e929cd9b06eb2b57cfaeb32174426a8c6545e5730dac3abbf6523fed97733a62', '', '', '0000-00-00 00:00:00', 0),
(82, 'mbumba', '90897654', 'mbumba@gmail.com', 0, '', 0, '', 'e929cd9b06eb2b57cfaeb32174426a8c6545e5730dac3abbf6523fed97733a62', '', '', '0000-00-00 00:00:00', 0),
(83, 'mbumba', '90897654', 'mbumba@gmail.com', 0, '', 0, '', 'e929cd9b06eb2b57cfaeb32174426a8c6545e5730dac3abbf6523fed97733a62', '', '', '0000-00-00 00:00:00', 0),
(84, 'deby', '0717286021', 'mwalila@gmail.com', 0, '', 0, '', 'ae739c043bc4d4f3cb02cb9edc5e20bf7b6c824a56eb8d566b5ce89ec4656a38', '', '', '0000-00-00 00:00:00', 0),
(85, 'mireille', '0717286022', 'mireille@gmail.com', 0, '', 0, '', 'ae739c043bc4d4f3cb02cb9edc5e20bf7b6c824a56eb8d566b5ce89ec4656a38', '', 'rider', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_content_like`
--

CREATE TABLE `user_content_like` (
  `user_content_like` int(11) NOT NULL,
  `content_id` int(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('not-seen','seen') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `content_notification`
--
ALTER TABLE `content_notification`
  ADD PRIMARY KEY (`content_id`);

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
-- Indexes for table `history_book`
--
ALTER TABLE `history_book`
  ADD PRIMARY KEY (`bookhistory_id`);

--
-- Indexes for table `history_travel`
--
ALTER TABLE `history_travel`
  ADD PRIMARY KEY (`travelhist_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`brandcar_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `model_car`
--
ALTER TABLE `model_car`
  ADD PRIMARY KEY (`modelcar_id`);

--
-- Indexes for table `nofications`
--
ALTER TABLE `nofications`
  ADD PRIMARY KEY (`notification_id`);

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
-- Indexes for table `user_content_like`
--
ALTER TABLE `user_content_like`
  ADD PRIMARY KEY (`user_content_like`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `content_notification`
--
ALTER TABLE `content_notification`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `history_book`
--
ALTER TABLE `history_book`
  MODIFY `bookhistory_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_travel`
--
ALTER TABLE `history_travel`
  MODIFY `travelhist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `brandcar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `model_car`
--
ALTER TABLE `model_car`
  MODIFY `modelcar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nofications`
--
ALTER TABLE `nofications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payement`
--
ALTER TABLE `payement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rememberme`
--
ALTER TABLE `rememberme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `trip_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `user_content_like`
--
ALTER TABLE `user_content_like`
  MODIFY `user_content_like` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

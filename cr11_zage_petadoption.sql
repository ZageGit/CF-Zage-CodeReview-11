-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2020 at 05:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_zage_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_zage_petadoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_zage_petadoption`;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `animal_id` int(11) NOT NULL,
  `animal_size` enum('small','large','senior') DEFAULT NULL,
  `animal_name` varchar(255) DEFAULT NULL,
  `animal_image` varchar(255) DEFAULT NULL,
  `animal_description` varchar(255) DEFAULT NULL,
  `animal_location` varchar(255) DEFAULT NULL,
  `animal_age` varchar(255) DEFAULT NULL,
  `animal_hobbies` varchar(255) DEFAULT NULL,
  `animal_breed` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animal_id`, `animal_size`, `animal_name`, `animal_image`, `animal_description`, `animal_location`, `animal_age`, `animal_hobbies`, `animal_breed`) VALUES
(16, 'small', 'Cat', 'https://cdn.pixabay.com/photo/2020/03/23/08/45/cat-4959941_960_720.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. ', 'Praterstern 69', '5', 'Pushing things of the table', 'idontknow'),
(17, 'senior', 'Turtle', 'https://cdn.pixabay.com/photo/2020/09/13/15/48/turtle-5568624_960_720.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. ', 'Donau 12', '15', 'Laying in the water and do nothing', 'Super Ninja Turtle'),
(18, 'small', 'Parrot', 'https://cdn.pixabay.com/photo/2018/08/12/16/59/ara-3601194_960_720.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. ', 'Jungle 147', '6', 'Crackers', 'A beautiful one'),
(19, 'large', 'Dumbo', 'https://cdn.pixabay.com/photo/2017/06/07/10/47/elephant-2380009_960_720.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. ', 'Safari 118', '25', 'Peanuts', 'Big Boy'),
(20, 'small', 'Fish', 'https://cdn.pixabay.com/photo/2016/12/31/21/22/discus-fish-1943755_960_720.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. ', 'Underthesea 12', '1', 'forgetting things', 'clownfish'),
(21, 'small', 'Birdy', 'https://cdn.pixabay.com/photo/2015/11/16/16/28/bird-1045954_960_720.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. ', 'Tree 15,', '3', 'sitting at the park tree', 'raven'),
(22, 'large', 'Mountain Goat', 'https://cdn.pixabay.com/photo/2017/12/17/15/58/mammal-3024471_960_720.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. ', 'Mountains 18', '7', 'licking salt', 'Goat'),
(23, 'large', 'Horsihorse', 'https://cdn.pixabay.com/photo/2016/05/25/13/55/horses-1414889_960_720.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. ', 'Grassland 25', '6', 'Eating carrots', 'haflinger'),
(24, 'large', 'Leopard', 'https://cdn.pixabay.com/photo/2014/11/03/17/40/leopard-515509_960_720.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. ', 'Safari 69', '6', 'Eating zebras', 'Car'),
(25, 'senior', 'Deer', 'https://cdn.pixabay.com/photo/2015/10/12/15/46/fallow-deer-984573_960_720.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. ', 'Woods 12', '19', 'Running in front of cars', 'deere'),
(26, 'senior', 'Lion', 'https://cdn.pixabay.com/photo/2016/01/02/16/53/lion-1118467_960_720.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. ', 'Safari 23', '25', 'Sleeping', 'cat'),
(27, 'senior', 'Dolphin', 'https://cdn.pixabay.com/photo/2013/11/01/11/13/dolphin-203875_960_720.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. ', 'Underthesea 69', '13', 'Swimming', 'Fish');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_status` enum('user','admin','s_admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_status`) VALUES
(4, 'Admin', 'admin@test.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'admin'),
(5, 'User', 'user@tes.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user'),
(6, 'Super Admin', 'sadmin@test.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 's_admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `userEmail` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

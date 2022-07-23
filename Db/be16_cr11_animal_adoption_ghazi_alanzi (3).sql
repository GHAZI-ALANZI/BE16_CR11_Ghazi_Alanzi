-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 04:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be16_cr11_animal_adoption_ghazi_alanzi`
--
CREATE DATABASE IF NOT EXISTS `be16_cr11_animal_adoption_ghazi_alanzi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be16_cr11_animal_adoption_ghazi_alanzi`;

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `animal_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `size` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `vaccinated` varchar(30) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animal_id`, `image`, `name`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`) VALUES
(1, '1.jpg', 'muu', 'street147', 'cat soooooooooo cut', 5, 7, 'yes', 'cat', ' Available'),
(2, '2.webp', 'Hedgehog', 'petstreet210', 'Hedgehog so friendly and like play with children', 33, 2, 'yes', 'Hedgehog small', 'Available'),
(3, '3.webp', 'doll', 'Moonstreet144', 'black white female cat', 55, 11, 'yes', 'white_cat', 'Adopted'),
(5, '5.webp', 'mot', 'Strestreet111', 'brown male dog', 133, 10, 'yes', 'dog', 'Adopted'),
(6, '6.jpg', 'reni', 'Moonstreet158', 'beg male hamster', 25, 2, 'no', 'hamster', 'Available'),
(7, '7.jpg', 'memo', 'Moonstreet100', 'grow male rabit', 80, 9, 'yes', 'rabit', 'Available'),
(8, '8.jpg', 'bo', 'Brtstreet122', 'very long female snake', 200, 9, 'yes', 'snake', 'Available'),
(9, '9.jpg', 'don', 'Moonstreet177', 'black white male cat', 45, 4, 'yes', 'cat', 'Adopted'),
(10, '10.jpg', 'fatt', 'Hreestreet123', 'tiny snake', 20, 2, 'no', 'snake', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `pet_adoption`
--

CREATE TABLE `pet_adoption` (
  `user_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `adoption_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `picture`, `f_name`, `l_name`, `address`, `phone_number`, `pass`, `status`, `email`) VALUES
(42, 'phpB8DB.tmp.webp', 'sarah', 'deep', 'hanstreer 122', 57576557, '0c935a7f843887627f585c53fbbd8d11ef45d5e7cbf4cacca844abaaab487963', 'user', 'sarah@gmail.com'),
(43, 'php28.tmp.webp', 'hans', 'deep', 'hanstreer 124', 1111111, '0c935a7f843887627f585c53fbbd8d11ef45d5e7cbf4cacca844abaaab487963', 'adm', 'hans@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD KEY `pet_id` (`pet_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD CONSTRAINT `pet_id` FOREIGN KEY (`pet_id`) REFERENCES `animal` (`animal_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

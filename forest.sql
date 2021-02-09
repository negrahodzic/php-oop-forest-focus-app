-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2021 at 05:40 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forest`
--

-- --------------------------------------------------------

--
-- Table structure for table `chosen_tree`
--

CREATE TABLE `chosen_tree` (
  `chosen_tree_id` int(11) NOT NULL,
  `tree_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chosen_tree`
--

INSERT INTO `chosen_tree` (`chosen_tree_id`, `tree_id`, `duration`, `status`, `score`) VALUES
(252, 1, 5, 'Withered', 50),
(253, 1, 2, 'Planted', 20),
(254, 2, 1, 'Planted', 15),
(255, 3, 6, 'Withered', 30),
(260, 2, 5, 'Planted', 75),
(261, 1, 1, 'Withered', 10),
(263, 1, 1, 'Withered', 10),
(264, 1, 1, 'Planted', 10),
(267, 2, 1, 'Planted', 15),
(268, 4, 1, 'Planted', 15),
(270, 4, 1, 'Planted', 15),
(271, 1, 1, 'Withered', 10),
(281, 1, 2, 'Withered', 20),
(284, 1, 1, 'Withered', 10),
(286, 1, 1, 'Withered', 10),
(289, 1, 1, 'Planted', 10),
(303, 1, 1, 'Planted', 10),
(308, 1, 1, 'Withered', 10),
(309, 1, 1, 'Withered', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tree`
--

CREATE TABLE `tree` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tree`
--

INSERT INTO `tree` (`id`, `name`, `img`, `description`, `points`) VALUES
(1, 'Sundae Tree', 'sundaetree.png', '“Oh dear! I’m sweating like mad. How can I even study in this melting heat?”\r\nDon’t worry! We’ve got you covered!\r\nGive this delightful sundae a try, and enjoy an explosion of sweetness as the chocolate chips melt in your mouth.', 10),
(2, 'Lover Tree', 'lovertree.png', 'According to Forest\'s unprofessional research,\r\n\"Planting a Lover Tree with your significant other every day will greatly improve your relationship!', 15),
(3, 'Silly uncle ', 'sillyuncle.png', 'Forest wishes you a happy April Fool\'s Day!', 5),
(4, 'Water Spirit', 'waterspirit.png', 'Human, water, and plants live in a state of coexistence and co-prosperity.\r\nThe way the heart-shaped water droplet clings to the surface of the petals, symbolises the importance of water conservation.', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chosen_tree`
--
ALTER TABLE `chosen_tree`
  ADD PRIMARY KEY (`chosen_tree_id`),
  ADD KEY `tree_id` (`tree_id`) USING BTREE;

--
-- Indexes for table `tree`
--
ALTER TABLE `tree`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chosen_tree`
--
ALTER TABLE `chosen_tree`
  MODIFY `chosen_tree_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT for table `tree`
--
ALTER TABLE `tree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chosen_tree`
--
ALTER TABLE `chosen_tree`
  ADD CONSTRAINT `fk_tree_id` FOREIGN KEY (`tree_id`) REFERENCES `tree` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

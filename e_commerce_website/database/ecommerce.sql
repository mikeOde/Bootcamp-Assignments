-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2021 at 06:22 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `farm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `farm_id`) VALUES
(6, 'Strawberry', 'Outdoor strawberry plants', 10, '../uploads/6138ab762c0961.04740556.png', 8),
(7, 'BEANS', 'Outdoor bean plants', 8, '../uploads/6138abb5392978.66748316.png', 8),
(8, 'Tomatoes', 'Outdoor tomato plants', 7, '../uploads/6138abe6c644e3.87204849.png', 8),
(9, 'Cucumbers', 'Outdoor cucumber plants', 5, '../uploads/6138ac04d5bdb8.88557582.png', 8),
(10, 'Potatoes', 'Outdoor potato plants', 6, '../uploads/6138ac327579e3.44536488.png', 8),
(11, 'Onions', 'Outdoor grown onions', 9, '../uploads/6138ac5fcbd586.39610905.png', 8),
(12, 'Mango', 'Organic mango trees', 15, '../uploads/6138b0d63cd575.73092073.jpg', 10),
(13, 'Apple', 'Organic apple trees', 13, '../uploads/6138b0ed7c5607.59490747.png', 10),
(14, 'Orange', 'Organic orange trees', 11, '../uploads/6138b101be69e5.06593745.jpg', 10),
(18, 'Bananas', 'Aquaponic fed banana trees', 20, '../uploads/6138c094c98122.88177251.png', 11),
(19, 'White grapes', 'Aquaponic fed grape trees', 15, '../uploads/6138c0b13200a0.64638920.png', 11),
(20, 'Black grapes', 'Aquaponic fed grape trees', 16, '../uploads/6138c0d0276097.88055360.png', 11),
(27, 'Peach', 'Organic peach trees', 12, '../uploads/6138d71156e321.41497207.png', 10),
(28, 'Fig', 'Organic fig trees', 14, '../uploads/6138d725df61c2.11527463.png', 10),
(29, 'Cherry', 'Organic cherry trees', 10, '../uploads/6138d998e9d548.34335565.jpg', 10),
(30, 'Grapefruit', 'Aquaponic fed grapefruit trees', 20, '../uploads/6138e26b008325.02693668.png', 11),
(31, 'Pear', 'Aquaponic fed pear trees', 19, '../uploads/6138e27c7fb791.76926136.png', 11),
(32, 'Olive', 'Aquaponic fed olive trees', 21, '../uploads/6138e2a15673e4.04447169.png', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_type` tinyint(4) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `user_type`, `email`, `password`) VALUES
(8, 'Mike', 'Ayoub', 'mikeOde', 0, 'mikeayoub@outlook.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f'),
(9, 'georges', 'harb', 'geoharb', 1, 'georgesharb@outlook.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f'),
(10, 'dani', 'ayoub', 'danioo', 0, 'daniayoub@hotmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f'),
(11, 'raymond', 'ayoub', 'rayayoub', 0, 'raymondayoub@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

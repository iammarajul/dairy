-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2020 at 06:12 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `un` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `uva` varchar(20) NOT NULL,
  `cf` varchar(50) NOT NULL,
  `spoj` varchar(20) NOT NULL,
  `toph` varchar(40) NOT NULL,
  `loj` varchar(50) NOT NULL,
  `ploj` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`un`, `email`, `pass`, `uva`, `cf`, `spoj`, `toph`, `loj`, `ploj`, `id`) VALUES
('iammarajul', 'm.marajul@gmail.com', 'M.mokos', '888032', '.MARAJUL.', 'iammarajul', '590d7d60de14194eb555201c', 'm.marajul@gmail.com', 'M.mokos', 7),
('hasib1', 'hasib1@gmail.com', '1234', '957262', 'hasib_ullah', 'hasib_ullah', '5abcf3d57cc25900017cd655', 'm.marajul@gmail.com', 'M.mokos', 9),
('joy', 'joy@gmail.com', '12345', '', 'Naimur_Rahman_BSMRSTU', '', '5d7b9121fa7ce200011c6204', '', '', 10),
('ok1', 'ok@gmail.com', '1111', '', '', '', '', '', '', 13),
('iammarajul1', 'm.marajul1@gmail.com', '111', 'iammarajul', '.marajul.', 'iammarajul', 'iammarajul', 'iammarajul', 'M.mokos', 14),
('iammarajul2', 'm.marajul2@gmail.com', '1111', 'iammarajul', '.marajul.', 'iammarajul', 'iammarajul', 'iammarajul', '1111', 15),
('iammarajul3', 'm.marajul3@gmail.com', '333', 'iammarajul', '.marajul.', 'iammarajul', 'iammarajul', 'iammarajul', '1111', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

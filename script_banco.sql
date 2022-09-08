-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Set-2022 às 20:47
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_product`
--
CREATE DATABASE IF NOT EXISTS `db_product` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_product`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbproduct`
--

CREATE TABLE `tbproduct` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `price` double DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `quantidade` int(64) DEFAULT NULL,
  `codigo` int(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbproduct`
--

INSERT INTO `tbproduct` (`id`, `name`, `price`, `description`, `categoria`, `quantidade`, `codigo`) VALUES
(18, 'novo comando', 122, 'gsfgsggd', '11', 1, NULL),
(19, 'First', 99, 'sdfggdgsg', '11', 1, 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbproduct`
--
ALTER TABLE `tbproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

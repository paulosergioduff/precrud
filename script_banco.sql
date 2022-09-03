-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jun-2020 às 13:49
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_product`
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
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbproduct`
--

INSERT INTO `tbproduct` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'Mouse', 29.9, 'Mouse', NULL),
(2, 'Teclado PC', 299.9, 'Teclado Mecânico.', NULL),
(3, 'PC Gamer', 4599.9, 'PC Gamer ultima geração.', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbproduct`
--
ALTER TABLE `tbproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

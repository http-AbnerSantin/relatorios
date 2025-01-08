-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/01/2025 às 21:31
-- Versão do servidor: 10.6.20-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `relatorios_regionais`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `regionais`
--

CREATE TABLE `regionais` (
  `id` int(7) NOT NULL,
  `regional` varchar(20) DEFAULT NULL,
  `cultos` varchar(20) DEFAULT NULL,
  `decisoes` varchar(20) DEFAULT NULL,
  `reconciliacoes` varchar(20) DEFAULT NULL,
  `batismo_com_espirito_santo` varchar(20) DEFAULT NULL,
  `curas` varchar(20) DEFAULT NULL,
  `libertacao` varchar(20) DEFAULT NULL,
  `visita_louvor_testemunho` varchar(20) DEFAULT NULL,
  `visita_hospitais` varchar(20) DEFAULT NULL,
  `mulheres_biblia` varchar(20) DEFAULT NULL,
  `trabalho_evangelistico` varchar(20) DEFAULT NULL,
  `oferta` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `regionais`
--
ALTER TABLE `regionais`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `regionais`
--
ALTER TABLE `regionais`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

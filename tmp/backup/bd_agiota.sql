-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/04/2024 às 01:31
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_agiota`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agiota`
--

CREATE TABLE `agiota` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `estrelas` int(11) DEFAULT NULL,
  `favorito` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agiota`
--

INSERT INTO `agiota` (`id`, `nome`, `url`, `estrelas`, `favorito`) VALUES
(1, 'Agiota1', 'https://i.ibb.co/Fh7t5Qn/7.png', 4, 1),
(2, 'Agiota2', 'https://i.ibb.co/Jy2sB2D/8.png', 5, 0),
(3, 'Agiota3', 'https://i.ibb.co/cCv7N5h/9.png', 3, 1),
(4, 'Agiota4', 'https://i.ibb.co/6WpTqQZ/10.png', 2, 0),
(5, 'Agiota5', 'https://i.ibb.co/6Pgmnk6/11.png', 4, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'João', 'braio@gmail.com', '123'),
(2, 'Maria', 'maria@example.com', '456'),
(3, 'Pedro', 'pedro@example.com', 'senha789'),
(4, 'Ana', 'ana@example.com', 'senhaabc'),
(5, 'Carlos', 'carlos@example.com', 'senhadef');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agiota`
--
ALTER TABLE `agiota`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agiota`
--
ALTER TABLE `agiota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

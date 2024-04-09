-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/04/2024 às 02:49
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
  `favorito` tinyint(1) DEFAULT NULL,
  `mortes` int(11) DEFAULT NULL,
  `emprestimo` int(11) DEFAULT NULL,
  `procurado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agiota`
--

INSERT INTO `agiota` (`id`, `nome`, `url`, `estrelas`, `favorito`, `mortes`, `emprestimo`, `procurado`) VALUES
(1, 'Tico Meria', 'https://i.ibb.co/Fh7t5Qn/7.png', 4, 1, 11, 1, 1),
(2, 'Sávio Lado', 'https://i.ibb.co/Jy2sB2D/8.png', 5, 0, 2, 2, 0),
(3, 'Milan Bel', 'https://i.ibb.co/cCv7N5h/9.png', 3, 0, 1, 3, 1),
(4, 'Sentium Kbeção', 'https://i.ibb.co/6WpTqQZ/10.png', 2, 0, 4, 4, 0),
(5, 'Yasmin Asbolla', 'https://i.ibb.co/6Pgmnk6/11.png', 4, 1, 9, 5, 0),
(6, 'Da o pozo', 'https://i.ibb.co/JdWrLxj/da-o-pozo.jpg', 5, 0, 26, 20, 1),
(7, 'Jiovani', 'https://i.ibb.co/VwsxLpt/jiovane.png', 4, 1, 10, 15, 0),
(8, 'Kataguiri', 'https://i.ibb.co/5TnjTxX/enrique.jpg', 3, 0, 8, 18, 1),
(9, 'GM Endo', 'https://i.ibb.co/kQCRtcV/5.png', 5, 1, 15, 25, 0),
(10, 'Luan graxinha', 'https://i.ibb.co/Pr75b05/Luan-grachinha.jpg', 2, 0, 5, 12, 1),
(11, 'Abraão Toba', 'https://i.ibb.co/C74Tc6m/6.png', 4, 1, 12, 22, 0),
(12, 'Ivis pica fina', 'https://i.ibb.co/r2BwLxB/ivis.jpg', 3, 0, 9, 16, 1),
(13, 'Ciro gomez', 'https://i.ibb.co/YyGYdrp/didilha.jpg', 5, 1, 20, 30, 0),
(14, 'Liz Foley', 'https://i.ibb.co/nQmd49s/sapo.jpg', 4, 0, 14, 28, 1),
(15, 'Estélio Natário', 'https://i.ibb.co/zbY7fd1/capybara.jpg', 2, 1, 6, 10, 0),
(16, 'Thiago Zado', 'https://i.ibb.co/3R8f7Gj/cachorro.jpg', 3, 0, 11, 20, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `divida`
--

CREATE TABLE `divida` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` text DEFAULT NULL,
  `data_pagamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(5, 'Carlos', 'carlos@example.com', 'senhadef'),
(6, 'teste', 'teste@gmail.com', '123'),
(7, 'aaaaaaaaaa', 'aa@gmail.com', '123'),
(9, 'teste', 't@gmail.com', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agiota`
--
ALTER TABLE `agiota`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `divida`
--
ALTER TABLE `divida`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `divida`
--
ALTER TABLE `divida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

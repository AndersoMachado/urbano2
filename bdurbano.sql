-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 08-Dez-2022 às 19:49
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdurbano`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos`
--

DROP TABLE IF EXISTS `arquivos`;
CREATE TABLE IF NOT EXISTS `arquivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `arquivos`
--

INSERT INTO `arquivos` (`id`, `endereco`, `nome`, `iduser`) VALUES
(79, 'arquivos/639239c2d562e.jpg', 'jacarÃ©3.jpg', 14),
(78, 'arquivos/639239c25a9d1.jpg', 'jacarÃ©3.jpg', 14),
(77, 'arquivos/639239c1b2e21.jpg', 'jacarÃ©3.jpg', 14),
(76, 'arquivos/6392397dbe5da.jpg', 'jacarÃ©3.jpg', 14),
(75, 'arquivos/6392397d38192.jpg', 'jacarÃ©3.jpg', 14),
(74, 'arquivos/6392397c9e7db.jpg', 'jacarÃ©3.jpg', 14),
(73, 'arquivos/639238c34f2ee.jpg', 'jacarÃ©3.jpg', 14),
(72, 'arquivos/639238ae2e261.jpg', 'jacarÃ©3.jpg', 14),
(71, 'arquivos/63923880cba6f.jpg', 'jacarÃ©3.jpg', 14),
(70, 'arquivos/6392387fb6c7d.jpg', 'jacarÃ©3.jpg', 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE IF NOT EXISTS `contato` (
  `IDIMG` int(11) NOT NULL AUTO_INCREMENT,
  `Telefone` varchar(20) NOT NULL,
  `Telefone2` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Email2` varchar(100) NOT NULL,
  PRIMARY KEY (`IDIMG`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`IDIMG`, `Telefone`, `Telefone2`, `Email`, `Email2`) VALUES
(1, '41997279532', '41997279532', 'mauricio.santos@edu.pinhais.pr.gov.br', 'mauricio.santos@edu.pinhais.pr.gov.br'),
(74, '41997279532', '41997279532', 'mauricio.santos@edu.pinhais.pr.gov.br', 'mauricio.santos@edu.pinhais.pr.gov.br'),
(75, '41997279532', '41997279532', 'mauricio.santos@edu.pinhais.pr.gov.br', 'mauricio.santos@edu.pinhais.pr.gov.br'),
(76, '41997279532', '41997279532', 'mauricio.santos@edu.pinhais.pr.gov.br', 'mauricio.santos@edu.pinhais.pr.gov.br'),
(77, '41997279532', '41997279532', 'mauricio.santos@edu.pinhais.pr.gov.br', 'mauricio.santos@edu.pinhais.pr.gov.br'),
(78, '41997279532', '41997279532', 'mauricio.santos@edu.pinhais.pr.gov.br', 'mauricio.santos@edu.pinhais.pr.gov.br'),
(79, '41997279532', '41997279532', 'mauricio.santos@edu.pinhais.pr.gov.br', 'mauricio.santos@edu.pinhais.pr.gov.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_arquivos`
--

DROP TABLE IF EXISTS `dados_arquivos`;
CREATE TABLE IF NOT EXISTS `dados_arquivos` (
  `Data` date NOT NULL,
  `Descricao` varchar(300) NOT NULL,
  `Responsavel` varchar(50) NOT NULL,
  `Contato` varchar(100) NOT NULL,
  `Localizacao` varchar(100) DEFAULT NULL,
  `IDIMG` int(11) NOT NULL,
  `Verificado` int(11) NOT NULL DEFAULT '0',
  `IDUSER` int(11) NOT NULL,
  PRIMARY KEY (`IDIMG`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dados_arquivos`
--

INSERT INTO `dados_arquivos` (`Data`, `Descricao`, `Responsavel`, `Contato`, `Localizacao`, `IDIMG`, `Verificado`, `IDUSER`) VALUES
('0012-12-12', 'asas', 'asasa', 'mauricio.santos@edu.pinhais.pr.gov.br', NULL, 79, 0, 14),
('0012-12-12', 'asas', 'asasa', 'mauricio.santos@edu.pinhais.pr.gov.br', NULL, 78, 0, 14),
('0012-12-12', 'asas', 'asasa', 'mauricio.santos@edu.pinhais.pr.gov.br', NULL, 77, 0, 14),
('0012-12-12', 'asas', 'asasa', 'mauricio.santos@edu.pinhais.pr.gov.br', NULL, 76, 0, 14),
('0012-12-12', 'asas', 'asasa', 'mauricio.santos@edu.pinhais.pr.gov.br', NULL, 75, 0, 14),
('0012-12-12', 'asas', 'asasa', 'mauricio.santos@edu.pinhais.pr.gov.br', NULL, 74, 0, 14),
('0012-12-12', 'asas', 'asasa', 'mauricio.santos@edu.pinhais.pr.gov.br', NULL, 73, 0, 14),
('0012-12-12', 'asas', 'asasa', 'mauricio.santos@edu.pinhais.pr.gov.br', NULL, 72, 0, 14),
('0012-12-12', 'asas', 'asasa', 'mauricio.santos@edu.pinhais.pr.gov.br', NULL, 71, 0, 14),
('0012-12-12', 'asas', 'asasa', 'mauricio.santos@edu.pinhais.pr.gov.br', NULL, 70, 0, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Senha` varchar(255) NOT NULL,
  `Moderador` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `Nome`, `Email`, `Senha`, `Moderador`) VALUES
(15, '', '', '$2y$10$u3QkQPVtUvImjCWKLHInOewnswjFa0LqdpFgn.JXgvQ9HHseuW.Mq', 0),
(14, 'asasa', 'mauricio.santos@edu.pinhais.pr.gov.br', '$2y$10$rfWCwQqO1Gt2MhaqFrP60eeDluCR1x0WrPuDu3v2ALbcK1JTMmYCK', 0),
(13, '', '', '$2y$10$T/v1jQKXEi7ezNsRZWGFTep0EeOAd4WFiPl9TTE4Y8U9abxMYEWfm', 0),
(12, '', '', '$2y$10$YjsihyzHYeWyUKHnmt29P./E.neINIXtwS/JXY6d5.kF6fp/efQdW', 0),
(11, 'asasa', 'mauricio.santos@edu.pinhais.pr.gov.br', '$2y$10$v6WkTN8gxdsQA7.5d381yOD8RYOmUk8yntDU1bnvl3XU8pCEgc8n6', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15-Mar-2023 às 11:56
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
-- Banco de dados: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anonima`
--

DROP TABLE IF EXISTS `anonima`;
CREATE TABLE IF NOT EXISTS `anonima` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Endereco` varchar(255) NOT NULL,
  `Data` date NOT NULL,
  `Descricao` varchar(300) NOT NULL,
  `Enderecorua` varchar(100) NOT NULL,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Nomearquivo` varchar(100) NOT NULL,
  `Verificado` int(11) NOT NULL DEFAULT '0',
  `Atendido` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `anonima`
--

INSERT INTO `anonima` (`id`, `Endereco`, `Data`, `Descricao`, `Enderecorua`, `Latitude`, `Longitude`, `Nome`, `Nomearquivo`, `Verificado`, `Atendido`) VALUES
(8, 'arquivos/6410862ee61a0.png', '0002-02-22', 'aaaaaa', '12121', -25.427, -49.1727, '121', 'bombado.png', 0, 0);

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
  `Verificado` int(11) DEFAULT '0',
  `Atendido` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=208 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `arquivos`
--

INSERT INTO `arquivos` (`id`, `endereco`, `nome`, `iduser`, `Verificado`, `Atendido`) VALUES
(207, 'arquivos/641086730bce3.jpg', 'cachorrorua.jpg', 19, 1, 0),
(206, 'arquivos/6410860e5390c.jpg', '5806789.jpg', 32, 0, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=208 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`IDIMG`, `Telefone`, `Telefone2`, `Email`, `Email2`) VALUES
(207, '12121', '21212', 'andersonmachado@gmail.com', 'andermach@gmail.com'),
(206, '1424324', '123131', 'andermach1@gmail.com', 'andermach@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_arquivos`
--

DROP TABLE IF EXISTS `dados_arquivos`;
CREATE TABLE IF NOT EXISTS `dados_arquivos` (
  `Data` date NOT NULL,
  `Descricao` varchar(300) NOT NULL,
  `Responsavel` varchar(50) NOT NULL,
  `IDIMG` int(11) NOT NULL,
  `IDUSER` int(11) NOT NULL,
  PRIMARY KEY (`IDIMG`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dados_arquivos`
--

INSERT INTO `dados_arquivos` (`Data`, `Descricao`, `Responsavel`, `IDIMG`, `IDUSER`) VALUES
('0021-12-12', 'aaaaaa', 'Anderson Machado', 207, 19),
('0022-02-12', '21212', 'anderson machado brandÃ£o', 206, 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ftperfil`
--

DROP TABLE IF EXISTS `ftperfil`;
CREATE TABLE IF NOT EXISTS `ftperfil` (
  `nome` varchar(255) NOT NULL,
  `iduser` int(11) NOT NULL,
  `endereco` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ftperfil`
--

INSERT INTO `ftperfil` (`nome`, `iduser`, `endereco`) VALUES
('ruacuritiba.jpg', 0, ''),
('ruacuritiba.jpg', 0, ''),
('ruacuritiba.jpg', 19, 'arquivos/6406fa0a50fdf.jpg'),
('image.jpg', 18, 'arquivos/63cfb42882f41.jpg'),
('bombado.png', 24, 'arquivos/63cfb62e45031.png'),
('image.jpg', 24, 'arquivos/63cfb62e45031.png'),
('image.jpg', 23, ''),
('image.jpg', 26, 'arquivos/63cfb918ed04e.jpg'),
('Boa brandÃ£o.png', 31, 'arquivos/63ed7c2a38142.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `maps`
--

DROP TABLE IF EXISTS `maps`;
CREATE TABLE IF NOT EXISTS `maps` (
  `idmaps` int(11) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(60) DEFAULT NULL,
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `IDIMG` int(11) NOT NULL,
  PRIMARY KEY (`idmaps`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `maps`
--

INSERT INTO `maps` (`idmaps`, `endereco`, `latitude`, `longitude`, `nome`, `IDIMG`) VALUES
(23, '12121', -25.427050, -49.172729, '1111', 206),
(24, '12121', -25.427050, -49.172729, '121', 207);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontos`
--

DROP TABLE IF EXISTS `pontos`;
CREATE TABLE IF NOT EXISTS `pontos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idimg` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pontos`
--

INSERT INTO `pontos` (`id`, `idimg`) VALUES
(1, 182),
(2, 182),
(3, 182),
(4, 182),
(5, 182),
(6, 182),
(7, 182),
(8, 184),
(9, 184),
(10, 184),
(11, 1),
(12, 6);

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
  `prefeitura` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `Nome`, `Email`, `Senha`, `Moderador`, `prefeitura`) VALUES
(15, '', '', '$2y$10$u3QkQPVtUvImjCWKLHInOewnswjFa0LqdpFgn.JXgvQ9HHseuW.Mq', 0, NULL),
(14, 'asasa', 'mauricio.santos@edu.pinhais.pr.gov.br', '$2y$10$rfWCwQqO1Gt2MhaqFrP60eeDluCR1x0WrPuDu3v2ALbcK1JTMmYCK', 0, NULL),
(13, '', '', '$2y$10$T/v1jQKXEi7ezNsRZWGFTep0EeOAd4WFiPl9TTE4Y8U9abxMYEWfm', 0, NULL),
(12, '', '', '$2y$10$YjsihyzHYeWyUKHnmt29P./E.neINIXtwS/JXY6d5.kF6fp/efQdW', 0, NULL),
(11, 'asasa', 'mauricio.santos@edu.pinhais.pr.gov.br', '$2y$10$v6WkTN8gxdsQA7.5d381yOD8RYOmUk8yntDU1bnvl3XU8pCEgc8n6', 0, NULL),
(16, 'anderson', 'testemoderador@gmail.com', '$2y$10$Sod8ikx9vxX9ub6veG.CzOciy.ml96nFwW3JgcJBCow6xD5ZaW3gG', 0, NULL),
(18, 'anderson', 'anderson@gmail.com', '$2y$10$l5/To97BHwv.qIfAHsK2w.THK3tgbzDka88xUn9I5GJBDvfxWS99m', 0, NULL),
(19, 'Anderson Machado', 'andersonmachado@gmail.com', '$2y$10$Ez1F1kwz6C6Wji1mzuNDWOM1Y4jCagG.ym7M653c2ktP5aWFOi1Zy', 1, 1),
(22, 'pinhais', 'prefpinhais@gmail.com', '$2y$10$efalfAYFJudhUmUXL0TjS.OVWZUMQNx4h6ZV8pyhYgytsOdLyby0.', 0, NULL),
(23, 'anderson', 'an@gmail.com', '$2y$10$kk9gZx9V.JtYsi9PwDd.5OSKkRinl.0hRyI5PBi0dxVXD1nM39Zbe', 0, NULL),
(24, 'anderson', 'an1@gmail.com', '$2y$10$5OT8qaEk2VjO0vi2Dbu7c.JsHDFTejPyy5nsnvNDbWAAW05IYStRe', 0, NULL),
(25, '1', 'testemoderador@gmail.com', '$2y$10$kqcIW1.ar6/ZA/5q/YEdwuKJ0a.4jNlO58Rhs4jQiythJpRTCvEIu', 0, NULL),
(26, 'q', 'q@gmail.com', '$2y$10$i.UyNhrLQd/etkWhMq2Nl.KD8BcWSsMc9caDy/teNdXCePl.htML2', 0, NULL),
(27, 'a', 'aa@gmail.com', '$2y$10$ISEy.oLujKDil1hRM2JkXuIhiJMtvOE27FqN3OuQxwX5a9NeEO4xK', 0, NULL),
(28, 'Machado', 'anderson@gmail.com', '$2y$10$2IuPYW5iAciOxRZBsla9LOVkOyIuATC79/3fXdDukczJTyI1HM2sK', 0, NULL),
(29, 'anderson1machado', 'a@gmail.com', '$2y$10$oN3sIoFaq7PCWHARnvOgy.LzLgCyXyykuKEb1ySM5WvZhMyCobocy', 0, NULL),
(30, 'anderson1 machado', 'a@gmail.com', '$2y$10$t6pyDU7gsQqBTELeyQaigOK2TznTT0ozAbji9vVotpZgD8Ij3umkK', 0, NULL),
(31, 'meuro brandao', 'meurobrandao@gmail.com', '$2y$10$6WHRqebl7qAamHm4ocZ9COPjp2Z8DZVcNTD3bWC.Z79babHGJtZZW', 0, NULL),
(32, 'anderson machado brandÃ£o', 'andermach1@gmail.com', '$2y$10$cRUuqNtJrhIn0bHEK8K82OEhvkuY0D.NFzOyImtUan8wAAbrL2KO6', 0, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

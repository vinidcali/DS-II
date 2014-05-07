-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2014 at 08:49 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vaca`
--

-- --------------------------------------------------------

--
-- Table structure for table `aula`
--

CREATE TABLE IF NOT EXISTS `aula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conteudo` varchar(1000) DEFAULT NULL,
  `dataHora` datetime NOT NULL,
  `cal_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dataHora` (`dataHora`),
  KEY `cal_id` (`cal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `aula`
--

INSERT INTO `aula` (`id`, `conteudo`, `dataHora`, `cal_id`) VALUES
(1, 'Arroz', '2014-05-05 19:00:00', 1),
(2, NULL, '2014-05-10 19:00:00', 1),
(3, NULL, '2014-05-13 19:00:00', 1),
(4, NULL, '2014-05-15 19:00:00', 1),
(5, NULL, '2014-05-05 09:00:00', 2),
(6, NULL, '2014-05-10 09:00:00', 2),
(7, NULL, '2014-05-13 09:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `calendario`
--

CREATE TABLE IF NOT EXISTS `calendario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disc_id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`),
  KEY `disc_id` (`disc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `calendario`
--

INSERT INTO `calendario` (`id`, `disc_id`, `nome`) VALUES
(1, 1, 'ADS2012'),
(2, 2, 'TEC2014'),
(3, 28, 'aRRoz'),
(4, 28, 'Banana');

-- --------------------------------------------------------

--
-- Table structure for table `disciplina`
--

CREATE TABLE IF NOT EXISTS `disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `creditos` int(11) DEFAULT NULL,
  `codigo` varchar(20) NOT NULL,
  `prof_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `prof_id` (`prof_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `disciplina`
--

INSERT INTO `disciplina` (`id`, `nome`, `creditos`, `codigo`, `prof_id`) VALUES
(1, 'Banco de Dados I', NULL, 'ES.BD1', 1),
(2, 'Programação I', 60, 'EM.P1', 2),
(28, 'ARROZ', NULL, 'YARYAR', 3);

-- --------------------------------------------------------

--
-- Table structure for table `etapa`
--

CREATE TABLE IF NOT EXISTS `etapa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) NOT NULL,
  `disc_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `disc_id` (`disc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `senha` varchar(50) NOT NULL,
  `cpf` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `email`, `senha`, `cpf`) VALUES
(1, 'Pessoa 1', 'p1@gmail.com', 'p1', 11111),
(2, 'Pessoa 2', 'p2@gmail.com', 'p2', 21345),
(3, 'Pessoa 3', 'p2@gmail.com', 'p3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `id` int(11) NOT NULL,
  `titulo` enum('Mestre(a)','Doutor(a)') DEFAULT NULL,
  `area` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`id`, `titulo`, `area`) VALUES
(1, NULL, NULL),
(2, NULL, NULL),
(3, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `aula_ibfk_1` FOREIGN KEY (`cal_id`) REFERENCES `calendario` (`id`);

--
-- Constraints for table `calendario`
--
ALTER TABLE `calendario`
  ADD CONSTRAINT `calendario_ibfk_1` FOREIGN KEY (`disc_id`) REFERENCES `disciplina` (`id`);

--
-- Constraints for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`prof_id`) REFERENCES `professor` (`id`);

--
-- Constraints for table `etapa`
--
ALTER TABLE `etapa`
  ADD CONSTRAINT `etapa_ibfk_1` FOREIGN KEY (`disc_id`) REFERENCES `disciplina` (`id`);

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pessoa` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

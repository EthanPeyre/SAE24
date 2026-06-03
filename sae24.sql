-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2026 at 05:28 
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sae24`
--

-- --------------------------------------------------------

--
-- Table structure for table `livrable`
--

CREATE TABLE IF NOT EXISTS `livrable` (
  `id_livrable` int(11) NOT NULL,
  `nom_livrable` varchar(30) NOT NULL,
  `desc_livrable` varchar(30) NOT NULL,
  `type_livrable` varchar(30) NOT NULL,
  `date_depot` date NOT NULL,
  `url_fichier` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(11) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `fonction` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `id_prive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prive`
--

CREATE TABLE IF NOT EXISTS `prive` (
  `id_prive` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `livrable`
--
ALTER TABLE `livrable`
 ADD PRIMARY KEY (`id_livrable`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
 ADD PRIMARY KEY (`id_membre`), ADD KEY `id_prive` (`id_prive`);

--
-- Indexes for table `prive`
--
ALTER TABLE `prive`
 ADD PRIMARY KEY (`id_prive`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `membre`
--
ALTER TABLE `membre`
ADD CONSTRAINT `membre_ibfk_1` FOREIGN KEY (`id_prive`) REFERENCES `prive` (`id_prive`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

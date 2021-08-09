-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2021 at 04:06 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetpfe`
--

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `etudiant_bac`
--

DROP TABLE IF EXISTS `etudiant_bac`;
CREATE TABLE IF NOT EXISTS `etudiant_bac` (
  `pseudo` varchar(255) NOT NULL,
  `NomLycee` varchar(255) NOT NULL,
  `VilleLycee` varchar(255) NOT NULL,
  `TypeBac` varchar(255) NOT NULL,
  PRIMARY KEY (`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `etudiant_formation`
--

DROP TABLE IF EXISTS `etudiant_formation`;
CREATE TABLE IF NOT EXISTS `etudiant_formation` (
  `pseudo` varchar(255) NOT NULL,
  `formation1` text NOT NULL,
  `formation2` text NOT NULL,
  `formation3` text NOT NULL,
  PRIMARY KEY (`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `etudiant_info`
--

DROP TABLE IF EXISTS `etudiant_info`;
CREATE TABLE IF NOT EXISTS `etudiant_info` (
  `pseudo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `dateNaissance` date NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

DROP TABLE IF EXISTS `mentor`;
CREATE TABLE IF NOT EXISTS `mentor` (
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mentor_bac`
--

DROP TABLE IF EXISTS `mentor_bac`;
CREATE TABLE IF NOT EXISTS `mentor_bac` (
  `pseudo` varchar(255) NOT NULL,
  `NomLycee` varchar(255) NOT NULL,
  `VilleLycee` varchar(255) NOT NULL,
  `TypeBac` varchar(255) NOT NULL,
  `FiliereBac` varchar(255) NOT NULL,
  `Mention` varchar(255) NOT NULL,
  `anneeBac` int(11) NOT NULL,
  `MatiereForte` varchar(255) NOT NULL,
  `MatiereFaible` varchar(255) NOT NULL,
  PRIMARY KEY (`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mentor_info`
--

DROP TABLE IF EXISTS `mentor_info`;
CREATE TABLE IF NOT EXISTS `mentor_info` (
  `pseudo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `dateNaissance` date NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mentor_situation`
--

DROP TABLE IF EXISTS `mentor_situation`;
CREATE TABLE IF NOT EXISTS `mentor_situation` (
  `pseudo` varchar(255) NOT NULL,
  `NiveauEtude` varchar(255) NOT NULL,
  `NomEtablissement` varchar(255) NOT NULL,
  `TypeEtablissement` varchar(255) NOT NULL,
  `VilleEtablissement` varchar(255) NOT NULL,
  `DateDebutF` date NOT NULL,
  `DateFinF` date NOT NULL,
  `NomEntreprise` varchar(255) NOT NULL,
  `Secteur` varchar(255) NOT NULL,
  `DateDebutT` date NOT NULL,
  PRIMARY KEY (`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rendez_vous`
--

DROP TABLE IF EXISTS `rendez_vous`;
CREATE TABLE IF NOT EXISTS `rendez_vous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_etudiant` varchar(255) NOT NULL,
  `pseudo_mentor` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `statut` varchar(255) NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pseudo_etudiant` (`pseudo_etudiant`),
  KEY `pseudo_mentor` (`pseudo_mentor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `rendez_vous_ibfk_1` FOREIGN KEY (`pseudo_etudiant`) REFERENCES `etudiant` (`pseudo`),
  ADD CONSTRAINT `rendez_vous_ibfk_2` FOREIGN KEY (`pseudo_mentor`) REFERENCES `mentor` (`pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

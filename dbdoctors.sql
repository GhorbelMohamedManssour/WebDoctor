-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Dim 10 Avril 2016 à 22:40
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `dbdoctors`
--

-- --------------------------------------------------------

--
-- Structure de la table `medecins`
--

CREATE TABLE IF NOT EXISTS `medecins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `medecins`
--

INSERT INTO `medecins` (`id`, `nom`, `prenom`, `matricule`, `email`, `dob`, `location`, `password`) VALUES
(4, 'gzayel', 'abdelmonaem', 'abc1994', 'monaem.gzayel@ensi-uma.tn', '1994-04-09', 'avenue hbib borghiba', '29960330'),
(5, 'med', 'mansour', 'man94', 'ghorbelmohamed37@gmail.com', '1999-06-14', 'avenue hbib borghiba', '12345'),
(6, 'mallek', 'morsi', 'm12394', 'mallek.morsi@gmail.com', '29-01-1994', 'sfax', '123456789');

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

CREATE TABLE IF NOT EXISTS `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `datee` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `operation`
--

INSERT INTO `operation` (`id`, `matricule`, `nom`, `prenom`, `prix`, `datee`, `action`) VALUES
(5, 'm12394', 'krimi', 'talel', '40', '2016-04-15', 'consultation'),
(6, 'm12394', 'krimi', 'talel', '60', '2016-04-16', 'consultation'),
(7, 'm12394', 'krimi', 'talel', '150', '2016-04-16', 'operation'),
(8, 'm12394', 'mallek', 'morsi', '40', '2016-04-10', 'consultation'),
(9, 'm12394', 'krimi', 'talel', '70', '2016-04-10', 'consultation');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id_patients` int(11) NOT NULL AUTO_INCREMENT,
  `mat_medecin` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  PRIMARY KEY (`id_patients`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `patients`
--

INSERT INTO `patients` (`id_patients`, `mat_medecin`, `nom`, `prenom`, `mobile_number`, `email`, `dob`, `location`, `notes`) VALUES
(12, 'm12394', 'krimi', 'talel', '22222222', 'krimi.talel@ensi-uma.tn', '1994-04-07', 'monastir', 'bla bla bla bla bla bla bla bla bla '),
(13, 'm12394', 'mallek', 'morsi', '29999999', 'monaem.gzayel@gmail.com', '2016-04-20', 'avenue hbib borghiba', 'ddgjjkk');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

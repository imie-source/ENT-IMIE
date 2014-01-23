-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 16 Janvier 2014 à 02:06
-- Version du serveur: 5.5.31
-- Version de PHP: 5.4.4-14+deb7u5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `imie`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `idClasse` int(11) NOT NULL AUTO_INCREMENT,
  `cursus` text NOT NULL,
  `session` text NOT NULL,
  `centreDeFormation` text NOT NULL,
  PRIMARY KEY (`idClasse`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`idClasse`, `cursus`, `session`, `centreDeFormation`) VALUES
(1, 'ITStart', '2013', 'Rennes'),
(2, 'ItStart', '2013', 'Rennes'),
(3, 'ItStart', '2013', 'Rennes'),
(4, 'ItStart', '2013', 'Rennes'),
(5, 'ITStart', '2013', 'Rennes');

-- --------------------------------------------------------

--
-- Structure de la table `devoir`
--

CREATE TABLE IF NOT EXISTS `devoir` (
  `idDevoir` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idDevoir`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `devoir`
--

INSERT INTO `devoir` (`idDevoir`, `intitule`, `date`) VALUES
(1, 'QCM Linux', '2013-12-09'),
(2, 'QCM TCP/IP', '2014-01-05'),
(3, 'Test Algo', '2013-12-09'),
(4, 'Test Linux', '2013-12-09'),
(5, 'Test Anglais', '2013-11-05'),
(6, 'Oral Projet', '2013-10-15'),
(7, 'Oral Com', '2013-11-05'),
(8, 'Projet', '2013-11-19'),
(9, 'Test Windows 7', '2013-10-30'),
(10, 'Test Dev', '2014-01-21');

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
  `idDomaine` int(11) NOT NULL AUTO_INCREMENT,
  `nomDomaine` text NOT NULL,
  PRIMARY KEY (`idDomaine`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`idDomaine`, `nomDomaine`) VALUES
(1, 'Systèmes et Réseaux'),
(2, 'Développement'),
(3, 'Culture transversale de l''entreprise');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE IF NOT EXISTS `eleve` (
  `idEleve` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`idEleve`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `eleve`
--

INSERT INTO `eleve` (`idEleve`, `nom`, `prenom`, `email`) VALUES
(1, 'Robert', 'Herbert', 'Robert.herbert@truc.com'),
(2, 'Aimarre', 'Jean', 'Aimmare.Jean@truc.com'),
(3, 'Henry', 'Serge', 'henry.serge@truc.fr'),
(4, 'Schwarz', 'Arnold', 'schwarz.arnold@truc.fr');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE IF NOT EXISTS `matiere` (
  `idMatiere` int(2) NOT NULL AUTO_INCREMENT,
  `nomMatiere` text NOT NULL,
  PRIMARY KEY (`idMatiere`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`idMatiere`, `nomMatiere`) VALUES
(1, 'Algorithmie'),
(2, 'Developpement'),
(3, 'Base de données'),
(4, 'Web design'),
(5, 'Réseaux'),
(6, 'Systèmes'),
(7, 'Virtualisation'),
(8, 'Communication'),
(9, 'Economie'),
(10, 'Histoire');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `note` int(2) NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pass`
--

CREATE TABLE IF NOT EXISTS `pass` (
  `login` int(11) NOT NULL,
  `pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE IF NOT EXISTS `professeur` (
  `idProfesseur` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  PRIMARY KEY (`idProfesseur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `professeur`
--

INSERT INTO `professeur` (`idProfesseur`, `email`, `nom`, `prenom`) VALUES
(1, 'imie.rennes', 'Coude', 'Serge'),
(2, 'imie.rennes', 'LeGouriec', 'Deny'),
(3, 'imie.rennes', 'Dupond', 'Marion'),
(4, 'imie.rennes', 'Gilles', 'Jules'),
(5, 'imie.rennes', 'Alocat', 'Alex'),
(6, 'imie.rennes', 'Salles', 'Sally'),
(7, 'imie.rennes', 'Sainte', 'Anne'),
(8, 'imie.rennes', 'Plant', 'Suzanne'),
(9, 'imie.rennes', 'Gillot', 'Patrick'),
(10, 'imie.rennes', 'March', 'Julien');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

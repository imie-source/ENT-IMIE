-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Ven 24 Janvier 2014 à 16:48
-- Version du serveur: 5.6.11-log
-- Version de PHP: 5.4.14

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
  `idMatiere` int(11) NOT NULL,
  `idClasse` int(11) NOT NULL,
  `sujet` text NOT NULL,
  `corrige` text NOT NULL,
  PRIMARY KEY (`idDevoir`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `devoir`
--

INSERT INTO `devoir` (`idDevoir`, `intitule`, `date`, `idMatiere`, `idClasse`, `sujet`, `corrige`) VALUES
(1, 'QCM Linux', '2013-12-09', 6, 4, 'aaaaaaaaaaaa', 'a'),
(2, 'QCM TCP/IP', '2014-01-05', 7, 1, 'zzzzzzzzzzzz', 'z'),
(3, 'Test Algo', '2013-12-09', 1, 4, 'eeeeeeeeeeeeeeee', 'e'),
(4, 'Test Linux', '2013-12-09', 10, 5, 'rrrrrrrrrrrrrrr', 'r'),
(5, 'Test Anglais', '2013-11-05', 2, 3, 'tttttttttttttttt', 't'),
(6, 'Oral Projet', '2013-10-15', 3, 2, 'yyyyyyyyyyyyyyyy', 'y'),
(7, 'Oral Com', '2013-11-05', 4, 2, 'uuuuuuuuuuuuuuuuuu', 'u'),
(8, 'Projet', '2013-11-19', 9, 5, 'iiiiiiiiiiiiiiiiii', 'i'),
(9, 'Test Windows 7', '2013-10-30', 5, 3, 'ooooooooooooo', 'o'),
(10, 'Test Dev', '2014-01-21', 8, 1, 'ppppppppppppppppppp', 'p');

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
  `idClasse` int(11) NOT NULL,
  `numAdresse` int(11) NOT NULL,
  `voie` varchar(255) NOT NULL,
  `CP` int(11) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `login` varchar(50) NOT NULL,
  PRIMARY KEY (`idEleve`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `eleve`
--

INSERT INTO `eleve` (`idEleve`, `nom`, `prenom`, `email`, `idClasse`, `numAdresse`, `voie`, `CP`, `ville`, `login`) VALUES
(1, 'Robert', 'Herbert', 'Robert.herbert@truc.com', 1, 15, 'Aveneu', 35000, 'Rennes', ''),
(2, 'Aimarre', 'Jean', 'Aimmare.Jean@truc.com', 3, 12, 'Rue', 44000, 'Nantes', ''),
(3, 'Henry', 'Serge', 'henry.serge@truc.fr', 5, 5, 'Boulevard', 75000, 'Paris', ''),
(4, 'Schwarz', 'Arnold', 'schwarz.arnold@truc.fr', 2, 2, 'Place', 94000, 'Bobigny', '');

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

CREATE TABLE IF NOT EXISTS `formateur` (
  `idFormateur` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  PRIMARY KEY (`idFormateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `formateur`
--

INSERT INTO `formateur` (`idFormateur`, `email`, `nom`, `prenom`) VALUES
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

-- --------------------------------------------------------

--
-- Structure de la table `formateur_has_classe`
--

CREATE TABLE IF NOT EXISTS `formateur_has_classe` (
  `idFormateur` int(11) NOT NULL,
  `idClasse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `formateur_has_devoir`
--

CREATE TABLE IF NOT EXISTS `formateur_has_devoir` (
  `idFormateur` int(11) NOT NULL,
  `idDevoir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE IF NOT EXISTS `matiere` (
  `idMatiere` int(2) NOT NULL AUTO_INCREMENT,
  `nomMatiere` text NOT NULL,
  `idDomaine` int(11) NOT NULL,
  PRIMARY KEY (`idMatiere`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`idMatiere`, `nomMatiere`, `idDomaine`) VALUES
(1, 'Algorithmie', 2),
(2, 'Developpement', 2),
(3, 'Base de données', 2),
(4, 'Web design', 2),
(5, 'Réseaux', 1),
(6, 'Systèmes', 1),
(7, 'Virtualisation', 1),
(8, 'Communication', 3),
(9, 'Economie', 3),
(10, 'Histoire', 3);

-- --------------------------------------------------------

--
-- Structure de la table `matiere_has_formateur`
--

CREATE TABLE IF NOT EXISTS `matiere_has_formateur` (
  `idMatiere` int(11) NOT NULL,
  `idFormateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `note` int(2) NOT NULL,
  `commentaire` text NOT NULL,
  `idDevoir` int(11) NOT NULL,
  `idEleve` int(11) NOT NULL,
  `idMatiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`note`, `commentaire`, `idDevoir`, `idEleve`, `idMatiere`) VALUES
(15, 'Bien joue', 3, 4, 9),
(12, 'Pas mal', 8, 2, 8),
(9, 'Nul', 4, 3, 3),
(17, 'Excellent', 2, 3, 7);

-- --------------------------------------------------------

--
-- Structure de la table `pass`
--

CREATE TABLE IF NOT EXISTS `pass` (
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pass`
--

INSERT INTO `pass` (`login`, `pass`) VALUES
('aimar.jean', 'aim.jea123'),
('henry.serge', 'hen.ser123'),
('robert.herbert', 'rob.her123'),
('schwarz.arnold', 'sch.arn123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

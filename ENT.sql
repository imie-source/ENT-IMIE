-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 10 Février 2014 à 15:43
-- Version du serveur: 5.5.31
-- Version de PHP: 5.4.4-14+deb7u5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ENT`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `idAdresse` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `utilisateur_idUtilisateur` int(10) unsigned NOT NULL,
  `typeVoie_idTypeVoie` int(10) unsigned NOT NULL,
  `ville_idVille` int(10) unsigned NOT NULL,
  `numero` varchar(20) NOT NULL,
  `voie` varchar(255) NOT NULL,
  `complement` varchar(255) NOT NULL,
  PRIMARY KEY (`idAdresse`),
  KEY `utilisateur_idUtilisateur` (`utilisateur_idUtilisateur`),
  KEY `typeVoie_idTypeVoie` (`typeVoie_idTypeVoie`),
  KEY `ville_idVille` (`ville_idVille`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `appreciation`
--

CREATE TABLE IF NOT EXISTS `appreciation` (
  `idAppreciation` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `appreciation` text,
  `annee` int(11) NOT NULL,
  `trimestre_idTrimestre` int(10) unsigned NOT NULL,
  `utilisateur_idUtilisateur` int(10) unsigned NOT NULL,
  `matiere_idMatiere` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idAppreciation`),
  KEY `trimestre_idTrimestre` (`trimestre_idTrimestre`),
  KEY `utilisateur_idUtilisateur` (`utilisateur_idUtilisateur`),
  KEY `matiere_idMatiere` (`matiere_idMatiere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `idClasse` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cursus` varchar(45) NOT NULL,
  `session` int(11) NOT NULL,
  `centreFormation` varchar(45) NOT NULL,
  PRIMARY KEY (`idClasse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `codePostal`
--

CREATE TABLE IF NOT EXISTS `codePostal` (
  `idCodePostal` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codePostal` int(11) NOT NULL,
  PRIMARY KEY (`idCodePostal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `correctionDevoir`
--

CREATE TABLE IF NOT EXISTS `correctionDevoir` (
  `utilisateur_idUtilisateur` int(10) unsigned NOT NULL,
  `devoir_idDevoir` int(10) unsigned NOT NULL,
  `note` float NOT NULL,
  `commentaire` text,
  PRIMARY KEY (`utilisateur_idUtilisateur`,`devoir_idDevoir`),
  KEY `devoir_idDevoir` (`devoir_idDevoir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `devoir`
--

CREATE TABLE IF NOT EXISTS `devoir` (
  `idDevoir` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `utilisateur_idUtilisateur` int(10) unsigned NOT NULL,
  `classe_idClasse` int(10) unsigned NOT NULL,
  `intitule` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `lienSujet` varchar(255) DEFAULT NULL,
  `lienCorige` varchar(255) DEFAULT NULL,
  `moyenne` float NOT NULL,
  PRIMARY KEY (`idDevoir`),
  KEY `utilisateur_idUtilisateur` (`utilisateur_idUtilisateur`),
  KEY `classe_idClasse` (`classe_idClasse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `devoir_has_matiere`
--

CREATE TABLE IF NOT EXISTS `devoir_has_matiere` (
  `devoir_idDevoir` int(10) unsigned NOT NULL,
  `matiere_idMatiere` int(10) unsigned NOT NULL,
  PRIMARY KEY (`devoir_idDevoir`,`matiere_idMatiere`),
  KEY `matiere_idMatiere` (`matiere_idMatiere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
  `idDomaine` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomDomaine` varchar(45) NOT NULL,
  PRIMARY KEY (`idDomaine`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE IF NOT EXISTS `matiere` (
  `idMatiere` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomMatiere` varchar(45) NOT NULL,
  `domaine_idDomaine` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idMatiere`),
  KEY `domaine_idDomaine` (`domaine_idDomaine`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE IF NOT EXISTS `statut` (
  `idStatut` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `libelleStatut` varchar(45) NOT NULL,
  PRIMARY KEY (`idStatut`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `statut`
--

INSERT INTO `statut` (`idStatut`, `libelleStatut`) VALUES
(1, 'stagiaire'),
(2, 'formateur');

-- --------------------------------------------------------

--
-- Structure de la table `trimestre`
--

CREATE TABLE IF NOT EXISTS `trimestre` (
  `idTrimestre` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `libelleTrimestre` varchar(20) NOT NULL,
  PRIMARY KEY (`idTrimestre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `typeVoie`
--

CREATE TABLE IF NOT EXISTS `typeVoie` (
  `idTypeVoie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typeVoie` varchar(20) NOT NULL,
  PRIMARY KEY (`idTypeVoie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `mp` varchar(255) NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `mail`, `login`, `mp`) VALUES
(1, 'Coudé', 'Serge', 'coude.serge@imie.fr', 'Serge', '1234'),
(2, 'Durant', 'Gudule', 'gudule.durant@imie.fr', 'Gudule', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_has_classe`
--

CREATE TABLE IF NOT EXISTS `utilisateur_has_classe` (
  `utilisateur_idUtilisateur` int(10) unsigned NOT NULL,
  `classe_idClasse` int(10) unsigned NOT NULL,
  PRIMARY KEY (`utilisateur_idUtilisateur`,`classe_idClasse`),
  KEY `classe_idClasse` (`classe_idClasse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_has_matiere`
--

CREATE TABLE IF NOT EXISTS `utilisateur_has_matiere` (
  `utilisateur_idUtilisateur` int(10) unsigned NOT NULL,
  `matiere_idMatiere` int(10) unsigned NOT NULL,
  PRIMARY KEY (`utilisateur_idUtilisateur`,`matiere_idMatiere`),
  KEY `matiere_idMatiere` (`matiere_idMatiere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_has_statut`
--

CREATE TABLE IF NOT EXISTS `utilisateur_has_statut` (
  `utilisateur_idUtilisateur` int(10) unsigned NOT NULL,
  `statut_idStatut` int(10) unsigned NOT NULL,
  PRIMARY KEY (`utilisateur_idUtilisateur`,`statut_idStatut`),
  KEY `statut_idStatut` (`statut_idStatut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur_has_statut`
--

INSERT INTO `utilisateur_has_statut` (`utilisateur_idUtilisateur`, `statut_idStatut`) VALUES
(2, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `idVille` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomVille` varchar(45) NOT NULL,
  `codePostal_idCodePostal` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idVille`),
  KEY `codePostal_idCodePostal` (`codePostal_idCodePostal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `adresse_ibfk_2` FOREIGN KEY (`typeVoie_idTypeVoie`) REFERENCES `typeVoie` (`idTypeVoie`),
  ADD CONSTRAINT `adresse_ibfk_3` FOREIGN KEY (`ville_idVille`) REFERENCES `ville` (`idVille`);

--
-- Contraintes pour la table `appreciation`
--
ALTER TABLE `appreciation`
  ADD CONSTRAINT `appreciation_ibfk_1` FOREIGN KEY (`trimestre_idTrimestre`) REFERENCES `trimestre` (`idTrimestre`),
  ADD CONSTRAINT `appreciation_ibfk_2` FOREIGN KEY (`utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `appreciation_ibfk_3` FOREIGN KEY (`matiere_idMatiere`) REFERENCES `matiere` (`idMatiere`);

--
-- Contraintes pour la table `correctionDevoir`
--
ALTER TABLE `correctionDevoir`
  ADD CONSTRAINT `correctionDevoir_ibfk_1` FOREIGN KEY (`utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `correctionDevoir_ibfk_2` FOREIGN KEY (`devoir_idDevoir`) REFERENCES `devoir` (`idDevoir`);

--
-- Contraintes pour la table `devoir`
--
ALTER TABLE `devoir`
  ADD CONSTRAINT `devoir_ibfk_1` FOREIGN KEY (`utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `devoir_ibfk_2` FOREIGN KEY (`classe_idClasse`) REFERENCES `classe` (`idClasse`);

--
-- Contraintes pour la table `devoir_has_matiere`
--
ALTER TABLE `devoir_has_matiere`
  ADD CONSTRAINT `devoir_has_matiere_ibfk_1` FOREIGN KEY (`devoir_idDevoir`) REFERENCES `devoir` (`idDevoir`),
  ADD CONSTRAINT `devoir_has_matiere_ibfk_2` FOREIGN KEY (`matiere_idMatiere`) REFERENCES `matiere` (`idMatiere`);

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `matiere_ibfk_1` FOREIGN KEY (`domaine_idDomaine`) REFERENCES `domaine` (`idDomaine`);

--
-- Contraintes pour la table `utilisateur_has_classe`
--
ALTER TABLE `utilisateur_has_classe`
  ADD CONSTRAINT `utilisateur_has_classe_ibfk_1` FOREIGN KEY (`utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `utilisateur_has_classe_ibfk_2` FOREIGN KEY (`classe_idClasse`) REFERENCES `classe` (`idClasse`);

--
-- Contraintes pour la table `utilisateur_has_matiere`
--
ALTER TABLE `utilisateur_has_matiere`
  ADD CONSTRAINT `utilisateur_has_matiere_ibfk_1` FOREIGN KEY (`utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `utilisateur_has_matiere_ibfk_2` FOREIGN KEY (`matiere_idMatiere`) REFERENCES `matiere` (`idMatiere`);

--
-- Contraintes pour la table `utilisateur_has_statut`
--
ALTER TABLE `utilisateur_has_statut`
  ADD CONSTRAINT `utilisateur_has_statut_ibfk_1` FOREIGN KEY (`utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `utilisateur_has_statut_ibfk_2` FOREIGN KEY (`statut_idStatut`) REFERENCES `statut` (`idStatut`);

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`codePostal_idCodePostal`) REFERENCES `codePostal` (`idCodePostal`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

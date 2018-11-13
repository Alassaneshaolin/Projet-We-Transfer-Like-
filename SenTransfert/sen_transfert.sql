-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 13 nov. 2018 à 15:24
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sen_transfert`
--

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

DROP TABLE IF EXISTS `fichier`;
CREATE TABLE IF NOT EXISTS `fichier` (
  `id_fichier` int(11) NOT NULL AUTO_INCREMENT,
  `lien_fichier` varchar(255) NOT NULL,
  `email_utilisateur` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `taille` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`id_fichier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Email_utilisateur` varchar(255) NOT NULL,
  `Email_recepteur` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `lien_fichier` varchar(255) NOT NULL,
  `id_fichier` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  KEY `id_fichier` (`id_fichier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_fichier`) REFERENCES `fichier` (`id_fichier`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

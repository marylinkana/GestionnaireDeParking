-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 25 oct. 2018 à 15:44
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `parking3000`
--

-- --------------------------------------------------------

--
-- Structure de la table `places`
--

DROP TABLE IF EXISTS `places`;
CREATE TABLE IF NOT EXISTS `places` (
  `id_p` int(255) NOT NULL AUTO_INCREMENT,
  `id_u` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  PRIMARY KEY (`id_p`),
  KEY `foreign_key_user` (`id_u`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_r` int(11) NOT NULL AUTO_INCREMENT,
  `id_u` int(11) NOT NULL,
  `id_p` int(11) NOT NULL DEFAULT '0',
  `date_deb` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  PRIMARY KEY (`id_r`),
  KEY `foreign_key_place` (`id_p`),
  KEY `foreign_key_user` (`id_u`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_u` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `lvl` int(1) NOT NULL,
  `statutfile` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_u`, `nom`, `password`, `email`, `lvl`, `statutfile`) VALUES
(1, 'test1', 'd01a86ab0422b7c764c0e4a53e96ce874dd562f8', 'email.test@gmail.com', 1, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `foreign_key_place` FOREIGN KEY (`id_p`) REFERENCES `places` (`id_p`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `foreign_key_user` FOREIGN KEY (`id_u`) REFERENCES `users` (`id_u`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

--
-- Contraintes pour la table `place`
--
ALTER TABLE `places`
  ADD CONSTRAINT `foreign_key_user` FOREIGN KEY (`id_u`) REFERENCES `users` (`id_u`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

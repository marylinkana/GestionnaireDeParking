-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 29 mars 2019 à 08:50
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `parking`
--

-- --------------------------------------------------------

--
-- Structure de la table `places`
--

DROP TABLE IF EXISTS `places`;
CREATE TABLE IF NOT EXISTS `places` (
  `id_p` smallint(5) NOT NULL AUTO_INCREMENT,
  `nom_p` varchar(255) NOT NULL,
  PRIMARY KEY (`id_p`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `places`
--

INSERT INTO `places` (`id_p`, `nom_p`) VALUES
(1, 'M1L'),
(2, 'M2L'),
(3, 'M3L'),
(8, 'ML4'),
(9, 'M5L');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id_us` smallint(5) NOT NULL,
  `id_pl` smallint(5) NOT NULL,
  `id_r` smallint(5) NOT NULL AUTO_INCREMENT,
  `dateDebut` varchar(255) NOT NULL,
  `dateFin` varchar(255) NOT NULL,
  PRIMARY KEY (`id_r`),
  KEY `users` (`id_us`),
  KEY `places` (`id_pl`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id_us`, `id_pl`, `id_r`, `dateDebut`, `dateFin`) VALUES
(1, 9, 46, '26-03-19  19:10:54', '27-03-19  19.10.54'),
(1, 9, 45, '25-03-19  12:23:36', '26-03-19  12.23.36'),
(1, 8, 44, '24-03-19  06:51:59', '25-03-19  06.51.59'),
(2, 1, 41, '23-03-19  22:43:42', '24-03-19  22.43.42'),
(1, 4, 35, '23-03-19  22:02:04', '24-03-19  22.02.04'),
(1, 2, 42, '23-03-19  23:22:29', '24-03-19  23.22.29'),
(1, 3, 43, '23-03-19  23:22:40', '24-03-19  23.22.40');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_u` smallint(5) NOT NULL AUTO_INCREMENT,
  `nom_u` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dateInsc` datetime DEFAULT NULL,
  `niveau` int(11) NOT NULL,
  `rang` smallint(6) NOT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_u`, `nom_u`, `prenom`, `mdp`, `email`, `dateInsc`, `niveau`, `rang`) VALUES
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@admin.com', NULL, 2, 1),
(2, 'test', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test@test.com', NULL, 1, 2),
(4, 'Marylin', 'KOSSI', '10ed5e617a6e4ea17d04ed8f71a9f69ae42c713c', 'marylinkossi@gmail.com', NULL, 1, 0),
(5, 'Baudoin', 'KANA', '9c3e2f39ec447b30887b468c41bbed87094cfd9d', 'baudoinkana@gmail.com', NULL, 0, 0),
(6, 'THIVET', 'Amandine', '7bca728bf562dc88483081473cc7a511b1e88be9', 'thivetamandine@free.fr', NULL, 1, 0),
(7, 'Aslane', 'bounabi', '0a0a67d97073ccf4c696e356b78827938abf93fd', 'aslanebounabi@gmail.com', NULL, 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

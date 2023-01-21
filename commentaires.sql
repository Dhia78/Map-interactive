-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 03 jan. 2023 à 21:41
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `espace_commentaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `id_monument` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `pseudo`, `commentaire`, `id_monument`) VALUES
(1, 'Pomme', 'Wow, très belle statue ! ', 1),
(2, 'Pomme', 'Wow, très belle statue ! ', 1),
(3, 'Poire', 'Extraordinaire !\r\nMiss Liberty est un incontournable !!!', 1),
(4, 'Poire', 'Extraordinaire !\r\nMiss Liberty est un incontournable !!!', 1),
(5, 'Poire', 'Extraordinaire !\r\nMiss Liberty est un incontournable !!!', 1),
(6, 'Poire', 'Extraordinaire !\r\nMiss Liberty est un incontournable !!!', 1),
(7, 'Poire', 'Extraordinaire !\r\nMiss Liberty est un incontournable !!!', 1),
(8, 'Poire', 'Extraordinaire !\r\nMiss Liberty est un incontournable !!!', 1),
(9, 'Poire', 'Extraordinaire !\r\nMiss Liberty est un incontournable !!!', 1),
(10, 'Mur', 'Test...', 2),
(11, 'David', 'OMG! Trop beau!!', 7),
(12, 'Dhia', 'Trop moche!!', 7),
(13, 'Dhia', 'La musique était cool', 11),
(14, 'Pomme', 'Il a raison Dhia c\'est trop bien!!', 11),
(15, 'Bonjour', 'C\'est cool!', 9),
(16, 'Bonsoir', 'D\'accord.', 9);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

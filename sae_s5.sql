-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 29 jan. 2024 à 19:12
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae_s5`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `id_adherent` int NOT NULL AUTO_INCREMENT,
  `nom_adherent` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom_adherent` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telephone_adherent` int NOT NULL,
  `email_adherent` varchar(50) NOT NULL,
  `mdp_adherent` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `date_inscription_adherent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_adhesion_adherent` date DEFAULT NULL,
  PRIMARY KEY (`id_adherent`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id_adherent`, `nom_adherent`, `prenom_adherent`, `telephone_adherent`, `email_adherent`, `mdp_adherent`, `admin`, `date_inscription_adherent`, `date_adhesion_adherent`) VALUES
(1, 'nom', 'prenom', 601020304, 'test@mail.com', 'root', 1, '2024-01-28 14:26:53', NULL),
(2, 'nom2', 'prenom2', 601020304, 'test2@mail.com', 'root', 0, '2024-01-28 14:26:53', NULL),
(4, 'huang', 'fred', 601020304, 'fred@hotmail.com', 'root', 1, '2024-01-29 11:22:20', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id_comments` int NOT NULL AUTO_INCREMENT,
  `id_post` int NOT NULL,
  `id_adherent` int NOT NULL,
  `commentaire` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_commentaire` date NOT NULL,
  `like` int NOT NULL DEFAULT '0',
  `date_like` date NOT NULL,
  PRIMARY KEY (`id_comments`),
  KEY `id_adherent` (`id_adherent`),
  KEY `id_post` (`id_post`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `id_adherent` int NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenue` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_post`),
  KEY `id_adherent` (`id_adherent`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id_post`, `id_adherent`, `titre`, `contenue`, `date_post`) VALUES
(1, 1, 'titre du 1er post', 'contenue du post blablabla', '2024-01-28 23:00:00'),
(2, 2, 'titre du 2eme post', 'blabla V2', '2024-01-25 23:00:00'),
(3, 1, 'titre du 3eme post', 'le contenue quoi ?', '2024-01-27 23:00:00'),
(4, 1, 'titre du 4eme post', 'error 404', '2024-01-27 23:00:00'),
(5, 4, 'titre du 5eme post', 'texte du 5eme post', '2024-01-29 18:38:25'),
(6, 4, 'titre du 6eme post', 'blabla', '2024-01-29 18:41:06'),
(7, 4, 'titre du 7eme post', 'truc en bidule', '2024-01-29 18:44:05'),
(8, 4, 'titre du 8eme post', 'on ecrit quoi ?', '2024-01-29 18:45:20'),
(9, 4, 'titre du 9eme post', 'je sais pas !?', '2024-01-29 18:57:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

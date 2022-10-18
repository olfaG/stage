-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 18 oct. 2022 à 14:39
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `ajout-stag`
--

CREATE TABLE `ajout-stag` (
  `id` int(60) NOT NULL,
  `nom` varchar(70) NOT NULL,
  `prenom` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `inscription` date NOT NULL,
  `leçons` int(50) NOT NULL,
  `chapitres` int(150) NOT NULL,
  `modules` int(50) NOT NULL,
  `quizz` int(100) NOT NULL,
  `points` int(100) NOT NULL,
  `dercon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ajout-stag`
--

INSERT INTO `ajout-stag` (`id`, `nom`, `prenom`, `email`, `inscription`, `leçons`, `chapitres`, `modules`, `quizz`, `points`, `dercon`) VALUES
(1, 'olfa', 'karoui', 'olfa.karou@gmail.com', '2022-10-01', 12, 4, 3, 12, 123, '2022-10-03'),
(2, 'olfa', 'karoui', 'olfa.karou@gmail.com', '2022-10-01', 12, 4, 3, 12, 123, '2022-10-03'),
(3, 'sarah', 'oceane', 's.oceane@gmail.com', '2022-10-02', 4, 6, 3, 2, 14, '2022-10-04'),
(4, 'sophie', 'has', 'has.s@gmail.fr', '2022-10-02', 1, 1, 1, 1, 3, '2022-10-02');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ajout-stag`
--
ALTER TABLE `ajout-stag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ajout-stag`
--
ALTER TABLE `ajout-stag`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

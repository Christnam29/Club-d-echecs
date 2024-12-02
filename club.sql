-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 01 nov. 2024 à 13:52
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `club`
--

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

CREATE TABLE `languages` (
  `id` int(5) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `matricule` int(10) NOT NULL,
  `languages` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `languages`
--

INSERT INTO `languages` (`id`, `lastname`, `firstname`, `matricule`, `languages`) VALUES
(1, 'Marc-André', 'AKOUETE', 100124, 'C, Python, HTML/CSS'),
(2, 'ALLOGNON', 'Moise', 100547, 'JAVA');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `profession` varchar(40) NOT NULL,
  `motivations` text NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `profession`, `motivations`, `login`, `password`, `Photo`) VALUES
(1, 'Marc-André', 'AKOUETE', 'christnam29@gmail.co', 'Scolaire', 'Pour jouer', 'login', '$2y$10$n5kchfwOmrkxB5wLP/icoek56hbro0pDzN/4a7agxq.wvrM0Celdm', NULL),
(2, 'Franck', 'SEHLIN', 'divinsehlin13@gmail.', 'Scolaire', 'Pour la mifa tu connais', 'div.sln', '$2y$10$msIzl6/TXqKbkDyTKoBvLOlc4.EJHAyFVU6Vdp.ueRSQogUBxGX1e', NULL),
(3, 'Divin', 'SEHLIN', 'divinsehlin13@gmail.', 'Scolaire', 'pour la mif tu connais\r\n', 'loveur', '$2y$10$mcKZxyDGxk0GGrIcblZ17eJqoNuv4kEg8zXy/TKBBXIjFEfAePRsK', 'upload_img/Capture d\'écran 2024-10-24 213135.png'),
(4, 'Nadia', 'AYEDAYO', 'ayedia@yahoo.fr', 'Architecte', 'Par ce que j&#039;aime l&#039;architecture', 'ayedia', '$2y$10$VQvxd.PNjYV9FBqK.Xu5kuakwzg8vUuRPa.GtW8NgsFMdIS8NVhUm', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

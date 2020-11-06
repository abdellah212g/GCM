-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 06 nov. 2020 à 20:01
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gcm`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` char(11) NOT NULL,
  `date` date NOT NULL,
  `start_at` time NOT NULL,
  `end_at` time NOT NULL,
  `comment` text NOT NULL,
  `timestamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `timestamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `records`
--

CREATE TABLE `records` (
  `record_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `civ` char(11) NOT NULL,
  `birth` date NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `comment` text NOT NULL,
  `progress` varchar(11) NOT NULL DEFAULT '0',
  `timestamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `records`
--

INSERT INTO `records` (`record_id`, `user_id`, `civ`, `birth`, `first_name`, `last_name`, `address`, `phone`, `comment`, `progress`, `timestamp`) VALUES
(17, 20, 'mme', '2020-11-02', 'Yassmine', 'Adouli', '76 rue Agdal, Agadir', '0667688696', 'J\'ai mal à la tête', '0', '2020-11-05'),
(18, 18, 'mr', '2020-11-02', 'Adil', 'Semraoui', '56 rue Sidi Belyout, Casablanca', '0667688696', '', '0', '2020-11-05'),
(19, 19, 'mr', '2020-11-02', 'Hamza', 'Hontek', '206 Terbouchi City', '0771638387', 'Je souffre de lésions post-mortem', '0', '2020-11-05'),
(20, 22, 'mr', '2020-11-10', 'Kador', 'Zhori', '76 rue Agdal, Agadir', '0662567895', 'J\'ai mal au cul', '0', '2020-11-06'),
(21, 21, 'mr', '2020-11-03', 'Youssef', 'Semraoui', '206 Terbouchi City', '0662567895', '', '0', '2020-11-06');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `access` int(1) NOT NULL,
  `name` char(11) NOT NULL,
  `default_page` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`access`, `name`, `default_page`) VALUES
(1, 'patient', 'record'),
(2, 'secretary', 'calendar'),
(3, 'doctor', 'user'),
(4, 'admin', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` char(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `access` int(1) NOT NULL DEFAULT 1,
  `is_patient` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `access`, `is_patient`, `timestamp`) VALUES
(15, 'iliass', 'iliass@example.com', 'aze', 4, 0, '2020-11-05'),
(16, 'abdou', 'abdou@example.com', 'aze', 3, 0, '2020-11-05'),
(17, 'salim', 'salim@example.com', 'aze', 2, 0, '2020-11-05'),
(18, 'adil', 'adil@example.com', 'aze', 1, 1, '2020-11-05'),
(19, 'hamza', 'hamza@example.com', 'aze', 1, 1, '2020-11-05'),
(20, 'yassmine', 'yassmine@example.com', 'aze', 1, 1, '2020-11-05');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Index pour la table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`record_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `records`
--
ALTER TABLE `records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

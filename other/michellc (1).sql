-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 192.168.135.113
-- Généré le : ven. 17 nov. 2023 à 11:12
-- Version du serveur :  10.5.13-MariaDB-1:10.5.13+maria~buster
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `michellc`
--

-- --------------------------------------------------------

--
-- Structure de la table `rallyevideo_depot`
--

CREATE TABLE `rallyevideo_depot` (
  `depot_id` int(11) NOT NULL,
  `depot_nom` varchar(255) DEFAULT NULL,
  `depot_chemin` varchar(255) DEFAULT NULL,
  `depot_vote` int(255) DEFAULT NULL,
  `depot_team` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `rallyevideo_role`
--

CREATE TABLE `rallyevideo_role` (
  `idrole` int(11) NOT NULL,
  `nom_autorisation` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rallyevideo_role`
--

INSERT INTO `rallyevideo_role` (`idrole`, `nom_autorisation`) VALUES
(2, 'admin'),
(1, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `rallyevideo_team`
--

CREATE TABLE `rallyevideo_team` (
  `idteam` int(11) NOT NULL,
  `nom_equipe` varchar(45) NOT NULL,
  `depot` tinyint(4) NOT NULL,
  `idcreateur` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rallyevideo_team`
--

INSERT INTO `rallyevideo_team` (`idteam`, `nom_equipe`, `depot`, `idcreateur`) VALUES
(83, 'testttt', 0, 124),
(86, 'les zoulous dango le dozo', 0, 120);

-- --------------------------------------------------------

--
-- Structure de la table `rallyevideo_user`
--

CREATE TABLE `rallyevideo_user` (
  `iduser` int(10) UNSIGNED NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `login` varchar(255) NOT NULL,
  `role_idrole` int(11) NOT NULL,
  `token_vote` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rallyevideo_user`
--

INSERT INTO `rallyevideo_user` (`iduser`, `nom`, `prenom`, `email`, `login`, `role_idrole`, `token_vote`) VALUES
(120, 'Cooper', 'Ava', 'ava.cooper@example.com', 'ava_cooper', 1, 1),
(121, 'Parker', 'Matthew', 'matthew.parker@example.com', 'matthew_parker', 1, 1),
(122, 'Buisson', 'Noah', 'Noah.Buisson@etu.univ-savoie.fr', 'buissonn', 2, 0),
(123, 'Kuzbinski', 'Roman', 'Roman.Kuzbinski@etu.univ-savoie.fr', 'kuzbinsr', 1, 0),
(124, 'Michellod', 'Clement', 'Clement.Michellod@etu.univ-savoie.fr', 'michellc', 2, 0),
(125, 'Brun', 'Mathis', 'Mathis.Brun@etu.univ-savoie.fr', 'brmathis', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `rallyevideo_user_has_team`
--

CREATE TABLE `rallyevideo_user_has_team` (
  `user_iduser` int(10) UNSIGNED NOT NULL,
  `team_idteam` int(11) NOT NULL,
  `equipe` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `rallyevideo_depot`
--
ALTER TABLE `rallyevideo_depot`
  ADD PRIMARY KEY (`depot_id`,`depot_team`),
  ADD KEY `fk_ralleyevideo_depot_rallyevideo_team1_idx` (`depot_team`);

--
-- Index pour la table `rallyevideo_role`
--
ALTER TABLE `rallyevideo_role`
  ADD PRIMARY KEY (`idrole`),
  ADD UNIQUE KEY `nom_autorisation_UNIQUE` (`nom_autorisation`);

--
-- Index pour la table `rallyevideo_team`
--
ALTER TABLE `rallyevideo_team`
  ADD PRIMARY KEY (`idteam`,`idcreateur`),
  ADD UNIQUE KEY `idequipes_UNIQUE` (`idteam`),
  ADD UNIQUE KEY `nom_equipe_UNIQUE` (`nom_equipe`),
  ADD KEY `fk_rallyevideo_team_rallyevideo_user1_idx` (`idcreateur`);

--
-- Index pour la table `rallyevideo_user`
--
ALTER TABLE `rallyevideo_user`
  ADD PRIMARY KEY (`iduser`,`role_idrole`),
  ADD UNIQUE KEY `idusers_UNIQUE` (`iduser`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_user_role_idx` (`role_idrole`);

--
-- Index pour la table `rallyevideo_user_has_team`
--
ALTER TABLE `rallyevideo_user_has_team`
  ADD PRIMARY KEY (`user_iduser`,`team_idteam`),
  ADD KEY `fk_user_has_team_team1_idx` (`team_idteam`),
  ADD KEY `fk_user_has_team_user1_idx` (`user_iduser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `rallyevideo_depot`
--
ALTER TABLE `rallyevideo_depot`
  MODIFY `depot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `rallyevideo_role`
--
ALTER TABLE `rallyevideo_role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `rallyevideo_team`
--
ALTER TABLE `rallyevideo_team`
  MODIFY `idteam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT pour la table `rallyevideo_user`
--
ALTER TABLE `rallyevideo_user`
  MODIFY `iduser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rallyevideo_depot`
--
ALTER TABLE `rallyevideo_depot`
  ADD CONSTRAINT `kf_rallyevideo_depot_rallyevideo_teamid` FOREIGN KEY (`depot_team`) REFERENCES `rallyevideo_team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rallyevideo_team`
--
ALTER TABLE `rallyevideo_team`
  ADD CONSTRAINT `fk_rallyevideo_team_rallyevideo_user1` FOREIGN KEY (`idcreateur`) REFERENCES `rallyevideo_user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rallyevideo_user`
--
ALTER TABLE `rallyevideo_user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_idrole`) REFERENCES `rallyevideo_role` (`idrole`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rallyevideo_user_has_team`
--
ALTER TABLE `rallyevideo_user_has_team`
  ADD CONSTRAINT `fk_user_has_team_team1` FOREIGN KEY (`team_idteam`) REFERENCES `rallyevideo_team` (`idteam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_has_team_user1` FOREIGN KEY (`user_iduser`) REFERENCES `rallyevideo_user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 10 nov. 2023 à 09:01
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rallye_video`
--

-- --------------------------------------------------------

--
-- Structure de la table `rallyevideo_role`
--

CREATE TABLE `rallyevideo_role` (
  `idrole` int(11) NOT NULL,
  `nom_autorisation` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rallyevideo_team`
--

INSERT INTO `rallyevideo_team` (`idteam`, `nom_equipe`, `depot`, `idcreateur`) VALUES
(21, 'Buisson', 0, 5);

-- --------------------------------------------------------

--
-- Structure de la table `rallyevideo_user`
--

CREATE TABLE `rallyevideo_user` (
  `iduser` int(10) UNSIGNED NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_idrole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rallyevideo_user`
--

INSERT INTO `rallyevideo_user` (`iduser`, `nom`, `prenom`, `email`, `password`, `role_idrole`) VALUES
(2, 'Buisson', 'Noah', 'noahbuisson22.nb@gmail.com', '2c041b80f985499d6d059aafda3c929d57013f59950fd6e605cf18449cafc988', 2),
(3, 'Michel', 'Jean', 'jeamnmichel@mail.fr', 'ce582a2147c0e501b2d41f898d8f690a942cb56f4b4abf8d66354d85eb07fa36', 2),
(4, 'Malou', 'Eddy', 'eddymalou@mail.fr', 'eddymalou', 1),
(5, 'Mirabel', 'Paul', 'paulmirabel@mail.fr', '9d87609a3584d3fca24b7084dc445c5b6f5b8ac2c6db3a1fb0d3ab7ffe27e042', 1),
(6, 'Herude', 'Jean', 'jeandheaue@gmail.fr', 'jeanheud', 1),
(7, 'Patrick', 'Chirac', 'chiracpatrick@gmail.com', '893139f4d511c4f37321d7cf66d0442835789f07cd1e3fea974537d22c431ab5', 2),
(8, 'Michel', 'Hallyday', 'michelhallyday@gmail.com', 'hallydayjtaime', 1),
(9, 'Morue', 'Poisson', 'poissonmorue@mail.fr', 'jadorelepoisson', 1),
(10, 'Niska', 'Pouloulou', 'pou@lou.fr', 'pouloulapoule', 1);

-- --------------------------------------------------------

--
-- Structure de la table `rallyevideo_user_has_team`
--

CREATE TABLE `rallyevideo_user_has_team` (
  `user_iduser` int(10) UNSIGNED NOT NULL,
  `team_idteam` int(11) NOT NULL,
  `equipe` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

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
-- AUTO_INCREMENT pour la table `rallyevideo_role`
--
ALTER TABLE `rallyevideo_role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `rallyevideo_team`
--
ALTER TABLE `rallyevideo_team`
  MODIFY `idteam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `rallyevideo_user`
--
ALTER TABLE `rallyevideo_user`
  MODIFY `iduser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rallyevideo_team`
--
ALTER TABLE `rallyevideo_team`
  ADD CONSTRAINT `fk_rallyevideo_team_rallyevideo_user1` FOREIGN KEY (`idcreateur`) REFERENCES `rallyevideo_user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `rallyevideo_user`
--
ALTER TABLE `rallyevideo_user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_idrole`) REFERENCES `rallyevideo_role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
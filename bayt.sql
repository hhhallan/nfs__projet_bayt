-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 16 sep. 2021 à 20:16
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bayt`
--

-- --------------------------------------------------------

--
-- Structure de la table `diplomes`
--

CREATE TABLE `diplomes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nom` varchar(120) NOT NULL,
  `date_obtention` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `enfants`
--

CREATE TABLE `enfants` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `prob_medicaux` longtext DEFAULT NULL,
  `allergies` longtext DEFAULT NULL,
  `personne_1` varchar(120) NOT NULL,
  `personne_2` varchar(120) DEFAULT NULL,
  `tel_1` int(10) NOT NULL,
  `tel_2` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `enfants`
--

INSERT INTO `enfants` (`id`, `user_id`, `prenom`, `nom`, `date_naissance`, `prob_medicaux`, `allergies`, `personne_1`, `personne_2`, `tel_1`, `tel_2`) VALUES
(1, 2, 'Maitre', 'Gims', '2004-03-01', 'asthme, toux', '', 'Black M', '', 654030706, 0),
(2, 1, 'Omar', 'Sy', '2019-11-13', 'Aveugle', 'Arachide, gimgembre', 'Fred', 'Cyril', 672394857, 213456798),
(3, 1, 'Jean', 'Lassalle', '2021-04-01', NULL, 'Soleil, Banane, Whisky', 'Macron', NULL, 652930458, NULL),
(4, 2, 'benjamin', 'herve', '2003-01-01', 'hypersensibilité auditive', 'vert', 'Marie-Maï', '', 635471234, 0),
(5, 2, 'Younes', 'bessa', '2000-04-23', '', '', 'papa', 'maman', 256784939, 768598372),
(6, 1, 'prenomEnfant', 'nomEnfant', '2010-12-12', '', '', 'maman', 'mamie', 102030405, 235353535),
(7, 1, 'safia', 'safia', '2010-01-01', 'asthme', 'arachide', 'Marie', 'Antoine', 635471234, 606060606),
(8, 2, 'test', 'test', '2011-11-11', '', '', 'maman', '', 343234543, 0);

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `facture_user`
--

CREATE TABLE `facture_user` (
  `id` int(11) NOT NULL,
  `user_pro_id` int(11) NOT NULL,
  `user_part_id` int(11) NOT NULL,
  `facture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `justificatif`
--

CREATE TABLE `justificatif` (
  `id` int(11) NOT NULL,
  `fichier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `justificatif_user_part`
--

CREATE TABLE `justificatif_user_part` (
  `id` int(11) NOT NULL,
  `user_part_id` int(11) NOT NULL,
  `justificatif_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE `planning` (
  `id` int(11) NOT NULL,
  `places_dispo` int(11) NOT NULL,
  `dates_dispo` date NOT NULL,
  `user_pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user_part`
--

CREATE TABLE `user_part` (
  `id` int(11) NOT NULL,
  `prenom` varchar(120) NOT NULL,
  `nom` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `tel_portable` int(10) NOT NULL,
  `tel_fixe` int(10) DEFAULT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'parent',
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_part`
--

INSERT INTO `user_part` (`id`, `prenom`, `nom`, `email`, `mot_de_passe`, `tel_portable`, `tel_fixe`, `role`, `token`, `created_at`) VALUES
(1, 'azerty', 'azerty', 'azerty@azerty.com', '$2y$10$HWUbZLcZRy9MHLU.Iu0oSu3fEbr8yhvD3RQbRIROm1agL.YlKnLQe', 102030405, 0, 'parent', '', '2021-03-30 12:35:21'),
(2, 'allan', 'leblond', 'allan@allan.com', '$2y$10$YEsNW3bsFxbLE8LAqPB1z.qvzcG0EzfxZOQlSkHF6.Vtn73WWR8oC', 652780184, 652780184, 'parent', '', '2021-04-01 15:06:47'),
(3, 'test', 'test', 'test3@gmail.coma', '$2y$10$7OUiz2x2wlsrNjwMQCx5Re1tbT12DH2LHMfbjEYMHnn8EbwSnSPrS', 612121212, 221212121, 'parent', '', '2021-04-02 09:55:58');

-- --------------------------------------------------------

--
-- Structure de la table `user_pro`
--

CREATE TABLE `user_pro` (
  `id` int(11) NOT NULL,
  `prenom` varchar(120) DEFAULT NULL,
  `nom` varchar(120) DEFAULT NULL,
  `nom_entreprise` varchar(120) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `tel_portable` int(10) NOT NULL,
  `tel_fixe` int(10) DEFAULT NULL,
  `role` varchar(40) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `lat` decimal(10,8) DEFAULT NULL,
  `lon` decimal(10,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_pro`
--

INSERT INTO `user_pro` (`id`, `prenom`, `nom`, `nom_entreprise`, `email`, `mot_de_passe`, `tel_portable`, `tel_fixe`, `role`, `token`, `created_at`, `lat`, `lon`) VALUES
(1, 'Johnny', 'Halliday', 'DCD', 'jojo@gmail.com', '$2y$10$jdRWD8M6py4p5s1V3wMt6OGDWVnTGBEMKdyFtvG7rNrxjqOUU3FOS', 605040301, 235748573, 'babysitter', '', '2021-03-31 10:43:36', '48.88604730', '2.32641470'),
(2, 'Crevette', 'Non', '', 'crevette@gmail.com', '$2y$10$Vr0fizux.Fc/T1ow0ZUWKu6yY0ZJnK79myo2HlRyZCcI1/1LQHZt.', 652780184, 235748573, 'assistantemater', '', '2021-03-31 10:48:46', '48.11136305', '-1.67942520'),
(3, 'Barack', 'Afrit', 'La petit frite', 'afrit@gmail.com', '$2y$10$9.smJUFzvvScHqXGzmciru7JGKp7CZago7BfHDJLa0x3/2geZN0Fe', 652780184, 235748573, 'creche', '', '2021-03-31 10:51:37', '50.63110800', '3.07159630'),
(4, 'Eddy', 'Don Marcel', '', 'eddydon@gmail.com', '$2y$10$zx/SyT9yXC7y6kxfi7HT9.EdX4UgpxL/kvQHo15YF3Ve0T4UEkOWi', 652780184, 0, 'assistantemater', '', '2021-03-31 10:54:32', '49.44336110', '1.10007709'),
(5, 'Alain', 'Terrieur', '', 'alaint@gmail.com', '$2y$10$SfoKc7f7Dyv1qXa4TvGrTOg.l9k5DnGIU3xWcqF7vK1Tk3DbeOFpm', 652780184, 0, 'babysitter', '', '2021-03-31 10:56:04', '49.72142960', '0.78478990'),
(6, 'Macron', 'Extermination', 'Bonne Nuit bb', 'macrondecap@gmail.com', '$2y$10$N7sXSwObOH.d4dsBdWtzlemL2lWzFVkjQPmsjxccBlkcdQQDoYvRi', 652780184, 235748573, 'creche', '', '2021-03-31 10:58:56', '49.44551290', '1.09362220'),
(7, 'test2', 'test2', '', 'test2@gmail.com', '$2y$10$CW60lDFeOEQATj9RhIhWxeI2c/JNJMBbcWeJ6.bVBgqrdjkvvIZ86', 652780184, 0, 'assistantemater', '', '2021-04-01 12:55:42', '49.30398590', '1.03703820'),
(8, 'oucouc', 'coucou', 'Bonjour les petites', 'coucou@mail.com', '$2y$10$epYEH.hUgcG.t8jBTNLfheyhAaSRoEs8bPFM4EoIR0teSIynPdSm.', 612344556, 0, 'creche', '', '2021-04-02 10:38:47', '49.43779190', '1.10094670'),
(9, 'Benjamin', 'Herve', '', 'hervebenjamin@gmail.com', '$2y$10$DHFckoHRG98hoJJu5wA/i.2.idwFqlXL9NTHulu3hWIGKxgZcEzee', 602030405, 0, 'assistantemater', '', '2021-04-02 11:48:29', '50.63656540', '3.06352820'),
(10, 'Prenom', 'nom', 'Watifamily', 'nom@gmail.com', '$2y$10$wOyL2Kx7pCjE6U2rAH5WK.8gKD2I2SqB.5dtmGAVF2WEAEKKNMOQW', 652780184, 0, 'creche', '', '2021-04-02 12:45:39', '49.30398590', '1.03703820'),
(11, 'Marie', 'vasseur', 'NFactory School', 'marielabg@gmail.com', '$2y$10$gqktLFjK18yYPAsCCopbUO1PlZ7aomYmkn91Su5QrqV1CkYIJ4iDy', 654545454, 0, 'creche', '', '2021-04-02 15:54:06', '49.43873475', '1.10123040');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `diplomes`
--
ALTER TABLE `diplomes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enfants`
--
ALTER TABLE `enfants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `facture_user`
--
ALTER TABLE `facture_user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `justificatif`
--
ALTER TABLE `justificatif`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `justificatif_user_part`
--
ALTER TABLE `justificatif_user_part`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_part`
--
ALTER TABLE `user_part`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_pro`
--
ALTER TABLE `user_pro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `diplomes`
--
ALTER TABLE `diplomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `enfants`
--
ALTER TABLE `enfants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `facture_user`
--
ALTER TABLE `facture_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `justificatif`
--
ALTER TABLE `justificatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `justificatif_user_part`
--
ALTER TABLE `justificatif_user_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `planning`
--
ALTER TABLE `planning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user_part`
--
ALTER TABLE `user_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user_pro`
--
ALTER TABLE `user_pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

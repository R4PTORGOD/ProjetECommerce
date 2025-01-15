-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mer. 15 jan. 2025 à 11:34
-- Version du serveur : 8.0.40
-- Version de PHP : 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet-e-commerce`
--
CREATE DATABASE IF NOT EXISTS `projet-e-commerce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projet-e-commerce`;

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `id_cat` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `periode` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Categorie`
--

INSERT INTO `Categorie` (`id_cat`, `periode`) VALUES
('0c8ff42c-523c-47c6-8da5-6c295544c243', 'Première Guerre mondiale'),
('26b8df9c-a0dc-4a09-ba54-2cdf74c7b076', 'Seconde Guerre mondiale'),
('30a12ec1-1287-4327-874e-4471a45c5764', 'Époque moderne'),
('b4044d64-c16e-4613-9942-1526cbd487ed', 'Entre-deux-guerres'),
('ef5f2a3f-53a9-48c0-a917-74ba0fbe4f0a', 'Guerre froide');

-- --------------------------------------------------------

--
-- Structure de la table `Chars`
--

CREATE TABLE `Chars` (
  `id_cha` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `prix` decimal(10,2) NOT NULL,
  `date_ajout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stock` int NOT NULL,
  `poids` int NOT NULL,
  `calibre` int NOT NULL,
  `vitesse` int NOT NULL,
  `annee_conception` year NOT NULL,
  `id_categorie` varchar(36) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Chars`
--

INSERT INTO `Chars` (`id_cha`, `nom`, `description`, `prix`, `date_ajout`, `stock`, `poids`, `calibre`, `vitesse`, `annee_conception`, `id_categorie`) VALUES
('06d5e62b-70a9-432d-bd5b-744926e83584', 'renault ft', 'char francais ', 500000.00, '2025-01-13 15:30:42', 10, 12000, 8, 18, '1914', '0c8ff42c-523c-47c6-8da5-6c295544c243'),
('14c79699-740f-4f30-9b0f-85462578ccea', 't95', 'char americain', 2500000.00, '2025-01-13 18:22:55', 1, 93000, 155, 16, '1980', 'ef5f2a3f-53a9-48c0-a917-74ba0fbe4f0a'),
('587a7ab9-69a3-4b9b-8393-8ec27d4847d1', 'tiger 1', 'char allemand ', 3000000.00, '2025-01-13 11:45:00', 2, 58000, 88, 40, '1939', 'b4044d64-c16e-4613-9942-1526cbd487ed'),
('604ee5a3-edd9-4f9e-989f-c596c141d893', 'sherman firefly', 'ghghgfghf', 1000000.00, '2025-01-12 23:04:29', 10, 20000, 75, 40, '1936', 'b4044d64-c16e-4613-9942-1526cbd487ed'),
('fe9cbcf0-2e49-4b1a-868d-bae517d5ace2', 't-34', 'char russe', 1000000.00, '2025-01-13 12:49:03', 20, 40000, 57, 50, '1941', '26b8df9c-a0dc-4a09-ba54-2cdf74c7b076');

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE `Commande` (
  `id_com` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_utilisateur` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `date_commande` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` enum('En cours','Prête') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'En cours'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Commande_Chars`
--

CREATE TABLE `Commande_Chars` (
  `id_com_cha` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_commande` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `id_char` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `quantite` int UNSIGNED NOT NULL,
  `prix_unitaire` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id_uti` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('administrateur','client') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `Chars`
--
ALTER TABLE `Chars`
  ADD PRIMARY KEY (`id_cha`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD KEY `fk_id_categorie` (`id_categorie`);

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `fk_id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `Commande_Chars`
--
ALTER TABLE `Commande_Chars`
  ADD PRIMARY KEY (`id_com_cha`),
  ADD KEY `fk_id_commande` (`id_commande`),
  ADD KEY `fk_id_produit` (`id_char`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id_uti`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Chars`
--
ALTER TABLE `Chars`
  ADD CONSTRAINT `fk_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `Categorie` (`id_cat`);

--
-- Contraintes pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD CONSTRAINT `fk_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur` (`id_uti`);

--
-- Contraintes pour la table `Commande_Chars`
--
ALTER TABLE `Commande_Chars`
  ADD CONSTRAINT `fk_id_commande` FOREIGN KEY (`id_commande`) REFERENCES `Commande` (`id_com`),
  ADD CONSTRAINT `fk_id_produit` FOREIGN KEY (`id_char`) REFERENCES `Chars` (`id_cha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

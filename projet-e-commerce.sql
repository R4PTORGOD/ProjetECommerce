-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : dim. 12 jan. 2025 à 22:59
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
  `id` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Categorie`
--

INSERT INTO `Categorie` (`id`, `nom`) VALUES
('0c8ff42c-523c-47c6-8da5-6c295544c243', 'Première Guerre mondiale'),
('26b8df9c-a0dc-4a09-ba54-2cdf74c7b076', 'Seconde Guerre mondiale'),
('30a12ec1-1287-4327-874e-4471a45c5764', 'Époque moderne'),
('b4044d64-c16e-4613-9942-1526cbd487ed', 'Entre-deux-guerres'),
('ef5f2a3f-53a9-48c0-a917-74ba0fbe4f0a', 'Guerre froide');

-- --------------------------------------------------------

--
-- Structure de la table `Char`
--

CREATE TABLE `Char` (
  `id` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `prix` decimal(10,2) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `stock` int NOT NULL,
  `poids` int NOT NULL,
  `calibre` int NOT NULL,
  `vitesse` int NOT NULL,
  `annee_conception` year NOT NULL,
  `id_categorie` varchar(36) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE `Commande` (
  `id` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `id_utilisateur` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `date_commande` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` enum('En cours','Prête') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'En cours'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Commande_Produit`
--

CREATE TABLE `Commande_Produit` (
  `id` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
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
  `id` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
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
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Char`
--
ALTER TABLE `Char`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD KEY `fk_id_categorie` (`id_categorie`);

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `Commande_Produit`
--
ALTER TABLE `Commande_Produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_commande` (`id_commande`),
  ADD KEY `fk_id_produit` (`id_char`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Char`
--
ALTER TABLE `Char`
  ADD CONSTRAINT `fk_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `Categorie` (`id`);

--
-- Contraintes pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD CONSTRAINT `fk_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur` (`id`);

--
-- Contraintes pour la table `Commande_Produit`
--
ALTER TABLE `Commande_Produit`
  ADD CONSTRAINT `fk_id_commande` FOREIGN KEY (`id_commande`) REFERENCES `Commande` (`id`),
  ADD CONSTRAINT `fk_id_produit` FOREIGN KEY (`id_char`) REFERENCES `Char` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

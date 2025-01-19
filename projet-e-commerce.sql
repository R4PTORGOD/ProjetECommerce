-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : dim. 19 jan. 2025 à 19:47
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
('011488db-21d5-4f18-9672-3b0e37af5956', 'Leopard 1', 'Le Leopard 1 est un char de combat principal développé en Allemagne de l\'Ouest dans les années 1960. Il a été conçu pour répondre à la nécessité d\'un char rapide et bien protégé, avec un excellent rapport puissance/poids et une bonne mobilité. Il a été le premier char à utiliser un canon lisse de 105 mm (au lieu des canons rayés traditionnels), permettant des tirs plus précis et une meilleure pénétration des blindages ennemis. Environ 6 000 unités produites. Il a été largement remplacé par le Leopard 2 dans les années 1980, mais des versions modernisées du Leopard 1 sont encore utilisées dans certaines armées aujourd\'hui.', 850000.00, '2025-01-17 10:49:11', 2, 42000, 105, 65, '1965', 'ef5f2a3f-53a9-48c0-a917-74ba0fbe4f0a'),
('1c8614ca-6fdf-47f1-a1a7-f0efd290ec74', 'Renault FT', 'Le Renault FT est un char léger français de la Première Guerre mondiale, considéré comme le premier véritable char moderne. Il a introduit un design révolutionnaire avec une tourelle rotative à 360°, un compartiment moteur séparé et un armement placé dans une tourelle. Compact, maniable et simple à produire, il a servi de modèle pour les futurs chars dans le monde entier. Il a été largement utilisé par les forces françaises et alliées, et a même servi dans certains conflits ultérieurs. Produit à environ 3 800 exemplaires pendant la guerre.', 150000.00, '2025-01-17 10:40:29', 3, 6700, 37, 8, '1916', '0c8ff42c-523c-47c6-8da5-6c295544c243'),
('5453577d-c8f4-4e27-9f2f-f7386be860c9', 'Leclerc', 'Le Leclerc est un char de combat principal développé en France dans les années 1980, et il est actuellement utilisé par l\'Armée de terre française ainsi que d\'autres forces armées dans le monde. Conçu pour être un char hautement moderne, le Leclerc a été conçu pour surpasser les chars de sa génération en termes de puissance de feu, de mobilité et de protection. Il utilise une technologie de pointe, notamment un système de gestion du combat numérique, ce qui le rend particulièrement efficace dans des environnements modernes de guerre.', 10000000.00, '2025-01-17 10:50:55', 1, 56000, 120, 72, '1980', '30a12ec1-1287-4327-874e-4471a45c5764'),
('67ff6097-216f-4b0e-8b15-bdcca4e5ae5e', 'M1 Abrams', 'Le M1 Abrams est un char de combat principal développé par les États-Unis, qui a été mis en service en 1980. Il est largement utilisé par l\'armée américaine et plusieurs forces armées dans le monde. Conçu pour offrir un excellent rapport entre puissance de feu, protection et mobilité, il est l\'un des chars les plus modernes et les plus redoutables de la guerre contemporaine. Sa conception intègre un blindage composite, une suspension avancée et un moteur à turbine à gaz qui lui confère une mobilité impressionnante.', 8000000.00, '2025-01-17 10:52:51', 2, 63000, 120, 80, '1980', '30a12ec1-1287-4327-874e-4471a45c5764'),
('a3acfb84-c729-4fe1-b354-17f98a918b69', ' T-55 (URSS)', 'Le T-55 est un char de combat principal soviétique qui a été introduit en 1958 et est l\'un des modèles de chars les plus largement utilisés et produits dans l\'histoire. Il a été conçu comme une version améliorée du T-54, avec une meilleure protection, un canon plus puissant et des améliorations de mobilité. Le T-55 a été utilisé par l\'Union Soviétique et de nombreux autres pays dans le monde entier, notamment durant la guerre froide, les conflits au Moyen-Orient, et jusqu\'à aujourd\'hui dans certaines régions. Le T-55 a été fabriqué à plus de 80 000 exemplaires, en faisant l\'un des chars les plus produits du 20e siècle.', 200000.00, '2025-01-17 10:46:35', 11, 36000, 100, 60, '1955', 'ef5f2a3f-53a9-48c0-a917-74ba0fbe4f0a'),
('c0e13cf3-06c0-48b9-b9ba-bc506d1c6305', 'Tiger I (Panzerkampfwagen VI Ausf. E)', 'Le Tiger I est un char lourd allemand de la Seconde Guerre mondiale, conçu pour surpasser les chars ennemis en puissance de feu et en blindage. Déployé à partir de 1942, il était équipé d\'un canon puissant de 88 mm capable de percer presque tous les blindages adverses à l\'époque. Cependant, il était lent, coûteux à produire et souffrait de problèmes mécaniques en raison de sa complexité technique. C\'est un symbole emblématique des forces blindées allemandes. Il avait un blindage avant très épais (jusqu\'à 120 mm) et environ 1 347 exemplaires a été produit.', 2500000.00, '2025-01-17 10:32:24', 1, 57000, 88, 40, '1942', '26b8df9c-a0dc-4a09-ba54-2cdf74c7b076'),
('d3324609-3f81-495d-a41a-1ac1cdad66f7', 'M4 Sherman', 'Le M4 Sherman était le char moyen principal des forces alliées pendant la Seconde Guerre mondiale, conçu pour être fiable, facile à produire en masse et à entretenir. Bien qu\'il ne rivalisait pas en puissance de feu ou en blindage avec des chars allemands comme le Tiger I ou le Panther, il compensait par sa grande mobilité, sa modularité et son nombre. Utilisé sur presque tous les fronts, il était essentiel dans la stratégie alliée. Produit en plus de 49 000 exemplaires.', 300000.00, '2025-01-17 10:35:27', 7, 33400, 75, 48, '1940', '26b8df9c-a0dc-4a09-ba54-2cdf74c7b076'),
('e01a4fbd-2650-429d-8a13-3fc7c9e08bf6', 'Char B1', 'Le Char B1 était un char lourd français utilisé pendant la Seconde Guerre mondiale, notamment lors de la bataille de France en 1940. Il a été conçu dans les années 1930 pour être un char de soutien à l\'infanterie, avec une combinaison de puissance de feu et de blindage épais. Le Char B1 était unique dans son design, avec un canon de 75 mm dans la tourelle et une mitrailleuse de 7,5 mm montée à l\'avant du véhicule. Il avait aussi un blindage très épais, ce qui le rendait difficile à détruire pour l\'armement de l\'époque. Environ 400 unités construites.', 2000000.00, '2025-01-17 10:44:08', 1, 35000, 75, 32, '1935', 'b4044d64-c16e-4613-9942-1526cbd487ed');

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
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id_uti`, `nom`, `prenom`, `email`, `mot_de_passe`, `role`) VALUES
('1ed52318-ff37-4286-973d-db46e95faa13', 'client', 'client', 'client@client.com', '$2y$10$Bbwx0E9hYjRz0N38mNIpvOVf7s2qNq9GveB5HcLbi5KzfT28s9ByK', 'client'),
('b63b36d8-ec4c-4870-b64a-6d81cb0b64b8', 'admin', 'admin', 'admin@admin.com', '$2y$10$dYEd8bnkSZ0TwOF8Vvj6u.mENSHS0b0Bx8o/ZWqL2ibKFL654c5M.', 'administrateur');

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

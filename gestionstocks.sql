-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 07 août 2023 à 20:42
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
-- Base de données : `gestionstocks`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom_utilisateur`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$P183STpuQ8h.TmgOzXePgeJZD2xc3544yvdd8NKNcO2R8F1fHOWdq');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(400) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `contacte` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `residence` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `contacte`, `email`, `pays`, `ville`, `residence`) VALUES
(1, 'ADECHINAN', 'Johnson', '+22965432890', 'johnson@gmail.com', 'Bénin', 'Parakou', 'Albarika'),
(3, 'DUPONT', 'Jean', '+330132786543', 'jeandupont@gmail.com', 'France', 'Paris', 'Tour-eifel'),
(4, 'OYEDEKPO', 'Ramadane', '+22961788901', 'ramadane@gmail.com', 'Bénin', 'Abomey-Calavi', 'Zogbadjè');

-- --------------------------------------------------------

--
-- Structure de la table `entrees`
--

CREATE TABLE `entrees` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `motifs` varchar(255) NOT NULL,
  `produit` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entrees`
--

INSERT INTO `entrees` (`id`, `date`, `motifs`, `produit`, `quantite`) VALUES
(1, '2023-05-09', 'vente', 'Montre Rolex', 4),
(2, '2023-05-09', 'vente', 'T-shirt', 5),
(3, '2023-05-09', 'vente', 'Sac en cuir', 7),
(4, '2023-05-09', 'vente', 'Parfum aromatisé', 2),
(6, '2023-05-09', 'vente', 'Air Jordan', 5);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `contacte` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `produit_fournit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `nom`, `contacte`, `email`, `produit_fournit`) VALUES
(1, 'Nike', '+032176564532', 'infonike@gmail.com', 'Air Jordan'),
(2, 'Christian Dior', '+018987230102', 'diorbrande@gmail.com', 'T-shirt'),
(3, 'Guccie', '+080109876543', 'gucciecontact@gmail.com', 'Sac en cuir'),
(4, 'Rolex', '+012198765432', 'adiddascontact@gmail.com', 'Montre');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(400) NOT NULL,
  `produit` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sorties`
--

CREATE TABLE `sorties` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `motifs` varchar(255) NOT NULL,
  `produit` varchar(255) NOT NULL,
  `fournisseur_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sorties`
--

INSERT INTO `sorties` (`id`, `date`, `motifs`, `produit`, `fournisseur_id`, `quantite`) VALUES
(1, '2023-05-09', 'ravitaillement', 'Air Jordan', 1, 55),
(3, '2023-05-09', 'ravitaillement', 'Sac en cuir', 3, 60),
(4, '2023-05-09', 'ravitaillement', 'Parfum aromatisé', 2, 77),
(5, '2023-05-09', 'ravitaillement', 'Montre Rolex', 4, 44);

-- --------------------------------------------------------

--
-- Structure de la table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `fournisseur_id` int(11) NOT NULL,
  `date_livraison` date NOT NULL,
  `date_exp` date NOT NULL,
  `total_livre` varchar(255) NOT NULL,
  `total_stock` varchar(255) NOT NULL,
  `prix_unitaire` varchar(255) NOT NULL,
  `stock_rest` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stocks`
--

INSERT INTO `stocks` (`id`, `designation`, `photo`, `fournisseur_id`, `date_livraison`, `date_exp`, `total_livre`, `total_stock`, `prix_unitaire`, `stock_rest`) VALUES
(3, 'Sac en cuir', '../stock_images/sac1.jpg', 3, '2023-05-09', '2023-05-31', '60', '60', '7000', '53'),
(4, 'Parfum aromatisé', '../stock_images/bouteille-parfum-noir-vue-face-design-jaune-isole-mur-blanc_140725-11600 [photoutils.com].jpg', 2, '2023-05-09', '2023-08-19', '77', '77', '800', '75'),
(5, 'Air Jordan', '../stock_images/chaussure-sneaker-blanche-isolee-blanc-removebg-preview.png', 1, '2023-05-09', '2023-08-11', '55', '55', '12000', '50'),
(6, 'Montre Rolex', '../stock_images/Montre4.jpg', 4, '2023-05-14', '2023-08-19', '44', '44', '35000', '40');

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

CREATE TABLE `ventes` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type_client` varchar(255) NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `contacte` varchar(255) NOT NULL,
  `code_bare` varchar(255) NOT NULL,
  `nom_produit` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix_unitaire` varchar(255) NOT NULL,
  `prix_total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ventes`
--

INSERT INTO `ventes` (`id`, `date`, `type_client`, `nom_client`, `contacte`, `code_bare`, `nom_produit`, `quantite`, `prix_unitaire`, `prix_total`) VALUES
(1, '2023-05-09', 'Entreprise', 'Johnson Adechinan', '+22965432567', '0099764563', 'Montre Rolex', 4, '60000', '240000'),
(2, '2023-05-09', 'Entreprise', 'ADECHINAN Pascal', '+22961234567', '0092567821', 'Air Jordan', 5, '18000', '90000'),
(3, '2023-05-09', 'Entreprise', 'OYEDEKPO Ramadane', '+22956789522', '0098989796', 'Parfum aromatisé', 2, '1200', '2400'),
(4, '2023-05-09', 'Particulier', 'BALDE Viviane', '+2265214567890', '0091929027', 'Sac en cuir', 7, '17000', '119000'),
(5, '2023-05-09', 'Entreprise', 'Pacca Digital', '+22951954404', '0023678912', 'T-shirt', 5, '12000', '60000');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entrees`
--
ALTER TABLE `entrees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sorties`
--
ALTER TABLE `sorties`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ventes`
--
ALTER TABLE `ventes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `entrees`
--
ALTER TABLE `entrees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sorties`
--
ALTER TABLE `sorties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `ventes`
--
ALTER TABLE `ventes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

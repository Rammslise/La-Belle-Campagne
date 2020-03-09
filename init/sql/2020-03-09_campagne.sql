-- phpMyAdmin SQL Dump
-- version 4.9.1deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 09 mars 2020 à 11:47
-- Version du serveur :  8.0.19-0ubuntu0.19.10.3
-- Version de PHP :  7.3.11-0ubuntu0.19.10.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `campagne`
--
CREATE DATABASE IF NOT EXISTS `campagne` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `campagne`;

-- --------------------------------------------------------

--
-- Structure de la table `7ie1z_categories`
--

CREATE TABLE `7ie1z_categories` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `7ie1z_categories`
--

INSERT INTO `7ie1z_categories` (`id`, `name`) VALUES
(1, 'vegetables'),
(2, 'fruits'),
(3, 'meats'),
(4, 'creamery'),
(5, 'grocery');

-- --------------------------------------------------------

--
-- Structure de la table `7ie1z_clients`
--

CREATE TABLE `7ie1z_clients` (
  `id` int NOT NULL,
  `pseudo` varchar(15) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_7ie1z_roles` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `7ie1z_clients`
--

INSERT INTO `7ie1z_clients` (`id`, `pseudo`, `mail`, `password`, `id_7ie1z_roles`) VALUES
(1, 'lilise', 'e.pery@laposte.net', '$2y$10$MSRqvWI2srYG7bOCpZ5gPe2HPzuzwxSW/8StDAs0cBZwRj8cETnum', 1),
(2, 'alex02', 'alexandrie.jo@wanadoo.fr', '$2y$10$rlrX.Lsr42.AdKFa9JH8E.xGc0YJigwdJjGJMczp3sSo7OIo7AKpm', 2),
(3, 'cécé', 'celina.S@wanadoo.fr', '$2y$10$RD9VpKmbnGPZQhyazUuu/e9iwYagtSruAcj/Wpb9gAuWnWEgqPc4K', 2),
(4, 'Mel', 'm.parizeau@wanadoo.fr', '$2y$10$i.vtIzoblzpANaUgesXSMeLZJdJgwJlqSVxKMivzpQ..S1mbLNfVq', 2),
(5, 'lundy', 'l.genereux@wanadoo.fr', '$2y$10$rwLrjfrlDKaRYc56.CnTlOn.kISFrY4OXRE3yZY1rJ04baxXNaJLy', 2),
(6, 'sisi', 's.chaussee@wanadoo.fr', '$2y$10$hWMTWEakaL8wDoOtVddVc.QBR40chjk1i3KXlDrJLzRplj3YM7veO', 2),
(7, 'gerM', 'g.doucet@wanadoo.fr', '$2y$10$77WwMJx7n4y3rSmFmuUyYunr.NWXKdix2DHSbdHcLG4NEVmNUB1Ta', 2),
(8, 'nath', 'n.abril@wanadoo.fr', '$2y$10$PWowtg7MFtctNBNnm5yYGOgWjD3ZSHPt71LO.cAWO0ZcqvnXVICSK', 2),
(9, 'chEr', 'c.hebert@wanadoo.fr', '$2y$10$V/m0D2f0dIJHH2grcwxrP.Rucf2JsIHmOAWDk4rXAueI.22Owk50C', 2),
(10, 'mimile', 'e.grivois@wanadoo.fr', '$2y$10$ym78mtR20Pb1VcuE9Tof0Or7q0osvIJjIEFCF0fDmkJd0A223Rqde', 2),
(11, 'Killian', 'killian@gmail.com', '$2y$10$idaCiczJ9BdiuexlQ/tns.xLMzCVV3n6TC6vRIl3ejxfvOn.0s45a', 2);

-- --------------------------------------------------------

--
-- Structure de la table `7ie1z_items`
--

CREATE TABLE `7ie1z_items` (
  `id` int NOT NULL,
  `quantity` int NOT NULL,
  `id_7ie1z_products` int NOT NULL,
  `id_7ie1z_orders` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `7ie1z_orders`
--

CREATE TABLE `7ie1z_orders` (
  `id` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  `number` int NOT NULL,
  `id_7ie1z_clients` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `7ie1z_producers`
--

CREATE TABLE `7ie1z_producers` (
  `id` int NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `nameCompany` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fileUrl` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_7ie1z_roles` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `7ie1z_producers`
--

INSERT INTO `7ie1z_producers` (`id`, `mail`, `password`, `lastname`, `firstname`, `nameCompany`, `city`, `fileUrl`, `description`, `id_7ie1z_roles`) VALUES
(1, 'c.bernard@wanadoo.fr', '$2y$10$Z1SQnq2fZSybnHz3BKx7BOiYzYcMFnpwWzY6GZmYsJe4mNOEqB2p2', 'Bernard', 'Cédric', 'Aux petits délices de chèvres', 'Villemontoire', 'home/elise/www/LaBelleCampagne/assets/img/logo/goatLogo.png', 'Mon activité d\'élevage caprin est née après une longue réflexion de 7 ans en août 2017.\r\nActuellement le troupeau se compose de 26 chèvres en lactation et nous transformons la totalité en fromage.\r\nLes animaux sont nourris avec des céréales issues d\'une agriculture en agri-écologie produites près de la ferme.', 3);

-- --------------------------------------------------------

--
-- Structure de la table `7ie1z_products`
--

CREATE TABLE `7ie1z_products` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `fileUrl` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_7ie1z_producers` int NOT NULL,
  `id_7ie1z_categories` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `7ie1z_roles`
--

CREATE TABLE `7ie1z_roles` (
  `id` int NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `7ie1z_roles`
--

INSERT INTO `7ie1z_roles` (`id`, `type`) VALUES
(1, 'administrateur'),
(2, 'client'),
(3, 'producteur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `7ie1z_categories`
--
ALTER TABLE `7ie1z_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `7ie1z_clients`
--
ALTER TABLE `7ie1z_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `7ie1z_clients_7ie1z_roles_FK` (`id_7ie1z_roles`);

--
-- Index pour la table `7ie1z_items`
--
ALTER TABLE `7ie1z_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `7ie1z_items_7ie1z_products_FK` (`id_7ie1z_products`),
  ADD KEY `7ie1z_items_7ie1z_orders0_FK` (`id_7ie1z_orders`);

--
-- Index pour la table `7ie1z_orders`
--
ALTER TABLE `7ie1z_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `7ie1z_orders_7ie1z_clients_FK` (`id_7ie1z_clients`);

--
-- Index pour la table `7ie1z_producers`
--
ALTER TABLE `7ie1z_producers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `7ie1z_producers_7ie1z_roles_FK` (`id_7ie1z_roles`);

--
-- Index pour la table `7ie1z_products`
--
ALTER TABLE `7ie1z_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `7ie1z_products_7ie1z_producers_FK` (`id_7ie1z_producers`),
  ADD KEY `7ie1z_products_7ie1z_categories0_FK` (`id_7ie1z_categories`);

--
-- Index pour la table `7ie1z_roles`
--
ALTER TABLE `7ie1z_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `7ie1z_categories`
--
ALTER TABLE `7ie1z_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `7ie1z_clients`
--
ALTER TABLE `7ie1z_clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `7ie1z_items`
--
ALTER TABLE `7ie1z_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `7ie1z_orders`
--
ALTER TABLE `7ie1z_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `7ie1z_producers`
--
ALTER TABLE `7ie1z_producers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `7ie1z_products`
--
ALTER TABLE `7ie1z_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `7ie1z_roles`
--
ALTER TABLE `7ie1z_roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `7ie1z_clients`
--
ALTER TABLE `7ie1z_clients`
  ADD CONSTRAINT `7ie1z_clients_7ie1z_roles_FK` FOREIGN KEY (`id_7ie1z_roles`) REFERENCES `7ie1z_roles` (`id`);

--
-- Contraintes pour la table `7ie1z_items`
--
ALTER TABLE `7ie1z_items`
  ADD CONSTRAINT `7ie1z_items_7ie1z_orders0_FK` FOREIGN KEY (`id_7ie1z_orders`) REFERENCES `7ie1z_orders` (`id`),
  ADD CONSTRAINT `7ie1z_items_7ie1z_products_FK` FOREIGN KEY (`id_7ie1z_products`) REFERENCES `7ie1z_products` (`id`);

--
-- Contraintes pour la table `7ie1z_orders`
--
ALTER TABLE `7ie1z_orders`
  ADD CONSTRAINT `7ie1z_orders_7ie1z_clients_FK` FOREIGN KEY (`id_7ie1z_clients`) REFERENCES `7ie1z_clients` (`id`);

--
-- Contraintes pour la table `7ie1z_producers`
--
ALTER TABLE `7ie1z_producers`
  ADD CONSTRAINT `7ie1z_producers_7ie1z_roles_FK` FOREIGN KEY (`id_7ie1z_roles`) REFERENCES `7ie1z_roles` (`id`);

--
-- Contraintes pour la table `7ie1z_products`
--
ALTER TABLE `7ie1z_products`
  ADD CONSTRAINT `7ie1z_products_7ie1z_categories0_FK` FOREIGN KEY (`id_7ie1z_categories`) REFERENCES `7ie1z_categories` (`id`),
  ADD CONSTRAINT `7ie1z_products_7ie1z_producers_FK` FOREIGN KEY (`id_7ie1z_producers`) REFERENCES `7ie1z_producers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

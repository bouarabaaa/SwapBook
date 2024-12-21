-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 17 avr. 2023 à 16:34
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pfe`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idus` int NOT NULL,
  `idlv` int NOT NULL,
  `iduslv` int NOT NULL,
  `dat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `messagee` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk5` (`idlv`),
  KEY `fk6` (`idus`),
  KEY `fk7` (`iduslv`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `idus`, `idlv`, `iduslv`, `dat`, `messagee`) VALUES
(38, 8, 39, 5, '2023-04-16 23:55:19', 'un bon livre');

-- --------------------------------------------------------

--
-- Structure de la table `demlivre`
--

DROP TABLE IF EXISTS `demlivre`;
CREATE TABLE IF NOT EXISTS `demlivre` (
  `idlecteur` int NOT NULL,
  `idlivr` int NOT NULL,
  `datedem` date NOT NULL,
  `idlctlivre` int NOT NULL,
  PRIMARY KEY (`idlecteur`,`idlivr`,`datedem`,`idlctlivre`),
  KEY `fke2` (`idlivr`),
  KEY `fke3` (`idlctlivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `demlivre`
--

INSERT INTO `demlivre` (`idlecteur`, `idlivr`, `datedem`, `idlctlivre`) VALUES
(6, 3, '2023-08-08', 8),
(6, 87, '2023-08-08', 8);

-- --------------------------------------------------------

--
-- Structure de la table `imgg`
--

DROP TABLE IF EXISTS `imgg`;
CREATE TABLE IF NOT EXISTS `imgg` (
  `id` int NOT NULL AUTO_INCREMENT,
  `srcimage` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `imgg`
--

INSERT INTO `imgg` (`id`, `srcimage`) VALUES
(1, 'images/user1.jpg'),
(2, 'images/user2.jpg'),
(3, 'images/user3.jpg'),
(4, 'images/user4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `livre2`
--

DROP TABLE IF EXISTS `livre2`;
CREATE TABLE IF NOT EXISTS `livre2` (
  `idlivree` int NOT NULL,
  `iduser` int NOT NULL,
  `titre` varchar(255) NOT NULL,
  `datedition` date NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `nbrexemplaire` int NOT NULL,
  `pointe` int NOT NULL,
  `srcimage` varchar(1000) NOT NULL,
  PRIMARY KEY (`idlivree`,`iduser`) USING BTREE,
  KEY `fk_2` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `livre2`
--

INSERT INTO `livre2` (`idlivree`, `iduser`, `titre`, `datedition`, `categorie`, `nbrexemplaire`, `pointe`, `srcimage`) VALUES
(1, 5, 'livre', '2022-04-01', 'informatique', 3, 40, 'images/book1.jpg'),
(1, 6, 'mon livre', '2023-03-06', 'sport', 8, 8, 'images/book2.jpg'),
(3, 8, 'lll1', '2023-01-01', 'langue', 4, 10, 'images/book3.jpg'),
(33, 5, 'lr1', '2000-01-01', 'medcine', 2, 50, 'images/book1.jpg'),
(39, 5, 'dddddddddd', '2006-03-01', 'sport', 5, 25, 'images/book2.jpg'),
(48, 5, 'lr2', '2000-01-05', 'java', 4, 20, 'images/book3.jpg'),
(55, 6, 'r2', '2023-01-02', 'informatique', 5, 20, 'images/book1.jpg'),
(66, 6, 'r1', '2023-09-02', 'langue', 2, 10, 'images/book2.jpg'),
(66, 9, 'lvr1', '2023-09-02', 'langue', 2, 10, 'images/book2.jpg'),
(67, 5, 'lllllllllllllllllllllllllllllllllllllllllllllllllll', '2005-03-01', 'langue', 6, 30, 'images/book3.jpg'),
(67, 9, 'lvr2', '2023-09-02', 'sport', 2, 8, 'images/book3.jpg'),
(77, 6, 'r3', '2023-09-02', 'art', 3, 5, 'images/book1.jpg'),
(77, 9, 'lvr3', '2023-09-02', 'medcine', 3, 30, 'images/book1.jpg'),
(87, 8, 'l1111', '2023-01-01', 'sport', 3, 8, 'images/book2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `offrequizy`
--

DROP TABLE IF EXISTS `offrequizy`;
CREATE TABLE IF NOT EXISTS `offrequizy` (
  `idoffre` int NOT NULL AUTO_INCREMENT,
  `idadminqz` int NOT NULL,
  `dure` varchar(255) NOT NULL,
  `reduction` varchar(255) NOT NULL,
  `pointt` int NOT NULL,
  `descriptionn` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`idoffre`),
  KEY `fk_1` (`idadminqz`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `offrequizy`
--

INSERT INTO `offrequizy` (`idoffre`, `idadminqz`, `dure`, `reduction`, `pointt`, `descriptionn`) VALUES
(1, 2, '4 mois', '50%', 50, ''),
(2, 2, '1 année', '100%', 100, '.........'),
(4, 2, '1mois', '60%', 10, '.....'),
(5, 2, '2mois', '100%', 60, '...'),
(6, 2, '2ans', '30%', 150, '...'),
(7, 2, '8mois', '25%', 30, '...');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `prenom` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `pass` varchar(20) NOT NULL,
  `ville` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `typee` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `score` int NOT NULL,
  `datenaissance` date NOT NULL,
  `srcimage` varchar(1000) NOT NULL,
  `localisation` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Un` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `username`, `pass`, `ville`, `typee`, `score`, `datenaissance`, `srcimage`, `localisation`) VALUES
(2, 'hadjhoudj', 'wassim', 'hadj', 'wassim123', 'benaknoun', 'quizy', 0, '1995-06-05', 'images/user1.jpg', 'https://goo.gl/maps/3dw6j3Hv2DR8igZw8'),
(3, 'yahia', 'anis', 'anisyaya10', 'anis123', 'alger', 'admin', 0, '1990-10-05', 'images/user2.jpg', 'https://goo.gl/maps/3dw6j3Hv2DR8igZw8'),
(4, 'bouaraba', 'Ahmed Amine', 'bouarabaahmed', 'bouaraba10', 'alger', 'admin', 0, '1884-06-05', 'images/user3.jpg', 'https://goo.gl/maps/3dw6j3Hv2DR8igZw8'),
(5, 'bouzidi', 'zakariaa', 'zaka', 'zaka123', 'alger', 'bibliotheque', 0, '2000-12-11', 'images/user4.jpg', 'https://goo.gl/maps/3dw6j3Hv2DR8igZw8'),
(6, 'belarbi', 'oussama', 'lio', 'messi123', 'rosario', 'lecteur', 57, '1998-06-05', 'images/user2.jpg', 'https://goo.gl/maps/3dw6j3Hv2DR8igZw8'),
(8, 'ronaldo', 'cristiano', 'don', 'don123', 'lisbona', 'lecteur', 15, '2003-06-07', 'images/user1.jpg', 'https://goo.gl/maps/3dw6j3Hv2DR8igZw8'),
(9, 'amine', 'achour', 'amineac', 'amine123', 'alger', 'lecteur', 25, '2002-06-05', 'images/user4.jpg', 'https://goo.gl/maps/3dw6j3Hv2DR8igZw8');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk5` FOREIGN KEY (`idlv`) REFERENCES `livre2` (`idlivree`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk6` FOREIGN KEY (`idus`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk7` FOREIGN KEY (`iduslv`) REFERENCES `livre2` (`iduser`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `demlivre`
--
ALTER TABLE `demlivre`
  ADD CONSTRAINT `fke1` FOREIGN KEY (`idlecteur`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `fke2` FOREIGN KEY (`idlivr`) REFERENCES `livre2` (`idlivree`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `fke3` FOREIGN KEY (`idlctlivre`) REFERENCES `livre2` (`iduser`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `livre2`
--
ALTER TABLE `livre2`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `offrequizy`
--
ALTER TABLE `offrequizy`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`idadminqz`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 04 juin 2023 à 20:59
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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `idus`, `idlv`, `iduslv`, `dat`, `messagee`) VALUES
(53, 8, 258, 19, '2023-06-04 12:28:13', 'top');

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
  `valide` tinyint(1) NOT NULL,
  `affiche` tinyint(1) NOT NULL,
  PRIMARY KEY (`idlecteur`,`idlivr`,`datedem`,`idlctlivre`),
  KEY `fke2` (`idlivr`),
  KEY `fke3` (`idlctlivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `demlivre`
--

INSERT INTO `demlivre` (`idlecteur`, `idlivr`, `datedem`, `idlctlivre`, `valide`, `affiche`) VALUES
(6, 67, '2023-05-04', 5, 0, 0),
(6, 67, '2023-05-13', 5, 0, 0),
(8, 1, '2023-06-08', 6, 1, 0),
(8, 3, '2023-09-08', 5, 1, 0),
(8, 33, '2023-05-24', 5, 1, 0),
(8, 39, '2023-09-08', 5, 0, 0),
(8, 67, '2023-09-08', 9, 1, 1),
(8, 166, '2023-09-08', 6, 0, 0),
(8, 369, '2023-09-08', 9, 1, 1),
(9, 3, '2023-09-08', 8, 1, 0),
(9, 48, '2023-05-02', 5, 0, 0),
(9, 48, '2023-05-12', 5, 0, 0),
(9, 210, '2023-09-08', 8, 1, 1),
(19, 3, '2023-06-04', 5, 0, 0),
(19, 3, '2023-06-04', 8, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `demquizy`
--

DROP TABLE IF EXISTS `demquizy`;
CREATE TABLE IF NOT EXISTS `demquizy` (
  `idoffre` int NOT NULL,
  `iduser` int NOT NULL,
  `dat` date NOT NULL,
  PRIMARY KEY (`idoffre`,`iduser`,`dat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `demquizy`
--

INSERT INTO `demquizy` (`idoffre`, `iduser`, `dat`) VALUES
(4, 8, '2023-05-31'),
(4, 8, '2023-06-02'),
(4, 19, '2023-06-04');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `ref` int NOT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`ref`) VALUES
(1),
(3),
(8),
(33),
(39),
(48),
(55),
(66),
(67),
(77),
(79),
(87),
(166),
(210),
(258),
(568),
(4586),
(5588),
(6884),
(8889);

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
  `description` varchar(10000) NOT NULL,
  `etat` enum('Neuf','Comme neuf','Tres bon etat','Bon etat','etat acceptable') NOT NULL,
  PRIMARY KEY (`idlivree`,`iduser`) USING BTREE,
  KEY `fk_2` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `livre2`
--

INSERT INTO `livre2` (`idlivree`, `iduser`, `titre`, `datedition`, `categorie`, `nbrexemplaire`, `pointe`, `srcimage`, `description`, `etat`) VALUES
(1, 5, 'The Pragmatic Programmerr', '2022-04-01', 'informatique', 4, 42, 'images/6.png', 'est un livre de 350 page ecrit par jhon dived parle sur les reseaux', 'Neuf'),
(1, 6, 'Shoe Dog', '2023-03-06', 'sport', 15, 8, 'images/7.png', 'est un livre de 150 pages ecrit par jack donne parle sur le sport ', 'Neuf'),
(1, 8, 'langue amazigh', '2006-02-25', 'langue', 3, 8, '222', 'anananana', 'Neuf'),
(3, 5, 'cardio', '2015-03-12', 'sport', 0, 8, 'images/8.png', 'est un livre de 350 page ecrit par rider kame parle sur le cardio', ''),
(3, 8, 'Integrated Chinese', '2023-01-01', 'langue', 4, 12, 'images/9.png', 'est un livre de 320 page ecrit par hinhan domme explique la langue de la chaine', 'Bon etat'),
(8, 8, 'Friday Night Lights', '2023-02-27', 'sport', 3, 8, 'images/10.png', 'est un livre de 100 pages ecrit par daves marke parle sur le reguebi', 'Bon etat'),
(33, 5, 'Anthony S', '2000-01-01', 'medcine', 2, 50, 'images/11.png', 'est un livre de 600 page ecrit par richard son parle sur la medecine', 'Neuf'),
(39, 5, 'The Boys in the Boat', '2006-03-01', 'sport', 1, 25, 'images/book2.jpg', '****************************************************************************************************************                 *******************************************************************************', 'Neuf'),
(48, 5, 'learn java', '2000-01-05', 'java', 3, 20, 'images/book3.jpg', '****************************************************************************************************************                 *******************************************************************************', 'Neuf'),
(55, 6, 'Computer Networking', '2023-01-02', 'informatique', 5, 20, 'images/book1.jpg', 'Computer Networking: A Top-Down Approach par James F. Kurose et Keith W. Ross - Ce livre est largement utilise dans les cours d introduction aux reseaux informatiques. ', 'Neuf'),
(66, 9, 'Living Language Italian', '2023-09-02', 'langue', 2, 10, 'images/book2.jpg', '****************************************************************************************************************                 *******************************************************************************', 'Neuf'),
(67, 5, 'English Grammar in Use', '2005-03-01', 'langue', 5, 30, 'images/book3.jpg', '****************************************************************************************************************                 *******************************************************************************', 'Neuf'),
(77, 6, 'opera', '2023-09-02', 'art', 3, 5, 'images/book1.jpg', '****************************************************************************************************************                 *******************************************************************************', 'Neuf'),
(77, 9, 'Harrison s Principles of Internal Medicine', '2023-09-02', 'medcine', 3, 30, 'images/book1.jpg', '****************************************************************************************************************                 *******************************************************************************', 'Neuf'),
(79, 8, 'learn arabic', '2023-05-02', 'langue', 2, 10, '', '', 'Comme neuf'),
(87, 8, 'Open', '2023-01-01', 'sport', 5, 8, 'images/book2.jpg', '****************************************************************************************************************                 *******************************************************************************', 'Neuf'),
(166, 6, 'English Grammar in Use', '2023-09-02', 'langue', 1, 10, 'images/book2.jpg', '****************************************************************************************************************                 *******************************************************************************', 'Neuf'),
(210, 9, 'Artificial Intelligence', '2022-04-01', 'informatique', 1, 20, '', '', 'Neuf'),
(258, 19, 'c+', '1999-02-15', 'informatique', 3, 12, 'images/book1.jpg', 'jjj', 'Neuf'),
(568, 8, 'uml', '1999-02-15', 'informatique', 2, 20, '55', '', 'Tres bon etat'),
(4586, 8, 'ljfufhudsd', '2022-04-01', 'informatique', 5, 5, '55', 'jgg', 'Neuf'),
(5588, 8, 'ti1', '1999-02-15', 'informatique', 2, 5, 'images/book1.jpg', 'lkk', 'Neuf'),
(6884, 8, 'learn franch', '2015-08-20', 'langue', 3, 10, '', '', 'etat acceptable');

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user1` int NOT NULL,
  `id_user2` int NOT NULL,
  `msg` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`id`, `id_user1`, `id_user2`, `msg`, `date`) VALUES
(1, 6, 5, 'saluut', '0000-00-00 00:00:00'),
(2, 5, 6, 'cv ?', '0000-00-00 00:00:00'),
(112, 6, 5, 'oui cv ', '0000-00-00 00:00:00'),
(113, 6, 5, 'jaime bien votre livre', '0000-00-00 00:00:00'),
(114, 6, 5, '??', '0000-00-00 00:00:00'),
(115, 5, 6, 'ok', '0000-00-00 00:00:00'),
(127, 6, 5, 'aaa', '0000-00-00 00:00:00'),
(128, 6, 5, '???', '0000-00-00 00:00:00'),
(129, 6, 5, 'bababa', '0000-00-00 00:00:00'),
(130, 6, 5, 'qqqq', '0000-00-00 00:00:00'),
(131, 6, 5, 'dggdhd', '0000-00-00 00:00:00'),
(132, 5, 6, 'vous avez fait une erreure.', '0000-00-00 00:00:00'),
(136, 6, 5, 'aaa', '0000-00-00 00:00:00'),
(137, 6, 8, 'salut', '0000-00-00 00:00:00'),
(138, 6, 8, 'ok', '0000-00-00 00:00:00'),
(139, 6, 8, 'ok2', '0000-00-00 00:00:00'),
(141, 6, 5, 'laquelle ?', '0000-00-00 00:00:00'),
(142, 3, 6, 'assure toi la prochaine fois', '0000-00-00 00:00:00'),
(143, 2, 8, 'votre compte sera livré bientot', '0000-00-00 00:00:00'),
(151, 2, 8, 'cbn ?', '0000-00-00 00:00:00'),
(152, 2, 8, 'aaa', '0000-00-00 00:00:00'),
(153, 6, 5, 'je vais le récuperer demain matin', '0000-00-00 00:00:00'),
(154, 3, 2, 'aaa', '0000-00-00 00:00:00'),
(155, 3, 5, 'je te fais confiance', '0000-00-00 00:00:00'),
(156, 3, 5, '???????????????????', '0000-00-00 00:00:00'),
(157, 8, 2, 'daccord', '0000-00-00 00:00:00'),
(158, 8, 6, 'dcr', '0000-00-00 00:00:00'),
(159, 8, 6, 'kho', '0000-00-00 00:00:00'),
(160, 8, 6, 'hhh', '0000-00-00 00:00:00'),
(161, 5, 3, 'ok', '0000-00-00 00:00:00'),
(162, 5, 3, 'hhh', '0000-00-00 00:00:00'),
(163, 3, 5, 'prq vous rire', '0000-00-00 00:00:00'),
(164, 3, 2, '???', '0000-00-00 00:00:00'),
(165, 2, 3, 'dcr', '0000-00-00 00:00:00'),
(166, 8, 5, 'top', '0000-00-00 00:00:00'),
(167, 19, 5, 'bonjour', '2023-06-04 11:25:28'),
(168, 19, 8, 'hi', '2023-06-04 11:34:23'),
(169, 5, 19, 'bonjour cv vous avez fait une demande', '2023-06-04 11:59:24'),
(170, 8, 19, 'bonjour vous avez fait une demande de livre', '2023-06-04 12:22:27'),
(171, 2, 19, 'username: mohlm  password: moh123', '2023-06-04 12:29:24'),
(172, 2, 3, '.', '2023-06-04 12:35:38'),
(173, 3, 5, '?', '2023-06-04 12:38:25'),
(174, 3, 6, '?', '2023-06-04 12:38:47');

-- --------------------------------------------------------

--
-- Structure de la table `msgntf`
--

DROP TABLE IF EXISTS `msgntf`;
CREATE TABLE IF NOT EXISTS `msgntf` (
  `id` int NOT NULL,
  `id_user1` int NOT NULL,
  `id_user2` int NOT NULL,
  `msg` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `msgntf`
--

INSERT INTO `msgntf` (`id`, `id_user1`, `id_user2`, `msg`, `date`) VALUES
(137, 6, 8, 'salut', '0000-00-00 00:00:00'),
(138, 6, 8, 'ok', '0000-00-00 00:00:00'),
(139, 6, 8, 'ok2', '0000-00-00 00:00:00'),
(142, 3, 6, 'assure toi la prochaine fois', '0000-00-00 00:00:00'),
(143, 2, 8, 'votre compte sera livré bientot', '0000-00-00 00:00:00'),
(151, 2, 8, 'cbn ?', '0000-00-00 00:00:00'),
(152, 2, 8, 'aaa', '0000-00-00 00:00:00'),
(154, 3, 2, 'aaa', '0000-00-00 00:00:00'),
(157, 8, 2, 'daccord', '0000-00-00 00:00:00'),
(158, 8, 6, 'dcr', '0000-00-00 00:00:00'),
(159, 8, 6, 'kho', '0000-00-00 00:00:00'),
(160, 8, 6, 'hhh', '0000-00-00 00:00:00'),
(164, 3, 2, '???', '0000-00-00 00:00:00'),
(165, 2, 3, 'dcr', '0000-00-00 00:00:00'),
(168, 19, 8, 'hi', '2023-06-04 11:34:23'),
(170, 8, 19, 'bonjour vous avez fait une demande de livre', '2023-06-04 12:22:27'),
(171, 2, 19, 'username: mohlm  password: moh123', '2023-06-04 12:29:24'),
(172, 2, 3, '.', '2023-06-04 12:35:38'),
(174, 3, 6, '?', '2023-06-04 12:38:47'),
(137, 6, 8, 'salut', '0000-00-00 00:00:00'),
(138, 6, 8, 'ok', '0000-00-00 00:00:00'),
(139, 6, 8, 'ok2', '0000-00-00 00:00:00'),
(142, 3, 6, 'assure toi la prochaine fois', '0000-00-00 00:00:00'),
(143, 2, 8, 'votre compte sera livré bientot', '0000-00-00 00:00:00'),
(151, 2, 8, 'cbn ?', '0000-00-00 00:00:00'),
(152, 2, 8, 'aaa', '0000-00-00 00:00:00'),
(154, 3, 2, 'aaa', '0000-00-00 00:00:00'),
(157, 8, 2, 'daccord', '0000-00-00 00:00:00'),
(158, 8, 6, 'dcr', '0000-00-00 00:00:00'),
(159, 8, 6, 'kho', '0000-00-00 00:00:00'),
(160, 8, 6, 'hhh', '0000-00-00 00:00:00'),
(164, 3, 2, '???', '0000-00-00 00:00:00'),
(165, 2, 3, 'dcr', '0000-00-00 00:00:00'),
(168, 19, 8, 'hi', '2023-06-04 11:34:23'),
(170, 8, 19, 'bonjour vous avez fait une demande de livre', '2023-06-04 12:22:27'),
(171, 2, 19, 'username: mohlm  password: moh123', '2023-06-04 12:29:24'),
(172, 2, 3, '.', '2023-06-04 12:35:38'),
(174, 3, 6, '?', '2023-06-04 12:38:47');

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
(1, 2, '4 mois', '50%', 50, 'sujet avec solution '),
(2, 2, '1 année', '100%', 100, 'questions reponses '),
(4, 2, '1mois', '60%', 10, 'rappel de cours'),
(5, 2, '2mois', '100%', 60, 'les resumes de cours'),
(6, 2, '2ans', '30%', 150, 'sujets avec solution et explication');

-- --------------------------------------------------------

--
-- Structure de la table `signale`
--

DROP TABLE IF EXISTS `signale`;
CREATE TABLE IF NOT EXISTS `signale` (
  `idu` int NOT NULL,
  `idv` int NOT NULL,
  `motif` varchar(100) NOT NULL,
  `lu` tinyint(1) NOT NULL,
  PRIMARY KEY (`idu`,`idv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `signale`
--

INSERT INTO `signale` (`idu`, `idv`, `motif`, `lu`) VALUES
(8, 6, 'contenu innapropprié', 1),
(8, 9, 'il a annule le rendez vous qu on a discute', 1),
(19, 8, 'il a annule le rendez vous', 1);

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
  `typee` enum('lecteur','bibliotheque','quizy','admin') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `score` int NOT NULL,
  `datenaissance` date NOT NULL,
  `srcimage` varchar(1000) NOT NULL,
  `localisation` varchar(100) NOT NULL,
  `sexe` enum('male','femelle') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date-inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `specialite` enum('autre','medcine') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Un` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `username`, `pass`, `ville`, `typee`, `score`, `datenaissance`, `srcimage`, `localisation`, `sexe`, `date-inscription`, `specialite`) VALUES
(2, 'hadjoudj', 'wassim', 'hadj', 'wassim123', 'benaknoun', 'quizy', 0, '1995-06-06', 'images/2.jpg', 'https://goo.gl/maps/3dw6j3Hv2DR8igZw8', 'male', '0000-00-00 00:00:00', 'autre'),
(3, 'yahia', 'anis', 'anisyaya14', 'anis123', 'alger', 'admin', 0, '1990-12-06', 'img/22.jpg', 'https://goo.gl/maps/3dw6j3Hv2DR8igZw8', 'male', '0000-00-00 00:00:00', 'autre'),
(5, 'bouzidi', 'zakaria', 'zakabd', 'zaka123', 'alger', 'bibliotheque', 0, '2000-12-25', 'img/avatar3.png', 'https://goo.gl/maps/84iAk1izvTsDHHpo6', 'male', '0000-00-00 00:00:00', 'autre'),
(6, 'belarbi', 'oussama', 'oussamabl', 'oussama123', 'bejaia', 'lecteur', 70, '1998-06-05', 'images/user3.jpg', 'https://goo.gl/maps/pBxX8GkMQoH8eyQy8', 'male', '0000-00-00 00:00:00', 'medcine'),
(8, 'ramtane', 'yassmine', 'yassmine', 'yassmine123', 'annaba', 'lecteur', 42, '2003-06-07', 'images/user1.jpg', 'https://goo.gl/maps/3dw6j3Hv2DR8igZw8', 'femelle', '0000-00-00 00:00:00', 'medcine'),
(9, 'amine', 'achour', 'amineac', 'amine123', 'alger', 'lecteur', 60, '2010-06-05', 'images/user4.jpg', 'https://goo.gl/maps/3dw6j3Hv2DR8igZw8', 'male', '0000-00-00 00:00:00', 'autre'),
(13, 'yahia', 'adel', 'adelyaya', 'adel123', 'bejaia', 'bibliotheque', 0, '1990-05-24', 'images/user1.jpg', 'https://goo.gl/maps/fggfGuo1FPKaHuQa6?coh=178571&entry=tt', 'male', '2023-05-06 23:06:23', 'autre'),
(14, 'amar', 'kissass', 'amarkissass', 'amar123', 'el harrach', 'bibliotheque', 0, '1980-05-06', 'hhh', 'https://goo.gl/maps/SYD8jfvXi9qKL39CA?coh=178571&entry=tt', 'male', '2023-05-11 17:52:37', 'autre'),
(19, 'lkrim', 'mohamed', 'mohamedlm', 'mohamed123', 'alger', 'lecteur', 50, '2000-12-25', 'images/19.jpg', '36.70254136677424, 3.2081848382949834', 'male', '2023-06-04 10:57:51', 'medcine'),
(21, 'tamani', 'hayet', 'hayet123', 'hayet123', 'tizi ouzou', 'lecteur', 0, '1990-01-01', 'images/20.jpg', 'https://goo.gl/maps/vqUdj6AqQa9NrZ8m6', '', '2023-06-04 22:53:56', 'medcine');

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
-- Contraintes pour la table `livre2`
--
ALTER TABLE `livre2`
  ADD CONSTRAINT `fck6` FOREIGN KEY (`idlivree`) REFERENCES `livre` (`ref`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `offrequizy`
--
ALTER TABLE `offrequizy`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`idadminqz`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

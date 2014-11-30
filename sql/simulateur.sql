-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 30 Novembre 2014 à 21:23
-- Version du serveur :  5.5.39
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `simulateur`
--

-- --------------------------------------------------------

--
-- Structure de la table `air_space`
--

CREATE TABLE IF NOT EXISTS `air_space` (
`id` int(11) NOT NULL,
  `label` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `air_space`
--

INSERT INTO `air_space` (`id`, `label`) VALUES
(1, '4/6/4'),
(2, '4/8/4'),
(3, '4/10/4'),
(4, '4/12/4'),
(5, '4/15 et+/4'),
(6, 'inconnue');

-- --------------------------------------------------------

--
-- Structure de la table `basement_form`
--

CREATE TABLE IF NOT EXISTS `basement_form` (
`id` int(11) NOT NULL,
  `plancher` varchar(255) NOT NULL,
  `uplancher` double NOT NULL,
  `id_palncher_type` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `basement_form`
--

INSERT INTO `basement_form` (`id`, `plancher`, `uplancher`, `id_palncher_type`) VALUES
(1, 'Plancher inconnu', 2, 3),
(2, 'Plancher avec ou sans\r\nremplissage', 1.45, 3),
(3, 'Plancher entre solives bois avec ou sans remplissage', 1.1, 3),
(4, 'Bardeaux et remplissage', 1.1, 3),
(5, 'Plancher bois sur solives bois', 1.6, 3),
(6, 'Plancher entre solives métalliques avec ou sans remplissage', 1.45, 3),
(7, 'Plancher bois sur solives métalliques', 1.6, 3),
(8, 'Voutains sur solives métalliques', 1.75, 3),
(9, 'Plancher lourd type, entrevous terre-\r\ncuite, poutrelles béton', 2, 3),
(10, 'Dalle béton', 2, 3),
(11, 'Voutains en briques ou moellons', 0.8, 3),
(12, 'Plancher bas à entrevous isolants', 0.45, 3);

-- --------------------------------------------------------

--
-- Structure de la table `basement_type`
--

CREATE TABLE IF NOT EXISTS `basement_type` (
`id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cor_sol` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Type de plancher bas' AUTO_INCREMENT=5 ;

--
-- Contenu de la table `basement_type`
--

INSERT INTO `basement_type` (`id`, `label`, `cor_sol`) VALUES
(1, 'Terre-plein', 1),
(2, 'extérieur', 1),
(3, 'Vide-sanitaire', 0.85),
(4, 'Local non chauffé', 0.9);

-- --------------------------------------------------------

--
-- Structure de la table `carpentry_type`
--

CREATE TABLE IF NOT EXISTS `carpentry_type` (
`id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `carpentry_type`
--

INSERT INTO `carpentry_type` (`id`, `code`, `label`) VALUES
(1, 'wood', 'bois'),
(2, 'pvc', 'PVC'),
(3, 'metal', 'métal'),
(4, 'metal2', 'métal+rupture de pont thermique');

-- --------------------------------------------------------

--
-- Structure de la table `construction_year`
--

CREATE TABLE IF NOT EXISTS `construction_year` (
`id` int(11) NOT NULL,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `umur_h1_joule` double NOT NULL,
  `umur_h1` double NOT NULL,
  `umur_h2_joule` double NOT NULL,
  `umur_h2` double NOT NULL,
  `umur_h3_joule` double NOT NULL,
  `umur_h3` double NOT NULL,
  `uplancher_h1_joule` double NOT NULL,
  `uplancher_h1` double NOT NULL,
  `uplancher_h2_joule` double NOT NULL,
  `uplancher_h2` double NOT NULL,
  `uplancher_h3_joule` double NOT NULL,
  `uplancher_h3` double NOT NULL,
  `uplancher_combles_h1_joule` double NOT NULL,
  `uplancher_combles_h1` double NOT NULL,
  `uplancher_combles_h2_joule` double NOT NULL,
  `uplancher_combles_h2` double NOT NULL,
  `uplancher_combles_h3_joule` double NOT NULL,
  `uplancher_combles_h3` double NOT NULL,
  `uplancher_terrasse_h1_joule` double NOT NULL,
  `uplancher_terrasse_h1` double NOT NULL,
  `uplancher_terrasse_h2_joule` double NOT NULL,
  `uplancher_terrasse_h2` double NOT NULL,
  `uplancher_terrasse_h3_joule` double NOT NULL,
  `uplancher_terrasse_h3` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `construction_year`
--

INSERT INTO `construction_year` (`id`, `code`, `label`, `umur_h1_joule`, `umur_h1`, `umur_h2_joule`, `umur_h2`, `umur_h3_joule`, `umur_h3`, `uplancher_h1_joule`, `uplancher_h1`, `uplancher_h2_joule`, `uplancher_h2`, `uplancher_h3_joule`, `uplancher_h3`, `uplancher_combles_h1_joule`, `uplancher_combles_h1`, `uplancher_combles_h2_joule`, `uplancher_combles_h2`, `uplancher_combles_h3_joule`, `uplancher_combles_h3`, `uplancher_terrasse_h1_joule`, `uplancher_terrasse_h1`, `uplancher_terrasse_h2_joule`, `uplancher_terrasse_h2`, `uplancher_terrasse_h3_joule`, `uplancher_terrasse_h3`) VALUES
(1, 'before_1975', 'Avant 1975', 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2, 2, 2, 2, 2, 2, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5),
(2, 'between_1975_and_1977', 'Entre 1975 et 1977', 1, 1, 1.05, 1.05, 1.11, 1.11, 0.9, 0.9, 0.95, 0.95, 1, 1, 0.5, 0.5, 0.53, 0.53, 0.56, 0.56, 0.75, 0.75, 0.79, 0.79, 0.83, 0.83),
(3, 'between_1978_and_1982', 'Entre 1978 et 1982', 0.8, 1, 0.84, 0.84, 0.89, 1.11, 0.8, 0.9, 0.84, 0.95, 0.89, 1, 0.4, 0.5, 0.42, 0.53, 0.44, 0.56, 0.7, 0.75, 0.74, 0.79, 0.78, 0.83),
(4, 'between_1983_and_1988', 'Entre 1983 et 1988', 0.7, 0.8, 0.84, 0.74, 0.78, 0.89, 0.55, 0.7, 0.58, 0.74, 0.61, 0.78, 0.3, 0.3, 0.32, 0.32, 0.33, 0.33, 0.4, 0.55, 0.42, 0.58, 0.44, 0.61),
(5, 'between_1989_and_2000', 'Entre 1989 et 2000', 0.45, 0.5, 0.47, 0.53, 0.5, 0.56, 0.55, 0.6, 0.58, 0.63, 0.61, 0.67, 0.25, 0.25, 0.26, 0.26, 0.3, 0.3, 0.35, 0.4, 0.37, 0.42, 0.39, 0.44),
(6, 'after_2000', 'Après 2000', 0.4, 0.4, 0.4, 0.4, 0.47, 0.47, 0.4, 0.4, 0.4, 0.4, 0.43, 0.43, 0.23, 0.23, 0.23, 0.23, 0.3, 0.3, 0.3, 0.3, 0.3, 0.3, 0.3, 0.3);

-- --------------------------------------------------------

--
-- Structure de la table `door_type`
--

CREATE TABLE IF NOT EXISTS `door_type` (
`id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `u` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `door_type`
--

INSERT INTO `door_type` (`id`, `label`, `u`) VALUES
(1, 'Porte opaque pleine', 3.5),
(2, 'Porte avec moins de 30% de vitrage simple', 4),
(3, 'Porte avec 30-60% de vitrage simple', 4.5),
(4, 'Porte avec double vitrage', 3.3),
(5, 'Porte opaque pleine', 5.8),
(6, 'Porte avec vitrage simple', 5.5),
(7, 'Porte avec moins de 30% de double vitrage', 5.5),
(8, 'Porte avec 30-60% de double vitrage', 4.8),
(9, 'Porte simple en PVC', 3.5),
(10, 'Porte opaque pleine isolée', 2),
(11, 'Porte précédée d’un SAS', 1.5);

-- --------------------------------------------------------

--
-- Structure de la table `energy`
--

CREATE TABLE IF NOT EXISTS `energy` (
`id` int(11) NOT NULL,
  `label` varchar(30) NOT NULL,
  `a_pcsi` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `energy`
--

INSERT INTO `energy` (`id`, `label`, `a_pcsi`) VALUES
(1, 'Electrique', 1),
(2, 'Gaz naturel', 1.11),
(3, 'GPL', 1.09),
(4, 'Fioul', 1.07),
(5, 'Bois', 1.11),
(6, 'Charbon', 1.04),
(7, 'Réseau de chaleur', 1),
(8, 'autre', 2);

-- --------------------------------------------------------

--
-- Structure de la table `glazing_type`
--

CREATE TABLE IF NOT EXISTS `glazing_type` (
`id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `glazing_type`
--

INSERT INTO `glazing_type` (`id`, `code`, `label`) VALUES
(1, 'single_glazing', 'Simple'),
(2, 'overglazing', 'Survitrage'),
(3, 'double_glazing', 'Double vitrage'),
(4, 'double_glazing_vir', 'double vitrage VIR'),
(5, 'double_windows', 'Doubles fenêtres');

-- --------------------------------------------------------

--
-- Structure de la table `hsp`
--

CREATE TABLE IF NOT EXISTS `hsp` (
`id` int(11) NOT NULL,
  `hsp` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Contenu de la table `hsp`
--

INSERT INTO `hsp` (`id`, `hsp`) VALUES
(1, 2),
(2, 2.25),
(3, 2.5),
(4, 2.75),
(5, 3),
(6, 3.25),
(7, 3.5),
(8, 3.75),
(9, 4),
(10, 4.25),
(11, 4.5),
(12, 4.75),
(13, 5);

-- --------------------------------------------------------

--
-- Structure de la table `ich`
--

CREATE TABLE IF NOT EXISTS `ich` (
`id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `rd` float NOT NULL,
  `re` float NOT NULL,
  `rg` float NOT NULL,
  `rr` varchar(30) NOT NULL,
  `energy` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Contenu de la table `ich`
--

INSERT INTO `ich` (`id`, `label`, `rd`, `re`, `rg`, `rr`, `energy`) VALUES
(1, 'Convecteurs électriques NF électricité performance catégorie C', 1, 0.95, 1, '0.99', 1),
(2, 'Panneaux rayonnants électriques ou radiateurs électriques NF..C', 1, 0.97, 1, '0.99', 1),
(3, 'Plafond rayonnant électrique', 1, 0.98, 1, 'Rr2', 1),
(4, 'Plancher rayonnant électrique', 1, 1, 1, 'Rr2', 1),
(5, 'Radiateur électrique à accumulation', 1, 0.95, 1, '0.95', 1),
(6, 'Plancher électrique à accumulation', 1, 1, 1, '0.95', 1),
(7, 'Electrique direct autre', 1, 0.95, 1, '0.96', 1),
(8, 'Pompe à chaleur (divisé) - type split', 1, 0.95, 2.6, '0.95', 1),
(9, 'Radiateurs gaz à ventouse', 1, 0.95, 0.73, '0.96', 2),
(10, 'Radiateurs gaz sur conduits fumées', 1, 0.95, 0.6, '0.96', 2),
(11, 'Poêle charbon', 1, 0.95, 0.35, '0.8', 6),
(12, 'Poêle bois', 1, 0.95, 0.35, '0.8', 5),
(13, 'Poêle fioul', 1, 0.95, 0.55, '0.8', 4),
(14, 'Poêle GPL', 1, 0.95, 0.55, '0.8', 3),
(15, 'Chaudière individuelle gaz installée jusqu’à 1988 (*)', 0.92, 0.95, 0.6, 'Rr1', 2),
(16, 'Chaudière individuelle fioul installée jusqu’à 1988 (*)', 0.92, 0.95, 0.6, 'Rr1', 4),
(17, 'Chaudière gaz sur sol installée jusqu’à 1988 et changement de\r\nbrûleur (*)', 0.92, 0.95, 0.65, 'Rr1', 2),
(18, 'Chaudière fioul sur sol installée jusqu’à 1988 et changement de\nbrûleur (*)', 0.92, 0.95, 0.65, 'Rr1', 4),
(19, 'Chaudière gaz installée entre 1989 et 2000 (*)', 0.92, 0.95, 0.73, 'Rr1', 2),
(20, 'Chaudière fioul installée entre 1989 et 2000 (*)', 0.92, 0.95, 0.73, 'Rr1', 4),
(21, 'Chaudière gaz installée à partir de 2001 (*)', 0.92, 0.95, 0.78, 'Rr1', 2),
(22, 'Chaudière fioul installée à partir de 2001 (*)', 0.92, 0.95, 0.78, 'Rr1', 4),
(23, 'Chaudière gaz installée basse température', 0.92, 0.95, 0.8, 'Rr1', 2),
(24, 'Chaudière fioul installée basse température', 0.92, 0.95, 0.8, 'Rr1', 4),
(25, 'Chaudière gaz condensation', 0.92, 0.95, 0.83, 'Rr1', 2),
(26, 'Chaudière fioul condensation', 0.92, 0.95, 0.83, 'Rr1', 4),
(27, 'Chaudière bois classe inconnue', 0.92, 0.95, 0.3, '0.9', 5),
(28, 'Chaudière bois classe 1', 0.92, 0.95, 0.34, '0.9', 5),
(29, 'Chaudière bois classe 2', 0.92, 0.95, 0.41, '0.9', 5),
(30, 'Chaudière bois classe 3', 0.92, 0.95, 0.47, '0.9', 5),
(31, 'Chaudière charbon', 0.92, 0.95, 0.5, '0.9', 6),
(32, 'Réseau de chaleur', 0.92, 0.95, 0.9, '0.9', 7),
(33, 'Chaudière électrique', 0.92, 0.95, 0.77, '0.9', 1),
(34, 'Pompe à chaleur air/air', 0.85, 0.95, 2.2, '0.9', 1),
(37, 'Pompe à chaleur air/eau', 0.92, 0.95, 2.6, '0.95', 1),
(38, 'Pompe à chaleur eau/eau', 0.92, 0.95, 3.2, '0.95', 1),
(39, 'Pompe à chaleur géothermique', 0.92, 0.95, 4, '0.95', 1);

-- --------------------------------------------------------

--
-- Structure de la table `mitoyennete`
--

CREATE TABLE IF NOT EXISTS `mitoyennete` (
`id` int(11) NOT NULL,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mit` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `mitoyennete`
--

INSERT INTO `mitoyennete` (`id`, `code`, `label`, `mit`) VALUES
(1, 'individual_house', 'Indépendante', 1),
(2, 'short_side', 'Accolée sur 1 petit côté', 0.8),
(3, 'long_side', 'Accolée sur 1 grand côté', 0.7),
(4, '2_short_sides', 'Accolée sur 2 petits côtés', 0.7),
(5, 'value="short_and_long_sides"', 'Accolée sur 1 grand et 1 petit côtés', 0.5),
(6, '2_long_sides', 'Clear Accolée sur 2 grands côtés', 0.35);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`) VALUES
(1, 'test1', 'test1', 'test1test1test1test1test1test1test1'),
(2, 'test2', 'test2', 'test2test2test2test2test2test2test2test2test2test2'),
(3, 'aby-(-ç_ç_', 'aby-__', 'hfhhfghfhgf');

-- --------------------------------------------------------

--
-- Structure de la table `roof_type`
--

CREATE TABLE IF NOT EXISTS `roof_type` (
`id` int(11) NOT NULL,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `roof_type`
--

INSERT INTO `roof_type` (`id`, `code`, `label`) VALUES
(1, 'roof_terrace', 'Terrasse'),
(2, 'unoccupied_attics', 'Combles perdus'),
(3, 'habitable_attics', 'Combles aménagés'),
(4, 'terrace_and_attics', 'Mixte');

-- --------------------------------------------------------

--
-- Structure de la table `shape`
--

CREATE TABLE IF NOT EXISTS `shape` (
`id` int(11) NOT NULL,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `shape`
--

INSERT INTO `shape` (`id`, `code`, `label`) VALUES
(1, 'compact', 'compacte'),
(2, 'elongated', 'Allongée'),
(3, 'complex', 'Développée');

-- --------------------------------------------------------

--
-- Structure de la table `ufenetres`
--

CREATE TABLE IF NOT EXISTS `ufenetres` (
`id` int(11) NOT NULL,
  `id_vitrage` int(11) NOT NULL,
  `id_volet` int(11) NOT NULL,
  `id_menuiserie` int(11) NOT NULL,
  `id_airspace` int(11) DEFAULT NULL,
  `ufenetre` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=115 ;

--
-- Contenu de la table `ufenetres`
--

INSERT INTO `ufenetres` (`id`, `id_vitrage`, `id_volet`, `id_menuiserie`, `id_airspace`, `ufenetre`) VALUES
(1, 1, 1, 1, NULL, 4.2),
(2, 1, 1, 2, NULL, 3.9),
(3, 1, 1, 3, NULL, 4.95),
(4, 1, 2, 1, NULL, 3.55),
(5, 1, 2, 2, NULL, 3.9),
(6, 1, 2, 3, NULL, 4.05),
(7, 2, 1, 1, NULL, 2.9),
(8, 2, 1, 2, NULL, 2.75),
(9, 2, 1, 3, NULL, 4),
(10, 2, 2, 1, NULL, 2.6),
(11, 2, 2, 2, NULL, 2.5),
(12, 2, 2, 3, NULL, 3.5),
(13, 5, 1, 1, NULL, 2.35),
(14, 5, 1, 2, NULL, 2.15),
(15, 5, 1, 3, NULL, 2.8),
(16, 5, 2, 1, NULL, 2.1),
(17, 5, 2, 2, NULL, 1.95),
(18, 5, 2, 3, NULL, 2.4),
(19, 3, 1, 1, 1, 2.8),
(20, 3, 1, 1, 2, 2.7),
(21, 3, 1, 1, 3, 2.65),
(22, 3, 1, 1, 4, 2.55),
(23, 3, 1, 1, 5, 2.4),
(24, 3, 1, 1, 6, 2.8),
(25, 3, 2, 1, 1, 2.45),
(26, 3, 2, 1, 2, 2.35),
(27, 3, 2, 1, 3, 2.3),
(28, 3, 2, 1, 4, 2.55),
(29, 3, 2, 1, 5, 2.25),
(30, 3, 2, 1, 6, 2.15),
(31, 3, 1, 2, 1, 2.55),
(32, 3, 1, 2, 2, 2.45),
(33, 3, 1, 2, 3, 2.4),
(34, 3, 1, 2, 4, 2.35),
(35, 3, 1, 2, 5, 2.3),
(36, 3, 1, 2, 6, 2.55),
(37, 3, 2, 2, 1, 2.25),
(38, 3, 2, 2, 2, 2.15),
(39, 3, 2, 2, 3, 2.1),
(40, 3, 2, 2, 4, 2.05),
(41, 3, 2, 2, 5, 2.05),
(42, 3, 2, 2, 6, 2.25),
(43, 3, 1, 3, 1, 3.8),
(44, 3, 1, 3, 2, 3.7),
(45, 3, 1, 3, 3, 3.65),
(46, 3, 1, 3, 4, 3.6),
(47, 3, 1, 3, 5, 3.6),
(48, 3, 1, 3, 6, 3.8),
(49, 3, 2, 3, 1, 3.25),
(50, 3, 2, 3, 2, 3.15),
(51, 3, 2, 3, 3, 3.1),
(52, 3, 2, 3, 4, 3.05),
(53, 3, 2, 3, 5, 3.05),
(54, 3, 2, 3, 6, 3.25),
(55, 3, 1, 4, 1, 3.15),
(56, 3, 1, 4, 2, 3.05),
(57, 3, 1, 4, 3, 2.95),
(58, 3, 1, 4, 4, 2.9),
(59, 3, 1, 4, 5, 2.9),
(60, 3, 1, 4, 6, 3.15),
(61, 3, 2, 4, 1, 2.7),
(62, 3, 2, 4, 2, 2.65),
(63, 3, 2, 4, 3, 2.6),
(64, 3, 2, 4, 4, 2.55),
(65, 3, 2, 4, 5, 2.5),
(66, 3, 2, 4, 6, 2.7),
(67, 4, 1, 1, 1, 2.42),
(68, 4, 1, 1, 2, 2.25),
(69, 4, 1, 1, 3, 2.14),
(70, 4, 1, 1, 4, 1.99),
(71, 4, 1, 1, 5, 1.75),
(72, 4, 1, 1, 6, 2.42),
(73, 4, 2, 1, 1, 2.14),
(74, 4, 2, 1, 2, 1.98),
(75, 4, 2, 1, 3, 1.89),
(76, 4, 2, 1, 4, 1.8),
(77, 4, 2, 1, 5, 1.62),
(78, 4, 2, 1, 6, 2.14),
(79, 4, 1, 2, 1, 2.2),
(80, 4, 1, 2, 2, 2.03),
(81, 4, 1, 2, 3, 1.93),
(82, 4, 1, 2, 4, 1.83),
(83, 4, 1, 2, 5, 1.7),
(84, 4, 1, 2, 6, 2.2),
(85, 4, 2, 2, 1, 1.96),
(86, 4, 2, 2, 2, 1.81),
(87, 4, 2, 2, 3, 1.72),
(88, 4, 2, 2, 4, 1.63),
(89, 4, 2, 2, 5, 1.56),
(90, 4, 2, 2, 6, 1.96),
(91, 4, 1, 3, 1, 3.42),
(92, 4, 1, 3, 2, 3.25),
(93, 4, 1, 3, 3, 3.14),
(94, 4, 1, 3, 4, 3.04),
(95, 4, 1, 3, 5, 2.95),
(96, 4, 1, 3, 6, 3.42),
(97, 4, 2, 3, 1, 2.94),
(98, 4, 2, 3, 2, 2.78),
(99, 4, 2, 3, 3, 2.69),
(100, 4, 2, 3, 4, 2.6),
(101, 4, 2, 3, 5, 2.52),
(102, 4, 2, 3, 6, 2.94),
(103, 4, 1, 4, 1, 2.77),
(104, 4, 1, 4, 2, 2.6),
(105, 4, 1, 4, 3, 2.44),
(106, 4, 1, 4, 4, 2.34),
(107, 4, 1, 4, 5, 2.25),
(108, 4, 1, 4, 6, 2.77),
(109, 4, 2, 4, 1, 2.39),
(110, 4, 2, 4, 2, 2.28),
(111, 4, 2, 4, 3, 2.19),
(112, 4, 2, 4, 4, 2.1),
(113, 4, 2, 4, 5, 1.97),
(114, 4, 2, 4, 6, 2.39);

-- --------------------------------------------------------

--
-- Structure de la table `ventilation`
--

CREATE TABLE IF NOT EXISTS `ventilation` (
`id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `ara` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `ventilation`
--

INSERT INTO `ventilation` (`id`, `label`, `ara`) VALUES
(1, 'Naturelle + cheminée sans trappe d’obturation', 0.45),
(2, 'Naturelle par défauts d’étanchéité', 0.35),
(3, 'Naturelle par entrée d’air / extraction', 0.3),
(4, 'VMC classique modulée < = 1983', 0.23),
(5, 'VMC classique modulée >1983', 0.2),
(6, 'VMC Hygro A', 0.16),
(7, 'VMC Hygro B', 0.14),
(8, 'VMC double flux', 0.1);

-- --------------------------------------------------------

--
-- Structure de la table `wall_thickness`
--

CREATE TABLE IF NOT EXISTS `wall_thickness` (
`id` int(11) NOT NULL,
  `id_wall` int(11) NOT NULL,
  `thickness` varchar(30) NOT NULL,
  `umur` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Contenu de la table `wall_thickness`
--

INSERT INTO `wall_thickness` (`id`, `id_wall`, `thickness`, `umur`) VALUES
(1, 21, '20 et -', 3.2),
(2, 21, '25', 2.85),
(3, 21, '30', 2.65),
(4, 21, '35', 2.45),
(5, 21, '40', 2.3),
(6, 21, '45', 2.15),
(7, 21, '50', 2.05),
(8, 21, '55', 1.9),
(9, 21, '60', 1.8),
(10, 21, '65', 1.75),
(11, 21, '70', 1.65),
(12, 21, '75', 1.55),
(13, 21, '80', 1.5),
(14, 21, 'inconnue', 3.2),
(15, 22, '50', 1.9),
(16, 22, '55', 1.75),
(17, 22, '60', 1.6),
(18, 22, '65', 1.5),
(19, 22, '70', 1.45),
(20, 22, '75', 1.3),
(21, 22, '80', 1.25),
(22, 22, 'inconnue', 1.9),
(23, 2, '40 et -', 1.75),
(24, 2, '45', 1.65),
(25, 2, '50', 1.55),
(26, 2, '55', 1.45),
(27, 2, '60', 1.35),
(28, 2, '65', 1.25),
(29, 2, '70', 1.2),
(30, 2, '75', 1.15),
(31, 2, '80', 1.1),
(32, 2, 'inconnue', 1.75),
(33, 3, '8 et -', 3),
(34, 3, '10', 2.7),
(35, 3, '13', 2.35),
(36, 3, '18', 1.98),
(37, 3, '24', 1.65),
(38, 3, '32', 1.35),
(39, 3, 'inconnue', 3),
(40, 4, '10 et -', 1.6),
(41, 4, '15', 1.2),
(42, 4, '20', 0.95),
(43, 4, '25', 0.8),
(44, 4, 'inconnue', 1.6),
(45, 6, '9 et -', 3.9),
(46, 6, '12', 3.45),
(47, 6, '15', 3.05),
(48, 6, '19', 2.75),
(49, 6, '23', 2.5),
(50, 6, '28', 2.25),
(51, 6, '34', 2),
(53, 6, '55', 1.45),
(54, 6, '60', 1.35),
(55, 6, '70', 1.2),
(56, 6, 'inconnue', 3.9),
(57, 7, '20 et -', 2),
(58, 7, '25', 1.85),
(59, 7, '30', 1.65),
(60, 7, '35', 1.55),
(61, 7, '45', 1.35),
(62, 7, '50', 1.25),
(63, 7, '60', 1.2),
(64, 7, 'inconnue', 2),
(65, 8, '15 et -', 2.15),
(66, 8, '18', 2.05),
(67, 8, '20', 2),
(68, 8, '23', 1.85),
(69, 8, '25', 1.7),
(70, 8, '28', 1.68),
(71, 8, '33', 1.65),
(72, 8, '38', 1.55),
(73, 8, '43', 1.4),
(74, 8, 'inconnue', 2.15),
(75, 9, '20 et +', 2.9),
(76, 9, '23', 2.75),
(77, 9, '25', 2.5),
(78, 9, '28', 2.6),
(79, 9, '30', 2.4),
(80, 9, '33', 2.3),
(81, 9, '35', 2.2),
(82, 9, '38', 2.1),
(83, 9, '40', 2.05),
(84, 9, 'inconnue', 2.9),
(85, 10, '20 et -', 2.8),
(86, 10, '23', 2.65),
(87, 10, '25', 2.3),
(88, 10, 'inconnue', 2.8),
(89, 11, '20 et -', 2.9),
(90, 11, '22.5', 2.75),
(91, 11, '25', 2.65),
(92, 11, '28', 2.5),
(93, 11, '30', 2.4),
(94, 11, '35', 2.2),
(95, 11, '40', 2.05),
(96, 11, '45', 1.9),
(97, 11, 'inconnue', 2.9),
(98, 13, '30', 0.47),
(99, 13, '37.5', 0.4),
(100, 14, '5', 2.12),
(101, 14, '7', 1.72),
(102, 14, '10', 1.03),
(103, 14, '15', 0.72),
(104, 14, '20', 0.55),
(105, 14, '25', 0.46),
(106, 14, '27.5', 0.42),
(107, 14, '30', 0.39),
(108, 14, '32.5', 0.35),
(109, 14, '37.5', 0.32);

-- --------------------------------------------------------

--
-- Structure de la table `wall_type`
--

CREATE TABLE IF NOT EXISTS `wall_type` (
`id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `wall_type`
--

INSERT INTO `wall_type` (`id`, `label`, `parent_id`) VALUES
(1, 'Murs en pierre de taille et moellons', NULL),
(2, 'Murs en pisé ou béton de terre stabilisé', NULL),
(3, 'Murs en pans de bois', NULL),
(4, 'Murs bois (rondins)', NULL),
(5, 'Mur bois avec remplissage tout venant', NULL),
(6, 'Murs en briques pleines simples', NULL),
(7, 'Murs en briques pleines doubles avec lame d’air', NULL),
(8, 'Murs en briques creuses', NULL),
(9, 'Murs en blocs de béton pleins', NULL),
(10, 'Murs en blocs de béton creux', NULL),
(11, 'Murs en béton banché', NULL),
(13, 'Monomur terre cuite', NULL),
(14, 'Béton cellulaire', NULL),
(21, 'Murs constitués d’un seul\r\nmatériaux', 1),
(22, 'Murs avec remplissage\r\ntout venant', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `air_space`
--
ALTER TABLE `air_space`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `basement_form`
--
ALTER TABLE `basement_form`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `basement_type`
--
ALTER TABLE `basement_type`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `carpentry_type`
--
ALTER TABLE `carpentry_type`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `construction_year`
--
ALTER TABLE `construction_year`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Index pour la table `door_type`
--
ALTER TABLE `door_type`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `energy`
--
ALTER TABLE `energy`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `glazing_type`
--
ALTER TABLE `glazing_type`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hsp`
--
ALTER TABLE `hsp`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ich`
--
ALTER TABLE `ich`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mitoyennete`
--
ALTER TABLE `mitoyennete`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`), ADD KEY `slug` (`slug`);

--
-- Index pour la table `roof_type`
--
ALTER TABLE `roof_type`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shape`
--
ALTER TABLE `shape`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ufenetres`
--
ALTER TABLE `ufenetres`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ventilation`
--
ALTER TABLE `ventilation`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wall_thickness`
--
ALTER TABLE `wall_thickness`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wall_type`
--
ALTER TABLE `wall_type`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `air_space`
--
ALTER TABLE `air_space`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `basement_form`
--
ALTER TABLE `basement_form`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `basement_type`
--
ALTER TABLE `basement_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `carpentry_type`
--
ALTER TABLE `carpentry_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `construction_year`
--
ALTER TABLE `construction_year`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `door_type`
--
ALTER TABLE `door_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `energy`
--
ALTER TABLE `energy`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `glazing_type`
--
ALTER TABLE `glazing_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `hsp`
--
ALTER TABLE `hsp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `ich`
--
ALTER TABLE `ich`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT pour la table `mitoyennete`
--
ALTER TABLE `mitoyennete`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `roof_type`
--
ALTER TABLE `roof_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `shape`
--
ALTER TABLE `shape`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `ufenetres`
--
ALTER TABLE `ufenetres`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT pour la table `ventilation`
--
ALTER TABLE `ventilation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `wall_thickness`
--
ALTER TABLE `wall_thickness`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT pour la table `wall_type`
--
ALTER TABLE `wall_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

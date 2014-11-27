-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 27 Novembre 2014 à 22:17
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
  `umur_h3` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `construction_year`
--

INSERT INTO `construction_year` (`id`, `code`, `label`, `umur_h1_joule`, `umur_h1`, `umur_h2_joule`, `umur_h2`, `umur_h3_joule`, `umur_h3`) VALUES
(1, 'before_1975', 'Avant 1975', 2.5, 2.5, 2.5, 2.5, 2.5, 2.5),
(2, 'between_1975_and_1977', 'Entre 1975 et 1977', 1, 1, 1.05, 1.05, 1.11, 1.11),
(3, 'between_1978_and_1982', 'Entre 1978 et 1982', 0.8, 1, 0.84, 0.84, 0.89, 1.11),
(4, 'between_1983_and_1988', 'Entre 1983 et 1988', 0.7, 0.8, 0.84, 0.74, 0.78, 0.89),
(5, 'between_1989_and_2000', 'Entre 1989 et 2000', 0.45, 0.5, 0.47, 0.53, 0.5, 0.56),
(6, 'after_2000', 'Après 2000', 0.4, 0.4, 0.4, 0.4, 0.47, 0.47);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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
-- Structure de la table `wall_type`
--

CREATE TABLE IF NOT EXISTS `wall_type` (
`id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `wall_type`
--

INSERT INTO `wall_type` (`id`, `code`, `label`) VALUES
(1, 'stone', 'Pierre'),
(2, 'concrete', 'Béton'),
(3, 'brick', 'Brique'),
(4, 'half_timbered', 'Pans de bois'),
(5, 'wooden_logs', 'Rondins'),
(6, 'monomur_bricks', 'Brique monomur'),
(7, 'aerated_concrete', 'Béton cellulaire'),
(8, 'wood', 'bois'),
(9, 'pvc', 'PVC'),
(10, 'metal', 'métal'),
(11, 'metal2', 'métal + rupture de pont thermique');

--
-- Index pour les tables exportées
--

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
-- Index pour la table `ventilation`
--
ALTER TABLE `ventilation`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
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
-- AUTO_INCREMENT pour la table `ventilation`
--
ALTER TABLE `ventilation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `wall_type`
--
ALTER TABLE `wall_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

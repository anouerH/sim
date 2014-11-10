-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 09 Novembre 2014 à 18:32
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
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `basement_type`
--

INSERT INTO `basement_type` (`id`, `code`, `label`) VALUES
(1, 'terre-plein', 'Terre-plein'),
(2, 'vide-sanitaire', 'Vide-sanitaire'),
(3, 'local-non-chauffe', 'Local non chauffé');

-- --------------------------------------------------------

--
-- Structure de la table `construction_year`
--

CREATE TABLE IF NOT EXISTS `construction_year` (
`id` int(11) NOT NULL,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `construction_year`
--

INSERT INTO `construction_year` (`id`, `code`, `label`) VALUES
(1, 'before_1975', 'Avant 1975'),
(2, 'between_1975_and_1977', 'Entre 1975 et 1977'),
(3, 'between_1978_and_1982', 'Entre 1978 et 1982'),
(4, 'between_1983_and_1988', 'Entre 1983 et 1988'),
(5, 'between_1989_and_2000', 'Entre 1989 et 2000'),
(6, 'after_2000', 'Après 2000');

-- --------------------------------------------------------

--
-- Structure de la table `mitoyennete`
--

CREATE TABLE IF NOT EXISTS `mitoyennete` (
`id` int(11) NOT NULL,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `mitoyennete`
--

INSERT INTO `mitoyennete` (`id`, `code`, `label`) VALUES
(1, 'individual_house', 'Indépendante'),
(2, 'short_side', 'Accolée sur 1 petit côté'),
(3, 'long_side', 'Accolée sur 1 grand côté'),
(4, '2_short_sides', 'Accolée sur 2 petits côtés'),
(5, 'value="short_and_long_sides"', 'Accolée sur 1 grand et 1 petit côtés'),
(6, '2_long_sides', 'Clear Accolée sur 2 grands côtés');

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

--
-- Index pour les tables exportées
--

--
-- Index pour la table `basement_type`
--
ALTER TABLE `basement_type`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `construction_year`
--
ALTER TABLE `construction_year`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

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
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `basement_type`
--
ALTER TABLE `basement_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `construction_year`
--
ALTER TABLE `construction_year`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

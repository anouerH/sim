-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 11, 2014 at 02:58 PM
-- Server version: 5.5.37-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simulateur`
--

-- --------------------------------------------------------

--
-- Table structure for table `basement_type`
--

CREATE TABLE IF NOT EXISTS `basement_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Type de plancher bas' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `basement_type`
--

INSERT INTO `basement_type` (`id`, `code`, `label`) VALUES
(1, 'terre-plein', 'Terre-plein'),
(2, 'vide-sanitaire', 'Vide-sanitaire'),
(3, 'local-non-chauffe', 'Local non chauffé');

-- --------------------------------------------------------

--
-- Table structure for table `carpentry_type`
--

CREATE TABLE IF NOT EXISTS `carpentry_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) NOT NULL,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `carpentry_type`
--

INSERT INTO `carpentry_type` (`id`, `code`, `label`) VALUES
(1, 'wood', 'bois'),
(2, 'pvc', 'PVC'),
(3, 'metal', 'métal'),
(4, 'metal2', 'métal+rupture de pont thermique');

-- --------------------------------------------------------

--
-- Table structure for table `construction_year`
--

CREATE TABLE IF NOT EXISTS `construction_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `construction_year`
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
-- Table structure for table `door_type`
--

CREATE TABLE IF NOT EXISTS `door_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) NOT NULL,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `glazing_type`
--

CREATE TABLE IF NOT EXISTS `glazing_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) NOT NULL,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `glazing_type`
--

INSERT INTO `glazing_type` (`id`, `code`, `label`) VALUES
(1, 'single_glazing', 'Simple'),
(2, 'overglazing', 'Survitrage'),
(3, 'double_glazing', 'Double vitrage'),
(4, 'double_glazing_vir', 'double vitrage VIR'),
(5, 'double_windows', 'Doubles fenêtres');

-- --------------------------------------------------------

--
-- Table structure for table `mitoyennete`
--

CREATE TABLE IF NOT EXISTS `mitoyennete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mitoyennete`
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
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`) VALUES
(1, 'test1', 'test1', 'test1test1test1test1test1test1test1'),
(2, 'test2', 'test2', 'test2test2test2test2test2test2test2test2test2test2'),
(3, 'aby-(-ç_ç_', 'aby-__', 'hfhhfghfhgf');

-- --------------------------------------------------------

--
-- Table structure for table `roof_type`
--

CREATE TABLE IF NOT EXISTS `roof_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roof_type`
--

INSERT INTO `roof_type` (`id`, `code`, `label`) VALUES
(1, 'roof_terrace', 'Terrasse'),
(2, 'unoccupied_attics', 'Combles perdus'),
(3, 'habitable_attics', 'Combles aménagés'),
(4, 'terrace_and_attics', 'Mixte');

-- --------------------------------------------------------

--
-- Table structure for table `shape`
--

CREATE TABLE IF NOT EXISTS `shape` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `shape`
--

INSERT INTO `shape` (`id`, `code`, `label`) VALUES
(1, 'compact', 'compacte'),
(2, 'elongated', 'Allongée'),
(3, 'complex', 'Développée');

-- --------------------------------------------------------

--
-- Table structure for table `wall_type`
--

CREATE TABLE IF NOT EXISTS `wall_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) NOT NULL,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `wall_type`
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 21 Janvier 2015 à 15:45
-- Version du serveur: 5.1.36-community-log
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `guyonv2`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `login`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(255) NOT NULL AUTO_INCREMENT,
  `icon_article` varchar(255) DEFAULT NULL,
  `icon_pj` varchar(255) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `position` varchar(25) DEFAULT NULL,
  `visible` tinyint(4) DEFAULT NULL,
  `icon_pj2` varchar(255) DEFAULT NULL,
  `icon_pj3` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `image6` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_article`, `icon_article`, `icon_pj`, `date_debut`, `date_fin`, `position`, `visible`, `icon_pj2`, `icon_pj3`, `image`, `image2`, `image3`, `image4`, `image5`, `image6`) VALUES
(1, 'icon-article-chateau-roche-guyon-JPxmS.jpg', 'L2.jpg', '0000-00-00', '0000-00-00', '1', 1, 'L1.jpg', 'L3.jpg', 'icon-article-chateau-roche-guyon-8YROs.jpg', 'icon-article-chateau-roche-guyon-d3096.jpg', 'icon-article-chateau-roche-guyon-JPxmS.jpg', 'icon-menu-chateau-roche-guyongyiPt.jpg', 'icon-menu-chateau-roche-guyon-UAzGU.jpg', 'icon-article-chateau-roche-guyon-8YROs.jpg'),
(38, 'test de', 'test de', NULL, NULL, '1', 1, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'test en', 'test en', NULL, NULL, '2', 1, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'icon-article-chateau-roche-guyon-8YROs.jpg', '', '0000-00-00', '0000-00-00', '2', 1, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'icon-article-chateau-roche-guyon-4Mh7T.jpg', '', '0000-00-00', '0000-00-00', '3', 1, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'icon-article-chateau-roche-guyon-8YROs.jpg', '', '0000-00-00', '0000-00-00', '6', 0, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'icon-menu-chateau-roche-guyon-UAzGU.jpg', '', '0000-00-00', '0000-00-00', '5', 1, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'icon-menu-chateau-roche-guyongyiPt.jpg', '', '0000-00-00', '0000-00-00', '4', 1, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'icon-article-chateau-roche-guyon-JPxmS.jpg', '', '2015-01-01', '2015-01-15', '1', 1, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'icon-menu-chateau-roche-guyon-UAzGU.jpg', '', '2015-01-01', '2015-01-08', '2', 0, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'icon-article-chateau-roche-guyon-d3096.jpg', '', '2015-01-07', '2015-01-15', '3', 1, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(49, '', '', '2015-01-07', '2015-01-07', '1', 1, '', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `edition`
--

CREATE TABLE IF NOT EXISTS `edition` (
  `id_edition` int(11) NOT NULL AUTO_INCREMENT,
  `titre_edition` varchar(255) DEFAULT NULL,
  `lien_edition` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_edition`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE IF NOT EXISTS `langue` (
  `id_langue` int(11) NOT NULL AUTO_INCREMENT,
  `nom_langue` varchar(25) DEFAULT NULL,
  `ISO` varchar(25) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_langue`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `langue`
--

INSERT INTO `langue` (`id_langue`, `nom_langue`, `ISO`, `active`) VALUES
(1, 'Francais', 'UTF-8', 1),
(2, 'Anglais', 'UTF-8', 0),
(3, 'Allemand', 'UTF-8', 0);

-- --------------------------------------------------------

--
-- Structure de la table `langue_article`
--

CREATE TABLE IF NOT EXISTS `langue_article` (
  `id_langue_article` int(255) NOT NULL AUTO_INCREMENT,
  `url_article` varchar(255) DEFAULT NULL,
  `titre_article` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soustitre_article` varchar(255) DEFAULT NULL,
  `type_evenement` varchar(255) DEFAULT NULL,
  `contenu_article` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `libelle_pj` varchar(255) DEFAULT NULL,
  `lien_pj` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `id_langue` int(11) DEFAULT NULL,
  `id_article` int(255) DEFAULT NULL,
  `lien_pj2` varchar(255) DEFAULT NULL,
  `lien_pj3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_langue_article`),
  KEY `FK_langue_article_id_langue` (`id_langue`),
  KEY `FK_langue_article_id_article` (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `langue_article`
--

INSERT INTO `langue_article` (`id_langue_article`, `url_article`, `titre_article`, `soustitre_article`, `type_evenement`, `contenu_article`, `libelle_pj`, `lien_pj`, `keywords`, `description`, `id_langue`, `id_article`, `lien_pj2`, `lien_pj3`) VALUES
(1, '			le-chateau-des-origines.html', '			Le chÃ¢teau des origines', '			Un site stratÃ©gique										', '			un type d''evenement																																																												', '<p>Le site sur lequel s''est install&eacute; le ch&acirc;teau de La Roche-Guyon est en lui-m&ecirc;me assez particulier. A cet endroit, la Seine dessine une large boucle que dominent des coteaux calcaires. Ces derniers offrent au regard un large panorama sur la vall&eacute;e. Ils permettent d''observer de loin la circulation fluviale et de la contr&ocirc;ler. La Roche-Guyon profite donc d''une position strat&eacute;gique non n&eacute;gligeable.</p>', '			Ceci est le libellÃ© de la piÃ¨ce jointe.																																																		', '', 'chateau,Roche-Guyon', 'actualités sur le château de La Roche-Guyon aujourd''hui', 1, 1, '', ''),
(29, 'test allemand', 'un article en allemand', 'test allemand', 'test allemand', 'test allemand', 'test allemand', 'test allemand', NULL, NULL, 3, 38, NULL, NULL),
(31, 'test anglais', 'un article en anglais', 'test anglais', 'test anglais', 'test anglais', 'test anglais', 'test anglais', NULL, NULL, 2, 39, NULL, NULL),
(32, '		forteresse-inexpugnable.html', '		La forteresse inexpugnable', '						', '						', '<p>Dans le cadre des affrontements entre les Normands et le royaume franc, la forteresse de La Roche-Guyon prend tout son poids. La guerre du Vexin, plus particuli&egrave;rement, souligne la n&eacute;cessit&eacute; de renforcer la fronti&egrave;re et, avec elle, le ch&acirc;teau de La Roche-Guyon. La forteresse se transforme peu &agrave; peu en ch&acirc;teau fort.<br />C''est &agrave; la fin du XII&egrave; si&egrave;cle, vers 1190, que le donjon est construit.</p>', '														', '', '', '', 1, 40, NULL, NULL),
(33, '							chateau-medieval.html', '							Du chÃ¢teau mÃ©diÃ©val au lieu de villÃ©giature', '							La Guerre de Cent Ans achevÃ©e, du chÃ¢teau de La Roche-Guton perd sa vocation militaire.														', '						test																															', '<p>Par le mariage de Marie de La Roche (fille de Guy VII) avec Bertin de Silly en 1474, le ch&acirc;teau passe dans la famille de Silly o&ugrave; il reste jusqu''en 1628.<br />C''est la famille de Silly qui transforme la forteresse m&eacute;di&eacute;vale en lieu de r&eacute;sidence habitable.</p>', '																																																																																																																			', '', '', '', 1, 41, NULL, NULL),
(34, '	', '	test d''article Ã  Ã© Ã¨ $ â‚¬ Ã§', '	test d''article Ã  Ã© Ã¨ $ â‚¬ Ã§		', '	test d''article Ã  Ã© Ã¨ $ â‚¬ Ã§		', '<p>test d''article &agrave; &eacute; &egrave; $ &euro; &ccedil;</p>', '			', '', '', '', 1, 42, NULL, NULL),
(35, '											', '											test d''article : position 4', '											test d''article : position 4																						', '											test d''article : position 4																						', '<p>Ceci est le texte de l''article en position 4.</p>', '																																																																					', '', '', '', 1, 43, NULL, NULL),
(36, '					', '					test d''article : position 5', '				test d''article : position 5											', '															', '<p>Ceci est le texte de l''article en position 5</p>', '																											', '', '', '', 1, 44, NULL, NULL),
(37, '', 'titre de l''article de test d''Ã©vÃ¨nements', 'soustitre de l''article de test d''Ã©vÃ¨nements', 'exposition', '<p>Ceci est le contenu du texte de l''article de test d''&eacute;v&egrave;nements.</p>', 'test de libellÃ©', '', '', '', 1, 46, NULL, NULL),
(38, '		', '		titre de l''article de test d''actualitÃ©', '		soustitre de l''article de test d''actualitÃ©																	', '		actualitÃ©																																				', '<p>Ceci est le contenu de l''article de test d''actualit&eacute;, du 1er au 8 janvier 2015.</p>', '						', '', '', '', 1, 47, NULL, NULL),
(39, '', 'titre de l''article de test de rendez-vous', 'soustitre de l''article de test de rendez-vous', 'rendez-vous', '<p>Ceci est le contenu de l''article de test de rendez-vous, du 8 au 15 janvier 2015.</p>', '', '', '', '', 1, 48, NULL, NULL),
(40, '', 'Rommel, projection et dÃ©bat', 'projection du film tournÃ© Ã  La Roche-Guyon', 'colloque', '<p>cufkyjvjkblmjh</p>\r\n<p>vckbkjhimn jgyv</p>', '', '', '', '', 1, 49, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `langue_livre`
--

CREATE TABLE IF NOT EXISTS `langue_livre` (
  `id_langue_livre` int(255) NOT NULL AUTO_INCREMENT,
  `titre_livre` varchar(255) DEFAULT NULL,
  `couverture_livre` varchar(255) DEFAULT NULL,
  `id_livre` int(255) DEFAULT NULL,
  `id_langue` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_langue_livre`),
  KEY `FK_langue_livre_id_livre` (`id_livre`),
  KEY `FK_langue_livre_id_langue` (`id_langue`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `langue_menu`
--

CREATE TABLE IF NOT EXISTS `langue_menu` (
  `id_langue_menu` int(11) NOT NULL AUTO_INCREMENT,
  `titre_menu` varchar(255) DEFAULT NULL,
  `id_langue` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_langue_menu`),
  KEY `FK_langue_menu_id_langue` (`id_langue`),
  KEY `FK_langue_menu_id_menu` (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `langue_menu`
--

INSERT INTO `langue_menu` (`id_langue_menu`, `titre_menu`, `id_langue`, `id_menu`) VALUES
(1, '				le domaine		', 1, 1),
(2, 'visites', 1, 2),
(3, 'evenements', 1, 3),
(4, 'professionnel', 1, 4),
(5, 'qui sommes-nous', 1, 5),
(8, 'un menu en anglais', 2, 1),
(9, 'un menu en allemand', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `langue_news`
--

CREATE TABLE IF NOT EXISTS `langue_news` (
  `id_langue_news` int(255) NOT NULL AUTO_INCREMENT,
  `contenu_news` varchar(255) DEFAULT NULL,
  `id_langue` int(11) DEFAULT NULL,
  `id_news` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_langue_news`),
  KEY `FK_langue_news_id_langue` (`id_langue`),
  KEY `FK_langue_news_id_news` (`id_news`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `langue_news`
--

INSERT INTO `langue_news` (`id_langue_news`, `contenu_news`, `id_langue`, `id_news`) VALUES
(9, 'test d''actualitÃ© 1', 1, 6),
(17, 'test d''actualitÃ© 2', 1, 14);

-- --------------------------------------------------------

--
-- Structure de la table `langue_page`
--

CREATE TABLE IF NOT EXISTS `langue_page` (
  `id_langue_page` int(255) NOT NULL AUTO_INCREMENT,
  `url_page` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `titre_page` varchar(255) DEFAULT NULL,
  `soustitre_page` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `contenu_page` text CHARACTER SET latin1,
  `keywords` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `id_page` int(255) DEFAULT NULL,
  `id_langue` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_langue_page`),
  KEY `FK_langue_page_id_page` (`id_page`),
  KEY `FK_langue_page_id_langue` (`id_langue`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Contenu de la table `langue_page`
--

INSERT INTO `langue_page` (`id_langue_page`, `url_page`, `titre_page`, `soustitre_page`, `contenu_page`, `keywords`, `description`, `id_page`, `id_langue`) VALUES
(1, 'ses-jardins.html', '				ses jardins					', '	un sous titre', '', 'chateau,guyon,jardins', 'les jardins du château de La Roche-Guyon', 1, 1),
(2, 'pratiques.html', 'pratiques', NULL, 'Tarifs', NULL, NULL, 2, 1),
(3, 'expositions.html', 'expositions', NULL, NULL, NULL, NULL, 3, 1),
(4, 'tournage-photo.html', 'tournage/photo', NULL, NULL, NULL, NULL, 4, 1),
(5, 'epcc.html', 'EPCC', NULL, NULL, NULL, NULL, 5, 1),
(6, '', 'presse', '', '', '', '', 6, 1),
(7, '', 'visites', '', '<p>ceci est un contenu</p>', '', '', 7, 1),
(8, NULL, 'une page en allemand', NULL, 'un contenu en allemand', NULL, NULL, 1, 3),
(9, NULL, 'une page en anglais', NULL, NULL, NULL, NULL, 1, 2),
(11, '', 'ses batiments', '', '', '', '', 9, 1),
(13, '', 'economie & social', '', '', '', '', 11, 1),
(14, '', '								son histoire										', '		', '', '', '', 12, 1),
(15, '', 'le chateau aujourd''hui', '', '', '', '', 13, 1),
(16, '', 'visite virtuelle', '', '', '', '', 14, 1),
(17, '', 'groupe & collectivitÃ©', '', '', '', '', 15, 1),
(18, '', 'boutique', '', '', '', '', 16, 1),
(19, '', 'Ã©ditions', '', '', '', '', 17, 1),
(20, '', 'jeux', '', '', '', '', 18, 1),
(21, '', '				calendrier					', '	', '', '', '', 19, 1),
(22, '', 'actualitÃ©', '', '', '', '', 20, 1),
(23, '', 'les rendez-vous', '', '', '', '', 21, 1),
(24, '', 'hors les murs', '', '', '', '', 22, 1),
(25, '', 'rÃ©sidences', '', '', '', '', 23, 1),
(26, '', 'plaisir(s)', '', '', '', '', 24, 1),
(27, '', 'archives', '', '', '', '', 25, 1),
(28, '', 'location d''espace', '', '', '', '', 26, 1),
(29, '', 'marchÃ© public', '', '', '', '', 27, 1),
(30, '', 'mÃ©cÃ©nat', '', '', '', '', 28, 1),
(31, '', 'tour opÃ©rateur', '', '', '', '', 29, 1),
(32, '', 'institution', '', '', '', '', 30, 1),
(33, '', 'Ã©quipe', '', '', '', '', 31, 1),
(34, '', 'partenaires', '', '', '', '', 32, 1),
(35, '', 'rapport', '', '', '', '', 33, 1),
(36, '', 'projet culturel', '', '', '', '', 34, 1);

-- --------------------------------------------------------

--
-- Structure de la table `langue_revu`
--

CREATE TABLE IF NOT EXISTS `langue_revu` (
  `id_langue_revu` int(255) NOT NULL AUTO_INCREMENT,
  `lien_revu` varchar(255) DEFAULT NULL,
  `id_revu` int(255) DEFAULT NULL,
  `id_langue` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_langue_revu`),
  KEY `FK_langue_revu_id_revu` (`id_revu`),
  KEY `FK_langue_revu_id_langue` (`id_langue`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE IF NOT EXISTS `livre` (
  `id_livre` int(255) NOT NULL AUTO_INCREMENT,
  `image_livre` varchar(255) DEFAULT NULL,
  `auteur_livre` varchar(255) DEFAULT NULL,
  `ordre` tinyint(4) DEFAULT NULL,
  `id_page` int(11) DEFAULT NULL,
  `id_edition` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_livre`),
  KEY `FK_livre_id_page` (`id_page`),
  KEY `FK_livre_id_edition` (`id_edition`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) DEFAULT NULL,
  `background` varchar(255) DEFAULT NULL,
  `color` varchar(7) DEFAULT NULL,
  `ordre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `icon`, `background`, `color`, `ordre`) VALUES
(1, 'icon-menu-chateau-roche-guyon-UAzGU.jpg', 'background-menu-chateau-roche-guyon-SPcuO.jpg', '465f6b', 1),
(2, 'icon-menu-chateau-roche-guyon-d3096.jpg', 'background-menu-chateau-roche-guyon-qBsxN.jpg', '68baa8', 2),
(3, 'icon-menu-chateau-roche-guyon-tN3oY.jpg', 'background-menu-chateau-roche-guyon-jHV38.jpg', 'dec84d', 3),
(4, 'icon-menu-chateau-roche-guyon-8YROs.jpg', 'background-menu-chateau-roche-guyon-cVe09.jpg', 'db915c', 4),
(5, 'icon-menu-chateau-roche-guyon-cyzTQ.jpg', 'background-menu-chateau-roche-guyon-b9AzP.jpg', 'db5a5a', 5),
(6, 'test en', 'test en', NULL, 3),
(7, 'test de', 'test de', NULL, 4);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(255) NOT NULL AUTO_INCREMENT,
  `visible` int(11) DEFAULT NULL,
  `ordre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id_news`, `visible`, `ordre`) VALUES
(6, 1, 1),
(14, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id_page` int(255) NOT NULL AUTO_INCREMENT,
  `visible` int(10) DEFAULT NULL,
  `ordre` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_page`),
  KEY `FK_page_id_menu` (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Contenu de la table `page`
--

INSERT INTO `page` (`id_page`, `visible`, `ordre`, `id_menu`) VALUES
(1, 1, 4, 1),
(2, 1, 1, 2),
(3, 1, 3, 3),
(4, 1, 5, 4),
(5, 1, 3, 5),
(6, 1, 1, 4),
(7, 1, 2, 2),
(9, 1, 3, 1),
(11, 1, 5, 1),
(12, 1, 1, 1),
(13, 1, 2, 1),
(14, 1, 3, 2),
(15, 1, 4, 2),
(16, 1, 5, 2),
(17, 1, 6, 2),
(18, 1, 7, 2),
(19, 0, 1, 3),
(20, 1, 2, 3),
(21, 1, 4, 3),
(22, 1, 5, 3),
(23, 1, 6, 3),
(24, 1, 7, 3),
(25, 1, 8, 3),
(26, 1, 1, 4),
(27, 1, 3, 4),
(28, 1, 4, 4),
(29, 1, 6, 4),
(30, 1, 1, 5),
(31, 1, 2, 5),
(32, 1, 4, 5),
(33, 1, 5, 5),
(34, 1, 6, 5);

-- --------------------------------------------------------

--
-- Structure de la table `page_article`
--

CREATE TABLE IF NOT EXISTS `page_article` (
  `id_lien` int(255) NOT NULL AUTO_INCREMENT,
  `id_page` int(11) DEFAULT NULL,
  `id_article` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lien`),
  KEY `FK_page_article_id_page` (`id_page`),
  KEY `FK_page_article_id_article` (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `page_article`
--

INSERT INTO `page_article` (`id_lien`, `id_page`, `id_article`) VALUES
(1, 1, 1),
(4, 1, 39),
(5, 1, 38),
(6, 1, 40),
(7, 12, 41),
(8, 12, 1),
(9, 12, 40),
(10, 12, 43),
(11, 12, 44),
(12, 3, 46),
(13, 20, 47),
(14, 21, 48),
(15, 12, 42),
(16, 21, 49),
(17, 16, 49);

-- --------------------------------------------------------

--
-- Structure de la table `revu`
--

CREATE TABLE IF NOT EXISTS `revu` (
  `id_revu` int(255) NOT NULL AUTO_INCREMENT,
  `image_revu` varchar(255) DEFAULT NULL,
  `date_revu` date DEFAULT NULL,
  PRIMARY KEY (`id_revu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(255) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `ordre` int(11) DEFAULT NULL,
  `visible` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `slider`
--

INSERT INTO `slider` (`id_slider`, `image`, `ordre`, `visible`) VALUES
(2, 'slide-chateau-roche-guyon-8DuST.jpg', 2, 1),
(3, 'slide-chateau-roche-guyon-UNeKD.jpg', 1, 1),
(5, 'slide-chateau-roche-guyon-awkZn.jpg', 3, 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `langue_article`
--
ALTER TABLE `langue_article`
  ADD CONSTRAINT `FK_langue_article_id_article` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`),
  ADD CONSTRAINT `FK_langue_article_id_langue` FOREIGN KEY (`id_langue`) REFERENCES `langue` (`id_langue`);

--
-- Contraintes pour la table `langue_livre`
--
ALTER TABLE `langue_livre`
  ADD CONSTRAINT `FK_langue_livre_id_langue` FOREIGN KEY (`id_langue`) REFERENCES `langue` (`id_langue`),
  ADD CONSTRAINT `FK_langue_livre_id_livre` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id_livre`);

--
-- Contraintes pour la table `langue_menu`
--
ALTER TABLE `langue_menu`
  ADD CONSTRAINT `FK_langue_menu_id_langue` FOREIGN KEY (`id_langue`) REFERENCES `langue` (`id_langue`),
  ADD CONSTRAINT `FK_langue_menu_id_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Contraintes pour la table `langue_news`
--
ALTER TABLE `langue_news`
  ADD CONSTRAINT `FK_langue_news_id_langue` FOREIGN KEY (`id_langue`) REFERENCES `langue` (`id_langue`),
  ADD CONSTRAINT `FK_langue_news_id_news` FOREIGN KEY (`id_news`) REFERENCES `news` (`id_news`);

--
-- Contraintes pour la table `langue_page`
--
ALTER TABLE `langue_page`
  ADD CONSTRAINT `FK_langue_page_id_langue` FOREIGN KEY (`id_langue`) REFERENCES `langue` (`id_langue`),
  ADD CONSTRAINT `FK_langue_page_id_page` FOREIGN KEY (`id_page`) REFERENCES `page` (`id_page`);

--
-- Contraintes pour la table `langue_revu`
--
ALTER TABLE `langue_revu`
  ADD CONSTRAINT `FK_langue_revu_id_langue` FOREIGN KEY (`id_langue`) REFERENCES `langue` (`id_langue`),
  ADD CONSTRAINT `FK_langue_revu_id_revu` FOREIGN KEY (`id_revu`) REFERENCES `revu` (`id_revu`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `FK_livre_id_edition` FOREIGN KEY (`id_edition`) REFERENCES `edition` (`id_edition`),
  ADD CONSTRAINT `FK_livre_id_page` FOREIGN KEY (`id_page`) REFERENCES `page` (`id_page`);

--
-- Contraintes pour la table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `FK_page_id_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Contraintes pour la table `page_article`
--
ALTER TABLE `page_article`
  ADD CONSTRAINT `FK_page_article_id_article` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`),
  ADD CONSTRAINT `FK_page_article_id_page` FOREIGN KEY (`id_page`) REFERENCES `page` (`id_page`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

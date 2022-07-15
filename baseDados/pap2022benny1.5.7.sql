/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50736
Source Host           : localhost:3306
Source Database       : pap2022benny

Target Server Type    : MYSQL
Target Server Version : 50736
File Encoding         : 65001

Date: 2022-07-15 15:56:04
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `clubes`
-- ----------------------------
DROP TABLE IF EXISTS `clubes`;
CREATE TABLE `clubes` (
  `clubeId` int(11) NOT NULL AUTO_INCREMENT,
  `clubeNome` varchar(45) NOT NULL,
  `clubeSobrenome` varchar(45) NOT NULL,
  `clubeLogoURL` varchar(255) NOT NULL,
  `clubeConferencia` enum('west','east') NOT NULL DEFAULT 'west',
  PRIMARY KEY (`clubeId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of clubes
-- ----------------------------
INSERT INTO clubes VALUES ('1', 'Chicago', 'Bulls', 'extra-images/chicagologo.svg', 'east');
INSERT INTO clubes VALUES ('2', 'Boston', 'Celtics', 'extra-images/bostonlogo.svg', 'east');
INSERT INTO clubes VALUES ('5', 'Miami', 'Heat', 'extra-images/miamilogo.svg', 'east');
INSERT INTO clubes VALUES ('6', 'Memphis', 'Grizzlies', 'extra-images/Memphislogo.svg', 'west');
INSERT INTO clubes VALUES ('7', 'Milwaukee', 'Bucks', 'clubs/milwaukeelogo.svg', 'east');
INSERT INTO clubes VALUES ('8', 'Philadelphia', '76ers', 'clubs/philadelphialogo.svg', 'east');
INSERT INTO clubes VALUES ('9', 'Toronto', 'Raptors', 'clubs/torontologo.svg', 'east');
INSERT INTO clubes VALUES ('11', 'Atlanta ', 'Hawks', 'clubs/Atlantalogo.svg', 'east');
INSERT INTO clubes VALUES ('12', 'Cleveland', 'Cavaliers', 'clubs/clevelandlogo.svg', 'east');
INSERT INTO clubes VALUES ('13', 'Charlotte', 'Hornets', 'clubs/Charlottelogo.svg', 'east');
INSERT INTO clubes VALUES ('14', 'New York', 'Knicks', 'clubs/Newyorklogo.svg', 'east');
INSERT INTO clubes VALUES ('15', 'Washington', 'Wizards', 'clubs/Wizardlogo.svg', 'east');
INSERT INTO clubes VALUES ('16', 'Indiana ', 'Pacers', 'clubs/Indianalogo.svg', 'east');
INSERT INTO clubes VALUES ('17', 'Detroit', 'Pistons', 'clubs/Detroitlogo.svg', 'east');
INSERT INTO clubes VALUES ('18', 'Orlando', 'Magic', 'clubs/Magiclogo.svg', 'east');
INSERT INTO clubes VALUES ('19', 'Phoenix', 'Suns', 'clubs/sunslogo.svg', 'west');
INSERT INTO clubes VALUES ('20', 'Golden State', 'Warriors', 'clubs/Warriorslogo.svg', 'west');
INSERT INTO clubes VALUES ('21', 'Dallas', 'Mavericks', 'clubs/dallaslogo.svg', 'west');
INSERT INTO clubes VALUES ('22', 'Utah', 'Jazz', 'clubs/utahlogo.svg', 'west');
INSERT INTO clubes VALUES ('23', 'Denver', 'Nuggets', 'clubs/denverlogo.svg', 'west');
INSERT INTO clubes VALUES ('24', 'Minnesota', 'Timberwolves', 'clubs/minesotalogo.svg', 'west');
INSERT INTO clubes VALUES ('25', 'New orleans', 'Pelicans', 'clubs/pelicans_primary_logo.svg', 'west');
INSERT INTO clubes VALUES ('26', 'Los angeles', 'Clippers', 'clubs/Clipperslogo.svg', 'west');
INSERT INTO clubes VALUES ('27', 'San Antonio', 'Spurs', 'clubs/Spurslogo.svg', 'west');
INSERT INTO clubes VALUES ('28', 'Los angeles', 'Lakers', 'clubs/Lakerslogo.svg', 'west');
INSERT INTO clubes VALUES ('29', 'Sacramento', 'Kings', 'clubs/Kingslogo.svg', 'west');
INSERT INTO clubes VALUES ('30', 'Portland Trail', 'Blazers', 'clubs/Portlandlogo.svg', 'west');
INSERT INTO clubes VALUES ('31', 'Oklahoma City ', 'Thunder', 'clubs/Oklahomalogo.svg', 'west');
INSERT INTO clubes VALUES ('32', 'Houston', 'Rockets', 'clubs/Houstonlogo.svg', 'west');
INSERT INTO clubes VALUES ('33', 'Brooklyn', 'Nets', 'clubs/brooklynlogo.svg', 'east');

-- ----------------------------
-- Table structure for `jogos`
-- ----------------------------
DROP TABLE IF EXISTS `jogos`;
CREATE TABLE `jogos` (
  `jogoId` int(11) NOT NULL AUTO_INCREMENT,
  `jogoData` date NOT NULL,
  `jogoResultadoCasa` int(11) NOT NULL DEFAULT '0',
  `jogoResultadoFora` int(11) NOT NULL DEFAULT '0',
  `jogoCasaClubeId` int(11) NOT NULL,
  `jogoForaClubeId` int(11) NOT NULL,
  PRIMARY KEY (`jogoId`) USING BTREE,
  KEY `fk_jogos_clubes_idx` (`jogoCasaClubeId`) USING BTREE,
  KEY `fk_jogos_clubes1_idx` (`jogoForaClubeId`) USING BTREE,
  CONSTRAINT `fk_jogos_clubes` FOREIGN KEY (`jogoCasaClubeId`) REFERENCES `clubes` (`clubeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogos_clubes1` FOREIGN KEY (`jogoForaClubeId`) REFERENCES `clubes` (`clubeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of jogos
-- ----------------------------
INSERT INTO jogos VALUES ('11', '2021-10-03', '123', '97', '33', '28');
INSERT INTO jogos VALUES ('13', '2021-10-04', '107', '123', '8', '9');
INSERT INTO jogos VALUES ('14', '2021-10-04', '97', '98', '18', '2');
INSERT INTO jogos VALUES ('15', '2021-10-05', '99', '125', '11', '5');
INSERT INTO jogos VALUES ('16', '2021-10-05', '114', '117', '25', '24');
INSERT INTO jogos VALUES ('17', '2021-10-05', '113', '97', '13', '31');
INSERT INTO jogos VALUES ('18', '2021-10-05', '85', '111', '22', '27');
INSERT INTO jogos VALUES ('19', '2021-10-05', '104', '125', '16', '14');
INSERT INTO jogos VALUES ('20', '2021-10-06', '105', '117', '28', '19');
INSERT INTO jogos VALUES ('21', '2021-10-06', '105', '115', '27', '17');
INSERT INTO jogos VALUES ('22', '2021-10-06', '99', '96', '12', '11');
INSERT INTO jogos VALUES ('23', '2021-10-06', '86', '104', '18', '25');
INSERT INTO jogos VALUES ('24', '2021-10-06', '116', '118', '23', '20');
INSERT INTO jogos VALUES ('25', '2021-10-06', '113', '98', '29', '26');
INSERT INTO jogos VALUES ('26', '2021-10-07', '128', '98', '6', '13');
INSERT INTO jogos VALUES ('27', '2021-10-07', '118', '125', '9', '8');
INSERT INTO jogos VALUES ('28', '0221-10-07', '113', '106', '5', '32');
INSERT INTO jogos VALUES ('29', '2021-10-08', '109', '100', '16', '12');
INSERT INTO jogos VALUES ('30', '2021-10-08', '115', '119', '7', '33');
INSERT INTO jogos VALUES ('31', '2021-10-08', '85', '121', '25', '1');
INSERT INTO jogos VALUES ('32', '2021-10-08', '114', '122', '26', '21');
INSERT INTO jogos VALUES ('33', '2021-10-08', '109', '105', '5', '27');
INSERT INTO jogos VALUES ('34', '2021-10-08', '114', '121', '28', '20');
INSERT INTO jogos VALUES ('35', '2021-10-09', '111', '113', '9', '2');
INSERT INTO jogos VALUES ('36', '2021-10-09', '117', '99', '14', '15');
INSERT INTO jogos VALUES ('37', '2021-10-09', '91', '87', '11', '6');
INSERT INTO jogos VALUES ('38', '2021-10-11', '92', '107', '32', '9');
INSERT INTO jogos VALUES ('39', '2021-10-11', '103', '104', '1', '5');
INSERT INTO jogos VALUES ('40', '2021-10-11', '104', '115', '33', '8');
INSERT INTO jogos VALUES ('41', '2021-10-11', '92', '127', '17', '6');
INSERT INTO jogos VALUES ('42', '2021-10-11', '96', '127', '25', '22');
INSERT INTO jogos VALUES ('43', '2021-10-11', '107', '93', '29', '30');
INSERT INTO jogos VALUES ('44', '2021-10-11', '128', '100', '24', '26');
INSERT INTO jogos VALUES ('45', '2021-10-12', '113', '108', '9', '15');
INSERT INTO jogos VALUES ('46', '2021-10-12', '111', '99', '20', '28');
INSERT INTO jogos VALUES ('47', '2021-10-13', '74', '119', '9', '19');
INSERT INTO jogos VALUES ('48', '2021-10-13', '127', '59', '21', '13');
INSERT INTO jogos VALUES ('49', '2021-10-13', '107', '109', '6', '16');
INSERT INTO jogos VALUES ('50', '2021-10-13', '120', '103', '2', '18');
INSERT INTO jogos VALUES ('51', '2021-10-13', '100', '108', '17', '14');
INSERT INTO jogos VALUES ('52', '2021-10-13', '120', '124', '7', '22');
INSERT INTO jogos VALUES ('53', '2021-10-14', '101', '107', '24', '33');
INSERT INTO jogos VALUES ('55', '2021-10-14', '113', '107', '23', '31');
INSERT INTO jogos VALUES ('56', '2021-10-14', '112', '116', '28', '29');
INSERT INTO jogos VALUES ('57', '2021-10-15', '108', '112', '2', '8');
INSERT INTO jogos VALUES ('58', '2021-10-15', '110', '94', '12', '16');
INSERT INTO jogos VALUES ('59', '2021-10-15', '113', '115', '15', '14');
INSERT INTO jogos VALUES ('60', '2021-10-15', '105', '118', '6', '1');
INSERT INTO jogos VALUES ('61', '2021-10-15', '114', '103', '21', '7');
INSERT INTO jogos VALUES ('62', '2021-10-15', '98', '126', '32', '27');
INSERT INTO jogos VALUES ('63', '2021-10-15', '97', '119', '30', '20');
INSERT INTO jogos VALUES ('64', '2021-10-19', '104', '127', '33', '7');
INSERT INTO jogos VALUES ('65', '2021-10-19', '121', '114', '20', '28');
INSERT INTO jogos VALUES ('66', '2021-10-20', '122', '123', '16', '1');
INSERT INTO jogos VALUES ('67', '2021-10-20', '94', '88', '1', '17');
INSERT INTO jogos VALUES ('68', '2021-10-20', '134', '138', '2', '14');
INSERT INTO jogos VALUES ('69', '2021-10-20', '98', '83', '15', '9');
INSERT INTO jogos VALUES ('70', '2021-10-21', '87', '113', '21', '11');
INSERT INTO jogos VALUES ('71', '2021-10-21', '95', '137', '7', '5');
INSERT INTO jogos VALUES ('72', '2021-10-21', '113', '116', '26', '20');
INSERT INTO jogos VALUES ('73', '2021-10-22', '123', '122', '13', '12');

-- ----------------------------
-- Table structure for `noticias`
-- ----------------------------
DROP TABLE IF EXISTS `noticias`;
CREATE TABLE `noticias` (
  `noticiaId` int(11) NOT NULL AUTO_INCREMENT,
  `noticiaTitulo` varchar(255) NOT NULL,
  `noticiaData` date NOT NULL,
  `noticiaImagemURL` varchar(255) NOT NULL,
  `noticiaResumo` text NOT NULL,
  `noticiaCorpo` text NOT NULL,
  PRIMARY KEY (`noticiaId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of noticias
-- ----------------------------
INSERT INTO noticias VALUES ('3', 'curry mvp das finais 2022', '2022-06-17', 'imagesNews/curryMvp.jpg', 'Finale NBA 2022 : Golden State sacrÃ© champion pour la septiÃ¨me fois, Stephen Curry dÃ©signÃ© MVP', '<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>&nbsp;</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>&nbsp;</p>');

-- ----------------------------
-- Table structure for `parciais`
-- ----------------------------
DROP TABLE IF EXISTS `parciais`;
CREATE TABLE `parciais` (
  `parcialId` int(11) NOT NULL AUTO_INCREMENT,
  `parcialQuarto` enum('q1','q2','q3','q4') NOT NULL DEFAULT 'q1',
  `parcialCasaPontos` int(11) NOT NULL DEFAULT '0',
  `parcialForaPontos` int(11) NOT NULL DEFAULT '0',
  `parcialJogoId` int(11) NOT NULL,
  PRIMARY KEY (`parcialId`) USING BTREE,
  KEY `fk_parciais_jogos1_idx` (`parcialJogoId`) USING BTREE,
  CONSTRAINT `fk_parciais_jogos1` FOREIGN KEY (`parcialJogoId`) REFERENCES `jogos` (`jogoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=265 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of parciais
-- ----------------------------
INSERT INTO parciais VALUES ('13', 'q1', '25', '19', '11');
INSERT INTO parciais VALUES ('14', 'q2', '32', '30', '11');
INSERT INTO parciais VALUES ('15', 'q3', '27', '32', '11');
INSERT INTO parciais VALUES ('16', 'q4', '39', '16', '11');
INSERT INTO parciais VALUES ('21', 'q1', '25', '28', '13');
INSERT INTO parciais VALUES ('22', 'q2', '29', '39', '13');
INSERT INTO parciais VALUES ('23', 'q3', '23', '33', '13');
INSERT INTO parciais VALUES ('24', 'q4', '30', '23', '13');
INSERT INTO parciais VALUES ('25', 'q1', '20', '21', '14');
INSERT INTO parciais VALUES ('26', 'q2', '32', '29', '14');
INSERT INTO parciais VALUES ('27', 'q3', '24', '21', '14');
INSERT INTO parciais VALUES ('28', 'q4', '21', '27', '14');
INSERT INTO parciais VALUES ('29', 'q1', '32', '33', '15');
INSERT INTO parciais VALUES ('30', 'q2', '26', '41', '15');
INSERT INTO parciais VALUES ('31', 'q3', '24', '25', '15');
INSERT INTO parciais VALUES ('32', 'q4', '17', '26', '15');
INSERT INTO parciais VALUES ('33', 'q1', '28', '25', '16');
INSERT INTO parciais VALUES ('34', 'q2', '17', '40', '16');
INSERT INTO parciais VALUES ('35', 'q3', '33', '29', '16');
INSERT INTO parciais VALUES ('36', 'q4', '36', '23', '16');
INSERT INTO parciais VALUES ('37', 'q1', '34', '18', '17');
INSERT INTO parciais VALUES ('38', 'q2', '33', '27', '17');
INSERT INTO parciais VALUES ('39', 'q3', '24', '26', '17');
INSERT INTO parciais VALUES ('40', 'q4', '22', '26', '17');
INSERT INTO parciais VALUES ('41', 'q1', '18', '24', '18');
INSERT INTO parciais VALUES ('42', 'q2', '20', '25', '18');
INSERT INTO parciais VALUES ('43', 'q3', '23', '38', '18');
INSERT INTO parciais VALUES ('44', 'q4', '24', '24', '18');
INSERT INTO parciais VALUES ('45', 'q1', '26', '36', '19');
INSERT INTO parciais VALUES ('46', 'q2', '29', '31', '19');
INSERT INTO parciais VALUES ('47', 'q3', '25', '34', '19');
INSERT INTO parciais VALUES ('48', 'q4', '24', '24', '19');
INSERT INTO parciais VALUES ('49', 'q1', '21', '27', '20');
INSERT INTO parciais VALUES ('50', 'q2', '24', '35', '20');
INSERT INTO parciais VALUES ('51', 'q3', '29', '40', '20');
INSERT INTO parciais VALUES ('52', 'q4', '31', '15', '20');
INSERT INTO parciais VALUES ('53', 'q1', '22', '39', '21');
INSERT INTO parciais VALUES ('54', 'q2', '29', '15', '21');
INSERT INTO parciais VALUES ('55', 'q3', '25', '30', '21');
INSERT INTO parciais VALUES ('56', 'q4', '29', '31', '21');
INSERT INTO parciais VALUES ('57', 'q1', '21', '19', '22');
INSERT INTO parciais VALUES ('58', 'q2', '25', '22', '22');
INSERT INTO parciais VALUES ('59', 'q3', '22', '27', '22');
INSERT INTO parciais VALUES ('60', 'q4', '31', '28', '22');
INSERT INTO parciais VALUES ('61', 'q1', '26', '18', '23');
INSERT INTO parciais VALUES ('62', 'q2', '25', '34', '23');
INSERT INTO parciais VALUES ('63', 'q3', '17', '20', '23');
INSERT INTO parciais VALUES ('64', 'q4', '18', '32', '23');
INSERT INTO parciais VALUES ('65', 'q1', '39', '26', '24');
INSERT INTO parciais VALUES ('66', 'q2', '23', '37', '24');
INSERT INTO parciais VALUES ('67', 'q3', '27', '21', '24');
INSERT INTO parciais VALUES ('68', 'q4', '27', '34', '24');
INSERT INTO parciais VALUES ('69', 'q1', '28', '22', '25');
INSERT INTO parciais VALUES ('70', 'q2', '23', '29', '25');
INSERT INTO parciais VALUES ('71', 'q3', '38', '17', '25');
INSERT INTO parciais VALUES ('72', 'q4', '24', '30', '25');
INSERT INTO parciais VALUES ('73', 'q1', '31', '19', '26');
INSERT INTO parciais VALUES ('74', 'q2', '42', '24', '26');
INSERT INTO parciais VALUES ('75', 'q3', '28', '27', '26');
INSERT INTO parciais VALUES ('76', 'q4', '27', '28', '26');
INSERT INTO parciais VALUES ('77', 'q1', '27', '27', '27');
INSERT INTO parciais VALUES ('78', 'q2', '33', '44', '27');
INSERT INTO parciais VALUES ('79', 'q3', '25', '27', '27');
INSERT INTO parciais VALUES ('80', 'q4', '33', '27', '27');
INSERT INTO parciais VALUES ('81', 'q1', '34', '26', '28');
INSERT INTO parciais VALUES ('82', 'q2', '28', '22', '28');
INSERT INTO parciais VALUES ('83', 'q3', '29', '22', '28');
INSERT INTO parciais VALUES ('84', 'q4', '22', '36', '28');
INSERT INTO parciais VALUES ('85', 'q1', '32', '29', '29');
INSERT INTO parciais VALUES ('86', 'q2', '31', '30', '29');
INSERT INTO parciais VALUES ('87', 'q3', '23', '16', '29');
INSERT INTO parciais VALUES ('88', 'q4', '23', '25', '29');
INSERT INTO parciais VALUES ('89', 'q1', '26', '32', '30');
INSERT INTO parciais VALUES ('90', 'q2', '34', '24', '30');
INSERT INTO parciais VALUES ('91', 'q3', '28', '33', '30');
INSERT INTO parciais VALUES ('92', 'q4', '27', '30', '30');
INSERT INTO parciais VALUES ('93', 'q1', '17', '30', '31');
INSERT INTO parciais VALUES ('94', 'q2', '21', '33', '31');
INSERT INTO parciais VALUES ('95', 'q3', '19', '33', '31');
INSERT INTO parciais VALUES ('96', 'q4', '28', '25', '31');
INSERT INTO parciais VALUES ('97', 'q1', '31', '30', '32');
INSERT INTO parciais VALUES ('98', 'q2', '25', '30', '32');
INSERT INTO parciais VALUES ('99', 'q3', '41', '31', '32');
INSERT INTO parciais VALUES ('100', 'q4', '17', '31', '32');
INSERT INTO parciais VALUES ('101', 'q1', '24', '17', '33');
INSERT INTO parciais VALUES ('102', 'q2', '30', '28', '33');
INSERT INTO parciais VALUES ('103', 'q3', '24', '32', '33');
INSERT INTO parciais VALUES ('104', 'q4', '31', '28', '33');
INSERT INTO parciais VALUES ('105', 'q1', '25', '21', '34');
INSERT INTO parciais VALUES ('106', 'q2', '24', '38', '34');
INSERT INTO parciais VALUES ('107', 'q3', '28', '32', '34');
INSERT INTO parciais VALUES ('108', 'q4', '37', '30', '34');
INSERT INTO parciais VALUES ('109', 'q1', '16', '31', '35');
INSERT INTO parciais VALUES ('110', 'q2', '43', '26', '35');
INSERT INTO parciais VALUES ('111', 'q3', '27', '28', '35');
INSERT INTO parciais VALUES ('112', 'q4', '25', '28', '35');
INSERT INTO parciais VALUES ('113', 'q1', '35', '30', '36');
INSERT INTO parciais VALUES ('114', 'q2', '24', '25', '36');
INSERT INTO parciais VALUES ('115', 'q3', '36', '21', '36');
INSERT INTO parciais VALUES ('116', 'q4', '22', '23', '36');
INSERT INTO parciais VALUES ('117', 'q1', '21', '22', '37');
INSERT INTO parciais VALUES ('118', 'q2', '16', '18', '37');
INSERT INTO parciais VALUES ('119', 'q3', '27', '24', '37');
INSERT INTO parciais VALUES ('120', 'q4', '27', '23', '37');
INSERT INTO parciais VALUES ('121', 'q1', '19', '28', '38');
INSERT INTO parciais VALUES ('122', 'q2', '19', '29', '38');
INSERT INTO parciais VALUES ('123', 'q3', '26', '31', '38');
INSERT INTO parciais VALUES ('124', 'q4', '28', '19', '38');
INSERT INTO parciais VALUES ('125', 'q1', '24', '27', '39');
INSERT INTO parciais VALUES ('126', 'q2', '29', '20', '39');
INSERT INTO parciais VALUES ('127', 'q3', '25', '30', '39');
INSERT INTO parciais VALUES ('128', 'q4', '25', '27', '39');
INSERT INTO parciais VALUES ('129', 'q1', '25', '37', '40');
INSERT INTO parciais VALUES ('130', 'q2', '24', '31', '40');
INSERT INTO parciais VALUES ('131', 'q3', '24', '32', '40');
INSERT INTO parciais VALUES ('132', 'q4', '31', '15', '40');
INSERT INTO parciais VALUES ('133', 'q1', '27', '34', '41');
INSERT INTO parciais VALUES ('134', 'q2', '19', '36', '41');
INSERT INTO parciais VALUES ('135', 'q3', '28', '29', '41');
INSERT INTO parciais VALUES ('136', 'q4', '18', '28', '41');
INSERT INTO parciais VALUES ('137', 'q1', '22', '28', '42');
INSERT INTO parciais VALUES ('138', 'q2', '24', '35', '42');
INSERT INTO parciais VALUES ('139', 'q3', '19', '32', '42');
INSERT INTO parciais VALUES ('140', 'q4', '31', '32', '42');
INSERT INTO parciais VALUES ('141', 'q1', '25', '17', '43');
INSERT INTO parciais VALUES ('142', 'q2', '30', '31', '43');
INSERT INTO parciais VALUES ('143', 'q3', '26', '23', '43');
INSERT INTO parciais VALUES ('144', 'q4', '26', '22', '43');
INSERT INTO parciais VALUES ('145', 'q1', '27', '30', '44');
INSERT INTO parciais VALUES ('146', 'q2', '40', '27', '44');
INSERT INTO parciais VALUES ('147', 'q3', '29', '22', '44');
INSERT INTO parciais VALUES ('148', 'q4', '32', '21', '44');
INSERT INTO parciais VALUES ('149', 'q1', '26', '30', '45');
INSERT INTO parciais VALUES ('150', 'q2', '32', '28', '45');
INSERT INTO parciais VALUES ('151', 'q3', '23', '31', '45');
INSERT INTO parciais VALUES ('152', 'q4', '32', '19', '45');
INSERT INTO parciais VALUES ('153', 'q1', '24', '32', '46');
INSERT INTO parciais VALUES ('154', 'q2', '29', '23', '46');
INSERT INTO parciais VALUES ('155', 'q3', '32', '29', '46');
INSERT INTO parciais VALUES ('156', 'q4', '26', '15', '46');
INSERT INTO parciais VALUES ('157', 'q1', '11', '23', '47');
INSERT INTO parciais VALUES ('158', 'q2', '27', '36', '47');
INSERT INTO parciais VALUES ('159', 'q3', '22', '34', '47');
INSERT INTO parciais VALUES ('160', 'q4', '14', '26', '47');
INSERT INTO parciais VALUES ('161', 'q1', '24', '17', '48');
INSERT INTO parciais VALUES ('162', 'q2', '37', '13', '48');
INSERT INTO parciais VALUES ('163', 'q3', '30', '11', '48');
INSERT INTO parciais VALUES ('164', 'q4', '36', '18', '48');
INSERT INTO parciais VALUES ('165', 'q1', '22', '28', '49');
INSERT INTO parciais VALUES ('166', 'q2', '35', '24', '49');
INSERT INTO parciais VALUES ('167', 'q3', '33', '32', '49');
INSERT INTO parciais VALUES ('168', 'q4', '17', '25', '49');
INSERT INTO parciais VALUES ('169', 'q1', '26', '24', '50');
INSERT INTO parciais VALUES ('170', 'q2', '30', '30', '50');
INSERT INTO parciais VALUES ('171', 'q3', '32', '19', '50');
INSERT INTO parciais VALUES ('172', 'q4', '32', '30', '50');
INSERT INTO parciais VALUES ('173', 'q1', '26', '20', '51');
INSERT INTO parciais VALUES ('174', 'q2', '30', '32', '51');
INSERT INTO parciais VALUES ('175', 'q3', '21', '30', '51');
INSERT INTO parciais VALUES ('176', 'q4', '23', '26', '51');
INSERT INTO parciais VALUES ('177', 'q1', '30', '35', '52');
INSERT INTO parciais VALUES ('178', 'q2', '31', '28', '52');
INSERT INTO parciais VALUES ('179', 'q3', '32', '32', '52');
INSERT INTO parciais VALUES ('180', 'q4', '27', '29', '52');
INSERT INTO parciais VALUES ('181', 'q1', '30', '27', '53');
INSERT INTO parciais VALUES ('182', 'q2', '19', '30', '53');
INSERT INTO parciais VALUES ('183', 'q3', '26', '27', '53');
INSERT INTO parciais VALUES ('184', 'q4', '26', '23', '53');
INSERT INTO parciais VALUES ('189', 'q1', '26', '30', '55');
INSERT INTO parciais VALUES ('190', 'q2', '30', '20', '55');
INSERT INTO parciais VALUES ('191', 'q3', '21', '33', '55');
INSERT INTO parciais VALUES ('192', 'q4', '36', '24', '55');
INSERT INTO parciais VALUES ('193', 'q1', '23', '35', '56');
INSERT INTO parciais VALUES ('194', 'q2', '42', '36', '56');
INSERT INTO parciais VALUES ('195', 'q3', '22', '21', '56');
INSERT INTO parciais VALUES ('196', 'q4', '25', '24', '56');
INSERT INTO parciais VALUES ('197', 'q1', '26', '29', '57');
INSERT INTO parciais VALUES ('198', 'q2', '29', '37', '57');
INSERT INTO parciais VALUES ('199', 'q3', '27', '25', '57');
INSERT INTO parciais VALUES ('200', 'q4', '26', '21', '57');
INSERT INTO parciais VALUES ('201', 'q1', '35', '26', '58');
INSERT INTO parciais VALUES ('202', 'q2', '25', '21', '58');
INSERT INTO parciais VALUES ('203', 'q3', '23', '20', '58');
INSERT INTO parciais VALUES ('204', 'q4', '27', '27', '58');
INSERT INTO parciais VALUES ('205', 'q1', '26', '15', '59');
INSERT INTO parciais VALUES ('206', 'q2', '34', '34', '59');
INSERT INTO parciais VALUES ('207', 'q3', '30', '26', '59');
INSERT INTO parciais VALUES ('208', 'q4', '23', '40', '59');
INSERT INTO parciais VALUES ('209', 'q1', '35', '28', '60');
INSERT INTO parciais VALUES ('210', 'q2', '18', '27', '60');
INSERT INTO parciais VALUES ('211', 'q3', '28', '27', '60');
INSERT INTO parciais VALUES ('212', 'q4', '24', '36', '60');
INSERT INTO parciais VALUES ('213', 'q1', '30', '29', '61');
INSERT INTO parciais VALUES ('214', 'q2', '37', '21', '61');
INSERT INTO parciais VALUES ('215', 'q3', '24', '27', '61');
INSERT INTO parciais VALUES ('216', 'q4', '23', '26', '61');
INSERT INTO parciais VALUES ('217', 'q1', '21', '30', '62');
INSERT INTO parciais VALUES ('218', 'q2', '28', '35', '62');
INSERT INTO parciais VALUES ('219', 'q3', '30', '31', '62');
INSERT INTO parciais VALUES ('220', 'q4', '19', '30', '62');
INSERT INTO parciais VALUES ('221', 'q1', '27', '17', '63');
INSERT INTO parciais VALUES ('222', 'q2', '24', '38', '63');
INSERT INTO parciais VALUES ('223', 'q3', '26', '43', '63');
INSERT INTO parciais VALUES ('224', 'q4', '20', '21', '63');
INSERT INTO parciais VALUES ('225', 'q1', '25', '37', '64');
INSERT INTO parciais VALUES ('226', 'q2', '34', '29', '64');
INSERT INTO parciais VALUES ('227', 'q3', '26', '31', '64');
INSERT INTO parciais VALUES ('228', 'q4', '19', '30', '64');
INSERT INTO parciais VALUES ('229', 'q1', '32', '34', '65');
INSERT INTO parciais VALUES ('230', 'q2', '21', '25', '65');
INSERT INTO parciais VALUES ('231', 'q3', '30', '26', '65');
INSERT INTO parciais VALUES ('232', 'q4', '38', '29', '65');
INSERT INTO parciais VALUES ('233', 'q1', '38', '27', '66');
INSERT INTO parciais VALUES ('234', 'q2', '37', '32', '66');
INSERT INTO parciais VALUES ('235', 'q3', '13', '33', '66');
INSERT INTO parciais VALUES ('236', 'q4', '34', '31', '66');
INSERT INTO parciais VALUES ('237', 'q1', '14', '20', '67');
INSERT INTO parciais VALUES ('238', 'q2', '26', '24', '67');
INSERT INTO parciais VALUES ('239', 'q3', '31', '25', '67');
INSERT INTO parciais VALUES ('240', 'q4', '23', '19', '67');
INSERT INTO parciais VALUES ('241', 'q1', '35', '29', '68');
INSERT INTO parciais VALUES ('242', 'q2', '23', '25', '68');
INSERT INTO parciais VALUES ('243', 'q3', '24', '32', '68');
INSERT INTO parciais VALUES ('244', 'q4', '52', '52', '68');
INSERT INTO parciais VALUES ('245', 'q1', '26', '18', '69');
INSERT INTO parciais VALUES ('246', 'q2', '31', '19', '69');
INSERT INTO parciais VALUES ('247', 'q3', '24', '22', '69');
INSERT INTO parciais VALUES ('248', 'q4', '17', '24', '69');
INSERT INTO parciais VALUES ('249', 'q1', '20', '22', '70');
INSERT INTO parciais VALUES ('250', 'q2', '24', '29', '70');
INSERT INTO parciais VALUES ('251', 'q3', '20', '35', '70');
INSERT INTO parciais VALUES ('252', 'q4', '23', '27', '70');
INSERT INTO parciais VALUES ('253', 'q1', '17', '40', '71');
INSERT INTO parciais VALUES ('254', 'q2', '26', '32', '71');
INSERT INTO parciais VALUES ('255', 'q3', '26', '33', '71');
INSERT INTO parciais VALUES ('256', 'q4', '26', '32', '71');
INSERT INTO parciais VALUES ('257', 'q1', '27', '44', '72');
INSERT INTO parciais VALUES ('258', 'q2', '40', '22', '72');
INSERT INTO parciais VALUES ('259', 'q3', '26', '24', '72');
INSERT INTO parciais VALUES ('260', 'q4', '20', '26', '72');
INSERT INTO parciais VALUES ('261', 'q1', '27', '30', '73');
INSERT INTO parciais VALUES ('262', 'q2', '27', '39', '73');
INSERT INTO parciais VALUES ('263', 'q3', '36', '30', '73');
INSERT INTO parciais VALUES ('264', 'q4', '33', '23', '73');

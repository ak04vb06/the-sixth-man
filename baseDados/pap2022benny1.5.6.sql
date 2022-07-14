/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50736
Source Host           : localhost:3306
Source Database       : pap2022benny

Target Server Type    : MYSQL
Target Server Version : 50736
File Encoding         : 65001

Date: 2022-07-14 14:53:16
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of jogos
-- ----------------------------
INSERT INTO jogos VALUES ('1', '2022-04-20', '100', '110', '1', '2');
INSERT INTO jogos VALUES ('10', '2022-07-07', '16', '16', '2', '6');

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
INSERT INTO noticias VALUES ('3', 'curry mvp das finais 2022', '2022-06-17', 'imagesNews/curryMvp.jpg', 'Finale NBA 2022 : Golden State sacrÃ© champion pour la septiÃ¨me fois, Stephen Curry dÃ©signÃ© MVP', '<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of parciais
-- ----------------------------
INSERT INTO parciais VALUES ('1', 'q1', '25', '27', '1');
INSERT INTO parciais VALUES ('2', 'q2', '25', '28', '1');
INSERT INTO parciais VALUES ('3', 'q3', '25', '29', '1');
INSERT INTO parciais VALUES ('4', 'q4', '25', '26', '1');
INSERT INTO parciais VALUES ('9', 'q1', '4', '4', '10');
INSERT INTO parciais VALUES ('10', 'q2', '4', '4', '10');
INSERT INTO parciais VALUES ('11', 'q3', '4', '4', '10');
INSERT INTO parciais VALUES ('12', 'q4', '4', '4', '10');

/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : 127.0.0.1:3306
 Source Schema         : pap2022benny

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 14/07/2022 16:38:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for clubes
-- ----------------------------
DROP TABLE IF EXISTS `clubes`;
CREATE TABLE `clubes`  (
  `clubeId` int(11) NOT NULL AUTO_INCREMENT,
  `clubeNome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `clubeSobrenome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `clubeLogoURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `clubeConferencia` enum('west','east') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'west',
  PRIMARY KEY (`clubeId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of clubes
-- ----------------------------
INSERT INTO `clubes` VALUES (1, 'Chicago', 'Bulls', 'extra-images/chicagologo.svg', 'east');
INSERT INTO `clubes` VALUES (2, 'Boston', 'Celtics', 'extra-images/bostonlogo.svg', 'east');
INSERT INTO `clubes` VALUES (5, 'Miami', 'Heat', 'extra-images/miamilogo.svg', 'east');
INSERT INTO `clubes` VALUES (6, 'Memphis', 'Grizzlies', 'extra-images/Memphislogo.svg', 'west');
INSERT INTO `clubes` VALUES (7, 'Milwaukee', 'Bucks', 'clubs/milwaukeelogo.svg', 'east');
INSERT INTO `clubes` VALUES (8, 'Philadelphia', '76ers', 'clubs/philadelphialogo.svg', 'east');
INSERT INTO `clubes` VALUES (9, 'Toronto', 'Raptors', 'clubs/torontologo.svg', 'east');
INSERT INTO `clubes` VALUES (11, 'Atlanta ', 'Hawks', 'clubs/Atlantalogo.svg', 'east');
INSERT INTO `clubes` VALUES (12, 'Cleveland', 'Cavaliers', 'clubs/clevelandlogo.svg', 'east');
INSERT INTO `clubes` VALUES (13, 'Charlotte', 'Hornets', 'clubs/Charlottelogo.svg', 'east');
INSERT INTO `clubes` VALUES (14, 'New York', 'Knicks', 'clubs/Newyorklogo.svg', 'east');
INSERT INTO `clubes` VALUES (15, 'Washington', 'Wizards', 'clubs/Wizardlogo.svg', 'east');
INSERT INTO `clubes` VALUES (16, 'Indiana ', 'Pacers', 'clubs/Indianalogo.svg', 'east');
INSERT INTO `clubes` VALUES (17, 'Detroit', 'Pistons', 'clubs/Detroitlogo.svg', 'east');
INSERT INTO `clubes` VALUES (18, 'Orlando', 'Magic', 'clubs/Magiclogo.svg', 'east');
INSERT INTO `clubes` VALUES (19, 'Phoenix', 'Suns', 'clubs/sunslogo.svg', 'west');
INSERT INTO `clubes` VALUES (20, 'Golden State', 'Warriors', 'clubs/Warriorslogo.svg', 'west');
INSERT INTO `clubes` VALUES (21, 'Dallas', 'Mavericks', 'clubs/dallaslogo.svg', 'west');
INSERT INTO `clubes` VALUES (22, 'Utah', 'Jazz', 'clubs/utahlogo.svg', 'west');
INSERT INTO `clubes` VALUES (23, 'Denver', 'Nuggets', 'clubs/denverlogo.svg', 'west');
INSERT INTO `clubes` VALUES (24, 'Minnesota', 'Timberwolves', 'clubs/minesotalogo.svg', 'west');
INSERT INTO `clubes` VALUES (25, 'New orleans', 'Pelicans', 'clubs/pelicans_primary_logo.svg', 'west');
INSERT INTO `clubes` VALUES (26, 'Los angeles', 'Clippers', 'clubs/Clipperslogo.svg', 'west');
INSERT INTO `clubes` VALUES (27, 'San Antonio', 'Spurs', 'clubs/Spurslogo.svg', 'west');
INSERT INTO `clubes` VALUES (28, 'Los angeles', 'Lakers', 'clubs/Lakerslogo.svg', 'west');
INSERT INTO `clubes` VALUES (29, 'Sacramento', 'Kings', 'clubs/Kingslogo.svg', 'west');
INSERT INTO `clubes` VALUES (30, 'Portland Trail', 'Blazers', 'clubs/Portlandlogo.svg', 'west');
INSERT INTO `clubes` VALUES (31, 'Oklahoma City ', 'Thunder', 'clubs/Oklahomalogo.svg', 'west');
INSERT INTO `clubes` VALUES (32, 'Houston', 'Rockets', 'clubs/Houstonlogo.svg', 'west');
INSERT INTO `clubes` VALUES (33, 'Brooklyn', 'Nets', 'clubs/brooklynlogo.svg', 'east');

-- ----------------------------
-- Table structure for jogos
-- ----------------------------
DROP TABLE IF EXISTS `jogos`;
CREATE TABLE `jogos`  (
  `jogoId` int(11) NOT NULL AUTO_INCREMENT,
  `jogoData` date NOT NULL,
  `jogoResultadoCasa` int(11) NOT NULL DEFAULT 0,
  `jogoResultadoFora` int(11) NOT NULL DEFAULT 0,
  `jogoCasaClubeId` int(11) NOT NULL,
  `jogoForaClubeId` int(11) NOT NULL,
  PRIMARY KEY (`jogoId`) USING BTREE,
  INDEX `fk_jogos_clubes_idx`(`jogoCasaClubeId`) USING BTREE,
  INDEX `fk_jogos_clubes1_idx`(`jogoForaClubeId`) USING BTREE,
  CONSTRAINT `fk_jogos_clubes` FOREIGN KEY (`jogoCasaClubeId`) REFERENCES `clubes` (`clubeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogos_clubes1` FOREIGN KEY (`jogoForaClubeId`) REFERENCES `clubes` (`clubeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jogos
-- ----------------------------
INSERT INTO `jogos` VALUES (11, '2021-10-03', 123, 97, 33, 28);
INSERT INTO `jogos` VALUES (13, '2021-10-04', 107, 123, 8, 9);
INSERT INTO `jogos` VALUES (14, '2021-10-04', 97, 98, 18, 2);
INSERT INTO `jogos` VALUES (15, '2021-10-05', 99, 125, 11, 5);
INSERT INTO `jogos` VALUES (16, '2021-10-05', 114, 117, 25, 24);
INSERT INTO `jogos` VALUES (17, '2021-10-05', 113, 97, 13, 31);
INSERT INTO `jogos` VALUES (18, '2021-10-05', 85, 111, 22, 27);

-- ----------------------------
-- Table structure for noticias
-- ----------------------------
DROP TABLE IF EXISTS `noticias`;
CREATE TABLE `noticias`  (
  `noticiaId` int(11) NOT NULL AUTO_INCREMENT,
  `noticiaTitulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `noticiaData` date NOT NULL,
  `noticiaImagemURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `noticiaResumo` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `noticiaCorpo` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`noticiaId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of noticias
-- ----------------------------
INSERT INTO `noticias` VALUES (3, 'curry mvp das finais 2022', '2022-06-17', 'imagesNews/curryMvp.jpg', 'Finale NBA 2022 : Golden State sacrÃ© champion pour la septiÃ¨me fois, Stephen Curry dÃ©signÃ© MVP', '<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>&nbsp;</p>\r\n<p>Coup double pour Stephen Curry. La bague de champion NBA et le titre de MVP, d&eacute;signant le meilleur joueur de la finale. Son &eacute;quipe de Golden State a &eacute;t&eacute; sacr&eacute;e, jeudi&nbsp;16 juin, championne de la NBA,&nbsp;<a class=\"ftvi-click--binded\" href=\"https://www.francetvinfo.fr/sports/basket/nba/\" data-click-value=\"content::link-in-content::article::/sports/basket/nba/\">la ligue am&eacute;ricaine de basket</a>, pour la septi&egrave;me&nbsp;fois de son histoire, en s\'imposant face &agrave; Boston (103-90). Les&nbsp;Warriors remportent la s&eacute;rie&nbsp;par quatre victoires contre deux&nbsp;aux Celtics.</p>\r\n<p>&nbsp;</p>');

-- ----------------------------
-- Table structure for parciais
-- ----------------------------
DROP TABLE IF EXISTS `parciais`;
CREATE TABLE `parciais`  (
  `parcialId` int(11) NOT NULL AUTO_INCREMENT,
  `parcialQuarto` enum('q1','q2','q3','q4') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'q1',
  `parcialCasaPontos` int(11) NOT NULL DEFAULT 0,
  `parcialForaPontos` int(11) NOT NULL DEFAULT 0,
  `parcialJogoId` int(11) NOT NULL,
  PRIMARY KEY (`parcialId`) USING BTREE,
  INDEX `fk_parciais_jogos1_idx`(`parcialJogoId`) USING BTREE,
  CONSTRAINT `fk_parciais_jogos1` FOREIGN KEY (`parcialJogoId`) REFERENCES `jogos` (`jogoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of parciais
-- ----------------------------
INSERT INTO `parciais` VALUES (13, 'q1', 25, 19, 11);
INSERT INTO `parciais` VALUES (14, 'q2', 32, 30, 11);
INSERT INTO `parciais` VALUES (15, 'q3', 27, 32, 11);
INSERT INTO `parciais` VALUES (16, 'q4', 39, 16, 11);
INSERT INTO `parciais` VALUES (21, 'q1', 25, 28, 13);
INSERT INTO `parciais` VALUES (22, 'q2', 29, 39, 13);
INSERT INTO `parciais` VALUES (23, 'q3', 23, 33, 13);
INSERT INTO `parciais` VALUES (24, 'q4', 30, 23, 13);
INSERT INTO `parciais` VALUES (25, 'q1', 20, 21, 14);
INSERT INTO `parciais` VALUES (26, 'q2', 32, 29, 14);
INSERT INTO `parciais` VALUES (27, 'q3', 24, 21, 14);
INSERT INTO `parciais` VALUES (28, 'q4', 21, 27, 14);
INSERT INTO `parciais` VALUES (29, 'q1', 32, 33, 15);
INSERT INTO `parciais` VALUES (30, 'q2', 26, 41, 15);
INSERT INTO `parciais` VALUES (31, 'q3', 24, 25, 15);
INSERT INTO `parciais` VALUES (32, 'q4', 17, 26, 15);
INSERT INTO `parciais` VALUES (33, 'q1', 28, 25, 16);
INSERT INTO `parciais` VALUES (34, 'q2', 17, 40, 16);
INSERT INTO `parciais` VALUES (35, 'q3', 33, 29, 16);
INSERT INTO `parciais` VALUES (36, 'q4', 36, 23, 16);
INSERT INTO `parciais` VALUES (37, 'q1', 34, 18, 17);
INSERT INTO `parciais` VALUES (38, 'q2', 33, 27, 17);
INSERT INTO `parciais` VALUES (39, 'q3', 24, 26, 17);
INSERT INTO `parciais` VALUES (40, 'q4', 22, 26, 17);
INSERT INTO `parciais` VALUES (41, 'q1', 18, 24, 18);
INSERT INTO `parciais` VALUES (42, 'q2', 20, 25, 18);
INSERT INTO `parciais` VALUES (43, 'q3', 23, 38, 18);
INSERT INTO `parciais` VALUES (44, 'q4', 24, 24, 18);

SET FOREIGN_KEY_CHECKS = 1;

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

 Date: 08/07/2022 13:12:11
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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of clubes
-- ----------------------------
INSERT INTO `clubes` VALUES (1, 'Chicago', 'Bulls', 'extra-images/chicagologo.svg', 'east');
INSERT INTO `clubes` VALUES (2, 'Boston', 'Celtics', 'extra-images/bostonlogo.svg', 'east');
INSERT INTO `clubes` VALUES (5, 'Miami', 'Heat', 'extra-images/miamilogo.svg', 'east');
INSERT INTO `clubes` VALUES (6, 'Memphis', 'Grizzlies', 'extra-images/Memphislogo.svg', 'west');

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
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jogos
-- ----------------------------
INSERT INTO `jogos` VALUES (1, '2022-04-20', 100, 110, 1, 2);
INSERT INTO `jogos` VALUES (10, '2022-07-03', 0, 0, 2, 6);

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of noticias
-- ----------------------------
INSERT INTO `noticias` VALUES (1, 'APAGAR', '2022-06-29', 'imagesNews/durant-antetokounmpo-curry-1.png', 'Golden State Warriors: apÃ³s a glÃ³ria dos tÃ­tulos na NBA (2015, 2017 e 2018), a equipa mudou-se de Oakland para SÃ£o Francisco e, nos anos da pandemia, caiu em desgraÃ§a; recuperou para ser campeÃ£, numa ascensÃ£o tÃ£o rÃ¡pida e imprevista como Ã©pica. Ã€ boa maneira americana.', '<p><strong><span id=\"body_Ver_lblNoticia\" style=\"word-break: break-word; width: 100%;\">Golden State Warriors: ap&oacute;s a gl&oacute;ria dos t&iacute;tulos na NBA (2015, 2017 e 2018), a equipa mudou-se de Oakland para S&atilde;o Francisco e, nos anos da pandemia, caiu em desgra&ccedil;a; recuperou para ser campe&atilde;, numa ascens&atilde;o t&atilde;o r&aacute;pida e imprevista como &eacute;pica. &Agrave; boa maneira americana.</span></strong></p>\r\n<p><span style=\"word-break: break-word; width: 100%;\"><span id=\"body_Ver_lblNoticia\" style=\"word-break: break-word; width: 100%;\">Golden State Warriors: ap&oacute;s a gl&oacute;ria dos t&iacute;tulos na NBA (2015, 2017 e 2018), a equipa mudou-se de Oakland para S&atilde;o Francisco e, nos anos da pandemia, caiu em desgra&ccedil;a; recuperou para ser campe&atilde;, numa ascens&atilde;o t&atilde;o r&aacute;pida e imprevista como &eacute;pica. &Agrave; boa maneira americana.</span></span></p>\r\n<p><span style=\"word-break: break-word; width: 100%;\"><span style=\"word-break: break-word; width: 100%;\"><span id=\"body_Ver_lblNoticia\" style=\"word-break: break-word; width: 100%;\">Golden State Warriors: ap&oacute;s a gl&oacute;ria dos t&iacute;tulos na NBA (2015, 2017 e 2018), a equipa mudou-se de Oakland para S&atilde;o Francisco e, nos anos da pandemia, caiu em desgra&ccedil;a; recuperou para ser campe&atilde;, numa ascens&atilde;o t&atilde;o r&aacute;pida e imprevista como &eacute;pica. &Agrave; boa maneira americana.</span></span></span></p>\r\n<p><span style=\"word-break: break-word; width: 100%;\"><span style=\"word-break: break-word; width: 100%;\"><span style=\"word-break: break-word; width: 100%;\"><span id=\"body_Ver_lblNoticia\" style=\"word-break: break-word; width: 100%;\">Golden State Warriors: ap&oacute;s a gl&oacute;ria dos t&iacute;tulos na NBA (2015, 2017 e 2018), a equipa mudou-se de Oakland para S&atilde;o Francisco e, nos anos da pandemia, caiu em desgra&ccedil;a; recuperou para ser campe&atilde;, numa ascens&atilde;o t&atilde;o r&aacute;pida e imprevista como &eacute;pica. &Agrave; boa maneira americana.</span></span></span></span></p>\r\n<p><span style=\"word-break: break-word; width: 100%;\"><span style=\"word-break: break-word; width: 100%;\"><span style=\"word-break: break-word; width: 100%;\"><span style=\"word-break: break-word; width: 100%;\"><span id=\"body_Ver_lblNoticia\" style=\"word-break: break-word; width: 100%;\">Golden State Warriors: ap&oacute;s a gl&oacute;ria dos t&iacute;tulos na NBA (2015, 2017 e 2018), a equipa mudou-se de Oakland para S&atilde;o Francisco e, nos anos da pandemia, caiu em desgra&ccedil;a; recuperou para ser campe&atilde;, numa ascens&atilde;o t&atilde;o r&aacute;pida e imprevista como &eacute;pica. &Agrave; boa maneira americana.</span></span></span></span></span></p>\r\n<p><span style=\"word-break: break-word; width: 100%;\"><span style=\"word-break: break-word; width: 100%;\"><span style=\"word-break: break-word; width: 100%;\"><span style=\"word-break: break-word; width: 100%;\"><span style=\"word-break: break-word; width: 100%;\"><span id=\"body_Ver_lblNoticia\" style=\"word-break: break-word; width: 100%;\">Golden State Warriors: ap&oacute;s a gl&oacute;ria dos t&iacute;tulos na NBA (2015, 2017 e 2018), a equipa mudou-se de Oakland para S&atilde;o Francisco e, nos anos da pandemia, caiu em desgra&ccedil;a; recuperou para ser campe&atilde;, numa ascens&atilde;o t&atilde;o r&aacute;pida e imprevista como &eacute;pica. &Agrave; boa maneira americana.</span></span></span></span></span></span></p>\r\n<p>&nbsp;</p>');
INSERT INTO `noticias` VALUES (2, 'Golden State CampeÃµes!', '2022-06-30', 'imagesNews/semImagem.jpg', 'Golden State Warriors: apÃ³s a glÃ³ria dos tÃ­tulos na NBA (2015, 2017 e 2018), a equipa mudou-se de Oakland para SÃ£o Francisco e, nos anos da pandemia, caiu em desgraÃ§a; recuperou para ser campeÃ£, numa ascensÃ£o tÃ£o rÃ¡pida e imprevista como Ã©pica. Ã€ boa maneira americana.', '');

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
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parciais
-- ----------------------------
INSERT INTO `parciais` VALUES (1, 'q1', 25, 27, 1);
INSERT INTO `parciais` VALUES (2, 'q2', 25, 28, 1);
INSERT INTO `parciais` VALUES (3, 'q3', 25, 29, 1);
INSERT INTO `parciais` VALUES (4, 'q4', 25, 26, 1);
INSERT INTO `parciais` VALUES (9, 'q1', 0, 0, 10);
INSERT INTO `parciais` VALUES (10, 'q2', 0, 0, 10);
INSERT INTO `parciais` VALUES (11, 'q3', 0, 0, 10);
INSERT INTO `parciais` VALUES (12, 'q4', 0, 0, 10);

SET FOREIGN_KEY_CHECKS = 1;

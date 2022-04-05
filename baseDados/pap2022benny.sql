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

 Date: 05/04/2022 11:14:55
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
  `jogoResultadoCasa` int(11) NOT NULL,
  `jogoResultadoFora` int(11) NOT NULL,
  `jogoCasaClubeId` int(11) NOT NULL,
  `jogoForaClubeId` int(11) NOT NULL,
  PRIMARY KEY (`jogoId`) USING BTREE,
  INDEX `fk_jogos_clubes_idx`(`jogoCasaClubeId`) USING BTREE,
  INDEX `fk_jogos_clubes1_idx`(`jogoForaClubeId`) USING BTREE,
  CONSTRAINT `fk_jogos_clubes` FOREIGN KEY (`jogoCasaClubeId`) REFERENCES `clubes` (`clubeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogos_clubes1` FOREIGN KEY (`jogoForaClubeId`) REFERENCES `clubes` (`clubeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jogos
-- ----------------------------

-- ----------------------------
-- Table structure for parciais
-- ----------------------------
DROP TABLE IF EXISTS `parciais`;
CREATE TABLE `parciais`  (
  `parcialId` int(11) NOT NULL AUTO_INCREMENT,
  `parcialQuarto` enum('q1','q2','q3','q4') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'q1',
  `parcialCasaPontos` int(11) NOT NULL,
  `parcialForaPontos` int(11) NOT NULL,
  `parcialJogoId` int(11) NOT NULL,
  PRIMARY KEY (`parcialId`) USING BTREE,
  INDEX `fk_parciais_jogos1_idx`(`parcialJogoId`) USING BTREE,
  CONSTRAINT `fk_parciais_jogos1` FOREIGN KEY (`parcialJogoId`) REFERENCES `jogos` (`jogoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parciais
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;

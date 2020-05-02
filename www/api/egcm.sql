/*
 Navicat Premium Data Transfer

 Source Server         : egcm.web
 Source Server Type    : MariaDB
 Source Server Version : 100023
 Source Host           : egcm.web:3306
 Source Schema         : egcm

 Target Server Type    : MariaDB
 Target Server Version : 100023
 File Encoding         : 65001

 Date: 02/05/2020 10:06:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for perfiles
-- ----------------------------
DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE `perfiles`  (
  `idPerfil` int(255) NOT NULL AUTO_INCREMENT,
  `nombrePerfil` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `descripcionPerfil` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `parentPerfil` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nivelPerfil` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idPerfil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of perfiles
-- ----------------------------
INSERT INTO `perfiles` VALUES (1, 'Pedro Perez', 'Gerente de Ventas', '0', '5');
INSERT INTO `perfiles` VALUES (2, 'Juan Cruz', 'Coordinador Zonal', '1', '4');
INSERT INTO `perfiles` VALUES (3, 'Luis Jimenez', 'Gerente de cuentas', '2', '3');
INSERT INTO `perfiles` VALUES (4, 'Alison Vallejo', 'Gerente Proyectos', '2', '3');
INSERT INTO `perfiles` VALUES (5, 'Maria Kanee', 'Mercaderista', '4', '2');
INSERT INTO `perfiles` VALUES (6, 'Andres Gomez', 'Asistente de Ventas', '5', '1');
INSERT INTO `perfiles` VALUES (7, 'Yesica Lopez', 'Asistente de Ventas', '5', '1');

-- ----------------------------
-- Table structure for ventas
-- ----------------------------
DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas`  (
  `idVenta` int(255) NOT NULL AUTO_INCREMENT,
  `nameVenta` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `statusVenta` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `descVenta` varchar(3000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deletedVenta` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `dateVenta` date NULL DEFAULT NULL,
  `vendedorVenta` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `montoVenta` int(255) NULL DEFAULT NULL,
  `lasteditVenta` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idVenta`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;

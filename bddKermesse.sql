CREATE DATABASE  IF NOT EXISTS `dbkermesse` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbkermesse`;
-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: dbkermesse
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `rol_opciones`
--

DROP TABLE IF EXISTS `rol_opciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol_opciones` (
  `id_rol_opciones` int NOT NULL AUTO_INCREMENT,
  `tbl_rol_id_rol` int NOT NULL,
  `tbl_opciones_id_opciones` int NOT NULL,
  PRIMARY KEY (`id_rol_opciones`),
  KEY `fk_rol_opciones_tbl_rol_idx` (`tbl_rol_id_rol`),
  KEY `fk_rol_opciones_tbl_opciones1_idx` (`tbl_opciones_id_opciones`),
  CONSTRAINT `fk_rol_opciones_tbl_opciones1` FOREIGN KEY (`tbl_opciones_id_opciones`) REFERENCES `tbl_opciones` (`id_opciones`),
  CONSTRAINT `fk_rol_opciones_tbl_rol` FOREIGN KEY (`tbl_rol_id_rol`) REFERENCES `tbl_rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_opciones`
--

LOCK TABLES `rol_opciones` WRITE;
/*!40000 ALTER TABLE `rol_opciones` DISABLE KEYS */;
INSERT INTO `rol_opciones` VALUES (1,1,1),(2,1,2),(4,1,4),(5,1,5),(6,1,6),(9,1,7),(10,1,8),(11,1,9),(12,1,10),(13,1,11),(14,1,12),(15,1,3);
/*!40000 ALTER TABLE `rol_opciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol_usuario`
--

DROP TABLE IF EXISTS `rol_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol_usuario` (
  `id_rol_usuario` int NOT NULL AUTO_INCREMENT,
  `tbl_usuario_id_usuario` int NOT NULL,
  `tbl_rol_id_rol` int NOT NULL,
  PRIMARY KEY (`id_rol_usuario`),
  KEY `fk_rol_usuario_tbl_usuario1_idx` (`tbl_usuario_id_usuario`),
  KEY `fk_rol_usuario_tbl_rol1_idx` (`tbl_rol_id_rol`),
  CONSTRAINT `fk_rol_usuario_tbl_rol1` FOREIGN KEY (`tbl_rol_id_rol`) REFERENCES `tbl_rol` (`id_rol`),
  CONSTRAINT `fk_rol_usuario_tbl_usuario1` FOREIGN KEY (`tbl_usuario_id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_usuario`
--

LOCK TABLES `rol_usuario` WRITE;
/*!40000 ALTER TABLE `rol_usuario` DISABLE KEYS */;
INSERT INTO `rol_usuario` VALUES (1,1,1),(2,2,2);
/*!40000 ALTER TABLE `rol_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_arqueocaja`
--

DROP TABLE IF EXISTS `tbl_arqueocaja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_arqueocaja` (
  `id_ArqueoCaja` int NOT NULL AUTO_INCREMENT,
  `idKermesse` int NOT NULL,
  `fechaArqueo` date NOT NULL,
  `granTotal` decimal(18,2) DEFAULT NULL,
  `usuario_creacion` int NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_eliminacion` int DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_ArqueoCaja`),
  UNIQUE KEY `id_ArqueoCaja_UNIQUE` (`id_ArqueoCaja`),
  KEY `fk_tbl_ArqueoCaja_1_idx` (`idKermesse`),
  KEY `fk_tbl_ArqueoCaja_2_idx` (`usuario_creacion`),
  KEY `fk_tbl_ArqueoCaja_3_idx` (`usuario_modificacion`),
  KEY `fk_tbl_ArqueoCaja_4_idx` (`usuario_eliminacion`),
  CONSTRAINT `fk_tbl_ArqueoCaja_1` FOREIGN KEY (`idKermesse`) REFERENCES `tbl_kermesse` (`id_kermesse`),
  CONSTRAINT `fk_tbl_ArqueoCaja_2` FOREIGN KEY (`usuario_creacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_ArqueoCaja_3` FOREIGN KEY (`usuario_modificacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_ArqueoCaja_4` FOREIGN KEY (`usuario_eliminacion`) REFERENCES `tbl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_arqueocaja`
--

LOCK TABLES `tbl_arqueocaja` WRITE;
/*!40000 ALTER TABLE `tbl_arqueocaja` DISABLE KEYS */;
INSERT INTO `tbl_arqueocaja` VALUES (1,1,'2022-11-14',64.00,1,'2022-11-14 21:34:23',NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `tbl_arqueocaja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_arqueocaja_det`
--

DROP TABLE IF EXISTS `tbl_arqueocaja_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_arqueocaja_det` (
  `idArqueoCaja_Det` int NOT NULL AUTO_INCREMENT,
  `idArqueoCaja` int NOT NULL,
  `idMoneda` int NOT NULL,
  `idDenominacion` int NOT NULL,
  `cantidad` decimal(18,2) NOT NULL,
  `subtotal` decimal(18,2) NOT NULL,
  PRIMARY KEY (`idArqueoCaja_Det`),
  UNIQUE KEY `idArqueoCaja_Det_UNIQUE` (`idArqueoCaja_Det`),
  KEY `fk_tbl_ArqueoCaja_Det_1_idx` (`idMoneda`),
  KEY `fk_tbl_ArqueoCaja_Det_2_idx` (`idArqueoCaja`),
  KEY `fk_tbl_ArqueoCaja_Det_3_idx` (`idDenominacion`),
  CONSTRAINT `fk_tbl_ArqueoCaja_Det_1` FOREIGN KEY (`idMoneda`) REFERENCES `tbl_moneda` (`id_moneda`),
  CONSTRAINT `fk_tbl_ArqueoCaja_Det_2` FOREIGN KEY (`idArqueoCaja`) REFERENCES `tbl_arqueocaja` (`id_ArqueoCaja`),
  CONSTRAINT `fk_tbl_ArqueoCaja_Det_3` FOREIGN KEY (`idDenominacion`) REFERENCES `tbl_denominacion` (`id_Denominacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_arqueocaja_det`
--

LOCK TABLES `tbl_arqueocaja_det` WRITE;
/*!40000 ALTER TABLE `tbl_arqueocaja_det` DISABLE KEYS */;
INSERT INTO `tbl_arqueocaja_det` VALUES (3,1,1,1,32.00,64.00);
/*!40000 ALTER TABLE `tbl_arqueocaja_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_categoria_gastos`
--

DROP TABLE IF EXISTS `tbl_categoria_gastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_categoria_gastos` (
  `id_categoria_gastos` int NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(45) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_categoria_gastos`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categoria_gastos`
--

LOCK TABLES `tbl_categoria_gastos` WRITE;
/*!40000 ALTER TABLE `tbl_categoria_gastos` DISABLE KEYS */;
INSERT INTO `tbl_categoria_gastos` VALUES (1,'servicios','si',1);
/*!40000 ALTER TABLE `tbl_categoria_gastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_categoria_producto`
--

DROP TABLE IF EXISTS `tbl_categoria_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_categoria_producto` (
  `id_categoria_producto` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_categoria_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categoria_producto`
--

LOCK TABLES `tbl_categoria_producto` WRITE;
/*!40000 ALTER TABLE `tbl_categoria_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_categoria_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_comunidad`
--

DROP TABLE IF EXISTS `tbl_comunidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_comunidad` (
  `id_comunidad` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `responsable` varchar(45) NOT NULL,
  `desc_contribucion` varchar(100) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_comunidad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_comunidad`
--

LOCK TABLES `tbl_comunidad` WRITE;
/*!40000 ALTER TABLE `tbl_comunidad` DISABLE KEYS */;
INSERT INTO `tbl_comunidad` VALUES (1,'Asociativa','Manuel Miranda','Asociacion de conducta responsable',1);
/*!40000 ALTER TABLE `tbl_comunidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_control_bonos`
--

DROP TABLE IF EXISTS `tbl_control_bonos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_control_bonos` (
  `id_bono` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `valor` float NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_bono`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_control_bonos`
--

LOCK TABLES `tbl_control_bonos` WRITE;
/*!40000 ALTER TABLE `tbl_control_bonos` DISABLE KEYS */;
INSERT INTO `tbl_control_bonos` VALUES (1,'bonoControlado',600,1);
/*!40000 ALTER TABLE `tbl_control_bonos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_denominacion`
--

DROP TABLE IF EXISTS `tbl_denominacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_denominacion` (
  `id_Denominacion` int NOT NULL AUTO_INCREMENT,
  `idMoneda` int NOT NULL,
  `valor` decimal(18,2) NOT NULL,
  `valor_letras` varchar(100) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_Denominacion`),
  UNIQUE KEY `id_Denominacion_UNIQUE` (`id_Denominacion`),
  KEY `fk_tbl_Denominacion_1_idx` (`idMoneda`),
  CONSTRAINT `fk_tbl_Denominacion_1` FOREIGN KEY (`idMoneda`) REFERENCES `tbl_moneda` (`id_moneda`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_denominacion`
--

LOCK TABLES `tbl_denominacion` WRITE;
/*!40000 ALTER TABLE `tbl_denominacion` DISABLE KEYS */;
INSERT INTO `tbl_denominacion` VALUES (1,1,20.00,'veinte',1),(2,1,10.00,'diez',1);
/*!40000 ALTER TABLE `tbl_denominacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gastos`
--

DROP TABLE IF EXISTS `tbl_gastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_gastos` (
  `id_registro_gastos` int NOT NULL AUTO_INCREMENT,
  `idKermesse` int NOT NULL,
  `idCatGastos` int NOT NULL,
  `fechaGasto` date NOT NULL,
  `concepto` varchar(70) NOT NULL,
  `monto` float NOT NULL,
  `usuario_creacion` int NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_eliminacion` int DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_registro_gastos`),
  KEY `fk_tbl_gastos_1_idx` (`idCatGastos`),
  KEY `fk_tbl_gastos_2_idx` (`idKermesse`),
  KEY `fk_tbl_gastos_3_idx` (`usuario_creacion`),
  KEY `fk_tbl_gastos_4_idx` (`usuario_modificacion`),
  KEY `fk_tbl_gastos_5_idx` (`usuario_eliminacion`),
  CONSTRAINT `fk_tbl_gastos_1` FOREIGN KEY (`idCatGastos`) REFERENCES `tbl_categoria_gastos` (`id_categoria_gastos`),
  CONSTRAINT `fk_tbl_gastos_2` FOREIGN KEY (`idKermesse`) REFERENCES `tbl_kermesse` (`id_kermesse`),
  CONSTRAINT `fk_tbl_gastos_3` FOREIGN KEY (`usuario_creacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_gastos_4` FOREIGN KEY (`usuario_modificacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_gastos_5` FOREIGN KEY (`usuario_eliminacion`) REFERENCES `tbl_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gastos`
--

LOCK TABLES `tbl_gastos` WRITE;
/*!40000 ALTER TABLE `tbl_gastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_gastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ingreso_comunidad`
--

DROP TABLE IF EXISTS `tbl_ingreso_comunidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_ingreso_comunidad` (
  `id_ingreso_comunidad` int NOT NULL AUTO_INCREMENT,
  `id_kermesse` int NOT NULL,
  `id_comunidad` int NOT NULL,
  `id_producto` int NOT NULL,
  `cant_productos` int NOT NULL,
  `total_bonos` int NOT NULL,
  `estado` int NOT NULL,
  `usuario_creacion` int NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_eliminacion` int DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ingreso_comunidad`),
  KEY `fk_tbl_ingreso_comunidad_tbl_productos1_idx` (`id_producto`),
  KEY `fk_tbl_ingreso_comunidad_1_idx` (`id_kermesse`),
  KEY `fk_tbl_ingreso_comunidad_2_idx` (`id_comunidad`),
  KEY `fk_tbl_ingreso_comunidad_3_idx` (`usuario_creacion`),
  KEY `fk_tbl_ingreso_comunidad_5_idx` (`usuario_modificacion`),
  KEY `fk_tbl_ingreso_comunidad_6_idx` (`usuario_eliminacion`),
  CONSTRAINT `fk_tbl_ingreso_comunidad_1` FOREIGN KEY (`id_kermesse`) REFERENCES `tbl_kermesse` (`id_kermesse`),
  CONSTRAINT `fk_tbl_ingreso_comunidad_2` FOREIGN KEY (`id_comunidad`) REFERENCES `tbl_comunidad` (`id_comunidad`),
  CONSTRAINT `fk_tbl_ingreso_comunidad_3` FOREIGN KEY (`usuario_creacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_ingreso_comunidad_4` FOREIGN KEY (`usuario_creacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_ingreso_comunidad_5` FOREIGN KEY (`usuario_modificacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_ingreso_comunidad_6` FOREIGN KEY (`usuario_eliminacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_ingreso_comunidad_tbl_productos1` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ingreso_comunidad`
--

LOCK TABLES `tbl_ingreso_comunidad` WRITE;
/*!40000 ALTER TABLE `tbl_ingreso_comunidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ingreso_comunidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ingreso_comunidad_det`
--

DROP TABLE IF EXISTS `tbl_ingreso_comunidad_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_ingreso_comunidad_det` (
  `id_ingreso_comunidad_det` int NOT NULL AUTO_INCREMENT,
  `id_ingreso_comunidad` int NOT NULL,
  `id_bono` int NOT NULL,
  `denominacion` varchar(45) NOT NULL,
  `cantidad` int NOT NULL,
  `subtotal_bono` float NOT NULL,
  PRIMARY KEY (`id_ingreso_comunidad_det`),
  KEY `fk_ingreso_comunidad_detalle_tbl_bono1_idx` (`id_bono`),
  KEY `fk_tbl_ingreso_comunidad_det_1_idx` (`id_ingreso_comunidad`),
  CONSTRAINT `fk_ingreso_comunidad_detalle_tbl_bono1` FOREIGN KEY (`id_bono`) REFERENCES `tbl_control_bonos` (`id_bono`),
  CONSTRAINT `fk_tbl_ingreso_comunidad_det_1` FOREIGN KEY (`id_ingreso_comunidad`) REFERENCES `tbl_ingreso_comunidad` (`id_ingreso_comunidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ingreso_comunidad_det`
--

LOCK TABLES `tbl_ingreso_comunidad_det` WRITE;
/*!40000 ALTER TABLE `tbl_ingreso_comunidad_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ingreso_comunidad_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kermesse`
--

DROP TABLE IF EXISTS `tbl_kermesse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_kermesse` (
  `id_kermesse` int NOT NULL AUTO_INCREMENT,
  `idParroquia` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fInicio` date NOT NULL,
  `fFinal` date NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` int NOT NULL,
  `usuario_creacion` int NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_eliminacion` int DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_kermesse`),
  KEY `fk_tbl_kermesse_1_idx` (`usuario_creacion`),
  KEY `fk_tbl_kermesse_2_idx` (`idParroquia`),
  KEY `fk_tbl_kermesse_3_idx` (`usuario_modificacion`),
  KEY `fk_tbl_kermesse_4_idx` (`usuario_eliminacion`),
  CONSTRAINT `fk_tbl_kermesse_1` FOREIGN KEY (`usuario_creacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_kermesse_2` FOREIGN KEY (`idParroquia`) REFERENCES `tbl_parroquia` (`idParroquia`),
  CONSTRAINT `fk_tbl_kermesse_3` FOREIGN KEY (`usuario_modificacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_kermesse_4` FOREIGN KEY (`usuario_eliminacion`) REFERENCES `tbl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kermesse`
--

LOCK TABLES `tbl_kermesse` WRITE;
/*!40000 ALTER TABLE `tbl_kermesse` DISABLE KEYS */;
INSERT INTO `tbl_kermesse` VALUES (1,1,'RecoleccionGatos','2022-11-14','2022-12-03','No se que poner xd',1,1,'2022-11-14 21:48:55',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_kermesse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_listaprecio`
--

DROP TABLE IF EXISTS `tbl_listaprecio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_listaprecio` (
  `id_lista_precio` int NOT NULL AUTO_INCREMENT,
  `id_kermesse` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_lista_precio`),
  KEY `fk_tbl_lista_precio_1_idx` (`id_kermesse`),
  CONSTRAINT `fk_tbl_lista_precio_1` FOREIGN KEY (`id_kermesse`) REFERENCES `tbl_kermesse` (`id_kermesse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_listaprecio`
--

LOCK TABLES `tbl_listaprecio` WRITE;
/*!40000 ALTER TABLE `tbl_listaprecio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_listaprecio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_listaprecio_det`
--

DROP TABLE IF EXISTS `tbl_listaprecio_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_listaprecio_det` (
  `id_listaprecio_det` int NOT NULL AUTO_INCREMENT,
  `id_lista_precio` int NOT NULL,
  `id_producto` int NOT NULL,
  `precio_venta` float NOT NULL,
  PRIMARY KEY (`id_listaprecio_det`),
  KEY `fk_tbl_ListaPrecio_detalle_tbl_lista_precio1_idx` (`id_lista_precio`),
  KEY `fk_tbl_ListaPrecio_detalle_tbl_productos1_idx` (`id_producto`),
  CONSTRAINT `fk_tbl_ListaPrecio_detalle_tbl_lista_precio1` FOREIGN KEY (`id_lista_precio`) REFERENCES `tbl_listaprecio` (`id_lista_precio`),
  CONSTRAINT `fk_tbl_ListaPrecio_detalle_tbl_productos1` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_listaprecio_det`
--

LOCK TABLES `tbl_listaprecio_det` WRITE;
/*!40000 ALTER TABLE `tbl_listaprecio_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_listaprecio_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_moneda`
--

DROP TABLE IF EXISTS `tbl_moneda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_moneda` (
  `id_moneda` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `simbolo` varchar(45) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_moneda`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_moneda`
--

LOCK TABLES `tbl_moneda` WRITE;
/*!40000 ALTER TABLE `tbl_moneda` DISABLE KEYS */;
INSERT INTO `tbl_moneda` VALUES (1,'Córdobas','C$',1),(2,'Dólares','$',1),(3,'Euros','€',1);
/*!40000 ALTER TABLE `tbl_moneda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_opciones`
--

DROP TABLE IF EXISTS `tbl_opciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_opciones` (
  `id_opciones` int NOT NULL AUTO_INCREMENT,
  `opcion_descripcion` varchar(70) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_opciones`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_opciones`
--

LOCK TABLES `tbl_opciones` WRITE;
/*!40000 ALTER TABLE `tbl_opciones` DISABLE KEYS */;
INSERT INTO `tbl_opciones` VALUES (1,'GestionarUsuarios',1),(2,'VerUsuario',1),(3,'EditarUsuario',1),(4,'Inicio',1),(5,'GestionarOpcionesRol',1),(6,'AgregarRolOpcion',1),(7,'GestionarRoles',1),(8,'AgregarRol',1),(9,'EditarRol',1),(10,'VerRol',1),(11,'GestionarRolUsuario',1),(12,'EditarRolUsuario',1);
/*!40000 ALTER TABLE `tbl_opciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_parroquia`
--

DROP TABLE IF EXISTS `tbl_parroquia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_parroquia` (
  `idParroquia` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `parroco` varchar(100) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `sitio_web` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idParroquia`),
  UNIQUE KEY `idParroquia_UNIQUE` (`idParroquia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_parroquia`
--

LOCK TABLES `tbl_parroquia` WRITE;
/*!40000 ALTER TABLE `tbl_parroquia` DISABLE KEYS */;
INSERT INTO `tbl_parroquia` VALUES (1,'Pio X','Bello Horizonte','22700058','San Daniel','logo.html','gato.com');
/*!40000 ALTER TABLE `tbl_parroquia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_productos`
--

DROP TABLE IF EXISTS `tbl_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_productos` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `id_comunidad` int NOT NULL,
  `id_cat_producto` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `cantidad` int DEFAULT NULL,
  `preciov_sugerido` float NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_tbl_productos_tbl_categoria_producto1_idx` (`id_cat_producto`),
  KEY `fk_tbl_productos_1_idx` (`id_comunidad`),
  CONSTRAINT `fk_tbl_productos_1` FOREIGN KEY (`id_comunidad`) REFERENCES `tbl_comunidad` (`id_comunidad`),
  CONSTRAINT `fk_tbl_productos_tbl_categoria_producto1` FOREIGN KEY (`id_cat_producto`) REFERENCES `tbl_categoria_producto` (`id_categoria_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_productos`
--

LOCK TABLES `tbl_productos` WRITE;
/*!40000 ALTER TABLE `tbl_productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_rol`
--

DROP TABLE IF EXISTS `tbl_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_rol` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `rol_descripcion` varchar(70) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_rol`
--

LOCK TABLES `tbl_rol` WRITE;
/*!40000 ALTER TABLE `tbl_rol` DISABLE KEYS */;
INSERT INTO `tbl_rol` VALUES (1,'supreme',2),(2,'Vigilante',1);
/*!40000 ALTER TABLE `tbl_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tasacambio`
--

DROP TABLE IF EXISTS `tbl_tasacambio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tasacambio` (
  `id_tasaCambio` int NOT NULL AUTO_INCREMENT,
  `id_monedaO` int NOT NULL,
  `id_monedaC` int NOT NULL,
  `mes` varchar(15) NOT NULL,
  `anio` int NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_tasaCambio`),
  KEY `fk_tbl_tasaCambio_1_idx` (`id_monedaO`),
  KEY `fk_tbl_tasaCambio_2_idx` (`id_monedaC`),
  CONSTRAINT `fk_tbl_tasaCambio_1` FOREIGN KEY (`id_monedaO`) REFERENCES `tbl_moneda` (`id_moneda`),
  CONSTRAINT `fk_tbl_tasaCambio_2` FOREIGN KEY (`id_monedaC`) REFERENCES `tbl_moneda` (`id_moneda`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tasacambio`
--

LOCK TABLES `tbl_tasacambio` WRITE;
/*!40000 ALTER TABLE `tbl_tasacambio` DISABLE KEYS */;
INSERT INTO `tbl_tasacambio` VALUES (1,1,2,'11',22,1);
/*!40000 ALTER TABLE `tbl_tasacambio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tasacambio_det`
--

DROP TABLE IF EXISTS `tbl_tasacambio_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tasacambio_det` (
  `id_tasaCambio_det` int NOT NULL AUTO_INCREMENT,
  `id_tasaCambio` int NOT NULL,
  `fecha` date NOT NULL,
  `tipoCambio` decimal(18,4) NOT NULL,
  PRIMARY KEY (`id_tasaCambio_det`),
  KEY `fk_tasaCambio_det_1_idx` (`id_tasaCambio`),
  CONSTRAINT `fk_tasaCambio_det_1` FOREIGN KEY (`id_tasaCambio`) REFERENCES `tbl_tasacambio` (`id_tasaCambio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tasacambio_det`
--

LOCK TABLES `tbl_tasacambio_det` WRITE;
/*!40000 ALTER TABLE `tbl_tasacambio_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tasacambio_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(40) NOT NULL,
  `pwd` varchar(45) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` VALUES (1,'davidquintr','123','David','Quintanilla Ruiz','davidquintr@gmail.com',2),(2,'erickgonz','123','Erick','Gonzalez','Erick@gmail.com',1),(3,'riuskekms','123','Riuske','Nishime','riuske@gmail.com',3),(4,'davidponce','123','David','Ponce','david@gmail.com',1);
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_arqueocaja`
--

DROP TABLE IF EXISTS `vw_arqueocaja`;
/*!50001 DROP VIEW IF EXISTS `vw_arqueocaja`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_arqueocaja` AS SELECT 
 1 AS `id`,
 1 AS `kermesse`,
 1 AS `moneda`,
 1 AS `denominacion`,
 1 AS `cantidad`,
 1 AS `fechaArqueo`,
 1 AS `subtotal`,
 1 AS `granTotal`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_gastos`
--

DROP TABLE IF EXISTS `vw_gastos`;
/*!50001 DROP VIEW IF EXISTS `vw_gastos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_gastos` AS SELECT 
 1 AS `id`,
 1 AS `kermesse`,
 1 AS `categoria`,
 1 AS `fecha`,
 1 AS `concepto`,
 1 AS `monto`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_ingreso_comunidad`
--

DROP TABLE IF EXISTS `vw_ingreso_comunidad`;
/*!50001 DROP VIEW IF EXISTS `vw_ingreso_comunidad`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_ingreso_comunidad` AS SELECT 
 1 AS `id`,
 1 AS `kermesse`,
 1 AS `comunidad`,
 1 AS `producto`,
 1 AS `bono`,
 1 AS `denominacion`,
 1 AS `cantidad`,
 1 AS `subtotal_bono`,
 1 AS `cant_productos`,
 1 AS `total_bonos`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_kermesse`
--

DROP TABLE IF EXISTS `vw_kermesse`;
/*!50001 DROP VIEW IF EXISTS `vw_kermesse`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_kermesse` AS SELECT 
 1 AS `id`,
 1 AS `parroquia`,
 1 AS `nombre`,
 1 AS `fInicio`,
 1 AS `fFinal`,
 1 AS `descripcion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_listaprecio`
--

DROP TABLE IF EXISTS `vw_listaprecio`;
/*!50001 DROP VIEW IF EXISTS `vw_listaprecio`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_listaprecio` AS SELECT 
 1 AS `id`,
 1 AS `kermesse`,
 1 AS `producto`,
 1 AS `nombre`,
 1 AS `descripcion`,
 1 AS `precio_venta`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_productos`
--

DROP TABLE IF EXISTS `vw_productos`;
/*!50001 DROP VIEW IF EXISTS `vw_productos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_productos` AS SELECT 
 1 AS `id`,
 1 AS `id_comunidad`,
 1 AS `id_categoria_producto`,
 1 AS `nombre`,
 1 AS `descripcion`,
 1 AS `cantidad`,
 1 AS `preciov_sugerido`,
 1 AS `estado`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_rolopcion`
--

DROP TABLE IF EXISTS `vw_rolopcion`;
/*!50001 DROP VIEW IF EXISTS `vw_rolopcion`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_rolopcion` AS SELECT 
 1 AS `id`,
 1 AS `idRol`,
 1 AS `idOpc`,
 1 AS `rol`,
 1 AS `opcion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_rolusuario`
--

DROP TABLE IF EXISTS `vw_rolusuario`;
/*!50001 DROP VIEW IF EXISTS `vw_rolusuario`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_rolusuario` AS SELECT 
 1 AS `Id`,
 1 AS `Usuario`,
 1 AS `Nombre`,
 1 AS `Rol`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_tasacambio`
--

DROP TABLE IF EXISTS `vw_tasacambio`;
/*!50001 DROP VIEW IF EXISTS `vw_tasacambio`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_tasacambio` AS SELECT 
 1 AS `id`,
 1 AS `monedaO`,
 1 AS `monedaC`,
 1 AS `fecha`,
 1 AS `tipoCambio`,
 1 AS `mes`,
 1 AS `anio`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_usuario`
--

DROP TABLE IF EXISTS `vw_usuario`;
/*!50001 DROP VIEW IF EXISTS `vw_usuario`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_usuario` AS SELECT 
 1 AS `id`,
 1 AS `username`,
 1 AS `clave`,
 1 AS `Nombre`,
 1 AS `rol`,
 1 AS `email`,
 1 AS `estado`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_arqueocaja`
--

/*!50001 DROP VIEW IF EXISTS `vw_arqueocaja`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_arqueocaja` AS select `arq`.`id_ArqueoCaja` AS `id`,`ker`.`nombre` AS `kermesse`,`mon`.`nombre` AS `moneda`,concat(`den`.`valor`,' ',`mondem`.`simbolo`) AS `denominacion`,`arqdet`.`cantidad` AS `cantidad`,`arq`.`fechaArqueo` AS `fechaArqueo`,`arqdet`.`subtotal` AS `subtotal`,`arq`.`granTotal` AS `granTotal` from (((((`tbl_arqueocaja_det` `arqdet` join `tbl_moneda` `mon` on((`mon`.`id_moneda` = `arqdet`.`idMoneda`))) join `tbl_denominacion` `den` on((`den`.`id_Denominacion` = `arqdet`.`idDenominacion`))) join `tbl_moneda` `mondem` on((`mondem`.`id_moneda` = `den`.`idMoneda`))) join `tbl_arqueocaja` `arq` on((`arq`.`id_ArqueoCaja` = `arqdet`.`idArqueoCaja`))) join `tbl_kermesse` `ker` on((`ker`.`id_kermesse` = `arq`.`idKermesse`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_gastos`
--

/*!50001 DROP VIEW IF EXISTS `vw_gastos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_gastos` AS select `gas`.`id_registro_gastos` AS `id`,`ker`.`nombre` AS `kermesse`,`catgas`.`nombre_categoria` AS `categoria`,`gas`.`fechaGasto` AS `fecha`,`gas`.`concepto` AS `concepto`,`gas`.`monto` AS `monto` from ((`tbl_gastos` `gas` join `tbl_kermesse` `ker` on((`ker`.`id_kermesse` = `gas`.`idKermesse`))) join `tbl_categoria_gastos` `catgas` on((`catgas`.`id_categoria_gastos` = `gas`.`idCatGastos`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_ingreso_comunidad`
--

/*!50001 DROP VIEW IF EXISTS `vw_ingreso_comunidad`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_ingreso_comunidad` AS select `ingcom`.`id_ingreso_comunidad` AS `id`,`ker`.`nombre` AS `kermesse`,`com`.`nombre` AS `comunidad`,`pro`.`nombre` AS `producto`,`bon`.`nombre` AS `bono`,`ingcomdet`.`denominacion` AS `denominacion`,`ingcomdet`.`cantidad` AS `cantidad`,`ingcomdet`.`subtotal_bono` AS `subtotal_bono`,`ingcom`.`cant_productos` AS `cant_productos`,`ingcom`.`total_bonos` AS `total_bonos` from (((((`tbl_ingreso_comunidad_det` `ingcomdet` join `tbl_ingreso_comunidad` `ingcom` on((`ingcom`.`id_ingreso_comunidad` = `ingcomdet`.`id_ingreso_comunidad`))) join `tbl_kermesse` `ker` on((`ker`.`id_kermesse` = `ingcom`.`id_kermesse`))) join `tbl_comunidad` `com` on((`com`.`id_comunidad` = `ingcom`.`id_comunidad`))) join `tbl_productos` `pro` on((`pro`.`id_producto` = `ingcom`.`id_producto`))) join `tbl_control_bonos` `bon` on((`bon`.`id_bono` = `ingcomdet`.`id_bono`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_kermesse`
--

/*!50001 DROP VIEW IF EXISTS `vw_kermesse`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_kermesse` AS select `ker`.`id_kermesse` AS `id`,`par`.`nombre` AS `parroquia`,`ker`.`nombre` AS `nombre`,`ker`.`fInicio` AS `fInicio`,`ker`.`fFinal` AS `fFinal`,`ker`.`descripcion` AS `descripcion` from (`tbl_kermesse` `ker` join `tbl_parroquia` `par` on((`par`.`idParroquia` = `ker`.`idParroquia`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_listaprecio`
--

/*!50001 DROP VIEW IF EXISTS `vw_listaprecio`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_listaprecio` AS select `lisdet`.`id_listaprecio_det` AS `id`,`ker`.`nombre` AS `kermesse`,`pro`.`nombre` AS `producto`,`lis`.`nombre` AS `nombre`,`lis`.`descripcion` AS `descripcion`,`lisdet`.`precio_venta` AS `precio_venta` from (((`tbl_listaprecio_det` `lisdet` join `tbl_listaprecio` `lis` on((`lis`.`id_lista_precio` = `lisdet`.`id_lista_precio`))) join `tbl_kermesse` `ker` on((`ker`.`id_kermesse` = `lis`.`id_kermesse`))) join `tbl_productos` `pro` on((`pro`.`id_producto` = `lisdet`.`id_producto`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_productos`
--

/*!50001 DROP VIEW IF EXISTS `vw_productos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_productos` AS select `pro`.`id_producto` AS `id`,`com`.`id_comunidad` AS `id_comunidad`,`catpro`.`id_categoria_producto` AS `id_categoria_producto`,`pro`.`nombre` AS `nombre`,`pro`.`descripcion` AS `descripcion`,`pro`.`cantidad` AS `cantidad`,`pro`.`preciov_sugerido` AS `preciov_sugerido`,`pro`.`estado` AS `estado` from ((`tbl_productos` `pro` join `tbl_comunidad` `com` on((`com`.`id_comunidad` = `pro`.`id_comunidad`))) join `tbl_categoria_producto` `catpro` on((`catpro`.`id_categoria_producto` = `pro`.`id_cat_producto`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_rolopcion`
--

/*!50001 DROP VIEW IF EXISTS `vw_rolopcion`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_rolopcion` AS select `opc`.`id_rol_opciones` AS `id`,`rol`.`id_rol` AS `idRol`,`rolopc`.`id_opciones` AS `idOpc`,`rol`.`rol_descripcion` AS `rol`,`rolopc`.`opcion_descripcion` AS `opcion` from ((`tbl_rol` `rol` join `rol_opciones` `opc` on((`rol`.`id_rol` = `opc`.`tbl_rol_id_rol`))) join `tbl_opciones` `rolopc` on((`opc`.`tbl_opciones_id_opciones` = `rolopc`.`id_opciones`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_rolusuario`
--

/*!50001 DROP VIEW IF EXISTS `vw_rolusuario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_rolusuario` AS select `rolusr`.`id_rol_usuario` AS `Id`,`usr`.`usuario` AS `Usuario`,concat(`usr`.`nombres`,' ',`usr`.`apellidos`) AS `Nombre`,`rol`.`rol_descripcion` AS `Rol` from ((`rol_usuario` `rolusr` left join `tbl_usuario` `usr` on((`usr`.`id_usuario` = `rolusr`.`tbl_usuario_id_usuario`))) join `tbl_rol` `rol` on((`rol`.`id_rol` = `rolusr`.`tbl_rol_id_rol`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_tasacambio`
--

/*!50001 DROP VIEW IF EXISTS `vw_tasacambio`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_tasacambio` AS select `tasdet`.`id_tasaCambio_det` AS `id`,`mono`.`nombre` AS `monedaO`,`monc`.`nombre` AS `monedaC`,`tasdet`.`fecha` AS `fecha`,`tasdet`.`tipoCambio` AS `tipoCambio`,`tas`.`mes` AS `mes`,`tas`.`anio` AS `anio` from (((`tbl_tasacambio_det` `tasdet` join `tbl_tasacambio` `tas` on((`tas`.`id_tasaCambio` = `tasdet`.`id_tasaCambio`))) join `tbl_moneda` `mono` on((`mono`.`id_moneda` = `tas`.`id_monedaO`))) join `tbl_moneda` `monc` on((`monc`.`id_moneda` = `tas`.`id_monedaC`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_usuario`
--

/*!50001 DROP VIEW IF EXISTS `vw_usuario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_usuario` AS select `usr`.`id_usuario` AS `id`,`usr`.`usuario` AS `username`,`usr`.`pwd` AS `clave`,concat(`usr`.`nombres`,' - ',`usr`.`apellidos`) AS `Nombre`,`rol`.`rol_descripcion` AS `rol`,`usr`.`email` AS `email`,`usr`.`estado` AS `estado` from ((`tbl_usuario` `usr` join `rol_usuario` `rolusr` on((`usr`.`id_usuario` = `rolusr`.`tbl_usuario_id_usuario`))) join `tbl_rol` `rol` on((`rolusr`.`tbl_rol_id_rol` = `rol`.`id_rol`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-28 12:30:02

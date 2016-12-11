CREATE DATABASE  IF NOT EXISTS `mesh_redport` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mesh_redport`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: mesh_redport
-- ------------------------------------------------------
-- Server version	5.5.53-0+deb8u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `ipautor` varchar(45) DEFAULT NULL,
  `ubicacionX` varchar(45) DEFAULT NULL,
  `ubicacionY` varchar(45) DEFAULT NULL,
  `comentario` varchar(5000) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (1,'169753938','','','','09/12/16 - 23:48:10',NULL),(2,'169753938','-33.0505369','-71.6186749','fghfghfgh','09/12/16 - 23:48:13',NULL),(3,'169753938','','','','09/12/16 - 23:48:24',NULL),(4,'169753938','-33.0505369','-71.6186749','ghfghfhrtthrthtrth','09/12/16 - 23:48:27',NULL),(5,'169753938','-33.0505369','-71.6186749','ghfghfhrtthrthtrthfghfghfgh','09/12/16 - 23:48:31',NULL);
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `lugar` varchar(45) DEFAULT NULL,
  `alerta` varchar(45) DEFAULT NULL,
  `intensidad` varchar(45) DEFAULT NULL,
  `magnitud` varchar(45) DEFAULT NULL,
  `detalle` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='fecha - fecha\nhora - hora\ntipo - inundacion - sismo - incendio - volcan\nlugar - region o lugar esp\nalerta - temprana preventiva - amarilla - roja\nintensidad - sismos\n\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (1,'16/10/2016','21:52:01','sismo ','Valparaiso','Amarilla',NULL,'7.0','Al elaborar planes de evacuación, recuerda tener identificados niños, niñas, hombres y mujeres en situación de discapacidad'),(2,'16/10/2016','21:52:01','sismo ','Valparaiso','Amarilla',NULL,'7.0','Al elaborar planes de evacuación, recuerda tener identificados niños, niñas, hombres y mujeres en situación de discapacidad'),(3,'16/10/2016','21:52:01','sismo ','Valparaiso','Amarilla',NULL,'7.0','Al elaborar planes de evacuación, recuerda tener identificados niños, niñas, hombres y mujeres en situación de discapacidad');
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `familia`
--

DROP TABLE IF EXISTS `familia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `familia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) DEFAULT NULL COMMENT '0 - niño\n1- adulto\n2- 3era edad\n3- embarazada',
  `familiar` varchar(45) NOT NULL COMMENT 'referencia a personas.ip',
  `estado` varchar(45) NOT NULL DEFAULT '0' COMMENT '0 OK\n1 HERIDO\n2 ATRAPADO\n3 CRONICO\n4 FALLECIDO\n\n"0" - "1" - "23" - "1234" - "134"',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `familia`
--

LOCK TABLES `familia` WRITE;
/*!40000 ALTER TABLE `familia` DISABLE KEYS */;
INSERT INTO `familia` VALUES (1,1,'169753911','1234'),(2,0,'169753911','123'),(3,1,'169753911','4'),(4,1,'169753911','4'),(5,3,'169753888','4'),(6,1,'169753911','1'),(7,3,'169753911','4'),(8,1,'169753947','4'),(9,0,'169753947','2'),(10,3,'169753888','32'),(11,0,'169753918',''),(12,3,'169753911',''),(13,0,'169753947',''),(14,2,'169753938','23'),(15,0,'169753938','');
/*!40000 ALTER TABLE `familia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registroIP` int(11) NOT NULL COMMENT 'ip o mac address',
  `cord1` varchar(45) DEFAULT NULL,
  `cord2` varchar(45) DEFAULT NULL,
  `dateLogin` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT '0' COMMENT '0 OK\n1 HERIDO\n2 ATRAPADO\n3 CRONICO\n\n"0" - "1" - "23" - "123" - "13"',
  `detalle` varchar(500) NOT NULL,
  PRIMARY KEY (`id`,`registroIP`,`detalle`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (9,169753911,'-33.0267243','-71.5823634','05/11/16 - 23:10:56','1','1','Mozilla/5.0 (Linux; Android 5.0.2; SM-A300YZ Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(2,169753947,'0.11','0.11','05/11/16 - 20:43:52','0','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),(13,169753911,'-33.0267597','-71.582317','05/11/16 - 23:33:41',NULL,'0','Mozilla/5.0 (Linux; Android 5.0.2; SM-A300YZ Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(12,169753911,'-33.0267243','-71.5823634','05/11/16 - 23:17:58',NULL,'0','Mozilla/5.0 (Linux; Android 5.0.2; SM-A300YZ Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(5,169753888,'-33.0267243','-71.5823634','05/11/16 - 21:11:35','1','0','Mozilla/5.0 (Linux; Android 6.0.1; Moto G (4) Build/MPJ24.139-23.4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(11,169753918,'.1','.1','05/11/16 - 23:26:41','1','2','Mozilla/5.0 (Linux; U; Android 4.1; en-us; GT-N7100 Build/JRO03C) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30'),(10,169753947,'0.111','0.111','05/11/16 - 23:29:35','0','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),(8,169753911,'-33.0267243','-71.5823634','05/11/16 - 22:44:12','1','1','Mozilla/5.0 (Linux; Android 5.0.2; SM-A300YZ Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(14,169753911,'-33.0266632','-71.5823747','05/11/16 - 23:38:02',NULL,'0','Mozilla/5.0 (Linux; Android 5.0.2; SM-A300YZ Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(15,169753888,'-33.0268092','-71.5823634','05/11/16 - 23:38:23',NULL,'0','Mozilla/5.0 (Linux; Android 6.0.1; Moto G (4) Build/MPJ24.139-23.4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(16,169753911,'-33.0267597','-71.582317','06/11/16 - 00:33:42',NULL,'0','Mozilla/5.0 (Linux; Android 5.0.2; SM-A300YZ Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(17,169753888,'-33.0268092','-71.5823634','06/11/16 - 01:29:54',NULL,'0','Mozilla/5.0 (Linux; Android 6.0.1; Moto G (4) Build/MPJ24.139-23.4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(18,169753888,'-33.0260592','-71.5818998','06/11/16 - 01:42:12',NULL,'0','Mozilla/5.0 (Linux; Android 6.0.1; Moto G (4) Build/MPJ24.139-23.4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(19,169753947,'.1','.1','06/11/16 - 02:21:34',NULL,'0','Mozilla/5.0 (Linux; U; Android 4.1; en-us; GT-N7100 Build/JRO03C) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30'),(20,169753888,'-33.0268092','-71.5823634','06/11/16 - 02:35:09',NULL,'0','Mozilla/5.0 (Linux; Android 6.0.1; Moto G (4) Build/MPJ24.139-23.4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(21,169753947,'-33.038358099999996','-71.645014','04/12/16 - 16:31:16','0','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),(22,169753938,'-33.0489906','-71.61380729999999','04/12/16 - 16:34:19',NULL,'0','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),(23,169753947,'-33.038330699999996','-71.6449945','04/12/16 - 16:34:49','0','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),(24,169753911,'-33.0382977','-71.6451324','04/12/16 - 16:37:26',NULL,'0','Mozilla/5.0 (Linux; Android 5.0.2; SM-A300YZ Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(25,169753947,'','','04/12/16 - 18:17:37',NULL,'0','Mozilla/5.0 (Linux; U; Android 4.1; en-us; GT-N7100 Build/JRO03C) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30'),(26,169753947,'','','04/12/16 - 18:17:40',NULL,'0','Mozilla/5.0 (Linux; U; Android 4.1; en-us; GT-N7100 Build/JRO03C) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30'),(27,169753947,'-1','1','04/12/16 - 18:24:24',NULL,'0','Mozilla/5.0 (Linux; U; Android 4.1; en-us; GT-N7100 Build/JRO03C) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30'),(28,0,'','','08/12/16 - 12:17:15',NULL,'0','Mozilla/5.0 (Linux; Android 6.0.1; Moto G (4) Build/MPJ24.139-23.4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(29,169753888,'-33.0267243','-71.5823634','08/12/16 - 12:18:23',NULL,'0','Mozilla/5.0 (Linux; Android 6.0.1; Moto G (4) Build/MPJ24.139-23.4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(30,169753888,'-33.0267597','-71.582317','08/12/16 - 12:18:13',NULL,'0','Mozilla/5.0 (Linux; Android 6.0.1; Moto G (4) Build/MPJ24.139-23.4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(31,169753911,'-33.0267597','-71.582317','08/12/16 - 12:18:39','1','0','Mozilla/5.0 (Linux; Android 5.0.2; SM-A300YZ Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.84 Mobile Safari/537.36'),(32,169754104,'-33.0267243','-71.5823634','08/12/16 - 12:21:03','1','0','Mozilla/5.0 (Linux; Android 5.0.1; ALE-L23 Build/HuaweiALE-L23) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(33,169754104,'-33.0267384','-71.5824561','08/12/16 - 12:21:42','1','0','Mozilla/5.0 (Linux; Android 5.0.1; ALE-L23 Build/HuaweiALE-L23) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(34,169754104,'-32.9700483','-71.5292483','08/12/16 - 12:43:20','1','0','Mozilla/5.0 (Linux; Android 5.0.1; ALE-L23 Build/HuaweiALE-L23) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(35,169754104,'-32.9700868','-71.5293171','08/12/16 - 13:29:16','1','0','Mozilla/5.0 (Linux; Android 5.0.1; ALE-L23 Build/HuaweiALE-L23) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(36,0,'','','08/12/16 - 13:36:20',NULL,'0','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),(37,169753947,'0.1','0.1','08/12/16 - 13:37:28','0','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),(38,169754104,'-32.9700483','-71.5292497','08/12/16 - 13:38:42','1','0','Mozilla/5.0 (Linux; Android 5.0.1; ALE-L23 Build/HuaweiALE-L23) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(39,169754104,'-32.9700497','-71.5292486','08/12/16 - 13:48:40','1','0','Mozilla/5.0 (Linux; Android 5.0.1; ALE-L23 Build/HuaweiALE-L23) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(40,169754104,'-32.9700489','-71.52925','08/12/16 - 16:33:56',NULL,'0','Mozilla/5.0 (Linux; Android 5.0.1; ALE-L23 Build/HuaweiALE-L23) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(41,-1100226004,'-32.9701518','-71.5288569','08/12/16 - 18:14:48','1','12','Mozilla/5.0 (Linux; Android 5.0.1; ALE-L23 Build/HuaweiALE-L23) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(42,-906948463,'-32.9701518','-71.5288569','08/12/16 - 18:15:18',NULL,'0','Mozilla/5.0 (Linux; Android 6.0.1; Moto G (4) Build/MPJ24.139-23.4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(43,-906948463,'-32.970082440027596','-71.52881210330499','08/12/16 - 19:25:12','1','0','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/602.2.14 (KHTML, like Gecko) Version/10.0.1 Safari/602.2.14'),(44,-906948463,'-32.9701518','-71.5288569','08/12/16 - 19:29:57',NULL,'0','Mozilla/5.0 (Linux; Android 6.0.1; Moto G (4) Build/MPJ24.139-23.4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(45,-906948463,'-32.9701518','-71.5288569','08/12/16 - 19:30:43',NULL,'0','Mozilla/5.0 (Linux; Android 6.0.1; Moto G (4) Build/MPJ24.139-23.4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36'),(46,169753938,'-33.0505369','-71.6186749','09/12/16 - 20:21:13',NULL,'0','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),(47,169753938,'-33.0505369','-71.6186749','09/12/16 - 20:21:35',NULL,'0','Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.23 Mobile Safari/537.36'),(48,169753938,'-33.0505369','-71.6186749','09/12/16 - 23:44:44',NULL,'0','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36'),(49,169753938,'-33.0505369','-71.6186749','09/12/16 - 23:47:50','3','0','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.23 Mobile Safari/537.36'),(50,169753938,'-33.0505369','-71.6186749','10/12/16 - 00:01:01','3','0','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.23 Mobile Safari/537.36');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sensores`
--

DROP TABLE IF EXISTS `sensores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sensores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL COMMENT '0 temperatura\n1 humedad\n2 uv\n3 barometrico',
  `valor` varchar(45) DEFAULT NULL COMMENT '//probar y pasar a double',
  `fecha` varchar(45) DEFAULT NULL COMMENT 'DD/MM/YYYY - HH:MM:SS',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensores`
--

LOCK TABLES `sensores` WRITE;
/*!40000 ALTER TABLE `sensores` DISABLE KEYS */;
INSERT INTO `sensores` VALUES (1,'Temperatura','21.54','08/12/2016 12:30:03'),(2,'Humedad','62.68','08/12/2016 12:30:03'),(3,'UV','-0.01','08/12/2016 12:30:03'),(4,'Temperatura','21.95','08/12/2016 12:45:16'),(5,'Humedad','62.54','08/12/2016 12:45:16'),(6,'UV','-0.01','08/12/2016 12:45:16'),(7,'Temperatura','22.35','08/12/2016 12:30:02'),(8,'Humedad','62.09','08/12/2016 12:30:02'),(9,'UV','0.01','08/12/2016 12:30:02'),(10,'Temperatura','20.87','08/12/2016 12:30:03'),(11,'Humedad','63.13','08/12/2016 12:30:03'),(12,'UV','0.02','08/12/2016 12:30:03'),(13,'Temperatura','20.53','08/12/2016 12:45:02'),(14,'Humedad','61.88','08/12/2016 12:45:03'),(15,'UV','0.02','08/12/2016 12:45:03'),(16,'Temperatura','20.69','08/12/2016 13:00:02'),(17,'Humedad','61.76','08/12/2016 13:00:02'),(18,'UV','0.02','08/12/2016 13:00:02'),(19,'Temperatura','20.92','08/12/2016 13:15:02'),(20,'Humedad','63.02','08/12/2016 13:15:02'),(21,'UV','0.02','08/12/2016 13:15:02'),(22,'Temperatura','21.13','08/12/2016 13:30:02'),(23,'Humedad','63.28','08/12/2016 13:30:02'),(24,'UV','0.02','08/12/2016 13:30:02'),(25,'Temperatura','21.32','08/12/2016 13:45:02'),(26,'Humedad','63.28','08/12/2016 13:45:02'),(27,'UV','0.00','08/12/2016 13:45:02'),(28,'Temperatura','21.61','08/12/2016 14:00:02'),(29,'Humedad','63.50','08/12/2016 14:00:02'),(30,'UV','0.01','08/12/2016 14:00:02'),(31,'Temperatura','21.65','08/12/2016 16:30:03'),(32,'Humedad','64.11','08/12/2016 16:30:04'),(33,'UV','0.02','08/12/2016 16:30:04');
/*!40000 ALTER TABLE `sensores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vivienda`
--

DROP TABLE IF EXISTS `vivienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vivienda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcreador` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fugas` varchar(45) DEFAULT NULL,
  `albergue` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vivienda`
--

LOCK TABLES `vivienda` WRITE;
/*!40000 ALTER TABLE `vivienda` DISABLE KEYS */;
INSERT INTO `vivienda` VALUES (1,'169753888','0','0','on','1','10/12/16 - 00:40:35'),(2,'169753888','0','1','on','1','10/12/16 - 00:41:06'),(3,'169753888','0','1','on','0','10/12/16 - 00:41:17'),(4,'169753888','1','0','on','1','10/12/16 - 00:42:19'),(5,'169753888','0','3','1','1','10/12/16 - 00:43:17'),(6,'169753888','0','3','1','1','10/12/16 - 01:01:16'),(7,'169753888','1','0','1','0','10/12/16 - 01:02:48'),(8,'169753888','0','3','1','0','10/12/16 - 01:06:41'),(9,'169753888','1','3','1','0','10/12/16 - 01:07:09'),(10,'169753888','0','0','1','1','10/12/16 - 01:09:14'),(11,'169753888','0','0','1','1','10/12/16 - 01:09:27'),(12,'169753888','0','0','0','0','10/12/16 - 01:12:44');
/*!40000 ALTER TABLE `vivienda` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-10  1:15:08

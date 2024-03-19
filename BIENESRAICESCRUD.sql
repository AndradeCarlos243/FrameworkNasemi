CREATE DATABASE  IF NOT EXISTS `bienesraices_crud` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bienesraices_crud`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: bienesraices_crud
-- ------------------------------------------------------
-- Server version	8.2.0

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
-- Table structure for table `propiedades`
--

DROP TABLE IF EXISTS `propiedades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propiedades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `descripcion` longtext,
  `habitaciones` int DEFAULT NULL,
  `wc` int DEFAULT NULL,
  `estacionamiento` int DEFAULT NULL,
  `creado` date DEFAULT NULL,
  `vendedores_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_propiedades_vendedores_idx` (`vendedores_id`),
  CONSTRAINT `fk_propiedades_vendedores` FOREIGN KEY (`vendedores_id`) REFERENCES `vendedores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propiedades`
--

LOCK TABLES `propiedades` WRITE;
/*!40000 ALTER TABLE `propiedades` DISABLE KEYS */;
INSERT INTO `propiedades` VALUES (1,'Casa en la playa con arboles',200000.00,NULL,'Casa en la playa color vino',3,3,3,NULL,1),(2,'Casa en la playa con piñas',30000.00,NULL,'Casa poderosa en Japón',3,3,3,NULL,1),(3,'Casa en la playa con arboles de cerezo',300000.00,NULL,'Casa en japón con árboles de cerezo Casa en japón con árboles de cerezo Casa en japón con árboles de cerezo Casa en japón con árboles de cerezo Casa en japón con árboles de cerezo Casa en japón con árboles de cerezo Casa en japón con árboles de cerezo ',3,3,3,NULL,1),(4,'Casa en la playa con arboles de limón',300000.00,NULL,'Casa en la playa con arboles de limón Casa en la playa con arboles de limón Casa en la playa con arboles de limón Casa en la playa con arboles de limón',3,3,3,'2024-01-22',2),(5,'Casa en la playa con arboles de piña',300000.00,NULL,'Casa en la playa con arboles de limón Casa en la playa con arboles de limón Casa en la playa con arboles de limón Casa en la playa con arboles de limón',3,3,3,'2024-01-22',1),(6,'Casa en la playa con arboles de sandía',3000000.00,'e819729ac483a4a215a350e76af693a0.jpg','Casa en el bosque de la china, donde la chinita se perdió, y como yo andaba perdido nos encontramos  los dos, bajo el cielo de la china, la chinita se perdió',3,3,3,'2024-01-23',1),(7,'Casa en la playa con arboles de toronja',3000000.00,'f7f56b4cf1a08e5c569bd19e2211767b.jpg','TORONJA TORONJA TORONJA TORONJA TORONJA TORONJA TORONJA TORONJA TORONJA TORONJA TORONJA TORONJA TORONJA TORONJA TORONJA TORONJA TORONJA ',3,3,3,'2024-01-23',1),(8,'Casa en la playa con arboles de sandía verde',3500000.00,'f9ac4d5825da78a4fb84d8896e0b903a.jpg','SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA SANDIA ',3,3,3,'2024-01-23',1),(9,'Casa en la playa con arboles',200000.00,'377d69f6b034a9fb7768ad781b305ca4.jpg','Casa en la playa color vino Casa en la playa color vinoCasa en la playa color vinoCasa en la playa color vinoCasa en la playa color vinoCasa en la playa color vinoCasa en la playa color vinoCasa en la playa color vinoCasa en la playa color vino',3,3,3,'2024-01-24',1);
/*!40000 ALTER TABLE `propiedades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendedores`
--

DROP TABLE IF EXISTS `vendedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendedores`
--

LOCK TABLES `vendedores` WRITE;
/*!40000 ALTER TABLE `vendedores` DISABLE KEYS */;
INSERT INTO `vendedores` VALUES (1,'Carlos','Andrade','2282929616'),(2,'Ana','Hernández','2282929617');
/*!40000 ALTER TABLE `vendedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bienesraices_crud'
--

--
-- Dumping routines for database 'bienesraices_crud'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-19  1:22:57

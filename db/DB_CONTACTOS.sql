-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: DB_CONTACTOS
-- ------------------------------------------------------
-- Server version	5.5.49-0+deb8u1

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
-- Table structure for table `CARGOS`
--

DROP TABLE IF EXISTS `CARGOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CARGOS` (
  `id_cargo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CARGOS`
--

LOCK TABLES `CARGOS` WRITE;
/*!40000 ALTER TABLE `CARGOS` DISABLE KEYS */;
INSERT INTO `CARGOS` VALUES (1,'Encargado'),(2,'Jefe Proyecto');
/*!40000 ALTER TABLE `CARGOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CONTACTOS`
--

DROP TABLE IF EXISTS `CONTACTOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CONTACTOS` (
  `rut` varchar(10) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `id_cargo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CONTACTOS`
--

LOCK TABLES `CONTACTOS` WRITE;
/*!40000 ALTER TABLE `CONTACTOS` DISABLE KEYS */;
INSERT INTO `CONTACTOS` VALUES ('1212','Juana Nieves 2','w@w.com','123123',1),('16234543-3','Ricardo Uriel 2','rick@gmail.us','8896337',1),('17832323-5','Juana Nieves 2','j.nieves@gmail.us','9872937',2),('18323434-3','Jon Snow','jon@gmail.us','9292137',0);
/*!40000 ALTER TABLE `CONTACTOS` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-20 15:38:05

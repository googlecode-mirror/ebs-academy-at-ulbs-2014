CREATE DATABASE  IF NOT EXISTS `ULBSPlatform` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ULBSPlatform`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: ULBSPlatform
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `Examen`
--

DROP TABLE IF EXISTS `Examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Examen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDGRUPA` int(11) NOT NULL,
  `IDMATERIE` int(11) NOT NULL,
  `DATA` datetime NOT NULL,
  `TIP_EXAMEN` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Examen`
--

LOCK TABLES `Examen` WRITE;
/*!40000 ALTER TABLE `Examen` DISABLE KEYS */;
/*!40000 ALTER TABLE `Examen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Grupa`
--

DROP TABLE IF EXISTS `Grupa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Grupa` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NUME` varchar(50) NOT NULL,
  `AN` int(11) NOT NULL,
  `SEF_GRUPA` varchar(50) DEFAULT NULL,
  `PROFIL` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Grupa`
--

LOCK TABLES `Grupa` WRITE;
/*!40000 ALTER TABLE `Grupa` DISABLE KEYS */;
INSERT INTO `Grupa` VALUES (1,'ebs',3,'asd','calc'),(2,'web',2,'Contiu Ioan','fvc'),(3,'e foarte bine1',23,'ef','23'),(4,'222',2,'dani cine altul?','calculatoare'),(5,'gvhb',3,'hbj','gvhbj'),(6,'hj',3,'hjk','bjk'),(7,'bjmn ',4,'hbnjmk,','nm'),(12,'test',1,NULL,'test'),(13,'test',1,NULL,'test');
/*!40000 ALTER TABLE `Grupa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Intrebare`
--

DROP TABLE IF EXISTS `Intrebare`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Intrebare` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TEST` int(11) DEFAULT NULL,
  `INTREBAREA` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `TIP_INTREBARE` enum('grila','scris','vot') CHARACTER SET latin1 NOT NULL,
  `PUNCTAJ_INTREBARE` float DEFAULT NULL,
  `DATA_MODIFICARII` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `tip_punctaj` (`TIP_INTREBARE`,`PUNCTAJ_INTREBARE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Intrebare`
--

LOCK TABLES `Intrebare` WRITE;
/*!40000 ALTER TABLE `Intrebare` DISABLE KEYS */;
/*!40000 ALTER TABLE `Intrebare` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Materii`
--

DROP TABLE IF EXISTS `Materii`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Materii` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) DEFAULT NULL,
  `CREDITE` int(11) DEFAULT NULL,
  `DENUMIRE` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_USER` (`ID_USER`),
  CONSTRAINT `ID_USER` FOREIGN KEY (`ID_USER`) REFERENCES `User` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Materii`
--

LOCK TABLES `Materii` WRITE;
/*!40000 ALTER TABLE `Materii` DISABLE KEYS */;
/*!40000 ALTER TABLE `Materii` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Materii_Grupe`
--

DROP TABLE IF EXISTS `Materii_Grupe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Materii_Grupe` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MATERIE` int(11) DEFAULT NULL,
  `ID_GRUPA` int(11) DEFAULT NULL,
  `SEMESTRU` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_MATERIE` (`ID_MATERIE`),
  KEY `ID_GRUPA` (`ID_GRUPA`),
  CONSTRAINT `ID_GRUPA` FOREIGN KEY (`ID_GRUPA`) REFERENCES `Grupa` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ID_MATERIE` FOREIGN KEY (`ID_MATERIE`) REFERENCES `Materii` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Materii_Grupe`
--

LOCK TABLES `Materii_Grupe` WRITE;
/*!40000 ALTER TABLE `Materii_Grupe` DISABLE KEYS */;
/*!40000 ALTER TABLE `Materii_Grupe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Prezenta`
--

DROP TABLE IF EXISTS `Prezenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Prezenta` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MATERIE` int(11) NOT NULL,
  `DATA` date NOT NULL,
  `TIP_PREZENTA` varchar(1) CHARACTER SET dec8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Prezenta`
--

LOCK TABLES `Prezenta` WRITE;
/*!40000 ALTER TABLE `Prezenta` DISABLE KEYS */;
/*!40000 ALTER TABLE `Prezenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Prezenta_User`
--

DROP TABLE IF EXISTS `Prezenta_User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Prezenta_User` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PREZENTA` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_PREZENTA_idx` (`ID_PREZENTA`),
  CONSTRAINT `ID_PREZENTA` FOREIGN KEY (`ID_PREZENTA`) REFERENCES `Prezenta` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Prezenta_User`
--

LOCK TABLES `Prezenta_User` WRITE;
/*!40000 ALTER TABLE `Prezenta_User` DISABLE KEYS */;
/*!40000 ALTER TABLE `Prezenta_User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Raspunsuri`
--

DROP TABLE IF EXISTS `Raspunsuri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Raspunsuri` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_INTREBARE` int(11) DEFAULT NULL,
  `RASPUNS` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `CORECT` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Raspunsuri`
--

LOCK TABLES `Raspunsuri` WRITE;
/*!40000 ALTER TABLE `Raspunsuri` DISABLE KEYS */;
/*!40000 ALTER TABLE `Raspunsuri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Teme_Licenta`
--

DROP TABLE IF EXISTS `Teme_Licenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Teme_Licenta` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MATERIE` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `DENUMIRE_TEMA` varchar(50) DEFAULT NULL,
  `DESCRIERE_TEMA` varchar(500) DEFAULT NULL,
  `ID_GRUPA` int(11) DEFAULT NULL,
  `LOCURI_DISPONIBILE` tinyint(2) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `GRUPA_idx` (`ID_GRUPA`),
  KEY `LICENTA_MATERIE_idx` (`ID_MATERIE`),
  KEY `LICENTA_USER_idx` (`ID_USER`),
  CONSTRAINT `LICENTA_GRUPA` FOREIGN KEY (`ID_GRUPA`) REFERENCES `Grupa` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `LICENTA_MATERIE` FOREIGN KEY (`ID_MATERIE`) REFERENCES `Materii` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `LICENTA_USER` FOREIGN KEY (`ID_USER`) REFERENCES `User` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Teme_Licenta`
--

LOCK TABLES `Teme_Licenta` WRITE;
/*!40000 ALTER TABLE `Teme_Licenta` DISABLE KEYS */;
/*!40000 ALTER TABLE `Teme_Licenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Test`
--

DROP TABLE IF EXISTS `Test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Test` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MATERIE` int(11) DEFAULT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `DENUMIRE` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `TIP` enum('grila','scris','vot') CHARACTER SET latin1 DEFAULT NULL,
  `DESCRIERE` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `DATA` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Test`
--

LOCK TABLES `Test` WRITE;
/*!40000 ALTER TABLE `Test` DISABLE KEYS */;
/*!40000 ALTER TABLE `Test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(100) CHARACTER SET latin1 NOT NULL,
  `PAROLA` varchar(32) CHARACTER SET latin1 NOT NULL,
  `NUME` varchar(100) CHARACTER SET latin1 NOT NULL,
  `PRENUME` varchar(100) CHARACTER SET latin1 NOT NULL,
  `TIP` enum('student','profesor','admin') CHARACTER SET latin1 NOT NULL,
  `DATAADAUGARII` date NOT NULL,
  `STATUS` enum('ACTIV','DEL','SUS','NEW','NEW_PASS') CHARACTER SET latin1 NOT NULL,
  `FORGOT_PASS_TOKEN` varchar(26) DEFAULT NULL,
  `FORGOT_PASS_EXPIRATION_DATE` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `email` (`EMAIL`),
  KEY `tip` (`TIP`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'test','test','test','test','profesor','0000-00-00','ACTIV',NULL,NULL),(2,'icontiu@gmail.com','asdasd','Contiu','Ioan','admin','2015-02-06','ACTIV','','2015-02-18'),(3,'nik_dik_27@yahoo.com','qwerty','Bisceanu','daniel','student','2015-02-17','ACTIV',NULL,NULL);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User_Grupa`
--

DROP TABLE IF EXISTS `User_Grupa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User_Grupa` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) NOT NULL,
  `ID_GRUPA` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_USER_GRUPA_idx` (`ID_USER`),
  KEY `ID_GRUPA_GRUPA_idx` (`ID_GRUPA`),
  CONSTRAINT `ID_GRUPA_GRUPA` FOREIGN KEY (`ID_GRUPA`) REFERENCES `Grupa` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ID_USER_GRUPA` FOREIGN KEY (`ID_USER`) REFERENCES `User` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User_Grupa`
--

LOCK TABLES `User_Grupa` WRITE;
/*!40000 ALTER TABLE `User_Grupa` DISABLE KEYS */;
INSERT INTO `User_Grupa` VALUES (1,1,2),(2,2,2);
/*!40000 ALTER TABLE `User_Grupa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User_Raspuns`
--

DROP TABLE IF EXISTS `User_Raspuns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User_Raspuns` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER_TEST` int(11) DEFAULT NULL,
  `RASPUNSUL` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `PUNCTAJ_OBTINUT` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User_Raspuns`
--

LOCK TABLES `User_Raspuns` WRITE;
/*!40000 ALTER TABLE `User_Raspuns` DISABLE KEYS */;
/*!40000 ALTER TABLE `User_Raspuns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User_Test`
--

DROP TABLE IF EXISTS `User_Test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User_Test` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) DEFAULT NULL,
  `ID_TEST` int(11) DEFAULT NULL,
  `PUNCTAJ` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `DATA` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User_Test`
--

LOCK TABLES `User_Test` WRITE;
/*!40000 ALTER TABLE `User_Test` DISABLE KEYS */;
/*!40000 ALTER TABLE `User_Test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'ULBSPlatform'
--

--
-- Dumping routines for database 'ULBSPlatform'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-18 22:30:05

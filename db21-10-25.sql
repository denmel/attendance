-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: localhost    Database: kindergarten
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `absent`
--

DROP TABLE IF EXISTS `absent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `absent` (
  `id_absent` int(11) NOT NULL AUTO_INCREMENT,
  `id_child` int(11) NOT NULL,
  `absent_date` date NOT NULL,
  `absent_type` int(11) DEFAULT 1,
  PRIMARY KEY (`id_absent`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=koi8r COLLATE=koi8r_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absent`
--

LOCK TABLES `absent` WRITE;
/*!40000 ALTER TABLE `absent` DISABLE KEYS */;
INSERT INTO `absent` VALUES (1,1,'2025-10-01',1);
/*!40000 ALTER TABLE `absent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `children`
--

DROP TABLE IF EXISTS `children`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `children` (
  `id_child` int(11) NOT NULL AUTO_INCREMENT,
  `child_name` text NOT NULL,
  `id_group` int(11) NOT NULL,
  `child_birth` date NOT NULL,
  `date_in` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  PRIMARY KEY (`id_child`),
  KEY `id_group` (`id_group`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=koi8r COLLATE=koi8r_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `children`
--

LOCK TABLES `children` WRITE;
/*!40000 ALTER TABLE `children` DISABLE KEYS */;
INSERT INTO `children` VALUES (1,'Иванов Иван',2,'0000-00-00',NULL,NULL),(2,'Петров Петр',1,'0000-00-00',NULL,NULL),(3,'Айтбаева Ясмина',1,'0000-00-00',NULL,NULL),(4,'Бабенко Тимофей',2,'0000-00-00',NULL,NULL),(5,'Голушко Арина',1,'0000-00-00',NULL,NULL),(6,'Заикин Данила',2,'0000-00-00',NULL,NULL),(7,'Заруцкая Самира',1,'0000-00-00',NULL,NULL),(8,'Клеменков Глеб',2,'0000-00-00',NULL,NULL),(9,'Леонтьев Ярослав',1,'0000-00-00',NULL,NULL),(10,'Миняева Анна',2,'0000-00-00',NULL,NULL),(11,'Муратшина Амалия',1,'0000-00-00',NULL,NULL),(12,'Мусин Ильназ',2,'0000-00-00',NULL,NULL),(13,'Сухарев Артем',1,'0000-00-00',NULL,NULL),(14,'Туктаназаров Дамиль',1,'0000-00-00',NULL,NULL),(15,'Хамзин Данил',2,'0000-00-00',NULL,NULL);
/*!40000 ALTER TABLE `children` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_user`
--

DROP TABLE IF EXISTS `group_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `group_user` (
  `id_group_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_group_user`)
) ENGINE=InnoDB DEFAULT CHARSET=koi8r COLLATE=koi8r_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_user`
--

LOCK TABLES `group_user` WRITE;
/*!40000 ALTER TABLE `group_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `groups` (
  `id_group` int(11) NOT NULL AUTO_INCREMENT,
  `group_num` int(11) NOT NULL,
  `group_year` int(11) NOT NULL,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=koi8r COLLATE=koi8r_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,3,2024),(2,8,2023);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `holidays`
--

DROP TABLE IF EXISTS `holidays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `holidays` (
  `id_holidays` int(11) NOT NULL AUTO_INCREMENT,
  `holidays_date` varchar(45) NOT NULL,
  `holiday` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`id_holidays`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=koi8r COLLATE=koi8r_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `holidays`
--

LOCK TABLES `holidays` WRITE;
/*!40000 ALTER TABLE `holidays` DISABLE KEYS */;
INSERT INTO `holidays` VALUES (1,'2025-10-13',1),(2,'2025-10-05',0),(3,'2025-10-14',1);
/*!40000 ALTER TABLE `holidays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parents_children`
--

DROP TABLE IF EXISTS `parents_children`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parents_children` (
  `id_parents_children` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_child` int(11) NOT NULL,
  PRIMARY KEY (`id_parents_children`),
  KEY `id_user` (`id_user`,`id_child`)
) ENGINE=InnoDB DEFAULT CHARSET=koi8r COLLATE=koi8r_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parents_children`
--

LOCK TABLES `parents_children` WRITE;
/*!40000 ALTER TABLE `parents_children` DISABLE KEYS */;
/*!40000 ALTER TABLE `parents_children` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` text NOT NULL,
  `id_usertype` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `user_name` (`user_name`(3072)),
  KEY `id_usertype` (`id_usertype`),
  KEY `user_name_2` (`user_name`(3072)),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_usertype`) REFERENCES `usertype` (`id_usertype`)
) ENGINE=InnoDB DEFAULT CHARSET=koi8r COLLATE=koi8r_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usertype` (
  `id_usertype` int(11) NOT NULL AUTO_INCREMENT,
  `usertype_name` int(11) NOT NULL,
  `usertype_privileges` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`usertype_privileges`)),
  PRIMARY KEY (`id_usertype`),
  KEY `id_usertype` (`id_usertype`)
) ENGINE=InnoDB DEFAULT CHARSET=koi8r COLLATE=koi8r_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertype`
--

LOCK TABLES `usertype` WRITE;
/*!40000 ALTER TABLE `usertype` DISABLE KEYS */;
/*!40000 ALTER TABLE `usertype` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-21 22:42:28

-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: db_flavia
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `tb_users_passwords_recoveries`
--

DROP TABLE IF EXISTS `tb_users_passwords_recoveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_users_passwords_recoveries` (
  `id_recovery` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `des_ip` varchar(45) NOT NULL,
  `dt_recovery` datetime DEFAULT NULL,
  `dt_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_recovery`),
  KEY `fk_userspasswordsrecoveries_users_idx` (`id_user`),
  CONSTRAINT `fk_userspasswordsrecoveries_users` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_users_passwords_recoveries`
--

LOCK TABLES `tb_users_passwords_recoveries` WRITE;
/*!40000 ALTER TABLE `tb_users_passwords_recoveries` DISABLE KEYS */;
INSERT INTO `tb_users_passwords_recoveries` VALUES (1,1,'127.0.0.1',NULL,'2020-08-29 20:02:33'),(2,1,'127.0.0.1',NULL,'2020-08-29 20:09:55'),(3,1,'127.0.0.1',NULL,'2020-08-29 20:10:42'),(4,1,'127.0.0.1',NULL,'2020-08-29 20:11:07'),(5,1,'127.0.0.1',NULL,'2020-08-29 20:14:00'),(6,1,'127.0.0.1',NULL,'2020-08-29 20:15:09'),(7,1,'127.0.0.1',NULL,'2020-08-29 20:15:23'),(8,1,'127.0.0.1',NULL,'2020-08-29 20:16:09'),(9,1,'127.0.0.1',NULL,'2020-08-29 20:21:51'),(10,1,'127.0.0.1',NULL,'2020-08-29 20:25:13'),(11,1,'127.0.0.1','2020-08-29 22:39:50','2020-08-30 01:06:31'),(12,1,'127.0.0.1','2020-08-29 22:48:40','2020-08-30 01:47:25'),(13,10,'127.0.0.1',NULL,'2020-09-08 00:28:09'),(14,10,'127.0.0.1','2020-09-07 21:33:25','2020-09-08 00:29:52'),(15,10,'127.0.0.1','2020-09-07 21:39:21','2020-09-08 00:36:51'),(16,10,'127.0.0.1',NULL,'2020-09-08 01:16:44'),(17,10,'127.0.0.1',NULL,'2020-09-08 01:21:03');
/*!40000 ALTER TABLE `tb_users_passwords_recoveries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-09 23:48:47

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
-- Table structure for table `tb_carts`
--

DROP TABLE IF EXISTS `tb_carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_carts` (
  `id_cart` int NOT NULL AUTO_INCREMENT,
  `des_session_id` varchar(64) NOT NULL,
  `id_user` int DEFAULT NULL,
  `des_zipcode` char(8) DEFAULT NULL,
  `vl_freight` decimal(10,2) DEFAULT NULL,
  `nr_days` int DEFAULT NULL,
  `dt_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cart`),
  KEY `FK_carts_users_idx` (`id_user`),
  CONSTRAINT `fk_carts_users` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_carts`
--

LOCK TABLES `tb_carts` WRITE;
/*!40000 ALTER TABLE `tb_carts` DISABLE KEYS */;
INSERT INTO `tb_carts` VALUES (1,'kec5ur2pdile7a1rrlgub1vlpb',NULL,'03728020',44.44,6,'2020-09-06 15:30:47'),(2,'cikjt6kf21nlfo7pir7k6glugs',10,NULL,NULL,NULL,'2020-09-08 00:33:41'),(3,'maee7ldrjhvlanj9hljtei3k3j',10,NULL,NULL,NULL,'2020-09-08 11:52:41'),(4,'lrb0ho69jjqngcdrckq1ll69am',NULL,'03728020',77.94,6,'2020-09-09 00:08:28'),(5,'ksuna3ertuskn3scavs86h6r2l',9,'03729130',40.74,6,'2020-09-09 23:06:00');
/*!40000 ALTER TABLE `tb_carts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-09 23:48:46

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
-- Table structure for table `tb_addresses`
--

DROP TABLE IF EXISTS `tb_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_addresses` (
  `id_address` int NOT NULL AUTO_INCREMENT,
  `id_person` int NOT NULL,
  `des_address` varchar(128) NOT NULL,
  `des_number` varchar(16) NOT NULL,
  `des_complement` varchar(32) DEFAULT NULL,
  `des_city` varchar(32) NOT NULL,
  `des_state` varchar(32) NOT NULL,
  `des_country` varchar(32) NOT NULL,
  `des_zipcode` char(8) NOT NULL,
  `des_district` varchar(32) NOT NULL,
  `dt_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_address`),
  KEY `fk_addresses_persons_idx` (`id_person`),
  CONSTRAINT `fk_addresses_persons` FOREIGN KEY (`id_person`) REFERENCES `tb_persons` (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_addresses`
--

LOCK TABLES `tb_addresses` WRITE;
/*!40000 ALTER TABLE `tb_addresses` DISABLE KEYS */;
INSERT INTO `tb_addresses` VALUES (1,10,'Rua Cervinho','353','','São Paulo','SP','Brasil','03728020','Jardim Danfer','2020-09-09 05:44:35'),(2,9,'Rua Inês Moreira dos Santos','86','','São Paulo','SP','Brasil','03729130','Jardim Danfer','2020-09-09 23:09:16'),(3,9,'Rua Inês Moreira dos Santos','86','','São Paulo','SP','Brasil','03729130','Jardim Danfer','2020-09-09 23:10:40'),(4,9,'Rua Inês Moreira dos Santos','86','','São Paulo','SP','Brasil','03729130','Jardim Danfer','2020-09-10 00:37:42'),(5,9,'Rua Inês Moreira dos Santos','86','','São Paulo','SP','Brasil','03729130','Jardim Danfer','2020-09-10 00:47:56'),(6,9,'Rua Inês Moreira dos Santos','86','','São Paulo','SP','Brasil','03729130','Jardim Danfer','2020-09-10 00:48:19'),(7,9,'Rua Inês Moreira dos Santos','86','','São Paulo','SP','Brasil','03729130','Jardim Danfer','2020-09-10 00:48:37'),(8,9,'Rua Inês Moreira dos Santos','70','','São Paulo','SP','Brasil','03729130','Jardim Danfer','2020-09-10 00:53:16'),(9,9,'Rua Inês Moreira dos Santos','70','','São Paulo','SP','Brasil','03729130','Jardim Danfer','2020-09-10 01:00:58'),(10,9,'Rua Inês Moreira dos Santos','70','','São Paulo','SP','Brasil','03729130','Jardim Danfer','2020-09-10 01:10:57'),(11,9,'Rua Inês Moreira dos Santos','70','','São Paulo','SP','Brasil','03729130','Jardim Danfer','2020-09-10 01:13:26'),(12,9,'Rua Inês Moreira dos Santos','75','','São Paulo','SP','Brasil','03729130','Jardim Danfer','2020-09-10 01:46:40'),(13,9,'Rua Inês Moreira dos Santos','45','','São Paulo','SP','Brasil','03729130','Jardim Danfer','2020-09-10 01:56:20'),(14,9,'Rua Inês Moreira dos Santos','60','casa','São Paulo','SP','Brasil','03729130','Jardim Danfer','2020-09-10 01:57:57'),(15,9,'Rua Inês Moreira dos Santos','30','','São Paulo','SP','Brasil','03729130','Jardim Danfer','2020-09-10 02:00:56'),(16,9,'Rua Inês Moreira dos Santos','49','','São Paulo','SP','Brasil','03729130','Jardim Danfer','2020-09-10 02:02:00');
/*!40000 ALTER TABLE `tb_addresses` ENABLE KEYS */;
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

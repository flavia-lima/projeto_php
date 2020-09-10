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
-- Table structure for table `tb_products`
--

DROP TABLE IF EXISTS `tb_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_products` (
  `id_product` int NOT NULL AUTO_INCREMENT,
  `des_product` varchar(64) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `des_url` varchar(128) NOT NULL,
  `dt_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_products`
--

LOCK TABLES `tb_products` WRITE;
/*!40000 ALTER TABLE `tb_products` DISABLE KEYS */;
INSERT INTO `tb_products` VALUES (6,'Console - Nintendo Nintendo Switch Neon',4000.00,1.00,'nintendo-switch','2020-08-31 01:52:21'),(15,'Game - The Last Of Us Part II - PS4',249.99,0.10,'tlou2','2020-09-06 01:23:20'),(16,'Game God of War Hits - PS4',59.99,0.10,'god-of-war','2020-09-06 01:38:40'),(17,'Game - Red Dead Redemption 2 - PS4',199.99,0.10,'red-dead-redemption-2','2020-09-06 01:39:26'),(18,'Game -  Horizon Zero Dawn Complete Edition Hits - PS4',59.99,0.10,'hzero-dawn','2020-09-06 01:40:04'),(19,'Camiseta Baby Look Harry Potter Grifinória',49.90,0.30,'camiseta-hp-grifinoria','2020-09-06 01:41:15'),(20,'Controle Sem Fio Dualshock 4 Preto - PS4',199.99,0.30,'dualshock','2020-09-06 01:42:46'),(21,'Action Figure DC Comics: Wonder Woman',89.99,0.40,'wonder-woman','2020-09-06 01:43:55'),(22,'Action Figure Hermione Granger ',299.99,0.50,'hermione','2020-09-06 01:44:54'),(23,'Action Figure Batgirl - DC Multiverse Action Figure',99.99,0.30,'batgirl','2020-09-06 01:45:40'),(24,'Console - Playstation 4 Hits 1TB',999.99,1.00,'ps4','2020-09-06 01:47:20');
/*!40000 ALTER TABLE `tb_products` ENABLE KEYS */;
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

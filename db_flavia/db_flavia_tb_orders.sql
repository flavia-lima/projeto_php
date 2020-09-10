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
-- Table structure for table `tb_orders`
--

DROP TABLE IF EXISTS `tb_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_orders` (
  `id_order` int NOT NULL AUTO_INCREMENT,
  `id_cart` int NOT NULL,
  `id_user` int NOT NULL,
  `id_status` int NOT NULL,
  `id_address` int NOT NULL,
  `vl_total` decimal(10,2) NOT NULL,
  `dt_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_order`),
  KEY `FK_orders_users_idx` (`id_user`),
  KEY `fk_orders_ordersstatus_idx` (`id_status`),
  KEY `fk_orders_carts_idx` (`id_cart`),
  KEY `fk_orders_addresses_idx` (`id_address`),
  CONSTRAINT `fk_orders_addresses` FOREIGN KEY (`id_address`) REFERENCES `tb_addresses` (`id_address`),
  CONSTRAINT `fk_orders_carts` FOREIGN KEY (`id_cart`) REFERENCES `tb_carts` (`id_cart`),
  CONSTRAINT `fk_orders_ordersstatus` FOREIGN KEY (`id_status`) REFERENCES `tb_orders_status` (`id_status`),
  CONSTRAINT `fk_orders_users` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_orders`
--

LOCK TABLES `tb_orders` WRITE;
/*!40000 ALTER TABLE `tb_orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_orders` ENABLE KEYS */;
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

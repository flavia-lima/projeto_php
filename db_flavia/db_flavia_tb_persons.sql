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
-- Table structure for table `tb_persons`
--

DROP TABLE IF EXISTS `tb_persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_persons` (
  `id_person` int NOT NULL AUTO_INCREMENT,
  `des_person` varchar(64) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` bigint DEFAULT NULL,
  `dt_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cpf` bigint NOT NULL,
  PRIMARY KEY (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_persons`
--

LOCK TABLES `tb_persons` WRITE;
/*!40000 ALTER TABLE `tb_persons` DISABLE KEYS */;
INSERT INTO `tb_persons` VALUES (1,'Flávia Macedo','flavia.lima@aluno.ifsp.edu.br',11222222,'2020-08-24 12:23:00',12345678),(3,'Harry james potter','harry@bruxo.com',404,'2020-08-27 11:34:31',70717),(4,'fabricio','fabriciomacedobl@gmail.com',2365214,'2020-08-30 04:26:51',5761258),(7,'teste mariazinha oi','teste@mariazinha.com',25487,'2020-09-07 20:30:21',587458),(8,'Goku','goku@email.com',59564979494,'2020-09-07 20:57:39',585858),(9,'Bob Esponja','bobesponja@email.com',0,'2020-09-07 22:04:11',0),(10,'Sonia','sonia_cris_tina@hotmail.com',25476432,'2020-09-08 00:26:19',258746974),(11,'Flavia Lima','mbl.flavia@gmail.com',1140028922,'2020-09-08 01:40:36',123654253),(12,'Sonia Macedo','sonia_cris_tina@hotmail.com',25476432,'2020-09-08 12:16:47',258746974);
/*!40000 ALTER TABLE `tb_persons` ENABLE KEYS */;
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

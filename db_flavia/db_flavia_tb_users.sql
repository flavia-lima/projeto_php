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
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `id_person` int NOT NULL,
  `des_login` varchar(64) NOT NULL,
  `des_password` varchar(256) NOT NULL,
  `inadmin` tinyint DEFAULT NULL,
  `dt_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  KEY `FK_users_persons_idx` (`id_person`),
  CONSTRAINT `fk_users_persons` FOREIGN KEY (`id_person`) REFERENCES `tb_persons` (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` VALUES (1,1,'admin','$2y$12$hKaYkmysAUxuw4gYLdTL3eyB7eVzwt4.mK4gGCQUYMD0X/YNzINrG',1,'2020-08-24 12:23:00'),(3,3,'harrypotter','$2y$12$Hg0mSOPfVDq3UhWVlDja8.u3XcAwWADKNLgxrdpRSDZHxy7wbI3eO',1,'2020-08-27 11:34:31'),(4,4,'fabricio','$2y$12$Hx.G7RNC9BulB2gf6UIF/OUFoVGqGCq3wfvv0z8kOIVwjfOughPpe',1,'2020-08-30 04:26:51'),(7,7,'mariazinha','$2y$12$RgGaYUKW1hhC9fAVG/wNyOHzhjwhNKr/BBZ4lE/t5jE89TBcQkNW.',1,'2020-09-07 20:30:21'),(8,8,'Goku','$2y$12$AMZk4rWw1ySPMR4.AkfhAOXr90N5TN.k3t1tQ1m3/OsCOds3Dmj.y',1,'2020-09-07 20:57:40'),(9,9,'bobesponja@email.com','$2y$12$HsiQtw0Vce4XxW/xrlgnSuMd/i7Fbn6K5zq13zlsWvqeh5b6dsySe',0,'2020-09-07 22:04:11'),(10,10,'sonia','$2y$12$spX0WnwLL.0zoP8rJa9IEOZicbPR660qyqIs3CrlhuLcpUuRTkXGO',0,'2020-09-08 00:26:19'),(11,11,'master','$2y$12$Syz/hEZKOSprmupQ6u2CBeH6IoBOkzlygAPfztjkn5zL3VAafe5j.',1,'2020-09-08 01:40:36'),(12,12,'sonia_cris_tina@hotmail.com','$2y$12$t1rjv6NP2VUPIJ1zZ8BSaejwUvJlIq1DclwEcR2GGMkC4DjYvT/NW',0,'2020-09-08 12:16:47');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;
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

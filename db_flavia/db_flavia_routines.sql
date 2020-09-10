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
-- Dumping events for database 'db_flavia'
--

--
-- Dumping routines for database 'db_flavia'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_addresses_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addresses_save`(
pid_address int(11), 
pid_person int(11),
pdes_address varchar(128),
pdes_number varchar(32),
pdes_complement varchar(32),
pdes_city varchar(32),
pdes_state varchar(32),
pdes_country varchar(32),
pdes_zipcode char(8),
pdes_district varchar(32)
)
BEGIN

	IF pid_address > 0 THEN
		
		UPDATE tb_addresses
        SET
			id_person = pid_person,
            des_address = pdes_address,
            des_number = pdes_number,
            des_complement = pdes_complement,
            des_city = pdes_city,
            des_state = pdes_state,
            des_country = pdes_country,
            des_zipcode = pdes_zipcode, 
            des_district = pdes_district
		WHERE id_address = pid_address;
        
    ELSE
		
		INSERT INTO tb_addresses (id_person, des_address, des_number, des_complement, des_city, des_state, des_country, des_zipcode, des_district)
        VALUES(pid_person, pdes_address, pdes_number, pdes_complement, pdes_city, pdes_state, pdes_country, pdes_zipcode, pdes_district);
        
        SET pid_address = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_addresses WHERE id_address = pid_address;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_carts_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_carts_save`(
pid_cart INT,
pdes_session_id VARCHAR(64),
pid_user INT,
pdes_zipcode CHAR(8),
pvl_freight DECIMAL(10,2),
pnr_days INT
)
BEGIN

    IF pid_cart > 0 THEN
        
        UPDATE tb_carts
        SET
            des_session_id = pdes_session_id,
            id_user = pid_user,
            des_zipcode = pdes_zipcode,
            vl_freight = pvl_freight,
            nr_days = pnr_days
        WHERE id_cart = pid_cart;
        
    ELSE
        
        INSERT INTO tb_carts (des_session_id, id_user, des_zipcode, vl_freight, nr_days)
        VALUES(pdes_session_id, pid_user, pdes_zipcode, pvl_freight, pnr_days);
        
        SET pid_cart = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_carts WHERE id_cart = pid_cart;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_categories_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_categories_save`(
pid_category INT,
pdes_category VARCHAR(64)
)
BEGIN
	
	IF pid_category > 0 THEN
		
		UPDATE tb_categories
        SET des_category = pdes_category
        WHERE id_category = pid_category;
        
    ELSE
		
		INSERT INTO tb_categories (des_category) VALUES(pdes_category);
        
        SET pid_category = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_categories WHERE id_category = pid_category;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_orders_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_orders_save`(
pid_order INT,
pid_cart int(11),
pid_user int(11),
pid_status int(11),
pid_address int(11),
pvl_total decimal(10,2)
)
BEGIN
	
	IF pid_order > 0 THEN
		
		UPDATE tb_orders
        SET
			id_cart = pid_cart,
            id_user = pid_user,
            id_status = pid_status,
            id_address = pid_address,
            vl_total = pvl_total
		WHERE id_order = pid_order;
        
    ELSE
    
		INSERT INTO tb_orders (id_cart, id_user, id_status, id_address, vl_total)
        VALUES(pid_cart, pid_user, pid_status, pid_address, pvl_total);
		
		SET pid_order = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * 
    FROM tb_orders a
    INNER JOIN tb_orders_status b USING(id_status)
    INNER JOIN tb_carts c USING(id_cart)
    INNER JOIN tb_users d ON d.id_user = a.id_user
    INNER JOIN tb_addresses e USING(id_address)
    WHERE id_order = pid_order;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_products_delete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_products_delete`(
	pid_product INT
)
BEGIN

DELETE FROM tb_carts_products WHERE id_product = pid_product;
DELETE FROM tb_products_categories WHERE id_product = pid_product;
DELETE FROM tb_products WHERE id_product = pid_product;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_products_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_products_save`(
pid_product int(11),
pdes_product varchar(64),
pprice decimal(10,2),
pweight decimal(10,2),
pdes_url varchar(128)
)
BEGIN
	
	IF pid_product > 0 THEN
		
		UPDATE tb_products
        SET 
			des_product = pdes_product,
            price = pprice,
            weight = pweight,
            des_url = pdes_url
        WHERE id_product = pid_product;
        
    ELSE
		
		INSERT INTO tb_products (des_product, price, weight, des_url) 
        VALUES(pdes_product, pprice, pweight, pdes_url);
        
        SET pid_product = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_products WHERE id_product = pid_product;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_userspasswordsrecoveries_create` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_userspasswordsrecoveries_create`(
pid_user INT,
pdes_ip VARCHAR(45)
)
BEGIN
	
	INSERT INTO tb_users_passwords_recoveries (id_user, des_ip)
    VALUES(pid_user, pdes_ip);
    
    SELECT * FROM tb_users_passwords_recoveries
    WHERE id_recovery = LAST_INSERT_ID();
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_usersupdate_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usersupdate_save`(
pid_user INT,
pdes_person VARCHAR(64), 
pdes_login VARCHAR(64), 
pdes_password VARCHAR(256), 
pemail VARCHAR(128), 
pphone BIGINT, 
pcpf BIGINT, 
pinadmin TINYINT
)
BEGIN

DECLARE vid_person INT;
    
	SELECT id_person INTO vid_person
    FROM tb_users
    WHERE id_user = pid_user;
    
    UPDATE tb_persons
    SET 
		des_person = pdes_person,
        email = pemail,
        phone = pphone,
        cpf = pcpf
	WHERE id_person = vid_person;
    
    UPDATE tb_users
    SET
		des_login = pdes_login,
        des_password = pdes_password,
        inadmin = pinadmin
	WHERE id_user = pid_user;
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(id_person) WHERE a.id_user = pid_user;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_users_delete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_delete`(
pid_user INT
)
BEGIN
    
    DECLARE vid_person INT;
    
    SET FOREIGN_KEY_CHECKS = 0;
 
    SELECT id_person INTO vid_person
    FROM tb_users
    WHERE id_user = pid_user;
 
    DELETE FROM tb_persons WHERE id_person = vid_person;
    
    DELETE FROM tb_users_passwords_recoveries WHERE id_user = pid_user;
    DELETE FROM tb_users WHERE id_user = pid_user;
    
    SET FOREIGN_KEY_CHECKS = 1;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_users_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_save`(
pdes_person VARCHAR(64), 
pdes_login VARCHAR(64), 
pdes_password VARCHAR(256), 
pemail VARCHAR(128), 
pphone BIGINT, 
pcpf BIGINT, 
pinadmin TINYINT
)
BEGIN
	
    DECLARE vid_person INT;
    
    INSERT INTO tb_persons (des_person, email, phone, cpf)
    VALUES(pdes_person, pemail, pphone, pcpf);
    
    SET vid_person = LAST_INSERT_ID();
    
    INSERT INTO tb_users (id_person, des_login, des_password, inadmin)
    VALUES(vid_person, pdes_login, pdes_password, pinadmin);
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(id_person) WHERE a.id_user = LAST_INSERT_ID();
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-09 23:48:48

-- MySQL dump 10.19  Distrib 10.3.38-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: popelnice
-- ------------------------------------------------------
-- Server version	10.3.38-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `dns` varchar(100) NOT NULL,
  `prohlizec` varchar(255) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `cas` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'104.28.130.26','104.28.130.26','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','perina','2023-03-13 23:40:37'),(2,'104.28.130.25','104.28.130.25','Mozilla/5.0 (iPhone; CPU iPhone OS 16_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.3 Mobile/15E148 Safari/604.1','bar1test','2023-03-14 00:06:14'),(3,'104.28.64.0','104.28.64.0','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.3 Safari/605.1.15','tanecnice1test','2023-03-14 00:08:45'),(4,'104.28.130.26','104.28.130.26','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','SuperTest','2023-03-14 00:09:41'),(5,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','bar1test','2023-03-14 00:17:25'),(6,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','tonda','2023-03-14 00:46:03'),(7,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','tanecnice1test','2023-03-14 01:01:16'),(8,'104.28.130.26','104.28.130.26','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','perina','2023-03-14 01:33:05'),(9,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','bar1test','2023-03-14 01:49:19'),(10,'104.28.130.25','104.28.130.25','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','Superbezklubu','2023-03-14 01:55:38'),(11,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','superbezklubu','2023-03-14 01:57:56'),(12,'104.28.130.25','104.28.130.25','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','perina','2023-03-14 01:59:28'),(13,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','tonda','2023-03-14 17:59:40'),(14,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','SuperTest','2023-03-14 18:09:32'),(15,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','tonda','2023-03-14 18:10:33'),(16,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','tanecnice1test','2023-03-14 18:11:10'),(17,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','tonda','2023-03-14 22:35:47'),(18,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','SuperTest','2023-03-14 23:27:13'),(19,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','bar1test','2023-03-14 23:45:51'),(20,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','SuperTest','2023-03-14 23:50:41'),(21,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','tanecnice1test','2023-03-14 23:51:16'),(22,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (iPhone; CPU iPhone OS 16_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.3 Mobile/15E148 Safari/604.1','tanecnice1test','2023-03-14 23:59:27'),(23,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','SuperTest','2023-03-15 00:00:03'),(24,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','tanecnice1test','2023-03-15 00:03:49'),(25,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','SuperTest','2023-03-15 00:08:58'),(26,'188.75.183.5','5-183-75-188-static.marekstejskal.cz','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','tanecnice1test','2023-03-15 00:29:07');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kluby`
--

DROP TABLE IF EXISTS `kluby`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kluby` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `klub` varchar(100) NOT NULL,
  `zkratka` varchar(6) NOT NULL,
  `kod` varchar(6) NOT NULL,
  `popis` varchar(255) DEFAULT NULL,
  `kontakt` varchar(255) DEFAULT NULL,
  `ulice` varchar(66) DEFAULT NULL,
  `mesto` varchar(66) DEFAULT NULL,
  `zeme` varchar(66) DEFAULT NULL,
  `mena` varchar(5) DEFAULT NULL,
  `fee` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UC_kluby_zkratka` (`zkratka`),
  UNIQUE KEY `UC_kluby_kod` (`kod`),
  UNIQUE KEY `UC_kluby_klub` (`klub`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kluby`
--

LOCK TABLES `kluby` WRITE;
/*!40000 ALTER TABLE `kluby` DISABLE KEYS */;
INSERT INTO `kluby` VALUES (1,'Angels Cabaret Club','AngBla','421004','Strip klub','+421907144957','Hurbanovo námestie 9','Bratislava','Slovensko','EUR',1.20),(2,'Kronebar','KroBrg','430089','Cabaret','+436602852953','Leutbühel 3a','Bregenz','Rakousko','EUR',1.20),(3,'LouLou kabaret 	','LouKos','421006','Cabaret','+421908321131','Mäsiarska 8','Košice','Slovensko','EUR',1.20),(4,'Strip bar Pamela','PamPlz','420028','Stripbar','+420377223939','Husova 15','Plzeň','Česko','CZK',30.00),(5,'Golden Ladies','GolTep','420027','Musicbar','+420777627052','Masarykova tř. 55/118','Teplice','Česko','CZK',30.00),(6,'Solid Gold Bochum','SoGoBo','490012','Tabledance','+491734074173','Gußstahlstraße 35','Bochum','Německo','EUR',1.20),(7,'Solid Gold Düsseldorf','SoGoDD','490011','Tabledance','+49211381130','Mintropstr. 7','Düsseldorf','Německo','EUR',1.20),(8,'Pinky Stripbar','PinOva','420014','Stripbar','+420603542834','Musorgského 880/5','Ostrava','Česko','CZK',30.00),(9,'Starlight tabledance','StrMrb','490023','Tabledance','+496421167068','Siemensstr. 17','Marburg','Německo','EUR',1.20),(11,'Luxory','LuxBla','421003','Cabaret','+421902709617','Michalska 2','Bratislava','Slovensko','EUR',1.20),(12,'L Art club','LArBla','421002','Cabaret','+421911816899','Rázusovo nábrežie 1','Bratislava','Slovensko','EUR',1.20),(13,'Le Roi','RoiPSE','390040','Cabaret','+393933870893','Via Nazionale 59','Porto Sant Elpido','Itálie','EUR',1.20),(14,'Pussy Cat Club','PCCGnv','410026','Cabaret','+41227361500','Rue des Glaçis de Rive 17','Geneva','Švýcarsko','CHF',1.20),(15,'Dorsia','DorAnt','320012','Tabledance','+32498185795','Anneessenstraat 11','Antwerpen','Belgie','EUR',1.20),(16,'Cabaret Bella Napoli','CBNNue','490045','Cabaret','+4991122377','Ottostr. 29','Nürnberg','Německo','EUR',1.20),(17,'Nightclub Diamante','NCDiam','390035','Cabaret','+393490065057','Via Rigolizia 1/B','San Salvo','Itálie','EUR',1.20),(18,'Carosello sexy disco','CaroSD','390039','Stripclub','+39051570500 ','Via Bazzanese 95/3','Casalecchio di Reno','Itálie','EUR',1.20),(19,'Club Luna','LunChm','490067','Cabaret','+4937133409915','Leipziger Str. 112','Chemnitz','Německo','EUR',1.20),(20,'Melody bar','MelPtg','490052','Tabledance','+4917686428188','Fargesstrasse 5','Peiting','Německo','EUR',1.20),(22,'Crazy Ugly','CrzUgl','430074','Stripclub','+420733270827','Madleinweg 2','Ischgl','Rakousko','EUR',1.20),(24,'Ibiza','IbiCyp','357003','Bar','+357 96 628 845','','Nicosia','Kypr','EUR',1.20),(26,'TEST','TEST1','0','BORDEL','','','','Slovensko','EUR',3.00);
/*!40000 ALTER TABLE `kluby` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meny`
--

DROP TABLE IF EXISTS `meny`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meny` (
  `mena` varchar(5) DEFAULT NULL,
  `popis` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meny`
--

LOCK TABLES `meny` WRITE;
/*!40000 ALTER TABLE `meny` DISABLE KEYS */;
INSERT INTO `meny` VALUES ('CZK','česká koruna'),('EUR','euro'),('BGN','bulharský lev'),('DKK','dánská koruna'),('ISK','islandská koruna'),('TRY','turecká lira'),('CHF','švýcarský frank'),('HUF','maďarský forint'),('RON','rumunský lei'),('GBP','libra šterlinků'),('USD','americký dolar'),('CAD','kanadský dolar'),('PLN','polský zlotý');
/*!40000 ALTER TABLE `meny` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pichacky`
--

DROP TABLE IF EXISTS `pichacky`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pichacky` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `klub_id` int(11) DEFAULT NULL,
  `umelec_id` int(11) DEFAULT NULL,
  `cas` datetime DEFAULT NULL,
  `stav` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pichacky`
--

LOCK TABLES `pichacky` WRITE;
/*!40000 ALTER TABLE `pichacky` DISABLE KEYS */;
INSERT INTO `pichacky` VALUES (1,26,48,'2023-03-14 00:10:20','start'),(2,26,48,'2023-03-14 00:52:12','stop'),(3,26,48,'2023-03-14 00:54:16','start'),(4,26,48,'2023-03-14 01:05:14','stop'),(5,26,48,'2023-03-14 01:06:53','start'),(6,26,48,'2023-03-14 01:07:40','stop'),(7,26,48,'2023-03-14 01:10:09','start'),(8,26,48,'2023-03-14 01:16:10','stop'),(9,26,48,'2023-03-14 01:17:50','start'),(10,26,48,'2023-03-14 01:34:13','stop'),(11,26,48,'2023-03-14 01:34:38','start');
/*!40000 ALTER TABLE `pichacky` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provize`
--

DROP TABLE IF EXISTS `provize`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `klub_id` int(11) DEFAULT NULL,
  `barman_id` int(11) DEFAULT NULL,
  `umelec_id` int(11) DEFAULT NULL,
  `polozka_id` int(11) DEFAULT NULL,
  `popis` varchar(100) DEFAULT NULL,
  `cas` datetime DEFAULT NULL,
  `castka` decimal(6,2) DEFAULT NULL,
  `mena` varchar(5) DEFAULT NULL,
  `doklad` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provize`
--

LOCK TABLES `provize` WRITE;
/*!40000 ALTER TABLE `provize` DISABLE KEYS */;
INSERT INTO `provize` VALUES (1,26,49,48,31,'Flaška 1','2023-03-14 00:13:11',100.00,'EUR','1'),(2,26,49,48,30,'Tanec 1','2023-03-14 00:13:18',10.00,'EUR','1'),(3,26,49,48,99999,'Transakční poplatek','2023-03-14 00:13:49',0.00,'EUR','1'),(4,26,49,48,31,'Flaška 1','2023-03-14 00:17:48',100.00,'EUR','2'),(5,26,49,48,30,'Tanec 1','2023-03-14 00:17:55',10.00,'EUR','2'),(6,26,49,48,30,'Tanec 1','2023-03-14 00:18:00',10.00,'EUR','2'),(7,26,49,48,99999,'Transakční poplatek','2023-03-14 00:18:18',-1.20,'EUR','2'),(8,26,49,48,30,'Tanec 1','2023-03-14 00:19:09',10.00,'EUR','3'),(9,26,49,48,31,'Flaška 1','2023-03-14 00:25:41',100.00,'EUR','3'),(10,26,49,48,99999,'Transakční poplatek','2023-03-14 00:25:51',-1.20,'EUR','3'),(11,26,49,48,30,'Tanec 1','2023-03-14 00:46:34',10.00,'EUR','4'),(12,26,49,48,31,'Flaška 1','2023-03-14 00:46:39',100.00,'EUR','4'),(13,26,49,48,31,'Flaška 1','2023-03-14 00:46:43',100.00,'EUR','4'),(14,26,49,48,30,'Tanec 1','2023-03-14 00:46:48',10.00,'EUR','4'),(15,26,49,48,99999,'Transakční poplatek','2023-03-14 00:46:58',-3.00,'EUR','4'),(16,26,49,48,30,'Tanec 1','2023-03-14 00:55:48',10.00,'EUR','5'),(17,26,49,48,31,'Flaška 1','2023-03-14 00:55:53',100.00,'EUR','5'),(19,26,49,48,99999,'Transakční poplatek','2023-03-14 00:57:34',-3.00,'EUR','5'),(20,26,49,48,31,'Flaška 1','2023-03-14 00:58:14',100.00,'EUR','6'),(21,26,49,48,30,'Tanec 1','2023-03-14 00:58:18',10.00,'EUR','6'),(22,26,49,48,99999,'Transakční poplatek','2023-03-14 01:05:14',-3.00,'EUR','6'),(23,26,49,48,30,'Tanec 1','2023-03-14 01:07:18',10.00,'EUR','7'),(24,26,49,48,31,'Flaška 1','2023-03-14 01:07:23',100.00,'EUR','7'),(25,26,49,48,31,'Flaška 1','2023-03-14 01:07:27',100.00,'EUR','7'),(26,26,49,48,31,'Flaška 1','2023-03-14 01:07:32',100.00,'EUR','7'),(27,26,49,48,99999,'Transakční poplatek','2023-03-14 01:07:40',-3.00,'EUR','7'),(28,26,49,48,30,'Tanec 1','2023-03-14 01:10:39',10.00,'EUR','8'),(29,26,49,48,99999,'Transakční poplatek','2023-03-14 01:10:58',-3.00,'EUR','8'),(30,26,49,48,30,'Tanec 1','2023-03-14 01:18:08',10.00,'EUR',NULL),(31,26,49,48,31,'Flaška 1','2023-03-14 01:18:12',100.00,'EUR',NULL);
/*!40000 ALTER TABLE `provize` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proviznipolozky`
--

DROP TABLE IF EXISTS `proviznipolozky`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proviznipolozky` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `klub_id` int(11) DEFAULT NULL,
  `aktivni` tinyint(1) DEFAULT NULL,
  `obrazek` varchar(128) DEFAULT NULL,
  `popis` varchar(100) DEFAULT NULL,
  `castka` decimal(6,2) DEFAULT NULL,
  `mena` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proviznipolozky`
--

LOCK TABLES `proviznipolozky` WRITE;
/*!40000 ALTER TABLE `proviznipolozky` DISABLE KEYS */;
INSERT INTO `proviznipolozky` VALUES (4,1,1,'img/menu/1dance.png','privátní tanec 5 full',10.00,'EUR'),(5,1,1,'img/menu/2dance.png','privátní tanec 10 full',20.00,'EUR'),(6,1,1,'img/menu/3dance.png','privátní tanec 20 full',30.00,'EUR'),(7,1,1,'img/menu/drink1.png','sklenička sektu',0.85,'EUR'),(8,1,1,'img/menu/kokteil1.png','lady drink 1',1.30,'EUR'),(9,1,1,'img/menu/kokteil2.png','lady drink 2',1.70,'EUR'),(10,1,1,'img/menu/bottle1.png','láhev champ. 1',4.00,'EUR'),(11,1,1,'img/menu/bottle2.png','láhev champ. 2',20.00,'EUR'),(12,1,1,'img/menu/bottle3.png','láhev champ. 3',30.00,'EUR'),(13,1,1,'img/menu/bottle4.png','láhev champ. 4',100.00,'EUR'),(15,20,1,'img/menu/1dance.png','privátní tanec 5 full',10.00,'EUR'),(16,20,1,'img/menu/bottle4.png','flaška 1',100.00,'EUR'),(20,4,1,'img/menu/kokteil1.png','drink1',99.00,'CZK'),(21,4,1,'img/menu/1dance.png','Privátní tanec 10 min.',999.00,'CZK'),(22,22,1,'img/menu/1dance.png','private dance 1',50.00,'EUR'),(23,22,1,'img/menu/kokteil1.png','lady drink 1',50.00,'EUR'),(30,26,1,'img/menu/1dance.png','Tanec 1',10.00,'EUR'),(31,26,1,'img/menu/bottle4.png','Flaška 1',100.00,'EUR');
/*!40000 ALTER TABLE `proviznipolozky` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uctenka`
--

DROP TABLE IF EXISTS `uctenka`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uctenka` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `umelec_id` int(11) DEFAULT NULL,
  `cas` datetime DEFAULT NULL,
  `barman_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uctenka`
--

LOCK TABLES `uctenka` WRITE;
/*!40000 ALTER TABLE `uctenka` DISABLE KEYS */;
INSERT INTO `uctenka` VALUES (1,48,'2023-03-14 00:13:49',49),(2,48,'2023-03-14 00:18:18',49),(3,48,'2023-03-14 00:25:51',49),(4,48,'2023-03-14 00:46:58',49),(5,48,'2023-03-14 00:57:34',49),(6,48,'2023-03-14 01:05:14',49),(7,48,'2023-03-14 01:07:40',49),(8,48,'2023-03-14 01:10:58',49);
/*!40000 ALTER TABLE `uctenka` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `club` varchar(6) DEFAULT NULL,
  `password` varchar(55) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `admin` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UC_users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'tonda',NULL,'M0E4NzI4MzNhODcyODM','antoninecer@gmail.com','Y'),(2,'perina',NULL,'SGVzbG8xMjM0NQ','honza.perina@gmail.com','Y'),(23,'BWL-Lord@web.de','MelPtg','MTIzNDU','BWL-Lord@web.de','S'),(25,'Michal','AngBla','MTIzNDU','michalgalek1@gmail.com','S'),(46,'SuperTest','TEST1','MTIzNDU','','S'),(48,'tanecnice1test',NULL,'MTIzNDU','','U'),(49,'bar1test','TEST1','MTIzNDU','','B'),(50,'Superbezklubu','','MTIzNDU','','S');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-15  8:36:48

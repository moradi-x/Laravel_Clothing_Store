-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel_ecommerce
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `attribute_category`
--

DROP TABLE IF EXISTS `attribute_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attribute_category` (
  `attribute_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `is_filter` tinyint(1) NOT NULL DEFAULT '0',
  `is_variation` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`,`attribute_id`),
  KEY `attribute_category_attribute_id_foreign` (`attribute_id`),
  CONSTRAINT `attribute_category_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `attribute_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_category`
--

LOCK TABLES `attribute_category` WRITE;
/*!40000 ALTER TABLE `attribute_category` DISABLE KEYS */;
INSERT INTO `attribute_category` VALUES (1,1,1,1,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(2,1,1,1,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(3,1,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(4,1,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(6,1,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(1,2,1,1,'2026-09-16 04:33:49','2026-09-16 04:33:49'),(2,2,1,0,'2026-09-16 04:33:49','2026-09-16 04:33:49'),(3,2,1,0,'2026-09-16 04:33:49','2026-09-16 04:33:49'),(4,2,1,0,'2026-09-16 04:33:49','2026-09-16 04:33:49'),(6,2,1,0,'2026-09-16 04:33:49','2026-09-16 04:33:49'),(1,3,1,1,'2026-09-16 04:33:57','2026-09-16 04:33:57'),(2,3,1,0,'2026-09-16 04:33:57','2026-09-16 04:33:57'),(3,3,1,0,'2026-09-16 04:33:57','2026-09-16 04:33:57'),(4,3,1,0,'2026-09-16 04:33:57','2026-09-16 04:33:57'),(6,3,1,0,'2026-09-16 04:33:57','2026-09-16 04:33:57'),(1,4,1,1,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(2,4,1,1,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(3,4,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(4,4,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(5,4,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(6,4,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(1,5,1,1,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(2,5,1,1,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(3,5,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(4,5,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(5,5,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(6,5,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(1,6,1,1,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(2,6,1,1,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(3,6,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(4,6,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(5,6,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(6,6,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(1,7,1,1,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(2,7,1,1,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(3,7,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(4,7,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(5,7,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(6,7,1,0,'2026-09-16 04:10:44','2026-09-16 04:10:44');
/*!40000 ALTER TABLE `attribute_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attributes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attributes`
--

LOCK TABLES `attributes` WRITE;
/*!40000 ALTER TABLE `attributes` DISABLE KEYS */;
INSERT INTO `attributes` VALUES (1,'رنگ','2026-09-16 04:10:44','2026-09-16 04:10:44'),(2,'سایز','2026-09-16 04:10:44','2026-09-16 04:10:44'),(3,'جنس','2026-09-16 04:10:44','2026-09-16 04:10:44'),(4,'طرح','2026-09-16 04:10:44','2026-09-16 04:10:44'),(5,'آستین','2026-09-16 04:10:44','2026-09-16 04:10:44'),(6,'فصل','2026-09-16 04:10:44','2026-09-16 04:10:44');
/*!40000 ALTER TABLE `attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (1,'20260916_074136_vs3_slider_1.jpg','slider','slider','1',1,'slider','slider','slider','slider','2026-09-16 04:11:36','2026-09-16 04:11:36'),(2,'20260916_074152_Xhv_slider_2.jpg','slider','slider','2',1,'slider','slider','slider','slider','2026-09-16 04:11:52','2026-09-16 04:11:52'),(3,'20260916_074224_J5Z_index_top_1.png','زنانه','index-top','1',1,'index-top','index-top','index-top','index-top','2026-09-16 04:12:24','2026-09-16 04:12:24'),(4,'20260916_074247_RM0_index_top_2.png','مردانه','index-top','2',1,'index-top','index-top','index-top','index-top','2026-09-16 04:12:47','2026-09-16 04:12:47'),(5,'20260916_074310_sFb_index_top_3.png','شلوار جین','index-top','3',1,'index-top','index-top','index-top','index-top','2026-09-16 04:13:10','2026-09-16 04:13:10'),(7,'20260916_074401_fZl_index_top_4.png','هودی','index-top','4',1,'index-top','index-top','index-top','index-top','2026-09-16 04:14:01','2026-09-16 04:14:01'),(8,'20260916_074425_6vw_index_top_5.png','کفش و عینک','index-top','5',1,'index-top','index-top','index-top','index-top','2026-09-16 04:14:25','2026-09-16 04:14:25'),(9,'20260916_074501_xAO_index_bottom_1.png','بنر پایین','index-bottom','1',1,'index-bottom','index-bottom','index-bottom','index-bottom','2026-09-16 04:15:01','2026-09-16 04:15:01'),(10,'20260916_074523_VP9_index_bottom_2.png','بنر پایین','index-bottom','2',1,'v','index-bottom','index-bottom','index-bottom','2026-09-16 04:15:23','2026-09-16 04:15:23');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Nike','nike',1,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(2,'Adidas','adidas',1,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(3,'Puma','puma',1,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(4,'Zara','zara',1,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(5,'H&M','hm',1,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(6,'Levi’s','levis',1,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(7,'Gucci','gucci',1,'2026-09-16 04:10:44','2026-09-16 04:10:44'),(8,'Tommy Hilfiger','tommy-hilfiger',1,'2026-09-16 04:10:44','2026-09-16 04:10:44');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('laravel-cache-spatie.permission.cache','a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:12:\"display_name\";s:1:\"d\";s:10:\"guard_name\";}s:11:\"permissions\";a:4:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:14:\"create-article\";s:1:\"c\";s:17:\"ایجاد پست\";s:1:\"d\";s:3:\"web\";}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:12:\"edit-article\";s:1:\"c\";s:19:\"ویرایش پست\";s:1:\"d\";s:3:\"web\";}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:14:\"delete-article\";s:1:\"c\";s:13:\"حذف پست\";s:1:\"d\";s:3:\"web\";}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:10:\"create-tag\";s:1:\"c\";s:15:\"ایجاد تگ\";s:1:\"d\";s:3:\"web\";}}s:5:\"roles\";a:0:{}}',1791904363);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,0,'پوشاک','clothing','انواع پوشاک مردانه و زنانه',1,'fa-shirt','2026-09-16 04:10:44','2026-09-16 04:10:44'),(2,0,'مردانه','men','انواع پوشاک مردانه',1,'fa-person','2026-09-16 04:10:44','2026-09-16 04:33:49'),(3,0,'زنانه','women','انواع پوشاک زنانه',1,'fa-person-dress','2026-09-16 04:10:44','2026-09-16 04:33:57'),(4,2,'لباس مردانه','men-clothes','انواع لباس مردانه',1,'fa-shirt','2026-09-16 04:10:44','2026-09-16 04:10:44'),(5,2,'پیراهن مردانه','men-shirt','انواع پیراهن مردانه',1,'fa-shirt','2026-09-16 04:10:44','2026-09-16 04:10:44'),(6,3,'لباس زنانه','women-clothes','انواع لباس زنانه',1,'fa-shirt','2026-09-16 04:10:44','2026-09-16 04:10:44'),(7,3,'مانتو','manto','انواع مانتو زنانه',1,'fa-shirt','2026-09-16 04:10:44','2026-09-16 04:10:44');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_province_id_foreign` (`province_id`),
  CONSTRAINT `cities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3073 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1001,'تبریز',1001,NULL,NULL),(1002,'مراغه',1001,NULL,NULL),(1003,'مرند',1001,NULL,NULL),(1004,'اهر',1001,NULL,NULL),(1005,'میانه',1001,NULL,NULL),(1006,'بناب',1001,NULL,NULL),(1007,'سهند',1001,NULL,NULL),(1008,'سراب',1001,NULL,NULL),(1009,'آذرشهر',1001,NULL,NULL),(1011,'عجب شیر',1001,NULL,NULL),(1012,'سردرود',1001,NULL,NULL),(1013,'ملکان',1001,NULL,NULL),(1014,'شبستر',1001,NULL,NULL),(1015,'خسروشاه',1001,NULL,NULL),(1016,'بستان آباد',1001,NULL,NULL),(1017,'هشترود',1001,NULL,NULL),(1018,'اسکو',1001,NULL,NULL),(1019,'ایلخچی',1001,NULL,NULL),(1022,'گوگان',1001,NULL,NULL),(1023,'هریس',1001,NULL,NULL),(1025,'صوفیان',1001,NULL,NULL),(1026,'کلیبر',1001,NULL,NULL),(1027,'جلفا',1001,NULL,NULL),(1039,'ورزقان',1001,NULL,NULL),(1053,'ارومیه',1002,NULL,NULL),(1054,'خوی',1002,NULL,NULL),(1055,'بوکان',1002,NULL,NULL),(1056,'مهاباد',1002,NULL,NULL),(1057,'میاندوآب',1002,NULL,NULL),(1058,'سلماس',1002,NULL,NULL),(1059,'پیرانشهر',1002,NULL,NULL),(1060,'نقده',1002,NULL,NULL),(1061,'تکاب',1002,NULL,NULL),(1062,'ماکو',1002,NULL,NULL),(1063,'سردشت (آذربایجان غربی)',1002,NULL,NULL),(1064,'شاهین دژ',1002,NULL,NULL),(1065,'اشنویه',1002,NULL,NULL),(1066,'قره ضیاءالدین',1002,NULL,NULL),(1067,'شوط',1002,NULL,NULL),(1069,'ربط',1002,NULL,NULL),(1070,'پلدشت',1002,NULL,NULL),(1071,'بازرگان',1002,NULL,NULL),(1072,'چهاربرج',1002,NULL,NULL),(1085,'اردبیل',1003,NULL,NULL),(1086,'پارس آباد',1003,NULL,NULL),(1087,'مشگین شهر',1003,NULL,NULL),(1088,'خلخال',1003,NULL,NULL),(1089,'گرمی',1003,NULL,NULL),(1090,'بیله سوار',1003,NULL,NULL),(1091,'نمین',1003,NULL,NULL),(1093,'گیوی',1003,NULL,NULL),(1095,'اصلاندوز',1003,NULL,NULL),(1096,'نیر (اردبیل)',1003,NULL,NULL),(1099,'سرعین',1003,NULL,NULL),(1101,'اصفهان',1004,NULL,NULL),(1102,'کاشان',1004,NULL,NULL),(1103,'خمینی شهر',1004,NULL,NULL),(1104,'نجف آباد',1004,NULL,NULL),(1105,'شاهین شهر',1004,NULL,NULL),(1106,'شهرضا',1004,NULL,NULL),(1107,'فولادشهر',1004,NULL,NULL),(1108,'بهارستان',1008,NULL,NULL),(1109,'مبارکه',1004,NULL,NULL),(1110,'آران و بیدگل',1004,NULL,NULL),(1111,'گلپایگان',1004,NULL,NULL),(1112,'زرین شهر',1004,NULL,NULL),(1113,'درچه',1004,NULL,NULL),(1114,'دولت آباد(اصفهان)',1004,NULL,NULL),(1115,'فلاورجان',1004,NULL,NULL),(1117,'خورزوق (اصفهان)',1004,NULL,NULL),(1118,'نائین',1004,NULL,NULL),(1121,'گلدشت',1004,NULL,NULL),(1122,'گزبرخوار',1004,NULL,NULL),(1123,'شهر ابریشم',1004,NULL,NULL),(1124,'خوانسار',1004,NULL,NULL),(1125,'تیران',1004,NULL,NULL),(1126,'داران (فریدن)',1004,NULL,NULL),(1127,'سده لنجان',1004,NULL,NULL),(1130,'دهاقان',1004,NULL,NULL),(1132,'اردستان',1004,NULL,NULL),(1134,'بادرود',1004,NULL,NULL),(1136,'نطنز',1004,NULL,NULL),(1138,'فریدونشهر',1004,NULL,NULL),(1139,'پیربکران',1004,NULL,NULL),(1141,'ورزنه',1004,NULL,NULL),(1145,'باغ بهادران',1004,NULL,NULL),(1146,'زیباشهر',1004,NULL,NULL),(1148,'چادگان',1004,NULL,NULL),(1149,'گلشهر',1004,NULL,NULL),(1154,'زاینده رود',1004,NULL,NULL),(1157,'دهق',1004,NULL,NULL),(1158,'علویجه',1004,NULL,NULL),(1160,'هرند',1004,NULL,NULL),(1161,'منظریه',1004,NULL,NULL),(1165,'خور (اصفهان)',1004,NULL,NULL),(1167,'گوگد',1004,NULL,NULL),(1169,'وزوان',1004,NULL,NULL),(1172,'میمه (اصفهان)',1004,NULL,NULL),(1179,'سجزی',1004,NULL,NULL),(1193,'قمصر',1004,NULL,NULL),(1199,'کرج',1005,NULL,NULL),(1200,'فردیس',1005,NULL,NULL),(1201,'کمال شهر',1005,NULL,NULL),(1202,'نظرآباد',1005,NULL,NULL),(1203,'محمدشهر (البرز)',1005,NULL,NULL),(1204,'ماهدشت',1005,NULL,NULL),(1205,'مشکین دشت',1005,NULL,NULL),(1206,'هشتگرد',1005,NULL,NULL),(1207,'چهارباغ',1005,NULL,NULL),(1208,'شهر جدید هشتگرد',1005,NULL,NULL),(1209,'اشتهارد',1005,NULL,NULL),(1210,'گرمدره',1005,NULL,NULL),(1212,'کوهسار',1005,NULL,NULL),(1214,'طالقان',1005,NULL,NULL),(1215,'ایلام',1006,NULL,NULL),(1216,'دهلران',1006,NULL,NULL),(1217,'ایوان',1006,NULL,NULL),(1218,'آبدانان',1006,NULL,NULL),(1219,'دره شهر',1006,NULL,NULL),(1220,'مهران',1006,NULL,NULL),(1221,'سرابله',1006,NULL,NULL),(1224,'چوار',1006,NULL,NULL),(1225,'بدره',1006,NULL,NULL),(1229,'بوشهر',1007,NULL,NULL),(1230,'برازجان',1007,NULL,NULL),(1231,'بندرگناوه',1007,NULL,NULL),(1232,'کنگان',1007,NULL,NULL),(1233,'خورموج',1007,NULL,NULL),(1234,'جم',1007,NULL,NULL),(1235,'بندردیلم',1007,NULL,NULL),(1236,'بندر دیر',1007,NULL,NULL),(1237,'عالی شهر',1007,NULL,NULL),(1238,'آبپخش',1007,NULL,NULL),(1239,'نخل تقی',1007,NULL,NULL),(1240,'چغادک',1007,NULL,NULL),(1241,'اهرم',1007,NULL,NULL),(1242,'بنک',1007,NULL,NULL),(1243,'عسلویه',1007,NULL,NULL),(1244,'کاکی',1007,NULL,NULL),(1245,'وحدتیه',1007,NULL,NULL),(1248,'شبانکاره',1007,NULL,NULL),(1249,'بردستان',1007,NULL,NULL),(1253,'بندرریگ',1007,NULL,NULL),(1256,'بندردلوار',1007,NULL,NULL),(1260,'ریز',1007,NULL,NULL),(1262,'تهران',1008,NULL,NULL),(1263,'اسلامشهر',1008,NULL,NULL),(1264,'شهریار',1008,NULL,NULL),(1265,'قدس',1008,NULL,NULL),(1266,'ملارد',1008,NULL,NULL),(1267,'گلستان',1008,NULL,NULL),(1268,'پاکدشت',1008,NULL,NULL),(1269,'قرچک',1008,NULL,NULL),(1270,'ورامین',1008,NULL,NULL),(1271,'نسیم شهر',1008,NULL,NULL),(1272,'اندیشه',1005,NULL,NULL),(1273,'رباط کریم',1008,NULL,NULL),(1274,'پرند',1008,NULL,NULL),(1275,'باغستان',1008,NULL,NULL),(1276,'بومهن',1008,NULL,NULL),(1277,'پردیس',1008,NULL,NULL),(1278,'باقرشهر',1008,NULL,NULL),(1279,'پیشوا',1008,NULL,NULL),(1281,'صباشهر',1008,NULL,NULL),(1282,'چهاردانگه',1008,NULL,NULL),(1283,'دماوند',1008,NULL,NULL),(1284,'حسن آباد (تهران)',1008,NULL,NULL),(1285,'کهریزک',1008,NULL,NULL),(1286,'فردوسیه',1008,NULL,NULL),(1288,'صفادشت',1005,NULL,NULL),(1289,'نصیرشهر',1008,NULL,NULL),(1290,'رودهن',1008,NULL,NULL),(1291,'شاهدشهر',1008,NULL,NULL),(1293,'شریف آباد',1008,NULL,NULL),(1294,'لواسان',1008,NULL,NULL),(1295,'فیروزکوه',1008,NULL,NULL),(1296,'احمدآباد مستوفی',1008,NULL,NULL),(1297,'آبسرد',1008,NULL,NULL),(1298,'فشم',1008,NULL,NULL),(1299,'جوادآباد',1008,NULL,NULL),(1301,'شهرکرد',1009,NULL,NULL),(1302,'بروجن',1009,NULL,NULL),(1303,'لردگان',1009,NULL,NULL),(1304,'فرخ شهر',1009,NULL,NULL),(1305,'فارسان',1009,NULL,NULL),(1306,'هفشجان',1009,NULL,NULL),(1308,'سامان',1009,NULL,NULL),(1309,'فرادنبه',1009,NULL,NULL),(1310,'بن',1009,NULL,NULL),(1313,'بلداجی',1009,NULL,NULL),(1315,'اردل',1009,NULL,NULL),(1327,'آلونی',1009,NULL,NULL),(1336,'بیرجند',1010,NULL,NULL),(1337,'قائن',1010,NULL,NULL),(1338,'طبس',1010,NULL,NULL),(1339,'فردوس ( خراسان)',1010,NULL,NULL),(1340,'نهبندان',1010,NULL,NULL),(1341,'بشرویه',1010,NULL,NULL),(1342,'سرایان',1010,NULL,NULL),(1343,'سربیشه',1010,NULL,NULL),(1346,'خوسف',1010,NULL,NULL),(1348,'اسدیه',1010,NULL,NULL),(1354,'آرین شهر',1010,NULL,NULL),(1359,'مشهد',1011,NULL,NULL),(1360,'نیشابور',1011,NULL,NULL),(1361,'سبزوار',1011,NULL,NULL),(1362,'تربت حیدریه',1011,NULL,NULL),(1363,'کاشمر',1011,NULL,NULL),(1364,'قوچان',1011,NULL,NULL),(1365,'تربت جام',1011,NULL,NULL),(1366,'تایباد',1011,NULL,NULL),(1367,'چناران',1011,NULL,NULL),(1368,'سرخس',1011,NULL,NULL),(1369,'گناباد',1011,NULL,NULL),(1370,'فریمان',1011,NULL,NULL),(1371,'گلبهار',1011,NULL,NULL),(1372,'درگز',1011,NULL,NULL),(1373,'خواف',1011,NULL,NULL),(1374,'بردسکن',1011,NULL,NULL),(1375,'طرقبه',1011,NULL,NULL),(1376,'فیض آباد',1011,NULL,NULL),(1377,'نقاب',1011,NULL,NULL),(1378,'شاندیز',1011,NULL,NULL),(1380,'خلیل آباد',1011,NULL,NULL),(1381,'سنگان',1011,NULL,NULL),(1382,'بجستان',1011,NULL,NULL),(1386,'جغتای',1011,NULL,NULL),(1388,'باخرز',1011,NULL,NULL),(1394,'کلات',1011,NULL,NULL),(1395,'سلامی',1011,NULL,NULL),(1396,'رشتخوار',1011,NULL,NULL),(1403,'سلطان آباد (خراسان رضوی)',1011,NULL,NULL),(1404,'فیروزه',1011,NULL,NULL),(1409,'قلندرآباد',1011,NULL,NULL),(1410,'کاخک',1011,NULL,NULL),(1420,'بجنورد',1012,NULL,NULL),(1421,'شیروان',1012,NULL,NULL),(1422,'اسفراین',1012,NULL,NULL),(1423,'آشخانه',1012,NULL,NULL),(1424,'جاجرم',1012,NULL,NULL),(1425,'فاروج',1012,NULL,NULL),(1426,'گرمه',1012,NULL,NULL),(1435,'اهواز',1013,NULL,NULL),(1436,'دزفول',1013,NULL,NULL),(1437,'آبادان',1013,NULL,NULL),(1438,'ماهشهر',1013,NULL,NULL),(1439,'اندیمشک',1013,NULL,NULL),(1440,'خرمشهر',1013,NULL,NULL),(1441,'بهبهان',1013,NULL,NULL),(1442,'ایذه',1013,NULL,NULL),(1443,'شوشتر',1013,NULL,NULL),(1444,'مسجد سلیمان',1013,NULL,NULL),(1445,'بندرامام خمینی',1013,NULL,NULL),(1446,'شوش دانیال',1013,NULL,NULL),(1447,'رامهرمز',1013,NULL,NULL),(1448,'امیدیه',1013,NULL,NULL),(1449,'کوت عبدالله',1013,NULL,NULL),(1450,'سوسنگرد',1013,NULL,NULL),(1451,'شادگان',1013,NULL,NULL),(1453,'چمران',1013,NULL,NULL),(1454,'هندیجان',1013,NULL,NULL),(1455,'باغملک',1013,NULL,NULL),(1456,'رامشیر',1013,NULL,NULL),(1457,'گتوند',1013,NULL,NULL),(1458,'حمیدیه',1013,NULL,NULL),(1459,'هویزه',1013,NULL,NULL),(1460,'لالی',1013,NULL,NULL),(1461,'ملاثانی',1013,NULL,NULL),(1462,'هفتکل',1013,NULL,NULL),(1464,'آغاجاری',1013,NULL,NULL),(1466,'شهرامام',1013,NULL,NULL),(1468,'شمس آباد',1013,NULL,NULL),(1476,'الهایی',1013,NULL,NULL),(1477,'صیدون',1013,NULL,NULL),(1497,'زنجان',1014,NULL,NULL),(1498,'ابهر',1014,NULL,NULL),(1499,'خرمدره',1014,NULL,NULL),(1500,'قیدار',1014,NULL,NULL),(1501,'هیدج',1014,NULL,NULL),(1503,'طارم',1014,NULL,NULL),(1504,'سلطانیه',1014,NULL,NULL),(1513,'سمنان',1015,NULL,NULL),(1514,'شاهرود',1015,NULL,NULL),(1515,'دامغان',1015,NULL,NULL),(1516,'گرمسار',1015,NULL,NULL),(1517,'مهدی شهر',1015,NULL,NULL),(1518,'ایوانکی',1015,NULL,NULL),(1519,'شهمیرزاد',1015,NULL,NULL),(1520,'سرخه',1015,NULL,NULL),(1522,'آرادان',1015,NULL,NULL),(1528,'میامی',1015,NULL,NULL),(1531,'زاهدان',1016,NULL,NULL),(1532,'زابل',1016,NULL,NULL),(1533,'ایرانشهر',1016,NULL,NULL),(1534,'چابهار',1016,NULL,NULL),(1535,'سراوان (سیستان و بلوچستان)',1016,NULL,NULL),(1536,'خاش',1016,NULL,NULL),(1537,'کنارک',1016,NULL,NULL),(1538,'جالق',1016,NULL,NULL),(1539,'نیک شهر',1016,NULL,NULL),(1541,'سوران',1016,NULL,NULL),(1542,'زهک',1016,NULL,NULL),(1543,'فنوج',1016,NULL,NULL),(1544,'مهرستان',1016,NULL,NULL),(1546,'قصرقند',1016,NULL,NULL),(1550,'میرجاوه',1016,NULL,NULL),(1562,'بنجار',1016,NULL,NULL),(1563,'ادیمی',1016,NULL,NULL),(1565,'شیراز',1017,NULL,NULL),(1566,'مرودشت',1017,NULL,NULL),(1567,'جهرم',1017,NULL,NULL),(1568,'فسا',1017,NULL,NULL),(1569,'کازرون',1017,NULL,NULL),(1570,'شهر جدید صدرا',1017,NULL,NULL),(1571,'داراب',1017,NULL,NULL),(1572,'فیروزآباد',1017,NULL,NULL),(1573,'لار',1017,NULL,NULL),(1574,'آباده',1017,NULL,NULL),(1575,'نورآبادممسنی',1017,NULL,NULL),(1576,'نی ریز',1017,NULL,NULL),(1577,'اقلید',1017,NULL,NULL),(1578,'استهبان',1017,NULL,NULL),(1579,'گراش',1017,NULL,NULL),(1580,'زرقان',1017,NULL,NULL),(1581,'کوار',1017,NULL,NULL),(1582,'لامرد',1017,NULL,NULL),(1583,'صفاشهر',1017,NULL,NULL),(1584,'قائمیه',1017,NULL,NULL),(1585,'حاجی آباد (زرین دشت فارس)',1017,NULL,NULL),(1586,'فراشبند',1017,NULL,NULL),(1587,'قیر',1017,NULL,NULL),(1588,'اوز',1017,NULL,NULL),(1589,'خنج',1017,NULL,NULL),(1590,'خرامه',1017,NULL,NULL),(1591,'سروستان',1017,NULL,NULL),(1592,'ارسنجان',1017,NULL,NULL),(1593,'سعادت شهر',1017,NULL,NULL),(1594,'قادرآباد',1017,NULL,NULL),(1595,'اردکان (یزد)',1031,NULL,NULL),(1597,'جنت شهر',1017,NULL,NULL),(1598,'گله دار',1017,NULL,NULL),(1600,'میمند',1017,NULL,NULL),(1602,'بوانات',1017,NULL,NULL),(1604,'خشت',1017,NULL,NULL),(1605,'اشکنان',1017,NULL,NULL),(1607,'مصیری',1017,NULL,NULL),(1610,'کارزین',1017,NULL,NULL),(1612,'جویم',1017,NULL,NULL),(1613,'مهر',1017,NULL,NULL),(1616,'آباده طشک',1017,NULL,NULL),(1619,'بیرم',1017,NULL,NULL),(1625,'خومه زار',1017,NULL,NULL),(1639,'علامرودشت',1017,NULL,NULL),(1656,'قزوین',1018,NULL,NULL),(1657,'الوند',1018,NULL,NULL),(1658,'محمدیه',1018,NULL,NULL),(1659,'تاکستان',1018,NULL,NULL),(1660,'آبیک',1018,NULL,NULL),(1661,'اقبالیه',1018,NULL,NULL),(1662,'محمودآباد نمونه (قزوین)',1018,NULL,NULL),(1663,'بوئین زهرا',1018,NULL,NULL),(1664,'شریفیه',1018,NULL,NULL),(1668,'دانسفهان',1018,NULL,NULL),(1670,'خرمدشت',1018,NULL,NULL),(1671,'آبگرم',1018,NULL,NULL),(1674,'آوج',1018,NULL,NULL),(1677,'قم',1019,NULL,NULL),(1681,'سنندج',1020,NULL,NULL),(1682,'سقز',1020,NULL,NULL),(1683,'مریوان',1020,NULL,NULL),(1684,'بانه',1020,NULL,NULL),(1685,'قروه',1020,NULL,NULL),(1686,'کامیاران',1020,NULL,NULL),(1687,'بیجار',1020,NULL,NULL),(1688,'دیواندره',1020,NULL,NULL),(1689,'دهگلان',1020,NULL,NULL),(1693,'سروآباد',1020,NULL,NULL),(1695,'موچش',1020,NULL,NULL),(1699,'کرمان',1021,NULL,NULL),(1700,'سیرجان',1021,NULL,NULL),(1701,'رفسنجان',1021,NULL,NULL),(1702,'جیرفت',1021,NULL,NULL),(1703,'بم ',1021,NULL,NULL),(1704,'زرند',1021,NULL,NULL),(1705,'کهنوج',1021,NULL,NULL),(1706,'شهربابک',1021,NULL,NULL),(1707,'بافت',1021,NULL,NULL),(1708,'بردسیر',1021,NULL,NULL),(1710,'راور',1021,NULL,NULL),(1714,'عنبرآباد',1021,NULL,NULL),(1715,'منوجان',1021,NULL,NULL),(1716,'انار',1021,NULL,NULL),(1717,'رودبار (کرمان)',1021,NULL,NULL),(1718,'رابر',1021,NULL,NULL),(1719,'قلعه گنج',1021,NULL,NULL),(1720,'کوهبنان',1021,NULL,NULL),(1733,'فهرج',1021,NULL,NULL),(1734,'ارزوئیه',1021,NULL,NULL),(1745,'نرماشیر',1021,NULL,NULL),(1748,'فاریاب',1021,NULL,NULL),(1763,'یاسوج',1022,NULL,NULL),(1764,'دوگنبدان',1022,NULL,NULL),(1765,'دهدشت',1022,NULL,NULL),(1766,'لیکک',1022,NULL,NULL),(1767,'مادوان',1022,NULL,NULL),(1768,'چرام',1022,NULL,NULL),(1769,'لنده',1022,NULL,NULL),(1770,'باشت',1022,NULL,NULL),(1771,'سی سخت',1022,NULL,NULL),(1776,'گرگان',1023,NULL,NULL),(1777,'گنبدکاوس',1023,NULL,NULL),(1778,'بندرترکمن',1023,NULL,NULL),(1779,'علی آبادکتول',1023,NULL,NULL),(1780,'آزادشهر',1023,NULL,NULL),(1781,'کردکوی',1023,NULL,NULL),(1782,'کلاله',1023,NULL,NULL),(1783,'آق قلا',1023,NULL,NULL),(1784,'مینودشت',1023,NULL,NULL),(1785,'گالیکش',1023,NULL,NULL),(1786,'بندر گز',1023,NULL,NULL),(1787,'فاضل آباد',1023,NULL,NULL),(1790,'رامیان',1023,NULL,NULL),(1791,'خان ببین',1023,NULL,NULL),(1792,'مراوه تپه',1023,NULL,NULL),(1793,'دلند',1023,NULL,NULL),(1803,'رشت',1024,NULL,NULL),(1804,'بندرانزلی',1024,NULL,NULL),(1805,'لاهیجان',1024,NULL,NULL),(1806,'لنگرود',1024,NULL,NULL),(1807,'تالش',1024,NULL,NULL),(1808,'آستارا',1024,NULL,NULL),(1809,'صومعه سرا',1024,NULL,NULL),(1810,'آستانه اشرفیه',1024,NULL,NULL),(1811,'رودسر',1024,NULL,NULL),(1812,'فومن',1024,NULL,NULL),(1813,'خمام',1024,NULL,NULL),(1814,'سیاهکل',1024,NULL,NULL),(1815,'رضوانشهر',1024,NULL,NULL),(1816,'ماسال',1024,NULL,NULL),(1817,'منجیل',1024,NULL,NULL),(1818,'املش',1024,NULL,NULL),(1819,'بندر کیاشهر',1024,NULL,NULL),(1820,'رستم آباد',1024,NULL,NULL),(1821,'لوشان',1024,NULL,NULL),(1822,'سنگر',1024,NULL,NULL),(1823,'کلاچای',1024,NULL,NULL),(1824,'لوندویل',1024,NULL,NULL),(1825,'اسالم',1024,NULL,NULL),(1826,'رحیم آباد',1024,NULL,NULL),(1827,'لشت نشاء',1024,NULL,NULL),(1828,'رودبار (گیلان)',1024,NULL,NULL),(1829,'کوچصفهان',1024,NULL,NULL),(1831,'چابکسر',1024,NULL,NULL),(1832,'شفت',1024,NULL,NULL),(1833,'پره سر',1024,NULL,NULL),(1835,'خشکبیجار',1024,NULL,NULL),(1837,'کومله',1024,NULL,NULL),(1839,'چوبر',1024,NULL,NULL),(1840,'شلمان',1024,NULL,NULL),(1844,'لیسار',1024,NULL,NULL),(1845,'رودبنه',1024,NULL,NULL),(1846,'خرم آباد (لرستان)',1025,NULL,NULL),(1847,'بروجرد',1025,NULL,NULL),(1848,'دورود',1025,NULL,NULL),(1849,'الیگودرز',1025,NULL,NULL),(1850,'کوهدشت',1025,NULL,NULL),(1852,'ازنا',1025,NULL,NULL),(1853,'الشتر',1025,NULL,NULL),(1854,'پلدختر',1025,NULL,NULL),(1861,'ساری',1026,NULL,NULL),(1862,'بابل',1026,NULL,NULL),(1863,'آمل',1026,NULL,NULL),(1864,'قائم شهر',1026,NULL,NULL),(1865,'بهشهر',1026,NULL,NULL),(1866,'چالوس',1026,NULL,NULL),(1867,'نکا',1026,NULL,NULL),(1868,'بابلسر',1026,NULL,NULL),(1869,'تنکابن',1026,NULL,NULL),(1870,'نوشهر',1026,NULL,NULL),(1871,'فریدونکنار',1026,NULL,NULL),(1872,'رامسر',1026,NULL,NULL),(1873,'جویبار',1026,NULL,NULL),(1874,'محمودآباد (مازندران)',1026,NULL,NULL),(1875,'امیرکلا',1026,NULL,NULL),(1876,'نور',1026,NULL,NULL),(1878,'کتالم و سادات شهر',1026,NULL,NULL),(1879,'زیرآب ',1026,NULL,NULL),(1880,'عباس آباد',1026,NULL,NULL),(1881,'کلاردشت',1026,NULL,NULL),(1882,'رستم کلا',1026,NULL,NULL),(1884,'شیرود',1026,NULL,NULL),(1885,'چمستان',1026,NULL,NULL),(1887,'هچیرود',1026,NULL,NULL),(1889,'سلمان شهر(متل قو)',1026,NULL,NULL),(1890,'سورک',1026,NULL,NULL),(1891,'شیرگاه',1026,NULL,NULL),(1892,'پل سفید',1026,NULL,NULL),(1893,'کیاکلا',1026,NULL,NULL),(1894,'بهنمیر',1026,NULL,NULL),(1895,'هادی شهر',1001,NULL,NULL),(1896,'رویان (مازندران)',1026,NULL,NULL),(1899,'گلوگاه',1026,NULL,NULL),(1900,'سرخرود',1026,NULL,NULL),(1901,'مرزن آباد',1026,NULL,NULL),(1902,'نشتارود',1026,NULL,NULL),(1903,'کلارآباد',1026,NULL,NULL),(1910,'اراک',1027,NULL,NULL),(1911,'ساوه',1027,NULL,NULL),(1912,'خمین',1027,NULL,NULL),(1913,'محلات',1027,NULL,NULL),(1914,'دلیجان',1027,NULL,NULL),(1916,'شازند',1027,NULL,NULL),(1917,'مهاجران ( اراک)',1027,NULL,NULL),(1918,'تفرش',1027,NULL,NULL),(1920,'کمیجان',1027,NULL,NULL),(1921,'آشتیان',1027,NULL,NULL),(1922,'خنداب',1027,NULL,NULL),(1924,'نیمور',1027,NULL,NULL),(1937,'بندرعباس',1028,NULL,NULL),(1938,'میناب',1028,NULL,NULL),(1939,'قشم',1028,NULL,NULL),(1940,'کیش',1028,NULL,NULL),(1941,'دهبارز',1028,NULL,NULL),(1942,'بندرلنگه',1028,NULL,NULL),(1943,'حاجی آباد (هرمزگان)',1028,NULL,NULL),(1944,'بندر کنگ',1028,NULL,NULL),(1945,'پارسیان',1028,NULL,NULL),(1946,'بندرجاسک',1028,NULL,NULL),(1947,'بندر خمیر',1028,NULL,NULL),(1948,'درگهان',1028,NULL,NULL),(1949,'بستک',1028,NULL,NULL),(1951,'جناح',1028,NULL,NULL),(1952,'هشتبندی',1028,NULL,NULL),(1957,'بندر سیریک',1028,NULL,NULL),(1958,'تیرور',1028,NULL,NULL),(1959,'دشتی',1028,NULL,NULL),(1961,'ابوموسی',1028,NULL,NULL),(1963,'گروک',1028,NULL,NULL),(1967,'کوهستک',1028,NULL,NULL),(1968,'همدان',1029,NULL,NULL),(1969,'ملایر',1029,NULL,NULL),(1970,'نهاوند',1029,NULL,NULL),(1971,'اسدآباد',1029,NULL,NULL),(1972,'تویسرکان',1029,NULL,NULL),(1973,'بهار (همدان)',1029,NULL,NULL),(1974,'کبودرآهنگ',1029,NULL,NULL),(1975,'لالجین',1029,NULL,NULL),(1976,'رزن',1029,NULL,NULL),(1977,'فامنین',1029,NULL,NULL),(1980,'قروه درگزین',1029,NULL,NULL),(1984,'مهاجران',1029,NULL,NULL),(1985,'فیروزان',1029,NULL,NULL),(1989,'کرمانشاه',1030,NULL,NULL),(1990,'اسلام آبادغرب',1030,NULL,NULL),(1991,'جوانرود',1030,NULL,NULL),(1992,'کنگاور',1030,NULL,NULL),(1993,'سرپل ذهاب',1030,NULL,NULL),(1994,'سنقر',1030,NULL,NULL),(1995,'هرسین',1030,NULL,NULL),(1996,'صحنه',1030,NULL,NULL),(1997,'پاوه',1030,NULL,NULL),(1998,'روانسر',1030,NULL,NULL),(1999,'گیلانغرب',1030,NULL,NULL),(2000,'قصرشیرین',1030,NULL,NULL),(2001,'تازه آباد',1030,NULL,NULL),(2002,'کرند',1030,NULL,NULL),(2010,'یزد',1031,NULL,NULL),(2011,'میبد',1031,NULL,NULL),(2014,'بافق',1031,NULL,NULL),(2015,'مهریز',1031,NULL,NULL),(2016,'ابرکوه',1031,NULL,NULL),(2017,'اشکذر',1031,NULL,NULL),(2018,'تفت',1031,NULL,NULL),(2019,'شاهدیه',1031,NULL,NULL),(2020,'هرات',1031,NULL,NULL),(2021,'زارچ',1031,NULL,NULL),(2022,'مروست',1031,NULL,NULL),(2023,'بهاباد',1031,NULL,NULL),(2029,'سربندر',1013,NULL,NULL),(2030,'رستم',1017,NULL,NULL),(2032,'نایی سر',1020,NULL,NULL),(2033,'گچساران',1022,NULL,NULL),(2034,'رومشگان',1025,NULL,NULL),(2035,'نورآباد دلفان (لرستان)',1025,NULL,NULL),(2037,'زرندیه',1027,NULL,NULL),(2038,'رودان',1028,NULL,NULL),(2039,'سپاهان شهر',1004,NULL,NULL),(2040,'سعیدآباد',1008,NULL,NULL),(2042,'سمیرم',1004,NULL,NULL),(2044,'جاجرود',1008,NULL,NULL),(2045,'شهرری',1008,NULL,NULL),(2046,'خفر',1017,NULL,NULL),(2047,'سپیدان',1017,NULL,NULL),(2055,'ملکشاهی',1006,NULL,NULL),(2056,'طبل',1028,NULL,NULL),(2057,'هامون',1016,NULL,NULL),(2058,'چالدران',1002,NULL,NULL),(2059,'هیرمند',1016,NULL,NULL),(2060,'خانمیرزا',1009,NULL,NULL),(2061,'شاندرمن',1024,NULL,NULL),(2062,'حکم آباد',1011,NULL,NULL),(2064,'فراهان',1027,NULL,NULL),(2065,'ثلاث باباجانی',1030,NULL,NULL),(2067,'بشاگرد',1028,NULL,NULL),(2068,'چورزق',1014,NULL,NULL),(2070,'بندر عامری',1007,NULL,NULL),(2071,'خرم آباد (مازندران)',1026,NULL,NULL),(2074,'میاندرود',1026,NULL,NULL),(2075,'کرد آباد',1029,NULL,NULL),(2076,'گروگ',1028,NULL,NULL),(2255,'کیار',1009,NULL,NULL),(2319,'گل تپه کبیر',1008,NULL,NULL),(2320,'قیامدشت',1008,NULL,NULL),(2321,'شهرک قلعه میر',1008,NULL,NULL),(2322,'شهرک صنعتی عباس آباد',1008,NULL,NULL),(2324,'رویان (سمنان)',1015,NULL,NULL),(2325,'نصیرآباد (تهران)',1008,NULL,NULL),(2326,'سلطان آباد (تهران)',1008,NULL,NULL),(2327,'سبزدشت',1008,NULL,NULL),(2328,'امیریه (تهران)',1008,NULL,NULL),(2332,'میانکوه',1013,NULL,NULL),(2336,'تجریش',1008,NULL,NULL),(2337,'مهرشهر (البرز)',1005,NULL,NULL),(2338,'خاورشهر',1008,NULL,NULL),(2339,'اسلام آباد (تهران)',1008,NULL,NULL),(2341,'صالح آباد (تهران)',1008,NULL,NULL),(2342,'شاطره',1008,NULL,NULL),(2344,'شهرک صنعتی پرند',1008,NULL,NULL),(2346,'حصارک پایین',1005,NULL,NULL),(2347,'مهرآباد',1008,NULL,NULL),(2348,'پالایشگاه اصفهان',1004,NULL,NULL),(3001,'فریدن',1004,NULL,NULL),(3002,'حصارک بالا',1005,NULL,NULL),(3003,'جوادیه الهیه',1021,NULL,NULL),(3004,'گویم',1017,NULL,NULL),(3005,'زاغمرز',1026,NULL,NULL),(3006,'فرح آباد (مازندران)',1026,NULL,NULL),(3007,'سراوان (گیلان)',1024,NULL,NULL),(3008,'حسین آباد (قزوین)',1018,NULL,NULL),(3009,'سردشت (هرمزگان)',1028,NULL,NULL),(3010,'خونسرخ',1028,NULL,NULL),(3011,'هلر',1028,NULL,NULL),(3012,'تل خسرو',1022,NULL,NULL),(3013,'هماشهر (کرمان)',1021,NULL,NULL),(3014,'هشتپر',1024,NULL,NULL),(3015,'نیر (یزد)',1031,NULL,NULL),(3016,'مأمونیه',1027,NULL,NULL),(3017,'گل تپه',1029,NULL,NULL),(3018,'سلفچگان',1019,NULL,NULL),(3019,'دیلمان',1024,NULL,NULL),(3020,'کیانمهر',1005,NULL,NULL),(3021,'زهوکی',1028,NULL,NULL),(3024,'ثبت',1011,NULL,NULL),(3025,'سیب سوران',1016,NULL,NULL),(3026,'غازیان',1024,NULL,NULL),(3027,'فساء سرو',1017,NULL,NULL),(3041,'منطقه آزاد انزلی - لشت نشاء',1024,NULL,NULL),(3042,'قیدار - خدابنده',1014,NULL,NULL),(3045,'پیران',1030,NULL,NULL),(3048,'طاق بستان',1030,NULL,NULL),(3052,'جوین',1011,NULL,NULL),(3055,'آبعلی',1008,NULL,NULL),(3056,'فیض آباد (مه ولات)',1011,NULL,NULL),(3057,'شهرصنعتی الوند',1018,NULL,NULL),(3058,'کلمه',1007,NULL,NULL),(3059,'سرباز',1016,NULL,NULL),(3060,'خرمبید',1017,NULL,NULL),(3061,'علی آباد',1023,NULL,NULL),(3062,'چایپاره',1002,NULL,NULL),(3063,'آب بر',1014,NULL,NULL),(3064,'سنگان (خاش)	',1016,NULL,NULL),(3065,'فیروزآباد (سلسله)',1025,NULL,NULL),(3066,'اردکان (سپیدان)',1017,NULL,NULL),(3067,'مهاباد (اردستان)',1004,NULL,NULL),(3068,'فشافویه',1008,NULL,NULL),(3070,'بهارستان اصفهان',1004,NULL,NULL),(3072,'کردان',1005,NULL,NULL);
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,4,1,0,'تست 1','2026-09-25 05:57:58','2026-09-23 10:20:59','2026-09-25 05:57:58'),(2,4,1,1,'تست 2',NULL,'2026-09-23 10:23:00','2026-09-25 06:14:18'),(3,4,1,1,'تست سه',NULL,'2026-09-25 06:13:55','2026-09-25 06:14:22'),(4,4,1,1,'تست کلاسیک',NULL,'2026-09-26 05:27:59','2026-09-26 05:28:08'),(5,4,1,1,'تست 4',NULL,'2026-09-26 05:34:26','2026-09-26 05:34:37'),(6,4,1,1,'تست 5',NULL,'2026-09-26 05:34:59','2026-09-26 05:35:14');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_us` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_us`
--

LOCK TABLES `contact_us` WRITE;
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
INSERT INTO `contact_us` VALUES (1,'علی لصغر سلسمی','mohamadmoradi138383@gmail.com','تستتت','تستتتتت','2026-10-11 05:20:33','2026-10-11 05:20:33'),(2,'علی لصغر سلسمی','m@gmail.com','تستتت','eeeeeeee','2026-10-11 09:30:01','2026-10-11 09:30:01');
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('amount','percentage') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int unsigned DEFAULT NULL,
  `percentage` int unsigned DEFAULT NULL,
  `max_percentage_amount` int unsigned DEFAULT NULL,
  `expired_at` timestamp NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
INSERT INTO `coupons` VALUES (1,'تست یک پلاس','1122','amount',10000,5,1000,'2026-11-12 20:30:00',NULL,'2026-10-03 04:26:22','2026-10-03 06:34:57');
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_08_25_140045_create_categories_table',1),(5,'2026_08_25_140313_create_brands_table',1),(6,'2026_08_25_141033_create_products_table',1),(7,'2026_08_25_142018_create_product_images_table',1),(8,'2026_08_25_143134_create_tags_table',1),(9,'2026_08_25_143847_create_product_tag_table',1),(10,'2026_08_25_144053_create_comments_table',1),(11,'2026_08_25_144500_create_product_rates_table',1),(12,'2026_08_25_144742_create_attributes_table',1),(13,'2026_08_25_144905_create_attribute_category_table',1),(14,'2026_08_25_145452_create_product_attributes_table',1),(15,'2026_08_25_150212_create_product_variations_table',1),(16,'2026_08_25_151156_create_provinces_table',1),(17,'2026_08_25_151306_create_cities_table',1),(18,'2026_08_25_151622_create_user_addresses_table',1),(19,'2026_08_25_152527_create_coupons_table',1),(20,'2026_08_25_162639_create_orders_table',1),(21,'2026_08_25_163934_create_order_items_table',1),(22,'2026_08_25_164912_create_transactions_table',1),(23,'2026_08_25_170048_create_wishlist_table',1),(24,'2026_08_26_090708_create_banners_table',1),(25,'2026_08_26_091220_create_contact_us_table',1),(26,'2026_08_26_091347_create_settings_table',1),(27,'2026_09_15_213400_add_two_factor_columns_to_users_table',1),(28,'2026_09_15_213401_create_passkeys_table',1),(29,'2026_10_12_074800_create_permission_tables',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
INSERT INTO `model_has_permissions` VALUES (3,'App\\Models\\Role',1),(4,'App\\Models\\Role',1),(1,'App\\Models\\User',1),(1,'App\\Models\\Role',2),(2,'App\\Models\\Role',2),(3,'App\\Models\\Role',2),(2,'App\\Models\\User',2),(3,'App\\Models\\User',2),(1,'App\\Models\\Role',3),(2,'App\\Models\\Role',3),(3,'App\\Models\\Role',3),(4,'App\\Models\\Role',3);
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',4);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned DEFAULT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  `product_variation_id` bigint unsigned DEFAULT NULL,
  `price` int unsigned NOT NULL,
  `quantity` int unsigned NOT NULL,
  `subtotal` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  KEY `order_items_product_variation_id_foreign` (`product_variation_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_product_variation_id_foreign` FOREIGN KEY (`product_variation_id`) REFERENCES `product_variations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,1,2,3,2895000,2,5790000,'2026-10-10 11:18:12','2026-10-10 11:18:12'),(2,2,3,7,1435000,1,1435000,'2026-10-10 11:19:20','2026-10-10 11:19:20'),(3,3,3,7,1435000,1,1435000,'2026-10-10 11:20:02','2026-10-10 11:20:02'),(4,4,1,1,1000,1,1000,'2026-10-14 09:46:01','2026-10-14 09:46:01'),(5,5,2,3,2895000,1,2895000,'2026-10-17 11:13:43','2026-10-17 11:13:43'),(6,6,2,3,2895000,1,2895000,'2026-10-17 11:14:37','2026-10-17 11:14:37'),(7,7,2,3,2895000,1,2895000,'2026-10-17 11:22:58','2026-10-17 11:22:58'),(8,8,2,3,2895000,1,2895000,'2026-10-17 11:42:36','2026-10-17 11:42:36'),(9,8,3,7,1435000,1,1435000,'2026-10-17 11:42:36','2026-10-17 11:42:36');
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `address_id` bigint unsigned NOT NULL,
  `coupon_id` bigint unsigned DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `total_amount` int unsigned NOT NULL,
  `delivery_amount` int unsigned NOT NULL DEFAULT '0',
  `coupon_amount` int unsigned NOT NULL DEFAULT '0',
  `paying_amount` int unsigned NOT NULL,
  `payment_type` enum('pos','cash','shabaNumber','cardToCard','online') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` tinyint NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_address_id_foreign` (`address_id`),
  KEY `orders_coupon_id_foreign` (`coupon_id`),
  CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `user_addresses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,4,1,NULL,1,5790000,72000,0,5862000,'online',1,NULL,'2026-10-10 11:18:12','2026-10-10 11:18:21'),(2,4,1,NULL,0,1435000,66000,0,1501000,'online',0,NULL,'2026-10-10 11:19:20','2026-10-10 11:19:20'),(3,4,1,NULL,1,1435000,66000,0,1501000,'online',1,NULL,'2026-10-10 11:20:02','2026-10-10 11:20:07'),(4,4,1,NULL,1,1000,45000,0,46000,'online',1,NULL,'2026-10-14 09:46:01','2026-10-14 09:46:07'),(5,4,1,NULL,0,2895000,72000,0,2967000,'online',0,NULL,'2026-10-17 11:13:43','2026-10-17 11:13:43'),(6,4,1,NULL,0,2895000,72000,0,2967000,'online',0,NULL,'2026-10-17 11:14:37','2026-10-17 11:14:37'),(7,4,1,NULL,0,2895000,72000,0,2967000,'online',0,NULL,'2026-10-17 11:22:58','2026-10-17 11:22:58'),(8,4,1,NULL,1,4330000,138000,0,4468000,'online',1,NULL,'2026-10-17 11:42:36','2026-10-17 11:42:40');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passkeys`
--

DROP TABLE IF EXISTS `passkeys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `passkeys` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credential_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credential` json NOT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `passkeys_credential_id_unique` (`credential_id`),
  KEY `passkeys_user_id_index` (`user_id`),
  CONSTRAINT `passkeys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passkeys`
--

LOCK TABLES `passkeys` WRITE;
/*!40000 ALTER TABLE `passkeys` DISABLE KEYS */;
/*!40000 ALTER TABLE `passkeys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'create-article','ایجاد پست','web','2026-10-12 04:55:17','2026-10-12 05:20:33'),(2,'edit-article','ویرایش پست','web','2026-10-12 05:20:53','2026-10-12 05:21:27'),(3,'delete-article','حذف پست','web','2026-10-12 05:21:53','2026-10-12 05:21:53'),(4,'create-tag','ایجاد تگ','web','2026-10-12 05:22:14','2026-10-12 05:22:14');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_attributes`
--

DROP TABLE IF EXISTS `product_attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_attributes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_attributes_attribute_id_foreign` (`attribute_id`),
  KEY `product_attributes_product_id_foreign` (`product_id`),
  CONSTRAINT `product_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_attributes`
--

LOCK TABLES `product_attributes` WRITE;
/*!40000 ALTER TABLE `product_attributes` DISABLE KEYS */;
INSERT INTO `product_attributes` VALUES (1,6,1,'بهار',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(2,5,1,'سه‌ربع',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(3,3,1,'پنبه‌ای',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(4,6,2,'زمستان',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(5,5,2,'سه‌ربع',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(6,4,2,'راه‌راه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(7,6,3,'تابستان',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(8,4,3,'چهارخانه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(9,3,3,'کتان',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(10,5,3,'سه‌ربع',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(11,3,4,'پلی‌استر',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(12,5,4,'کوتاه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(13,5,5,'کوتاه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(14,3,5,'نخی',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(15,6,5,'بهار',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(16,4,5,'راه‌راه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(17,5,6,'بلند',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(18,6,6,'تابستان',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(19,6,7,'تابستان',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(20,3,7,'پنبه‌ای',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(21,4,7,'راه‌راه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(22,3,8,'نخی',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(23,4,8,'راه‌راه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(24,6,8,'تابستان',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(25,5,8,'سه‌ربع',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(26,5,9,'کوتاه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(27,6,9,'تابستان',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(28,5,10,'کوتاه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(29,4,10,'چاپی',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(30,3,10,'جین',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(31,3,11,'پنبه‌ای',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(32,5,11,'کوتاه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(33,4,11,'چهارخانه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(34,3,12,'نخی',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(35,5,12,'کوتاه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(36,4,12,'چاپی',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(37,5,13,'کوتاه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(38,3,13,'جین',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(39,6,13,'زمستان',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(40,4,13,'چهارخانه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(41,4,14,'چهارخانه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(42,6,14,'تابستان',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(43,5,15,'کوتاه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(44,4,15,'چهارخانه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(45,3,15,'پنبه‌ای',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(46,5,16,'کوتاه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(47,6,16,'زمستان',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(48,4,16,'چاپی',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(49,4,17,'ساده',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(50,6,17,'تابستان',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(51,4,18,'ساده',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(52,5,18,'بلند',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(53,3,18,'کتان',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(54,6,19,'زمستان',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(55,4,19,'چاپی',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(56,5,20,'سه‌ربع',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(57,6,20,'بهار',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(58,4,20,'راه‌راه',1,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(59,3,21,'پنبه',1,'2026-09-16 04:33:17','2026-09-16 04:33:17'),(60,4,21,'ساده',1,'2026-09-16 04:33:17','2026-09-16 04:33:17'),(61,5,21,'1',1,'2026-09-16 04:33:17','2026-09-16 04:33:17'),(62,6,21,'تابستانی',1,'2026-09-16 04:33:17','2026-09-16 04:33:17');
/*!40000 ALTER TABLE `product_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,1,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(2,2,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(3,3,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(4,4,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(5,5,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(6,6,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(7,7,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(8,8,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(9,9,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(10,10,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(11,11,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(12,12,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(13,13,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(14,14,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(15,15,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(16,16,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(17,17,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(18,18,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(19,19,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(20,20,'image.jpg','2026-09-16 04:10:45','2026-09-16 04:10:45'),(21,21,'20260916_080317_A5J_1.jpg','2026-09-16 04:33:17','2026-09-16 04:33:17');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_rates`
--

DROP TABLE IF EXISTS `product_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_rates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `rate` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_rates_user_id_foreign` (`user_id`),
  KEY `product_rates_product_id_foreign` (`product_id`),
  CONSTRAINT `product_rates_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_rates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_rates`
--

LOCK TABLES `product_rates` WRITE;
/*!40000 ALTER TABLE `product_rates` DISABLE KEYS */;
INSERT INTO `product_rates` VALUES (1,4,1,2,'2026-09-23 10:20:59','2026-09-26 05:34:59');
/*!40000 ALTER TABLE `product_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_tag`
--

DROP TABLE IF EXISTS `product_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_tag` (
  `tag_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tag_id`,`product_id`),
  KEY `product_tag_product_id_foreign` (`product_id`),
  CONSTRAINT `product_tag_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tag`
--

LOCK TABLES `product_tag` WRITE;
/*!40000 ALTER TABLE `product_tag` DISABLE KEYS */;
INSERT INTO `product_tag` VALUES (1,4,NULL,NULL),(1,6,NULL,NULL),(1,7,NULL,NULL),(1,8,NULL,NULL),(1,9,NULL,NULL),(1,12,NULL,NULL),(1,14,NULL,NULL),(1,17,NULL,NULL),(1,19,NULL,NULL),(2,2,NULL,NULL),(2,5,NULL,NULL),(2,6,NULL,NULL),(2,8,NULL,NULL),(2,16,NULL,NULL),(2,17,NULL,NULL),(2,21,NULL,NULL),(3,1,NULL,NULL),(3,9,NULL,NULL),(3,10,NULL,NULL),(3,11,NULL,NULL),(3,15,NULL,NULL),(3,16,NULL,NULL),(3,20,NULL,NULL),(3,21,NULL,NULL),(4,2,NULL,NULL),(4,11,NULL,NULL),(4,13,NULL,NULL),(4,16,NULL,NULL),(4,18,NULL,NULL),(4,19,NULL,NULL),(5,5,NULL,NULL),(5,7,NULL,NULL),(5,8,NULL,NULL),(5,13,NULL,NULL),(5,17,NULL,NULL),(5,19,NULL,NULL),(5,20,NULL,NULL),(6,3,NULL,NULL),(6,4,NULL,NULL),(6,7,NULL,NULL),(6,10,NULL,NULL),(6,15,NULL,NULL),(6,18,NULL,NULL);
/*!40000 ALTER TABLE `product_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_variations`
--

DROP TABLE IF EXISTS `product_variations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_variations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int unsigned NOT NULL DEFAULT '0',
  `quantity` int unsigned NOT NULL DEFAULT '0',
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` int unsigned DEFAULT NULL,
  `date_on_sale_from` timestamp NULL DEFAULT NULL,
  `date_on_sale_to` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_variations_attribute_id_foreign` (`attribute_id`),
  KEY `product_variations_product_id_foreign` (`product_id`),
  CONSTRAINT `product_variations_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_variations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_variations`
--

LOCK TABLES `product_variations` WRITE;
/*!40000 ALTER TABLE `product_variations` DISABLE KEYS */;
INSERT INTO `product_variations` VALUES (1,2,1,'S',1000,4,'FUU7MGXD',5000,'2026-09-28 12:51:00','2026-10-07 12:51:00',NULL,'2026-09-16 04:10:45','2026-10-14 09:46:07'),(2,2,1,'L',1000,18,'LVSH0R89',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-10-10 08:14:58'),(3,1,2,'مشکی',2895000,29,'CWZQIXZQ',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-10-17 11:42:41'),(4,1,2,'آبی',2895000,36,'DUVON9FS',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-10-10 08:14:58'),(5,1,2,'قرمز',2895000,12,'SJKGQAXC',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(6,1,2,'سبز',2895000,29,'N1RK00AA',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(7,1,3,'سبز',1435000,31,'FRWMXHSC',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-10-17 11:42:41'),(8,1,3,'سفید',1435000,37,'LTVFFHXC',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-10-10 05:41:58'),(9,2,4,'M',808000,42,'Q2BIEPFY',707000,'2026-09-29 12:33:00','2026-10-06 12:33:00',NULL,'2026-09-16 04:10:45','2026-10-10 09:54:43'),(10,2,4,'S',808000,41,'Z5DB7X5L',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(11,2,4,'XL',808000,41,'ZTVQGAQF',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-10-10 05:41:58'),(12,2,4,'XXL',808000,10,'SNNQDCHK',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(13,1,5,'مشکی',1151000,26,'YQNNGM1T',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(14,1,5,'آبی',1151000,7,'ZVBDTQMT',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(15,1,5,'سفید',1151000,39,'1NZLMTY4',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(16,1,5,'قرمز',1151000,30,'DY6BYGCN',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(17,1,6,'مشکی',1468000,13,'HKWETTXA',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(18,1,6,'قرمز',1468000,33,'IKNASD6O',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(19,1,6,'سفید',1468000,36,'YSKRI3EM',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(20,2,7,'XXL',2162000,29,'EHFBUEKD',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(21,2,7,'M',2162000,25,'YCGI5GBX',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(22,2,8,'L',3303000,21,'ETQURV16',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(23,2,8,'M',3303000,49,'GAUTZ5HW',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(24,2,8,'XL',3303000,21,'XXZP0LLB',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(25,1,9,'سبز',1158000,12,'7TUD2MBF',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(26,1,9,'سفید',1158000,39,'YPCXEEGT',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(27,1,9,'مشکی',1158000,5,'P2OSRCZX',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(28,1,10,'آبی',2741000,48,'TLFQT5KC',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(29,1,10,'سبز',2741000,50,'SNCOEDMZ',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(30,1,11,'مشکی',3176000,15,'FLDA1NK0',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(31,1,11,'آبی',3176000,20,'4TFUQTTK',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(32,1,12,'سبز',2997000,36,'0U4BUZHG',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(33,1,12,'قرمز',2997000,40,'BYNW2BIE',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(34,1,12,'آبی',2997000,17,'EUTKNFIU',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(35,1,12,'مشکی',2997000,12,'UBGOKPZI',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(36,2,13,'L',2552000,12,'VC6FVIIP',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(37,2,13,'XL',2552000,15,'7AJPK5ZC',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(38,2,13,'XXL',2552000,19,'P3WH1D0U',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(39,1,14,'سبز',2926000,34,'6VJ1TSXF',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(40,1,14,'قرمز',2926000,17,'XFOMHPB0',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(41,1,15,'سفید',3127000,14,'SB8NAFUU',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(42,1,15,'قرمز',3127000,14,'L2W7BQ8S',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(43,1,15,'سبز',3127000,12,'Q5VP2MAB',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(44,1,15,'مشکی',3127000,22,'QIOA5Q7C',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(45,2,16,'M',904000,10,'UK7ZDQHC',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(46,2,16,'XL',904000,42,'KVSZ5E08',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(47,2,17,'S',1566000,32,'CC6TYA78',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(48,2,17,'L',1566000,29,'HYQDMKVM',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(49,2,17,'XXL',1566000,46,'ZBKBCEVE',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(50,2,17,'XL',1566000,45,'XAEDLSOX',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(51,1,18,'مشکی',1118000,40,'CKFZC3P5',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(52,1,18,'سفید',1118000,43,'EMCB5ALM',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(53,1,18,'قرمز',1118000,34,'OQCQLQFY',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(54,1,18,'سبز',1118000,8,'SQH8LRW3',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(55,2,19,'M',2042000,41,'SSFI2THL',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(56,2,19,'S',2042000,7,'GOONGPMR',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(57,2,19,'XXL',2042000,31,'IMOGZDUK',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(58,1,20,'آبی',2182000,11,'THO7FFRJ',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(59,1,20,'مشکی',2182000,13,'NUBZVYEU',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(60,1,20,'سفید',2182000,19,'QVTWG6BV',NULL,NULL,NULL,NULL,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(61,1,21,'ابی',1400000,1,'3',NULL,NULL,NULL,NULL,'2026-09-16 04:33:17','2026-09-16 04:33:17'),(62,1,21,'قرمز',1250000,3,'34',NULL,NULL,NULL,NULL,'2026-09-16 04:33:17','2026-09-16 04:33:17');
/*!40000 ALTER TABLE `product_variations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `delivery_amount` int unsigned NOT NULL DEFAULT '0',
  `delivery_amount_per_product` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_brand_id_foreign` (`brand_id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'پیراهن مردانه کلاسیک',3,5,'پیراهن-مردانه-کلاسیک','20260916_204527_TXv_3.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,45000,22000,'2026-09-16 04:10:45','2026-09-16 17:15:27'),(2,'تی‌شرت مردانه ساده',4,7,'tyshrt-mrdanh-sadh-iFPkW','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,72000,28000,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(3,'شلوار جین مردانه',5,5,'shloar-gyn-mrdanh-ZgDQq','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,66000,0,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(4,'هودی مردانه اسپرت',2,7,'هودی-مردانه-اسپرت','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,58000,23000,'2026-09-16 04:10:45','2026-09-30 09:03:24'),(5,'پیراهن مردانه چهارخانه',4,7,'pyrahn-mrdanh-chharkhanh-ah3kl','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,54000,39000,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(6,'شومیز زنانه',4,6,'shomyz-znanh-JIFGb','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,43000,7000,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(7,'مانتو زنانه کلاسیک',4,7,'manto-znanh-klasyk-nVbDx','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,100000,6000,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(8,'مانتو زنانه اسپرت',7,5,'manto-znanh-asprt-jmr8I','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,55000,9000,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(9,'شلوار جین زنانه',8,7,'shloar-gyn-znanh-vQkFT','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,43000,46000,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(10,'تی‌شرت زنانه ساده',1,7,'tyshrt-znanh-sadh-EIQPZ','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,75000,13000,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(11,'پیراهن زنانه مجلسی',1,7,'pyrahn-znanh-mglsy-WrQFN','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,49000,13000,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(12,'کت زنانه پاییزه',1,5,'kt-znanh-payyzh-8KGuD','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,97000,11000,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(13,'هودی زنانه اسپرت',3,6,'hody-znanh-asprt-kAX0E','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,50000,6000,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(14,'شلوار زنانه کتان',1,5,'shloar-znanh-ktan-3t0k4','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,54000,15000,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(15,'پیراهن زنانه تابستانی',1,4,'pyrahn-znanh-tabstany-8sl6j','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,48000,9000,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(16,'تی‌شرت مردانه چاپی',3,7,'tyshrt-mrdanh-chapy-FDH0X','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,57000,22000,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(17,'شلوار مردانه کتان',1,6,'shloar-mrdanh-ktan-2b4d9','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,76000,1000,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(18,'مانتو زنانه تابستانی',5,6,'manto-znanh-tabstany-I2hKf','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,34000,21000,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(19,'پیراهن مردانه نخی',5,6,'pyrahn-mrdanh-nkhy-pw8Yg','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,69000,49000,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(20,'سویشرت زنانه اسپرت',5,7,'soyshrt-znanh-asprt-vwb4m','image.jpg','این محصول با کیفیت مناسب و طراحی زیبا برای استفاده روزمره تولید شده است.',1,1,50000,7000,'2026-09-16 04:10:45','2026-09-16 04:10:45'),(21,'کت شلوار مردانه 1',1,4,'کت-شلوار-مردانه-1','20260916_080317_OSA_1.jpg','سسس',1,1,5000,222,'2026-09-16 04:33:17','2026-09-16 04:33:17');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provinces` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1032 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinces`
--

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` VALUES (1001,'آذربایجان شرقی',NULL,NULL),(1002,'آذربایجان غربی',NULL,NULL),(1003,'اردبیل',NULL,NULL),(1004,'اصفهان',NULL,NULL),(1005,'البرز',NULL,NULL),(1006,'ایلام',NULL,NULL),(1007,'بوشهر',NULL,NULL),(1008,'تهران',NULL,NULL),(1009,'چهارمحال و بختیاری',NULL,NULL),(1010,'خراسان جنوبی',NULL,NULL),(1011,'خراسان رضوی',NULL,NULL),(1012,'خراسان شمالی',NULL,NULL),(1013,'خوزستان',NULL,NULL),(1014,'زنجان',NULL,NULL),(1015,'سمنان',NULL,NULL),(1016,'سیستان وبلوچستان',NULL,NULL),(1017,'فارس',NULL,NULL),(1018,'قزوین',NULL,NULL),(1019,'قم',NULL,NULL),(1020,'کردستان',NULL,NULL),(1021,'کرمان',NULL,NULL),(1022,'کهگیلویه و بویراحمد',NULL,NULL),(1023,'گلستان',NULL,NULL),(1024,'گیلان',NULL,NULL),(1025,'لرستان',NULL,NULL),(1026,'مازندران',NULL,NULL),(1027,'مرکزی',NULL,NULL),(1028,'هرمزگان',NULL,NULL),(1029,'همدان',NULL,NULL),(1030,'کرمانشاه',NULL,NULL),(1031,'یزد',NULL,NULL);
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','ادمین','web','2026-10-12 06:27:31','2026-10-12 07:22:32'),(2,'writer','نویسنده','web','2026-10-12 06:29:46','2026-10-12 06:29:46'),(3,'maneger','مدیریت','web','2026-10-12 06:30:50','2026-10-12 06:30:50');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('0fMJteLjkqyb0NBfEM8dZOYNyanNT40CNHdKRm6m',4,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0','YTo2OntzOjY6Il90b2tlbiI7czo0MDoialVOYTFCQzFUOHFnVGRyeDczQVpKYVNLZ1VjSXdGVzNJRjhrU3ZnbyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDtzOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo2MDoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluLXBhbmVsL21hbmFnZW1lbnQvcHJvZHVjdHMvY3JlYXRlIjtzOjU6InJvdXRlIjtzOjIxOiJhZG1pbi5wcm9kdWN0cy5jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU6ImFsZXJ0IjthOjA6e31zOjI2OiI0eVRsVERLdTNvSk9mekRfY2FydF9pdGVtcyI7TzozMjoiRGFycnlsZGVjb2RlXENhcnRcQ2FydENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6Mzp7czo1OiIyMS02MiI7TzozMjoiRGFycnlsZGVjb2RlXENhcnRcSXRlbUNvbGxlY3Rpb24iOjM6e3M6ODoiACoAaXRlbXMiO2E6Nzp7czoyOiJpZCI7czo1OiIyMS02MiI7czo0OiJuYW1lIjtzOjMwOiLaqdiqINi02YTZiNin2LEg2YXYsdiv2KfZhtmHIDEiO3M6NToicHJpY2UiO2k6MTI1MDAwMDtzOjg6InF1YW50aXR5IjtzOjE6IjIiO3M6MTA6ImF0dHJpYnV0ZXMiO086NDE6IkRhcnJ5bGRlY29kZVxDYXJ0XEl0ZW1BdHRyaWJ1dGVDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjE1OntzOjI6ImlkIjtpOjYyO3M6MTI6ImF0dHJpYnV0ZV9pZCI7aToxO3M6MTA6InByb2R1Y3RfaWQiO2k6MjE7czo1OiJ2YWx1ZSI7czo4OiLZgtix2YXYsiI7czo1OiJwcmljZSI7aToxMjUwMDAwO3M6ODoicXVhbnRpdHkiO2k6MztzOjM6InNrdSI7czoyOiIzNCI7czoxMDoic2FsZV9wcmljZSI7TjtzOjE3OiJkYXRlX29uX3Nh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O2k6NTtzOjQ6InNsdWciO3M6MjM6InNobG9hci1neW4tbXJkYW5oLVpnRFFxIjtzOjEzOiJwcmltYXJ5X2ltYWdlIjtzOjk6ImltYWdlLmpwZyI7czoxMToiZGVzY3JpcHRpb24iO3M6MTMwOiLYp9uM2YYg2YXYrdi12YjZhCDYqNinINqp24zZgduM2Kog2YXZhtin2LPYqCDZiCDYt9ix2KfYrduMINiy24zYqNinINio2LHYp9uMINin2LPYqtmB2KfYr9mHINix2YjYstmF2LHZhyDYqtmI2YTbjNivINi02K/ZhyDYp9iz2KouIjtzOjY6InN0YXR1cyI7aToxO3M6OToiaXNfYWN0aXZlIjtpOjE7czoxNToiZGVsaXZlcnlfYW1vdW50IjtpOjY2MDAwO3M6Mjc6ImRlbGl2ZXJ5X2Ftb3VudF9wZXJfcHJvZHVjdCI7aTowO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjYtMDktMTYgMDc6NDA6NDUiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjYtMDktMTYgMDc6NDA6NDUiO31zOjExOiIAKgBvcmlnaW5hbCI7YToxMzp7czoyOiJpZCI7aTozO3M6NDoibmFtZSI7czozMDoi2LTZhNmI2KfYsSDYrNuM2YYg2YXYsdiv2KfZhtmHIjtzOjg6ImJyYW5kX2lkIjtpOjU7czoxMToiY2F0ZWdvcnlfaWQiO2k6NTtzOjQ6InNsdWciO3M6MjM6InNobG9hci1neW4tbXJkYW5oLVpnRFFxIjtzOjEzOiJwcmltYXJ5X2ltYWdlIjtzOjk6ImltYWdlLmpwZyI7czoxMToiZGVzY3JpcHRpb24iO3M6MTMwOiLYp9uM2YYg2YXYrdi12YjZhCDYqNinINqp24zZgduM2Kog2YXZhtin2LPYqCDZiCDYt9ix2KfYrduMINiy24zYqNinINio2LHYp9uMINin2LPYqtmB2KfYr9mHINix2YjYstmF2LHZhyDYqtmI2YTbjNivINi02K/ZhyDYp9iz2KouIjtzOjY6InN0YXR1cyI7aToxO3M6OToiaXNfYWN0aXZlIjtpOjE7czoxNToiZGVsaXZlcnlfYW1vdW50IjtpOjY2MDAwO3M6Mjc6ImRlbGl2ZXJ5X2Ftb3VudF9wZXJf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ZW50aW5nIjtiOjE7czo3OiIAKgB3aXRoIjthOjA6e31zOjEyOiIAKgB3aXRoQ291bnQiO2E6MDp7fXM6MTk6InByZXZlbnRzTGF6eUxvYWRpbmciO2I6MDtzOjEwOiIAKgBwZXJQYWdlIjtpOjE1O3M6NjoiZXhpc3RzIjtiOjE7czoxODoid2FzUmVjZW50bHlDcmVhdGVkIjtiOjA7czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO3M6MTM6IgAqAGF0dHJpYnV0ZXMiO2E6MTM6e3M6MjoiaWQiO2k6MTI7czo0OiJuYW1lIjtzOjI4OiLaqdiqINiy2YbYp9mG2Ycg2b7Yp9uM24zYstmHIjtzOjg6ImJyYW5kX2lkIjtpOjE7czoxMToiY2F0ZWdvcnlfaWQiO2k6NTtzOjQ6InNsdWciO3M6MjE6Imt0LXpuYW5oLXBheXl6aC04S0d1RCI7czoxMzoicHJpbWFyeV9pbWFnZSI7czo5OiJpbWFnZS5qcGciO3M6MTE6ImRlc2NyaXB0aW9uIjtzOjEzMDoi2KfbjNmGINmF2K3YtdmI2YQg2KjYpyDaqduM2YHbjNiqINmF2YbYp9iz2Kgg2Ygg2LfYsdin2K3bjCDYstuM2KjYpyDYqNix2KfbjCDYp9iz2KrZgdin2K/ZhyDYsdmI2LLZhdix2Ycg2KrZiNmE24zYryDYtNiv2Ycg2KfYs9iqLiI7czo2OiJzdGF0dXMiO2k6MTtzOjk6ImlzX2FjdGl2ZSI7aToxO3M6MTU6ImRlbGl2ZXJ5X2Ftb3VudCI7aTo5NzAwMDtzOjI3OiJkZWxpdmVyeV9hbW91bnRfcGVyX3Byb2R1Y3QiO2k6MTEwMDA7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyNi0wOS0xNiAwNzo0MDo0NSI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyNi0wOS0xNiAwNzo0MDo0NSI7fXM6MTE6IgAqAG9yaWdpbmFsIjthOjEzOntzOjI6ImlkIjtpOjEyO3M6NDoibmFtZSI7czoyODoi2qnYqiDYstmG2KfZhtmHINm+2KfbjNuM2LLZhyI7czo4OiJicmFuZF9pZCI7aToxO3M6MTE6ImNhdGVnb3J5X2lkIjtpOjU7czo0OiJzbHVnIjtzOjIxOiJrdC16bmFuaC1wYXl5emgtOEtHdUQiO3M6MTM6InByaW1hcnlfaW1hZ2UiO3M6OToiaW1hZ2UuanBnIjtzOjExOiJkZXNjcmlwdGlvbiI7czoxMzA6Itin24zZhiDZhdit2LXZiNmEINio2Kcg2qnbjNmB24zYqiDZhdmG2KfYs9ioINmIINi32LHYp9it24wg2LLbjNio2Kcg2KjYsdin24wg2KfYs9iq2YHYp9iv2Ycg2LHZiNiy2YXYsdmHINiq2YjZhNuM2K8g2LTYr9mHINin2LPYqi4iO3M6Njoic3RhdHVzIjtpOjE7czo5OiJpc19hY3RpdmUiO2k6MTtzOjE1OiJkZWxpdmVyeV9hbW91bnQiO2k6OTcwMDA7czoyNzoiZGVsaXZlcnlfYW1vdW50X3Blcl9wcm9kdWN0IjtpOjExMDAwO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjYtMDktMTYgMDc6NDA6NDUiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjYtMDktMTYgMDc6NDA6NDUiO31zOjEwOiIAKgBjaGFuZ2VzIjthOjA6e31zOjExOiIAKgBwcmV2aW91cyI7YTowOnt9czo4OiIAKgBjYXN0cyI7YTowOnt9czoxNzoiACoAY2xhc3NDYXN0Q2FjaGUiO2E6MDp7fXM6MjE6IgAqAGF0dHJpYnV0ZUNhc3RDYWNoZSI7YTowOnt9czoxMzoiACoAZGF0ZUZvcm1hdCI7TjtzOjEwOiIAKgBhcHBlbmRzIjthOjM6e2k6MDtzOjE0OiJxdWFudGl0eV9jaGVjayI7aToxO3M6MTA6InNhbGVfY2hlY2siO2k6MjtzOjExOiJwcmljZV9jaGVjayI7fXM6MTk6IgAqAGRpc3BhdGNoZXNFdmVudHMiO2E6MDp7fXM6MTQ6IgAqAG9ic2VydmFibGVzIjthOjA6e31zOjEyOiIAKgByZWxhdGlvbnMiO2E6MDp7fXM6MTA6IgAqAHRvdWNoZXMiO2E6MDp7fXM6Mjc6IgAqAHJlbGF0aW9uQXV0b2xvYWRDYWxsYmFjayI7TjtzOjI2OiIAKgByZWxhdGlvbkF1dG9sb2FkQ29udGV4dCI7TjtzOjEwOiJ0aW1lc3RhbXBzIjtiOjE7czoxMzoidXNlc1VuaXF1ZUlkcyI7YjowO3M6OToiACoAaGlkZGVuIjthOjA6e31zOjEwOiIAKgB2aXNpYmxlIjthOjA6e31zOjExOiIAKgBmaWxsYWJsZSI7YTowOnt9czoxMDoiACoAZ3VhcmRlZCI7YTowOnt9fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7czo5OiIAKgBjb25maWciO2E6Njp7czoxNDoiZm9ybWF0X251bWJlcnMiO2I6MDtzOjg6ImRlY2ltYWxzIjtpOjA7czo5OiJkZWNfcG9pbnQiO3M6MToiLiI7czoxMzoidGhvdXNhbmRzX3NlcCI7czoxOiIsIjtzOjc6InN0b3JhZ2UiO047czo2OiJldmVudHMiO047fX19czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO319',1792270154);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telegram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'تهران شهرک مشیریه','09926245951','09214880173','51.4837741397527','35.61738972885706','https://instagram.com/mohamad.moradix','https://t.me/moradi_x','https://facebook.com/moradi_x','2026-10-11 07:42:27','2026-10-11 07:42:27');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'جدید','2026-09-16 04:10:44','2026-09-16 04:10:44'),(2,'پرفروش','2026-09-16 04:10:44','2026-09-16 04:10:44'),(3,'تخفیف ویژه','2026-09-16 04:10:44','2026-09-16 04:10:44'),(4,'محدود','2026-09-16 04:10:44','2026-09-16 04:10:44'),(5,'پیشنهاد ویژه','2026-09-16 04:10:44','2026-09-16 04:10:44'),(6,'تابستانی','2026-09-16 04:10:44','2026-09-16 04:10:44');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `order_id` bigint unsigned DEFAULT NULL,
  `amount` int unsigned NOT NULL,
  `ref_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descrption` text COLLATE utf8mb4_unicode_ci,
  `gateway_name` enum('zarinpal','pay') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_user_id_foreign` (`user_id`),
  KEY `transactions_order_id_foreign` (`order_id`),
  CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (17,1,NULL,120000,NULL,NULL,NULL,'zarinpal',1,'2025-10-25 06:30:00','2025-10-25 06:30:00'),(18,1,NULL,180000,NULL,NULL,NULL,'zarinpal',1,'2025-10-28 08:30:00','2025-10-28 08:30:00'),(19,1,NULL,50000,NULL,NULL,NULL,'zarinpal',0,'2025-10-26 10:30:00','2025-10-26 10:30:00'),(20,1,NULL,70000,NULL,NULL,NULL,'zarinpal',0,'2025-10-29 11:30:00','2025-10-29 11:30:00'),(21,1,NULL,220000,NULL,NULL,NULL,'zarinpal',1,'2025-11-24 06:30:00','2025-11-24 06:30:00'),(22,1,NULL,130000,NULL,NULL,NULL,'zarinpal',1,'2025-11-27 08:30:00','2025-11-27 08:30:00'),(23,1,NULL,60000,NULL,NULL,NULL,'zarinpal',0,'2025-11-25 10:30:00','2025-11-25 10:30:00'),(24,1,NULL,80000,NULL,NULL,NULL,'zarinpal',0,'2025-11-28 11:30:00','2025-11-28 11:30:00'),(25,1,NULL,50000,NULL,NULL,NULL,'zarinpal',0,'2025-12-24 06:30:00','2025-12-24 06:30:00'),(26,1,NULL,70000,NULL,NULL,NULL,'zarinpal',0,'2025-12-27 08:30:00','2025-12-27 08:30:00'),(27,1,NULL,90000,NULL,NULL,NULL,'zarinpal',0,'2025-12-29 10:30:00','2025-12-29 10:30:00'),(28,1,NULL,310000,NULL,NULL,NULL,'zarinpal',1,'2026-01-23 06:30:00','2026-01-23 06:30:00'),(29,1,NULL,150000,NULL,NULL,NULL,'zarinpal',1,'2026-01-26 08:30:00','2026-01-26 08:30:00'),(30,1,NULL,40000,NULL,NULL,NULL,'zarinpal',0,'2026-01-24 10:30:00','2026-01-24 10:30:00'),(31,1,NULL,90000,NULL,NULL,NULL,'zarinpal',0,'2026-01-28 11:30:00','2026-01-28 11:30:00'),(32,1,NULL,360000,NULL,NULL,NULL,'zarinpal',1,'2026-02-22 06:30:00','2026-02-22 06:30:00'),(33,1,NULL,210000,NULL,NULL,NULL,'zarinpal',1,'2026-02-24 08:30:00','2026-02-24 08:30:00'),(34,1,NULL,170000,NULL,NULL,NULL,'zarinpal',1,'2026-02-27 10:30:00','2026-02-27 10:30:00'),(35,1,NULL,240000,NULL,NULL,NULL,'zarinpal',1,'2026-04-23 06:30:00','2026-04-23 06:30:00'),(36,1,NULL,190000,NULL,NULL,NULL,'zarinpal',1,'2026-04-26 08:30:00','2026-04-26 08:30:00'),(37,1,NULL,60000,NULL,NULL,NULL,'zarinpal',0,'2026-04-24 10:30:00','2026-04-24 10:30:00'),(38,1,NULL,80000,NULL,NULL,NULL,'zarinpal',0,'2026-04-28 11:30:00','2026-04-28 11:30:00'),(39,1,NULL,280000,NULL,NULL,NULL,'zarinpal',1,'2026-05-24 06:30:00','2026-05-24 06:30:00'),(40,1,NULL,110000,NULL,NULL,NULL,'zarinpal',1,'2026-05-27 08:30:00','2026-05-27 08:30:00'),(41,1,NULL,50000,NULL,NULL,NULL,'zarinpal',0,'2026-05-25 10:30:00','2026-05-25 10:30:00'),(42,1,NULL,70000,NULL,NULL,NULL,'zarinpal',0,'2026-05-28 11:30:00','2026-05-28 11:30:00'),(43,1,NULL,320000,NULL,NULL,NULL,'zarinpal',1,'2026-06-24 06:30:00','2026-06-24 06:30:00'),(44,1,NULL,150000,NULL,NULL,NULL,'zarinpal',1,'2026-06-27 08:30:00','2026-06-27 08:30:00'),(45,1,NULL,40000,NULL,NULL,NULL,'zarinpal',0,'2026-06-25 10:30:00','2026-06-25 10:30:00'),(46,1,NULL,60000,NULL,NULL,NULL,'zarinpal',0,'2026-06-28 11:30:00','2026-06-28 11:30:00'),(47,1,NULL,410000,NULL,NULL,NULL,'zarinpal',1,'2026-07-25 06:30:00','2026-07-25 06:30:00'),(48,1,NULL,160000,NULL,NULL,NULL,'zarinpal',1,'2026-07-28 08:30:00','2026-07-28 08:30:00'),(49,1,NULL,50000,NULL,NULL,NULL,'zarinpal',0,'2026-07-26 10:30:00','2026-07-26 10:30:00'),(50,1,NULL,90000,NULL,NULL,NULL,'zarinpal',0,'2026-07-29 11:30:00','2026-07-29 11:30:00'),(51,1,NULL,290000,NULL,NULL,NULL,'zarinpal',1,'2026-08-25 06:30:00','2026-08-25 06:30:00'),(52,1,NULL,175000,NULL,NULL,NULL,'zarinpal',1,'2026-08-27 08:30:00','2026-08-27 08:30:00'),(53,1,NULL,60000,NULL,NULL,NULL,'zarinpal',0,'2026-08-26 10:30:00','2026-08-26 10:30:00'),(54,1,NULL,80000,NULL,NULL,NULL,'zarinpal',0,'2026-08-29 11:30:00','2026-08-29 11:30:00'),(55,1,NULL,360000,NULL,NULL,NULL,'zarinpal',1,'2026-09-25 06:30:00','2026-09-25 06:30:00'),(56,1,NULL,230000,NULL,NULL,NULL,'zarinpal',1,'2026-09-28 08:30:00','2026-09-28 08:30:00'),(57,1,NULL,120000,NULL,NULL,NULL,'zarinpal',0,'2026-09-26 10:30:00','2026-09-26 10:30:00'),(58,1,NULL,70000,NULL,NULL,NULL,'zarinpal',0,'2026-09-29 11:30:00','2026-09-29 11:30:00'),(59,4,5,2967000,NULL,'S00000000000000000000000000000m7e271',NULL,'zarinpal',0,'2026-10-17 11:13:43','2026-10-17 11:13:43'),(60,4,6,2967000,NULL,'S00000000000000000000000000000vxyqx1',NULL,'zarinpal',0,'2026-10-17 11:14:37','2026-10-17 11:14:37'),(61,4,7,2967000,NULL,'S000000000000000000000000000005mx37d',NULL,'zarinpal',0,'2026-10-17 11:22:58','2026-10-17 11:22:58'),(62,4,8,4468000,'529989401','S00000000000000000000000000000gv25re',NULL,'zarinpal',1,'2026-10-17 11:42:36','2026-10-17 11:42:40');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_addresses`
--

DROP TABLE IF EXISTS `user_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_addresses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cellphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `province_id` bigint NOT NULL,
  `city_id` bigint NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lantitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_addresses_user_id_foreign` (`user_id`),
  CONSTRAINT `user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_addresses`
--

LOCK TABLES `user_addresses` WRITE;
/*!40000 ALTER TABLE `user_addresses` DISABLE KEYS */;
INSERT INTO `user_addresses` VALUES (1,'تست 1','09926245951','09214880173','1234567890',4,1008,1262,NULL,NULL,'2026-10-03 16:25:25','2026-10-03 16:25:25'),(2,'تست 1','09214880173','09214880173','1234567890',4,1008,1262,NULL,NULL,'2026-10-03 16:26:46','2026-10-03 16:26:46'),(3,'تست 2','09214880173','09926245951','1234567890',4,1029,1969,NULL,NULL,'2026-10-03 16:33:22','2026-10-03 16:33:22'),(4,'تست 3','تهران محله ی مشیریه خیابان سازمان اب کوچه اصغر تاجیک','09124185863','1234567890',4,1015,1517,NULL,NULL,'2026-10-03 16:45:24','2026-10-03 16:45:24');
/*!40000 ALTER TABLE `user_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `otp` int DEFAULT NULL,
  `login_token` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_provider_name_unique` (`provider_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ممد 2','09214880173',NULL,1,NULL,NULL,'m@gmail.com',NULL,'$2y$12$FCr2aYw1LnnZk13KNmGV4ug.hHGFXwWT3AYNxGhQUCpdlnMI9lA6e',NULL,NULL,NULL,NULL,NULL,'2026-09-16 04:44:57','2026-10-12 10:13:06'),(2,'رضا','1999999990','https://lh3.googleusercontent.com/a/ACg8ocKxCSch3FX4O_D1h0HmkdBgA3sEjM3WZODi-vYpmr5dHt59rDUo=s96-c',1,NULL,NULL,'mohamadmoradi138383@gmail.com','2026-09-19 10:03:29','$2y$12$hpOsHDUpet8r3KWqrLJ1uuGiehU58xcMKYL6A.NxMa5zklBfy8fIi',NULL,NULL,NULL,'google','SlzAwpV8f4ebP4r4WKSrh9POlaC8WVf9GtxiWYMP55BftEZR5Tey5HEVtWng','2026-09-19 10:03:29','2026-10-12 10:50:35'),(3,'علیییص','09926245952',NULL,1,624943,'$2y$12$jyPY36zTw9o6s72QWcsc/ecYG72BLb/Lefjv2B9qh25smI3/IKzOG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-09-22 10:32:07','2026-10-12 10:21:48'),(4,'صدیقه','09214880173',NULL,1,927958,'$2y$12$hgcAel5G4LDQOYi35rJ6wuMrILeZWedlGRSCRf9BPSbGkz4.cJaPK',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'qAmrK8ajWQVzx52iOKBxe7P3nmvbpaNtmEeqeUA7I1WTpqHYQUW6eBo9QYEI','2026-09-22 11:27:11','2026-10-12 11:11:43'),(5,'cdcx','9214880173',NULL,1,623399,'$2y$12$4zsz5ErAqxKmTdvQs9Q7rOYnCDZ7SIfGYA1I0jjLBsfeALqqIGQL.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-09-22 11:36:13','2026-09-22 11:36:13');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`product_id`),
  KEY `wishlist_product_id_foreign` (`product_id`),
  CONSTRAINT `wishlist_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `wishlist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
INSERT INTO `wishlist` VALUES (4,2,'2026-09-26 07:43:33','2026-09-26 07:43:33'),(4,12,'2026-09-26 08:19:28','2026-09-26 08:19:28');
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-10-18  0:34:59

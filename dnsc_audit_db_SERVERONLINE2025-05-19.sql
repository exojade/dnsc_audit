/*
SQLyog Community v12.4.0 (64 bit)
MySQL - 10.11.10-MariaDB : Database - u352055117_dnsc_audit_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `announcements` */

DROP TABLE IF EXISTS `announcements`;

CREATE TABLE `announcements` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `announcement` text DEFAULT NULL,
  `sender` varchar(100) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  KEY `announcement_id` (`announcement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `announcements` */

insert  into `announcements`(`announcement_id`,`announcement`,`sender`,`timestamp`) values 
(2,'<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>','9',1739072780),
(3,'<h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">The standard Lorem Ipsum passage, used since the 1500s</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p>','9',1739072970),
(4,'<p>asdasdasdasd</p>','9',1743471683);

/*Table structure for table `aps_area` */

DROP TABLE IF EXISTS `aps_area`;

CREATE TABLE `aps_area` (
  `tblid` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  `aps_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `aps_area` */

insert  into `aps_area`(`tblid`,`area_id`,`audit_plan`,`aps_id`) values 
(66,'8','AP2025-02-08','APS379EA2CD39269'),
(67,'5','AP2025-02-08','APS9F93CE8DD1819'),
(68,'5','AP2024-01-01','APS5BC6E97BDC1D6'),
(69,'2','AP2024-01-01','APSB78B31B7AF29D'),
(70,'8','AP2024-02-08','APS4EBE1A6BF55EF'),
(71,'15','AP2024-02-08','APS57099D2BE4C87'),
(72,'28','AP2024-02-08','APS57099D2BE4C87'),
(73,'35','AP2024-02-08','APS57099D2BE4C87'),
(76,'28','AP2024-02-08','APS4BE710D5B42E8'),
(77,'2','AP2024-02-08','APSF87E0A1BF8CA7'),
(78,'8','AP2024-02-08','APSDD0D495090937'),
(79,'8','AP2025-01-01','APS27730D471094B'),
(83,'15','AP2026-01-01','APS1C6E470246918'),
(84,'28','AP2026-01-01','APS1C6E470246918'),
(85,'35','AP2026-01-01','APS1C6E470246918'),
(86,'5','AP2026-02-08','APSF6DCCF5F40ACE'),
(87,'35','AP2027-01-01','APS93F2550791F9B'),
(88,'5','AP2027-01-01','APSC9E0D0CAC496C'),
(89,'5','AP2027-01-01','APSBCBB8E0BCF60A'),
(90,'8','AP2027-01-01','APS47395BE26C56E'),
(91,'2','AP2027-02-08','APSB415A566F53EC'),
(92,'5','AP2024-02-08','APS9814330A4CEF9'),
(93,'2','AP2028-01-01','APSB6F2DD511F30B'),
(94,'5','AP2028-01-01','APSD64B22344B248'),
(95,'78','AP2028-01-01','APS58196986F0440'),
(96,'78','AP2029-01-01','APSA6DA12DA993B0'),
(97,'77','AP2029-01-01','APSCBECC7F8B6319'),
(98,'2','AP2029-02-08','APS3EBE6A76CE85F'),
(99,'5','AP2029-02-08','APSF44CB65F8DA27');

/*Table structure for table `aps_position` */

DROP TABLE IF EXISTS `aps_position`;

CREATE TABLE `aps_position` (
  `tblid` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` varchar(100) DEFAULT NULL,
  `aps_id` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `aps_position` */

insert  into `aps_position`(`tblid`,`position_id`,`aps_id`,`audit_plan`) values 
(54,'5','APS379EA2CD39269','AP2025-02-08'),
(55,'4','APS9F93CE8DD1819','AP2025-02-08'),
(56,'4','APS5BC6E97BDC1D6','AP2024-01-01'),
(57,'6','APSB78B31B7AF29D','AP2024-01-01'),
(58,'5','APS4EBE1A6BF55EF','AP2024-02-08'),
(59,'3','APS57099D2BE4C87','AP2024-02-08'),
(62,'3','APS4BE710D5B42E8','AP2024-02-08'),
(63,'6','APSF87E0A1BF8CA7','AP2024-02-08'),
(64,'5','APSDD0D495090937','AP2024-02-08'),
(65,'5','APS27730D471094B','AP2025-01-01'),
(67,'3','APS1C6E470246918','AP2026-01-01'),
(68,'3','APS1C6E470246918','AP2026-01-01'),
(69,'3','APS1C6E470246918','AP2026-01-01'),
(70,'4','APSF6DCCF5F40ACE','AP2026-02-08'),
(71,'7','APSF6DCCF5F40ACE','AP2026-02-08'),
(72,'3','APS93F2550791F9B','AP2027-01-01'),
(73,'4','APSC9E0D0CAC496C','AP2027-01-01'),
(74,'4','APSBCBB8E0BCF60A','AP2027-01-01'),
(75,'5','APS47395BE26C56E','AP2027-01-01'),
(76,'6','APSB415A566F53EC','AP2027-02-08'),
(77,'4','APS9814330A4CEF9','AP2024-02-08'),
(78,'6','APSB6F2DD511F30B','AP2028-01-01'),
(79,'7','APSD64B22344B248','AP2028-01-01'),
(80,'8','APS58196986F0440','AP2028-01-01'),
(81,'8','APSA6DA12DA993B0','AP2029-01-01'),
(82,'9','APSCBECC7F8B6319','AP2029-01-01'),
(83,'6','APS3EBE6A76CE85F','AP2029-02-08'),
(84,'4','APSF44CB65F8DA27','AP2029-02-08');

/*Table structure for table `area_position` */

DROP TABLE IF EXISTS `area_position`;

CREATE TABLE `area_position` (
  `tblid` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` varchar(100) DEFAULT NULL,
  `position_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `area_position` */

insert  into `area_position`(`tblid`,`area_id`,`position_id`) values 
(1,'15','3'),
(2,'28','3'),
(3,'35','3'),
(4,'51','3'),
(5,'58','3'),
(6,'11','2'),
(7,'5','4'),
(8,'8','5'),
(9,'2','6'),
(10,'5','7'),
(11,'78','8'),
(12,'77','9');

/*Table structure for table `area_process` */

DROP TABLE IF EXISTS `area_process`;

CREATE TABLE `area_process` (
  `tblid` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` varchar(100) DEFAULT NULL,
  `process_id` varchar(100) DEFAULT NULL,
  `active_status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `area_process` */

insert  into `area_process`(`tblid`,`area_id`,`process_id`,`active_status`) values 
(2,'2','1',NULL),
(3,'5','1',NULL),
(4,'8','1',NULL),
(5,'11','1',NULL),
(6,'2','2',NULL),
(7,'5','3',NULL),
(8,'15','4',NULL),
(9,'28','4',NULL),
(10,'35','4',NULL),
(11,'51','4',NULL),
(12,'58','4',NULL),
(13,'8','5',NULL),
(14,'77','7',NULL),
(15,'78','6',NULL),
(16,'77','8',NULL),
(17,'15','4',NULL),
(18,'28','4',NULL),
(19,'35','4',NULL),
(20,'51','4',NULL),
(21,'80','9',NULL),
(22,'81','10',NULL),
(23,'81','11',NULL),
(24,'81','12',NULL),
(25,'82','13',NULL),
(26,'82','14',NULL),
(27,'82','15',NULL),
(28,'83','16',NULL),
(29,'77','17',NULL),
(30,'77','18',NULL),
(31,'84','19',NULL),
(32,'84','20',NULL),
(33,'85','21',NULL),
(34,'85','22',NULL),
(35,'86','23',NULL),
(36,'87','24',NULL),
(37,'87','25',NULL),
(38,'87','26',NULL),
(39,'88','27',NULL),
(40,'89','28',NULL),
(41,'90','29',NULL),
(42,'8','30',NULL),
(43,'15','30',NULL),
(44,'28','30',NULL),
(45,'35','30',NULL),
(46,'51','30',NULL),
(47,'58','30',NULL);

/*Table structure for table `areas` */

DROP TABLE IF EXISTS `areas`;

CREATE TABLE `areas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_area` bigint(20) unsigned DEFAULT NULL,
  `area_name` varchar(255) NOT NULL,
  `area_description` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `areas_parent_area_foreign` (`parent_area`),
  CONSTRAINT `areas_parent_area_foreign` FOREIGN KEY (`parent_area`) REFERENCES `areas` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `areas` */

insert  into `areas`(`id`,`parent_area`,`area_name`,`area_description`,`type`,`deleted_at`,`created_at`,`updated_at`) values 
(1,NULL,'Administration','Administration',NULL,NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(2,1,'Library','Librarian','office',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(3,2,'Library Process','Library Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(4,2,'Same  Process','Library Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(5,1,'Clinic','College Nurse','office',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(6,5,'Clinic Process','Clinic Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(7,5,'Same  Process','Clinic Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(8,1,'Registrar','Registrar','office',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(9,8,'Registrar Process','Registrar Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(10,8,'Same  Process','Registrar Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(11,1,'Cashier','Cashier','office',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(12,11,'Cashier Process','Cashier Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(13,11,'Same  Process','Cashier Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(14,NULL,'Academics','Academics',NULL,NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(15,14,'IAAS','IAAS Dean and Program Chairs','institute',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(16,15,'BSAF','Bachelor Of Science In Agroforestry','program',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(17,16,'BSAF Process','BSAF Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(18,16,'Same  Process','BSAF Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(19,15,'BSFAS','Bachelor Of Science In Fisheries And Aquatic Sciences','program',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(20,19,'BSFAS Process','BSFAS Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(21,19,'Same  Process','BSFAS Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(22,15,'BSFT','Bachelor Of Science In Food Technology','program',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(23,22,'BSFT Process','BSFT Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(24,22,'Same  Process','BSFT Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(25,15,'BSMB','Bachelor Of Science In Marine Biology','program',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(26,25,'BSMB Process','BSMB Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(27,25,'Same  Process','BSMB Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(28,14,'IC','IC Dean and Program Chairs','institute',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(29,28,'BSIS','BACHELOR OF SCIENCE IN INFORMATION SYSTEMS','program',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(30,29,'BSIS Process','BSIS Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(31,29,'Same  Process','BSIS Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(32,28,'BSIT','BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY','program',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(33,32,'BSIT Process','BSIT Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(34,32,'Same  Process','BSIT Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(35,14,'ILEGG','ILEGG Dean and Program Chairs','institute',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(36,35,'BPA','BACHELOR OF PUBLIC ADMINISTRATION','program',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(37,36,'BPA Process','BPA Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(38,36,'Same  Process','BPA Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(39,35,'BSDRM','BACHELOR OF SCIENCE IN DISASTER RESILIENCY AND MANAGEMENT','program',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(40,39,'BSDRM Process','BSDRM Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(41,39,'Same  Process','BSDRM Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(42,35,'BS ENTREP','BACHELOR OF SCIENCE IN ENTREPRENEURSHIP','program',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(43,42,'BS ENTREP Process','BS ENTREP Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(44,42,'Same  Process','BS ENTREP Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(45,35,'BSSW','BACHELOR OF SCIENCE IN SOCIAL WORK','program',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(46,45,'BSSW Process','BSSW Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(47,45,'Same  Process','BSSW Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(48,35,'BSTM','BACHELOR OF SCIENCE IN TOURISM MANAGEMENT','program',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(49,48,'BSTM Process','BSTM Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(50,48,'Same  Process','BSTM Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(51,14,'ITED','ITED Dean and Program Chairs','institute',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(52,51,'BSeD','BACHELOR OF SECONDARY EDUCATION (BSeD) Major In English, Math, And Sciences','program',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(53,52,'BSeD Process','BSeD Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(54,52,'Same  Process','BSeD Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(55,51,'BTLEd','BACHELOR OF TECHNOLOGY AND LIVELIHOOD EDUCATION','program',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(56,55,'BTLEd Process','BTLEd Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(57,55,'Same  Process','BTLEd Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(58,14,'IADS','IADS Dean and Program Chairs','institute',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(59,58,'MFM AQUA, MFM FP','Master In Fisheries Management Major In Aquaculture Technology And Fish Processing','program',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(60,59,'MFM AQUA, MFM FP Process','MFM AQUA, MFM FP Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(61,59,'Same  Process','MFM AQUA, MFM FP Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(62,58,'MABE ENG','Master Of Arts In Basic Education English','program',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(63,62,'MABE ENG Process','MABE ENG Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(64,62,'Same  Process','MABE ENG Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(65,58,'MAEM','Master Of Arts In Educational Management','program',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(66,65,'MAEM Process','MAEM Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(67,65,'Same  Process','MAEM Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(68,58,'MSMB','Master Of Science In Marine Biodiversity','program',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(69,68,'MSMB Process','MSMB Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(70,68,'Same  Process','MSMB Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(71,58,'MST BIO','Master Of Science Teaching In Biology','program',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(72,71,'MST BIO Process','MST BIO Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(73,71,'Same  Process','MST BIO Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(74,58,'MST MATH','Master Of Science Teaching In Mathematics','program',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(75,74,'MST MATH Process','MST MATH Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(76,74,'Same  Process','MST MATH Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(77,NULL,'Executive Affairs','Director for Executive Affairs','office',NULL,'2025-05-06 14:11:02','2025-05-06 14:11:02'),
(78,NULL,'College Management Team','Top Management Team','office',NULL,'2025-05-06 14:13:36','2025-05-06 14:13:36'),
(79,NULL,'Human Resource Management Office','HRMO Head','office',NULL,'2025-05-07 15:00:02','2025-05-07 15:00:02'),
(80,NULL,'Internationalization Initiatives and External Affairs Office','IIEAO Head','office',NULL,'2025-05-16 09:20:08','2025-05-16 09:20:08'),
(81,NULL,'Secretarial Affairs Office','Board Secretary','office',NULL,'2025-05-16 09:22:23','2025-05-16 09:22:23'),
(82,NULL,'Planning and Resource Management Office','PRMO Director and Planning Officers','office',NULL,'2025-05-16 09:28:45','2025-05-16 09:28:45'),
(83,NULL,'Engineering and Infrastructure Unit','College Engineer','office',NULL,'2025-05-16 09:37:57','2025-05-16 09:37:57'),
(84,NULL,'Records Management Office','Document Control Custodians','office',NULL,'2025-05-16 09:43:39','2025-05-16 09:43:39'),
(85,NULL,'Legal Service Unit','LSU Head','office',NULL,'2025-05-16 09:44:54','2025-05-16 09:44:54'),
(86,NULL,'Gender and Development Office','GAD Focal Person','office',NULL,'2025-05-16 09:46:33','2025-05-16 09:46:33'),
(87,NULL,'Quality Assurance Office','QAO Director and Officers','office',NULL,'2025-05-16 09:47:18','2025-05-16 09:47:18'),
(88,NULL,'Office of the Head for ISO-QMS','IQA Lead Auditor','office',NULL,'2025-05-16 09:49:31','2025-05-16 09:49:31'),
(89,NULL,'Alumni Affairs Office','Alumni Coordinator','office',NULL,'2025-05-16 09:50:19','2025-05-16 09:50:19'),
(90,NULL,'Office of the Vice President for Academic Affairs','VPAA','office',NULL,'2025-05-16 09:51:17','2025-05-16 09:51:17');

/*Table structure for table `audit_checklist` */

DROP TABLE IF EXISTS `audit_checklist`;

CREATE TABLE `audit_checklist` (
  `audit_checklist_id` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  `aps_id` varchar(100) DEFAULT NULL,
  `aps_area` varchar(100) DEFAULT NULL,
  `audit_trail` text DEFAULT NULL,
  `comply` enum('YES','NO') DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `reviewed_by` varchar(100) DEFAULT NULL,
  `audit_checklist_status` varchar(100) DEFAULT 'PENDING',
  `review_comments` text DEFAULT NULL,
  `review_timestamp` varchar(100) DEFAULT NULL,
  `checklist_type` enum('FILLED','UNFILLED') DEFAULT NULL,
  `audit_trail_array` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `audit_checklist` */

insert  into `audit_checklist`(`audit_checklist_id`,`audit_plan`,`aps_id`,`aps_area`,`audit_trail`,`comply`,`remarks`,`timestamp`,`user_id`,`reviewed_by`,`audit_checklist_status`,`review_comments`,`review_timestamp`,`checklist_type`,`audit_trail_array`) values 
('AC-2025-02-08-1','AP2025-02-08','APS379EA2CD39269','8',NULL,NULL,NULL,1743774810,'5','7','PENDING FILLED','goods','1745379045','UNFILLED','a:3:{i:0;a:1:{s:6:\"clause\";s:247:\"<p>Clause 4.1 Understanding the org and its context low does DNSC normally identify its internal and external issues?<br>Ask to see Strat. Plan 5 yr, or latest; SWOT analysis<br>Q. What are the basis for identifying issues in the SWOT<br><br></p>\";}i:1;a:1:{s:6:\"clause\";s:239:\"<p>Clause 4.1 Understanding the org and its context low does DNSC normally identify its internal and external issues?<br>Ask to see Strat. Plan 5 yr, or latest; SWOT analysis<br>Q. What are the basis for identifying issues in the SWOT</p>\";}i:2;a:1:{s:6:\"clause\";s:239:\"<p>Clause 4.1 Understanding the org and its context low does DNSC normally identify its internal and external issues?<br>Ask to see Strat. Plan 5 yr, or latest; SWOT analysis<br>Q. What are the basis for identifying issues in the SWOT</p>\";}}'),
('AC-2027-02-08-1','AP2027-02-08','APSB415A566F53EC','2',NULL,NULL,NULL,1745379484,'30','7','DONE','TY','1745381177','UNFILLED','a:3:{i:0;a:3:{s:6:\"clause\";s:243:\"<p>Clause 4.1 Understanding the org and its context low does DNSC normally identify its internal and external issues?<br>Ask to see Strat. Plan 5 yr, or latest; SWOT analysis<br>Q.&nbsp;What are the basis for identifying issues in the SWOT</p>\";s:6:\"comply\";s:3:\"YES\";s:7:\"remarks\";s:55:\"y                                                      \";}i:1;a:3:{s:6:\"clause\";s:243:\"<p>Clause 4.1 Understanding the org and its context low does DNSC normally identify its internal and external issues?<br>Ask to see Strat. Plan 5 yr, or latest; SWOT analysis<br>Q.&nbsp;What are the basis for identifying issues in the SWOT</p>\";s:6:\"comply\";s:3:\"YES\";s:7:\"remarks\";s:55:\"y                                                      \";}i:2;a:3:{s:6:\"clause\";s:243:\"<p>Clause 4.1 Understanding the org and its context low does DNSC normally identify its internal and external issues?<br>Ask to see Strat. Plan 5 yr, or latest; SWOT analysis<br>Q.&nbsp;What are the basis for identifying issues in the SWOT</p>\";s:6:\"comply\";s:3:\"YES\";s:7:\"remarks\";s:55:\"y                                                      \";}}'),
('AC-2024-02-08-1','AP2024-02-08','APS9814330A4CEF9','5',NULL,NULL,NULL,1745768750,'30','7','DONE','Goods na','1745769189','UNFILLED','a:15:{i:0;a:3:{s:6:\"clause\";s:369:\"<p>Clause 4.1 Understanding the org and its context low does&nbsp;<span style=\"font-size: 1rem;\">DNSC normally identify its internal and external issues?&nbsp;<br></span><span style=\"font-size: 1rem;\">Ask to see Strat. Plan 5 yr, or latest; SWOT analysis&nbsp;<br></span><span style=\"font-size: 1rem;\">Q. What are the basis for identifying issues in the SWOT</span></p>\";s:6:\"comply\";s:3:\"YES\";s:7:\"remarks\";s:5:\"Goods\";}i:1;a:3:{s:6:\"clause\";s:369:\"<p>Clause 4.1 Understanding the org and its context low does&nbsp;<span style=\"font-size: 1rem;\">DNSC normally identify its internal and external issues?&nbsp;<br></span><span style=\"font-size: 1rem;\">Ask to see Strat. Plan 5 yr, or latest; SWOT analysis&nbsp;<br></span><span style=\"font-size: 1rem;\">Q. What are the basis for identifying issues in the SWOT</span></p>\";s:6:\"comply\";s:3:\"YES\";s:7:\"remarks\";s:59:\"Goods                                                      \";}i:2;a:3:{s:6:\"clause\";s:369:\"<p>Clause 4.1 Understanding the org and its context low does&nbsp;<span style=\"font-size: 1rem;\">DNSC normally identify its internal and external issues?&nbsp;<br></span><span style=\"font-size: 1rem;\">Ask to see Strat. Plan 5 yr, or latest; SWOT analysis&nbsp;<br></span><span style=\"font-size: 1rem;\">Q. What are the basis for identifying issues in the SWOT</span></p>\";s:6:\"comply\";s:3:\"YES\";s:7:\"remarks\";s:59:\"Goods                                                      \";}i:3;a:3:{s:6:\"clause\";s:369:\"<p>Clause 4.1 Understanding the org and its context low does&nbsp;<span style=\"font-size: 1rem;\">DNSC normally identify its internal and external issues?&nbsp;<br></span><span style=\"font-size: 1rem;\">Ask to see Strat. Plan 5 yr, or latest; SWOT analysis&nbsp;<br></span><span style=\"font-size: 1rem;\">Q. What are the basis for identifying issues in the SWOT</span></p>\";s:6:\"comply\";s:2:\"NO\";s:7:\"remarks\";s:54:\"                                                      \";}i:4;a:3:{s:6:\"clause\";s:369:\"<p>Clause 4.1 Understanding the org and its context low does&nbsp;<span style=\"font-size: 1rem;\">DNSC normally identify its internal and external issues?&nbsp;<br></span><span style=\"font-size: 1rem;\">Ask to see Strat. Plan 5 yr, or latest; SWOT analysis&nbsp;<br></span><span style=\"font-size: 1rem;\">Q. What are the basis for identifying issues in the SWOT</span></p>\";s:6:\"comply\";s:3:\"YES\";s:7:\"remarks\";s:59:\"Goods                                                      \";}i:5;a:3:{s:6:\"clause\";s:369:\"<p>Clause 4.1 Understanding the org and its context low does&nbsp;<span style=\"font-size: 1rem;\">DNSC normally identify its internal and external issues?&nbsp;<br></span><span style=\"font-size: 1rem;\">Ask to see Strat. Plan 5 yr, or latest; SWOT analysis&nbsp;<br></span><span style=\"font-size: 1rem;\">Q. What are the basis for identifying issues in the SWOT</span></p>\";s:6:\"comply\";s:3:\"YES\";s:7:\"remarks\";s:59:\"Goods                                                      \";}i:6;a:3:{s:6:\"clause\";s:369:\"<p>Clause 4.1 Understanding the org and its context low does&nbsp;<span style=\"font-size: 1rem;\">DNSC normally identify its internal and external issues?&nbsp;<br></span><span style=\"font-size: 1rem;\">Ask to see Strat. Plan 5 yr, or latest; SWOT analysis&nbsp;<br></span><span style=\"font-size: 1rem;\">Q. What are the basis for identifying issues in the SWOT</span></p>\";s:6:\"comply\";s:3:\"YES\";s:7:\"remarks\";s:59:\"Goods                                                      \";}i:7;a:3:{s:6:\"clause\";s:369:\"<p>Clause 4.1 Understanding the org and its context low does&nbsp;<span style=\"font-size: 1rem;\">DNSC normally identify its internal and external issues?&nbsp;<br></span><span style=\"font-size: 1rem;\">Ask to see Strat. Plan 5 yr, or latest; SWOT analysis&nbsp;<br></span><span style=\"font-size: 1rem;\">Q. What are the basis for identifying issues in the SWOT</span></p>\";s:6:\"comply\";s:3:\"YES\";s:7:\"remarks\";s:59:\"Goods                                                      \";}i:8;a:3:{s:6:\"clause\";s:369:\"<p>Clause 4.1 Understanding the org and its context low does&nbsp;<span style=\"font-size: 1rem;\">DNSC normally identify its internal and external issues?&nbsp;<br></span><span style=\"font-size: 1rem;\">Ask to see Strat. Plan 5 yr, or latest; SWOT analysis&nbsp;<br></span><span style=\"font-size: 1rem;\">Q. What are the basis for identifying issues in the SWOT</span></p>\";s:6:\"comply\";s:3:\"YES\";s:7:\"remarks\";s:59:\"Goods                                                      \";}i:9;a:3:{s:6:\"clause\";s:369:\"<p>Clause 4.1 Understanding the org and its context low does&nbsp;<span style=\"font-size: 1rem;\">DNSC normally identify its internal and external issues?&nbsp;<br></span><span style=\"font-size: 1rem;\">Ask to see Strat. Plan 5 yr, or latest; SWOT analysis&nbsp;<br></span><span style=\"font-size: 1rem;\">Q. What are the basis for identifying issues in the SWOT</span></p>\";s:6:\"comply\";s:3:\"YES\";s:7:\"remarks\";s:59:\"Goods                                                      \";}i:10;a:3:{s:6:\"clause\";s:369:\"<p>Clause 4.1 Understanding the org and its context low does&nbsp;<span style=\"font-size: 1rem;\">DNSC normally identify its internal and external issues?&nbsp;<br></span><span style=\"font-size: 1rem;\">Ask to see Strat. Plan 5 yr, or latest; SWOT analysis&nbsp;<br></span><span style=\"font-size: 1rem;\">Q. What are the basis for identifying issues in the SWOT</span></p>\";s:6:\"comply\";s:3:\"YES\";s:7:\"remarks\";s:59:\"Goods                                                      \";}i:11;a:3:{s:6:\"clause\";s:369:\"<p>Clause 4.1 Understanding the org and its context low does&nbsp;<span style=\"font-size: 1rem;\">DNSC normally identify its internal and external issues?&nbsp;<br></span><span style=\"font-size: 1rem;\">Ask to see Strat. Plan 5 yr, or latest; SWOT analysis&nbsp;<br></span><span style=\"font-size: 1rem;\">Q. What are the basis for identifying issues in the SWOT</span></p>\";s:6:\"comply\";s:3:\"YES\";s:7:\"remarks\";s:59:\"Goods                                                      \";}i:12;a:3:{s:6:\"clause\";s:369:\"<p>Clause 4.1 Understanding the org and its context low does&nbsp;<span style=\"font-size: 1rem;\">DNSC normally identify its internal and external issues?&nbsp;<br></span><span style=\"font-size: 1rem;\">Ask to see Strat. Plan 5 yr, or latest; SWOT analysis&nbsp;<br></span><span style=\"font-size: 1rem;\">Q. What are the basis for identifying issues in the SWOT</span></p>\";s:6:\"comply\";s:3:\"YES\";s:7:\"remarks\";s:59:\"Goods                                                      \";}i:13;a:3:{s:6:\"clause\";s:369:\"<p>Clause 4.1 Understanding the org and its context low does&nbsp;<span style=\"font-size: 1rem;\">DNSC normally identify its internal and external issues?&nbsp;<br></span><span style=\"font-size: 1rem;\">Ask to see Strat. Plan 5 yr, or latest; SWOT analysis&nbsp;<br></span><span style=\"font-size: 1rem;\">Q. What are the basis for identifying issues in the SWOT</span></p>\";s:6:\"comply\";s:2:\"NO\";s:7:\"remarks\";s:59:\"Goods                                                      \";}i:14;a:3:{s:6:\"clause\";s:369:\"<p>Clause 4.1 Understanding the org and its context low does&nbsp;<span style=\"font-size: 1rem;\">DNSC normally identify its internal and external issues?&nbsp;<br></span><span style=\"font-size: 1rem;\">Ask to see Strat. Plan 5 yr, or latest; SWOT analysis&nbsp;<br></span><span style=\"font-size: 1rem;\">Q. What are the basis for identifying issues in the SWOT</span></p>\";s:6:\"comply\";s:3:\"YES\";s:7:\"remarks\";s:59:\"Goods                                                      \";}}'),
('AC-2029-01-01-1','AP2029-01-01','APSA6DA12DA993B0','78',NULL,NULL,NULL,1747202475,'5',NULL,'PENDING UNFILLED',NULL,NULL,'UNFILLED','a:3:{i:0;a:1:{s:6:\"clause\";s:13:\"<p>Sample</p>\";}i:1;a:1:{s:6:\"clause\";s:13:\"<p>Sample</p>\";}i:2;a:1:{s:6:\"clause\";s:13:\"<p>Sample</p>\";}}');

/*Table structure for table `audit_checklist_remarks` */

DROP TABLE IF EXISTS `audit_checklist_remarks`;

CREATE TABLE `audit_checklist_remarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT NULL,
  `remarks` enum('YES','NO') DEFAULT NULL,
  `date_created` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `audit_checklist_remarks` */

/*Table structure for table `audit_evaluation` */

DROP TABLE IF EXISTS `audit_evaluation`;

CREATE TABLE `audit_evaluation` (
  `audit_evaluation_id` varchar(100) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `audit_report_id` varchar(100) DEFAULT NULL,
  `audit_evaluation_status` enum('PENDING','DONE') DEFAULT NULL,
  `aps_area_id` varchar(100) DEFAULT NULL,
  `evaluation_details` text DEFAULT NULL,
  `noted_by` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `audit_evaluation` */

insert  into `audit_evaluation`(`audit_evaluation_id`,`timestamp`,`user_id`,`audit_report_id`,`audit_evaluation_status`,`aps_area_id`,`evaluation_details`,`noted_by`,`audit_plan`,`comments`) values 
('AE-2025-02-08-1',1743774615,'3','AR-2025-02-08-1','DONE','66','a:5:{i:0;a:4:{s:14:\"question_title\";s:15:\"Ethical Conduct\";s:13:\"question_desc\";s:48:\"able to be diplomatic, open-minded and assertive\";s:11:\"question_id\";i:1;s:4:\"rate\";s:1:\"4\";}i:1;a:4:{s:14:\"question_title\";s:17:\"Fair Presentation\";s:13:\"question_desc\";s:19:\"absolutely unbiased\";s:11:\"question_id\";i:2;s:4:\"rate\";s:1:\"4\";}i:2;a:4:{s:14:\"question_title\";s:21:\"Due Professional Care\";s:13:\"question_desc\";s:91:\"diligence which a person, who possesses a special skill, under a given set of circumstances\";s:11:\"question_id\";i:3;s:4:\"rate\";s:1:\"4\";}i:3;a:4:{s:14:\"question_title\";s:12:\"Independence\";s:13:\"question_desc\";s:58:\"able to deliver questions and report directly and honestly\";s:11:\"question_id\";i:4;s:4:\"rate\";s:1:\"4\";}i:4;a:4:{s:14:\"question_title\";s:23:\"Evidence-based approach\";s:13:\"question_desc\";s:121:\"approach to auditing wherein internal auditors make use of objective evidence in verifying effectiveness of the processes\";s:11:\"question_id\";i:5;s:4:\"rate\";s:1:\"4\";}}','7','AP2025-02-08',''),
('AE-2025-01-01-1',1745376642,'3','AR-2025-01-01-1','DONE','79','a:5:{i:0;a:4:{s:14:\"question_title\";s:15:\"Ethical Conduct\";s:13:\"question_desc\";s:48:\"able to be diplomatic, open-minded and assertive\";s:11:\"question_id\";i:1;s:4:\"rate\";s:1:\"4\";}i:1;a:4:{s:14:\"question_title\";s:17:\"Fair Presentation\";s:13:\"question_desc\";s:19:\"absolutely unbiased\";s:11:\"question_id\";i:2;s:4:\"rate\";s:1:\"4\";}i:2;a:4:{s:14:\"question_title\";s:21:\"Due Professional Care\";s:13:\"question_desc\";s:91:\"diligence which a person, who possesses a special skill, under a given set of circumstances\";s:11:\"question_id\";i:3;s:4:\"rate\";s:1:\"4\";}i:3;a:4:{s:14:\"question_title\";s:12:\"Independence\";s:13:\"question_desc\";s:58:\"able to deliver questions and report directly and honestly\";s:11:\"question_id\";i:4;s:4:\"rate\";s:1:\"4\";}i:4;a:4:{s:14:\"question_title\";s:23:\"Evidence-based approach\";s:13:\"question_desc\";s:121:\"approach to auditing wherein internal auditors make use of objective evidence in verifying effectiveness of the processes\";s:11:\"question_id\";i:5;s:4:\"rate\";s:1:\"4\";}}','7','AP2025-01-01','Goods'),
('AE-2028-01-01-1',1746513637,'3','AR-2028-01-01-2','DONE','94','a:5:{i:0;a:4:{s:14:\"question_title\";s:15:\"Ethical Conduct\";s:13:\"question_desc\";s:48:\"able to be diplomatic, open-minded and assertive\";s:11:\"question_id\";i:1;s:4:\"rate\";s:1:\"4\";}i:1;a:4:{s:14:\"question_title\";s:17:\"Fair Presentation\";s:13:\"question_desc\";s:19:\"absolutely unbiased\";s:11:\"question_id\";i:2;s:4:\"rate\";s:1:\"4\";}i:2;a:4:{s:14:\"question_title\";s:21:\"Due Professional Care\";s:13:\"question_desc\";s:91:\"diligence which a person, who possesses a special skill, under a given set of circumstances\";s:11:\"question_id\";i:3;s:4:\"rate\";s:1:\"4\";}i:3;a:4:{s:14:\"question_title\";s:12:\"Independence\";s:13:\"question_desc\";s:58:\"able to deliver questions and report directly and honestly\";s:11:\"question_id\";i:4;s:4:\"rate\";s:1:\"4\";}i:4;a:4:{s:14:\"question_title\";s:23:\"Evidence-based approach\";s:13:\"question_desc\";s:121:\"approach to auditing wherein internal auditors make use of objective evidence in verifying effectiveness of the processes\";s:11:\"question_id\";i:5;s:4:\"rate\";s:1:\"4\";}}','26','AP2028-01-01','Goods'),
('AE-2028-01-01-2',1746513705,'3','AR-2028-01-01-1','DONE','93','a:5:{i:0;a:4:{s:14:\"question_title\";s:15:\"Ethical Conduct\";s:13:\"question_desc\";s:48:\"able to be diplomatic, open-minded and assertive\";s:11:\"question_id\";i:1;s:4:\"rate\";s:1:\"4\";}i:1;a:4:{s:14:\"question_title\";s:17:\"Fair Presentation\";s:13:\"question_desc\";s:19:\"absolutely unbiased\";s:11:\"question_id\";i:2;s:4:\"rate\";s:1:\"4\";}i:2;a:4:{s:14:\"question_title\";s:21:\"Due Professional Care\";s:13:\"question_desc\";s:91:\"diligence which a person, who possesses a special skill, under a given set of circumstances\";s:11:\"question_id\";i:3;s:4:\"rate\";s:1:\"4\";}i:3;a:4:{s:14:\"question_title\";s:12:\"Independence\";s:13:\"question_desc\";s:58:\"able to deliver questions and report directly and honestly\";s:11:\"question_id\";i:4;s:4:\"rate\";s:1:\"4\";}i:4;a:4:{s:14:\"question_title\";s:23:\"Evidence-based approach\";s:13:\"question_desc\";s:121:\"approach to auditing wherein internal auditors make use of objective evidence in verifying effectiveness of the processes\";s:11:\"question_id\";i:5;s:4:\"rate\";s:1:\"4\";}}','26','AP2028-01-01',''),
('AE-2027-01-01-1',1746600722,'3','AR-2027-01-01-1','DONE','90','a:5:{i:0;a:4:{s:14:\"question_title\";s:15:\"Ethical Conduct\";s:13:\"question_desc\";s:48:\"able to be diplomatic, open-minded and assertive\";s:11:\"question_id\";i:1;s:4:\"rate\";s:1:\"4\";}i:1;a:4:{s:14:\"question_title\";s:17:\"Fair Presentation\";s:13:\"question_desc\";s:19:\"absolutely unbiased\";s:11:\"question_id\";i:2;s:4:\"rate\";s:1:\"4\";}i:2;a:4:{s:14:\"question_title\";s:21:\"Due Professional Care\";s:13:\"question_desc\";s:91:\"diligence which a person, who possesses a special skill, under a given set of circumstances\";s:11:\"question_id\";i:3;s:4:\"rate\";s:1:\"4\";}i:3;a:4:{s:14:\"question_title\";s:12:\"Independence\";s:13:\"question_desc\";s:58:\"able to deliver questions and report directly and honestly\";s:11:\"question_id\";i:4;s:4:\"rate\";s:1:\"4\";}i:4;a:4:{s:14:\"question_title\";s:23:\"Evidence-based approach\";s:13:\"question_desc\";s:121:\"approach to auditing wherein internal auditors make use of objective evidence in verifying effectiveness of the processes\";s:11:\"question_id\";i:5;s:4:\"rate\";s:1:\"4\";}}','7','AP2027-01-01','Good'),
('AE-2029-02-08-1',1747203470,'3','AR-2029-02-08-1','DONE','98','a:5:{i:0;a:4:{s:14:\"question_title\";s:15:\"Ethical Conduct\";s:13:\"question_desc\";s:48:\"able to be diplomatic, open-minded and assertive\";s:11:\"question_id\";i:1;s:4:\"rate\";s:1:\"4\";}i:1;a:4:{s:14:\"question_title\";s:17:\"Fair Presentation\";s:13:\"question_desc\";s:19:\"absolutely unbiased\";s:11:\"question_id\";i:2;s:4:\"rate\";s:1:\"4\";}i:2;a:4:{s:14:\"question_title\";s:21:\"Due Professional Care\";s:13:\"question_desc\";s:91:\"diligence which a person, who possesses a special skill, under a given set of circumstances\";s:11:\"question_id\";i:3;s:4:\"rate\";s:1:\"4\";}i:3;a:4:{s:14:\"question_title\";s:12:\"Independence\";s:13:\"question_desc\";s:58:\"able to deliver questions and report directly and honestly\";s:11:\"question_id\";i:4;s:4:\"rate\";s:1:\"4\";}i:4;a:4:{s:14:\"question_title\";s:23:\"Evidence-based approach\";s:13:\"question_desc\";s:121:\"approach to auditing wherein internal auditors make use of objective evidence in verifying effectiveness of the processes\";s:11:\"question_id\";i:5;s:4:\"rate\";s:1:\"4\";}}','7','AP2029-02-08','');

/*Table structure for table `audit_plan_remarks` */

DROP TABLE IF EXISTS `audit_plan_remarks`;

CREATE TABLE `audit_plan_remarks` (
  `audit_plan` varchar(100) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `remarks_by` varchar(100) DEFAULT NULL,
  `audit_plan_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `audit_plan_remarks` */

insert  into `audit_plan_remarks`(`audit_plan`,`remarks`,`date_created`,`remarks_by`,`audit_plan_status`) values 
('AP2025-02-08','',1743773958,'9','QAD-APPROVED'),
('AP2025-02-08','',1743774062,'15',NULL),
('AP2024-01-01','',1744532009,'9','QAD-APPROVED'),
('AP2024-01-01','',1744532066,'15',NULL),
('AP2024-02-08','',1744610126,'9','RETURN FOR REVIEW'),
('AP2025-01-01','',1744610707,'9','QAD-APPROVED'),
('AP2025-01-01','',1744610751,'15',NULL),
('AP2026-01-01','',1744612563,'9','QAD-APPROVED'),
('AP2026-01-01','',1744612592,'15',NULL),
('AP2026-02-08','',1744612866,'9','QAD-APPROVED'),
('AP2026-02-08','',1744612891,'15',NULL),
('AP2027-01-01','',1745377490,'9','QAD-APPROVED'),
('AP2027-01-01','',1745377616,'15',NULL),
('AP2027-02-08','',1745379404,'9','QAD-APPROVED'),
('AP2027-02-08','',1745379417,'15',NULL),
('AP2024-02-08','',1745768444,'9','QAD-APPROVED'),
('AP2024-02-08','',1745768462,'15',NULL),
('AP2028-01-01','',1746513029,'9','QAD-APPROVED'),
('AP2028-01-01','',1746513058,'15',NULL),
('AP2029-01-01','Good',1747202326,'9','QAD-APPROVED'),
('AP2029-01-01','',1747202352,'15',NULL),
('AP2029-02-08','',1747203157,'9','QAD-APPROVED'),
('AP2029-02-08','',1747203198,'15',NULL);

/*Table structure for table `audit_plan_schedule` */

DROP TABLE IF EXISTS `audit_plan_schedule`;

CREATE TABLE `audit_plan_schedule` (
  `aps_id` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  `from_time` varchar(100) DEFAULT NULL,
  `to_time` varchar(100) DEFAULT NULL,
  `schedule_date` varchar(100) DEFAULT NULL,
  `team_id` varchar(100) DEFAULT NULL,
  `process_id` varchar(100) DEFAULT NULL,
  `audit_clause` text DEFAULT NULL,
  `plan_type` enum('INDIVIDUAL','FIXED') DEFAULT NULL,
  `fixed_title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `audit_plan_schedule` */

insert  into `audit_plan_schedule`(`aps_id`,`audit_plan`,`from_time`,`to_time`,`schedule_date`,`team_id`,`process_id`,`audit_clause`,`plan_type`,`fixed_title`) values 
('APS379EA2CD39269','AP2025-02-08','08:00','17:00','2025-04-04','AT92905715F702A','5','PM-DNSC-HORF; ISO Clauses: 6.1.2, 6.2.1;\r\n6.3,7.1.5.1, 7.3, 7.4, 8.1,9.1,9.2, 10.1,10.2, 10.3;','INDIVIDUAL',NULL),
('APS9F93CE8DD1819','AP2025-02-08','08:00','17:00','2025-04-04','AT9D364D05C2327','3','PM-DNSC-PMSF; ISO Clauses: 6.1; 6.2; 6.2.1e; 7.1.2;\r\n7.1.3; 7.1.4; 7.1.5.1; 7.3; 7.5.3.1; 8.2.1; 8.5.2; 8.5.4; 8.7.1;\r\n9.1.2; 10.2.1; 10.3\r\n','INDIVIDUAL',NULL),
('APS5BC6E97BDC1D6','AP2024-01-01','08:00','17:00','2025-04-13','AT633C303576ADB','3','sample','INDIVIDUAL',NULL),
('APSB78B31B7AF29D','AP2024-01-01','08:00','17:00','2025-04-13','ATB532CED67354C','2','sample','INDIVIDUAL',NULL),
('APSDD0D495090937','AP2024-02-08','08:00','17:00','2025-04-14','AT19D8D452718EF','5','Sample','INDIVIDUAL',NULL),
('APS27730D471094B','AP2025-01-01','08:00','17:00','2025-04-14','AT9B8A2DB701951','5','Sample','INDIVIDUAL',NULL),
('APS1C6E470246918','AP2026-01-01','8:00 AM','5:00 PM','2025-04-14','ATA7E171C90FCDB','4','Sample','INDIVIDUAL',NULL),
('APSF6DCCF5F40ACE','AP2026-02-08','08:00','17:00','2025-04-14','AT8275B67AF41C7','3','qwe','INDIVIDUAL',NULL),
('APSBCBB8E0BCF60A','AP2027-01-01','08:00','17:00','2025-04-23','AT9AFA8DE54410C','3','Sample 4.1','INDIVIDUAL',NULL),
('APS47395BE26C56E','AP2027-01-01','08:00','17:00','2025-04-23','AT03B97486F4498','5','Sample','INDIVIDUAL',NULL),
('APSB415A566F53EC','AP2027-02-08','08:00','17:00','2025-04-23','ATF13AA0345CD41','2','ISO CLAUSES','INDIVIDUAL',NULL),
('APS9814330A4CEF9','AP2024-02-08','08:00','17:00','2025-04-27','ATC827C8B42E48B','3','Sample','INDIVIDUAL',NULL),
('APSB6F2DD511F30B','AP2028-01-01','08:00','17:00','2025-05-07','ATBCA0B47E6F6E4','2','Sample','INDIVIDUAL',NULL),
('APSD64B22344B248','AP2028-01-01','08:00','17:00','2025-05-07','AT6CD5E9950CDF8','3','Sample','INDIVIDUAL',NULL),
('APS58196986F0440','AP2028-01-01','08:00','17:00','2025-05-08','ATF1A296D42E635','6','Sample','INDIVIDUAL',NULL),
('APSA6DA12DA993B0','AP2029-01-01','08:00','17:00','2025-05-21','AT6E9DDDB00409F','6','Sample','INDIVIDUAL',NULL),
('APSCBECC7F8B6319','AP2029-01-01','08:00','17:00','2025-05-14','AT15A675D00027F','7','Sample','INDIVIDUAL',NULL),
('APS3EBE6A76CE85F','AP2029-02-08','08:00','17:00','2025-05-14','AT8CC0CACA45FE3','2','Sample','INDIVIDUAL',NULL),
('APSF44CB65F8DA27','AP2029-02-08','08:00','17:00','2025-05-14','AT3301FF12608EF','3','Sample','INDIVIDUAL',NULL);

/*Table structure for table `audit_plan_team_members` */

DROP TABLE IF EXISTS `audit_plan_team_members`;

CREATE TABLE `audit_plan_team_members` (
  `tblid` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` varchar(100) DEFAULT NULL,
  `id` varchar(100) DEFAULT NULL COMMENT 'user_id',
  `role` enum('LEADER','MEMBER') DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  KEY `tblid` (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `audit_plan_team_members` */

insert  into `audit_plan_team_members`(`tblid`,`team_id`,`id`,`role`,`audit_plan`) values 
(47,'AT9D364D05C2327','6','LEADER','AP2025-02-08'),
(48,'AT9D364D05C2327','6','MEMBER','AP2025-02-08'),
(49,'AT9D364D05C2327','23','MEMBER','AP2025-02-08'),
(50,'AT92905715F702A','23','LEADER','AP2025-02-08'),
(51,'AT92905715F702A','5','MEMBER','AP2025-02-08'),
(52,'AT92905715F702A','6','MEMBER','AP2025-02-08'),
(53,'AT633C303576ADB','6','LEADER','AP2024-01-01'),
(54,'AT633C303576ADB','6','MEMBER','AP2024-01-01'),
(55,'AT633C303576ADB','23','MEMBER','AP2024-01-01'),
(56,'ATB532CED67354C','5','LEADER','AP2024-01-01'),
(57,'ATB532CED67354C','5','MEMBER','AP2024-01-01'),
(58,'ATB532CED67354C','23','MEMBER','AP2024-01-01'),
(68,'AT19D8D452718EF','5','LEADER','AP2024-02-08'),
(69,'AT19D8D452718EF','6','MEMBER','AP2024-02-08'),
(70,'AT19D8D452718EF','23','MEMBER','AP2024-02-08'),
(71,'AT9B8A2DB701951','5','LEADER','AP2025-01-01'),
(72,'AT9B8A2DB701951','6','MEMBER','AP2025-01-01'),
(73,'AT9B8A2DB701951','23','MEMBER','AP2025-01-01'),
(74,'ATA7E171C90FCDB','5','LEADER','AP2026-01-01'),
(75,'ATA7E171C90FCDB','6','MEMBER','AP2026-01-01'),
(76,'ATA7E171C90FCDB','23','MEMBER','AP2026-01-01'),
(77,'AT8275B67AF41C7','5','LEADER','AP2026-02-08'),
(78,'AT8275B67AF41C7','5','MEMBER','AP2026-02-08'),
(79,'AT8275B67AF41C7','6','MEMBER','AP2026-02-08'),
(80,'AT9AFA8DE54410C','23','LEADER','AP2027-01-01'),
(81,'AT9AFA8DE54410C','5','MEMBER','AP2027-01-01'),
(82,'AT9AFA8DE54410C','6','MEMBER','AP2027-01-01'),
(86,'AT13A753ABD4D5F','6','LEADER','AP2027-01-01'),
(87,'AT13A753ABD4D5F','5','MEMBER','AP2027-01-01'),
(88,'AT13A753ABD4D5F','23','MEMBER','AP2027-01-01'),
(92,'AT69BDA9444AB2D','6','LEADER','AP2027-01-01'),
(93,'AT69BDA9444AB2D','5','MEMBER','AP2027-01-01'),
(94,'AT69BDA9444AB2D','23','MEMBER','AP2027-01-01'),
(95,'AT03B97486F4498','30','LEADER','AP2027-01-01'),
(96,'AT03B97486F4498','5','MEMBER','AP2027-01-01'),
(97,'AT03B97486F4498','6','MEMBER','AP2027-01-01'),
(98,'ATF13AA0345CD41','30','LEADER','AP2027-02-08'),
(99,'ATF13AA0345CD41','5','MEMBER','AP2027-02-08'),
(100,'ATF13AA0345CD41','6','MEMBER','AP2027-02-08'),
(101,'ATC827C8B42E48B','30','LEADER','AP2024-02-08'),
(102,'ATC827C8B42E48B','5','MEMBER','AP2024-02-08'),
(103,'ATC827C8B42E48B','6','MEMBER','AP2024-02-08'),
(104,'ATC827C8B42E48B','23','MEMBER','AP2024-02-08'),
(105,'ATBCA0B47E6F6E4','6','LEADER','AP2028-01-01'),
(106,'ATBCA0B47E6F6E4','5','MEMBER','AP2028-01-01'),
(107,'ATBCA0B47E6F6E4','30','MEMBER','AP2028-01-01'),
(108,'AT6CD5E9950CDF8','5','LEADER','AP2028-01-01'),
(109,'AT6CD5E9950CDF8','6','MEMBER','AP2028-01-01'),
(110,'AT6CD5E9950CDF8','23','MEMBER','AP2028-01-01'),
(111,'ATF1A296D42E635','23','LEADER','AP2028-01-01'),
(112,'ATF1A296D42E635','6','MEMBER','AP2028-01-01'),
(113,'ATF1A296D42E635','30','MEMBER','AP2028-01-01'),
(114,'AT6E9DDDB00409F','6','LEADER','AP2029-01-01'),
(115,'AT6E9DDDB00409F','5','MEMBER','AP2029-01-01'),
(116,'AT6E9DDDB00409F','6','MEMBER','AP2029-01-01'),
(117,'AT15A675D00027F','30','LEADER','AP2029-01-01'),
(118,'AT15A675D00027F','5','MEMBER','AP2029-01-01'),
(119,'AT15A675D00027F','6','MEMBER','AP2029-01-01'),
(120,'AT8CC0CACA45FE3','6','LEADER','AP2029-02-08'),
(121,'AT8CC0CACA45FE3','5','MEMBER','AP2029-02-08'),
(122,'AT8CC0CACA45FE3','23','MEMBER','AP2029-02-08'),
(123,'AT3301FF12608EF','30','LEADER','AP2029-02-08'),
(124,'AT3301FF12608EF','5','MEMBER','AP2029-02-08'),
(125,'AT3301FF12608EF','6','MEMBER','AP2029-02-08'),
(126,'AT2CCC1002181BE','5','LEADER','AP2031-01-01'),
(127,'AT2CCC1002181BE','6','MEMBER','AP2031-01-01'),
(128,'AT2CCC1002181BE','23','MEMBER','AP2031-01-01'),
(129,'ATF790942213E54','30','LEADER','AP2031-01-01'),
(130,'ATF790942213E54','5','MEMBER','AP2031-01-01'),
(131,'ATF790942213E54','6','MEMBER','AP2031-01-01');

/*Table structure for table `audit_plan_teams` */

DROP TABLE IF EXISTS `audit_plan_teams`;

CREATE TABLE `audit_plan_teams` (
  `team_id` varchar(100) DEFAULT NULL,
  `team_number` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `audit_plan_teams` */

insert  into `audit_plan_teams`(`team_id`,`team_number`,`audit_plan`) values 
('AT9D364D05C2327','1','AP2025-02-08'),
('AT92905715F702A','2','AP2025-02-08'),
('AT633C303576ADB','1','AP2024-01-01'),
('ATB532CED67354C','2','AP2024-01-01'),
('AT19D8D452718EF','1','AP2024-02-08'),
('AT9B8A2DB701951','1','AP2025-01-01'),
('ATA7E171C90FCDB','1','AP2026-01-01'),
('AT8275B67AF41C7','1','AP2026-02-08'),
('AT9AFA8DE54410C','1','AP2027-01-01'),
('AT13A753ABD4D5F','0','AP2027-01-01'),
('AT69BDA9444AB2D','4','AP2027-01-01'),
('AT03B97486F4498','8','AP2027-01-01'),
('ATF13AA0345CD41','1','AP2027-02-08'),
('ATC827C8B42E48B','2','AP2024-02-08'),
('ATBCA0B47E6F6E4','1','AP2028-01-01'),
('AT6CD5E9950CDF8','2','AP2028-01-01'),
('ATF1A296D42E635','3','AP2028-01-01'),
('AT6E9DDDB00409F','1','AP2029-01-01'),
('AT15A675D00027F','2','AP2029-01-01'),
('AT8CC0CACA45FE3','1','AP2029-02-08'),
('AT3301FF12608EF','2','AP2029-02-08'),
('AT2CCC1002181BE','1','AP2031-01-01'),
('ATF790942213E54','2','AP2031-01-01');

/*Table structure for table `audit_plans` */

DROP TABLE IF EXISTS `audit_plans`;

CREATE TABLE `audit_plans` (
  `audit_plan` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `introduction` text DEFAULT NULL,
  `audit_objectives` text DEFAULT NULL,
  `reference_standard` text DEFAULT NULL,
  `audit_methodologies` text DEFAULT NULL,
  `year` int(11) NOT NULL,
  `status` enum('ONGOING','DONE','FOR REVIEW','SUBMITTED','QAD-APPROVED','QAD-NOT APPROVED','CMT-APPROVED','CMT-UNAPPROVED') DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `cons_audit_report_id` varchar(100) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  `qad_approved` varchar(100) DEFAULT NULL,
  `cmt_approved` varchar(100) DEFAULT NULL,
  `audit_type` enum('REGULAR','SPECIAL') DEFAULT 'REGULAR',
  `scope` text DEFAULT NULL,
  PRIMARY KEY (`audit_plan`),
  UNIQUE KEY `unique_type_year` (`type`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `audit_plans` */

insert  into `audit_plans`(`audit_plan`,`type`,`introduction`,`audit_objectives`,`reference_standard`,`audit_methodologies`,`year`,`status`,`created_by`,`cons_audit_report_id`,`timestamp`,`qad_approved`,`cmt_approved`,`audit_type`,`scope`) values 
('AP2024-01-01','1st Internal Quality Audit','            ','            ','            ','            ',2024,'ONGOING','7',NULL,1744531669,'9','15','REGULAR',NULL),
('AP2024-02-08','2nd Internal Quality Audit','QA1','QA1','QA1','QA1',2024,'ONGOING','7',NULL,1744609482,'9','15','REGULAR',NULL),
('AP2025-01-01','1st Internal Quality Audit','qa1','qa1','qa1','qa1',2025,'ONGOING','7',NULL,1744610599,'9','15','REGULAR',NULL),
('AP2025-02-08','2nd Internal Quality Audit','The Davao del Norte State College endeavors to maintain its re-certification to ISO 9001:2015 standard. In this regard, assessment of the processes against the requirements\r\nof the ISO 9001:2015 standard by carrying out internal quality audit activities is vital to the implementation, maintenance, and improvement of the established quality\r\nmanagement system of the College.            ','<p data-start=\"99\" data-end=\"143\" class=\"\">The Davao del Norte State College endeavors to maintain its re-certification to ISO 9001:2015 standard. In this regard, assessment of the processes against the requirements\r\nof the ISO 9001:2015 standard by carrying out internal quality audit activities is vital to the implementation, maintenance, and improvement of the established quality\r\nmanagement system of the College.</p>','ISO 9001:2015 Clauses 9.2, 4.1, 4.2, 4.3, 5.1, 5.2, 5.3, 6.1, 7.1, 7.1.6, 7.2, 7.3, 7.4, 7.5, 8.2, 8.4, 8.5, 8.6, 8.7, 9.1, 9.3, 10.2; SC-DNSC-IQA, Office Charter, CMO, Building\r\nCode            ','The conduct of the audit activity will follow the methodologies as specified below:\r\n? Collection of evidence/s thru sampling approach;\r\n? Collection of information thru interview, document review and observation;\r\n? Recording information thru checklists, notes and, if necessary thru photos; and\r\n? Working language in Filipino, Cebuano or/and English.&nbsp;            ',2025,'ONGOING','7',NULL,1743773570,'9','15','REGULAR',NULL),
('AP2026-01-01','1st Internal Quality Audit','Sample','Sample','SAMPLE','SAMPLE',2026,'ONGOING','7',NULL,1744612150,'9','15','REGULAR',NULL),
('AP2026-02-08','2nd Internal Quality Audit','            ','            ','            ','            ',2026,'ONGOING','7',NULL,1744612772,'9','15','REGULAR',NULL),
('AP2027-01-01','1st Internal Quality Audit','qweqwe','qwe','qwe','qwe',2027,'ONGOING','7',NULL,1744638769,'9','15','REGULAR',NULL),
('AP2027-02-08','2nd Internal Quality Audit','SAMPLE','SAMPLE','SAMPLE','SAMPLE',2027,'ONGOING','7',NULL,1745379330,'9','15','REGULAR','SAMPLE'),
('AP2028-01-01','1st Internal Quality Audit','<span id=\"docs-internal-guid-e244cfd3-7fff-81e3-80da-395c7308e8f5\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Arial Narrow&quot;, sans-serif; text-align: justify; white-space-collapse: preserve;\">The Davao del Norte State College endeavors to maintain its re-certification to ISO 9001:2015 standard. In this regard, assessment of the processes against the requirements of the ISO 9001:2015 standard by carrying out internal quality audit activities is vital to the&nbsp;implementation, maintenance, and improvement of the established quality management system of the College.</span></span>            ','<span id=\"docs-internal-guid-d93cf9b9-7fff-c708-c098-a80e3bdf4545\"><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 12pt; font-family: &quot;Arial Narrow&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Specifically, the audit activity intends to:</span></p><ul style=\"margin-bottom: 0px; padding-inline-start: 48px;\"><li dir=\"ltr\" style=\"list-style-type: disc; font-size: 12pt; font-family: &quot;Arial Narrow&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space: pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.2;margin-right: 8.3pt;text-align: justify;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; text-wrap-mode: wrap;\">Verify if there is ongoing compliance with the requirements of the ISO 9001:2015, DNSC’s QMS standards, policies and procedures, organization’s quality system documentation, as well as requirements of clients/customers or regulatory authorities.</span></p></li><li dir=\"ltr\" style=\"list-style-type: disc; font-size: 12pt; font-family: &quot;Arial Narrow&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space: pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.2;text-align: justify;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; text-wrap-mode: wrap;\">Evaluate the effectiveness of the methods and controls specified in the procedures.</span></p></li><li dir=\"ltr\" style=\"list-style-type: disc; font-size: 12pt; font-family: &quot;Arial Narrow&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space: pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.2;text-align: justify;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; text-wrap-mode: wrap;\">Evaluate the effectiveness of the actions to address risks and opportunities.</span></p></li><li dir=\"ltr\" style=\"list-style-type: disc; font-size: 12pt; font-family: &quot;Arial Narrow&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space: pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.2;text-align: justify;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; text-wrap-mode: wrap;\">Assess the extent of achievement of the performance targets.</span></p></li><li dir=\"ltr\" style=\"list-style-type: disc; font-size: 12pt; font-family: &quot;Arial Narrow&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space: pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.2;text-align: justify;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; text-wrap-mode: wrap;\">Identify the strengths of the processes and areas or methods where potential improvement can be made.</span></p></li></ul></span>            ','<span id=\"docs-internal-guid-4191f2a4-7fff-fa39-15c4-6888e60456eb\"><p dir=\"ltr\" style=\"line-height:1.2;text-indent: -6.6pt;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 0pt 6.6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Arial Narrow&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">ISO 9001:2015 Clauses 9.2, 4.1, 4.2, 4.3, 5.1, 5.2, 5.3, 6.1, 7.1, 7.1.6, 7.2, 7.3, 7.4, 7.5, 8.2, 8.4, 8.5, 8.6, 8.7, 9.1, 9.3, 10.2; SC-DNSC-IQA, Office Charter, CMO, Building </span><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: &quot;Arial Narrow&quot;, sans-serif; font-size: 12pt; white-space-collapse: preserve; text-indent: -6.6pt;\">Code</span></p></span>            ','<span id=\"docs-internal-guid-51eb8e1b-7fff-69da-91e2-0eb9fe8ac9e6\"><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 12pt; font-family: &quot;Arial Narrow&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">The conduct of the audit activity will follow the methodologies as specified below:</span></p><ul style=\"margin-bottom: 0px; padding-inline-start: 48px;\"><li dir=\"ltr\" style=\"list-style-type: disc; font-size: 12pt; font-family: &quot;Arial Narrow&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space: pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; text-wrap-mode: wrap;\">Collection of evidence/s thru sampling approach</span></p></li><li dir=\"ltr\" style=\"list-style-type: disc; font-size: 12pt; font-family: &quot;Arial Narrow&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space: pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; text-wrap-mode: wrap;\">Collection of information thru interview, document review, and observation</span></p></li><li dir=\"ltr\" style=\"list-style-type: disc; font-size: 12pt; font-family: &quot;Arial Narrow&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space: pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; text-wrap-mode: wrap;\">Recording information thru checklists, notes and, if necessary thru photos</span></p></li><li dir=\"ltr\" style=\"list-style-type: disc; font-size: 12pt; font-family: &quot;Arial Narrow&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space: pre;\" aria-level=\"1\"><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:0pt;\" role=\"presentation\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; text-wrap-mode: wrap;\">Working language in Filipino, Cebuano, and/or English</span></p></li></ul></span>            ',2028,'ONGOING','26',NULL,1746509184,'9','15','REGULAR','DNSC Management systems for undergraduate program, student support services, administrative services, research, and extension programs'),
('AP2028-02-08','2nd Internal Quality Audit','            ','            ','            ','            ',2028,'FOR REVIEW','26',NULL,1746517651,NULL,NULL,'REGULAR','            '),
('AP2029-01-01','1st Internal Quality Audit','<p style=\"text-align: left; margin-left: 50px;\">The Davao del Norte State College endeavors to maintain its re-certification to ISO 9001:2015 standard. In this regard,\r\nassessment of the processes against the requirements of the ISO 9001:2015 standard by carrying out internal quality audit\r\nactivities is vital to the implementation, maintenance, and improvement of the established quality management system of the\r\nCollege.</p>','<p style=\"margin-left: 25px;\">Specifically, the audit activity intends to:<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;• Verify if there is ongoing compliance with the requirements of the ISO 9001:2015, DNSC<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;• Evaluate the effectiveness of the methods and controls specified in the procedures.<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;• Evaluate the effectiveness of the actions to address risks and opportunities.<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;• Assess the extent of achievement of the performance targets.&nbsp;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;• Identify the strengths of the processes and areas or methods where potential improvement can be made</p>','ISO 9001:2015 Clauses 9.2, 4.1, 4.2, 4.3, 5.1, 5.2, 5.3, 6.1, 7.1, 7.1.6, 7.2, 7.3, 7.4, 7.5, 8.2, 8.4, 8.5, 8.6, 8.7, 9.1, 9.3, 10.2; SCDNSC-IQA, Office Charter, CMO, Building Code','The conduct of the audit activity will follow the methodologies as specified below:\r\n<br>          • Collection of evidence/s thru sampling approach\r\n<br>          • Collection of information thru interview, document review, and observation\r\n<br>          • Recording information thru checklists, notes and, if necessary thru photos\r\n<br>          • Working language in Filipino, Cebuano, and/or English\r\n             ',2029,'ONGOING','7',NULL,1747201488,'9','15','REGULAR','DNSC Management systems for undergraduate program, student support services, administrative services, research, and\r\nextension programs\r\n            '),
('AP2029-02-08','2nd Internal Quality Audit','The Davao del Norte State College endeavors to maintain its re-certification to ISO 9001:2015 standard. In this regard,\r\nassessment of the processes against the requirements of the ISO 9001:2015 standard by carrying out internal quality audit\r\nactivities is vital to the implementation, maintenance, and improvement of the established quality management system of the\r\nCollege.','pecifically, the audit activity intends to:<br>&nbsp; &nbsp; &nbsp; • Verify if there is ongoing compliance with the requirements of the ISO 9001:2015, DNSC<br>&nbsp; &nbsp; &nbsp; • Evaluate the effectiveness of the methods and controls specified in the procedures.<br>&nbsp; &nbsp; &nbsp; • Evaluate the effectiveness of the actions to address risks and opportunities.<br>&nbsp; &nbsp; &nbsp; • Assess the extent of achievement of the performance targets.<br>&nbsp; &nbsp; &nbsp; • Identify the strengths of the processes and areas or methods where potential improvement can be made            ','ISO 9001:2015 Clauses 9.2, 4.1, 4.2, 4.3, 5.1, 5.2, 5.3, 6.1, 7.1, 7.1.6, 7.2, 7.3, 7.4, 7.5, 8.2, 8.4, 8.5, 8.6, 8.7, 9.1, 9.3, 10.2; SCDNSC-IQA, Office Charter, CMO, Building Code&nbsp;            ','<p>The conduct of the audit activity will follow the methodologies as specified below:\r\n<br>&nbsp; &nbsp; &nbsp; &nbsp; • Collection of evidence/s thru sampling approach\r\n<br>&nbsp; &nbsp; &nbsp; &nbsp; • Collection of information thru interview, document review, and observation\r\n<br>&nbsp; &nbsp; &nbsp; &nbsp; • Recording information thru checklists, notes and, if necessary thru photos\r\n<br>&nbsp; &nbsp; &nbsp; &nbsp; • Working language in Filipino, Cebuano, and/or English&nbsp;            </p>',2029,'ONGOING','7',NULL,1747203043,'9','15','REGULAR','<p>DNSC Management systems for undergraduate program, student support services, administrative services, research, and\r\nextension programs\r\n            </p>'),
('AP2031-01-01','1st Internal Quality Audit','Sample','Sample','Sample','Sample',2031,'FOR REVIEW','7',NULL,1747646624,NULL,NULL,'REGULAR','Sample');

/*Table structure for table `audit_report` */

DROP TABLE IF EXISTS `audit_report`;

CREATE TABLE `audit_report` (
  `audit_report_id` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  `aps_id` varchar(100) DEFAULT NULL,
  `aps_area` varchar(100) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  `effectiveness_process` longtext DEFAULT NULL,
  `car_status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `ofi_improvement` text DEFAULT NULL,
  `ofi_nonconformance` text DEFAULT NULL,
  `car_details` text DEFAULT NULL,
  `audit_report_status` enum('PENDING','DONE','FOR REVIEW') DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `audit_evaluation_id` varchar(100) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `reviewed_by` varchar(100) DEFAULT NULL,
  `review_comments` text DEFAULT NULL,
  `review_timestamp` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `audit_report` */

insert  into `audit_report`(`audit_report_id`,`audit_plan`,`aps_id`,`aps_area`,`timestamp`,`effectiveness_process`,`car_status`,`ofi_improvement`,`ofi_nonconformance`,`car_details`,`audit_report_status`,`user_id`,`audit_evaluation_id`,`comments`,`reviewed_by`,`review_comments`,`review_timestamp`) values 
('AR-2025-02-08-1','AP2025-02-08','APS379EA2CD39269','8',1743774198,'a:5:{i:1;a:4:{s:6:\"number\";i:1;s:8:\"question\";s:75:\"Are the procedure steps accurate and complete as compared to true practice?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:0:\"\";}i:2;a:4:{s:6:\"number\";i:2;s:8:\"question\";s:178:\"Are there sufficient check steps (inspections, tests, reviews, approvals, sign-offs, etc.) that ensure the process outputs meet requirements before passing onto the next process?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:0:\"\";}i:3;a:4:{s:6:\"number\";i:3;s:8:\"question\";s:94:\"Does the process appear to adequately meet the requirements of ISO 9001 and its documentation?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:0:\"\";}i:4;a:4:{s:6:\"number\";i:4;s:8:\"question\";s:83:\"Does the process appear to adequately meet all customer or regulatory requirements?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:0:\"\";}i:5;a:4:{s:6:\"number\";i:5;s:8:\"question\";s:68:\"Are the quality objectives or targets identified in the process met?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:0:\"\";}}','ACTIVE','','','a:1:{i:0;a:3:{s:16:\"ofi_requirements\";s:0:\"\";s:12:\"ofi_findings\";s:0:\"\";s:13:\"ofi_evidences\";s:0:\"\";}}','DONE','5','AE-2025-02-08-1','','7','GOODS','1743774384'),
('AR-2025-01-01-1','AP2025-01-01','APS27730D471094B','8',1744611781,'a:5:{i:1;a:4:{s:6:\"number\";i:1;s:8:\"question\";s:75:\"Are the procedure steps accurate and complete as compared to true practice?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"sample\";}i:2;a:4:{s:6:\"number\";i:2;s:8:\"question\";s:178:\"Are there sufficient check steps (inspections, tests, reviews, approvals, sign-offs, etc.) that ensure the process outputs meet requirements before passing onto the next process?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"sample\";}i:3;a:4:{s:6:\"number\";i:3;s:8:\"question\";s:94:\"Does the process appear to adequately meet the requirements of ISO 9001 and its documentation?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"sample\";}i:4;a:4:{s:6:\"number\";i:4;s:8:\"question\";s:83:\"Does the process appear to adequately meet all customer or regulatory requirements?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"sample\";}i:5;a:4:{s:6:\"number\";i:5;s:8:\"question\";s:68:\"Are the quality objectives or targets identified in the process met?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"sample\";}}','ACTIVE','sample','sample','a:1:{i:0;a:3:{s:16:\"ofi_requirements\";s:0:\"\";s:12:\"ofi_findings\";s:0:\"\";s:13:\"ofi_evidences\";s:0:\"\";}}','DONE','5','AE-2025-01-01-1','Sample','7','Sample','1744611957'),
('AR-2026-01-01-1','AP2026-01-01','APS1C6E470246918','15',1744612661,'a:5:{i:1;a:4:{s:6:\"number\";i:1;s:8:\"question\";s:75:\"Are the procedure steps accurate and complete as compared to true practice?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"sample\";}i:2;a:4:{s:6:\"number\";i:2;s:8:\"question\";s:178:\"Are there sufficient check steps (inspections, tests, reviews, approvals, sign-offs, etc.) that ensure the process outputs meet requirements before passing onto the next process?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"sample\";}i:3;a:4:{s:6:\"number\";i:3;s:8:\"question\";s:94:\"Does the process appear to adequately meet the requirements of ISO 9001 and its documentation?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"sample\";}i:4;a:4:{s:6:\"number\";i:4;s:8:\"question\";s:83:\"Does the process appear to adequately meet all customer or regulatory requirements?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"sample\";}i:5;a:4:{s:6:\"number\";i:5;s:8:\"question\";s:68:\"Are the quality objectives or targets identified in the process met?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"sample\";}}','ACTIVE','','','a:1:{i:0;a:3:{s:16:\"ofi_requirements\";s:0:\"\";s:12:\"ofi_findings\";s:0:\"\";s:13:\"ofi_evidences\";s:0:\"\";}}','PENDING','5',NULL,'',NULL,NULL,NULL),
('AR-2026-02-08-1','AP2026-02-08','APSF6DCCF5F40ACE','5',1744612959,'a:5:{i:1;a:4:{s:6:\"number\";i:1;s:8:\"question\";s:75:\"Are the procedure steps accurate and complete as compared to true practice?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"sample\";}i:2;a:4:{s:6:\"number\";i:2;s:8:\"question\";s:178:\"Are there sufficient check steps (inspections, tests, reviews, approvals, sign-offs, etc.) that ensure the process outputs meet requirements before passing onto the next process?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"sample\";}i:3;a:4:{s:6:\"number\";i:3;s:8:\"question\";s:94:\"Does the process appear to adequately meet the requirements of ISO 9001 and its documentation?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"sample\";}i:4;a:4:{s:6:\"number\";i:4;s:8:\"question\";s:83:\"Does the process appear to adequately meet all customer or regulatory requirements?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"sample\";}i:5;a:4:{s:6:\"number\";i:5;s:8:\"question\";s:68:\"Are the quality objectives or targets identified in the process met?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"sample\";}}','ACTIVE','','','a:1:{i:0;a:3:{s:16:\"ofi_requirements\";s:0:\"\";s:12:\"ofi_findings\";s:0:\"\";s:13:\"ofi_evidences\";s:0:\"\";}}','PENDING','5',NULL,'',NULL,NULL,NULL),
('AR-2027-01-01-1','AP2027-01-01','APS47395BE26C56E','8',1745377733,'a:5:{i:1;a:4:{s:6:\"number\";i:1;s:8:\"question\";s:75:\"Are the procedure steps accurate and complete as compared to true practice?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:5:\"Goods\";}i:2;a:4:{s:6:\"number\";i:2;s:8:\"question\";s:178:\"Are there sufficient check steps (inspections, tests, reviews, approvals, sign-offs, etc.) that ensure the process outputs meet requirements before passing onto the next process?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:5:\"Goods\";}i:3;a:4:{s:6:\"number\";i:3;s:8:\"question\";s:94:\"Does the process appear to adequately meet the requirements of ISO 9001 and its documentation?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:5:\"Goods\";}i:4;a:4:{s:6:\"number\";i:4;s:8:\"question\";s:83:\"Does the process appear to adequately meet all customer or regulatory requirements?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:5:\"Goods\";}i:5;a:4:{s:6:\"number\";i:5;s:8:\"question\";s:68:\"Are the quality objectives or targets identified in the process met?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:5:\"Goods\";}}','ACTIVE','Goods','Goods','a:1:{i:0;a:3:{s:16:\"ofi_requirements\";s:5:\"Goods\";s:12:\"ofi_findings\";s:5:\"Goods\";s:13:\"ofi_evidences\";s:5:\"Goods\";}}','DONE','30','AE-2027-01-01-1','Goods','7','ty','1745378074'),
('AR-2028-01-01-1','AP2028-01-01','APSB6F2DD511F30B','2',1746513179,'a:5:{i:1;a:4:{s:6:\"number\";i:1;s:8:\"question\";s:75:\"Are the procedure steps accurate and complete as compared to true practice?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"Sample\";}i:2;a:4:{s:6:\"number\";i:2;s:8:\"question\";s:178:\"Are there sufficient check steps (inspections, tests, reviews, approvals, sign-offs, etc.) that ensure the process outputs meet requirements before passing onto the next process?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"Sample\";}i:3;a:4:{s:6:\"number\";i:3;s:8:\"question\";s:94:\"Does the process appear to adequately meet the requirements of ISO 9001 and its documentation?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"Sample\";}i:4;a:4:{s:6:\"number\";i:4;s:8:\"question\";s:83:\"Does the process appear to adequately meet all customer or regulatory requirements?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"Sample\";}i:5;a:4:{s:6:\"number\";i:5;s:8:\"question\";s:68:\"Are the quality objectives or targets identified in the process met?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"Sample\";}}','ACTIVE','','','a:1:{i:0;a:3:{s:16:\"ofi_requirements\";s:0:\"\";s:12:\"ofi_findings\";s:0:\"\";s:13:\"ofi_evidences\";s:0:\"\";}}','DONE','5','AE-2028-01-01-2','','26','Approved','1746513257'),
('AR-2028-01-01-2','AP2028-01-01','APSD64B22344B248','5',1746513330,'a:5:{i:1;a:4:{s:6:\"number\";i:1;s:8:\"question\";s:75:\"Are the procedure steps accurate and complete as compared to true practice?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"SAMPLE\";}i:2;a:4:{s:6:\"number\";i:2;s:8:\"question\";s:178:\"Are there sufficient check steps (inspections, tests, reviews, approvals, sign-offs, etc.) that ensure the process outputs meet requirements before passing onto the next process?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"SAMPLE\";}i:3;a:4:{s:6:\"number\";i:3;s:8:\"question\";s:94:\"Does the process appear to adequately meet the requirements of ISO 9001 and its documentation?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"SAMPLE\";}i:4;a:4:{s:6:\"number\";i:4;s:8:\"question\";s:83:\"Does the process appear to adequately meet all customer or regulatory requirements?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"SAMPLE\";}i:5;a:4:{s:6:\"number\";i:5;s:8:\"question\";s:68:\"Are the quality objectives or targets identified in the process met?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"SAMPLE\";}}','ACTIVE','','','a:1:{i:0;a:3:{s:16:\"ofi_requirements\";s:0:\"\";s:12:\"ofi_findings\";s:0:\"\";s:13:\"ofi_evidences\";s:0:\"\";}}','DONE','5','AE-2028-01-01-1','','26','Sample','1746513449'),
('AR-2028-01-01-3','AP2028-01-01','APS58196986F0440','78',1746532163,'a:5:{i:1;a:4:{s:6:\"number\";i:1;s:8:\"question\";s:75:\"Are the procedure steps accurate and complete as compared to true practice?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:7:\"SAMPLE \";}i:2;a:4:{s:6:\"number\";i:2;s:8:\"question\";s:178:\"Are there sufficient check steps (inspections, tests, reviews, approvals, sign-offs, etc.) that ensure the process outputs meet requirements before passing onto the next process?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"SAMPLE\";}i:3;a:4:{s:6:\"number\";i:3;s:8:\"question\";s:94:\"Does the process appear to adequately meet the requirements of ISO 9001 and its documentation?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"SAMPLE\";}i:4;a:4:{s:6:\"number\";i:4;s:8:\"question\";s:83:\"Does the process appear to adequately meet all customer or regulatory requirements?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"SAMPLE\";}i:5;a:4:{s:6:\"number\";i:5;s:8:\"question\";s:68:\"Are the quality objectives or targets identified in the process met?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:6:\"SAMPLE\";}}','ACTIVE','','','a:1:{i:0;a:3:{s:16:\"ofi_requirements\";s:0:\"\";s:12:\"ofi_findings\";s:0:\"\";s:13:\"ofi_evidences\";s:0:\"\";}}','PENDING','30',NULL,'',NULL,NULL,NULL),
('AR-2029-01-01-1','AP2029-01-01','APSA6DA12DA993B0','78',1747202429,'a:5:{i:1;a:4:{s:6:\"number\";i:1;s:8:\"question\";s:75:\"Are the procedure steps accurate and complete as compared to true practice?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:4:\"good\";}i:2;a:4:{s:6:\"number\";i:2;s:8:\"question\";s:178:\"Are there sufficient check steps (inspections, tests, reviews, approvals, sign-offs, etc.) that ensure the process outputs meet requirements before passing onto the next process?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:4:\"good\";}i:3;a:4:{s:6:\"number\";i:3;s:8:\"question\";s:94:\"Does the process appear to adequately meet the requirements of ISO 9001 and its documentation?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:4:\"good\";}i:4;a:4:{s:6:\"number\";i:4;s:8:\"question\";s:83:\"Does the process appear to adequately meet all customer or regulatory requirements?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:4:\"good\";}i:5;a:4:{s:6:\"number\";i:5;s:8:\"question\";s:68:\"Are the quality objectives or targets identified in the process met?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:4:\"good\";}}','ACTIVE','','','a:1:{i:0;a:3:{s:16:\"ofi_requirements\";s:0:\"\";s:12:\"ofi_findings\";s:0:\"\";s:13:\"ofi_evidences\";s:0:\"\";}}','DONE','5',NULL,'','7','Good','1747202675'),
('AR-2029-02-08-1','AP2029-02-08','APS3EBE6A76CE85F','2',1747203238,'a:5:{i:1;a:4:{s:6:\"number\";i:1;s:8:\"question\";s:75:\"Are the procedure steps accurate and complete as compared to true practice?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:0:\"\";}i:2;a:4:{s:6:\"number\";i:2;s:8:\"question\";s:178:\"Are there sufficient check steps (inspections, tests, reviews, approvals, sign-offs, etc.) that ensure the process outputs meet requirements before passing onto the next process?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:0:\"\";}i:3;a:4:{s:6:\"number\";i:3;s:8:\"question\";s:94:\"Does the process appear to adequately meet the requirements of ISO 9001 and its documentation?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:0:\"\";}i:4;a:4:{s:6:\"number\";i:4;s:8:\"question\";s:83:\"Does the process appear to adequately meet all customer or regulatory requirements?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:0:\"\";}i:5;a:4:{s:6:\"number\";i:5;s:8:\"question\";s:68:\"Are the quality objectives or targets identified in the process met?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:0:\"\";}}','ACTIVE','','','a:1:{i:0;a:3:{s:16:\"ofi_requirements\";s:0:\"\";s:12:\"ofi_findings\";s:0:\"\";s:13:\"ofi_evidences\";s:0:\"\";}}','DONE','5','AE-2029-02-08-1','','7','Thanks','1747203400'),
('AR-2029-02-08-2','AP2029-02-08','APSF44CB65F8DA27','5',1747203259,'a:5:{i:1;a:4:{s:6:\"number\";i:1;s:8:\"question\";s:75:\"Are the procedure steps accurate and complete as compared to true practice?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:0:\"\";}i:2;a:4:{s:6:\"number\";i:2;s:8:\"question\";s:178:\"Are there sufficient check steps (inspections, tests, reviews, approvals, sign-offs, etc.) that ensure the process outputs meet requirements before passing onto the next process?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:0:\"\";}i:3;a:4:{s:6:\"number\";i:3;s:8:\"question\";s:94:\"Does the process appear to adequately meet the requirements of ISO 9001 and its documentation?\";s:4:\"rate\";s:3:\"N/A\";s:7:\"comment\";s:0:\"\";}i:4;a:4:{s:6:\"number\";i:4;s:8:\"question\";s:83:\"Does the process appear to adequately meet all customer or regulatory requirements?\";s:4:\"rate\";s:3:\"N/A\";s:7:\"comment\";s:0:\"\";}i:5;a:4:{s:6:\"number\";i:5;s:8:\"question\";s:68:\"Are the quality objectives or targets identified in the process met?\";s:4:\"rate\";s:3:\"N/A\";s:7:\"comment\";s:0:\"\";}}','ACTIVE','','','a:1:{i:0;a:3:{s:16:\"ofi_requirements\";s:0:\"\";s:12:\"ofi_findings\";s:0:\"\";s:13:\"ofi_evidences\";s:0:\"\";}}','PENDING','5',NULL,'',NULL,NULL,NULL);

/*Table structure for table `consolidated_audit_report` */

DROP TABLE IF EXISTS `consolidated_audit_report`;

CREATE TABLE `consolidated_audit_report` (
  `cons_audit_report_id` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `timestamp` varchar(100) DEFAULT NULL,
  `fileUrl` text DEFAULT NULL,
  `report_status` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `reviewed_by` varchar(100) DEFAULT NULL,
  `review_comments` text DEFAULT NULL,
  `date_reviewed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `consolidated_audit_report` */

/*Table structure for table `evaluation_questions` */

DROP TABLE IF EXISTS `evaluation_questions`;

CREATE TABLE `evaluation_questions` (
  `question_title` varchar(100) DEFAULT NULL,
  `question_desc` text DEFAULT NULL,
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `evaluation_questions` */

insert  into `evaluation_questions`(`question_title`,`question_desc`,`question_id`) values 
('Ethical Conduct','able to be diplomatic, open-minded and assertive',1),
('Fair Presentation','absolutely unbiased',2),
('Due Professional Care','diligence which a person, who possesses a special skill, under a given set of circumstances',3),
('Independence','able to deliver questions and report directly and honestly',4),
('Evidence-based approach','approach to auditing wherein internal auditors make use of objective evidence in verifying effectiveness of the processes',5);

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  `send_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `messages` */

insert  into `messages`(`message_id`,`message`,`timestamp`,`send_id`) values 
(1,'Awit ng kabataan',1707456992,'7'),
(2,'pagka nalang jud',1739090030,'9'),
(3,'unsa man diay tama na order ani?',1739090184,'9'),
(4,'hayz',1739090220,'9'),
(5,'awop',1739090253,'9'),
(6,'as',1739090431,'9'),
(7,'asd',1739090484,'9'),
(8,'unsa may order ani dapat diay?',1739090504,'9'),
(9,'kani?',1739090527,'9'),
(10,'or diba mao ni?',1739090535,'9'),
(11,'or kani jud?',1739090540,'9'),
(12,'asdasd',1739090543,'9'),
(13,'asd',1739090544,'9'),
(14,'asd',1739090544,'9'),
(15,'asd',1739090544,'9'),
(16,'asd',1739090544,'9'),
(17,'asd',1739090545,'9'),
(18,'as',1739090545,'9'),
(19,'a',1739090545,'9'),
(20,'d',1739090545,'9'),
(21,'asd',1739090545,'9'),
(22,'asd',1739090545,'9'),
(23,'as',1739090545,'9'),
(24,'d',1739090545,'9'),
(25,'sd',1739090546,'9'),
(26,'d',1739090546,'9'),
(27,'w',1739090546,'9'),
(28,'dw',1739090546,'9'),
(29,'as',1739090864,'9'),
(30,'kani mao ni?',1739090945,'9'),
(31,'or dili pa jud?',1739090961,'9'),
(32,'mao?',1739091002,'9'),
(33,'di lagi mao',1739091018,'9'),
(35,'raka',1739091140,'9'),
(36,'awa ra lagi ka ui',1739091144,'9'),
(37,'aw',1739091158,'9'),
(38,'asdasda',1739091171,'9'),
(39,'asdasd',1739091179,'9'),
(40,'dayon?',1739091253,'9'),
(41,'pataka ra ka choy',1739091257,'9'),
(43,'ka',1739091379,'9'),
(44,'bibi',1739100899,'9'),
(45,'paita',1739100907,'9'),
(47,'@helen Schippe',1739103619,'1'),
(49,'gg',1739108704,'9'),
(50,'sample last message',1739108711,'9'),
(51,'send send daw ko',1739108750,'2'),
(53,'SIge will do',1745376152,'9');

/*Table structure for table `notification` */

DROP TABLE IF EXISTS `notification`;

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver_id` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `read_at` int(11) DEFAULT NULL,
  `sender_id` varchar(100) DEFAULT NULL,
  KEY `notification_id` (`notification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=539 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `notification` */

insert  into `notification`(`notification_id`,`receiver_id`,`message`,`created`,`read_at`,`sender_id`) values 
(181,'1','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1743772954,NULL,''),
(182,'2','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1743772954,NULL,''),
(183,'9','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1743772954,1744386011,''),
(184,'10','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1743772954,NULL,''),
(185,'11','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1743772954,NULL,''),
(186,'12','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1743772954,NULL,''),
(187,'9','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 2nd Internal Quality Audit - 2025\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-02-08\";}',1743773821,1744461189,'7'),
(188,'10','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 2nd Internal Quality Audit - 2025\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-02-08\";}',1743773821,NULL,'7'),
(189,'15','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 2nd Internal Quality Audit - 2025. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-02-08\";}',1743773958,NULL,'9'),
(190,'16','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 2nd Internal Quality Audit - 2025. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-02-08\";}',1743773958,NULL,'9'),
(191,'7','a:2:{s:7:\"message\";s:134:\"Monica Gaylord Hilpert approved : 2nd Internal Quality Audit - 2025. CMT is the final approver! Kindly wait for the CMT final review! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-02-08\";}',1743773958,NULL,'9'),
(192,'7','a:2:{s:7:\"message\";s:107:\"Ayden O\'Connell Balistreri approved : 2nd Internal Quality Audit - 2025. Audit Plan is now fully launched! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-02-08\";}',1743774062,1743774398,'15'),
(193,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2025\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2025-02-08\";}',1743774062,NULL,'7'),
(194,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2025\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2025-02-08\";}',1743774062,NULL,'7'),
(195,'23','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2025\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2025-02-08\";}',1743774062,NULL,'7'),
(196,'23','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2025\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2025-02-08\";}',1743774062,NULL,'7'),
(197,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2025\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2025-02-08\";}',1743774062,1743774143,'7'),
(198,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2025\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2025-02-08\";}',1743774062,NULL,'7'),
(199,'3','a:2:{s:7:\"message\";s:107:\"Leanne Lebsack included your office (Clinic) for audit under Audit Plan : 2nd Internal Quality Audit - 2025\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2025-02-08\";}',1743774062,1743774446,'7'),
(200,'3','a:2:{s:7:\"message\";s:110:\"Leanne Lebsack included your office (Registrar) for audit under Audit Plan : 2nd Internal Quality Audit - 2025\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2025-02-08\";}',1743774062,1743774453,'7'),
(201,'7','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2025-02-08-1\";}',1743774198,1743774225,'5'),
(202,'8','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2025-02-08-1\";}',1743774198,NULL,'5'),
(203,'23','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2025-02-08-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2025-02-08-1\";}',1743774384,NULL,'7'),
(204,'5','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2025-02-08-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2025-02-08-1\";}',1743774384,1743774407,'7'),
(205,'6','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2025-02-08-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2025-02-08-1\";}',1743774384,NULL,'7'),
(206,'3','a:2:{s:7:\"message\";s:132:\"Foster Feeney Lueilwitz created an audit report : AR-2025-02-08-1 and you may view and conduct an audit evaluation for this auditor.\";s:4:\"link\";s:49:\"audit_evaluation?action=create&id=AR-2025-02-08-1\";}',1743774384,1743774437,'5'),
(207,'7','a:2:{s:7:\"message\";s:116:\"Stacey Graham Skiles created an audit evaluation : AE-2025-02-08-1 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2025-02-08-1\";}',1743774615,NULL,'3'),
(208,'8','a:2:{s:7:\"message\";s:116:\"Stacey Graham Skiles created an audit evaluation : AE-2025-02-08-1 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2025-02-08-1\";}',1743774615,NULL,'3'),
(209,'7','a:2:{s:7:\"message\";s:73:\"Foster Feeney Lueilwitz created audit checklist and needs to be reviewed.\";s:4:\"link\";s:55:\"audit_checklist_review?action=review&id=AC-2025-02-08-1\";}',1743774810,1744531564,'5'),
(210,'8','a:2:{s:7:\"message\";s:73:\"Foster Feeney Lueilwitz created audit checklist and needs to be reviewed.\";s:4:\"link\";s:55:\"audit_checklist_review?action=review&id=AC-2025-02-08-1\";}',1743774810,NULL,'5'),
(211,'9','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 1st Internal Quality Audit - 2024\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-01-01\";}',1744531899,NULL,'7'),
(212,'10','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 1st Internal Quality Audit - 2024\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-01-01\";}',1744531899,NULL,'7'),
(213,'15','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2024. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-01-01\";}',1744532009,1744532074,'9'),
(214,'16','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2024. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-01-01\";}',1744532009,NULL,'9'),
(215,'7','a:2:{s:7:\"message\";s:134:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2024. CMT is the final approver! Kindly wait for the CMT final review! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-01-01\";}',1744532009,NULL,'9'),
(216,'7','a:2:{s:7:\"message\";s:107:\"Ayden O\'Connell Balistreri approved : 1st Internal Quality Audit - 2024. Audit Plan is now fully launched! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-01-01\";}',1744532066,NULL,'15'),
(217,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2024\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2024-01-01\";}',1744532066,NULL,'7'),
(218,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2024\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2024-01-01\";}',1744532066,NULL,'7'),
(219,'23','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2024\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2024-01-01\";}',1744532066,NULL,'7'),
(220,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2024\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2024-01-01\";}',1744532066,1744610471,'7'),
(221,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2024\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2024-01-01\";}',1744532066,1744610484,'7'),
(222,'23','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2024\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2024-01-01\";}',1744532066,NULL,'7'),
(223,'3','a:2:{s:7:\"message\";s:108:\"Leanne Lebsack included your office (Library) for audit under Audit Plan : 1st Internal Quality Audit - 2024\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2024-01-01\";}',1744532066,NULL,'7'),
(224,'3','a:2:{s:7:\"message\";s:107:\"Leanne Lebsack included your office (Clinic) for audit under Audit Plan : 1st Internal Quality Audit - 2024\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2024-01-01\";}',1744532066,NULL,'7'),
(225,'1','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1744609107,NULL,''),
(226,'2','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1744609107,NULL,''),
(227,'9','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1744609107,NULL,''),
(228,'10','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1744609107,NULL,''),
(229,'11','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1744609107,NULL,''),
(230,'12','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1744609107,NULL,''),
(231,'9','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-02-08\";}',1744609966,NULL,'7'),
(232,'10','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-02-08\";}',1744609966,NULL,'7'),
(233,'9','a:2:{s:7:\"message\";s:101:\"Leanne Hessel Lebsack cancelled the submission and may update it! : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-02-08\";}',1744609990,NULL,'7'),
(234,'10','a:2:{s:7:\"message\";s:101:\"Leanne Hessel Lebsack cancelled the submission and may update it! : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-02-08\";}',1744609990,NULL,'7'),
(235,'9','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-02-08\";}',1744610082,1744610107,'7'),
(236,'10','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-02-08\";}',1744610082,NULL,'7'),
(237,'7','a:2:{s:7:\"message\";s:116:\"Monica Gaylord Hilpert returned the : 2nd Internal Quality Audit - 2024. Kindly view the remarks from the Approver! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-02-08\";}',1744610126,1744610156,'9'),
(238,'9','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-01-01\";}',1744610662,NULL,'7'),
(239,'10','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-01-01\";}',1744610662,NULL,'7'),
(240,'15','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2025. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-01-01\";}',1744610707,NULL,'9'),
(241,'16','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2025. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-01-01\";}',1744610707,NULL,'9'),
(242,'7','a:2:{s:7:\"message\";s:134:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2025. CMT is the final approver! Kindly wait for the CMT final review! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-01-01\";}',1744610707,NULL,'9'),
(243,'7','a:2:{s:7:\"message\";s:107:\"Ayden O\'Connell Balistreri approved : 1st Internal Quality Audit - 2025. Audit Plan is now fully launched! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-01-01\";}',1744610751,NULL,'15'),
(244,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2025-01-01\";}',1744610751,1744611724,'7'),
(245,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2025-01-01\";}',1744610751,NULL,'7'),
(246,'23','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2025-01-01\";}',1744610751,NULL,'7'),
(247,'3','a:2:{s:7:\"message\";s:110:\"Leanne Lebsack included your office (Registrar) for audit under Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2025-01-01\";}',1744610751,NULL,'7'),
(248,'7','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2025-01-01-1\";}',1744611781,1744611864,'5'),
(249,'8','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2025-01-01-1\";}',1744611781,NULL,'5'),
(250,'5','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2025-01-01-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2025-01-01-1\";}',1744611957,1744612525,'7'),
(251,'6','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2025-01-01-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2025-01-01-1\";}',1744611957,NULL,'7'),
(252,'23','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2025-01-01-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2025-01-01-1\";}',1744611957,NULL,'7'),
(253,'3','a:2:{s:7:\"message\";s:132:\"Foster Feeney Lueilwitz created an audit report : AR-2025-01-01-1 and you may view and conduct an audit evaluation for this auditor.\";s:4:\"link\";s:49:\"audit_evaluation?action=create&id=AR-2025-01-01-1\";}',1744611957,NULL,'5'),
(254,'9','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 1st Internal Quality Audit - 2026\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2026-01-01\";}',1744612319,NULL,'7'),
(255,'10','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 1st Internal Quality Audit - 2026\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2026-01-01\";}',1744612319,NULL,'7'),
(256,'3','a:2:{s:7:\"message\";s:81:\"Monica Gaylord Hilpert assigned you this/these areas : Library, Clinic, Registrar\";s:4:\"link\";s:9:\"myProfile\";}',1744612412,NULL,'9'),
(257,'4','a:2:{s:7:\"message\";s:189:\"Monica Gaylord Hilpert assigned you this/these areas : Clinic, IAAS, IC, ILEGG, ITED-BACHELOR OF ARTS IN COMMUNICATION (BACOMM), IADS-Doctor of Philosophy in Educational Management (PHD EM)\";s:4:\"link\";s:9:\"myProfile\";}',1744612475,NULL,'9'),
(258,'15','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2026. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2026-01-01\";}',1744612563,1744612586,'9'),
(259,'16','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2026. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2026-01-01\";}',1744612563,NULL,'9'),
(260,'7','a:2:{s:7:\"message\";s:134:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2026. CMT is the final approver! Kindly wait for the CMT final review! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2026-01-01\";}',1744612563,NULL,'9'),
(261,'7','a:2:{s:7:\"message\";s:107:\"Ayden O\'Connell Balistreri approved : 1st Internal Quality Audit - 2026. Audit Plan is now fully launched! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2026-01-01\";}',1744612592,NULL,'15'),
(262,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2026\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2026-01-01\";}',1744612592,1744612616,'7'),
(263,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2026\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2026-01-01\";}',1744612592,NULL,'7'),
(264,'23','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2026\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2026-01-01\";}',1744612592,NULL,'7'),
(265,'4','a:2:{s:7:\"message\";s:105:\"Leanne Lebsack included your office (IAAS) for audit under Audit Plan : 1st Internal Quality Audit - 2026\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2026-01-01\";}',1744612592,NULL,'7'),
(266,'4','a:2:{s:7:\"message\";s:103:\"Leanne Lebsack included your office (IC) for audit under Audit Plan : 1st Internal Quality Audit - 2026\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2026-01-01\";}',1744612592,NULL,'7'),
(267,'4','a:2:{s:7:\"message\";s:106:\"Leanne Lebsack included your office (ILEGG) for audit under Audit Plan : 1st Internal Quality Audit - 2026\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2026-01-01\";}',1744612592,NULL,'7'),
(268,'7','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2026-01-01-1\";}',1744612661,1744612694,'5'),
(269,'8','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2026-01-01-1\";}',1744612661,NULL,'5'),
(270,'9','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 2nd Internal Quality Audit - 2026\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2026-02-08\";}',1744612810,1744612861,'7'),
(271,'10','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 2nd Internal Quality Audit - 2026\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2026-02-08\";}',1744612810,NULL,'7'),
(272,'15','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 2nd Internal Quality Audit - 2026. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2026-02-08\";}',1744612866,1744612884,'9'),
(273,'16','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 2nd Internal Quality Audit - 2026. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2026-02-08\";}',1744612866,NULL,'9'),
(274,'7','a:2:{s:7:\"message\";s:134:\"Monica Gaylord Hilpert approved : 2nd Internal Quality Audit - 2026. CMT is the final approver! Kindly wait for the CMT final review! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2026-02-08\";}',1744612866,NULL,'9'),
(275,'7','a:2:{s:7:\"message\";s:107:\"Ayden O\'Connell Balistreri approved : 2nd Internal Quality Audit - 2026. Audit Plan is now fully launched! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2026-02-08\";}',1744612891,NULL,'15'),
(276,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2026\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2026-02-08\";}',1744612891,1745045086,'7'),
(277,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2026\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2026-02-08\";}',1744612891,1744639464,'7'),
(278,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2026\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2026-02-08\";}',1744612891,NULL,'7'),
(279,'3','a:2:{s:7:\"message\";s:107:\"Leanne Lebsack included your office (Clinic) for audit under Audit Plan : 2nd Internal Quality Audit - 2026\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2026-02-08\";}',1744612891,NULL,'7'),
(280,'4','a:2:{s:7:\"message\";s:107:\"Leanne Lebsack included your office (Clinic) for audit under Audit Plan : 2nd Internal Quality Audit - 2026\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2026-02-08\";}',1744612891,NULL,'7'),
(281,'7','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2026-02-08-1\";}',1744612959,1744612976,'5'),
(282,'8','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2026-02-08-1\";}',1744612959,NULL,'5'),
(283,'1','a:2:{s:7:\"message\";s:105:\"? New registration alert! Someone just signed up. [awit gamer] Please review and verify their account.\";s:4:\"link\";s:26:\"users?action=pending_users\";}',1745042853,NULL,'29'),
(284,'2','a:2:{s:7:\"message\";s:105:\"? New registration alert! Someone just signed up. [awit gamer] Please review and verify their account.\";s:4:\"link\";s:26:\"users?action=pending_users\";}',1745042853,NULL,'29'),
(285,'9','a:2:{s:7:\"message\";s:105:\"? New registration alert! Someone just signed up. [awit gamer] Please review and verify their account.\";s:4:\"link\";s:26:\"users?action=pending_users\";}',1745042853,1745042905,'29'),
(286,'10','a:2:{s:7:\"message\";s:105:\"? New registration alert! Someone just signed up. [awit gamer] Please review and verify their account.\";s:4:\"link\";s:26:\"users?action=pending_users\";}',1745042853,NULL,'29'),
(287,'29','a:2:{s:7:\"message\";s:115:\"Monica Gaylord Hilpert assigned you this/these areas : IADS-Doctor of Philosophy in Educational Management (PHD EM)\";s:4:\"link\";s:9:\"myProfile\";}',1745042927,1745042944,'9'),
(288,'1','a:2:{s:7:\"message\";s:111:\"? New registration alert! Someone just signed up. [Leonidas Davinci] Please review and verify their account.\";s:4:\"link\";s:26:\"users?action=pending_users\";}',1745375251,NULL,'30'),
(289,'2','a:2:{s:7:\"message\";s:111:\"? New registration alert! Someone just signed up. [Leonidas Davinci] Please review and verify their account.\";s:4:\"link\";s:26:\"users?action=pending_users\";}',1745375251,NULL,'30'),
(290,'9','a:2:{s:7:\"message\";s:111:\"? New registration alert! Someone just signed up. [Leonidas Davinci] Please review and verify their account.\";s:4:\"link\";s:26:\"users?action=pending_users\";}',1745375251,1745375359,'30'),
(291,'10','a:2:{s:7:\"message\";s:111:\"? New registration alert! Someone just signed up. [Leonidas Davinci] Please review and verify their account.\";s:4:\"link\";s:26:\"users?action=pending_users\";}',1745375251,NULL,'30'),
(292,'7','a:2:{s:7:\"message\";s:116:\"Stacey Graham Skiles created an audit evaluation : AE-2025-01-01-1 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2025-01-01-1\";}',1745376642,NULL,'3'),
(293,'8','a:2:{s:7:\"message\";s:116:\"Stacey Graham Skiles created an audit evaluation : AE-2025-01-01-1 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2025-01-01-1\";}',1745376642,NULL,'3'),
(294,'9','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2027-01-01\";}',1745377457,1745377486,'7'),
(295,'10','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2027-01-01\";}',1745377457,NULL,'7'),
(296,'15','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2027. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2027-01-01\";}',1745377490,1745377612,'9'),
(297,'16','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2027. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2027-01-01\";}',1745377490,NULL,'9'),
(298,'7','a:2:{s:7:\"message\";s:134:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2027. CMT is the final approver! Kindly wait for the CMT final review! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2027-01-01\";}',1745377490,NULL,'9'),
(299,'7','a:2:{s:7:\"message\";s:107:\"Ayden O\'Connell Balistreri approved : 1st Internal Quality Audit - 2027. Audit Plan is now fully launched! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2027-01-01\";}',1745377616,NULL,'15'),
(300,'23','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2027-01-01\";}',1745377616,NULL,'7'),
(301,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2027-01-01\";}',1745377616,NULL,'7'),
(302,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2027-01-01\";}',1745377616,NULL,'7'),
(303,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2027-01-01\";}',1745377616,NULL,'7'),
(304,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2027-01-01\";}',1745377616,NULL,'7'),
(305,'23','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2027-01-01\";}',1745377616,NULL,'7'),
(306,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2027-01-01\";}',1745377616,NULL,'7'),
(307,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2027-01-01\";}',1745377616,NULL,'7'),
(308,'23','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2027-01-01\";}',1745377616,NULL,'7'),
(309,'30','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2027-01-01\";}',1745377616,1745377630,'7'),
(310,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2027-01-01\";}',1745377616,NULL,'7'),
(311,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2027-01-01\";}',1745377616,NULL,'7'),
(312,'3','a:2:{s:7:\"message\";s:107:\"Leanne Lebsack included your office (Clinic) for audit under Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2027-01-01\";}',1745377616,NULL,'7'),
(313,'3','a:2:{s:7:\"message\";s:110:\"Leanne Lebsack included your office (Registrar) for audit under Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2027-01-01\";}',1745377616,NULL,'7'),
(314,'4','a:2:{s:7:\"message\";s:107:\"Leanne Lebsack included your office (Clinic) for audit under Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2027-01-01\";}',1745377616,NULL,'7'),
(315,'4','a:2:{s:7:\"message\";s:106:\"Leanne Lebsack included your office (ILEGG) for audit under Audit Plan : 1st Internal Quality Audit - 2027\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2027-01-01\";}',1745377616,NULL,'7'),
(316,'7','a:2:{s:7:\"message\";s:65:\"Leonidas M Davinci created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2027-01-01-1\";}',1745377733,1745378038,'30'),
(317,'8','a:2:{s:7:\"message\";s:65:\"Leonidas M Davinci created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2027-01-01-1\";}',1745377733,NULL,'30'),
(318,'30','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2027-01-01-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2027-01-01-1\";}',1745378074,1745379283,'7'),
(319,'5','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2027-01-01-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2027-01-01-1\";}',1745378074,1745380717,'7'),
(320,'6','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2027-01-01-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2027-01-01-1\";}',1745378074,NULL,'7'),
(321,'3','a:2:{s:7:\"message\";s:127:\"Leonidas M Davinci created an audit report : AR-2027-01-01-1 and you may view and conduct an audit evaluation for this auditor.\";s:4:\"link\";s:49:\"audit_evaluation?action=create&id=AR-2027-01-01-1\";}',1745378074,NULL,'30'),
(322,'7','a:2:{s:7:\"message\";s:72:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2025-02-08-1\";}',1745378169,NULL,'30'),
(323,'8','a:2:{s:7:\"message\";s:72:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2025-02-08-1\";}',1745378169,NULL,'30'),
(324,'26','a:2:{s:7:\"message\";s:72:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2025-02-08-1\";}',1745378169,NULL,'30'),
(325,'7','a:2:{s:7:\"message\";s:72:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2025-02-08-1\";}',1745378562,1745378572,'30'),
(326,'8','a:2:{s:7:\"message\";s:72:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2025-02-08-1\";}',1745378562,NULL,'30'),
(327,'26','a:2:{s:7:\"message\";s:72:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2025-02-08-1\";}',1745378562,NULL,'30'),
(328,'7','a:2:{s:7:\"message\";s:72:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2025-02-08-1\";}',1745378627,NULL,'30'),
(329,'8','a:2:{s:7:\"message\";s:72:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2025-02-08-1\";}',1745378627,NULL,'30'),
(330,'26','a:2:{s:7:\"message\";s:72:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2025-02-08-1\";}',1745378627,NULL,'30'),
(331,'7','a:2:{s:7:\"message\";s:72:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2025-02-08-1\";}',1745378772,NULL,'30'),
(332,'8','a:2:{s:7:\"message\";s:72:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2025-02-08-1\";}',1745378772,NULL,'30'),
(333,'26','a:2:{s:7:\"message\";s:72:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2025-02-08-1\";}',1745378772,NULL,'30'),
(334,'23','a:2:{s:7:\"message\";s:164:\"Leanne Hessel Lebsack has already reviewed and approved the audit report (UNFILLED), now you may add remarks to make it (FILLED) - AC-2025-02-08-1 - Remarks - goods\";s:4:\"link\";s:55:\"audit_checklist?action=update_filled&id=AC-2025-02-08-1\";}',1745379045,NULL,'7'),
(335,'5','a:2:{s:7:\"message\";s:164:\"Leanne Hessel Lebsack has already reviewed and approved the audit report (UNFILLED), now you may add remarks to make it (FILLED) - AC-2025-02-08-1 - Remarks - goods\";s:4:\"link\";s:55:\"audit_checklist?action=update_filled&id=AC-2025-02-08-1\";}',1745379045,1745380704,'7'),
(336,'6','a:2:{s:7:\"message\";s:164:\"Leanne Hessel Lebsack has already reviewed and approved the audit report (UNFILLED), now you may add remarks to make it (FILLED) - AC-2025-02-08-1 - Remarks - goods\";s:4:\"link\";s:55:\"audit_checklist?action=update_filled&id=AC-2025-02-08-1\";}',1745379045,NULL,'7'),
(337,'7','a:2:{s:7:\"message\";s:72:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2025-02-08-1\";}',1745379069,1745379129,'30'),
(338,'8','a:2:{s:7:\"message\";s:72:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2025-02-08-1\";}',1745379069,NULL,'30'),
(339,'26','a:2:{s:7:\"message\";s:72:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2025-02-08-1\";}',1745379069,NULL,'30'),
(340,'9','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 2nd Internal Quality Audit - 2027\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2027-02-08\";}',1745379379,1745379399,'7'),
(341,'10','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 2nd Internal Quality Audit - 2027\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2027-02-08\";}',1745379379,NULL,'7'),
(342,'15','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 2nd Internal Quality Audit - 2027. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2027-02-08\";}',1745379404,1745379413,'9'),
(343,'16','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 2nd Internal Quality Audit - 2027. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2027-02-08\";}',1745379404,NULL,'9'),
(344,'7','a:2:{s:7:\"message\";s:134:\"Monica Gaylord Hilpert approved : 2nd Internal Quality Audit - 2027. CMT is the final approver! Kindly wait for the CMT final review! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2027-02-08\";}',1745379404,NULL,'9'),
(345,'7','a:2:{s:7:\"message\";s:107:\"Ayden O\'Connell Balistreri approved : 2nd Internal Quality Audit - 2027. Audit Plan is now fully launched! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2027-02-08\";}',1745379417,1745379495,'15'),
(346,'30','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2027\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2027-02-08\";}',1745379417,1745380851,'7'),
(347,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2027\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2027-02-08\";}',1745379417,1745380683,'7'),
(348,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2027\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2027-02-08\";}',1745379417,NULL,'7'),
(349,'3','a:2:{s:7:\"message\";s:108:\"Leanne Lebsack included your office (Library) for audit under Audit Plan : 2nd Internal Quality Audit - 2027\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2027-02-08\";}',1745379417,NULL,'7'),
(350,'7','a:2:{s:7:\"message\";s:68:\"Leonidas M Davinci created audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2027-02-08-1\";}',1745379484,1745379499,'30'),
(351,'8','a:2:{s:7:\"message\";s:68:\"Leonidas M Davinci created audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2027-02-08-1\";}',1745379484,NULL,'30'),
(352,'26','a:2:{s:7:\"message\";s:68:\"Leonidas M Davinci created audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2027-02-08-1\";}',1745379484,NULL,'30'),
(353,'30','a:2:{s:7:\"message\";s:160:\"Leanne Hessel Lebsack has already reviewed and approved the audit report (UNFILLED), now you may add remarks to make it (FILLED) - AC-2027-02-08-1 - Remarks - g\";s:4:\"link\";s:55:\"audit_checklist?action=update_filled&id=AC-2027-02-08-1\";}',1745379510,1745380961,'7'),
(354,'5','a:2:{s:7:\"message\";s:160:\"Leanne Hessel Lebsack has already reviewed and approved the audit report (UNFILLED), now you may add remarks to make it (FILLED) - AC-2027-02-08-1 - Remarks - g\";s:4:\"link\";s:55:\"audit_checklist?action=update_filled&id=AC-2027-02-08-1\";}',1745379510,1745380949,'7'),
(355,'6','a:2:{s:7:\"message\";s:160:\"Leanne Hessel Lebsack has already reviewed and approved the audit report (UNFILLED), now you may add remarks to make it (FILLED) - AC-2027-02-08-1 - Remarks - g\";s:4:\"link\";s:55:\"audit_checklist?action=update_filled&id=AC-2027-02-08-1\";}',1745379510,NULL,'7'),
(356,'7','a:2:{s:7:\"message\";s:81:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed (FILLED).\";s:4:\"link\";s:62:\"audit_checklist_review?action=review_filled&id=AC-2027-02-08-1\";}',1745381047,1745475696,'30'),
(357,'8','a:2:{s:7:\"message\";s:81:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed (FILLED).\";s:4:\"link\";s:62:\"audit_checklist_review?action=review_filled&id=AC-2027-02-08-1\";}',1745381047,NULL,'30'),
(358,'26','a:2:{s:7:\"message\";s:81:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed (FILLED).\";s:4:\"link\";s:62:\"audit_checklist_review?action=review_filled&id=AC-2027-02-08-1\";}',1745381047,NULL,'30'),
(359,'30','a:2:{s:7:\"message\";s:114:\"Leanne Hessel Lebsack has already reviewed and approved the audit report (FILLED) - AC-2027-02-08-1 - Remarks - TY\";s:4:\"link\";s:49:\"audit_checklist?action=details&id=AC-2027-02-08-1\";}',1745381177,NULL,'7'),
(360,'5','a:2:{s:7:\"message\";s:114:\"Leanne Hessel Lebsack has already reviewed and approved the audit report (FILLED) - AC-2027-02-08-1 - Remarks - TY\";s:4:\"link\";s:49:\"audit_checklist?action=details&id=AC-2027-02-08-1\";}',1745381177,1745381672,'7'),
(361,'6','a:2:{s:7:\"message\";s:114:\"Leanne Hessel Lebsack has already reviewed and approved the audit report (FILLED) - AC-2027-02-08-1 - Remarks - TY\";s:4:\"link\";s:49:\"audit_checklist?action=details&id=AC-2027-02-08-1\";}',1745381177,NULL,'7'),
(362,'1','a:2:{s:7:\"message\";s:108:\"? New registration alert! Someone just signed up. [SAMPLE SAMPLE] Please review and verify their account.\";s:4:\"link\";s:26:\"users?action=pending_users\";}',1745382735,NULL,'31'),
(363,'2','a:2:{s:7:\"message\";s:108:\"? New registration alert! Someone just signed up. [SAMPLE SAMPLE] Please review and verify their account.\";s:4:\"link\";s:26:\"users?action=pending_users\";}',1745382735,NULL,'31'),
(364,'9','a:2:{s:7:\"message\";s:108:\"? New registration alert! Someone just signed up. [SAMPLE SAMPLE] Please review and verify their account.\";s:4:\"link\";s:26:\"users?action=pending_users\";}',1745382735,NULL,'31'),
(365,'10','a:2:{s:7:\"message\";s:108:\"? New registration alert! Someone just signed up. [SAMPLE SAMPLE] Please review and verify their account.\";s:4:\"link\";s:26:\"users?action=pending_users\";}',1745382735,NULL,'31'),
(366,'9','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-02-08\";}',1745768404,NULL,'7'),
(367,'10','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-02-08\";}',1745768404,NULL,'7'),
(368,'15','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 2nd Internal Quality Audit - 2024. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-02-08\";}',1745768444,NULL,'9'),
(369,'16','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 2nd Internal Quality Audit - 2024. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-02-08\";}',1745768444,NULL,'9'),
(370,'7','a:2:{s:7:\"message\";s:134:\"Monica Gaylord Hilpert approved : 2nd Internal Quality Audit - 2024. CMT is the final approver! Kindly wait for the CMT final review! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-02-08\";}',1745768444,NULL,'9'),
(371,'7','a:2:{s:7:\"message\";s:107:\"Ayden O\'Connell Balistreri approved : 2nd Internal Quality Audit - 2024. Audit Plan is now fully launched! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2024-02-08\";}',1745768462,NULL,'15'),
(372,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2024-02-08\";}',1745768462,NULL,'7'),
(373,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2024-02-08\";}',1745768462,NULL,'7'),
(374,'23','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2024-02-08\";}',1745768462,NULL,'7'),
(375,'30','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2024-02-08\";}',1745768462,NULL,'7'),
(376,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2024-02-08\";}',1745768462,NULL,'7'),
(377,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2024-02-08\";}',1745768462,NULL,'7'),
(378,'23','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2024-02-08\";}',1745768462,NULL,'7'),
(379,'3','a:2:{s:7:\"message\";s:108:\"Leanne Lebsack included your office (Library) for audit under Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2024-02-08\";}',1745768462,NULL,'7'),
(380,'3','a:2:{s:7:\"message\";s:107:\"Leanne Lebsack included your office (Clinic) for audit under Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2024-02-08\";}',1745768462,NULL,'7'),
(381,'3','a:2:{s:7:\"message\";s:110:\"Leanne Lebsack included your office (Registrar) for audit under Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2024-02-08\";}',1745768462,NULL,'7'),
(382,'4','a:2:{s:7:\"message\";s:107:\"Leanne Lebsack included your office (Clinic) for audit under Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2024-02-08\";}',1745768462,NULL,'7'),
(383,'4','a:2:{s:7:\"message\";s:105:\"Leanne Lebsack included your office (IAAS) for audit under Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2024-02-08\";}',1745768462,NULL,'7'),
(384,'4','a:2:{s:7:\"message\";s:103:\"Leanne Lebsack included your office (IC) for audit under Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2024-02-08\";}',1745768462,NULL,'7'),
(385,'4','a:2:{s:7:\"message\";s:106:\"Leanne Lebsack included your office (ILEGG) for audit under Audit Plan : 2nd Internal Quality Audit - 2024\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2024-02-08\";}',1745768462,NULL,'7'),
(386,'7','a:2:{s:7:\"message\";s:68:\"Leonidas M Davinci created audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2024-02-08-1\";}',1745768750,NULL,'30'),
(387,'8','a:2:{s:7:\"message\";s:68:\"Leonidas M Davinci created audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2024-02-08-1\";}',1745768750,NULL,'30'),
(388,'26','a:2:{s:7:\"message\";s:68:\"Leonidas M Davinci created audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2024-02-08-1\";}',1745768750,NULL,'30'),
(389,'30','a:2:{s:7:\"message\";s:161:\"Leanne Hessel Lebsack has already reviewed and approved the audit report (UNFILLED), now you may add remarks to make it (FILLED) - AC-2024-02-08-1 - Remarks - nc\";s:4:\"link\";s:55:\"audit_checklist?action=update_filled&id=AC-2024-02-08-1\";}',1745768835,NULL,'7'),
(390,'5','a:2:{s:7:\"message\";s:161:\"Leanne Hessel Lebsack has already reviewed and approved the audit report (UNFILLED), now you may add remarks to make it (FILLED) - AC-2024-02-08-1 - Remarks - nc\";s:4:\"link\";s:55:\"audit_checklist?action=update_filled&id=AC-2024-02-08-1\";}',1745768835,NULL,'7'),
(391,'6','a:2:{s:7:\"message\";s:161:\"Leanne Hessel Lebsack has already reviewed and approved the audit report (UNFILLED), now you may add remarks to make it (FILLED) - AC-2024-02-08-1 - Remarks - nc\";s:4:\"link\";s:55:\"audit_checklist?action=update_filled&id=AC-2024-02-08-1\";}',1745768835,NULL,'7'),
(392,'23','a:2:{s:7:\"message\";s:161:\"Leanne Hessel Lebsack has already reviewed and approved the audit report (UNFILLED), now you may add remarks to make it (FILLED) - AC-2024-02-08-1 - Remarks - nc\";s:4:\"link\";s:55:\"audit_checklist?action=update_filled&id=AC-2024-02-08-1\";}',1745768835,NULL,'7'),
(393,'7','a:2:{s:7:\"message\";s:81:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed (FILLED).\";s:4:\"link\";s:62:\"audit_checklist_review?action=review_filled&id=AC-2024-02-08-1\";}',1745768936,NULL,'30'),
(394,'8','a:2:{s:7:\"message\";s:81:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed (FILLED).\";s:4:\"link\";s:62:\"audit_checklist_review?action=review_filled&id=AC-2024-02-08-1\";}',1745768936,NULL,'30'),
(395,'26','a:2:{s:7:\"message\";s:81:\"Leonidas M Davinci updated the audit checklist and needs to be reviewed (FILLED).\";s:4:\"link\";s:62:\"audit_checklist_review?action=review_filled&id=AC-2024-02-08-1\";}',1745768936,1746510588,'30'),
(396,'30','a:2:{s:7:\"message\";s:120:\"Leanne Hessel Lebsack has already reviewed and approved the audit report (FILLED) - AC-2024-02-08-1 - Remarks - Goods na\";s:4:\"link\";s:49:\"audit_checklist?action=details&id=AC-2024-02-08-1\";}',1745769189,NULL,'7'),
(397,'5','a:2:{s:7:\"message\";s:120:\"Leanne Hessel Lebsack has already reviewed and approved the audit report (FILLED) - AC-2024-02-08-1 - Remarks - Goods na\";s:4:\"link\";s:49:\"audit_checklist?action=details&id=AC-2024-02-08-1\";}',1745769189,NULL,'7'),
(398,'6','a:2:{s:7:\"message\";s:120:\"Leanne Hessel Lebsack has already reviewed and approved the audit report (FILLED) - AC-2024-02-08-1 - Remarks - Goods na\";s:4:\"link\";s:49:\"audit_checklist?action=details&id=AC-2024-02-08-1\";}',1745769189,NULL,'7'),
(399,'23','a:2:{s:7:\"message\";s:120:\"Leanne Hessel Lebsack has already reviewed and approved the audit report (FILLED) - AC-2024-02-08-1 - Remarks - Goods na\";s:4:\"link\";s:49:\"audit_checklist?action=details&id=AC-2024-02-08-1\";}',1745769189,NULL,'7'),
(400,'1','a:2:{s:7:\"message\";s:108:\"? New registration alert! Someone just signed up. [qwerty qwerty] Please review and verify their account.\";s:4:\"link\";s:26:\"users?action=pending_users\";}',1746498946,NULL,'32'),
(401,'2','a:2:{s:7:\"message\";s:108:\"? New registration alert! Someone just signed up. [qwerty qwerty] Please review and verify their account.\";s:4:\"link\";s:26:\"users?action=pending_users\";}',1746498946,NULL,'32'),
(402,'9','a:2:{s:7:\"message\";s:108:\"? New registration alert! Someone just signed up. [qwerty qwerty] Please review and verify their account.\";s:4:\"link\";s:26:\"users?action=pending_users\";}',1746498946,NULL,'32'),
(403,'10','a:2:{s:7:\"message\";s:108:\"? New registration alert! Someone just signed up. [qwerty qwerty] Please review and verify their account.\";s:4:\"link\";s:26:\"users?action=pending_users\";}',1746498946,NULL,'32'),
(404,'9','a:2:{s:7:\"message\";s:89:\"JOENA MARIE AGOD MARTINEZ submitted you to Audit Plan : 1st Internal Quality Audit - 2028\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2028-01-01\";}',1746512994,NULL,'26'),
(405,'10','a:2:{s:7:\"message\";s:89:\"JOENA MARIE AGOD MARTINEZ submitted you to Audit Plan : 1st Internal Quality Audit - 2028\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2028-01-01\";}',1746512994,NULL,'26'),
(406,'15','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2028. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2028-01-01\";}',1746513029,1746513051,'9'),
(407,'16','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2028. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2028-01-01\";}',1746513029,NULL,'9'),
(408,'26','a:2:{s:7:\"message\";s:134:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2028. CMT is the final approver! Kindly wait for the CMT final review! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2028-01-01\";}',1746513029,NULL,'9'),
(409,'26','a:2:{s:7:\"message\";s:107:\"Ayden O\'Connell Balistreri approved : 1st Internal Quality Audit - 2028. Audit Plan is now fully launched! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2028-01-01\";}',1746513058,NULL,'15'),
(410,'6','a:2:{s:7:\"message\";s:83:\"JOENA MARIE MARTINEZ assigned you to Audit Plan : 1st Internal Quality Audit - 2028\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2028-01-01\";}',1746513058,NULL,'26'),
(411,'5','a:2:{s:7:\"message\";s:83:\"JOENA MARIE MARTINEZ assigned you to Audit Plan : 1st Internal Quality Audit - 2028\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2028-01-01\";}',1746513058,1746513290,'26'),
(412,'30','a:2:{s:7:\"message\";s:83:\"JOENA MARIE MARTINEZ assigned you to Audit Plan : 1st Internal Quality Audit - 2028\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2028-01-01\";}',1746513058,NULL,'26'),
(413,'5','a:2:{s:7:\"message\";s:83:\"JOENA MARIE MARTINEZ assigned you to Audit Plan : 1st Internal Quality Audit - 2028\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2028-01-01\";}',1746513058,1746513128,'26'),
(414,'6','a:2:{s:7:\"message\";s:83:\"JOENA MARIE MARTINEZ assigned you to Audit Plan : 1st Internal Quality Audit - 2028\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2028-01-01\";}',1746513058,NULL,'26'),
(415,'23','a:2:{s:7:\"message\";s:83:\"JOENA MARIE MARTINEZ assigned you to Audit Plan : 1st Internal Quality Audit - 2028\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2028-01-01\";}',1746513058,NULL,'26'),
(416,'23','a:2:{s:7:\"message\";s:83:\"JOENA MARIE MARTINEZ assigned you to Audit Plan : 1st Internal Quality Audit - 2028\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2028-01-01\";}',1746513058,NULL,'26'),
(417,'6','a:2:{s:7:\"message\";s:83:\"JOENA MARIE MARTINEZ assigned you to Audit Plan : 1st Internal Quality Audit - 2028\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2028-01-01\";}',1746513058,NULL,'26'),
(418,'30','a:2:{s:7:\"message\";s:83:\"JOENA MARIE MARTINEZ assigned you to Audit Plan : 1st Internal Quality Audit - 2028\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2028-01-01\";}',1746513058,NULL,'26'),
(419,'3','a:2:{s:7:\"message\";s:114:\"JOENA MARIE MARTINEZ included your office (Library) for audit under Audit Plan : 1st Internal Quality Audit - 2028\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2028-01-01\";}',1746513058,1746513198,'26'),
(420,'3','a:2:{s:7:\"message\";s:113:\"JOENA MARIE MARTINEZ included your office (Clinic) for audit under Audit Plan : 1st Internal Quality Audit - 2028\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2028-01-01\";}',1746513058,NULL,'26'),
(421,'4','a:2:{s:7:\"message\";s:113:\"JOENA MARIE MARTINEZ included your office (Clinic) for audit under Audit Plan : 1st Internal Quality Audit - 2028\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2028-01-01\";}',1746513058,NULL,'26'),
(422,'7','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2028-01-01-1\";}',1746513179,NULL,'5'),
(423,'8','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2028-01-01-1\";}',1746513179,NULL,'5'),
(424,'26','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2028-01-01-1\";}',1746513179,NULL,'5'),
(425,'6','a:2:{s:7:\"message\";s:94:\"JOENA MARIE AGOD MARTINEZ has already reviewed and approved the audit report : AR-2028-01-01-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2028-01-01-1\";}',1746513257,NULL,'26'),
(426,'5','a:2:{s:7:\"message\";s:94:\"JOENA MARIE AGOD MARTINEZ has already reviewed and approved the audit report : AR-2028-01-01-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2028-01-01-1\";}',1746513257,NULL,'26'),
(427,'30','a:2:{s:7:\"message\";s:94:\"JOENA MARIE AGOD MARTINEZ has already reviewed and approved the audit report : AR-2028-01-01-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2028-01-01-1\";}',1746513257,NULL,'26'),
(428,'3','a:2:{s:7:\"message\";s:132:\"Foster Feeney Lueilwitz created an audit report : AR-2028-01-01-1 and you may view and conduct an audit evaluation for this auditor.\";s:4:\"link\";s:49:\"audit_evaluation?action=create&id=AR-2028-01-01-1\";}',1746513257,1746513504,'5'),
(429,'7','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2028-01-01-2\";}',1746513330,NULL,'5'),
(430,'8','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2028-01-01-2\";}',1746513330,NULL,'5'),
(431,'26','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2028-01-01-2\";}',1746513330,NULL,'5'),
(432,'5','a:2:{s:7:\"message\";s:94:\"JOENA MARIE AGOD MARTINEZ has already reviewed and approved the audit report : AR-2028-01-01-2\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2028-01-01-2\";}',1746513449,NULL,'26'),
(433,'6','a:2:{s:7:\"message\";s:94:\"JOENA MARIE AGOD MARTINEZ has already reviewed and approved the audit report : AR-2028-01-01-2\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2028-01-01-2\";}',1746513449,NULL,'26'),
(434,'23','a:2:{s:7:\"message\";s:94:\"JOENA MARIE AGOD MARTINEZ has already reviewed and approved the audit report : AR-2028-01-01-2\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2028-01-01-2\";}',1746513449,NULL,'26'),
(435,'3','a:2:{s:7:\"message\";s:132:\"Foster Feeney Lueilwitz created an audit report : AR-2028-01-01-2 and you may view and conduct an audit evaluation for this auditor.\";s:4:\"link\";s:49:\"audit_evaluation?action=create&id=AR-2028-01-01-2\";}',1746513449,NULL,'5'),
(436,'4','a:2:{s:7:\"message\";s:132:\"Foster Feeney Lueilwitz created an audit report : AR-2028-01-01-2 and you may view and conduct an audit evaluation for this auditor.\";s:4:\"link\";s:49:\"audit_evaluation?action=create&id=AR-2028-01-01-2\";}',1746513449,NULL,'5'),
(437,'7','a:2:{s:7:\"message\";s:116:\"Stacey Graham Skiles created an audit evaluation : AE-2028-01-01-1 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2028-01-01-1\";}',1746513637,NULL,'3'),
(438,'8','a:2:{s:7:\"message\";s:116:\"Stacey Graham Skiles created an audit evaluation : AE-2028-01-01-1 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2028-01-01-1\";}',1746513637,NULL,'3'),
(439,'26','a:2:{s:7:\"message\";s:116:\"Stacey Graham Skiles created an audit evaluation : AE-2028-01-01-1 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2028-01-01-1\";}',1746513637,NULL,'3'),
(440,'7','a:2:{s:7:\"message\";s:116:\"Stacey Graham Skiles created an audit evaluation : AE-2028-01-01-2 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2028-01-01-2\";}',1746513705,NULL,'3'),
(441,'8','a:2:{s:7:\"message\";s:116:\"Stacey Graham Skiles created an audit evaluation : AE-2028-01-01-2 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2028-01-01-2\";}',1746513705,NULL,'3'),
(442,'26','a:2:{s:7:\"message\";s:116:\"Stacey Graham Skiles created an audit evaluation : AE-2028-01-01-2 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2028-01-01-2\";}',1746513705,NULL,'3'),
(443,'7','a:2:{s:7:\"message\";s:65:\"Leonidas M Davinci created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2028-01-01-3\";}',1746532163,NULL,'30'),
(444,'8','a:2:{s:7:\"message\";s:65:\"Leonidas M Davinci created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2028-01-01-3\";}',1746532163,NULL,'30'),
(445,'26','a:2:{s:7:\"message\";s:65:\"Leonidas M Davinci created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2028-01-01-3\";}',1746532163,NULL,'30'),
(446,'1','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746600096,NULL,''),
(447,'2','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746600096,NULL,''),
(448,'9','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746600096,NULL,''),
(449,'10','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746600096,NULL,''),
(450,'11','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746600096,NULL,''),
(451,'12','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746600096,NULL,''),
(452,'7','a:2:{s:7:\"message\";s:116:\"Stacey Graham Skiles created an audit evaluation : AE-2027-01-01-1 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2027-01-01-1\";}',1746600722,NULL,'3'),
(453,'8','a:2:{s:7:\"message\";s:116:\"Stacey Graham Skiles created an audit evaluation : AE-2027-01-01-1 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2027-01-01-1\";}',1746600722,NULL,'3'),
(454,'26','a:2:{s:7:\"message\";s:116:\"Stacey Graham Skiles created an audit evaluation : AE-2027-01-01-1 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2027-01-01-1\";}',1746600722,NULL,'3'),
(455,'13','a:2:{s:7:\"message\";s:70:\"Monica Gaylord Hilpert assigned you this/these areas : Human Resources\";s:4:\"link\";s:9:\"myProfile\";}',1746601290,1746601340,'9'),
(456,'1','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853258,NULL,''),
(457,'2','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853258,NULL,''),
(458,'9','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853258,NULL,''),
(459,'10','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853258,NULL,''),
(460,'11','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853258,NULL,''),
(461,'12','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853258,NULL,''),
(462,'1','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853294,NULL,''),
(463,'2','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853294,NULL,''),
(464,'9','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853294,NULL,''),
(465,'10','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853294,NULL,''),
(466,'11','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853294,NULL,''),
(467,'12','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853294,NULL,''),
(468,'1','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853309,NULL,''),
(469,'2','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853309,NULL,''),
(470,'9','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853309,NULL,''),
(471,'10','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853309,NULL,''),
(472,'11','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853309,NULL,''),
(473,'12','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746853309,NULL,''),
(474,'1','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746854620,NULL,''),
(475,'2','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746854620,NULL,''),
(476,'9','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746854620,NULL,''),
(477,'10','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746854620,NULL,''),
(478,'11','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746854620,NULL,''),
(479,'12','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746854620,NULL,''),
(480,'1','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746952537,NULL,''),
(481,'2','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746952537,NULL,''),
(482,'9','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746952537,NULL,''),
(483,'10','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746952537,NULL,''),
(484,'11','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746952537,NULL,''),
(485,'12','a:2:{s:7:\"message\";s:71:\"???? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1746952537,NULL,''),
(486,'9','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 1st Internal Quality Audit - 2029\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2029-01-01\";}',1747202263,1747202319,'7'),
(487,'10','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 1st Internal Quality Audit - 2029\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2029-01-01\";}',1747202263,NULL,'7'),
(488,'15','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2029. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2029-01-01\";}',1747202326,1747202347,'9'),
(489,'16','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2029. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2029-01-01\";}',1747202326,NULL,'9'),
(490,'7','a:2:{s:7:\"message\";s:134:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2029. CMT is the final approver! Kindly wait for the CMT final review! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2029-01-01\";}',1747202326,NULL,'9'),
(491,'7','a:2:{s:7:\"message\";s:107:\"Ayden O\'Connell Balistreri approved : 1st Internal Quality Audit - 2029. Audit Plan is now fully launched! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2029-01-01\";}',1747202352,NULL,'15'),
(492,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2029\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2029-01-01\";}',1747202352,NULL,'7'),
(493,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2029\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2029-01-01\";}',1747202352,1747202393,'7'),
(494,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2029\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2029-01-01\";}',1747202352,NULL,'7'),
(495,'30','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2029\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2029-01-01\";}',1747202352,NULL,'7'),
(496,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2029\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2029-01-01\";}',1747202352,NULL,'7'),
(497,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2029\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2029-01-01\";}',1747202352,NULL,'7'),
(498,'7','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2029-01-01-1\";}',1747202429,NULL,'5'),
(499,'8','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2029-01-01-1\";}',1747202429,NULL,'5'),
(500,'26','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2029-01-01-1\";}',1747202429,NULL,'5'),
(501,'7','a:2:{s:7:\"message\";s:73:\"Foster Feeney Lueilwitz created audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2029-01-01-1\";}',1747202475,NULL,'5'),
(502,'8','a:2:{s:7:\"message\";s:73:\"Foster Feeney Lueilwitz created audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2029-01-01-1\";}',1747202475,NULL,'5'),
(503,'26','a:2:{s:7:\"message\";s:73:\"Foster Feeney Lueilwitz created audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2029-01-01-1\";}',1747202475,NULL,'5'),
(504,'7','a:2:{s:7:\"message\";s:77:\"Foster Feeney Lueilwitz updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2029-01-01-1\";}',1747202585,1747202600,'5'),
(505,'8','a:2:{s:7:\"message\";s:77:\"Foster Feeney Lueilwitz updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2029-01-01-1\";}',1747202585,NULL,'5'),
(506,'26','a:2:{s:7:\"message\";s:77:\"Foster Feeney Lueilwitz updated the audit checklist and needs to be reviewed.\";s:4:\"link\";s:64:\"audit_checklist_review?action=review_unfilled&id=AC-2029-01-01-1\";}',1747202585,NULL,'5'),
(507,'6','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2029-01-01-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2029-01-01-1\";}',1747202675,NULL,'7'),
(508,'5','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2029-01-01-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2029-01-01-1\";}',1747202675,NULL,'7'),
(509,'6','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2029-01-01-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2029-01-01-1\";}',1747202675,NULL,'7'),
(510,'3','a:2:{s:7:\"message\";s:100:\"Monica Gaylord Hilpert assigned you this/these areas : Library, Clinic, Registrar, Executive Affairs\";s:4:\"link\";s:9:\"myProfile\";}',1747202793,1747202808,'9'),
(511,'9','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 2nd Internal Quality Audit - 2029\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2029-02-08\";}',1747203124,NULL,'7'),
(512,'10','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 2nd Internal Quality Audit - 2029\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2029-02-08\";}',1747203124,NULL,'7'),
(513,'15','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 2nd Internal Quality Audit - 2029. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2029-02-08\";}',1747203157,NULL,'9'),
(514,'16','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 2nd Internal Quality Audit - 2029. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2029-02-08\";}',1747203157,NULL,'9'),
(515,'7','a:2:{s:7:\"message\";s:134:\"Monica Gaylord Hilpert approved : 2nd Internal Quality Audit - 2029. CMT is the final approver! Kindly wait for the CMT final review! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2029-02-08\";}',1747203157,NULL,'9'),
(516,'7','a:2:{s:7:\"message\";s:107:\"Ayden O\'Connell Balistreri approved : 2nd Internal Quality Audit - 2029. Audit Plan is now fully launched! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2029-02-08\";}',1747203198,NULL,'15'),
(517,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2029\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2029-02-08\";}',1747203198,NULL,'7'),
(518,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2029\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2029-02-08\";}',1747203198,1747203224,'7'),
(519,'23','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2029\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2029-02-08\";}',1747203198,NULL,'7'),
(520,'30','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2029\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2029-02-08\";}',1747203198,NULL,'7'),
(521,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2029\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2029-02-08\";}',1747203198,NULL,'7'),
(522,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 2nd Internal Quality Audit - 2029\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2029-02-08\";}',1747203198,NULL,'7'),
(523,'4','a:2:{s:7:\"message\";s:107:\"Leanne Lebsack included your office (Clinic) for audit under Audit Plan : 2nd Internal Quality Audit - 2029\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2029-02-08\";}',1747203198,NULL,'7'),
(524,'3','a:2:{s:7:\"message\";s:108:\"Leanne Lebsack included your office (Library) for audit under Audit Plan : 2nd Internal Quality Audit - 2029\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2029-02-08\";}',1747203198,NULL,'7'),
(525,'3','a:2:{s:7:\"message\";s:107:\"Leanne Lebsack included your office (Clinic) for audit under Audit Plan : 2nd Internal Quality Audit - 2029\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2029-02-08\";}',1747203198,NULL,'7'),
(526,'7','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2029-02-08-1\";}',1747203238,NULL,'5'),
(527,'8','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2029-02-08-1\";}',1747203238,NULL,'5'),
(528,'26','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2029-02-08-1\";}',1747203238,NULL,'5'),
(529,'7','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2029-02-08-2\";}',1747203259,NULL,'5'),
(530,'8','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2029-02-08-2\";}',1747203259,NULL,'5'),
(531,'26','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2029-02-08-2\";}',1747203259,NULL,'5'),
(532,'6','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2029-02-08-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2029-02-08-1\";}',1747203400,NULL,'7'),
(533,'5','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2029-02-08-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2029-02-08-1\";}',1747203400,NULL,'7'),
(534,'23','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2029-02-08-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2029-02-08-1\";}',1747203400,NULL,'7'),
(535,'3','a:2:{s:7:\"message\";s:132:\"Foster Feeney Lueilwitz created an audit report : AR-2029-02-08-1 and you may view and conduct an audit evaluation for this auditor.\";s:4:\"link\";s:49:\"audit_evaluation?action=create&id=AR-2029-02-08-1\";}',1747203400,1747203439,'5'),
(536,'7','a:2:{s:7:\"message\";s:116:\"Stacey Graham Skiles created an audit evaluation : AE-2029-02-08-1 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2029-02-08-1\";}',1747203470,1747646571,'3'),
(537,'8','a:2:{s:7:\"message\";s:116:\"Stacey Graham Skiles created an audit evaluation : AE-2029-02-08-1 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2029-02-08-1\";}',1747203470,NULL,'3'),
(538,'26','a:2:{s:7:\"message\";s:116:\"Stacey Graham Skiles created an audit evaluation : AE-2029-02-08-1 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2029-02-08-1\";}',1747203470,NULL,'3');

/*Table structure for table `office` */

DROP TABLE IF EXISTS `office`;

CREATE TABLE `office` (
  `office_id` int(11) NOT NULL AUTO_INCREMENT,
  `office_name` varchar(100) DEFAULT NULL,
  `active_status` varchar(100) DEFAULT NULL,
  `parent_id` varchar(100) DEFAULT NULL,
  KEY `office_id` (`office_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `office` */

insert  into `office`(`office_id`,`office_name`,`active_status`,`parent_id`) values 
(1,'College Library','ACTIVE','0'),
(2,'Clinic','ACTIVE','0'),
(3,'IT OFffice','ACTIVE','0'),
(4,'Human Resources Office','ACTIVE','0');

/*Table structure for table `otps` */

DROP TABLE IF EXISTS `otps`;

CREATE TABLE `otps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `code` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `expiration` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*Data for the table `otps` */

insert  into `otps`(`id`,`user_id`,`code`,`created`,`expiration`) values 
(3,21,'b685d3d38f111','1732698268','1732698568'),
(4,22,'e63f2dcc45624','1736217254','1736217554'),
(5,23,'3cad2d40d3c2c','1736579278','1736579578'),
(6,24,'61608ec6ea0d8','1739019273','1739019573'),
(7,25,'df090b58b0fa4','1744608347','1744608647'),
(8,26,'1bc8e414e40f3','1744615161','1744615461'),
(9,27,'462bba9c95415','1744638458','1744638758'),
(10,28,'c875a0e67871e','1745042667','1745042967'),
(11,29,'e00e0a3263040','1745042853','1745043153'),
(12,30,'4e1ad178280a3','1745375251','1745375551'),
(13,31,'00a541222663a','1745382735','1745383035'),
(14,32,'0e679766b9d47','1746498945','1746499245');

/*Table structure for table `position` */

DROP TABLE IF EXISTS `position`;

CREATE TABLE `position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(100) DEFAULT NULL,
  `active_status` enum('active','inactive') DEFAULT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `position` */

insert  into `position`(`position_id`,`position_name`,`active_status`) values 
(2,'Cashier','active'),
(3,'Chairman',NULL),
(4,'Clinic Officer',NULL),
(5,'Registrar',NULL),
(6,'Librarian',NULL),
(7,'Nurse',NULL),
(8,'College President',NULL),
(9,'Director for Executive Affairs',NULL);

/*Table structure for table `process` */

DROP TABLE IF EXISTS `process`;

CREATE TABLE `process` (
  `process_id` int(11) NOT NULL AUTO_INCREMENT,
  `process_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`process_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `process` */

insert  into `process`(`process_id`,`process_name`) values 
(1,'Same Process'),
(2,'LIRC Information Resources Weeding and Deselection Process (LIRWDP)'),
(3,'Dispensing of First-Aid Medicines (DFM)'),
(4,'Conduct of Undergraduate Programs (CUP)'),
(5,'Request for Credentials (RFC)'),
(6,'Top Management for QP and CTO'),
(7,'Facilitation of Visit Procedure (FVP)'),
(8,'Handling Vehicle Maintenance (HVM)'),
(9,'Active Partnership and Collaboration (APC)'),
(10,'Conduct of Board of Trustees Meetings (CBTM)'),
(11,'Execution of MOA/MOU/MOPs Post-Board Meeting (EMPBM)'),
(12,'Conduct of Management Review (CMR)'),
(13,'Collection of Data for the Physical Accomplishment Report (CDPAR)'),
(14,'Monitoring and Evaluation of MOA/MOU/MOPs (MEM)'),
(15,'Personnel Performance Evaluation (PPE)'),
(16,'Engineering and Infrastructure Unit'),
(17,'Preventive Maintenance Schedule of Vehicles (PMSV)'),
(18,'Vehicle Requisitioning Procedure (VRP)'),
(19,'Control of Documents (COD)'),
(20,'Control of Records (COR)'),
(21,'Issuance of Certificate of Legal Review (ICLR)'),
(22,'Preparation and Endorsement of MOA/MOU/MOPs for Board Action (PEMBA)'),
(23,'Issuance of GAD Certification'),
(24,'Handling of Client\'s Feedback (HCF('),
(25,'Risk and Opportunity Management (ROM)'),
(26,'Control of Non-conforming Services (CNS)'),
(27,'Internal Quality Audit (IQA)'),
(28,'Alumni Affairs Office'),
(29,'Academic Unit Monitoring System (AUMS)'),
(30,'Approval of Candidates for Graduation (ACG)'),
(31,'Selection and Acquisition of Information Resources (SAIR)');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`role_name`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Staff',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(2,'Process Owner',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(3,'Internal Auditor',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(4,'Internal Lead Auditor',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(5,'Quality Assurance Director',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(6,'Human Resources',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(7,'Document Control Custodian',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(8,'College Management Team',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24');

/*Table structure for table `survey` */

DROP TABLE IF EXISTS `survey`;

CREATE TABLE `survey` (
  `survey_id` int(11) NOT NULL AUTO_INCREMENT,
  `office_id` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `survey_result` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `timestamp` varchar(100) DEFAULT NULL,
  `contact_number` varchar(100) DEFAULT NULL,
  KEY `survey_id` (`survey_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `survey` */

insert  into `survey`(`survey_id`,`office_id`,`name`,`email_address`,`survey_result`,`remarks`,`timestamp`,`contact_number`) values 
(11,'3','Girly','','a:4:{i:0;a:3:{s:8:\"criteria\";i:1;s:13:\"criteria_name\";s:21:\"Promptness of Service\";s:6:\"result\";s:1:\"4\";}i:1;a:3:{s:8:\"criteria\";i:2;s:13:\"criteria_name\";s:21:\"Quality of Engagement\";s:6:\"result\";s:1:\"4\";}i:2;a:3:{s:8:\"criteria\";i:3;s:13:\"criteria_name\";s:23:\"Cordiality of Personnel\";s:6:\"result\";s:1:\"4\";}i:3;a:3:{s:8:\"criteria\";i:4;s:13:\"criteria_name\";s:23:\"another question sample\";s:6:\"result\";s:1:\"4\";}}','Nice place','1743772954',''),
(12,'3','','','a:6:{i:0;a:3:{s:8:\"criteria\";i:1;s:13:\"criteria_name\";s:21:\"Promptness of Service\";s:6:\"result\";s:1:\"1\";}i:1;a:3:{s:8:\"criteria\";i:2;s:13:\"criteria_name\";s:21:\"Quality of Engagement\";s:6:\"result\";s:1:\"1\";}i:2;a:3:{s:8:\"criteria\";i:3;s:13:\"criteria_name\";s:23:\"Cordiality of Personnel\";s:6:\"result\";s:1:\"1\";}i:3;a:3:{s:8:\"criteria\";i:4;s:13:\"criteria_name\";s:23:\"another question sample\";s:6:\"result\";s:1:\"1\";}i:4;a:3:{s:8:\"criteria\";i:5;s:13:\"criteria_name\";s:16:\"EXAMPLE CRITERIA\";s:6:\"result\";s:1:\"1\";}i:5;a:3:{s:8:\"criteria\";i:6;s:13:\"criteria_name\";s:3:\"QA1\";s:6:\"result\";s:1:\"5\";}}','Sample','1744609107',''),
(13,'4','','','a:4:{i:0;a:3:{s:8:\"criteria\";i:1;s:13:\"criteria_name\";s:21:\"Promptness of Service\";s:6:\"result\";s:1:\"1\";}i:1;a:3:{s:8:\"criteria\";i:2;s:13:\"criteria_name\";s:21:\"Quality of Engagement\";s:6:\"result\";s:1:\"1\";}i:2;a:3:{s:8:\"criteria\";i:3;s:13:\"criteria_name\";s:23:\"Cordiality of Personnel\";s:6:\"result\";s:1:\"1\";}i:3;a:3:{s:8:\"criteria\";i:4;s:13:\"criteria_name\";s:23:\"another question sample\";s:6:\"result\";s:1:\"1\";}}','','1746600096',''),
(14,'2','','','a:4:{i:0;a:3:{s:8:\"criteria\";i:1;s:13:\"criteria_name\";s:21:\"Promptness of Service\";s:6:\"result\";s:1:\"4\";}i:1;a:3:{s:8:\"criteria\";i:2;s:13:\"criteria_name\";s:21:\"Quality of Engagement\";s:6:\"result\";s:1:\"3\";}i:2;a:3:{s:8:\"criteria\";i:3;s:13:\"criteria_name\";s:23:\"Cordiality of Personnel\";s:6:\"result\";s:1:\"4\";}i:3;a:3:{s:8:\"criteria\";i:4;s:13:\"criteria_name\";s:23:\"another question sample\";s:6:\"result\";s:1:\"3\";}}','','1746853258',''),
(15,'1','','','a:4:{i:0;a:3:{s:8:\"criteria\";i:1;s:13:\"criteria_name\";s:21:\"Promptness of Service\";s:6:\"result\";s:1:\"5\";}i:1;a:3:{s:8:\"criteria\";i:2;s:13:\"criteria_name\";s:21:\"Quality of Engagement\";s:6:\"result\";s:1:\"4\";}i:2;a:3:{s:8:\"criteria\";i:3;s:13:\"criteria_name\";s:23:\"Cordiality of Personnel\";s:6:\"result\";s:1:\"4\";}i:3;a:3:{s:8:\"criteria\";i:4;s:13:\"criteria_name\";s:23:\"another question sample\";s:6:\"result\";s:1:\"4\";}}','','1746853294',''),
(16,'3','','','a:4:{i:0;a:3:{s:8:\"criteria\";i:1;s:13:\"criteria_name\";s:21:\"Promptness of Service\";s:6:\"result\";s:1:\"4\";}i:1;a:3:{s:8:\"criteria\";i:2;s:13:\"criteria_name\";s:21:\"Quality of Engagement\";s:6:\"result\";s:1:\"4\";}i:2;a:3:{s:8:\"criteria\";i:3;s:13:\"criteria_name\";s:23:\"Cordiality of Personnel\";s:6:\"result\";s:1:\"4\";}i:3;a:3:{s:8:\"criteria\";i:4;s:13:\"criteria_name\";s:23:\"another question sample\";s:6:\"result\";s:1:\"4\";}}','','1746853309',''),
(17,'1','Edchel Alonzo','','a:4:{i:0;a:3:{s:8:\"criteria\";i:1;s:13:\"criteria_name\";s:21:\"Promptness of Service\";s:6:\"result\";s:1:\"5\";}i:1;a:3:{s:8:\"criteria\";i:2;s:13:\"criteria_name\";s:21:\"Quality of Engagement\";s:6:\"result\";s:1:\"4\";}i:2;a:3:{s:8:\"criteria\";i:3;s:13:\"criteria_name\";s:23:\"Cordiality of Personnel\";s:6:\"result\";s:1:\"5\";}i:3;a:3:{s:8:\"criteria\";i:4;s:13:\"criteria_name\";s:23:\"another question sample\";s:6:\"result\";s:1:\"5\";}}','','1746854620',''),
(18,'2','','','a:4:{i:0;a:3:{s:8:\"criteria\";i:1;s:13:\"criteria_name\";s:21:\"Promptness of Service\";s:6:\"result\";s:1:\"5\";}i:1;a:3:{s:8:\"criteria\";i:2;s:13:\"criteria_name\";s:21:\"Quality of Engagement\";s:6:\"result\";s:1:\"5\";}i:2;a:3:{s:8:\"criteria\";i:3;s:13:\"criteria_name\";s:23:\"Cordiality of Personnel\";s:6:\"result\";s:1:\"5\";}i:3;a:3:{s:8:\"criteria\";i:4;s:13:\"criteria_name\";s:23:\"another question sample\";s:6:\"result\";s:1:\"5\";}}','Very Approachable','1746952537','');

/*Table structure for table `survey_questionnaire` */

DROP TABLE IF EXISTS `survey_questionnaire`;

CREATE TABLE `survey_questionnaire` (
  `questionnaire_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) DEFAULT NULL,
  `active_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`questionnaire_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `survey_questionnaire` */

insert  into `survey_questionnaire`(`questionnaire_id`,`question`,`active_status`) values 
(1,'Promptness of Service','ACTIVE'),
(2,'Quality of Engagement','ACTIVE'),
(3,'Cordiality of Personnel','ACTIVE'),
(4,'another question sample','ACTIVE');

/*Table structure for table `user_position` */

DROP TABLE IF EXISTS `user_position`;

CREATE TABLE `user_position` (
  `tblid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `area_id` varchar(100) DEFAULT NULL,
  `active_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `user_position` */

insert  into `user_position`(`tblid`,`user_id`,`position`,`area_id`,`active_status`) values 
(1,'2','CASHIER','37','active'),
(2,'3','CHAIRMAN','63','active');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `surname` varchar(255) NOT NULL,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `verified` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`firstname`,`middlename`,`surname`,`role_id`,`suffix`,`username`,`password`,`img`,`verified`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Frances','Lind','Bins',1,'Jr.','staff','$2y$10$2H.nD4kS2YVOJdIhuzTQROJF9G7rugA/MEuyqOaTs/UT3hxKoo1SW','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(2,'Helen','Schuppe','Rodriguez',1,'I','anderson.stephany@gmail.com','$2y$10$vVi5oAApXZSAnQ.47GDKSOyGQboePBJwssULkmpt4m100YyXOvSU2','file_manager/profile_images/2/profile_image.jpg','2024-02-20',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(3,'Stacey','Graham','Skiles',2,'DVM','process_owner','$2y$10$WdsnkLn6EK5LHqM50ZbVX.i1Uxbsh9Srgrft9qjSTpNgGp2sGLFSK','file_manager/profile_images/3/profile_image.jfif','2024-02-20',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(4,'Annabell','Wisoky','Brekke',2,'III','ekuhn@hotmail.com','$2y$10$LnwIKMmYgoRFtCyvgHGt0.s2erMADLX4vAg/vs25tj3vGWDhvmWI2','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(5,'Foster','Feeney','Lueilwitz',3,'II','internal_auditor','$2y$10$6mTSY1Eo3MX7mrQMgm5Lpelz2gWt1wA4XE6LjoFCsgtRqxe6MlAtG','file_manager/profile_images/5/profile_image.png','2024-02-20',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(6,'Rickey','Rohan','Gulgowski',3,'III','nitzsche.neil@cronin.com','$2y$10$ImlwI63CK.nAuPgqEL2Zj.6pd1E.KKCWQEfcH66Hvm/mrz3hJi62O','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(7,'Leanne','Hessel','Lebsack',4,'Sr.','internal_lead_auditor','$2y$10$Eovvo5Q8EvzBw6586sBw2OZeoZd7HgGaEPoMsn6NR0T3lvLXS9Tpa','file_manager/profile_images/7/profile_image.jpg','2024-02-20',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(8,'Annabell','Boyle','Stracke',4,'Jr.','rubie.swift@hotmail.com','$2y$10$st5il4azbaWSIjNDwOsRb.F6xWDE9ITu.3pnSNL6gj.wXjn/c0JeW','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(9,'Monica','Gaylord','Hilpert',5,'DDS','quality_assurance_director','$2y$10$WdsnkLn6EK5LHqM50ZbVX.i1Uxbsh9Srgrft9qjSTpNgGp2sGLFSK','file_manager/profile_images/9/profile_image.jpg','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(10,'Zetta','Kovacek','Tillman',5,'IV','tkling@gmail.com','$2y$10$.VZEcCvKyvXI6ur5WPSGsOXdEyPX5SFDnJLbdwp6FuyLdoFNrzREm','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(11,'Alivia','Lebsack','Denesik',6,'IV','human_resources','$2y$10$Wjb32sjLUzupQ1a7aqNgMu8vyW9VIf4sdBPzRtXfXjvYHFWxm9h.G','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(12,'Heidi','Skiles','Heller',6,'DDS','weimann.tatum@gmail.com','$2y$10$moWbikAFUl7cmdIswekQUur.FuOIKw.VivRdJzdEY0e3t33Mg8Co2','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(13,'Hollie','Kutch','Hoeger',7,'Jr.','document_control_custodian','$2y$10$WEp9ewUHh3Gyw9BlaPiuIOStmQzZzk19b0FBsQXVu0K6lr0eqRbH.','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(14,'Ally','Okuneva','Frami',7,'Sr.','dstrosin@glover.com','$2y$10$b0d0Wr0j0wiou1uma1HPIOHD7JAors.cUxyr79sDrUl5HrXQOe5QC','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(15,'Ayden','O\'Connell','Balistreri',8,'Sr.','college_management_team','$2y$10$0Q7F0vybBmOeXnItV7vFO.7k33/5v9F.MgAgIIUII9X2jFlH98IJm','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(16,'Myles','Krajcik','Adams',8,'PhD','braeden02@damore.com','$2y$10$n/P8xOO0YGCBQMXnbVZCXO19JdOraFfm6CclH3v3suYmwldkRUZCS','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(21,'BRUNO','','MARS',2,'','bruno_mars2024@yopmail.com','$2y$10$WdsnkLn6EK5LHqM50ZbVX.i1Uxbsh9Srgrft9qjSTpNgGp2sGLFSK','uploads/21.png','2024-11-27',NULL,'2024-11-27 17:04:28','2024-11-27 17:04:28'),
(22,'Baymax','MaxBay','BayBayMaxMax',2,'','baymax2024@yopmail.com','$2y$10$HDPhKB/thxaGWrnX5Sm6b.to3O7poU0Y8hbnaf1T7huIZAyXXmZeC','uploads/22.jpg','2025-01-07',NULL,'2025-01-07 10:34:14','2025-01-07 10:34:14'),
(23,'SECOND INTERNAL','A','AUDITOR',3,'','internal_auditor2@yopmail.com','$2y$10$WdsnkLn6EK5LHqM50ZbVX.i1Uxbsh9Srgrft9qjSTpNgGp2sGLFSK','uploads/23.jpg','2025-01-11',NULL,'2025-01-11 15:07:58','2025-01-11 15:07:58'),
(24,'BINI','','MALOI',2,'','binimaloi@yopmail.com','$2y$10$M32ZbLxz4NGcJnrQrPmhsuhDBZq2bjgwTQL2q56x.4Jy.hN60CgUK','uploads/24.jpg','2025-02-08',NULL,'2025-02-08 20:54:33','2025-02-08 20:54:33'),
(25,'qa1','qa1','qa1',NULL,'','ohapcisad@dnsc.edu.ph','$2y$10$UuCGMFWmu1QH6n7ozh48XOj3jr72xFTfr79SsPhaW7FmTmRkfn1Ty',NULL,NULL,NULL,'2025-04-14 13:25:47','2025-04-14 13:25:47'),
(26,'JOENA MARIE','AGOD','MARTINEZ',4,'','joenamarie.agod@dnsc.edu.ph','$2y$10$i1s1KlZaBV/IdM3fREBAuunG5pPCQqCfzAwhnVWsfHyC1LcYMKki2',NULL,NULL,NULL,'2025-04-14 15:19:21','2025-04-14 15:19:21'),
(29,'awit','','gamer',2,'','awitgamer@yopmail.com','$2y$10$6S5Xiph9KzlUm9iD3ydnNef4AP3VwXzpICB/N./RD/L1uJEcpoL6a','uploads/29.png','2025-04-19',NULL,'2025-04-19 14:07:33','2025-04-19 14:07:33'),
(30,'Leonidas','M','Davinci',3,'','daitignx@gmail.com','$2y$10$H0Vb7HM4YFGyAoYBVjrHaupERYoxJU5IDMtUNy4n/U7ulqu3/NGzS',NULL,'2025-04-23',NULL,'2025-04-23 10:27:31','2025-04-23 10:27:31'),
(31,'SAMPLE','SAM','SAMPLE',2,'','galorio.lyveejean@dnsc.edu.ph','$2y$10$wYtoLFPFbmQsXZmDEEmMLub51Yry.Jujy5M2REFEFptPQ8bzIGiHi',NULL,'2025-04-23',NULL,'2025-04-23 12:32:15','2025-04-23 12:32:15'),
(32,'qwerty','qwerty','qwerty',NULL,'','christianjune26@gmail.com','$2y$10$PI5SLeR3mRTdeS0.Lov72eIgLtkLlSgICqM0yS2hQsyljy4AZLJ/.','uploads/32.jpg','2025-05-06',NULL,'2025-05-06 10:35:45','2025-05-06 10:35:45'),
(33,'Pro','M','Pro',2,'Jr','processowner','$2y$10$e0NRvPTM5YzY5e5g5Fn.UONjF9R2kTDPmR9hAFKFE9FeUq2q0oBfa',NULL,'2025-05-19',NULL,'2025-05-19 11:32:30','2025-05-19 11:32:30'),
(34,'Uhahay','S','Buhay',2,'Jr','daitignprobuild','$2y$10$e0NRvPTM5YzY5e5g5Fn.UONjF9R2kTDPmR9hAFKFE9FeUq2q0oBfa',NULL,'2025-05-19',NULL,'2025-05-19 11:43:32','2025-05-19 11:43:32'),
(35,'Test','Process','Owner',2,NULL,'process.owner@example.com','$2y$10$WZ9Z1TX.zGeLQde6xOPpxOTG7nYyhzrulOpDAjA5NqDqLbD3BB3Uu',NULL,'2025-05-19',NULL,'2025-05-19 11:59:31','2025-05-19 11:59:31');

/*Table structure for table `users_area` */

DROP TABLE IF EXISTS `users_area`;

CREATE TABLE `users_area` (
  `tblid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT NULL,
  `area_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `users_area` */

insert  into `users_area`(`tblid`,`user_id`,`area_id`) values 
(9,'21','11'),
(13,'4','5'),
(14,'4','15'),
(15,'4','28'),
(16,'4','35'),
(17,'4','51'),
(18,'4','58'),
(19,'29','58'),
(20,'13','79'),
(21,'3','2'),
(22,'3','5'),
(23,'3','8'),
(24,'3','77');

/*Table structure for table `utility_settings` */

DROP TABLE IF EXISTS `utility_settings`;

CREATE TABLE `utility_settings` (
  `audit_plan` text DEFAULT NULL,
  `audit_report` text DEFAULT NULL,
  `audit_checklist` text DEFAULT NULL,
  `audit_evaluation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `utility_settings` */

insert  into `utility_settings`(`audit_plan`,`audit_report`,`audit_checklist`,`audit_evaluation`) values 
('a:7:{s:6:\"header\";s:29:\"resources/auditPlanHeader.png\";s:6:\"footer\";s:29:\"resources/auditPlanFooter.png\";s:11:\"form_number\";s:14:\"FM-DNSC-IQA-02\";s:12:\"issue_status\";s:2:\"05\";s:15:\"revision_number\";s:2:\"06\";s:14:\"effective_date\";s:15:\"02 January 2025\";s:11:\"approved_by\";s:9:\"President\";}','a:7:{s:6:\"header\";s:28:\"resources/portraitHeader.png\";s:6:\"footer\";s:27:\"resources/portaitFooter.png\";s:11:\"form_number\";s:14:\"FM-DNSC-IQA-04\";s:12:\"issue_status\";s:2:\"06\";s:15:\"revision_number\";s:2:\"08\";s:14:\"effective_date\";s:15:\"02 January 2025\";s:11:\"approved_by\";s:9:\"President\";}','a:7:{s:6:\"header\";s:28:\"resources/portraitHeader.png\";s:6:\"footer\";s:27:\"resources/portaitFooter.png\";s:11:\"form_number\";s:14:\"FM-DNSC-IQA-03\";s:12:\"issue_status\";s:2:\"05\";s:15:\"revision_number\";s:2:\"05\";s:14:\"effective_date\";s:15:\"02 January 2025\";s:11:\"approved_by\";s:9:\"President\";}','a:7:{s:6:\"header\";s:28:\"resources/portraitHeader.png\";s:6:\"footer\";s:27:\"resources/portaitFooter.png\";s:11:\"form_number\";s:14:\"FM-DNSC-IQA-06\";s:12:\"issue_status\";s:2:\"05\";s:15:\"revision_number\";s:2:\"05\";s:14:\"effective_date\";s:15:\"02 January 2025\";s:11:\"approved_by\";s:9:\"President\";}');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

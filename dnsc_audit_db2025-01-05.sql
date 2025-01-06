/*
SQLyog Community v12.4.0 (64 bit)
MySQL - 8.0.39 : Database - dnsc_audit_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dnsc_audit_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

/*Table structure for table `aps_area` */

DROP TABLE IF EXISTS `aps_area`;

CREATE TABLE `aps_area` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `area_id` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  `aps_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `aps_area` */

insert  into `aps_area`(`tblid`,`area_id`,`audit_plan`,`aps_id`) values 
(1,'2','4','APS28389F7EB85AD'),
(2,'5','4','APS6127A1152426E'),
(3,'15','4','APS5F2244392C904'),
(4,'28','4','APS5F2244392C904'),
(5,'35','4','APS5F2244392C904'),
(6,'51','4','APS5F2244392C904'),
(7,'58','4','APS5F2244392C904'),
(8,'8','4','APS76EF00E0A743D');

/*Table structure for table `aps_position` */

DROP TABLE IF EXISTS `aps_position`;

CREATE TABLE `aps_position` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `position_id` varchar(100) DEFAULT NULL,
  `aps_id` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `aps_position` */

insert  into `aps_position`(`tblid`,`position_id`,`aps_id`,`audit_plan`) values 
(1,'6','APS28389F7EB85AD','4'),
(2,'4','APS6127A1152426E','4'),
(3,'3','APS5F2244392C904','4'),
(4,'5','APS76EF00E0A743D','4');

/*Table structure for table `area_position` */

DROP TABLE IF EXISTS `area_position`;

CREATE TABLE `area_position` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `area_id` varchar(100) DEFAULT NULL,
  `position_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(9,'2','6');

/*Table structure for table `area_process` */

DROP TABLE IF EXISTS `area_process`;

CREATE TABLE `area_process` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `area_id` varchar(100) DEFAULT NULL,
  `process_id` varchar(100) DEFAULT NULL,
  `active_status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(13,'8','5',NULL);

/*Table structure for table `areas` */

DROP TABLE IF EXISTS `areas`;

CREATE TABLE `areas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_area` bigint unsigned DEFAULT NULL,
  `area_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `areas_parent_area_foreign` (`parent_area`),
  CONSTRAINT `areas_parent_area_foreign` FOREIGN KEY (`parent_area`) REFERENCES `areas` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `areas` */

insert  into `areas`(`id`,`parent_area`,`area_name`,`area_description`,`type`,`deleted_at`,`created_at`,`updated_at`) values 
(1,NULL,'Administration','Administration',NULL,NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(2,1,'Library','Library','office',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(3,2,'Library Process','Library Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(4,2,'Same  Process','Library Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(5,1,'Clinic','Clinic','office',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(6,5,'Clinic Process','Clinic Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(7,5,'Same  Process','Clinic Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(8,1,'Registrar','Registrar','office',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(9,8,'Registrar Process','Registrar Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(10,8,'Same  Process','Registrar Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(11,1,'Cashier','Cashier','office',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(12,11,'Cashier Process','Cashier Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(13,11,'Same  Process','Cashier Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(14,NULL,'Academics','Academics',NULL,NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(15,14,'IAAS','IAAS','institute',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
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
(28,14,'IC','IC','institute',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(29,28,'BSIS','BACHELOR OF SCIENCE IN INFORMATION SYSTEMS','program',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(30,29,'BSIS Process','BSIS Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(31,29,'Same  Process','BSIS Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(32,28,'BSIT','BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY','program',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(33,32,'BSIT Process','BSIT Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(34,32,'Same  Process','BSIT Process','process',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(35,14,'ILEGG','ILEGG','institute',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
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
(51,14,'ITED-BACHELOR OF ARTS IN COMMUNICATION (BACOMM)','ITED-BACHELOR OF ARTS IN COMMUNICATION (BACOMM)','institute',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(52,51,'BSeD','BACHELOR OF SECONDARY EDUCATION (BSeD) Major In English, Math, And Sciences','program',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(53,52,'BSeD Process','BSeD Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(54,52,'Same  Process','BSeD Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(55,51,'BTLEd','BACHELOR OF TECHNOLOGY AND LIVELIHOOD EDUCATION','program',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(56,55,'BTLEd Process','BTLEd Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(57,55,'Same  Process','BTLEd Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
(58,14,'IADS-Doctor of Philosophy in Educational Management (PHD EM)','IADS-Doctor Of Philosophy In Educational Management (PHD EM)','institute',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26'),
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
(76,74,'Same  Process','MST MATH Process','process',NULL,'2024-02-20 18:31:26','2024-02-20 18:31:26');

/*Table structure for table `audit_plan_schedule` */

DROP TABLE IF EXISTS `audit_plan_schedule`;

CREATE TABLE `audit_plan_schedule` (
  `aps_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  `from_time` varchar(100) DEFAULT NULL,
  `to_time` varchar(100) DEFAULT NULL,
  `schedule_date` varchar(100) DEFAULT NULL,
  `team_id` varchar(100) DEFAULT NULL,
  `process_id` varchar(100) DEFAULT NULL,
  `audit_clause` text,
  `plan_type` enum('INDIVIDUAL','FIXED') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `audit_plan_schedule` */

insert  into `audit_plan_schedule`(`aps_id`,`audit_plan`,`from_time`,`to_time`,`schedule_date`,`team_id`,`process_id`,`audit_clause`,`plan_type`) values 
('APS28389F7EB85AD','4','08:00','17:00','2025-01-06','AT0477A2AFFB37A','2','ISO awit gamer','INDIVIDUAL'),
('APS6127A1152426E','4','08:00','17:00','2025-01-06','AT0477A2AFFB37A','3','PM-DNSC-CUP; ISO Clauses: 6.1; 6.2; 7.1.1:7.1.2;7.1.6; 7.3; 7.5.2; 8.1; 8.2.1c; 8.7.1;10.2.1; 10.3','INDIVIDUAL'),
('APS5F2244392C904','4','08:00','17:00','2025-01-06','AT0477A2AFFB37A','4','PM-DNSC-SSE; ISO Clauses: 5.1.2c, 7.5.3.1a.8.2.1c. 8.2.3.2a,b; 9.1.1d, 9.1.3','INDIVIDUAL'),
('APS76EF00E0A743D','4','08:00','17:00','2025-01-07','AT0477A2AFFB37A','5','PM-DNSC-RFC; ISO Clauses: 5.2.1,6.5,\r\n7.5.2,8.6,9.1.2','INDIVIDUAL');

/*Table structure for table `audit_plan_team_members` */

DROP TABLE IF EXISTS `audit_plan_team_members`;

CREATE TABLE `audit_plan_team_members` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `team_id` varchar(100) DEFAULT NULL,
  `id` varchar(100) DEFAULT NULL COMMENT 'user_id',
  `role` enum('LEADER','MEMBER') DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  KEY `tblid` (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `audit_plan_team_members` */

insert  into `audit_plan_team_members`(`tblid`,`team_id`,`id`,`role`,`audit_plan`) values 
(4,'AT0477A2AFFB37A','5','LEADER','4'),
(6,'AT0477A2AFFB37A','6','MEMBER','4');

/*Table structure for table `audit_plan_teams` */

DROP TABLE IF EXISTS `audit_plan_teams`;

CREATE TABLE `audit_plan_teams` (
  `team_id` varchar(100) DEFAULT NULL,
  `team_number` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `audit_plan_teams` */

insert  into `audit_plan_teams`(`team_id`,`team_number`,`audit_plan`) values 
('AT0477A2AFFB37A','1','4');

/*Table structure for table `audit_plans` */

DROP TABLE IF EXISTS `audit_plans`;

CREATE TABLE `audit_plans` (
  `audit_plan` int NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `introduction` text,
  `audit_objectives` text,
  `reference_standard` text,
  `audit_methodologies` text,
  `year` int NOT NULL,
  `status` enum('ONGOING','DONE') DEFAULT NULL,
  PRIMARY KEY (`audit_plan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `audit_plans` */

insert  into `audit_plans`(`audit_plan`,`type`,`introduction`,`audit_objectives`,`reference_standard`,`audit_methodologies`,`year`,`status`) values 
(4,'1st Internal Quality Audit','The Davao del Norte State College endeavors to maintain its re-certification to ISO 9001:2015 standard. In this regard, assessment of the processes against the requirements of the ISO 9001:2015 standard by carrying out internal quality audit activities is vital to the implementation, maintenance, and improvement of the established quality management system of the College.','			  <p>These are the objectives</p><ul><li>Evaluate effectiveness</li></ul>\r\n            ','			  ISO 9000; 9.2, 9.1\r\n            ','			  <p>The conduct of the audit activity will follow</p><ul><li>Collection of evidences</li><li>Collection of interview samples</li></ul>\r\n            ',2024,'ONGOING');

/*Table structure for table `otps` */

DROP TABLE IF EXISTS `otps`;

CREATE TABLE `otps` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `code` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `expiration` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

/*Data for the table `otps` */

insert  into `otps`(`id`,`user_id`,`code`,`created`,`expiration`) values 
(3,21,'b685d3d38f111','1732698268','1732698568');

/*Table structure for table `position` */

DROP TABLE IF EXISTS `position`;

CREATE TABLE `position` (
  `position_id` int NOT NULL AUTO_INCREMENT,
  `position_name` varchar(100) DEFAULT NULL,
  `active_status` enum('active','inactive') DEFAULT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `position` */

insert  into `position`(`position_id`,`position_name`,`active_status`) values 
(2,'Cashier','active'),
(3,'Chairman',NULL),
(4,'Clinic Officer',NULL),
(5,'Registrar',NULL),
(6,'Librarian',NULL);

/*Table structure for table `process` */

DROP TABLE IF EXISTS `process`;

CREATE TABLE `process` (
  `process_id` int NOT NULL AUTO_INCREMENT,
  `process_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`process_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `process` */

insert  into `process`(`process_id`,`process_name`) values 
(1,'Same Process'),
(2,'Library Process'),
(3,'Clinic Process'),
(4,'Subject Entry Process'),
(5,'Request for Credentials');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

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

/*Table structure for table `user_position` */

DROP TABLE IF EXISTS `user_position`;

CREATE TABLE `user_position` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `area_id` varchar(100) DEFAULT NULL,
  `active_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user_position` */

insert  into `user_position`(`tblid`,`user_id`,`position`,`area_id`,`active_status`) values 
(1,'2','CASHIER','37','active'),
(2,'3','CHAIRMAN','63','active');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `surname` varchar(255) NOT NULL,
  `role_id` bigint unsigned DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `verified` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

/*Data for the table `users` */

insert  into `users`(`id`,`firstname`,`middlename`,`surname`,`role_id`,`suffix`,`username`,`password`,`img`,`verified`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Frances','Lind','Bins',1,'Jr.','staff','$2y$10$2H.nD4kS2YVOJdIhuzTQROJF9G7rugA/MEuyqOaTs/UT3hxKoo1SW','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(2,'Helen','Schuppe','Rodriguez',1,'I','anderson.stephany@gmail.com','$2y$10$vVi5oAApXZSAnQ.47GDKSOyGQboePBJwssULkmpt4m100YyXOvSU2','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(3,'Stacey','Graham','Skiles',2,'DVM','process_owner','$2y$10$WdsnkLn6EK5LHqM50ZbVX.i1Uxbsh9Srgrft9qjSTpNgGp2sGLFSK','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(4,'Annabell','Wisoky','Brekke',2,'III','ekuhn@hotmail.com','$2y$10$LnwIKMmYgoRFtCyvgHGt0.s2erMADLX4vAg/vs25tj3vGWDhvmWI2','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(5,'Foster','Feeney','Lueilwitz',3,'II','internal_auditor','$2y$10$6mTSY1Eo3MX7mrQMgm5Lpelz2gWt1wA4XE6LjoFCsgtRqxe6MlAtG','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(6,'Rickey','Rohan','Gulgowski',3,'III','nitzsche.neil@cronin.com','$2y$10$ImlwI63CK.nAuPgqEL2Zj.6pd1E.KKCWQEfcH66Hvm/mrz3hJi62O','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(7,'Leanne','Hessel','Lebsack',4,'Sr.','internal_lead_auditor','$2y$10$Eovvo5Q8EvzBw6586sBw2OZeoZd7HgGaEPoMsn6NR0T3lvLXS9Tpa','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:24','2024-02-20 18:31:24'),
(8,'Annabell','Boyle','Stracke',4,'Jr.','rubie.swift@hotmail.com','$2y$10$st5il4azbaWSIjNDwOsRb.F6xWDE9ITu.3pnSNL6gj.wXjn/c0JeW','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(9,'Monica','Gaylord','Hilpert',5,'DDS','quality_assurance_director','$2y$10$gUaunW61l57gfV5iN3R6fuV/g/nyPSsLvs/DGjAD4SjLGrYQIb67m','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(10,'Zetta','Kovacek','Tillman',5,'IV','tkling@gmail.com','$2y$10$.VZEcCvKyvXI6ur5WPSGsOXdEyPX5SFDnJLbdwp6FuyLdoFNrzREm','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(11,'Alivia','Lebsack','Denesik',6,'IV','human_resources','$2y$10$Wjb32sjLUzupQ1a7aqNgMu8vyW9VIf4sdBPzRtXfXjvYHFWxm9h.G','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(12,'Heidi','Skiles','Heller',6,'DDS','weimann.tatum@gmail.com','$2y$10$moWbikAFUl7cmdIswekQUur.FuOIKw.VivRdJzdEY0e3t33Mg8Co2','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(13,'Hollie','Kutch','Hoeger',7,'Jr.','document_control_custodian','$2y$10$WEp9ewUHh3Gyw9BlaPiuIOStmQzZzk19b0FBsQXVu0K6lr0eqRbH.','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(14,'Ally','Okuneva','Frami',7,'Sr.','dstrosin@glover.com','$2y$10$b0d0Wr0j0wiou1uma1HPIOHD7JAors.cUxyr79sDrUl5HrXQOe5QC','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(15,'Ayden','O\'Connell','Balistreri',8,'Sr.','college_management_team','$2y$10$0Q7F0vybBmOeXnItV7vFO.7k33/5v9F.MgAgIIUII9X2jFlH98IJm','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(16,'Myles','Krajcik','Adams',8,'PhD','braeden02@damore.com','$2y$10$n/P8xOO0YGCBQMXnbVZCXO19JdOraFfm6CclH3v3suYmwldkRUZCS','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(21,'BRUNO','','MARS',NULL,'','bruno_mars2024@yopmail.com','$2y$10$gUaunW61l57gfV5iN3R6fuV/g/nyPSsLvs/DGjAD4SjLGrYQIb67m','uploads/21.png','2024-11-27',NULL,'2024-11-27 17:04:28','2024-11-27 17:04:28');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

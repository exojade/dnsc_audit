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
/*Table structure for table `announcements` */

DROP TABLE IF EXISTS `announcements`;

CREATE TABLE `announcements` (
  `announcement_id` int NOT NULL AUTO_INCREMENT,
  `announcement` text,
  `sender` varchar(100) DEFAULT NULL,
  `timestamp` int DEFAULT NULL,
  KEY `announcement_id` (`announcement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `announcements` */

insert  into `announcements`(`announcement_id`,`announcement`,`sender`,`timestamp`) values 
(2,'<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>','9',1739072780),
(3,'<h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">The standard Lorem Ipsum passage, used since the 1500s</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p>','9',1739072970);

/*Table structure for table `aps_area` */

DROP TABLE IF EXISTS `aps_area`;

CREATE TABLE `aps_area` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `area_id` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  `aps_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `aps_area` */

insert  into `aps_area`(`tblid`,`area_id`,`audit_plan`,`aps_id`) values 
(1,'2','4','APS28389F7EB85AD'),
(2,'5','4','APS6127A1152426E'),
(3,'15','4','APS5F2244392C904'),
(4,'28','4','APS5F2244392C904'),
(5,'35','4','APS5F2244392C904'),
(6,'51','4','APS5F2244392C904'),
(7,'58','4','APS5F2244392C904'),
(8,'8','4','APS76EF00E0A743D'),
(9,'8','5','APS53B5792BDF1C0'),
(10,'15','5','APS0708BD4DC9EE9'),
(11,'28','5','APS0708BD4DC9EE9'),
(12,'35','5','APS0708BD4DC9EE9'),
(13,'51','5','APS0708BD4DC9EE9'),
(14,'58','5','APS0708BD4DC9EE9'),
(15,'2','5','APSACD2E3B466E15'),
(16,'8','4','APS47D769DC1F02A'),
(17,'8','4','APS161424739DC4C'),
(31,'2','5','APS5FFAE7AC1804A'),
(32,'5','5','APS5FFAE7AC1804A'),
(33,'8','5','APS5FFAE7AC1804A'),
(34,'11','5','APS5FFAE7AC1804A');

/*Table structure for table `aps_position` */

DROP TABLE IF EXISTS `aps_position`;

CREATE TABLE `aps_position` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `position_id` varchar(100) DEFAULT NULL,
  `aps_id` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `aps_position` */

insert  into `aps_position`(`tblid`,`position_id`,`aps_id`,`audit_plan`) values 
(1,'6','APS28389F7EB85AD','4'),
(2,'4','APS6127A1152426E','4'),
(3,'3','APS5F2244392C904','4'),
(4,'5','APS76EF00E0A743D','4'),
(5,'5','APS53B5792BDF1C0','5'),
(6,'3','APS0708BD4DC9EE9','5'),
(7,'6','APSACD2E3B466E15','5'),
(8,'5','APS47D769DC1F02A','4'),
(9,'5','APS161424739DC4C','4'),
(23,'2','APS5FFAE7AC1804A','5'),
(24,'4','APS5FFAE7AC1804A','5'),
(25,'5','APS5FFAE7AC1804A','5'),
(26,'6','APS5FFAE7AC1804A','5');

/*Table structure for table `area_position` */

DROP TABLE IF EXISTS `area_position`;

CREATE TABLE `area_position` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `area_id` varchar(100) DEFAULT NULL,
  `position_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

/*Table structure for table `audit_checklist` */

DROP TABLE IF EXISTS `audit_checklist`;

CREATE TABLE `audit_checklist` (
  `audit_checklist_id` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  `aps_id` varchar(100) DEFAULT NULL,
  `aps_area` varchar(100) DEFAULT NULL,
  `audit_trail` text,
  `comply` enum('YES','NO') DEFAULT NULL,
  `remarks` text,
  `timestamp` int DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `reviewed_by` varchar(100) DEFAULT NULL,
  `audit_checklist_status` enum('PENDING','DONE') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'PENDING',
  `review_comments` text,
  `review_timestamp` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `audit_checklist` */

/*Table structure for table `audit_evaluation` */

DROP TABLE IF EXISTS `audit_evaluation`;

CREATE TABLE `audit_evaluation` (
  `audit_evaluation_id` varchar(100) DEFAULT NULL,
  `timestamp` int DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `audit_report_id` varchar(100) DEFAULT NULL,
  `audit_evaluation_status` enum('PENDING','DONE') DEFAULT NULL,
  `aps_area_id` varchar(100) DEFAULT NULL,
  `evaluation_details` text,
  `noted_by` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `audit_evaluation` */

/*Table structure for table `audit_plan_remarks` */

DROP TABLE IF EXISTS `audit_plan_remarks`;

CREATE TABLE `audit_plan_remarks` (
  `audit_plan` varchar(100) DEFAULT NULL,
  `remarks` text,
  `date_created` int DEFAULT NULL,
  `remarks_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `audit_plan_remarks` */

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
  `audit_clause` text,
  `plan_type` enum('INDIVIDUAL','FIXED') DEFAULT NULL,
  `fixed_title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `audit_plan_schedule` */

/*Table structure for table `audit_plan_team_members` */

DROP TABLE IF EXISTS `audit_plan_team_members`;

CREATE TABLE `audit_plan_team_members` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `team_id` varchar(100) DEFAULT NULL,
  `id` varchar(100) DEFAULT NULL COMMENT 'user_id',
  `role` enum('LEADER','MEMBER') DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  KEY `tblid` (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `audit_plan_team_members` */

/*Table structure for table `audit_plan_teams` */

DROP TABLE IF EXISTS `audit_plan_teams`;

CREATE TABLE `audit_plan_teams` (
  `team_id` varchar(100) DEFAULT NULL,
  `team_number` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `audit_plan_teams` */

/*Table structure for table `audit_plans` */

DROP TABLE IF EXISTS `audit_plans`;

CREATE TABLE `audit_plans` (
  `audit_plan` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `introduction` text,
  `audit_objectives` text,
  `reference_standard` text,
  `audit_methodologies` text,
  `year` int NOT NULL,
  `status` enum('ONGOING','DONE','FOR REVIEW','SUBMITTED','QAD-APPROVED','QAD-NOT APPROVED','CMT-APPROVED','CMT-UNAPPROVED') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `cons_audit_report_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `timestamp` int DEFAULT NULL,
  `cmt_status` enum('APPROVED','NOT APPROVED') DEFAULT NULL,
  `qad_status` enum('APPROVED','NOT APPROVED') DEFAULT NULL,
  PRIMARY KEY (`audit_plan`),
  UNIQUE KEY `unique_type_year` (`type`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `audit_plans` */

insert  into `audit_plans`(`audit_plan`,`type`,`introduction`,`audit_objectives`,`reference_standard`,`audit_methodologies`,`year`,`status`,`created_by`,`cons_audit_report_id`,`timestamp`,`cmt_status`,`qad_status`) values 
('AP-2025-1IQA','1st Internal Quality Audit','            ','            ','            ','            ',2025,'SUBMITTED','7',NULL,1742738619,NULL,NULL);

/*Table structure for table `audit_report` */

DROP TABLE IF EXISTS `audit_report`;

CREATE TABLE `audit_report` (
  `audit_report_id` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  `aps_id` varchar(100) DEFAULT NULL,
  `aps_area` varchar(100) DEFAULT NULL,
  `timestamp` int DEFAULT NULL,
  `effectiveness_process` longtext,
  `car_status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `ofi_improvement` text,
  `ofi_nonconformance` text,
  `car_details` text,
  `audit_report_status` enum('PENDING','DONE') DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `audit_evaluation_id` varchar(100) DEFAULT NULL,
  `comments` text,
  `reviewed_by` varchar(100) DEFAULT NULL,
  `review_comments` text,
  `review_timestamp` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `audit_report` */

/*Table structure for table `consolidated_audit_report` */

DROP TABLE IF EXISTS `consolidated_audit_report`;

CREATE TABLE `consolidated_audit_report` (
  `cons_audit_report_id` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `timestamp` varchar(100) DEFAULT NULL,
  `fileUrl` text,
  `report_status` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `consolidated_audit_report` */

/*Table structure for table `evaluation_questions` */

DROP TABLE IF EXISTS `evaluation_questions`;

CREATE TABLE `evaluation_questions` (
  `question_title` varchar(100) DEFAULT NULL,
  `question_desc` text,
  `question_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `message_id` int NOT NULL AUTO_INCREMENT,
  `message` text,
  `timestamp` int DEFAULT NULL,
  `send_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(34,'gapatakaaaa',1739091137,'9'),
(35,'raka',1739091140,'9'),
(36,'awa ra lagi ka ui',1739091144,'9'),
(37,'aw',1739091158,'9'),
(38,'asdasda',1739091171,'9'),
(39,'asdasd',1739091179,'9'),
(40,'dayon?',1739091253,'9'),
(41,'pataka ra ka choy',1739091257,'9'),
(42,'bogo',1739091351,'1'),
(43,'ka',1739091379,'9'),
(44,'bibi',1739100899,'9'),
(45,'paita',1739100907,'9'),
(46,'pagpuyo',1739103589,'9'),
(47,'@helen Schippe',1739103619,'1'),
(48,'ina moka \'awit',1739103626,'1'),
(49,'gg',1739108704,'9'),
(50,'sample last message',1739108711,'9'),
(51,'send send daw ko',1739108750,'2'),
(52,'hay ambot',1739110085,'2');

/*Table structure for table `notification` */

DROP TABLE IF EXISTS `notification`;

CREATE TABLE `notification` (
  `notification_id` int NOT NULL AUTO_INCREMENT,
  `receiver_id` varchar(100) DEFAULT NULL,
  `message` text,
  `created` int DEFAULT NULL,
  `read_at` int DEFAULT NULL,
  `sender_id` varchar(100) DEFAULT NULL,
  KEY `notification_id` (`notification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `notification` */

insert  into `notification`(`notification_id`,`receiver_id`,`message`,`created`,`read_at`,`sender_id`) values 
(57,'1','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1742702152,NULL,''),
(58,'2','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1742702152,NULL,''),
(59,'9','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1742702152,NULL,''),
(60,'10','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1742702152,NULL,''),
(61,'11','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1742702152,NULL,''),
(62,'12','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1742702152,NULL,''),
(63,'9','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP-2025-1IQA\";}',1742738818,1742738849,'7'),
(64,'10','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP-2025-1IQA\";}',1742738818,NULL,'7');

/*Table structure for table `office` */

DROP TABLE IF EXISTS `office`;

CREATE TABLE `office` (
  `office_id` int NOT NULL AUTO_INCREMENT,
  `office_name` varchar(100) DEFAULT NULL,
  `active_status` varchar(100) DEFAULT NULL,
  `parent_id` varchar(100) DEFAULT NULL,
  KEY `office_id` (`office_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `office` */

insert  into `office`(`office_id`,`office_name`,`active_status`,`parent_id`) values 
(1,'College Library','ACTIVE','0'),
(2,'Clinic','ACTIVE','0');

/*Table structure for table `otps` */

DROP TABLE IF EXISTS `otps`;

CREATE TABLE `otps` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `code` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `expiration` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

/*Data for the table `otps` */

insert  into `otps`(`id`,`user_id`,`code`,`created`,`expiration`) values 
(3,21,'b685d3d38f111','1732698268','1732698568'),
(4,22,'e63f2dcc45624','1736217254','1736217554'),
(5,23,'3cad2d40d3c2c','1736579278','1736579578'),
(6,24,'61608ec6ea0d8','1739019273','1739019573');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

/*Table structure for table `survey` */

DROP TABLE IF EXISTS `survey`;

CREATE TABLE `survey` (
  `survey_id` int NOT NULL AUTO_INCREMENT,
  `office_id` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `survey_result` text,
  `remarks` text,
  `timestamp` varchar(100) DEFAULT NULL,
  `contact_number` varchar(100) DEFAULT NULL,
  KEY `survey_id` (`survey_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `survey` */

insert  into `survey`(`survey_id`,`office_id`,`name`,`email_address`,`survey_result`,`remarks`,`timestamp`,`contact_number`) values 
(7,'1','','','a:3:{i:0;a:3:{s:8:\"criteria\";i:1;s:13:\"criteria_name\";s:21:\"Promptness of Service\";s:6:\"result\";s:1:\"1\";}i:1;a:3:{s:8:\"criteria\";i:2;s:13:\"criteria_name\";s:21:\"Quality of Engagement\";s:6:\"result\";s:1:\"2\";}i:2;a:3:{s:8:\"criteria\";i:3;s:13:\"criteria_name\";s:23:\"Cordiality of Personnel\";s:6:\"result\";s:1:\"5\";}}','di maayong serbisyo bai','1737265699',''),
(8,'2','','','a:3:{i:0;a:3:{s:8:\"criteria\";i:1;s:13:\"criteria_name\";s:21:\"Promptness of Service\";s:6:\"result\";s:1:\"4\";}i:1;a:3:{s:8:\"criteria\";i:2;s:13:\"criteria_name\";s:21:\"Quality of Engagement\";s:6:\"result\";s:1:\"5\";}i:2;a:3:{s:8:\"criteria\";i:3;s:13:\"criteria_name\";s:23:\"Cordiality of Personnel\";s:6:\"result\";s:1:\"4\";}}','naay gamay problema sa serbisyong gihatag','1737269592',''),
(9,'2','','','a:4:{i:0;a:3:{s:8:\"criteria\";i:1;s:13:\"criteria_name\";s:21:\"Promptness of Service\";s:6:\"result\";s:1:\"1\";}i:1;a:3:{s:8:\"criteria\";i:2;s:13:\"criteria_name\";s:21:\"Quality of Engagement\";s:6:\"result\";s:1:\"2\";}i:2;a:3:{s:8:\"criteria\";i:3;s:13:\"criteria_name\";s:23:\"Cordiality of Personnel\";s:6:\"result\";s:1:\"4\";}i:3;a:3:{s:8:\"criteria\";i:4;s:13:\"criteria_name\";s:23:\"another question sample\";s:6:\"result\";s:1:\"5\";}}','dasdasdasd','1742702152','');

/*Table structure for table `survey_questionnaire` */

DROP TABLE IF EXISTS `survey_questionnaire`;

CREATE TABLE `survey_questionnaire` (
  `questionnaire_id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(100) DEFAULT NULL,
  `active_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`questionnaire_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `survey_questionnaire` */

insert  into `survey_questionnaire`(`questionnaire_id`,`question`,`active_status`) values 
(1,'Promptness of Service','ACTIVE'),
(2,'Quality of Engagement','ACTIVE'),
(3,'Cordiality of Personnel','ACTIVE'),
(4,'another question sample','ACTIVE');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;

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
(9,'Monica','Gaylord','Hilpert',5,'DDS','quality_assurance_director','$2y$10$gUaunW61l57gfV5iN3R6fuV/g/nyPSsLvs/DGjAD4SjLGrYQIb67m','file_manager/profile_images/9/profile_image.jpg','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(10,'Zetta','Kovacek','Tillman',5,'IV','tkling@gmail.com','$2y$10$.VZEcCvKyvXI6ur5WPSGsOXdEyPX5SFDnJLbdwp6FuyLdoFNrzREm','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(11,'Alivia','Lebsack','Denesik',6,'IV','human_resources','$2y$10$Wjb32sjLUzupQ1a7aqNgMu8vyW9VIf4sdBPzRtXfXjvYHFWxm9h.G','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(12,'Heidi','Skiles','Heller',6,'DDS','weimann.tatum@gmail.com','$2y$10$moWbikAFUl7cmdIswekQUur.FuOIKw.VivRdJzdEY0e3t33Mg8Co2','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(13,'Hollie','Kutch','Hoeger',7,'Jr.','document_control_custodian','$2y$10$WEp9ewUHh3Gyw9BlaPiuIOStmQzZzk19b0FBsQXVu0K6lr0eqRbH.','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(14,'Ally','Okuneva','Frami',7,'Sr.','dstrosin@glover.com','$2y$10$b0d0Wr0j0wiou1uma1HPIOHD7JAors.cUxyr79sDrUl5HrXQOe5QC','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(15,'Ayden','O\'Connell','Balistreri',8,'Sr.','college_management_team','$2y$10$0Q7F0vybBmOeXnItV7vFO.7k33/5v9F.MgAgIIUII9X2jFlH98IJm','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(16,'Myles','Krajcik','Adams',8,'PhD','braeden02@damore.com','$2y$10$n/P8xOO0YGCBQMXnbVZCXO19JdOraFfm6CclH3v3suYmwldkRUZCS','hecker.png','2024-02-20',NULL,'2024-02-20 18:31:25','2024-02-20 18:31:25'),
(21,'BRUNO','','MARS',2,'','bruno_mars2024@yopmail.com','$2y$10$gUaunW61l57gfV5iN3R6fuV/g/nyPSsLvs/DGjAD4SjLGrYQIb67m','uploads/21.png','2024-11-27',NULL,'2024-11-27 17:04:28','2024-11-27 17:04:28'),
(22,'Baymax','MaxBay','BayBayMaxMax',2,'','baymax2024@yopmail.com','$2y$10$HDPhKB/thxaGWrnX5Sm6b.to3O7poU0Y8hbnaf1T7huIZAyXXmZeC','uploads/22.jpg','2025-01-07',NULL,'2025-01-07 10:34:14','2025-01-07 10:34:14'),
(23,'SECOND INTERNAL','A','AUDITOR',3,'','internal_auditor2@yopmail.com','$2y$10$WdsnkLn6EK5LHqM50ZbVX.i1Uxbsh9Srgrft9qjSTpNgGp2sGLFSK','uploads/23.jpg','2025-01-11',NULL,'2025-01-11 15:07:58','2025-01-11 15:07:58'),
(24,'BINI','','MALOI',NULL,'','binimaloi@yopmail.com','$2y$10$M32ZbLxz4NGcJnrQrPmhsuhDBZq2bjgwTQL2q56x.4Jy.hN60CgUK','uploads/24.jpg','2025-02-08',NULL,'2025-02-08 20:54:33','2025-02-08 20:54:33');

/*Table structure for table `users_area` */

DROP TABLE IF EXISTS `users_area`;

CREATE TABLE `users_area` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT NULL,
  `area_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `users_area` */

insert  into `users_area`(`tblid`,`user_id`,`area_id`) values 
(1,'3','2'),
(2,'3','5'),
(3,'3','8'),
(4,'4','15'),
(5,'4','28'),
(6,'4','35'),
(7,'4','51'),
(8,'4','58'),
(9,'21','11');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

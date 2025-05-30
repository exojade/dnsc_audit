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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `announcements` */

insert  into `announcements`(`announcement_id`,`announcement`,`sender`,`timestamp`) values 
(2,'<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>','9',1739072780),
(3,'<h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">The standard Lorem Ipsum passage, used since the 1500s</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p>','9',1739072970),
(4,'<p>asdasdasdasd</p>','9',1743471683);

/*Table structure for table `aps_area` */

DROP TABLE IF EXISTS `aps_area`;

CREATE TABLE `aps_area` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `area_id` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  `aps_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `aps_area` */

insert  into `aps_area`(`tblid`,`area_id`,`audit_plan`,`aps_id`) values 
(60,'2','AP2025-01-01','APS6EA4AC3B198EA'),
(61,'5','AP2025-01-01','APS6EA4AC3B198EA'),
(62,'8','AP2025-01-01','APS6EA4AC3B198EA'),
(63,'11','AP2025-01-01','APS6EA4AC3B198EA'),
(64,'2','AP2025-01-01','APSDCCF8EAA3ECBE'),
(65,'8','AP2025-01-01','APS245A92B4920F5');

/*Table structure for table `aps_position` */

DROP TABLE IF EXISTS `aps_position`;

CREATE TABLE `aps_position` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `position_id` varchar(100) DEFAULT NULL,
  `aps_id` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `aps_position` */

insert  into `aps_position`(`tblid`,`position_id`,`aps_id`,`audit_plan`) values 
(48,'2','APS6EA4AC3B198EA','AP2025-01-01'),
(49,'4','APS6EA4AC3B198EA','AP2025-01-01'),
(50,'5','APS6EA4AC3B198EA','AP2025-01-01'),
(51,'6','APS6EA4AC3B198EA','AP2025-01-01'),
(52,'6','APSDCCF8EAA3ECBE','AP2025-01-01'),
(53,'5','APS245A92B4920F5','AP2025-01-01');

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
  `audit_checklist_status` enum('PENDING','DONE','FOR REVIEW') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'PENDING',
  `review_comments` text,
  `review_timestamp` varchar(100) DEFAULT NULL,
  `checklist_type` enum('FILLED','UNFILLED') DEFAULT NULL,
  `audit_trail_array` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `audit_checklist` */

insert  into `audit_checklist`(`audit_checklist_id`,`audit_plan`,`aps_id`,`aps_area`,`audit_trail`,`comply`,`remarks`,`timestamp`,`user_id`,`reviewed_by`,`audit_checklist_status`,`review_comments`,`review_timestamp`,`checklist_type`,`audit_trail_array`) values 
('AC-2025-01-01-1','AP2025-01-01','APS6EA4AC3B198EA','11',NULL,NULL,NULL,1743501640,'5','7','DONE','hays ambot ani oiiiiiiiiii','1743501819','UNFILLED','a:2:{i:0;a:3:{s:6:\"clause\";s:15:\"Sample Clause 1\";s:5:\"trail\";s:26:\"ambopt unsay ibutang diri.\";s:6:\"comply\";s:3:\"YES\";}i:1;a:3:{s:6:\"clause\";s:15:\"Sample Clause 2\";s:5:\"trail\";s:12:\"HAAAYS AMBOT\";s:6:\"comply\";s:3:\"YES\";}}');

/*Table structure for table `audit_checklist_remarks` */

DROP TABLE IF EXISTS `audit_checklist_remarks`;

CREATE TABLE `audit_checklist_remarks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `remarks` enum('YES','NO') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_created` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `status` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `audit_checklist_remarks` */

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

insert  into `audit_evaluation`(`audit_evaluation_id`,`timestamp`,`user_id`,`audit_report_id`,`audit_evaluation_status`,`aps_area_id`,`evaluation_details`,`noted_by`,`audit_plan`,`comments`) values 
('AE-2025-01-01-1',1743502633,'21','AR-2025-01-01-1','DONE','63','a:5:{i:0;a:4:{s:14:\"question_title\";s:15:\"Ethical Conduct\";s:13:\"question_desc\";s:48:\"able to be diplomatic, open-minded and assertive\";s:11:\"question_id\";i:1;s:4:\"rate\";s:1:\"1\";}i:1;a:4:{s:14:\"question_title\";s:17:\"Fair Presentation\";s:13:\"question_desc\";s:19:\"absolutely unbiased\";s:11:\"question_id\";i:2;s:4:\"rate\";s:1:\"2\";}i:2;a:4:{s:14:\"question_title\";s:21:\"Due Professional Care\";s:13:\"question_desc\";s:91:\"diligence which a person, who possesses a special skill, under a given set of circumstances\";s:11:\"question_id\";i:3;s:4:\"rate\";s:1:\"3\";}i:3;a:4:{s:14:\"question_title\";s:12:\"Independence\";s:13:\"question_desc\";s:58:\"able to deliver questions and report directly and honestly\";s:11:\"question_id\";i:4;s:4:\"rate\";s:1:\"3\";}i:4;a:4:{s:14:\"question_title\";s:23:\"Evidence-based approach\";s:13:\"question_desc\";s:121:\"approach to auditing wherein internal auditors make use of objective evidence in verifying effectiveness of the processes\";s:11:\"question_id\";i:5;s:4:\"rate\";s:1:\"4\";}}','7','AP2025-01-01','char naa pay evaluation HAHJAHAHAHA LOKO');

/*Table structure for table `audit_plan_remarks` */

DROP TABLE IF EXISTS `audit_plan_remarks`;

CREATE TABLE `audit_plan_remarks` (
  `audit_plan` varchar(100) DEFAULT NULL,
  `remarks` text,
  `date_created` int DEFAULT NULL,
  `remarks_by` varchar(100) DEFAULT NULL,
  `audit_plan_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `audit_plan_remarks` */

insert  into `audit_plan_remarks`(`audit_plan`,`remarks`,`date_created`,`remarks_by`,`audit_plan_status`) values 
('AP2025-01-01','Okay naning yawa ni',1743500410,'9','QAD-APPROVED'),
('AP2025-01-01','TAAS KAAYONG PROSESO. HAHAHA PWEDE RAMN UNTA BACKDOOR APPROVAL',1743500441,'15',NULL);

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

insert  into `audit_plan_schedule`(`aps_id`,`audit_plan`,`from_time`,`to_time`,`schedule_date`,`team_id`,`process_id`,`audit_clause`,`plan_type`,`fixed_title`) values 
('APS6EA4AC3B198EA','AP2025-01-01','9:00 AM','5:00 PM','2025-04-07','AT925D72770E2BF','1','ambot unsa na Criteria Clause','INDIVIDUAL',NULL),
('APS28498EC956AB6','AP2025-01-01','08:00','09:00','2025-04-07',NULL,NULL,NULL,'FIXED','Opening Meeting'),
('APSDCCF8EAA3ECBE','AP2025-01-01','09:00','17:00','2025-04-07','AT925D72770E2BF','2','Para sa Lib na Clause','INDIVIDUAL',NULL),
('APS245A92B4920F5','AP2025-01-01','09:00','17:00','2025-04-07','ATF0400732BE05A','5','Ambotyasdasdasd','INDIVIDUAL',NULL),
('APSCE4C0143F43D5','AP2025-01-01','08:00','17:00','2025-04-08',NULL,NULL,NULL,'FIXED','Continuation of Audit');

/*Table structure for table `audit_plan_team_members` */

DROP TABLE IF EXISTS `audit_plan_team_members`;

CREATE TABLE `audit_plan_team_members` (
  `tblid` int NOT NULL AUTO_INCREMENT,
  `team_id` varchar(100) DEFAULT NULL,
  `id` varchar(100) DEFAULT NULL COMMENT 'user_id',
  `role` enum('LEADER','MEMBER') DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL,
  KEY `tblid` (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

/*Data for the table `audit_plan_team_members` */

insert  into `audit_plan_team_members`(`tblid`,`team_id`,`id`,`role`,`audit_plan`) values 
(42,'AT925D72770E2BF','5','LEADER','AP2025-01-01'),
(43,'AT925D72770E2BF','6','MEMBER','AP2025-01-01'),
(44,'AT925D72770E2BF','23','MEMBER','AP2025-01-01'),
(45,'ATF0400732BE05A','6','LEADER','AP2025-01-01'),
(46,'ATF0400732BE05A','23','MEMBER','AP2025-01-01');

/*Table structure for table `audit_plan_teams` */

DROP TABLE IF EXISTS `audit_plan_teams`;

CREATE TABLE `audit_plan_teams` (
  `team_id` varchar(100) DEFAULT NULL,
  `team_number` varchar(100) DEFAULT NULL,
  `audit_plan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `audit_plan_teams` */

insert  into `audit_plan_teams`(`team_id`,`team_number`,`audit_plan`) values 
('AT925D72770E2BF','1','AP2025-01-01'),
('ATF0400732BE05A','2','AP2025-01-01');

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
  `qad_approved` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cmt_approved` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`audit_plan`),
  UNIQUE KEY `unique_type_year` (`type`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `audit_plans` */

insert  into `audit_plans`(`audit_plan`,`type`,`introduction`,`audit_objectives`,`reference_standard`,`audit_methodologies`,`year`,`status`,`created_by`,`cons_audit_report_id`,`timestamp`,`qad_approved`,`cmt_approved`) values 
('AP2025-01-01','1st Internal Quality Audit','			  			  <p data-pm-slice=\"1 1 []\">The 1st Internal Quality Audit for the year 2025 aims to assess the effectiveness, efficiency, and compliance of the organizations quality management system (QMS) with established standards and procedures. This audit will help identify areas for improvement and ensure continuous enhancement of operational processes.</p>            \r\n            \r\n            ','			  <p></p><p></p><ul></ul><p></p><ul><li><span style=\"font-size: 1rem;\">To evaluate the conformity of processes with the established quality management system.</span></li><li><span style=\"font-size: 1rem;\">To ensure compliance with relevant standards, policies, and regulatory requirements</span></li><li><span style=\"font-size: 1rem;\">To identify areas for process improvement and recommend corrective actions.</span></li><li>To verify the effectiveness of corrective and preventive measures from previous audits.</li></ul>\r\n            ','<ul><li><span style=\"font-size: 1rem;\">Organizational Policies and Standard Operating Procedures (SOPs)</span></li><li><span style=\"font-size: 1rem;\">Applicable regulatory and statutory requirements</span></li><li><span style=\"font-size: 1rem;\">ISO 9001:2015 – Quality Management System Requirements</span></li></ul>			  			  \r\n            \r\n            ','<p></p><p><ul></ul></p><ul><li><strong>Document Review:</strong> Examination of policies, procedures, records, and reports to assess compliance.</li><li><strong style=\"font-size: 1rem;\">Interviews:</strong><span style=\"font-size: 1rem;\"> Discussions with key personnel to evaluate understanding and implementation of processes.</span></li><li><strong style=\"font-size: 1rem;\">Process Observation:</strong><span style=\"font-size: 1rem;\"> Direct observation of operations to verify adherence to standard procedures.</span></li><li><strong style=\"font-size: 1rem;\">Sampling and Testing:</strong><span style=\"font-size: 1rem;\"> Reviewing selected records and conducting tests to validate performance and compliance.</span></li><li><strong style=\"font-size: 1rem;\">Non-Conformance Analysis:</strong><span style=\"font-size: 1rem;\"> Identifying and documenting any deviations from the established standards.</span></li></ul>			  			  \r\n            \r\n            ',2025,'ONGOING','7','CONSAR-2025-01-01-3',1743499791,'9','15');

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

insert  into `audit_report`(`audit_report_id`,`audit_plan`,`aps_id`,`aps_area`,`timestamp`,`effectiveness_process`,`car_status`,`ofi_improvement`,`ofi_nonconformance`,`car_details`,`audit_report_status`,`user_id`,`audit_evaluation_id`,`comments`,`reviewed_by`,`review_comments`,`review_timestamp`) values 
('AR-2025-01-01-1','AP2025-01-01','APS6EA4AC3B198EA','11',1743501009,'a:5:{i:1;a:4:{s:6:\"number\";i:1;s:8:\"question\";s:75:\"Are the procedure steps accurate and complete as compared to true practice?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:0:\"\";}i:2;a:4:{s:6:\"number\";i:2;s:8:\"question\";s:178:\"Are there sufficient check steps (inspections, tests, reviews, approvals, sign-offs, etc.) that ensure the process outputs meet requirements before passing onto the next process?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:0:\"\";}i:3;a:4:{s:6:\"number\";i:3;s:8:\"question\";s:94:\"Does the process appear to adequately meet the requirements of ISO 9001 and its documentation?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:0:\"\";}i:4;a:4:{s:6:\"number\";i:4;s:8:\"question\";s:83:\"Does the process appear to adequately meet all customer or regulatory requirements?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:0:\"\";}i:5;a:4:{s:6:\"number\";i:5;s:8:\"question\";s:68:\"Are the quality objectives or targets identified in the process met?\";s:4:\"rate\";s:3:\"Yes\";s:7:\"comment\";s:0:\"\";}}','ACTIVE','','','a:1:{i:0;a:3:{s:16:\"ofi_requirements\";s:0:\"\";s:12:\"ofi_findings\";s:0:\"\";s:13:\"ofi_evidences\";s:0:\"\";}}','DONE','5','AE-2025-01-01-1','hahahaha kataw-anan na system','7','ambot jud ani na system. naay review echos hahaha','1743501148');

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
  `comments` text,
  `reviewed_by` varchar(100) DEFAULT NULL,
  `review_comments` text,
  `date_reviewed` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `consolidated_audit_report` */

insert  into `consolidated_audit_report`(`cons_audit_report_id`,`created_by`,`timestamp`,`fileUrl`,`report_status`,`audit_plan`,`title`,`comments`,`reviewed_by`,`review_comments`,`date_reviewed`) values 
('CONSAR-2025-01-01-1','7','1743503364','file_manager/consolidated_reports/DNSC Audit (1).pdf','DONE','AP2025-01-01','ambot ani oi. pagkaway pulos ani na module hahaha','deym, deym skrrt','9','ambot ani . acheche aloloy',1743505094);

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
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `notification` */

insert  into `notification`(`notification_id`,`receiver_id`,`message`,`created`,`read_at`,`sender_id`) values 
(57,'1','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1742702152,NULL,''),
(58,'2','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1742702152,NULL,''),
(59,'9','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1742702152,1742989385,''),
(60,'10','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1742702152,NULL,''),
(61,'11','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1742702152,1743506411,''),
(62,'12','a:2:{s:7:\"message\";s:71:\"? A new survey response has been submitted. Review the feedback now!\";s:4:\"link\";s:22:\"survey?action=feedback\";}',1742702152,1743485483,''),
(117,'9','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-01-01\";}',1743500380,1743500397,'7'),
(118,'10','a:2:{s:7:\"message\";s:85:\"Leanne Hessel Lebsack submitted you to Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-01-01\";}',1743500380,NULL,'7'),
(119,'15','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2025. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-01-01\";}',1743500410,1743500423,'9'),
(120,'16','a:2:{s:7:\"message\";s:139:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2025. CMT is the final approver! Kindly Review to make the Audit Plan final!\";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-01-01\";}',1743500410,NULL,'9'),
(121,'7','a:2:{s:7:\"message\";s:134:\"Monica Gaylord Hilpert approved : 1st Internal Quality Audit - 2025. CMT is the final approver! Kindly wait for the CMT final review! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-01-01\";}',1743500410,1743501806,'9'),
(122,'7','a:2:{s:7:\"message\";s:107:\"Ayden O\'Connell Balistreri approved : 1st Internal Quality Audit - 2025. Audit Plan is now fully launched! \";s:4:\"link\";s:40:\"auditPlan?action=details&id=AP2025-01-01\";}',1743500441,1743501803,'15'),
(123,'5','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2025-01-01\";}',1743500441,NULL,'7'),
(124,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2025-01-01\";}',1743500441,NULL,'7'),
(125,'23','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2025-01-01\";}',1743500441,NULL,'7'),
(126,'6','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2025-01-01\";}',1743500441,NULL,'7'),
(127,'23','a:2:{s:7:\"message\";s:77:\"Leanne Lebsack assigned you to Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:47:\"auditPlan?action=auditorDetails&id=AP2025-01-01\";}',1743500441,NULL,'7'),
(128,'3','a:2:{s:7:\"message\";s:108:\"Leanne Lebsack included your office (Library) for audit under Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2025-01-01\";}',1743500441,NULL,'7'),
(129,'3','a:2:{s:7:\"message\";s:107:\"Leanne Lebsack included your office (Clinic) for audit under Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2025-01-01\";}',1743500441,NULL,'7'),
(130,'3','a:2:{s:7:\"message\";s:110:\"Leanne Lebsack included your office (Registrar) for audit under Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2025-01-01\";}',1743500441,NULL,'7'),
(131,'21','a:2:{s:7:\"message\";s:108:\"Leanne Lebsack included your office (Cashier) for audit under Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:51:\"auditPlan?action=process_owner_list&id=AP2025-01-01\";}',1743500441,1743502656,'7'),
(132,'7','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2025-01-01-1\";}',1743501009,1743501219,'5'),
(133,'8','a:2:{s:7:\"message\";s:70:\"Foster Feeney Lueilwitz created audit report and needs to be reviewed.\";s:4:\"link\";s:52:\"audit_report_review?action=review&id=AR-2025-01-01-1\";}',1743501009,NULL,'5'),
(134,'5','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2025-01-01-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2025-01-01-1\";}',1743501148,NULL,'7'),
(135,'6','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2025-01-01-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2025-01-01-1\";}',1743501148,NULL,'7'),
(136,'23','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AR-2025-01-01-1\";s:4:\"link\";s:46:\"audit_report?action=details&id=AR-2025-01-01-1\";}',1743501148,NULL,'7'),
(137,'21','a:2:{s:7:\"message\";s:132:\"Foster Feeney Lueilwitz created an audit report : AR-2025-01-01-1 and you may view and conduct an audit evaluation for this auditor.\";s:4:\"link\";s:49:\"audit_evaluation?action=create&id=AR-2025-01-01-1\";}',1743501148,1743502477,'5'),
(142,'7','a:2:{s:7:\"message\";s:73:\"Foster Feeney Lueilwitz created audit checklist and needs to be reviewed.\";s:4:\"link\";s:55:\"audit_checklist_review?action=review&id=AC-2025-01-01-1\";}',1743501640,1743501797,'5'),
(143,'8','a:2:{s:7:\"message\";s:73:\"Foster Feeney Lueilwitz created audit checklist and needs to be reviewed.\";s:4:\"link\";s:55:\"audit_checklist_review?action=review&id=AC-2025-01-01-1\";}',1743501640,NULL,'5'),
(144,'5','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AC-2025-01-01-1\";s:4:\"link\";s:49:\"audit_checklist?action=details&id=AC-2025-01-01-1\";}',1743501819,1743502665,'7'),
(145,'6','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AC-2025-01-01-1\";s:4:\"link\";s:49:\"audit_checklist?action=details&id=AC-2025-01-01-1\";}',1743501819,NULL,'7'),
(146,'23','a:2:{s:7:\"message\";s:90:\"Leanne Hessel Lebsack has already reviewed and approved the audit report : AC-2025-01-01-1\";s:4:\"link\";s:49:\"audit_checklist?action=details&id=AC-2025-01-01-1\";}',1743501819,NULL,'7'),
(147,'7','a:2:{s:7:\"message\";s:107:\"BRUNO  MARS created an audit evaluation : AE-2025-01-01-1 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2025-01-01-1\";}',1743502633,1743502682,'21'),
(148,'8','a:2:{s:7:\"message\";s:107:\"BRUNO  MARS created an audit evaluation : AE-2025-01-01-1 and you may view and print the evaluation report.\";s:4:\"link\";s:50:\"audit_evaluation?action=details&id=AE-2025-01-01-1\";}',1743502633,NULL,'21'),
(149,'1','a:2:{s:7:\"message\";s:110:\"Leanne Hessel Lebsack submitted Consolidated Audit Report under Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:15:\"consolidated_ar\";}',1743503336,NULL,'7'),
(150,'2','a:2:{s:7:\"message\";s:110:\"Leanne Hessel Lebsack submitted Consolidated Audit Report under Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:15:\"consolidated_ar\";}',1743503336,NULL,'7'),
(151,'9','a:2:{s:7:\"message\";s:110:\"Leanne Hessel Lebsack submitted Consolidated Audit Report under Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:15:\"consolidated_ar\";}',1743503336,NULL,'7'),
(152,'10','a:2:{s:7:\"message\";s:110:\"Leanne Hessel Lebsack submitted Consolidated Audit Report under Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:15:\"consolidated_ar\";}',1743503336,NULL,'7'),
(153,'1','a:2:{s:7:\"message\";s:110:\"Leanne Hessel Lebsack submitted Consolidated Audit Report under Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:15:\"consolidated_ar\";}',1743503343,NULL,'7'),
(154,'2','a:2:{s:7:\"message\";s:110:\"Leanne Hessel Lebsack submitted Consolidated Audit Report under Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:15:\"consolidated_ar\";}',1743503343,NULL,'7'),
(155,'9','a:2:{s:7:\"message\";s:110:\"Leanne Hessel Lebsack submitted Consolidated Audit Report under Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:15:\"consolidated_ar\";}',1743503343,1743503631,'7'),
(156,'10','a:2:{s:7:\"message\";s:110:\"Leanne Hessel Lebsack submitted Consolidated Audit Report under Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:15:\"consolidated_ar\";}',1743503343,NULL,'7'),
(157,'1','a:2:{s:7:\"message\";s:110:\"Leanne Hessel Lebsack submitted Consolidated Audit Report under Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:15:\"consolidated_ar\";}',1743503364,NULL,'7'),
(158,'2','a:2:{s:7:\"message\";s:110:\"Leanne Hessel Lebsack submitted Consolidated Audit Report under Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:15:\"consolidated_ar\";}',1743503364,NULL,'7'),
(159,'9','a:2:{s:7:\"message\";s:110:\"Leanne Hessel Lebsack submitted Consolidated Audit Report under Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:15:\"consolidated_ar\";}',1743503364,1743503436,'7'),
(160,'10','a:2:{s:7:\"message\";s:110:\"Leanne Hessel Lebsack submitted Consolidated Audit Report under Audit Plan : 1st Internal Quality Audit - 2025\";s:4:\"link\";s:15:\"consolidated_ar\";}',1743503364,NULL,'7'),
(172,'15','a:2:{s:7:\"message\";s:77:\"Monica Gaylord Hilpert reviewed Consolidated Audit Report CONSAR-2025-01-01-1\";s:4:\"link\";s:15:\"consolidated_ar\";}',1743505094,1743505462,'9'),
(173,'16','a:2:{s:7:\"message\";s:77:\"Monica Gaylord Hilpert reviewed Consolidated Audit Report CONSAR-2025-01-01-1\";s:4:\"link\";s:15:\"consolidated_ar\";}',1743505094,NULL,'9'),
(174,'7','a:2:{s:7:\"message\";s:77:\"Monica Gaylord Hilpert reviewed Consolidated Audit Report CONSAR-2025-01-01-1\";s:4:\"link\";s:15:\"consolidated_ar\";}',1743505094,1743505146,'9');

/*Table structure for table `office` */

DROP TABLE IF EXISTS `office`;

CREATE TABLE `office` (
  `office_id` int NOT NULL AUTO_INCREMENT,
  `office_name` varchar(100) DEFAULT NULL,
  `active_status` varchar(100) DEFAULT NULL,
  `parent_id` varchar(100) DEFAULT NULL,
  KEY `office_id` (`office_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `office` */

insert  into `office`(`office_id`,`office_name`,`active_status`,`parent_id`) values 
(1,'College Library','ACTIVE','0'),
(2,'Clinic','ACTIVE','0'),
(3,'IT OFffice','ACTIVE','0');

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

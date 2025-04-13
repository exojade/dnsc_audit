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
/*Table structure for table `utility_settings` */

DROP TABLE IF EXISTS `utility_settings`;

CREATE TABLE `utility_settings` (
  `audit_plan` text,
  `audit_report` text,
  `audit_checklist` text,
  `audit_evaluation` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `utility_settings` */

insert  into `utility_settings`(`audit_plan`,`audit_report`,`audit_checklist`,`audit_evaluation`) values 
('a:7:{s:6:\"header\";s:29:\"resources/auditPlanHeader.png\";s:6:\"footer\";s:29:\"resources/auditPlanFooter.png\";s:11:\"form_number\";s:14:\"FM-DNSC-IQA-02\";s:12:\"issue_status\";s:2:\"05\";s:15:\"revision_number\";s:2:\"06\";s:14:\"effective_date\";s:15:\"02 January 2025\";s:11:\"approved_by\";s:9:\"President\";}','a:7:{s:6:\"header\";s:28:\"resources/portraitHeader.png\";s:6:\"footer\";s:27:\"resources/portaitFooter.png\";s:11:\"form_number\";s:14:\"FM-DNSC-IQA-04\";s:12:\"issue_status\";s:2:\"06\";s:15:\"revision_number\";s:2:\"08\";s:14:\"effective_date\";s:15:\"02 January 2025\";s:11:\"approved_by\";s:9:\"President\";}','a:7:{s:6:\"header\";s:28:\"resources/portraitHeader.png\";s:6:\"footer\";s:27:\"resources/portaitFooter.png\";s:11:\"form_number\";s:14:\"FM-DNSC-IQA-03\";s:12:\"issue_status\";s:2:\"05\";s:15:\"revision_number\";s:2:\"05\";s:14:\"effective_date\";s:15:\"02 January 2025\";s:11:\"approved_by\";s:9:\"President\";}','a:7:{s:6:\"header\";s:28:\"resources/portraitHeader.png\";s:6:\"footer\";s:27:\"resources/portaitFooter.png\";s:11:\"form_number\";s:14:\"FM-DNSC-IQA-06\";s:12:\"issue_status\";s:2:\"05\";s:15:\"revision_number\";s:2:\"05\";s:14:\"effective_date\";s:15:\"02 January 2025\";s:11:\"approved_by\";s:9:\"President\";}');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

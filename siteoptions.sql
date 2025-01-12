/*
SQLyog Community v12.4.0 (64 bit)
MySQL - 10.6.20-MariaDB-cll-lve : Database - cityvetdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cityvetdb` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

/*Table structure for table `siteoptions` */

DROP TABLE IF EXISTS `siteoptions`;

CREATE TABLE `siteoptions` (
  `google_clientID` varchar(100) DEFAULT NULL,
  `google_clientSecret` varchar(100) DEFAULT NULL,
  `calendarId` varchar(100) DEFAULT NULL,
  `mainLogo` varchar(100) DEFAULT NULL,
  `mainTitle` varchar(100) DEFAULT NULL,
  `mainColor` varchar(100) DEFAULT NULL,
  `textColor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `siteoptions` */

insert  into `siteoptions`(`google_clientID`,`google_clientSecret`,`calendarId`,`mainLogo`,`mainTitle`,`mainColor`,`textColor`) values 
('824759442784-r0k46r4upq85u4jd45n1cmd96hl5903i.apps.googleusercontent.com','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','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','resources/theLogo.png','R.L SUMABAL VETERINARY CLINIC','#125CD2','#F0F0F0');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

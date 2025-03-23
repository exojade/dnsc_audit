/*
SQLyog Community v12.4.0 (64 bit)
MySQL - 8.0.39 : Database - cityvetdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cityvetdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci  */ /*!80016 DEFAULT ENCRYPTION='N' */;

/*Table structure for table `announcements` */

DROP TABLE IF EXISTS `announcements`;

CREATE TABLE `announcements` (
  `tblid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `announcements` */

/*Table structure for table `appointment` */

DROP TABLE IF EXISTS `appointment`;

CREATE TABLE `appointment` (
  `appointmentId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateSet` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timeSet` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestampSet` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateScheduled` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointmentStatus` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meetId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calendarId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clientId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `doctorId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eventId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` enum('ONLINE','WALK IN') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`appointmentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `appointment` */

insert  into `appointment`(`appointmentId`,`dateSet`,`timeSet`,`timestampSet`,`dateScheduled`,`appointmentStatus`,`meetId`,`calendarId`,`clientId`,`notes`,`doctorId`,`eventId`,`description`,`type`) values 
('APP0B216C917688E','2024-10-09','S6','1728390393','2024-10-08','DONE','https://meet.google.com/hfa-arig-vxn','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-78DEF39E9FBD2',' Booked an appointment for checkup. \n\nPet Owner: Lower Key \n\nNotes: I NEED ALSO TO CHECK UP\n\nVet to attend: ROSS GELLER ','DOC-FD603F339ADFD','rqm7la98opp7i53l5tl715vl60',NULL,'ONLINE'),
('APP42DE89881B50D','2024-10-14','S2','1728753239','2024-10-13','DONE','https://meet.google.com/jsj-tgvh-cfi','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-78DEF39E9FBD2',' Booked an appointment for checkup. \n\nPet Owner: Lower Key \n\nNotes: ASDASDASDASD\n\nVet to attend: ROSS GELLER ','DOC-FD603F339ADFD','9bkac3umfk811hr9ogo3dkhegc',NULL,'ONLINE'),
('APP6D277054B838D','2024-10-12','S5','1728389235','2024-10-08','DONE','https://meet.google.com/vji-ivxa-sbd','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-78DEF39E9FBD2',' Booked an appointment for checkup. \n\nPet Owner: Lower Key \n\nNotes: MAGPACHECKUP KO SA AKONG IRO INTAWON\n\nVet to attend: ROSS GELLER ','DOC-FD603F339ADFD','lh56j3dj9r07hs3spe3uc4u618',NULL,'ONLINE'),
('APP7372F912CB34C','2024-10-08','S8','1728395539','2024-10-08','DONE',NULL,NULL,'USR-FB4DF72C86189','','DOC-FD603F339ADFD',NULL,NULL,'WALK IN'),
('APP9C89F97829D04','2025-02-17','S2','1739584950','2025-02-15','PENDING',NULL,NULL,'USR-78DEF39E9FBD2','suka kalibang ako persian',NULL,NULL,NULL,'ONLINE'),
('APPD29B28887D91E','2025-02-18','S1','1728753164','2024-10-13','ONGOING','https://meet.google.com/tsk-rfzp-ser','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-78DEF39E9FBD2',' Booked an appointment for checkup. \n\nPet Owner: Lower Key \n\nNotes: PAKAPON SA IRO\n\nVet to attend: GIAN JASPER GARCIA DVM \n\nReschedule Notes: awit ganern','DOC-FD603F339ADFD','nlt3nh5b2nmilo77c7repcu5c8',NULL,'ONLINE');

/*Table structure for table `checkup` */

DROP TABLE IF EXISTS `checkup`;

CREATE TABLE `checkup` (
  `checkupId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateCheckup` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `petId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prescription` text COLLATE utf8mb4_unicode_ci,
  `symptoms` text COLLATE utf8mb4_unicode_ci,
  `doctorsNote` text COLLATE utf8mb4_unicode_ci,
  `service` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosis` text COLLATE utf8mb4_unicode_ci,
  `treatment` text COLLATE utf8mb4_unicode_ci,
  `doctorId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`checkupId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `checkup` */

insert  into `checkup`(`checkupId`,`dateCheckup`,`type`,`petId`,`prescription`,`symptoms`,`doctorsNote`,`service`,`diagnosis`,`treatment`,`doctorId`) values 
('MED14867AE374111','2024-05-10 15:15:46','Walk-in','PET3F75DD6D30DC2','asdasdadasdasd','<ol><li>mao gihapon</li></ol>','adsadasdasdasdwwwasd','Checkup',NULL,NULL,'DOC-51A98D00F67D2'),
('MED1BF70CCFA11AC','2024-05-14 13:32:20','Walk-in','PETE1BF4AB9476D0','<ol><li>Amoxiclab 3x a day</li><li>Tambal No.2 4x a week after every meal of the pet patient</li><li>tambaling 3x a day</li></ol>','<ol><li>Vomitting</li><li>Weak Posture</li><li>Hard Belly</li></ol>','Food intake should be soft. Avoid contact to sunlight','Checkup','Food Poisoning','made the pet drink a vomitting solution','DOC-51A98D00F67D2'),
('MED240BCB51895A1','2024-10-12 23:17:49','Walk-in','PET0E7A58A2D06FF','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Checkup','BASTA MAO NATO','BASTA MAO NAAAA','DOC-FD603F339ADFD'),
('MED9538FD9428D56','2024-05-15 14:43:48','Walk-in','PET9192474BC438A','<ol><li>Betadine</li></ol>','                    \r\n                  ','Let him rest','Checkup','Leg Fracture','Conduct dressing','DOC-51A98D00F67D2'),
('MED9FB03F6239AE3','2024-10-20 13:36:48','Walk-in','PET8C45B81F56EC6','                    \r\n                  ','sige suka kalibang','                    \r\n                  ','Checkup','','','DOC-FD603F339ADFD'),
('MED9FE0D26439FE4','2024-07-23 15:32:07','Online','PET9192474BC438A','<ol><li>Carboceistine 3x a day</li><li>Paracetamol 4x a week every morning except friday</li></ol>','                    \r\n                  ','                    \r\n                  ','Checkup','Food Poisoning','REST','DOC-51A98D00F67D2'),
('MEDC15336B2D7862','2024-05-10 15:13:03','Online','PET3F75DD6D30DC2','<ol><li>b complex 2x a day</li><li>amoxicillin 3x a day</li></ol>','<ol><li>suka kalibang</li><li>yellow color of vomit</li></ol>','asdasdasdasdadsasdasd','Checkup',NULL,NULL,'DOC-51A98D00F67D2');

/*Table structure for table `checkup_disease` */

DROP TABLE IF EXISTS `checkup_disease`;

CREATE TABLE `checkup_disease` (
  `checkupId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diseaseId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tblid` int NOT NULL AUTO_INCREMENT,
  `petId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateCheckUp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`tblid`),
  KEY `tblid` (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `checkup_disease` */

insert  into `checkup_disease`(`checkupId`,`diseaseId`,`tblid`,`petId`,`barangay`,`dateCheckUp`) values 
('MEDC15336B2D7862','1',2,'PET3F75DD6D30DC2','36','2024-05-10 15:13:03'),
('MEDC15336B2D7862','3',3,'PET3F75DD6D30DC2','36','2024-05-10 15:13:03'),
('MED14867AE374111','1',4,'PET3F75DD6D30DC2','36','2024-05-10 15:15:46'),
('MED14867AE374111','2',5,'PET3F75DD6D30DC2','36','2024-05-10 15:15:46'),
('MED14867AE374111','3',6,'PET3F75DD6D30DC2','36','2024-05-10 15:15:46'),
('MED9FE0D26439FE4','1',10,'PET9192474BC438A','1','2024-07-23 15:32:07'),
('MED9FE0D26439FE4','2',11,'PET9192474BC438A','1','2024-07-23 15:32:07'),
('MED9FE0D26439FE4','3',12,'PET9192474BC438A','1','2024-07-23 15:32:07'),
('MED240BCB51895A1','4',13,'PET0E7A58A2D06FF','2','2024-10-12 23:17:49'),
('MED240BCB51895A1','7',14,'PET0E7A58A2D06FF','2','2024-10-12 23:17:49'),
('MED9FB03F6239AE3','8',15,'PET8C45B81F56EC6','7','2024-10-20 13:36:48');

/*Table structure for table `checkup_schedule` */

DROP TABLE IF EXISTS `checkup_schedule`;

CREATE TABLE `checkup_schedule` (
  `schedule_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clientId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateScheduled` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeScheduled` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctorId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scheduledBy` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`clientId`,`dateScheduled`,`doctorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `checkup_schedule` */

/*Table structure for table `client` */

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `clientId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middlename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nameExtension` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cityMun` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactNumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clientType` enum('ONLINE','WALK IN') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthDate` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clientStatus` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangayId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`clientId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `client` */

insert  into `client`(`clientId`,`firstname`,`middlename`,`lastname`,`nameExtension`,`region`,`province`,`cityMun`,`barangay`,`address`,`contactNumber`,`clientType`,`birthDate`,`gender`,`clientStatus`,`barangayId`) values 
('CL-E208F616DACEB','JOEY','','TRIBBIANI','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Dapco','PUROK 2','(+63) 9991919191','WALK IN','1990-01-01','Male','DONE UPDATE','7'),
('CL-F8D326C74CB6E','CLARKY','','DACER','','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','A. O. Floirendo','PUROK 1','(+63) 9912021566','WALK IN','1990-01-01','Male','DONE UPDATE','1'),
('USR-5C34C8C036602','MALUPITON','','RAVANERA','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Datu Abdul Dadia','QC','(+63) 9919191911','ONLINE','1990-10-08','Male','DONE UPDATE','2'),
('USR-78DEF39E9FBD2','GEANICA','NAMUAG','GARCIA','','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Cagangohan','NARTATEZ VILLAGE','(+63) 9912021578','ONLINE','1991-12-05','Female','DONE UPDATE','5'),
('USR-F96662365944E',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ONLINE',NULL,NULL,'FOR UPDATE',NULL),
('USR-FB4DF72C86189','BRIAN JADE','A','GARCIA','','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Southern Davao','SAHARAVILLE SUBD','(+63) 9912021547','ONLINE','1994-12-12','Male','DONE UPDATE','36');

/*Table structure for table `disease` */

DROP TABLE IF EXISTS `disease`;

CREATE TABLE `disease` (
  `diseaseId` int NOT NULL AUTO_INCREMENT,
  `diseaseName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `species_affected` enum('dog','cat','both') COLLATE utf8mb4_unicode_ci NOT NULL,
  `transmission_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `symptoms` text COLLATE utf8mb4_unicode_ci,
  `treatment` text COLLATE utf8mb4_unicode_ci,
  `is_contagious` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`diseaseId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `disease` */

insert  into `disease`(`diseaseId`,`diseaseName`,`species_affected`,`transmission_type`,`description`,`symptoms`,`treatment`,`is_contagious`,`created_at`) values 
(1,'Canine Parvovirus','dog','fecal-oral','Highly contagious virus affecting intestines.','Diarrhea, vomiting, lethargy','IV fluids, anti-nausea meds',1,'2024-10-12 21:40:39'),
(2,'Rabies','both','bite','Fatal viral disease affecting the nervous system.','Fever, paralysis, aggression','No cure, supportive care',1,'2024-10-12 21:40:39'),
(3,'Feline Leukemia','cat','saliva, contact','Viral disease impairing immune response.','Weight loss, infections, anemia','Antiviral drugs, supportive care',1,'2024-10-12 21:40:39'),
(4,'Kennel Cough','dog','airborne','Infectious bronchitis, common in kennels.','Persistent cough, sneezing, runny nose','Antibiotics, cough suppressants',1,'2024-10-12 21:40:39'),
(5,'Heartworm Disease','dog','vector-borne','Parasitic worm infection in heart and lungs.','Coughing, fatigue, difficulty breathing','Antiparasitic drugs',0,'2024-10-12 21:40:39'),
(6,'Feline Immunodeficiency Virus (FIV)','cat','bite, saliva','Weakens immune system over time.','Fever, weight loss, dental issues','Supportive care',1,'2024-10-12 21:40:39'),
(7,'Toxoplasmosis','cat','ingestion','Parasitic disease transmittable to humans.','Fever, lethargy, muscle pain','Antiparasitic meds, supportive care',1,'2024-10-12 21:40:39'),
(8,'katol','dog','sa iyot','lami laayo iyot','irotick','lubi sa tulo',1,'2024-10-20 13:35:32');

/*Table structure for table `doctor_schedule` */

DROP TABLE IF EXISTS `doctor_schedule`;

CREATE TABLE `doctor_schedule` (
  `doctor_schedule_id` int NOT NULL AUTO_INCREMENT,
  `schedule_date` varchar(100) DEFAULT NULL,
  `slotId` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`doctor_schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ;

/*Data for the table `doctor_schedule` */

insert  into `doctor_schedule`(`doctor_schedule_id`,`schedule_date`,`slotId`) values 
(3,'2025-02-19','S1'),
(4,'2025-02-19','S2');

/*Table structure for table `doctors` */

DROP TABLE IF EXISTS `doctors`;

CREATE TABLE `doctors` (
  `doctorsId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctorsFirstname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctorsMiddlename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctorsLastname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctorsExtension` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctorsRegion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctorsProvince` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctorsCitymun` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctorsBarangay` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctorsAddress` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctorsContactNumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctorsSex` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctorsBirthday` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctorsLicenseNumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`doctorsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `doctors` */

insert  into `doctors`(`doctorsId`,`doctorsFirstname`,`doctorsMiddlename`,`doctorsLastname`,`doctorsExtension`,`doctorsRegion`,`doctorsProvince`,`doctorsCitymun`,`doctorsBarangay`,`doctorsAddress`,`doctorsContactNumber`,`doctorsSex`,`doctorsBirthday`,`doctorsLicenseNumber`) values 
('DOC-51A98D00F67D2','GIAN JASPER','','GARCIA','DVM','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Southern Davao','PUROK 10','(+63) 9912021555','Male','2000-05-26','7162'),
('DOC-FD603F339ADFD','ROSS','','GELLER','','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Cacao','PUROK UBAS','(+63) 9910202020','Male','1990-01-01',NULL);

/*Table structure for table `notifications` */

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `notification_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification` text COLLATE utf8mb4_unicode_ci,
  `sender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reciever` text COLLATE utf8mb4_unicode_ci COMMENT 'array ni diri',
  `datetime` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `notifications` */

/*Table structure for table `pet` */

DROP TABLE IF EXISTS `pet`;

CREATE TABLE `pet` (
  `petId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `petName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `petType` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `petBreed` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'optional',
  `petAge` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'optional',
  `petDescription` text COLLATE utf8mb4_unicode_ci,
  `clientId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `petGender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `petDob` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `petCondition` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`petId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pet` */

insert  into `pet`(`petId`,`petName`,`petType`,`petBreed`,`petAge`,`petDescription`,`clientId`,`image`,`petGender`,`petDob`,`petCondition`) values 
('PET0E7A58A2D06FF','GRANGER','Cat','PERSIAN BIGBONE',NULL,'','USR-5C34C8C036602',NULL,'Male','2023-10-01',NULL),
('PET1CA8255307B86','Blacky','Dog','Labrador',NULL,'Pure Black','USR-FB4DF72C86189','uploads/PET1CA8255307B86.jpg','Male','2023-09-10','Healthy'),
('PET3F75DD6D30DC2','SUGAR','Cat','HALF PERSIAN HALF PUSPIN',NULL,'DIRTY WHITE','USR-FB4DF72C86189',NULL,'Male','2022-09-10','Healthy'),
('PET53DD668749F2C','ISSA','Cat','Pure Persian',NULL,'Midnight Black','USR-FB4DF72C86189',NULL,'Male','2023-09-10','Healthy'),
('PET8C45B81F56EC6','asdasdasdasd','Cat','CAT',NULL,'','CL-E208F616DACEB','uploads/PET8C45B81F56EC6.png','Male','2024-10-11',NULL),
('PET9192474BC438A','Choco','Dog','Pug',NULL,'','CL-F8D326C74CB6E',NULL,'Male','2022-05-30','Healthy'),
('PETBF89B9AE9266B','Miya','Cat','Persian',NULL,'Black and White','USR-78DEF39E9FBD2',NULL,'Female','2023-09-10','Healthy'),
('PETCCCB9A80E0D46','Hershey','Cat','Persian',NULL,'Grayish','USR-78DEF39E9FBD2',NULL,'Female','2023-01-10','Healthy'),
('PETE1BF4AB9476D0','HANABI','Dog','GOLDEN RETRIEVER',NULL,'','USR-FB4DF72C86189',NULL,'Female','2023-05-14','HEALTHY');

/*Table structure for table `pet_boarding` */

DROP TABLE IF EXISTS `pet_boarding`;

CREATE TABLE `pet_boarding` (
  `petBoardingId` int NOT NULL AUTO_INCREMENT,
  `clientId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numberPets` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateSet` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateDone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `petBoardingId` (`petBoardingId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pet_boarding` */

insert  into `pet_boarding`(`petBoardingId`,`clientId`,`from_date`,`to_date`,`numberPets`,`dateSet`,`status`,`dateDone`) values 
(1,'USR-78DEF39E9FBD2','2024-07-25 08:00:00','2024-07-25 17:00:00','2','2024-07-25 15:22:00','DONE','2024-10-12 11:11:00');

/*Table structure for table `siteoptions` */

DROP TABLE IF EXISTS `siteoptions`;

CREATE TABLE `siteoptions` (
  `google_clientID` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_clientSecret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calendarId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mainLogo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mainTitle` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mainColor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `textColor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `siteoptions` */

insert  into `siteoptions`(`google_clientID`,`google_clientSecret`,`calendarId`,`mainLogo`,`mainTitle`,`mainColor`,`textColor`) values 
('538691118774-50b5ak993tc510dlrmoishso1pi8qv2q.apps.googleusercontent.com','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','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','resources/theLogo.png','R.L SUMABAL VETERINARY CLINIC','#125CD2','#F0F0F0');

/*Table structure for table `timeslot` */

DROP TABLE IF EXISTS `timeslot`;

CREATE TABLE `timeslot` (
  `slotId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeSlot` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slotsAvailable` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `startTime` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endTime` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`slotId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `timeslot` */

insert  into `timeslot`(`slotId`,`timeSlot`,`slotsAvailable`,`remarks`,`startTime`,`endTime`) values 
('S1','AM 08:00 - 09:00','1','active','08:00','09:00'),
('S10','PM 05:00 - 06:00','1','inactive','17:00','18:00'),
('S11','PM 06:00 - 07:00','1','inactive','18:00','19:00'),
('S12','PM 07:00 - 08:00','1','inactive','19:00','20:00'),
('S2','AM 09:00 - 10:00','1','active','09:00','10:00'),
('S3','AM 10:00 - 11:00','1','active','10:00','11:00'),
('S4','AM 11:00 - 12:00','1','active','11:00','12:00'),
('S5','NN 12:00 - 01:00','1','active','12:00','13:00'),
('S6','PM 01:00 - 02:00','1','active','13:00','14:00'),
('S7','PM 02:00 - 03:00','1','active','14:00','15:00'),
('S8','PM 03:00 - 04:00','1','active','15:00','16:00'),
('S9','PM 04:00 - 05:00','1','active','16:00','17:00');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`userid`,`username`,`password`,`role`,`fullname`) values 
('DOC-51A98D00F67D2','crypto.manslayer2@gmail.com','crypto.manslayer2@gmail.com','DOCTOR','GIAN JASPER GARCIA'),
('DOC-FD603F339ADFD','leogarcia196501@gmail.com','imgeanican@gmail.com','DOCTOR','ROSS GELLER'),
('USER0001','tradebryant@gmail.com','$1$6XfVdlQw$RDy74tYnF9SUK8mcLV6CL.','admin','ADMIN ADMIN'),
('USR-78DEF39E9FBD2','keylower930@gmail.com','keylower930@gmail.com','CLIENT','Lower Key'),
('USR-F96662365944E','bosspanabo2020@gmail.com','bosspanabo2020@gmail.com','CLIENT','PANABO BUSINESS'),
('USR-FB4DF72C86189','bosspanabo20204@gmail.com','bosspanabo2020@gmail.com','CLIENT','PANABO BUSINESS');

/*Table structure for table `vaccine` */

DROP TABLE IF EXISTS `vaccine`;

CREATE TABLE `vaccine` (
  `vaccineId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vaccineName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaccineRemarks` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`vaccineId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vaccine` */

/*Table structure for table `vaccineqrecords` */

DROP TABLE IF EXISTS `vaccineqrecords`;

CREATE TABLE `vaccineqrecords` (
  `recordId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vaccineId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dosage` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`recordId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vaccineqrecords` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

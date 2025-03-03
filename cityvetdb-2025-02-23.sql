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

/*Table structure for table `announcements` */

DROP TABLE IF EXISTS `announcements`;

CREATE TABLE `announcements` (
  `tblid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `banner_image` varchar(100) DEFAULT NULL,
  KEY `tblid` (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `announcements` */

insert  into `announcements`(`tblid`,`title`,`description`,`status`,`banner_image`) values 
(3,'Free Anti-Rabies Vaccination for Dogs','The City Veterinary Office is pleased to announce a Free Anti-Rabies Vaccination Program for all pet dogs in our community. This initiative aims to protect both our furry friends and our residents by reducing the risk of rabies transmission. We encourage all dog owners to bring their pets to the vaccination drive.','ACTIVE','resources/announcements/430896427_728218072824173_3661105003562880792_n.jpg'),
(9,'Pet Animal Adoption','The Pet Animal Adoption is the process of giving abandoned, stray, or unwanted animals a new home. It allows individuals or families to adopt pets from shelters or rescue organizations, offering them a chance for a better life.','ACTIVE','resources/announcements/adoption.jpeg'),
(10,'Pet Dog Show','The Pet Dog Show is an event where dogs are showcased and judged based on their breed, appearance, behavior, and skills. Dog owners present their pets in various categories, such as obedience, agility, and conformation.','ACTIVE','resources/announcements/dogshow.JPG'),
(11,'Pet Care Day','Is an event where dogs are showcased and judged based on their appearance, behavior, and skills. It brings together dog lovers to celebrate and appreciate different breeds and talents.','ACTIVE','resources/announcements/petcareday.jpeg');

/*Table structure for table `appointment` */

DROP TABLE IF EXISTS `appointment`;

CREATE TABLE `appointment` (
  `appointmentId` varchar(100) NOT NULL,
  `dateSet` varchar(100) DEFAULT NULL,
  `timeSet` varchar(100) DEFAULT NULL,
  `timestampSet` varchar(100) DEFAULT NULL,
  `dateScheduled` varchar(100) DEFAULT NULL,
  `appointmentStatus` varchar(100) DEFAULT NULL,
  `meetId` varchar(100) DEFAULT NULL,
  `calendarId` varchar(100) DEFAULT NULL,
  `clientId` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `doctorId` varchar(100) DEFAULT NULL,
  `eventId` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `type` enum('ONLINE','WALK IN') DEFAULT NULL,
  PRIMARY KEY (`appointmentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `appointment` */

insert  into `appointment`(`appointmentId`,`dateSet`,`timeSet`,`timestampSet`,`dateScheduled`,`appointmentStatus`,`meetId`,`calendarId`,`clientId`,`notes`,`doctorId`,`eventId`,`description`,`type`) values 
('APP06F531FDE0AA6','2025-02-19','S6','1739881960','2025-02-18','DONE','https://meet.google.com/pdz-vvgb-fvi','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-9C6CBD0251315',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: Deworming and pakapon\r\n \n\nReschedule Notes: Doctor has an emergency surgery for the pakapon\r\n','DOC-ED2B182699D59','jdvdsv3vgaf37d3d673l0uhq9k',NULL,'ONLINE'),
('APP19EFAB0531849','2025-02-19','S3','1739880961','2025-02-18','CANCELLED','https://meet.google.com/jjt-jbmk-pvu','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-9C6CBD0251315',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: Deworming',NULL,'d79067hsq00944rpjgj4fvm7bs',NULL,'ONLINE'),
('APP1D9F42000DB05','2024-12-05','S1','1733144371','2024-12-02','DONE','https://meet.google.com/gpi-fzto-tts','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-FB2AC995F1088',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: ccccc\n\nVet to attend: Ayms Val DVM','DOC-6B08515EAB33D','nesrd290updlb88cm99uh4q02c',NULL,'ONLINE'),
('APP23E47BB7921A9','2024-10-31','S3','1730271336','2024-10-30','DONE','https://meet.google.com/wjf-neaw-ycv','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-BC1DEF7310CF5',' Booked an appointment for checkup. \n\nPet Owner: Kenji rey Acido \n\nNotes: sample\n\nVet to attend: asdasd ssssss  \n\nReschedule Notes: move lang ta kay busy ko','DOC-ED2B182699D59','s0dtfgci0v6mol22as8k5nv11c',NULL,'ONLINE'),
('APP240A75E68C455','2025-02-20','S4','1739883359','2025-02-18','CANCELLED','https://meet.google.com/mjg-qjju-dfi','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-9C6CBD0251315',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: qwf',NULL,'i996e34rfckklmcj7vnikof6pc',NULL,'ONLINE'),
('APP282185AB84B02','2025-02-19','S3','1739880614','2025-02-18','CANCELLED',NULL,NULL,'USR-9C6CBD0251315','Pakapon',NULL,NULL,NULL,'ONLINE'),
('APP2B538BFB9F923','2024-12-04','S2','1733142838','2024-12-02','DONE','https://meet.google.com/div-uvsa-btg','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-FB2AC995F1088',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: WWW\n\nVet to attend: Ayms Val DVM','DOC-6B08515EAB33D','85vss7fc1bnhtetr2do9j0r6mg',NULL,'ONLINE'),
('APP2E8E0607D1285','2025-02-15','S3','1739553578','2025-02-15','DONE','https://meet.google.com/rvp-fdif-xek','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-9C6CBD0251315',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: Annual Vaccine\n\nVet to attend: Emil Anasco DVM','DOC-ED2B182699D59','msv9j1acuo94jlunlp044kvsn0',NULL,'ONLINE'),
('APP430DFB203C1EB','2025-01-09','S7','1736396260','2025-01-09','DONE',NULL,NULL,'CL-0E7D7658F7FA6','','DOC-ED2B182699D59',NULL,NULL,'WALK IN'),
('APP485A99D652CCA','2024-12-03','S3','1733139261','2024-12-02','DONE','https://meet.google.com/qka-ovfy-zej','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-FB2AC995F1088',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: ......\n\nVet to attend: Ayms Val DVM','DOC-6B08515EAB33D','vre6ielkp99m5fnitorqnd3qbk',NULL,'ONLINE'),
('APP50B74549F9BCC','2025-01-09','S3','1736384306','2025-01-09','ONGOING',NULL,NULL,'USR-E6C7616334084','','DOC-6B08515EAB33D',NULL,NULL,'WALK IN'),
('APP5A19EEED6886C','2024-12-06','S1','1733159823','2024-12-03','DONE','https://meet.google.com/pht-sdob-huz','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-9C6CBD0251315',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: Pa check up ko, Doc.\n\nVet to attend: Ayms Val DVM','DOC-6B08515EAB33D','4bccaa76gi72640ct90ctjn9mk',NULL,'ONLINE'),
('APP5D959D2649B57','2024-12-04','S6','1733141046','2024-12-02','DONE','https://meet.google.com/gmt-vqog-mxm','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-FB2AC995F1088',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: Nag sakit akong puppy\n\nVet to attend: Ayms Val DVM','DOC-6B08515EAB33D','1rj0e6dfp916t7t24v1qiecne8',NULL,'ONLINE'),
('APP666404290D324','2024-12-10','S1','1733203697','2024-12-03','DONE','https://meet.google.com/okz-rxxd-pxr','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-9C6CBD0251315',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: Check up\n\nVet to attend: Ayms Val DVM','DOC-6B08515EAB33D','9v8p418uneotc5vslighhvqels',NULL,'ONLINE'),
('APP7EE5DB4C458CC','2024-12-03','S1','1733121110','2024-12-02','DONE','https://meet.google.com/fxv-ktxa-pvj','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-FB2AC995F1088',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: Magpa-check up ko sa akong mga puppies\n\nVet to attend: Ayms Val DVM','DOC-6B08515EAB33D','ih8ljgm4p5gdafo2t7rrj0r1p4',NULL,'ONLINE'),
('APP8389CD65C3AB4','2024-12-03','S4','1733139328','2024-12-02','DONE','https://meet.google.com/wjv-voxb-bmr','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-FB2AC995F1088',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: ,.,,.\n\nVet to attend: Ayms Val DVM','DOC-6B08515EAB33D','5te5uknbvn2gn9ceiqdlvgu3uc',NULL,'ONLINE'),
('APPA058D24EC7325','2024-12-10','S3','1733204467','2024-12-03','DONE','https://meet.google.com/vkc-rgrf-hrg','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-BC1DEF7310CF5',' Booked an appointment for checkup. \n\nPet Owner: Kenji rey Acido \n\nNotes: check\n\nVet to attend: Ayms Val DVM','DOC-ED2B182699D59','85ha3f9bevq7oc3p9pu05mu6pc',NULL,'ONLINE'),
('APPA14F5F721743E','2025-02-28','S2','1740043914','2025-02-20','DONE','https://meet.google.com/svp-boaa-kua','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-9C6CBD0251315',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: dd \n\nReschedule Notes: h','DOC-ED2B182699D59','tuiqpmidlccamv1f34rcv3k65g',NULL,'ONLINE'),
('APPA4D488F774074','2024-12-11','S2','1733204926','2024-12-03','DONE','https://meet.google.com/urt-eayi-kzm','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-BC1DEF7310CF5',' Booked an appointment for checkup. \n\nPet Owner: Kenji rey Acido \n\nNotes: ok\n\nVet to attend: Ayms Val DVM \n\nReschedule Notes: Naay birthday ','DOC-ED2B182699D59','t1o1e8nmth9sr2d9gbqa0n7pv4',NULL,'ONLINE'),
('APPA713C0CB02B00','2025-02-20','S5','1740016678','2025-02-20','DONE','https://meet.google.com/sji-peaz-mnu','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-09C4FB0F94BC7',' Booked an appointment for checkup. \n\nPet Owner: Imee Valiente \n\nNotes: na kwaan akong dog ','DOC-ED2B182699D59','dfu413nljr4pan03r4ki84cmrg',NULL,'ONLINE'),
('APPA78315557DAAE','2025-01-10','S4','1736394996','2025-01-09','DONE','https://meet.google.com/rzk-xips-kpm','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-9C6CBD0251315',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: Pa check-up\n\nVet to attend: Emil Anasco DVM','DOC-ED2B182699D59','frbsnl4a6n41a0cng4kk2cbcq0',NULL,'ONLINE'),
('APPA7AB04A1E246A','2024-12-03','S5','1733140029','2024-12-02','DONE','https://meet.google.com/tcq-dvrj-aca','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-FB2AC995F1088',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: Naga salimuang akong iro, dili mo kaon og tarung\n\nVet to attend: Ayms Val DVM','DOC-6B08515EAB33D','s66q50fg411ecau9atfvaslbn0',NULL,'ONLINE'),
('APPA86AE7AE3247A','2025-01-12','S3','1736395148','2025-01-09','DONE','https://meet.google.com/spn-fzfy-iki','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-9C6CBD0251315',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: pacheckup\n\nVet to attend: Emil Anasco DVM \n\nReschedule Notes: Urgent errand','DOC-ED2B182699D59','m7k25687bltcffrnibdb31etm4',NULL,'ONLINE'),
('APPB0F16B1A03A81','2024-12-12','S8','1733144814','2024-12-02','DONE','https://meet.google.com/kjt-eiiu-auq','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-FB2AC995F1088',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: ssasa\n\nVet to attend: Ayms Val DVM','DOC-6B08515EAB33D','lk04377u2qclgcjg3ntbju3jes',NULL,'ONLINE'),
('APPC25F1BF97B13E','2025-01-13','S1','1736687237','2025-01-12','DONE','https://meet.google.com/rpk-yowg-npy','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-9C6CBD0251315',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: Pa check up and Pa deworm\r\n\n\nVet to attend: Emil Anasco DVM','DOC-ED2B182699D59','ob857rtnokvmti0jao7ku9jsn4',NULL,'ONLINE'),
('APPCE6BFC6DAC849','2024-11-26','S2','1732537925','2024-11-25','DONE','https://meet.google.com/mbp-rrwb-hin','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-E6C7616334084',' Booked an appointment for checkup. \n\nPet Owner: Imee Valiente \n\nNotes: My dog di po kumakain several days ago\n\nVet to attend: Emil Añasco DVM','DOC-ED2B182699D59','781rqhi2o7jvdhl51s33o4glr0',NULL,'ONLINE'),
('APPCFCA8997FF7D5','2024-11-25','S9','1732515227','2024-11-25','DONE','https://meet.google.com/cqp-uune-mow','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-FB2AC995F1088',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: Urgent doc\n\nVet to attend: Ayms Val DVM','DOC-6B08515EAB33D','112dd51t884g4t8gilqrvvg3o0',NULL,'ONLINE'),
('APPD3E07CE2CB60C','2024-11-28','S7','1732751263','2024-11-28','DONE','https://meet.google.com/ghb-oabx-vtp','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-BC1DEF7310CF5',' Booked an appointment for checkup. \n\nPet Owner: Kenji rey Acido \n\nNotes: Urgent, naglibang ug dugo\n\nVet to attend: Emil Añasco DVM \n\nReschedule Notes: Not available on the allotted time.','DOC-ED2B182699D59','0iif6kg0hgtpfpm1hqboanladk',NULL,'ONLINE'),
('APPDFB25BFAFCC67','2024-12-05','S3','1733143487','2024-12-02','DONE','https://meet.google.com/uzs-nxra-jjn','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-FB2AC995F1088',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: I\'m not around in Panabo, Doc., pwede na mag-sturya ta through online kay akong mga Pets, dili mo kaon\n\nVet to attend: Ayms Val DVM','DOC-6B08515EAB33D','r01md1kmio9j0dha7qncm9cuvk',NULL,'ONLINE'),
('APPE3D4C67E4060A','2025-01-10','S2','1736387206','2025-01-09','DONE','https://meet.google.com/ryn-mfhq-tbi','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-BC1DEF7310CF5',' Booked an appointment for checkup. \n\nPet Owner: Kenji rey Acido \n\nNotes: hg\n\nVet to attend: Emil Anasco DVM','DOC-ED2B182699D59','0jacg98urlsgblba8lmed9cefg',NULL,'ONLINE'),
('APPEB1823F42448D','2025-01-15','S6','1736904757','2025-01-15','DONE','https://meet.google.com/nse-msrd-aqd','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-9C6CBD0251315',' Booked an appointment for checkup. \n\nPet Owner: MARICRIS DELACERNA \n\nNotes: Vaccination\n\nVet to attend: Emil Anasco DVM','DOC-ED2B182699D59','7etjmvtn5i2r47hgffugdhiad0',NULL,'ONLINE'),
('APPEB8AA8931990A','2024-11-25','S6','1732243870','2024-11-22','DONE','https://meet.google.com/ayq-madz-vau','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','USR-BC1DEF7310CF5',' Booked an appointment for checkup. \n\nPet Owner: Kenji rey Acido \n\nNotes: My dog needs vitamins\n\nVet to attend: Ayms Val DVM \n\nReschedule Notes: Ma-move lang sa imong oras for appointment tomorrow, I have my meeting in the morning.','DOC-6B08515EAB33D','651215939pvl2thbrlf31jsm88',NULL,'ONLINE'),
('APPF3D0575ACFC61','2024-11-28','S6','1732754788','2024-11-28','DONE',NULL,NULL,'CL-A4465A0F5649C','','DOC-ED2B182699D59',NULL,NULL,'WALK IN');

/*Table structure for table `checkup` */

DROP TABLE IF EXISTS `checkup`;

CREATE TABLE `checkup` (
  `checkupId` varchar(100) NOT NULL,
  `dateCheckup` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `petId` varchar(100) DEFAULT NULL,
  `prescription` text DEFAULT NULL,
  `symptoms` text DEFAULT NULL,
  `doctorsNote` text DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `treatment` text DEFAULT NULL,
  `doctorId` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`checkupId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `checkup` */

insert  into `checkup`(`checkupId`,`dateCheckup`,`type`,`petId`,`prescription`,`symptoms`,`doctorsNote`,`service`,`diagnosis`,`treatment`,`doctorId`) values 
('MED00389026FB978','2025-02-15 01:41:58','Online','PETABABC6B6B484C','<br>','dwd','                    \r\n                  ','Checkup','X-rays and Screen Urinalysis','Buy medicine and avail x-ray services and screening','DOC-ED2B182699D59'),
('MED0F1191E8588F2','2024-12-02 14:49:40','Walk-in','PET260409693D043','CVXCVCXV','VCXCV','CXVXCVC','Checkup','CVXCVX','CVXCVXC','DOC-6B08515EAB33D'),
('MED4A5DE7E7D5EED','2025-02-18 21:25:47','Online','PETABABC6B6B484C','fqwfqwg','gqgw','qwfqwa','Vaccination','fw3g','qfqw','DOC-ED2B182699D59'),
('MED4C5A8F40B67ED','2024-11-28 11:30:09','Online','PET8BBB5CA5FADE5','Okay okay okay','Luya, sigeg higda, won\'t eat properly','Pa adto-a na diri sa Vet aron matagaan nag treatment','Vaccination','LEG FRACTURE','Vaccine ','DOC-6B08515EAB33D'),
('MED4E3467422CE50','2024-12-03 01:21:38','Walk-in','PETE4DC61E1C57FB','<p><b>PALITAN OG ANTI-BIOTIC:</b></p><p><b>- AMOXICILLIN</b></p><p><b>- PARACETAMOL</b></p>','Sigeg suka','AYAW SA BUHI-E SA ENVIRONMENT NIYA','Vaccination','Severe','Vaccine','DOC-6B08515EAB33D'),
('MED5F952AC05A1EF','2024-12-03 13:35:26','Online','PET4C0E47BCB07EE','Buy antibiotic','Suka','Okok','Checkup','Vaccine','Vaccine','DOC-6B08515EAB33D'),
('MED8B576BB6D1BFD','2024-10-30 15:01:53','Online','PET4C0E47BCB07EE','<p>SAMPLE PRESCRIPTION</p><ul><li>PARACETAMOL 3X A DAY</li><li>CARBOCEISTINE 2X A WEEK</li></ul>','SIGE SUKA','                    \r\n                  ','Checkup','SUKA TAS HALHAL','EUTHANIZE NANI','DOC-ED2B182699D59'),
('MEDC4A84FE8CCC0C','2024-10-30 15:05:07','Walk-in','PET4CCCC8999BBBE','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Checkup','AMBOT','','USER0001'),
('MEDD70CDDB00E3BE','2024-11-25 14:01:32','Walk-in','PET64205AE51E8B4','palit og tambal&nbsp;','sakit ang tyan','test','Checkup','nakakaon ug baki','gipainom ug solution pangsuka sa gikaon na poison','DOC-ED2B182699D59'),
('MEDDAA219A2E2C27','2024-12-02 14:16:33','Walk-in','PET80765088943DD','OKI','KALIBANGA, RED OG IHI','ADTO LANG','Anti Rabies','ANTI-RABIES','VACCINATION','DOC-6B08515EAB33D'),
('MEDDC39E15F81094','2025-01-09 12:19:54','Online','PETBE580AC085360','vwv','cwevw','vwvw','Anti Rabies','cwe','vrw','DOC-ED2B182699D59'),
('MEDE1B259F09A6BB','2024-12-02 14:20:54','Online','PET7C5F2EBD3DEA5','BUY PARACETAMOL','KALIT RAG KATAWA','OK','Checkup','NAAY BULATI ANG POOP','TAKE ANTIBIOTIC','DOC-6B08515EAB33D'),
('MEDE8FE773B86B76','2025-01-09 12:12:40','Walk-in','PET7953C75F1A125','<p>Bioflu</p><p>Ranitidine</p>','<u>Sige ug suka and kalibang</u>','monitor and make sure that merat drinks her medicine on time','Checkup','X-rays and Screen Urinalysis','Buy medicine and avail x-ray services and screening','DOC-ED2B182699D59'),
('MEDF21DE9729EFA7','2024-11-25 14:02:47','Walk-in','PET64205AE51E8B4','okjokj','kjkjk','jjhkjh','Checkup','nakakaon ug baki','gipainom ug solution pangsuka sa gikaon na poison','DOC-ED2B182699D59'),
('MEDF8FF483D2694E','2024-11-28 18:19:15','Walk-in','PET7E9B7C973A5BA','Ali na sa City Vet','Luya kaayu, halos dili na mo bangon aron mo kaon&nbsp;','Adto na lang sa City Vet para sa treatment.','Checkup','Gibugnug irong buang','Admit','DOC-6B08515EAB33D'),
('MEDFFAB6311B684A','2024-11-25 13:55:33','Walk-in','PETED6B4B67B660B','By amoxicillin','ubo-ubo','<br>','Checkup','nakakaon ug baki','gipainom ug solution pangsuka sa gikaon na poison','DOC-ED2B182699D59');

/*Table structure for table `checkup_disease` */

DROP TABLE IF EXISTS `checkup_disease`;

CREATE TABLE `checkup_disease` (
  `checkupId` varchar(100) NOT NULL,
  `diseaseId` varchar(100) NOT NULL,
  `tblid` int(11) NOT NULL AUTO_INCREMENT,
  `petId` varchar(100) DEFAULT NULL,
  `barangay` varchar(100) DEFAULT NULL,
  `dateCheckUp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tblid`),
  KEY `tblid` (`tblid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `checkup_disease` */

insert  into `checkup_disease`(`checkupId`,`diseaseId`,`tblid`,`petId`,`barangay`,`dateCheckUp`) values 
('MED8B576BB6D1BFD','1',13,'PET4C0E47BCB07EE','4','2024-10-30 15:01:53'),
('MED8B576BB6D1BFD','2',14,'PET4C0E47BCB07EE','4','2024-10-30 15:01:53'),
('MEDC4A84FE8CCC0C','3',15,'PET4CCCC8999BBBE','2','2024-10-30 15:05:07'),
('MEDFFAB6311B684A','4',16,'PETED6B4B67B660B','2','2024-11-25 13:55:33'),
('MEDD70CDDB00E3BE','2',17,'PET64205AE51E8B4','3','2024-11-25 14:01:33'),
('MEDF21DE9729EFA7','2',18,'PET64205AE51E8B4','3','2024-11-25 14:02:47'),
('MED4C5A8F40B67ED','2',19,'PET8BBB5CA5FADE5','4','2024-11-28 11:30:09'),
('MEDF8FF483D2694E','2',20,'PET7E9B7C973A5BA','1','2024-11-28 18:19:15'),
('MEDDAA219A2E2C27','5',21,'PET80765088943DD','4','2024-12-02 14:16:33'),
('MEDE1B259F09A6BB','8',22,'PET7C5F2EBD3DEA5','2','2024-12-02 14:20:54'),
('MED0F1191E8588F2','3',23,'PET260409693D043','2','2024-12-02 14:49:40'),
('MED4E3467422CE50','11',24,'PETE4DC61E1C57FB','6','2024-12-03 01:21:38'),
('MED5F952AC05A1EF','10',25,'PET4C0E47BCB07EE','4','2024-12-03 13:35:26'),
('MEDE8FE773B86B76','7',26,'PET7953C75F1A125','8','2025-01-09 12:12:40'),
('MED00389026FB978','2',27,'PETABABC6B6B484C','5','2025-02-15 01:41:58');

/*Table structure for table `checkup_schedule` */

DROP TABLE IF EXISTS `checkup_schedule`;

CREATE TABLE `checkup_schedule` (
  `schedule_id` varchar(100) DEFAULT NULL,
  `clientId` varchar(100) NOT NULL,
  `dateScheduled` varchar(100) NOT NULL,
  `timeScheduled` varchar(100) DEFAULT NULL,
  `timestamp` varchar(100) DEFAULT NULL,
  `doctorId` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `scheduledBy` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`clientId`,`dateScheduled`,`doctorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `checkup_schedule` */

insert  into `checkup_schedule`(`schedule_id`,`clientId`,`dateScheduled`,`timeScheduled`,`timestamp`,`doctorId`,`status`,`scheduledBy`) values 
('SCHED36889389EAF5F','CL-B9F701B1A49D1','2024-10-10','14:13:32','1728540812','DOC-ED2B182699D59','PENDING','USER0001');

/*Table structure for table `client` */

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `clientId` varchar(100) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `nameExtension` varchar(100) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `cityMun` varchar(100) DEFAULT NULL,
  `barangay` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contactNumber` varchar(100) DEFAULT NULL,
  `clientType` enum('ONLINE','WALK IN') DEFAULT NULL,
  `birthDate` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `clientStatus` varchar(100) DEFAULT NULL,
  `barangayId` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`clientId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `client` */

insert  into `client`(`clientId`,`firstname`,`middlename`,`lastname`,`nameExtension`,`region`,`province`,`cityMun`,`barangay`,`address`,`contactNumber`,`clientType`,`birthDate`,`gender`,`clientStatus`,`barangayId`) values 
('CL-0E7D7658F7FA6','Randy','Tolentino','Domingo','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Cagangohan','Prk. Kasoy, Niceville subd. Brgy Cagangohan, Panabo City','(+63) 9662333559','WALK IN','2004-04-04','Male','DONE UPDATE','5'),
('CL-112606A06D29A','Jk','Fidellega','Torremocha','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Prk. Kasoy, Niceville subd. Brgy Cagangohan, Panabo City','(+63) 9097547152','WALK IN','2002-12-05','Male','DONE UPDATE','8'),
('CL-A18BDFFF7D8CA','MARI','CERNA','DELA CERNA','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Cacao','VILLAGE, 094, 2','(+63) 9191919191','WALK IN','2003-03-11','Female','DONE UPDATE','4'),
('CL-A4465A0F5649C','Joseph Matt','Fuentes','Biay','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Visayas','Northern Plain, Lily Street block 12, lot 12','(+63) 9662333559','WALK IN','2002-06-16','Male','DONE UPDATE','25'),
('CL-A70F25E297F80','Hero','Dash','Verteculazo','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','A. O. Floirendo','FLOIRENDO, 045, Purok 2','(+63) 9182093483','WALK IN','2001-11-12','Male','DONE UPDATE','1'),
('CL-B9F701B1A49D1','John Paul','Mcburger','Ludracis','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Datu Abdul Dadia','DALISAY, PUROK 2','(+63) 9662333559','WALK IN','1990-12-12','Male','DONE UPDATE','2'),
('CL-C82AF580738C9','Kenken','Decipulo','Valiente','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Buenavista','PUROK 5','(+63) 9191919191','WALK IN','1994-11-25','Male','DONE UPDATE','3'),
('CL-E305047FDFAAF','John ','Castano','Anasco','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Datu Abdul Dadia','Purok 1 ','(+63) 9662333559','WALK IN','2024-11-25','Male','DONE UPDATE','2'),
('USR-09C4FB0F94BC7','Imee ','Shawty','Marilag','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Malaga (Dalisay)','Dalisay 2','(+63) 9665553214','ONLINE','2000-12-25','Female','DONE UPDATE','22'),
('USR-5C86A8B917E2E',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ONLINE',NULL,NULL,'FOR UPDATE',NULL),
('USR-7DCDB597A4288',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ONLINE',NULL,NULL,'FOR UPDATE',NULL),
('USR-9C6CBD0251315','Maricris','Castano','Dela Cerna','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Consolacion','Consol, 8888, 3','(+63) 9191919921','ONLINE','2002-03-11','Female','DONE UPDATE','6'),
('USR-B47F76BE6E675','Imee ','Poe','Valiente','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Malaga (Dalisay)','Dalisay Village, 0765, 2','(+63) 9191919191','ONLINE','2000-03-11','Female','DONE UPDATE','22'),
('USR-BC1DEF7310CF5','KENJI RAY USER','','ACIDO','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Cacao','PUROK 3','(+63) 9191919191','ONLINE','1990-10-01','Male','DONE UPDATE','4'),
('USR-DA7EB560E0F45',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ONLINE',NULL,NULL,'FOR UPDATE',NULL),
('USR-E6C7616334084','Imee','Poe','Valiente','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Malaga (Dalisay)','Purok 1, New Malaga(Dalisay), Panabo City, Davao del Norte','(+63) 9122345678','ONLINE','2003-03-11','Female','DONE UPDATE','22'),
('USR-FB2AC995F1088','Maricris','Castano','Dela Cerna','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Datu Abdul Dadia','PUROK 5','(+63) 9191919191','ONLINE','2024-11-25','Female','DONE UPDATE','2');

/*Table structure for table `disease` */

DROP TABLE IF EXISTS `disease`;

CREATE TABLE `disease` (
  `diseaseId` int(11) NOT NULL AUTO_INCREMENT,
  `diseaseName` varchar(100) NOT NULL,
  `species_affected` enum('dog','cat','both') NOT NULL,
  `transmission_type` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `symptoms` text DEFAULT NULL,
  `treatment` text DEFAULT NULL,
  `is_contagious` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `color_code` varchar(100) DEFAULT '#000000',
  PRIMARY KEY (`diseaseId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `disease` */

insert  into `disease`(`diseaseId`,`diseaseName`,`species_affected`,`transmission_type`,`description`,`symptoms`,`treatment`,`is_contagious`,`created_at`,`color_code`) values 
(1,'Canine Parvovirus','dog','Fecal-oral','Highly contagious virus affecting intestines and has a chance to kill a dog','Diarrhea, vomiting, lethargy','IV fluids, anti-nausea meds',1,'2024-10-12 06:40:39','#B22D2D'),
(2,'Rabies','both','Bite','Fatal viral disease affecting the nervous system','Fever, paralysis, aggression','No cure, supportive care',1,'2024-10-12 06:40:39','#530F0F'),
(3,'Feline Leukemia','cat','Saliva, contact','Viral disease impairing immune response','Weight loss, infections, anemia','Antiviral drugs, supportive care',1,'2024-10-12 06:40:39','#1F11B4'),
(4,'Kennel Cough','dog','Airborne','Infectious bronchitis, common in kennels','Persistent cough, sneezing, runny nose','Antibiotics, cough suppressants',1,'2024-10-12 06:40:39','#8319B0'),
(5,'Heartworm Disease','dog','Vector-borne','Parasitic worm infection in heart and lungs','Coughing, fatigue, difficulty breathing','Antiparasitic drugs',0,'2024-10-12 06:40:39','#753F25'),
(6,'Feline Immunodeficiency Virus (FIV)','cat','Bite, saliva','Weakens immune system over time','Fever, weight loss, dental issues','Supportive care',1,'2024-10-12 06:40:39','#897F28'),
(7,'Toxoplasmosis','cat','Ingestion','Parasitic disease transmittable to humans','Fever, lethargy, muscle pain','Antiparasitic meds, supportive care',1,'2024-10-12 06:40:39','#530F0F'),
(8,'Ringworm','both','Fungal; transmitted by contact with infected anima','A fungal infection causing skin irritation','Circular hair loss, red or scaly patches, itching','Disinfect the environment',1,'2024-10-19 22:35:32','#19992A'),
(9,'Roundworms','both','Internal parasite, transmitted by ingestion of egg','Worms living in the intestines that can cause malnutrition, especially in young animals','Diarrhea, vomiting, weight loss, and visible worms in feces or vomit.','Regular fecal examinations',1,'2024-10-30 00:04:32','#15797D'),
(10,'Parvovirus','both','Direct contact with infected dogs, Contaminated en','Highly contagious viral disease causing severe gastrointestinal symptoms like vomiting. Puppies are at higher risk. Feline panleukopenia virus (FPV), causes similar symptoms, along with decreased white blood cell counts, fever, and dehydration. It can be fatal in kittens.','Diarrhea, Bloody diarrhea, Vomit/Vomiting','Supportive care, including IV fluids for dehydration\r\nAntiemetics to control vomiting\r\nAntibiotics to prevent secondary infections\r\nIsolation to prevent the spread of the virus\r\nVaccination is crucial for prevention',1,'2024-12-02 03:59:13','#278715'),
(11,'Flu (Influenza)','both','Canine influenza virus spreads through respiratory','Symptoms include coughing, nasal discharge, fever, lethargy, and reduced appetite. Severe cases can lead to pneumonia. Symptoms include sneezing, runny nose, watery eyes, fever, and mouth ulcers (specific to calicivirus).','Cough and colds, passing stool with phlegm or mucus in stool','Supportive care, such as hydration and rest.\r\nAntiviral medications (specific cases, as prescribed by a vet).\r\nAntibiotics if secondary bacterial infections occur.\r\nVaccination for prevention in high-risk environments.',1,'2024-12-02 04:03:37','#000000'),
(12,'Dengue','both','Dengue is rare in both but can occur. It is transm','Symptoms include fever, lethargy, vomiting, diarrhea, bleeding disorders, and abdominal pain. It can mimic other viral diseases.','Urinating blood, Swelling of the foot/feet','Supportive care, including fluids to address dehydration.\r\nPain management and anti-inflammatory medications.\r\nBlood transfusions in severe cases involving bleeding.\r\nMosquito control is essential for prevention.',1,'2024-12-02 04:05:59','#000000');

/*Table structure for table `doctor_schedule` */

DROP TABLE IF EXISTS `doctor_schedule`;

CREATE TABLE `doctor_schedule` (
  `doctor_schedule_id` int(100) NOT NULL AUTO_INCREMENT,
  `schedule_date` varchar(100) DEFAULT NULL,
  `slotId` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`doctor_schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `doctor_schedule` */

insert  into `doctor_schedule`(`doctor_schedule_id`,`schedule_date`,`slotId`) values 
(1,'2025-02-17','S3'),
(2,'2025-02-17','S4'),
(3,'2025-02-17','S7'),
(4,'2025-02-17','S8'),
(5,'2025-02-21','S4'),
(6,'2025-02-21','S7');

/*Table structure for table `doctors` */

DROP TABLE IF EXISTS `doctors`;

CREATE TABLE `doctors` (
  `doctorsId` varchar(100) NOT NULL,
  `doctorsFirstname` varchar(100) DEFAULT NULL,
  `doctorsMiddlename` varchar(100) DEFAULT NULL,
  `doctorsLastname` varchar(100) DEFAULT NULL,
  `doctorsExtension` varchar(100) DEFAULT NULL,
  `doctorsRegion` varchar(100) DEFAULT NULL,
  `doctorsProvince` varchar(100) DEFAULT NULL,
  `doctorsCitymun` varchar(100) DEFAULT NULL,
  `doctorsBarangay` varchar(100) DEFAULT NULL,
  `doctorsAddress` varchar(100) DEFAULT NULL,
  `doctorsContactNumber` varchar(100) DEFAULT NULL,
  `doctorsSex` varchar(10) DEFAULT NULL,
  `doctorsBirthday` varchar(100) DEFAULT NULL,
  `doctorsLicenseNumber` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`doctorsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `doctors` */

insert  into `doctors`(`doctorsId`,`doctorsFirstname`,`doctorsMiddlename`,`doctorsLastname`,`doctorsExtension`,`doctorsRegion`,`doctorsProvince`,`doctorsCitymun`,`doctorsBarangay`,`doctorsAddress`,`doctorsContactNumber`,`doctorsSex`,`doctorsBirthday`,`doctorsLicenseNumber`) values 
('DOC-6B08515EAB33D','Ayms','Po','Val','DVM','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF TAGUM (Capital)','Madaum','654 Oak Drive, Purok 6, Brgy. Pulang Bato','(+63) 9662333559','Female','1995-03-11','1234567'),
('DOC-ED2B182699D59','Emil','Labirtad','Anasco','DVM','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF TAGUM (Capital)','Magdum','Purok 3, Magdum, City of Tagum, Davao del Norte','(+63) 9191919191','Male','1995-09-09','123123123123');

/*Table structure for table `notifications` */

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `notification_id` varchar(100) DEFAULT NULL,
  `notification` text DEFAULT NULL,
  `sender` varchar(100) DEFAULT NULL,
  `reciever` text DEFAULT NULL COMMENT 'array ni diri',
  `datetime` varchar(100) DEFAULT NULL,
  `timestamp` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `notifications` */

/*Table structure for table `pet` */

DROP TABLE IF EXISTS `pet`;

CREATE TABLE `pet` (
  `petId` varchar(100) NOT NULL,
  `petName` varchar(100) DEFAULT NULL,
  `petType` varchar(100) DEFAULT NULL,
  `petBreed` varchar(100) DEFAULT NULL COMMENT 'optional',
  `petAge` varchar(100) DEFAULT NULL COMMENT 'optional',
  `petDescription` text DEFAULT NULL,
  `clientId` varchar(100) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `petGender` varchar(100) DEFAULT NULL,
  `petDob` varchar(100) DEFAULT NULL,
  `petCondition` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`petId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pet` */

insert  into `pet`(`petId`,`petName`,`petType`,`petBreed`,`petAge`,`petDescription`,`clientId`,`image`,`petGender`,`petDob`,`petCondition`) values 
('PET260409693D043','Bruno','Dog','Golden Retriever',NULL,'MUKALIT RAG KATAWA','USR-FB2AC995F1088','uploads/PET260409693D043.jpg','Female','2020-03-03',NULL),
('PET4C0E47BCB07EE','HANABISHI','Dog','LABRADOR',NULL,'ITOM NGA IRO','USR-BC1DEF7310CF5',NULL,'Female','2021-10-01',NULL),
('PET4CCCC8999BBBE','Askal','Cat','PITBULL',NULL,'Dark brown, chubby','CL-B9F701B1A49D1','uploads/PET4CCCC8999BBBE.jpg','Male','2020-03-02',NULL),
('PET5F45956FDC245','Novy','Dog','Aspin',NULL,'Cute size, brown color','USR-E6C7616334084',NULL,'Male','2023-11-03',NULL),
('PET64205AE51E8B4','Junnn','Cat','LABRADOR',NULL,'Gold','CL-C82AF580738C9',NULL,'Male','2024-11-25',NULL),
('PET76DDD595704AE','Bingo','Cat','Persian',NULL,'Coloured Orange cat','USR-9C6CBD0251315',NULL,'Female','2024-12-02',NULL),
('PET7953C75F1A125','Merat','Cat','Persian',NULL,'Oranged coloured cat','CL-112606A06D29A',NULL,'Female','2023-01-01',NULL),
('PET7C5F2EBD3DEA5','GOAL','Dog','BLACK',NULL,'TAAS PA SIYA NAKU','USR-FB2AC995F1088',NULL,'Female','2024-03-05',NULL),
('PET7E9B7C973A5BA','Dashy','Dog','GOLDEN RETRIEVER',NULL,'Cute, goldilocks','CL-A70F25E297F80',NULL,'Female','2023-11-03',NULL),
('PET80765088943DD','MARS','Cat','PERSIAN',NULL,'CUTE','CL-A18BDFFF7D8CA',NULL,'Female','2021-09-09',NULL),
('PET8BBB5CA5FADE5','Merat','Dog','Aspin',NULL,'White haired aspin and has a very sharp teeth','USR-BC1DEF7310CF5',NULL,'Female','2019-01-22',NULL),
('PET9080AC687CA9E','Babi','Dog','persian',NULL,'Golden Retriever','USR-FB2AC995F1088',NULL,'Male','2020-11-25',NULL),
('PETABABC6B6B484C','bfwui','Cat','persian',NULL,'white haired ','CL-0E7D7658F7FA6',NULL,'Female','20223-03-22',NULL),
('PETBD15E534B1439','Ichigo','Dog','Dachsund',NULL,'Long Haired Dachsund and Cookies and Cream colored','CL-A4465A0F5649C',NULL,'Male','2021-12-08',NULL),
('PETBE580AC085360','Bowl','Dog','Aspin',NULL,'White coloured-aspin, 15lbs ','CL-0E7D7658F7FA6',NULL,'Male','2024-01-01',NULL),
('PETD5236A3428E98','Ichigo','Dog','Dachsund',NULL,'Cookies and Cream coloured dachsund weighs 15 kilo','USR-9C6CBD0251315',NULL,'Male','2021-12-08',NULL),
('PETE4DC61E1C57FB','Mars','Dog','Golden Retriever',NULL,'Smooth','USR-9C6CBD0251315',NULL,'Male','2023-03-11',NULL),
('PETED6B4B67B660B','Jun2x','Cat','PITBULL',NULL,'cuTE','CL-E305047FDFAAF',NULL,'Female','2024-11-19',NULL);

/*Table structure for table `pet_boarding` */

DROP TABLE IF EXISTS `pet_boarding`;

CREATE TABLE `pet_boarding` (
  `petBoardingId` int(10) NOT NULL AUTO_INCREMENT,
  `clientId` varchar(100) DEFAULT NULL,
  `from_date` varchar(100) DEFAULT NULL,
  `to_date` varchar(100) DEFAULT NULL,
  `numberPets` varchar(100) DEFAULT NULL,
  `dateSet` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `dateDone` varchar(100) DEFAULT NULL,
  `reasonCancellation` text DEFAULT NULL,
  KEY `petBoardingId` (`petBoardingId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pet_boarding` */

insert  into `pet_boarding`(`petBoardingId`,`clientId`,`from_date`,`to_date`,`numberPets`,`dateSet`,`status`,`dateDone`,`reasonCancellation`) values 
(2,'USR-BC1DEF7310CF5','2024-11-04 14:00:00','2024-11-04 16:00:00','3','2024-11-02 13:38:00','DONE','2024-11-02 13:38:00',NULL),
(3,'USR-BC1DEF7310CF5','2024-11-05 14:00:00','2024-11-05 15:00:00','2','2024-11-02 13:39:00','DONE','2024-11-02 13:41:00',NULL),
(4,'USR-BC1DEF7310CF5','2024-11-25 14:00:00','2024-11-26 14:00:00','2','2024-11-25 13:45:00','DONE','2024-11-25 14:21:00',NULL),
(5,'USR-FB2AC995F1088','2024-11-25 13:00:00','2024-11-26 10:00:00','1','2024-11-25 14:25:00','DONE','2024-11-25 19:51:00',NULL),
(6,'USR-BC1DEF7310CF5','2024-11-28 10:00:00','2024-11-28 12:00:00','2','2024-11-28 08:09:00','DONE','2024-11-28 08:15:00',NULL),
(7,'USR-BC1DEF7310CF5','2024-11-29 08:00:00','2024-11-29 10:00:00','1','2024-11-28 08:13:00','DONE','2024-12-02 14:23:00',NULL),
(8,'CL-A4465A0F5649C','0024-11-28 09:00:00','2024-11-28 15:00:00','1','2024-11-28 09:00:00','DONE','2024-11-28 09:02:00',NULL),
(9,'USR-FB2AC995F1088','2024-12-03 15:00:00','2024-12-06 12:00:00','1','2024-12-02 14:53:00','DONE','2024-12-02 14:54:00',NULL),
(10,'USR-FB2AC995F1088','2024-12-04 08:00:00','2024-12-05 06:00:00','2','2024-12-02 19:43:00','CANCELLED',NULL,'Wala mi tomorrow'),
(11,'USR-9C6CBD0251315','2024-12-06 09:00:00','2024-12-06 15:00:00','2','2024-12-03 08:52:00','CANCELLED',NULL,'Daghan na kaykag pets wala gikuha, gikapuy nami nimo'),
(12,'USR-9C6CBD0251315','2024-12-04 09:00:00','2024-12-04 17:00:00','1','2024-12-03 08:54:00','DONE','2024-12-03 09:13:00',NULL),
(13,'USR-9C6CBD0251315','2024-12-04 09:00:00','2024-12-04 10:00:00','1','2024-12-03 09:08:00','DONE','2024-12-03 09:14:00',NULL),
(14,'USR-9C6CBD0251315','2025-01-12 12:00:00','2025-01-12 15:00:00','1','2025-01-09 12:04:00','DONE','2025-01-09 12:05:00',NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `siteoptions` */

insert  into `siteoptions`(`google_clientID`,`google_clientSecret`,`calendarId`,`mainLogo`,`mainTitle`,`mainColor`,`textColor`) values 
('824759442784-r0k46r4upq85u4jd45n1cmd96hl5903i.apps.googleusercontent.com','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','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','resources/theLogo.png','CITY VET PANABO','#007BFF','#007BFF');

/*Table structure for table `timeslot` */

DROP TABLE IF EXISTS `timeslot`;

CREATE TABLE `timeslot` (
  `slotId` varchar(100) NOT NULL,
  `timeSlot` varchar(100) DEFAULT NULL,
  `slotsAvailable` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `startTime` varchar(100) DEFAULT NULL,
  `endTime` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`slotId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `userid` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`userid`,`username`,`password`,`role`,`fullname`) values 
('DOC-6B08515EAB33D','valientedogawa@gmail.com','valientedogawa@gmail.com','DOCTOR','Ayms Val'),
('DOC-ED2B182699D59','emilanasco1@gmail.com','emilanasco1@gmail.com','DOCTOR','Emil Añasco'),
('USER0001','kenjiacido26@gmail.com','$1$6XfVdlQw$RDy74tYnF9SUK8mcLV6CL.','admin','ALMA HECHANOVA'),
('USER0002','tradebryant@gmail.com','tradebryant@gmail.com','admin','MASTER ADMIN'),
('USR-09C4FB0F94BC7','valienteimxkwerd@gmail.com','valienteimxkwerd@gmail.com','CLIENT','Imee Valiente'),
('USR-9C6CBD0251315','delacerna.maricris@dnsc.edu.ph','delacerna.maricris@dnsc.edu.ph','CLIENT','MARICRIS DELACERNA'),
('USR-BC1DEF7310CF5','acido.kenjirey@dnsc.edu.ph','acido.kenjirey@dnsc.edu.ph','CLIENT','Kenji rey Acido'),
('USR-DA7EB560E0F45','marsravelous327@gmail.com','marsravelous327@gmail.com','CLIENT','Maricris Dela Cerna');

/*Table structure for table `vaccine` */

DROP TABLE IF EXISTS `vaccine`;

CREATE TABLE `vaccine` (
  `vaccineId` varchar(100) NOT NULL,
  `vaccineName` varchar(100) DEFAULT NULL,
  `vaccineRemarks` text DEFAULT NULL,
  PRIMARY KEY (`vaccineId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `vaccine` */

/*Table structure for table `vaccineqrecords` */

DROP TABLE IF EXISTS `vaccineqrecords`;

CREATE TABLE `vaccineqrecords` (
  `recordId` varchar(100) NOT NULL,
  `vaccineId` varchar(100) DEFAULT NULL,
  `dosage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`recordId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `vaccineqrecords` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

/*
SQLyog Community v12.4.0 (64 bit)
MySQL - 10.6.21-MariaDB-cll-lve : Database - cityvetdb
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
('APPBEDD76189E0D0','2025-02-24','S5','1740364363','2025-02-24','PENDING',NULL,NULL,'USR-9C6CBD0251315','relapse',NULL,NULL,NULL,'ONLINE'),
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
('MED02328FA1D9C78','2025-03-20 08:39:43','Walk-in','PET723570707BAC7','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Checkup','','','USER0001'),
('MED056FF870F005C','2025-03-13 13:40:14','Walk-in','PETD4A0F6DAF001C','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','RABISIN','USER0001'),
('MED07C95F278B5D4','2025-03-13 15:39:42','Walk-in','PET192110E59FC91','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Checkup','','','USER0001'),
('MED0BC27B27824E6','2025-03-13 08:18:16','Walk-in','PET0D5AE988886A1','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MED0D7103D14D228','2025-03-12 11:18:39','Walk-in','PET7402CD79556D9','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MED0F1191E8588F2','2024-12-02 14:49:40','Walk-in','PET260409693D043','CVXCVCXV','VCXCV','CXVXCVC','Checkup','CVXCVX','CVXCVXC','DOC-6B08515EAB33D'),
('MED11ADED6522A3B','2025-03-13 09:24:37','Walk-in','PET6677F98E6FF61','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MED12F2F678BA336','2025-03-13 08:18:49','Walk-in','PETEEE4369771003','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MED1647E12CEF2B9','2025-03-12 11:04:04','Walk-in','PET5D4850201E01F','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MED19793CB3AE3C9','2025-03-12 11:18:01','Walk-in','PET60E5C21C55555','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MED1CD18F55D65FB','2025-03-12 11:17:26','Walk-in','PET60E5C21C55555','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MED1F3F34674794A','2025-03-13 08:38:06','Walk-in','PETC1277FFDB81F0','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MED1F5DC631AEB59','2025-03-23 15:18:02','Walk-in','PETEA97604E59054','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','Anti-Rabies Vaccination','USER0001'),
('MED1F75DBDE880AA','2025-03-20 08:38:53','Walk-in','PET6866A0AB05F9A','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Checkup','','','USER0001'),
('MED23FCFA83CD0D0','2025-03-19 10:14:11','Walk-in','PET33F8744D390A4','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Checkup','','','USER0001'),
('MED2B252F131B0C2','2025-03-19 10:15:04','Walk-in','PET33F8744D390A4','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Checkup','','','USER0001'),
('MED2FB79B84119BA','2025-03-13 08:42:27','Walk-in','PET5CE4C8F0756FC','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MED32207E40FAE58','2025-03-23 15:18:25','Walk-in','PETF8F98DFFEA49E','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','Anti-Rabies Vaccination','USER0001'),
('MED376C491C1AEB7','2025-03-20 08:45:53','Walk-in','PET9B5A37EAFAA4B','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MED3B150A9AC70D9','2025-03-12 11:12:26','Walk-in','PETD0B2051DA058A','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MED3B20D5A68DA9A','2025-03-12 08:53:19','Walk-in','PET89E9842FCF20E','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MED3F01058A827D9','2025-03-12 13:14:31','Walk-in','PET531AC5D07C68A','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MED412FFD1DE57BB','2025-03-23 15:10:52','Walk-in','PETEAF098005ACC2','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','Anti-Rabies Vaccination','USER0001'),
('MED445804B2AC591','2025-03-12 11:06:28','Walk-in','PET13342F9976F83','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MED48EEB1A426E71','2025-03-23 15:00:06','Walk-in','PETB3BFE78A612A9','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','Anti-Rabies Vaccination','USER0001'),
('MED4A5DE7E7D5EED','2025-02-18 21:25:47','Online','PETABABC6B6B484C','fqwfqwg','gqgw','qwfqwa','Vaccination','fw3g','qfqw','DOC-ED2B182699D59'),
('MED4C541FA35FEDE','2025-03-13 08:30:24','Walk-in','PETFB04DDA6B5028','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Checkup','','','USER0001'),
('MED4C5A8F40B67ED','2024-11-28 11:30:09','Online','PET8BBB5CA5FADE5','Okay okay okay','Luya, sigeg higda, won\'t eat properly','Pa adto-a na diri sa Vet aron matagaan nag treatment','Vaccination','LEG FRACTURE','Vaccine ','DOC-6B08515EAB33D'),
('MED4E3467422CE50','2024-12-03 01:21:38','Walk-in','PETE4DC61E1C57FB','<p><b>PALITAN OG ANTI-BIOTIC:</b></p><p><b>- AMOXICILLIN</b></p><p><b>- PARACETAMOL</b></p>','Sigeg suka','AYAW SA BUHI-E SA ENVIRONMENT NIYA','Vaccination','Severe','Vaccine','DOC-6B08515EAB33D'),
('MED51EEE24C8F1BE','2025-03-23 15:17:34','Walk-in','PETDB506A8627CAB','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','Anti-Rabies Vaccination','USER0001'),
('MED5A7C887832129','2025-03-12 10:56:22','Walk-in','PET78602C24C5666','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MED5B3125BECCBA0','2025-03-12 11:08:52','Walk-in','PET2590DB8ECE3EC','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MED5F952AC05A1EF','2024-12-03 13:35:26','Online','PET4C0E47BCB07EE','Buy antibiotic','Suka','Okok','Checkup','Vaccine','Vaccine','DOC-6B08515EAB33D'),
('MED60445742DC86F','2025-03-13 08:33:18','Walk-in','PET5F32FC4613A01','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MED6EA33FCC5C730','2025-03-12 14:17:49','Walk-in','PETE3AF51E84400D','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MED71DB205618713','2025-03-23 15:43:48','Walk-in','PET4C190196241FF','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','Anti-Rabies Vaccination','USER0001'),
('MED76E5C7B487F67','2025-03-12 11:10:06','Walk-in','PET78602C24C5666','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MED7A79A2C7034C8','2025-03-23 15:52:21','Walk-in','PETD0612E7AE3C7E','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','Anti-Rabies Vaccination','USER0001'),
('MED805194476246B','2025-03-13 14:44:54','Walk-in','PET723570707BAC7','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Checkup','','','USER0001'),
('MED81482173F5C06','2025-02-27 16:00:26','Online','PET06923F896597D','<p>CHAR CHAR -&nbsp;<span style=\"font-size: 1rem;\">ONCE A DAY</span></p><p>AMOXICILLIN - 2 WEEKS</p>','Kalibanga','<br>','Checkup','nakakaon ug baki','TAWA TAWA GATORADE','USER0001'),
('MED83A678CA38526','2025-03-23 15:23:35','Walk-in','PETF5A19613CB938','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','Anti-Rabies Vaccination','USER0001'),
('MED86B34DD94643C','2025-03-23 15:03:22','Walk-in','PET9A490D0B6618F','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','Anti-Rabies Vaccination','USER0001'),
('MED87BB4E9BD9245','2025-03-12 11:20:32','Walk-in','PETD0B2051DA058A','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MED89BC162358984','2025-03-13 15:36:52','Walk-in','PET1DAC4F99B9B9A','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Checkup','','','USER0001'),
('MED8AE496BA6FE0A','2025-03-13 13:20:30','Walk-in','PET8530014789CE9','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MED8AF30249358AC','2025-03-12 11:13:28','Walk-in','PETB00E03B8A2CBD','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MED8B576BB6D1BFD','2024-10-30 15:01:53','Online','PET4C0E47BCB07EE','<p>SAMPLE PRESCRIPTION</p><ul><li>PARACETAMOL 3X A DAY</li><li>CARBOCEISTINE 2X A WEEK</li></ul>','SIGE SUKA','                    \r\n                  ','Checkup','SUKA TAS HALHAL','EUTHANIZE NANI','DOC-ED2B182699D59'),
('MED8E7E7F8983061','2025-03-12 11:19:49','Walk-in','PET07C8563693E87','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MED8EE6636F9E4DF','2025-03-12 11:10:46','Walk-in','PETA679C67344367','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MED9F715599DB30F','2025-03-12 10:56:43','Walk-in','PETA679C67344367','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MEDA216635E40164','2025-03-12 10:57:31','Walk-in','PET53439531F03B9','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MEDADF44A0B0A3D7','2025-03-19 10:10:09','Walk-in','PET193B4438C2DE0','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MEDB393146543247','2025-03-23 15:05:59','Walk-in','PET55DBE438252F8','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','Anti-Rabies Vaccination','USER0001'),
('MEDB76FE4B70BAF9','2025-03-19 10:24:04','Walk-in','PET7E7B1FBAE5EEE','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Checkup','','','USER0001'),
('MEDB84E8C89CEA75','2025-03-23 15:08:33','Walk-in','PETFD69B86838AE0','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','Anti-Rabies Vaccination','USER0001'),
('MEDBACF5F0EC93BB','2025-03-12 12:43:49','Walk-in','PETB470B565516D8','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Checkup','','','USER0001'),
('MEDBDC2ED23FE65F','2025-03-12 10:57:10','Walk-in','PET13342F9976F83','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MEDBF2B7840CE93E','2025-03-19 10:20:44','Walk-in','PET7294741B15FCF','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MEDBFEFEED893BE1','2025-03-19 10:28:38','Walk-in','PETDDE1383A07BD4','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MEDC3275A6D8E134','2025-03-13 08:49:35','Walk-in','PET02E6E7F434DF3','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MEDC4A84FE8CCC0C','2024-10-30 15:05:07','Walk-in','PET4CCCC8999BBBE','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Checkup','AMBOT','','USER0001'),
('MEDC5752FC554882','2025-03-23 15:13:52','Walk-in','PET7386C7044B0C3','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','RABISIN','USER0001'),
('MEDC770C742343F1','2025-03-23 15:46:42','Walk-in','PET894FF756FAA1A','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','RABISIN','USER0001'),
('MEDC928299623F4F','2025-03-20 08:42:32','Walk-in','PET47BBFEC3C720E','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MEDCA1B5C0B5DC9D','2025-03-12 11:21:07','Walk-in','PETB00E03B8A2CBD','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MEDCCD174478E5BB','2025-03-23 15:50:26','Walk-in','PETC953F687F8047','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','Anti-Rabies Vaccination','USER0001'),
('MEDD0DF473889F9A','2025-03-12 08:54:02','Walk-in','PETD7EE349E003E5','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MEDD25BD3AADCD73','2025-03-13 13:27:18','Walk-in','PET327DED607802C','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','RABISIN','USER0001'),
('MEDD29E28D03B41B','2025-03-12 11:07:45','Walk-in','PET53439531F03B9','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MEDD4AF0786F073D','2025-02-28 08:31:23','Walk-in','PET3BD22D544C6CA','amox','allergy','                    \r\n                  ','Checkup','meds','meds','DOC-ED2B182699D59'),
('MEDD4BC8DB002B22','2025-03-23 15:20:44','Walk-in','PETE878ADF16FAAE','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','Anti-Rabies Vaccination','USER0001'),
('MEDD70CDDB00E3BE','2024-11-25 14:01:32','Walk-in','PET64205AE51E8B4','palit og tambal&nbsp;','sakit ang tyan','test','Checkup','nakakaon ug baki','gipainom ug solution pangsuka sa gikaon na poison','DOC-ED2B182699D59'),
('MEDD80E07648C7C4','2025-03-12 14:15:39','Walk-in','PET9E9976072547A','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MEDD94CEDC3A53CB','2025-03-13 15:37:11','Walk-in','PET4A104FEA06DCA','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Checkup','','','USER0001'),
('MEDDAA219A2E2C27','2024-12-02 14:16:33','Walk-in','PET80765088943DD','OKI','KALIBANGA, RED OG IHI','ADTO LANG','Anti Rabies','ANTI-RABIES','VACCINATION','DOC-6B08515EAB33D'),
('MEDDBEAF75F73C62','2025-03-13 13:09:27','Walk-in','PET234581B78C3D1','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','RABISIN','USER0001'),
('MEDDC39E15F81094','2025-01-09 12:19:54','Online','PETBE580AC085360','vwv','cwevw','vwvw','Anti Rabies','cwe','vrw','DOC-ED2B182699D59'),
('MEDDFDAD243A1FFC','2025-03-12 11:11:59','Walk-in','PET07C8563693E87','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MEDE1B259F09A6BB','2024-12-02 14:20:54','Online','PET7C5F2EBD3DEA5','BUY PARACETAMOL','KALIT RAG KATAWA','OK','Checkup','NAAY BULATI ANG POOP','TAKE ANTIBIOTIC','DOC-6B08515EAB33D'),
('MEDE5F57480514A2','2025-03-12 12:58:10','Walk-in','PET6C025DBE9C987','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Checkup','','','USER0001'),
('MEDE8FE773B86B76','2025-01-09 12:12:40','Walk-in','PET7953C75F1A125','<p>Bioflu</p><p>Ranitidine</p>','<u>Sige ug suka and kalibang</u>','monitor and make sure that merat drinks her medicine on time','Checkup','X-rays and Screen Urinalysis','Buy medicine and avail x-ray services and screening','DOC-ED2B182699D59'),
('MEDEC1926AF8B665','2025-03-23 15:28:07','Walk-in','PETAD6FAB48E8EC5','                    \r\n                  ','BLOOD STOOL','                    \r\n                  ','Checkup','LUYA, DILI MO KAON','SHOULD INTAKE MEDICINE ','USER0001'),
('MEDEC2AFC324BCAC','2025-03-19 10:17:40','Walk-in','PETC3B58E575FC41','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
('MEDEC3C8E34E41D2','2025-03-13 08:15:06','Walk-in','PET234581B78C3D1','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MEDEF7B642F1AF01','2025-03-23 15:38:22','Walk-in','PETF4EA46FD2AAF1','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','Anti-Rabies Vaccination','USER0001'),
('MEDF1C0F3582805D','2025-03-23 15:36:15','Walk-in','PET00F7D579C82F8','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','Anti-Rabies Vaccination','USER0001'),
('MEDF1FACF286C9D6','2025-03-12 14:10:24','Walk-in','PET862313D9B586F','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Anti Rabies','','','USER0001'),
('MEDF21DE9729EFA7','2024-11-25 14:02:47','Walk-in','PET64205AE51E8B4','okjokj','kjkjk','jjhkjh','Checkup','nakakaon ug baki','gipainom ug solution pangsuka sa gikaon na poison','DOC-ED2B182699D59'),
('MEDF8FF483D2694E','2024-11-28 18:19:15','Walk-in','PET7E9B7C973A5BA','Ali na sa City Vet','Luya kaayu, halos dili na mo bangon aron mo kaon&nbsp;','Adto na lang sa City Vet para sa treatment.','Checkup','Gibugnug irong buang','Admit','DOC-6B08515EAB33D'),
('MEDF940E776ABECB','2025-03-12 10:56:03','Walk-in','PET2590DB8ECE3EC','                    \r\n                  ','                    \r\n                  ','                    \r\n                  ','Vaccination','','','USER0001'),
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
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('MED00389026FB978','2',27,'PETABABC6B6B484C','5','2025-02-15 01:41:58'),
('MED81482173F5C06','3',28,'PET06923F896597D','1','2025-02-27 16:00:26'),
('MEDD4AF0786F073D','10',29,'PET3BD22D544C6CA','28','2025-02-28 08:31:23'),
('MED445804B2AC591','10',30,'PET13342F9976F83','8','2025-03-12 11:06:28'),
('MEDD29E28D03B41B','10',31,'PET53439531F03B9','8','2025-03-12 11:07:45'),
('MED5B3125BECCBA0','10',32,'PET2590DB8ECE3EC','8','2025-03-12 11:08:52'),
('MED76E5C7B487F67','10',33,'PET78602C24C5666','8','2025-03-12 11:10:06'),
('MED8EE6636F9E4DF','10',34,'PETA679C67344367','8','2025-03-12 11:10:46'),
('MED19793CB3AE3C9','2',35,'PET60E5C21C55555','32','2025-03-12 11:18:01'),
('MED0D7103D14D228','2',36,'PET7402CD79556D9','32','2025-03-12 11:18:39'),
('MED8E7E7F8983061','2',37,'PET07C8563693E87','8','2025-03-12 11:19:49'),
('MED87BB4E9BD9245','2',38,'PETD0B2051DA058A','8','2025-03-12 11:20:32'),
('MEDCA1B5C0B5DC9D','2',39,'PETB00E03B8A2CBD','27','2025-03-12 11:21:07'),
('MEDF1FACF286C9D6','2',40,'PET862313D9B586F','25','2025-03-12 14:10:24'),
('MEDD80E07648C7C4','2',41,'PET9E9976072547A','25','2025-03-12 14:15:39'),
('MED6EA33FCC5C730','2',42,'PETE3AF51E84400D','25','2025-03-12 14:17:49'),
('MEDEC3C8E34E41D2','2',43,'PET234581B78C3D1','8','2025-03-13 08:15:06'),
('MED0BC27B27824E6','1',44,'PET0D5AE988886A1','5','2025-03-13 08:18:16'),
('MED12F2F678BA336','1',45,'PETEEE4369771003','5','2025-03-13 08:18:49'),
('MED60445742DC86F','1',46,'PET5F32FC4613A01','32','2025-03-13 08:33:18'),
('MED1F3F34674794A','2',47,'PETC1277FFDB81F0','25','2025-03-13 08:38:06'),
('MED2FB79B84119BA','2',48,'PET5CE4C8F0756FC','27','2025-03-13 08:42:27'),
('MEDC3275A6D8E134','2',49,'PET02E6E7F434DF3','34','2025-03-13 08:49:35'),
('MED11ADED6522A3B','1',50,'PET6677F98E6FF61','8','2025-03-13 09:24:37'),
('MEDDBEAF75F73C62','2',51,'PET234581B78C3D1','8','2025-03-13 13:09:27'),
('MED8AE496BA6FE0A','1',52,'PET8530014789CE9','5','2025-03-13 13:20:30'),
('MEDD25BD3AADCD73','2',53,'PET327DED607802C','8','2025-03-13 13:27:18'),
('MED056FF870F005C','2',54,'PETD4A0F6DAF001C','28','2025-03-13 13:40:14'),
('MEDADF44A0B0A3D7','1',55,'PET193B4438C2DE0','8','2025-03-19 10:10:09'),
('MED2B252F131B0C2','2',56,'PET33F8744D390A4','34','2025-03-19 10:15:04'),
('MEDEC2AFC324BCAC','10',57,'PETC3B58E575FC41','15','2025-03-19 10:17:40'),
('MEDBF2B7840CE93E','10',58,'PET7294741B15FCF','15','2025-03-19 10:20:44'),
('MEDBFEFEED893BE1','2',59,'PETDDE1383A07BD4','24','2025-03-19 10:28:38'),
('MED1F75DBDE880AA','10',60,'PET6866A0AB05F9A','34','2025-03-20 08:38:53'),
('MED02328FA1D9C78','10',61,'PET723570707BAC7','8','2025-03-20 08:39:43'),
('MEDC928299623F4F','8',62,'PET47BBFEC3C720E','8','2025-03-20 08:42:32'),
('MED376C491C1AEB7','2',63,'PET9B5A37EAFAA4B','8','2025-03-20 08:45:53'),
('MED48EEB1A426E71','2',64,'PETB3BFE78A612A9','27','2025-03-23 15:00:06'),
('MED86B34DD94643C','2',65,'PET9A490D0B6618F','26','2025-03-23 15:03:22'),
('MEDB393146543247','2',66,'PET55DBE438252F8','27','2025-03-23 15:05:59'),
('MEDB84E8C89CEA75','2',67,'PETFD69B86838AE0','5','2025-03-23 15:08:33'),
('MED412FFD1DE57BB','2',68,'PETEAF098005ACC2','27','2025-03-23 15:10:52'),
('MEDC5752FC554882','10',69,'PET7386C7044B0C3','28','2025-03-23 15:13:52'),
('MED51EEE24C8F1BE','2',70,'PETDB506A8627CAB','28','2025-03-23 15:17:34'),
('MED1F5DC631AEB59','2',71,'PETEA97604E59054','28','2025-03-23 15:18:02'),
('MED32207E40FAE58','2',72,'PETF8F98DFFEA49E','28','2025-03-23 15:18:25'),
('MEDD4BC8DB002B22','2',73,'PETE878ADF16FAAE','25','2025-03-23 15:20:44'),
('MED83A678CA38526','2',74,'PETF5A19613CB938','28','2025-03-23 15:23:35'),
('MEDEC1926AF8B665','11',75,'PETAD6FAB48E8EC5','8','2025-03-23 15:28:07'),
('MEDF1C0F3582805D','2',76,'PET00F7D579C82F8','36','2025-03-23 15:36:15'),
('MEDEF7B642F1AF01','2',77,'PETF4EA46FD2AAF1','25','2025-03-23 15:38:22'),
('MED71DB205618713','2',78,'PET4C190196241FF','30','2025-03-23 15:43:48'),
('MEDC770C742343F1','10',79,'PET894FF756FAA1A','32','2025-03-23 15:46:42'),
('MEDCCD174478E5BB','2',80,'PETC953F687F8047','32','2025-03-23 15:50:26'),
('MED7A79A2C7034C8','2',81,'PETD0612E7AE3C7E','25','2025-03-23 15:52:21');

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
('CL-05C173A42701F','Mintocel','O.','Cheng','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Santo NiÃ±o (Poblacion)','Prk. Durian','(+63) 9123456789','WALK IN','1983-08-28','Female','DONE UPDATE','34'),
('CL-06D8669647A30','Lenard','M.','Baragil','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Purok Langka','(+63) 9857625331','WALK IN','1998-07-18','Male','DONE UPDATE','8'),
('CL-0AC7D00657CA1','Andrea','Q','Galaura','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Purok 1 ','(+63) 9455009267','WALK IN','1995-06-22','Female','DONE UPDATE','8'),
('CL-0AC83C413E465','HONEY','S','SANCHEZ','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','PUROK 2 GREDU','(+63) 9307492240','WALK IN','1978-01-23','Female','DONE UPDATE','8'),
('CL-0E7D7658F7FA6','Randy','Tolentino','Domingo','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Cagangohan','Prk. Kasoy, Niceville subd. Brgy Cagangohan, Panabo City','(+63) 9662333559','WALK IN','2004-04-04','Male','DONE UPDATE','5'),
('CL-0EBCB0B39AFDE','Ronia','D.','Caboz','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Prk. Langka','(+63) 9389189160','WALK IN','1981-07-11','Female','DONE UPDATE','8'),
('CL-103472D4677C5','Anita','A.','Leopardas','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Cagangohan','Prk. Sereguellas','(+63) 9851927163','WALK IN','1965-10-15','Female','DONE UPDATE','5'),
('CL-112606A06D29A','Jk','Fidellega','Torremocha','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Prk. Kasoy, Niceville subd. Brgy Cagangohan, Panabo City','(+63) 9097547152','WALK IN','2002-12-05','Male','DONE UPDATE','8'),
('CL-13B192E90E355','NORMA','A','TANO','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Vicente','PUROK 1 SAN VICENTE','(+63) 9305327080','WALK IN','1958-08-20','Female','DONE UPDATE','32'),
('CL-1C3C04853A3D4','Royce','P.','Octaviano','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Vicente','Purok 25','(+63) 9914341213','WALK IN','1988-01-11','Female','DONE UPDATE','32'),
('CL-1EBFE77D0329E','Agatha','V.','Ebang','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','J.P. Laurel','Prk. Sentro 1','(+63) 9123456789','WALK IN','1969-11-11','Female','DONE UPDATE','9'),
('CL-1FAF95D2FB23B','Carillo','D','Gaviola','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Salvacion','Purok 1 Salvacion','(+63) 9101745946','WALK IN','1951-08-01','Male','DONE UPDATE','27'),
('CL-2058AA541CFC8','Amelita','B','Yanong','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Francisco (Poblacion)','San Francisco','(+63) 9203330062','WALK IN','1979-01-11','Female','DONE UPDATE','28'),
('CL-22D63CE16E4DF','Alexa','B','Solon','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Prk. Talong','(+63) 9519164693','WALK IN','2004-08-29','Female','DONE UPDATE','8'),
('CL-24C885CF5C9F6','Grace','M.','Gascon','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Salvacion','Prk6','(+63) 9514073168','WALK IN','1990-11-23','Female','DONE UPDATE','27'),
('CL-26F1AAEFC47B5','Kenneth','B','Limusnero','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Crystal Plain','(+63) 9486334341','WALK IN','2005-03-21','Male','DONE UPDATE','8'),
('CL-2729F63C7F999','Reyann','T.','Canete','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Visayas','Purok 6','(+63) 9923962573','WALK IN','2001-10-29','Female','DONE UPDATE','25'),
('CL-2E63C1F25E17B','Epi','E','Denile','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Crystal Plain','(+63) 9083920978','WALK IN','1964-02-23','Female','DONE UPDATE','8'),
('CL-37AB2687A6FB2','Janice ','N','De Castro','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Salvacion','Salvacion','(+63) 9612739410','WALK IN','1983-01-29','Female','DONE UPDATE','27'),
('CL-3C5D76109D7D2','Leslie Joy','G','Lucenio','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Salvacion','Salvacion','(+63) 9657825569','WALK IN','1998-10-10','Female','DONE UPDATE','27'),
('CL-3DDF0D0777205','ROGELIO','A','LUMAPAS','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Francisco (Poblacion)','PUROK 1 SAN FRANCISO','(+63) 9472741695','WALK IN','1992-06-07','Male','DONE UPDATE','28'),
('CL-3F82DDABB9DD9','Jerra Mae','','Salinas','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Visayas','Purok 17 Villarosa','(+63) 9033783905','WALK IN','1991-06-17','Female','DONE UPDATE','25'),
('CL-42EF22A8ECCA8','Noreen','R.','Lucarisa','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Prk. Cabbage','(+63) 9911929597','WALK IN','1988-01-24','Female','DONE UPDATE','8'),
('CL-44798336FDAC7','Teresa','S.','Sandig','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Little Panay','Purok 5','(+63) 9441630996','WALK IN','1948-08-11','Female','DONE UPDATE','15'),
('CL-457C9665F7D72','Roselyn','M.','Aviso','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Visayas','Prk 4','(+63) 9106716163','WALK IN','1972-01-17','Female','DONE UPDATE','25'),
('CL-45D6F28B87F5C','Marian','M.','Recomes','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Salvacion','Prk2','(+63) 9079034847','WALK IN','2001-12-09','Female','DONE UPDATE','27'),
('CL-4852986C446D9','Jeremy','N.','Tanong','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Francisco (Poblacion)','Purok 1 ','(+63) 9700930761','WALK IN','1970-12-22','Male','DONE UPDATE','28'),
('CL-4957729FD6BDA','Jenny','','Tampipi','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Salvacion','Prk 5','(+63) 9107559132','WALK IN','1989-12-10','Female','DONE UPDATE','27'),
('CL-5068BD388491D','Jhon','R.','Membreve','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Salvacion','Purok 1 ','(+63) 9705482895','WALK IN','1989-01-23','Male','DONE UPDATE','27'),
('CL-517A8AD65D4FC','Maricris','A.','Roquin','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Santo NiÃ±o (Poblacion)','Prk4','(+63) 9911296468','WALK IN','1986-12-14','Female','DONE UPDATE','34'),
('CL-51D0B2201D3B9','Edgar','Y.','Castardo','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Pandan (Pob.)','Purok 1 ','(+63) 9461823819','WALK IN','1978-01-26','Male','DONE UPDATE','24'),
('CL-523877AEDB51E','Emma','A.','Ramer','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Little Panay','Prk 1B','(+63) 9517635571','WALK IN','1979-01-13','Female','DONE UPDATE','15'),
('CL-53DFCD5E2C23F','Michelle','','Decillo','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Francisco (Poblacion)','prk 4 a','(+63) 0905881797','WALK IN','1993-10-07','Female','DONE UPDATE','28'),
('CL-5A8D10A4CBABC','Aron','R.','Navarro','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Visayas','Prk Caimito','(+63) 9123456789','WALK IN','1986-07-03','Male','DONE UPDATE','25'),
('CL-5BB26BC6E8543','Erwin','B.','Rowell','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Vicente','Purok 1 ','(+63) 9123456789','WALK IN','2002-03-16','Male','DONE UPDATE','32'),
('CL-5DC1B1F1D620E','Ritchielo','','Menjoda','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Purok Cabbage','(+63) 9757535280','WALK IN','1989-03-22','Female','DONE UPDATE','8'),
('CL-5DEC15821E0C0','Janice','','Lumacod','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Southern Davao','Purok 1 ','(+63) 9302954388','WALK IN','2022-12-11','Female','DONE UPDATE','36'),
('CL-60E236185E022','Teresa','','Mangjag','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Francisco (Poblacion)','san francisco','(+63) 9662333559','WALK IN','1984-12-27','Female','DONE UPDATE','28'),
('CL-617A9FB3A3195','Gemma','F.','Pulgo','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Vicente','Purok 1 ','(+63) 9514112200','WALK IN','1965-01-16','Female','DONE UPDATE','32'),
('CL-61CF52353C074','Kristina','','Valiente','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','A. O. Floirendo','PUROK 5 Manay 3','(+63) 9662333559','WALK IN','2000-03-31','Female','DONE UPDATE','1'),
('CL-681199BF5FD26','Janeth','F.','Lumacad','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Francisco (Poblacion)','Purok 1 ','(+63) 9163648402','WALK IN','1974-06-12','Female','DONE UPDATE','28'),
('CL-6AC13F5941200','GENITA','T','GESTA','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Vicente','PUROK 1 SAN VICENTE','(+63) 9093993991','WALK IN','1962-09-09','Female','DONE UPDATE','32'),
('CL-6FA9439A3A638','Maricel','','Salgada','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Southern Davao','Purok4','(+63) 9911301329','WALK IN','1990-04-16','Female','DONE UPDATE','36'),
('CL-70F32E5FAEA01','Annabelle','S.','Acosta','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Vicente','Purok2','(+63) 9554178817','WALK IN','1974-07-13','Female','DONE UPDATE','32'),
('CL-76169F821E4AE','Mangallon','','Ma. Corazon','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Vicente','Prk 4','(+63) 9662333559','WALK IN','1991-11-11','Female','DONE UPDATE','32'),
('CL-76DB39FBFECA7','Kuh','E.','Fuentes','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Cagangohan','Prk. Marang','(+63) 9393406765','WALK IN','1988-07-13','Female','DONE UPDATE','5'),
('CL-79291AE7C4E0D','Andida','V.','Agonio','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Maduao','Purok 6','(+63) 9912913082','WALK IN','1972-12-01','Male','DONE UPDATE','18'),
('CL-7EE3DC448ECB3','Jannel','','Meroles','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Crystal Plain','(+63) 9107742897','WALK IN','1978-08-01','Male','DONE UPDATE','8'),
('CL-8813F71A4DA7F','CHRISTINE','S','TOREJAS','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Francisco (Poblacion)','San Francisco','(+63) 9912252425','WALK IN','1981-04-02','Female','DONE UPDATE','28'),
('CL-885056EF6675C','Cres','T','Alabas','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Pandan (Pob.)','Prk. Liberty','(+63) 9662333559','WALK IN','1987-06-27','Male','DONE UPDATE','24'),
('CL-8C0C52848C34F','Archie','','Sepulvida','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Cagangohan','Purok Marang','(+63) 9486334021','WALK IN','1980-11-02','Male','DONE UPDATE','5'),
('CL-8D340BFE90973','Mark','M.','Eliotero','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Prk. Gabi','(+63) 9662333559','WALK IN','1998-02-15','Male','DONE UPDATE','8'),
('CL-912A74E0635D9','Gema','O.','Quino','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Visayas','Purok 1 ','(+63) 9123456789','WALK IN','1990-06-15','Female','DONE UPDATE','25'),
('CL-926E19D04D5AF','Renato','C.','Talo','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Francisco (Poblacion)','Prk 4A','(+63) 9123456789','WALK IN','1961-07-19','Male','DONE UPDATE','28'),
('CL-96A37E234F7F7','Valerie','P.','Calacat','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Everlasting','(+63) 9266886444','WALK IN','2001-02-27','Female','DONE UPDATE','8'),
('CL-97BAE96867F95','Ailyn','B','Lorca','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Visayas','Purok 2','(+63) 9196504051','WALK IN','1965-04-24','Female','DONE UPDATE','25'),
('CL-98FD0B262999C','Jasmine Joy','L.','Villaze','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Purok 1 ','(+63) 0947265024','WALK IN','1998-09-30','Female','DONE UPDATE','8'),
('CL-9C7971F4A9176','Lysander','V.','Gran','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Francisco (Poblacion)','Purok 1 ','(+63) 9123456789','WALK IN','1987-10-10','Male','DONE UPDATE','28'),
('CL-9E8F4B8C1DD0A','Emma','B.','Sagon','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Visayas','Prk. 14','(+63) 9488635175','WALK IN','1987-12-07','Female','DONE UPDATE','25'),
('CL-A01E03F1F3E32','Paquito','E.','Relox','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Visayas','Purok 1 ','(+63) 9123456789','WALK IN','1995-02-11','Male','DONE UPDATE','25'),
('CL-A18BDFFF7D8CA','MARI','CERNA','DELA CERNA','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Cacao','VILLAGE, 094, 2','(+63) 9191919191','WALK IN','2003-03-11','Female','DONE UPDATE','4'),
('CL-A4465A0F5649C','Joseph Matt','Fuentes','Biay','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Visayas','Northern Plain, Lily Street block 12, lot 12','(+63) 9662333559','WALK IN','2002-06-16','Male','DONE UPDATE','25'),
('CL-A515417FCF54D','Christian','O.','Senajon','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Upper Licanan','Prk 2','(+63) 9382929039','WALK IN','2002-12-24','Male','DONE UPDATE','39'),
('CL-A5D23166C3E24','Mary Lou','A.','Arana','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Vicente','Prk. 1','(+63) 9123456789','WALK IN','1980-08-25','Female','DONE UPDATE','32'),
('CL-A6990E958B231','Chona','D.','Albona','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Katipunan','Prk 1','(+63) 9662333559','WALK IN','1963-10-18','Female','DONE UPDATE','11'),
('CL-A70F25E297F80','Hero','Dash','Verteculazo','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','A. O. Floirendo','FLOIRENDO, 045, Purok 2','(+63) 9182093483','WALK IN','2001-11-12','Male','DONE UPDATE','1'),
('CL-A788D2B685CC4','Alma','N.','Sandig','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Little Panay','Purok 1 ','(+63) 9123456789','WALK IN','1967-05-11','Female','DONE UPDATE','15'),
('CL-A959A5B55152A','Kian','','Bajara','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Purok 1 ','(+63) 9945503497','WALK IN','2002-08-12','Male','DONE UPDATE','8'),
('CL-A9E13B4C26868','Mary Grace','M.','Singson','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Visayas','Prk4','(+63) 9304586049','WALK IN','1986-09-30','Female','DONE UPDATE','25'),
('CL-ABC0813CEB98D','Luz','M','Depocitario','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Francisco (Poblacion)','Purok 4-A','(+63) 9206168096','WALK IN','1959-07-30','Female','DONE UPDATE','28'),
('CL-AC230D0B638F3','Junny','V.','Bughaw','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Purok Cabage','(+63) 9079943106','WALK IN','2007-04-04','Male','DONE UPDATE','8'),
('CL-AF0C0C73ABC05','RUDA MAE','S','GOMEZ','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Pandan (Pob.)','New Pandan','(+63) 9927722539','WALK IN','1992-03-04','Female','DONE UPDATE','24'),
('CL-AF4B1DC4D48B0','Christian','C.','Lim','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Santo NiÃ±o (Poblacion)','Bongkawil','(+63) 9484339810','WALK IN','2000-12-04','Male','DONE UPDATE','34'),
('CL-B1EA4181C6216','Alfeo','G.','Jumiega','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Prk. Daisy','(+63) 9397585814','WALK IN','2024-12-21','Male','DONE UPDATE','8'),
('CL-B2603F535D63C','Mary Anne Tonethe','','Talisay','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Malaga (Dalisay)','Prk2','(+63) 9922014245','WALK IN','2001-09-08','Female','DONE UPDATE','22'),
('CL-B29C2C7C6060D','Rosana','C.','Cabardo','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Southern Davao','Palayan','(+63) 9166080693','WALK IN','1980-11-11','Female','DONE UPDATE','36'),
('CL-B31A1FC445256','WILLIAM','B','LEGASPI','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Visayas','PUROK 18 NEW VISAYAS','(+63) 9123456789','WALK IN','1975-11-24','Male','DONE UPDATE','25'),
('CL-B339B9A970282','Maria Rayve','','Fernandez','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Kauswagan','Purok 1 ','(+63) 9281870712','WALK IN','1980-10-29','Female','DONE UPDATE','13'),
('CL-B3FD9E2D52595','Aloha','R.','Dalgo','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Vicente','Prk. 2','(+63) 0932318623','WALK IN','1984-12-20','Female','DONE UPDATE','32'),
('CL-B4EDA3902E5EF','Alona','L','Ambasan','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Vicente','Prk2','(+63) 0930734764','WALK IN','1996-12-07','Female','DONE UPDATE','32'),
('CL-B54724C520B45','Jeremy','N.','Tanong','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Francisco (Poblacion)','Purok 1 ','(+63) 9123456789','WALK IN','1970-12-22','Male','DONE UPDATE','28'),
('CL-B6263AB8DB220','Menyoro','A.','Salinas','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Vicente','Purok 1 ','(+63) 9759229077','WALK IN','1984-06-15','Female','DONE UPDATE','32'),
('CL-B6DB0171DF6A6','Gena','C','Corlet','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Cystal Plain','(+63) 9123456789','WALK IN','1971-04-18','Female','DONE UPDATE','8'),
('CL-B9F701B1A49D1','John Paul','Mcburger','Ludracis','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Datu Abdul Dadia','DALISAY, PUROK 2','(+63) 9662333559','WALK IN','1990-12-12','Male','DONE UPDATE','2'),
('CL-BB533458CE0BF','Reynaldo','C.','Diamalon','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Cagangohan','Niceville','(+63) 9123456789','WALK IN','2003-12-11','Male','DONE UPDATE','5'),
('CL-BB6BB33D801B4','ROLDAN','M','BERSAMNIA','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Visayas','PUROK 1 NEW VISAYAS','(+63) 9369014718','WALK IN','1988-03-24','Male','DONE UPDATE','25'),
('CL-BDEB6C872B220','Marvin','M','Moatero','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Cagangohan','Purok Marang','(+63) 9106908370','WALK IN','1991-04-28','Male','DONE UPDATE','5'),
('CL-C040AF22F23FA','Hannah Mae','Adlawan','Cose','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Francisco (Poblacion)','Purok1A','(+63) 9853195497','WALK IN','1984-05-04','Female','DONE UPDATE','28'),
('CL-C1C2F4927B31C','FELIX','A','ABANGIN','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Southern Davao','PUROK 7 SOUTHERN DAVAO','(+63) 9364619625','WALK IN','1954-09-21','Male','DONE UPDATE','36'),
('CL-C82AF580738C9','Kenken','Decipulo','Valiente','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Buenavista','PUROK 5','(+63) 9191919191','WALK IN','1994-11-25','Male','DONE UPDATE','3'),
('CL-C99C9970D1C2B','Maria','P.','Caslib','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Datu Abdul Dadia','Purok 1 ','(+63) 9451099494','WALK IN','2002-02-26','Female','DONE UPDATE','2'),
('CL-CA2CC42A224F0','Geraldine','A.','Cavan','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Cagangohan','Purok ubas','(+63) 976385588_','WALK IN','1997-08-21','Female','DONE UPDATE','5'),
('CL-D3533D873F6ED','Bea','Palingcod','Delearto','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Vicente','Prk 5','(+63) 9513872220','WALK IN','2004-06-20','Female','DONE UPDATE','32'),
('CL-D3E351013DF30','Dimple','M','Tacder','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Visayas','Purok 10 ','(+63) 9624507232','WALK IN','1992-07-09','Female','DONE UPDATE','25'),
('CL-D4B518ECF138F','Kent','A','Durupan','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Pandan (Pob.)','Purok Costagen','(+63) 9535595402','WALK IN','2002-02-19','Male','DONE UPDATE','24'),
('CL-D6F6D8CEEA14C','MARIA','A','JOHANIZ','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Visayas','NEW VISAYAS','(+63) 9214034111','WALK IN','1951-10-21','Female','DONE UPDATE','25'),
('CL-DBCEBE8664023','Jannel','','Morelos','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Cystal Plain','(+63) 9107742897','WALK IN','1978-01-08','Male','DONE UPDATE','8'),
('CL-DF94064DF1DBB','Rosene','','Sarcia','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Little Panay','P-5','(+63) 9168603360','WALK IN','1951-08-02','Female','DONE UPDATE','15'),
('CL-E141097ADBB12','Ranzel ','','Plaza','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Malitbog','New Malitbog','(+63) 9641474505','WALK IN','1996-06-16','Female','DONE UPDATE','23'),
('CL-E15571D234CA7','Rose Marie','A.','Parera','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Gredu (Poblacion)','Purok Caimito','(+63) 9092435747','WALK IN','1978-10-31','Female','DONE UPDATE','8'),
('CL-E305047FDFAAF','John ','Castano','Anasco','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Datu Abdul Dadia','Purok 1 ','(+63) 9662333559','WALK IN','2024-11-25','Male','DONE UPDATE','2'),
('CL-E47445AFA1952','Veronica','D.','Cose','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Francisco (Poblacion)','Purok 1A','(+63) 9513718893','WALK IN','1986-03-28','Female','DONE UPDATE','28'),
('CL-E9ECFC58A2ACF','MARIBEL','B','SANTOS','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Pedro','PUROK 1 SAN PEDRO','(+63) 9061367831','WALK IN','1978-01-04','Female','DONE UPDATE','30'),
('CL-EA24E0270FD1A','Hazel','Y.','Mudok','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Salvacion','Purok 1 ','(+63) 9123456789','WALK IN','1985-06-18','Female','DONE UPDATE','27'),
('CL-ED166600E0FE0','MARY ','P','PENAROYO','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Francisco (Poblacion)','PUROK GLODO SAN FRANCISCO','(+63) 9124492446','WALK IN','2001-10-24','Female','DONE UPDATE','28'),
('CL-F2BCE088EA9DA','Gian','','Catayas','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Vicente','Prk4','(+63) 9123456789','WALK IN','2002-09-08','Female','DONE UPDATE','32'),
('CL-F33CABB4BF037','Grecilita','A','Dapar','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Quezon','Purok 3 Quezon','(+63) 9631435176','WALK IN','1988-10-14','Female','DONE UPDATE','26'),
('CL-F3C7290DD4A9A','Ellen','','Dreben','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Quezon','prk 4','(+63) 9385583202','WALK IN','1980-04-01','Female','DONE UPDATE','26'),
('CL-F4BC799AC438B','Hizon','T.','Buyo','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Santo NiÃ±o (Poblacion)','Purok 1 ','(+63) 9123545084','WALK IN','1988-02-10','Male','DONE UPDATE','34'),
('USR-09C4FB0F94BC7','Imee ','Shawty','Marilag','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Malaga (Dalisay)','Dalisay 2','(+63) 9665553214','ONLINE','2000-12-25','Female','DONE UPDATE','22'),
('USR-5607EB138CEAA','Reban Cliff','','Fajardo','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','New Visayas','Davao del Norte State College','(+63) 9199130894','ONLINE','2000-03-12','Male','DONE UPDATE','25'),
('USR-5C86A8B917E2E',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ONLINE',NULL,NULL,'FOR UPDATE',NULL),
('USR-7DCDB597A4288',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ONLINE',NULL,NULL,'FOR UPDATE',NULL),
('USR-9C6CBD0251315','Maricris','Castano','Dela Cerna','','Region XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','Consolacion','Consol, 8888, 3','(+63) 9191919921','ONLINE','2002-03-11','Female','DONE UPDATE','6'),
('USR-A16E25D1BDE37',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ONLINE',NULL,NULL,'FOR UPDATE',NULL),
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
(2,'Rabies','both','Bite','Fatal viral disease affecting the nervous system','Fever, paralysis, aggression','No cure, supportive care',1,'2024-10-12 06:40:39','#321111'),
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
('DOC-2CEB6C33F2C08','John Ray','Adonacion','Bautista','DVM','REGION XI (DAVAO REGION)','DAVAO DEL NORTE','CITY OF PANABO','San Francisco (Poblacion)','6401 Hofilena Subdivision, Prk. 1B','(+63) 9204684561','Male','1985-06-04','007161'),
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
('PET008BDB5025D2B','Luna','Dog','Shihtzu & Aspin',NULL,'B & W','CL-F2BCE088EA9DA',NULL,'Female','2025-01-07',NULL),
('PET00F7D579C82F8','WALRUS','Dog','Aspin',NULL,'BLACK AND WHITE','CL-C1C2F4927B31C',NULL,'Male','2024-09-21',NULL),
('PET01135E8015E4E','Coco','Dog','Poodle',NULL,'Black/Brown','CL-A6990E958B231',NULL,'Male','2024-09-17',NULL),
('PET02E6E7F434DF3','Koshi','Dog','Aspin',NULL,'Brown','CL-517A8AD65D4FC',NULL,'Male','1986-12-14',NULL),
('PET06923F896597D','AWIT G','Cat','persian',NULL,'Cream','CL-61CF52353C074',NULL,'Female','2025-02-13',NULL),
('PET07C8563693E87','Ming2x','Cat','Persian',NULL,'Black & Brown','CL-DBCEBE8664023',NULL,'Female','2022-01-01',NULL),
('PET082B31487C939','PUPPY 2','Dog','Dashund Miniture',NULL,'Brown','CL-B3FD9E2D52595',NULL,'Female','2025-02-03',NULL),
('PET0A65B862A4D4F','Chico','Dog','Mix',NULL,'Black & White','CL-A01E03F1F3E32',NULL,'Male','2022-06-01',NULL),
('PET0D5AE988886A1','Bruno','Dog','Chiuaua',NULL,'Brown','CL-103472D4677C5',NULL,'Male','2024-12-10',NULL),
('PET0D80DD382A062','Whitey','Dog','N/A',NULL,'White','CL-885056EF6675C',NULL,'Male','2015-01-01',NULL),
('PET11BBE1702BFBD','Mocha','Dog','Shihtzu & Aspin',NULL,'Brown','CL-F2BCE088EA9DA',NULL,'Female','2025-01-07',NULL),
('PET13342F9976F83','Rocky','Dog','Aspin',NULL,'Black White','CL-2E63C1F25E17B',NULL,'Male','2023-01-01',NULL),
('PET160CD1F70AC52','PUPPY 3','Dog','Dashund Miniture',NULL,'Brown/Black','CL-B3FD9E2D52595',NULL,'Male','2025-02-03',NULL),
('PET182C08FC848C0','Rap2x','Dog','Mix',NULL,'Brown','CL-BB533458CE0BF',NULL,'Male','2025-01-01',NULL),
('PET192110E59FC91','Chingching','Dog','Mix',NULL,'Brown','CL-D3533D873F6ED',NULL,'Female','2025-12-01',NULL),
('PET193B4438C2DE0','Ejon','Dog','Belgian',NULL,'Yellow','CL-5DC1B1F1D620E',NULL,'Male','2025-01-01',NULL),
('PET1B2066A23AC0D','Bokyo','Dog','Maltese Japanese',NULL,'White& Brown','CL-912A74E0635D9',NULL,'Male','2022-07-20',NULL),
('PET1DAAE451371EC','Freda','Dog','Aspin',NULL,'Black','CL-F3C7290DD4A9A',NULL,'Female','2021-04-03',NULL),
('PET1DAC4F99B9B9A','Panda','Dog','Aspin',NULL,'Black','CL-B29C2C7C6060D',NULL,'Female','2018-01-01',NULL),
('PET1F4FC9B43A8A9','Jap2x','Dog','Mix',NULL,'Black','CL-BB533458CE0BF',NULL,'Male','2025-01-01',NULL),
('PET2040613B8AC4F','Ollah','Dog','Mix',NULL,'Black/White','CL-2729F63C7F999',NULL,'Female','2024-06-04',NULL),
('PET211C00281FB80','Thor','Cat','Persian',NULL,'Brown/White','CL-24C885CF5C9F6',NULL,'Male','2024-04-15',NULL),
('PET234581B78C3D1','Stephano','Dog','Aspin',NULL,'Brown','CL-0EBCB0B39AFDE',NULL,'Male','2025-12-06',NULL),
('PET240C6A851E044','Scarlette','Dog','American Bully',NULL,'Brown','CL-5DEC15821E0C0',NULL,'Female','2022-12-01',NULL),
('PET24888C95099E2','Mocha','Dog','Aspin',NULL,'Brown','CL-76DB39FBFECA7',NULL,'Female','2024-12-28',NULL),
('PET2590DB8ECE3EC','DOG 1','Dog','Dashund',NULL,'WHITE BROWN BLACK','CL-B6DB0171DF6A6',NULL,'Female','2024-12-12',NULL),
('PET260409693D043','Bruno','Dog','Golden Retriever',NULL,'MUKALIT RAG KATAWA','USR-FB2AC995F1088','uploads/PET260409693D043.jpg','Female','2020-03-03',NULL),
('PET2843865791C1F','Chuchay','Dog','Mix',NULL,'White/Black','CL-457C9665F7D72',NULL,'Female','2024-11-26',NULL),
('PET29BB2849907AD','Kobe','Dog','Aspin',NULL,'White','CL-C99C9970D1C2B',NULL,'Female','2020-09-06',NULL),
('PET2CDB3DA0DEA94','napi','Dog','german shepered',NULL,'brown/black','CL-76169F821E4AE',NULL,'Male','2023-01-01',NULL),
('PET2D330731FD5FE','Plong2x','Dog','Aspin',NULL,'White','CL-5BB26BC6E8543',NULL,'Male','2022-01-01',NULL),
('PET327DED607802C','Pingpong','Dog','Terrier',NULL,'White / Brown','CL-E15571D234CA7',NULL,'Male','2022-09-01',NULL),
('PET33F8744D390A4','Cassy','Dog','Mix',NULL,'White, Gray, Black','CL-AF4B1DC4D48B0',NULL,'Female','2024-01-01',NULL),
('PET361B698E91213','Donut','Cat','Persian',NULL,'Brown','CL-A959A5B55152A',NULL,'Male','2024-10-03',NULL),
('PET39AC7BD726D71','Celim','Cat','persian',NULL,'Black','CL-617A9FB3A3195',NULL,'Male','2018-01-01',NULL),
('PET3BD22D544C6CA','flow g','Cat','persian',NULL,'gray','CL-60E236185E022',NULL,'Male','2024-07-05',NULL),
('PET3BEA10B9244B1','Jambo','Dog','Aspin',NULL,'Cream','CL-6FA9439A3A638',NULL,'Male','2024-12-01',NULL),
('PET3EC3790494E16','Fifi','Dog','Fog',NULL,'Brown','CL-EA24E0270FD1A',NULL,'Female','2025-01-01',NULL),
('PET3ED257A8D26B8','Atasha','Dog','Mix',NULL,'Brown','CL-5A8D10A4CBABC',NULL,'Female','2024-01-12',NULL),
('PET4148DE5842D6C','Butchoy','Dog','Aspin',NULL,'Brown&White','CL-98FD0B262999C',NULL,'Male','2024-10-14',NULL),
('PET435E175064C56','bubbles','Cat','persian',NULL,'cream','CL-53DFCD5E2C23F',NULL,'Female','2024-04-02',NULL),
('PET45912D8991D9E','Mikmik','Dog','N/A',NULL,'Brown','CL-885056EF6675C',NULL,'Female','2016-01-01',NULL),
('PET472089274203F','Adidas','Dog','N/A',NULL,'Black','CL-B6263AB8DB220',NULL,'Male','2024-05-21',NULL),
('PET47BBFEC3C720E','Ponmix','Cat','Shitzu',NULL,'White','CL-0AC7D00657CA1',NULL,'Male','2021-01-01',NULL),
('PET4A104FEA06DCA','Yuri','Dog','Aspin',NULL,'Brown/Black','CL-B29C2C7C6060D',NULL,'Male','2023-01-01',NULL),
('PET4C0E47BCB07EE','HANABISHI','Dog','LABRADOR',NULL,'ITOM NGA IRO','USR-BC1DEF7310CF5',NULL,'Female','2021-10-01',NULL),
('PET4C190196241FF','UPIN','Dog','Aspin',NULL,'BROWN BLACK COLORS','CL-E9ECFC58A2ACF',NULL,'Male','2024-12-21',NULL),
('PET4CCCC8999BBBE','Askal','Cat','PITBULL',NULL,'Dark brown, chubby','CL-B9F701B1A49D1','uploads/PET4CCCC8999BBBE.jpg','Male','2020-03-02',NULL),
('PET4D00BC053BC6B','Doofer','Cat','Persian',NULL,'Black','CL-A788D2B685CC4',NULL,'Male','2020-01-01',NULL),
('PET4D4CE55C64FE6','Dog1','Dog','Aspin',NULL,'White/Black','CL-AC230D0B638F3',NULL,'Male','2025-01-01',NULL),
('PET531AC5D07C68A','Dark','Dog','Shitzu',NULL,'Dark Brown','CL-D4B518ECF138F',NULL,'Male','2022-01-01',NULL),
('PET53439531F03B9','Sarge','Dog','Aspin',NULL,'White Brown','CL-2E63C1F25E17B',NULL,'Male','2023-01-01',NULL),
('PET55158A2AF4A1F','Maloi','Dog','Dashund',NULL,'Brown','CL-B4EDA3902E5EF',NULL,'Female','2024-11-18',NULL),
('PET55DBE438252F8','Alisto','Dog','Aspin',NULL,'Black and White color','CL-1FAF95D2FB23B',NULL,'Male','2023-12-12',NULL),
('PET5871D1064F3A0','Penny','Dog','Aspin',NULL,'Brown/Black','CL-F3C7290DD4A9A',NULL,'Female','2021-04-03',NULL),
('PET59BB26F05430F','Jons','Dog','Aspin',NULL,'Brown/Black','CL-4852986C446D9',NULL,'Male','2023-01-10',NULL),
('PET5CE4C8F0756FC','Rofee','Dog','Aspin',NULL,'Black / Brown','CL-5068BD388491D',NULL,'Female','2024-01-27',NULL),
('PET5D4850201E01F','LOUIE JAE','Dog','Shitzu',NULL,'DIRTY WHITE','CL-ABC0813CEB98D',NULL,'Male','2024-03-02',NULL),
('PET5E31AB4174BF8','Reya','Dog','N/A',NULL,'Brown/White','CL-9C7971F4A9176',NULL,'Female','2025-01-01',NULL),
('PET5E3D42513AD2F','Caramel','Dog','Aspin',NULL,'Brown','CL-76DB39FBFECA7',NULL,'Female','2024-12-28',NULL),
('PET5E969228ADBFD','Omloy','Dog','Maltes',NULL,'White','CL-C99C9970D1C2B',NULL,'Male','2024-11-11',NULL),
('PET5F32FC4613A01','Choloy','Dog','Shihtzu',NULL,'White','CL-1C3C04853A3D4',NULL,'Male','2025-01-01',NULL),
('PET5F45956FDC245','Novy','Dog','Aspin',NULL,'Cute size, brown color','USR-E6C7616334084',NULL,'Male','2023-11-03',NULL),
('PET60E5C21C55555','Nano','Dog','Aspin',NULL,'White','CL-A5D23166C3E24',NULL,'Male','2024-12-06',NULL),
('PET624D9C6AA17A1','Bambi','Dog','Shihtzu & Aspin',NULL,'White','CL-F2BCE088EA9DA',NULL,'Female','2025-01-07',NULL),
('PET6415405015D1D','Gabriel','Dog','N/A',NULL,'Black','CL-C040AF22F23FA',NULL,'Male','2024-01-01',NULL),
('PET64205AE51E8B4','Junnn','Cat','LABRADOR',NULL,'Gold','CL-C82AF580738C9',NULL,'Male','2024-11-25',NULL),
('PET6677F98E6FF61','Nuggets','Dog','japanesse spitz',NULL,'Cream','CL-B1EA4181C6216',NULL,'Male','2024-12-21',NULL),
('PET6866A0AB05F9A','Twinkle','Dog','Fog',NULL,'Cream','CL-05C173A42701F',NULL,'Female','2025-01-01',NULL),
('PET6C025DBE9C987','Bea','Dog','Ambul Pitbull',NULL,'Black White','CL-AF0C0C73ABC05',NULL,'Female','2024-12-12',NULL),
('PET723570707BAC7','Milo','Dog','Aspin',NULL,'Brown','CL-06D8669647A30',NULL,'Male','2024-12-01',NULL),
('PET7294741B15FCF','Princess','Dog','Aspin',NULL,'Brown/Black','CL-44798336FDAC7',NULL,'Female','2024-12-07',NULL),
('PET7386C7044B0C3','Happy','Dog','Aspin',NULL,'White and brown color','CL-2058AA541CFC8',NULL,'Female','2018-01-01',NULL),
('PET7402CD79556D9','Puppy','Dog','Aspin',NULL,'Brown','CL-A5D23166C3E24',NULL,'Female','2021-01-01',NULL),
('PET768D19E81848E','King','Dog','Canine ',NULL,'Brown/Black','CL-79291AE7C4E0D',NULL,'Male','2024-11-28',NULL),
('PET76DDD595704AE','Bingo','Cat','Persian',NULL,'Coloured Orange cat','USR-9C6CBD0251315',NULL,'Female','2024-12-02',NULL),
('PET78602C24C5666','DOG 2','Dog','Dashund',NULL,'WHITE','CL-B6DB0171DF6A6',NULL,'Female','2024-12-12',NULL),
('PET7953C75F1A125','Merat','Cat','Persian',NULL,'Oranged coloured cat','CL-112606A06D29A',NULL,'Female','2023-01-01',NULL),
('PET79C12F3A182EC','Ginger','Cat','Persian',NULL,'Orange','CL-96A37E234F7F7',NULL,'Female','2024-11-01',NULL),
('PET7C5F2EBD3DEA5','GOAL','Dog','BLACK',NULL,'TAAS PA SIYA NAKU','USR-FB2AC995F1088',NULL,'Female','2024-03-05',NULL),
('PET7D7111FB23D42','Wiggy','Dog','Aspin',NULL,'Black','CL-8C0C52848C34F',NULL,'Male','2024-08-01',NULL),
('PET7DD04B9C933A7','Bruno','Dog','PITBULL',NULL,'Gray','CL-B339B9A970282',NULL,'Male','2021-12-24',NULL),
('PET7E7B1FBAE5EEE','Hary','Dog','Aspin',NULL,'Cream/Black','CL-681199BF5FD26',NULL,'Male','2022-01-01',NULL),
('PET7E9B7C973A5BA','Dashy','Dog','GOLDEN RETRIEVER',NULL,'Cute, goldilocks','CL-A70F25E297F80',NULL,'Female','2023-11-03',NULL),
('PET80765088943DD','MARS','Cat','PERSIAN',NULL,'CUTE','CL-A18BDFFF7D8CA',NULL,'Female','2021-09-09',NULL),
('PET8530014789CE9','Itachi','Dog','japanesse spitz',NULL,'White','CL-CA2CC42A224F0',NULL,'Male','2021-06-04',NULL),
('PET862313D9B586F','Khali','Dog','Shitzu',NULL,'Gray White Black','CL-3F82DDABB9DD9',NULL,'Female','2024-09-08',NULL),
('PET894FF756FAA1A','MAGI','Dog','Shitzu',NULL,'WHITE BROWN','CL-6AC13F5941200',NULL,'Female','2024-02-21',NULL),
('PET89E9842FCF20E','Ginger','Cat','Puspin',NULL,'Orange','CL-7EE3DC448ECB3',NULL,'Male','2023-10-05',NULL),
('PET8BBB5CA5FADE5','Merat','Dog','Aspin',NULL,'White haired aspin and has a very sharp teeth','USR-BC1DEF7310CF5',NULL,'Female','2019-01-22',NULL),
('PET9080AC687CA9E','Babi','Dog','persian',NULL,'Golden Retriever','USR-FB2AC995F1088',NULL,'Male','2020-11-25',NULL),
('PET9247AD3822E92','Kokie','Dog','Aspin',NULL,'Black&White','CL-76DB39FBFECA7',NULL,'Female','2024-12-28',NULL),
('PET95E2BF3BE7896','Storm','Cat','N/A',NULL,'','CL-F4BC799AC438B',NULL,'Female','2024-08-11',NULL),
('PET9A490D0B6618F','Danag','Dog','Aspin',NULL,'Color white, small ','CL-F33CABB4BF037',NULL,'Male','2024-01-01',NULL),
('PET9B5A37EAFAA4B','Happy','Dog','Shitzu/Poodle',NULL,'White/Black','CL-22D63CE16E4DF',NULL,'Female','2024-11-26',NULL),
('PET9E9976072547A','Hub-hub','Dog','Aspin',NULL,'Brown','CL-97BAE96867F95',NULL,'Female','2024-02-12',NULL),
('PETA15D30E823D75','Loppy','Dog','Shitzu',NULL,'White/Black','CL-42EF22A8ECCA8',NULL,'Male','2025-11-01',NULL),
('PETA4874890E7D4B','sakuragi','Dog','Pitbull',NULL,'Brown','USR-9C6CBD0251315',NULL,'Male','2024-02-27',NULL),
('PETA679C67344367','DOG 2','Dog','Dashund',NULL,'POLKA DOTS, WHITE BLACK','CL-B6DB0171DF6A6',NULL,'Female','2024-12-12',NULL),
('PETA6D343BC3E9DB','Agatha','Dog','Aspin',NULL,'Brown','CL-1EBFE77D0329E',NULL,'Female','2024-09-06',NULL),
('PETAA4BEEA4C8433','Andezosa','Dog','Mix',NULL,'Brown','CL-5A8D10A4CBABC',NULL,'Female','2024-07-12',NULL),
('PETABABC6B6B484C','bfwui','Cat','persian',NULL,'white haired ','CL-0E7D7658F7FA6',NULL,'Female','20223-03-22',NULL),
('PETABD55B3607E68','Bashiya','Dog','Mix',NULL,'Brown','CL-5A8D10A4CBABC',NULL,'Female','2024-01-12',NULL),
('PETAC0AF4B25F3AA','Buddy','Dog','Mix',NULL,'White/Black','CL-26F1AAEFC47B5',NULL,'Male','2024-12-12',NULL),
('PETAD6FAB48E8EC5','KOPIKO','Dog','Shitzu',NULL,'ASH GRAY ','CL-0AC83C413E465',NULL,'Male','2022-12-03',NULL),
('PETB00E03B8A2CBD','Mabby','Dog','N/A',NULL,'','CL-45D6F28B87F5C',NULL,'Male','2024-12-11',NULL),
('PETB3BFE78A612A9','Toby','Dog','Aspin',NULL,'Small and Color Brown','CL-37AB2687A6FB2',NULL,'Male','2024-11-28',NULL),
('PETB470B565516D8','MOMO','Cat','PERSIAN',NULL,'Orange White','CL-E141097ADBB12',NULL,'Male','2024-08-07',NULL),
('PETBD15E534B1439','Ichigo','Dog','Dachsund',NULL,'Long Haired Dachsund and Cookies and Cream colored','CL-A4465A0F5649C',NULL,'Male','2021-12-08',NULL),
('PETBE580AC085360','Bowl','Dog','Aspin',NULL,'White coloured-aspin, 15lbs ','CL-0E7D7658F7FA6',NULL,'Male','2024-01-01',NULL),
('PETC1277FFDB81F0','Mika','Dog','Shihtzu',NULL,'Brown','CL-9E8F4B8C1DD0A',NULL,'Female','2024-05-16',NULL),
('PETC27F06E6F2846','Sofie','Dog','Dashund',NULL,'Brown','CL-8D340BFE90973',NULL,'Female','2025-01-19',NULL),
('PETC312AD86A17B2','PUPPY 1','Dog','Dashund Miniture',NULL,'Black','CL-B3FD9E2D52595',NULL,'Male','2025-02-03',NULL),
('PETC3B58E575FC41','Ramboo','Dog','Belgian',NULL,'Black/Brown','CL-DF94064DF1DBB',NULL,'Male','2024-12-07',NULL),
('PETC65C0EF2AB73C','Nico','Dog','Aspin',NULL,'White','CL-96A37E234F7F7',NULL,'Male','2024-01-01',NULL),
('PETC7B0C98C38490','Toytoy','Dog','Aspin',NULL,'White','CL-523877AEDB51E',NULL,'Female','2019-01-04',NULL),
('PETC953F687F8047','DAGUL','Dog','Aspin',NULL,'BLACK ','CL-13B192E90E355',NULL,'Male','2024-12-02',NULL),
('PETC95593DDF4F00','Ulyssis','Dog','Shihtzu',NULL,'White','CL-C99C9970D1C2B',NULL,'Male','2020-09-26',NULL),
('PETD01CD75D97A0E','Ashone','Dog','Mix',NULL,'Brown','CL-5A8D10A4CBABC',NULL,'Male','2024-01-12',NULL),
('PETD0612E7AE3C7E','KUNGKAY','Dog','Aspin',NULL,'WHITE BROWN COLOR','CL-BB6BB33D801B4',NULL,'Female','2024-10-27',NULL),
('PETD0B2051DA058A','Ginger','Cat','Puspin',NULL,'Orange','CL-DBCEBE8664023',NULL,'Male','2023-10-05',NULL),
('PETD411BACF8718A','Jun','Dog','PITBULL',NULL,'Brown','CL-61CF52353C074',NULL,'Male','2025-02-27',NULL),
('PETD4A0F6DAF001C','Axel','Dog','Aspin',NULL,'Black','CL-E47445AFA1952',NULL,'Male','2024-12-27',NULL),
('PETD5236A3428E98','Ichigo','Dog','Dachsund',NULL,'Cookies and Cream coloured dachsund weighs 15 kilo','USR-9C6CBD0251315',NULL,'Male','2021-12-08',NULL),
('PETD6419874DED3A','Cally','Dog','Shitzu/Poodle',NULL,'White','CL-70F32E5FAEA01',NULL,'Female','2022-01-01',NULL),
('PETD6A1C06CEABD7','Duday','Dog','Aspin',NULL,'Black&White','CL-457C9665F7D72',NULL,'Female','2024-11-26',NULL),
('PETD7EE349E003E5','Ming ming','Cat','Puspin',NULL,'Colors: Black and Brown','CL-7EE3DC448ECB3',NULL,'Female','2023-10-05',NULL),
('PETDB506A8627CAB','SANCHAI','Dog','Dashund',NULL,'WHITE BROWN','CL-8813F71A4DA7F',NULL,'Female','2024-02-12',NULL),
('PETDDE1383A07BD4','Panda','Dog','N/A',NULL,'Black/White','CL-51D0B2201D3B9',NULL,'Male','2023-01-10',NULL),
('PETDFD70E6DB940C','Browny','Dog','Mix',NULL,'Brown','CL-A9E13B4C26868',NULL,'Male','2024-11-27',NULL),
('PETE3AF51E84400D','Nico','Cat','PERSIAN',NULL,'Gray','CL-D3E351013DF30',NULL,'Male','2024-11-28',NULL),
('PETE4DC61E1C57FB','Mars','Dog','Golden Retriever',NULL,'Smooth','USR-9C6CBD0251315',NULL,'Male','2023-03-11',NULL),
('PETE72C1949FAD5E','Jons','Dog','Aspin',NULL,'Brown/Black','CL-B54724C520B45',NULL,'Male','2024-12-01',NULL),
('PETE878ADF16FAAE','MESSY','Dog','Shitzu',NULL,'WHITE BLACK COLOR','CL-B31A1FC445256',NULL,'Female','2024-01-07',NULL),
('PETEA97604E59054','YURI','Dog','Dashund',NULL,'WHITE BROWN','CL-8813F71A4DA7F',NULL,'Female','2024-12-23',NULL),
('PETEAF098005ACC2','Pocholo','Dog','Dashund',NULL,'Black and Brown Color','CL-3C5D76109D7D2',NULL,'Male','2021-03-11',NULL),
('PETED6B4B67B660B','Jun2x','Cat','PITBULL',NULL,'cuTE','CL-E305047FDFAAF',NULL,'Female','2024-11-19',NULL),
('PETEEE4369771003','Kuku','Dog','Mix',NULL,'Black','CL-103472D4677C5',NULL,'Male','2023-11-08',NULL),
('PETF054BE33967A6','bunsay','Dog','askal',NULL,'white/brown/black','CL-4957729FD6BDA',NULL,'Female','2021-10-05',NULL),
('PETF4358778C9349','Chak','Dog','Aspin',NULL,'Brown','CL-926E19D04D5AF',NULL,'Male','2024-10-29',NULL),
('PETF4EA46FD2AAF1','MARLY','Dog','Shitzu',NULL,'BROWN AND BLACK','CL-D6F6D8CEEA14C',NULL,'Female','2019-10-10',NULL),
('PETF5A19613CB938','OHNIE','Dog','Shitzu',NULL,'BROWN ','CL-ED166600E0FE0',NULL,'Male','2021-09-07',NULL),
('PETF8F98DFFEA49E','CHOOPY','Dog','Mix',NULL,'BLACK BROWN COLOR','CL-8813F71A4DA7F',NULL,'Male','2024-12-23',NULL),
('PETFB04DDA6B5028','Alkoy','Dog','Mix',NULL,'White','CL-A515417FCF54D',NULL,'Male','2024-12-24',NULL),
('PETFD69B86838AE0','Dos','Dog','Aspin',NULL,'White and Brown color','CL-BDEB6C872B220',NULL,'Male','2024-05-05',NULL);

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
('824759442784-r0k46r4upq85u4jd45n1cmd96hl5903i.apps.googleusercontent.com','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','15df82f54cf28baa57c00d9fc76503ed9d5b0fcaef7ec5595fc7e04a87fb72f2@group.calendar.google.com','resources/theLogo.png','RL SUMABAL','#006BFF','#006BFF');

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
('DOC-2CEB6C33F2C08','panabocityvet@gmail.com','panabocityvet@gmail.com','DOCTOR','John Ray Bautista'),
('DOC-6B08515EAB33D','valientedogawa@gmail.com','valientedogawa@gmail.com','DOCTOR','Ayms Val'),
('DOC-ED2B182699D59','emilanasco1@gmail.com','emilanasco1@gmail.com','DOCTOR','Emil Añasco'),
('USER0001','kenjiacido26@gmail.com','$1$6XfVdlQw$RDy74tYnF9SUK8mcLV6CL.','admin','ALMA HECHANOVA'),
('USER0002','tradebryant@gmail.com','tradebryant@gmail.com','admin','MASTER ADMIN'),
('USER0003','rebanclifffajardo@gmail.com','rebanclifffajardo@gmail.com','admin','ADMIN'),
('USR-09C4FB0F94BC7','valienteimxkwerd@gmail.com','valienteimxkwerd@gmail.com','CLIENT','Imee Valiente'),
('USR-9C6CBD0251315','delacerna.maricris@dnsc.edu.ph','delacerna.maricris@dnsc.edu.ph','CLIENT','MARICRIS DELACERNA'),
('USR-A16E25D1BDE37','taporco.adrianehanz@dnsc.edu.ph','taporco.adrianehanz@dnsc.edu.ph','CLIENT','adriane hanz taporco'),
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

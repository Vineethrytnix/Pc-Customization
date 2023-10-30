/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.5.8-log : Database - pc_customization
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pc_customization` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pc_customization`;

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL AUTO_INCREMENT,
  `pid` varchar(100) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `cus_id` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `tamount` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'N/A',
  `payment` varchar(100) DEFAULT 'N/A',
  `shipping` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `cart` */

insert  into `cart`(`cart_id`,`pid`,`user_id`,`cus_id`,`price`,`qty`,`tamount`,`status`,`payment`,`shipping`) values (13,'4','1','2','475','2','950','Purchased','Paid','Order Delivered & Completed'),(14,'4','1','2','475','2','950','incart','not paid',NULL);

/*Table structure for table `customizing_centre` */

DROP TABLE IF EXISTS `customizing_centre`;

CREATE TABLE `customizing_centre` (
  `cid` int(100) NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) DEFAULT NULL,
  `cemail` varchar(100) DEFAULT NULL,
  `cphone` varchar(100) DEFAULT NULL,
  `caddress` varchar(100) DEFAULT NULL,
  `cimage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `customizing_centre` */

insert  into `customizing_centre`(`cid`,`cname`,`cemail`,`cphone`,`caddress`,`cimage`) values (1,'Midhun','midhun@gmail.com','7907876876','Ernakulam kochi kerala','customer-support.png'),(2,'System World','system@gmail.com','8976786876','Kadavanthara, Ernakulam','download.png'),(3,'Tecno Wave','tecno@gmail.com','8954789457','Palarivattam , Ernakulam ','wd.png');

/*Table structure for table `delivery_boy` */

DROP TABLE IF EXISTS `delivery_boy`;

CREATE TABLE `delivery_boy` (
  `did` int(100) NOT NULL AUTO_INCREMENT,
  `dname` varchar(100) DEFAULT NULL,
  `demail` varchar(100) DEFAULT NULL,
  `dphone` varchar(100) DEFAULT NULL,
  `daddress` varchar(100) DEFAULT NULL,
  `dimage` varchar(100) DEFAULT NULL,
  `cus_id` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'Free',
  PRIMARY KEY (`did`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `delivery_boy` */

insert  into `delivery_boy`(`did`,`dname`,`demail`,`dphone`,`daddress`,`dimage`,`cus_id`,`status`) values (1,'joyel','joyel@gmail.com','9879879873','pinamarugil, pala','man (1).png','2','Free'),(2,'Gokul','gokul@gmail.com','8979879487','Palakkad','new.png','2','Free');

/*Table structure for table `delivery_details` */

DROP TABLE IF EXISTS `delivery_details`;

CREATE TABLE `delivery_details` (
  `delivery_id` int(100) NOT NULL AUTO_INCREMENT,
  `cus_id` varchar(100) DEFAULT NULL,
  `uid` varchar(100) DEFAULT NULL,
  `cart_id` varchar(100) DEFAULT NULL,
  `db_id` varchar(100) DEFAULT NULL,
  `pid` varchar(100) DEFAULT NULL,
  `assign_date` varchar(100) DEFAULT NULL,
  `dstatus` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`delivery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `delivery_details` */

insert  into `delivery_details`(`delivery_id`,`cus_id`,`uid`,`cart_id`,`db_id`,`pid`,`assign_date`,`dstatus`) values (3,'2','1','13','1',NULL,'11 Oct 2023','Order Delivered & Completed'),(4,'2','1','13','1',NULL,'27 Oct 2023','Order Delivered & Completed');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `lid` int(100) NOT NULL AUTO_INCREMENT,
  `rid` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'nil',
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`lid`,`rid`,`email`,`password`,`type`,`status`) values (0,'0','admin@gmail.com','admin','ADMIN','nil'),(3,'1','vineethvasanth1812@gmail.com','Vineeth@12','USER','nil'),(4,'1','midhun@gmail.com','Midhun@12','SERVICE CENTRE','Approved'),(5,'2','system@gmail.com','System@12','SERVICE CENTRE','Approved'),(6,'1','joyel@gmail.com','Joyel@12','DELIVERY_BOY','nil'),(7,'2','gokul@gmail.com','Gokul@12','DELIVERY_BOY','nil'),(8,'3','tecno@gmail.com','Tecno@12','SERVICE CENTRE','nil');

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `pay_id` int(100) NOT NULL AUTO_INCREMENT,
  `cus_id` varchar(100) DEFAULT NULL,
  `pid` varchar(100) DEFAULT NULL,
  `uid` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `pay_status` varchar(100) DEFAULT NULL,
  `cart_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `payment` */

insert  into `payment`(`pay_id`,`cus_id`,`pid`,`uid`,`date`,`amount`,`pay_status`,`cart_id`) values (6,'2','4','1','11 Oct 2023','950','Paid','13');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `pid` int(100) NOT NULL AUTO_INCREMENT,
  `cus_id` varchar(100) DEFAULT NULL,
  `pname` varchar(100) DEFAULT NULL,
  `pbrand` varchar(100) DEFAULT NULL,
  `pwindow` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `prossoser` varchar(100) DEFAULT NULL,
  `display` varchar(100) DEFAULT NULL,
  `p_image` varchar(100) DEFAULT NULL,
  `desc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`pid`,`cus_id`,`pname`,`pbrand`,`pwindow`,`price`,`prossoser`,`display`,`p_image`,`desc`) values (3,'1','ASUS Vivo AiO V222','ASUS ','Windows 11 Home','30990','Intel Pentium Dual Core','21.5 Inch Display','pngaaa.com-1241657.png','ASUS Vivo AiO V222, All in One Desktop, Intel Pentium Dual Core (8 GB DDR4/256 GB SSD/Windows 11 Hom'),(4,'2','Ant Esports GM320','Ant Esports ','','475','upto 12800 DPI ','','dell.png',NULL),(5,'2','ALIENWARE','NVIDIA GeForce RTX 2080 with Max-Q ','Windows 10 Home','224990','','15.6 inch UHD OLED Backlit Display','pngaaa.com-8289117.png',NULL);

/*Table structure for table `rating` */

DROP TABLE IF EXISTS `rating`;

CREATE TABLE `rating` (
  `rat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cus_id` varchar(100) DEFAULT NULL,
  `rating` varchar(100) DEFAULT NULL,
  `review` varchar(100) DEFAULT NULL,
  `uid` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`rat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `rating` */

insert  into `rating`(`rat_id`,`cus_id`,`rating`,`review`,`uid`) values (1,'2','4','wqad','1'),(2,'1','3','nice','1');

/*Table structure for table `requirements` */

DROP TABLE IF EXISTS `requirements`;

CREATE TABLE `requirements` (
  `req_id` int(100) NOT NULL AUTO_INCREMENT,
  `system` varchar(100) DEFAULT NULL,
  `desc` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `uid` varchar(100) DEFAULT NULL,
  `cus_id` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT 'not defined',
  `status` varchar(100) DEFAULT 'N/A',
  `payment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`req_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `requirements` */

insert  into `requirements`(`req_id`,`system`,`desc`,`date`,`uid`,`cus_id`,`price`,`status`,`payment`) values (1,'Gaming Pc','I want to build a gaming pc with 8gb graphics card and windows 11 without any lag','10 Oct 2023','1','2','not defined','Rejected','not paid');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `uid` int(100) NOT NULL AUTO_INCREMENT,
  `uname` varchar(100) DEFAULT NULL,
  `uemail` varchar(100) DEFAULT NULL,
  `uphone` varchar(100) DEFAULT NULL,
  `uaddress` varchar(100) DEFAULT NULL,
  `uimage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`uid`,`uname`,`uemail`,`uphone`,`uaddress`,`uimage`) values (1,'Vineeth','vineethvasanth1812@gmail.com','7907983487','kochi Karadi Kuzhy kerela','dfvgb_ktp39cT.gif');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

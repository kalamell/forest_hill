-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 08:38 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pakapopcho_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `affair`
--

CREATE TABLE IF NOT EXISTS `affair` (
  `affair_id` int(11) NOT NULL AUTO_INCREMENT,
  `affair_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `affair_contact` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `affair_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`affair_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ราชการ' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `affair`
--

INSERT INTO `affair` (`affair_id`, `affair_name`, `affair_contact`, `affair_phone`) VALUES
(1, 'อบต', 'นายเกรียงไกร', '099-111-2222');

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE IF NOT EXISTS `budgets` (
  `budgets_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_budgets_id` int(11) NOT NULL,
  `budgets_name` varchar(100) NOT NULL,
  `budgets_total` double DEFAULT NULL,
  `ratio` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`budgets_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`budgets_id`, `type_budgets_id`, `budgets_name`, `budgets_total`, `ratio`) VALUES
(1, 1, 'ใช้จ่ายทั่วไป', 100000, '30 / 50');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'หมวดงานก่อสร้าง'),
(2, 'หมวดงานโครงสร้าง'),
(3, 'หมวดงานหลังคา'),
(4, 'หมวดงานระบบ'),
(5, 'หมวดงานสถานปัตย์'),
(6, 'งานภายนอกบ้าน และ งานเบ็ดเตล็ด'),
(7, 'หมวดงานส่งมอบ');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_customer_id` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `surname`, `email`, `phone`, `type_customer_id`) VALUES
(1, 'บัณฑิต', 'แสนคำภา', 'sankhumpha84@gmail.com', '0909740465', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'ก่อสร้าง.');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `groups_id` int(11) NOT NULL AUTO_INCREMENT,
  `groups_name` varchar(100) NOT NULL,
  PRIMARY KEY (`groups_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='กลุ่มงาน' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`groups_id`, `groups_name`) VALUES
(1, 'ก่อสร้างบ้าน');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE IF NOT EXISTS `home` (
  `home_id` int(11) NOT NULL AUTO_INCREMENT,
  `home_code` varchar(100) NOT NULL,
  `home_name` varchar(100) NOT NULL,
  `type_home_id` int(11) NOT NULL,
  `style` text,
  `area` text COMMENT 'พื้นที่ใช้สอย',
  `place` text COMMENT 'พื้นที่ก่อสร้าง',
  `price` varchar(100) DEFAULT NULL COMMENT 'ราคาก่อสร้าง',
  `price_sale` varchar(100) DEFAULT NULL COMMENT 'ราคาขาย',
  PRIMARY KEY (`home_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(100) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_name`) VALUES
(5, 'พนักงานทั่วไป');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ทำเลที่ต้ั้ง',
  `land_size` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ขนาดที่ดิน',
  `type_project_id` int(11) NOT NULL COMMENT 'ประเภทโครงการ',
  `project_price` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'มูลค่าโครงการ',
  `total_unit` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'จำนวนยูนิต',
  `sale_avg` double DEFAULT NULL COMMENT 'ราคาขายเฉลี่ย',
  `total_model` double DEFAULT NULL COMMENT 'จำนวนแบบบ้าน',
  `sale_area` text COLLATE utf8_unicode_ci COMMENT 'พื้นที่ขาย',
  `central_area` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'พื้นที่ส่วนกลาง',
  `start_date` date DEFAULT NULL COMMENT 'วันเปิดโครงการ',
  `close_date` date DEFAULT NULL COMMENT 'วันปิดโครงการ',
  `facilities` text COLLATE utf8_unicode_ci COMMENT 'สิส่งอำนวยความสะดวก',
  `price_per_sqm` date DEFAULT NULL COMMENT 'ราคาที่ดินต่อตารางวา',
  `design_engineer` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'วิศวกรออกแบบ',
  `architect` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สถาปนิค',
  `foreman` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'วิศวกรคุมงาน',
  `contact_land` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผู้ประสานงานที่ดิน',
  `contact_councils` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผู้ประสานงานเทศบาล',
  `contact_water_supply` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผู้ประสานปะปา',
  PRIMARY KEY (`project_id`),
  UNIQUE KEY `project_code` (`project_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_code`, `project_name`, `location`, `land_size`, `type_project_id`, `project_price`, `total_unit`, `sale_avg`, `total_model`, `sale_area`, `central_area`, `start_date`, `close_date`, `facilities`, `price_per_sqm`, `design_engineer`, `architect`, `foreman`, `contact_land`, `contact_councils`, `contact_water_supply`) VALUES
(1, 'A999', 'โครงการบ่อดิน', 'บ่อดิน', 'xxx', 1, 'xxxxx', 'xx', 0, 0, 'xx', 'xx', '2016-08-03', '2016-08-03', 'xx', '0000-00-00', 'xx', 'xxx', 'xxx', 'xxx', 'xxx', 'xxxx'),
(2, 'ปป', 'ปป', '', '', 1, '', '', 0, 0, '', '', '2016-08-03', '0000-00-00', '', '0000-00-00', 'ป', 'ป', 'ป', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `promotion_id` int(11) NOT NULL AUTO_INCREMENT,
  `promotion_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `promotion_price` double DEFAULT NULL,
  PRIMARY KEY (`promotion_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotion_id`, `promotion_name`, `promotion_price`) VALUES
(1, 'บ้านด่วนป', 900001),
(2, 'ดกด', 0);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `province_id` varchar(2) NOT NULL,
  `province_name` varchar(150) NOT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
('73', 'นครปฐม'),
('72', 'สุพรรณบุรี'),
('71', 'กาญจนบุรี'),
('70', 'ราชบุรี'),
('67', 'เพชรบูรณ์'),
('66', 'พิจิตร'),
('65', 'พิษณุโลก'),
('64', 'สุโขทัย'),
('63', 'ตาก'),
('62', 'กำแพงเพชร'),
('61', 'อุทัยธานี'),
('60', 'นครสวรรค์'),
('58', 'แม่ฮ่องสอน'),
('57', 'เชียงราย'),
('55', 'น่าน'),
('56', 'พะเยา'),
('53', 'อุตรดิตถ์'),
('54', 'แพร่'),
('52', 'ลำปาง'),
('51', 'ลำพูน'),
('50', 'เชียงใหม่'),
('48', 'นครพนม'),
('49', 'มุกดาหาร'),
('47', 'สกลนคร'),
('46', 'กาฬสินธุ์'),
('44', 'มหาสารคาม'),
('45', 'ร้อยเอ็ด'),
('43', 'หนองคาย'),
('42', 'เลย'),
('41', 'อุดรธานี'),
('40', 'ขอนแก่น'),
('38', 'บึงกาฬ'),
('39', 'หนองบัวลำภู'),
('36', 'ชัยภูมิ'),
('37', 'อำนาจเจริญ'),
('35', 'ยโสธร'),
('34', 'อุบลราชธานี'),
('33', 'ศรีสะเกษ'),
('32', 'สุรินทร์'),
('31', 'บุรีรัมย์'),
('27', 'สระแก้ว'),
('30', 'นครราชสีมา'),
('26', 'นครนายก'),
('25', 'ปราจีนบุรี'),
('24', 'ฉะเชิงเทรา   '),
('23', 'ตราด'),
('22', 'จันทบุรี'),
('21', 'ระยอง'),
('20', 'ชลบุรี'),
('19', 'สมุทรปราการ'),
('18', 'สระบุรี'),
('17', 'ชัยนาท'),
('16', 'สิงห์บุรี'),
('15', 'ลพบุรี'),
('14', 'อ่างทอง'),
('12', 'พระนครศรีอยุธยา'),
('11', 'นนทบุรี'),
('93', 'พัทลุง'),
('92', 'ตรัง'),
('91', 'สตูล'),
('86', 'ชุมพร '),
('85', 'ระนอง'),
('90', 'สงขลา'),
('80', 'นครศรีธรรมราช'),
('81', 'กระบี่'),
('82', 'พังงา'),
('83', 'ภูเก็ต'),
('84', 'สุราษฎร์ธานี   '),
('10', 'กรุงเทพมหานคร'),
('94', 'ปัตตานี'),
('95', 'ยะลา   '),
('96', 'นราธิวาส'),
('74', 'สมุทรสาคร'),
('75', 'สมุทรสงคราม'),
('76', 'เพชรบุรี'),
('77', 'ประจวบคีรีขันธ์');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_code` varchar(10) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `position_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `idcard` varchar(13) DEFAULT NULL,
  `address` text,
  `province_id` int(11) DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `pwfix` varchar(30) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_code`, `name`, `surname`, `position_id`, `department_id`, `idcard`, `address`, `province_id`, `mobile`, `email`, `username`, `password`, `pwfix`, `last_login`) VALUES
(1, '99999', 'Admin', 'admin', 5, 1, '', '', 10, '', NULL, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '2018-12-03 14:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `type_budgets`
--

CREATE TABLE IF NOT EXISTS `type_budgets` (
  `type_budgets_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_budgets_name` varchar(100) NOT NULL,
  PRIMARY KEY (`type_budgets_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `type_budgets`
--

INSERT INTO `type_budgets` (`type_budgets_id`, `type_budgets_name`) VALUES
(1, 'งบทุน'),
(2, 'งบการตลาด');

-- --------------------------------------------------------

--
-- Table structure for table `type_customer`
--

CREATE TABLE IF NOT EXISTS `type_customer` (
  `type_customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_customer_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `type_customer`
--

INSERT INTO `type_customer` (`type_customer_id`, `type_customer_name`) VALUES
(1, 'Walking'),
(2, 'Call');

-- --------------------------------------------------------

--
-- Table structure for table `type_home`
--

CREATE TABLE IF NOT EXISTS `type_home` (
  `type_home_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_home_name` varchar(100) NOT NULL,
  PRIMARY KEY (`type_home_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='ประเภทบ้าน' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `type_home`
--

INSERT INTO `type_home` (`type_home_id`, `type_home_name`) VALUES
(1, 'บ้านเดี่ยว');

-- --------------------------------------------------------

--
-- Table structure for table `type_project`
--

CREATE TABLE IF NOT EXISTS `type_project` (
  `type_project_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_project_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_project_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ประเภทโครงการ' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `type_project`
--

INSERT INTO `type_project` (`type_project_id`, `type_project_name`) VALUES
(1, 'บัานเดี่ยว'),
(2, 'บ้านแฝด');

-- --------------------------------------------------------

--
-- Table structure for table `type_unit`
--

CREATE TABLE IF NOT EXISTS `type_unit` (
  `type_unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_unit_name` varchar(100) NOT NULL,
  PRIMARY KEY (`type_unit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `type_unit`
--

INSERT INTO `type_unit` (`type_unit_id`, `type_unit_name`) VALUES
(1, 'แคทลียา (มุม)'),
(2, 'แวนด้า'),
(3, 'แคทลียา'),
(4, 'Type D (มุม)'),
(5, 'Type D'),
(6, 'ฟาแลน..');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `land_no` varchar(100) NOT NULL COMMENT 'แปลง',
  `size_land` double NOT NULL COMMENT 'ขนาดที่ดิน',
  `price_per_sqm` double NOT NULL COMMENT 'ราคา ต่อ ตรว',
  `type_unit_id` int(11) NOT NULL COMMENT 'ประเภทยูนิต',
  `near_park` double DEFAULT NULL COMMENT 'ติดสวน',
  `land_corner` double DEFAULT NULL COMMENT 'แปลงมุม',
  `price` double DEFAULT NULL COMMENT 'ราคาขาย',
  `discount` double DEFAULT NULL COMMENT 'ส่วนลด',
  `price_discount` double DEFAULT NULL COMMENT 'ราคาสุทธิ',
  `fest` int(11) DEFAULT NULL COMMENT 'เฟส',
  `start_date` date DEFAULT NULL COMMENT 'วันที่ก่อสร้าง',
  `end_date` date DEFAULT NULL COMMENT 'วันที่เสร็จ',
  `give_date` date DEFAULT NULL COMMENT 'วันที่ส่งมอบ',
  `check_date` date DEFAULT NULL COMMENT 'วันที่ตรวจบ้าน',
  `transfer_date` date DEFAULT NULL COMMENT 'วันที่โอน',
  `promise_date` date DEFAULT NULL COMMENT 'วันทำสัญญา',
  `book_date` date DEFAULT NULL COMMENT 'วันจอง',
  `customer_id` int(11) DEFAULT NULL COMMENT 'ลูกค้า',
  `price_start` int(11) DEFAULT NULL COMMENT 'ค่าก่อสร้าง',
  `foreman` varchar(100) DEFAULT NULL COMMENT 'ผู้คุมงาน',
  `structure_name` varchar(100) DEFAULT NULL COMMENT 'ผู้รับเหมาโครงสร้าง',
  `architecture_name` varchar(100) DEFAULT NULL COMMENT 'ผู้รับเหมาสถาปัต',
  `dc_name` varchar(100) DEFAULT NULL COMMENT 'ผู้รับเหมาไฟฟ้า',
  `plumbing_name` varchar(100) DEFAULT NULL COMMENT 'ผู้รับเหมาปะปา',
  `remark` text COMMENT 'เงื่อนไขพิเศษ',
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `land_no`, `size_land`, `price_per_sqm`, `type_unit_id`, `near_park`, `land_corner`, `price`, `discount`, `price_discount`, `fest`, `start_date`, `end_date`, `give_date`, `check_date`, `transfer_date`, `promise_date`, `book_date`, `customer_id`, `price_start`, `foreman`, `structure_name`, `architecture_name`, `dc_name`, `plumbing_name`, `remark`) VALUES
(2, 'A01', 60.8, 1000000, 1, 0, 50000, 3500000, 100000, 3400000, 0, '2016-08-04', '2016-08-04', '2016-08-04', '2016-08-04', '2016-08-04', '2016-08-04', '2016-08-04', 0, 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE IF NOT EXISTS `work` (
  `work_id` int(11) NOT NULL AUTO_INCREMENT,
  `ondate` date NOT NULL,
  `work_name` varchar(100) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `groups_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`work_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`work_id`, `ondate`, `work_name`, `unit_id`, `groups_id`, `category_id`, `status`, `percent`, `supplier`) VALUES
(1, '2016-08-04', 'งานฐานราก', 2, 1, 2, '', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

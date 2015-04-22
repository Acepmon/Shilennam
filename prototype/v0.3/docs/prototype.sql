-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2015 at 10:49 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prototype`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `index_id` int(100) NOT NULL AUTO_INCREMENT,
  `id` int(100) NOT NULL,
  `company` varchar(250) COLLATE utf8_bin NOT NULL,
  `reg_code` int(100) DEFAULT NULL,
  `sector_code` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `sector_name` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `org` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`index_id`),
  KEY `index_id` (`index_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`index_id`, `id`, `company`, `reg_code`, `sector_code`, `sector_name`, `org`) VALUES
(1, 258, '4 хараа ХХК', NULL, NULL, NULL, NULL),
(2, 413, '5 толгой нисэх буудал ХХК', NULL, NULL, 'агаарын тээвэр', '9'),
(3, 228, 'CBXZ ХХК', NULL, NULL, NULL, NULL),
(4, 36, 'Get center ХХК', NULL, NULL, NULL, NULL),
(5, 205, 'Жи мобайл ХХК', NULL, 'J6120', 'Утасгүй холбоо', '9'),
(6, 259, 'GSMM нөхөрлөл', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE IF NOT EXISTS `finance` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `year` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `month` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `day` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `debt` double DEFAULT NULL,
  `remaining` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`id`, `year`, `month`, `day`, `name`, `debt`, `remaining`) VALUES
(1, '2008', '7', '23', 'МУНН', 0, 0),
(2, '2008', '7', '29', 'Эрх Чөлөөг Хэрэгжүүлэгч нам', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `financial_list`
--

CREATE TABLE IF NOT EXISTS `financial_list` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `financeid` int(10) NOT NULL,
  `partyid` int(100) NOT NULL,
  `outcomeid` int(100) NOT NULL,
  `incomeid` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FKfinancial_780128` (`incomeid`),
  KEY `FKfinancial_933223` (`outcomeid`),
  KEY `FKfinancial_205934` (`partyid`),
  KEY `FKfinancial_980628` (`financeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `financial_list`
--

INSERT INTO `financial_list` (`id`, `financeid`, `partyid`, `outcomeid`, `incomeid`) VALUES
(1, 1, 5, 1, 1),
(2, 2, 14, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `from_inside` double DEFAULT NULL,
  `from_people` double DEFAULT NULL,
  `other_parties` double DEFAULT NULL,
  `other` double DEFAULT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `from_inside`, `from_people`, `other_parties`, `other`, `total`) VALUES
(1, 19000, 11578.1, 0, 0, 30578.1),
(2, 1500, 3005, 0, 0, 4505);

-- --------------------------------------------------------

--
-- Table structure for table `outcome`
--

CREATE TABLE IF NOT EXISTS `outcome` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `presentation` double DEFAULT NULL,
  `advertisement` double DEFAULT NULL,
  `management` double DEFAULT NULL,
  `employee_salary` double DEFAULT NULL,
  `chancery` double DEFAULT NULL,
  `mail_and_shipping` double DEFAULT NULL,
  `transportation` double DEFAULT NULL,
  `assignment` double DEFAULT NULL,
  `other` double DEFAULT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `outcome`
--

INSERT INTO `outcome` (`id`, `presentation`, `advertisement`, `management`, `employee_salary`, `chancery`, `mail_and_shipping`, `transportation`, `assignment`, `other`, `total`) VALUES
(1, 20846.3, 0, 0, 1000, 0, 1762.5, 6150, 0, 819, 30578.1),
(2, 70, 1762.94, 0, 2366.46, 0, 85, 140, 75.6, 0, 4500);

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE IF NOT EXISTS `party` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8_bin NOT NULL,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `acronym` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23 ;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `code`, `title`, `acronym`) VALUES
(1, 'P1', 'Монгол Ардын нам', 'МАН'),
(2, 'P2', 'Ардчилсан нам', 'АН'),
(3, 'P3', 'Монголын Ногоон нам', 'МНН'),
(4, 'P4', 'Иргэний зориг ногоон нам', 'ИЗНН'),
(5, 'P5', 'Монголын Уламжлалын Нэгдсэн нам', 'МУНН'),
(6, 'P6', 'Монгол Либерал Ардчилсан нам', 'МЛАН'),
(7, 'P7', 'Эх Орон нам', 'ЭОН'),
(8, 'P8', 'Монгол Либерал нам', 'МЛН'),
(9, 'P9', 'Бүгд найрамдах нам', 'БНН'),
(10, 'P10', 'Монголын Эмэгтэйчүүдийн Үндэсний Нам', 'МЭҮН'),
(11, 'P11', 'Монголын Социал Демократ Нам', 'МСДН'),
(12, 'P12', 'Ард Түмний нам', 'АТН'),
(13, 'P13', 'Монгол Үндэсний Ардчилсан нам', 'МҮАН'),
(14, 'P14', 'Эрх Чөлөөг Хэрэгжүүлэгч нам', 'ЭЧХН'),
(15, 'P15', 'Иргэний Хөдөлгөөний нам', 'ИХН'),
(16, 'P16', 'Хөгжлийн Хөтөлбөрийн нам', 'ХХН'),
(17, 'P17', 'Монголын Ардчилсан Хөдөлгөөний нам', 'МОНАРХН'),
(18, 'P18', 'Монгол Ардын Хувьсгалт нам', 'МАХН'),
(19, 'P19', 'Хамуг Монгол Хөдөлмөрийн нам', 'ХМХН'),
(20, 'P20', 'Хөдөлмөрийн үндэсний нам', 'ХҮН'),
(21, 'P21', 'Эх орончдын нэгдсэн нам', 'ЭОНН'),
(22, 'P22', 'Монгол Консерватив нам', 'МКН');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `publisherid` int(11) NOT NULL AUTO_INCREMENT,
  `publishername` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`publisherid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `financial_list`
--
ALTER TABLE `financial_list`
  ADD CONSTRAINT `FKfinancial_980628` FOREIGN KEY (`financeid`) REFERENCES `finance` (`id`),
  ADD CONSTRAINT `FKfinancial_205934` FOREIGN KEY (`partyid`) REFERENCES `party` (`id`),
  ADD CONSTRAINT `FKfinancial_780128` FOREIGN KEY (`incomeid`) REFERENCES `income` (`id`),
  ADD CONSTRAINT `FKfinancial_933223` FOREIGN KEY (`outcomeid`) REFERENCES `outcome` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
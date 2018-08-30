-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2017 at 02:50 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outpace_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `ado_confirmed`
--

CREATE TABLE `ado_confirmed` (
  `id` int(11) NOT NULL,
  `order_no` varchar(200) NOT NULL,
  `pi_id` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `quantity` varchar(200) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `approve_by` int(11) DEFAULT NULL,
  `requested` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ado_confirmed`
--

INSERT INTO `ado_confirmed` (`id`, `order_no`, `pi_id`, `description`, `quantity`, `unit_price`, `approve_by`, `requested`) VALUES
(21, 'OSML/Ad.DO/anotherPi', 'anotherPi', 'kharap', '100.00', 2.1, 1, 'Delivered'),
(22, 'OSML/Ad.DO/anotherPi', 'anotherPi', 'cotton', '200.00', 2.3, 1, 'To be Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `available_goods`
--

CREATE TABLE `available_goods` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `unit_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available_goods`
--

INSERT INTO `available_goods` (`id`, `name`, `unit_price`) VALUES
(4, 'cotton', 2.3),
(5, 'NE 32/1 Carded Knit 100% Cotton Yarn', 3.33),
(6, 'NE 28/1 100% carded yern', 2.3);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `bank_id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `swift` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bank_id`, `bank_name`, `branch`, `admin_name`, `designation`, `address`, `swift`, `created_at`, `updated_at`) VALUES
(1, 'CSS', 'shanto', 'Shanto', 'Manager', 'UK,Bangladesh', '234XX345989898', NULL, NULL),
(2, 'CSS', 'Comilla', 'Shourov', 'Manager', 'Badurtala, Comilla', '3848xx3', NULL, NULL),
(3, 'One Bank', 'Ahsanullah University', 'Shuvo', 'MD', 'Tejgaon, Love Road, Dhaka', '33XX88C', NULL, NULL),
(4, 'Standard Chartered Bank', 'Gulshan Branch', 'Mr.', 'Manager', '67, Gulshan Avenue, Gulshan, ~NEWLINE~Dhaka, Bangladesh', 'SCBLBDDXXXX', NULL, NULL),
(5, 'CSS', 'bbbbbbbb', 'bbbbbbbbbb', 'aaaaaaaaa', 'bbbbbbbbbbbbb', 'aaaaaaaa', NULL, NULL),
(6, 'Export Import Bank Of Bangladesh Ltd.', 'Gulshan Branch', 'Someonee', 'Vice President and Manager', 'Delta life Tower,Plot.37,Road 45 and 90,~NEWLINE~(Ground and 1st Floor),Gulshan North ', 'EXBKBDDH007', NULL, NULL),
(7, 'Export Import Bank Of Bangladesh Ltd.', 'NARAYANGONJ BRANCH', 'someoneee', 'Manager', 'NARAYANGONJ,~NEWLINE~~NEWLINE~BANGLADESH.', 'EXBKBDDH011', NULL, NULL),
(8, 'Brac Bank Ltd', 'Gulshan Branch', 'The Manager', 'Ass. Vice President', 'Anik Tower', 'Brac123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `buyer_id` int(10) UNSIGNED NOT NULL,
  `buyer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `office_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `factory_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`buyer_id`, `buyer_name`, `office_address`, `factory_address`, `created_at`, `updated_at`) VALUES
(1, 'Knit Plus Ltd.', '78,Motijheel CA (7th Floor)~NEWLINE~Room No. 801, Dhaka-1000, Bangladesh.', 'Plot NO: 2036, Mouchak, Kaliakour,~NEWLINE~Gazipur.Bangladesh.', NULL, NULL),
(2, 'Work Field Knit Wears', 'Bawpara,Kaultia,Gazipur Sadar,Gazipur,Bangladesh', 'Same as Office Address', NULL, NULL),
(3, 'ZAF Sweater & Garments Ltd.', 'Section 10,\r\nBlock - D\r\nShilpo Plot D - 19/A\r\nMirpur, Dhaka-1216.', 'Baniarchala, Vobanipur\r\nMirzapur, Gazipur\r\nBangladesh.', NULL, NULL),
(4, 'AKH KNITTING & DYEING LTD.', '92, Phulbaria, Tetuljhora ~NEWLINE~Savar, Dhaka.', '92, Phulbaria, Tetuljhora ~NEWLINE~Savar, Dhaka~NEWLINE~Bangladesh.', NULL, NULL),
(5, 'Nightingale Fashion Ltd.', '588/C, Khilgaon, Block - C,~NEWLINE~Khilgaon ,Dhaka-1219', 'Fac: Plot # A 84-85 (Part) BSCIC I/A~NEWLINE~Kanabari, Gazipurr.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivered_do_product`
--

CREATE TABLE `delivered_do_product` (
  `do_id` varchar(300) NOT NULL,
  `pi_id` varchar(300) NOT NULL,
  `description` varchar(350) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` float NOT NULL,
  `delivered_data` date NOT NULL,
  `requested` varchar(250) NOT NULL DEFAULT 'Delivered'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivered_do_product`
--

INSERT INTO `delivered_do_product` (`do_id`, `pi_id`, `description`, `quantity`, `unit_price`, `delivered_data`, `requested`) VALUES
('OSLM/DO/17/9', 'testPi', 'valo product', 3, 3.2, '2017-04-26', 'Delivered'),
('OSLM/DO/17/9', 'myPi', 'valo product', 4, 3.2, '2017-04-26', 'Delivered'),
('OSLM/DO/17/9', 'myPi', 'valo product', 2, 3.2, '2017-04-28', 'Delivered'),
('OSML/Ad.DO/shantoPi', 'shantoPi', 'valo product', 2, 3.2, '2017-05-01', 'Delivered'),
('OSML/Ad.DO/shantoPi', 'shantoPi', 'valo product', 2, 3.2, '2017-05-01', 'Delivered'),
('OSML/Ad.DO/OSML/EX/PI/135', 'OSML/EX/PI/135', 'NE 32/1 Carded Knit 100% Cotton Yarn', 5000, 3.33, '2017-05-08', 'Delivered'),
('OSML/Ad.DO/OSML/EX/PI/135', 'OSML/EX/PI/135', 'NE 32/1 Carded Knit 100% Cotton Yarn', 4999, 3.33, '2017-05-08', 'Delivered'),
('OSLM/DO/17/12', 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', 5000, 3.33, '2017-05-09', 'Delivered'),
('OSLM/DO/17/12', 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', 1000, 3.33, '2017-05-09', 'Delivered'),
('OSLM/DO/17/12', 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', 500, 3.33, '2017-05-09', 'Delivered'),
('OSLM/DO/17/12', 'OSML/Ex/PI/17/2', 'cotton', 500, 2.33, '2017-05-09', 'Delivered'),
('OSLM/DO/17/9', 'myPi', 'valo product', 10, 3.2, '2017-05-09', 'Delivered'),
('OSLM/DO/17/9', 'myPi', 'valo product', 4, 3.2, '2017-05-09', 'Delivered'),
('OSLM/DO/17/9', 'testPi', 'valo product', 10, 3.2, '2017-05-09', 'Delivered'),
('OSLM/DO/17/9', 'myPi', 'valo product', 10, 3.2, '2017-05-09', 'Delivered'),
('OSLM/DO/17/12', 'OSML/Ex/PI/17/2', 'cotton', 500, 2.33, '2017-05-09', 'Delivered'),
('OSLM/DO/17/9', 'myPi', 'valo product', 6, 3.2, '2017-05-09', 'Delivered'),
('OSLM/DO/17/12', 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', 500, 3.33, '2017-05-09', 'Delivered'),
('OSLM/DO/17/13', 'OSML/Ex/PI/17/3', 'NE 28/1 100% carded yern', 5000, 3.4, '2017-05-09', 'Delivered'),
('OSLM/DO/17/13', 'OSML/Ex/PI/17/3', 'NE 32/1 Carded Knit 100% Cotton Yarn', 400, 3.5, '2017-05-13', 'Delivered'),
('OSLM/DO/17/13', 'OSML/Ex/PI/17/3', 'NE 28/1 100% carded yern', 500, 3.4, '2017-05-13', 'Delivered'),
('OSLM/DO/17/13', 'OSML/Ex/PI/17/3', 'NE 32/1 Carded Knit 100% Cotton Yarn', 10, 3.5, '2017-05-16', 'Delivered'),
('OSLM/DO/17/13', 'OSML/Ex/PI/17/3', 'NE 32/1 Carded Knit 100% Cotton Yarn', 11, 3.5, '2017-05-16', 'Delivered'),
('OSLM/DO/17/13', 'OSML/Ex/PI/17/3', 'NE 32/1 Carded Knit 100% Cotton Yarn', 421, 3.5, '2017-05-16', 'Delivered'),
('OSLM/DO/17/13', 'OSML/Ex/PI/17/3', 'NE 32/1 Carded Knit 100% Cotton Yarn', 8158, 3.5, '2017-05-16', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `deliverystatus`
--

CREATE TABLE `deliverystatus` (
  `buyer` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `chalan` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lc_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pi_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `count` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lot_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quantity` double NOT NULL,
  `rate` double NOT NULL,
  `amount` double NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `table_entry_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_document`
--

CREATE TABLE `delivery_document` (
  `doc_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `doc_part_no` int(10) NOT NULL DEFAULT '1',
  `document_creation_date` date DEFAULT NULL,
  `document_date` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lc_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lc_ammend_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `be_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tc_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bc_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `co_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_ref_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `irc_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'Nil',
  `hs_code_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'Nil',
  `truck_no` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ci_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_marks` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'Nil',
  `payment_tarms` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dc_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'delivery challan no',
  `packing` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `packing_list_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'Nil',
  `import_authorization_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'Nil',
  `insurance_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'Nil',
  `packing_bags_count` int(20) DEFAULT NULL,
  `doc_creator_user_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `maturity` text COLLATE utf8_unicode_ci,
  `table_status` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'wfca',
  `bank_submission` text COLLATE utf8_unicode_ci,
  `bank_ref_no` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_date` text COLLATE utf8_unicode_ci,
  `purchase_amount` double DEFAULT NULL,
  `payment_receive` text COLLATE utf8_unicode_ci,
  `del_com_date` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0-0-0',
  `net_realization` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `delivery_document`
--

INSERT INTO `delivery_document` (`doc_id`, `doc_part_no`, `document_creation_date`, `document_date`, `lc_id`, `lc_ammend_no`, `be_id`, `tc_id`, `bc_id`, `co_id`, `office_ref_no`, `irc_no`, `hs_code_no`, `truck_no`, `ci_id`, `shipping_marks`, `payment_tarms`, `dc_id`, `packing`, `packing_list_id`, `order_no`, `import_authorization_no`, `insurance_no`, `packing_bags_count`, `doc_creator_user_id`, `total_amount`, `maturity`, `table_status`, `bank_submission`, `bank_ref_no`, `purchase_date`, `purchase_amount`, `payment_receive`, `del_com_date`, `net_realization`) VALUES
('OSLM/EX/DOC/17/10', 1, '2017-04-09', NULL, '1111111222', '0', 'OSLM/BE/DOC/17/10', 'OSLM/TC/DOC/17/10', NULL, NULL, NULL, '7', '56', '67', 'OSLM/EX/CI/17/10', '67', '67', 'OSLM/EX/DC/17/10', '5756', 'OSLM/EX/PL/17/10', 'OSLM/DO/17/10', '57', '57', 56, '1', 35630, NULL, 'wfca', NULL, NULL, NULL, NULL, NULL, '0-0-0', NULL),
('OSLM/EX/DOC/17/11', 1, '2017-04-09', NULL, '1111111222', '0', 'OSLM/BE/DOC/17/11', 'OSLM/TC/DOC/17/11', NULL, NULL, NULL, '7', '76', '67', 'OSLM/EX/CI/17/11', '67', '67', 'OSLM/EX/DC/17/11', '767', 'OSLM/EX/PL/17/11', 'OSLM/DO/17/11', '76', '76', 676, '1', 35630, NULL, 'wfca', NULL, NULL, NULL, NULL, NULL, '0-0-0', NULL),
('OSLM/EX/DOC/17/12', 1, '2017-04-09', NULL, '1111111222', '0', 'OSLM/BE/DOC/17/12', 'OSLM/TC/DOC/17/12', NULL, NULL, NULL, '7', '76', '67', 'OSLM/EX/CI/17/12', '67', '67', 'OSLM/EX/DC/17/12', '767', 'OSLM/EX/PL/17/12', 'OSLM/DO/17/12', '76', '76', 676, '1', 35630, NULL, 'wfca', NULL, NULL, NULL, NULL, NULL, '0-0-0', NULL),
('OSLM/EX/DOC/17/13', 1, '2017-04-09', NULL, '1111111222', '0', 'OSLM/BE/DOC/17/13', 'OSLM/TC/DOC/17/13', NULL, NULL, NULL, '6', '76', '76', 'OSLM/EX/CI/17/13', '7676', '7', 'OSLM/EX/DC/17/13', '676', 'OSLM/EX/PL/17/13', 'OSLM/DO/17/13', '7', '67', 76, '1', 35630, NULL, 'wfba', '05/03/2017', '6565', NULL, NULL, NULL, '0-0-0', NULL),
('OSLM/EX/DOC/17/14', 1, '2017-04-09', NULL, '1111111222', '0', 'OSLM/BE/DOC/17/14', 'OSLM/TC/DOC/17/14', NULL, NULL, NULL, '67', '76', '67', 'OSLM/EX/CI/17/14', '67', '6', 'OSLM/EX/DC/17/14', '6', 'OSLM/EX/PL/17/14', 'OSLM/DO/17/14', '7', '67', 76, '1', 35630, NULL, 'wfca', NULL, NULL, NULL, NULL, NULL, '0-0-0', NULL),
('OSLM/EX/DOC/17/15', 1, '2017-04-09', NULL, '1111111222', '0', 'OSLM/BE/DOC/17/15', 'OSLM/TC/DOC/17/15', NULL, NULL, NULL, '676', '67', '7', 'OSLM/EX/CI/17/15', '67', '67', 'OSLM/EX/DC/17/15', '676', 'OSLM/EX/PL/17/15', 'OSLM/DO/17/15', '676', '7', 67, '1', 35630, NULL, 'wfca', NULL, NULL, NULL, NULL, NULL, '0-0-0', NULL),
('OSLM/EX/DOC/17/16', 1, '2017-04-09', NULL, '1111111222', '0', 'OSLM/BE/DOC/17/16', 'OSLM/TC/DOC/17/16', NULL, NULL, NULL, '67', '576', '67', 'OSLM/EX/CI/17/16', '67', '676', 'OSLM/EX/DC/17/16', '5', 'OSLM/EX/PL/17/16', 'OSLM/DO/17/16', '7', '67', 76, '1', 35630, NULL, 'wfca', NULL, NULL, NULL, NULL, NULL, '0-0-0', NULL),
('OSLM/EX/DOC/17/17', 1, '2017-04-09', NULL, '1111111222', '0', 'OSLM/BE/DOC/17/17', 'OSLM/TC/DOC/17/17', NULL, NULL, NULL, '67', '576', '67', 'OSLM/EX/CI/17/17', '67', '676', 'OSLM/EX/DC/17/17', '5', 'OSLM/EX/PL/17/17', 'OSLM/DO/17/17', '7', '67', 76, '1', 33300, NULL, 'wfca', NULL, NULL, NULL, NULL, NULL, '0-0-0', NULL),
('OSLM/EX/DOC/17/18', 1, '2017-04-12', NULL, '194917041000', '0', 'OSLM/BE/DOC/17/18', 'OSLM/TC/DOC/17/18', NULL, NULL, NULL, '5454', '5201', 'dhaka metro K 14-8852', 'OSLM/EX/CI/17/18', 'outpace/AKH', 'at sight', 'OSLM/EX/DC/17/18', 'export standard', 'OSLM/EX/PL/17/18', 'OSLM/DO/17/18', '47477', '34343', 40, '1', 66860, NULL, 'wfca', NULL, NULL, NULL, NULL, NULL, '0-0-0', NULL),
('OSLM/EX/DOC/17/19', 1, '2017-04-15', NULL, '194917041000', '0', 'OSLM/BE/DOC/17/19', 'OSLM/TC/DOC/17/19', NULL, NULL, NULL, '76', '67', '7', 'OSLM/EX/CI/17/19', '67', '67', 'OSLM/EX/DC/17/19', '67', 'OSLM/EX/PL/17/19', 'OSLM/DO/17/19', '67', '6', 76, '1', 35360, NULL, 'wfca', NULL, NULL, NULL, NULL, NULL, '0-0-0', NULL),
('OSLM/EX/DOC/17/20', 2, '2017-04-15', NULL, '194917041000', '0', 'OSLM/BE/DOC/17/20', 'OSLM/TC/DOC/17/20', NULL, NULL, NULL, '5', '6', '65', 'OSLM/EX/CI/17/20', '65', '65', 'OSLM/EX/DC/17/20', '65', 'OSLM/EX/PL/17/20', 'OSLM/DO/17/20', '56', '56', 65, '1', 68, NULL, 'wfca', NULL, NULL, NULL, NULL, NULL, '0-0-0', NULL),
('OSLM/EX/DOC/17/21', 10, '2017-04-16', NULL, '1111111222', '0', 'OSLM/BE/DOC/17/21', 'OSLM/TC/DOC/17/21', NULL, NULL, NULL, '8', '7', '78', 'OSLM/EX/CI/17/21', '78', '7', 'OSLM/EX/DC/17/21', 'poly', 'OSLM/EX/PL/17/21', 'OSLM/DO/17/21', '87', '87', 6, '1', 8990, NULL, 'wfca', NULL, NULL, NULL, NULL, NULL, '0-0-0', NULL),
('OSLM/EX/DOC/17/3', 1, '2017-03-01', NULL, '34', '0', 'OSLM/BE/DOC/17/3', 'OSLM/TC/DOC/17/3', NULL, NULL, NULL, '76', '67', '7', 'OSLM/EX/CI/17/3', '67', '67', 'OSLM/EX/DC/17/3', '6', 'OSLM/EX/PL/17/3', 'OSLM/DO/17/3', '6', '76', 767, '1', 1814.4, '04/11/2017', 'realization', '04/19/2017', '766', '04/17/2017', NULL, '04/28/2017', '1-1-2017', NULL),
('OSLM/EX/DOC/17/3', 78, '2017-03-24', NULL, 'lc345', '0', 'OSLM/BE/DOC/17/3', 'OSLM/TC/DOC/17/3', NULL, NULL, NULL, '78', '87', '78', 'OSLM/EX/CI/17/3', '78', '78', 'OSLM/EX/DC/17/3', '78', 'OSLM/EX/PL/17/3', 'OSLM/DO/17/3', '87', '8', 7, '1', 780, NULL, 'wfca', NULL, NULL, NULL, NULL, NULL, '0-0-0', NULL),
('OSLM/EX/DOC/17/4', 1, '2017-03-01', NULL, '34', '0', 'OSLM/BE/DOC/17/4', 'OSLM/TC/DOC/17/4', NULL, NULL, NULL, '76', '67', '7', 'OSLM/EX/CI/17/4', '67', '67', 'OSLM/EX/DC/17/4', '6', 'OSLM/EX/PL/17/4', 'OSLM/DO/17/4', '6', '76', 767, '1', 1814.4, '0-0-0', 'wfca', '04/16/2017', '344', '04/02/2017', NULL, NULL, '0-0-0', NULL),
('OSLM/EX/DOC/17/4', 78, '2017-03-24', NULL, 'lc345', '0', 'OSLM/BE/DOC/17/4', 'OSLM/TC/DOC/17/4', NULL, NULL, NULL, '87', '7', '87', 'OSLM/EX/CI/17/4', '8', '78', 'OSLM/EX/DC/17/4', '78', 'OSLM/EX/PL/17/4', 'OSLM/DO/17/4', '87', '87', 78, '1', 780, NULL, 'wfca', NULL, NULL, NULL, NULL, NULL, '0-0-0', NULL),
('OSLM/EX/DOC/17/5', 1, '2017-03-24', NULL, 'lctest', '0', 'OSLM/BE/DOC/17/5', 'OSLM/TC/DOC/17/5', NULL, NULL, NULL, '34', '43', '34', 'OSLM/EX/CI/17/5', '34', '34', 'OSLM/EX/DC/17/5', '43', 'OSLM/EX/PL/17/5', 'OSLM/DO/17/5', '4', '34', 43, '1', 320, '04/30/2017', 'realization', '04/20/2017', '767', '04/27/2017', 1600, '04/28/2017', '0-0-0', NULL),
('OSLM/EX/DOC/17/6', 0, '2017-03-24', NULL, 'lctest', '0', 'OSLM/BE/DOC/17/6', 'OSLM/TC/DOC/17/6', NULL, NULL, NULL, '67', '76', '67', 'OSLM/EX/CI/17/6', '67', '67', 'OSLM/EX/DC/17/6', '0', 'OSLM/EX/PL/17/6', 'OSLM/DO/17/6', '7', '67', 67, '1', 320, NULL, 'wfca', NULL, NULL, NULL, NULL, NULL, '0-0-0', NULL),
('OSLM/EX/DOC/17/7', 0, '2017-03-24', NULL, 'lctest', '0', 'OSLM/BE/DOC/17/7', 'OSLM/TC/DOC/17/7', NULL, NULL, NULL, '67', '76', '67', 'OSLM/EX/CI/17/7', '67', '67', 'OSLM/EX/DC/17/7', '086', 'OSLM/EX/PL/17/7', 'OSLM/DO/17/7', '76', '7', 76, '1', 320, NULL, 'wfca', NULL, NULL, NULL, NULL, NULL, '0-0-0', NULL),
('OSLM/EX/DOC/17/8', 76, '2017-04-08', NULL, '135', '0', 'OSLM/BE/DOC/17/8', 'OSLM/TC/DOC/17/8', NULL, NULL, NULL, '67', '76', '67', 'OSLM/EX/CI/17/8', '6', '76', 'OSLM/EX/DC/17/8', '76', 'OSLM/EX/PL/17/8', 'OSLM/DO/17/8', '7', '67', 76, '1', 33300, '05/31/2017', 'drp', '08/29/2017', '656', NULL, NULL, NULL, '2017-08-08', NULL),
('OSLM/EX/DOC/17/9', 1, '2017-04-09', NULL, '1111111222', '0', 'OSLM/BE/DOC/17/9', 'OSLM/TC/DOC/17/9', NULL, NULL, NULL, '56', '65', '5', 'OSLM/EX/CI/17/9', '65', '65', 'OSLM/EX/DC/17/9', '65', 'OSLM/EX/PL/17/9', 'OSLM/DO/17/9', '6', '56', 65, '1', 35630, NULL, 'wfca', NULL, NULL, NULL, NULL, NULL, '0-0-0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_order`
--

CREATE TABLE `delivery_order` (
  `order_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `do_date` date DEFAULT NULL,
  `lc_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lc_ammend_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `do_finally_approve` tinyint(1) NOT NULL DEFAULT '0',
  `notes` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `delivery_order`
--

INSERT INTO `delivery_order` (`order_no`, `do_date`, `lc_id`, `lc_ammend_no`, `do_finally_approve`, `notes`, `updated_at`, `created_at`) VALUES
('OSLM/DO/17/1', '2017-02-26', 'lastMan', '0', 1, '', '2017-02-26 20:50:32', '2017-02-26 20:50:32'),
('OSLM/DO/17/10', '2017-04-23', '34', '0', 1, '', '2017-04-23 11:25:00', '2017-04-23 11:25:00'),
('OSLM/DO/17/11', '2017-05-08', '135', '0', 1, '', '2017-05-08 04:30:08', '2017-05-08 04:30:08'),
('OSLM/DO/17/12', '2017-05-09', '1111111222', '0', 1, '', '2017-05-09 06:43:01', '2017-05-09 06:43:01'),
('OSLM/DO/17/13', '2017-05-09', '194917041000', '0', 1, '', '2017-05-09 11:10:42', '2017-05-09 11:10:42'),
('OSLM/DO/17/2', '2017-02-26', 'lastMan', '0', 1, '', '2017-02-26 20:56:17', '2017-02-26 20:56:17'),
('OSLM/DO/17/3', '2017-02-26', 'lastMan', '0', 1, '', '2017-02-26 20:57:25', '2017-02-26 20:57:25'),
('OSLM/DO/17/4', '2017-03-02', 'afterLc', '0', 1, '', '2017-03-02 17:29:35', '2017-03-02 17:29:35'),
('OSLM/DO/17/5', '2017-03-07', 'theLc', '0', 1, '', '2017-03-07 10:37:49', '2017-03-07 10:37:49'),
('OSLM/DO/17/6', '2017-03-07', 'theLc', '0', 1, '', '2017-03-07 10:54:11', '2017-03-07 10:54:11'),
('OSLM/DO/17/7', '2017-03-07', 'myLc', '0', 1, '', '2017-03-07 10:57:03', '2017-03-07 10:57:03'),
('OSLM/DO/17/8', '2017-03-09', 'shantoLc', '0', 1, '', '2017-03-09 17:45:24', '2017-03-09 17:45:24'),
('OSLM/DO/17/9', '2017-03-11', 'lctest', '0', 1, '', '2017-03-11 07:58:25', '2017-03-11 07:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `doc_goods`
--

CREATE TABLE `doc_goods` (
  `doc_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `doc_part_no` int(10) NOT NULL,
  `pi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `gross_weight` decimal(8,2) NOT NULL,
  `net_weight` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doc_goods`
--

INSERT INTO `doc_goods` (`doc_id`, `doc_part_no`, `pi`, `description`, `quantity`, `unit_price`, `gross_weight`, `net_weight`) VALUES
('OSLM/EX/DOC/17/6', 1, 'testPi', 'valo product', '10.00', '3.20', '34.82', '34.00'),
('OSLM/EX/DOC/17/6', 1, 'testPi', 'cotton', '0.00', '2.30', '44.00', '43.00'),
('OSLM/EX/DOC/17/6', 1, 'anotherPi', 'kharap', '100.00', '2.10', '34.82', '34.00'),
('OSLM/EX/DOC/17/2', 2, 'testPi', 'valo product', '10.00', '3.20', '237.57', '232.00'),
('OSLM/EX/DOC/17/2', 2, 'testPi', 'cotton', '0.00', '2.30', '32.77', '32.00'),
('OSLM/EX/DOC/17/2', 2, 'anotherPi', 'kharap', '100.00', '2.10', '238.59', '233.00'),
('OSLM/EX/DOC/17/2', 2, 'anotherPi', 'cotton', '200.00', '2.30', '23.55', '23.00'),
('OSLM/EX/DOC/17/3', 1, 'OSML/EX/PI/myPi(rev 1)', 'valo product', '567.00', '3.20', '228.35', '223.00'),
('OSLM/EX/DOC/17/4', 1, 'OSML/EX/PI/myPi(rev 1)', 'valo product', '567.00', '3.20', '0.00', '0.00'),
('OSLM/EX/DOC/17/5', 1, 'OSML/EX/PI/myPi(rev 1)', 'valo product', '567.00', '3.20', '345.45', '345.00'),
('OSLM/EX/DOC/17/5', 65, 'AwesomePi', 'valo product', '0.00', '3.20', '34.82', '34.00'),
('OSLM/EX/DOC/17/5', 65, 'AwesomePi', 'kharap', '100.00', '2.10', '44.00', '43.00'),
('OSLM/EX/DOC/17/5', 65, 'AwesomePi', 'cotton', '0.00', '2.30', '32.77', '32.00'),
('OSLM/EX/DOC/17/3', 78, 'myPi', 'valo product', '100.00', '3.20', '351.23', '343.00'),
('OSLM/EX/DOC/17/3', 78, 'myPi', 'cotton', '200.00', '2.30', '353.28', '345.00'),
('OSLM/EX/DOC/17/4', 78, 'myPi', 'valo product', '100.00', '3.20', '353.20', '345.00'),
('OSLM/EX/DOC/17/4', 78, 'myPi', 'cotton', '200.00', '2.30', '464.90', '454.00'),
('OSLM/EX/DOC/17/5', 78, 'myPi', 'valo product', '100.00', '3.20', '46.08', '45.00'),
('OSLM/EX/DOC/17/5', 78, 'myPi', 'valo product', '100.00', '3.20', '46.08', '45.00'),
('OSLM/EX/DOC/17/5', 1, 'myPi', 'valo product', '100.00', '3.20', '46.08', '45.00'),
('OSLM/EX/DOC/17/6', 0, 'myPi', 'valo product', '100.00', '3.20', '12.29', '12.00'),
('OSLM/EX/DOC/17/7', 0, 'myPi', 'valo product', '100.00', '3.20', '23.55', '23.00'),
('OSLM/EX/DOC/17/8', 76, 'OSML/EX/PI/135', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/9', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/9', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/10', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/10', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/11', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/11', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/11', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/11', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/11', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/11', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/9', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/9', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/9', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/9', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/10', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/10', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/9', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/9', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/9', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/9', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/10', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/10', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/11', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/11', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/12', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/12', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/13', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/13', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/14', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/14', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/15', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/15', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/16', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/16', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/16', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '10240.00', '10000.00'),
('OSLM/EX/DOC/17/16', 1, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/17', 1, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '0.00', '0.00'),
('OSLM/EX/DOC/17/18', 1, 'OSML/Ex/PI/17/3', 'NE 28/1 100% carded yern', '10400.00', '3.40', '5120.00', '5000.00'),
('OSLM/EX/DOC/17/18', 1, 'OSML/Ex/PI/17/3', 'NE 32/1 Carded Knit 100% Cotton Yarn', '9000.00', '3.50', '1024.00', '1000.00'),
('OSLM/EX/DOC/17/19', 1, 'OSML/Ex/PI/17/3', 'NE 28/1 100% carded yern', '10400.00', '3.40', '204.80', '200.00'),
('OSLM/EX/DOC/17/20', 2, 'OSML/Ex/PI/17/3', 'NE 28/1 100% carded yern', '10400.00', '3.40', '20.48', '20.00'),
('OSLM/EX/DOC/17/21', 10, 'OSML/Ex/PI/17/2', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', '2048.00', '2000.00'),
('OSLM/EX/DOC/17/21', 10, 'OSML/Ex/PI/17/2', 'cotton', '1000.00', '2.33', '1024.00', '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `do_detail`
--

CREATE TABLE `do_detail` (
  `id` int(11) NOT NULL,
  `order_no` varchar(200) NOT NULL,
  `revision` int(11) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `pi_id` varchar(350) NOT NULL,
  `quantity` double DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `requested` varchar(250) DEFAULT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `do_detail`
--

INSERT INTO `do_detail` (`id`, `order_no`, `revision`, `description`, `pi_id`, `quantity`, `unit_price`, `requested`, `note`) VALUES
(34, 'OSLM/DO/17/9', NULL, 'valo product', 'myPi', 100, 3.2, 'To be Delivered', NULL),
(35, 'OSLM/DO/17/9', NULL, 'cotton', 'myPi', 200, 2.3, 'To be Delivered', NULL),
(36, 'OSLM/DO/17/9', NULL, 'valo product', 'testPi', 10, 3.2, 'To be Delivered', NULL),
(37, 'OSLM/DO/17/6', NULL, 'valo product', 'AwesomePi', 0, 3.2, 'To be Delivered', NULL),
(38, 'OSLM/DO/17/6', NULL, 'kharap', 'AwesomePi', 100, 2.1, 'To be Delivered', NULL),
(39, 'OSLM/DO/17/6', NULL, 'cotton', 'AwesomePi', 0, 2.3, 'To be Delivered', NULL),
(40, 'OSLM/DO/17/6', NULL, 'valo product', 'myPi', 100, 3.2, 'To be Delivered', NULL),
(41, 'OSLM/DO/17/6', NULL, 'cotton', 'myPi', 200, 2.3, 'To be Delivered', NULL),
(42, 'OSLM/DO/17/6', NULL, 'valo product', 'testPi', 10, 3.2, 'To be Delivered', NULL),
(43, 'OSLM/DO/17/6', NULL, 'cotton', 'testPi', 0, 2.3, 'To be Delivered', NULL),
(44, 'OSLM/DO/17/11', NULL, 'NE 32/1 Carded Knit 100% Cotton Yarn', 'OSML/EX/PI/135', 10000, 3.33, 'Delivered', NULL),
(45, 'OSLM/DO/17/12', NULL, 'NE 32/1 Carded Knit 100% Cotton Yarn', 'OSML/Ex/PI/17/2', 10000, 3.33, 'To be Delivered', NULL),
(46, 'OSLM/DO/17/12', NULL, 'cotton', 'OSML/Ex/PI/17/2', 1000, 2.33, 'To be Delivered', NULL),
(47, 'OSLM/DO/17/13', NULL, 'NE 28/1 100% carded yern', 'OSML/Ex/PI/17/3', 10400, 3.4, 'To be Delivered', NULL),
(48, 'OSLM/DO/17/13', NULL, 'NE 32/1 Carded Knit 100% Cotton Yarn', 'OSML/Ex/PI/17/3', 9000, 3.5, 'To be Delivered', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `do_goods`
--

CREATE TABLE `do_goods` (
  `id` int(11) NOT NULL,
  `order_no` varchar(200) NOT NULL,
  `pi_id` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `quantity` varchar(200) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `approve_by` int(11) DEFAULT NULL,
  `requested` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `do_goods`
--

INSERT INTO `do_goods` (`id`, `order_no`, `pi_id`, `description`, `quantity`, `unit_price`, `approve_by`, `requested`, `created_at`, `updated_at`) VALUES
(37, 'OSML/Ad.DO/anotherPi', 'anotherPi', 'kharap', '100.00', 2.1, NULL, 1, NULL, NULL),
(38, 'OSML/Ad.DO/anotherPi', 'anotherPi', 'cotton', '200.00', 2.3, NULL, 0, NULL, NULL),
(57, 'OSML/Ad.DO/shantoPi', 'shantoPi', 'valo product', '100.00', 3.2, 1, 1, NULL, NULL),
(58, 'OSML/Ad.DO/shantoPi', 'shantoPi', 'cotton', '200.00', 2.3, 1, 0, NULL, NULL),
(60, 'OSML/Ad.DO/OSML/EX/PI/135', 'OSML/EX/PI/135', 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', 3.33, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `pi_id` varchar(250) NOT NULL,
  `item_no` int(3) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `requested` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`pi_id`, `item_no`, `description`, `quantity`, `unit_price`, `requested`) VALUES
('aanotherPi', 1, 'valo product', '0.00', '3.20', 0),
('aanotherPi', 2, 'cotton', '0.00', '2.30', 0),
('aanotherPi', 3, 'kharap', '100.00', '2.10', 0),
('aanotherPi', 4, 'valo product', '100.00', '3.20', 0),
('aanotherPi', 5, 'cotton', '200.00', '2.30', 0),
('AwesomePi', 1, 'valo product', '0.00', '3.20', 0),
('AwesomePi', 3, 'kharap', '100.00', '2.10', 0),
('AwesomePi', 4, 'cotton', '0.00', '2.30', 0),
('anotherPi', 1, 'kharap', '100.00', '2.10', 0),
('anotherPi', 2, 'cotton', '200.00', '2.30', 0),
('myPi', 1, 'valo product', '100.00', '3.20', 0),
('myPi', 2, 'cotton', '200.00', '2.30', 0),
('testPi', 1, 'valo product', '10.00', '3.20', 0),
('testPi', 2, 'cotton', '0.00', '2.30', 0),
('shantoPi', 1, 'valo product', '100.00', '3.20', 0),
('shantoPi', 2, 'cotton', '200.00', '2.30', 0),
('neoPi', 1, 'valo product', '23.00', '3.20', 0),
('neoPi', 2, 'cotton', '32.00', '2.30', 0),
('OSML/EX/PI/myPi', 1, 'valo product', '23.00', '3.20', 0),
('OSML/EX/PI/myPi(rev 1)', 1, 'valo product', '567.00', '3.20', 0),
('OSML/EX/PI/myPi(rev 2)', 1, 'valo product', '234.00', '3.20', 0),
('OSML/EX/PI/oerihjjkkllm', 1, 'valo product', '23.00', '3.20', 0),
('OSML/EX/PI/tawhid', 1, 'valo product', '32.00', '3.20', 0),
('OSML/EX/PI/gug', 1, 'valo product', '32.00', '3.20', 0),
('OSML/EX/PI/OSML/Ex/PI/17/134', 1, 'NE 32/1 Carded Knit 100% Cotton Yarn', '1000.00', '3.33', 0),
('OSML/EX/PI/135', 1, 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', 0),
('OSML/EX/PI/OSML/Ex/PI/17/2', 1, 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', 0),
('OSML/Ex/PI/17/2', 1, 'NE 32/1 Carded Knit 100% Cotton Yarn', '10000.00', '3.33', 0),
('OSML/Ex/PI/17/2', 2, 'cotton', '1000.00', '2.33', 0),
('OSML/Ex/PI/17/3', 1, 'NE 28/1 100% carded yern', '10400.00', '3.40', 0),
('OSML/Ex/PI/17/3', 2, 'NE 32/1 Carded Knit 100% Cotton Yarn', '9000.00', '3.50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lc_pi_relation`
--

CREATE TABLE `lc_pi_relation` (
  `lc_pi_id` int(11) NOT NULL,
  `pi_id` varchar(250) DEFAULT NULL,
  `lc_id` varchar(50) NOT NULL,
  `ammend_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lc_pi_relation`
--

INSERT INTO `lc_pi_relation` (`lc_pi_id`, `pi_id`, `lc_id`, `ammend_no`) VALUES
(9, 'anotherPi', 'testLc', 0),
(10, 'testPi', 'testLc', 0),
(11, 'anotherPi', 'testLc', 2),
(12, 'testPi', 'testLc', 2),
(13, 'anotherPi', 'anotherTestLc', 0),
(14, 'testPi', 'myLc', 0),
(15, 'anotherPi', 'lastLc', 0),
(16, 'anotherPi', 'EventLc', 0),
(17, 'anotherPi', 'EventLc', 0),
(18, 'testPi', 'EventLc', 0),
(19, 'anotherPi', 'theLastLc`', 0),
(20, 'anotherPi', 'plzVai', 0),
(21, 'anotherPi', 'finalEventLc', 0),
(22, 'testPi', 'finalEventLc', 0),
(23, 'anotherPi', 'lastMan', 0),
(25, 'anotherPi', 'asholeiLast', 0),
(26, 'testPi', 'asholeiLast', 0),
(27, 'AwesomePi', 'lastMan', 0),
(28, 'myPi', 'afterLc', 0),
(29, 'testPi', 'afterLc', 0),
(30, 'AwesomePi', 'theLc', 0),
(32, 'myPi', 'theLc', 0),
(33, 'testPi', 'theLc', 0),
(34, 'anotherPi', 'myLc', 0),
(35, 'myPi', 'myLc', 0),
(36, 'AwesomePi', 'shantoLc', 0),
(37, 'shantoPi', 'shantoLc', 0),
(38, 'myPi', 'lctest', 0),
(39, 'testPi', 'lctest', 0),
(40, 'myPi', 'lc345', 0),
(41, 'testPi', 'lc345', 0),
(42, 'OSML/EX/PI/myPi(rev 1)', '34', 0),
(43, 'OSML/EX/PI/135', '135', 0),
(44, 'OSML/Ex/PI/17/2', '1111111222', 0),
(45, 'OSML/Ex/PI/17/3', '194917041000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `letter_of_credit`
--

CREATE TABLE `letter_of_credit` (
  `lc_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lc_creator_user_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lc_ammend_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `office_ref_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lc_ammend_clause` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buyer_id` int(10) DEFAULT NULL,
  `issuing_bank_id` int(10) DEFAULT NULL,
  `negotiating_bank_id` int(10) DEFAULT NULL,
  `beneficiary_bank_id` int(10) DEFAULT NULL,
  `sight_days` int(4) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `amount` decimal(20,2) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `shipment_date` date DEFAULT NULL,
  `export_lc_no` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `export_lc_date` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `partial_shipment` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `negotiation_within` int(4) DEFAULT NULL,
  `vat_registration_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dollar_deducted` decimal(20,2) DEFAULT NULL,
  `others_charge` decimal(10,2) DEFAULT NULL,
  `special_conditions` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_method` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `export_garments_qty` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `overdue_interest` decimal(10,2) DEFAULT NULL,
  `finally_approved` tinyint(1) DEFAULT '0',
  `ref` varchar(500) COLLATE utf8_unicode_ci DEFAULT 'Nil',
  `sales_contract_no` varchar(500) COLLATE utf8_unicode_ci DEFAULT 'Nil',
  `area_code` varchar(500) COLLATE utf8_unicode_ci DEFAULT 'Nil',
  `order_no_with_date` varchar(500) COLLATE utf8_unicode_ci DEFAULT 'Nil',
  `notify_party` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Nil',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `letter_of_credit`
--

INSERT INTO `letter_of_credit` (`lc_id`, `lc_creator_user_id`, `lc_ammend_no`, `office_ref_no`, `lc_ammend_clause`, `buyer_id`, `issuing_bank_id`, `negotiating_bank_id`, `beneficiary_bank_id`, `sight_days`, `issue_date`, `amount`, `expiry_date`, `shipment_date`, `export_lc_no`, `export_lc_date`, `partial_shipment`, `negotiation_within`, `vat_registration_no`, `dollar_deducted`, `others_charge`, `special_conditions`, `payment_method`, `export_garments_qty`, `overdue_interest`, `finally_approved`, `ref`, `sales_contract_no`, `area_code`, `order_no_with_date`, `notify_party`, `updated_at`) VALUES
('1111111222', '1', '0', '123', '', 2, 3, 7, 4, 120, '2017-04-21', '33000.00', '0000-00-00', '2017-04-27', '223', '2017-4-29', 'yes', 10, '234', '2.00', '3.00', '', 'cash', '12', '18.00', 1, '234', '019234', '1234', '12, 4/5/2017', '', '2017-05-09 06:43:00'),
('135', '1', '0', '1355', '', 1, 3, 4, 8, 12, '2017-03-26', '33300.00', '2017-07-24', '2017-05-22', '1356', '2017-4-25', 'yes', 122, '1234', '1234.00', '123.00', '', 'Cash', '100', '18.00', 1, '2324', '3324324', '1234', '24, 2017-08-09', '', '2017-05-08 04:30:08'),
('194917041000', '1', '0', '1001', '', 4, 3, 7, 8, 0, '2017-04-09', '67200.00', '0000-00-00', '2017-04-30', 'abcd1234', '2017-4-8', 'yes', 21, '1949', '20.00', '50.00', '', 'USD', '5000', '18.00', 1, '123', '019347', '1215', 'OSML/AKH/17/2015, 6-5-2017', '', '2017-05-09 11:10:42'),
('34', '1', '0', '34', 'none', 2, 3, 8, 7, 120, '2017-03-13', '4000.00', '2017-03-21', '2017-03-27', '454', '2017-3-22', 'yes', 123, '234', '2.00', '23.00', 'none', 'cash', '123', '2.00', 1, '23', '01729345', '1235', '23, 2017-01-01', 'noneyryryy', '2017-04-23 11:24:59'),
('lc345', '1', '0', '87', 'ui', 1, 3, 4, 6, 7, '2017-02-11', '8.00', '2017-02-11', '2017-02-11', '87', '2017-2-11', 'yes', 87, '8', '78.00', '7.00', 'oiuiu', '78', '87', '87.00', 0, '78', '78', '7', '87', 'iui', NULL),
('lctest', '1', '0', '87', '98', 3, 3, 4, 6, 78, '2017-02-11', '87.00', '2017-02-11', '2017-02-11', '7', '2017-2-11', 'yes', 98, '87', '89.00', '89.00', 'iu', '78', '8', '7.00', 1, '8', '78', '78', '78', 'jiU', '2017-03-11 07:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_11_25_063106_create_users_table', 1),
('2016_11_25_115647_create_banks_table', 2),
('2016_11_25_124942_create_buyers_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `net_realization`
--

CREATE TABLE `net_realization` (
  `doc_id` varchar(550) NOT NULL,
  `total_value` decimal(10,0) NOT NULL,
  `short_payment` double NOT NULL,
  `crc` double DEFAULT '0',
  `loan_interest` double DEFAULT '0',
  `loss` decimal(10,0) DEFAULT '0',
  `net_profit` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `net_realization`
--

INSERT INTO `net_realization` (`doc_id`, `total_value`, `short_payment`, `crc`, `loan_interest`, `loss`, `net_profit`) VALUES
('OSLM/EX/DOC/17/5', '2984', 1384.4, 12, 212, '15', '1361'),
('OSLM/EX/DOC/17/5', '2984', 1384.4, 565, 45, '65', '925');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `part` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `insertion_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `type`, `doc_id`, `part`, `description`, `insertion_time`) VALUES
(18, 'LC', 'theLc', '0', 'New LC Inserted', '2017-03-07'),
(19, 'DO', 'OSLM/DO/17/6', '0', 'New DO Inserted', '2017-03-07'),
(20, 'Advance DO', 'OSML/Ad.DO/anotherPi', '0', 'New Advance Inserted', '2017-03-07'),
(21, 'LC', 'myLc', '0', 'New LC Inserted', '2017-03-07'),
(22, 'DO', 'OSLM/DO/17/7', '0', 'New DO Inserted', '2017-03-07'),
(23, 'Ready DO', 'OSLM/DO/17/7', '0', 'New Ready DO Inserted', '2017-03-07'),
(24, 'LC', 'shantoLc', '0', 'New LC Inserted', '2017-03-09'),
(25, 'DO', 'OSLM/DO/17/8', '0', 'New DO Inserted', '2017-03-09'),
(26, 'Advance DO', 'OSML/Ad.DO/shantoPi', '0', 'New Advance Inserted', '2017-03-09'),
(28, 'Ready DO', 'OSLM/DO/17/8', '0', 'New Ready DO Inserted', '2017-03-11'),
(29, 'Advance DO', 'OSML/Ad.DO/aanotherPi', '0', 'New Advance Inserted', '2017-03-11'),
(30, 'LC', 'lctest', '0', 'New LC Inserted', '2017-03-11'),
(31, 'DO', 'OSLM/DO/17/9', '0', 'New DO Inserted', '2017-03-11'),
(32, 'LC', 'lc345', '0', 'New LC Inserted', '2017-03-11'),
(33, 'LC', '34', '0', 'New LC Inserted', '2017-04-01'),
(34, 'DO', 'OSLM/DO/17/10', '0', 'New DO Inserted', '2017-04-23'),
(35, 'Ready DO', 'OSLM/DO/17/9', '0', 'New Ready DO Inserted', '2017-04-25'),
(36, 'Ready DO', 'OSLM/DO/17/6', '0', 'New Ready DO Inserted', '2017-04-30'),
(37, 'Advance DO', 'OSML/Ad.DO/neoPi', '0', 'New Advance Inserted', '2017-04-30'),
(39, 'Ready DO', 'OSML/Ad.DO/shantoPi', '0', 'New Ready DO Inserted', '2017-04-30'),
(40, 'Advance DO', 'OSML/Ad.DO/OSML/EX/PI/135', '0', 'New Advance Inserted', '2017-05-08'),
(41, 'Ready DO', 'OSML/Ad.DO/OSML/EX/PI/135', '0', 'New Ready DO Inserted', '2017-05-08'),
(42, 'LC', '135', '0', 'New LC Inserted', '2017-05-08'),
(43, 'DO', 'OSLM/DO/17/11', '0', 'New DO Inserted', '2017-05-08'),
(44, 'Ready DO', 'OSLM/DO/17/11', '0', 'New Ready DO Inserted', '2017-05-08'),
(45, 'LC', '1111111222', '0', 'New LC Inserted', '2017-05-09'),
(46, 'DO', 'OSLM/DO/17/12', '0', 'New DO Inserted', '2017-05-09'),
(47, 'Ready DO', 'OSLM/DO/17/12', '0', 'New Ready DO Inserted', '2017-05-09'),
(48, 'LC', '194917041000', '0', 'New LC Inserted', '2017-05-09'),
(49, 'DO', 'OSLM/DO/17/13', '0', 'New DO Inserted', '2017-05-09'),
(50, 'Ready DO', 'OSLM/DO/17/13', '0', 'New Ready DO Inserted', '2017-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `proforma_invoice`
--

CREATE TABLE `proforma_invoice` (
  `pi_id` varchar(250) NOT NULL,
  `pi_creator_user_id` int(11) DEFAULT NULL,
  `pi_date` date DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `offer_validity` date DEFAULT NULL,
  `payment_period` int(20) DEFAULT NULL,
  `overdue_interest` decimal(10,0) DEFAULT NULL,
  `cotton_origin` varchar(100) NOT NULL DEFAULT 'Bangladesh',
  `approved_by` int(11) DEFAULT NULL,
  `approval_level` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `special_instruction` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proforma_invoice`
--

INSERT INTO `proforma_invoice` (`pi_id`, `pi_creator_user_id`, `pi_date`, `buyer_id`, `bank_id`, `offer_validity`, `payment_period`, `overdue_interest`, `cotton_origin`, `approved_by`, `approval_level`, `created_at`, `updated_at`, `special_instruction`) VALUES
('aanotherPi', 1, '2016-11-07', 1, 3, '2016-11-23', 23, '2', 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('anotherPi', 1, '2016-10-20', 1, 1, '0000-00-00', 120, '3', 'Bangladesh', 1, NULL, NULL, '2017-02-27 06:41:03', NULL),
('AwesomePi', 1, '2016-11-07', 2, 4, '0000-00-00', 23, '4', 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('hello', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('myPi', 1, '2016-10-07', 3, 4, '2016-10-23', 23, '2', 'Bangladesh', 1, NULL, NULL, '2017-03-03 10:52:16', NULL),
('neoPi', 1, '2017-00-01', 2, 3, '2017-00-01', 120, '3', 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('OSML/EX/PI/135', 1, '2017-05-08', 1, 3, '2017-08-03', 21, '18', 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('OSML/Ex/PI/17/134', 1, '2017-03-08', 2, 3, '2017-04-19', 21, '18', 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('OSML/Ex/PI/17/2', 1, '2017-05-09', 2, 8, '2017-05-31', 21, '18', 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('OSML/Ex/PI/17/3', 1, '2017-05-09', 4, 8, '2017-05-31', 0, '18', 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('OSML/EX/PI/gug', 1, '2017-03-23', 2, 2, '2016-12-31', 0, '2', 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('OSML/EX/PI/myPi', 1, '2016-11-20', 4, 4, '2016-10-30', 0, '2', 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('OSML/EX/PI/myPi(rev 1)', 1, '2016-11-07', 2, 3, '2016-12-31', 123, '2', 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('OSML/EX/PI/myPi(rev 2)', 1, '2016-12-07', 2, 2, '2016-12-31', 120, '2', 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('OSML/EX/PI/oerih', 1, '2017-03-22', 2, 3, '2016-12-23', 123, '2', 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('OSML/EX/PI/oerihjj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('OSML/EX/PI/oerihjjkk', 1, '2017-03-22', NULL, NULL, NULL, NULL, NULL, 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('OSML/EX/PI/oerihjjkkl', 1, '2017-03-22', 2, 3, '2016-02-01', 123, '2', 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('OSML/EX/PI/oerihjjkkll', 1, '2017-03-22', 2, 3, '2016-02-01', 123, '2', 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('OSML/EX/PI/oerihjjkkllm', 1, '2017-03-22', 2, 3, '2016-02-01', 123, '2', 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('OSML/EX/PI/tawhid', 1, '2017-03-22', 3, 3, '2016-01-01', 123, '2', 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('shantoPi', 1, '2017-00-01', 3, 3, '0000-00-00', 120, '3', 'Bangladesh', NULL, NULL, NULL, NULL, NULL),
('testPi', 1, '2017-00-03', 2, 6, '2017-10-30', 120, '2', 'Bangladesh', 1, NULL, NULL, '2017-03-03 10:53:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `replacement_table`
--

CREATE TABLE `replacement_table` (
  `buyer` int(11) NOT NULL,
  `lc_id` varchar(350) NOT NULL,
  `pi_id` varchar(350) NOT NULL,
  `count` varchar(450) NOT NULL,
  `unit_price` float NOT NULL,
  `quantity` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replacement_table`
--

INSERT INTO `replacement_table` (`buyer`, `lc_id`, `pi_id`, `count`, `unit_price`, `quantity`) VALUES
(3, 'lctest', 'testPi', 'cotton', 2.3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `return_do_product`
--

CREATE TABLE `return_do_product` (
  `do_id` varchar(350) NOT NULL,
  `pi_id` varchar(250) NOT NULL,
  `count` varchar(500) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` float NOT NULL,
  `cause` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_do_product`
--

INSERT INTO `return_do_product` (`do_id`, `pi_id`, `count`, `quantity`, `unit_price`, `cause`) VALUES
('OSLM/DO/17/9', 'testPi', 'valo product', 12, 3.2, NULL),
('OSLM/DO/17/9', 'myPi', 'valo product', 10, 3.2, 'Wrong Product'),
('OSML/Ad.DO/OSML/EX/PI/135', 'OSML/EX/PI/135', 'NE 32/1 Carded Knit 100% Cotton Yarn', 4999, 3.33, 'Quality'),
('OSLM/DO/17/13', 'OSML/Ex/PI/17/3', 'NE 28/1 100% carded yern', 4000, 3.4, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_rank` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capabilities` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `signature_dir` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `email`, `name`, `password`, `user_rank`, `status`, `capabilities`, `signature_dir`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'accounts_manager', 'accounts@outpacebd.com', 'someone', '$2y$10$oB0HuN.ypCb0ofAn/HVLpufFsqMG5UQ4CM80mqWJoX4dwbB6YNS2y', 2, 'available', '2,3,', NULL, NULL, '2017-05-09 04:47:04', 'XC2urSnaz3zhcAobiqk1U6oepKBPezmc0nzCuHglxls5KEYtBiylHRzigE4G');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ado_confirmed`
--
ALTER TABLE `ado_confirmed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `available_goods`
--
ALTER TABLE `available_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`buyer_id`);

--
-- Indexes for table `deliverystatus`
--
ALTER TABLE `deliverystatus`
  ADD PRIMARY KEY (`table_entry_id`),
  ADD UNIQUE KEY `chalan` (`chalan`,`lot_id`);

--
-- Indexes for table `delivery_document`
--
ALTER TABLE `delivery_document`
  ADD PRIMARY KEY (`doc_id`,`doc_part_no`),
  ADD KEY `lc_id` (`lc_id`),
  ADD KEY `doc_creator_user_id` (`doc_creator_user_id`),
  ADD KEY `doc_part_no` (`doc_part_no`),
  ADD KEY `lc_ammend_no` (`lc_ammend_no`),
  ADD KEY `lc_id_2` (`lc_id`,`lc_ammend_no`),
  ADD KEY `order_no` (`order_no`);

--
-- Indexes for table `delivery_order`
--
ALTER TABLE `delivery_order`
  ADD PRIMARY KEY (`order_no`),
  ADD KEY `lc_id` (`lc_id`),
  ADD KEY `lc_ammend_no` (`lc_ammend_no`),
  ADD KEY `lc_id_2` (`lc_id`,`lc_ammend_no`);

--
-- Indexes for table `doc_goods`
--
ALTER TABLE `doc_goods`
  ADD KEY `doc_id` (`doc_id`),
  ADD KEY `doc_id_2` (`doc_id`,`doc_part_no`),
  ADD KEY `doc_part_no` (`doc_part_no`);

--
-- Indexes for table `do_detail`
--
ALTER TABLE `do_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `do_goods`
--
ALTER TABLE `do_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lc_pi_relation`
--
ALTER TABLE `lc_pi_relation`
  ADD PRIMARY KEY (`lc_pi_id`);

--
-- Indexes for table `letter_of_credit`
--
ALTER TABLE `letter_of_credit`
  ADD PRIMARY KEY (`lc_id`,`lc_ammend_no`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `bank_id` (`issuing_bank_id`),
  ADD KEY `lc_creator_user_id` (`lc_creator_user_id`),
  ADD KEY `negotiating_bank_id` (`negotiating_bank_id`),
  ADD KEY `beneficiary_bank_id` (`beneficiary_bank_id`),
  ADD KEY `lc_creator_user_id_2` (`lc_creator_user_id`),
  ADD KEY `lc_creator_user_id_3` (`lc_creator_user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `target_user_id` (`doc_id`);

--
-- Indexes for table `proforma_invoice`
--
ALTER TABLE `proforma_invoice`
  ADD PRIMARY KEY (`pi_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ado_confirmed`
--
ALTER TABLE `ado_confirmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `available_goods`
--
ALTER TABLE `available_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `bank_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `buyer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `deliverystatus`
--
ALTER TABLE `deliverystatus`
  MODIFY `table_entry_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `do_detail`
--
ALTER TABLE `do_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `do_goods`
--
ALTER TABLE `do_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `lc_pi_relation`
--
ALTER TABLE `lc_pi_relation`
  MODIFY `lc_pi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

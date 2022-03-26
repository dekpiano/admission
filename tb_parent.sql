-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2022 at 09:57 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skjacth_personnel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_parent`
--

CREATE TABLE `tb_parent` (
  `par_id` int(11) NOT NULL COMMENT 'รหัสตารางผู้ปกครอง',
  `par_stuID` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ใครเป็นลูก',
  `par_relation` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ความสัมพันธ์เป็น',
  `par_prefix` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'นำคำหน้า',
  `par_firstName` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อจริง',
  `par_lastName` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'นามสกุล',
  `par_ago` varchar(2) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อายุ',
  `par_IdNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เลขประชาชน 13 หลัก',
  `par_national` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'สัญชาติ',
  `par_race` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เชื้อชาติ',
  `par_religion` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ศาสนา',
  `par_career` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อาชีพ',
  `par_education` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'วุฒิการศึกษา',
  `par_salary` float NOT NULL COMMENT 'เงินเดือน/รายได้',
  `par_positionJob` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ตำแหน่งหน้าที่การงาน',
  `par_phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เบอร์โทร',
  `par_decease` date NOT NULL COMMENT 'ถึงแก่กรรมวันที่',
  `par_hNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เลขที่บ้านตามทะเบียนบ้าน',
  `par_hMoo` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หมู่ตามทะเบียนบ้าน',
  `par_hTambon` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ตำบลตามทะเบียนบ้าน',
  `par_hDistrict` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อำเภอตามทะเบียนบ้าน',
  `par_hProvince` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'จังหวัดตามทะเบียนบ้าน',
  `par_hPostcode` varchar(7) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสไปรษณีย์ตามทะเบียนบ้าน',
  `par_cNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เลขที่บ้านปัจจุบัน',
  `par_cMoo` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หมู่ปัจจุบัน',
  `par_cTambon` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ตำบลปัจจุบัน',
  `par_cDistrict` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อำเภอปัจจุบัน',
  `par_cProvince` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'จังหวัดปัจจุบัน',
  `par_cPostcode` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสไปรษณีย์ปัจจุบัน',
  `par_rest` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ลักษณะที่พัก',
  `par_restOrthor` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ที่พักอื่น ๆ ',
  `par_service` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'สถานที่รับราชการ',
  `par_serviceName` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อที่รับราชการ',
  `par_claim` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'สิทธิการเบิกค่าเล่าเรียน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_parent`
--

INSERT INTO `tb_parent` (`par_id`, `par_stuID`, `par_relation`, `par_prefix`, `par_firstName`, `par_lastName`, `par_ago`, `par_IdNumber`, `par_national`, `par_race`, `par_religion`, `par_career`, `par_education`, `par_salary`, `par_positionJob`, `par_phone`, `par_decease`, `par_hNumber`, `par_hMoo`, `par_hTambon`, `par_hDistrict`, `par_hProvince`, `par_hPostcode`, `par_cNumber`, `par_cMoo`, `par_cTambon`, `par_cDistrict`, `par_cProvince`, `par_cPostcode`, `par_rest`, `par_restOrthor`, `par_service`, `par_serviceName`, `par_claim`) VALUES
(2, '1-3192-00052-53-9', 'บิดา', 'นาย', 'ซื่อ', 'ใด', '45', '1-6002-55555-22-2', 'ไทย', 'ไทย', 'พุทธ', 'ค้าขาย', 'ป.6', 15000, 'คนงาน', '091-051-8473', '0000-00-00', '5', '5', 'พงตึก', 'ท่ามะกา', 'กาญจนบุรี', '60000', '5', '5', 'สกาด', '', 'กาญจนบุรี', '71120', 'บ้านตนเอง', '555555555555', 'กรม', '1 ลัง', 'เบิกได้');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_parent`
--
ALTER TABLE `tb_parent`
  ADD PRIMARY KEY (`par_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_parent`
--
ALTER TABLE `tb_parent`
  MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตารางผู้ปกครอง', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

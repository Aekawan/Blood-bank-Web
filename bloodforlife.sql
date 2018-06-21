-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2017 at 07:31 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodforlife`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_request`
--

CREATE TABLE `blood_request` (
  `blood_request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` enum('นาย','นาง','นางสาว','') COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` enum('ชาย','หญิง','','') COLLATE utf8_unicode_ci NOT NULL,
  `blood_type` enum('A Rh+','A Rh-','B Rh+','B Rh-','AB Rh+','AB Rh-','O Rh+','O Rh-') COLLATE utf8_unicode_ci NOT NULL,
  `hospital_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hospital_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `case_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blood_request`
--

INSERT INTO `blood_request` (`blood_request_id`, `user_id`, `title`, `firstname`, `lastname`, `sex`, `blood_type`, `hospital_name`, `hospital_phone`, `case_description`) VALUES
(4, 7, 'นาย', 'อัครเดช', 'สมบัตทิพย์', 'ชาย', 'A Rh+', 'โรงพยาบาลองค์การบริหาร ส่วนจังหวัดภูเก็ต', '076-358888', 'swsswswsw'),
(5, 9, 'นาย', 'กขค', 'งจฉ', 'ชาย', 'A Rh+', 'โรงพยาบาลองค์การบริหาร ส่วนจังหวัดภูเก็ต', '076-358888', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospital_id` int(11) NOT NULL,
  `hospital_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hospital_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hospital_district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hospital_amphoe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hospital_province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hospital_zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hospital_latitude` decimal(11,7) NOT NULL,
  `hospital_logitude` decimal(11,7) NOT NULL,
  `hospital_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hospital_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospital_id`, `hospital_name`, `hospital_address`, `hospital_district`, `hospital_amphoe`, `hospital_province`, `hospital_zipcode`, `hospital_latitude`, `hospital_logitude`, `hospital_phone`, `hospital_img`) VALUES
(1, 'โรงพยาบาลถลาง', '', 'เทพกระษัตรี', 'ถลาง', 'ภูเก็ต', '83110', '8.0237070', '98.3389640', '076-112134', 'http://www.thalanghospital.go.th/newweb/images/random/02.jpg'),
(2, 'โรงพยาบาลสิริโรจน์', '44 ถนน เฉลิมพระเกียรติรัชกาล ที่ 9', 'วิชิต', 'เมืองภูเก็ต', 'ภูเก็ต', '83000', '7.8979030', '98.3680190', '076-361888', 'http://www.sudkum.com/images/promotion/promotion20150518092228.jpg'),
(3, 'โรงพยาบาลมิชชั่นภูเก็ต', '4/1 หมู่3 ถนนเทพกระษัตรี', 'รัษฎา', 'เมืองภูเก็ต', 'ภูเก็ต', '83000', '7.9067610', '98.3908060', '076-237220', 'https://i2.wp.com/www.accessiblethailand.com/wp-content/uploads/2013/08/mission-hospital-phuket.jpg?fit=618%2C400'),
(4, 'โรงพยาบาลกรุงเทพ ภูเก็ต', 'ซอย หงษ์หยกอุทิศ - ซอย ประยูร 2/1 ', 'ตลาดใหญ่', 'เมืองภูเก็ต', 'ภูเก็ต', '83000', '7.9039940', '98.3762930', '076-254425', 'http://www.bangkoklife.com/happylifeclub/Upload/Images/16db369018e14e6eb921f3216fa69d0b.jpg'),
(5, 'โรงพยาบาลวชิระ ภูเก็ต', '353 ถนนเยาวราช', 'ตลาดเหนือ', 'เมืองภูเก็ต', 'ภูเก็ต', '83000', '7.8968850', '98.3840270', '076-361234', 'https://www.vachiraphuket.go.th/2015-slider/front1.jpg'),
(6, 'โรงพยาบาลองค์การบริหาร ส่วนจังหวัดภูเก็ต', '18, 20 ถ.อนุภาษภูเก็ตการ', 'ตลาดใหญ่', 'เมืองภูเก็ต', 'ภูเก็ต', '83000', '7.8811070', '98.4049310', '076-358888', 'http://www.phuketcityhospital.org/uploads/20130603133540_01.jpg'),
(7, 'โรงพยาบาลดีบุก', '89 / 8-9 หมู่2 ถนนเจ้าฟ้า', 'วิชิต', 'เมืองภูเก็ต', 'ภูเก็ต', '83000', '7.8717030', '98.3602640', '076-298298', 'https://yt3.ggpht.com/-RfJOP1O47hc/AAAAAAAAAAI/AAAAAAAAAAA/0yfFHWjmlVM/s900-c-k-no-mo-rj-c0xffffff/photo.jpg'),
(8, 'โรงพยาบาลป่าตอง', '57 Sai Saen Road', 'กะทู้', 'กะทู้', 'ภูเก็ต', '83120', '7.8964810', '98.3018680', '076-342633', 'https://www.luxuryvillasphuketthailand.com/wp-content/uploads/2016/09/Patong-hospital-Phuket.jpg'),
(9, 'ศูนย์บริจากโลหิต สภากาชาดไทย', '38/193, ถนน รัตนโกสินทร์ 200 ปี', 'ตลาดเหนือ', 'เมืองภูเก็ต', 'ภูเก็ต', '83000', '7.8735110', '98.3871840', '076-251178', 'https://phuketdir.com/phuketredcross/blood-center-01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_status` enum('admin','user') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_status`) VALUES
(7, 'psupsu', 'psu123', 'user'),
(8, 'psu123', 'psu123', 'user'),
(9, '123456', '123456', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_card` bigint(20) NOT NULL,
  `title` enum('นาย','นาง','นางสาว','') COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` enum('ชาย','หญิง','','') COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `blood_type` enum('A Rh+','A Rh-','B Rh+','B Rh-','AB Rh+','AB Rh-','O Rh+','O Rh-') COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amphoe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_id`, `id_card`, `title`, `firstname`, `lastname`, `sex`, `birthday`, `blood_type`, `address`, `district`, `amphoe`, `province`, `zipcode`, `phone`, `facebook`, `email`) VALUES
(5, 7, 12345678945, 'นาย', 'อัครเดช', 'สมบัตทิพย์', 'ชาย', '11/12/2538', 'A Rh+', '80/1 หมู่1', 'กะทู้', 'กะทู้', 'ภูเก็ต', '83120', '081234567', 'https://www.facebook.com', 'mail@gmail.com'),
(6, 8, 1840655567676, 'นาย', 'Aasdf', 'Asdff', 'ชาย', '11/12/2538', 'A Rh+', 'Aasd 123', 'กะทู้', 'กะทู้', 'ภูเก็ต', '83120', '191', 'www.facebook.com', 'asdd@mail.com'),
(7, 9, 123456789, 'นาย', 'กขค', 'งจฉ', 'ชาย', '11/12/2538', 'A Rh+', '123', 'กะทู้', 'กะทู้', 'ภูเก็ต', '83120', '08123456789', 'dfdfd', 'aekawan.ks@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_request`
--
ALTER TABLE `blood_request`
  ADD PRIMARY KEY (`blood_request_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_request`
--
ALTER TABLE `blood_request`
  MODIFY `blood_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

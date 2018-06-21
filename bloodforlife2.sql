-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 06, 2017 at 06:30 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
  `case_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_delete` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blood_request`
--

INSERT INTO `blood_request` (`blood_request_id`, `user_id`, `title`, `firstname`, `lastname`, `sex`, `blood_type`, `hospital_name`, `hospital_phone`, `case_description`, `time_delete`, `status`, `created_at`, `update_at`) VALUES
(4, 7, 'นาย', 'อัครเดช', 'สมบัตทิพย์', 'ชาย', 'A Rh+', 'โรงพยาบาลองค์การบริหาร ส่วนจังหวัดภูเก็ต', '076-358888', 'swsswswsw', 0, 1, '2017-12-05 17:12:17', '2017-12-05 17:15:20'),
(5, 9, 'นาย', 'กขค', 'งจฉ', 'ชาย', 'A Rh+', 'โรงพยาบาลองค์การบริหาร ส่วนจังหวัดภูเก็ต', '076-358888', 'test', 0, 1, '2017-12-05 17:12:17', '2017-12-05 17:15:29'),
(6, 7, 'นาย', 'อัครเดช', 'สมบัตทิพย์', 'ชาย', 'A Rh+', 'โรงพยาบาลถลาง', '076-112134', 'กกก', 0, 1, '2017-12-05 17:12:17', '2017-12-05 17:15:37'),
(10, 18, 'นาย', 'เมล', 'เมล', '', 'A Rh+', 'โรงพยาบาลมิชชั่นภูเก็ต', '076-237220', 'ลองระบบส่งเมล์', 7, 1, '2017-12-05 19:36:04', '2017-12-05 19:36:04'),
(11, 18, 'นาย', 'ส่งเมล', 'ส่งเมล', '', 'A Rh+', 'โรงพยาบาลกรุงเทพ ภูเก็ต', '076-254425', 'ส่งเมล', 7, 1, '2017-12-05 19:37:21', '2017-12-05 19:37:21'),
(12, 18, 'นาย', 'ำพดำดำด', 'ำดำดำดำ', '', 'A Rh+', 'โรงพยาบาลกรุงเทพ ภูเก็ต', '076-254425', 'ำดำดำดำด', 7, 1, '2017-12-05 19:38:08', '2017-12-05 19:38:08'),
(13, 18, 'นาย', 'rrrrrrrr', 'rrrrrrrrrrr', '', 'A Rh+', 'โรงพยาบาลดีบุก', '076-298298', 'rrrrrrrrrrrrrrrrrrrrr', 7, 1, '2017-12-05 19:39:37', '2017-12-05 19:39:37'),
(14, 18, 'นาย', 'efefef', 'efefef', '', 'A Rh+', 'โรงพยาบาลกรุงเทพ ภูเก็ต', '076-254425', 'efefefefefefef', 7, 1, '2017-12-05 19:42:38', '2017-12-05 19:42:38'),
(15, 18, 'นาย', 'ส่งเมลล่าสุด', 'ส่งเมลล่าสุด', '', 'A Rh+', 'โรงพยาบาลดีบุก', '076-298298', 'ส่งเมลล่าสุด', 7, 1, '2017-12-05 19:45:48', '2017-12-05 19:45:48'),
(16, 18, 'นาย', 'อังกอ', 'อังกอ', '', 'A Rh+', 'โรงพยาบาลองค์การบริหาร ส่วนจังหวัดภูเก็ต', '076-358888', 'เสือกัด', 7, 1, '2017-12-05 19:47:41', '2017-12-05 19:47:41'),
(17, 18, 'นาย', 'ทดลองส่งเมล', 'ทดลองส่งเมล', '', 'A Rh+', 'โรงพยาบาลสิริโรจน์', '076-361888', 'ทดลองส่งเมล', 7, 1, '2017-12-05 19:48:44', '2017-12-05 19:48:44'),
(18, 18, 'นาย', 'บักหำ', 'บักหำ', '', 'A Rh+', 'โรงพยาบาลองค์การบริหาร ส่วนจังหวัดภูเก็ต', '076-358888', 'บักหำ', 7, 1, '2017-12-05 19:50:51', '2017-12-05 19:50:51'),
(20, 26, 'นาย', 'ใจดี', 'มีสุข', 'ชาย', 'A Rh-', 'โรงพยาบาลกรุงเทพ ภูเก็ต', '076-254425', 'test', 7, 1, '2017-12-06 04:52:46', '2017-12-06 04:52:46'),
(21, 26, 'นาย', 'ใจดี', 'มีสุข', 'ชาย', 'A Rh-', 'โรงพยาบาลวชิระ ภูเก็ต', '076-361234', 'test', 7, 1, '2017-12-06 04:54:11', '2017-12-06 04:54:11'),
(22, 26, 'นาย', 'ใจดี', 'มีสุข', 'ชาย', 'A Rh-', 'โรงพยาบาลกรุงเทพ ภูเก็ต', '076-254425', 'test', 7, 1, '2017-12-06 04:55:34', '2017-12-06 04:55:34');

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
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_verify` tinyint(1) NOT NULL,
  `user_status` enum('admin','user') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `facebook_id`, `user_username`, `user_password`, `user_provider`, `user_verify`, `user_status`) VALUES
(7, '', 'psupsu', 'psu123', '', 0, 'user'),
(8, '', 'psu123', 'psu123', '', 0, 'user'),
(9, '', '123456', '123456', '', 0, 'user'),
(26, '0', 'l3ankzas13', 'bank2538', 'username', 1, 'user');

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
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_id`, `id_card`, `title`, `firstname`, `lastname`, `sex`, `birthday`, `blood_type`, `address`, `district`, `amphoe`, `province`, `zipcode`, `phone`, `facebook`, `email`, `picture`) VALUES
(5, 7, 12345678945, 'นาย', 'อัครเดช', 'สมบัตทิพย์', 'ชาย', '11/12/2538', 'A Rh-', '80/1 หมู่1', 'กะทู้', 'กะทู้', 'ภูเก็ต', '83120', '081234567', 'https://www.facebook.com', 'l3anksingle123@gmail.com', ''),
(6, 8, 1840655567676, 'นาย', 'Aasdf', 'Asdff', 'ชาย', '11/12/2538', 'A Rh+', 'Aasd 123', 'กะทู้', 'กะทู้', 'ภูเก็ต', '83120', '191', 'www.facebook.com', 's5730213083@gmail.com', ''),
(7, 9, 123456789, 'นาย', 'กขค', 'งจฉ', 'ชาย', '11/12/2538', 'A Rh+', '123', 'กะทู้', 'กะทู้', 'ภูเก็ต', '83120', '08123456789', 'dfdfd', 'matchima.nee29@gmail.com', ''),
(15, 26, 1840600092276, 'นาย', 'ใจดี', 'มีสุข', 'ชาย', '10/11/2541', 'A Rh-', '123', 'กะทู้', 'กะทู้', 'ภูเก็ต', '83120', '0945485674', 'https://www.facebook.com/1150', 'test@gmail.com', '');

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
  MODIFY `blood_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
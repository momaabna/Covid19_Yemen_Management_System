-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 07:24 PM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

DROP TABLE IF EXISTS `cases`;
CREATE TABLE IF NOT EXISTS `cases` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `datetime` datetime NOT NULL,
  `info` text NOT NULL,
  `adress` text NOT NULL,
  `hc_name` text NOT NULL,
  `hc_id` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `lon` double NOT NULL,
  `lat` double NOT NULL,
  `type` int(11) NOT NULL,
  `phone` text NOT NULL,
  `phone2` text NOT NULL,
  `nat_id` text,
  `state_` text NOT NULL,
  `locality` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `name`, `datetime`, `info`, `adress`, `hc_name`, `hc_id`, `state`, `lon`, `lat`, `type`, `phone`, `phone2`, `nat_id`, `state_`, `locality`) VALUES
(9, 'تاتاتا', '2020-04-02 19:39:09', 'تاتاتا', 'اتاتا', 'تاتاتا', 1, 0, 32.6914569111328, 15.656968585055125, 1, '122121', '212121', NULL, '', ''),
(5, 'hkkhkhkh', '2020-03-25 21:03:30', 'kkhkhh', 'khkhkh', 'khkhkh', 1, 0, 32.467610475585936, 15.679447037575102, 1, '1111111111', '1111111111', NULL, '', ''),
(10, 'نتنستنستت', '2020-04-04 03:43:00', 'ةوةىةىةوىةىةى', 'نتنتنتنت', 'نتنتنتنت', 1, 1, 32.41405212597655, 15.598777589828032, 3, '21212121', '212121', NULL, '', ''),
(13, 'محمد مييي ', '2020-04-04 13:13:13', 'Score : 2', 'مثال بالعربية', 'Atebaaa', 3, -1, 29.945491825, 17.015550147329392, 0, '211212121212', '21212121', NULL, '', ''),
(14, 'Test', '2020-04-05 15:32:04', 'test', 'test', 'test', 2, 1, 32.66948425488281, 15.512783435937422, 1, '212121', '12212121', NULL, 'SD01', 'SD01003'),
(15, 'Mohammed Ahmed Ali', '2020-04-09 19:04:55', 'Score : 2', 'Emarat', 'Atebaaa', 2, -1, 35.4825911, 38.720394899999995, 0, '211212121212', '212121', NULL, '-1', 'locality');

-- --------------------------------------------------------

--
-- Table structure for table `hc`
--

DROP TABLE IF EXISTS `hc`;
CREATE TABLE IF NOT EXISTS `hc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `info` text NOT NULL,
  `power` int(11) NOT NULL,
  `phone` text,
  `phone2` text,
  `lon` double NOT NULL,
  `lat` double NOT NULL,
  `adress` text NOT NULL,
  `state` int(11) NOT NULL,
  `owner_name` text NOT NULL,
  `owner_contact` text NOT NULL,
  `project_manager` text NOT NULL,
  `stakeholders` text NOT NULL,
  `i_teams` text NOT NULL,
  `r_t_contacts` text NOT NULL,
  `medical_usage` int(11) NOT NULL,
  `building_status` int(11) NOT NULL,
  `owner_acceptance` int(11) NOT NULL,
  `resistnce_acceptance` int(11) NOT NULL,
  `readiness_status` int(11) NOT NULL,
  `building_type` int(11) NOT NULL,
  `init_budget` bigint(20) NOT NULL,
  `e_f_date` date DEFAULT NULL,
  `i_date` date DEFAULT NULL,
  `state_` text NOT NULL,
  `locality` text NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hc`
--

INSERT INTO `hc` (`id`, `name`, `info`, `power`, `phone`, `phone2`, `lon`, `lat`, `adress`, `state`, `owner_name`, `owner_contact`, `project_manager`, `stakeholders`, `i_teams`, `r_t_contacts`, `medical_usage`, `building_status`, `owner_acceptance`, `resistnce_acceptance`, `readiness_status`, `building_type`, `init_budget`, `e_f_date`, `i_date`, `state_`, `locality`, `img`) VALUES
(7, 'a', 'a', 100, '1', '1', 32.4058123798828, 15.556446496469775, 'a', 0, 'a', '1212', 'a', 'a', 'a', 'a', 1, 1, 1, 1, 1, 1, 100000, '2020-04-15', '2020-04-15', 'SD02', 'SD02114', ''),
(2, 'Universial Hospital', 'Universial Hospital', 50, '1212121', '21212121', 32.555663, 15.618842, 'Universial Hospital', 0, '', '', '', '', '', '', 0, 1, 0, 0, 0, 2, 0, NULL, NULL, '', '0', ''),
(4, 'a', 'a', 10, '1', '1', 32.5815936298828, 15.536600797432627, 'a', 0, 'aa', '1', 'a', 'a', 'a', 'a', 0, 2, 1, 0, 0, 0, 10, '2020-04-15', '2020-04-15', 'SD01', 'SD01003', ''),
(5, 'a', 'a', 10, '12', '2312', 32.52803528027343, 15.498227028456938, 'a', 0, 'a', 'a', 'a', 'a', 'a', 'a', 0, 0, 0, 1, 0, 0, 10, '2020-04-22', '2020-04-22', 'SD01', 'SD01003', ''),
(6, 'b', 'b', 10, '111', '111', 32.42091858105468, 15.59613215202205, 'b', 0, 'b', '10', 'bb', 'b', 'b', 'b', 0, 0, 1, 0, 0, 0, 10000, '2020-04-15', '2020-04-15', 'SD01', 'SD01003', ''),
(8, 'ببببببب', 'نتاتناتا', 10, '12', '2121', 32.3728533955078, 15.50219705951271, 'بببب', 0, 'بمننمتي', '0233', 'نتاتانتا', 'تانتاتا', 'نتااتا', 'تاتناتاتا', 0, 0, 0, 0, 2, 0, 323232, '2020-04-15', '2020-04-14', 'SD01', 'SD01003', ''),
(9, 'ksjks', 'kjkj', 1000, '122', '122', 32.563740846679686, 15.465140471561256, 'jkjkj', 0, 'ddddd', '323232', '212121', 'jkjkj', 'kjkj', 'k122', 0, 0, 0, 0, 0, 0, 1000000, '2020-04-15', '2020-04-15', 'SD01', 'SD01003', 'admin/qurantines_images/41d493d8c23208338c568bd028d97e3bimg5e90bdf26094b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `datetime` datetime NOT NULL,
  `info` text NOT NULL,
  `adress` text NOT NULL,
  `hc_name` text NOT NULL,
  `hc_id` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `lon` double NOT NULL,
  `lat` double NOT NULL,
  `type` int(11) NOT NULL,
  `phone` text NOT NULL,
  `phone2` text NOT NULL,
  `nat_id` text NOT NULL,
  `p1` int(11) NOT NULL,
  `p2` int(11) NOT NULL,
  `p3` int(11) NOT NULL,
  `p4` int(11) NOT NULL,
  `p5` int(11) NOT NULL,
  `p6` int(11) NOT NULL,
  `p7` int(11) NOT NULL,
  `p8` int(11) NOT NULL,
  `p9` int(11) NOT NULL,
  `p10` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `state_` text NOT NULL,
  `locality` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `name`, `datetime`, `info`, `adress`, `hc_name`, `hc_id`, `state`, `lon`, `lat`, `type`, `phone`, `phone2`, `nat_id`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `child`, `state_`, `locality`) VALUES
(7, 'Mohammed Ahmed Ali', '2020-04-09 18:41:42', 'No thing', 'Emarat', 'Atebaaa', 1, -1, 35.4826225, 38.7203684, 0, '211212121212', '21212121', '2121454323232', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int(3) DEFAULT NULL,
  `admin2Name_en` varchar(31) DEFAULT NULL,
  `admin2Name_ar` varchar(50) DEFAULT NULL,
  `admin2Pcode` varchar(14) DEFAULT NULL,
  `admin1Name_en` varchar(14) DEFAULT NULL,
  `admin1Name_ar` varchar(10) DEFAULT NULL,
  `admin1Pcode` varchar(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `admin2Name_en`, `admin2Name_ar`, `admin2Pcode`, `admin1Name_en`, `admin1Name_ar`, `admin1Pcode`) VALUES
(1, 'Abassiya', 'العباسية', 'SD07090', 'South Kordofan', 'جنوب كردفا', 'SD07'),
(2, 'Abu Hamad', 'أبو حمد', 'SD16008', 'River Nile', 'نهر النيل', 'SD16'),
(3, 'Abu Hujar', 'أبو حجار', 'SD14037', 'Sennar', 'سنار', 'SD14'),
(4, 'Abu Jabrah', 'أبو جابرة', 'SD05140', 'East Darfur', 'شرق دارفور', 'SD05'),
(5, 'Abu Jubayhah', 'أبو جبيهة', 'SD07088', 'South Kordofan', 'جنوب كردفا', 'SD07'),
(6, 'Abu Karinka', 'أبو كارنكا', 'SD05155', 'East Darfur', 'شرق دارفور', 'SD05'),
(7, 'Abu Kershola', 'أبو كرشولا', 'SD07104', 'South Kordofan', 'جنوب كردفا', 'SD07'),
(8, 'Abu Zabad', 'أبو زبد', 'SD18028', 'West Kordofan', 'غرب كردفان', 'SD18'),
(9, 'Abyei', 'أبيي', 'SD18087', 'West Kordofan', 'غرب كردفان', 'SD18'),
(10, 'Abyei PCA area', 'إدارية أبيي', 'SD19001', 'Abyei PCA', 'إدارية أبي', 'SD19'),
(11, 'Ad Dabbah', 'الدبة', 'SD17019', 'Northern', 'الشمالية', 'SD17'),
(12, 'Ad Dali', 'الدالي', 'SD14039', 'Sennar', 'سنار', 'SD14'),
(13, 'Ad Damar', 'الدامر', 'SD16011', 'River Nile', 'نهر النيل', 'SD16'),
(14, 'Ad Dinder', 'الدندر', 'SD14040', 'Sennar', 'سنار', 'SD14'),
(15, 'Ad Diwaim', 'الدويم', 'SD09044', 'White Nile', 'النيل الأب', 'SD09'),
(16, 'Ad Du''ayn', 'الضعين', 'SD05142', 'East Darfur', 'شرق دارفور', 'SD05'),
(17, 'Adila', 'عديلة', 'SD05139', 'East Darfur', 'شرق دارفور', 'SD05'),
(18, 'Ag Geneina', 'الجنينة', 'SD04115', 'West Darfur', 'غرب دارفور', 'SD04'),
(19, 'Agig', 'عقيق', 'SD10072', 'Red Sea', 'البحر الأح', 'SD10'),
(20, 'Aj Jabalain', 'الجبلين', 'SD09051', 'White Nile', 'النيل الأب', 'SD09'),
(21, 'Al Buhaira', 'البحيرة', 'SD16014', 'River Nile', 'نهر النيل', 'SD16'),
(22, 'Al Buram', 'البرام', 'SD07099', 'South Kordofan', 'جنوب كردفا', 'SD07'),
(23, 'Al Burgaig', 'البرقيق', 'SD17016', 'Northern', 'الشمالية', 'SD17'),
(24, 'Al Butanah', 'البطانة', 'SD12073', 'Gedaref', 'القضارف', 'SD12'),
(25, 'Al Dibab', 'الدبب', 'SD18103', 'West Kordofan', 'غرب كردفان', 'SD18'),
(26, 'Al Fao', 'الفاو', 'SD12074', 'Gedaref', 'القضارف', 'SD12'),
(27, 'Al Fashaga', 'الفشقة', 'SD12075', 'Gedaref', 'القضارف', 'SD12'),
(28, 'Al Fasher', 'الفاشر', 'SD02114', 'North Darfur', 'شمال دارفو', 'SD02'),
(29, 'Al Firdous', 'الفردوس', 'SD05152', 'East Darfur', 'شرق دارفور', 'SD05'),
(30, 'Al Galabat Al Gharbyah - Kassab', 'القلابات الغربية - كساب', 'SD12078', 'Gedaref', 'القضارف', 'SD12'),
(31, 'Al Ganab', 'القنب', 'SD10069', 'Red Sea', 'البحر الأح', 'SD10'),
(32, 'Al Gitaina', 'القطينة', 'SD09050', 'White Nile', 'النيل الأب', 'SD09'),
(33, 'Al Golid', 'القولد', 'SD17018', 'Northern', 'الشمالية', 'SD17'),
(34, 'Al Hasahisa', 'الحصاحيصا', 'SD15034', 'Aj Jazirah', 'الجزيرة', 'SD15'),
(35, 'Al Idia', 'الأضية', 'SD18104', 'West Kordofan', 'غرب كردفان', 'SD18'),
(36, 'Al Kamlin', 'الكاملين', 'SD15035', 'Aj Jazirah', 'الجزيرة', 'SD15'),
(37, 'Al Khiwai', 'الخوي', 'SD18105', 'West Kordofan', 'غرب كردفان', 'SD18'),
(38, 'Al Koma', 'الكومة', 'SD02116', 'North Darfur', 'شمال دارفو', 'SD02'),
(39, 'Al Kurmuk', 'الكرمك', 'SD08106', 'Blue Nile', 'النيل الأز', 'SD08'),
(40, 'Al Lagowa', 'لقاوة', 'SD18102', 'West Kordofan', 'غرب كردفان', 'SD18'),
(41, 'Al Lait', 'اللعيت', 'SD02169', 'North Darfur', 'شمال دارفو', 'SD02'),
(42, 'Al Leri', 'الليري', 'SD07105', 'South Kordofan', 'جنوب كردفا', 'SD07'),
(43, 'Al Mafaza', 'المفازة', 'SD12082', 'Gedaref', 'القضارف', 'SD12'),
(44, 'Al Malha', 'المالحة', 'SD02117', 'North Darfur', 'شمال دارفو', 'SD02'),
(45, 'Al Manaqil', 'المناقل', 'SD15036', 'Aj Jazirah', 'الجزيرة', 'SD15'),
(46, 'Al Matama', 'المتمة', 'SD16009', 'River Nile', 'نهر النيل', 'SD16'),
(47, 'Al Meiram', 'الميرم', 'SD18106', 'West Kordofan', 'غرب كردفان', 'SD18'),
(48, 'Al Quoz', 'القوز', 'SD07094', 'South Kordofan', 'جنوب كردفا', 'SD07'),
(49, 'Al Qurashi', 'القرشي', 'SD15037', 'Aj Jazirah', 'الجزيرة', 'SD15'),
(50, 'Al Qureisha', 'القريشة', 'SD12076', 'Gedaref', 'القضارف', 'SD12'),
(51, 'Al Radoum', 'الردوم', 'SD03141', 'South Darfur', 'جنوب دارفو', 'SD03'),
(52, 'Al Wihda', 'الوحدة', 'SD03150', 'South Darfur', 'جنوب دارفو', 'SD03'),
(53, 'An Nuhud', 'النهود', 'SD18022', 'West Kordofan', 'غرب كردفان', 'SD18'),
(54, 'Ar Rahad', 'الرهد', 'SD12084', 'Gedaref', 'القضارف', 'SD12'),
(55, 'Ar Rahad', 'الرهد', 'SD13030', 'North Kordofan', 'شمال كردفا', 'SD13'),
(56, 'Ar Rashad', 'الرشاد', 'SD07093', 'South Kordofan', 'جنوب كردفا', 'SD07'),
(57, 'Ar Reif Ash Shargi', 'الريف الشرقي', 'SD07097', 'South Kordofan', 'جنوب كردفا', 'SD07'),
(58, 'Ar Rusayris', 'الروصيرص', 'SD08107', 'Blue Nile', 'النيل الأز', 'SD08'),
(59, 'As Salam - SD', 'السلام - ج د', 'SD03166', 'South Darfur', 'جنوب دارفو', 'SD03'),
(60, 'As Salam - WK', 'السلام - غ ك', 'SD18086', 'West Kordofan', 'غرب كردفان', 'SD18'),
(61, 'As Salam / Ar Rawat', 'السلام / الراوات', 'SD09049', 'White Nile', 'النيل الأب', 'SD09'),
(62, 'As Serief', 'السريف', 'SD02118', 'North Darfur', 'شمال دارفو', 'SD02'),
(63, 'As Suki', 'السوكي', 'SD14041', 'Sennar', 'سنار', 'SD14'),
(64, 'As Sunta', 'السنطة', 'SD03156', 'South Darfur', 'جنوب دارفو', 'SD03'),
(65, 'As Sunut', 'السنوط', 'SD18092', 'West Kordofan', 'غرب كردفان', 'SD18'),
(66, 'Assalaya', 'عسلاية', 'SD05163', 'East Darfur', 'شرق دارفور', 'SD05'),
(67, 'At Tadamon - BN', 'التضامن - ن ق', 'SD08108', 'Blue Nile', 'النيل الأز', 'SD08'),
(68, 'At Tadamon - SK', 'التضامن - ج ك', 'SD07106', 'South Kordofan', 'جنوب كردفا', 'SD07'),
(69, 'At Tawisha', 'الطويشة', 'SD02119', 'North Darfur', 'شمال دارفو', 'SD02'),
(70, 'At Tina', 'الطينة', 'SD02171', 'North Darfur', 'شمال دارفو', 'SD02'),
(71, 'Atbara', 'عطبرة', 'SD16012', 'River Nile', 'نهر النيل', 'SD16'),
(72, 'Azum', 'أزوم', 'SD06110', 'Central Darfur', 'وسط دارفور', 'SD06'),
(73, 'Babanusa', 'بابنوسة', 'SD18100', 'West Kordofan', 'غرب كردفان', 'SD18'),
(74, 'Bahr Al Arab', 'بحر العرب', 'SD05160', 'East Darfur', 'شرق دارفور', 'SD05'),
(75, 'Bahri', 'بحري', 'SD01003', 'Khartoum', 'الخرطوم', 'SD01'),
(76, 'Bara', 'بارا', 'SD13026', 'North Kordofan', 'شمال كردفا', 'SD13'),
(77, 'Barbar', 'بربر', 'SD16013', 'River Nile', 'نهر النيل', 'SD16'),
(78, 'Basundah', 'باسندة', 'SD12077', 'Gedaref', 'القضارف', 'SD12'),
(79, 'Baw', 'باو', 'SD08104', 'Blue Nile', 'النيل الأز', 'SD08'),
(80, 'Beida', 'بيضا', 'SD04111', 'West Darfur', 'غرب دارفور', 'SD04'),
(81, 'Beliel', 'بليل', 'SD03162', 'South Darfur', 'جنوب دارفو', 'SD03'),
(82, 'Bendasi', 'بندسي', 'SD06112', 'Central Darfur', 'وسط دارفور', 'SD06'),
(83, 'Buram', 'برام', 'SD03161', 'South Darfur', 'جنوب دارفو', 'SD03'),
(84, 'Damso', 'دمسو', 'SD03172', 'South Darfur', 'جنوب دارفو', 'SD03'),
(85, 'Dar As Salam', 'دار السلام', 'SD02113', 'North Darfur', 'شمال دارفو', 'SD02'),
(86, 'Delami', 'دلامي', 'SD07107', 'South Kordofan', 'جنوب كردفا', 'SD07'),
(87, 'Delgo', 'دلقو', 'SD17015', 'Northern', 'الشمالية', 'SD17'),
(88, 'Dilling', 'الدلنج', 'SD07095', 'South Kordofan', 'جنوب كردفا', 'SD07'),
(89, 'Dongola', 'دنقلا', 'SD17017', 'Northern', 'الشمالية', 'SD17'),
(90, 'Dordieb', 'درديب', 'SD10063', 'Red Sea', 'البحر الأح', 'SD10'),
(91, 'Ed Al Fursan', 'عد الفرسان', 'SD03143', 'South Darfur', 'جنوب دارفو', 'SD03'),
(92, 'Ed Damazine', 'الدمازين', 'SD08105', 'Blue Nile', 'النيل الأز', 'SD08'),
(93, 'Foro Baranga', 'فور برنقا', 'SD04121', 'West Darfur', 'غرب دارفور', 'SD04'),
(94, 'Gala''a Al Nahal', 'قلع النحل', 'SD12079', 'Gedaref', 'القضارف', 'SD12'),
(95, 'Galabat Ash-Shargiah', 'القلابات الشرقية', 'SD12083', 'Gedaref', 'القضارف', 'SD12'),
(96, 'Gebrat Al Sheikh', 'جبرة الشيخ', 'SD13027', 'North Kordofan', 'شمال كردفا', 'SD13'),
(97, 'Geisan', 'قيسان', 'SD08109', 'Blue Nile', 'النيل الأز', 'SD08'),
(98, 'Gereida', 'قريضة', 'SD03153', 'South Darfur', 'جنوب دارفو', 'SD03'),
(99, 'Ghadeer', 'غدير', 'SD07108', 'South Kordofan', 'جنوب كردفا', 'SD07'),
(100, 'Gharb Bara', 'غرب بارا', 'SD13029', 'North Kordofan', 'شمال كردفا', 'SD13'),
(101, 'Gharb Jabal Marrah', 'غرب جبل مرة', 'SD06131', 'Central Darfur', 'وسط دارفور', 'SD06'),
(102, 'Ghubaish', 'غبيش', 'SD18021', 'West Kordofan', 'غرب كردفان', 'SD18'),
(103, 'Guli', 'قلي', 'SD09052', 'White Nile', 'النيل الأب', 'SD09'),
(104, 'Habila - SK', 'هبيلة - ج ك', 'SD07103', 'South Kordofan', 'جنوب كردفا', 'SD07'),
(105, 'Habila - WD', 'هبيلة - غ د', 'SD04122', 'West Darfur', 'غرب دارفور', 'SD04'),
(106, 'Hala''ib', 'حلايب', 'SD10066', 'Red Sea', 'البحر الأح', 'SD10'),
(107, 'Halfa', 'حلفا', 'SD17014', 'Northern', 'الشمالية', 'SD17'),
(108, 'Halfa Aj Jadeedah', 'حلفا الجديدة', 'SD11052', 'Kassala', 'كسلا', 'SD11'),
(109, 'Haya', 'هيا', 'SD10070', 'Red Sea', 'البحر الأح', 'SD10'),
(110, 'Heiban', 'هيبان', 'SD07096', 'South Kordofan', 'جنوب كردفا', 'SD07'),
(111, 'Janub Al Jazirah', 'جنوب الجزيرة', 'SD15031', 'Aj Jazirah', 'الجزيرة', 'SD15'),
(112, 'Jebel Awlia', 'جبل أولياء', 'SD01001', 'Khartoum', 'الخرطوم', 'SD01'),
(113, 'Jebel Moon', 'جبل مون', 'SD04123', 'West Darfur', 'غرب دارفور', 'SD04'),
(114, 'Jubayt Elma''aadin', 'جبيت المعادن', 'SD10067', 'Red Sea', 'البحر الأح', 'SD10'),
(115, 'Kadugli', 'كادقلي', 'SD07098', 'South Kordofan', 'جنوب كردفا', 'SD07'),
(116, 'Karrari', 'كرري', 'SD01005', 'Khartoum', 'الخرطوم', 'SD01'),
(117, 'Kas', 'كاس', 'SD03144', 'South Darfur', 'جنوب دارفو', 'SD03'),
(118, 'Kateila', 'كتيلا', 'SD03159', 'South Darfur', 'جنوب دارفو', 'SD03'),
(119, 'Kebkabiya', 'كبكابية', 'SD02124', 'North Darfur', 'شمال دارفو', 'SD02'),
(120, 'Keilak', 'كيلك', 'SD18085', 'West Kordofan', 'غرب كردفان', 'SD18'),
(121, 'Kelemando', 'كلمندو', 'SD02126', 'North Darfur', 'شمال دارفو', 'SD02'),
(122, 'Kereneik', 'كرينك', 'SD04125', 'West Darfur', 'غرب دارفور', 'SD04'),
(123, 'Kernoi', 'كرنوي', 'SD02168', 'North Darfur', 'شمال دارفو', 'SD02'),
(124, 'Khartoum', 'الخرطوم', 'SD01007', 'Khartoum', 'الخرطوم', 'SD01'),
(125, 'Kosti', 'كوستي', 'SD09047', 'White Nile', 'النيل الأب', 'SD09'),
(126, 'Kubum', 'كبم', 'SD03157', 'South Darfur', 'جنوب دارفو', 'SD03'),
(127, 'Kulbus', 'كلبس', 'SD04127', 'West Darfur', 'غرب دارفور', 'SD04'),
(128, 'Kutum', 'كتم', 'SD02128', 'North Darfur', 'شمال دارفو', 'SD02'),
(129, 'Madeinat Al Gedaref', 'مدينة القضارف', 'SD12080', 'Gedaref', 'القضارف', 'SD12'),
(130, 'Madeinat Kassala', 'مدينة كسلا', 'SD11053', 'Kassala', 'كسلا', 'SD11'),
(131, 'Medani Al Kubra', 'مدني الكبري', 'SD15030', 'Aj Jazirah', 'الجزيرة', 'SD15'),
(132, 'Melit', 'مليط', 'SD02129', 'North Darfur', 'شمال دارفو', 'SD02'),
(133, 'Mershing', 'مرشنج', 'SD03145', 'South Darfur', 'جنوب دارفو', 'SD03'),
(134, 'Merwoe', 'مروي', 'SD17020', 'Northern', 'الشمالية', 'SD17'),
(135, 'Mukjar', 'مكجر', 'SD06130', 'Central Darfur', 'وسط دارفور', 'SD06'),
(136, 'Nitega', 'نتيقة', 'SD03151', 'South Darfur', 'جنوب دارفو', 'SD03'),
(137, 'Nyala Janoub', 'نيالا جنوب', 'SD03167', 'South Darfur', 'جنوب دارفو', 'SD03'),
(138, 'Nyala Shimal', 'نيالا شمال', 'SD03164', 'South Darfur', 'جنوب دارفو', 'SD03'),
(139, 'Port Sudan', 'بورتسودان', 'SD10064', 'Red Sea', 'البحر الأح', 'SD10'),
(140, 'Rabak', 'ربك', 'SD09046', 'White Nile', 'النيل الأب', 'SD09'),
(141, 'Rehaid Albirdi', 'رهيد البردي', 'SD03158', 'South Darfur', 'جنوب دارفو', 'SD03'),
(142, 'Reifi Aroma', 'ريفى أروما', 'SD11055', 'Kassala', 'كسلا', 'SD11'),
(143, 'Reifi Gharb Kassala', 'ريفى غرب كسلا', 'SD11054', 'Kassala', 'كسلا', 'SD11'),
(144, 'Reifi Hamashkureib', 'ريفى همش كوريب', 'SD11058', 'Kassala', 'كسلا', 'SD11'),
(145, 'Reifi Kassla', 'ريفى كسلا', 'SD11056', 'Kassala', 'كسلا', 'SD11'),
(146, 'Reifi Khashm Elgirba', 'ريفى خشم القربة', 'SD11060', 'Kassala', 'كسلا', 'SD11'),
(147, 'Reifi Nahr Atbara', 'ريفى نهر عطبرة', 'SD11062', 'Kassala', 'كسلا', 'SD11'),
(148, 'Reifi Shamal Ad Delta', 'ريفى شمال الدلتا', 'SD11057', 'Kassala', 'كسلا', 'SD11'),
(149, 'Reifi Telkok', 'ريفى تلكوك', 'SD11059', 'Kassala', 'كسلا', 'SD11'),
(150, 'Reifi Wad Elhilaiw', 'ريفى ود الحليو', 'SD11061', 'Kassala', 'كسلا', 'SD11'),
(151, 'Saraf Omra', 'سرف عمرة', 'SD02133', 'North Darfur', 'شمال دارفو', 'SD02'),
(152, 'Sawakin', 'سواكن', 'SD10068', 'Red Sea', 'البحر الأح', 'SD10'),
(153, 'Sennar', 'سنار', 'SD14038', 'Sennar', 'سنار', 'SD14'),
(154, 'Shamal Jabal Marrah', 'شمال  جبل مرة', 'SD06132', 'Central Darfur', 'وسط دارفور', 'SD06'),
(155, 'Sharg Aj Jabal', 'شرق الجبل', 'SD03147', 'South Darfur', 'جنوب دارفو', 'SD03'),
(156, 'Sharg Al Jazirah', 'شرق الجزيرة', 'SD15033', 'Aj Jazirah', 'الجزيرة', 'SD15'),
(157, 'Sharg An Neel', 'شرق النيل', 'SD01004', 'Khartoum', 'الخرطوم', 'SD01'),
(158, 'Sharg Sennar', 'شرق سنار', 'SD14042', 'Sennar', 'سنار', 'SD14'),
(159, 'Shattaya', 'شطاية', 'SD03154', 'South Darfur', 'جنوب دارفو', 'SD03'),
(160, 'Sheikan', 'شيكان', 'SD13024', 'North Kordofan', 'شمال كردفا', 'SD13'),
(161, 'Shendi', 'شندي', 'SD16010', 'River Nile', 'نهر النيل', 'SD16'),
(162, 'Shia''ria', 'شعيرية', 'SD05148', 'East Darfur', 'شرق دارفور', 'SD05'),
(163, 'Sinja', 'سنجة', 'SD14043', 'Sennar', 'سنار', 'SD14'),
(164, 'Sinkat', 'سنكات', 'SD10071', 'Red Sea', 'البحر الأح', 'SD10'),
(165, 'Sirba', 'سربا', 'SD04134', 'West Darfur', 'غرب دارفور', 'SD04'),
(166, 'Soudari', 'سودري', 'SD13025', 'North Kordofan', 'شمال كردفا', 'SD13'),
(167, 'Talawdi', 'تلودي', 'SD07089', 'South Kordofan', 'جنوب كردفا', 'SD07'),
(168, 'Tawila', 'طويلة', 'SD02170', 'North Darfur', 'شمال دارفو', 'SD02'),
(169, 'Tawkar', 'طوكر', 'SD10065', 'Red Sea', 'البحر الأح', 'SD10'),
(170, 'Tendalti', 'تندلتي', 'SD09048', 'White Nile', 'النيل الأب', 'SD09'),
(171, 'Tulus', 'تلس', 'SD03149', 'South Darfur', 'جنوب دارفو', 'SD03'),
(172, 'Um Algura', 'أم القري', 'SD15032', 'Aj Jazirah', 'الجزيرة', 'SD15'),
(173, 'Um Bada', 'أمبدة', 'SD01002', 'Khartoum', 'الخرطوم', 'SD01'),
(174, 'Um Baru', 'أم برو', 'SD02120', 'North Darfur', 'شمال دارفو', 'SD02'),
(175, 'Um Dafoug', 'أم دافوق', 'SD03146', 'South Darfur', 'جنوب دارفو', 'SD03'),
(176, 'Um Dam Haj Ahmed', 'أم دم حاج أحمد', 'SD13028', 'North Kordofan', 'شمال كردفا', 'SD13'),
(177, 'Um Dukhun', 'أم دخن', 'SD06135', 'Central Darfur', 'وسط دارفور', 'SD06'),
(178, 'Um Durein', 'أم دورين', 'SD07091', 'South Kordofan', 'جنوب كردفا', 'SD07'),
(179, 'Um Durman', 'أم درمان', 'SD01006', 'Khartoum', 'الخرطوم', 'SD01'),
(180, 'Um Kadadah', 'أم كدادة', 'SD02136', 'North Darfur', 'شمال دارفو', 'SD02'),
(181, 'Um Rawaba', 'أم روابة', 'SD13023', 'North Kordofan', 'شمال كردفا', 'SD13'),
(182, 'Um Rimta', 'أم رمتة', 'SD09045', 'White Nile', 'النيل الأب', 'SD09'),
(183, 'Wad Al Mahi', 'ود الماحي', 'SD08110', 'Blue Nile', 'النيل الأز', 'SD08'),
(184, 'Wad Bandah', 'ود بندة', 'SD18029', 'West Kordofan', 'غرب كردفان', 'SD18'),
(185, 'Wadi Salih', 'وادي صالح', 'SD06137', 'Central Darfur', 'وسط دارفور', 'SD06'),
(186, 'Wasat Al Gedaref', 'وسط القضارف', 'SD12081', 'Gedaref', 'القضارف', 'SD12'),
(187, 'Wasat Jabal Marrah', 'وسط جبل مرة', 'SD06139', 'Central Darfur', 'وسط دارفور', 'SD06'),
(188, 'Yassin', 'يس', 'SD05165', 'East Darfur', 'شرق دارفور', 'SD05'),
(189, 'Zalingi', 'زالنجى', 'SD06138', 'Central Darfur', 'وسط دارفور', 'SD06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `phone` text NOT NULL,
  `permission` int(11) NOT NULL,
  `about` text NOT NULL,
  `online` int(11) NOT NULL,
  `session` text NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `phone`, `permission`, `about`, `online`, `session`, `name`) VALUES
(13, 'cuser', '605cdb800822642eabfb9d10283033b7', '0000', 2, 'Cases User', 0, '605cdb800822642eabfb9d10283033b7', 'Cases User'),
(12, 'quser', '605cdb800822642eabfb9d10283033b7', '0000', 1, 'Qurantine User', 0, '605cdb800822642eabfb9d10283033b7', 'Qurantine User'),
(10, 'user11', 'bcadfc8c5ab3bce29bca3ae1f2ccc7dc', '132232355', 1, 'about', 0, 'bcadfc8c5ab3bce29bca3ae1f2ccc7dc', 'Moha'),
(11, 'admin', 'bcadfc8c5ab3bce29bca3ae1f2ccc7dc', '0000000000', 0, 'Administrator', 0, 'bcadfc8c5ab3bce29bca3ae1f2ccc7dc', 'Mohammed '),
(8, 'user', '605cdb800822642eabfb9d10283033b7', '00000000', 0, 'no thing', 0, '605cdb800822642eabfb9d10283033b7', 'mohammed'),
(14, 'ambulance', 'bcadfc8c5ab3bce29bca3ae1f2ccc7dc', '22222', 3, 'ambulance user', 0, 'bcadfc8c5ab3bce29bca3ae1f2ccc7dc', 'ambulance user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

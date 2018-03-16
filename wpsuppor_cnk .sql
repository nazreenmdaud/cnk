-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2018 at 01:18 PM
-- Server version: 5.6.38
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpsuppor_cnk`
--

-- --------------------------------------------------------

--
-- Table structure for table `prd_customer`
--

CREATE TABLE `prd_customer` (
  `id` int(11) NOT NULL,
  `submission_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prd_customer`
--

INSERT INTO `prd_customer` (`id`, `submission_id`, `customer_name`, `email`, `address`, `contact`) VALUES
(26, 2, 'Hong Ye', 'hongye@wp.com', 'Hougang', 9456875),
(27, 2, 'Alvin', 'alvin@wp.com', 'Punggol', 98989852),
(28, 1, 'Sandra', 'sandra@wp.com', 'Jalan Bidadari', 8526326),
(29, 1, 'Yu Ting', 'yuting@wp.com', 'Commonwealth', 95252632),
(30, 1, 'asdas', 'asd@s.com', 'asdasd', 23232),
(31, 1, 'Harry', 'harry@wp.com', 'Holland', 98585858),
(32, 1, 'Catherina Woods', 'catwoods@gmail.com', 'Woodlands', 91112112),
(33, 2, 'Test', 'test@customer.com', 'NY', 2143105984),
(34, 2, 'test2', 'test2@customer.com', 'la', 2133354123),
(35, 1, 'dj', 'dj@gmail.com', '1203', 123123),
(36, 1, 'ABc', 'abc@gmail.com', '1020393', 123456),
(37, 1, 'rahu', 'ra@gmail.cm', 'sdfasdf', 0),
(38, 1, 'John', 'john@gmail.com', 'Jurong', 98888888),
(39, 1, 'asfdsf', 'asdsad@adsad.com', 'sakldjsldjk', 2147483647),
(40, 2, '123', '123@23123.com', '23123', 2312),
(41, 1, 'test', 'test@gmail.com', 'retrtwte', 999999999),
(42, 1, 'Nihar', 'nihar@testmail.com', 'demo address', 2147483647),
(43, 1, 'sample', 'sample@kishan.com', 'abc\r\ngandhinagar3457', 1324657987),
(44, 2, 'demo', 'd@a.com', 'gyycfy', 2147483647),
(45, 2, 'sample', 'sample@kishan.com', 'dfgcfh', 2147483647),
(46, 2, '1', '1@2.com', '1', 1),
(47, 2, '1', '1@2.com', '2', 2),
(48, 1, 'Nazreen', 'nazreen@webpuppies.com.sg', 'Jurong West St 81', 2147483647),
(49, 1, 'John Doe', 'johndoe@webpuppies.com', 'Telok Blangah', 97875882),
(50, 1, 'Gary', 'gary@product.com', 'Gombak', 98765432),
(51, 1, 'Ronaldo', 'Ronaldo@yahoo.com', 'Brazil', 91613156),
(52, 1, 'WEB PUPS SUPPORT', 'support@webpuppies.com.sg', '138 ROBINSON', 66667777),
(53, 1, 'John', 'yiicakephp@gmail.com', 'test', 12121212),
(54, 1, 'Naz', 'nazreen@webpuppies.com.sg', 'Jurong West St 81', 94879740),
(55, 1, 'Tom', 'tom@gmail.com', 'Tom\'s House', 93888832),
(56, 1, 'Helen', 'Helen@mail.com', 'North Bridge Rd', 98876567),
(57, 1, 'Pauline', 'pauline@mail.com', 'East Coast Rd', 9009009),
(58, 1, 'fieztech', 'dev@fieztech.com', 'Testing qw 12', 2147483647),
(59, 1, 'leekim', 'leekim@webpuppies.com.sg', '123lokju', 81359722),
(60, 1, 'test', 'kenneth.lim@charleskeith.com', 'test', 91067433),
(61, 1, 'qwdsd', 'asdas@wdw.com', 'wqde', 8678234),
(62, 1, 'Bakar', 'bakar@gmail.com', 'kllk;kl', 98515151),
(63, 1, 'Test', 'Kenneth.lim@charleskeith.com', 'Test', 91067433),
(64, 2, 'A', 'Dapit.kesuma@charleskeith.com', 'A', 83759377),
(65, 1, 'David Tan', 'David.tan@charleskeith.com', 'Tai Seng', 87654321),
(66, 1, 'Cass', 'Cassandra.heng@charleskeith.com', 'London', 24681012),
(67, 1, 'Pei Fen', 'pf@cnk.com', 'Hougang Ave 5', 90000923),
(68, 1, 'Jumanji', 'rock@yahoo.com', 'Horthorne Rd', 97878787);

-- --------------------------------------------------------

--
-- Table structure for table `prd_defects`
--

CREATE TABLE `prd_defects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `defect_no` int(11) DEFAULT NULL,
  `outlet_name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `initial_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `u_by` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prd_defects`
--

INSERT INTO `prd_defects` (`id`, `user_id`, `defect_no`, `outlet_name`, `status`, `initial_date`, `updated_date`, `u_by`, `customer_id`) VALUES
(64, 1, 1064, 'CQM', 5, '2018-01-19 15:33:25', '2018-01-19 18:49:45', 1, 55),
(65, 1, 1065, 'Pedro NEX (PNX)', 4, '2018-01-23 13:39:15', '2018-03-08 19:42:33', 1, 56),
(66, 1, 1066, 'Pedro NEX (PNX)', 3, '2018-01-23 15:51:43', '2018-02-28 18:20:26', 9, 57),
(76, 1, 1076, 'Charles & Keith Changi Airport Terminal 4 (T4)', 3, '2018-03-08 12:47:21', '2018-03-08 12:47:21', 1, 67),
(77, 1, 1077, 'Charles & Keith IMM (IMM)', 2, '2018-03-15 13:09:40', '2018-03-15 13:09:40', 1, 68);

-- --------------------------------------------------------

--
-- Table structure for table `prd_defects_details`
--

CREATE TABLE `prd_defects_details` (
  `id` int(11) NOT NULL,
  `defect_product_id` int(11) DEFAULT NULL,
  `defect_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `defect_type_id` int(11) DEFAULT NULL,
  `notes` text,
  `what_done_for_repair` text,
  `repair_image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prd_defects_details`
--

INSERT INTO `prd_defects_details` (`id`, `defect_product_id`, `defect_id`, `image`, `category_id`, `defect_type_id`, `notes`, `what_done_for_repair`, `repair_image`, `status`) VALUES
(1, 18, 1, 'uploads/2e3cc77e494827b58a1bb24f073a9cb5.jpg', 40, 40, 'the shoe have sole issues', 'fix the sole', 'uploads/8e061f79a5740ffda7e2652e9bd634b6.jpg', 2),
(2, 18, 1, 'uploads/e781bb9257418da162319fe323b03281.jpg', 11, 11, 'the design not nice', 'then go buy other brands', 'uploads/85e722e88aaf5c45f61167c1d3f74ebb.jpg', 2),
(3, 19, 1, 'uploads/68d035d67376fd3cdb23b21aaace0463.jpg', 19, 23, 'it is not waterproof', 'waterproof padding added', 'uploads/c618943da276366d9807dc8d2162a74c.jpg', 2),
(4, 1, 1, 'uploads/1015a1622949c1ba1e2edfb6313c9d52.jpg', 1, 1, 'it gets oxidised very fast', 'de-oxidised the fabric', 'uploads/0ebfacabf1c1500daea224e3b08e7bf6.jpg', 1),
(5, 21, 20, 'uploads/4b9ac725b6446354bc4676706936f8bf.sig', 12, NULL, 'aasdfasdasdf', NULL, NULL, 1),
(6, 22, 21, 'uploads/f4f8d343937ed907ec89a79433c62176.jpg', 6, NULL, 'asdasdad', NULL, NULL, 1),
(7, 23, 22, 'uploads/f5de26b6018b4bd06a7263f0bc4bfba4.jpg', 1, NULL, 'asdasd', NULL, NULL, 1),
(8, 24, 23, 'uploads/198053d8a6ba41b2ea72ab6a903f2a8a.jpg', 2, NULL, 'dsfsdfds', NULL, NULL, 1),
(9, 25, 25, 'uploads/e83331de6b06bf18cd376f24a533591b.manifest', 27, NULL, '123456', NULL, NULL, 1),
(10, 26, 26, 'uploads/1c1da6449b1556d952a88a62b380ef51.manifest', 1, NULL, 'gjjjjjjjjjjjh', NULL, NULL, 1),
(11, 27, 27, 'uploads/08af17ae0347c380507a5017b293da3f.jpg', 2, NULL, 'hgvhg', NULL, NULL, 1),
(12, 28, 29, NULL, 1, NULL, '', NULL, NULL, 1),
(13, 29, 8, 'uploads/00806ab050de39d233d7b6650123ea5e.jpg', 27, NULL, 'hjhgjh', NULL, NULL, 1),
(14, 30, 8, 'uploads/af64f626a8568f4876d2ff10fec3c06c.jpg', 1, NULL, 'hjkgkjhk', NULL, NULL, 1),
(15, 31, 24, 'uploads/467972115549ba82d043a4247faac49a.png', 2, NULL, 'hjgjh', NULL, NULL, 1),
(16, 33, 33, 'uploads/ee7cbe5fd4d58fb6de259d88c2ad4dd7.jpg', 2, NULL, 'sdfsdf', 'sdasda', NULL, 2),
(17, 33, 33, 'uploads/7680af28aab0d6125d07e7f258dc0844.jpg', 2, NULL, 'fdg', NULL, NULL, 1),
(18, 34, 33, 'uploads/5b32bedd40f26dda5468118bd987ca95.jpg', 12, NULL, 'hjj', NULL, NULL, 1),
(24, 38, 37, 'uploads/9ce0504789dd581bf74de278b8144ddb.jpg', 67, NULL, 'i want this fix!', NULL, NULL, 1),
(25, 39, 38, 'uploads/1f0479d3de245db89cd5ca36c494c87f.jpg', 23, NULL, 'This is a picture of a ring', NULL, NULL, 1),
(26, 40, 39, 'uploads/36a74e0539718ce4f7c9922500c08611.jpg', 1, NULL, 'dvgbdfgbddf', 'rhgh', NULL, 2),
(27, 41, 39, NULL, 1, NULL, '', NULL, NULL, 1),
(28, 42, 39, NULL, 11, NULL, '', NULL, NULL, 1),
(29, 43, 41, 'uploads/cd616d92102a5a80d7c59daf9ec5e2dc.jpg', 1, NULL, '', NULL, NULL, 1),
(30, 44, 42, 'uploads/7bec321dcad05ceb2e0dcc21b77a761a.png', 7, NULL, 'check', 'sorted', NULL, 2),
(31, 45, 44, 'uploads/62431b80d7f33db2a5081c1965b5e8e7.jpg', 12, NULL, 'please', NULL, NULL, 1),
(32, 46, 45, 'uploads/10a091de10bf68f06184ff176cbf15e2.jpg', 40, NULL, 'asdf', NULL, NULL, 1),
(33, 47, 45, 'uploads/7d458eccda2ad574ebd9e47c38df9e6e.jpg', 2, NULL, 'sadfsad', NULL, NULL, 1),
(34, 48, 50, NULL, 2, NULL, '', 'Abc', 'uploads/4d22dd726dd775c46219c5b6f84e3c13.jpg', 2),
(35, 49, 51, 'uploads/2ff3ea7c06ed8f3ac7d46747d2013ec0.gif', 1, NULL, 'demo text', NULL, NULL, 1),
(40, 54, 57, 'uploads/939ef5e7dda359d138b4ff9e060c1bbc.jpg', 53, 53, 'Its Dirty', NULL, NULL, 1),
(41, 55, 57, 'uploads/884c5bf68f07c696cb8f815983c675bb.jpg', 24, 24, 'There\'s scratches!', NULL, NULL, 1),
(44, 58, 35, 'uploads/7b2686c930540c51637387842feff4c4.jpg', 27, 27, 'The bracelet got issues, the spring hook broke', '', NULL, 1),
(45, 58, 35, 'uploads/ca09a3e463ab1a782139c1e45e332455.jpg', 11, 11, 'Not only that, the design suck', '', NULL, 1),
(46, 58, 35, NULL, 7, 7, 'This is a new defect', '', NULL, 1),
(47, 59, 35, 'uploads/c236b460ef5a7d7f5df05619c080546a.jpg', 21, 21, 'Where is the C&K logo?', '', 'uploads/cc681b118e092766b073c536471a2dbf.jpg', 1),
(48, 60, 35, 'uploads/989b3c00f905cff6fec684b1ac6dc1bb.jpg', 76, 76, 'The shoe strap is missing', '', NULL, 1),
(50, 62, 58, 'uploads/c3ed168b010c58c590db7e0c29ef4b57.jpg', 40, 2, 'Updated', NULL, NULL, 1),
(53, 65, 59, 'uploads/0aaf85de3d9683b9402cb4de4ca1ce67.jpg', 1, 4, 'Ok', NULL, NULL, 1),
(55, 67, 60, 'uploads/a08ba58df51b59d42787ce66aec71180.png', 7, 30, 'Banana', NULL, NULL, 1),
(57, 69, 61, 'uploads/56fdb759a5af0c5182a5a451c03b998d.png', 12, 13, 'sdasdasdasda', NULL, NULL, 1),
(61, 73, 62, NULL, 2, 2, 'test', NULL, NULL, 1),
(65, 77, 64, NULL, 12, 16, 'Rim Broken', NULL, NULL, 1),
(70, 82, 67, NULL, 7, 7, 'Testing', NULL, NULL, 1),
(71, 83, 63, NULL, 57, 57, '---', NULL, NULL, 1),
(72, 84, 68, NULL, 1, 3, 'ddd', NULL, NULL, 1),
(74, 86, 69, NULL, 2, 2, 'test ', NULL, NULL, 1),
(76, 88, NULL, NULL, 1, 1, 'testing', NULL, NULL, 1),
(78, 90, 71, NULL, 34, 34, 'test', NULL, NULL, 1),
(79, 91, 72, NULL, 12, 15, 'Breakage', NULL, NULL, 1),
(81, 93, 73, NULL, 1, 47, 'As', NULL, NULL, 1),
(82, 94, 74, NULL, 1, 47, 'NA', NULL, NULL, 1),
(88, 100, 70, NULL, 1, 1, 'ac', NULL, NULL, 1),
(90, 102, 75, NULL, 40, 41, '', NULL, NULL, 1),
(91, 103, 66, NULL, 7, 7, 'Xxx', NULL, NULL, 1),
(92, 104, 76, NULL, 11, 11, 'Dirty', NULL, NULL, 1),
(93, 105, 65, NULL, 21, 54, 'Xxx', NULL, NULL, 1),
(94, 106, 77, NULL, 1, 1, 'test', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prd_defect_category`
--

CREATE TABLE `prd_defect_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ch_name` varchar(255) DEFAULT NULL,
  `main_category` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ch_main_category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prd_defect_category`
--

INSERT INTO `prd_defect_category` (`id`, `name`, `ch_name`, `main_category`, `description`, `ch_main_category`) VALUES
(1, 'Oxidised/ Tarnished', '氧化 / 玷污', 'Material Issues', 'Material Issues  - Material Oxidized', '材料问题'),
(2, 'Broken Accessory', '配件损坏', 'Breakage', 'Breakage', '断裂'),
(3, 'Colour Run/Discolouration', '退色/材料变色', 'Material Issues', 'Material Issues  - Colour Run', '材料问题'),
(4, 'Material Cracked', '材料断裂', 'Material Issues', 'Material Issues \n', '材料问题'),
(5, 'Material Peeling', '材料脱皮', 'Material Issues', 'Material Issues', '材料问题'),
(6, 'Poor Stitching', '针线缝不好', 'Stitching', 'Stitching', '车线问题'),
(7, 'Scratches on Accessory', '五金刮痕', 'Scratches', 'Scratches', '刮痕'),
(8, 'Scratches', '刮痕', 'Scratches', 'Scratches', '刮痕'),
(9, 'Wear & Tear', '磨损', 'Wear & Tear', 'Wear & Tear', '穿戴磨损'),
(10, 'Buckle drop off', '纽扣/扣子脱落', 'Breakage', 'Breakage', '断裂'),
(11, 'Design Issue', '设计问题', 'Others', 'Others', '其他'),
(12, 'Broken Arm', '眼架断裂', 'Breakage', 'Breakage', '断裂'),
(13, 'Broken Bridge', '鼻托断裂', 'Breakage', 'Breakage', '断裂'),
(14, 'Broken Hinge', '铰链断裂', 'Breakage', 'Breakage', '断裂'),
(15, 'Broken Pad Arm', '鼻垫架断裂', 'Breakage', 'Breakage', '断裂'),
(16, 'Broken Rim', '镜框断裂', 'Breakage', 'Breakage', '断裂'),
(17, 'Cracked Len', '镜片裂', 'Breakage', 'Breakage', '断裂'),
(18, 'Len Drop Off', '镜片脱落', 'Production Issues', 'Production Issues', '生产 问题'),
(19, 'Missing Accessory', '遗失配件', 'Production Issues', 'Production Issues', '生产 问题'),
(20, 'Missing Nose Pad', '遗失鼻垫', 'Missing Components', 'Missing Components', '零件脱落'),
(21, 'Missing precious stone', '遗失宝石', 'Production Issues', 'Production Issues', '生产 问题'),
(22, 'Missing Screw', '遗失螺丝', 'Production Issues', 'Production Issues', '生产 问题'),
(23, 'Poor Finishing', '质量低劣', 'Production Issues', 'Production Issues', '生产 问题'),
(24, 'Scratches on Frame', '眼眶刮痕', 'Scratches', 'Scratches', '刮痕'),
(25, 'Disfigured Frame', '镜架损毁', 'Others', 'Others', '其他'),
(26, 'Broken Temple', '支架断裂', 'Breakage', 'Breakage', '断裂'),
(27, 'Broken Spring Hook', '弹簧勾断裂', 'Breakage', 'Breakage', '断裂'),
(28, 'Lock loosen', '锁头松脱', 'Production Issues', 'Production Issues', '生产 问题'),
(29, 'Scratches on Bracelet', '手镯刮痕', 'Scratches', 'Scratches', '刮痕'),
(30, 'Scratches on stone', '宝石刮痕', 'Scratches', 'Scratches', '刮痕'),
(31, 'Scratches on Ring', '戒指刮痕', 'Scratches', 'Scratches', '刮痕'),
(32, 'Scratches on Necklace', '项链刮痕', 'Scratches', 'Scratches', '刮痕'),
(33, 'Scratches on Key Chain', '锁匙扣刮痕', 'Scratches', 'Scratches', '刮痕'),
(34, 'Scratches on Casing', '电话壳刮痕', 'Scratches', 'Scratches', '刮痕'),
(35, 'Missing Logo', '遗失票制', 'Production Issues', 'Production Issues', '生产 问题'),
(36, 'Manufacture Issue', '产值问题', 'Production Issues', 'Production Issues', '生产 问题'),
(37, 'Scratches on Ear Ring', '耳环刮痕', 'Scratches', 'Scratches', '刮痕'),
(38, 'Missing stopper', '遗失塞子', 'Missing Components', 'Missing Components', '零件脱落'),
(39, 'Scratches on bag', '包包刮痕', 'Scratches', 'Scratches', '刮痕'),
(40, 'Broken Strap Hook', '肩带勾断裂', 'Breakage', 'Breakage', '断裂'),
(41, 'Broken Strap', '肩带断裂', 'Breakage', 'Breakage', '断裂'),
(42, 'Faulty Lock', '锁头损坏', 'Material Issues', 'Material Issues', '材料问题'),
(43, 'Faulty Zipper', '拉链损坏', 'Material Issues', 'Material Issues', '材料问题'),
(44, 'Broken Zipper', '拉链断裂', 'Breakage', 'Breakage', '断裂'),
(45, 'Broken Inner Zipper', '内侧拉链断裂', 'Breakage', 'Breakage', '断裂'),
(46, 'Faulty Inner Zipper', '内侧拉链损坏', 'Material Issues', 'Material Issues', '材料问题'),
(47, 'Colour Run', '跑色', 'Material Issues', 'Material Issues', '材料问题'),
(48, 'Eyelet came off', '包孔脱落', 'Workmanship & Fitting', 'Workmanship & Fitting', '工艺 & 装配不符'),
(49, 'Broken Chain', '链子破裂/断裂', 'Breakage', 'Breakage', '断裂'),
(50, 'Broken Lock', '锁扣破裂/断裂', 'Breakage', 'Breakage', '断裂'),
(51, 'Zipper Stuck', '拉链卡', 'Material Issues', 'Material Issues', '材料问题'),
(52, 'Glue Stain', '胶水导致的污点', 'Glue', 'Glue', '胶水'),
(53, 'Stained Hardware', '五金有污点', 'Stains', 'Stains', '污点'),
(54, 'Unfinished Stitching', '未完成针车', 'Stitching', 'Stitching', '车线问题'),
(55, 'Stitches Came Off', '车线脱落', 'Stitching', 'Stitching', '车线问题'),
(56, 'Untidy Stitching', '针车不均匀', 'Stitching', 'Stitching', '车线问题'),
(57, 'Glue Not Strong', '胶水粘得不牢固', 'Glue', 'Glue', '胶水'),
(58, 'Logo Upside Down', '牌子倒挂', 'Workmanship & Fitting', 'Workmanship & Fitting', '工艺 & 装配不符'),
(59, 'Loose Screws', '螺丝松动', 'Production Issues', 'Production Issues', '生产 问题'),
(60, 'Unfinished Gluing', '胶水未干', 'Glue', 'Glue', '胶水'),
(61, 'Slanted Flap', '手袋皮瓣歪', 'Workmanship & Fitting', 'Workmanship & Fitting', '工艺 & 装配不符'),
(62, 'Slanted Lock/Ornament/Logo', '锁/饰品/商标歪', 'Workmanship & Fitting', 'Workmanship & Fitting', '工艺 & 装配不符'),
(63, 'Scratches on Shoes', '学子刮痕', 'Scratches', 'Scratches', '刮痕'),
(64, 'Broken Heel', '靴跟断裂', 'Breakage', 'Breakage', '断裂'),
(65, 'Broken Heel Cap', '天皮/靴跟盖断裂', 'Breakage', 'Breakage', '断裂'),
(66, 'Material Stained', '材料染色', 'Material Issues', 'Material Issues', '材料问题'),
(67, 'Insole Peeled off', '靴垫脱皮', 'Workmanship & Fitting', 'Workmanship & Fitting', '工艺 & 装配不符'),
(68, 'Outsole Dropped Off', '靴底脱落', 'Workmanship & Fitting', 'Workmanship & Fitting', '工艺 & 装配不符'),
(69, 'Wrong side', '同边鞋', 'Wrong Contents & Packing', 'Wrong Contents & Packing', '包装错误'),
(70, 'Wrong size', '错码', 'Wrong Contents & Packing', 'Wrong Contents & Packing', '包装错误'),
(71, 'Nail Found', '出钉', 'Workmanship & Fitting', 'Workmanship & Fitting', '工艺 & 装配不符'),
(72, 'Shaky Heel', '鞋跟摇晃', 'Workmanship & Fitting', 'Workmanship & Fitting', '工艺 & 装配不符'),
(73, 'Shoe Tongue Came Off', '鞋舌脱落', 'Workmanship & Fitting', 'Workmanship & Fitting', '工艺 & 装配不符'),
(74, 'Elastic Band Loosen', '补强带松弛', 'Workmanship & Fitting', 'Workmanship & Fitting', '工艺 & 装配不符'),
(75, 'Slanted Heel', '鞋跟歪', 'Workmanship & Fitting', 'Workmanship & Fitting', '工艺 & 装配不符'),
(76, 'Missing Accessory', '遗失配件', 'Missing Components', 'Missing Components', '零件脱落'),
(77, 'Missing precious stone', '遗失宝石', 'Missing Components', 'Missing Components', '零件脱落'),
(78, 'Paper Stick', '包装纸', 'Others', 'Others', '其他');

-- --------------------------------------------------------

--
-- Table structure for table `prd_defect_products`
--

CREATE TABLE `prd_defect_products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `defect_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `articleno` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prd_defect_products`
--

INSERT INTO `prd_defect_products` (`id`, `product_name`, `defect_id`, `product_id`, `status`, `articleno`, `size`, `color`) VALUES
(1, 'BELT', 1, 1, 1, NULL, NULL, NULL),
(2, 'SUNGLASS', 1, 2, 1, NULL, NULL, NULL),
(3, 'SUNGLASS', 1, 2, 1, NULL, NULL, NULL),
(4, 'SUNGLASS', 1, 2, 1, NULL, NULL, NULL),
(5, 'BELT', 3, 1, 1, NULL, NULL, NULL),
(6, 'SUNGLASS', 3, 2, 1, NULL, NULL, NULL),
(7, 'BRACELET', 3, 3, 1, NULL, NULL, NULL),
(8, 'RING', 3, 4, 1, NULL, NULL, NULL),
(9, 'NECKLACE', 3, 5, 1, NULL, NULL, NULL),
(10, 'KEY CHAIN', 3, 6, 1, NULL, NULL, NULL),
(11, 'HP CASING', 3, 7, 1, NULL, NULL, NULL),
(12, 'IPAD CASING', 3, 8, 1, NULL, NULL, NULL),
(13, 'EARRING', 3, 9, 1, NULL, NULL, NULL),
(14, 'BAG', 3, 10, 1, NULL, NULL, NULL),
(15, 'SHOES', 3, 11, 1, NULL, NULL, NULL),
(16, 'BELT', 2, 1, 1, NULL, NULL, NULL),
(17, 'BRACELET', 4, 3, 1, NULL, NULL, NULL),
(18, 'SHOES', 1, 11, 1, NULL, NULL, NULL),
(19, 'IPAD CASING', 1, 8, 1, NULL, NULL, NULL),
(20, 'BELT', 19, 1, 1, NULL, NULL, NULL),
(21, 'SUNGLASS', 20, 2, 1, NULL, NULL, NULL),
(22, 'BELT', 21, 1, 1, NULL, NULL, NULL),
(23, 'BELT', 22, 1, 1, NULL, NULL, NULL),
(24, 'BELT', 23, 1, 1, NULL, NULL, NULL),
(25, 'BRACELET', 25, 3, 1, NULL, NULL, NULL),
(26, 'BRACELET', 26, 3, 1, NULL, NULL, NULL),
(27, 'BELT', 27, 1, 1, NULL, NULL, NULL),
(28, 'RING', 29, 4, 1, NULL, NULL, NULL),
(29, 'BRACELET', 8, 3, 1, NULL, NULL, NULL),
(30, 'RING', 8, 4, 1, NULL, NULL, NULL),
(31, 'BELT', 24, 1, 1, NULL, NULL, NULL),
(32, 'SUNGLASS', 29, 2, 1, NULL, NULL, NULL),
(33, 'BELT', 33, 1, 1, NULL, NULL, NULL),
(34, 'SUNGLASS', 33, 2, 1, NULL, NULL, NULL),
(38, 'SHOES', 37, 11, 1, NULL, NULL, NULL),
(39, 'EARRING', 38, 9, 1, NULL, NULL, NULL),
(40, 'KEY CHAIN', 39, 6, 1, NULL, NULL, NULL),
(41, 'BELT', 39, 1, 1, NULL, NULL, NULL),
(42, 'RING', 39, 4, 1, NULL, NULL, NULL),
(43, 'BELT', 41, 1, 1, NULL, NULL, NULL),
(44, 'RING', 42, 4, 1, NULL, NULL, NULL),
(45, 'SUNGLASS', 44, 2, 1, NULL, NULL, NULL),
(46, 'SHOES', 45, 11, 1, NULL, NULL, NULL),
(47, 'BELT', 45, 1, 1, NULL, NULL, NULL),
(48, 'BELT', 50, 1, 1, NULL, NULL, NULL),
(49, 'SUNGLASS', 51, 2, 1, NULL, NULL, NULL),
(54, 'BAG', 57, 10, 1, NULL, NULL, NULL),
(55, 'SUNGLASS', 57, 2, 1, NULL, NULL, NULL),
(58, 'BRACELET', 35, 3, 1, NULL, NULL, NULL),
(59, 'BAG', 35, 10, 1, NULL, NULL, NULL),
(60, 'SHOES', 35, 11, 1, NULL, NULL, NULL),
(62, 'SHOES', 58, 11, 1, NULL, NULL, NULL),
(65, 'BELT', 59, 1, 1, NULL, NULL, NULL),
(67, 'BRACELET', 60, 3, 1, NULL, NULL, NULL),
(69, 'SUNGLASS', 61, 2, 1, NULL, NULL, NULL),
(73, 'BELT', 62, 1, 1, NULL, NULL, NULL),
(77, 'SUNGLASS', 64, 2, 1, 1234, 0, 'Black'),
(82, 'BAG', 67, 10, 1, 12333, 23, 'Red'),
(83, 'BAG', 63, 10, 1, 6666, 32, 'Yellow'),
(84, 'BELT', 68, 1, 1, 1, 25, 'red'),
(86, 'BELT', 69, 1, 1, 113, 10, 'black2'),
(88, 'BRACELET', NULL, 3, 1, 16, 40, 'Blue'),
(90, 'HP CASING', 71, 7, 1, 1234, 42, 'White'),
(91, 'SUNGLASS', 72, 2, 1, 0, 36, 'Red'),
(93, 'SHOES', 73, 11, 1, 0, 34, 'Black'),
(94, 'BAG', 74, 10, 1, 0, 0, 'Black'),
(100, 'BRACELET', 70, 3, 1, 12, 12, 'asda'),
(102, 'SHOES', 75, 11, 1, 0, 37, 'Orange'),
(103, 'SHOES', 66, 11, 1, 9087, 40, 'Black'),
(104, 'RING', 76, 4, 1, 121, 20, 'Dark Blue'),
(105, 'BAG', 65, 10, 1, 1990, 10, 'Black'),
(106, 'RING', 77, 4, 1, 5559, 35, 'Red');

-- --------------------------------------------------------

--
-- Table structure for table `prd_email_logs`
--

CREATE TABLE `prd_email_logs` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` text,
  `status` varchar(15) NOT NULL DEFAULT 'pending',
  `initial_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prd_email_logs`
--

INSERT INTO `prd_email_logs` (`id`, `email`, `subject`, `body`, `status`, `initial_date`) VALUES
(7, 'sandra@wp.com', 'test', '<p><strong>this is a test</strong></p>\r\n', 'Sent', '2018-01-03 14:08:34'),
(8, 'asdasd@sdda.com', 'Product Repaired', '<p><strong>Lorer Ipsum</strong></p>\r\n', 'Sent', '2018-01-05 01:33:25'),
(9, 'hongye@wp.com', 'Product Repaired', '<p>Hi Man,</p>\r\n\r\n<p>Your product is repaired.. Please collect it.</p>\r\n', 'Sent', '2018-01-05 01:51:02'),
(10, 'nazreen@webpuppies.com.sg', 'Your Item is ready for collection', '<p>Please collect your item now.</p>\r\n', 'Sent', '2018-01-05 16:03:34'),
(11, 'nazreen@webpuppies.com.sg', 'Your Item is ready for collection', '<p>Test 123</p>\r\n', 'Sent', '2018-01-05 16:32:03'),
(12, 'nazreen@webpuppies.com.sg', 'Your Item is ready for collection', '<p>Hi Nazreen,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Your Item is ready for collection,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Item: Bags / Shades<br />\r\nOutlet: Tanjong Pagar CK Outlet<br />\r\nOperating Hours: 8am - 10pm</p>\r\n\r\n<p>Please bring your receipt to verify collection.</p>\r\n\r\n<p>Thank you.<br />\r\nRegards,<br />\r\nCharles &amp; Keith Representative<br />\r\n<a href=\"http://www.charleskeith.com/\"><img alt=\"\" src=\"https://canalwalk.co.za/wp-content/uploads/2016/10/Tenant-List58.png\" style=\"height:200px; width:200px\" /></a></p>\r\n', 'Sent', '2018-01-20 13:17:13'),
(13, 'tom@gmail.com', 'Hello', '<p>Test</p>\r\n', 'Sent', '2018-01-23 12:59:15'),
(14, 'nazreen@webpuppies.com.sg', 'test', '<p>Hi Nazreen,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Your Item is ready for collection,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Item: Bags / Shades<br />\r\nOutlet: Tanjong Pagar CK Outlet<br />\r\nOperating Hours: 8am - 10pm</p>\r\n\r\n<p>Please bring your receipt to verify collection.</p>\r\n\r\n<p>Thank you.<br />\r\nRegards,<br />\r\nCharles &amp; Keith Representative<br />\r\n<a href=\"http://www.charleskeith.com/\"><img alt=\"\" src=\"https://canalwalk.co.za/wp-content/uploads/2016/10/Tenant-List58.png\" /></a></p>\r\n', 'Sent', '2018-01-23 13:05:20'),
(15, 'Helen@mail.com', 'Testing 123', '<p>testing 123</p>\r\n', 'Sent', '2018-01-23 15:29:02'),
(16, 'nazreen@webpuppies.com.sg', 'Your Item is ready for collection', '<p><a href=\"mailto:nazreen@webpuppies.com.sg\">c</a>heck the name</p>\r\n', 'Sent', '2018-01-23 15:44:06'),
(17, 'pauline@mail.com', NULL, 'Hello', 'Sent', '2018-01-23 22:32:37'),
(18, 'pauline@mail.com', NULL, '', 'Sent', '2018-01-24 00:45:45'),
(19, 'pauline@mail.com', NULL, '', 'Sent', '2018-01-24 00:45:46'),
(20, 'pauline@mail.com', 'testing', 'hihi', 'Sent', '2018-01-26 01:45:28'),
(21, 'nazreen@webpuppies.com.sg', 'test', 'sssss', 'Sent', '2018-01-26 01:46:42'),
(22, 'nazreen@webpuppies.com.sg', 'test', 'test', 'Sent', '2018-01-26 01:48:15'),
(23, 'nazreen@webpuppies.com.sg', 'tttt', 'tttt', 'Sent', '2018-01-26 01:49:52'),
(24, 'leekim@webpuppies.com.sg', 'test', 'tesy', 'Sent', '2018-01-26 01:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `prd_images`
--

CREATE TABLE `prd_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `defect_id` int(11) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `what_done_for_repair` text,
  `repair_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prd_images`
--

INSERT INTO `prd_images` (`id`, `product_id`, `defect_id`, `images`, `status`, `what_done_for_repair`, `repair_image`) VALUES
(8, 1, 62, 'uploads/4baacc29ee92cf3ce5e0c151e9da958b.png', 1, NULL, NULL),
(9, 1, 62, 'uploads/3a2472cb6914ca088da5db7f6084a4d0.png', 1, NULL, NULL),
(16, 2, 64, 'uploads/a5397f5d431340a2a9b152e548c689eb.png', 1, 'This is a nose', 'uploads/19018df91cf11620eb49fa0f1fda60a5.jpg'),
(17, 2, 64, 'uploads/10240b2bea88d17449491455b421b939.png', 1, 'Bag handle is loose', NULL),
(29, 10, 63, 'uploads/03b60a7e6be3827b79c0249e9ac41baa.jpg', 1, NULL, NULL),
(30, 10, 63, 'uploads/b35a609d8215e1e9e1ea1651aab3d68d.png', 1, NULL, NULL),
(31, 10, 63, 'uploads/d4c7d368ddda948968f7247a77930f2a.png', 1, NULL, NULL),
(34, 1, 69, 'uploads/7a99def0c55428f1b4a9ad895e1723eb.png', 1, NULL, NULL),
(35, 1, 69, 'uploads/7077a41be1aeacd31f44ed07255ba5b9.png', 1, NULL, NULL),
(37, 3, NULL, 'uploads/c94ff3256062a65f766d2b20090fac60.png', 1, NULL, NULL),
(39, 7, 71, 'uploads/b70d9e96734644c634eea08e043e8c1a.jpg', 1, NULL, NULL),
(40, 2, 72, 'uploads/ed65e911fdd26dd28da8da87a6432bef.png', 1, '', NULL),
(41, 2, 72, 'uploads/8f6d714c3abae8183cffc44e22957646.png', 1, '', NULL),
(42, 2, 72, 'uploads/9acf75852bcd9173144a3c256a160a34.png', 1, '', NULL),
(44, 11, 73, 'uploads/703514a854119d4967f0e5eb2cc84fe1.png', 1, NULL, NULL),
(45, 10, 74, 'uploads/26cb7b024034562e47cf0a8667ef0fe1.jpg', 1, NULL, NULL),
(51, 3, 70, 'uploads/7cee5c3109e92f18e693ee75e8231290.png', 1, NULL, NULL),
(52, 3, 70, 'uploads/82432bc147ac563d59c5ff68bf5dfd6b.png', 1, NULL, NULL),
(54, 11, 66, 'uploads/b5421a67fa1e32a9123872ae7995c2ea.gif', 2, 'Patch a few glue on the side', 'uploads/58bdefeba0b9bc4d7b2193679942b651.png'),
(55, 4, 76, 'uploads/0e4b02bcd1d74f83131e1213066f27c2.png', 1, '', 'uploads/761b44ca19f3869a69bb6a2d3eb59c7d.jpg'),
(56, 10, 65, 'uploads/639751d985a9927dd2ba9e74cc336387.jpg', 1, NULL, NULL),
(57, 10, 65, 'uploads/8f4297cfc3ca3304469682f65a89134e.png', 1, NULL, NULL),
(58, 4, 77, 'uploads/1698a7e35ffbeddd242ab09f3546bdbf.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prd_outlet`
--

CREATE TABLE `prd_outlet` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` int(18) NOT NULL,
  `email` varchar(50) NOT NULL,
  `outlet_type` int(11) DEFAULT '1' COMMENT '1=Charles & Keith 2=Pedro'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prd_outlet`
--

INSERT INTO `prd_outlet` (`id`, `name`, `location`, `contact_no`, `email`, `outlet_type`) VALUES
(43, 'Pedro NEX (PNX)', 'NEX Mall #01-80/81', 66340979, 'nex.pedro@pedroshoes.com', 2),
(41, 'Pedro JEM (PJM)', 'JEM #01-41', 68379011, 'jem.pedro@pedroshoes.com', 2),
(42, 'Pedro ION (ION)', 'ION Orchard #B3-10', 62382067, 'ion.pedro@pedroshoes.com', 2),
(1, 'Charles & Keith 313 (313)', '313@Somerset #02-46/47/48/49', 65095040, '313@charleskeith.com\r\n', 1),
(40, 'Pedro Bugis Junction (PBG)', 'Bugis Junction #01-03', 63380538, 'bg.pedro@pedroshoes.com', 2),
(39, 'Pedro Anchorpoint (PAP)', 'Anchorpoint #01-29', 64726963, 'ap.pedro@pedroshoes.com', 2),
(2, 'Charles & Keith Anchorpoint (AP)', 'Anchorpoint #01-30/31', 64726937, 'CKSAnchorpoint@charleskeith.com\r\n', 1),
(12, 'Charles & Keith Bugis Junction (BG)', 'Bugis Junction #01-06/07/08', 63380537, 'CKSBugisjuction@charleskeith.com\r\n', 1),
(13, 'Charles & Keith Bedok Mall (BDM)', 'Bedok Mall #01-31', 67025521, 'bdm@charleskeith.com\r\n', 1),
(14, 'Charles & Keith Central (CEN)', 'Central #01-51/52', 63275036, 'CKSCentral@charleskeith.com\r\n', 1),
(15, 'Charles & Keith City Square Mall (CQM)', 'City Square Mall #01-34/35', 65095041, 'CKSCitySquareMall@charleskeith.com\r\n', 1),
(16, 'Charles & Keith City Link Mall (CTL)', 'City Link Mall #B1-32/34', 63380913, 'CKSCityLink@charleskeith.com\r\n', 1),
(17, 'Charles & Keith Causeway Point (CWP)', 'Causeway Point #01-28', 67671306, 'CKSCausewayPoint@charleskeith.com\r\n', 1),
(18, 'Charles & Keith Great World City (GWC)', 'Great World City #01-38', 68380372, 'gwc@charleskeith.com\r\n', 1),
(19, 'Charles & Keith ION Orchard (ION)', 'ION Orchard #B3-58', 62381840, 'CKSION@charleskeith.com\r\n', 1),
(20, 'Charles & Keith IMM (IMM)', 'IMM #02-13', 65639020, 'cks.imm@charleskeith.com\r\n', 1),
(21, 'Charles & Keith JEM (JEM)', 'JEM #01-58', 68379010, 'jem@charleskeith.com\r\n', 1),
(22, 'Charles & Keith Jurong Point Shopping Centre (JP)', 'Jurong Point Shopping Centre #02-02/03', 67920986, 'CKSJurongPoint@charleskeith.com\r\n', 1),
(23, 'Charles & Keith Marina Bay Sands (MBS)', 'Marina Bay Sands #B2-99', 66340843, 'mbs@charleskeith.com\r\n', 1),
(24, 'Charles & Keith Marina Square (MS)', 'Marina Square #02-107/108', 63380919, 'CKSMarinaSquare@charleskeith.com\r\n', 1),
(25, 'Charles & Keith Takashimaya S. C. (NAC)', 'Takashimaya S. C. #B2-12/14', 67370152, 'nac@charleskeith.com\r\n', 1),
(26, 'Charles & Keith Velocity @ Novena (NV)', 'Velocity @ Novena #01-13/14', 63536063, 'nv@charleskeith.com\r\n', 1),
(27, 'Charles & Keith NEX (NEX)', 'NEX #01-39/40', 66347445, 'nex@charleskeith.com\r\n', 1),
(28, 'Charles & Keith Plaza Singapura (PS)', 'Plaza Singapura #02-28/28A', 63349331, 'CKSPlazaSingapura@charleskeith.com\r\n', 1),
(29, 'Charles & Keith Raffles City Shopping Centre (RC)', 'Raffles City Shopping Centre #03-31/32', 63349066, 'CKSRafflesCIty@charleskeith.com\r\n', 1),
(30, 'Charles & Keith Suntec City Mall (STC)', 'Suntec City Mall #01-338', 63391300, 'stc@charleskeith.com\r\n', 1),
(31, 'Charles & Keith Changi Airport Terminal 1 (T1)', 'Changi Airport Terminal 1 #02-51', 62148044, 'CKST1@charleskeith.com\r\n', 1),
(32, 'Charles & Keith Changi Airport Terminal 2 (T2)', 'Changi Airport Terminal 2 #026-057', 65438055, 't2@charleskeith.com\r\n', 1),
(33, 'Charles & Keith Changi Airport Terminal 3 (T3)', 'Changi Airport Terminal 3 #02-53', 64467283, 'CKST3@charleskeith.com\r\n', 1),
(34, 'Charles & Keith Changi Airport Terminal 4 (T4)', 'Changi Airport Terminal 4 #02-30', 65811648, 'ckst4@charleskeith.com\r\n', 1),
(35, 'Charles & Keith Tampines Mall (TM)', 'Tampines Mall #01-13/14', 62609711, 'CKSTampinesMall@charleskeith.com\r\n', 1),
(36, 'Charles & Keith VivoCity (VC)', 'VivoCity #02-184/185', 63765013, 'CKSVivocity@charleskeith.com\r\n', 1),
(37, 'Charles & Keith Wisma Atria Shopping Centre WA', 'Wisma Atria Shopping Centre #B1-18/19', 62383312, 'wa@charleskeith.com\r\n', 1),
(38, 'Charles & Keith Waterway Point (WWP)', 'Waterway Point #01-51', 63858153, 'cks.wwp@charleskeith.com\r\n', 1),
(44, 'Pedro Marina Bay Sands (PMB)', 'Marina Bay Sands #B2-100', 66349454, 'mbs.pedro@pedroshoes.com', 2),
(45, 'Pedro Plaza Singapura (PPS)', 'Plaza Singapura #01-03', 63380536, 'ps.pedro@pedroshoes.com', 2),
(46, 'Pedro Suntec City Mall (PST)', 'Suntec City Mall #01-339', 63383976, 'stc.pedro@pedroshoes.com', 2),
(47, 'Pedro VivoCity (PVC)', 'VivoCity #02-186', 63765012, 'vivo.pedro@pedroshoes.com', 2),
(48, 'Pedro Wisma Atria Shopping Centre (PWA)', 'Wisma Atria Shopping Centre #B1-32/33/34', 68359517, 'ws.pedro@pedroshoes.com', 2),
(49, 'Pedro 313 (P13)', '313@Somerset #02-25/26/27', 65095038, '313.pedro@pedroshoes.com', 2),
(50, 'Pedro IMM (PIM)', 'IMM Mall #02-48', 65639019, 'imm.pedro@pedroshoes.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `prd_products`
--

CREATE TABLE `prd_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ch_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prd_products`
--

INSERT INTO `prd_products` (`id`, `name`, `ch_name`) VALUES
(1, 'BELT', '腰带'),
(2, 'SUNGLASS', '墨镜'),
(3, 'BRACELET', '手镯'),
(4, 'RING', '戒子'),
(5, 'NECKLACE', '项链'),
(6, 'KEY CHAIN', '钥匙扣'),
(7, 'HP CASING', '电话壳'),
(8, 'IPAD CASING', '平板壳'),
(9, 'EARRING', '耳环'),
(10, 'BAG', '包包'),
(11, 'SHOES', '鞋');

-- --------------------------------------------------------

--
-- Table structure for table `prd_product_defect_category`
--

CREATE TABLE `prd_product_defect_category` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `defect_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prd_product_defect_category`
--

INSERT INTO `prd_product_defect_category` (`id`, `product_id`, `defect_category_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 2, 1),
(13, 2, 12),
(14, 2, 13),
(15, 2, 14),
(16, 2, 15),
(17, 2, 16),
(18, 2, 17),
(19, 2, 18),
(20, 2, 19),
(21, 2, 20),
(22, 2, 21),
(23, 2, 22),
(24, 2, 23),
(25, 2, 24),
(26, 2, 11),
(27, 2, 25),
(28, 2, 26),
(29, 3, 1),
(30, 3, 27),
(31, 3, 28),
(32, 3, 19),
(33, 3, 21),
(34, 3, 23),
(35, 3, 7),
(36, 3, 29),
(37, 3, 30),
(38, 3, 9),
(39, 3, 11),
(40, 4, 1),
(41, 4, 19),
(42, 4, 21),
(43, 4, 23),
(44, 4, 7),
(45, 4, 31),
(46, 4, 30),
(47, 4, 9),
(48, 4, 11),
(49, 5, 1),
(50, 5, 27),
(51, 5, 28),
(52, 5, 19),
(53, 5, 21),
(54, 5, 23),
(55, 5, 7),
(56, 5, 32),
(57, 5, 30),
(58, 5, 9),
(59, 5, 11),
(60, 6, 1),
(61, 6, 27),
(62, 6, 28),
(63, 6, 19),
(64, 6, 23),
(65, 6, 7),
(66, 6, 33),
(67, 6, 9),
(68, 6, 11),
(69, 7, 19),
(70, 7, 23),
(71, 7, 34),
(72, 7, 6),
(73, 7, 35),
(74, 7, 9),
(75, 7, 11),
(76, 7, 36),
(77, 8, 19),
(78, 8, 23),
(79, 8, 34),
(80, 8, 6),
(81, 8, 35),
(82, 8, 9),
(83, 8, 11),
(84, 9, 1),
(87, 9, 23),
(88, 9, 37),
(89, 9, 30),
(90, 9, 9),
(91, 9, 38),
(92, 9, 11),
(93, 10, 1),
(94, 10, 21),
(95, 10, 23),
(96, 10, 6),
(97, 10, 35),
(98, 10, 7),
(99, 10, 39),
(100, 10, 40),
(101, 10, 41),
(102, 10, 2),
(103, 10, 42),
(104, 10, 43),
(105, 10, 44),
(106, 10, 45),
(107, 10, 46),
(108, 10, 47),
(109, 10, 11),
(110, 10, 48),
(111, 10, 49),
(112, 10, 50),
(113, 10, 16),
(114, 10, 51),
(115, 10, 57),
(116, 10, 52),
(117, 10, 53),
(118, 10, 54),
(119, 10, 55),
(120, 10, 56),
(121, 10, 58),
(122, 10, 59),
(123, 10, 60),
(124, 10, 61),
(125, 10, 62),
(126, 11, 1),
(127, 11, 19),
(128, 11, 23),
(129, 11, 6),
(130, 11, 7),
(131, 11, 63),
(132, 11, 40),
(133, 11, 2),
(134, 11, 41),
(135, 11, 64),
(136, 11, 65),
(137, 11, 47),
(138, 11, 66),
(139, 11, 11),
(140, 11, 36),
(141, 11, 67),
(142, 11, 68),
(143, 11, 48),
(144, 11, 69),
(145, 11, 70),
(146, 11, 71),
(147, 11, 72),
(148, 11, 73),
(149, 11, 74),
(150, 11, 75),
(151, 9, 77),
(152, 9, 76),
(153, 10, 76),
(154, 10, 78),
(155, 11, 76),
(156, NULL, NULL),
(157, NULL, NULL),
(158, NULL, NULL),
(159, NULL, NULL),
(160, NULL, NULL),
(161, NULL, NULL),
(162, NULL, NULL),
(163, NULL, NULL),
(164, NULL, NULL),
(165, NULL, NULL),
(166, NULL, NULL),
(167, NULL, NULL),
(168, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prd_users`
--

CREATE TABLE `prd_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT '2' COMMENT '1=Admin 2=Staff 3=Repair Center',
  `initial_date` datetime DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `employer_id` int(11) DEFAULT NULL,
  `contact_no` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Active 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prd_users`
--

INSERT INTO `prd_users` (`id`, `name`, `email`, `password`, `access_token`, `password_reset_token`, `user_type`, `initial_date`, `deleted`, `employer_id`, `contact_no`, `status`) VALUES
(1, 'Admin', 'admin@product.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, 1, NULL, 0, 1, 91252525, 1),
(2, 'Staff', 'staff@product.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, 2, NULL, 0, 2, 91252525, 1),
(9, 'Repairman', 'repair@product.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, 3, NULL, 0, 3, 91252525, 1),
(11, 'Sarah', 'sarah@product.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, 2, NULL, 0, 5221, 95855221, 0),
(12, 'Jason Han', 'jason@product.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, 3, NULL, 0, 4578, 65858547, 1),
(14, 'Abhi', 'abhi@product.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, 3, NULL, 0, 2234, 11122322, 1),
(16, 'Francis', 'francis@product.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, 2, NULL, 0, 1102, 999, 0),
(17, 'Harry', 'harry@product.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, 2, NULL, 0, 1025, 98555558, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prd_customer`
--
ALTER TABLE `prd_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_defects`
--
ALTER TABLE `prd_defects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_defects_details`
--
ALTER TABLE `prd_defects_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_defect_category`
--
ALTER TABLE `prd_defect_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_defect_products`
--
ALTER TABLE `prd_defect_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_email_logs`
--
ALTER TABLE `prd_email_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_images`
--
ALTER TABLE `prd_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_outlet`
--
ALTER TABLE `prd_outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_products`
--
ALTER TABLE `prd_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_product_defect_category`
--
ALTER TABLE `prd_product_defect_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_users`
--
ALTER TABLE `prd_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employer_id` (`employer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prd_customer`
--
ALTER TABLE `prd_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `prd_defects`
--
ALTER TABLE `prd_defects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `prd_defects_details`
--
ALTER TABLE `prd_defects_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `prd_defect_category`
--
ALTER TABLE `prd_defect_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `prd_defect_products`
--
ALTER TABLE `prd_defect_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `prd_email_logs`
--
ALTER TABLE `prd_email_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `prd_images`
--
ALTER TABLE `prd_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `prd_outlet`
--
ALTER TABLE `prd_outlet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `prd_products`
--
ALTER TABLE `prd_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prd_product_defect_category`
--
ALTER TABLE `prd_product_defect_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `prd_users`
--
ALTER TABLE `prd_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

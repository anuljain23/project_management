-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2020 at 05:00 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rajsamma_dev_db3`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_company`
--

CREATE TABLE `client_company` (
  `id` int(11) NOT NULL,
  `name` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client_company`
--

INSERT INTO `client_company` (`id`, `name`, `contact`, `email`, `password`, `company_id`) VALUES
(1, 'mohini', '1234567890', 'mohini@xyz.com', '123123', 16),
(2, 'manipur international university', '0987654321', 'manipur@xyz.com', '123123', 16),
(3, 'shoping bharat', '121231230', 'shopingbharat@xyz.com', '123123', 16),
(4, 'white rose', '1234567890', 'whiterose@xyz.com', '123123', 16),
(7, 'white rose 1', '123123123', 'whiterose1@xyz.com', '123123', 16),
(9, 'OSWKey foundation', '1231231230', 'asdfghj@sdfghj.dfghj', '741852', 16),
(12, 'aaaaaaaa', 'aaaaaa', 'aaaaaa@a.aaa', 'aaaaaaa', 16),
(13, 'sasta kaam project', '74', '', '', 16);

-- --------------------------------------------------------

--
-- Table structure for table `client_users`
--

CREATE TABLE `client_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(10) NOT NULL,
  `email` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client_users`
--

INSERT INTO `client_users` (`id`, `name`, `contact`, `project_id`, `email`, `password`, `client_company_id`) VALUES
(1, 'xyz1', '1231231230', 1, 'dafga@sfg.fesvt', '123123', 1),
(2, 'xyz2', '1231231230', 4, 'dvsfv@adfa.adads', '123456', 1),
(3, 'xyz3', '1231231230', 2, 'awfg@gegrf.awdf', '456321', 1),
(5, 'xyz4', '1231231230', 2, 'awfg@gegrf.awdfj', '452', 1),
(6, 'divya jain', '123123123132', 5, 'dj@gmail.com', '1231230', 7),
(7, 'toshee jain', '123132', 6, 'asd@asd.asd', '1111', 7);

-- --------------------------------------------------------

--
-- Table structure for table `developing_company`
--

CREATE TABLE `developing_company` (
  `id` int(11) NOT NULL,
  `name` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `developing_company`
--

INSERT INTO `developing_company` (`id`, `name`, `username`, `email`, `password`) VALUES
(11, 'adasda', 'asdasd', 'adasdas@ssdfd.asdas', '1234'),
(12, 'John', 'Doe', 'john@example.com', '1234'),
(13, 'rgth', 'hxthx', 'xthd@dfhx.hxh', 'xfhgh'),
(14, 'abcd', 'abcde', 'abcd@efgh.hj', 'abcabcd'),
(15, 'Online Chalo', 'onlinechalo', 'sagar@onlinechalo.in', '123123'),
(16, 'onlinechalo1.in', 'Sagar Gupta', 'sagargupta1@onlinechalo.com', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `contact_no`, `email`, `password`, `company_id`) VALUES
(3, 'Anul jain', '748568568', 'anuljain01@xyz.com', '1234567890', 16),
(4, 'divya gupta', '1234567890', 'dj@onlinechalo.com', '123123', 16),
(5, 'yash gupta', '1234567890', 'yash@sirmvit.edu', '123123', 16),
(6, 'Ayush gupta', '9865415785', 'ayushg@gil.com', '123123', 16),
(7, 'palash Jain', '123456', 'xy1@xy.xy', '123123', 16),
(8, 'honey jain', '1234567890', 'xyz2@xyz.sdv', '5632', 16),
(9, 'abcd xyz', '1112223334', 'advf@ssg.sdgs', '741852963', 16),
(11, 'abc zsdg', '48565', 'sfad@abfcd.asdfb', '123', 16),
(21, 'sagar gupta', '975504091', 'sagar@onlinechalo.in', '123123', 16),
(22, 'asdfg', '785623', 'szdf@aewg.erg', '98465123', 16),
(23, 'zsdg aefv', '4512651', 'afsd@ghj.gh', 'cdcvdsv', 16),
(24, 'dfghjdfgh hjk', '97415321', 'xdfcgvhjb@dfgh.cvb', '7984651230', 16);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(10) NOT NULL,
  `specifics` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `estimated_delivery_date` date NOT NULL,
  `company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `client_id`, `specifics`, `start_date`, `estimated_delivery_date`, `company_id`) VALUES
(1, 'project name', 1, 'Just do what ever you could', '2020-09-07', '2020-10-07', 16),
(2, 'afaaga', 1, 'sfa tstgsf tgrsgsg vfbdtyn', '2020-09-07', '2020-09-16', 16),
(3, 'onlinecchaol manipur international university', 2, 'avafbs gsged gsasdf asdad ', '2020-09-10', '2020-09-24', 16),
(4, 'card design', 1, 'no specifics required', '2020-09-10', '2020-09-29', 16),
(5, 'white rose website', 7, 'no specifics required', '2020-09-08', '2020-12-31', 16),
(6, 'white rose1', 7, 'not needed for the moment', '2020-09-09', '2020-11-10', 16),
(9, 'osw foundation', 9, 'erteytu rdtu trmurt yentytny rfgyrtny', '2020-09-11', '2020-10-28', 16),
(22, 'aaaaaaa', 12, 'aaaaaaaaa', '2020-09-01', '2020-09-30', 16),
(23, 'bbbbbb', 12, 'bbbbbb', '2020-09-12', '2020-09-30', 16),
(24, 'bbbbbbbb', 12, 'bbbbbbbbbbbbb', '2020-09-23', '2020-10-08', 16),
(25, 'rrrrrrrr', 1, 'rrrrrrrr', '2020-09-07', '2020-09-30', 16),
(26, 'iiiiiiii', 12, 'iiiiiiiiiiii', '2020-09-07', '2020-09-30', 16),
(27, 'sfsergs', 2, 'ersgsg', '2020-09-11', '2020-10-02', 16),
(28, 'example', 13, '', '2020-05-20', '2021-07-05', 16),
(29, 'ppppppp', 13, 'dgsfffb', '2020-09-14', '2020-09-30', 16),
(30, 'ttttt', 3, 'tttttttt', '2020-09-07', '2020-10-02', 16);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `company_id`) VALUES
(1, 'designing', 16),
(2, 'digital marketing', 16),
(3, 'software developement', 16),
(4, 'web development', 16),
(5, 'seo services', 16),
(6, 'corporate branding', 16),
(7, 'e-commerce system', 16),
(12, 'Team lead', 16);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `name` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(10) NOT NULL,
  `role_id` int(11) NOT NULL,
  `timeline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `name`, `description`, `project_id`, `role_id`, `timeline`) VALUES
(1, 'card designing', 'card design for the following client', 4, 1, '2020-09-30'),
(2, 'logo designing', 'logo design for the following client', 4, 1, '2020-09-14'),
(4, 'software development', 'software developement for the following client', 4, 3, '2020-10-12'),
(5, 'asdfzff ffbg', 'asfsdgg sdvbh dfbnhm sfgghnd dffg dffbxgfn ddvf fregsthdzgfb', 3, 1, '2020-09-22'),
(6, 'sdfg dzffhd zggh dsfsdh dffzfbf', 'sdfg dzffhd zggh dsfsdh dffzfbfcdsv scdzbd zdvnhcndcrrgtg qwwert', 3, 2, '2020-09-21'),
(7, 'afgshs df ', 'dsafsgdh qwertyuiop asdfghjkl zxcvbn', 6, 2, '2020-09-14'),
(8, 'afgf gss', 'poiuytrewq lkjhgfdsa mnbvcxz qwertyu', 6, 5, '2020-09-22'),
(9, 'dfxh fghdf', 'dsfhj srtdfygh sdfghj ertyu rytuietr rytuu', 6, 7, '2020-09-30'),
(10, 'asdfgh fghjk', 'sertyui ertyjuki wefrgthjuk ertyu dfghf', 6, 3, '2020-10-11'),
(11, 'rterytyteyeyyy6y6y56y56y6yyhyh', 'tyhuy  yyyyb rtgg4t tr', 9, 5, '2020-09-24'),
(12, 'xxxxx', 'ttttttt', 5, 6, '2021-11-13'),
(13, 'task dikha', 'task dikhta nahi hai', 5, 1, '2020-09-15'),
(16, 'aaaa', 'aaaa', 5, 12, '2020-09-30'),
(17, 'bbbbbbbb', 'bbbbbbbbbb', 5, 4, '2020-09-24'),
(18, 'cccccc', 'cccc', 5, 4, '2020-09-21'),
(19, 'aaaaaaaa', 'ddddddd', 24, 3, '2020-09-21'),
(20, 'dddddddddddd', 'gggggggg', 9, 12, '2020-09-30'),
(21, 'rrrrrr', 'rrrrrr', 25, 1, '2020-09-21'),
(22, 'rrrrrrrrrr', 'rrrrrrrr', 25, 1, '2020-09-28'),
(23, 'qqqqqqq', 'qqqqqqqq', 25, 1, '2020-09-23'),
(24, 'xxxxxxxxxxxxx', 'xxxx', 25, 6, '2020-09-30'),
(25, 'asdad', 'sdfadf', 9, 2, '2020-09-22'),
(26, 'zxvz', 'dfcz', 1, 1, '2020-09-28'),
(27, 'zddf', 'dzdfbb', 22, 3, '2020-09-25'),
(28, 'xhxfhfgh', 'xfdhxfh', 26, 2, '2020-09-30'),
(29, 'gdfshsfd', 'sdgsfhst', 26, 12, '2020-10-01'),
(30, 'sfghdjdgvs erg', 'gsefgrtsgsg', 26, 5, '2020-09-24'),
(31, 'dgfsfg', 'sfgdgfg', 6, 12, '2020-09-28'),
(32, 'fgfggh', 'zdfhg', 2, 3, '2020-09-22'),
(33, 'zsdgf', 'zdfhxg', 28, 3, '2020-10-02'),
(34, 'dghthsth', 'erhxfhh', 28, 12, '2020-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `member_and_role` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `member_and_role`, `project_id`, `company_id`) VALUES
(3, 'a:3:{i:3;a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}i:4;a:3:{i:0;s:1:\"3\";i:1;s:1:\"4\";i:2;s:1:\"5\";}i:5;a:3:{i:0;s:1:\"2\";i:1;s:1:\"5\";i:2;s:1:\"7\";}}', 2, 16),
(4, 'a:3:{i:3;a:4:{i:0;s:1:\"1\";i:1;s:1:\"4\";i:2;s:1:\"5\";i:3;s:1:\"6\";}i:6;a:3:{i:0;s:1:\"3\";i:1;s:1:\"4\";i:2;s:1:\"7\";}i:7;a:1:{i:0;s:1:\"2\";}}', 3, 16),
(5, 'a:4:{i:3;a:3:{i:0;s:1:\"4\";i:1;s:1:\"6\";i:2;s:1:\"7\";}i:8;a:2:{i:0;s:1:\"5\";i:1;s:1:\"6\";}i:9;a:2:{i:0;s:1:\"3\";i:1;s:1:\"4\";}i:10;a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"5\";}}', 4, 16),
(6, 'a:5:{i:3;a:1:{i:0;s:1:\"8\";}i:4;a:1:{i:0;s:1:\"2\";}i:6;a:1:{i:0;s:1:\"5\";}i:8;a:1:{i:0;s:1:\"7\";}i:10;a:1:{i:0;s:1:\"3\";}}', 6, 16),
(7, 'a:2:{i:8;a:2:{i:0;s:1:\"6\";i:1;s:1:\"3\";}i:11;a:2:{i:0;s:1:\"1\";i:1;s:1:\"8\";}}', 2, 16),
(8, 'a:2:{i:3;a:2:{i:0;s:1:\"6\";i:1;s:1:\"8\";}i:4;a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}}', 9, 16),
(9, 'a:4:{i:3;a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}i:4;a:1:{i:0;s:1:\"8\";}i:5;a:3:{i:0;s:1:\"6\";i:1;s:1:\"7\";i:2;s:1:\"5\";}i:14;a:2:{i:0;s:1:\"8\";i:1;s:1:\"4\";}}', 5, 16),
(10, 'a:3:{i:3;a:3:{i:0;s:1:\"6\";i:1;s:1:\"1\";i:2;s:1:\"2\";}i:7;a:3:{i:0;s:1:\"7\";i:1;s:1:\"5\";i:2;s:1:\"3\";}i:14;a:2:{i:0;s:1:\"6\";i:1;s:1:\"1\";}}', 5, 16),
(11, 'a:4:{i:0;a:1:{i:0;s:0:\"\";}i:1;a:1:{i:0;s:0:\"\";}i:2;a:1:{i:0;s:0:\"\";}i:3;a:1:{i:0;s:0:\"\";}}', 24, 16),
(12, 'N;', 4, 16),
(13, 'a:8:{i:0;a:1:{i:0;s:0:\"\";}i:1;a:1:{i:0;s:0:\"\";}i:2;a:1:{i:0;s:0:\"\";}i:3;a:1:{i:0;s:0:\"\";}i:4;a:1:{i:0;s:0:\"\";}i:5;a:1:{i:0;s:0:\"\";}i:6;a:1:{i:0;s:0:\"\";}i:7;a:1:{i:0;s:0:\"\";}}', 25, 16),
(14, 'a:12:{i:0;a:1:{i:0;s:0:\"\";}i:1;a:1:{i:0;s:0:\"\";}i:2;a:1:{i:0;s:0:\"\";}i:3;a:1:{i:0;s:0:\"\";}i:4;a:1:{i:0;s:0:\"\";}i:5;a:1:{i:0;s:0:\"\";}i:6;a:1:{i:0;s:0:\"\";}i:7;a:1:{i:0;s:0:\"\";}i:8;a:1:{i:0;s:0:\"\";}i:9;a:1:{i:0;s:0:\"\";}i:10;a:1:{i:0;s:0:\"\";}i:11;a:1:{i:0;s:0:\"\";}}', 5, 16),
(15, 'a:5:{i:0;a:1:{i:0;s:0:\"\";}i:1;a:1:{i:0;s:0:\"\";}i:2;a:1:{i:0;s:0:\"\";}i:3;a:1:{i:0;s:0:\"\";}i:4;a:1:{i:0;s:0:\"\";}}', 23, 16);

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(11) NOT NULL,
  `members` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `members`, `project_id`, `company_id`) VALUES
(2, 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"4\";}', 23, 16),
(3, 'a:3:{i:0;s:1:\"3\";i:1;s:1:\"4\";i:2;s:1:\"5\";}', 23, 16),
(4, 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"4\";}', 2, 16),
(5, 'a:4:{i:0;s:1:\"3\";i:1;s:1:\"4\";i:2;s:1:\"5\";i:3;s:1:\"6\";}', 23, 16),
(6, 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 24, 16),
(7, 'a:2:{i:0;s:2:\"11\";i:1;s:2:\"14\";}', 25, 16),
(8, 'a:5:{i:0;s:1:\"3\";i:1;s:1:\"4\";i:2;s:1:\"7\";i:3;s:2:\"10\";i:4;s:2:\"11\";}', 5, 16),
(20, 'a:1:{i:0;s:1:\"3\";}', 2, 16),
(21, 'a:4:{i:0;s:1:\"3\";i:1;s:1:\"5\";i:2;s:2:\"11\";i:3;s:2:\"20\";}', 28, 16),
(23, 'a:2:{i:0;s:1:\"4\";i:1;s:1:\"6\";}', 23, 16),
(24, 'a:3:{i:0;s:2:\"10\";i:1;s:2:\"11\";i:2;s:2:\"14\";}', 9, 16),
(25, 'a:3:{i:0;s:1:\"5\";i:1;s:1:\"8\";i:2;s:2:\"20\";}', 4, 16),
(26, 'a:3:{i:0;s:2:\"11\";i:1;s:2:\"14\";i:2;s:2:\"20\";}', 29, 16),
(27, 'a:2:{i:0;s:1:\"4\";i:1;s:1:\"5\";}', 30, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_company`
--
ALTER TABLE `client_company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`contact`);

--
-- Indexes for table `client_users`
--
ALTER TABLE `client_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `developing_company`
--
ALTER TABLE `developing_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_company`
--
ALTER TABLE `client_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `client_users`
--
ALTER TABLE `client_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `developing_company`
--
ALTER TABLE `developing_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client_company` (`id`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

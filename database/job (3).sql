-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 07:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin`, `admin_email`, `admin_password`) VALUES
('admin 1', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `appliedjobs`
--

CREATE TABLE `appliedjobs` (
  `applyid` int(11) NOT NULL,
  `jobid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `companyusername` varchar(250) NOT NULL,
  `action` int(11) NOT NULL COMMENT 'accepted 1\r\nrejected 2\r\npending 0',
  `applydate` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appliedjobs`
--

INSERT INTO `appliedjobs` (`applyid`, `jobid`, `username`, `companyusername`, `action`, `applydate`) VALUES
(3, 1, 'user1062023001148', 'comp105202323541916', 1, '2023-10-06'),
(4, 2, 'user1062023001148', 'comp106202301020271', 1, '2023-10-06'),
(5, 1, 'user1062023001148', 'comp105202323541916', 1, '2023-10-06'),
(6, 1, 'user1092023130908', 'comp105202323541916', 1, '2023-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(50) NOT NULL,
  `blog_name` varchar(100) NOT NULL,
  `blog_title` varchar(100) NOT NULL,
  `blog_image` varchar(100) NOT NULL,
  `blog_description` varchar(250) NOT NULL,
  `blog_tags` varchar(100) NOT NULL,
  `other_image` varchar(100) DEFAULT NULL,
  `blog_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `blog_name`, `blog_title`, `blog_image`, `blog_description`, `blog_tags`, `other_image`, `blog_date`) VALUES
(1, 'shree', 'title', 'close-up-green-plant-concept1032023171211.jpg', 'Description', 'a', 'IMG_04761032023171211.jpg', '2023-10-03'),
(2, 'blog2', 'title', '_DSC90341052023203137.jpg', 'Description', 'c', 'hackathon_pic1052023203137.jfif', '2023-10-06'),
(3, 'bohg 5', 'blog title', 'close-up-green-plant-concept1092023132823.jpg', 'Description', 'b', '—Pngtree—leaves spring green decorative border_72529891092023132823.png', '2023-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `bookmarkid` int(11) NOT NULL,
  `jobid` int(52) NOT NULL,
  `username` varchar(50) NOT NULL,
  `companyusername` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`bookmarkid`, `jobid`, `username`, `companyusername`) VALUES
(7, 1, 'user1062023001148', 'comp105202323541916'),
(8, 2, 'user1062023001148', 'comp106202301020271'),
(9, 1, 'user1092023130908', 'comp105202323541916');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(100) NOT NULL,
  `category` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(1, 'Web Devlopement'),
(2, 'web design'),
(3, 'data intern'),
(4, 'data science'),
(5, 'machine learning'),
(6, 'fashion design');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(100) NOT NULL,
  `blog_id` int(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_date` date NOT NULL DEFAULT current_timestamp(),
  `person_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `blog_id`, `comment`, `comment_date`, `person_name`, `email`) VALUES
(1, 1, 'nice', '2023-10-10', 'fewf', 'shree@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `comp105202323541916`
--

CREATE TABLE `comp105202323541916` (
  `stud_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `jobid` int(250) DEFAULT NULL,
  `usertype` int(10) NOT NULL COMMENT 'applid ==0 or referral==1',
  `card` tinyint(1) NOT NULL,
  `action` tinyint(1) NOT NULL DEFAULT 0 COMMENT '(0  pending) (1 accept) '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comp105202323541916`
--

INSERT INTO `comp105202323541916` (`stud_id`, `username`, `jobid`, `usertype`, `card`, `action`) VALUES
(3, 'user1062023001148', 1, 0, 0, 1),
(4, 'user09202023134250', NULL, 1, 1, 0),
(5, 'user0925202312551496', NULL, 1, 0, 0),
(6, 'user1092023130908', 1, 0, 0, 1),
(7, 'user0926202318331820', NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comp106202301020271`
--

CREATE TABLE `comp106202301020271` (
  `stud_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `jobid` int(250) DEFAULT NULL,
  `usertype` int(10) NOT NULL COMMENT 'applid ==0 or referral==1',
  `card` tinyint(1) NOT NULL,
  `action` tinyint(1) NOT NULL DEFAULT 0 COMMENT '(0  pending) (1 accept) '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comp106202301020271`
--

INSERT INTO `comp106202301020271` (`stud_id`, `username`, `jobid`, `usertype`, `card`, `action`) VALUES
(1, 'user1062023001148', 2, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comp109202313132310`
--

CREATE TABLE `comp109202313132310` (
  `stud_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `jobid` int(250) DEFAULT NULL,
  `usertype` int(10) NOT NULL COMMENT 'applid ==0 or referral==1',
  `card` tinyint(1) NOT NULL,
  `action` tinyint(1) NOT NULL DEFAULT 0 COMMENT '(0  pending) (1 accept) '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cin` varchar(250) NOT NULL,
  `gst` varchar(250) NOT NULL,
  `pancard` varchar(250) NOT NULL,
  `gstcertificate` varchar(250) NOT NULL,
  `signup_date` date NOT NULL DEFAULT current_timestamp(),
  `coins` int(255) NOT NULL,
  `companytype` varchar(100) NOT NULL,
  `companysize` int(100) DEFAULT NULL,
  `companylogo` varchar(250) NOT NULL,
  `location` varchar(100) NOT NULL,
  `websitelink` varchar(250) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `linkedin` varchar(250) NOT NULL,
  `mobile` bigint(255) NOT NULL,
  `alternatemobile` bigint(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'pending=0)\r\n(active=1)\r\n(rejected=2)',
  `company_date` date NOT NULL DEFAULT current_timestamp(),
  `token` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`username`, `name`, `email`, `password`, `cin`, `gst`, `pancard`, `gstcertificate`, `signup_date`, `coins`, `companytype`, `companysize`, `companylogo`, `location`, `websitelink`, `facebook`, `linkedin`, `mobile`, `alternatemobile`, `active`, `company_date`, `token`) VALUES
('comp105202323541916', 'company--1', 'comp1@gmail.com', '$2y$10$/6SBL2jxeIbcK.Vw.phK2eAtSkNjCZ/J2wZ9429xPCHPcpvrcdM.a', '32532', '3454', 'images1052023235419.png', 'download1052023235419.png', '2023-10-06', 1035, 'Manufacturing Company', 10, 'images1052023235458.png', 'pune', 'Website Link*', 'Facebook', 'LinkedIn', 10, 9968, 1, '2023-10-06', '0'),
('comp106202301020271', 'comp2', 'comp2@gmail.com', '$2y$10$O1LJcWPjOEzAJpnxXfcDUuRXsiK8NocE4djEDQ33Yx9jBuxbm/m6G', '12324', '6456345', 'REVIEW 2 PPT1062023010202.ppt', '1062023010202.', '2023-10-06', 550, 'Consulting Firm', 2, 'download (2)1062023010233.png', 'mumbai', 'ebsite Link*', 'acebook', 'LinkedIn', 547457, 457547, 1, '2023-10-06', '0'),
('comp109202313132310', 'company8', 'company8@gmail.com', '$2y$10$Ywmw.bjqvBSyXUjU4ljLz.AcT9ywJ.oMvfI6xCdd4t/SmVmEkb2ri', '35', '3453', 'scoa1092023131323.pdf', 'fcoa1092023131323.pdf', '2023-10-09', 1850, 'Software Company', 140, '_DSC90341092023131420.jpg', 'pune', 'Website Link*', 'Facebook', ' Facebook LinkedIn', 786786, 456786, 1, '2023-10-09', '0');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(110) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_category` varchar(100) NOT NULL,
  `image_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_name`, `image_category`, `image_date`) VALUES
(1, '—Pngtree—leaves spring green decorative border_72529891012023130532.png', 'Jobcard and Fair', '2023-10-01'),
(3, 'image-380x2001052023215141.jpg', 'Candidate response', '2023-10-06'),
(4, 'hackathon_pic1052023215147.jpg', 'Candidate response', '2023-10-06'),
(5, 'IMG_04761052023215153.jpg', 'Candidate response', '2023-10-06'),
(6, 'r-programming-language-icon1052023215208.png', 'Candidate response', '2023-10-06'),
(7, 'download1052023215222.jpg', 'Candidate response', '2023-10-06'),
(8, 'image-130x751052023215951.jpg', 'Candidate response', '2023-10-06'),
(9, 'b11092023141218.png', 'Marketing', '2023-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `jobcards`
--

CREATE TABLE `jobcards` (
  `card_id` varchar(50) NOT NULL,
  `client_name` varchar(250) NOT NULL,
  `card_active` int(10) NOT NULL DEFAULT 0 COMMENT '\r\npending=0\r\nactive=1\r\nexpire=2\r\n',
  `card_sdate` date DEFAULT NULL,
  `card_edate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobcards`
--

INSERT INTO `jobcards` (`card_id`, `client_name`, `card_active`, `card_sdate`, `card_edate`) VALUES
('user14558357', 'hrishav', 0, NULL, NULL),
('user21489565', 'manish Dhobare100', 0, NULL, NULL),
('user22810092', 'manish Dhobare100', 0, NULL, NULL),
('user23622583', 'manish Dhobare100', 0, NULL, NULL),
('user26167504', 'manish Dhobare100', 0, NULL, NULL),
('user36619946', 'manish Dhobare100', 0, NULL, NULL),
('user38124415', 'manish Dhobare100', 0, NULL, NULL),
('user43612755', 'garry funds', 1, '2023-10-09', '2024-10-09'),
('user59204351', 'hrishav', 0, NULL, NULL),
('user62811394', 'garry funds', 0, NULL, NULL),
('user74522393', 'manish Dhobare100', 0, NULL, NULL),
('user87988911', 'manish Dhobare100', 0, NULL, NULL),
('user88587638', 'manish Dhobare100', 0, NULL, NULL),
('user93784004', 'garry funds', 0, NULL, NULL),
('user93968704', 'garry funds', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobcard_client`
--

CREATE TABLE `jobcard_client` (
  `jobcard_client_name` varchar(250) NOT NULL,
  `prefix` varchar(50) NOT NULL,
  `client_phone` bigint(255) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `client_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobcard_client`
--

INSERT INTO `jobcard_client` (`jobcard_client_name`, `prefix`, `client_phone`, `client_email`, `address`, `client_id`) VALUES
('manish Dhobare100', 'MDP00', 0, 'man@gmail.com000', 'pune00', 1),
('hrishav', 'dr', 5756, 'hhars@gmail.com', 'pp', 5);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `username` varchar(250) NOT NULL,
  `jobid` int(250) NOT NULL,
  `compname` varchar(250) NOT NULL,
  `jobtitle` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `deadline` date DEFAULT NULL,
  `location2` varchar(250) NOT NULL,
  `typeofjob` varchar(20) NOT NULL,
  `location` varchar(250) NOT NULL,
  `banner` varchar(200) DEFAULT NULL,
  `paytype` varchar(50) NOT NULL,
  `minsalary` int(250) NOT NULL,
  `maxsalary` int(250) NOT NULL,
  `education` varchar(250) NOT NULL,
  `minyr` int(50) NOT NULL,
  `maxyr` int(50) NOT NULL,
  `vacancy` int(250) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `description` varchar(250) NOT NULL,
  `responsibility` varchar(250) NOT NULL,
  `requirements` varchar(250) NOT NULL,
  `active` int(50) NOT NULL COMMENT '\r\n(==0 admin pending )\r\n(==1 accept admin active)\r\n(==2 expired )',
  `sdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`username`, `jobid`, `compname`, `jobtitle`, `category`, `deadline`, `location2`, `typeofjob`, `location`, `banner`, `paytype`, `minsalary`, `maxsalary`, `education`, `minyr`, `maxyr`, `vacancy`, `gender`, `description`, `responsibility`, `requirements`, `active`, `sdate`) VALUES
('comp105202323541916', 1, 'company--1', 'summer intern', 'Web Devlopement', '2023-10-14', 'pune', 'Full Time', 'Work from office', 'image-380x2001062023000518.jpg', 'Fixed only', 20222, 30000, '12th pass', 2, 4, 11, 'male', '\r\nVIDEO MAKER FEATURES\r\n\r\nBranding\r\nVideo editor\r\nRecord\r\nTemplates\r\nCollaboration\r\nPublishing\r\nAnalytics', 'Job Responsibility:', 'Additional Requirements:', 1, '2023-10-06'),
('comp106202301020271', 2, 'comp2', 'software testor', 'machine learning', '2023-10-28', 'mumbai', 'Full Time', 'Work from office', '—Pngtree—leaves spring green decorative border_72529891062023010833.png', 'Fixed only', 342423, 3454353, '12th pass', 3, 7, 10, 'Both', 'Job Description', 'Job Responsibility:', 'Additional Requirements:', 1, '2023-10-06'),
('comp109202313132310', 3, 'company8', 'summer intern', 'data intern', '2023-10-10', 'mumbai', 'Full Time', 'Work from office', '—Pngtree—leaves spring green decorative border_72529891092023131641.png', 'Fixed only', 20000, 90000, 'Btech', 3, 6, 10, 'Both', 'Job Description', 'Job Responsibility:', 'Additional Requirements:', 1, '2023-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `username` varchar(250) NOT NULL,
  `amount` int(250) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `sdate` date NOT NULL DEFAULT current_timestamp(),
  `edate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`username`, `amount`, `active`, `sdate`, `edate`) VALUES
('comp09202023121342', 300, 1, '2023-09-20', '2024-03-20'),
('comp09202023121342', 25, 1, '2023-09-20', '2023-10-20'),
('comp09202023121342', 600, 1, '2023-09-20', '2024-09-20'),
('comp09202023121342', 600, 1, '2023-09-21', '2024-09-21'),
('comp09202023121342', 1, 1, '2023-09-21', '2023-10-21'),
('comp0924202319220658', 500, 1, '2023-09-24', '2023-10-24'),
('comp0924202319220658', 300, 1, '2023-09-27', '2023-10-27'),
('comp105202323541916', 500, 1, '2023-10-06', '2023-11-04'),
('comp109202313132310', 300, 1, '2023-10-09', '2024-04-09'),
('comp109202313132310', 1000, 1, '2023-10-09', '2023-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `query_id` int(50) NOT NULL,
  `q_name` varchar(100) NOT NULL,
  `q_email` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL,
  `q_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_candidate`
--

CREATE TABLE `users_candidate` (
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `currentjob` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `category` varchar(250) NOT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `experience_level` int(50) NOT NULL,
  `resume` varchar(200) NOT NULL,
  `description` varchar(250) NOT NULL,
  `cardtype` int(11) NOT NULL DEFAULT 0,
  `student_date` date NOT NULL DEFAULT current_timestamp(),
  `srno` int(11) NOT NULL,
  `token` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_candidate`
--

INSERT INTO `users_candidate` (`name`, `username`, `password`, `age`, `location`, `email`, `phone`, `currentjob`, `designation`, `qualification`, `category`, `linkedin`, `experience_level`, `resume`, `description`, `cardtype`, `student_date`, `srno`, `token`) VALUES
('test31', 'user09202023134250', '$2y$10$qh3m.YHYdYMDgJjxDUjCZeaQGsIg1rOWd6yJWHuuiRVHEYTXb5MpW', 22, 'pune', 'test3@gmail.com', 93708822, 'mh', '10', '12th', 'web design', 'linedinsedf', 0, 'Student Convention-202309232023202719.pdf', 'sed', 1, '2023-10-01', 1, '0'),
('student2', 'user0925202312551496', '$2y$10$98NVgcJrmQGr/srhUkzLMeuynbdD/oJIWwSGWrTvYirXgERyqoCam', 22, 'pune', 'student2@gmail.com', 9370122575, 'mumbai', 'signation(Optional)', '10th', 'data science', '0', 1, 'moze09252023125658.pdf', 'Description Yourself', 0, '2023-10-01', 2, '0'),
('student 1', 'user0926202318322412', '$2y$10$CbSdY8MRJm8Vf0xJYMGnsO2EeZQaAGF9trezXNpX05MkQXNC/acNW', 0, 'mumbai', 'stud1@gmail.com', 0, '', '', 'btech', '', '0', 0, '', '', 0, '2023-10-01', 3, '0'),
('student 2', 'user0926202318325591', '$2y$10$hjSuXleZ2lx7ZeHu6mkoZ.elHV4M2tJvsGCV3GQs9RIfsX1V8EDT2', 0, 'mumbai', 'stud2@gmail.com', 0, '', '', '12th', '', '0', 0, '', '', 0, '2023-10-01', 4, '0'),
('student 3', 'user0926202318331820', '$2y$10$r9NFMVLG3ocelUF8u.4wyuCfPJ1708OaSME.Vz.b1nkPGTz9ZHV7e', 0, 'nashik', 'stud3@gmail.com', 0, '', '', '12th', '', '0', 0, '', '', 0, '2023-10-01', 5, '0'),
('candidte 4', 'user092720231118482', '$2y$10$rNqPFoRgVCgQba2LpYp9su3vS0v3jN9uVxSw18Bqi7hMCJVoDoUze', 0, 'nagpur', 'can4@gmail.com', 0, '', '', 'mtec', '', '0', 0, '', '', 0, '2023-10-01', 6, '0'),
('candidate 6', 'user0927202311390348', '$2y$10$Gx0aXZV.WaK5LX9DZBAj7uB9ZH7x3/uUfPZCgwRAATSIBDE8yow.S', 0, 'satara', 'can6@gmail.com', 0, '', '', '10th', '', '0', 0, '', '', 0, '2023-10-01', 7, '0'),
('card', 'user10462735', '$2y$10$utliYkYoTQKhWk5XQMOE4Olz8TEoYbHud3qvjEN0iYiZwwGao/H6e', 22, 'pune', 'card@gmail.com', 93725544, 'mumbai', 'data science', 'btec', 'Web Devlopement', NULL, 0, '2) Master &Division wise wef 11 Sept 20231052023184242.pdf', 'my self', 1, '2023-10-05', 11, '0'),
('pass', 'user1052023172845', '$2y$10$tfWg3T1y.kSkWOsP3cfqsulsxzOnDA30ZFKUL8nzQvDfsmp5vQrn6', 0, '', 'pass@gmail.com', NULL, '', '', '10th', '', NULL, 0, '', '', 0, '2023-10-05', 8, '0'),
('man', 'user1062023000715', '$2y$10$DlAggwiyz0BiLGNcQQx8VuQJH2kphtEfon95ENhvu/lbGJp3FPjqK', 0, '', 'man@gmail.com', NULL, '', '', '10th', '', NULL, 0, '', '', 0, '2023-10-06', 12, '0'),
('ram', 'user1062023001148', '$2y$10$TgCLLK8Yh4m4pxofsULfoe8cqW.aqpKYtWoy38aFuUCkzdYdlgfRq', 10, 'pune', 'ram@gmail.com', 9377885544, 'pune', 'coder', 'Two', 'Web Devlopement', NULL, 0, 'jobfair updated changes 1062023001225.pdf', 'Description Yourself', 0, '2023-10-06', 14, '0'),
('monu', 'user1092023130908', '$2y$10$3YtrFuRGrKq7ApGG4B0q4OUSgtWTUT4XGsd7ZYIyEkNEWgqS4aIIm', 12, 'pune', 'monu@gmail.com', 9677888, 'pune', 'tttt', 'Three', 'data intern', NULL, 0, 'scoa1092023131016.pdf', 'Description Yourself', 0, '2023-10-09', 15, '0'),
('carder name', 'user43612755', '$2y$10$ex4pG1QLDKyZgS2XfIwXgOAC7s/pB1FjU3pnoxzeVxOV2wkeMpaya', 21, 'mumbai', 'card1@gmail.com', 937555, 'pune', 'Designatio', 'Three', 'Web Devlopement', NULL, 0, 'fcoa1092023132343.pdf', 'Description Yourself', 1, '2023-10-09', 16, '0');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(100) NOT NULL,
  `video_name` varchar(100) NOT NULL,
  `video_category` varchar(100) NOT NULL,
  `video_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `video_name`, `video_category`, `video_date`) VALUES
(2, 'y2mate.com - aesthetic overlays for edits_1080p1012023134936.mp4', 'Jobcard and Fair', '2023-10-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_email`);

--
-- Indexes for table `appliedjobs`
--
ALTER TABLE `appliedjobs`
  ADD PRIMARY KEY (`applyid`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`bookmarkid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `comp105202323541916`
--
ALTER TABLE `comp105202323541916`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `comp106202301020271`
--
ALTER TABLE `comp106202301020271`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `comp109202313132310`
--
ALTER TABLE `comp109202313132310`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `jobcards`
--
ALTER TABLE `jobcards`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `jobcard_client`
--
ALTER TABLE `jobcard_client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobid`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `users_candidate`
--
ALTER TABLE `users_candidate`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `srno` (`srno`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appliedjobs`
--
ALTER TABLE `appliedjobs`
  MODIFY `applyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `bookmarkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comp105202323541916`
--
ALTER TABLE `comp105202323541916`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comp106202301020271`
--
ALTER TABLE `comp106202301020271`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comp109202313132310`
--
ALTER TABLE `comp109202313132310`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobcard_client`
--
ALTER TABLE `jobcard_client`
  MODIFY `client_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `query_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_candidate`
--
ALTER TABLE `users_candidate`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

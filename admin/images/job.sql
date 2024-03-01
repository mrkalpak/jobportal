-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 07:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin`, `admin_email`, `admin_password`) VALUES
('admin 1', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `admin_jobpost`
--

CREATE TABLE `admin_jobpost` (
  `id` int(11) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `jobTitle` varchar(100) NOT NULL,
  `jobType` varchar(100) NOT NULL,
  `shift` varchar(20) DEFAULT NULL,
  `workingFrom` varchar(100) NOT NULL,
  `compensation` varchar(100) NOT NULL,
  `minSalary` int(100) NOT NULL,
  `maxSalary` int(100) NOT NULL,
  `minEducation` varchar(100) NOT NULL,
  `minExp` int(20) NOT NULL,
  `maxExp` int(20) NOT NULL,
  `vacancy` int(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `responsibility` text NOT NULL,
  `requirement` text NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `applyTill` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `applydate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appliedjobs`
--

INSERT INTO `appliedjobs` (`applyid`, `jobid`, `username`, `companyusername`, `action`, `applydate`) VALUES
(1, 1, 'user02272024193834', 'comp0227202419473319', 0, '2024-02-27 19:08:55'),
(2, 1, 'user02272024203516', 'comp0227202419473319', 0, '2024-02-27 19:39:05'),
(3, 2, 'user02272024203516', 'comp0227202421360190', 0, '2024-02-27 20:46:54'),
(4, 1, 'user02282024230344', 'comp0228202422573814', 1, '2024-02-28 22:05:40');

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
  `blog_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `bookmarkid` int(11) NOT NULL,
  `jobid` int(52) NOT NULL,
  `username` varchar(50) NOT NULL,
  `companyusername` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cardcandidate`
--

CREATE TABLE `cardcandidate` (
  `id` int(11) NOT NULL,
  `jobId` int(11) NOT NULL,
  `candiatename` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `location` varchar(200) NOT NULL,
  `c_no` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cu-job-place` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `qualification` varchar(150) NOT NULL,
  `linkedIn` varchar(200) DEFAULT NULL,
  `exprience` int(15) NOT NULL,
  `describeYourself` text NOT NULL,
  `cardCandidateResume` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(100) NOT NULL,
  `category` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(1, 'PHP DEVELOPER'),
(2, 'Software Engineer'),
(3, 'Architect'),
(4, 'Designer'),
(5, 'Java Developer'),
(6, 'Laravel Developer'),
(7, 'Jr Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(100) NOT NULL,
  `blog_id` int(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `person_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comp0228202422573814`
--

CREATE TABLE `comp0228202422573814` (
  `stud_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `jobid` int(250) DEFAULT NULL,
  `usertype` int(10) NOT NULL COMMENT 'applid ==0 or referral==1',
  `card` tinyint(1) NOT NULL,
  `action` tinyint(1) NOT NULL DEFAULT 0 COMMENT '(0  pending) (1 accept) '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comp0228202422573814`
--

INSERT INTO `comp0228202422573814` (`stud_id`, `username`, `jobid`, `usertype`, `card`, `action`) VALUES
(1, 'user02282024230344', 1, 0, 0, 1),
(2, 'user02282024230344', NULL, 1, 0, 0);

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
  `coins` int(255) NOT NULL,
  `companytype` varchar(100) NOT NULL,
  `companysize` int(100) DEFAULT NULL,
  `companylogo` varchar(250) NOT NULL,
  `location` varchar(100) NOT NULL,
  `websitelink` varchar(250) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `linkedin` varchar(250) DEFAULT NULL,
  `mobile` bigint(255) NOT NULL,
  `alternatemobile` bigint(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'pending=0)\r\n(active=1)\r\n(rejected=2)',
  `company_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `token` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`username`, `name`, `email`, `password`, `cin`, `gst`, `pancard`, `gstcertificate`, `coins`, `companytype`, `companysize`, `companylogo`, `location`, `websitelink`, `facebook`, `linkedin`, `mobile`, `alternatemobile`, `active`, `company_date`, `token`) VALUES
('comp0228202422573814', 'Agicent', 'nihal5930@gmail.com', '$2y$10$4xNNecDUO4yd380bkre6y.Xx9t7TrB80FibanChkni1zJp/6ckIIG', '4455662211', '775599664488', 'new Jobfair task02262024191645 (1)02282024225738.pdf', 'new Jobfair task02262024191645 (1)02282024225738.pdf', 3021, 'Software Company', 50, 'tran02282024225828.jpeg', 'wagholi', 'https://agicent.com', '', '', 7766558899, 8899665544, 1, '2024-02-28 21:57:38', '0');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(110) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_category` varchar(100) NOT NULL,
  `image_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jobcards`
--

CREATE TABLE `jobcards` (
  `card_id` varchar(50) NOT NULL,
  `client_name` varchar(250) NOT NULL,
  `prefix` varchar(50) NOT NULL,
  `card_active` int(10) NOT NULL DEFAULT 0 COMMENT '\r\npending=0\r\nactive=1\r\nexpire=2\r\n',
  `card_sdate` date DEFAULT NULL,
  `card_edate` date DEFAULT NULL,
  `expire_months` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jobcard_client`
--

CREATE TABLE `jobcard_client` (
  `jobcard_client_name` varchar(250) NOT NULL,
  `client_phone` bigint(255) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `client_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `description` text NOT NULL,
  `responsibility` text NOT NULL,
  `requirements` text NOT NULL,
  `active` int(50) NOT NULL COMMENT '\r\n(==0 admin pending )\r\n(==1 accept admin active)\r\n(==2 expired )',
  `sdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`username`, `jobid`, `compname`, `jobtitle`, `category`, `deadline`, `location2`, `typeofjob`, `location`, `banner`, `paytype`, `minsalary`, `maxsalary`, `education`, `minyr`, `maxyr`, `vacancy`, `gender`, `description`, `responsibility`, `requirements`, `active`, `sdate`) VALUES
('comp0228202422573814', 1, 'Agicent', 'php Developer', 'PHP DEVELOPER', '2024-03-14', 'wagholi', 'Full Time', 'Work from office', 'about02282024230152.webp', 'Fixed only', 40000, 60000, 'bachelor_degree', 3, 5, 5, 'Both', 'xsdcfvgbhnj', 'cftvgybhnj', 'vgbhnjkml', 1, '2024-02-28 22:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `job_fair`
--

CREATE TABLE `job_fair` (
  `id` int(11) NOT NULL,
  `fairName` varchar(100) NOT NULL,
  `fairDate` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `fair_Organizer` varchar(200) NOT NULL,
  `fileName` varchar(200) NOT NULL,
  `fairTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_faircandidate`
--

CREATE TABLE `job_faircandidate` (
  `id` int(20) NOT NULL,
  `fairId` int(20) NOT NULL,
  `candidateName` varchar(100) NOT NULL,
  `candidatePhone` varchar(20) NOT NULL,
  `candiateLocation` varchar(200) NOT NULL,
  `candidateEmail` varchar(100) NOT NULL,
  `candidateCurrentJobLocation` varchar(20) NOT NULL,
  `candidateDesignation` varchar(20) NOT NULL,
  `exp` int(20) NOT NULL,
  `jobType` varchar(20) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `discription` text NOT NULL,
  `candidateResume` varchar(200) NOT NULL,
  `linkedInProfile` text NOT NULL,
  `candidateDOB` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `link` varchar(250) NOT NULL,
  `media_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `username` varchar(250) NOT NULL,
  `razorpay_payment_id` text DEFAULT NULL,
  `transaction_Id` text DEFAULT NULL,
  `verifySignature` text NOT NULL,
  `amount` int(250) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `sdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `edate` date NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`username`, `razorpay_payment_id`, `transaction_Id`, `verifySignature`, `amount`, `active`, `sdate`, `edate`, `status`) VALUES
('comp0228202422573814', 'pay_NgSfketKVa93fL', '73ef91a03446650a7badea920384088c', '', 5, 1, '2024-02-28 22:17:18', '2024-03-29', 1),
('comp0228202422573814', 'pay_NgaTBznieKgckK', 'b48209ba7b65c9f6d751bb213c124530', '', 4, 1, '2024-02-29 05:54:51', '2024-03-30', 1),
('comp0228202422573814', 'pay_Ngaeo66KwmPRQS', '4efceef7127d6acbef22155c8b105145', '', 5, 1, '2024-02-29 06:06:01', '2024-03-30', 1),
('comp0228202422573814', 'pay_NgagBFtg487qUM', '0c71cf0da1c595fcc67ae862c712ea6a', '', 5, 1, '2024-02-29 06:07:21', '2024-03-30', 1),
('comp0228202422573814', NULL, '932ee6a9f7b3e3ecf93491a3255acc12', '', 6, 1, '2024-02-29 07:21:14', '2024-03-30', 0),
('comp0228202422573814', 'pay_Ngeq9wiPNIFdMP', 'order_NgepzM8vqBEopZ', '', 26, 1, '2024-02-29 10:11:32', '2024-03-30', 1),
('comp0228202422573814', NULL, 'order_NgewV9oeLbWKSw', '', 59, 1, '2024-02-29 10:17:42', '2024-03-30', 0),
('comp0228202422573814', NULL, 'order_Ngf4KmMrX3MTVe', '', 10, 1, '2024-02-29 10:25:06', '2024-03-30', 0),
('comp0228202422573814', 'pay_Ngf9jITryNyqIO', 'order_Ngf9a0eLNN2G0j', 'baef0818c7f91f5d28d4a8b07e0a3f5fca40edc03c01aeb5c51262e37aef2fd7', 10, 1, '2024-02-29 10:30:04', '2024-03-30', 1),
('comp0228202422573814', 'pay_NgfbDSyb3Bl2Ug', 'order_Ngfb4ywthflhlt', 'c09eead65017d38f008dc9257f7e559ea34a14711926d8bccb2b689216ce54ba', 500, 1, '2024-02-29 10:56:06', '2024-03-30', 1),
('comp0228202422573814', 'pay_NgfyEzmTktoYHk', 'order_Ngfy6HksWLGH5y', '569dd2d598d50358d5b1da70528c822942bd44281b79dc5c606261d29a11db28', 500, 1, '2024-02-29 11:17:54', '2024-03-30', 1),
('comp0228202422573814', 'pay_Ngg96UA4PPlbCS', 'order_Ngg8aJYBrWZ3zD', 'ffeca03882e7400cd296b801551c997353e9e8298896ee8e9e9c90f3779a0c7a', 66, 1, '2024-02-29 11:27:50', '2024-03-30', 1),
('comp0228202422573814', NULL, 'order_NggiPkhZsrQ9S3', '', 300, 1, '2024-02-29 12:01:45', '2024-03-30', 0),
('comp0228202422573814', 'pay_Nggl8Oi1G62kLT', 'order_Nggky8anGmlxsZ', 'cd3a687e0e77dca91ead6fca1694b947692f421d2019d6210235f488b618a8f8', 300, 1, '2024-02-29 12:04:10', '2024-03-30', 1),
('comp0228202422573814', NULL, 'order_Nggra7AocvKUHf', '', 300, 1, '2024-02-29 12:10:25', '2024-03-30', 0),
('comp0228202422573814', 'pay_NggshDUmJNCWmU', 'order_NggsYkgBNM2G4v', 'b585bd764745a5d067d2a20ae7ab11c9f6ef3072f50f37a05541fd46507ca88f', 300, 1, '2024-02-29 12:11:21', '2024-03-30', 1),
('comp0228202422573814', NULL, 'order_NggyBPONK2mXeJ', '', 300, 1, '2024-02-29 12:16:40', '2024-03-30', 0),
('comp0228202422573814', 'pay_Ngh8MU7hWFkyk1', 'order_Ngh8EHtZzL726B', 'e89a666de1b188abf390136b033c4dac72655ffaba0a711d8396d7081b4c9cf3', 300, 1, '2024-02-29 12:26:11', '2024-03-30', 1),
('comp0228202422573814', 'pay_NghQDd0CNNDcYk', 'order_NghQ5zFDjiduaj', '124f1a191e3acb29b8048c8d2a376a0f6610c39db6521b5deffeb361689c2be7', 300, 1, '2024-02-29 12:43:06', '2024-03-30', 1),
('comp0228202422573814', NULL, 'order_NghZGLVEipNAmd', '', 300, 1, '2024-02-29 12:51:47', '2024-03-30', 0),
('comp0228202422573814', 'pay_NghaNId9xN72uf', 'order_NghaFvFVVK8ChF', '1cf11d304b5bdd000c4be7aa251493efb272f4381ec425562d7ba248b6d84dc1', 300, 1, '2024-02-29 12:52:43', '2024-03-30', 1),
('comp0228202422573814', NULL, 'order_NghbgVF98EJ3o1', '', 300, 1, '2024-02-29 12:54:04', '2024-03-30', 0),
('comp0228202422573814', NULL, 'order_NghjOUNjVzo4kx', '', 300, 1, '2024-02-29 13:01:22', '2024-03-30', 0),
('comp0228202422573814', NULL, 'order_Nghq7OQxi5d9IL', '', 300, 1, '2024-02-29 13:07:44', '2024-03-30', 0),
('comp0228202422573814', NULL, 'order_NgiR9okJ6xBbJ5', '', 300, 1, '2024-02-29 13:42:48', '2024-03-30', 0),
('comp0228202422573814', 'pay_NgiSubNjkET8RY', 'order_NgiSlurB64q9Vo', '8cb726cb7ec0aa67002482fbc662f7ef74aff9466ba63bfac3b47149309d6c47', 300, 1, '2024-02-29 13:44:19', '2024-03-30', 1),
('comp0228202422573814', 'pay_NgiUDivMyRgCHM', 'order_NgiTu4y5eEZMiK', '399435cf32949b1e1345094511bdb68778029ab0eec477c9eca1782ea9b6e746', 300, 1, '2024-02-29 13:45:24', '2024-03-30', 1),
('comp0228202422573814', 'pay_NgiYEdrDwxNF9M', 'order_NgiY7USn5vS8Ay', 'd8ff189e50139178e983e58837128a264de424da9b8ad003e639eacd2a2a1af2', 300, 1, '2024-02-29 13:49:23', '2024-03-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `query_id` int(50) NOT NULL,
  `q_name` varchar(100) NOT NULL,
  `q_email` varchar(100) NOT NULL,
  `q_number` bigint(255) NOT NULL,
  `message` varchar(200) NOT NULL,
  `q_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `id` int(11) NOT NULL,
  `company_id` varchar(100) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `transaction_id` varchar(200) NOT NULL,
  `last_balance` float NOT NULL,
  `current_balance` float NOT NULL,
  `transaction_time` datetime NOT NULL,
  `response` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `purpose` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`id`, `company_id`, `user_id`, `transaction_id`, `last_balance`, `current_balance`, `transaction_time`, `response`, `date`, `purpose`) VALUES
(1, 'comp0228202422573814', NULL, 'f854a4bdaabe66485a398125ecef83a7', 600, 550, '2024-02-28 23:01:52', 'Success', '2024-02-28', 'Job Post'),
(2, 'comp0228202422573814', 'user02282024230344', '38d78ff7a829fa30c56005fddf9c2a18', 550, 548, '2024-02-28 23:06:27', 'Success', '2024-02-28', 'viewInfo');

-- --------------------------------------------------------

--
-- Table structure for table `users_candidate`
--

CREATE TABLE `users_candidate` (
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` date DEFAULT NULL,
  `location` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `currentjob` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `category` varchar(250) NOT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `experience_level` int(50) DEFAULT NULL,
  `resume` varchar(200) NOT NULL,
  `description` varchar(250) NOT NULL,
  `cardtype` int(11) NOT NULL DEFAULT 0 COMMENT '0 normal)\r\n(1= card type)',
  `student_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `expire_date` date DEFAULT NULL,
  `srno` int(11) NOT NULL,
  `token` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_candidate`
--

INSERT INTO `users_candidate` (`name`, `username`, `password`, `age`, `location`, `email`, `phone`, `currentjob`, `designation`, `qualification`, `category`, `linkedin`, `experience_level`, `resume`, `description`, `cardtype`, `student_date`, `expire_date`, `srno`, `token`) VALUES
('vikas sahu', 'user02282024230344', '$2y$10$rgtm.u.bNsCZ2tN5nFGPq.KolwZTAP9psTIIXVhRJb5O7rReRupSm', '2000-07-17', 'wagholi', 'vikas@gmail.com', 7000630640, 'pune', 'PHP Developer', 'BCA', 'PHP DEVELOPER', '', 5, 'new Jobfair task02262024191645 (1)02282024231620.pdf', 'szxdfcgvbhj ctfgvbhkjl rfyvgthkj', 0, '2024-02-28 22:03:44', NULL, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(100) NOT NULL,
  `video_name` varchar(100) NOT NULL,
  `video_category` varchar(100) NOT NULL,
  `video_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_email`);

--
-- Indexes for table `admin_jobpost`
--
ALTER TABLE `admin_jobpost`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `cardcandidate`
--
ALTER TABLE `cardcandidate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `c_no` (`c_no`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `linkedIn` (`linkedIn`);

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
-- Indexes for table `comp0228202422573814`
--
ALTER TABLE `comp0228202422573814`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `cin` (`cin`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `gst` (`gst`),
  ADD UNIQUE KEY `websitelink` (`websitelink`),
  ADD UNIQUE KEY `mobile` (`mobile`);
ALTER TABLE `company` ADD FULLTEXT KEY `linkedin` (`linkedin`);

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
-- Indexes for table `job_fair`
--
ALTER TABLE `job_fair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_faircandidate`
--
ALTER TABLE `job_faircandidate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `candidateEmail` (`candidateEmail`),
  ADD UNIQUE KEY `candidatePhone` (`candidatePhone`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `users_candidate`
--
ALTER TABLE `users_candidate`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `srno` (`srno`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_jobpost`
--
ALTER TABLE `admin_jobpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appliedjobs`
--
ALTER TABLE `appliedjobs`
  MODIFY `applyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `bookmarkid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cardcandidate`
--
ALTER TABLE `cardcandidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comp0228202422573814`
--
ALTER TABLE `comp0228202422573814`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(110) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobcard_client`
--
ALTER TABLE `jobcard_client`
  MODIFY `client_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_fair`
--
ALTER TABLE `job_fair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_faircandidate`
--
ALTER TABLE `job_faircandidate`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `query_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_candidate`
--
ALTER TABLE `users_candidate`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

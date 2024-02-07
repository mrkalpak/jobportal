-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 12:41 PM
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
  `applydate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appliedjobs`
--

INSERT INTO `appliedjobs` (`applyid`, `jobid`, `username`, `companyusername`, `action`, `applydate`) VALUES
(1, 1, 'user01292024095526', 'comp0129202410353616', 1, '2024-01-29 11:24:48');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 1, 'user01292024095526', 'comp0129202410353616');

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
(1, 'Software Deloper'),
(2, 'backend devloper'),
(3, 'ai expert');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comp0129202410353616`
--

CREATE TABLE `comp0129202410353616` (
  `stud_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `jobid` int(250) DEFAULT NULL,
  `usertype` int(10) NOT NULL COMMENT 'applid ==0 or referral==1',
  `card` tinyint(1) NOT NULL,
  `action` tinyint(1) NOT NULL DEFAULT 0 COMMENT '(0  pending) (1 accept) '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comp0129202410353616`
--

INSERT INTO `comp0129202410353616` (`stud_id`, `username`, `jobid`, `usertype`, `card`, `action`) VALUES
(1, 'user01292024095526', 1, 0, 0, 1),
(30, 'user01292024161344', NULL, 1, 0, 0);

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
  `linkedin` varchar(250) NOT NULL,
  `mobile` bigint(255) NOT NULL,
  `alternatemobile` bigint(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'pending=0)\r\n(active=1)\r\n(rejected=2)',
  `company_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `token` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`username`, `name`, `email`, `password`, `cin`, `gst`, `pancard`, `gstcertificate`, `coins`, `companytype`, `companysize`, `companylogo`, `location`, `websitelink`, `facebook`, `linkedin`, `mobile`, `alternatemobile`, `active`, `company_date`, `token`) VALUES
('comp0129202410353616', 'comp12', 'comp1@gmail.com', '$2y$10$elj5p99B.74ICrxxsw1rkuKQvQ8XE3tgicqK.I.KguiqwM7/ooPDe', '123', '33444', 'Aadhaar Card Verification and FAQs -202401292024103536.pdf', 'shreenath_usA01292024103536.pdf', 492, 'Digital Marketing Agency', 100, '01292024120019.', 'pune12', 'ebsite Link', 'ebook', '', 9655444, 9656565, 1, '2024-01-29 09:35:36', '0');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(110) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_category` varchar(100) NOT NULL,
  `image_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `sdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`username`, `jobid`, `compname`, `jobtitle`, `category`, `deadline`, `location2`, `typeofjob`, `location`, `banner`, `paytype`, `minsalary`, `maxsalary`, `education`, `minyr`, `maxyr`, `vacancy`, `gender`, `description`, `responsibility`, `requirements`, `active`, `sdate`) VALUES
('comp0129202410353616', 1, 'comp12', 'soft ware', 'Software Deloper', '2024-01-23', 'pune', 'Full Time', 'Work from office', 'SGCAM_20240120_17030944801292024122132.jpg', 'Fixed only', 12, 3, '12th', 1, 3432, 12, 'Female', 'Job Description', 'Job Responsibility:', 'Additional Requirements:', 1, '2024-01-29 11:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `link` varchar(250) NOT NULL,
  `media_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `username` varchar(250) NOT NULL,
  `amount` int(250) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `sdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `edate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_candidate`
--

INSERT INTO `users_candidate` (`name`, `username`, `password`, `age`, `location`, `email`, `phone`, `currentjob`, `designation`, `qualification`, `category`, `linkedin`, `experience_level`, `resume`, `description`, `cardtype`, `student_date`, `expire_date`, `srno`, `token`) VALUES
('shree', 'user01292024095526', '$2y$10$EzcpyKrAcT6kPQ8PEPXTneNtHZEvjAyoOA3lUSwwa.7keJXAR7rbG', '2024-01-29', 'pune', 'shree@gmail.com', 8757865, '', '', 'B.Tech', 'Software Deloper', NULL, 3, 'shreenath_usA01292024102202.pdf', 'Description Yourself', 0, '2024-01-29 08:55:26', NULL, 1, '0'),
('stud i', 'user01292024161344', '$2y$10$6yLY/XO7dCbiKs7tBdFjyO/K6lvXxegnDm9amtGlUW4M2Sym.twxO', '2024-01-17', 'mumbai', 'stud1@gmail.com', 123456, 'nop', 'op', '10th', 'ai expert', 'lk1', 0, 'shreenath_usA01292024173515.pdf', 'des', 0, '2024-01-29 15:13:45', NULL, 2, '0'),
('kaxsghul', 'user01292024174520', '$2y$10$y0vnPQEq/Ew23CYi/4q9DOmgthzc2PE2e1L5uFO0M22h.gVk9ezza', '2024-01-25', 'nagpur', 'stud2@gmail.com', 35474, 'mum', 'tt', 'MBBS', 'backend devloper', NULL, 5, 'Shreenath_Resume_202301292024174556.pdf', 'Description Yourself', 0, '2024-01-29 16:45:20', NULL, 3, '0'),
('student five', 'user01292024174658', '$2y$10$rYD/1qkJd4AUwNP8unMhIeh.NpawMz5XPvneL7K3/ple00cJCvT4W', '2024-01-16', 'pune', 'stud5@gmail.com', 456786, 'pp', 'tfghj', 'BAMS', 'backend devloper', NULL, 23, 'Shreenath_Resume_202301292024174731.pdf', 'escription Yourself', 0, '2024-01-29 16:46:58', NULL, 4, '0');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(100) NOT NULL,
  `video_name` varchar(100) NOT NULL,
  `video_category` varchar(100) NOT NULL,
  `video_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `comp0129202410353616`
--
ALTER TABLE `comp0129202410353616`
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
  MODIFY `applyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `bookmarkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comp0129202410353616`
--
ALTER TABLE `comp0129202410353616`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
-- AUTO_INCREMENT for table `users_candidate`
--
ALTER TABLE `users_candidate`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(100) NOT NULL AUTO_INCREMENT;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `jobcard_status to 2` ON SCHEDULE EVERY 1 MINUTE STARTS '2023-10-16 23:55:32' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE jobcards
SET card_active = 2
WHERE card_edate < CURDATE()$$

CREATE DEFINER=`root`@`localhost` EVENT `user_candidate card update to 0` ON SCHEDULE EVERY 1 DAY STARTS '2023-10-16 23:55:55' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE users_candidate SET cardtype = 0 WHERE expire_date < CURDATE()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

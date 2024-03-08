-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 08, 2024 at 11:00 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

DROP TABLE IF EXISTS `applicants`;
CREATE TABLE IF NOT EXISTS `applicants` (
  `applicant_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `resume_link` varchar(1000) DEFAULT NULL,
  `image_URL` varchar(1000) NOT NULL,
  PRIMARY KEY (`applicant_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`applicant_id`, `full_name`, `email`, `password`, `resume_link`, `image_URL`) VALUES
(1, 'John Doe', 'john.doe@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'resume_link_1', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1.jpg'),
(2, 'Jane Smith', 'jane.smith@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'resume_link_2', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/10.jpg'),
(3, 'Bob Johnson', 'bob.johnson@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'resume_link_3', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/100.jpg'),
(4, 'Alice Brown', 'alice.brown@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'resume_link_4', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1000.jpg'),
(5, 'Charlie Davis', 'charlie.davis@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'resume_link_5', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1001.jpg'),
(6, 'Eva White', 'eva.white@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'resume_link_6', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1002.jpg'),
(7, 'Greg Taylor', 'greg.taylor@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'resume_link_7', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1003.jpg'),
(8, 'Hannah Lee', 'hannah.lee@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'resume_link_8', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1004.jpg'),
(9, 'Isaac Martin', 'isaac.martin@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'resume_link_9', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1006.jpg'),
(10, 'Karen Miller', 'karen.miller@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'resume_link_10', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1007.jpg'),
(14, 'Yash Modi', 'ym@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'sjdhsd', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1063.jpg'),
(15, 'Riya Patel', 'rp@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'jszgdsjd', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1096.jpg'),
(16, 'Milin Vaniyawala', 'mv@gm.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'shdjsd', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1068.jpg'),
(17, 'Kyle Scott', 'kt@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1095.jpg'),
(18, 'Sean Doyle', 'sn@gmaill.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'inc/uploads/Yash Modi-2024.docx ', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1008.jpg'),
(19, 'Deep Patel', 'dp@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'inc/uploads/yashmodi-pt.pdf ', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1055.jpg'),
(20, 'shrey patel', 'sp@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'inc/uploads/yashmodi-pt.pdf', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1020.jpg'),
(21, 'Adam Thomas', 'dummy@gmail.copm', '5f4dcc3b5aa765d61d8327deb882cf99', 'inc/uploads/Fake Resume.pdf', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1027.jpg'),
(22, 'dev naik', 'dev@gm.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin/inc/uploads/yashmodi-pt.pdf', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1088.jpg'),
(23, 'Kyle Scott', 'ks@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin/inc/uploads/Yash_Modi_ (2).pdf', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1018.jpg'),
(24, 'Vaibhav patel', 'vp@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin/inc/uploads/Yash_Modi_ (2).pdf', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1078.jpg'),
(25, 'Jill Doe', 'JD@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin/inc/uploads/Yash_Modi_ (2).pdf', 'https://cloudflare-ipfs.com/ipfs/Qmd3W5DuhgHirLHGVixi6V76LhCkZUz6pnFt5AJBiyvHye/avatar/1025.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `application_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`application_id`),
  KEY `job_id` (`job_id`),
  KEY `applicant_id` (`applicant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`application_id`, `job_id`, `applicant_id`, `application_date`, `status`) VALUES
(1, 1, 1, '2023-02-16 14:30:00', 'applied'),
(2, 2, 2, '2023-02-15 20:00:00', 'in-review'),
(3, 3, 3, '2023-02-14 17:30:00', 'accepted'),
(4, 4, 4, '2023-02-13 22:45:00', 'applied'),
(5, 5, 5, '2023-02-12 19:20:00', 'in-review'),
(6, 6, 6, '2023-02-11 16:10:00', 'accepted'),
(7, 7, 7, '2023-02-10 21:30:00', 'applied'),
(8, 8, 8, '2023-02-09 18:15:00', 'in-review'),
(9, 9, 9, '2023-02-08 23:00:00', 'accepted'),
(10, 10, 10, '2023-02-07 15:30:00', 'applied'),
(11, 3, 1, '2023-01-15 05:00:00', 'applied'),
(12, 1, 2, '2023-01-16 05:00:00', 'in-review'),
(13, 2, 3, '2023-01-17 05:00:00', 'accepted'),
(14, 2, 4, '2023-01-18 05:00:00', 'rejected'),
(15, 3, 5, '2023-01-19 05:00:00', 'applied'),
(16, 3, 6, '2023-01-20 05:00:00', 'in-review'),
(17, 4, 7, '2023-01-21 05:00:00', 'accepted'),
(18, 4, 8, '2023-01-22 05:00:00', 'rejected'),
(19, 5, 9, '2023-01-23 05:00:00', 'applied'),
(20, 5, 10, '2023-01-24 05:00:00', 'in-review'),
(21, 4, 16, '2024-02-24 21:37:10', 'applied'),
(22, 10, 15, '2024-02-24 22:13:23', 'applied'),
(23, 11, 14, '2024-02-25 23:00:49', 'applied'),
(24, 1, 17, '2024-02-26 21:24:24', 'applied'),
(25, 10, 18, '2024-02-26 22:35:48', 'applied');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `company` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `posted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`job_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `title`, `description`, `company`, `location`, `salary`, `posted_at`) VALUES
(1, 'Software Developer', 'Developing and maintaining software applications', 'Tech Solutions', 'City A', '80000.00', '2023-02-16 14:00:00'),
(2, 'Marketing Coordinator', 'Assisting in executing marketing strategies', 'Digital Marketing Inc.', 'City B', '60000.00', '2023-02-15 19:30:00'),
(3, 'Data Scientist', 'Analyzing and interpreting large datasets', 'Data Analytics Corp.', 'City C', '90000.00', '2023-02-14 16:45:00'),
(4, 'Project Manager', 'Leading and managing project teams', 'Project Management Solutions', 'City D', '95000.00', '2023-02-13 21:20:00'),
(5, 'Graphic Designer', 'Creating visually appealing designs', 'Creative Designs Studio', 'City E', '55000.00', '2023-02-12 18:10:00'),
(6, 'Financial Analyst', 'Analyzing financial data and trends', 'Finance Experts Ltd.', 'City F', '85000.00', '2023-02-11 15:30:00'),
(7, 'Customer Support Representative', 'Providing assistance to customers', 'Support Solutions Inc.', 'City G', '50000.00', '2023-02-10 20:15:00'),
(8, 'Sales Executive', 'Selling products and services', 'Sales Dynamics Ltd.', 'City H', '70000.00', '2023-02-09 17:45:00'),
(9, 'HR Specialist', 'Managing human resources functions', 'HR Solutions Group', 'City I', '75000.00', '2023-02-08 22:00:00'),
(10, 'Content Writer', 'Creating engaging and informative content', 'Content Creators Co.', 'City J', '60000.00', '2023-02-07 14:30:00'),
(11, 'Web Developer', 'web dev desc', 'shdj', 'jdsjf', '200000.00', '2024-02-24 05:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

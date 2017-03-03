-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2017 at 10:38 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `teacher_personal_page`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE IF NOT EXISTS `attachment` (
  `t_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `file_name` int(11) NOT NULL,
  `file_path` text NOT NULL,
  PRIMARY KEY (`t_id`,`c_id`,`file_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `t_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`t_id`,`c_id`,`day`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_test`
--

CREATE TABLE IF NOT EXISTS `class_test` (
  `t_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`t_id`,`date`,`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `title` varchar(20) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `year` int(11) NOT NULL,
  `miscellaneous` text NOT NULL,
  `miscellaneous_link` text NOT NULL,
  `inst_link` text NOT NULL,
  `institution` text NOT NULL,
  `t_id` int(11) NOT NULL,
  PRIMARY KEY (`e_id`),
  KEY `t_id` (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`e_id`, `title`, `year`, `miscellaneous`, `miscellaneous_link`, `inst_link`, `institution`, `t_id`) VALUES
(1, 'Master of Science in Computer Science', 2012, 'Department of Mathematics, Statistics and Computer Science', '', '', 'St. Francis Xavier University, Antigonish, NS, Canada.', 3),
(2, 'Bachelor of Science in Computer Science and Engineering', 2007, 'Department of Computer Science and Engineering', '', '', 'Khulna University, Khulna, Bangladesh.', 3),
(3, 'Higher Secondary Certificate (HSC)', 2001, 'Group : Science.', '', '', 'Jhenidah Cadet College, Jhenidah, Bangladesh.', 3),
(4, 'Secondary School Certificate (SSC)', 1999, 'Group : Science.', '', '', 'Jhenidah Cadet College, Jhenidah, Bangladesh.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE IF NOT EXISTS `publication` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` int(11) NOT NULL,
  `info` text NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `t_id` (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`p_id`, `t_id`, `info`, `link`) VALUES
(1, 3, 'MS Thesis: A tableau-based workflow verification framework for Computation Tree Logic (CTL)Supervisor: Dr. Wendy MacCaull', ''),
(2, 3, 'B.Sc. Thesis: A new matchmaking algorithm for resource discovery on grid. Supervisor: Dr. Rafiqul Islam', ''),
(3, 3, 'Md. Zahidul Islam, Ahemd Shah Mashiyat, Kashif Nizam Khan and SM Masud Karim,"A Tableau Based Automated Theorem Prover Using High Performance Computing", in International Journal of Computers, Volume 7, Number 3, March 2012, pp. 597-607, Academy Publisher, Oulu, Finland.', ''),
(4, 3, 'Md. Rafiqul Islam, Md. Zahidul Islam and Nazia Leyla, "A tree based approach to matchmaking algorithms for Resource Discovery", in International Journal of Network Management, Volume 18, Issue 5, pp. 427-436, September/October 2008, Wiley Publishers, Print ISSN: 1055-7148, DOI:10.1002/nem.686.', ''),
(5, 3, 'Md. Zahidul Islam and Amit Kumar Mondal,"Towards a Standard Bangla PhotoOCR: Text Detection and Localization", in Proceedings of 17th International Conference on Computer and Information Technology (ICCIT), 22-23 December, 2014, Dhaka, Bangladesh, pp.198-203.', ''),
(6, 3, 'Md. Zahidul Islam and Wendy MacCaull,"A One-Pass Tableau-Based Workflow Verification Framework", in The Third Workshop on Practical Aspects of Automated Reasoning (PAAR-12), associated with the 6th International Joint Conference on Automated Reasoning (IJCAR-2012), Manchester, UK', ''),
(7, 3, 'Md. Zahidul Islam, Ahemd Shah Mashiyat, Kashif Nizam Khan and SM Masud Karim,"Towards A Tableau Based High Performance Automated Theorem Prover", in proceedings of The 14th International Conference on Computer and Information Technology (ICCIT 2010), Dhaka, Bangladesh.', ''),
(8, 3, 'Md. Rafiqul Islam, Md. Zahidul Islam and Nazia Leyla,"A Matchmaking Algorithm for Resource Discovery on Grid", in proceedings of The International Conference on Information and Communication Technology, 7-9 March, 2007, Dhaka, Bangladesh, pp.193-196.', ''),
(9, 3, 'Kashif Nizam Khan, Md. Zahidul Islam, Jinat Rehana and Md. Saidur Rahman,"Development of a Bangla Speech Driven Application", in proceedings of The International Conference on Computer and Information Technology, 28-30 December, Islamic University of Technology, Gazipur-1704, Bangladesh, pp.1015-1020.', '');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE IF NOT EXISTS `research` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` int(11) NOT NULL,
  `interest` varchar(100) NOT NULL,
  PRIMARY KEY (`r_id`),
  KEY `t_id` (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`r_id`, `t_id`, `interest`) VALUES
(1, 3, 'Machine Learning'),
(2, 3, 'Computer Vision'),
(3, 3, 'Formal Verification and Model Checking'),
(4, 3, 'High Performance Computing'),
(5, 3, 'Artificial Intelligence');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `designation` varchar(20) NOT NULL,
  `phone` int(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`t_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `name`, `email`, `photo`, `about`, `designation`, `phone`, `password`, `last_login`) VALUES
(1, 'sumit', 'sumit@gamil.com', '', '', '', 0, '4f6ff51f541e12e548fe01318f01d382', '2017-02-27 04:48:41'),
(2, 'mishuk', 'mishuk@gmail.com', '', '', '', 0, 'f474dff115cd4be8dad153b0d5702ad2', '2017-02-27 05:01:46'),
(3, 'Md. Zahidul Islam', '', 'zahid.png', 'I am Md. Zahidul Islam. I am working as an assistant professor of Computer Science and Engineering discipline at Khulna University.\n<br><br>\nI have completed an MS in Computer Science from the Department of Mathematics, Statistics and Computer Science of St. Francis Xavier University, NS, Canada. I have completed my B.Sc. in Computer Science and Engineering from Khulna University, Bangladesh.\n<br><br>\nDuring my MS study, I worked as a research assistant at Centre for Logic and Information under the supervision of Dr. Wendy MacCull. As a part of my research I developed a One-Pass Tableau based model checker to verify CTL properties of healthcare workflow models.\n<br><br>\nMy areas of interest include <code>Machine Learning</code>,<code>Computer Vision</code>,<code>Formal Verification</code>,<code>Model Checking</code>,<code>High Performance Computing</code> and <code>Artificial Intelligence</code>.', 'Assistant Professor', 0, '18b2d8ac9b09455f4aa614aac0505cda', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

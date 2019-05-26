-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 25, 2019 at 12:02 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lastexercise`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `entryID` int(11) NOT NULL,
  `content` varchar(250) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`commentID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `entryID`, `content`, `createdBy`, `createdAt`) VALUES
(1, 28, 'AdminTestComment', 1, '2019-05-23 20:21:11'),
(14, 32, 'qqqd', 5, '2019-05-24 18:51:25'),
(15, 33, 'Qwarick12312', 5, '2019-05-25 14:00:50'),
(5, 28, 'Testtest', 5, '2019-05-24 01:24:17'),
(6, 28, 'MYIIIKETEP', 5, '2019-05-24 01:24:56'),
(7, 28, 'qqq', 5, '2019-05-24 01:25:39'),
(8, 28, 'POSTS', 5, '2019-05-24 01:28:41'),
(16, 33, 'MYIIIKETEP test', 19, '2019-05-25 14:01:19'),
(10, 28, 'tryNewSetup33', 5, '2019-05-24 02:23:28'),
(11, 3, '2323', 5, '2019-05-24 02:21:51'),
(12, 3, 'TestCommentByThisUser222', 5, '2019-05-24 02:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

DROP TABLE IF EXISTS `entries`;
CREATE TABLE IF NOT EXISTS `entries` (
  `entryID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`entryID`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`entryID`, `title`, `content`, `createdBy`, `createdAt`) VALUES
(1, 'ChangedTitle', 'ChangedContent', 1, '2019-05-19 16:37:11'),
(26, 'AuthTest', 'AuthTest', 1, '2019-05-23 00:00:00'),
(5, 'test3', 'test3Content', 4, '2019-05-22 00:00:00'),
(7, '5', '222sa', 0, '2019-05-22 00:00:00'),
(33, 'Qwarick1', 'q1', 5, '2019-05-24 00:00:00'),
(34, 'Qwarick2', 'q2', 5, '2019-05-24 00:00:00'),
(35, 'Qwarick3', 'q3', 5, '2019-05-24 00:00:00'),
(39, 'Qwarick222', 'ww', 5, '2019-05-24 00:00:00'),
(40, 'aasdzx', 'ssss', 5, '2019-05-24 00:00:00'),
(16, 'TesTDen', 'TEstDen', 7, '2019-05-22 00:00:00'),
(17, 'Qwarick', 'aaaaa', 1, '2019-05-22 00:00:00'),
(18, 'aushdaushduiashdiu', 'asiudhauisdhiasuhd', 1, '2019-05-22 00:00:00'),
(19, 'Test', 'Please work', 1, '2019-05-23 00:00:00'),
(20, 'TryMe', 'TryMe', 1, '2019-05-23 00:00:00'),
(21, 'test111', 'Test222', 1, '2019-05-23 00:00:00'),
(22, 'TimeEntry', 'TimeEntry', 1, '2019-05-23 00:00:00'),
(23, '2TimeTry', '2TimeTry', 1, '2019-05-23 00:00:00'),
(24, 'Demian', 'QWA', 1, '2019-05-23 00:00:00'),
(25, 'Rogue IS', 'Qwarick', 1, '2019-05-23 00:00:00'),
(27, 'Qwarick111', 'ww', 1, '2019-05-23 00:00:00'),
(28, 'CommentsTryOuts', 'AuthTEST', 5, '2019-05-23 23:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`) VALUES
(1, 'admin', 'test'),
(2, 'Test2', 'test2'),
(3, 'test3', 'test3'),
(4, 'Qwarick', '$2y$10$JoypXSKzlot.L5yaHcRlj.TVuY2tGXa8hqulVupOEGVjW0YM7bT3a'),
(5, 'Qwarick2', '$2y$10$gAFFcOD6XrcYGSIT3aAy8Ow3LVxnO654k/Yzw4dGsARhr3eGe72Sq'),
(6, 'Qwarick3', '$2y$10$YxDzmC/ugQGn19C3nzCkw.kFDQ1OgF6EgvF5M/ji878pnH506KRhK'),
(7, 'Qwarick322', '$2y$10$nq49cqf7cQiWYbd5a5vAEOTGh9d0LKIWWI2r5URWGxG7qh5x1iUG6'),
(8, 'Zodiac', '$2y$10$v8SoxH3/Wv/Jc9hTRX1kVu2do63hYBJvjsaQslfRhtJc35yabNOj.'),
(10, 'abra', '$2y$10$CvEPVXSrNEHPM/JHBG.u/uphYQPiys8k32tnQ.0pqoSEOPBvAk8a.'),
(11, 'Qq', '$2y$10$U2bHsvYEJ08IaWIOpin7VOt5bzmh6ZyVwqYI7.ftfakh4uXnW3r26'),
(12, 'qq2', '$2y$10$x0jujN2pwZsDnvOMW2e5u.QyJqpkXrRZuu0CcahOWW6eNj6WaxgIe'),
(13, 'qq5', '$2y$10$as/b7/bHKofU9JvLf4vSA.mwxd64IF15pq7BsOBkU4Usp0rH9u4DG'),
(14, 'qsad', '$2y$10$yEQ7H2fdK2jiAoJKrxEa6ONw5Y4NZO348.Zovp9tFseL8gK5gPjkS'),
(15, 'fghj', '$2y$10$vCXBu7bqfhhQZ8VkPWB2Du5rXUm9LIGVWtt9tGsIOVc2BpThIjbla'),
(16, '49848', '$2y$10$uDMIV8EJwNwPTyIyoaUjxeBkDV0lDQKVqx.CVklwf66/BSGwqhMhy'),
(17, 'Qwarick355', '$2y$10$opgoQ707ZYr4tDfZqDLOQewmAft5cnr44YxBGIsyXTRlt4nc4m9E6'),
(18, '123134', '$2y$10$GFe6mtKt9huXKVFDxYZbueu0GqWCEB2vqXK7hqxSquYpUgvIHie1m'),
(19, 'MYIIIKETEP', '$2y$10$TxAWYzqj3ijUlb/vLRB7SO25QYFdAc5Wn.JLHUKHZKn3vHPwwh/0a');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

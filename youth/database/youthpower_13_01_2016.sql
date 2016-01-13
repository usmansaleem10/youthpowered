-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2016 at 01:26 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youthpower`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `comment` text,
  `subject` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `title`, `comment`, `subject`) VALUES
(1, 'create', NULL, NULL),
(2, 'read', NULL, NULL),
(3, 'update', NULL, NULL),
(4, 'delete', NULL, NULL),
(5, 'message', NULL, NULL),
(6, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `friendship`
--

CREATE TABLE IF NOT EXISTS `friendship` (
  `inviter_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `acknowledgetime` int(11) DEFAULT NULL,
  `requesttime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friendship`
--

INSERT INTO `friendship` (`inviter_id`, `friend_id`, `status`, `acknowledgetime`, `requesttime`, `updatetime`, `message`) VALUES
(5, 8, 1, 0, 1451296337, 1451296337, 'sdafsdfsadaf sdaf sadf '),
(5, 9, 3, 0, 1451281332, 1451285764, 'vcvcvcvcv'),
(9, 6, 0, 0, 1451216016, 1451216016, 'HI Rabia, I wanna be your friend');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `id` int(11) unsigned NOT NULL,
  `membership_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_date` int(11) NOT NULL,
  `end_date` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `payment_date` int(11) DEFAULT NULL,
  `subscribed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) unsigned NOT NULL,
  `timestamp` int(10) unsigned NOT NULL,
  `from_user_id` int(10) unsigned NOT NULL,
  `to_user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text,
  `message_read` tinyint(1) NOT NULL,
  `answered` tinyint(1) DEFAULT NULL,
  `draft` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `timestamp`, `from_user_id`, `to_user_id`, `title`, `message`, `message_read`, `answered`, `draft`) VALUES
(1, 0, 1, 5, 'Rosheel title', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla felis magna, posuere sit amet elit non, luctus pellentesque nunc. Donec mi ex, venenatis laoreet tempor eu, viverra sed ante. Fusce nec pretium urna, ac tempus velit. Nam sit amet dolor', 1, 1, NULL),
(3, 1450846866, 5, 1, 'Re: Rosheel title REPLYING YOU', 'HI ROSHEEL I AM HERE TO REPLY YOU ', 0, 1, NULL),
(4, 1450928916, 5, 1, 'Re: Rosheel title', 'fffffff', 0, 1, NULL),
(5, 1450929186, 5, 5, 'nnn', 'bbbbb', 1, 0, NULL),
(6, 1450929229, 5, 5, 'HELLOOO', 'bbbbb', 0, 0, NULL),
(7, 1450931885, 1, 1, 'My message TITle COMPOSE', 'COMPOSE DESCRIPTION', 1, 0, NULL),
(8, 1450935696, 1, 1, 'vvv', 'bbbb', 0, 0, NULL),
(12, 1451041118, 5, 6, 'New friendship request from rosheelbaig', 'A new friendship request from rosheelbaig has been made: hhhhhh <a href="/youthpowered/youth/index.php/friendship/friendship/index">Manage my friends</a><br /><a href="/youthpowered/youth/index.php/profile/profile/view">To the profile</a>', 0, NULL, NULL),
(13, 1451056960, 5, 7, 'New friendship request from rosheelbaig', 'A new friendship request from rosheelbaig has been made: vvvv <a href="/youthpowered/youth/index.php/friendship/friendship/index">Manage my friends</a><br /><a href="/youthpowered/youth/index.php/profile/profile/view">To the profile</a>', 0, NULL, NULL),
(14, 1451058616, 5, 5, 'vvv', 'xxxx', 0, 0, NULL),
(15, 1451058658, 5, 1, 'Re: Rosheel title', 'nnnnnn', 0, 1, NULL),
(16, 1451185054, 5, 1, 'Re: Rosheel title', 'HELLOOOO', 0, 1, NULL),
(17, 1451215905, 1, 9, 'Your activation succeeded', 'The activation of the account rosheel succeeded. Please use <a href="/youth/index.php/user/user/login">this link</a> to go to the login page', 0, NULL, NULL),
(18, 1451216016, 9, 6, 'New friendship request from rosheel', 'A new friendship request from rosheel has been made: HI Rabia, I wanna be your friend <a href="/youth/index.php/friendship/friendship/index">Manage my friends</a><br /><a href="/youth/index.php/profile/profile/view">To the profile</a>', 0, NULL, NULL),
(19, 1451216236, 5, 1, 'Hi ', 'Thanks', 0, 0, NULL),
(20, 1451216423, 5, 9, 'New friendship request from rosheelbaig', 'A new friendship request from rosheelbaig has been made: Hi, I wanna be your friend... <a href="/youth/index.php/friendship/friendship/index">Manage my friends</a><br /><a href="/youth/index.php/profile/profile/view">To the profile</a>', 0, NULL, NULL),
(21, 1451216537, 5, 9, 'hi', 'I will confirm it', 0, 0, NULL),
(22, 1451223983, 6, 5, 'Your friendship request has been accepted', 'Your friendship request to rosheelbaig has been accepted', 0, NULL, NULL),
(23, 1451223987, 7, 5, 'Your friendship request has been accepted', 'Your friendship request to rosheelbaig has been accepted', 0, NULL, NULL),
(24, 1451223991, 9, 5, 'Your friendship request has been accepted', 'Your friendship request to rosheelbaig has been accepted', 0, NULL, NULL),
(25, 1451281333, 5, 9, 'New friendship request from rosheelbaig', 'A new friendship request from rosheelbaig has been made: vcvcvcvcv <a href="/youthpowered/youth/index.php/friendship/friendship/index">Manage my friends</a><br /><a href="/youthpowered/youth/index.php/profile/profile/view">To the profile</a>', 0, NULL, NULL),
(26, 1451286157, 5, 1, 'Re: Rosheel title', 'vvv', 0, 1, NULL),
(27, 1451296337, 5, 8, 'New friendship request from rosheelbaig', 'A new friendship request from rosheelbaig has been made: sdafsdfsadaf sdaf sadf  <a href="/youthpowered/youth/index.php/friendship/friendship/index">Manage my friends</a><br /><a href="/youthpowered/youth/index.php/profile/profile/view">To the profile</a>', 0, NULL, NULL),
(28, 1451299290, 5, 1, 'Re: Rosheel title', 'mmmmm', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newslettersubscribers`
--

CREATE TABLE IF NOT EXISTS `newslettersubscribers` (
  `newslettersubscribers_id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `zipcode` varchar(40) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newslettersubscribers`
--

INSERT INTO `newslettersubscribers` (`newslettersubscribers_id`, `email`, `zipcode`, `update_at`) VALUES
(1, 'rosheelbaig@gmail.com', '44545454545', '2015-11-22 16:02:33'),
(2, 'rbaig@whuntu.com', '123', '2015-11-24 01:54:23'),
(3, 'admin@gmail.com', '12333', '2015-11-25 18:54:46'),
(4, 'sam@gmail.com', '5478888', '2015-12-27 17:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `title`, `text`) VALUES
(1, 'Prepayment', NULL),
(2, 'Paypal', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `principal_id` int(11) NOT NULL,
  `subordinate_id` int(11) NOT NULL DEFAULT '0',
  `type` enum('user','role') NOT NULL,
  `action` int(11) unsigned NOT NULL,
  `subaction` int(11) unsigned NOT NULL,
  `template` tinyint(1) NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`principal_id`, `subordinate_id`, `type`, `action`, `subaction`, `template`, `comment`) VALUES
(1, 0, 'role', 6, 2, 0, 'User Manager can read other users'),
(2, 0, 'role', 5, 1, 0, 'Demo role can write messages'),
(2, 0, 'role', 5, 2, 0, 'Demo role can read messages');

-- --------------------------------------------------------

--
-- Table structure for table `privacysetting`
--

CREATE TABLE IF NOT EXISTS `privacysetting` (
  `user_id` int(10) unsigned NOT NULL,
  `message_new_friendship` tinyint(1) NOT NULL DEFAULT '1',
  `message_new_message` tinyint(1) NOT NULL DEFAULT '1',
  `message_new_profilecomment` tinyint(1) NOT NULL DEFAULT '1',
  `appear_in_search` tinyint(1) NOT NULL DEFAULT '1',
  `show_online_status` tinyint(1) NOT NULL DEFAULT '1',
  `log_profile_visits` tinyint(1) NOT NULL DEFAULT '1',
  `ignore_users` varchar(255) DEFAULT NULL,
  `public_profile_fields` bigint(15) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privacysetting`
--

INSERT INTO `privacysetting` (`user_id`, `message_new_friendship`, `message_new_message`, `message_new_profilecomment`, `appear_in_search`, `show_online_status`, `log_profile_visits`, `ignore_users`, `public_profile_fields`) VALUES
(1, 1, 1, 1, 1, 1, 1, '', NULL),
(2, 1, 1, 1, 1, 1, 1, NULL, NULL),
(3, 1, 1, 1, 1, 1, 1, '', NULL),
(4, 1, 1, 1, 1, 1, 1, '', NULL),
(5, 1, 1, 1, 1, 1, 1, '', NULL),
(6, 1, 1, 1, 1, 1, 1, '', NULL),
(7, 1, 1, 1, 1, 1, 1, '', NULL),
(8, 1, 1, 1, 1, 1, 1, '', NULL),
(9, 1, 1, 1, 1, 1, 1, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `about` text
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `lastname`, `firstname`, `email`, `street`, `city`, `about`) VALUES
(1, 1, 'admin', 'admin', 'webmaster@example.com', '', '', ''),
(2, 2, 'demo', 'demo', 'demo@example.com', NULL, NULL, NULL),
(3, 3, 'Baig', 'Rosheel', 'rosheelbaig@gmail.com', NULL, NULL, NULL),
(4, 4, 'baig', 'rosheel', 'baig@gmail.com', NULL, NULL, NULL),
(6, 6, 'baig', 'rabia', 'rabia@gmail.com', NULL, NULL, NULL),
(7, 7, 'ali', 'asad', 'asad@gmail.com', NULL, NULL, NULL),
(8, 8, 'waseem', 'waseem', 'waseem@gmail.com', NULL, NULL, NULL),
(9, 9, 'Barret', 'Hayley', 'rosheelb@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_comment`
--

CREATE TABLE IF NOT EXISTS `profile_comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `createtime` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile_comment`
--

INSERT INTO `profile_comment` (`id`, `user_id`, `profile_id`, `comment`, `createtime`) VALUES
(2, 5, 5, 'Hi This is a Profile Comment', 1450840139),
(3, 5, 5, 'bbbbb', 1450979424),
(4, 5, 5, 'bbbbb', 1450979429),
(5, 1, 1, 'vvvv', 1451013282),
(6, 1, 1, 'vvvv BBBBBBB', 1451013296),
(7, 1, 1, 'nnmnmnmmn', 1451013828),
(8, 5, 1, 'hhhhh', 1451058460),
(9, 5, 1, 'uuuuuuu', 1451058469),
(10, 5, 6, 'vvvv', 1451058854),
(11, 5, 6, 'vvvv', 1451058854),
(12, 5, 6, 'vvvv', 1451058860),
(13, 5, 8, 'BBBBB', 1451185114),
(14, 5, 9, 'hjkhjhkjhjkh', 1451281458);

-- --------------------------------------------------------

--
-- Table structure for table `profile_visit`
--

CREATE TABLE IF NOT EXISTS `profile_visit` (
  `visitor_id` int(11) NOT NULL,
  `visited_id` int(11) NOT NULL,
  `timestamp_first_visit` int(11) NOT NULL,
  `timestamp_last_visit` int(11) NOT NULL,
  `num_of_visits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_visit`
--

INSERT INTO `profile_visit` (`visitor_id`, `visited_id`, `timestamp_first_visit`, `timestamp_last_visit`, `num_of_visits`) VALUES
(1, 2, 1447413706, 1447414202, 2),
(1, 3, 1447415254, 1447415254, 1),
(1, 5, 1450935898, 1450946099, 20),
(5, 1, 1448476906, 1451217109, 20),
(5, 2, 1451035410, 1451035410, 1),
(5, 6, 1451035453, 1451216716, 30),
(5, 7, 1451056946, 1451057804, 3),
(5, 8, 1451040234, 1451296382, 8),
(5, 9, 1451216407, 1451281460, 8),
(9, 5, 1451215980, 1451216050, 2),
(9, 6, 1451215990, 1451241152, 4);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `name` text,
  `type_id` int(11) NOT NULL DEFAULT '11',
  `description` text,
  `quicksummary` text,
  `status` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `total_effort` int(10) unsigned DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `parent_id`, `name`, `type_id`, `description`, `quicksummary`, `status`, `state`, `created_by`, `total_effort`, `startdate`, `enddate`, `duedate`, `update_at`) VALUES
(1, NULL, 'Youth Powered Project', 1, ' Youth Powered Project Youth Powered Project Youth Powered Project Youth Powered Project Youth Powered Project  Youth Powered Project Youth Powered Project Youth Powered Project Youth Powered Project Youth Powered Project', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-12 09:29:58'),
(2, NULL, 'My New Project Here', 1, 'My new Project Description heree ', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-12 09:55:07'),
(3, NULL, 'Lyn Test Project', 1, 'Lyn Test Project Description ', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-12 13:38:57'),
(4, NULL, 'vvvv', 1, 'bbb', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-12 14:14:13'),
(5, NULL, 'vcxxxx', 1, ' www', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-12 15:40:53'),
(6, NULL, 'vcxxxx', 1, ' www', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-12 15:40:53'),
(7, NULL, 'vcxxxxbbb', 1, 'MMM www', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-12 15:41:13'),
(8, NULL, 'vcxxxxbbb', 1, 'MMM www', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-12 15:41:13'),
(9, NULL, 'rosheeel baig', 1, 'ROSHEEL', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-12 15:44:36'),
(10, NULL, 'THis is a Project', 1, ' ', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-20 03:41:20'),
(11, NULL, 'vvvv', 1, ' xxx', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-20 05:21:25'),
(12, NULL, 'WASEEM', 1, 'HHHHH xxx', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-20 05:21:55'),
(13, NULL, 'vvv', 1, ' xxxx', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-23 02:46:33'),
(14, NULL, 'HHHHH', 1, 'KKKKKK ', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-25 15:43:05'),
(15, 1, 'vvv', 2, 'fgg', 'bbbb', NULL, NULL, 5, NULL, NULL, '2015-12-29', NULL, '2015-12-25 15:46:16'),
(16, NULL, 'ROSHEEL', 1, 'BAIG ', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-25 16:00:55'),
(17, NULL, 'nnn', 1, ' mmmm', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2015-12-25 17:19:58'),
(18, NULL, 'vvv', 1, ' bbb', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-27 07:13:00'),
(19, NULL, 'YOUTHPOWERED BY LYN', 1, 'LYN DESC ', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-27 07:13:27'),
(20, 19, 'MY TASK', 2, 'DESC', 'HHHHHH', NULL, NULL, 5, NULL, NULL, '2015-12-08', NULL, '2015-12-27 07:14:22'),
(21, NULL, 'CCc', 1, ' vvvv', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-28 05:40:05'),
(22, 21, 'parent Activity', 2, 'gggggg', 'llllll', NULL, NULL, 5, NULL, NULL, '2015-12-08', NULL, '2015-12-28 05:41:34'),
(23, 1, 'bbb', 2, 'vvvv', 'mmmmm', NULL, NULL, 5, NULL, NULL, '2015-12-23', NULL, '2015-12-28 07:02:03'),
(24, NULL, 'CCCC GBBB', 1, ' bbbbbbbbbb', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2015-12-28 07:17:24'),
(25, 2, 'ROSHEEL BAIG', 2, 'ROSHEEL', 'ROSHEEEL', NULL, NULL, 5, NULL, NULL, '2015-12-29', NULL, '2015-12-28 09:23:18'),
(26, 2, 'This is a Child Activity nnn', 2, 'cccc', NULL, NULL, NULL, 5, NULL, NULL, '2015-12-23', NULL, '2015-12-28 09:25:34'),
(27, 1, 'xxx', 2, 'vvvv', 'qqqq', NULL, NULL, 5, NULL, NULL, '2015-12-17', NULL, '2015-12-31 13:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `projectresources`
--

CREATE TABLE IF NOT EXISTS `projectresources` (
  `activityresource_id` int(11) NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `resource_id` int(10) unsigned NOT NULL,
  `resource_type` varchar(40) DEFAULT NULL,
  `role` varchar(40) DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projectresources`
--

INSERT INTO `projectresources` (`activityresource_id`, `project_id`, `resource_id`, `resource_type`, `role`, `update_at`) VALUES
(1, 25, 6, NULL, NULL, '2015-12-28 09:23:18'),
(2, 26, 7, NULL, NULL, '2015-12-28 09:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `membership_priority` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL COMMENT 'Price (when using membership module)',
  `duration` int(11) DEFAULT NULL COMMENT 'How long a membership is valid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `translation`
--

CREATE TABLE IF NOT EXISTS `translation` (
  `message` varbinary(255) NOT NULL,
  `translation` varchar(255) NOT NULL,
  `language` varchar(5) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) NOT NULL,
  `type_id` int(10) DEFAULT NULL,
  `password` char(64) CHARACTER SET latin1 NOT NULL,
  `activationKey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(11) NOT NULL DEFAULT '0',
  `lastvisit` int(11) NOT NULL DEFAULT '0',
  `lastaction` int(11) NOT NULL DEFAULT '0',
  `lastpasswordchange` int(11) NOT NULL DEFAULT '0',
  `failedloginattempts` int(11) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) DEFAULT NULL,
  `notifyType` enum('None','Digest','Instant','Threshold') DEFAULT 'Instant'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `type_id`, `password`, `activationKey`, `createtime`, `lastvisit`, `lastaction`, `lastpasswordchange`, `failedloginattempts`, `superuser`, `status`, `avatar`, `notifyType`) VALUES
(1, 'admin', NULL, '$2y$13$ZH9VuDc7N9CAV0cqMN3sbOd9UYZgAfesHpzrnKx6C.5IZYqkaylvC', '', 0, 1451284405, 1451288353, 0, 0, 1, 1, 'images/1_Chrysanthemum.jpg', 'Instant'),
(5, 'rosheelbaig', NULL, '$2y$13$ZH9VuDc7N9CAV0cqMN3sbOd9UYZgAfesHpzrnKx6C.5IZYqkaylvC', '', 1448475535, 1452591523, 0, 1448475533, 0, 0, 1, 'images/5_Penguins.jpg', 'Instant'),
(6, 'rabia', NULL, '$2y$13$hM3wo4L8ojCOEEpAZNLnEuMNdn1htUgxmu5vFtIt/UZikAySW/7gK', '', 1448561204, 1448561279, 0, 1448561202, 1, 1, 1, 'gravatar', 'Instant'),
(7, 'asad', 1, '$2y$13$F/Y5XhAKDsOYip0h7jjgrOrAmRuhn0/siWT0wLY1BnY4HCWyp/YAe', '', 1448565946, 1448565993, 0, 1448565944, 0, 1, 1, 'gravatar', 'Instant'),
(8, 'waseem', 4, '$2y$13$0g9BHHX46UF6ZuB.sAOmpepe8YUuZx7Ijx8/nj.Pi7AXQ0EzgHW32', '$2y$13$nfXYBs5k8RopPaLuB27pzO0bI0tr6QNcDveTRZEjEYB7gn4RnEku.', 1448736352, 0, 0, 1448736350, 1, 0, 0, 'gravatar', 'Instant'),
(9, 'rosheel', 2, '$2y$13$j5nB6hpriViQSj1v4Qnup.4R2XbShWAGhP9pisH9cL329ZB3Ezyai', '$2y$13$cDjtb0BS3EVi.RS8M3waZ.xdIaHpoY8GZnqumXkmg5qRzn4tF24.K', 1451215857, 1451238116, 1451242328, 1451236723, 0, 0, 1, 'images/9_Tulips.jpg', 'Instant');

-- --------------------------------------------------------

--
-- Table structure for table `usercomments`
--

CREATE TABLE IF NOT EXISTS `usercomments` (
  `usercomments_id` int(11) NOT NULL,
  `comment` varchar(40) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `parent_id` int(11) DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `created_for` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usercommentslikes`
--

CREATE TABLE IF NOT EXISTS `usercommentslikes` (
  `usercommentslikes_id` int(11) NOT NULL,
  `usercomments_id` int(11) NOT NULL,
  `liked_by` int(10) unsigned NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userdocuments`
--

CREATE TABLE IF NOT EXISTS `userdocuments` (
  `userdocuments_id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `path` varchar(100) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userdocuments`
--

INSERT INTO `userdocuments` (`userdocuments_id`, `name`, `path`, `update_at`, `created_by`) VALUES
(11, 'Tables for Matrices(2).xlsx', 'uploads/5_Tables for Matrices(2).xlsx', '2015-12-30 12:36:10', 5),
(12, 'Reopen Flow Chart.png', 'uploads/5_Reopen Flow Chart.png', '2015-12-30 12:44:10', 5),
(14, '5_error on category (1).docx', 'uploads/5_5_error on category (1).docx', '2015-12-31 12:39:23', 5);

-- --------------------------------------------------------

--
-- Table structure for table `userdocumentsprojects`
--

CREATE TABLE IF NOT EXISTS `userdocumentsprojects` (
  `userdocumentproject_id` int(11) NOT NULL,
  `userdocuments_id` int(11) NOT NULL,
  `project_id` int(11) unsigned DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userdocumentsprojects`
--

INSERT INTO `userdocumentsprojects` (`userdocumentproject_id`, `userdocuments_id`, `project_id`, `created_by`, `update_at`) VALUES
(2, 14, 1, 5, '2015-12-31 12:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE IF NOT EXISTS `usergroup` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `participants` text,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`id`, `owner_id`, `participants`, `title`, `description`) VALUES
(1, 1, 'dsadasd', 'ddd', 'ddd'),
(2, 5, '["1","5","9"]', 'My Group', 'HELLOO GROUP'),
(3, 5, '["5"]', 'MY GROUP', 'HELLO MY GROUP'),
(4, 5, '["5"]', 'This is my User Group', 'HELLOO GROUP'),
(5, 1, '["1"]', 'ROSHEEL GROUP', 'ROSHEEL GROUP DECRIPTIONS'),
(6, 5, '["5"]', 'ccc', 'xxx'),
(7, 5, '["5"]', 'UUUUUu', 'YYYYYYY'),
(8, 5, '["5"]', 'USER GROUP HERE', 'USER DESC');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `usertype_id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertype_id`, `title`, `update_at`) VALUES
(1, 'Site Admin', '2015-11-26 19:19:25'),
(2, 'Business Allies', '2015-11-26 19:19:46'),
(3, 'Professional Allies', '2015-11-26 19:20:47'),
(4, 'Educators', '2015-11-26 19:20:47'),
(5, 'Students', '2015-11-26 19:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_message`
--

CREATE TABLE IF NOT EXISTS `user_group_message` (
  `id` int(11) unsigned NOT NULL,
  `author_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  `createtime` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group_message`
--

INSERT INTO `user_group_message` (`id`, `author_id`, `group_id`, `createtime`, `title`, `message`) VALUES
(1, 1, 1, 0, 'fff', 'ddd'),
(2, 5, 4, 1450838848, 'cccc', 'vvv'),
(3, 5, 4, 1450838860, 'Re:  cccc', 'zzzz'),
(4, 1, 5, 1450932145, 'NNN', 'mmmmm'),
(5, 1, 5, 1450932161, 'Re:  NNN', 'MMMMMM'),
(6, 5, 6, 1451018618, 'BBBB', 'NNNNN'),
(7, 5, 6, 1451018637, 'Re:  BBBB', 'mmmmmm'),
(8, 5, 3, 1451056742, 'vvv', 'bbb'),
(9, 5, 3, 1451056758, 'Re:  vvv', 'bbvvvv'),
(10, 5, 8, 1451059395, 'vvv', 'xxx'),
(11, 5, 8, 1451059409, 'Re:  vvv', 'bbb'),
(12, 5, 2, 1451059612, 'HELLO ROSHEEL', 'HOW ARE YOU ?'),
(13, 5, 2, 1451059647, 'Re:  HELLO ROSHEEL', 'Kia Haal hai KKKKK');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
(2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friendship`
--
ALTER TABLE `friendship`
  ADD PRIMARY KEY (`inviter_id`,`friend_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newslettersubscribers`
--
ALTER TABLE `newslettersubscribers`
  ADD PRIMARY KEY (`newslettersubscribers_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`principal_id`,`subordinate_id`,`type`,`action`,`subaction`);

--
-- Indexes for table `privacysetting`
--
ALTER TABLE `privacysetting`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_comment`
--
ALTER TABLE `profile_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_visit`
--
ALTER TABLE `profile_visit`
  ADD PRIMARY KEY (`visitor_id`,`visited_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `idx_fk_userproject_id` (`parent_id`),
  ADD KEY `idx_fk_userproject_created_by_id` (`created_by`);

--
-- Indexes for table `projectresources`
--
ALTER TABLE `projectresources`
  ADD PRIMARY KEY (`activityresource_id`),
  ADD KEY `idx_fk_userproject_resource_project_id` (`project_id`),
  ADD KEY `idx_fk_userproject_resource_id` (`resource_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translation`
--
ALTER TABLE `translation`
  ADD PRIMARY KEY (`message`,`language`,`category`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `status` (`status`),
  ADD KEY `superuser` (`superuser`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `usercomments`
--
ALTER TABLE `usercomments`
  ADD PRIMARY KEY (`usercomments_id`),
  ADD KEY `idx_fk_usermessages_created_by_id` (`created_by`);

--
-- Indexes for table `usercommentslikes`
--
ALTER TABLE `usercommentslikes`
  ADD PRIMARY KEY (`usercommentslikes_id`),
  ADD KEY `idx_fk_usercommentslikes_id` (`usercomments_id`),
  ADD KEY `idx_fk_usercommentsslikes_user_id` (`liked_by`),
  ADD KEY `idx_fk_usercommentslikes_created_by_id` (`created_by`);

--
-- Indexes for table `userdocuments`
--
ALTER TABLE `userdocuments`
  ADD PRIMARY KEY (`userdocuments_id`),
  ADD KEY `idx_fk_userdocuments_created_by_id` (`created_by`);

--
-- Indexes for table `userdocumentsprojects`
--
ALTER TABLE `userdocumentsprojects`
  ADD PRIMARY KEY (`userdocumentproject_id`),
  ADD KEY `idx_fk_userdocumentproject_id` (`userdocumentproject_id`),
  ADD KEY `idx_fk_project_id` (`project_id`),
  ADD KEY `idx_fk_userdocuments_id` (`userdocuments_id`),
  ADD KEY `idx_fk_userdocumentsprojects_created_by_id` (`created_by`);

--
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`usertype_id`);

--
-- Indexes for table `user_group_message`
--
ALTER TABLE `user_group_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `newslettersubscribers`
--
ALTER TABLE `newslettersubscribers`
  MODIFY `newslettersubscribers_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `profile_comment`
--
ALTER TABLE `profile_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `projectresources`
--
ALTER TABLE `projectresources`
  MODIFY `activityresource_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usercomments`
--
ALTER TABLE `usercomments`
  MODIFY `usercomments_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usercommentslikes`
--
ALTER TABLE `usercommentslikes`
  MODIFY `usercommentslikes_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userdocuments`
--
ALTER TABLE `userdocuments`
  MODIFY `userdocuments_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `userdocumentsprojects`
--
ALTER TABLE `userdocumentsprojects`
  MODIFY `userdocumentproject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `usertype_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_group_message`
--
ALTER TABLE `user_group_message`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `idx_fk_userproject_created_by_id` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `idx_fk_userproject_id` FOREIGN KEY (`parent_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projectresources`
--
ALTER TABLE `projectresources`
  ADD CONSTRAINT `idx_fk_userproject_resource_id` FOREIGN KEY (`resource_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `idx_fk_userproject_resource_project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usercomments`
--
ALTER TABLE `usercomments`
  ADD CONSTRAINT `idx_fk_usermessages_created_by_id` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `usercommentslikes`
--
ALTER TABLE `usercommentslikes`
  ADD CONSTRAINT `idx_fk_usercommentslikes_created_by_id` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `idx_fk_usercommentslikes_id` FOREIGN KEY (`usercomments_id`) REFERENCES `usercomments` (`usercomments_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `idx_fk_usercommentsslikes_user_id` FOREIGN KEY (`liked_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `userdocuments`
--
ALTER TABLE `userdocuments`
  ADD CONSTRAINT `idx_fk_userdocuments_created_by_id` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `userdocumentsprojects`
--
ALTER TABLE `userdocumentsprojects`
  ADD CONSTRAINT `idx_fk_project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idx_fk_userdocuments_id` FOREIGN KEY (`userdocuments_id`) REFERENCES `userdocuments` (`userdocuments_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idx_fk_userdocumentsprojects_created_by_id` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

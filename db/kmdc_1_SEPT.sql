-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 31, 2013 at 07:02 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kmdc`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `is_correct`) VALUES
(1, 1, 'in science', 1),
(2, 1, 'in computer', 0),
(3, 1, 'in maths', 0),
(4, 1, 'in urdu', 0),
(5, 2, 'Choice 1', 0),
(6, 2, 'Choice 2', 1),
(7, 2, 'Choice 3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `assign_course`
--

DROP TABLE IF EXISTS `assign_course`;
CREATE TABLE IF NOT EXISTS `assign_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `assigned_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `year_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `batch_year` varchar(4) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_locked` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `assign_course`
--

INSERT INTO `assign_course` (`id`, `course_id`, `assigned_by`, `created_on`, `year_id`, `section_id`, `batch_year`, `modified_on`, `is_locked`, `status`) VALUES
(21, 19, 1, '2013-08-29 23:40:35', 1, 1, '2013', '0000-00-00 00:00:00', 0, 1),
(23, 20, 1, '2013-08-29 23:58:07', 1, 1, '2013', '0000-00-00 00:00:00', 0, 1),
(24, 25, 1, '2013-08-30 22:46:55', 1, 1, '2013', '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `assign_course_teacher`
--

DROP TABLE IF EXISTS `assign_course_teacher`;
CREATE TABLE IF NOT EXISTS `assign_course_teacher` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(20) DEFAULT NULL,
  `assign_course_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `assign_course_teacher`
--

INSERT INTO `assign_course_teacher` (`id`, `teacher_id`, `assign_course_id`) VALUES
(1, 23, 21),
(2, 27, 22),
(3, 24, 23),
(4, 28, 24),
(5, 28, 25),
(6, 28, 26);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_desc` text,
  `file_path` text NOT NULL,
  `content_type_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `content_desc`, `file_path`, `content_type_id`, `created_by`, `created_on`) VALUES
(2, NULL, '67195-fullpage.png', 2, 1, '2013-07-21 09:40:37'),
(3, NULL, 'd9f9f-Curriculum-Vitae.pdf', 2, 1, '2013-07-24 10:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `content_types`
--

DROP TABLE IF EXISTS `content_types`;
CREATE TABLE IF NOT EXISTS `content_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `type_desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `content_types`
--

INSERT INTO `content_types` (`id`, `type`, `type_desc`) VALUES
(1, 'Podcast', 'Podcast'),
(2, 'Lecture', 'Lecture'),
(3, 'Associated Material', 'Associated Material'),
(4, 'Video', 'Video ');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `code`, `name`, `department_id`, `description`, `status`, `section_id`, `year_id`, `created_by`, `created_on`) VALUES
(19, '101', 'Anatomy including Histology & Embryology', 4, 'Anatomy including Histology & Embryology', 1, 1, 1, 1, '2013-08-29 23:03:02'),
(20, '102', 'Phsysiology', 5, 'Phsysiology Course', 1, 1, 1, 1, '2013-08-29 23:03:31'),
(21, '103', 'Biochemistry', 6, 'Biochemistry Course', 1, 1, 1, 1, '2013-08-29 23:04:04'),
(22, '201', 'Anatomy, Histology & Embryology', 4, 'Anatomy, Histology & Embryology', 1, 1, 2, 1, '2013-08-29 23:04:34'),
(23, '202', 'Physiology', 5, 'Physiology Course', 1, 1, 2, 1, '2013-08-29 23:05:23'),
(24, '301', 'General Pathology including Microbiology & Parasitology', 8, 'General Pathology including Microbiology & Parasitology Course', 1, 1, 3, 1, '2013-08-29 23:07:08'),
(25, 'cse 561', 'Basic Sciences', 10, 'Basic science is the des', 1, 1, 1, 1, '2013-08-30 22:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `course_contents`
--

DROP TABLE IF EXISTS `course_contents`;
CREATE TABLE IF NOT EXISTS `course_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `course_contents`
--


-- --------------------------------------------------------

--
-- Table structure for table `course_lectures`
--

DROP TABLE IF EXISTS `course_lectures`;
CREATE TABLE IF NOT EXISTS `course_lectures` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `assign_course_id` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `topic_desc` text NOT NULL,
  `sort_order` tinyint(2) NOT NULL,
  `lecture_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `day` varchar(10) NOT NULL,
  `uploaded_file` text NOT NULL,
  `uploaded_audio` text,
  `section_id` int(11) NOT NULL,
  `batch_year` varchar(4) NOT NULL,
  `refer_links` text,
  `tags` varchar(100) DEFAULT NULL,
  `is_assignment` tinyint(1) NOT NULL DEFAULT '0',
  `publish_assestment` tinyint(1) NOT NULL DEFAULT '0',
  `send_email` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `course_lectures`
--

INSERT INTO `course_lectures` (`id`, `assign_course_id`, `topic`, `topic_desc`, `sort_order`, `lecture_date`, `created_by`, `created_on`, `modified_on`, `day`, `uploaded_file`, `uploaded_audio`, `section_id`, `batch_year`, `refer_links`, `tags`, `is_assignment`, `publish_assestment`, `send_email`) VALUES
(3, 21, 'Introduction to Anatomy', '<p>\n	This topic covers basic anatomy terminology and an overview of the course. Introductory lessons include information on naming and organizing the body regions, identifying the body systems and defining the characteristics of life.</p>\n', 0, '2013-08-30', 1, '2013-08-29 23:51:19', '2013-08-31 17:19:29', 'Friday', '093d9-Sample.ppt', NULL, 1, '2013', NULL, 'INTRO', 0, 0, 0),
(4, 21, 'Cells and Tissues', '<p>\n	<a href="http://anatomycorner.com/cell/cell_notes.html">Notes on the Cell</a> &ndash; general information on cell structures, processes, and cell division<br />\n	<a href="http://anatomycorner.com/cell/cell_conceptmap.html">Cell Concept Map</a> &ndash; students finish a diagram on cell parts</p>\n', 0, '2013-09-02', 1, '2013-08-29 23:52:36', '2013-08-31 17:19:36', 'Monday', '61e69-Sample.ppt', NULL, 1, '2013', NULL, 'CELL', 0, 0, 0),
(5, 23, 'Aging', '<p>\n	Aging is the progressive loss of physiological functions that increases the probability of death.</p>\n<p>\n	This table gives some data.</p>\n<p>\n	The decline in function certainly occurs within cells. This is especially true of cells that are no longer in the cell cycle:</p>\n<ul>\n	<li>\n		neurons in the brain;</li>\n	<li>\n		skeletal and cardiac muscle;</li>\n	<li>\n		kidney cells.</li>\n</ul>\n', 0, '2013-09-03', 1, '2013-08-30 00:00:08', '2013-08-31 17:19:49', 'Tuesday', '', NULL, 1, '2013', NULL, 'AGING', 0, 0, 0),
(6, 23, 'Blood', '<p>\n	Blood is a liquid tissue. Suspended in the watery <b><a href="http://users.rcn.com/jkimball.ma.ultranet/BiologyPages/B/Blood.html#plasma">plasma</a></b> are seven types of cells and cell fragments.</p>\n<ul>\n	<li>\n		<b><a href="http://users.rcn.com/jkimball.ma.ultranet/BiologyPages/B/Blood.html#RBCs">red blood cells</a></b> (<b>RBC</b>s) or <b>erythrocytes</b></li>\n	<li>\n		<b><a href="http://users.rcn.com/jkimball.ma.ultranet/BiologyPages/B/Blood.html#platelets">platelets</a></b> or <b>thrombocytes</b></li>\n	<li>\n		five kinds of <b>white blood cells</b> (<b>WBC</b>s) or <b>leukocytes</b>\n		<ul>\n			<li>\n				Three kinds of <b>granulocytes</b>\n				<ul>\n					<li>\n						<b><a href="http://users.rcn.com/jkimball.ma.ultranet/BiologyPages/B/Blood.html#neutrophils">neutrophils</a></b></li>\n					<li>\n						<b><a href="http://users.rcn.com/jkimball.ma.ultranet/BiologyPages/B/Blood.html#eosinophils">eosinophils</a></b></li>\n					<li>\n						<b><a href="http://users.rcn.com/jkimball.ma.ultranet/BiologyPages/B/Blood.html#basophils">basophils</a></b></li>\n				</ul>\n			</li>\n			<li>\n				Two kinds of leukocytes without granules in their cytoplasm\n				<ul>\n					<li>\n						<b><a href="http://users.rcn.com/jkimball.ma.ultranet/BiologyPages/B/Blood.html#lymphocytes">lymphocytes</a></b></li>\n					<li>\n						<b><a href="http://users.rcn.com/jkimball.ma.ultranet/BiologyPages/B/Blood.html#monocytes">monocytes</a></b></li>\n				</ul>\n			</li>\n		</ul>\n	</li>\n</ul>\n', 0, '2013-09-04', 1, '2013-08-30 00:02:17', '2013-08-31 17:20:08', 'Wednesday', '85bc3-Sample.ppt', NULL, 1, '2013', NULL, 'BLOOD', 0, 0, 0),
(7, 24, 'Lecture 1', '<p>\n	Lecture will contains topics related to cells.</p>\n<p>\n	All student should refered this document (&quot;www.technyxsys.com/file.ppt&quot;</p>\n<p>\n	&nbsp;</p>\n', 0, '2013-09-02', 1, '2013-08-30 22:52:48', '2013-08-31 17:20:14', 'Tuesday', 'b21e6-093d9-Sample.ppt', NULL, 1, '2013', NULL, 'LECTURE1', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

DROP TABLE IF EXISTS `course_student`;
CREATE TABLE IF NOT EXISTS `course_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='contains relation between student and course' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `course_student`
--


-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(4, 'Anatomy'),
(5, 'Physiology'),
(6, 'Biochemistry'),
(7, 'Pharmacology and Therapeutics'),
(8, 'Pathalogy and Microbiology'),
(9, 'Community Health Sciences'),
(10, 'basic Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'Student', 'Student Group'),
(3, 'Teacher', 'Teacher Group'),
(4, 'HOD', 'Head of Department'),
(5, 'Web Admin', 'Web Administration'),
(6, 'bvb', '1vc');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `login_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `body` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `message_recipients`
--

DROP TABLE IF EXISTS `message_recipients`;
CREATE TABLE IF NOT EXISTS `message_recipients` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `message_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `read` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `message_recipients`
--


-- --------------------------------------------------------

--
-- Table structure for table `notification_board`
--

DROP TABLE IF EXISTS `notification_board`;
CREATE TABLE IF NOT EXISTS `notification_board` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `news` text NOT NULL,
  `news_desc` text NOT NULL,
  `status` int(11) NOT NULL COMMENT 'publish/draft',
  `section_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `notification_board`
--

INSERT INTO `notification_board` (`id`, `news`, `news_desc`, `status`, `section_id`, `year_id`, `group_id`, `created_on`, `modified_on`) VALUES
(3, '<p>\n	Eid ul azha</p>\n', '<p>\n	Eid Ul Azha planned on 10th oct</p>\n', 1, 1, 1, 2, '2013-08-30 23:15:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lecture_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `type` enum('MCQ','TRUE/FALSE') DEFAULT NULL,
  `reason` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `lecture_id`, `question`, `created_on`, `created_by`, `type`, `reason`) VALUES
(1, 3, '<p>\n	What is anatomy?</p>\n', '2013-08-30 00:24:58', 1, 'MCQ', '<p>\n	Reason is hello world</p>\n'),
(2, 7, '<p>\n	What is basic science?&nbsp;</p>\n', '2013-08-30 23:11:28', 1, 'MCQ', '<p>\n	Reason related to answer is bla bla</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assign_course_id` int(11) NOT NULL,
  `start_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `room` varchar(20) NOT NULL,
  `day` varchar(10) NOT NULL,
  `duration` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `assign_course_id`, `start_on`, `end_on`, `room`, `day`, `duration`, `created_by`, `created_on`, `modified_on`) VALUES
(1, 21, '2013-09-02 20:00:00', '2013-09-02 23:00:00', '1', 'Monday', 120, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 21, '2013-08-31 00:00:00', '2013-08-31 02:00:00', '1', 'Tuesday', 60, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 21, '2013-08-31 19:00:00', '2013-08-31 21:00:00', '203', 'Saturday', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(100) NOT NULL,
  `section_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section`, `section_desc`) VALUES
(1, 'Medical', 'Medical Section'),
(2, 'Dental', 'Dental Section');

-- --------------------------------------------------------

--
-- Table structure for table `student_assestments`
--

DROP TABLE IF EXISTS `student_assestments`;
CREATE TABLE IF NOT EXISTS `student_assestments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `lecture_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `student_assestments`
--


-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

DROP TABLE IF EXISTS `student_course`;
CREATE TABLE IF NOT EXISTS `student_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `assign_course_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`id`, `student_id`, `assign_course_id`, `created`) VALUES
(31, 23, 21, '2013-08-29 23:40:35'),
(32, 24, 21, '2013-08-29 23:40:35'),
(33, 23, 22, '2013-08-29 23:46:37'),
(34, 24, 22, '2013-08-29 23:46:37'),
(35, 23, 23, '2013-08-29 23:58:07'),
(36, 24, 23, '2013-08-29 23:58:07'),
(37, 23, 24, '2013-08-30 22:46:55'),
(38, 24, 24, '2013-08-30 22:46:55'),
(39, 23, 26, '2013-08-30 22:47:01'),
(40, 24, 26, '2013-08-30 22:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `dob`) VALUES
(1, '\0\0', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1377890713, 1, 'Admin', 'istrator', 'ADMIN', '0', '0000-00-00'),
(36, 'ØnÕ\0', 'hodanatomy@kmdc.edu.pk', '5e28555b8821497fce6b05f824f599436d5b292d', NULL, 'hodanatomy@kmdc.edu.pk', NULL, NULL, NULL, NULL, 1377800354, 1377800354, 1, 'Dr. Musarrat Nafees', NULL, NULL, '0300-7788901', '0000-00-00'),
(37, 'ØnÕ\0', 'hodphysiol@kmdc.edu.pk', '5848b59e5e19f308a1117f9d4559d6c22bbd0719', NULL, 'hodphysiol@kmdc.edu.pk', NULL, NULL, NULL, NULL, 1377800480, 1377800480, 1, 'Prof. Nargis Anjum ', NULL, NULL, '03331122331', '0000-00-00'),
(38, 'ØnÕ\0', 'hodpath@kmdc.edu.pk', '044cee82a5ea5ef25c1f44fc5e02a24bdc6744bc', NULL, 'hodpath@kmdc.edu.pk', NULL, NULL, NULL, NULL, 1377800580, 1377800580, 1, 'Prof. Javed I. Qazi', NULL, NULL, '03001122331', '0000-00-00'),
(39, 'ØnÕ\0', 'hodbiochem@kmdc.edu.pk', '0aef23f4261692a00616351a91c62b523310f886', NULL, 'hodbiochem@kmdc.edu.pk', NULL, NULL, NULL, NULL, 1377800733, 1377800733, 1, 'Prof. Sohail Rafi Khan', NULL, NULL, '030001122331', '0000-00-00'),
(40, 'ØnÕ\0', 'student1@gmail.com', 'e10bfe3c498f0718c98137346843fa627fca53f0', NULL, 'student1@gmail.com', NULL, NULL, NULL, NULL, 1377801224, 1377801224, 1, 'Student 1', 'Student 1', NULL, '03212233445', '0000-00-00'),
(41, 'ØnÕ\0', 'student2@kmdc.edu.pk', 'a1c631956c6921e7d3e9670a3343da4278fb5428', NULL, 'student2@kmdc.edu.pk', NULL, NULL, NULL, NULL, 1377801319, 1377948935, 1, 'Student 2', 'Student 2', NULL, '03334445551', '0000-00-00'),
(42, 'ØnÕ\0', 'student3@kmdc.edu.pk', 'c55db0401db7e2aefe212b5e284650511c92369a', NULL, 'student3@kmdc.edu.pk', NULL, NULL, NULL, NULL, 1377801421, 1377801421, 1, 'Student 3', 'Student 3', NULL, '03334445551', '0000-00-00'),
(43, 'ØnÕ\0', 'drnadeem@kmdc.edu.pk', '269b572973f93561881cf4dbf3f64770cf1d34c8', NULL, 'drnadeem@kmdc.edu.pk', NULL, NULL, NULL, NULL, 1377801932, 1377801932, 1, 'Dr Nadeem Baig', NULL, NULL, '033300440', '0000-00-00'),
(44, '''0Âa', 'drsamad@gmail.com', '911e1cbcd6f2eaec96bcde5bdda77b868c629076', NULL, 'drsamad@gmail.com', NULL, NULL, NULL, NULL, 1377884587, 1377884587, 1, 'Dr Samad', NULL, NULL, '1234', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(48, 1, 1),
(56, 36, 3),
(57, 37, 3),
(58, 38, 3),
(59, 39, 3),
(60, 40, 2),
(61, 41, 2),
(62, 42, 2),
(63, 43, 3),
(64, 44, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_student`
--

DROP TABLE IF EXISTS `user_student`;
CREATE TABLE IF NOT EXISTS `user_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `forum_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `phone_father` bigint(12) NOT NULL,
  `phone_home` bigint(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `role_number` varchar(20) DEFAULT NULL,
  `batch_year` varchar(4) DEFAULT NULL COMMENT '2005',
  `section_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `user_student`
--

INSERT INTO `user_student` (`id`, `user_id`, `student_id`, `forum_id`, `name`, `dob`, `gender`, `phone_father`, `phone_home`, `email`, `father_name`, `address`, `religion`, `phone`, `role_number`, `batch_year`, `section_id`, `year_id`) VALUES
(23, 40, '4001', 67, 'Student 1', '1987-08-31', 'male', 3212233445, 3212233445, 'student1@kmdc.edu.pk', 'Student''s FName', 'Block-2 Gulistan-e-Juhar', 'Islam', 3212233445, '4001', '2013', 1, 1),
(24, 41, '4002', 68, 'Student 2', '1980-03-03', 'male', 3334445551, 3334445551, 'student2@kmdc.edu.pk', 'Student FName 2', 'Block-2 Gulistan-e-Juhar', 'Islam', 3334445551, '4002', '2013', 1, 1),
(25, 42, '4003', 69, 'Student 3', '1970-01-01', 'male', 3334445551, 3334445551, 'student3@kmdc.edu.pk', 'Student FName 3', 'Block-2 Gulistan-e-Juhar', 'Islam', 3334445551, '4003', '2014', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_teacher`
--

DROP TABLE IF EXISTS `user_teacher`;
CREATE TABLE IF NOT EXISTS `user_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `teacher_id` varchar(20) DEFAULT NULL,
  `forum_id` int(11) NOT NULL DEFAULT '0' COMMENT 'user_id in forums_user table',
  `name` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `qualification` varchar(100) DEFAULT NULL COMMENT 'Engineer',
  `institution` varchar(100) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `designation` enum('professor','assistant professor','lab attendant') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user_teacher`
--

INSERT INTO `user_teacher` (`id`, `user_id`, `teacher_id`, `forum_id`, `name`, `department_id`, `email`, `phone`, `qualification`, `institution`, `skills`, `designation`) VALUES
(23, 36, '9001', 63, 'Dr. Musarrat Nafees', 4, 'hodanatomy@kmdc.edu.pk', 3001122331, 'M.B.B.S., M.Phil', 'UoK', 'Anatomy Specialist', 'professor'),
(24, 37, '9002', 64, 'Prof. Nargis Anjum ', 5, 'hodphysiol@kmdc.edu.pk', 3331122331, 'MBBS,M.Phil', 'UoK', 'MBBS,M.Phil', 'assistant professor'),
(25, 38, '9003', 65, 'Prof. Javed I. Qazi', 8, 'hodpath@kmdc.edu.pk', 3001122331, 'M.B.B.S., Dip. R.C. Path (London). Ph.D', 'UoK', 'M.B.B.S., Dip. R.C. Path (London). Ph.D', 'professor'),
(26, 39, '9004', 66, 'Prof. Sohail Rafi Khan', 6, 'hodbiochem@kmdc.edu.pk', 30001122331, 'Ph.D (London)', 'UoK', 'Ph.D (London)', 'professor'),
(27, 43, '9005', 70, 'Dr Nadeem Baig', 4, 'drnadeem@kmdc.edu.pk', 33300440, 'Dr', 'UoK', 'Expert', 'professor'),
(28, 44, 'T123', 71, 'Dr Samad', 10, 'drsamad@gmail.com', 1234, 'MBBS ', 'Abbasi shaheed , kmdc', 'Pharmacy', 'professor');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

DROP TABLE IF EXISTS `years`;
CREATE TABLE IF NOT EXISTS `years` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(10) NOT NULL,
  `year_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`, `year_desc`) VALUES
(1, '1st Year', '1st Year'),
(2, '2nd Year', '2nd Year'),
(3, '3rd Year', '3rd Year'),
(4, '4th Year', '4th Year'),
(5, '5th Year', '5th Year');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

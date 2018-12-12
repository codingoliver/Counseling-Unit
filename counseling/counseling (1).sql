-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2018 at 10:03 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `counseling`
--

-- --------------------------------------------------------

--
-- Table structure for table `anonymous_message`
--

CREATE TABLE `anonymous_message` (
  `a_m_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `counselor_u_id` int(11) NOT NULL,
  `student_u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anonymous_message`
--

INSERT INTO `anonymous_message` (`a_m_id`, `message`, `counselor_u_id`, `student_u_id`) VALUES
(3, 'I got raped by a monkey', 21, 18),
(4, 'My ant got raped by a lion', 21, 18),
(5, 'another one', 21, 18),
(6, 'A lecturer asked me for sex', 2, 18),
(7, 'Please sir am finding it difficult to adjust to campus life', 2, 18),
(8, 'VBNMVM', 21, 18),
(9, 'VVVVV', 20, 18);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `a_id` int(11) NOT NULL,
  `student_u_id` int(11) NOT NULL COMMENT 'student-booker',
  `counselor_u_id` int(11) NOT NULL COMMENT 'counselor',
  `reason` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`a_id`, `student_u_id`, `counselor_u_id`, `reason`, `date`, `time`, `status`) VALUES
(7, 18, 21, 'i\'m dying', '2018-03-30', '06:00', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `counseling_specialty`
--

CREATE TABLE `counseling_specialty` (
  `c_s_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `specialty` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counseling_specialty`
--

INSERT INTO `counseling_specialty` (`c_s_id`, `u_id`, `specialty`) VALUES
(1, 20, 'Relationship'),
(2, 20, 'DrugAbuse'),
(3, 21, 'SexualHarrasment');

-- --------------------------------------------------------

--
-- Table structure for table `ggtqjcntsmseqcpnnsxecgvmjckvkyaeadqdnqyrgixpmbxmofnc`
--

CREATE TABLE `ggtqjcntsmseqcpnnsxecgvmjckvkyaeadqdnqyrgixpmbxmofnc` (
  `m_id` int(11) NOT NULL,
  `student_u_id` int(11) NOT NULL,
  `counselor_u_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `type` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT '2018-03-21 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ggtqjcntsmseqcpnnsxecgvmjckvkyaeadqdnqyrgixpmbxmofnc`
--

INSERT INTO `ggtqjcntsmseqcpnnsxecgvmjckvkyaeadqdnqyrgixpmbxmofnc` (`m_id`, `student_u_id`, `counselor_u_id`, `message`, `type`, `datetime`) VALUES
(1, 18, 21, 'hello sir..how are you?', 'message', '2018-03-21 14:22:12'),
(2, 18, 21, 'yh I\'m very well..your side?', 'reply', '2018-03-21 14:23:24'),
(3, 18, 21, 'oh sir i\'m good too :D', 'message', '2018-03-21 14:24:02'),
(4, 18, 21, 'when are you submitting your final work?', 'reply', '2018-03-21 14:26:31'),
(5, 18, 21, 'probably on friday sir', 'message', '2018-03-21 14:26:58'),
(6, 18, 21, 'ok ... no worries', 'reply', '2018-03-21 14:27:13'),
(7, 18, 21, 'come with your group members...ok?', 'reply', '2018-03-21 14:32:57'),
(8, 18, 21, 'ok sir.. I will', 'message', '2018-03-21 14:36:41'),
(9, 18, 21, 'promise?', 'message', '2018-03-21 14:36:53'),
(10, 18, 21, 'yh of course I will come', 'reply', '2018-03-21 14:37:05'),
(11, 18, 21, 'are you sure?', 'message', '2018-03-21 14:38:20'),
(12, 18, 21, 'yh sure man', 'reply', '2018-03-21 14:38:40'),
(13, 18, 21, 'so what are you going to do about it?', 'message', '2018-03-21 14:45:53'),
(14, 18, 21, 'what tell me?', 'reply', '2018-03-21 14:46:17'),
(15, 18, 21, 'i\'m shy', 'message', '2018-03-21 14:49:31'),
(16, 18, 21, 'cmon... about what?', 'reply', '2018-03-21 14:49:44'),
(17, 18, 21, 'lol..4g3et', 'message', '2018-03-21 14:51:14'),
(18, 18, 21, 'hello sir', 'message', '2018-05-02 13:03:10'),
(19, 18, 21, 'how are you doing?', 'reply', '2018-05-02 13:04:19'),
(20, 18, 21, 'Have you finish with the work i told you to do?', 'reply', '2018-05-02 13:05:01'),
(21, 18, 21, 'Yes sir, i even did it with NKZ', 'message', '2018-05-02 13:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `messages_user`
--

CREATE TABLE `messages_user` (
  `m_u_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `table_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages_user`
--

INSERT INTO `messages_user` (`m_u_id`, `u_id`, `table_name`) VALUES
(8, 20, 'uaKWYtTqDhYbUJRbusrkMQmePyUDYOhxUAorIetdMoppceBdrCuf'),
(9, 21, 'GgTQJCNTSmseQCPNnsXEcGvmJckvKYAEADQdnQyRgIXPMbxmOfNc');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `r_id` int(11) NOT NULL,
  `a_m_id` int(11) NOT NULL,
  `reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`r_id`, `a_m_id`, `reply`) VALUES
(1, 5, 'Lol very funny'),
(2, 6, 'Book an appointment asap!'),
(3, 3, 'replied'),
(4, 9, 'TTRTRTR');

-- --------------------------------------------------------

--
-- Table structure for table `rescheduled_appointment`
--

CREATE TABLE `rescheduled_appointment` (
  `r_a_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rescheduled_appointment`
--

INSERT INTO `rescheduled_appointment` (`r_a_id`, `a_id`, `date`, `time`) VALUES
(19, 5, '2018-04-01', '19:00'),
(20, 6, '2018-03-01', '14:00');

-- --------------------------------------------------------

--
-- Table structure for table `uakwyttqdhybujrbusrkmqmepyudyohxuaorietdmoppcebdrcuf`
--

CREATE TABLE `uakwyttqdhybujrbusrkmqmepyudyohxuaorietdmoppcebdrcuf` (
  `m_id` int(11) NOT NULL,
  `student_u_id` int(11) NOT NULL,
  `counselor_u_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `type` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT '2018-03-21 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uakwyttqdhybujrbusrkmqmepyudyohxuaorietdmoppcebdrcuf`
--

INSERT INTO `uakwyttqdhybujrbusrkmqmepyudyohxuaorietdmoppcebdrcuf` (`m_id`, `student_u_id`, `counselor_u_id`, `message`, `type`, `datetime`) VALUES
(1, 18, 20, 'gud afternoon sir!', 'message', '2018-03-21 14:08:45'),
(2, 18, 20, 'yh.. gud afternoon', 'reply', '2018-03-21 14:12:24'),
(3, 18, 20, 'how are you today?', 'message', '2018-03-21 14:15:44'),
(4, 18, 20, 'oh im good sir', 'reply', '2018-03-21 14:15:59'),
(5, 18, 20, 'well wosop?', 'message', '2018-03-21 14:18:41'),
(6, 18, 20, 'i\'m great', 'reply', '2018-03-21 14:18:51'),
(7, 18, 20, 'i am going to talk a lot today', 'message', '2018-03-21 14:44:54'),
(8, 18, 20, 'and starting from right now', 'message', '2018-03-21 14:45:01'),
(9, 18, 20, 'so what\'s wrong with you?', 'message', '2018-03-21 14:45:07'),
(10, 18, 20, 'H T', 'reply', '2018-05-03 09:46:34'),
(11, 18, 20, 'GAAA', 'message', '2018-05-03 09:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `programme` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'asset\\images\\user.png',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `id`, `password`, `firstname`, `lastname`, `email`, `phone`, `gender`, `programme`, `image`, `datetime`, `type`, `status`) VALUES
(18, 'ue20002915', 'admin', 'John', 'Smith', 'john@smith.com', '0553295012', 'Male', 'BSc. Computer Science', 'asset\\images\\user.png', '2018-03-21 04:50:12', 'student', 'active'),
(19, '450', 'admin', 'Admin', 'Denis', 'denis@gmail.com', '0553295012', 'female', 'Hospitality Management', 'asset\\images\\user.png', '2018-03-21 04:52:28', 'admin', 'active'),
(20, '100', 'admin', 'Felix', 'Opare', 'felix@opare.com', '150902016', 'Male', 'Computer Science & Informatics', 'asset\\images\\user.png', '2018-03-21 05:06:36', 'counselor', 'active'),
(21, '200', 'admin', 'Peter', 'Appiahene', 'peter@gmail.com', '150902019', 'Male', 'Computer Science & Informatics', 'asset\\images\\user.png', '2018-03-21 05:20:38', 'counselor', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anonymous_message`
--
ALTER TABLE `anonymous_message`
  ADD PRIMARY KEY (`a_m_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `counseling_specialty`
--
ALTER TABLE `counseling_specialty`
  ADD PRIMARY KEY (`c_s_id`);

--
-- Indexes for table `ggtqjcntsmseqcpnnsxecgvmjckvkyaeadqdnqyrgixpmbxmofnc`
--
ALTER TABLE `ggtqjcntsmseqcpnnsxecgvmjckvkyaeadqdnqyrgixpmbxmofnc`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `messages_user`
--
ALTER TABLE `messages_user`
  ADD PRIMARY KEY (`m_u_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `rescheduled_appointment`
--
ALTER TABLE `rescheduled_appointment`
  ADD PRIMARY KEY (`r_a_id`);

--
-- Indexes for table `uakwyttqdhybujrbusrkmqmepyudyohxuaorietdmoppcebdrcuf`
--
ALTER TABLE `uakwyttqdhybujrbusrkmqmepyudyohxuaorietdmoppcebdrcuf`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anonymous_message`
--
ALTER TABLE `anonymous_message`
  MODIFY `a_m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `counseling_specialty`
--
ALTER TABLE `counseling_specialty`
  MODIFY `c_s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ggtqjcntsmseqcpnnsxecgvmjckvkyaeadqdnqyrgixpmbxmofnc`
--
ALTER TABLE `ggtqjcntsmseqcpnnsxecgvmjckvkyaeadqdnqyrgixpmbxmofnc`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `messages_user`
--
ALTER TABLE `messages_user`
  MODIFY `m_u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rescheduled_appointment`
--
ALTER TABLE `rescheduled_appointment`
  MODIFY `r_a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `uakwyttqdhybujrbusrkmqmepyudyohxuaorietdmoppcebdrcuf`
--
ALTER TABLE `uakwyttqdhybujrbusrkmqmepyudyohxuaorietdmoppcebdrcuf`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

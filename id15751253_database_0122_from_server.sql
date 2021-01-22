-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2021 at 08:05 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u219715160_yjug`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_groups`
--

CREATE TABLE `admin_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_groups`
--

INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES
(1, 'webmaster', 'Webmaster'),
(2, 'admin', 'Administrator'),
(5, 'Contactor', 'our team members');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_attempts`
--

CREATE TABLE `admin_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  `avatar` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `description`, `avatar`) VALUES
(1, '127.0.0.1', 'webmaster', '$2y$08$/X5gzWjesYi78GqeAv5tA.dVGBVP7C1e1PzqnYCVe5s1qhlDIPPES', NULL, NULL, NULL, NULL, NULL, 'PTZF34KfZptVdynD99wEeO', 1451900190, 1611301257, 1, 'Webmaster', '', '', ''),
(2, '127.0.0.1', 'admin', '$2y$08$9lyhz7cMZAKdqDT/EmFNzuMhhT7imfShxd4dOFmf3Hfz7Xxjh6706', NULL, NULL, NULL, NULL, NULL, NULL, 1451900228, 1610463771, 1, 'Admin', NULL, '', 0x3c703e0a093c696d6720616c743d2222207372633d22687474703a2f2f6c6f63616c686f73742f49436f6e436f6e73756c74696e672f6173736574732f646973742f66726f6e74656e642f696d616765732f757365722d322e6a706722207374796c653d2277696474683a2035353070783b206865696768743a2035353070783b22202f3e3c2f703e0a),
(5, '::1', 'contactor_01', '$2y$08$.TVffGn3Ee8FXyt1ReEc4.Jpor4.pLPAjdiLJZm8PH6un.RnzLTDm', NULL, NULL, NULL, NULL, NULL, NULL, 1588582671, NULL, 1, 'Jane', 'Leona', '<p>\n	<span style=\"color: rgb(130, 130, 130); font-family: &quot;Playfair Display&quot;, Georgia, serif; font-size: 18px; text-align: center;\">Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat velit eaque aspernatur expedita. </span></p>\n<p style=\"text-align: center;\">\n	<span style=\"color: rgb(130, 130, 130); font-family: &quot;Playfair Display&quot;, Georgia, serif; font-size: 18px; text-align: center;\"><span style=\"background-color:#ffd700;\">Possimus</span> itaque adipisci.</span></p>\n', 0x3c703e0a093c696d6720616c743d2222207372633d22687474703a2f2f6c6f63616c686f73742f49436f6e436f6e73756c74696e672f7465616d5f6176617461722f312e6a706722207374796c653d2277696474683a2035353070783b206865696768743a2035353070783b22202f3e3c2f703e0a),
(6, '::1', 'contactor_02', '$2y$08$ZQcRbIs6vDrRQj3a4YO8GuRk0DKJD3wz1dqXa5olONgHQ75IqCce.', NULL, NULL, NULL, NULL, NULL, NULL, 1588582850, NULL, 1, 'Ana', 'Vasquez', '<p>\n	Market contactor!Market contactor!Market contactor!Market contactor!Market contactor!Market contactor!Market contactor!Market contactor!Market contactor!Market contactor!Market contactor!Market contactor!Market contactor!Market contactor!Market contactor!</p>\n', 0x3c703e0a093c696d6720616c743d2222207372633d22687474703a2f2f6c6f63616c686f73742f49436f6e436f6e73756c74696e672f7465616d5f6176617461722f322e6a706722207374796c653d2277696474683a2035353070783b206865696768743a2035353070783b22202f3e3c2f703e0a),
(7, '::1', 'contactor_03', '$2y$08$LpogPNsAOwDRR1nE2bJN6OYgtfKhTISdFzhZeUbmmXrxNwf5abTRm', NULL, NULL, NULL, NULL, NULL, NULL, 1588582891, NULL, 1, 'Katie', 'O’Barr', '<p>\n	My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie. v</p>\n', 0x3c703e0a093c696d6720616c743d2222207372633d22687474703a2f2f6c6f63616c686f73742f49436f6e436f6e73756c74696e672f7465616d5f6176617461722f332e6a706722202f3e3c696d6720616c743d2222207372633d22687474703a2f2f6c6f63616c686f73742f49436f6e436f6e73756c74696e672f7465616d5f6176617461722f332e706e6722202f3e3c2f703e0a),
(8, '::1', 'contactor_04', '$2y$10$S5b9nPa9fY7HUjvl9JU5keu7UnCwByiwQiztVCAKE0cJwKMGtRgpW', NULL, NULL, NULL, NULL, NULL, NULL, 1588582891, 1603462784, 1, 'Katie', 'O’Barr', '<p>\r\n	My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie.&nbsp;My name is&nbsp;Katie. v</p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users_groups`
--

CREATE TABLE `admin_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users_groups`
--

INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 5),
(7, 7, 5),
(8, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `api_access`
--

CREATE TABLE `api_access` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(40) NOT NULL DEFAULT '',
  `controller` varchar(50) NOT NULL DEFAULT '',
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 0, 'anonymous', 1, 1, 0, NULL, 1463388382);

-- --------------------------------------------------------

--
-- Table structure for table `api_limits`
--

CREATE TABLE `api_limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `api_logs`
--

CREATE TABLE `api_logs` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text DEFAULT NULL,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `epic_account`
--

CREATE TABLE `epic_account` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `gmail` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `epic_account`
--

INSERT INTO `epic_account` (`id`, `name`, `gmail`, `password`, `created_date`) VALUES
(1, 'Detroit: Become Human + Beyond Two Souls', 'varmanin@yandex.by', 'h6394984949612', '2020-07-28'),
(2, 'Maneater', 'mkrabin@yandex.by', '546t45h6th6t4h', '2020-07-28'),
(3, 'Zombie Army 4', 'valeraerahin@yandex.by', '51894189dn', '2020-07-30'),
(4, 'Epic 17 Games', 'epicgameschampion9@rambler.ru', 'YfnfkmzCvjkbyf13', '2020-09-28'),
(5, 'Epic 34 Games', 'Winny7ckzd@badplayer.xyz', 'K8wHSt31z88', '2020-09-28'),
(6, 'Epic 141 Games', 'pzkiup@rambler.ru', '3Vvubx98VYYcnBbkcDMzfZaKE', '2021-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ms_account`
--

CREATE TABLE `ms_account` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `gmail` text NOT NULL,
  `password` text NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `origin_account`
--

CREATE TABLE `origin_account` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `gmail` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `origin_account`
--

INSERT INTO `origin_account` (`id`, `name`, `gmail`, `password`, `created_date`) VALUES
(6, 'FIFA 21', 'volkovstanislavrpha@rambler.ru', 'XV6Qw89SzCEGFdBh', '2021-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `play_account`
--

CREATE TABLE `play_account` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `gameid` int(11) NOT NULL,
  `code_gmail` text COLLATE utf8_unicode_ci NOT NULL,
  `code_password` text COLLATE utf8_unicode_ci NOT NULL,
  `account` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `system32id` text COLLATE utf8_unicode_ci NOT NULL,
  `appid` text COLLATE utf8_unicode_ci NOT NULL,
  `dbdata` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `play_account`
--

INSERT INTO `play_account` (`id`, `name`, `gameid`, `code_gmail`, `code_password`, `account`, `password`, `system32id`, `appid`, `dbdata`, `created_date`) VALUES
(44, 'aaaaaaaaa', 23, 'ddddddddddd', 'eeeeeeeeeeee', 'bbbbbbbb', 'cccccccccc', '1111111', '222222', '333333', '2021-01-22'),
(45, 'bbbbb', 24, 'bbbbb', 'bbbbb', 'bbbbb', 'bbbbb', 'bbbbb', 'bbbbb', 'bbbbb', '2021-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `play_account_save`
--

CREATE TABLE `play_account_save` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `gmail` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `play_account_save`
--

INSERT INTO `play_account_save` (`id`, `name`, `gmail`, `password`, `created_date`) VALUES
(5, 'Might and Magic Heroes VII', 'giuseppegreenberg98453@gmail.com', 'z9tdtmAinWqjE59h', '2021-01-21'),
(6, 'Assassin\'s Creed Valhalla', 'sadre312433123', '21312312312', '2021-01-21'),
(7, 'Watch Dogs Legion', '21312312312', '1423312321312', '2021-01-21'),
(8, 'Far Cry 6', 'r52466662564542655', 'er214154554124', '2021-01-21'),
(9, 'ANNO 1800', '1293874983274873249', '1293874983274873249', '2021-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `play_games`
--

CREATE TABLE `play_games` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `play_games`
--

INSERT INTO `play_games` (`id`, `name`) VALUES
(23, 'UPlay Game Test 1'),
(24, 'UPlay Game Test 2'),
(25, 'UPlay Game Test 3');

-- --------------------------------------------------------

--
-- Table structure for table `steam_account`
--

CREATE TABLE `steam_account` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `gameid` int(11) NOT NULL,
  `code_gmail` text NOT NULL,
  `code_password` text NOT NULL,
  `account` text NOT NULL,
  `password` text NOT NULL,
  `system32id` text NOT NULL,
  `appid` text NOT NULL,
  `dbdata` text NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `steam_account`
--

INSERT INTO `steam_account` (`id`, `name`, `gameid`, `code_gmail`, `code_password`, `account`, `password`, `system32id`, `appid`, `dbdata`, `created_date`) VALUES
(41, 'Pes 2020 (1)', 1, 'pes.share.easy.install@gmail.com', 'Cp$FYWp&#C9zjnwb', 'alligatordelta', 'pq/Mh89[BBd;LH(b4e<@FdefBWqjcvsD7U\'P$8#.', '1030313385', '996470', '3123725922', '2021-01-19'),
(42, 'Pes 2020 (2)', 1, 'pes.share.easy.install2@gmail.com', 'activatorP@ssw00225', 'flatheadcopious', 'bny3QgwvN=2tCVqXEQvWqWdaUs2=Y6xEc=s', '1049950568', '996470', '3123725922', '2021-01-19'),
(43, 'Pes 2020 (3)', 1, 'pes.share.easy.install3@gmail.com', 'bPs\\\\4\\\"G<78.&mg', 'avengehamilton', '@kpx?FWE!Hg&&5wm_zL8DRU^beFGJ#', '1045916848', '996470', '3123725922', '2021-01-19'),
(44, 'Pes 2020 (4)', 1, 'pes.share.easy.install4@gmail.com', 'x4{~\\\"`s6%Rgw(4)', 'guerrillaratio', '@MqD!-Y7SfqPZXtLH_xqtuhResAPDggKR7JEHWgp', '1049950568', '996470', '3123725922', '2021-01-19'),
(45, 'Pes 2020 (5)', 1, 'pes.share.easy.install5@gmail.com', 'G!YPGaC(2Pr\\\\@68`', 'intelligentassassin', 'y2VcNdc;paNQ8YU4\'ZYP', '1063891646', '996470', '3123725922', '2021-01-19'),
(46, 'Pes 2020 (6)', 1, 'cartwrightleanora@gmail.com', 'oOlNiqHfNY', 'uraniumheat', '&RUe=4=EZG=$tKUHCsxyFB3M$P', '1103779411', '996470', '3123725922', '2021-01-19'),
(47, 'Red Dead (p)', 2, 'rdr2.share.easy.install@gmail.com', 'ks!rc9mGGhdc$uqTea_vyd7dz_YsRG-Twgtbbs$A+f#YzFpaLw', 'elegantcruncher', '8nJL=ThXF3?BE*8B^WYXjmG3KJy@Bv', '', '', '', '2021-01-19'),
(48, 'Red Dead (2)', 2, 'rdr2.share.easy.install3@gmail.com', '$x]\\\'qDr7G[[3\\\'`)', 'ronaldwilkins', '&mXgGLy5pV5EptLZphBJk?muXm7_=N', '', '', '', '2021-01-18'),
(49, 'Resident Evil 3 (p)', 3, 're.share.easy.install2@gmail.com', 'AmB$e.8nbB`uL/Z', 'jillisdead', 'Zzh9$8H^tcnFe4=J-VsE7aW+K', '1074546013', '952060', '3429064707', '2021-01-18'),
(50, 'Resident Evil 3 (1)', 3, 'rdr2.share.easy.install4@gmail.com', 'hT#\\\"AmRW7!)@{v\\\"Q_m`Mgster,ucT8\\\"zP', 'romanvolkswagon', '9$/kpABqZL2n', '1081436733', '952060', '3429064707', '2021-01-18'),
(51, 'Resident Evil 3 (2)', 3, 'valefncummeratahab@gmail.com', 'nAJwYRNmUU', 'dancerjoliette', 'TH]@)r3c9NZS/!y', '1083763702', '952060', '3429064707', '2021-01-19'),
(52, 'Resident Evil 3 (3)', 3, 'albertfassi64@gmail.com', '@zerty00', 'republicbozo', '2E:TwUVJBsv{[uW', '1083619140', '952060', '3429064707', '2021-01-18'),
(53, 'Resident Evil 3 (4)', 3, 'hillljeffrey31@gmail.com', 'KNkkCUaQlH', 'jadewillie', '/9>64K/nB%XWu~,', '1084576038', '952060', '3429064707', '2021-01-19'),
(54, 'Resident Evil 3 (5)	', 3, 'mitchellewijaezck@gmail.com', 'cBaCNovjic', 'chronosoutbreak', 'H%<89CDJRaXU!eq', '1085002981', '952060', '3429064707', '2021-01-18'),
(55, 'Resident Evil 3 (6)', 3, 'augustnikolaus95@gmail.com', 'ePtzkPsCEO', 'rupertcoalore', '%5fyz%q2*dF!^TsgmGT&MY$Etpz%7k', '1103357615', '952060', '3429064707', '2021-01-19'),
(56, 'Planet Zoo (p)', 3, 'rdr2.share.easy.install2@gmail.com', 'WYFe-cd5B9M&~4', 'gostiveregeache', 'wm=*fwA%k!eR=BZuQ?MaEFFrnjr8XwGuXv8r5+xp', '1070977586', '703080', '460986422', '2021-01-18'),
(57, 'Planet Zoo (2)', 4, 'turcotteandrea550@gmail.com', 'KOmBklUohx', 'liardvines', 'z_am4u^cW9T=?$^r3pD!YL9^tDbZ%k', '1103292374', '703080', '460986422', '2021-01-19'),
(58, 'Mortal Kombat 11', 5, 'mk11.share.easy.install2@gmail.com', '-d9M8vT&=+MvwnY7', 'hanzoschizo', 'sTzM*Xb?!jQ7*ex-E33cFzBsVm#e7?pnrFk', '1072988725', '976310', '2732976331', '2021-01-19'),
(59, 'Football Manager 2020', 6, 'fm20.easy.install@gmail.com', '`tzYQ_#\'24DJbrB^', 'whispermonoxide', '-BQ7(g\\b$?-LFdLzwuq3-*`f!ap7)', '1043794267', '1100600', '4259912101', '2021-01-19'),
(60, 'PES 2018', 9, 'classicpes2142@gmail.com', 'DV}/fCBsJK3>PQD$', 'dmitriyorther', 'TMP5?5@S+=NYjxc6$DFwt@BYSrh9y=', '1068744957', '592580', '4232277312', '2021-01-18'),
(61, 'Death Stranding', 8, 'mcculloughpete69@gmail.com', 'jrcEXcoAkf', 'frenchrails', 'NC.(N@9qvf,?f@t-/DRg\\?)*Y3m/jGrzVe<uH)M3', '3070577489', '1190460', '3070577489', '2021-01-19'),
(62, 'Total War Collection', 7, 'nitzschewillia017@gmail.com', 'xRzfoDNXPx', 'mainsnowball', 'ur*Dn;\'LJ2tu\\f5ryA3NQ8BTufeXfU^:zZf%qL]D', '1103332699', '779340', '227374682', '2021-01-18'),
(63, 'F1 2020', 10, 'humbertopettigrew85879@gmail.com', 'sm78348934ppq', 'planemomargarine', 'a$2gHaym4%?GL8t6wN=*G=?*T89&x#Dsw_s', '', '', '', '2021-01-19'),
(64, 'Pes 2021 (p)', 11, 'langworthbradley8@gmail.com', 'tmuQSSkdKf', 'undergradheliosphere', 'SKCevq=sHNJE2zGuvZP=Tw6*5+kpC&UApQW', '1118637371', '1259970', '13846920455', '2021-01-19'),
(65, 'Pes 2021 (2)', 11, 'edmondkeim74845@gmail.com', 'jZ4TJQGchaYdqgYfpW5q', 'skeletaloden', 'fGPtFV9WVJmcLrEeGZgwgZQv2s68RN8KU7kCsA9R', '1140233044', '1259970', '13846920455', '2021-01-18'),
(66, 'Horizon Zero Dawn', 13, 'humbertopettigrew85879@gmail.com', 'sm78348934ppq', 'lexingtondiscover', 'LQWHwvqkf6fsUHgQ7KyWfYwdzeK7EVXgR5zbSe6X', '', '', '', '2021-01-18'),
(67, 'Might & Magic Heroes VII', 14, 'giuseppegreenberg98453@gmail.com', 'sm894375ppq', 'bagginessaverage', '2gGDLhNZ.TJ].39Auj,g(>_n@3\'=HZN?L*zc\'C_^', '', '', '', '2021-01-18'),
(68, 'NBA 2K21 Mamba Forever	', 15, 'dwainschell84788@gmail.com', '}&5&}m!jz(UuCAH3\'@Ksz^\'Ykt!uST', 'shiftlessslastic', 'nXbvjyMwQVwt5ZmZg3TyzukvqLj4w2PPLaj', '', '', '', '2021-01-18'),
(69, 'Marvel Avengers', 17, 'gaylordbrower89945@gmail.com', '93xn/~AR(Xa\"G+ZK_zsU\'4:XC{(#tZ&CwTgMMz=d', 'librationweb', '^g_ct9sxfkd]):=-q2w6-^\'h[\'>e^4%s6{zaf62x', '', '', '', '2021-01-18'),
(70, 'Cyberpunk 2077', 18, 'isakovandreybada@rambler.ru', 'Qnc3p5vo3', 'pittersourdough', 'Bew7AxpTFVaJq9ven72Vh77WGj53W', '', '', '', '2021-01-18'),
(71, 'Cyberpunk 2', 18, 'alekseevanatalyaddpp@rambler.ru', 'jKw5npj6b0h', 'reverendiron', 'UkDY8RQXxmxmUmaFWDxxAfcWxGs5fTbCqpFgHjMu', '', '', '', '2021-01-19'),
(72, 'FM 2021 (1)', 21, 'biryukovadaryaows@rambler.ru', 'e2mnjIfqb', 'baaincome', 'etd6gchnYqRJhMDaXtaZEXcKQq8BsX34AmZ', '1158878833', '1263850', '1797180115', '2021-01-18'),
(73, 'FIFA 21 (ultimate)', 20, 'volkovstanislavrpha@rambler.ru', '122413213321', 'grownpostbox', 'tnYSq37usRNLtdTZA8Fr5Lh4faXgrtAHwh8', '', '', '', '2021-01-18'),
(74, 'FIFA 21 (1)', 20, 'volkovstanislavrpha@rambler.ru', 'bqkr0F8swp', 'gristguitar', 'W7McjSUgZAVRcgr2kGXNHx97evnuhqhhwDn', '', '', '', '2021-01-18'),
(75, 'FIFA 21 (2)', 20, 'grishinavaleriyablzu@rambler.ru', '321421412312', 'groovymarton', 'aFPUKhEQ7uqg78NGJtFXHT4nZ7g42wkQLbcx6Ce', '', '', '', '2021-01-18'),
(76, 'FIFA 21 (3)', 20, '23123123', '213213124312312', 'zapbridge', 'BUEELFP4878w3chJmmHbtbxDWQy5QjVfZktNnQb', '', '', '', '2021-01-18'),
(77, 'ggggg1', 4, 'gggg4', 'ggggg5', 'gggg2', 'gggg3', '123123123', '4444444', '555555', '2021-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `steam_assign`
--

CREATE TABLE `steam_assign` (
  `id` int(11) NOT NULL,
  `invoice` int(11) NOT NULL,
  `account` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `steam_assign`
--

INSERT INTO `steam_assign` (`id`, `invoice`, `account`, `type`, `created_date`) VALUES
(37, 2, 7, 0, '2020-05-22'),
(496, 1, 2, 0, '2020-07-28'),
(497, 1, 1, 1, '2020-07-28'),
(498, 1, 1, 2, '2020-07-28'),
(499, 1, 1, 3, '2020-07-28'),
(500, 1, 2, 3, '2020-07-28'),
(501, 1, 1, 4, '2020-07-28'),
(502, 1, 2, 4, '2020-07-28'),
(503, 1, 3, 4, '2020-07-28'),
(504, 1, 4, 4, '2020-07-28'),
(505, 1, 5, 4, '2020-07-28'),
(586, 17, 10, 0, '2020-07-28'),
(587, 18, 10, 0, '2020-07-28'),
(588, 19, 10, 0, '2020-07-28'),
(589, 20, 10, 0, '2020-07-28'),
(590, 21, 10, 0, '2020-07-28'),
(591, 22, 10, 0, '2020-07-28'),
(594, 23, 7, 0, '2020-07-28'),
(595, 23, 10, 0, '2020-07-28'),
(598, 25, 9, 0, '2020-07-28'),
(599, 25, 10, 0, '2020-07-28'),
(600, 26, 10, 0, '2020-07-28'),
(601, 27, 10, 0, '2020-07-28'),
(603, 29, 10, 0, '2020-07-28'),
(607, 31, 10, 0, '2020-07-28'),
(608, 32, 5, 0, '2020-07-28'),
(609, 33, 19, 0, '2020-07-29'),
(610, 34, 10, 0, '2020-07-29'),
(627, 36, 5, 0, '2020-07-29'),
(674, 37, 5, 0, '2020-07-29'),
(675, 37, 9, 0, '2020-07-29'),
(676, 38, 5, 0, '2020-07-29'),
(677, 39, 10, 0, '2020-07-29'),
(678, 40, 10, 0, '2020-07-29'),
(679, 41, 5, 0, '2020-07-29'),
(683, 44, 5, 0, '2020-07-29'),
(684, 45, 5, 0, '2020-07-29'),
(688, 49, 10, 0, '2020-07-30'),
(689, 50, 6, 0, '2020-07-30'),
(706, 51, 5, 0, '2020-07-30'),
(708, 53, 5, 0, '2020-07-30'),
(709, 54, 6, 0, '2020-07-30'),
(711, 55, 5, 0, '2020-07-31'),
(712, 56, 17, 0, '2020-07-31'),
(713, 57, 17, 0, '2020-07-31'),
(715, 59, 3, 0, '2020-07-31'),
(718, 58, 6, 0, '2020-07-31'),
(719, 58, 7, 0, '2020-07-31'),
(720, 60, 3, 0, '2020-07-31'),
(721, 61, 3, 0, '2020-07-31'),
(722, 62, 6, 0, '2020-08-01'),
(726, 63, 10, 0, '2020-08-01'),
(727, 64, 5, 0, '2020-08-01'),
(728, 65, 5, 0, '2020-08-01'),
(729, 66, 10, 0, '2020-08-01'),
(730, 67, 3, 0, '2020-08-01'),
(731, 68, 19, 0, '2020-08-01'),
(732, 69, 3, 0, '2020-08-01'),
(733, 70, 18, 0, '2020-08-01'),
(734, 71, 18, 0, '2020-08-01'),
(735, 72, 18, 0, '2020-08-01'),
(736, 73, 7, 0, '2020-08-01'),
(737, 74, 5, 0, '2020-08-01'),
(738, 75, 3, 0, '2020-08-01'),
(739, 76, 9, 0, '2020-08-01'),
(740, 76, 23, 0, '2020-08-01'),
(741, 77, 6, 0, '2020-08-01'),
(742, 77, 19, 0, '2020-08-01'),
(743, 78, 22, 0, '2020-08-01'),
(748, 81, 19, 0, '2020-08-01'),
(766, 82, 7, 0, '2020-08-01'),
(767, 83, 9, 0, '2020-08-01'),
(768, 84, 18, 0, '2020-08-02'),
(769, 85, 18, 0, '2020-08-02'),
(770, 86, 9, 0, '2020-08-02'),
(771, 86, 20, 0, '2020-08-02'),
(772, 87, 10, 0, '2020-08-02'),
(773, 88, 19, 0, '2020-08-02'),
(774, 89, 3, 0, '2020-08-02'),
(795, 91, 6, 0, '2020-08-02'),
(796, 92, 3, 0, '2020-08-02'),
(797, 93, 10, 0, '2020-08-03'),
(798, 94, 3, 0, '2020-08-03'),
(799, 95, 6, 0, '2020-08-03'),
(800, 96, 5, 0, '2020-08-03'),
(801, 97, 3, 0, '2020-08-03'),
(802, 98, 6, 0, '2020-08-03'),
(803, 99, 7, 0, '2020-08-04'),
(804, 100, 9, 0, '2020-08-04'),
(805, 101, 3, 0, '2020-08-04'),
(806, 102, 2, 0, '2020-08-04'),
(807, 103, 6, 0, '2020-08-04'),
(808, 103, 7, 0, '2020-08-04'),
(809, 104, 9, 0, '2020-08-04'),
(810, 105, 10, 0, '2020-08-04'),
(813, 106, 2, 0, '2020-08-04'),
(814, 106, 18, 0, '2020-08-04'),
(817, 108, 5, 0, '2020-08-04'),
(819, 110, 9, 0, '2020-08-04'),
(820, 111, 6, 0, '2020-08-04'),
(821, 112, 2, 0, '2020-08-04'),
(822, 113, 20, 0, '2020-08-05'),
(823, 114, 7, 0, '2020-08-05'),
(824, 114, 10, 0, '2020-08-05'),
(825, 115, 2, 0, '2020-08-05'),
(826, 116, 9, 0, '2020-08-05'),
(827, 117, 7, 0, '2020-08-05'),
(828, 118, 18, 0, '2020-08-05'),
(829, 119, 6, 0, '2020-08-05'),
(830, 120, 18, 0, '2020-08-05'),
(831, 121, 7, 0, '2020-08-05'),
(832, 123, 2, 0, '2020-08-05'),
(833, 124, 10, 0, '2020-08-05'),
(834, 125, 9, 0, '2020-08-05'),
(835, 126, 4, 0, '2020-08-05'),
(837, 128, 6, 0, '2020-08-06'),
(840, 129, 19, 0, '2020-08-06'),
(841, 130, 23, 0, '2020-08-06'),
(842, 131, 2, 0, '2020-08-06'),
(843, 132, 4, 0, '2020-08-06'),
(844, 133, 5, 0, '2020-08-06'),
(845, 134, 6, 0, '2020-08-06'),
(847, 136, 2, 0, '2020-08-06'),
(848, 137, 10, 0, '2020-08-07'),
(849, 137, 23, 0, '2020-08-07'),
(850, 138, 9, 0, '2020-08-07'),
(851, 139, 4, 0, '2020-08-07'),
(852, 140, 4, 0, '2020-08-07'),
(853, 141, 4, 0, '2020-08-07'),
(854, 142, 4, 0, '2020-08-07'),
(856, 144, 6, 0, '2020-08-07'),
(857, 145, 6, 0, '2020-08-07'),
(858, 146, 19, 0, '2020-08-07'),
(859, 147, 6, 0, '2020-08-08'),
(860, 148, 5, 0, '2020-08-09'),
(861, 149, 4, 0, '2020-08-09'),
(862, 150, 7, 0, '2020-08-10'),
(863, 151, 6, 0, '2020-08-11'),
(864, 152, 9, 0, '2020-08-11'),
(865, 153, 6, 0, '2020-08-11'),
(866, 154, 18, 0, '2020-08-13'),
(867, 155, 18, 0, '2020-08-14'),
(868, 156, 4, 0, '2020-08-14'),
(869, 157, 6, 0, '2020-08-15'),
(870, 158, 19, 0, '2020-08-15'),
(871, 159, 6, 0, '2020-08-15'),
(872, 160, 2, 0, '2020-08-15'),
(873, 160, 21, 0, '2020-08-15'),
(874, 161, 10, 0, '2020-08-15'),
(875, 162, 3, 0, '2020-08-17'),
(877, 164, 3, 0, '2020-08-17'),
(878, 165, 9, 0, '2020-08-17'),
(880, 168, 10, 0, '2020-08-18'),
(881, 169, 6, 0, '2020-08-18'),
(882, 170, 19, 0, '2020-08-19'),
(883, 171, 18, 0, '2020-08-19'),
(884, 172, 19, 0, '2020-08-19'),
(885, 173, 19, 0, '2020-08-19'),
(886, 174, 6, 0, '2020-08-19'),
(887, 175, 6, 0, '2020-08-20'),
(888, 176, 7, 0, '2020-08-20'),
(890, 178, 6, 0, '2020-08-20'),
(891, 179, 10, 0, '2020-08-20'),
(892, 180, 7, 0, '2020-08-21'),
(893, 181, 18, 0, '2020-08-21'),
(894, 182, 2, 0, '2020-08-21'),
(895, 183, 6, 0, '2020-08-21'),
(896, 184, 6, 0, '2020-08-23'),
(898, 186, 2, 1, '2020-08-23'),
(899, 187, 7, 0, '2020-08-23'),
(900, 188, 6, 0, '2020-08-24'),
(901, 189, 6, 0, '2020-08-25'),
(902, 190, 18, 0, '2020-08-26'),
(903, 191, 6, 0, '2020-08-26'),
(904, 192, 6, 0, '2020-08-27'),
(905, 193, 6, 0, '2020-08-28'),
(907, 195, 7, 0, '2020-08-28'),
(908, 196, 19, 0, '2020-08-28'),
(909, 197, 4, 0, '2020-08-29'),
(910, 198, 18, 0, '2020-08-29'),
(911, 199, 6, 0, '2020-08-29'),
(912, 200, 19, 0, '2020-08-29'),
(913, 201, 19, 0, '2020-08-29'),
(914, 202, 2, 1, '2020-08-29'),
(915, 203, 18, 0, '2020-08-29'),
(916, 204, 9, 0, '2020-08-29'),
(917, 205, 4, 0, '2020-08-29'),
(918, 206, 6, 0, '2020-08-30'),
(919, 207, 9, 0, '2020-08-31'),
(920, 208, 9, 0, '2020-08-31'),
(923, 211, 18, 0, '2020-08-31'),
(924, 212, 10, 0, '2020-08-31'),
(925, 213, 6, 0, '2020-08-31'),
(926, 214, 23, 0, '2020-08-31'),
(927, 215, 19, 0, '2020-08-31'),
(928, 216, 18, 0, '2020-09-02'),
(929, 217, 2, 0, '2020-09-02'),
(930, 218, 6, 0, '2020-09-02'),
(931, 219, 19, 0, '2020-09-02'),
(932, 220, 9, 0, '2020-09-02'),
(933, 221, 22, 0, '2020-09-03'),
(935, 222, 9, 0, '2020-09-03'),
(936, 223, 6, 0, '2020-09-03'),
(937, 224, 19, 0, '2020-09-04'),
(938, 225, 19, 0, '2020-09-04'),
(939, 226, 18, 0, '2020-09-05'),
(940, 227, 9, 0, '2020-09-05'),
(941, 228, 6, 0, '2020-09-05'),
(942, 229, 6, 0, '2020-09-06'),
(943, 230, 23, 0, '2020-09-06'),
(944, 231, 10, 0, '2020-09-06'),
(945, 232, 10, 0, '2020-09-06'),
(947, 234, 6, 0, '2020-09-06'),
(948, 235, 2, 0, '2020-09-06'),
(950, 236, 19, 0, '2020-09-07'),
(951, 237, 6, 0, '2020-09-07'),
(952, 238, 10, 0, '2020-09-08'),
(953, 239, 21, 0, '2020-09-08'),
(958, 244, 19, 0, '2020-09-09'),
(964, 245, 18, 0, '2020-09-09'),
(965, 246, 23, 0, '2020-09-09'),
(966, 247, 10, 0, '2020-09-09'),
(967, 248, 6, 0, '2020-09-10'),
(968, 249, 19, 0, '2020-09-10'),
(969, 250, 6, 0, '2020-09-10'),
(970, 251, 19, 0, '2020-09-10'),
(971, 252, 9, 0, '2020-09-10'),
(972, 253, 19, 0, '2020-09-11'),
(973, 254, 10, 0, '2020-09-11'),
(974, 255, 9, 0, '2020-09-11'),
(975, 256, 9, 0, '2020-09-12'),
(976, 256, 19, 0, '2020-09-12'),
(977, 257, 18, 0, '2020-09-12'),
(978, 258, 10, 0, '2020-09-12'),
(979, 259, 7, 0, '2020-09-12'),
(980, 260, 10, 0, '2020-09-12'),
(981, 260, 20, 0, '2020-09-12'),
(982, 261, 21, 0, '2020-09-12'),
(983, 262, 10, 0, '2020-09-12'),
(984, 262, 20, 0, '2020-09-12'),
(985, 263, 19, 0, '2020-09-13'),
(986, 264, 6, 0, '2020-09-13'),
(987, 265, 9, 0, '2020-09-13'),
(988, 177, 2, 0, '2020-09-13'),
(989, 177, 7, 0, '2020-09-13'),
(990, 177, 23, 0, '2020-09-13'),
(991, 267, 27, 0, '2020-09-14'),
(992, 268, 9, 0, '2020-09-14'),
(993, 269, 9, 0, '2020-09-14'),
(995, 270, 10, 0, '2020-09-14'),
(996, 167, 5, 0, '2020-09-14'),
(997, 167, 27, 0, '2020-09-14'),
(998, 271, 4, 0, '2020-09-14'),
(999, 272, 6, 0, '2020-09-14'),
(1002, 273, 18, 0, '2020-09-15'),
(1003, 274, 9, 0, '2020-09-15'),
(1004, 275, 6, 0, '2020-09-15'),
(1005, 276, 4, 0, '2020-09-16'),
(1006, 277, 23, 0, '2020-09-16'),
(1007, 278, 9, 0, '2020-09-16'),
(1008, 278, 23, 0, '2020-09-16'),
(1009, 279, 9, 0, '2020-09-16'),
(1010, 279, 2, 1, '2020-09-16'),
(1013, 280, 6, 0, '2020-09-18'),
(1014, 281, 19, 0, '2020-09-18'),
(1056, 282, 34, 0, '2020-09-18'),
(1057, 163, 9, 0, '2020-09-18'),
(1058, 163, 34, 0, '2020-09-18'),
(1059, 283, 9, 0, '2020-09-18'),
(1060, 284, 9, 0, '2020-09-19'),
(1061, 285, 9, 0, '2020-09-19'),
(1062, 286, 1, 0, '2020-09-19'),
(1063, 287, 1, 0, '2020-09-19'),
(1065, 288, 1, 0, '2020-09-19'),
(1066, 288, 21, 0, '2020-09-19'),
(1068, 290, 1, 0, '2020-09-20'),
(1069, 291, 1, 0, '2020-09-20'),
(1070, 292, 5, 0, '2020-09-20'),
(1071, 30, 4, 0, '2020-09-20'),
(1072, 30, 9, 0, '2020-09-20'),
(1073, 30, 10, 0, '2020-09-20'),
(1074, 30, 27, 0, '2020-09-20'),
(1075, 293, 10, 0, '2020-09-20'),
(1076, 294, 1, 0, '2020-09-20'),
(1078, 296, 1, 0, '2020-09-21'),
(1079, 297, 19, 0, '2020-09-21'),
(1082, 109, 2, 0, '2020-09-21'),
(1083, 109, 27, 0, '2020-09-21'),
(1084, 298, 7, 0, '2020-09-21'),
(1085, 299, 34, 0, '2020-09-22'),
(1086, 300, 19, 0, '2020-09-22'),
(1087, 301, 27, 0, '2020-09-23'),
(1109, 303, 23, 0, '2020-09-24'),
(1110, 304, 19, 0, '2020-09-24'),
(1111, 305, 23, 0, '2020-09-24'),
(1112, 306, 6, 0, '2020-09-25'),
(1113, 307, 3, 0, '2020-09-25'),
(1114, 308, 23, 0, '2020-09-25'),
(1118, 311, 10, 0, '2020-09-25'),
(1119, 312, 23, 0, '2020-09-25'),
(1122, 313, 10, 0, '2020-09-26'),
(1123, 313, 20, 0, '2020-09-26'),
(1124, 313, 23, 0, '2020-09-26'),
(1125, 314, 5, 0, '2020-09-26'),
(1126, 314, 10, 0, '2020-09-26'),
(1127, 314, 23, 0, '2020-09-26'),
(1128, 314, 34, 0, '2020-09-26'),
(1129, 315, 3, 0, '2020-09-26'),
(1130, 316, 9, 0, '2020-09-26'),
(1131, 317, 2, 1, '2020-09-26'),
(1132, 310, 7, 0, '2020-09-26'),
(1133, 310, 10, 0, '2020-09-26'),
(1135, 302, 11, 0, '2020-09-26'),
(1136, 302, 23, 0, '2020-09-26'),
(1137, 127, 4, 0, '2020-09-26'),
(1138, 127, 27, 0, '2020-09-26'),
(1139, 319, 9, 0, '2020-09-27'),
(1140, 319, 10, 0, '2020-09-27'),
(1141, 319, 23, 0, '2020-09-27'),
(1144, 322, 18, 0, '2020-09-27'),
(1145, 323, 23, 0, '2020-09-27'),
(1146, 324, 2, 1, '2020-09-27'),
(1147, 325, 23, 0, '2020-09-27'),
(1148, 326, 19, 0, '2020-09-27'),
(1170, 309, 11, 0, '2020-09-28'),
(1171, 309, 23, 0, '2020-09-28'),
(1172, 309, 6, 2, '2020-09-28'),
(1173, 327, 19, 0, '2020-09-28'),
(1174, 328, 7, 0, '2020-09-28'),
(1175, 329, 6, 0, '2020-09-28'),
(1177, 331, 19, 0, '2020-09-28'),
(1178, 332, 10, 0, '2020-09-28'),
(1179, 332, 23, 0, '2020-09-28'),
(1180, 321, 9, 0, '2020-09-29'),
(1181, 321, 11, 0, '2020-09-29'),
(1182, 321, 23, 0, '2020-09-29'),
(1184, 333, 23, 0, '2020-09-29'),
(1185, 334, 6, 0, '2020-09-29'),
(1186, 335, 11, 0, '2020-09-29'),
(1187, 336, 9, 0, '2020-09-30'),
(1190, 338, 25, 0, '2020-09-30'),
(1191, 337, 10, 0, '2020-09-30'),
(1192, 337, 20, 0, '2020-09-30'),
(1193, 337, 34, 0, '2020-09-30'),
(1194, 339, 9, 0, '2020-09-30'),
(1196, 342, 18, 0, '2020-09-30'),
(1197, 343, 9, 0, '2020-09-30'),
(1198, 340, 23, 0, '2020-09-30'),
(1199, 344, 23, 0, '2020-09-30'),
(1200, 345, 6, 2, '2020-10-01'),
(1201, 346, 19, 0, '2020-10-01'),
(1202, 347, 9, 0, '2020-10-02'),
(1203, 348, 27, 0, '2020-10-02'),
(1204, 185, 20, 0, '2020-10-03'),
(1205, 185, 34, 0, '2020-10-03'),
(1206, 349, 7, 0, '2020-10-03'),
(1207, 43, 5, 0, '2020-10-03'),
(1208, 43, 21, 0, '2020-10-03'),
(1209, 43, 27, 0, '2020-10-03'),
(1212, 350, 6, 0, '2020-10-04'),
(1213, 351, 2, 1, '2020-10-04'),
(1214, 352, 25, 0, '2020-10-04'),
(1215, 353, 19, 0, '2020-10-04'),
(1216, 354, 23, 0, '2020-10-05'),
(1219, 356, 10, 0, '2020-10-06'),
(1220, 357, 21, 0, '2020-10-06'),
(1221, 358, 2, 0, '2020-10-07'),
(1222, 358, 27, 0, '2020-10-07'),
(1223, 359, 18, 0, '2020-10-07'),
(1230, 366, 23, 0, '2020-10-07'),
(1231, 367, 20, 0, '2020-10-07'),
(1232, 368, 34, 0, '2020-10-08'),
(1233, 369, 9, 0, '2020-10-08'),
(1235, 371, 23, 0, '2020-10-09'),
(1236, 372, 23, 0, '2020-10-09'),
(1238, 374, 20, 0, '2020-10-09'),
(1239, 375, 10, 0, '2020-10-10'),
(1240, 376, 1, 0, '2020-10-10'),
(1241, 377, 18, 0, '2020-10-10'),
(1242, 378, 6, 0, '2020-10-10'),
(1243, 320, 18, 0, '2020-10-10'),
(1244, 320, 23, 0, '2020-10-10'),
(1245, 379, 4, 0, '2020-10-11'),
(1246, 380, 23, 0, '2020-10-11'),
(1247, 381, 23, 0, '2020-10-12'),
(1248, 382, 27, 0, '2020-10-13'),
(1249, 383, 7, 0, '2020-10-13'),
(1250, 384, 18, 0, '2020-10-14'),
(1251, 385, 1, 0, '2020-10-14'),
(1252, 386, 1, 0, '2020-10-14'),
(1253, 387, 9, 0, '2020-10-14'),
(1254, 388, 9, 0, '2020-10-14'),
(1255, 389, 31, 0, '2020-10-14'),
(1256, 390, 7, 0, '2020-10-14'),
(1257, 16, 6, 0, '2020-10-14'),
(1258, 16, 11, 0, '2020-10-14'),
(1259, 16, 19, 0, '2020-10-14'),
(1260, 16, 22, 0, '2020-10-14'),
(1261, 16, 31, 0, '2020-10-14'),
(1262, 16, 34, 0, '2020-10-14'),
(1263, 16, 1, 1, '2020-10-14'),
(1264, 16, 2, 1, '2020-10-14'),
(1265, 16, 3, 1, '2020-10-14'),
(1266, 16, 4, 1, '2020-10-14'),
(1267, 16, 5, 1, '2020-10-14'),
(1268, 16, 7, 1, '2020-10-14'),
(1269, 16, 1, 2, '2020-10-14'),
(1270, 16, 2, 2, '2020-10-14'),
(1271, 16, 3, 2, '2020-10-14'),
(1272, 16, 6, 2, '2020-10-14'),
(1273, 16, 1, 3, '2020-10-14'),
(1274, 16, 1, 4, '2020-10-14'),
(1275, 16, 2, 4, '2020-10-14'),
(1276, 16, 3, 4, '2020-10-14'),
(1277, 16, 4, 4, '2020-10-14'),
(1278, 16, 5, 4, '2020-10-14'),
(1280, 392, 23, 0, '2020-10-15'),
(1281, 392, 34, 0, '2020-10-15'),
(1282, 393, 9, 0, '2020-10-15'),
(1283, 394, 6, 0, '2020-10-15'),
(1284, 395, 25, 0, '2020-10-15'),
(1285, 396, 31, 0, '2020-10-15'),
(1286, 397, 6, 0, '2020-10-16'),
(1287, 398, 19, 0, '2020-10-17'),
(1288, 399, 7, 0, '2020-10-17'),
(1289, 399, 10, 0, '2020-10-17'),
(1290, 400, 9, 0, '2020-10-17'),
(1291, 391, 18, 0, '2020-10-17'),
(1292, 391, 26, 0, '2020-10-17'),
(1293, 401, 23, 0, '2020-10-17'),
(1294, 373, 9, 0, '2020-10-17'),
(1295, 373, 23, 0, '2020-10-17'),
(1296, 402, 31, 0, '2020-10-17'),
(1298, 404, 1, 0, '2020-10-17'),
(1299, 405, 10, 0, '2020-10-18'),
(1300, 406, 9, 0, '2020-10-19'),
(1301, 407, 5, 0, '2020-10-19'),
(1302, 408, 20, 0, '2020-10-19'),
(1305, 410, 9, 0, '2020-10-20'),
(1306, 411, 9, 0, '2020-10-21'),
(1308, 413, 34, 0, '2020-10-21'),
(1309, 414, 23, 0, '2020-10-21'),
(1310, 415, 18, 0, '2020-10-21'),
(1311, 416, 25, 0, '2020-10-21'),
(1312, 417, 18, 0, '2020-10-22'),
(1313, 418, 23, 0, '2020-10-23'),
(1315, 420, 2, 1, '2020-10-23'),
(1316, 289, 1, 0, '2020-10-23'),
(1317, 289, 35, 0, '2020-10-23'),
(1321, 422, 23, 0, '2020-10-24'),
(1322, 423, 23, 0, '2020-10-24'),
(1323, 424, 9, 0, '2020-10-24'),
(1324, 425, 7, 0, '2020-10-24'),
(1325, 425, 23, 0, '2020-10-24'),
(1326, 403, 10, 0, '2020-10-25'),
(1327, 403, 23, 0, '2020-10-25'),
(1328, 426, 19, 0, '2020-10-25'),
(1329, 427, 6, 0, '2020-10-25'),
(1330, 428, 18, 0, '2020-10-25'),
(1332, 135, 9, 0, '2020-10-26'),
(1333, 135, 23, 0, '2020-10-26'),
(1334, 430, 10, 0, '2020-10-26'),
(1335, 431, 23, 0, '2020-10-26'),
(1336, 432, 23, 0, '2020-10-27'),
(1337, 433, 23, 0, '2020-10-27'),
(1338, 434, 9, 0, '2020-10-27'),
(1339, 435, 6, 0, '2020-10-27'),
(1341, 436, 9, 0, '2020-10-28'),
(1342, 436, 23, 0, '2020-10-28'),
(1343, 437, 23, 0, '2020-10-28'),
(1345, 439, 6, 0, '2020-10-28'),
(1346, 439, 9, 0, '2020-10-28'),
(1347, 440, 7, 0, '2020-10-28'),
(1348, 441, 7, 0, '2020-10-29'),
(1349, 442, 19, 0, '2020-10-29'),
(1350, 443, 6, 0, '2020-10-29'),
(1351, 443, 34, 0, '2020-10-29'),
(1352, 444, 2, 1, '2020-10-29'),
(1353, 445, 9, 0, '2020-10-30'),
(1354, 446, 6, 0, '2020-10-30'),
(1355, 447, 19, 0, '2020-10-31'),
(1356, 448, 6, 0, '2020-11-01'),
(1357, 449, 9, 0, '2020-11-01'),
(1358, 450, 10, 0, '2020-11-01'),
(1360, 452, 3, 0, '2020-11-02'),
(1361, 453, 9, 0, '2020-11-02'),
(1362, 453, 35, 0, '2020-11-02'),
(1363, 454, 27, 0, '2020-11-02'),
(1364, 421, 18, 0, '2020-11-02'),
(1365, 421, 21, 0, '2020-11-02'),
(1366, 421, 27, 0, '2020-11-02'),
(1367, 455, 9, 0, '2020-11-03'),
(1370, 451, 31, 0, '2020-11-03'),
(1371, 456, 34, 0, '2020-11-03'),
(1372, 457, 31, 0, '2020-11-03'),
(1374, 459, 23, 0, '2020-11-04'),
(1382, 458, 18, 0, '2020-11-04'),
(1383, 460, 18, 0, '2020-11-04'),
(1384, 461, 7, 0, '2020-11-05'),
(1387, 464, 23, 0, '2020-11-07'),
(1388, 464, 6, 2, '2020-11-07'),
(1389, 465, 18, 0, '2020-11-07'),
(1390, 438, 23, 0, '2020-11-08'),
(1391, 438, 31, 0, '2020-11-08'),
(1392, 466, 6, 0, '2020-11-08'),
(1393, 467, 25, 0, '2020-11-09'),
(1394, 468, 7, 0, '2020-11-09'),
(1395, 469, 31, 0, '2020-11-10'),
(1396, 470, 9, 0, '2020-11-11'),
(1397, 471, 35, 0, '2020-11-12'),
(1398, 472, 11, 0, '2020-11-12'),
(1399, 473, 35, 0, '2020-11-12'),
(1400, 473, 2, 1, '2020-11-12'),
(1401, 474, 35, 0, '2020-11-13'),
(1403, 476, 19, 0, '2020-11-14'),
(1404, 477, 10, 0, '2020-11-14'),
(1405, 478, 9, 0, '2020-11-14'),
(1406, 90, 3, 0, '2020-11-16'),
(1407, 90, 27, 0, '2020-11-16'),
(1408, 479, 27, 0, '2020-11-17'),
(1409, 480, 10, 0, '2020-11-18'),
(1410, 481, 20, 0, '2020-11-20'),
(1411, 482, 20, 0, '2020-11-20'),
(1412, 483, 2, 1, '2020-11-20'),
(1413, 484, 23, 0, '2020-11-20'),
(1414, 485, 19, 0, '2020-11-20'),
(1415, 486, 31, 0, '2020-11-21'),
(1416, 487, 19, 0, '2020-11-21'),
(1417, 488, 4, 0, '2020-11-22'),
(1418, 488, 9, 0, '2020-11-22'),
(1419, 489, 9, 0, '2020-11-22'),
(1420, 490, 7, 0, '2020-11-23'),
(1421, 491, 18, 0, '2020-11-23'),
(1422, 492, 23, 0, '2020-11-23'),
(1423, 493, 23, 0, '2020-11-24'),
(1424, 494, 25, 0, '2020-11-24'),
(1425, 495, 23, 0, '2020-11-25'),
(1426, 496, 6, 0, '2020-11-25'),
(1427, 497, 18, 0, '2020-11-27'),
(1428, 498, 6, 0, '2020-11-27'),
(1429, 499, 25, 0, '2020-11-28'),
(1431, 501, 7, 0, '2020-11-28'),
(1432, 502, 9, 0, '2020-11-28'),
(1433, 502, 18, 0, '2020-11-28'),
(1434, 503, 23, 0, '2020-11-28'),
(1435, 504, 23, 0, '2020-11-29'),
(1436, 505, 23, 0, '2020-11-29'),
(1438, 507, 6, 0, '2020-11-29'),
(1439, 508, 9, 0, '2020-11-30'),
(1440, 508, 23, 0, '2020-11-30'),
(1441, 509, 9, 0, '2020-11-30'),
(1442, 510, 9, 0, '2020-11-30'),
(1444, 512, 25, 0, '2020-12-01'),
(1446, 514, 23, 0, '2020-12-02'),
(1447, 515, 6, 0, '2020-12-02'),
(1448, 516, 6, 0, '2020-12-02'),
(1449, 517, 9, 0, '2020-12-03'),
(1450, 518, 18, 0, '2020-12-03'),
(1451, 519, 7, 0, '2020-12-03'),
(1452, 519, 25, 0, '2020-12-03'),
(1454, 521, 9, 0, '2020-12-04'),
(1455, 522, 23, 0, '2020-12-04'),
(1456, 523, 10, 0, '2020-12-04'),
(1457, 524, 23, 0, '2020-12-04'),
(1459, 526, 9, 0, '2020-12-04'),
(1461, 528, 23, 0, '2020-12-04'),
(1462, 529, 2, 1, '2020-12-05'),
(1463, 530, 25, 0, '2020-12-05'),
(1465, 532, 2, 1, '2020-12-05'),
(1466, 506, 9, 0, '2020-12-05'),
(1467, 506, 23, 0, '2020-12-05'),
(1468, 533, 2, 1, '2020-12-05'),
(1469, 525, 35, 0, '2020-12-05'),
(1470, 525, 2, 1, '2020-12-05'),
(1471, 534, 2, 1, '2020-12-05'),
(1476, 535, 7, 0, '2020-12-06'),
(1477, 535, 20, 0, '2020-12-06'),
(1478, 535, 23, 0, '2020-12-06'),
(1479, 536, 9, 0, '2020-12-07'),
(1480, 537, 36, 0, '2020-12-08'),
(1481, 42, 5, 0, '2020-12-08'),
(1482, 42, 27, 0, '2020-12-08'),
(1483, 42, 31, 0, '2020-12-08'),
(1484, 538, 6, 0, '2020-12-08'),
(1485, 539, 36, 0, '2020-12-08'),
(1486, 540, 23, 0, '2020-12-09'),
(1487, 541, 36, 0, '2020-12-09'),
(1488, 542, 36, 0, '2020-12-09'),
(1489, 543, 25, 0, '2020-12-09'),
(1490, 544, 23, 0, '2020-12-09'),
(1491, 545, 36, 0, '2020-12-09'),
(1492, 546, 19, 0, '2020-12-09'),
(1497, 547, 23, 0, '2020-12-09'),
(1498, 547, 36, 0, '2020-12-09'),
(1499, 527, 23, 0, '2020-12-09'),
(1500, 527, 36, 0, '2020-12-09'),
(1501, 531, 23, 0, '2020-12-09'),
(1502, 531, 36, 0, '2020-12-09'),
(1503, 511, 23, 0, '2020-12-09'),
(1504, 511, 36, 0, '2020-12-09'),
(1505, 549, 23, 0, '2020-12-09'),
(1506, 549, 36, 0, '2020-12-09'),
(1507, 409, 9, 0, '2020-12-10'),
(1508, 409, 23, 0, '2020-12-10'),
(1509, 409, 36, 0, '2020-12-10'),
(1511, 551, 9, 0, '2020-12-10'),
(1512, 552, 23, 0, '2020-12-10'),
(1513, 552, 36, 0, '2020-12-10'),
(1514, 553, 36, 0, '2020-12-10'),
(1515, 554, 18, 0, '2020-12-10'),
(1516, 554, 25, 0, '2020-12-10'),
(1517, 555, 36, 0, '2020-12-10'),
(1518, 355, 9, 0, '2020-12-10'),
(1519, 355, 23, 0, '2020-12-10'),
(1520, 355, 36, 0, '2020-12-10'),
(1521, 556, 36, 0, '2020-12-10'),
(1522, 557, 23, 0, '2020-12-10'),
(1523, 557, 36, 0, '2020-12-10'),
(1524, 558, 36, 0, '2020-12-10'),
(1525, 559, 36, 0, '2020-12-10'),
(1526, 560, 36, 0, '2020-12-10'),
(1527, 561, 37, 0, '2020-12-10'),
(1528, 562, 37, 0, '2020-12-10'),
(1529, 563, 37, 0, '2020-12-10'),
(1530, 564, 23, 0, '2020-12-10'),
(1531, 564, 37, 0, '2020-12-10'),
(1532, 565, 23, 0, '2020-12-10'),
(1533, 565, 37, 0, '2020-12-10'),
(1534, 566, 37, 0, '2020-12-11'),
(1537, 568, 2, 1, '2020-12-11'),
(1538, 569, 23, 0, '2020-12-11'),
(1539, 569, 37, 0, '2020-12-11'),
(1540, 570, 23, 0, '2020-12-11'),
(1541, 570, 37, 0, '2020-12-11'),
(1542, 571, 23, 0, '2020-12-11'),
(1543, 571, 37, 0, '2020-12-11'),
(1546, 572, 23, 0, '2020-12-11'),
(1547, 572, 37, 0, '2020-12-11'),
(1548, 573, 36, 0, '2020-12-11'),
(1549, 574, 37, 0, '2020-12-11'),
(1550, 575, 37, 0, '2020-12-11'),
(1551, 576, 37, 0, '2020-12-12'),
(1552, 577, 23, 0, '2020-12-12'),
(1553, 577, 36, 0, '2020-12-12'),
(1554, 578, 25, 0, '2020-12-12'),
(1555, 579, 36, 0, '2020-12-12'),
(1556, 580, 36, 0, '2020-12-12'),
(1557, 581, 23, 0, '2020-12-12'),
(1558, 581, 36, 0, '2020-12-12'),
(1559, 582, 36, 0, '2020-12-12'),
(1560, 583, 36, 0, '2020-12-12'),
(1562, 585, 36, 0, '2020-12-13'),
(1565, 588, 9, 0, '2020-12-13'),
(1566, 589, 36, 0, '2020-12-13'),
(1567, 590, 36, 0, '2020-12-14'),
(1568, 591, 23, 0, '2020-12-14'),
(1569, 591, 37, 0, '2020-12-14'),
(1570, 592, 37, 0, '2020-12-14'),
(1571, 593, 23, 0, '2020-12-14'),
(1572, 593, 36, 0, '2020-12-14'),
(1573, 593, 2, 1, '2020-12-14'),
(1574, 594, 9, 0, '2020-12-14'),
(1575, 594, 23, 0, '2020-12-14'),
(1576, 594, 36, 0, '2020-12-14'),
(1577, 595, 23, 0, '2020-12-14'),
(1578, 595, 36, 0, '2020-12-14'),
(1580, 597, 2, 1, '2020-12-14'),
(1584, 599, 36, 0, '2020-12-14'),
(1587, 602, 2, 3, '2020-12-14'),
(1588, 603, 23, 0, '2020-12-14'),
(1589, 603, 37, 0, '2020-12-14'),
(1590, 604, 23, 0, '2020-12-15'),
(1591, 604, 37, 0, '2020-12-15'),
(1594, 605, 23, 0, '2020-12-15'),
(1595, 605, 37, 0, '2020-12-15'),
(1596, 606, 36, 0, '2020-12-15'),
(1597, 607, 37, 0, '2020-12-15'),
(1598, 608, 36, 0, '2020-12-15'),
(1599, 609, 2, 3, '2020-12-15'),
(1600, 610, 2, 1, '2020-12-15'),
(1602, 548, 9, 0, '2020-12-15'),
(1603, 548, 23, 0, '2020-12-15'),
(1604, 548, 36, 0, '2020-12-15'),
(1605, 611, 23, 0, '2020-12-15'),
(1606, 611, 37, 0, '2020-12-15'),
(1607, 612, 2, 3, '2020-12-16'),
(1608, 613, 2, 3, '2020-12-16'),
(1609, 614, 2, 3, '2020-12-16'),
(1610, 615, 36, 0, '2020-12-16'),
(1611, 616, 10, 0, '2020-12-16'),
(1612, 617, 25, 0, '2020-12-16'),
(1613, 596, 23, 0, '2020-12-16'),
(1614, 596, 36, 0, '2020-12-16'),
(1615, 618, 10, 0, '2020-12-17'),
(1616, 619, 36, 0, '2020-12-17'),
(1617, 330, 7, 0, '2020-12-17'),
(1618, 330, 23, 0, '2020-12-17'),
(1620, 621, 35, 0, '2020-12-18'),
(1621, 621, 39, 0, '2020-12-18'),
(1622, 621, 40, 0, '2020-12-18'),
(1623, 622, 23, 0, '2020-12-18'),
(1624, 622, 36, 0, '2020-12-18'),
(1625, 623, 37, 0, '2020-12-18'),
(1626, 624, 2, 3, '2020-12-18'),
(1627, 625, 23, 0, '2020-12-19'),
(1628, 625, 36, 0, '2020-12-19'),
(1629, 626, 39, 0, '2020-12-19'),
(1630, 627, 22, 0, '2020-12-19'),
(1631, 628, 35, 0, '2020-12-19'),
(1632, 628, 40, 0, '2020-12-19'),
(1633, 629, 37, 0, '2020-12-19'),
(1637, 513, 9, 0, '2020-12-19'),
(1638, 513, 6, 2, '2020-12-19'),
(1639, 513, 2, 3, '2020-12-19'),
(1640, 630, 2, 3, '2020-12-19'),
(1641, 631, 6, 0, '2020-12-19'),
(1642, 632, 19, 0, '2020-12-20'),
(1643, 633, 9, 0, '2020-12-20'),
(1644, 634, 37, 0, '2020-12-21'),
(1645, 635, 7, 0, '2020-12-21'),
(1646, 636, 36, 0, '2020-12-21'),
(1647, 637, 19, 0, '2020-12-21'),
(1648, 637, 37, 0, '2020-12-21'),
(1649, 638, 23, 0, '2020-12-21'),
(1650, 638, 36, 0, '2020-12-21'),
(1651, 639, 37, 0, '2020-12-21'),
(1652, 640, 31, 0, '2020-12-22'),
(1654, 641, 11, 0, '2020-12-22'),
(1655, 642, 35, 0, '2020-12-22'),
(1656, 642, 39, 0, '2020-12-22'),
(1657, 642, 40, 0, '2020-12-22'),
(1658, 643, 10, 0, '2020-12-22'),
(1659, 644, 40, 0, '2020-12-22'),
(1660, 645, 35, 0, '2020-12-23'),
(1661, 567, 23, 0, '2020-12-23'),
(1662, 567, 35, 0, '2020-12-23'),
(1663, 567, 37, 0, '2020-12-23'),
(1664, 567, 39, 0, '2020-12-23'),
(1665, 567, 40, 0, '2020-12-23'),
(1676, 648, 42, 0, '2021-01-18'),
(1679, 658, 41, 0, '2021-01-18'),
(1680, 665, 62, 0, '2021-01-18'),
(1681, 664, 46, 0, '2021-01-18'),
(1682, 666, 43, 0, '2021-01-18'),
(1683, 666, 64, 0, '2021-01-18'),
(1684, 667, 46, 0, '2021-01-18'),
(1687, 669, 56, 0, '2021-01-18'),
(1688, 670, 73, 0, '2021-01-18'),
(1689, 671, 73, 0, '2021-01-18'),
(1691, 672, 57, 0, '2021-01-19'),
(1692, 673, 56, 0, '2021-01-19'),
(1693, 674, 62, 0, '2021-01-19'),
(1694, 674, 72, 0, '2021-01-19'),
(1696, 676, 56, 0, '2021-01-19'),
(1697, 677, 70, 0, '2021-01-19'),
(1698, 678, 75, 0, '2021-01-19'),
(1699, 679, 72, 0, '2021-01-19'),
(1700, 680, 65, 0, '2021-01-19'),
(1701, 680, 72, 0, '2021-01-19'),
(1702, 681, 65, 0, '2021-01-19'),
(1703, 681, 76, 0, '2021-01-19'),
(1712, 684, 48, 0, '2021-01-19'),
(1722, 685, 72, 0, '2021-01-19'),
(1748, 653, 41, 0, '2021-01-20'),
(1749, 653, 42, 0, '2021-01-20'),
(1750, 653, 43, 0, '2021-01-20'),
(1751, 653, 77, 0, '2021-01-20'),
(1752, 653, 2, 2, '2021-01-20'),
(1753, 653, 3, 2, '2021-01-20'),
(1754, 653, 5, 2, '2021-01-20'),
(1755, 653, 5, 3, '2021-01-20'),
(1756, 653, 6, 4, '2021-01-20'),
(1757, 686, 68, 0, '2021-01-20'),
(1758, 682, 47, 0, '2021-01-20'),
(1759, 682, 49, 0, '2021-01-20'),
(1760, 682, 61, 0, '2021-01-20'),
(1761, 682, 62, 0, '2021-01-20'),
(1762, 682, 71, 0, '2021-01-20'),
(1763, 682, 74, 0, '2021-01-20'),
(1764, 687, 73, 0, '2021-01-21'),
(1765, 675, 76, 0, '2021-01-21'),
(1766, 683, 65, 0, '2021-01-21'),
(1767, 683, 72, 0, '2021-01-21'),
(1768, 683, 76, 0, '2021-01-21'),
(1774, 661, 42, 0, '2021-01-22'),
(1775, 661, 61, 0, '2021-01-22'),
(1776, 661, 6, 2, '2021-01-22'),
(1777, 661, 44, 3, '2021-01-22'),
(1778, 661, 6, 4, '2021-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `steam_games`
--

CREATE TABLE `steam_games` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `steam_games`
--

INSERT INTO `steam_games` (`id`, `name`) VALUES
(1, 'eFootball PES 2020'),
(2, 'Red Dead Redemption 2'),
(3, 'Resident Evil 3'),
(4, 'Planet Zoo'),
(5, 'Mortal Kombat 11'),
(6, 'Football Manager 2020'),
(7, 'Total War Collection'),
(8, 'Death Stranding'),
(9, 'PES 2018'),
(10, 'F1 2020'),
(11, 'eFootball PES 2021'),
(13, 'Horizon Zero Dawn'),
(14, 'Might & Magic Heroes VII'),
(15, 'NBA 2K21 Mamba Forever'),
(17, 'Marvel Avengers'),
(18, 'Cyberpunk 2077'),
(19, 'AC Valhalla & WD Legion'),
(20, 'FIFA 21'),
(21, 'Football Manager 2021');

-- --------------------------------------------------------

--
-- Table structure for table `steam_invoice`
--

CREATE TABLE `steam_invoice` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `number` text NOT NULL,
  `ipaddress` text NOT NULL,
  `deviceid` text DEFAULT NULL,
  `created_date` date NOT NULL,
  `cpu_id` varchar(80) DEFAULT NULL,
  `harddrive_id` varchar(60) DEFAULT NULL,
  `bios_id` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `steam_invoice`
--

INSERT INTO `steam_invoice` (`id`, `name`, `number`, `ipaddress`, `deviceid`, `created_date`, `cpu_id`, `harddrive_id`, `bios_id`) VALUES
(646, 'user01', '904EF3262E0CEB3', '192.168.230.129', '00155D26DB42', '2020-12-24', '591888-1088888--19205281--1888853888', NULL, NULL),
(648, 'user02', 'A5B3B719676EA28', '', '', '2020-12-28', '111111-1050624--19205241--1075053569', 'ZN152L94', '032E02B4-1111-0589-2222-222200082222'),
(653, 'Mariann Gecse', '5837B31AF50DECB', '', '', '2021-01-04', '591593-1050624-2147154943--1075053569', 'ZN152L94', '032E02B4-0499-0589-6706-2E0700080009'),
(654, 'Flex', '4CCF7B21CBDCED0', '', '005056C00001', '2021-01-04', '', '', ''),
(655, 'Jhon', 'A484BC730F87E3B', '10.12.8.65', 'D89C673C1E63', '2021-01-04', NULL, NULL, NULL),
(657, 'User03', '69233D2CE48498A', '188.43.235.177', '0230489ACA01', '2021-01-05', '591593-1050624--19205241--1075053569', 'ZN152L94', '032E02B4-0499-0589-6706-2E0700080009'),
(658, 'user04', '31A261D62B010C7', '188.43.235.177', '', '2021-01-05', '591593-1050624--19205241--1075053569', 'ZN152L94', '032E02B4-0499-0589-6706-2E0700080009'),
(659, 'user05', 'F9B371A354FF26C', '192.168.0.136', '0A002700000C', '2021-01-05', NULL, NULL, NULL),
(660, 'user06', 'DEABB110195B00E', '192.168.1.149', '0A0027000003', '2021-01-05', NULL, NULL, NULL),
(661, 'user07', 'FADC14062B5EB0E', '', '', '2021-01-05', '6295314-526336-513286667-395049983', 'Z301ZBP1', '0F35ED60-B840-11DC-BDF3-AC220B4F8786'),
(662, 'user08', 'C52D12F1107F67A', '192.168.18.2', 'AC220B50C3E4', '2021-01-05', NULL, NULL, NULL),
(664, 'user11', '0BF6A9927486348', '', '', '2021-01-08', NULL, NULL, NULL),
(665, 'u12', 'B3736C8A6560FC9', '43.224.170.184', '', '2021-01-08', '6491905-264192-1050161675-395049983', '2J4220111659', '00000000-0000-0000-0000-4CCC6AF7B985'),
(666, 'User12', '9A618F1DFCCC8D8', '', '', '2021-01-09', NULL, NULL, NULL),
(667, 'User 13', 'B16A64B98AA699F', '', '', '2021-01-09', NULL, NULL, NULL),
(669, 'User 14', '89CB28DE14AE00E', '', '', '2021-01-12', NULL, NULL, NULL),
(670, 'User 15', '04707E2F383725A', '123.253.232.0', '', '2021-01-12', '591594-1050624-2147154879--1075053569', '0026_B768_22B1_81B5.', 'B486827C-4A0E-284B-9455-71BF2E428438'),
(671, 'User 16', '36C957780554334', '36.79.174.232', '', '2021-01-18', '329443-1050624-2147154879--1075053569', 'JR10004M0TJ6NF', '2208240A-195B-3946-8E01-2FE24A1F100D'),
(672, 'User 17', '23D2631B5993E86', '', '', '2021-01-19', NULL, NULL, NULL),
(673, 'User 18', 'B9348A7F78512C1', '', '', '2021-01-19', NULL, NULL, NULL),
(674, 'User 19', '603CB4BD46510E1', '', '', '2021-01-19', NULL, NULL, NULL),
(675, 'User 20', '196DDF2BE7C53C3', '', '', '2021-01-19', '198339-1050624-2147154879--1075053569', 'W7705CSW', '9B9F9D37-F89F-BF4E-8499-5258251FFB4E'),
(676, 'User 21', '181473154B02820', '', '', '2021-01-19', NULL, NULL, NULL),
(677, 'User 22', 'B01DDFF5B28DF48', '139.193.230.63', '', '2021-01-19', '8392465-264192-2128097803-395049983', 'Z9AQBJRQ', '6EC28570-4740-0000-0000-000000000000'),
(678, 'User 23', 'AFD6AA48C4B0EC6', '111.94.180.13', '', '2021-01-19', '8458113-264192-2128097803-395049983', 'E823_8FA6_BF53_0001_001B_448B_499E_2760.', 'F695D90F-12A3-414B-BA27-B4A9FCB4C5AE'),
(679, 'User 24', '454842679718915', '180.247.229.144', '', '2021-01-19', '7540481-264192-2128093707-395049983', '56AOP69HT', '11C6AECE-DA6C-3549-8ACF-7E979EE399CA'),
(680, 'User 25', '080A3E5146DA284', '36.84.80.31', '', '2021-01-19', '198313-1050624-230351807--1075053569', '1905C0800607', '00000011-0000-0000-0000-40167E3FA202'),
(681, 'User 26', '1483519ADCB4511', '180.244.50.4', '', '2021-01-19', '656979-1050624-2147154879--1075053569', 'WD-WMC1S6734889', '5259A1A8-34D0-0000-0000-000000000000'),
(682, 'User 27', 'A9DA4D218433139', '', '', '2021-01-19', '591594-1050624-2147154879--1075053569', 'WGS25XWB', '7ED1A025-FEEF-D246-8DB2-5F9D4D974EAA'),
(683, 'User 28', '3E53161BF70C6A6', '', '', '2021-01-19', '263907-1050624-2147154879--1075053569', 'TM702003120040040061', 'BCECFC33-008D-8546-A720-69F539E7FB55'),
(684, 'User 29', '9FA68632EC48BAE', '36.68.239.26', '', '2021-01-19', '132775-1050624-532341759--1075053569', '9VVB2F9V', '1C3202F7-8E8C-64B6-0525-1A7A266A2616'),
(685, 'User 30', '03DA85975F5D5E8', '175.158.37.60', '', '2021-01-19', '526059-1050624-2147154879--1075053569', '0000_0000_0100_0000_E4D2_5C8A_FAD7_5001.', '16675767-276C-6E46-AB68-5038D0A38D3E'),
(686, 'User 31', '71CB82CD8C7FA46', '118.136.8.180', '', '2021-01-20', '8458113-526336-2128097803-395049983', '0000_0000_0100_0000_E4D2_5C41_25A6_5101.', '39444335-3135-5935-5038-E8D8D1441FCC'),
(687, 'User 32', '0339CC514431B01', '', '', '2021-01-21', '591594-1050624-2147154879--1075053569', '4C530000090201109032', 'B486827C-4A0E-284B-9455-71BF2E428438');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'member', '$2y$08$kkqUE2hrqAJtg.pPnAhvL.1iE7LIujK5LZ61arONLpaBBWh/ek61G', NULL, 'member@member.com', NULL, NULL, NULL, NULL, 1451903855, 1451905011, 1, 'Member', 'One', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_groups`
--
ALTER TABLE `admin_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login_attempts`
--
ALTER TABLE `admin_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users_groups`
--
ALTER TABLE `admin_users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_access`
--
ALTER TABLE `api_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epic_account`
--
ALTER TABLE `epic_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_account`
--
ALTER TABLE `ms_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `origin_account`
--
ALTER TABLE `origin_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `play_account`
--
ALTER TABLE `play_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `play_account_save`
--
ALTER TABLE `play_account_save`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `play_games`
--
ALTER TABLE `play_games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `steam_account`
--
ALTER TABLE `steam_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `steam_assign`
--
ALTER TABLE `steam_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `steam_games`
--
ALTER TABLE `steam_games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `steam_invoice`
--
ALTER TABLE `steam_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `epic_account`
--
ALTER TABLE `epic_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ms_account`
--
ALTER TABLE `ms_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `origin_account`
--
ALTER TABLE `origin_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `play_account`
--
ALTER TABLE `play_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `play_account_save`
--
ALTER TABLE `play_account_save`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `play_games`
--
ALTER TABLE `play_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `steam_account`
--
ALTER TABLE `steam_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `steam_assign`
--
ALTER TABLE `steam_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1779;

--
-- AUTO_INCREMENT for table `steam_games`
--
ALTER TABLE `steam_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `steam_invoice`
--
ALTER TABLE `steam_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=688;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

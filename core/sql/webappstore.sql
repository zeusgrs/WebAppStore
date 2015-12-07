-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2015 at 04:19 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webappstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `apk`
--

CREATE TABLE IF NOT EXISTS `apk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` int(11) NOT NULL,
  `package` varchar(255) NOT NULL,
  `applicationid` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `version_code` varchar(255) NOT NULL,
  `version_name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `min_sdk` int(11) NOT NULL,
  `target_sdk` int(11) NOT NULL,
  `upload_date` date NOT NULL,
  `update_date` date NOT NULL,
  `active` int(1) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE IF NOT EXISTS `apps` (
  `app_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `apk` varchar(255) NOT NULL,
  `dev` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `date` date NOT NULL,
  `downloads` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`app_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`app_id`, `name`, `description`, `apk`, `dev`, `category`, `date`, `downloads`, `active`) VALUES
(1, 'Webtouch Voip Client', 'Για να συνδεθείτε στο πρόγραμμα θα πρέπει πρώτα να δημιουργήσετε έναν δωρεάν λογαριασμό χρήστη εδώ http://webtouch.gr/?page_id=2102 και να αποκτήσετε δωρεάν κλήσεις περίπου 10 λεπτών.\r\nWEBTouch VOIP Client είναι μια voip εφαρμογή για Android , η οποία υποστηρίζει ένα ευρύ φάσμα υπηρεσιών VoIP. Απλά συνδεθείτε χρησιμοποιώντας τον υπάρχοντα λογαριασμό σας και αρχίστε να εξοικονομείτε χρήματα για εθνικές και διεθνείς κλήσεις , όπου και να είστε , όποτε θέλετε!\r\nΓια να ξεκινήσετε την εξοικονόμηση για κλήσεις κινητής τηλεφωνίας , εγκαταστήστε το δωρεάν WEBTouch VOIP Client από το Google Play. Εάν δεν έχετε ακόμα λογαριασμό , κάντε εγγραφή στην ιστοσελίδα της Webtouch , πιστώστε στον λογαριασμό σας λίγα ευρώ και ξεκινήστε να μιλάτε με τις χαμηλότερες τιμές τις αγοράς Το μόνο που χρειάζεται είναι η εφαρμογή και μία 3G ή WiFi σύνδεση. ', 'apk/tmp/com.voiptouch.apk', 1, 5, '2015-12-05', 123584, 1),
(2, 'FlashLight Barcelona', 'a simple flashlight with barcelona logo', 'apk/tmp/FlashLightBarcelona.apk', 1, 2, '2015-12-07', 0, 1),
(3, 'FlashLight Greece', 'a simple flashlight with Greece Logo', 'apk/tmp/FlashLightHellas.apk', 1, 2, '2015-12-07', 0, 1),
(4, 'FlashLight Paok', 'a simple FlashLight with PAOK logo', 'apk/tmp/FlashLightPaok.apk', 1, 2, '2015-12-07', 0, 1),
(5, 'FlashLight PAO', 'a simple flashlight with PAO logo', 'apk/tmp/FlashLightPao.apk', 1, 2, '2015-12-07', 0, 1),
(6, 'FlashLight HRAKLHS', 'a simple FlashLight with HRAKLHS logo', 'apk/tmp/FlashLightHraklhs.apk', 1, 2, '2015-12-07', 0, 1),
(7, 'FlashLight AEK', 'a simple flashlight with AEK logo', 'apk/tmp/FlashLightAek.apk', 1, 2, '2015-12-07', 0, 1),
(8, 'FlashLight Olympiakos', 'a simple Flashlight with Olympiakos logo', 'apk/tmp/FlashLightOlympiakos.apk', 1, 2, '2015-12-07', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE IF NOT EXISTS `categorys` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `order` int(3) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`cat_id`, `name`, `description`, `icon`, `order`, `active`) VALUES
(1, 'Games', 'Games and Fun applications', 'images/icons/icon_games.png', 1, 1),
(2, 'Tools', 'Tools Applicaitons', 'images/icons/icon_tools.png', 2, 1),
(3, 'Music', 'Music Applications', 'images/icons/icon_music.png', 3, 1),
(4, 'Photos', 'Photos Application', 'images/icons/icon_photos.png', 4, 1),
(5, 'Internet', 'Internet Applications', 'images/icons/icon_internet.png', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE IF NOT EXISTS `developer` (
  `dev_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `verified` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  UNIQUE KEY `dev_id` (`dev_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`dev_id`, `username`, `password`, `date`, `name`, `website`, `phone`, `verified`, `active`) VALUES
(1, 'webtouch', '456789', '2015-12-05', 'Webtouch.gr', 'http://www.webtouch.gr', '+302461034927', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `date` date NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `app_id`, `type`, `name`, `description`, `url`, `order`, `date`, `active`) VALUES
(2, 1, 'video', '', '', 'https://www.youtube.com/watch?v=pp-zmHjUDc8', 0, '2015-12-05', 1),
(3, 1, 'icon', '', '', 'images/tmp/webtouchvoipclient.jpg', 0, '2015-12-05', 1),
(4, 1, 'screenshot', '', '', 'images/tmp/webtouch_voip_client_1.jpeg', 0, '2015-12-05', 1),
(5, 1, 'screenshot', '', '', 'images/tmp/webtouch_voip_client_2.jpeg', 0, '2015-12-05', 1),
(7, 2, 'screenshot', '', '', 'images/tmp/banner_flashLightBarcelona_off.jpg', 0, '2015-12-07', 1),
(8, 2, 'screenshot', '', '', 'images/tmp/banner_flashLightBarcelona_on.jpg', 0, '2015-12-07', 1),
(10, 2, 'icon', '', '', 'images/tmp/icon_barcelona_on.png', 0, '2015-12-07', 1),
(11, 3, 'icon', '', '', 'images/tmp/3_icon_greece_on.png', 0, '2015-12-07', 1),
(12, 3, 'screenshot', '', '', 'images/tmp/3_banner_flashLightHellas_off.jpg', 0, '2015-12-07', 1),
(13, 3, 'screenshot', '', '', 'images/tmp/3_banner_flashLightHellas_on.jpg', 0, '2015-12-07', 1),
(14, 4, 'icon', '', '', 'images/tmp/4_icon_paok.png', 0, '2015-12-07', 1),
(15, 4, 'screenshot', '', '', 'images/tmp/4_flashLightPaok_off.jpg', 0, '2015-12-07', 1),
(16, 4, 'screenshot', '', '', 'images/tmp/4_flashLightPaok_on.jpg', 0, '2015-12-07', 1),
(17, 5, 'icon', '', '', 'images/tmp/5_icon_pao.png', 0, '2015-12-07', 1),
(18, 5, 'screenshot', '', '', 'images/tmp/5_flashLightPao_off.jpg', 0, '2015-12-07', 1),
(19, 5, 'screenshot', '', '', 'images/tmp/5_flashLightPao_on.jpg', 0, '2015-12-07', 1),
(20, 6, 'icon', '', '', 'images/tmp/6_icon_hraklhs.png', 0, '2015-12-07', 1),
(21, 6, 'screenshot', '', '', 'images/tmp/6_banner_hraklhs_off.jpg', 0, '2015-12-07', 1),
(22, 6, 'screenshot', '', '', 'images/tmp/6_banner_hraklhs_on.jpg', 0, '2015-12-07', 1),
(23, 7, 'icon', '', '', 'images/tmp/7_icon_aek.png', 0, '2015-12-07', 1),
(24, 7, 'screenshot', '', '', 'images/tmp/7_banner_flashLightAek_off.jpg', 0, '2015-12-07', 1),
(25, 7, 'screenshot', '', '', 'images/tmp/7_banner_flashLightAek_on.jpg', 0, '2015-12-07', 1),
(47, 8, 'icon', '', '', 'images/tmp/8_icon_olympiakos.png', 0, '2015-12-07', 1),
(48, 8, 'screenshot', '', '', 'images/tmp/8_banner_flashLightOlympiakos_off.jpg', 0, '2015-12-07', 1),
(49, 8, 'screenshot', '', '', 'images/tmp/8_banner_flashLightOlympiakos_on.jpg', 0, '2015-12-07', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 28, 2023 at 06:49 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `verify_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `movie_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `release_date` date NOT NULL,
  `Genre` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `cast1` varchar(100) NOT NULL,
  `cast2` varchar(100) NOT NULL,
  `cast3` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `rating` int NOT NULL,
  `trailer` varchar(100) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `t_id` int NOT NULL,
  PRIMARY KEY (`movie_id`),
  KEY `t_id` (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `release_date`, `Genre`, `description`, `cast1`, `cast2`, `cast3`, `director`, `duration`, `rating`, `trailer`, `poster`, `t_id`) VALUES
(1, 'The Creator', '2023-09-29', 'Science Fiction', 'Amid a future war between the human race and the forces of AI, Joshua, a hardened ex-special forces ', 'John david Washington', 'Kane Wantanabe', 'Madleine Yuna Voyles', 'Gareth Edwards', '2hrs 36mins', 8, 'https://youtu.be/ex3C1-5Dhb8?si=qAnfgPnnXBC6IR9Z', 'The_Creater.jpg', 1),
(2, 'Fukrey', '2023-09-28', 'Comedy', 'Iss baar hogo chamatkar ,straight from Jamnapaar', 'Varun Sharma', 'Pulkit Samrat', 'Richa chadha', 'Mrigdeep singh Lamba', '2hrs 39mins', 7, 'https://youtu.be/V9qgeeO7tMk?si=q9eIl1Tb7jMAUkMp', 'fukrey.jpg', 3),
(3, 'Jawan', '2023-09-07', 'Action', 'A high-octane action thriller that outlines the emotional journey of a man who is set to rectify the', 'Sharukh Khan', 'Nayanthara', 'vijay Sethupathi', 'Atlee', '2hrs 40mins', 8, 'https://youtu.be/COv52Qyctws?si=454rI0Fne2sgJWU3', 'jawan.jpg', 4),
(4, 'The Nun II', '2023-09-07', 'Horror', 'The sequel to the worldwide smash hit follows Sister Irene as she once again comes face-to-face with', 'Bonnie Aarons', 'Taissa farmiga', 'Jonas Bloquet', 'Micheal Chaves', '2hrs 38mins', 7, 'https://youtu.be/QF-oyCwaArU?si=5JNXMKQSBkuz4LPK', 'nunii.jpg', 2),
(5, 'The Marvels', '2023-10-11', 'Science Friction', 'Carol Danvers,aka Captain Marvel, has reclaimed her identity from the tyrannical Kree and taken reve', 'Brie Larson', 'Teyonah Parris', 'Iman Vellani ', 'Nia DaCosta', '2hr 30mins', 8, 'https://youtu.be/iuk77TjvfmE?si=AC1wWH26vbBZ8cZs', 'marvel.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `screens`
--

DROP TABLE IF EXISTS `screens`;
CREATE TABLE IF NOT EXISTS `screens` (
  `screen_id` int NOT NULL AUTO_INCREMENT,
  `t_id` int NOT NULL COMMENT 'theatre id',
  `screen_name` varchar(110) NOT NULL,
  `seats` int NOT NULL COMMENT 'number of seats',
  `charge` int NOT NULL,
  PRIMARY KEY (`screen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screens`
--

INSERT INTO `screens` (`screen_id`, `t_id`, `screen_name`, `seats`, `charge`) VALUES
(1, 3, 'Screen 1', 100, 350),
(2, 3, 'Screen 2', 150, 310),
(3, 4, 'Screen 1', 200, 380),
(4, 1, 'Screen1', 34, 250),
(5, 2, 'Demo Screen', 150, 300),
(6, 1, 'IMX Screen', 200, 600);

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

DROP TABLE IF EXISTS `shows`;
CREATE TABLE IF NOT EXISTS `shows` (
  `s_id` int NOT NULL AUTO_INCREMENT,
  `st_id` int NOT NULL,
  `theatre_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `start_date` date NOT NULL,
  `status` int NOT NULL,
  `r_status` int NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`s_id`, `st_id`, `theatre_id`, `movie_id`, `start_date`, `status`, `r_status`) VALUES
(19, 15, 6, 1, '2021-04-15', 0, 1),
(20, 20, 6, 2, '2021-04-15', 0, 1),
(21, 19, 6, 3, '2021-03-31', 1, 1),
(22, 18, 6, 4, '2021-04-16', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `show_time`
--

DROP TABLE IF EXISTS `show_time`;
CREATE TABLE IF NOT EXISTS `show_time` (
  `st_id` int NOT NULL AUTO_INCREMENT,
  `screen_id` int NOT NULL,
  `name` varchar(40) NOT NULL COMMENT 'noon,second,etc',
  `start_time` time NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `show_time`
--

INSERT INTO `show_time` (`st_id`, `screen_id`, `name`, `start_time`) VALUES
(1, 1, 'Noon', '10:00:00'),
(2, 1, 'Matinee', '14:00:00'),
(3, 1, 'First', '18:00:00'),
(4, 1, 'Second', '21:00:00'),
(5, 2, 'Noon', '10:00:00'),
(6, 2, 'Matinee', '14:00:00'),
(7, 2, 'First', '18:00:00'),
(8, 2, 'Second', '21:00:00'),
(9, 3, 'Noon', '10:00:00'),
(10, 3, 'Matinee', '14:00:00'),
(11, 3, 'First', '18:00:00'),
(12, 3, 'Second', '21:00:00'),
(14, 4, 'Noon', '12:03:00'),
(15, 5, 'First', '00:08:00'),
(16, 5, 'Second', '15:10:00'),
(17, 5, 'Others', '18:10:00'),
(18, 6, 'Noon', '00:02:00'),
(19, 6, 'First', '06:35:00'),
(20, 6, 'Second', '09:18:00'),
(21, 5, 'Matinee', '20:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `theater`
--

DROP TABLE IF EXISTS `theater`;
CREATE TABLE IF NOT EXISTS `theater` (
  `t_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `state` varchar(100) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `theater`
--

INSERT INTO `theater` (`t_id`, `name`, `address`, `city`, `state`) VALUES
(1, 'INOX Osia A Wing', 'Osia Commercial Arcade - 2nd Floor - A Wing - Sgpda Market', 'margoa\r\n', 'goa'),
(2, 'INOX Goa', 'Old Gmc Heritage Precinct, D B Road,Campal', 'panjim', 'goa'),
(3, 'Central Cinemas', 'Lamindranagar, Near KFC', 'manipal', 'karnataka'),
(4, 'Bollywood Multiplex', 'Old Kharadi Mundhwa Road, Maruti Nagar', 'Pune', 'maharastra');

-- --------------------------------------------------------

--
-- Table structure for table `upcomings`
--

DROP TABLE IF EXISTS `upcomings`;
CREATE TABLE IF NOT EXISTS `upcomings` (
  `movie` int NOT NULL,
  `title` varchar(200) NOT NULL,
  `release_date` date NOT NULL,
  `Genre` varchar(200) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `cast1` varchar(100) NOT NULL,
  `cast2` varchar(100) NOT NULL,
  `cast3` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  `duration` time NOT NULL,
  `rating` int NOT NULL,
  `trailer` varchar(100) NOT NULL,
  `poster` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `upcomings`
--

INSERT INTO `upcomings` (`movie`, `title`, `release_date`, `Genre`, `Description`, `cast1`, `cast2`, `cast3`, `director`, `duration`, `rating`, `trailer`, `poster`) VALUES
(1, 'The Marvels', '2023-10-11', '\r\nScience Friction', '\r\nCarol Danvers aka Captain Marvel has reclaimed her identity from the tyrannical Kree and taken revenge on the Supreme Intelligence.\r\n', '\r\nBrie Larson', '\r\nTeyonah Parris', '\r\nIman Vellani ', '\r\nNia DaCosta', '00:00:02', 0, '\r\nhttps://youtu.be/iuk77TjvfmE?si=AC1wWH26vbBZ8cZs', '\r\nthe_marvels.jpg\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified` varchar(100) DEFAULT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `email` (`email`),
  KEY `date` (`date`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified`, `phone`, `password`, `date`) VALUES
(62, 'Aniiii', 'anishanaik7224@gmail.com', 'anishanaik7224@gmail.com', '09866443344', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-10-25 18:16:02'),
(61, 'Anisha', 'imaniisha3@gmail.com', 'imaniisha3@gmail.com', '08390347249', 'f3e055913a0b1eb0f07317896f9a1bc466b9a50db85a7f882f3ffde9ffb23aca', '2023-10-25 18:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

DROP TABLE IF EXISTS `verify`;
CREATE TABLE IF NOT EXISTS `verify` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` int NOT NULL,
  `expires` int NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`),
  KEY `expires` (`expires`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `code`, `expires`, `email`) VALUES
(35, 71717, 1698239451, 'imaniisha3@gmail.com'),
(34, 63107, 1698239353, 'imaniisha3@gmail.com'),
(23, 25746, 1695747820, 'imaniisha3@gmail.com'),
(24, 58651, 1695748854, 'anisha007@gmail.com'),
(33, 52929, 1698239176, 'imaniisha3@gmail.com'),
(32, 57300, 1697009283, 'imaniisha3@gmail.com'),
(31, 76415, 1696758327, 'imaniisha3@gmail.com'),
(36, 85766, 1698239470, 'imaniisha3@gmail.com'),
(37, 50796, 1698245135, 'imaniisha3@gmail.com'),
(38, 70800, 1698245553, 'imaniisha3@gmail.com'),
(39, 63156, 1698245642, 'imaniisha3@gmail.com'),
(40, 55537, 1698245710, 'imaniisha3@gmail.com'),
(41, 15949, 1698246090, 'imaniisha3@gmail.com'),
(42, 95666, 1698246139, 'imaniisha3@gmail.com'),
(43, 74890, 1698246319, 'imaniisha3@gmail.com'),
(44, 68952, 1698246488, 'anishanaik7224@gmail.com'),
(45, 30579, 1698246701, 'anishanaik7224@gmail.com'),
(46, 80624, 1698246722, 'imaniisha3@gmail.com'),
(47, 76895, 1698246837, 'anishanaik7224@gmail.com'),
(48, 80215, 1698255663, 'imaniisha3@gmail.com'),
(49, 34292, 1698255794, 'imaniisha3@gmail.com'),
(50, 95208, 1698255798, 'imaniisha3@gmail.com'),
(51, 78001, 1698256013, 'imaniisha3@gmail.com'),
(52, 65924, 1698256103, 'imaniisha3@gmail.com'),
(53, 89088, 1698256130, 'imaniisha3@gmail.com'),
(54, 46504, 1698257079, 'imaniisha3@gmail.com'),
(55, 11069, 1698257264, 'imaniisha3@gmail.com'),
(56, 20905, 1698258226, 'imaniisha3@gmail.com'),
(57, 32298, 1698258452, 'anishanaik7224@gmail.com'),
(58, 36683, 1698301542, 'ashleshanaik006@gmail.com'),
(59, 21799, 1698301713, 'ashleshanaik006@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2018 at 07:30 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--
CREATE DATABASE IF NOT EXISTS `cms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `AID` int(11) NOT NULL AUTO_INCREMENT,
  `ANAME` varchar(10) NOT NULL,
  `APASS` varchar(10) NOT NULL,
  PRIMARY KEY (`AID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `ANAME`, `APASS`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CID` int(11) NOT NULL AUTO_INCREMENT,
  `CNAME` varchar(150) NOT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CID`, `CNAME`) VALUES
(1, 'General'),
(5, 'Technology'),
(7, 'Sports'),
(8, 'History'),
(9, 'Science'),
(12, 'Inspiration');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `COID` int(11) NOT NULL AUTO_INCREMENT,
  `PID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `COMMENT` text NOT NULL,
  `COTIME` date NOT NULL,
  PRIMARY KEY (`COID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`COID`, `PID`, `UID`, `COMMENT`, `COTIME`) VALUES
(1, 1, 1, 'Dream Well...!!!!', '2018-03-12'),
(2, 1, 2, 'Dreams makes You To Live More....!!!!!!!', '2018-03-12'),
(3, 4, 2, 'Great Work.. Keep Rocking Bro....', '2018-03-12'),
(4, 1, 3, 'Dreams Can Take you to the real virtual world..', '2018-03-12'),
(6, 5, 4, 'Pyramids are Still Amaze to think off...!!!!!', '2018-03-12'),
(7, 7, 3, 'Apple is leading to its peak...', '2018-03-18'),
(8, 6, 3, 'Nice to see!!', '2018-03-18'),
(9, 4, 3, 'Great!!! Now Microsoft has offered systems to this school', '2018-03-18'),
(10, 6, 1, 'test', '2018-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `CID` int(11) NOT NULL AUTO_INCREMENT,
  `CNAME` varchar(25) NOT NULL,
  `CEMAIL` varchar(50) NOT NULL,
  `CCONTACT` varchar(15) NOT NULL,
  `CMESS` text NOT NULL,
  `CTIME` datetime NOT NULL,
  `UID` int(11) NOT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`CID`, `CNAME`, `CEMAIL`, `CCONTACT`, `CMESS`, `CTIME`, `UID`) VALUES
(1, 'Gayathri Rao', 'yathriga9666@gmail.com', '9629196806', 'Can You Post Something Related to Travel? ', '2018-03-11 18:50:00', 2),
(4, 'Raghavendra Rao', 'krrao@gmail.com', '9363322770', 'Good Website to View ', '2018-03-11 22:59:16', 3),
(5, 'Girija Rao', 'giri@gmail.com', '9487205792', 'Keep Rocking!!!!!!!!!', '2018-03-11 23:00:08', 4),
(6, 'Gayathri Rao', 'yathriga9666@gmail.com', '9629196806', 'Hekoollll', '2018-03-21 13:46:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `PTITLE` varchar(100) NOT NULL,
  `PCATEGORY` varchar(50) NOT NULL,
  `PTAG` text NOT NULL,
  `PCONTENT` text NOT NULL,
  `PIMG` varchar(100) NOT NULL,
  `ANAME` varchar(10) NOT NULL,
  `TIME` date NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`PID`, `PTITLE`, `PCATEGORY`, `PTAG`, `PCONTENT`, `PIMG`, `ANAME`, `TIME`) VALUES
(1, 'A new Theory of Dream Function', '9', 'Telling dreams enhances empathy towards the dreamer', 'Telling dreams enhances empathy towards the dreamer:We propose that dreaming has been selected for during evolution so that the fictional emotional simulation can be told to others after waking. The benefits of the simulation to the dreamer occur not during sleep but due to enhanced interpersonal bonding and, in particular, enhanced empathy towards the dreamer.   ', 'postimage/i-have-a-dream.jpg', 'admin', '2018-03-11'),
(2, 'Chemtrails may protect vaccine', '9', 'In a new study coming out of Brown University, researchers concluded that being sprayed with chemtrails actually has a positive effect.', 'In a new study coming out of Brown University, researchers concluded that being sprayed with chemtrails actually has a positive effect when it comes to vaccine injuries.\n\n“We sprayed chemtrails over 3 different cities in Rhode Island and then followed children in those cities for 4 years,” said Dr. Frank Defano. “We saw a strikingly lower rate of vaccine injuries in the children from the chemtrail laden cities than the normal population.”', 'postimage/image028.jpg', 'admin', '2018-03-11'),
(3, 'Nanodrops - Replaces Eyeglasses', '5', 'The recently patented “nanodrops” has been found to improve the vision in pigs.', 'The recently patented “nanodrops” has been found to improve the vision in pigs. Clinical testing on humans will be carried out later this year.Israeli Ophthalmologists Invents Revolutionary Eyedrops that could Replace Eyeglasses.', 'postimage/nano_eyedropping__2_resize_md.jpg', 'admin', '2018-03-11'),
(4, 'Chalkboard to  Learn Word', '12', 'Owura Kwadwo, a teacher in Ghana, put his background in visual arts to good use and started teaching ICT by using a chalkboard.', 'Owura Kwadwo, a teacher in Ghana, put his background in visual arts to good use and started teaching ICT by using a chalkboard.A Ghana teacher has been teaching “Information and Communications Technology” on a chalkboard and has gained global attention for doing so. \n\nAfter his Facebook post, the school which lacked the resources to buy computers has been inundated with offers of donations of laptops. ', 'postimage/ghana-microsoft-teacher-3_resize_md.jpg', 'admin', '2018-03-11'),
(5, 'Interesting Facts about  Pyramids', '8', 'Pyramids always remained a mystery to man.', 'Pyramids always remained a mystery to man. Even in 2018, we are discovering more about these ancient man made marvels. Much to surprise, with every discovery we are realizing that there is more to uncover than ever before!\n\nThe Pyramid of Giza was built 4500 years ago in Egypt, yet it remained as the tallest man-made building until the 19th century. That means it stood its place as the tallest building for 3800 years!\n\nThe baffling thing about these ancient pyramids is the Egyptians ability to build something so gigantic with prehistoric building methods!\n\nHow many pyramids are still standing on the earth? 5 or 10? No, the number is well more than 5000!  ', 'postimage/the-great-pyramid-of-giza1_resize_md.jpg', 'admin', '2018-03-11'),
(6, 'Bees Build Stunning Spiral Hives', '1', 'The Spiral Design of the Bee Hive.', 'The Spiral Design of the Bee Hive.The hives do not resemble those found in other bee populations in a number of ways:\n\n• The hives have an intricate, clockwise spiraling design.\n\n• Each hive features only one entrance.\n\n• The hive entrances are coated with a pathogen-blocking sticky layer, an extra line of defense for the bees which, according to Heard, “do not have a sting although they can give you a little bite with their jaws.”', 'postimage/Bees.jpg', 'admin', '2018-03-11'),
(7, 'Apple - Chinese legal process', '5', 'Apple Announces It Will Store Chinese iCloud Keys in China, Leading to Privacy Fears.', 'Apple Announces It Will Store Chinese iCloud Keys in China, Leading to Privacy Fears.Apple will move iCloud encryption keys for Chinese users to China, which can potentially enable the country’s authorities to access the data via the Chinese legal process.\nHowever, Chinese authorities can access data much easier through this move, industry experts say. The encryption keys were stored in the US before. This meant that if anyone wanted to access iCloud data without the assistance of the user, they would have to go through the US legal system.\n', 'postimage/apple-logo-store_resize_md.jpg', 'admin', '2018-03-11'),
(8, 'Pioneering Engg Students to Watch', '12', 'The ophthalmic prostheses manufactured all over the world are made of glass or acrylic and they do not even come close to looking real.', 'The ophthalmic prostheses manufactured all over the world are made of glass or acrylic and they do not even come close to looking real. Moreover, they are quite expensive and take hours to be manufactured.\n\nOnd&#345;ej Vocílka, a pioneering mechanical engineer studying in VUT Brno, revolutionized the process by using 3D printers to develop eye prosthesis. Vocilka himself suffers eye disability.\n\nHe scanned existing prosthesis and printed it using photopolymer material. He used PolyJet technology to give prosthesis colors and texture.\n\nThe 3D printed prosthesis is inexpensive and even easy to produce. Ond&#345;ej Vocílka was honored with Bosch Award for his accomplishment.', 'postimage/eye-prosthetics_resize_md.jpg', 'admin', '2018-03-11'),
(10, 'Godfather of Computer Gaming', '8', 'Sid Meier is one of the most influential and important computer game developers of all time.', 'Sid Meier is one of the most influential and important computer game developers of all time. His contributions to the industry have rightfully earned him the title "Godfather of Computer Gaming".He has been instrumental in the world of computer game design and created one of the most important and popular computer game series of all time, Civilization.\n\nHis contributions to the computer gaming industry have rightfully earned him the nickname "The Godfather of Computer Gaming".\n\nHe has been awarded many accolades throughout his career for his contributions to the computer games industry.\n\nHe has, in no small part, been involved in the production of many strategy and simulation games. ', 'postimage/god_father_of_Games_resize_md.jpg', 'admin', '2018-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `FNAME` varchar(30) NOT NULL,
  `UNAME` varchar(30) NOT NULL,
  `UPASS` varchar(30) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `CONTACT` varchar(30) NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `FNAME`, `UNAME`, `UPASS`, `EMAIL`, `CONTACT`, `STATUS`) VALUES
(1, 'Gayathri R', 'Yathri', '12345 ', 'yathriga9666@gmail.com', '9629196806 ', 1),
(2, 'Harish Chander', 'Hari', '12345 ', 'hari@gmail.com', '9688848433 ', 1),
(3, 'Raghavendra Rao', 'Rao', '12345', 'raokr1944@gmail.com', '9363322770', 1),
(4, 'Girija Rao', 'Giri', '12345', 'girija@gmail.com', '9487205792', 1),
(5, 'Varshini Ram', 'Varshini', '12345', 'varshiniram@gmail.com', '8745693210', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

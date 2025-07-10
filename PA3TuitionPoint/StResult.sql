-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2021 at 11:42 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17448203_pa3tuitiondbname`
--

-- --------------------------------------------------------

--
-- Table structure for table `StResult`
--

CREATE TABLE `StResult` (
  `ID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Class` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ExamDate` date NOT NULL,
  `Subject` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Level` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TotMarks` int(11) NOT NULL,
  `MarksObtained` decimal(11,0) NOT NULL,
  `Percentage` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `StResult`
--

INSERT INTO `StResult` (`ID`, `Class`, `ExamDate`, `Subject`, `Level`, `TotMarks`, `MarksObtained`, `Percentage`) VALUES
('Anshu_7', '', '2021-08-11', 'Math', 'L-1, Chapter: 12 , Algebraic expression', 100, 0, 0),
('Nandani_7', '', '2021-08-11', 'Math', 'L-1, Chapter: 12 , Algebraic expression', 100, 46, 46),
('Sinigdha_7', '', '2021-08-11', 'Math', 'L-1, Chapter: 12 , Algebraic expression', 100, 24, 24),
('Anshu_7', '', '2021-08-17', 'Math', 'L-1, Chapter: 1 , Integers', 80, 7, 9),
('Nandani_7', '', '2021-08-17', 'Math', 'L-1, Chapter: 1 , Integers', 80, 69, 86),
('Riya_7', '', '2021-08-17', 'Math', 'L-1, Chapter: 1 , Integers', 80, 39, 49),
('Shrestha_7', '', '2021-08-17', 'Math', 'L-1, Chapter: 1 , Integers', 80, 41, 51),
('Sinigdha_7', '', '2021-08-17', 'Math', 'L-1, Chapter: 1 , Integers', 80, 16, 19),
('Abhijeet_8', '', '2021-08-20', 'Math', 'L-1, Chapter: 1, Rational Number', 60, 32, 53),
('Aniket_8', '', '2021-08-20', 'Math', 'L-1, Chapter: 1, Rational Number', 60, 57, 95),
('Ayushi_8', '', '2021-08-20', 'Math', 'L-1, Chapter: 1, Rational Number', 60, 22, 36),
('Darshika_8', '', '2021-08-20', 'Math', 'L-1, Chapter: 1, Rational Number', 60, 8, 13),
('Divyansh_8', '', '2021-08-20', 'Math', 'L-1, Chapter: 1, Rational Number', 60, 8, 13),
('Rakshit_8', '', '2021-08-20', 'Math', 'L-1, Chapter: 1, Rational Number', 60, 13, 21),
('Vansh_8', '', '2021-08-20', 'Math', 'L-1, Chapter: 1, Rational Number', 60, 7, 12),
('Karan_9', '', '2021-08-20', 'ALlSubjects', 'L-2, Chapter: 1, Number Systems', 120, 36, 30),
('Suraj_9', '', '2021-08-20', 'ALlSubjects', 'L-2, Chapter: 1, Number Systems', 120, 35, 29),
('Abhay_9', '', '2021-08-20', 'ALlSubjects', 'L-2, Chapter: 1, Number Systems', 120, 18, 15);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2020 at 02:14 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cwsd`
--

-- --------------------------------------------------------

--
-- Table structure for table `senior_citizen`
--

CREATE TABLE `senior_citizen` (
  `id` int(11) NOT NULL,
  `sc_id` varchar(255) NOT NULL,
  `family_name` varchar(255) NOT NULL,
  `given_name` varchar(255) NOT NULL,
  `middle_initial` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `purok` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `printed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `senior_citizen`
--

INSERT INTO `senior_citizen` (`id`, `sc_id`, `family_name`, `given_name`, `middle_initial`, `date_of_birth`, `gender`, `age`, `civil_status`, `purok`, `barangay`, `signature`, `picture`, `qr_code`, `printed`) VALUES
(1, '30677\r\n', 'GRENGIA\r\n', 'GALICIANO\r\n', 'F\r\n', '06/25/1938\r\n', 'M\r\n', '82\r\n', 'MARRIED\r\n', '3\r\n', 'DULANGAN\r\n', 'placeholder', 'placeholder', 'placeholder', '6/27/2020'),
(2, '30675\r\n', 'DE LEON\r\n', 'SUNNY VILL\r\n', 'O\r\n', '09/10/1954\r\n', 'M\r\n', '65\r\n', '', '65\r\n', 'DULANGAN\r\n', '', '', '', ''),
(3, '30111\r\n', 'MORENO\r\n', 'CERINIA\r\n', 'A\r\n', '11/01/1954\r\n', 'F\r\n', '65\r\n', 'MARRIED\r\n', '3\r\n', 'DULANGAN\r\n', 'placeholder', 'placeholder', 'placeholder', ''),
(4, '30284\r\n', 'OMPOG\r\n', 'ROBERTO\r\n', 'E\r\n', '06/07/1956\r\n', 'M\r\n', '63\r\n', 'MARRIED\r\n', '', 'DULANGAN\r\n', '', 'placeholder', '', ''),
(5, '30674\r\n', 'TABACON\r\n', 'ELIZABET\r\n', 'G\r\n', '03/18/1959\r\n', 'F\r\n', '61\r\n', 'SINGLE\r\n', '5\r\n', 'DULANGAN\r\n', '', '', 'placeholder', ''),
(6, '30673\r\n', 'LUANG\r\n', 'MA. CONCEPTION\r\n', 'T\r\n', '01/28/1960\r\n', 'F\r\n', '60\r\n', 'MARRIED\r\n', 'KITONG\r\n', 'DAWIS\r\n', 'placeholder', 'placeholder', 'placeholder', '6/27/2020'),
(7, '\r\n', 'PANTINOPLE\r\n', 'SUSANA', 'R\r\n', '09/12/1959\r\n', 'F\r\n', '60\r\n', 'MARRIED\r\n', 'BARILIS\r\n', 'DAWIS\r\n', 'placeholder', 'placeholder', '', ''),
(8, '30659\r\n', 'MINA\r\n', 'IMELDA\r\n', 'L\r\n', '12/12/1959\r\n', 'F\r\n', '60\r\n', 'MARRIED\r\n', 'MAYA-MAYA\r\n', 'DAWIS\r\n', '', 'placeholder', '', ''),
(9, '30426\r\n', 'ORBODO\r\n', 'RODRIGO\r\n', 'Z\r\n', '11/05/1955\r\n', 'M\r\n', '64\r\n', '\r\n', 'LAPU-LAPU\r\n', 'DAWIS\r\n', 'placeholder', '', 'placeholder', ''),
(10, '30660\r\n', 'DRILON\r\n', 'BIENUENIDA\r\n', 'S\r\n', '05/02/1960\r\n', 'F\r\n', '60\r\n', 'MARRIED\r\n', 'MAYA-MAYA\r\n', 'DAWIS\r\n', '', '', '', ''),
(11, '30211\r\n', 'GELVERO\r\n', 'PURITA\r\n', 'A\r\n', '02/06/1957\r\n', 'F\r\n', '68\r\n', 'MARRIED\r\n', 'MAYA-MAYA\r\n', 'DAWIS\r\n', 'placeholder', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `senior_citizen`
--
ALTER TABLE `senior_citizen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `senior_citizen`
--
ALTER TABLE `senior_citizen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

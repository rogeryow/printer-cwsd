-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 02:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hive`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `id` int(11) NOT NULL,
  `barangay` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`id`, `barangay`) VALUES
(1, 'APLAYA'),
(2, 'BALABAG'),
(3, 'BINATON'),
(4, 'COGON'),
(5, 'COLORADO'),
(6, 'DAWIS'),
(7, 'KAPATAGAN'),
(8, 'KIAGOT'),
(9, 'MAHAYAHAY'),
(10, 'SAN AGUSTIN'),
(11, 'SAN MIGUEL'),
(12, 'LUNGAG'),
(13, 'SINAWILAN'),
(14, 'MATTI'),
(15, 'SAN JOSE'),
(16, 'TRES DE MAYO'),
(17, 'SAN ROQUE'),
(18, 'TIGUMAN'),
(19, 'ZONE 2'),
(20, 'ZONE 1'),
(21, 'ZONE 3');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `abbreviation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(7, 'Agents', 'Calling Helpline'),
(8, 'Admin', 'Handling Data');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(255) NOT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `peak_leader_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `membership_status`
--

CREATE TABLE `membership_status` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `peak_leader`
--

CREATE TABLE `peak_leader` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `purok` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `purok`
--

CREATE TABLE `purok` (
  `id` int(11) NOT NULL,
  `barangay_id` int(11) DEFAULT NULL,
  `purok` varchar(255) DEFAULT NULL,
  `president` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `purok`
--

INSERT INTO `purok` (`id`, `barangay_id`, `purok`, `president`) VALUES
(1, 1, 'Purok 1', 'Mrs. Rosa Maria B. Catalon'),
(2, 1, 'Purok 2', 'Mrs. Margielyn C. Aton'),
(3, 1, 'Purok 3', 'Mrs. Evelyn M. Rebosura'),
(4, 1, 'Purok 4', 'Mrs. ErlindaV. Capili'),
(5, 1, 'Purok 5', 'Mr. Edwin Q. Cenita'),
(6, 1, 'Purok 6', 'Mr. Federico S. Salvaña, Sr.'),
(7, 1, 'Purok 7', 'Mr. Alexander G. Tabora'),
(8, 1, 'Purok 7-A', 'Mr. Rogelio G. Plantas'),
(9, 1, 'Purok 8', 'Mr. Roger R. Ramil'),
(10, 1, 'Purok 9', 'Mr. Rogelio Y. Dumagan'),
(11, 1, 'Purok 9-A', 'Mr. Jeremias C. Capuyan'),
(12, 1, 'Purok 10', 'Mrs. Bernardeta B. Diva'),
(13, 1, 'Purok 11', 'Mr. Teotimo V. Abrasaldo, Jr.'),
(14, 1, 'Purok 12', 'Mr. Michael Clarence Ll. Liva'),
(15, 2, 'Lumboy', 'Mr. Julito Legaspino'),
(16, 2, 'Kaimito', 'Mr. Edito Marzado'),
(17, 2, 'Mangga', 'Mr. Roy Rafailes'),
(18, 2, 'Durian', 'Mr. Rolando Mayormita'),
(19, 2, 'Cashew', 'Mrs. Alma Mohammad'),
(20, 2, 'Rambutan', 'Mr. Eliano Adang'),
(21, 2, 'Buongon', 'Mr. Rogelio Eblamo'),
(22, 2, 'Lansones', 'Mr. Renato Agrabio'),
(23, 3, 'Purok Nagkahiusa', 'Mr. Maximo Torres'),
(24, 3, 'Purok Mabuhay', 'Mr. Roger Dizon'),
(25, 3, 'Purok Pag-asa', 'Mr. Perfecto Revilla'),
(26, 3, 'Purok Lansones', 'Telly Ebad'),
(27, 3, 'Purok Marangan', 'Mr. Romeo Lambas'),
(28, 3, 'Purok Palma', 'Mr. Florino Valdez'),
(29, 3, 'Purok Durian', 'Mr. Ernesto Sambawa'),
(30, 3, 'Purok Anthurium', 'Mr. Benjie Dumayhag'),
(31, 3, 'Purok Mangga', 'Mr. Ricky Landas'),
(32, 3, 'Purok Bajada', 'Mrs. Baby Jerlina U. Owok'),
(33, 3, 'Purok Balate', 'Mrs. Adela Manapol'),
(34, 3, 'Purok Nangka', 'Mr. Loreto Unggan'),
(35, 3, 'Purok Gemilina', 'Mrs. Lita Endar'),
(36, 3, 'Purok Mabolo', 'Mr. Nestor Bago'),
(37, 3, 'Purok Duranta', 'Mrs. Pacita M. Etik'),
(38, 3, 'Purok Panaghiusa', 'Mr. Renato Ambe'),
(39, 3, 'Purok Kampana', 'Mr. Gaudencio Guinang'),
(40, 3, 'Purok Narra', 'Mr. Edelmero Oton'),
(41, 4, 'Purok Butterfly', 'Mr. Dominador Florentino'),
(42, 4, 'Purok Mangga', 'Mr. Alejandrino Alcontin'),
(43, 4, 'Purok San Francisco', 'Mrs. Beinvenida Mamolo'),
(44, 4, 'Purok Acacia', 'Mrs. Anabelle Castro'),
(45, 4, 'Purok Gemelina', 'Mr. Aurelio Batulanon'),
(46, 4, 'Purok Calachuchi', 'Mr. Nestor dalumpines'),
(47, 4, 'Purok Ipil-Ipil', 'Mr. Crisologo Mondal'),
(48, 4, 'Purok Mahogany', 'Mr. Celso Borlasa'),
(49, 4, 'Purok Kalubihan', 'Mrs. Lourdes Rollon'),
(50, 4, 'Purok Calumpang', 'Mrs. Josephine Payan'),
(51, 4, 'Purok Owangon', 'Mrs. Lolita Estancia'),
(52, 4, 'Purok Caimito', 'Mr. Agustin Haresco'),
(53, 4, 'Purok Talisay', 'Mr. Celso Briones'),
(54, 4, 'Purok Malabago', 'Mrs. Charita Masocol'),
(55, 4, 'Purok Hanapbuhay', 'Mr. Ben Tahil'),
(56, 4, 'Purok Tabing-Ilog', 'Mrs. Myrna Pajeje'),
(57, 4, 'Purok Bakhaw', 'Mrs. Josepa Pragamac'),
(58, 4, 'Purok Molave', 'Mr. Ursolo Memoracion'),
(59, 4, 'Purok Pag-asa', 'Mr. Sonny Inot'),
(60, 4, 'Purok Bermuda', 'Mr. Teodoro Marquez'),
(61, 4, 'Purok Laminusa', 'Mr. Wilson Jupli'),
(62, 4, 'Purok Kalingkatan', 'Mr. Darkin Saipudin'),
(63, 5, 'Purok Vanda', 'Mr. Juanito L. Calma'),
(64, 5, 'PurokGemilina', 'Mrs. Merlita P. Rojo'),
(65, 5, 'Purok Palmera', 'Mr. Norberto G. Labitad, Sr.'),
(66, 5, 'Purok Anahaw', 'Mr. Alfeo A. Fuentes'),
(67, 5, 'Purok Paradise', 'Mrs. Gervacia P. Baton'),
(68, 5, 'Purok Bougainvilla', 'Mrs. Elizabeth Brillante'),
(69, 5, 'Purok San France', 'Mrs. Ma. Lelenit D. Sucayre'),
(70, 6, 'Purok Tangigue', 'Mr. Albert Sabandal'),
(72, 6, 'Purok Talakitok', 'Mr. Rosendo Quijano'),
(73, 6, 'Purok Lapu-lapu', 'Mrs. Cecilia R. Payan'),
(74, 6, 'Purok Kitong', 'Mr. Lauro Monreal'),
(75, 6, 'Purok Bolinao', 'Mr. Dennis Dagohoy'),
(76, 6, 'Purok Barongoy', 'Mr. Guillermo P. Carta'),
(77, 6, 'Purok Bariles', 'Mr. Rolando M. Latasa'),
(78, 6, 'Purok Mayamay', 'Mrs. Norma T. Navaja'),
(79, 6, 'Purok Bangus', 'Mr. Efren Bringuer'),
(80, 7, 'Purok Teril', 'Mr. Cristituto Amancio'),
(81, 7, 'Purok Lower Baras', 'Mr. Virgilio Tomaquin'),
(82, 7, 'Purok Upper Baras', 'Mr. Mateo Ampo'),
(83, 7, 'Kinambulan', 'Mr. Ramil Camansi'),
(84, 7, 'Mabuhay', 'Mr. Emerito Cabasag Sr.'),
(85, 7, 'Purok Pag-asa - 1 SHOP', 'Mr. Cristituto Banac'),
(86, 7, 'Purok Pag-asa - 2 SHOP', 'Mr. Rolando Amacio Sr.'),
(87, 7, 'Purok Kidaran', 'Mr. Honesto Gemina'),
(88, 7, 'Purok Palosingko - 1', 'Mr. Angelito Pantil'),
(89, 7, 'Purok Palosingko - 2', 'Mr. George Lomigo Sr.'),
(90, 7, 'Purok Bayanihan - 1', 'Mr. Crispulo Aquino Jr.'),
(91, 7, 'Purok Bayanihan - 2', 'Mr. Jesus Olarte Jr.'),
(92, 7, 'Purok Mt. Apo - 1', 'Mr. Rodolfo T. Amoroso'),
(93, 7, 'Purok Mt. Apo - 2', 'Mr. Celso Ballesteros'),
(94, 7, 'Purok Mt. Apo - 3', 'Mr. Joey T. Giger'),
(95, 7, 'Purok Cadena de Amor - 1', 'Mr. Jose Diaz'),
(96, 7, 'Purok Cadena de Amor - 2', 'Mr. Fernando Buhawe'),
(97, 7, 'Purok Rose of Sharon - 1', 'Mr. Danny Ambe'),
(98, 7, 'Purok Rose of Sharon - 2', 'Mr. Monico Bangay'),
(99, 7, 'Purok East Maharlika', 'Mr. Wilfredo Carpin'),
(100, 7, 'Purok West Maharlika', 'Mr. Bernardo Satohito Jr.'),
(101, 7, 'Purok Maharlika', 'Mr. Jose Elso Tumlad'),
(102, 7, 'Purok Palo - 10', 'Mr. Segundino Pagod'),
(103, 7, 'Purok Palo - 20', 'Mr. Vicente Masong'),
(104, 7, 'Purok Sampaguita - 1', 'Mr. Romeo Amar'),
(105, 7, 'Purok Sampaguita - 2', 'Mr. Ricardo Ramos'),
(106, 7, 'Purok Sto. Niño', 'Mr. Paterno Jarabelo Jr.'),
(107, 7, 'Purok Mauswagon', 'Mr. Raymudo Manlabe Sr.'),
(108, 7, 'Purok Everlasting', 'Mrs. Lilibeth Enanoria'),
(109, 7, 'purok Xampo - 1', 'Mr. Dante Doctor'),
(110, 7, 'Purok Campo - 2', 'Mr. Necomedes Eran'),
(111, 7, 'Purok Campo - 3', 'Mr. Catalino Rellon Jr.'),
(112, 7, 'Purok Campo - 4', 'Mr. Salvador Caintic'),
(113, 7, 'Purok Balatikan', 'Mr. Renato Castillo'),
(114, 7, 'Purok Lutangan', 'Mrs. Melinda Along'),
(115, 7, 'Purok Dalisay - 1', 'Mr. Jose Dalapo'),
(116, 7, 'Purok Dalisay - 2', 'Mr. Martin Salise'),
(117, 7, 'Purok Calamohoy - 1', 'Mr. Felix Pugosa'),
(118, 7, 'Purok Calamohoy - 2', 'Mr. Patricio Palomar'),
(119, 7, 'Purok Kahayag - 1', 'Mr. Roel Taran Sr.'),
(120, 7, 'Purok Kahayag - 2 ', 'Mrs. Marilou Calija'),
(121, 7, 'Purok Tagumpay - 1', 'Mr. Marcelino dela Rosa Jr.'),
(122, 7, 'Purok Tagumapay - 2', 'Mr. Gerry Abool'),
(123, 7, 'Purok Pag-ibig - 1', 'Mr. Teodoro Bagni Jr.'),
(124, 7, 'Purok Pag-ibig - 2', 'Mr. Alejandro Manibloc'),
(125, 7, 'Purok Pag-ibig - 3', 'Mr. Rolando Corpuz'),
(126, 7, 'Purok Bugac-Bacoco', 'Mrs. Canesia Ramos'),
(127, 7, 'Purok Sandawa-Bacoco', 'Mr. Jethrone Denaque'),
(128, 7, 'Purok Mainit - 1', 'Mr. Javier Sorima'),
(129, 7, 'Purok Mainit - 2', 'Mr. Julian Repusposa'),
(130, 7, 'Purok Mainit - 3', 'Mrs. Alberta Bulusan'),
(131, 7, 'Purok Paradise', 'Mr. Juanito Castro'),
(133, 7, 'Purok Sampaguita - 3', 'Mr. Jose Traña'),
(134, 7, 'Purok Sabwag', 'Mr. Claudio Carin\r\n'),
(135, 8, 'Purok Labana', 'Mr. Felimon Padillo'),
(136, 8, 'Purok Nangkaan', 'Mr. galileo Alcuizar'),
(137, 8, 'Purok Geleta', 'Mr. Michael Gabutero'),
(138, 8, 'Purok Ipil-Ipil', 'Mrs. Gina Castillo'),
(139, 8, 'Purok Atis', 'Mr. Jeremias Mistula'),
(140, 8, 'Purok Flying-A', 'Mrs. Luz P. Inta'),
(141, 8, 'Purok Duldol', 'Mr. Romeo Aballe'),
(142, 8, 'Purok Nangkaa-2', 'Mrs. Jocelyn Villocino'),
(143, 8, 'Purok Talisay', 'Mr. Wilfredo dela Cruz'),
(144, 8, 'Purok Tapol', 'Mr. Winifred Labajo'),
(145, 8, 'Purok Chico', 'Mrs. Marivic Estrera'),
(146, 8, 'Purok Sireguelas', 'Mr. Raynante Romagos'),
(147, 8, 'Purok Mangga', 'Mr. Rizaldy Sarguilla'),
(148, 8, 'Purok Lower', 'Mr. Joel Reusora'),
(149, 9, 'Purok Acacia', 'Mr. Estrllo G. Villamor'),
(150, 9, 'Purok Mangga', 'Mr. Jimmy R. Veronas'),
(151, 9, 'Purok Mahogany', 'Mr. Mario Y. Navarro'),
(152, 9, 'Purok Lomboy', 'Mr. Jimmy c. Sedon'),
(153, 9, 'Purok Palmera', 'Mr. Leonardo Candano'),
(154, 9, 'Purok Doña Aurora', 'Mr. Rufino Arisco'),
(155, 9, 'Purok Señiorita', 'Mr. Ernesto G. Sarael'),
(156, 10, 'Purok 1-A', 'Mrs. Marlina Dionaldo'),
(157, 10, 'Purok 1-B', 'Mr. Adolfo Zoilo'),
(158, 10, 'Purok 2-A', 'Mrs. Linda Sabsal'),
(159, 10, 'Purok 2-B', 'Mr. Jimmy Superales'),
(160, 10, 'Purok 3', 'Mr. Nelson Labadia'),
(161, 10, 'Purok 4', 'Mr. Edison Bisnar'),
(162, 10, 'Purok 5', 'Mr. Teodorico Maniapao Jr.'),
(163, 10, 'Purok 6', 'Mr. Arnel Canonigo'),
(164, 10, 'Purok 7', 'Mrs. Julie Ann Nacua'),
(165, 11, 'Purok Bayabas', 'Mr. Rodrigo Noran Sr.'),
(166, 11, 'Purok Camantigue', 'Mr. Reynaldo C. Andrade'),
(167, 11, 'Purok Gemelina Centro', 'Mr. Edgar Lascuña'),
(168, 11, 'Purok Lomboy', 'Mr. Camilo Hernan'),
(169, 11, 'Purok Duranta', 'Mr. Huberto Colita'),
(170, 11, 'Purok Mangga', 'Mr. Manuel Torres'),
(171, 11, 'Purok Nangka', 'Mrs. Jenny Abogar'),
(172, 11, 'Purok Rose', 'Mr. Arman Bautista'),
(173, 11, 'Purok Pine Tree', 'Mr. Oscar T. Cinco'),
(174, 11, 'Purok Mizrach', 'Mr. Arnel Israel'),
(175, 11, 'Purok Bayanihan', 'Mr. Artemio Sayre'),
(176, 11, 'Purok Anahaw', 'Mr. Feliciano Pantil, Jr.'),
(177, 11, 'Purok Sampaguita', 'Mr. Enrique Sumergido'),
(178, 11, 'Purok Gemelina', 'Mr.. Felipe Verdad'),
(179, 11, 'Purok Rosal', 'Mr. Felix D. Ladroma'),
(180, 11, 'Purok Rambutan', 'Ambot'),
(181, 11, 'Purok Mansanitas', 'Mr. Elias Lanticse'),
(182, 11, 'Purok Mabinex', 'Mr. Vicente Moron'),
(183, 11, 'Purok Cactus', 'Mr. Romeo Arquillano'),
(184, 11, 'Purok Waling-waling', 'Mr. Redrito Moreno'),
(185, 11, 'Purok Kamansi', 'Mrs. Liza Carmelotes'),
(186, 12, 'Purok Mabuhay', 'Mrs. Marlyn F. Balolong'),
(187, 12, 'Purok Malipayon', 'Mr. Joel Alag'),
(188, 12, 'Purok Pag-asa', 'Mr. Silverio Lucero'),
(189, 13, 'Purok Tabigue', 'Mr. Hegino Limosnero'),
(190, 13, 'Purok San Vicente', 'Mr. Nonito M. Calma'),
(191, 13, 'Purok Abgao', 'Mr. Alladin M. Aldaya Sr.'),
(192, 13, 'Purok Lapu-Lapu', 'Mrs. Mary Ann D. Sobiono'),
(193, 13, 'Purok Isla-B', 'Mr. Alvin Mosqueza'),
(194, 13, 'Purok Islam', 'Mr. Alih Lalli'),
(195, 13, 'Purok Bakhaw', 'Mr. Reynante Monteroyo'),
(196, 13, 'Purok Nangka', 'Mr. Romeo Danton'),
(197, 13, 'Purok Sampaloc', 'Mr. Jose Elviña'),
(198, 13, 'Purok Talisay', 'Mr. Moises Mahusay'),
(199, 13, 'Purok Nakayama', 'Mr. Edwin Macabutas'),
(200, 13, 'Purok Sinaguelas', 'Mr. Jojo Guique'),
(201, 13, 'Purok Bayabas', 'Mrs. Divina de Gracia Maranga'),
(202, 13, 'Purok Narra', 'Mr. Leonardo Excovilla'),
(203, 13, 'Purok Pakikisama', 'Mr. Benito Lascuña'),
(204, 13, 'Purok Duranta', 'Mrs. Elizabeth Malabarbas'),
(205, 13, 'Purok Rosas', 'Mr. Emiliano Abad'),
(206, 13, 'Purok Mangga', 'Mr. Herbert Hermida'),
(207, 14, 'Purok 1', 'Mrs. Tersita Javines'),
(208, 14, 'Purok 2', 'Mrs. Virginia Gatchalian'),
(209, 14, 'Purok 2-A', 'Mr. Nonoy Legaspina'),
(210, 14, 'Purok 3', 'Mr. Teofilo Redidor'),
(211, 14, 'Purok 3-A', 'Mr. Benjamin Dones'),
(212, 14, 'Purok 3-B', 'Mr. Anaclito Timtim'),
(213, 14, 'Purok 4', 'Mr. Leon Garciano'),
(214, 14, 'Purok 5', 'Mr. Jimmy Lagrimas'),
(215, 14, 'Purok 5-A', 'Mr. Laurence Dawis'),
(216, 14, 'Purok 6', 'Mrs. Edelberta Gomez'),
(217, 14, 'Purok 7', 'Mrs. Sandy Dagode'),
(218, 15, 'Purok Mangga', 'Mr. Jose M. Cabrera'),
(219, 15, 'Purok Mango Drive', 'Mrs. Anselma Gaviola'),
(220, 15, 'Purok Pomelo', 'Mrs. Narcita Sanchez'),
(221, 15, 'Purok Nindot', 'Mr. Wilfredo C. Logronio Jr.'),
(222, 15, 'Purok Nangka', 'Mrs. Mary Ann C. Lumen'),
(223, 15, 'Purok Talisay', 'Mr. Jerry Alcasid'),
(224, 15, 'Purok Camanchile', 'Mr. Pepito A. Nisnisan'),
(225, 15, 'Purok Superhighway', 'Mr. Meliton Jurial'),
(226, 15, 'Purok Madasigon', 'Mr. Norman A. Vivero'),
(227, 15, 'Purok Batangueño', 'Mr. Eustaquio M. Roluna'),
(228, 15, 'Purok Pabalan', 'Mr. Virgilio A. Rosales'),
(229, 15, 'Purok Pioneer', 'Mr. Jacinto P. Yamomo'),
(230, 15, 'Purok Cagape', 'Mr. Jeson Maribao'),
(231, 15, 'Purok Acacia', 'Mr. Marcelo Sulotan Sr,'),
(232, 15, 'Purok Gemelina', 'Mrs. Emilia F. Dayaday'),
(233, 15, 'Purok Rose', 'Mr. Vivincio A. Labanon'),
(234, 15, 'Purok Malinawon', 'Mr. Bonifacio G. Lopez'),
(235, 15, 'Purok Jakosalem', 'Mr. Domingo G. Lopez'),
(236, 15, 'Purok Mahogany', 'Mr. Christopher Via'),
(237, 15, 'Purok Duranta', 'Mrs. Lynneth Grace Tenebro'),
(238, 15, 'Purok San Francisco', 'Mrs. Amelita Canoy'),
(239, NULL, 'Purok Papaya', ''),
(240, 16, 'Purok Papaya', 'Mr. Cirilo Lucero'),
(241, NULL, 'Purok Sampaloc', ''),
(242, NULL, 'Purok Panaghiusa', ''),
(243, 16, 'Purok Sampaloc', 'Mr. Carlos Laranjo'),
(244, NULL, 'Purok Mabuhay', ''),
(245, 16, 'Purok Panaghiusa', 'Mr. Cirilo Tañala'),
(246, NULL, 'Purok San Francisco', ''),
(247, NULL, 'Purok Sto. Niño', ''),
(248, 16, 'Purok Mabuhay', 'Mr. Gregorio Quirante'),
(249, NULL, 'Purok Manggahan', ''),
(250, NULL, 'Purok Kamansiles', ''),
(251, 16, 'Purok San Francisco', 'Mr. Nicasio Estudillo'),
(252, 16, 'Purok Sto. Niño', 'Mr. Domininciano Mangaron'),
(253, NULL, 'Purok Padema', ''),
(254, 16, 'Purok Manggahan', 'Mr. Renato Villacorte'),
(255, NULL, 'Purok Linaaw', ''),
(256, 16, 'Purok Kamansiles', 'Mr. Joseph Fuentes'),
(257, 16, 'Purok Padema', 'Mr. Bernie Letrero'),
(258, NULL, 'Purok Fortune', ''),
(259, 16, 'Purok Linaaw', 'Mr. Salvador Cañadilla'),
(260, NULL, 'Purok Sambag', ''),
(261, 16, 'Purok Fortune', 'Mrs. Evelyn Saron'),
(262, NULL, 'Purok Conte', ''),
(263, 16, 'Purok Sambag', 'Mr. Marlito Mondejar'),
(264, NULL, 'Purok Tugas', ''),
(265, 16, 'Purok Conte', 'Mr. Rodolfo Cavan'),
(266, NULL, 'Purok Santol', ''),
(267, 16, 'Purok Tugas', 'Mr. Romeo Gamat'),
(268, NULL, 'Purok Dapsa', ''),
(269, 16, 'Purok Santol', 'Mr. Felix Rosalita'),
(270, NULL, 'Purok Centro', ''),
(271, 16, 'Purok Dapsa', 'Mr. Romebal Selma'),
(272, 16, 'Purok Centro', 'Mr. Rosario Bagasol'),
(273, NULL, 'Purok Acacia', ''),
(274, 16, 'Purok Acacia', 'Mr. Rosendo Borbon'),
(275, NULL, 'Purok Pag-asa', ''),
(276, NULL, 'Purok Gemelina', ''),
(277, 16, 'Purok Pag-asa', 'Mt. Timoteo B. Caiman Jr.'),
(278, NULL, 'Purok Mahogany', ''),
(279, 16, 'Purok Gemelina', 'Mr. Teodulo Bacus'),
(280, NULL, 'Purok Madasigon', ''),
(281, NULL, 'Purok Adelfa', ''),
(282, 16, 'Purok Mahogany', 'Mrs. Pilar Mission'),
(283, NULL, 'Purok Malantawon', ''),
(284, NULL, 'Purok Duranta', ''),
(285, 16, 'Purok Madasigon', 'Mrs. Felicitas de Mesa'),
(286, NULL, 'Purok Yellow Bell', ''),
(287, 16, 'Purok Adelfa', 'Mr. Charlie Andoy'),
(288, 16, 'Purok Malantawon', 'Mr. Danilo Elesteio'),
(289, NULL, 'Purok Maabi-abihon', ''),
(290, NULL, 'Don Lorenzo Homes', ''),
(291, NULL, 'Paradise Country Homes', ''),
(292, 16, 'Purok Duranta', 'Mr. Romualdo Pastor'),
(293, NULL, 'Emily Homes subd Phase I', ''),
(294, 16, 'Purok Yellow Bell', 'Mr. Ruden Gomez'),
(295, NULL, 'Emily Homes subd Phase 2', ''),
(296, 16, 'Purok Maabi-abihon', 'Mr. Benjamin Sabud'),
(297, NULL, 'Perfect Homes Subd', ''),
(298, 16, 'Don Lorenzo Homes', 'Mrs. Yolanda Castañeda'),
(299, NULL, 'Central Plain Subd', ''),
(300, 16, 'Paradise Country Homes', 'Pstr. Winnie Dalumpines'),
(301, NULL, 'Estrada Subd', ''),
(302, 16, 'Emily Homes subd Phase I', 'Mr. Carlito Sanoria'),
(303, 16, 'Emily Homes subd Phase 2', 'Mr. Albino Angeles'),
(304, NULL, 'Conte Subd', ''),
(305, 16, 'Perfect Homes Subd', 'Pstr. Boy Tabia'),
(306, 16, 'Central Plain Subd', 'Mrs. Elizabeth Kinoc'),
(307, 16, 'Estrada Subd', 'Mr. Ricardo Canara'),
(308, 16, 'Conte Subd', 'Mr. Oscar Abajero'),
(309, 17, 'Purok Dayang-dayang', 'Mr. Luciano Bacang'),
(310, 17, 'Purok Kuratcha', 'Mr. Epifiano Nebria'),
(311, 17, 'Purok Cha-cha', 'Mr. Alejandro Repito'),
(312, 17, 'Purok Lambada', 'Mr. Ricardo Repito Jr.'),
(313, 17, 'Purok Tango', 'Mr. Amadeo Butaslac'),
(314, 17, 'Purok Tinikling', 'Mr. Noli Butaslac'),
(315, 17, 'Purok Carinosa', 'Miss Hermelinda Tungal'),
(316, 17, 'Putrok Boogie', 'Mrs. Luciana Ybañez'),
(317, 18, 'Purok Cattleya', 'Mr. Rico Vapor'),
(318, 18, 'Purok Sentennial', 'Mr. Celso Espacio'),
(319, 18, 'Purok Daisy', 'Mr. Rodrigo Binaohan'),
(320, 18, 'Purok Bombell', 'Mr. Roberto Villarico'),
(321, 18, 'Purok Sampaguita', 'Mrs. Nadya Salado'),
(322, 18, 'Purok Orchids', 'Mr. Daniboy Burgos'),
(323, 19, 'Purok Assessor\'s', 'Mr. Emmanuel Pareja'),
(324, 19, 'Purok Bayanihan', 'Mr. Nelson Sevilla'),
(325, 19, 'Purok Kahayag', 'Mrs. Angelina Mesa'),
(326, 19, 'Purok Cometa', 'Mr. Douglas Arrogante'),
(327, 19, 'Purok Kawayan', 'Mrs. Lourdes Bando'),
(328, 19, 'Purok Panaghiusa', 'Mr. Marcial Dumdum'),
(329, 19, 'Purok Pakigdait', 'Mr. Rafael Nasara'),
(330, 19, 'Purok Gemilina', 'Mr. Felomeno Sosas'),
(331, 19, 'Purok Kalayaan 2000', 'Mrs. Pastora Redoble'),
(332, 19, 'Purok Palmera', 'Mr. Pacifico Almacin'),
(333, 19, 'Purok Maya', 'Mrs. Concordia Espiritu'),
(334, 19, 'Purok Pag-asa', 'Mrs. Teotima Babao'),
(335, 19, 'Purok Nagkahiusa', 'Mr. Regino Jadman'),
(336, 19, 'Purok Salam', 'Abinal Bantuas'),
(337, 19, 'Purok Binangay', 'Mr. Gonzalo Sabanal'),
(338, 19, 'Purok Kalusugan', 'Mrs. Laureana Quijano'),
(339, 19, 'Purok Suerte', 'Mrs. Marjorie Aratan'),
(340, 19, 'Purok Laging Handa', 'Mr. Rogelio Cabiling Sr.'),
(341, 19, 'Purok Samahang Nayon', 'Mr. Marlon Macias'),
(342, 19, 'Purok Kauswagan', 'Mr. Fidel Labajo Sr.'),
(343, 19, 'Purok Akasya', 'Ambot'),
(344, 19, 'Purok Duranta', 'Mr. Romeo Bentoy'),
(345, 19, 'Purok Narra', 'Mr. Rosendo Embodo'),
(346, 19, 'Purok Sadepa', 'Mr. Dionisio Lascuña'),
(347, 19, 'Purok Maharlika', 'Mr. Armando Dancel'),
(348, 19, 'Purok Maligaya', 'Mr. Dominador Orillo'),
(349, 19, 'Purok Padillo', 'Mr. Aquilino Baña'),
(350, 19, 'Purok Paraiso', 'Mr. Virgelio Gomez'),
(351, 19, 'Purok Ubas', 'Mr. Rofolio Piquero'),
(352, 19, 'Purok Gemilina', 'Mrs. Aida Oraca'),
(353, 19, 'Purok Santan', 'Mr. Romeo Daugdaug'),
(354, 19, 'Purok San Vicente Ferrer', 'Mr. Edwin Magtabog'),
(355, 19, 'Purok Kapamilya', 'Mr. Cresencio Montebon'),
(356, 20, 'Purok Malipayon', 'Mrs. Nilda Cole'),
(357, 20, 'Purok Masipag', 'Mr. Agapito Sabugaa'),
(358, 20, 'Purok Riverside 1', 'Mr. Dante Tawi'),
(359, 20, 'Purok Manggahan', 'Mr. Ramil Danton'),
(360, 20, 'Purok Santol', 'Mr. Jayjay Medina'),
(361, 20, 'Purok Chestnut', 'Mrs. Evelyn Dumawal'),
(362, 20, 'Purok Acaciahan', 'Mrs. Violeta Orillo'),
(363, 20, 'Purok Kawayan', 'Mr. Noel Escoton'),
(364, 20, 'Purok Sampaguita', 'Mrs. Leticia Enriquez'),
(365, 20, 'Purok San Francisco', 'Mrs. Veronica Maravillas'),
(366, 20, 'Purok Rosas', 'Mrs. Lydia Bacalso'),
(367, 20, 'Purok Rosal', 'Mrs. Buenaventura Bastatas'),
(368, 20, 'Purok Palmera', 'Mrs. Miguela Casauran'),
(369, 20, 'Purok Narra', 'Mr. David Generalao'),
(370, 20, 'Purok Golden Narra', 'Mrs. Agustia Eli'),
(371, 20, 'Purok Pagtoo', 'Mr. Angelo Resauleo'),
(372, 20, 'Purok Mahogany', 'Mrs. Ana Tero'),
(373, 20, 'Purok Mangaa, Ravina', 'Mr. Lito Quinio'),
(374, 20, 'Purok Islam', 'Aleem Mo\'men Bantuas'),
(375, 20, 'Purok Kalinaw', 'Mrs. Noraina Sultan'),
(376, 20, 'Purok Durian', 'Mr. Pedro Patricio'),
(377, 20, 'Purok Gemelina', 'Mr. Alexander Casayas'),
(378, 20, 'Purok Lansones', 'Mr. Samuel Soriano'),
(379, 20, 'Purok Alum', 'Mrs. Emiliana Ferolin'),
(380, 20, 'Purok Bayabas', 'Mr. Enrico Llemit'),
(381, 20, 'Purok Silangan', 'Mr. Perfecto Aguhob'),
(382, 20, 'Purok Panaghiusa', 'Mr. Eustiquio Bastatas'),
(383, 20, 'Purok Madasigon', 'Mr. Antonio Montebon'),
(384, 20, 'Purok Laminusa', 'Mr. Dante Haman'),
(385, 20, 'Purok Mangga, Jumao-as', 'Mr. Daniel M. Tapuroc'),
(386, 20, 'Purok Chico', 'Mr. Lodevico Tampus'),
(387, 20, 'Purok Papaya', 'Mrs. Lilia Abella'),
(388, 20, 'Purok Talisay', 'Mr. Jerry C. Millanes'),
(389, 20, 'Purok Avocado', 'Mr. Francisco Junao-as'),
(390, 20, 'Purok Sambag', 'Mr. Virgilio Zapanta Jr.'),
(391, 20, 'Purok Duranta I', 'Osias Laygan'),
(392, 20, 'Purok Cattleya', 'Mrs. Lydia Taporoc'),
(393, 20, 'Purok Waling-waling', 'Mr. Felipe Lima Jr.'),
(394, 20, 'Purok Star Apple', 'Mrs. Loreta E. Zapanta'),
(395, 20, 'Purok Ypil-ypil', 'Mrs. Efren Cabrillas'),
(396, 20, 'Purok Kasaligan', 'Mr. Antonio Bastatas Jr.'),
(397, 20, 'Purok Molave', 'Mr. Arthur Ymalay'),
(398, 20, 'Purok Matamis', 'Mr. Romeo Balasbas'),
(399, 20, 'Purok Malunhggay', 'Mr. Henry Ycay'),
(400, 20, 'Purok Atis', 'Mrs. Potencia Camporedondo'),
(401, 20, 'Purok Centennial', 'Mr. Ruel Canada'),
(402, 20, 'Purok Tambis', 'Mr. Nestor Tapuroc'),
(403, 20, 'Purok Yellowbell', ' Mrs. Rosemarie Dumdum'),
(404, 20, 'Purok Labana', 'Mrs. Rosalinda Datoc'),
(405, 21, 'Purok Avocado', 'Mrs. Felisa Abordo'),
(406, 21, 'Purok Bayabas', 'Mrs. Elena Lee'),
(407, 21, 'Purok Durian', 'Mr. Dionesio Puracan'),
(408, 21, 'Purok Granada', 'Mr. Arnulfo Ramero'),
(409, 21, 'Purok Labana', 'Mr. Proceso Cabaluna'),
(410, 21, 'Purok Lansones', 'Mr. Cirilo Aldeguer Jr.'),
(411, 21, 'Purok Lomboy', 'Mr. Omaima Buat'),
(412, 21, 'Purok Mansanitas', 'Mr. Efren V. Acaso'),
(413, 21, 'Purok Mansanas', 'Mr. Rodolfo Asor'),
(414, 21, 'Purok Marang', 'Mrs. Merlita Vistal'),
(415, 21, 'Purok Mangga', 'Mr. Felimonito Villegas Jr.'),
(416, 21, 'Purok Nangka', 'Mrs. Lucy Ong'),
(417, 21, 'Purok Papaya', 'Mr. Salome Asor'),
(418, 21, 'Purok Pakwan', 'Mr. Jesril Rufo'),
(419, 21, 'Purok Pinya', 'Mrs. Nemia Abordo'),
(420, 21, 'Purok Rambutan', 'Mr. Leodoro Flores'),
(421, 21, 'Purok Saging', 'Mr. Edgardo Sadili'),
(422, 21, 'Purok Santol', 'Mr. Nicanor Dacudar'),
(423, 21, 'Purok Tambis', 'Mr. Prudencio Alviola'),
(424, 21, 'Purok Chico', 'Mr. Joevic Tolentino'),
(425, 21, 'Purok Ubas', 'Mrs. Guillerma Talinting'),
(426, 21, 'Purok Acacia', 'Mr. Jesus Dizon'),
(427, 21, 'Purok Almasiga', 'Mr. Roberto Jalalon'),
(428, 21, 'Purok Apitong', 'Mr. Samson Carungay'),
(429, 21, 'Purok Balite', 'Constante dela Cruz'),
(430, 21, 'Purok Gemilina', 'Mrs. Isidra Reponte'),
(431, 21, 'Purok Indian Tree', 'Mr. Ulysses Ontoy'),
(432, 21, 'Purok Ipil', 'Mrs. Estelita Vegafria'),
(433, 21, 'Purok Kamagong', 'Mrs. Juliet Monteclaro'),
(434, 21, 'Purok Lawaan', 'Mr. Gil Javier'),
(435, 21, 'Purok Mahogany', 'Mr. Martin San Pedro'),
(436, 21, 'Purok Molave', 'Mrs. Corazon Mascardo'),
(437, 21, 'Purok Narra', 'Mr. Samuel Perez'),
(438, 21, 'Purok Neem Tree', 'Mr. Reynelio Manuales'),
(439, 21, 'Purok Pine Tree', 'Mr. Anghel Villamor'),
(440, 21, 'Purok Talisay', 'Mr. William Calixton'),
(441, 21, 'Purok Tindalo', 'Mr. Glenn Fanugao'),
(442, 21, 'Purok Tugas', 'Mr. Orestes Ramos'),
(443, 21, 'Purok Yakal', 'Mr. Geraldo Val Niño Evangelista'),
(444, 21, 'Purok Aguila', 'Mrs. Rosalie Gella'),
(445, 21, 'Purok Gorion', 'Mr. Wolfredo Gloria Sr.'),
(446, 21, 'Purok Kalapati', 'Mrs. Virgie Cabardo'),
(447, 21, 'Purok Kalaw', 'Mrs. Amalia Caramonte'),
(448, 21, 'Purok Kingfisher', 'Mrs. Victoria Ragus'),
(449, 21, 'Purok Lovebirds', 'Mr. Camilo Cartagena'),
(450, 21, 'Purok Maya', 'Mrs. Sylvia Cartagenas'),
(451, 21, 'Purok Ostrich', 'Mr. Edwin Florentino'),
(452, 21, 'Purok Parrot', 'Mr. Fernando Posadas Sr.'),
(453, 21, 'Purok Woodpecker', 'Mr. Rodrigo Hermosura'),
(454, 21, 'Purok Tamsi', 'Mrs. Lolita Dana'),
(455, 21, 'Purok Aruana', 'Mr. Alfredo Esgana'),
(456, 21, 'Purok Balo', 'Mr. Rodolfo Beltran'),
(457, 21, 'Purok Bangus', 'Mr. Enrique Narida'),
(458, 21, 'Purok Bariles', 'Mr. Eddie Denuna'),
(459, 21, 'Purok Bolinao', 'Mr. Aquiles Alegria'),
(460, 21, 'Purok Flowerhorn', 'Mrs. Loreta Sale'),
(461, 21, 'Purok Lapu-Lapu', 'Mr. Cris Lutrania'),
(462, 21, 'Purok Maya-Maya', 'Mrs. Nilda Yamomo'),
(463, 21, 'Purok Talakitok', 'Mr. Ismael Alvarez'),
(464, 21, 'Purok Tangigue', 'Mr. Gil Pactao-in Jr.'),
(465, 21, 'Purok Tilapia', 'Mrs. Hermilia Verunque'),
(466, 21, 'Purok Ampalaya', 'Mrs. Teresita Estomata'),
(467, NULL, 'Purok Ampalaya', ''),
(468, 21, 'Purok Cabbage', 'Mr. Virgilio Aballe'),
(469, NULL, 'Purok Cabbage', ''),
(470, NULL, 'Purok Cadios', ''),
(471, 21, 'Purok Cadios', 'Mrs. Rosita Labayan'),
(472, NULL, 'Purok Carrots', ''),
(473, 21, 'Purok Carrots', 'Mr. Nicolas Alcover'),
(474, NULL, 'Purok Cauliflower', ''),
(475, 21, 'Purok Cauliflower', 'Mrs. Ceferina Gemino'),
(476, 21, 'Purok Eggplant', 'Mr. Prudencio Rivera Jr.'),
(477, NULL, 'Purok Eggplant', ''),
(478, 21, 'Purok Malunggay', 'Mrs. Judith Quibod'),
(479, NULL, 'Purok Malunggay', ''),
(480, 21, 'Purok Pako', 'Mr. Gilbert Taguba'),
(481, NULL, 'Purok Pako', ''),
(482, 21, 'Purok Pechay', 'Mrs. Rebecca Robles'),
(483, NULL, 'Purok Pechay', ''),
(484, 21, 'Purok Stringbeans', 'Mrs. Virginia Castillon'),
(485, NULL, 'Purok Stringbeans', ''),
(486, 21, 'Purok Camel', 'Mr. Wariole Ando'),
(487, 21, 'Purok Carabao', 'Mrs. Levybette Almazan'),
(488, 21, 'Purok  Cobra', 'Mr. Pido Maglasang'),
(489, 21, 'Purok Dragon', 'Mr. Loven de Leon'),
(490, 21, 'Purok Eagle', 'Mrs. Virgie Sabellano'),
(491, 21, 'Purok Jaguar', 'Mr. Aldrin Lobo'),
(492, 21, 'Purok Kabayo', 'Mrs. Anita Ganuhay'),
(493, 21, 'Purok Kangaroo', 'Mrs. Ana Villaver'),
(494, 21, 'Purok Tamaraw', 'Mrs. Virgie Perla'),
(495, 21, 'Purok Panther', 'Mr. Manuel Caniban'),
(496, 21, 'Purok Skylark', 'Mrs. Rosilyn Ramirez'),
(497, 21, 'Purok Zebra', 'Mr. Roger Selma'),
(498, 21, 'Purok Cattleya', 'Mr. Alimon Dimapundug'),
(499, NULL, 'Purok Cattleya', ''),
(500, 21, 'Purok Daisy', 'Mrs. Estrellita Briones'),
(501, NULL, 'Purok Daisy', ''),
(502, 21, 'Purok Everlasting', 'Mr. Wenceslao Colita'),
(503, NULL, 'Purok Everlasting', ''),
(504, 21, 'Purok Gumamela', 'Mrs. Julie Divine Notarte'),
(505, NULL, 'Purok Gumamela', ''),
(506, 21, 'Purok Ilang-ilang', 'Mrs. Ramona Caballero'),
(507, NULL, 'Purok Ilang-ilang', ''),
(508, 21, 'Purok Orchids', 'Mr. Ireneo Catubig'),
(509, NULL, 'Purok Orchids', ''),
(510, 21, 'Purok Sakura', 'Mrs. Arlene Caybot'),
(511, NULL, 'Purok Sakura', ''),
(512, 21, 'Purok Sampaguita', 'Mr. Michael Galagar'),
(513, NULL, 'Purok Sampaguita', ''),
(514, 21, 'Purok San Francisco', 'Mrs. Concepcion Sato'),
(515, NULL, 'Purok San Francisco', ''),
(516, 21, 'Purok Santan', 'Mrs. Cirila Dagcuta'),
(517, NULL, 'Purok Santan', ''),
(518, 21, 'Purok Vanda', 'Mrs. Elizabeth Entrina'),
(519, NULL, 'Purok Vanda', ''),
(520, 21, 'Purok Waling-waling', 'Mrs. Marita Cubero'),
(521, NULL, 'Purok Waling-waling', '');

-- --------------------------------------------------------

--
-- Table structure for table `rendered_service`
--

CREATE TABLE `rendered_service` (
  `id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `last_login` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `last_login`, `active`, `firstname`, `lastname`) VALUES
(6, 'gab04', '$2y$10$cIS5faZhwOd1ALZkUD796efKvajsbbVN2WTQc1VtSGqLFwmlzb/8S', 'gab@gmail.com', NULL, '1', 'Gabriel', 'Nieve'),
(7, 'gab04', '$2y$10$.jgoF5ZRFGBySeZ4tHqyz.KIsBQ8jZEF0Q/UfdQgJvwGL2z6nBGR.', 'oke@gmail.com', NULL, '1', 'Oke', 'Kayo');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(2, 6, 8),
(3, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `precint` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_user_info`
-- (See below for the actual view)
--
CREATE TABLE `vw_user_info` (
`id` int(11)
,`user_id` int(11)
,`group_id` int(11)
,`username` varchar(255)
,`password` varchar(255)
,`email` varchar(255)
,`last_login` varchar(255)
,`active` varchar(255)
,`firstname` varchar(255)
,`lastname` varchar(255)
,`name` varchar(255)
,`description` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_user_info`
--
DROP TABLE IF EXISTS `vw_user_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user_info`  AS  select `user_group`.`id` AS `id`,`user_group`.`user_id` AS `user_id`,`user_group`.`group_id` AS `group_id`,`users`.`username` AS `username`,`users`.`password` AS `password`,`users`.`email` AS `email`,`users`.`last_login` AS `last_login`,`users`.`active` AS `active`,`users`.`firstname` AS `firstname`,`users`.`lastname` AS `lastname`,`groups`.`name` AS `name`,`groups`.`description` AS `description` from ((`user_group` join `users` on(`user_group`.`user_id` = `users`.`id`)) join `groups` on(`user_group`.`group_id` = `groups`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `membership_status`
--
ALTER TABLE `membership_status`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `peak_leader`
--
ALTER TABLE `peak_leader`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `purok`
--
ALTER TABLE `purok`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `rendered_service`
--
ALTER TABLE `rendered_service`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership_status`
--
ALTER TABLE `membership_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peak_leader`
--
ALTER TABLE `peak_leader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purok`
--
ALTER TABLE `purok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=522;

--
-- AUTO_INCREMENT for table `rendered_service`
--
ALTER TABLE `rendered_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voter`
--
ALTER TABLE `voter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

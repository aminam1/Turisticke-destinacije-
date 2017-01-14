-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 10:06 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turisticke-destinacije`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `username` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(9, 'admin', 'tajna'),
(11, 'admin', 'tajna'),
(17, 'admin', 'tajna');

-- --------------------------------------------------------

--
-- Table structure for table `destinacije`
--

CREATE TABLE `destinacije` (
  `id` int(20) NOT NULL,
  `admin` int(20) NOT NULL,
  `naziv` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `detalji` text COLLATE utf8_slovenian_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `destinacije`
--

INSERT INTO `destinacije` (`id`, `admin`, `naziv`, `detalji`, `url`) VALUES
(24, 1, 'Sarajevo', ' MoÅ¾da je nekim posjetiteljima teÅ¡ko izgovoriti rijeÄ BaÅ¡ÄarÅ¡ija, ali svakako vrijedi pokuÅ¡ati, jer je BaÅ¡ÄarÅ¡ija zasigurno jedan od najimpresivnijih i najÅ¡armantnijih trgovinskih centara u zemlji. BaÅ¡arÅ¡ija je mjesto za trgovinu i susrete veÄ‡ od 15. vijeka jer su se karavani iz Azije, Dubrovnika i zapada ovdje sastajali da bi trgovali svojom robom.\n ', 'slike/sarajevo-zima.jpg'),
(25, 1, 'Mostar', ' Rijeka Neretva teÄe kroz sam centar. Stari grad je veoma lijep za Å¡etnju, kao i centar grada iz kojeg  se  u  svakom  pravcu  pruÅ¾a interesantan vidik na okolnu prirodu.  Dok  ste  u  Konjicu,  obavezno  proÅ¡eÄ‡ite obnovljenom  Kamenom  Ä‡uprijom, sagraÄ‘enom  1682.g.  Od  poÄetka  1900. godine  Konjic  je  poznat  po  svom drvorezbarstvu.  SrediÅ¡te  turistiÄke  ponude  Konjica  je zasigurno  BoraÄko  jezero  i  dolina GlavatiÄevo.  \n ', 'slike/mostar-most.jpg'),
(26, 1, 'Konjic', 'Rijeka Neretva teÄe kroz sam centar. Stari grad je veoma lijep za Å¡etnju, kao i centar grada iz kojeg  se  u  svakom  pravcu  pruÅ¾a interesantan vidik na okolnu prirodu.  Dok  ste  u  Konjicu,  obavezno  proÅ¡eÄ‡ite obnovljenom  Kamenom  Ä‡uprijom, sagraÄ‘enom  1682.g.  Od  poÄetka  1900. godine  Konjic  je  poznat  po  svom drvorezbarstvu.  SrediÅ¡te  turistiÄke  ponude  Konjica  je zasigurno  BoraÄko  jezero  i  dolina GlavatiÄevo.   ', 'slike/konjic-most.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(20) NOT NULL,
  `admin` int(20) NOT NULL,
  `komentar` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `admin`, `komentar`) VALUES
(5, 1, 'Dobar'),
(6, 1, 'wow'),
(8, 1, 'OVO JE KOMENTAR'),
(9, 1, 'komentar'),
(10, 1, 'Super');

-- --------------------------------------------------------

--
-- Table structure for table `kontakt`
--

CREATE TABLE `kontakt` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `poruka` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `kontakt`
--

INSERT INTO `kontakt` (`id`, `ime`, `email`, `poruka`) VALUES
(1, 'amina', '', ' '),
(2, 'amina', 'amina_mahmutovic@hotmail.com', ' poruka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinacije`
--
ALTER TABLE `destinacije`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin` (`admin`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin` (`admin`);

--
-- Indexes for table `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `destinacije`
--
ALTER TABLE `destinacije`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

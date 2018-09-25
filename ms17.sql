-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Sept 25, 2018 kell 11:47 EL
-- Serveri versioon: 10.1.34-MariaDB
-- PHP versioon: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `ms17`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `nimekiri`
--

CREATE TABLE `nimekiri` (
  `id` int(3) NOT NULL,
  `EesNimi` varchar(30) NOT NULL,
  `PereNimi` varchar(30) NOT NULL,
  `id_code` char(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Andmete tõmmistamine tabelile `nimekiri`
--

INSERT INTO `nimekiri` (`id`, `EesNimi`, `PereNimi`, `id_code`, `time`) VALUES
(10, 'Kadi', 'Kuld', '49706025714', '2018-09-11 10:58:13'),
(13, 'Endle', 'EesvÃ¤rav', '32124856791', '2018-09-11 12:53:12'),
(14, 'Endle', 'EesvÃ¤rav', '32124856791', '2018-09-11 12:53:15'),
(15, 'Endle', 'EesvÃ¤rav', '32124856791', '2018-09-18 09:42:05'),
(16, 'Endle', 'EesvÃ¤rav', '32124856791', '2018-09-18 09:57:54'),
(17, 'Endle', 'EesvÃ¤rav', '32124856791', '2018-09-18 09:57:56'),
(18, 'Endle', 'EesvÃ¤rav', '32124856791', '2018-09-18 09:58:02'),
(19, 'Endle', 'EesvÃ¤rav', '32124856791', '2018-09-18 10:53:29');

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `nimekiri`
--
ALTER TABLE `nimekiri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `nimekiri`
--
ALTER TABLE `nimekiri`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

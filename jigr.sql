-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: ian. 27, 2019 la 12:53 PM
-- Versiune server: 10.1.37-MariaDB
-- Versiune PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `jigr`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `images`
--

CREATE TABLE `images` (
  `ID` int(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `upload_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `images`
--

INSERT INTO `images` (`ID`, `image_name`, `name`, `upload_at`) VALUES
(10, 'asdasd', 'u3q5x41167i11.png', '2019-01-26 23:48:43'),
(11, 'Moonlight', '1.jpg', '2019-01-26 23:53:47'),
(12, 'Full Universe', '2.png', '2019-01-26 23:54:43'),
(13, 'Over the Hills', '3.jpg', '2019-01-26 23:53:47'),
(14, 'Sunset from Amsterdam', '4.jpg', '2019-01-26 23:53:47'),
(15, 'Underwater World', '5.jpg', '2019-01-26 23:53:47'),
(16, 'Moonlight', '1.jpg', '2019-01-26 23:53:59'),
(17, 'Full Universe', '2.png', '2019-01-26 23:54:47'),
(18, 'Over the Hills', '3.jpg', '2019-01-26 23:53:59'),
(19, 'Sunset from Amsterdam', '4.jpg', '2019-01-26 23:53:59'),
(20, 'Underwater World', '5.jpg', '2019-01-26 23:53:59');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `images`
--
ALTER TABLE `images`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

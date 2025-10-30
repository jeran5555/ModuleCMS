-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 okt 2025 om 10:39
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motoren_catalogus`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `motoren`
--

CREATE TABLE `motoren` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `afbeelding` varchar(255) NOT NULL,
  `beschrijving` text DEFAULT NULL,
  `prijs` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `motoren`
--

INSERT INTO `motoren` (`id`, `naam`, `merk`, `afbeelding`, `beschrijving`, `prijs`) VALUES
(1, 'MT-09', 'Yamaha', 'assets/images/mt09.jpg', 'Een sportieve naked bike met veel koppel.', 9999.00),
(2, 'Z900', 'Kawasaki', 'assets/images/z900.jpg', 'Krachtige viercilinder met moderne styling.', 10499.00),
(3, 'Monster', 'Ducati', 'assets/images/monster.jpg', 'Italiaans design met performance.', 12499.00),
(4, '300', 'BMW', 'assets/images/s1000r.jpg', 'Supersport prestaties in naked vorm.', 13499.00),
(5, '701 supermoto', 'Husqvarna', 'assets/images/husqy.jpg', 'krachtige crossmotor', 12999.00);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `motoren`
--
ALTER TABLE `motoren`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `motoren`
--
ALTER TABLE `motoren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

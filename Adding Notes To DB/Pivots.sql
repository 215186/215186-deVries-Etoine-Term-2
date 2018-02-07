-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Gegenereerd op: 31 jan 2018 om 14:20
-- Serverversie: 5.5.57-0+deb8u1
-- PHP-versie: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `Edportal`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Pivots`
--

CREATE TABLE IF NOT EXISTS `Pivots` (
  `note_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Gegevens worden geëxporteerd voor tabel `Pivots`
--

INSERT INTO `Pivots` (`note_id`, `tag_id`) VALUES
(21, 1),
(23, 2),
(24, 3),
(26, 3);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Pivots`
--
ALTER TABLE `Pivots`
 ADD PRIMARY KEY (`note_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

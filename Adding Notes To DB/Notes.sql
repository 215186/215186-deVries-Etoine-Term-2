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
-- Tabelstructuur voor tabel `Notes`
--

CREATE TABLE IF NOT EXISTS `Notes` (
`id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=ascii;

--
-- Gegevens worden geëxporteerd voor tabel `Notes`
--

INSERT INTO `Notes` (`id`, `date`, `title`, `content`) VALUES
(21, '', 'Start', 'Starting title'),
(22, '2017-12-13', 'ding', 'dong'),
(23, '1111-11-11', 'sdfsdf', 'fsdfsdf');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Notes`
--
ALTER TABLE `Notes`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `title` (`title`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Notes`
--
ALTER TABLE `Notes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

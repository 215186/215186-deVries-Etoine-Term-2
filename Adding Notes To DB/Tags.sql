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
-- Tabelstructuur voor tabel `Tags`
--

CREATE TABLE IF NOT EXISTS `Tags` (
`id` int(11) NOT NULL,
  `tag` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=ascii;

--
-- Gegevens worden geëxporteerd voor tabel `Tags`
--

INSERT INTO `Tags` (`id`, `tag`) VALUES
(1, 'school'),
(2, 'portal'),
(3, 'home'),
(4, 'tox'),
(5, 'ao17');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Tags`
--
ALTER TABLE `Tags`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Tags`
--
ALTER TABLE `Tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

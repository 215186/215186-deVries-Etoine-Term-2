-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Gegenereerd op: 31 jan 2018 om 11:39
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
-- Tabelstructuur voor tabel `quiz_opendag_database`
--

CREATE TABLE IF NOT EXISTS `quiz_opendag_database` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `score` int(11) NOT NULL,
  `score_ao` int(11) NOT NULL,
  `score_ib` int(11) NOT NULL,
  `score_mv` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=ascii;

--
-- Gegevens worden geëxporteerd voor tabel `quiz_opendag_database`
--

INSERT INTO `quiz_opendag_database` (`id`, `name`, `last_name`, `score`, `score_ao`, `score_ib`, `score_mv`) VALUES
(30, 'anonymous_F', 'anonymous_L', -6, 79, 0, 21),
(33, 'marco', 'Kommerie', 5, 83, 17, 0),
(36, 'anonymous_F', 'anonymous_L', -3, 90, 0, 10),
(37, 'Maico', 'langhout', -1, 97, 0, 3),
(39, 'anonymous_F', 'anonymous_L', 5, 82, 18, 0),
(40, 'Rutger', 'Pesman', 8, 71, 29, 0),
(41, 'anonymous_F', 'anonymous_L', 3, 88, 12, 0),
(42, 'anonymous_F', 'anonymous_L', 4, 85, 15, 0),
(43, 'anonymous_F', 'anonymous_L', 13, 54, 46, 0),
(44, 'Eugene', 'van Dolderen', 3, 88, 12, 0),
(46, 'anonymous_F', 'anonymous_L', -3, 89, 0, 11),
(47, 'jeroen', 'van der veen', 8, 71, 29, 0),
(48, 'ik', 'dus', 6, 79, 21, 0),
(49, 'Jethro', 'Oosterkamp', 5, 82, 18, 0),
(50, 'Eveline', 'Oosterkamp', 0, 100, 0, 0),
(51, 'agnes', 'liebers', 4, 85, 15, 0),
(52, 'anonymous_F', 'anonymous_L', 7, 72, 28, 0),
(53, 'Aniela ', 'Nitkowska', 5, 82, 18, 0),
(54, 'anonymous_F', 'anonymous_L', 0, 100, 0, 0),
(55, 'anonymous_F', 'anonymous_L', 0, 100, 0, 0),
(56, 'jorick', 'Toornstra', 5, 81, 19, 0),
(57, 'Marc', '', 7, 75, 25, 0),
(58, 'anonymous_F', 'anonymous_L', 11, 62, 38, 0),
(59, '', '', 0, 100, 0, 0),
(60, '', '', 0, 100, 0, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `quiz_opendag_database`
--
ALTER TABLE `quiz_opendag_database`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `quiz_opendag_database`
--
ALTER TABLE `quiz_opendag_database`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

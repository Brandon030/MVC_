-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 mei 2020 om 15:31
-- Serverversie: 10.1.30-MariaDB
-- PHP-versie: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `excellenttaste`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
--

CREATE TABLE `bestellingen` (
  `bestelling_id` int(11) NOT NULL,
  `tafel` int(11) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `tijd` time DEFAULT NULL,
  `menuItemCode` varchar(4) DEFAULT NULL,
  `aantal` int(11) DEFAULT NULL,
  `prijs` decimal(5,2) DEFAULT NULL,
  `reservering_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bestellingen`
--

INSERT INTO `bestellingen` (`bestelling_id`, `tafel`, `datum`, `tijd`, `menuItemCode`, `aantal`, `prijs`, `reservering_id`) VALUES
(1, 2, '2019-12-06', '18:00:00', 'bief', 1, '12.75', NULL),
(2, 2, '2019-12-08', '16:15:23', 'bief', 1, '12.75', NULL),
(3, 2, '2019-12-08', '22:53:08', 'kofi', 1, '2.75', NULL),
(4, 2, '2019-12-08', '22:53:19', 'frd1', 1, '2.50', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bon`
--

CREATE TABLE `bon` (
  `tafel` int(11) NOT NULL,
  `datum` date NOT NULL,
  `tijd` time NOT NULL,
  `betaalwijze` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gerechten`
--

CREATE TABLE `gerechten` (
  `gerechtCode` varchar(3) NOT NULL,
  `gerechtNamen` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gerechten`
--

INSERT INTO `gerechten` (`gerechtCode`, `gerechtNamen`) VALUES
('dri', 'drinken'),
('ete', 'eten');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `Klant_id` int(11) NOT NULL,
  `Klantnamen` varchar(30) DEFAULT NULL,
  `Telefoon` varchar(15) DEFAULT NULL,
  `Email` varchar(130) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`Klant_id`, `Klantnamen`, `Telefoon`, `Email`, `status`) VALUES
(1, 'jansen', '06-6666666', 'jeeeee@www.nl', 0),
(2, 'fag', 'fffff', 'ff', 1),
(3, 'baf', 'fff', 'ff', 1),
(4, 'hassan', '062222222', 'd', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menuitems`
--

CREATE TABLE `menuitems` (
  `menuItemCode` varchar(4) NOT NULL,
  `menuItemNaam` varchar(30) DEFAULT NULL,
  `prijs` decimal(5,2) DEFAULT NULL,
  `subGerechtCode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `menuitems`
--

INSERT INTO `menuitems` (`menuItemCode`, `menuItemNaam`, `prijs`, `subGerechtCode`) VALUES
('bie1', 'heinniken', '2.95', 'alho'),
('bief', 'biefstuk', '12.75', 'hoge'),
('frd1', 'cola', '2.50', 'frdr'),
('kofi', 'douwe egberts', '2.75', 'wadr'),
('soft', 'softijs', '8.95', 'nage'),
('toso', 'tomatensoep', '5.75', 'voge');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reserveringen`
--

CREATE TABLE `reserveringen` (
  `reservering_id` int(11) NOT NULL,
  `tafel` int(11) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `tijd` time DEFAULT NULL,
  `aantal_k` int(11) DEFAULT NULL,
  `aantal` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `klant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `reserveringen`
--

INSERT INTO `reserveringen` (`reservering_id`, `tafel`, `datum`, `tijd`, `aantal_k`, `aantal`, `status`, `klant_id`) VALUES
(3, 2, '2019-12-06', '18:00:00', 1, 2, 0, 3),
(5, 2, '2020-04-20', '18:30:00', 4, 2, 0, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subgerechten`
--

CREATE TABLE `subgerechten` (
  `subGerechtCode` varchar(10) NOT NULL,
  `subGerechtNamen` varchar(20) DEFAULT NULL,
  `gerechtCode` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `subgerechten`
--

INSERT INTO `subgerechten` (`subGerechtCode`, `subGerechtNamen`, `gerechtCode`) VALUES
('alho', 'alcohol', 'dri'),
('frdr', 'frisdrank', 'dri'),
('hoge', 'hoofdgerecht', 'ete'),
('nage', 'nagerecht', 'ete'),
('voge', 'voorgerecht', 'ete'),
('wadr', 'warm drinken', 'dri');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`bestelling_id`),
  ADD KEY `menuItemCode` (`menuItemCode`),
  ADD KEY `reservering_id` (`reservering_id`);

--
-- Indexen voor tabel `bon`
--
ALTER TABLE `bon`
  ADD PRIMARY KEY (`tafel`,`datum`,`tijd`);

--
-- Indexen voor tabel `gerechten`
--
ALTER TABLE `gerechten`
  ADD PRIMARY KEY (`gerechtCode`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`Klant_id`);

--
-- Indexen voor tabel `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`menuItemCode`),
  ADD KEY `subGerechtCode` (`subGerechtCode`);

--
-- Indexen voor tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD PRIMARY KEY (`reservering_id`),
  ADD KEY `klant_id` (`klant_id`);

--
-- Indexen voor tabel `subgerechten`
--
ALTER TABLE `subgerechten`
  ADD PRIMARY KEY (`subGerechtCode`),
  ADD KEY `gerechtCode` (`gerechtCode`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `bestelling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `Klant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  MODIFY `reservering_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `bestellingen_ibfk_1` FOREIGN KEY (`menuItemCode`) REFERENCES `menuitems` (`menuItemCode`),
  ADD CONSTRAINT `bestellingen_ibfk_2` FOREIGN KEY (`reservering_id`) REFERENCES `reserveringen` (`reservering_id`);

--
-- Beperkingen voor tabel `menuitems`
--
ALTER TABLE `menuitems`
  ADD CONSTRAINT `menuitems_ibfk_1` FOREIGN KEY (`subGerechtCode`) REFERENCES `subgerechten` (`subGerechtCode`);

--
-- Beperkingen voor tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD CONSTRAINT `reserveringen_ibfk_1` FOREIGN KEY (`klant_id`) REFERENCES `klanten` (`Klant_id`);

--
-- Beperkingen voor tabel `subgerechten`
--
ALTER TABLE `subgerechten`
  ADD CONSTRAINT `subgerechten_ibfk_1` FOREIGN KEY (`gerechtCode`) REFERENCES `gerechten` (`gerechtCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

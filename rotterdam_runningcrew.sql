-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 mrt 2019 om 11:53
-- Serverversie: 10.1.35-MariaDB
-- PHP-versie: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rotterdam runningcrew`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `begeleider`
--

CREATE TABLE `begeleider` (
  `idbegeleider` int(11) NOT NULL,
  `voornaam` varchar(20) NOT NULL,
  `tussenvoegsel` varchar(7) NOT NULL,
  `achternaam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `begeleider`
--

INSERT INTO `begeleider` (`idbegeleider`, `voornaam`, `tussenvoegsel`, `achternaam`) VALUES
(1, 'Rhody', '', 'Crans'),
(2, 'Robin', '', 'Fase'),
(3, 'Mika', '', 'Weerts'),
(4, 'Rinish', '', 'Harpal'),
(5, 'Mike', '', 'Vogel'),
(6, 'Kylian', '', 'Slager'),
(7, 'Mees', 'de', 'Vries'),
(8, 'Ricardo', 'van', 'Bergen'),
(9, 'Nathan', '', 'Bloemen'),
(10, 'Beau', 'de', 'Jong'),
(11, 'Arjan', '', 'Jansen'),
(12, 'Virgel', 'van ', 'Dijk'),
(13, 'Alex', '', 'Visser'),
(14, 'Jamie', '', 'Bakker'),
(15, 'Geertruida', '', 'Smit'),
(16, 'Bryan', '', 'Mulder'),
(17, 'Danniele', '', 'Kok'),
(18, 'Anniek', 'de ', 'Wit'),
(19, 'Christel', 'de', 'Haan'),
(20, 'Dana', 'de', 'Graaf');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `begeleidt`
--

CREATE TABLE `begeleidt` (
  `idbegeleidt` int(11) NOT NULL,
  `idbegeleider` int(11) NOT NULL,
  `idrun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `begeleidt`
--

INSERT INTO `begeleidt` (`idbegeleidt`, `idbegeleider`, `idrun`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 5),
(4, 2, 1),
(5, 3, 1),
(6, 3, 6),
(7, 3, 8),
(8, 1, 10),
(9, 1, 9),
(10, 1, 8),
(11, 2, 3),
(12, 2, 4),
(13, 2, 7),
(14, 2, 8),
(15, 2, 11),
(16, 3, 10),
(17, 3, 9),
(18, 3, 11),
(19, 3, 7),
(20, 4, 2),
(21, 4, 3),
(22, 4, 5),
(23, 4, 6),
(24, 4, 9),
(25, 4, 11),
(26, 5, 4),
(27, 5, 5),
(28, 5, 9),
(29, 6, 2),
(30, 6, 5),
(31, 7, 6),
(32, 7, 8),
(33, 8, 4),
(34, 9, 1),
(35, 9, 7),
(36, 10, 11),
(37, 11, 3),
(38, 11, 6),
(39, 11, 9),
(40, 12, 11),
(41, 13, 10),
(42, 13, 4),
(43, 14, 5),
(44, 15, 3),
(45, 16, 8),
(46, 17, 2),
(47, 17, 8),
(48, 18, 11),
(49, 19, 3),
(50, 20, 3),
(51, 20, 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `deelname`
--

CREATE TABLE `deelname` (
  `deelname_nummer` int(11) NOT NULL,
  `deelame_datum` date NOT NULL,
  `idrun` int(11) NOT NULL,
  `idhardlopers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `deelname`
--

INSERT INTO `deelname` (`deelname_nummer`, `deelame_datum`, `idrun`, `idhardlopers`) VALUES
(21, '2017-10-10', 1, 1),
(22, '2017-10-10', 1, 2),
(23, '2018-07-15', 4, 3),
(24, '2018-02-05', 2, 4),
(25, '2017-11-05', 4, 5),
(26, '2018-05-20', 11, 6),
(27, '2018-02-05', 3, 6),
(28, '2017-12-18', 9, 7),
(28, '2017-12-18', 9, 7),
(29, '2018-06-10', 8, 10),
(30, '2018-04-01', 7, 8),
(31, '2018-05-06', 3, 9),
(32, '2018-05-14', 2, 11),
(33, '2018-03-14', 5, 12),
(34, '2018-02-04', 11, 13),
(35, '2017-11-07', 4, 14),
(36, '2017-11-07', 2, 15),
(37, '2018-11-01', 2, 17),
(38, '2018-11-04', 3, 18),
(39, '2018-08-05', 6, 19),
(40, '2018-03-19', 10, 20),
(41, '2018-06-12', 10, 21),
(42, '2018-05-06', 1, 22),
(43, '2017-11-07', 2, 9),
(44, '2018-06-10', 3, 23),
(45, '2018-10-08', 3, 1),
(46, '2018-08-05', 5, 2),
(47, '2018-08-12', 3, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `hardlopers`
--

CREATE TABLE `hardlopers` (
  `idhardlopers` int(11) NOT NULL,
  `voornaam` varchar(14) NOT NULL,
  `tussenvoegsel` varchar(7) NOT NULL,
  `achternaam` varchar(25) NOT NULL,
  `adress` varchar(34) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `woonplaats` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `hardlopers`
--

INSERT INTO `hardlopers` (`idhardlopers`, `voornaam`, `tussenvoegsel`, `achternaam`, `adress`, `postcode`, `woonplaats`) VALUES
(1, 'Remco ', ' de', 'Reus ', 'Arnout van Westenrijklaan 12', '3201MB', 'Spijkenisse'),
(2, 'Marco', 'de', 'Reus', 'Arnout van Westenrijklaan 12', '3201MB', 'Spijkenisse'),
(3, 'Geert', '', 'Vossen', 'Prins Alexanderlaan 50 ', '3067GB', 'Rotterdam'),
(4, 'Melissa', 'van', 'Boekel', 'West-Varkenoordseweg 139', '3074HN', 'Rotterdam'),
(5, 'Andre', '', 'Verschuur', 'Molenstraat 30 ', '3221AH', 'Hellevoetsluis'),
(6, 'Nadia', 'van', 'Duinen', 'Betedal 6 ', '3124NA', 'Schiedam'),
(7, 'Dirk', '', 'Terschelling', 'Ribeslaan 23', '3121AR', 'Schiedam'),
(8, 'Tim', 'van', 'Duinen ', 'Betedal 6', '3124NA', 'Schiedam'),
(9, 'Piet', '', 'Paulusma', 'Moorststraat 24', '2561GH', 'Dordrecht'),
(10, 'Jimmy ', '', 'Christensen', 'Kosstraat', '4201HB', 'Haarlem'),
(11, 'Max', 'van der', 'Boom', 'Kosstraat 48', '4207GH', 'Haarlem'),
(12, 'Lex', '', 'Bommer', 'Lexusstraat 108', '3126', 'Rotterdam'),
(13, 'Saskia', '', 'Bommer', 'Lexusstraat 108', '3126', 'Rotterdam'),
(14, 'Stefan', '', 'Hilgers', 'Rivierlaan 8', '3421MD', 'Spijkenisse'),
(15, 'Richard', 'van ', 'Buuren', 'Ufuxstraat 26', '3145BG', 'Den  haag'),
(16, 'Michiel', 'de ', 'Koning', 'Herkusstraat 56', '3423BG', 'Den haag'),
(17, 'Rhody', '', 'Boersma', 'Polostraat 6', '3456HS', 'Gouda'),
(18, 'Mike', 'van', 'Bergen', 'Herderstraat 5', '3456QG', 'Hellevoetsluis'),
(19, 'Mees', '', 'Koningstein', 'Dorpstraat 46', '5201MH', 'Rhoon'),
(20, 'Lucas', '', 'Kastanje', 'Thederstraat 2', '2890KB', 'Poortugaal'),
(21, 'Geertruida', '', 'Maanster', 'Plantstraat 6', '3456HF', 'Poortugaal'),
(22, 'Lucas', '', 'Mooy', 'Heerkesstraat', '3190KT', 'Rotterdam'),
(23, 'Roxan', '', 'Nieuwburg', 'Schouwstraat 1', '3652SW', 'Rhoon');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `runs`
--

CREATE TABLE `runs` (
  `idrun` int(11) NOT NULL,
  `naam` varchar(20) NOT NULL,
  `begin_locatie` varchar(30) NOT NULL,
  `eind_locatie` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `runs`
--

INSERT INTO `runs` (`idrun`, `naam`, `begin_locatie`, `eind_locatie`) VALUES
(1, 'Blijdorp run', 'parkeerterein blijdo', 'ingang blijdorp'),
(2, 'De Willemsbrug run', 'Willemsbrug', 'Willemsbrugstraat '),
(3, 'Luxor Marathon', 'sterrestraat 6', 'Nieuw Luxor'),
(4, 'Lichtjes Run', 'Stadshuisplein', 'conrelis Rotterdam'),
(5, 'Kunsthal Night Light', 'maanstraat 1', 'kunsthal Rotterdam'),
(6, 'De Politierun', 'Voorwateringweg 22', 'Nieuw Tebregge'),
(7, 'De Hockey Run', 'Hockey club RRC', 'Voornestraat 4'),
(8, 'Kasteel run', 'Sparta stadion', 'Sparta stadion'),
(9, 'Garage Run', 'Schouwburgplein', 'Schouwburgplein'),
(10, 'Plaswijck park run', 'Plaswijck park', 'Plaswijck park'),
(11, 'De Kuip run', 'Stadion Feyenoord', 'Stadion Feyenoord');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `begeleidt`
--
ALTER TABLE `begeleidt`
  ADD PRIMARY KEY (`idbegeleidt`);

--
-- Indexen voor tabel `hardlopers`
--
ALTER TABLE `hardlopers`
  ADD PRIMARY KEY (`idhardlopers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

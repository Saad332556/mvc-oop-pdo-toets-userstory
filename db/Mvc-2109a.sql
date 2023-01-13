-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 13 jan 2023 om 01:11
-- Serverversie: 5.7.31
-- PHP-versie: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Mvc-2109a`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Auto`
--

DROP TABLE IF EXISTS `Auto`;
CREATE TABLE IF NOT EXISTS `Auto` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Kenteken` varchar(10) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `InstructeurId1` int(10) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Auto_IntructeurId1_Instructeur1_Id` (`InstructeurId1`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Auto`
--

INSERT INTO `Auto` (`Id`, `Kenteken`, `Type`, `InstructeurId1`) VALUES
(1, 'AU-67-IO', 'Golf', 3),
(2, 'TH-78-KL', 'Ferrari', 2),
(3, '90-KL-TR', 'Fiat 500', 4),
(4, 'YY-OP-78', 'Mercedes', 5),
(5, 'ST-FZ-28', 'Citroën', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `capitalCity` varchar(300) NOT NULL,
  `continent` enum('Afrika','Antarctica','Azië','Australië/Oceanië','Europa','Noord-Amerika','Zuid-Amerika') NOT NULL,
  `population` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `country`
--

INSERT INTO `country` (`id`, `name`, `capitalCity`, `continent`, `population`) VALUES
(1, 'Nederland', 'Amsterdam', 'Zuid-Amerika', 17134873),
(2, 'Rwandass', 'Kigaliess', 'Europa', 129522193),
(3, 'Chili', 'Santiago', 'Zuid-Amerika', 19116201),
(4, 'Canada', 'Ottawa', 'Noord-Amerika', 37742154),
(5, 'Australië', 'Canberra', 'Australië/Oceanië', 25499884),
(6, 'China', 'Beijing', 'Azië', 1439323776),
(7, '-', '-', 'Antarctica', 10000);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Instructeur`
--

DROP TABLE IF EXISTS `Instructeur`;
CREATE TABLE IF NOT EXISTS `Instructeur` (
  `Id` tinyint(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `Naam` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Instructeur`
--

INSERT INTO `Instructeur` (`Id`, `Email`, `Naam`) VALUES
(1, 'groen@email.nl', 'Groen'),
(2, 'konijn@google.com', 'Konijn'),
(3, 'frasi@google.sp', 'Frasi');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Instructeur1`
--

DROP TABLE IF EXISTS `Instructeur1`;
CREATE TABLE IF NOT EXISTS `Instructeur1` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Instructeur1`
--

INSERT INTO `Instructeur1` (`Id`, `Naam`, `Email`) VALUES
(1, 'Groen', 'groen@gmail.com'),
(2, 'Manhoi', 'manhoi@gmail.com'),
(3, 'Zoyi', 'zoyi@gmail.com'),
(4, 'Berthold', 'berthold@gmail.com'),
(5, 'Denekamp', 'denekomp@gmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Leerling`
--

DROP TABLE IF EXISTS `Leerling`;
CREATE TABLE IF NOT EXISTS `Leerling` (
  `Id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Naam` varchar(60) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Leerling`
--

INSERT INTO `Leerling` (`Id`, `Naam`) VALUES
(3, 'Konijn'),
(4, 'Slavink'),
(6, 'Otto');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Les`
--

DROP TABLE IF EXISTS `Les`;
CREATE TABLE IF NOT EXISTS `Les` (
  `Id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `DatumTijd` datetime NOT NULL,
  `LeerlingId` mediumint(8) UNSIGNED NOT NULL,
  `InstructeurId` tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Les_LeerlingId_Leerling_Id` (`LeerlingId`),
  KEY `FK_Les_InstructeurId_Instructeur_Id` (`InstructeurId`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Les`
--

INSERT INTO `Les` (`Id`, `DatumTijd`, `LeerlingId`, `InstructeurId`) VALUES
(45, '2022-05-20 14:00:00', 3, 1),
(46, '2022-05-20 10:00:00', 6, 3),
(47, '2022-05-21 13:00:00', 4, 2),
(48, '2022-05-21 17:00:00', 6, 3),
(49, '2022-05-22 11:00:00', 3, 1),
(50, '2022-05-28 19:00:00', 4, 2),
(51, '2022-06-01 20:00:00', 3, 2),
(52, '2022-06-12 08:00:00', 3, 1),
(53, '2022-06-22 12:00:00', 3, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Mankement`
--

DROP TABLE IF EXISTS `Mankement`;
CREATE TABLE IF NOT EXISTS `Mankement` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `AutoId` int(10) NOT NULL,
  `Datum` date NOT NULL,
  `Mankement` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Mankement_AutoId_Auto_Id` (`AutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Mankement`
--

INSERT INTO `Mankement` (`Id`, `AutoId`, `Datum`, `Mankement`) VALUES
(1, 4, '2023-01-04', 'Profiel rechterband minder dan 2 mm'),
(2, 2, '2023-01-02', 'Rechter achterlicht kapot'),
(3, 1, '2023-01-02', 'Spiegel links afgebroken'),
(4, 2, '2023-01-06', 'Bumper rechtsachter ingedeukt'),
(5, 2, '2023-01-08', 'Radio kapot'),
(6, 2, '2023-01-12', 'Lekke band'),
(7, 2, '2023-01-13', 'test'),
(8, 2, '2023-01-13', 'test2'),
(9, 2, '2023-01-13', 'test3'),
(10, 2, '2023-01-13', 'test 4');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Onderwerp`
--

DROP TABLE IF EXISTS `Onderwerp`;
CREATE TABLE IF NOT EXISTS `Onderwerp` (
  `Id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `LesId` mediumint(8) UNSIGNED NOT NULL,
  `Onderwerp` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Onderwerp_LesId_Les_Id` (`LesId`)
) ENGINE=InnoDB AUTO_INCREMENT=2351 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Onderwerp`
--

INSERT INTO `Onderwerp` (`Id`, `LesId`, `Onderwerp`) VALUES
(2343, 45, 'File parkeren'),
(2344, 46, 'Achteruit rijden'),
(2345, 49, 'File parkeren'),
(2346, 49, 'Invoegen snelweg'),
(2347, 50, 'Achteruit rijden'),
(2348, 52, 'Achteruit rijden'),
(2349, 52, 'Invoegen snelweg'),
(2350, 52, 'File parkeren');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Opmerking`
--

DROP TABLE IF EXISTS `Opmerking`;
CREATE TABLE IF NOT EXISTS `Opmerking` (
  `Id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `LesId` mediumint(8) UNSIGNED NOT NULL,
  `Opmerking` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Opmerking_LesId_Les_Id` (`LesId`)
) ENGINE=InnoDB AUTO_INCREMENT=1130 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Opmerking`
--

INSERT INTO `Opmerking` (`Id`, `LesId`, `Opmerking`) VALUES
(1123, 45, 'File parkeren kan beter'),
(1124, 46, 'Beter in spiegel kijken'),
(1125, 49, 'Opletten op aankomend verkeer'),
(1126, 49, 'Langer doorrijden bij invoegen'),
(1127, 50, 'Langzaam aan'),
(1128, 52, 'Beter in spiegels kijken'),
(1129, 52, 'richtingaanwijzer aan');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `password`) VALUES
(1, 'rra', 'rra@mboutrecht.nl', 'Geheim!'),
(2, 'hsok', 'hsok@mboutrecht.nl', 'Geheim!');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `Auto`
--
ALTER TABLE `Auto`
  ADD CONSTRAINT `FK_Auto_IntructeurId1_Instructeur1_Id` FOREIGN KEY (`InstructeurId1`) REFERENCES `Instructeur1` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `Les`
--
ALTER TABLE `Les`
  ADD CONSTRAINT `FK_Les_InstructeurId_Instructeur_Id` FOREIGN KEY (`InstructeurId`) REFERENCES `Instructeur` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Les_LeerlingId_Leerling_Id` FOREIGN KEY (`LeerlingId`) REFERENCES `Leerling` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `Mankement`
--
ALTER TABLE `Mankement`
  ADD CONSTRAINT `FK_Mankement_AutoId_Auto_Id` FOREIGN KEY (`AutoId`) REFERENCES `Auto` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `Onderwerp`
--
ALTER TABLE `Onderwerp`
  ADD CONSTRAINT `FK_Onderwerp_LesId_Les_Id` FOREIGN KEY (`LesId`) REFERENCES `Les` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `Opmerking`
--
ALTER TABLE `Opmerking`
  ADD CONSTRAINT `FK_Opmerking_LesId_Les_Id` FOREIGN KEY (`LesId`) REFERENCES `Les` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Gegenereerd op: 29 mrt 2023 om 06:50
-- Serverversie: 10.4.27-MariaDB-1:10.4.27+maria~ubu2004
-- PHP-versie: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `receptenboek`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Gebruiker`
--

CREATE TABLE `Gebruiker` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` varchar(100) NOT NULL DEFAULT 'Gebruiker',
  `geslacht` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Gebruiker`
--

INSERT INTO `Gebruiker` (`id`, `first_name`, `last_name`, `email`, `password`, `rol`, `geslacht`) VALUES
(1, 'Jeffrey', 'Koper', 'jeffrey.koper@hotmail.com', 'Banaan34', 'Developer', 'Man'),
(2, 'Cornelius', 'Arne', 'Cornelius.Arne@Novacollege.nl', 'Kipcorn12', 'Projectleider', 'Man'),
(3, 'David', 'Oudheusden', 'odvanoudheusden@novacollege.nl', 'Bartsimpson55', 'Begeleider', 'Man'),
(5, 'Edwin', 'Koper', 'ekoper66@gmail.com', 'goedemorgen12', 'Gebruiker', 'man'),
(6, 'Anja', 'Schoen', 'a.koper@icloud.com', 'Anja456', 'Gebruiker', 'Vrouw');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Ingredienten`
--

CREATE TABLE `Ingredienten` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Ingredienten`
--

INSERT INTO `Ingredienten` (`id`, `naam`) VALUES
(1, 'Rundvlees'),
(2, 'Tomaten'),
(5, 'Augurken'),
(6, 'Ui'),
(9, 'Broodjes'),
(10, 'Kaas'),
(11, 'Sla'),
(12, 'Mayonaise'),
(13, 'Ketchup'),
(14, 'Mosterd'),
(15, 'Water'),
(16, 'Hotdog broodjes'),
(17, 'Hotdog worstjes'),
(18, 'Appel');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Recepten`
--

CREATE TABLE `Recepten` (
  `id` int(11) NOT NULL,
  `gerecht_naam` varchar(100) NOT NULL,
  `beschrijving` varchar(10000) NOT NULL,
  `afbeelding` varchar(100) DEFAULT NULL,
  `tijdsduur` varchar(100) NOT NULL,
  `menugang` varchar(100) NOT NULL,
  `moeilijksheidgraad` varchar(100) NOT NULL,
  `gebruiker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Recepten`
--

INSERT INTO `Recepten` (`id`, `gerecht_naam`, `beschrijving`, `afbeelding`, `tijdsduur`, `menugang`, `moeilijksheidgraad`, `gebruiker_id`) VALUES
(1, 'Hamburger', 'Stap 1: Maak de hamburger. Neem ongeveer 100-150 gram gemalen rundvlees en vorm het tot een burger met een diameter van ongeveer 10 cm. Druk de burger niet te hard samen, anders wordt de burger taai. <br><br>Stap 2: Verwarm een koekenpan of grillpan op middelhoog vuur en vet hem lichtjes in met olie.<br><br>Stap 3: Breng de hamburger op smaak met zout en peper en leg hem in de pan of op de grill. Bak de burger aan beide kanten ongeveer 3-4 minuten, of tot hij de gewenste gaarheid heeft bereikt.<br><br>Stap 4: Terwijl de hamburger bakt, snijd je de tomaten en uien in plakjes en was je de sla. Snijd ook het hamburgerbroodje doormidden.<br><br>Stap 5: Wanneer de hamburger gaar is, leg je er een plakje kaas op en laat je deze smelten.<br><br>Stap 6: Smeer de onderkant van het hamburgerbroodje in met mayonaise, mosterd en/of ketchup en leg er wat sla op.<br><br>Stap 7: Leg de hamburger op de sla en voeg vervolgens de uien en tomaten toe.<br><br>Stap 8: Voeg eventueel nog extra saus toe, leg de bovenkant van het hamburgerbroodje erop en serveer direct.', 'images/Hamburger.png', '25 minuten', 'Hoofdgerecht', 'Gemiddeld', 1),
(2, 'Hotdogs', 'Stap 1: Vul een kookpan met water en breng het aan de kook op hoog vuur.<br><br>\r\n\r\nStap 2: Voeg de hotdog worstjes toe aan het kokende water en laat ze ongeveer 5 minuten koken, of tot ze gaar zijn. Roer af en toe voorzichtig met een tang of vork om de worstjes gelijkmatig te koken.\r\n<br><br>\r\nStap 3: Terwijl de worstjes koken, open je de hotdog broodjes en leg je ze op een bord of dienblad.<br><br>\r\n\r\nStap 4: Bereid je toppings voor: snij ui en augurken in kleine stukjes en leg ze in aparte bakjes.<br><br>\r\n\r\nStap 5: Wanneer de worstjes gaar zijn, haal je ze voorzichtig uit de kookpan met een tang of vork en leg je ze op een bord of dienblad.<br><br>\r\n\r\nStap 6: Plaats een hotdog worstje in het midden van elk hotdog broodje.<br><br>\r\n\r\nStap 7: Voeg ketchup en mosterd toe aan elke hotdog naar smaak.<br><br>\r\n\r\nStap 8: Voeg eventueel gesneden ui en augurken toe bovenop de sauzen.', 'images/Hotdog.png', '20 Minuten', 'Hoofdgerecht', 'Eenvoudig', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Recept_Ingredienten`
--

CREATE TABLE `Recept_Ingredienten` (
  `recept.id` int(11) NOT NULL,
  `ingredienten.id` int(11) NOT NULL,
  `hoeveelheid` varchar(100) NOT NULL,
  `verplicht` tinyint(1) NOT NULL COMMENT '0 = keuze, 1 = verplicht'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Recept_Ingredienten`
--

INSERT INTO `Recept_Ingredienten` (`recept.id`, `ingredienten.id`, `hoeveelheid`, `verplicht`) VALUES
(1, 1, '150 gram', 1),
(1, 2, '1 paar', 0),
(1, 5, '2 stuk', 0),
(1, 6, '1/4 stuk', 0),
(1, 9, '1 paar', 1),
(1, 10, '2 plakjes', 0),
(1, 11, '1 handvol', 0),
(1, 12, '1 fles', 0),
(1, 13, '1 fles', 0),
(1, 14, '1 bakje', 0),
(2, 5, '4 stuk', 0),
(2, 6, 'een handvol', 0),
(2, 12, 'een pot', 0),
(2, 13, 'een pot', 0),
(2, 14, 'een pot', 0),
(2, 16, '1 zak', 1),
(2, 17, '1 pot', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Gebruiker`
--
ALTER TABLE `Gebruiker`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `Ingredienten`
--
ALTER TABLE `Ingredienten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `Recepten`
--
ALTER TABLE `Recepten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gebruiker_id` (`gebruiker_id`);

--
-- Indexen voor tabel `Recept_Ingredienten`
--
ALTER TABLE `Recept_Ingredienten`
  ADD PRIMARY KEY (`recept.id`,`ingredienten.id`),
  ADD KEY `ingredienten.id` (`ingredienten.id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Gebruiker`
--
ALTER TABLE `Gebruiker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `Ingredienten`
--
ALTER TABLE `Ingredienten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT voor een tabel `Recepten`
--
ALTER TABLE `Recepten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `Recepten`
--
ALTER TABLE `Recepten`
  ADD CONSTRAINT `Recepten_ibfk_1` FOREIGN KEY (`gebruiker_id`) REFERENCES `Gebruiker` (`id`);

--
-- Beperkingen voor tabel `Recept_Ingredienten`
--
ALTER TABLE `Recept_Ingredienten`
  ADD CONSTRAINT `Recept_Ingredienten_ibfk_1` FOREIGN KEY (`recept.id`) REFERENCES `Recepten` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Recept_Ingredienten_ibfk_2` FOREIGN KEY (`ingredienten.id`) REFERENCES `Ingredienten` (`id`),
  ADD CONSTRAINT `Recept_Ingredienten_ibfk_3` FOREIGN KEY (`recept.id`) REFERENCES `Recepten` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

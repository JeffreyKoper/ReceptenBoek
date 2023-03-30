-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Gegenereerd op: 30 mrt 2023 om 09:34
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
(6, 'Anja', 'Schoen', 'a.koper@icloud.com', 'Anja456', 'Gebruiker', 'Vrouw'),
(7, 'DaniÃ«l', 'Bruijn', 'daniel@novacollege.nl', 'testing12', 'Gebruiker', 'man'),
(8, 'Mert', 'Babur', 'Babur@hotmail.com', 'mertypetty', 'Gebruiker', 'man');

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
(18, 'Appel'),
(20, 'Chili Peper'),
(21, 'Macaroni'),
(22, 'Boter'),
(23, 'Bloem'),
(24, 'Mosterdpoeder'),
(25, 'Zout'),
(26, 'Zwarte Peper'),
(27, 'Melk'),
(28, 'Cheddar Kaas'),
(29, 'Kippen pootjes'),
(30, 'Karnemelk'),
(31, 'Hete saus'),
(32, 'Knoflookpoeder'),
(33, 'Paprikapoeder'),
(34, 'Uipoeder'),
(35, 'Plantaardige Olie'),
(36, 'Taart deeg'),
(37, 'Kristalsuiker'),
(38, 'Kaneel'),
(39, 'Nootmuskaat'),
(40, 'Eigeel'),
(41, 'Suiker');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Recepten`
--

CREATE TABLE `Recepten` (
  `id` int(11) NOT NULL,
  `gerecht_naam` varchar(100) NOT NULL,
  `beschrijving` varchar(10000) NOT NULL,
  `afbeelding` varchar(100) DEFAULT NULL,
  `tijdsduur` int(11) NOT NULL,
  `menugang` varchar(100) NOT NULL,
  `moeilijksheidgraad` int(11) NOT NULL,
  `aantal_ingredienten` int(100) DEFAULT NULL,
  `gebruiker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Recepten`
--

INSERT INTO `Recepten` (`id`, `gerecht_naam`, `beschrijving`, `afbeelding`, `tijdsduur`, `menugang`, `moeilijksheidgraad`, `aantal_ingredienten`, `gebruiker_id`) VALUES
(1, 'Hamburger', 'Stap 1: Maak de hamburger. Neem ongeveer 100-150 gram gemalen rundvlees en vorm het tot een burger met een diameter van ongeveer 10 cm. Druk de burger niet te hard samen, anders wordt de burger taai. <br><br>Stap 2: Verwarm een koekenpan of grillpan op middelhoog vuur en vet hem lichtjes in met olie.<br><br>Stap 3: Breng de hamburger op smaak met zout en peper en leg hem in de pan of op de grill. Bak de burger aan beide kanten ongeveer 3-4 minuten, of tot hij de gewenste gaarheid heeft bereikt.<br><br>Stap 4: Terwijl de hamburger bakt, snijd je de tomaten en uien in plakjes en was je de sla. Snijd ook het hamburgerbroodje doormidden.<br><br>Stap 5: Wanneer de hamburger gaar is, leg je er een plakje kaas op en laat je deze smelten.<br><br>Stap 6: Smeer de onderkant van het hamburgerbroodje in met mayonaise, mosterd en/of ketchup en leg er wat sla op.<br><br>Stap 7: Leg de hamburger op de sla en voeg vervolgens de uien en tomaten toe.<br><br>Stap 8: Voeg eventueel nog extra saus toe, leg de bovenkant van het hamburgerbroodje erop en serveer direct.', 'Hamburger.png', 25, 'Hoofdgerecht', 2, 10, 1),
(2, 'Hotdogs', 'Stap 1: Vul een kookpan met water en breng het aan de kook op hoog vuur.<br><br>\r\n\r\nStap 2: Voeg de hotdog worstjes toe aan het kokende water en laat ze ongeveer 5 minuten koken, of tot ze gaar zijn. Roer af en toe voorzichtig met een tang of vork om de worstjes gelijkmatig te koken.\r\n<br><br>\r\nStap 3: Terwijl de worstjes koken, open je de hotdog broodjes en leg je ze op een bord of dienblad.<br><br>\r\n\r\nStap 4: Bereid je toppings voor: snij ui en augurken in kleine stukjes en leg ze in aparte bakjes.<br><br>\r\n\r\nStap 5: Wanneer de worstjes gaar zijn, haal je ze voorzichtig uit de kookpan met een tang of vork en leg je ze op een bord of dienblad.<br><br>\r\n\r\nStap 6: Plaats een hotdog worstje in het midden van elk hotdog broodje.<br><br>\r\n\r\nStap 7: Voeg ketchup en mosterd toe aan elke hotdog naar smaak.<br><br>\r\n\r\nStap 8: Voeg eventueel gesneden ui en augurken toe bovenop de sauzen.', 'Hotdog.png', 20, 'Hoofdgerecht', 1, 7, 1),
(11, 'Mac & Cheese', 'Stap 1: Kook de macaroni in een grote pan volgens de aanwijzingen op de verpakking. Giet het af en zet het opzij.  Stap 2: Smelt de boter in een grote pan op middelhoog vuur. Voeg de bloem, mosterdpoeder, zout en peper toe. Roer het mengsel constant tot het glad is en lichtbruin van kleur, ongeveer 2-3 minuten.  Stap 3: Giet de melk langzaam in het bloemmengsel terwijl je blijft roeren om klontjes te voorkomen. Kook het mengsel gedurende 5-7 minuten of tot het dikker wordt.  Stap 4: Voeg de geraspte kaas toe en roer tot het volledig is gesmolten en goed gemengd met het mengsel.  Stap 5: Voeg de gekookte macaroni toe aan de Stap kaassaus en roer het geheel goed door elkaar.  Stap 6:Verwarm de macaroni and cheese nog even kort op laag vuur tot het goed warm is.', 'Mac and cheese.jpg', 60, 'Hoofdgerecht', 2, 8, 5),
(12, 'Fried chicken', 'Stap 1: Maak de kippenstukken schoon en dep ze droog met keukenpapier. Meng de karnemelk, hete saus, knoflookpoeder, paprikapoeder, zout en zwarte peper in een grote kom en meng goed door elkaar. Voeg de kippenstukken toe en zorg ervoor dat alle stukken goed bedekt zijn met de marinade. Dek de kom af met plasticfolie en zet het in de koelkast om minstens 1 uur te marineren, maar het liefst een hele nacht.<br>  Stap 2: Maak het bloemmengsel door de bloem, zout, paprikapoeder, uipoeder, knoflookpoeder en zwarte peper te mengen in een ondiepe schaal.<br>  Stap 3: Verhit de plantaardige olie in een diepe pan of friteuse tot 175Â°C.<br>  Stap 4: Haal de kippenstukken uit de marinade en laat het overtollige vocht er af druppen. Doop de kippenstukken Ã©Ã©n voor Ã©Ã©n in het bloemmengsel en zorg ervoor dat ze goed bedekt zijn. Schud het overtollige bloemmengsel eraf.<br>  Stap 5: Leg de kippenstukken in de hete olie en frituur ze 15-20 minuten, of totdat ze goudbruin en knapperig zijn en de interne temperatuur van de kip op 75Â°C is. Draai de kippenstukken af en toe om zodat ze gelijkmatig worden gebakken.<br>  Stap 6: Haal de kippenstukken uit de olie en laat ze uitlekken op keukenpapier om het overtollige vet te absorberen. <br>', 'fried_chicken.jpg', 90, 'Hoofdgerecht', 4, 10, 6),
(13, 'Apple Pie', 'Stap 1: Verwarm de oven voor op 190 graden Celsius. Leg een rol taartdeeg in een 9-inch taartvorm en druk het deeg goed tegen de bodem en de zijkanten van de vorm. Snijd het overtollige deeg af aan de randen. <br>  Stap 2: Meng in een kom de appels, suiker, maizena, kaneel, nootmuskaat en zout tot alles goed gemengd is.<br>  Stap 3: Giet het appelmengsel in de taartvorm en verdeel het gelijkmatig. Leg de stukjes boter op het appelmengsel. <br>  Stap 4: Rol de tweede deegrol uit op een met bloem bestoven oppervlak en snijd het in reepjes van ongeveer 1,5 cm breed. Leg de reepjes over het appelmengsel in een ruitpatroon. <br>  Stap 5: Druk de randen van het bovenste deeg en het deeg aan de randen van de taartvorm samen om het af te sluiten. Snijd het overtollige deeg af. <br>  Stap 6: Bestrijk het losgeklopte eigeel over het bovenste deeg en bestrooi met extra suiker. <br>  Stap 7: Bak de taart 45-50 minuten in de voorverwarmde oven, of tot het deeg goudbruin is en het appelmengsel bubbelt. Haal de taart uit de oven en laat hem volledig afkoelen voordat je hem aansnijdt.<br>', 'Apple_Pie.jpg', 120, 'Dessert', 3, 9, 3);

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
(2, 17, '1 pot', 1),
(11, 21, '450 gram', 1),
(11, 22, '120 gram', 1),
(11, 23, '120 gram', 1),
(11, 24, '1 theelepel', 0),
(11, 25, '1/2 theelepel', 1),
(11, 26, '1/4 theelepel', 0),
(11, 27, '4 kopjes', 0),
(11, 28, '340 gram', 1),
(12, 23, '2 kopjes', 1),
(12, 25, '1 theelepel', 1),
(12, 26, '1/2 theelepel', 0),
(12, 29, '8-10 stukken', 1),
(12, 30, '1 kopje', 1),
(12, 31, '1/2 kopje', 0),
(12, 32, '1 theelepel', 1),
(12, 33, '1 theelepel', 1),
(12, 34, '1 theelepel ', 0),
(12, 35, '0,5 liter', 1),
(13, 18, '6-7 geschilde', 1),
(13, 22, '2 eetlepels', 1),
(13, 25, '1/4 theelepel', 0),
(13, 36, '2 rollen', 1),
(13, 37, '3/4 kop', 1),
(13, 38, ' 1 theelepel', 1),
(13, 39, '1/4 theelepel', 0),
(13, 40, '1', 1),
(13, 41, 'Voor optionele bestrooiing, een handvol ', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `Ingredienten`
--
ALTER TABLE `Ingredienten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT voor een tabel `Recepten`
--
ALTER TABLE `Recepten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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

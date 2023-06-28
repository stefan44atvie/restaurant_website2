-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 28. Jun 2023 um 15:59
-- Server-Version: 10.4.27-MariaDB
-- PHP-Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `Beisl`
--
CREATE DATABASE IF NOT EXISTS `Beisl` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Beisl`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `contact`
--

INSERT INTO `contact` (`contact_id`, `telephone`, `email`) VALUES
(1, ' +43 (1) 263 36 66-32', 'office@psvbeisl.at');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_start` date NOT NULL,
  `event_end` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `picture` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `openhours_day`
--

CREATE TABLE `openhours_day` (
  `open_id` int(11) NOT NULL,
  `day` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `openhours_day`
--

INSERT INTO `openhours_day` (`open_id`, `day`) VALUES
(1, 'Montag'),
(2, 'Dienstag'),
(3, 'Mittwoch'),
(4, 'Donnerstag'),
(5, 'Freitag'),
(6, 'Samstag'),
(7, 'Sonntag'),
(8, 'Feiertag');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `openhours_hour`
--

CREATE TABLE `openhours_hour` (
  `hour_id` int(11) NOT NULL,
  `hour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `openhours_hour`
--

INSERT INTO `openhours_hour` (`hour_id`, `hour`) VALUES
(1, 7),
(2, 8),
(3, 9),
(4, 10),
(5, 11),
(6, 12),
(7, 13),
(8, 14),
(9, 15),
(10, 16),
(11, 17),
(12, 18),
(13, 19),
(14, 20),
(15, 21),
(16, 22),
(17, 23),
(18, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `openhours_minute`
--

CREATE TABLE `openhours_minute` (
  `minute_id` int(11) NOT NULL,
  `minute` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `openhours_minute`
--

INSERT INTO `openhours_minute` (`minute_id`, `minute`) VALUES
(1, 0),
(2, 30);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `speisekarte`
--

CREATE TABLE `speisekarte` (
  `speisekarte_id` int(11) NOT NULL,
  `speisekarte` varchar(500) DEFAULT NULL,
  `speise_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `speisekarte`
--

INSERT INTO `speisekarte` (`speisekarte_id`, `speisekarte`, `speise_date`) VALUES
(1, 'wochenkarte.pdf', '2023-05-07'),
(2, 'speisekarte.pdf', '2023-05-07'),
(3, 'speisekarte.pdf', '2023-05-08');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `standardtexte`
--

CREATE TABLE `standardtexte` (
  `stexte_id` int(11) NOT NULL,
  `stext` varchar(2000) DEFAULT NULL,
  `fk_textart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `standardtexte`
--

INSERT INTO `standardtexte` (`stexte_id`, `stext`, `fk_textart`) VALUES
(2, 'Herzlich Willkommen hier bei uns. Wir freuen uns auf euren Besuch', 2),
(49, 'Herzlich Willkommen im Admin-Dashboard. Folgende Möglichkeiten hast hast du nun zur Verfügung', 4),
(53, 'Erstellen Sie hier einen neuen Textbaustein (Achtung: diese Kategorie darf noch nicht verwendet worden sein)', 6),
(54, 'Aktualisieren Sie die Wochenkarte...', 7),
(55, 'Erstellen Sie hier einen neuen User für das Backend-System', 8),
(56, 'Hier können Sie den gewünschten Text entweder löschen oder aktualisieren', 9),
(57, 'Aktualisieren Sie hier den gewünschten Textbaustein', 10),
(58, 'Hier kannst du die Details des gewählten Users ansehen und bestimmte Details ändern.', 11),
(59, 'Hier kannst du dir die bereits vorhandenen Textbausteine ansehen, löschen oder aktualisieren', 5),
(61, 'Herzlich Willkommen an der Alten Donau', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(1, 'admin'),
(2, 'superadmin'),
(3, 'user'),
(1, 'admin'),
(2, 'superadmin'),
(3, 'user'),
(1, 'admin'),
(2, 'superadmin'),
(3, 'user'),
(1, 'admin'),
(2, 'superadmin'),
(3, 'user');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `texte`
--

CREATE TABLE `texte` (
  `text_id` int(11) NOT NULL,
  `text` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `texte`
--

INSERT INTO `texte` (`text_id`, `text`) VALUES
(1, 'Herzlich willkommen hier bei uns. Leider haben wir zur Zeit geschlossen'),
(2, 'Herlich Willkommen hier bei uns. Wir freuen uns auf euren Besuch');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `text_2_art`
--

CREATE TABLE `text_2_art` (
  `t2a_id` int(11) NOT NULL,
  `fk_text` int(11) DEFAULT NULL,
  `fk_art` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `text_2_art`
--

INSERT INTO `text_2_art` (`t2a_id`, `fk_text`, `fk_art`) VALUES
(1, 2, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `text_art`
--

CREATE TABLE `text_art` (
  `art_id` int(11) NOT NULL,
  `textart` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `text_art`
--

INSERT INTO `text_art` (`art_id`, `textart`) VALUES
(1, 'Willkommenstext Startseite'),
(2, 'Öffnungszeiten'),
(3, 'Kommentar zu Öffnungszeiten'),
(4, 'Welcome-Text Dashboard Admin'),
(5, 'Texte Übersicht'),
(6, 'Text Create Text-Startseite'),
(7, 'Upload Wochenkarte'),
(8, '\'Create User\' - Einführungstext'),
(9, 'Details Text'),
(10, 'Update Text'),
(11, 'Details User');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `username` varchar(90) NOT NULL,
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user',
  `lastactivity` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`username`, `id`, `password`, `email`, `picture`, `status`, `lastactivity`) VALUES
('stefan', 39, '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'stefan@ruedi.at', '642c966f37962.jpg', 'adm', '2023-04-05 18:26:04'),
('Stefan', 106, '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'stefan@digitaleseele.at', '6444d5e095462.jpg', 'user', '2023-04-23 06:53:20');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wochenkarte`
--

CREATE TABLE `wochenkarte` (
  `wochenkarte_id` int(11) NOT NULL,
  `wochenkarte` varchar(500) NOT NULL,
  `wochen_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `wochenkarte`
--

INSERT INTO `wochenkarte` (`wochenkarte_id`, `wochenkarte`, `wochen_date`) VALUES
(281, 'wochenkarte.pdf', '2023-05-07'),
(282, 'wochenkarte.pdf', '2023-05-07'),
(283, 'wochenkarte.pdf', '2023-05-07'),
(284, 'wochenkarte.pdf', '2023-05-07'),
(285, 'wochenkarte.pdf', '2023-05-07'),
(286, 'wochenkarte.pdf', '2023-05-07'),
(287, 'wochenkarte.pdf', '2023-05-07'),
(288, 'wochenkarte.pdf', '2023-05-07'),
(289, 'wochenkarte.pdf', '2023-05-07'),
(290, 'wochenkarte.pdf', '2023-05-07'),
(291, 'wochenkarte.pdf', '2023-05-08'),
(292, 'wochenkarte.pdf', '2023-05-08'),
(293, 'wochenkarte.pdf', '2023-05-08'),
(294, 'wochenkarte.pdf', '2023-05-08'),
(295, 'wochenkarte.pdf', '2023-05-15');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Zeiten`
--

CREATE TABLE `Zeiten` (
  `zeiten_id` int(11) NOT NULL,
  `fk_tag_start` int(11) DEFAULT NULL,
  `fk_stunde_start` int(11) DEFAULT NULL,
  `fk_stunde_end` int(11) DEFAULT NULL,
  `fk_minute_start` int(11) DEFAULT NULL,
  `fk_minute_end` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `Zeiten`
--

INSERT INTO `Zeiten` (`zeiten_id`, `fk_tag_start`, `fk_stunde_start`, `fk_stunde_end`, `fk_minute_start`, `fk_minute_end`) VALUES
(1, 1, 6, 14, 1, 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indizes für die Tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indizes für die Tabelle `openhours_day`
--
ALTER TABLE `openhours_day`
  ADD PRIMARY KEY (`open_id`);

--
-- Indizes für die Tabelle `openhours_hour`
--
ALTER TABLE `openhours_hour`
  ADD PRIMARY KEY (`hour_id`);

--
-- Indizes für die Tabelle `openhours_minute`
--
ALTER TABLE `openhours_minute`
  ADD PRIMARY KEY (`minute_id`);

--
-- Indizes für die Tabelle `speisekarte`
--
ALTER TABLE `speisekarte`
  ADD PRIMARY KEY (`speisekarte_id`);

--
-- Indizes für die Tabelle `standardtexte`
--
ALTER TABLE `standardtexte`
  ADD PRIMARY KEY (`stexte_id`),
  ADD UNIQUE KEY `fk_textart` (`fk_textart`);

--
-- Indizes für die Tabelle `texte`
--
ALTER TABLE `texte`
  ADD PRIMARY KEY (`text_id`);

--
-- Indizes für die Tabelle `text_2_art`
--
ALTER TABLE `text_2_art`
  ADD PRIMARY KEY (`t2a_id`),
  ADD KEY `fk_text` (`fk_text`),
  ADD KEY `fk_art` (`fk_art`);

--
-- Indizes für die Tabelle `text_art`
--
ALTER TABLE `text_art`
  ADD PRIMARY KEY (`art_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `wochenkarte`
--
ALTER TABLE `wochenkarte`
  ADD PRIMARY KEY (`wochenkarte_id`);

--
-- Indizes für die Tabelle `Zeiten`
--
ALTER TABLE `Zeiten`
  ADD PRIMARY KEY (`zeiten_id`),
  ADD KEY `fk_tag_start` (`fk_tag_start`),
  ADD KEY `fk_stunde_start` (`fk_stunde_start`),
  ADD KEY `fk_stunde_end` (`fk_stunde_end`),
  ADD KEY `fk_minute_start` (`fk_minute_start`),
  ADD KEY `fk_minute_end` (`fk_minute_end`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `openhours_day`
--
ALTER TABLE `openhours_day`
  MODIFY `open_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `openhours_hour`
--
ALTER TABLE `openhours_hour`
  MODIFY `hour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT für Tabelle `openhours_minute`
--
ALTER TABLE `openhours_minute`
  MODIFY `minute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `speisekarte`
--
ALTER TABLE `speisekarte`
  MODIFY `speisekarte_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `standardtexte`
--
ALTER TABLE `standardtexte`
  MODIFY `stexte_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT für Tabelle `texte`
--
ALTER TABLE `texte`
  MODIFY `text_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `text_2_art`
--
ALTER TABLE `text_2_art`
  MODIFY `t2a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `text_art`
--
ALTER TABLE `text_art`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT für Tabelle `wochenkarte`
--
ALTER TABLE `wochenkarte`
  MODIFY `wochenkarte_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT für Tabelle `Zeiten`
--
ALTER TABLE `Zeiten`
  MODIFY `zeiten_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `standardtexte`
--
ALTER TABLE `standardtexte`
  ADD CONSTRAINT `standardtexte_ibfk_1` FOREIGN KEY (`fk_textart`) REFERENCES `text_art` (`art_id`);

--
-- Constraints der Tabelle `text_2_art`
--
ALTER TABLE `text_2_art`
  ADD CONSTRAINT `text_2_art_ibfk_1` FOREIGN KEY (`fk_text`) REFERENCES `texte` (`text_id`),
  ADD CONSTRAINT `text_2_art_ibfk_2` FOREIGN KEY (`fk_art`) REFERENCES `text_art` (`art_id`);

--
-- Constraints der Tabelle `Zeiten`
--
ALTER TABLE `Zeiten`
  ADD CONSTRAINT `zeiten_ibfk_1` FOREIGN KEY (`fk_tag_start`) REFERENCES `openhours_day` (`open_id`),
  ADD CONSTRAINT `zeiten_ibfk_2` FOREIGN KEY (`fk_stunde_start`) REFERENCES `openhours_hour` (`hour_id`),
  ADD CONSTRAINT `zeiten_ibfk_3` FOREIGN KEY (`fk_stunde_end`) REFERENCES `openhours_hour` (`hour_id`),
  ADD CONSTRAINT `zeiten_ibfk_4` FOREIGN KEY (`fk_minute_start`) REFERENCES `openhours_minute` (`minute_id`),
  ADD CONSTRAINT `zeiten_ibfk_5` FOREIGN KEY (`fk_minute_end`) REFERENCES `openhours_minute` (`minute_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

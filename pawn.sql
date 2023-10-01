-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 04. Sep 2023 um 18:05
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `pawn`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artikel`
--

CREATE TABLE `artikel` (
  `ID` int(11) NOT NULL,
  `Geschlecht` varchar(2) DEFAULT NULL,
  `Verkaufsladen` varchar(60) DEFAULT NULL,
  `Kategorie` varchar(80) DEFAULT NULL,
  `Artikelname` varchar(255) DEFAULT NULL,
  `Einkaufspreis_org` decimal(20,2) DEFAULT NULL,
  `EmpfohlenerEinkaufspreis` decimal(20,2) DEFAULT NULL,
  `Einkaufspreis` decimal(20,2) NOT NULL,
  `EmpfohlenerVerkaufspreis` decimal(20,2) DEFAULT NULL,
  `Verkaufspreis` decimal(20,2) DEFAULT NULL,
  `Bestand` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `artikel`
--

INSERT INTO `artikel` (`ID`, `Geschlecht`, `Verkaufsladen`, `Kategorie`, `Artikelname`, `Einkaufspreis_org`, `EmpfohlenerEinkaufspreis`, `Einkaufspreis`, `EmpfohlenerVerkaufspreis`, `Verkaufspreis`, `Bestand`) VALUES
(1342, 'm', 'Ponsonbys', 'Ketten', 'LS Gold Faded', 25000.00, 10000.00, 0.00, 15000.00, NULL, NULL),
(1343, 'm', 'Ponsonbys', 'Ketten', 'LS Silber mit Diamanten', 23000.00, 9200.00, 0.00, 13800.00, NULL, NULL),
(1344, 'm', 'Ponsonbys', 'Ketten', 'LS Gold mit Diamanten', 28000.00, 11200.00, 0.00, 16800.00, NULL, NULL),
(1345, 'm', 'Ponsonbys', 'Ketten', 'Platin-Felgenkette', 850.00, 340.00, 0.00, 510.00, NULL, NULL),
(1346, 'm', 'Ponsonbys', 'Ketten', 'Gold-Felgenkette', 650.00, 260.00, 0.00, 390.00, NULL, NULL),
(1347, 'm', 'Ponsonbys', 'Ketten', 'Covgari Selberkette', 3500.00, 1400.00, 0.00, 2100.00, NULL, NULL),
(1348, 'm', 'Ponsonbys', 'Ketten', 'Gaulle Goldkette', 5500.00, 2200.00, 0.00, 3300.00, NULL, NULL),
(1349, 'm', 'Ponsonbys', 'Ketten', 'Gold-Erbskette', 1500.00, 600.00, 0.00, 900.00, NULL, NULL),
(1350, 'm', 'Ponsonbys', 'Ketten', 'Platin-Erbskette', 1800.00, 720.00, 0.00, 1080.00, NULL, NULL),
(1351, 'm', 'Ponsonbys', 'Ketten', 'Hund-mit-Halskrause-Kette', 650.00, 260.00, 0.00, 390.00, NULL, NULL),
(1352, 'm', 'Ponsonbys', 'Ketten', 'Goldener LS-Anh�nger', 15000.00, 6000.00, 0.00, 9000.00, NULL, NULL),
(1353, 'm', 'Ponsonbys', 'Ketten', 'Silberner LS-Anh�nger', 15000.00, 6000.00, 0.00, 9000.00, NULL, NULL),
(1354, 'm', 'Ponsonbys', 'Ketten', 'Kupferner LS-Anh�nger', 23000.00, 9200.00, 0.00, 13800.00, NULL, NULL),
(1355, 'm', 'Ponsonbys', 'Ketten', 'LE-Chien-Pfeifen-Halskette', 1000.00, 400.00, 0.00, 600.00, NULL, NULL),
(1356, 'm', 'Ponsonbys', 'Ketten', 'Kette LS Street Font Silber', 5200.00, 2080.00, 0.00, 3120.00, NULL, NULL),
(1357, 'm', 'Ponsonbys', 'Ketten', 'Kette LS Street Font Gold Silber', 5500.00, 2200.00, 0.00, 3300.00, NULL, NULL),
(1358, 'm', 'Ponsonbys', 'Ketten', 'Platin-Brezelkette', 2800.00, 1120.00, 0.00, 1680.00, NULL, NULL),
(1359, 'm', 'Ponsonbys', 'Ketten', 'Gold-Brezelkette', 2500.00, 1000.00, 0.00, 1500.00, NULL, NULL),
(1360, 'm', 'Ponsonbys', 'Ketten', 'Platin-Radkappenkette', 850.00, 340.00, 0.00, 510.00, NULL, NULL),
(1361, 'm', 'Ponsonbys', 'Ketten', 'Gold-Radkappenkette', 650.00, 260.00, 0.00, 390.00, NULL, NULL),
(1362, 'm', 'Ponsonbys', 'Ketten', 'Zorse-Goldkette', 3250.00, 1300.00, 0.00, 1950.00, NULL, NULL),
(1363, 'm', 'Ponsonbys', 'Ketten', 'Gold-Panzerkette', 3500.00, 1400.00, 0.00, 2100.00, NULL, NULL),
(1364, 'm', 'Ponsonbys', 'Ketten', 'Wei� glasierter LS-Anh�nger', 6000.00, 2400.00, 0.00, 3600.00, NULL, NULL),
(1365, 'm', 'Ponsonbys', 'Ketten', 'Versilberter LS-Anh�nger', 22000.00, 8800.00, 0.00, 13200.00, NULL, NULL),
(1366, 'm', 'Ponsonbys', 'Ketten', 'Zweifarbiger LS-Anh�nger', 3200.00, 1280.00, 0.00, 1920.00, NULL, NULL),
(1367, 'm', 'Ponsonbys', 'Ketten', 'Kette LS Dog  Tags Gold Faded', 3800.00, 1520.00, 0.00, 2280.00, NULL, NULL),
(1368, 'm', 'Ponsonbys', 'Ketten', 'Kette LS Dog Tags Gold', 3500.00, 1400.00, 0.00, 2100.00, NULL, NULL),
(1369, 'm', 'Ponsonbys', 'Ketten', 'Kette LS Dog Tags Silber', 3200.00, 1280.00, 0.00, 1920.00, NULL, NULL),
(1370, 'm', 'Ponsonbys', 'Ketten', 'Gold-Flachpanzerkette', 3200.00, 1280.00, 0.00, 1920.00, NULL, NULL),
(1371, 'm', 'Ponsonbys', 'Ketten', 'LC-Goldkette', 5500.00, 2200.00, 0.00, 3300.00, NULL, NULL),
(1372, 'm', 'Ponsonbys', 'Ketten', 'LC-Platinkette', 6500.00, 2600.00, 0.00, 3900.00, NULL, NULL),
(1373, 'm', 'Ponsonbys', 'Ketten', 'Goldchain 2MUCH', 15000.00, 6000.00, 0.00, 9000.00, NULL, NULL),
(1374, 'm', 'Ponsonbys', 'Ketten', 'Cuban Chain \"Bleeding Heart\"', 3500.00, 1400.00, 0.00, 2100.00, NULL, NULL),
(1375, 'm', 'Ponsonbys', 'Ketten', 'Schwere Plantin-Panzerkette', 4800.00, 1920.00, 0.00, 2880.00, NULL, NULL),
(1376, 'm', 'Ponsonbys', 'Ketten', 'Goldene Hundemarke', 850.00, 340.00, 0.00, 510.00, NULL, NULL),
(1377, 'm', 'Ponsonbys', 'Ketten', 'Silberne Hundemarke', 650.00, 260.00, 0.00, 390.00, NULL, NULL),
(1378, 'm', 'Ponsonbys', 'Ketten', 'Herzschmerz-Anh�nger', 700.00, 280.00, 0.00, 420.00, NULL, NULL),
(1379, 'm', 'Ponsonbys', 'Ketten', 'Kette LS Rich Silber mit Diamanten', 23000.00, 9200.00, 0.00, 13800.00, NULL, NULL),
(1380, 'm', 'Ponsonbys', 'Ketten', 'Kette LS Rich Gold Faded', 25000.00, 10000.00, 0.00, 15000.00, NULL, NULL),
(1381, 'm', 'Ponsonbys', 'Ketten', 'Kette LS Rich Gold mit Diamanten', 28000.00, 11200.00, 0.00, 16800.00, NULL, NULL),
(1382, 'm', 'Ponsonbys', 'Ketten', 'Le Chien-Goldkette', 5500.00, 2200.00, 0.00, 3300.00, NULL, NULL),
(1383, 'm', 'Ponsonbys', 'Ketten', 'Schwere Platin-Rechteckkette', 4800.00, 1920.00, 0.00, 2880.00, NULL, NULL),
(1384, 'm', 'Ponsonbys', 'Ketten', 'Ehering Silber', 2000.00, 800.00, 0.00, 1200.00, NULL, NULL),
(1385, 'm', 'Ponsonbys', 'Ketten', 'Ehering Gold', 2000.00, 800.00, 0.00, 1200.00, NULL, NULL),
(1386, 'm', 'Ponsonbys', 'Ketten', 'SN-Platinkette', 6500.00, 2600.00, 0.00, 3900.00, NULL, NULL),
(1387, 'm', 'Ponsonbys', 'Ketten', 'SN-Goldkette', 5500.00, 2200.00, 0.00, 3300.00, NULL, NULL),
(1388, 'm', 'Ponsonbys', 'Ketten', 'Gold-Rechteckkette', 1500.00, 600.00, 0.00, 900.00, NULL, NULL),
(1389, 'm', 'Ponsonbys', 'Ketten', 'Goldener L$-Anh�nger', 28000.00, 11200.00, 0.00, 16800.00, NULL, NULL),
(1390, 'm', 'Ponsonbys', 'Ketten', 'Silberner L$-Anh�nger', 23000.00, 9200.00, 0.00, 13800.00, NULL, NULL),
(1391, 'm', 'Ponsonbys', 'Ketten', 'Zweifarbiger L$-Anh�nger', 25000.00, 10000.00, 0.00, 15000.00, NULL, NULL),
(1392, 'm', 'Ponsonbys', 'Ketten', '(Farbe) Mesh-Collier', 900.00, 360.00, 0.00, 540.00, NULL, NULL),
(1393, 'm', 'Ponsonbys', 'Ketten', 'Kette LS Coin Silber', 2200.00, 880.00, 0.00, 1320.00, NULL, NULL),
(1394, 'm', 'Ponsonbys', 'Ketten', 'Kette LS Coin Gold', 2800.00, 1120.00, 0.00, 1680.00, NULL, NULL),
(1395, 'm', 'Ponsonbys', 'Ketten', 'Kette LS Coin Gold Faded', 2500.00, 1000.00, 0.00, 1500.00, NULL, NULL),
(1396, 'm', 'Ponsonbys', 'Ketten', 'Totenkopf-Platinkette', 850.00, 340.00, 0.00, 510.00, NULL, NULL),
(1397, 'm', 'Ponsonbys', 'Ketten', 'Totenkopf-Goldkette', 650.00, 260.00, 0.00, 390.00, NULL, NULL),
(1398, 'm', 'Ponsonbys', 'Ketten', 'Platin-Himbeerkette', 8800.00, 3520.00, 0.00, 5280.00, NULL, NULL),
(1399, 'm', 'Ponsonbys', 'Ketten', 'Sturmhauben-Platinkette', 850.00, 340.00, 0.00, 510.00, NULL, NULL),
(1400, 'm', 'Ponsonbys', 'Ketten', 'Plantin-Kordelkette', 3800.00, 1520.00, 0.00, 2280.00, NULL, NULL),
(1401, 'm', 'Ponsonbys', 'Ketten', 'Gold-Kordelkette', 3500.00, 1400.00, 0.00, 2100.00, NULL, NULL),
(1402, 'm', 'Ponsonbys', 'Ketten', 'Goldm�nzen-Anh�nger', 850.00, 340.00, 0.00, 510.00, NULL, NULL),
(1403, 'm', 'Ponsonbys', 'Ketten', 'Silberm�nzen-Anh�nger', 650.00, 260.00, 0.00, 390.00, NULL, NULL),
(1404, 'm', 'Ponsonbys', 'Ketten', 'Bronzem�nzen-Anh�nger', 450.00, 180.00, 0.00, 270.00, NULL, NULL),
(1405, 'm', 'Ponsonbys', 'Ketten', 'Goldm�nzen-Anh�nger', 850.00, 340.00, 0.00, 510.00, NULL, NULL),
(1406, 'm', 'Ponsonbys', 'Ketten', 'Dicke (Farbe)-Panzerkette', 2200.00, 880.00, 0.00, 1320.00, NULL, NULL),
(1407, 'm', 'Ponsonbys', 'Ketten', 'Zorse-Platinkette', 4250.00, 1700.00, 0.00, 2550.00, NULL, NULL),
(1408, 'm', 'Ponsonbys', 'Ketten', 'Lockere Platin-Gliederkette', 2800.00, 1120.00, 0.00, 1680.00, NULL, NULL),
(1409, 'm', 'Ponsonbys', 'Ketten', 'Dix-Goldkette', 15000.00, 6000.00, 0.00, 9000.00, NULL, NULL),
(1410, 'm', 'Ponsonbys', 'Ketten', 'Dix-Platinkette', 18000.00, 7200.00, 0.00, 10800.00, NULL, NULL),
(1411, 'm', 'Ponsonbys', 'Ketten', 'Le Chien-Platinkette', 6500.00, 2600.00, 0.00, 3900.00, NULL, NULL),
(1412, 'm', 'Ponsonbys', 'Ketten', 'Platin-Panzerkette', 3800.00, 1520.00, 0.00, 2280.00, NULL, NULL),
(1413, 'm', 'Ponsonbys', 'Ketten', 'Platin-Flachpanzerkette', 3500.00, 1400.00, 0.00, 2100.00, NULL, NULL),
(1414, 'm', 'Ponsonbys', 'Ketten', 'Schwere Gold-Panzerkette', 4500.00, 1800.00, 0.00, 2700.00, NULL, NULL),
(1415, 'm', 'Ponsonbys', 'Ketten', 'Schwere Gold-Rechteckkette', 4500.00, 1800.00, 0.00, 2700.00, NULL, NULL),
(1416, 'm', 'Ponsonbys', 'Ketten', 'Platin-Rechteckkette', 1800.00, 720.00, 0.00, 1080.00, NULL, NULL),
(1417, 'm', 'Ponsonbys', 'Ketten', 'Gold-Himbeerkette', 8500.00, 3400.00, 0.00, 5100.00, NULL, NULL),
(1418, 'm', 'Ponsonbys', 'Ketten', 'Halskette Pandaking (Farbe/Farbe)', 10000.00, 4000.00, 0.00, 6000.00, NULL, NULL),
(1419, 'm', 'Ponsonbys', 'Ketten', 'Halskette Gun rose Gold', 1500.00, 600.00, 0.00, 900.00, NULL, NULL),
(1420, 'm', 'Ponsonbys', 'Ketten', 'Halskette Gun silber', 1600.00, 640.00, 0.00, 960.00, NULL, NULL),
(1421, 'm', 'Ponsonbys', 'Ketten', 'Halskette Gun platin', 1800.00, 720.00, 0.00, 1080.00, NULL, NULL),
(1422, 'm', 'Ponsonbys', 'Ketten', 'Halskette Gun gold', 1700.00, 680.00, 0.00, 1020.00, NULL, NULL),
(1423, 'm', 'Ponsonbys', 'Ketten', 'Pope Chain Ided Out Silver', 30000.00, 12000.00, 0.00, 18000.00, NULL, NULL),
(1424, 'm', 'Ponsonbys', 'Ketten', 'Devil Iced Out', 50000.00, 20000.00, 0.00, 30000.00, NULL, NULL),
(1425, 'm', 'Ponsonbys', 'Ketten', 'Cuban Iced Out (Farbe)', 40000.00, 16000.00, 0.00, 24000.00, NULL, NULL),
(1426, 'm', 'Ponsonbys', 'Ohrringe', 'Fl�gelohrringe (Farbe)', 500.00, 200.00, 0.00, 300.00, NULL, NULL),
(1427, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-Winkelkreolen (L)', 1000.00, 400.00, 0.00, 600.00, NULL, NULL),
(1428, 'm', 'Ponsonbys', 'Ohrringe', 'Schwarze Winkelkreolen (L)', 900.00, 360.00, 0.00, 540.00, NULL, NULL),
(1429, 'm', 'Ponsonbys', 'Ohrringe', 'Platin-Winkelkreolen (L)', 1100.00, 440.00, 0.00, 660.00, NULL, NULL),
(1430, 'm', 'Ponsonbys', 'Ohrringe', 'Silberne Diamntohrringe', 2100.00, 840.00, 0.00, 1260.00, NULL, NULL),
(1431, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-SN-Stecker (L)', 6500.00, 2600.00, 0.00, 3900.00, NULL, NULL),
(1432, 'm', 'Ponsonbys', 'Ohrringe', 'Platin-SN-Stecker (L)', 8000.00, 3200.00, 0.00, 4800.00, NULL, NULL),
(1433, 'm', 'Ponsonbys', 'Ohrringe', 'Diamond Earrings Gold', 7000.00, 2800.00, 0.00, 4200.00, NULL, NULL),
(1434, 'm', 'Ponsonbys', 'Ohrringe', 'Diamond Earrings Silver', 6000.00, 2400.00, 0.00, 3600.00, NULL, NULL),
(1435, 'm', 'Ponsonbys', 'Ohrringe', 'Platin-SN-Stecker (R)', 8000.00, 3200.00, 0.00, 4800.00, NULL, NULL),
(1436, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-SN-Stecker (R)', 6500.00, 2600.00, 0.00, 3900.00, NULL, NULL),
(1437, 'm', 'Ponsonbys', 'Ohrringe', 'Schwarze Winkelkreole (R)', 900.00, 360.00, 0.00, 540.00, NULL, NULL),
(1438, 'm', 'Ponsonbys', 'Ohrringe', 'Platin Winkelkreole (R)', 1100.00, 440.00, 0.00, 660.00, NULL, NULL),
(1439, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-Winkelkreolen (R )', 850.00, 340.00, 0.00, 510.00, NULL, NULL),
(1440, 'm', 'Ponsonbys', 'Ohrringe', 'Platin-SN-Stecker', 16000.00, 6400.00, 0.00, 9600.00, NULL, NULL),
(1441, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-SN-Stecker', 13000.00, 5200.00, 0.00, 7800.00, NULL, NULL),
(1442, 'm', 'Ponsonbys', 'Ohrringe', 'Schwarze Winkelkreolen (L)+(R )', 1800.00, 720.00, 0.00, 1080.00, NULL, NULL),
(1443, 'm', 'Ponsonbys', 'Ohrringe', 'Platin Winkelkreolen (L)+(R )', 2250.00, 900.00, 0.00, 1350.00, NULL, NULL),
(1444, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-Winkelkreolen (L)+(R )', 2000.00, 800.00, 0.00, 1200.00, NULL, NULL),
(1445, 'm', 'Ponsonbys', 'Ohrringe', 'Platin-Ringstecker (L) oder (R )', 1250.00, 500.00, 0.00, 750.00, NULL, NULL),
(1446, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-Ringstecker (L) oder (R )', 1000.00, 400.00, 0.00, 600.00, NULL, NULL),
(1447, 'm', 'Ponsonbys', 'Ohrringe', 'Platin-Ringstecker (L)+(R )', 2500.00, 1000.00, 0.00, 1500.00, NULL, NULL),
(1448, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-Ringstecker (L)+(R )', 2000.00, 800.00, 0.00, 1200.00, NULL, NULL),
(1449, 'm', 'Ponsonbys', 'Ohrringe', 'Schwarzer Diamantstecker  (L) oder (R )', 1350.00, 540.00, 0.00, 810.00, NULL, NULL),
(1450, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-Diamantstecker  (L) oder (R )', 1500.00, 600.00, 0.00, 900.00, NULL, NULL),
(1451, 'm', 'Ponsonbys', 'Ohrringe', 'Platin-Diamantstecker  (L) oder (R )', 1800.00, 720.00, 0.00, 1080.00, NULL, NULL),
(1452, 'm', 'Ponsonbys', 'Ohrringe', 'Schwarzer Diamantstecker  (L) oder (R )', 2600.00, 1040.00, 0.00, 1560.00, NULL, NULL),
(1453, 'm', 'Ponsonbys', 'Ohrringe', 'Platin-Diamantstecker  (L)+(R )', 3500.00, 1400.00, 0.00, 2100.00, NULL, NULL),
(1454, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-Diamantstecker (L)+(R )', 2999.00, 1199.60, 0.00, 1799.40, NULL, NULL),
(1455, 'm', 'Ponsonbys', 'Ohrringe', 'Platin-Onyxstecker  (L) oder (R )', 1500.00, 600.00, 0.00, 900.00, NULL, NULL),
(1456, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-Onyxstecker  (L) oder (R )', 1000.00, 400.00, 0.00, 600.00, NULL, NULL),
(1457, 'm', 'Ponsonbys', 'Ohrringe', 'Schwarzer Onyxstecker  (L) oder (R )', 850.00, 340.00, 0.00, 510.00, NULL, NULL),
(1458, 'm', 'Ponsonbys', 'Ohrringe', 'Platin-Onyxstecker (L)+(R )', 3000.00, 1200.00, 0.00, 1800.00, NULL, NULL),
(1459, 'm', 'Ponsonbys', 'Ohrringe', 'Schwarzer Onyxstecker (L)+(R )', 1700.00, 680.00, 0.00, 1020.00, NULL, NULL),
(1460, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-Onyxstecker (L)+(R )', 2000.00, 800.00, 0.00, 1200.00, NULL, NULL),
(1461, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-Edelsteinstecker (L) oder (R )', 1250.00, 500.00, 0.00, 750.00, NULL, NULL),
(1462, 'm', 'Ponsonbys', 'Ohrringe', 'Schwarzer Edelsteinstecker (L) oder (R )', 1000.00, 400.00, 0.00, 600.00, NULL, NULL),
(1463, 'm', 'Ponsonbys', 'Ohrringe', 'Platin-Edelsteinstecker  (L) oder (R )', 1500.00, 600.00, 0.00, 900.00, NULL, NULL),
(1464, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-SN-Barren-Stecker  (L) oder (R )', 2600.00, 1040.00, 0.00, 1560.00, NULL, NULL),
(1465, 'm', 'Ponsonbys', 'Ohrringe', 'Platin-SN-Barren-Stecker  (L) oder (R )', 3500.00, 1400.00, 0.00, 2100.00, NULL, NULL),
(1466, 'm', 'Ponsonbys', 'Ohrringe', 'Schwarzer Edelsteinstecker  (L)+(R )', 2000.00, 800.00, 0.00, 1200.00, NULL, NULL),
(1467, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-Edelsteinstecker  (L)+(R )', 2500.00, 1000.00, 0.00, 1500.00, NULL, NULL),
(1468, 'm', 'Ponsonbys', 'Ohrringe', 'Platin-Edelsteinstecker  (L)+(R )', 3000.00, 1200.00, 0.00, 1800.00, NULL, NULL),
(1469, 'm', 'Ponsonbys', 'Ohrringe', 'Platin-Noir-Viereckstecker (L) oder (R )', 1250.00, 500.00, 0.00, 750.00, NULL, NULL),
(1470, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-Noir-Viereckstecker (L) oder (R )', 1000.00, 400.00, 0.00, 600.00, NULL, NULL),
(1471, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-Illusion-Viereckstecker (L) oder (R )', 1000.00, 400.00, 0.00, 600.00, NULL, NULL),
(1472, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-SN-Barren-Stecker (L)+(R )', 5900.00, 2360.00, 0.00, 3540.00, NULL, NULL),
(1473, 'm', 'Ponsonbys', 'Ohrringe', 'Platin-SN-Barren-Stecker  (L)+(R )', 6850.00, 2740.00, 0.00, 4110.00, NULL, NULL),
(1474, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-Noir-Viereckstecker (L)+(R )', 2000.00, 800.00, 0.00, 1200.00, NULL, NULL),
(1475, 'm', 'Ponsonbys', 'Ohrringe', 'Platin-Noir-Viereckstecker  (L)+(R )', 2500.00, 1000.00, 0.00, 1500.00, NULL, NULL),
(1476, 'm', 'Ponsonbys', 'Ohrringe', 'Gold-Illusion-Viereckstecker  (L)+(R )', 2000.00, 800.00, 0.00, 1200.00, NULL, NULL),
(1477, 'm', 'Ponsonbys', 'Uhren', '(Farbe) Kronos Quantum', 900.00, 360.00, 0.00, 540.00, NULL, NULL),
(1478, 'm', 'Ponsonbys', 'Uhren', 'Wei�goldene Uhr', 1250.00, 500.00, 0.00, 750.00, NULL, NULL),
(1479, 'm', 'Ponsonbys', 'Uhren', 'Goldene Uhr', 1450.00, 580.00, 0.00, 870.00, NULL, NULL),
(1480, 'm', 'Ponsonbys', 'Uhren', 'Silberne Uhr', 1000.00, 400.00, 0.00, 600.00, NULL, NULL),
(1481, 'm', 'Ponsonbys', 'Uhren', '(Farbe) LED. (Farbe) Armband', 850.00, 340.00, 0.00, 510.00, NULL, NULL),
(1482, 'm', 'Ponsonbys', 'Uhren', '(Farbe) Covgari Explorer', 5250.00, 2100.00, 0.00, 3150.00, NULL, NULL),
(1483, 'm', 'Ponsonbys', 'Uhren', '(Farbe) �berzogener Armreif', 250.00, 100.00, 0.00, 150.00, NULL, NULL),
(1484, 'm', 'Ponsonbys', 'Uhren', '(Farbe) Penulus Gravity', 2599.00, 1039.60, 0.00, 1559.40, NULL, NULL),
(1485, 'm', 'Ponsonbys', 'Uhren', 'Goldene Gaulle Retro Hex', 4650.00, 1860.00, 0.00, 2790.00, NULL, NULL),
(1486, 'm', 'Ponsonbys', 'Uhren', 'Carbon-Gaulle Retro Hex', 4599.00, 1839.60, 0.00, 2759.40, NULL, NULL),
(1487, 'm', 'Ponsonbys', 'Uhren', 'Platin-Gaulle Retro Hex', 4699.00, 1879.60, 0.00, 2819.40, NULL, NULL),
(1488, 'm', 'Ponsonbys', 'Uhren', '(Farbe) Flechtarmreif', 650.00, 260.00, 0.00, 390.00, NULL, NULL),
(1489, 'm', 'Ponsonbys', 'Uhren', '(Farbe) Covgari Supernova', 3799.00, 1519.60, 0.00, 2279.40, NULL, NULL),
(1490, 'm', 'Ponsonbys', 'Uhren', 'Carbon Cofgari Supernova', 3699.00, 1479.60, 0.00, 2219.40, NULL, NULL),
(1491, 'm', 'Ponsonbys', 'Uhren', '(Farbe) Covgari Universe', 2999.00, 1199.60, 0.00, 1799.40, NULL, NULL),
(1492, 'm', 'Ponsonbys', 'Uhren', '(Farbe)-Pendulus Galexis', 2400.00, 960.00, 0.00, 1440.00, NULL, NULL),
(1493, 'm', 'Ponsonbys', 'Uhren', 'Kupfer-Gaulle Destiny', 4000.00, 1600.00, 0.00, 2400.00, NULL, NULL),
(1494, 'm', 'Ponsonbys', 'Uhren', 'Vintage-Gaulle Destiny', 4200.00, 1680.00, 0.00, 2520.00, NULL, NULL),
(1495, 'm', 'Ponsonbys', 'Uhren', 'Silberne Gaulle Destiny', 4100.00, 1640.00, 0.00, 2460.00, NULL, NULL),
(1496, 'm', 'Ponsonbys', 'Uhren', '(Farbe) Kette m. eckigem Juwel', 450.00, 180.00, 0.00, 270.00, NULL, NULL),
(1497, 'm', 'Ponsonbys', 'Uhren', '(Farbe) Ceaseless', 1999.00, 799.60, 0.00, 1199.40, NULL, NULL),
(1498, 'm', 'Ponsonbys', 'Uhren', '(Farbe) Crowex Chromosphere', 3600.00, 1440.00, 0.00, 2160.00, NULL, NULL),
(1499, 'm', 'Ponsonbys', 'Uhren', '(Farbe) Medici Radial', 999.00, 399.60, 0.00, 599.40, NULL, NULL),
(1500, 'm', 'Ponsonbys', 'Uhren', '(Farbe) Pendulus Timestar', 2500.00, 1000.00, 0.00, 1500.00, NULL, NULL),
(1501, 'm', 'Ponsonbys', 'Uhren', '(Farbe) Crowex-�poque', 2350.00, 940.00, 0.00, 1410.00, NULL, NULL),
(1502, 'm', 'Ponsonbys', 'Uhren', '(Farbe) Vangelico Geomeister', 4000.00, 1600.00, 0.00, 2400.00, NULL, NULL),
(1503, 'm', 'Ponsonbys', 'Uhren', 'Roulette-Kronos-Quad', 3000.00, 1200.00, 0.00, 1800.00, NULL, NULL),
(1504, 'm', 'Ponsonbys', 'Uhren', 'Kartenfarben-Kronos-Quad', 3000.00, 1200.00, 0.00, 1800.00, NULL, NULL),
(1505, 'm', 'Ponsonbys', 'Uhren', 'Goldene Kronos Quad', 3600.00, 1440.00, 0.00, 2160.00, NULL, NULL),
(1506, 'm', 'Ponsonbys', 'Uhren', 'Silberne Kronos Quad', 3600.00, 1440.00, 0.00, 2160.00, NULL, NULL),
(1507, 'm', 'Ponsonbys', 'Uhren', 'Schwarze Kronos Quad', 3600.00, 1440.00, 0.00, 2160.00, NULL, NULL),
(1508, 'm', 'Ponsonbys', 'Uhren', 'Fifty Kronos Quad', 3600.00, 1440.00, 0.00, 2160.00, NULL, NULL),
(1509, 'm', 'Ponsonbys', 'Uhren', '(Farbe) Crowex Rond', 2850.00, 1140.00, 0.00, 1710.00, NULL, NULL),
(1510, 'm', 'Ponsonbys', 'Armb�nder', '(Leichte Armkette (L) oder (R )', 3250.00, 1300.00, 0.00, 1950.00, NULL, NULL),
(1511, 'm', 'Ponsonbys', 'Armb�nder', 'Quadrat-Armkette (L) oder (R )', 3250.00, 1300.00, 0.00, 1950.00, NULL, NULL),
(1512, 'm', 'Ponsonbys', 'Armb�nder', '(Farbe) M�anderarmreif', 2500.00, 1000.00, 0.00, 1500.00, NULL, NULL),
(1513, 'm', 'Ponsonbys', 'Armb�nder', 'Grober (Farbe) Armreif', 190.00, 76.00, 0.00, 114.00, NULL, NULL),
(1514, 'm', 'Ponsonbys', 'Armb�nder', '(Farbe) Kettenarmband', 350.00, 140.00, 0.00, 210.00, NULL, NULL),
(1515, 'm', 'Ponsonbys', 'Armb�nder', 'Profil-Armreif (L) oder (R )', 3250.00, 1300.00, 0.00, 1950.00, NULL, NULL),
(1516, 'm', 'Ponsonbys', 'Hose', 'Anzughose (Farbe)', 200.00, 80.00, 0.00, 120.00, NULL, NULL),
(1517, 'm', 'Ponsonbys', 'Hose', 'Anzughose eng (Farbe)', 120.00, 48.00, 0.00, 72.00, NULL, NULL),
(1518, 'm', 'Ponsonbys', 'Hose', 'Anzughose mit B�gelfalte (Farbe)', 800.00, 320.00, 0.00, 480.00, NULL, NULL),
(1519, 'm', 'Ponsonbys', 'Hose', 'Anzughose breit (Farbe)', 100.00, 40.00, 0.00, 60.00, NULL, NULL),
(1520, 'm', 'Ponsonbys', 'Hose', '(Farbe) FB-Jogginghose mit Bund', 250.00, 100.00, 0.00, 150.00, NULL, NULL),
(1521, 'm', 'Ponsonbys', 'Hose', 'Anzughose Muster (Farbe)', 800.00, 320.00, 0.00, 480.00, NULL, NULL),
(1522, 'm', 'Ponsonbys', 'Hose', 'Seidenpyjama (Farbe)', 800.00, 320.00, 0.00, 480.00, NULL, NULL),
(1523, 'm', 'Ponsonbys', 'Hose', 'Schlupfhose (Farbe)', 600.00, 240.00, 0.00, 360.00, NULL, NULL),
(1524, 'm', 'Ponsonbys', 'Hose', '420-Anzughose', 80.00, 32.00, 0.00, 48.00, NULL, NULL),
(1525, 'm', 'Ponsonbys', 'Hose', 'Shorts (Motiv)(Farbe)', 200.00, 80.00, 0.00, 120.00, NULL, NULL),
(1526, 'm', 'Ponsonbys', 'Hose', 'Anzughose gr�n breit', 500.00, 200.00, 0.00, 300.00, NULL, NULL),
(1527, 'm', 'Ponsonbys', 'Hose', 'Anzughose mit G�rtel (Farbe)', 80.00, 32.00, 0.00, 48.00, NULL, NULL),
(1528, 'm', 'Ponsonbys', 'Hose', 'Hose mit B�gelfalte (Farbe)', 800.00, 320.00, 0.00, 480.00, NULL, NULL),
(1529, 'm', 'Ponsonbys', 'Hose', '(Farbe) Lederschn�rhose', 500.00, 200.00, 0.00, 300.00, NULL, NULL),
(1530, 'm', 'Ponsonbys', 'Hose', '(Farbe) gerade Chinohose', 350.00, 140.00, 0.00, 210.00, NULL, NULL),
(1531, 'm', 'Ponsonbys', 'Hose', '(Farbe) gerade (Muster)-Chinohose', 350.00, 140.00, 0.00, 210.00, NULL, NULL),
(1532, 'm', 'Ponsonbys', 'Hose', 'Chinohose schmal (Farbe)', 150.00, 60.00, 0.00, 90.00, NULL, NULL),
(1533, 'm', 'Ponsonbys', 'Hose', '(Farbe) Standhose', 250.00, 100.00, 0.00, 150.00, NULL, NULL),
(1534, 'm', 'Ponsonbys', 'Hose', 'Anzughose gl�nzend (Farbe)', 320.00, 128.00, 0.00, 192.00, NULL, NULL),
(1535, 'm', 'Ponsonbys', 'Hose', 'Anzughose bedruckt Gold', 830.00, 332.00, 0.00, 498.00, NULL, NULL),
(1536, 'm', 'Ponsonbys', 'Hose', 'Chinohose eng gl�nzend (Farbe)', 250.00, 100.00, 0.00, 150.00, NULL, NULL),
(1537, 'm', 'Ponsonbys', 'Hose', 'Breite (Farbe) VDG-Bandana-Hose', 210.00, 84.00, 0.00, 126.00, NULL, NULL),
(1538, 'm', 'Ponsonbys', 'Hose', 'Chinohose eng bedruckt Gold', 520.00, 208.00, 0.00, 312.00, NULL, NULL),
(1539, 'm', 'Ponsonbys', 'Hose', 'Schwimmshorts (Marke)', 200.00, 80.00, 0.00, 120.00, NULL, NULL),
(1540, 'm', 'Ponsonbys', 'Hose', 'Perseus Logo Jogger (Farbe)', 120.00, 48.00, 0.00, 72.00, NULL, NULL),
(1541, 'm', 'Ponsonbys', 'Hose', 'Anzughose (Farbe)/(Farbe)', 700.00, 280.00, 0.00, 420.00, NULL, NULL),
(1542, 'm', 'Ponsonbys', 'Schuhe', 'Oxfords (Farbe)', 320.00, 128.00, 0.00, 192.00, NULL, NULL),
(1543, 'm', 'Ponsonbys', 'Schuhe', 'Moc-Stiefel (Farbe)', 200.00, 80.00, 0.00, 120.00, NULL, NULL),
(1544, 'm', 'Ponsonbys', 'Schuhe', 'Oxfords Kappe (Farbe)', 320.00, 128.00, 0.00, 192.00, NULL, NULL),
(1545, 'm', 'Ponsonbys', 'Schuhe', 'Mokassins (Farbe)', 150.00, 60.00, 0.00, 90.00, NULL, NULL),
(1546, 'm', 'Ponsonbys', 'Schuhe', 'Slipper Wildleder (Farbe)', 450.00, 180.00, 0.00, 270.00, NULL, NULL),
(1547, 'm', 'Ponsonbys', 'Schuhe', '(Farbe) Stra�enstiefel', 700.00, 280.00, 0.00, 420.00, NULL, NULL),
(1548, 'm', 'Ponsonbys', 'Schuhe', 'Elegante (Farbe) Oxfords. barfu�', 280.00, 112.00, 0.00, 168.00, NULL, NULL),
(1549, 'm', 'Ponsonbys', 'Schuhe', 'Slipper FB (Farbe)', 250.00, 100.00, 0.00, 150.00, NULL, NULL),
(1550, 'm', 'Ponsonbys', 'Schuhe', 'Slipper (Farbe)', 120.00, 48.00, 0.00, 72.00, NULL, NULL),
(1551, 'm', 'Ponsonbys', 'Schuhe', 'Brogues (Farbe)', 220.00, 88.00, 0.00, 132.00, NULL, NULL),
(1552, 'm', 'Ponsonbys', 'Schuhe', 'Slipper (Farbe)/(Farbe)+(Farbe)', 120.00, 48.00, 0.00, 72.00, NULL, NULL),
(1553, 'm', 'Ponsonbys', 'Schuhe', 'Gamaschen', 100.00, 40.00, 0.00, 60.00, NULL, NULL),
(1554, 'm', 'Ponsonbys', 'Schuhe', 'Elegante (farbe) Oxfords', 950.00, 380.00, 0.00, 570.00, NULL, NULL),
(1555, 'm', 'Ponsonbys', 'Schuhe', 'Mokassins Leder (Farbe)', 750.00, 300.00, 0.00, 450.00, NULL, NULL),
(1556, 'm', 'Ponsonbys', 'Schuhe', '(Farbe) Schnallenmokassins', 600.00, 240.00, 0.00, 360.00, NULL, NULL),
(1557, 'm', 'Ponsonbys', 'Schuhe', '(Farbe) SC-Muster-Badeschlappen', 100.00, 40.00, 0.00, 60.00, NULL, NULL),
(1558, 'm', 'Ponsonbys', 'Schuhe', 'Lackschuhe (Farbe)', 150.00, 60.00, 0.00, 90.00, NULL, NULL),
(1559, 'm', 'Ponsonbys', 'Schuhe', 'Slipper (Farbe)', 120.00, 48.00, 0.00, 72.00, NULL, NULL),
(1560, 'm', 'Ponsonbys', 'Schuhe', 'Chelsea-Boots (Farbe)', 100.00, 40.00, 0.00, 60.00, NULL, NULL),
(1561, 'm', 'Ponsonbys', 'Schuhe', 'Krawatte d�nn (farbe) (f�r Weste)', 60.00, 24.00, 0.00, 36.00, NULL, NULL),
(1562, 'm', 'Ponsonbys', 'Schuhe', '(Farbe) Krawatte', 80.00, 32.00, 0.00, 48.00, NULL, NULL),
(1563, 'm', 'Ponsonbys', 'Schuhe', '(Farbe) Krawatte (gerade)', 120.00, 48.00, 0.00, 72.00, NULL, NULL),
(1564, 'm', 'Ponsonbys', 'Schuhe', '(Farbe) ungebundene Fliege', 50.00, 20.00, 0.00, 30.00, NULL, NULL),
(1565, 'm', 'Ponsonbys', 'Schuhe', '(Farbe) Tuch', 89.00, 35.60, 0.00, 53.40, NULL, NULL),
(1566, 'm', 'Ponsonbys', 'Schuhe', '(Farbe) lockere Fliege', 60.00, 24.00, 0.00, 36.00, NULL, NULL),
(1567, 'm', 'Ponsonbys', 'Schuhe', 'Feine (Farbe) Krawatte', 120.00, 48.00, 0.00, 72.00, NULL, NULL),
(1568, 'm', 'Ponsonbys', 'Schuhe', 'Breit (Farbe) Krawatte)', 50.00, 20.00, 0.00, 30.00, NULL, NULL),
(1569, 'm', 'Ponsonbys', 'Schuhe', '(Farbe) enge Fliege', 60.00, 24.00, 0.00, 36.00, NULL, NULL),
(1570, 'm', 'Ponsonbys', 'Schuhe', '(Farbe) schmale Krawatte', 80.00, 32.00, 0.00, 48.00, NULL, NULL),
(1571, 'm', 'Ponsonbys', 'Schuhe', '(Farbe) Fliege', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(1572, 'm', 'Ponsonbys', 'Schuhe', '(Farbe) lockere Krawatte', 60.00, 24.00, 0.00, 36.00, NULL, NULL),
(1573, 'm', 'Ponsonbys', 'Schuhe', 'Krawatte d�nn (Farbe)', 60.00, 24.00, 0.00, 36.00, NULL, NULL),
(1574, 'm', 'Ponsonbys', 'Schuhe', 'Schmale (Farbe) Krawatte', 50.00, 20.00, 0.00, 30.00, NULL, NULL),
(1575, 'm', 'Ponsonbys', 'Schuhe', '(Farbe) gerade Krawatte', 60.00, 24.00, 0.00, 36.00, NULL, NULL),
(1576, 'm', 'Ponsonbys', 'Schuhe', '(Farbe) l�ssige Krawatte', 60.00, 24.00, 0.00, 36.00, NULL, NULL),
(1577, 'm', 'Ponsonbys', 'Schuhe', 'Krawatte Windsor (Farbe) mit', 60.00, 24.00, 0.00, 36.00, NULL, NULL),
(1578, 'm', 'Ponsonbys', 'Unterhemden', '(Farbe) Anzugsweste', 100.00, 40.00, 0.00, 60.00, NULL, NULL),
(1579, 'm', 'Ponsonbys', 'Unterhemden', '(Farbe) Manschettenhemd', 120.00, 48.00, 0.00, 72.00, NULL, NULL),
(1580, 'm', 'Ponsonbys', 'Unterhemden', '(Farbe) Anzughemd', 70.00, 28.00, 0.00, 42.00, NULL, NULL),
(1581, 'm', 'Ponsonbys', 'Unterhemden', 'gestreiftes Anzughemd', 100.00, 40.00, 0.00, 60.00, NULL, NULL),
(1582, 'm', 'Ponsonbys', 'Unterhemden', '(Farbe) Hemd. �rmelhalter', 110.00, 44.00, 0.00, 66.00, NULL, NULL),
(1583, 'm', 'Ponsonbys', 'Unterhemden', '(Farbe) Ma�anzugweste', 150.00, 60.00, 0.00, 90.00, NULL, NULL),
(1584, 'm', 'Ponsonbys', 'Unterhemden', 'Schlichte High-Roller-Weste', 300.00, 120.00, 0.00, 180.00, NULL, NULL),
(1585, 'm', 'Ponsonbys', 'Unterhemden', 'Weste m. Hemd (Farbe)/(Farbe)', 120.00, 48.00, 0.00, 72.00, NULL, NULL),
(1586, 'm', 'Ponsonbys', 'Unterhemden', 'Opulente High-Roller-Weste', 300.00, 120.00, 0.00, 180.00, NULL, NULL),
(1587, 'm', 'Ponsonbys', 'Unterhemden', '(Farbe) (Farbe) High-Roller-Weste', 300.00, 120.00, 0.00, 180.00, NULL, NULL),
(1588, 'm', 'Ponsonbys', 'Unterhemden', 'Hemd (Farbe)', 50.00, 20.00, 0.00, 30.00, NULL, NULL),
(1589, 'm', 'Ponsonbys', 'Unterhemden', '(Farbe) High-Roller-Hemd', 250.00, 100.00, 0.00, 150.00, NULL, NULL),
(1590, 'm', 'Ponsonbys', 'Unterhemden', 'Wei�es Hemd Kragen zu', 100.00, 40.00, 0.00, 60.00, NULL, NULL),
(1591, 'm', 'Ponsonbys', 'Unterhemden', 'Wei�es Hemd Kragen offen', 100.00, 40.00, 0.00, 60.00, NULL, NULL),
(1592, 'm', 'Ponsonbys', 'Unterhemden', '(Farbe) Blazerhemd', 80.00, 32.00, 0.00, 48.00, NULL, NULL),
(1593, 'm', 'Ponsonbys', 'Unterhemden', '(Farbe) Hemd', 70.00, 28.00, 0.00, 42.00, NULL, NULL),
(1594, 'w', 'Ponsonbys', 'Brille', 'Sonnenbrille Shield (Farbe)', 400.00, 160.00, 0.00, 240.00, NULL, NULL),
(1595, 'w', 'Ponsonbys', 'Ketten', '(Farbe) Perlen', 1500.00, 600.00, 0.00, 900.00, NULL, NULL),
(1596, 'w', 'Ponsonbys', 'Ketten', 'Lockere Platin-Gliederkette', 2800.00, 1120.00, 0.00, 1680.00, NULL, NULL),
(1597, 'w', 'Ponsonbys', 'Ketten', '(Material) LS-Anh�nger', 15000.00, 6000.00, 0.00, 9000.00, NULL, NULL),
(1598, 'w', 'Ponsonbys', 'Ketten', 'Totenkopf-(Material) Kette', 650.00, 260.00, 0.00, 390.00, NULL, NULL),
(1599, 'w', 'Ponsonbys', 'Ketten', 'LE-Chien-Pfeifen-Halskette', 1000.00, 400.00, 0.00, 600.00, NULL, NULL),
(1600, 'w', 'Ponsonbys', 'Ketten', '(Farbe)-Felgenkette', 650.00, 260.00, 0.00, 390.00, NULL, NULL),
(1601, 'w', 'Ponsonbys', 'Ketten', 'Hund-mit-Halskrause-Kette', 650.00, 260.00, 0.00, 390.00, NULL, NULL),
(1602, 'w', 'Ponsonbys', 'Ketten', 'Sturmhauben-Platinkette', 850.00, 340.00, 0.00, 510.00, NULL, NULL),
(1603, 'w', 'Ponsonbys', 'Ketten', 'Wei� glasierter LS-Anh�nger', 28000.00, 11200.00, 0.00, 16800.00, NULL, NULL),
(1604, 'w', 'Ponsonbys', 'Ketten', 'Zorse-Goldkette', 3250.00, 1300.00, 0.00, 1950.00, NULL, NULL),
(1605, 'w', 'Ponsonbys', 'Ketten', 'Cuban-Chain \"bleeding Heart\"', 3500.00, 1400.00, 0.00, 2100.00, NULL, NULL),
(1606, 'w', 'Ponsonbys', 'Ketten', 'Gold-Flachpanzerkette', 3200.00, 1280.00, 0.00, 1920.00, NULL, NULL),
(1607, 'w', 'Ponsonbys', 'Ketten', '(Material)-Radkappenkette', 650.00, 260.00, 0.00, 390.00, NULL, NULL),
(1608, 'w', 'Ponsonbys', 'Ketten', 'LC-Goldkette', 5500.00, 2200.00, 0.00, 3300.00, NULL, NULL),
(1609, 'w', 'Ponsonbys', 'Ketten', '(Material)Hundemarken', 850.00, 340.00, 0.00, 510.00, NULL, NULL),
(1610, 'w', 'Ponsonbys', 'Ketten', 'Schwere-Gold-Panzerkette', 4500.00, 1800.00, 0.00, 2700.00, NULL, NULL),
(1611, 'w', 'Ponsonbys', 'Ketten', 'Dix-Goldkette', 15000.00, 6000.00, 0.00, 9000.00, NULL, NULL),
(1612, 'w', 'Ponsonbys', 'Ketten', 'Dix-Platinkette', 18000.00, 7200.00, 0.00, 10800.00, NULL, NULL),
(1613, 'w', 'Ponsonbys', 'Ketten', 'Herzschmerz-Anh�nger', 15000.00, 6000.00, 0.00, 9000.00, NULL, NULL),
(1614, 'w', 'Ponsonbys', 'Ketten', 'Perlenhalskette', 3800.00, 1520.00, 0.00, 2280.00, NULL, NULL),
(1615, 'w', 'Ponsonbys', 'Ketten', 'Jadehalskette', 3800.00, 1520.00, 0.00, 2280.00, NULL, NULL),
(1616, 'w', 'Ponsonbys', 'Ketten', 'Karneolhalskette', 3800.00, 1520.00, 0.00, 2280.00, NULL, NULL),
(1617, 'w', 'Ponsonbys', 'Ketten', 'Aquamarinhalskette', 3800.00, 1520.00, 0.00, 2280.00, NULL, NULL),
(1618, 'w', 'Ponsonbys', 'Ketten', 'Amethysthalskette', 3800.00, 1520.00, 0.00, 2280.00, NULL, NULL),
(1619, 'w', 'Ponsonbys', 'Ketten', 'Onyxhalskette', 3800.00, 1520.00, 0.00, 2280.00, NULL, NULL),
(1620, 'w', 'Ponsonbys', 'Ketten', 'Goldener L$-Anh�nger', 28000.00, 11200.00, 0.00, 16800.00, NULL, NULL),
(1621, 'w', 'Ponsonbys', 'Ketten', 'Silbener L$-Anh�nger', 26000.00, 10400.00, 0.00, 15600.00, NULL, NULL),
(1622, 'w', 'Ponsonbys', 'Ketten', 'Zweifarbiger L$-Anh�nger', 25000.00, 10000.00, 0.00, 15000.00, NULL, NULL),
(1623, 'w', 'Ponsonbys', 'Ring', 'Ehering Diamant Gold', 3000.00, 1200.00, 0.00, 1800.00, NULL, NULL),
(1624, 'w', 'Ponsonbys', 'Ketten', 'SN-Goldkette', 5500.00, 2200.00, 0.00, 3300.00, NULL, NULL),
(1625, 'w', 'Ponsonbys', 'Ketten', 'SN-Platinkette', 6500.00, 2600.00, 0.00, 3900.00, NULL, NULL),
(1626, 'w', 'Ponsonbys', 'Ketten', 'Silberne Halskette', 2000.00, 800.00, 0.00, 1200.00, NULL, NULL),
(1627, 'w', 'Ponsonbys', 'Ketten', '(Farbe) Mesh-Colliere', 900.00, 360.00, 0.00, 540.00, NULL, NULL),
(1628, 'w', 'Ponsonbys', 'Ketten', 'Gold-Himbeerkette', 8500.00, 3400.00, 0.00, 5100.00, NULL, NULL),
(1629, 'w', 'Ponsonbys', 'Ketten', '(Material)-Anh�nger', 850.00, 340.00, 0.00, 510.00, NULL, NULL),
(1630, 'w', 'Ponsonbys', 'Ketten', 'Doublechain (Material) Iced Out', 3000.00, 1200.00, 0.00, 1800.00, NULL, NULL),
(1631, 'w', 'Ponsenbys', 'Ring', 'Ring Herzform (Material)', 2500.00, 1000.00, 0.00, 1500.00, NULL, NULL),
(1632, 'w', 'Ponsenbys', 'Ring', 'Gold-Kordelkette', 3500.00, 1400.00, 0.00, 2100.00, NULL, NULL),
(1633, 'w', 'Ponsenbys', 'Ketten', 'Dicke (Farbe)-Panzerkette', 2200.00, 880.00, 0.00, 1320.00, NULL, NULL),
(1634, 'w', 'Ponsenbys', 'Ketten', '(Material) Cuban Chocker', 2000.00, 800.00, 0.00, 1200.00, NULL, NULL),
(1635, 'w', 'Ponsenbys', 'Ketten', 'Tribble Chain (Material)', 500.00, 200.00, 0.00, 300.00, NULL, NULL),
(1636, 'w', 'Ponsenbys', 'Ketten', 'Zorse-Platinkette', 4250.00, 1700.00, 0.00, 2550.00, NULL, NULL),
(1637, 'w', 'Ponsenbys', 'Ketten', 'Icedout Chain Dream Chasers', 10000.00, 4000.00, 0.00, 6000.00, NULL, NULL),
(1638, 'w', 'Ponsenbys', 'Brille', 'Mondern Hibster (Material)', 120.00, 48.00, 0.00, 72.00, NULL, NULL),
(1639, 'w', 'Ponsenbys', 'Ketten', 'Lockere Gold-Gliederkette', 1000.00, 400.00, 0.00, 600.00, NULL, NULL),
(1640, 'w', 'Ponsenbys', 'Ketten', 'LC-Platinkette', 6500.00, 2600.00, 0.00, 3900.00, NULL, NULL),
(1641, 'w', 'Ponsenbys', 'Brille', 'Teacher Sexy (Farbe)', 120.00, 48.00, 0.00, 72.00, NULL, NULL),
(1642, 'w', 'Ponsenbys', 'Ketten', 'Halskette Schlaufen (Material)', 1100.00, 440.00, 0.00, 660.00, NULL, NULL),
(1643, 'w', 'Ponsenbys', 'Ketten', 'Plantin-Erbskette', 1800.00, 720.00, 0.00, 1080.00, NULL, NULL),
(1644, 'w', 'Ponsenbys', 'Ketten', 'Gold-Erbskette', 1500.00, 600.00, 0.00, 900.00, NULL, NULL),
(1645, 'w', 'Ponsenbys', 'Ring', 'Verlobungsring 12k', 3000.00, 1200.00, 0.00, 1800.00, NULL, NULL),
(1646, 'w', 'Ponsenbys', 'Ketten', 'Lianenhalskette (Farbe)', 3500.00, 1400.00, 0.00, 2100.00, NULL, NULL),
(1647, 'w', 'Ponsenbys', 'Ketten', '(Material)-Brezelkette', 2800.00, 1120.00, 0.00, 1680.00, NULL, NULL),
(1648, 'w', 'Ponsenbys', 'Ketten', 'LeChian-(Material)kette', 5500.00, 2200.00, 0.00, 3300.00, NULL, NULL),
(1649, 'w', 'Ponsenbys', 'Ketten', 'Schn�rkel Halskette (Farbe)', 5000.00, 2000.00, 0.00, 3000.00, NULL, NULL),
(1650, 'w', 'Ponsenbys', 'Ketten', 'Platin-Panzerkette', 3800.00, 1520.00, 0.00, 2280.00, NULL, NULL),
(1651, 'w', 'Ponsenbys', 'Ketten', 'Gold-Panzerkette', 3500.00, 1400.00, 0.00, 2100.00, NULL, NULL),
(1652, 'w', 'Ponsenbys', 'Ring', 'Ring Valentine Gold', 5900.00, 2360.00, 0.00, 3540.00, NULL, NULL),
(1653, 'w', 'Ponsenbys', 'Ketten', 'Platin-Flachpanzerkette', 3500.00, 1400.00, 0.00, 2100.00, NULL, NULL),
(1654, 'w', 'Ponsenbys', 'Ketten', 'Halskette Pandaqueen (Material/Farbe)', 10000.00, 4000.00, 0.00, 6000.00, NULL, NULL),
(1655, 'w', 'Ponsenbys', 'Ketten', 'Schwere Platin-Panzerkette', 4800.00, 1920.00, 0.00, 2880.00, NULL, NULL),
(1656, 'w', 'Ponsenbys', 'Ring', 'Icedout Wings and Braclet Gold', 3000.00, 1200.00, 0.00, 1800.00, NULL, NULL),
(1657, 'w', 'Ponsenbys', 'Ring', 'Icedout Wings and Braclet silver', 2500.00, 1000.00, 0.00, 1500.00, NULL, NULL),
(1658, 'w', 'Ponsenbys', 'Ketten', 'Schwere (Material)-Rechteckkette', 4800.00, 1920.00, 0.00, 2880.00, NULL, NULL),
(1659, 'w', 'Ponsenbys', 'Ketten', 'Platin-Himbeerkette', 8800.00, 3520.00, 0.00, 5280.00, NULL, NULL),
(1660, 'w', 'Ponsenbys', 'Ketten', 'Goldene Kette (Farbe)', 400.00, 160.00, 0.00, 240.00, NULL, NULL),
(1661, 'w', 'Ponsenbys', 'Ketten', 'Platin-Kordelkette', 3800.00, 1520.00, 0.00, 2280.00, NULL, NULL),
(1662, 'w', 'Ponsenbys', 'Ketten', 'Mondkette (Farbe) Diamant', 500.00, 200.00, 0.00, 300.00, NULL, NULL),
(1663, 'w', 'Ponsenbys', 'Ketten', 'Simple Chain (Material)', 350.00, 140.00, 0.00, 210.00, NULL, NULL),
(1664, 'w', 'Ponsenbys', 'Ketten', 'Dual Crosschain (FarbeMaterial/FarbeMaterial)', 2500.00, 1000.00, 0.00, 1500.00, NULL, NULL),
(1665, 'w', 'Ponsenbys', 'Ohrringe', 'Hamsa Hand Earrings (Farbe)', 450.00, 180.00, 0.00, 270.00, NULL, NULL),
(1666, 'w', 'Ponsenbys', 'Ketten', 'AK Chain (Material)', 1800.00, 720.00, 0.00, 1080.00, NULL, NULL),
(2047, 'm', 'Binco', 'Hose', 'Badeshorts(farbe)Waben', 20.00, 8.00, 0.00, 12.00, NULL, NULL),
(2048, 'm', 'Binco', 'Hose', 'RippedSaggedJeans', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2049, 'm', 'Binco', 'Hose', 'SkinnyJeansSaggedWashed', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2050, 'm', 'Binco', 'Hose', 'JeansengMuster', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2051, 'm', 'Binco', 'Hose', 'CargohoseTarn', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2052, 'm', 'Binco', 'Hose', 'Trainingshose', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2053, 'm', 'Binco', 'Hose', 'Surfershorts', 15.00, 6.00, 0.00, 9.00, NULL, NULL),
(2054, 'm', 'Binco', 'Hose', 'CargohosenTarn', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2055, 'm', 'Binco', 'Hose', 'Cargohose3/4', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2056, 'm', 'Binco', 'Hose', 'Stoffhosetief', 20.00, 8.00, 0.00, 12.00, NULL, NULL),
(2057, 'm', 'Binco', 'Hose', 'Chinohosegestreift', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2058, 'm', 'Binco', 'Hose', 'CargohosenmitKetten', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2059, 'm', 'Binco', 'Hose', 'Arbeitsshorts', 25.00, 10.00, 0.00, 15.00, NULL, NULL),
(2060, 'm', 'Binco', 'Hose', 'Jeans', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2061, 'm', 'Binco', 'Hose', 'Joggingshorts', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2062, 'm', 'Binco', 'Hose', 'Lederhoseeng', 25.00, 10.00, 0.00, 15.00, NULL, NULL),
(2063, 'm', 'Binco', 'Hose', 'CargohosemitG�rtellocker3/4', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2064, 'm', 'Binco', 'Hose', '(farbe)Jeans-Shorts', 50.00, 20.00, 0.00, 30.00, NULL, NULL),
(2065, 'm', 'Binco', 'Hose', '(farbe)Turn-ups', 50.00, 20.00, 0.00, 30.00, NULL, NULL),
(2066, 'm', 'Binco', 'Hose', 'HosemitG�rtel', 50.00, 20.00, 0.00, 30.00, NULL, NULL),
(2067, 'm', 'Binco', 'Hose', 'JeansmitG�rtel', 80.00, 32.00, 0.00, 48.00, NULL, NULL),
(2068, 'm', 'Binco', 'Hose', 'SkinnyJeansSaggedbreit', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2069, 'm', 'Binco', 'Hose', 'Chinohoslocker', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2070, 'm', 'Binco', 'Hose', 'Pyjamahosekariert', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2071, 'm', 'Binco', 'Hose', 'CargohoseDigitaltarn', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2072, 'm', 'Binco', 'Hose', 'CargohosekurzmitKetten', 25.00, 10.00, 0.00, 15.00, NULL, NULL),
(2073, 'm', 'Binco', 'Hose', 'Chinoshorts', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2074, 'm', 'Binco', 'Hose', 'Lederhoseengschwarz', 25.00, 10.00, 0.00, 15.00, NULL, NULL),
(2075, 'm', 'Binco', 'Hose', 'Chinohoseweit', 50.00, 20.00, 0.00, 30.00, NULL, NULL),
(2076, 'm', 'Binco', 'Hose', 'Jeanslocker', 25.00, 10.00, 0.00, 15.00, NULL, NULL),
(2077, 'm', 'Binco', 'Hose', 'Pyjamahose', 50.00, 20.00, 0.00, 30.00, NULL, NULL),
(2078, 'm', 'Binco', 'Hose', 'Bluejeanseng', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2079, 'm', 'Binco', 'Hose', 'Lederhosetief', 25.00, 10.00, 0.00, 15.00, NULL, NULL),
(2080, 'm', 'Binco', 'Hose', 'Seidenpyjama', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2081, 'm', 'Binco', 'Hose', 'Schlupfhose', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2082, 'm', 'Binco', 'Hose', 'Stoffhosetiefkurz', 25.00, 10.00, 0.00, 15.00, NULL, NULL),
(2083, 'm', 'Binco', 'Hose', 'Cargoshortstarn', 15.00, 6.00, 0.00, 9.00, NULL, NULL),
(2084, 'm', 'Binco', 'Hose', 'Trainhigsshorts', 15.00, 6.00, 0.00, 9.00, NULL, NULL),
(2085, 'm', 'Binco', 'Hose', 'Cargohoseweit', 25.00, 10.00, 0.00, 15.00, NULL, NULL),
(2086, 'm', 'Binco', 'Hose', 'Cargohosedunkelgrau', 25.00, 10.00, 0.00, 15.00, NULL, NULL),
(2087, 'm', 'Binco', 'Hose', 'LederhoseengMustergesteppt', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2088, 'm', 'Binco', 'Hose', 'Chinohosewei�hellblau', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2089, 'm', 'Binco', 'Hose', 'LatzhoseDigitaltarn', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2090, 'm', 'Binco', 'Hose', 'FittnesshoseTarn', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2091, 'm', 'Binco', 'Hose', 'Nahtlederhose', 25.00, 10.00, 0.00, 15.00, NULL, NULL),
(2092, 'm', 'Binco', 'Hose', 'JogginghoseOneStripe', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2093, 'm', 'Binco', 'Hose', 'Cargohoseweiteingesteckt', 25.00, 10.00, 0.00, 15.00, NULL, NULL),
(2094, 'm', 'Binco', 'Hose', 'Lederhosetiefkurz', 25.00, 10.00, 0.00, 15.00, NULL, NULL),
(2095, 'm', 'Binco', 'Hose', 'Broker-Schachbrett-Cargohose', 60.00, 24.00, 0.00, 36.00, NULL, NULL),
(2096, 'm', 'Binco', 'Hose', 'JeansSteppmuster', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2097, 'm', 'Binco', 'Hose', 'Jeanstief', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2098, 'm', 'Binco', 'Hose', 'LatzhoseJeans', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2099, 'm', 'Binco', 'Hose', 'SkinnyJeans', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2100, 'm', 'Binco', 'Hose', 'JeansRolledup', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2101, 'm', 'Binco', 'Hose', 'LederhosetiefmitBund', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2102, 'm', 'Binco', 'Hose', 'Jeansused', 25.00, 10.00, 0.00, 15.00, NULL, NULL),
(2103, 'm', 'Binco', 'Hose', 'Badehose', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2104, 'm', 'Binco', 'Hose', 'JeansmitG�rtelschnalle', 100.00, 40.00, 0.00, 60.00, NULL, NULL),
(2105, 'm', 'Binco', 'Hose', 'BreiteBigness-Zebrahose', 80.00, 32.00, 0.00, 48.00, NULL, NULL),
(2106, 'm', 'Binco', 'Hose', 'BaggyJeansSagged', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2107, 'm', 'Binco', 'Hose', 'Stoffhose', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2108, 'm', 'Binco', 'Hose', 'JogginghoseSagged', 20.00, 8.00, 0.00, 12.00, NULL, NULL),
(2109, 'm', 'Binco', 'Hose', 'Schwimmshorts', 20.00, 8.00, 0.00, 12.00, NULL, NULL),
(2110, 'm', 'Binco', 'Hose', 'HinterlandCargo', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2111, 'm', 'Binco', 'Hose', 'Trainingsshortskurz', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2112, 'm', 'Binco', 'Hose', 'SkinnyJeansSagged', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2113, 'm', 'Binco', 'Hose', 'ArbeitshoseSocken', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2114, 'm', 'Binco', 'Hose', 'CargohoseSagged', 50.00, 20.00, 0.00, 30.00, NULL, NULL),
(2115, 'm', 'Binco', 'Hose', 'SkninnyJeansSaggedKazinsky', 100.00, 40.00, 0.00, 60.00, NULL, NULL),
(2116, 'm', 'Binco', 'Hose', 'FitnesshoseBigness', 150.00, 60.00, 0.00, 90.00, NULL, NULL),
(2117, 'm', 'Binco', 'Hose', 'SchlupfhoseBatik', 80.00, 32.00, 0.00, 48.00, NULL, NULL),
(2118, 'm', 'Binco', 'Hose', 'SchwarzeJogginghosemitBund', 100.00, 40.00, 0.00, 60.00, NULL, NULL),
(2119, 'm', 'Binco', 'Hose', 'SkinnyJeansSaggedbreitKazinsky', 100.00, 40.00, 0.00, 60.00, NULL, NULL),
(2120, 'm', 'Binco', 'Hose', 'Boxershorts', 60.00, 24.00, 0.00, 36.00, NULL, NULL),
(2121, 'm', 'Binco', 'Hose', 'Schlupfhose', 80.00, 32.00, 0.00, 48.00, NULL, NULL),
(2122, 'm', 'Binco', 'Hose', 'BaggyJeansKnitter', 30.00, 12.00, 0.00, 18.00, NULL, NULL),
(2123, 'm', 'Binco', 'Hose', 'BasketballshortsProlapsBroker', 50.00, 20.00, 0.00, 30.00, NULL, NULL),
(2124, 'm', 'Binco', 'Hose', 'BasketballshortsExsorbeo', 50.00, 20.00, 0.00, 30.00, NULL, NULL),
(2125, 'm', 'Binco', 'Hose', 'BoxershortsHerzchen', 60.00, 24.00, 0.00, 36.00, NULL, NULL),
(2126, 'm', 'Binco', 'Hose', 'BlaueBlagueurs-Jogg.m.Bund', 100.00, 40.00, 0.00, 60.00, NULL, NULL),
(2127, 'm', 'Binco', 'Hose', 'ShortsBarock', 200.00, 80.00, 0.00, 120.00, NULL, NULL),
(2128, 'm', 'Binco', 'Hose', 'Basketballhose', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2129, 'm', 'Binco', 'Hose', '(Farbe)Manor-Joggingh.m.Bund', 100.00, 40.00, 0.00, 60.00, NULL, NULL),
(2130, 'm', 'Binco', 'Hose', 'HosemitB�gelfalte', 220.00, 88.00, 0.00, 132.00, NULL, NULL),
(2131, 'm', 'Binco', 'Hose', 'Jogginghoseheat', 50.00, 20.00, 0.00, 30.00, NULL, NULL),
(2132, 'm', 'Binco', 'Hose', '(Farbe)-Strandhose', 190.00, 76.00, 0.00, 114.00, NULL, NULL),
(2133, 'm', 'Binco', 'Hose', '(Farbe)bestickteFB-Jeans', 150.00, 60.00, 0.00, 90.00, NULL, NULL),
(2134, 'm', 'Binco', 'Hose', 'Breite(Farbe)Blitzhose', 80.00, 32.00, 0.00, 48.00, NULL, NULL),
(2135, 'm', 'Binco', 'Hose', 'JogginghoseSaggedProLaps', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2136, 'm', 'Binco', 'Hose', 'Sporthose(Sport)(Farbe)', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2137, 'm', 'Binco', 'Hose', 'SkinnySagged(Farbe)', 40.00, 16.00, 0.00, 24.00, NULL, NULL),
(2138, 'm', 'Binco', 'Hose', 'Joggerheat', 80.00, 32.00, 0.00, 48.00, NULL, NULL),
(2139, 'm', 'Binco', 'Hose', 'TechJoggerBigness', 200.00, 80.00, 0.00, 120.00, NULL, NULL),
(2353, '', '', '', '(farbe) Melone', 180.00, NULL, 72.00, 108.00, NULL, NULL),
(2354, '', '', '', 'Feiner (farbe) Fedora', 350.00, NULL, 140.00, 210.00, NULL, NULL),
(2685, 'm', 'Suburban', 'Hose', 'Skninny Jeans Sagged Kazinsky', 100.00, NULL, 40.00, 60.00, NULL, NULL),
(2686, 'm', 'Suburban', 'Hose', 'Fitnesshose Bigness', 150.00, NULL, 60.00, 90.00, NULL, NULL),
(2687, 'm', 'Suburban', 'Hose', 'Schlupfhose Batik', 80.00, NULL, 32.00, 48.00, NULL, NULL),
(2688, 'm', 'Suburban', 'Hose', 'Schwarze Jogginghose mit Bund', 100.00, NULL, 40.00, 60.00, NULL, NULL),
(2689, 'm', 'Suburban', 'Hose', 'Skinny Jeans Sagged breit Kazinsky', 100.00, NULL, 40.00, 60.00, NULL, NULL),
(2690, 'm', 'Suburban', 'Hose', 'Boxershorts', 60.00, NULL, 24.00, 36.00, NULL, NULL),
(2691, 'm', 'Suburban', 'Hose', 'Schlupfhose', 80.00, NULL, 32.00, 48.00, NULL, NULL),
(2692, 'm', 'Suburban', 'Hose', 'Baggy Jeans Knitter', 30.00, NULL, 12.00, 18.00, NULL, NULL),
(2693, 'm', 'Suburban', 'Hose', 'Basketballshorts Prolaps Broker', 50.00, NULL, 20.00, 30.00, NULL, NULL),
(2694, 'm', 'Suburban', 'Hose', 'Basketballshorts Exsorbeo', 50.00, NULL, 20.00, 30.00, NULL, NULL),
(2695, 'm', 'Suburban', 'Hose', 'Boxershorts Herzchen', 60.00, NULL, 24.00, 36.00, NULL, NULL),
(2696, 'm', 'Suburban', 'Hose', 'Blaue Blagueurs-Jogg. m. Bund', 100.00, NULL, 40.00, 60.00, NULL, NULL),
(2697, 'm', 'Suburban', 'Hose', 'Shorts Barock', 200.00, NULL, 80.00, 120.00, NULL, NULL),
(2698, 'm', 'Suburban', 'Hose', 'Basketballhose', 40.00, NULL, 16.00, 24.00, NULL, NULL),
(2699, 'm', 'Suburban', 'Hose', '(Farbe)  Manor-Joggingh. m. Bund', 100.00, NULL, 40.00, 60.00, NULL, NULL),
(2700, 'm', 'Suburban', 'Hose', 'Hose mit Bügelfalte', 220.00, NULL, 88.00, 132.00, NULL, NULL),
(2701, 'm', 'Suburban', 'Hose', 'Jogginghose heat', 50.00, NULL, 20.00, 30.00, NULL, NULL),
(2702, 'm', 'Suburban', 'Hose', '(Farbe)-Strandhose', 190.00, NULL, 76.00, 114.00, NULL, NULL),
(2703, 'm', 'Suburban', 'Hose', '(Farbe) bestickte FB-Jeans', 150.00, NULL, 60.00, 90.00, NULL, NULL),
(2704, 'm', 'Suburban', 'Hose', 'Breite (Farbe) Blitzhose', 80.00, NULL, 32.00, 48.00, NULL, NULL),
(2705, 'm', 'Suburban', 'Hose', 'Jogginghose Sagged ProLaps', 40.00, NULL, 16.00, 24.00, NULL, NULL),
(2706, 'm', 'Suburban', 'Hose', 'Sporthose (Sport) (Farbe)', 40.00, NULL, 16.00, 24.00, NULL, NULL),
(2707, 'm', 'Suburban', 'Hose', 'Skinny Sagged (Farbe)', 40.00, NULL, 16.00, 24.00, NULL, NULL),
(2708, 'm', 'Suburban', 'Hose', 'Jogger heat', 80.00, NULL, 32.00, 48.00, NULL, NULL),
(2709, 'm', 'Suburban', 'Hose', 'Tech Jogger Bigness (Farbe)', 200.00, NULL, 80.00, 120.00, NULL, NULL),
(2710, 'm', 'Suburban', 'Hose', 'Jogginghose sagged (Farbe)', 50.00, NULL, 20.00, 30.00, NULL, NULL),
(2711, 'm', 'Suburban', 'Hose', 'Shorts LS (Farbe)', 150.00, NULL, 60.00, 90.00, NULL, NULL),
(2712, 'm', 'Suburban', 'Hose', 'Premium Sagged Jeans (Farbe)', 350.00, NULL, 140.00, 210.00, NULL, NULL),
(2713, 'm', 'Suburban', 'Hose', 'Rippled jeans (Farbe)', 350.00, NULL, 140.00, 210.00, NULL, NULL),
(2714, 'm', 'Suburban', 'Brillen', 'Runde Hipster Brille (Farbe)', 50.00, NULL, 20.00, 30.00, NULL, NULL),
(2715, 'm', 'Suburban', 'Brillen', 'Brille Schmal (Farbe)', 20.00, NULL, 8.00, 12.00, NULL, NULL),
(2716, 'm', 'Suburban', 'Brillen', 'Modebrille Trend (Farbe)', 29.00, NULL, 11.60, 17.40, NULL, NULL),
(2717, 'm', 'Suburban', 'Brillen', 'Brille Breit (Farbe)', 120.00, NULL, 48.00, 72.00, NULL, NULL),
(2718, 'm', 'Suburban', 'Brillen', '(Farbe) Cateye-Sonnenbrille', 70.00, NULL, 28.00, 42.00, NULL, NULL),
(2719, 'm', 'Suburban', 'Brillen', 'Fliegerbrille eckig (Farbe)', 149.00, NULL, 59.60, 89.40, NULL, NULL),
(2720, 'm', 'Suburban', 'Brillen', 'Brille Docks (Farbe)', 49.00, NULL, 19.60, 29.40, NULL, NULL),
(2721, 'm', 'Suburban', 'Brillen', '(Farbe) quadratische Brille', 100.00, NULL, 40.00, 60.00, NULL, NULL),
(2722, 'm', 'Suburban', 'Brillen', 'Sportbrille Modern (Farbe)', 110.00, NULL, 44.00, 66.00, NULL, NULL),
(2723, 'm', 'Suburban', 'Brillen', 'Hausmeisterbrille (Farbe)', 49.00, NULL, 19.60, 29.40, NULL, NULL),
(2724, 'm', 'Suburban', 'Brillen', 'Brille eckig (Farbe)', 129.00, NULL, 51.60, 77.40, NULL, NULL),
(2725, 'm', 'Suburban', 'Brillen', '(Farbe) rechteckige Brille', 70.00, NULL, 28.00, 42.00, NULL, NULL),
(2726, 'm', 'Suburban', 'Brillen', 'Klassische Sonnenbrille (Farbe)', 29.00, NULL, 11.60, 17.40, NULL, NULL),
(2727, 'm', 'Suburban', 'Brillen', '(Farbe) ergonomische Brille', 80.00, NULL, 32.00, 48.00, NULL, NULL),
(2728, 'm', 'Suburban', 'Brillen', '(Farbe) runde Retrobrille', 60.00, NULL, 24.00, 36.00, NULL, NULL),
(2729, 'm', 'Suburban', 'Brillen', 'Freizeitbrille (Farbe)', 29.00, NULL, 11.60, 17.40, NULL, NULL),
(2730, 'm', 'Suburban', 'Brillen', 'Brille Bull Emic (Farbe)', 39.00, NULL, 15.60, 23.40, NULL, NULL),
(2731, 'm', 'Suburban', 'Brillen', 'Brille Elvis (Farbe)', 89.00, NULL, 35.60, 53.40, NULL, NULL),
(2732, 'm', 'Suburban', 'Brillen', 'Brille Eckig (Farbe) (billig)', 69.00, NULL, 27.60, 41.40, NULL, NULL),
(2733, 'm', 'Suburban', 'Brillen', 'Sportbrille (Farbe)', 99.00, NULL, 39.60, 59.40, NULL, NULL),
(2734, 'm', 'Suburban', 'Ohrringe', 'Goldimitat FOS-Mikros Ohrringe', 269.00, NULL, 107.60, 161.40, NULL, NULL),
(2735, 'm', 'Suburban', 'Ohrringe', 'Silberne FOS-Mikros Ohrringe', 250.00, NULL, 100.00, 150.00, NULL, NULL),
(2736, 'm', 'Suburban', 'Ohrringe', '(Form)-Ohrringe', 150.00, NULL, 60.00, 90.00, NULL, NULL),
(2737, 'm', 'Suburban', 'Ohrringe', '(Farbe) Würfel-Ohrringe', 150.00, NULL, 60.00, 90.00, NULL, NULL),
(2738, 'm', 'Suburban', 'Ohrringe', 'Silber-Totenkopfstecker (L) oder (R )', 120.00, NULL, 48.00, 72.00, NULL, NULL),
(2739, 'm', 'Suburban', 'Ohrringe', 'Schwarzer Totenkopfstecker (L) oder (R )', 150.00, NULL, 60.00, 90.00, NULL, NULL),
(2740, 'm', 'Suburban', 'Ohrringe', 'Goldimitat-Totenkopfstecker (L) oder (R )', 120.00, NULL, 48.00, 72.00, NULL, NULL),
(2741, 'm', 'Suburban', 'Ohrringe', 'Stahl-Totenkopfstecker (L) oder (R )', 120.00, NULL, 48.00, 72.00, NULL, NULL),
(2742, 'm', 'Suburban', 'Ohrringe', '(Farbe) Jeton-Ohrringe', 150.00, NULL, 60.00, 90.00, NULL, NULL),
(2743, 'm', 'Suburban', 'Ohrringe', '(Farbe)-Totenkopfstecker (L) + (R )', 199.00, NULL, 79.60, 119.40, NULL, NULL),
(2744, 'm', 'Suburban', 'Ohrringe', '(Farbe)-Kissenstecker (L) oder (R )', 199.00, NULL, 79.60, 119.40, NULL, NULL),
(2745, 'm', 'Suburban', 'Ohrringe', '(Farbe)-Kissenstecker (L) + (R )', 350.00, NULL, 140.00, 210.00, NULL, NULL),
(2746, 'm', 'Suburban', 'Ohrringe', '(Farbe)-Raster-Viereckstein (L) oder (R )', 159.00, NULL, 63.60, 95.40, NULL, NULL),
(2747, 'm', 'Suburban', 'Ohrringe', '(Farbe)-Raster-Viereckstein (L) + (R )', 300.00, NULL, 120.00, 180.00, NULL, NULL),
(2748, 'm', 'Suburban', 'Uhr', '(Farbe) Sportuhr', 69.00, NULL, 27.60, 41.40, NULL, NULL),
(2749, 'm', 'Suburban', 'Uhr', 'Robuste (Farbe)uhr', 259.00, NULL, 103.60, 155.40, NULL, NULL),
(2750, 'm', 'Suburban', 'Armbänder', '(Farbe) Perlenarmband', 150.00, NULL, 60.00, 90.00, NULL, NULL),
(2751, 'm', 'Suburban', 'Uhr', '(Farbe) Kronos Tempo', 299.00, NULL, 119.60, 179.40, NULL, NULL),
(2752, 'm', 'Suburban', 'Armbänder', 'Grobe Armkette Silberimitat (L) oder (R )', 290.00, NULL, 116.00, 174.00, NULL, NULL),
(2753, 'm', 'Suburban', 'Uhr', '(Farbe) Fame-or-Shame-Kronos', 399.00, NULL, 159.60, 239.40, NULL, NULL),
(2754, 'm', 'Suburban', 'Uhr', '(Farbe) Fifty Kronos Ära', 499.00, NULL, 199.60, 299.40, NULL, NULL),
(2755, 'm', 'Suburban', 'Armbänder', 'Motorradkette (L) oder (R )', 260.00, NULL, 104.00, 156.00, NULL, NULL),
(2756, 'm', 'Suburban', 'Uhr', '(Farbe) Kronos Submariner', 399.00, NULL, 159.60, 239.40, NULL, NULL);
INSERT INTO `artikel` (`ID`, `Geschlecht`, `Verkaufsladen`, `Kategorie`, `Artikelname`, `Einkaufspreis_org`, `EmpfohlenerEinkaufspreis`, `Einkaufspreis`, `EmpfohlenerVerkaufspreis`, `Verkaufspreis`, `Bestand`) VALUES
(2757, 'm', 'Suburban', 'Armbänder', '(Farbe) SASS-Armband', 145.00, NULL, 58.00, 87.00, NULL, NULL),
(2758, 'm', 'Suburban', 'Armbänder', 'Schädel-Armkette Silberimitat (L) oder (R )', 310.00, NULL, 124.00, 186.00, NULL, NULL),
(2759, 'm', 'Suburban', 'Armbänder', 'Nietenarmband (L) oder (R )', 75.00, NULL, 30.00, 45.00, NULL, NULL),
(2760, 'm', 'Suburban', 'Armbänder', '(Farbe) gewobenes Armband (L) oder (R )', 55.00, NULL, 22.00, 33.00, NULL, NULL),
(2761, 'm', 'Suburban', 'Schuhe', 'Hightops Eris (Farbe)', 80.00, NULL, 32.00, 48.00, NULL, NULL),
(2762, 'm', 'Suburban', 'Schuhe', 'Chuck Larsen (Farbe)', 50.00, NULL, 20.00, 30.00, NULL, NULL),
(2763, 'm', 'Suburban', 'Schuhe', 'Hightops mit Nieten (Farbe)', 75.00, NULL, 30.00, 45.00, NULL, NULL),
(2764, 'm', 'Suburban', 'Schuhe', 'Laufschuhe heat RVR (Farbe)', 100.00, NULL, 40.00, 60.00, NULL, NULL),
(2765, 'm', 'Suburban', 'Schuhe', 'Slipper Hund mit Halskrause gelb', 200.00, NULL, 80.00, 120.00, NULL, NULL),
(2766, 'm', 'Suburban', 'Schuhe', 'Air Kazinsky VI (Farbe)', 190.00, NULL, 76.00, 114.00, NULL, NULL),
(2767, 'm', 'Suburban', 'Schuhe', 'ProLaps Kazinsky XVII (Farbe)', 190.00, NULL, 76.00, 114.00, NULL, NULL),
(2768, 'm', 'Suburban', 'Schuhe', 'Knöchelturnschuhe (Farbe)', 100.00, NULL, 40.00, 60.00, NULL, NULL),
(2769, 'm', 'Suburban', 'Schuhe', 'Hightops Prolaps (Farbe)', 100.00, NULL, 40.00, 60.00, NULL, NULL),
(2770, 'm', 'Suburban', 'Schuhe', '(Farbe) Stoffturnschuhe', 180.00, NULL, 72.00, 108.00, NULL, NULL),
(2771, 'm', 'Suburban', 'Schuhe', '(Farbe) Logger-Stiefel', 150.00, NULL, 60.00, 90.00, NULL, NULL),
(2772, 'm', 'Suburban', 'Schuhe', '(Farbe) Logger-Stiefel (kurz)', 120.00, NULL, 48.00, 72.00, NULL, NULL),
(2773, 'm', 'Suburban', 'Schuhe', 'Heat WaterMax (Farbe)', 50.00, NULL, 20.00, 30.00, NULL, NULL),
(2774, 'm', 'Suburban', 'Schuhe', '(Farbe) Badeschlappen', 80.00, NULL, 32.00, 48.00, NULL, NULL),
(2775, 'm', 'Suburban', 'Schuhe', '(Farbe)-Leinenschuhe', 50.00, NULL, 20.00, 30.00, NULL, NULL),
(2776, 'm', 'Suburban', 'Schuhe', 'ProLaps Air Force (Farbe)', 90.00, NULL, 36.00, 54.00, NULL, NULL),
(2777, 'm', 'Suburban', 'Schuhe', 'Heat Originals (Farbe)', 60.00, NULL, 24.00, 36.00, NULL, NULL),
(2778, 'm', 'Suburban', 'Schuhe', 'Laufschuhe ProLaps (Farbe)', 60.00, NULL, 24.00, 36.00, NULL, NULL),
(2779, 'm', 'Suburban', 'Schuhe', '(Farbe)-Ugglies m. Socken', 60.00, NULL, 24.00, 36.00, NULL, NULL),
(2780, 'm', 'Suburban', 'Schuhe', 'Chuck Larsen mit Socken (Farbe)', 55.00, NULL, 22.00, 33.00, NULL, NULL),
(2781, 'm', 'Suburban', 'Schuhe', 'Sneaker high (Farbe)', 100.00, NULL, 40.00, 60.00, NULL, NULL),
(2782, 'm', 'Suburban', 'Schuhe', 'Chuck Larsen (Farbe) Muster', 100.00, NULL, 40.00, 60.00, NULL, NULL),
(2783, 'm', 'Suburban', 'Ketten', 'Magnetics-Goldkette', 400.00, NULL, 160.00, 240.00, NULL, NULL),
(2784, 'm', 'Suburban', 'Ketten', '(Farbe) Wüstenschal', 30.00, NULL, 12.00, 18.00, NULL, NULL),
(2785, 'm', 'Suburban', 'Ketten', 'Lockere Goldimitat-Gliederkette', 30.00, NULL, 12.00, 18.00, NULL, NULL),
(2786, 'm', 'Suburban', 'Ketten', 'Bronzekette', 20.00, NULL, 8.00, 12.00, NULL, NULL),
(2787, 'm', 'Suburban', 'Ohrringe', 'Orringe Silber', 200.00, NULL, 80.00, 120.00, NULL, NULL),
(2788, 'm', 'Suburban', 'Ohrringe', 'Magnetics-Platinkette', 600.00, NULL, 240.00, 360.00, NULL, NULL),
(2789, 'm', 'Suburban', 'Ohrringe', 'Handringe Zacken (Metal Farbe)', 200.00, NULL, 80.00, 120.00, NULL, NULL),
(2790, 'm', 'Suburban', 'Ohrringe', 'Handringe Zacken Schwarz', 100.00, NULL, 40.00, 60.00, NULL, NULL),
(2791, 'm', 'Suburban', 'Ohrringe', '(Farbe) Perlenhalskette', 60.00, NULL, 24.00, 36.00, NULL, NULL),
(2792, 'm', 'Suburban', 'Ohrringe', '(Farbe) Barren-Anhänger', 700.00, NULL, 280.00, 420.00, NULL, NULL),
(2793, 'm', 'Suburban', 'Ohrringe', 'Crosschain (Farbe)', 100.00, NULL, 40.00, 60.00, NULL, NULL),
(2794, 'm', 'Suburban', 'Unterhemden', 'Hoodie Bigness (Farbe)', 120.00, NULL, 48.00, 72.00, NULL, NULL),
(2795, 'm', 'Suburban', 'Oberteile', 'Ärmelloser (Farbe)-Hoodie', 180.00, NULL, 72.00, 108.00, NULL, NULL),
(2796, 'm', 'Suburban', 'Oberteile', '(Bild)-T-Shirt', 80.00, NULL, 32.00, 48.00, NULL, NULL),
(2797, 'm', 'Suburban', 'Oberteile', '(Farbe) Sporttrainingsjacke', 110.00, NULL, 44.00, 66.00, NULL, NULL),
(2798, 'm', 'Suburban', 'Oberteile', '(Farbe)-Bomber', 150.00, NULL, 60.00, 90.00, NULL, NULL),
(2799, 'm', 'Suburban', 'Oberteile', '(Farbe) ärmelloser Digitaltarn-Hoodie', 180.00, NULL, 72.00, 108.00, NULL, NULL),
(2800, 'm', 'Suburban', 'Oberteile', '(Farbe)-Sport-T-Shirt', 120.00, NULL, 48.00, 72.00, NULL, NULL),
(2801, 'm', 'Suburban', 'Oberteile', '(Farbe) Val-De-Grace-', 100.00, NULL, 40.00, 60.00, NULL, NULL),
(2802, 'm', 'Suburban', 'Oberteile', '(Farbe) Hawaiian Snow', 180.00, NULL, 72.00, 108.00, NULL, NULL),
(2803, 'm', 'Suburban', 'Oberteile', '(Sportclub)-Sport-Langarmshirt', 120.00, NULL, 48.00, 72.00, NULL, NULL),
(2804, 'm', 'Suburban', 'Oberteile', 'Blouson (Farbe)', 80.00, NULL, 32.00, 48.00, NULL, NULL),
(2805, 'm', 'Suburban', 'Oberteile', '(Farbe) SN-Bomber (offen)', 180.00, NULL, 72.00, 108.00, NULL, NULL),
(2806, 'm', 'Suburban', 'Oberteile', '(Farbe)-Trainingsjacke', 200.00, NULL, 80.00, 120.00, NULL, NULL),
(2807, 'm', 'Suburban', 'Oberteile', '(Farbe) Bigness-Regenjacke', 120.00, NULL, 48.00, 72.00, NULL, NULL),
(2808, 'm', 'Suburban', 'Oberteile', '(Farbe) (Bezeichung)-Hoodie', 270.00, NULL, 108.00, 162.00, NULL, NULL),
(2809, 'm', 'Suburban', 'Oberteile', '(Sportclub)-Rennjacke', 150.00, NULL, 60.00, 90.00, NULL, NULL),
(2810, 'm', 'Suburban', 'Oberteile', '(Sportclub)-College', 100.00, NULL, 40.00, 60.00, NULL, NULL),
(2811, 'm', 'Suburban', 'Oberteile', '(Farbe)-Regenjacke (geschlossen)', 120.00, NULL, 48.00, 72.00, NULL, NULL),
(2812, 'm', 'Suburban', 'Oberteile', '(Muster+Farbe)-Bomberjacke', 220.00, NULL, 88.00, 132.00, NULL, NULL),
(2813, 'm', 'Suburban', 'Oberteile', '(Sportclub)-College (offen)', 100.00, NULL, 40.00, 60.00, NULL, NULL),
(2814, 'm', 'Suburban', 'Oberteile', '(Farbe) Trainingsjacke', 150.00, NULL, 60.00, 90.00, NULL, NULL),
(2815, 'm', 'Suburban', 'Oberteile', 'Panther-Collagejacke', 180.00, NULL, 72.00, 108.00, NULL, NULL),
(2816, 'm', 'Suburban', 'Oberteile', 'Poloshirt (Farbe)', 80.00, NULL, 32.00, 48.00, NULL, NULL),
(2817, 'm', 'Suburban', 'Oberteile', '(Farbe) gesteppte YETI Jacke', 250.00, NULL, 100.00, 150.00, NULL, NULL),
(2818, 'm', 'Suburban', 'Oberteile', '(Muster+Farbe)-Lederjacke', 240.00, NULL, 96.00, 144.00, NULL, NULL),
(2819, 'm', 'Suburban', 'Oberteile', 'Panther-Tourjacke', 180.00, NULL, 72.00, 108.00, NULL, NULL),
(2820, 'm', 'Suburban', 'Oberteile', '(Muster+Farbe) Lederjacke (offen)', 280.00, NULL, 112.00, 168.00, NULL, NULL),
(2821, 'm', 'Suburban', 'Oberteile', 'Sportjacke (Team) (Farbe)', 250.00, NULL, 100.00, 150.00, NULL, NULL),
(2822, 'm', 'Suburban', 'Oberteile', 'Unterhemd (Farbe)', 80.00, NULL, 32.00, 48.00, NULL, NULL),
(2823, 'm', 'Suburban', 'Oberteile', '(Farbe)-Kapuzenpullover', 120.00, NULL, 48.00, 72.00, NULL, NULL),
(2824, 'm', 'Suburban', 'Oberteile', '(Team)-T-Shirt', 30.00, NULL, 12.00, 18.00, NULL, NULL),
(2825, 'm', 'Suburban', 'Oberteile', '(Farbe)-Pullover', 180.00, NULL, 72.00, 108.00, NULL, NULL),
(2826, 'm', 'Suburban', 'Oberteile', '(Farbe) Bigness-Trikot', 150.00, NULL, 60.00, 90.00, NULL, NULL),
(2827, 'm', 'Suburban', 'Oberteile', '(Farbe)-Polohemnd', 80.00, NULL, 32.00, 48.00, NULL, NULL),
(2828, 'm', 'Suburban', 'Oberteile', '(Farbe)-Steppjacke', 150.00, NULL, 60.00, 90.00, NULL, NULL),
(2829, 'm', 'Suburban', 'Oberteile', 'T-Shirt (Team) (Farbe)', 200.00, NULL, 80.00, 120.00, NULL, NULL),
(2830, 'm', 'Suburban', 'Oberteile', 'Strickjacke (Farbe)', 130.00, NULL, 52.00, 78.00, NULL, NULL),
(2831, 'm', 'Suburban', 'Oberteile', '(Farbe)-Hippie-Hoodie', 40.00, NULL, 16.00, 24.00, NULL, NULL),
(2832, 'm', 'Suburban', 'Oberteile', 'Collagejacke LC Wrath rot', 70.00, NULL, 28.00, 42.00, NULL, NULL),
(2833, 'm', 'Suburban', 'Oberteile', '(Farbe)-Golf-Polohemd', 80.00, NULL, 32.00, 48.00, NULL, NULL),
(2834, 'm', 'Suburban', 'Oberteile', '(Farbe) Pullover m. V-Ausschnitt', 80.00, NULL, 32.00, 48.00, NULL, NULL),
(2835, 'm', 'Suburban', 'Oberteile', '(Farbe) Hockeytrikot', 70.00, NULL, 28.00, 42.00, NULL, NULL),
(2836, 'm', 'Suburban', 'Oberteile', '(Farbe)-Golf-Polohemd. Reingesteckt', 80.00, NULL, 32.00, 48.00, NULL, NULL),
(2837, 'm', 'Suburban', 'Oberteile', 'T-Shirt Chibi (Motiv)', 200.00, NULL, 80.00, 120.00, NULL, NULL),
(2838, 'm', 'Suburban', 'Oberteile', 'Bomberjacke Bigness (Farbe)', 180.00, NULL, 72.00, 108.00, NULL, NULL),
(2839, 'm', 'Suburban', 'Oberteile', 'Polohemd Liberty/Flying Bravo', 135.00, NULL, 54.00, 81.00, NULL, NULL),
(2840, 'm', 'Suburban', 'Oberteile', '(Farbe) YETI Polohemnd', 130.00, NULL, 52.00, 78.00, NULL, NULL),
(2841, 'm', 'Suburban', 'Oberteile', 'Marineblaues FB-Polohemnd', 80.00, NULL, 32.00, 48.00, NULL, NULL),
(2842, 'm', 'Suburban', 'Oberteile', '(Farbe) hinterland', 40.00, NULL, 16.00, 24.00, NULL, NULL),
(2843, 'm', 'Suburban', 'Oberteile', 'Basketball Trikot Grau', 25.00, NULL, 10.00, 15.00, NULL, NULL),
(2844, 'm', 'Suburban', 'Oberteile', 'Hemd kurzarm Güffy (Farbe)', 30.00, NULL, 12.00, 18.00, NULL, NULL),
(2845, 'm', 'Suburban', 'Oberteile', 'Pullover aus Tweed (Farbe)', 100.00, NULL, 40.00, 60.00, NULL, NULL),
(2846, 'm', 'Suburban', 'Oberteile', 'Pullover (Farbe)', 120.00, NULL, 48.00, 72.00, NULL, NULL),
(2847, 'm', 'Suburban', 'Oberteile', '(Team) Baseballtrikot', 55.00, NULL, 22.00, 33.00, NULL, NULL),
(2848, 'm', 'Suburban', 'Oberteile', 'San-Andreas-Polohemnd', 135.00, NULL, 54.00, 81.00, NULL, NULL),
(2849, 'm', 'Suburban', 'Oberteile', 'Poloshirt (Marke)', 50.00, NULL, 20.00, 30.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fahrzeug`
--

CREATE TABLE `fahrzeug` (
  `id` int(11) NOT NULL,
  `fahrzeugname` varchar(255) NOT NULL,
  `nummernschild` varchar(10) NOT NULL,
  `anzahl_schluessel` int(11) NOT NULL,
  `fahrzeugbrief` enum('ja','nein','wird_nachgeliefert') NOT NULL,
  `ankaufdatum` date NOT NULL,
  `ankaufpreis` decimal(10,2) NOT NULL,
  `gewinn_rate` decimal(5,2) NOT NULL,
  `verkaufspreis` decimal(10,2) NOT NULL,
  `verkaufszeit` date DEFAULT NULL,
  `vorname_verkaeufer` varchar(20) DEFAULT NULL,
  `name_verkaeufer` varchar(50) DEFAULT NULL,
  `geburtsdatum_verkaeufer` date DEFAULT NULL,
  `personalausweisnummer_verkaeufer` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Daten für Tabelle `fahrzeug`
--

INSERT INTO `fahrzeug` (`id`, `fahrzeugname`, `nummernschild`, `anzahl_schluessel`, `fahrzeugbrief`, `ankaufdatum`, `ankaufpreis`, `gewinn_rate`, `verkaufspreis`, `verkaufszeit`, `vorname_verkaeufer`, `name_verkaeufer`, `geburtsdatum_verkaeufer`, `personalausweisnummer_verkaeufer`) VALUES
(1, 'Test', 'Test', 2, 'wird_nachgeliefert', '2023-09-04', 5000.00, 0.15, 5750.00, '2023-09-04', NULL, NULL, NULL, NULL),
(2, 'Test', 'Test', 2, 'ja', '2023-09-04', 400.00, 0.20, 480.00, NULL, NULL, NULL, NULL, NULL),
(5, 'Bleeter', 'YMLS2', 2, 'wird_nachgeliefert', '2023-09-04', 400.00, 0.40, 560.00, NULL, 'Antony', 'Ravenmoor', '1980-01-26', '75854764');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunden`
--

CREATE TABLE `kunden` (
  `kundennummer` int(11) NOT NULL,
  `kundenname` varchar(255) NOT NULL,
  `kundenvorname` varchar(255) DEFAULT NULL,
  `telefonnummer` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `interessen` text DEFAULT NULL,
  `bemerkungen` text DEFAULT NULL,
  `interne_bemerkungen` text DEFAULT NULL,
  `rabatt_stufe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Daten für Tabelle `kunden`
--

INSERT INTO `kunden` (`kundennummer`, `kundenname`, `kundenvorname`, `telefonnummer`, `email`, `interessen`, `bemerkungen`, `interne_bemerkungen`, `rabatt_stufe`) VALUES
(1, 'Ravenmoor', 'Antony', '323583282', 'antony.ravenmoor@mail.ls', 'viele, Uhren', 'Anrufen', 'Ganove', 50),
(2, 'Young', 'Maddison', '323000000', 'm.young@mail.los', NULL, '-', 'Freundin Alvaro', 20);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunden_interessen`
--

CREATE TABLE `kunden_interessen` (
  `id` int(11) NOT NULL,
  `kunde_id` int(11) DEFAULT NULL,
  `schlagwort` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Daten für Tabelle `kunden_interessen`
--

INSERT INTO `kunden_interessen` (`id`, `kunde_id`, `schlagwort`) VALUES
(1, 2, 'Sport'),
(2, 2, 'Mode'),
(3, 2, 'Bike'),
(4, 2, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunden_transaktionen`
--

CREATE TABLE `kunden_transaktionen` (
  `id` int(11) NOT NULL,
  `kunde_id` int(11) DEFAULT NULL,
  `transaktionstyp` enum('Einnahme','Ausgabe') DEFAULT NULL,
  `betrag` decimal(10,2) NOT NULL,
  `transaktionsdatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Daten für Tabelle `kunden_transaktionen`
--

INSERT INTO `kunden_transaktionen` (`id`, `kunde_id`, `transaktionstyp`, `betrag`, `transaktionsdatum`) VALUES
(1, 2, '', 500.00, '2023-09-04');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `fahrzeug`
--
ALTER TABLE `fahrzeug`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `kunden`
--
ALTER TABLE `kunden`
  ADD PRIMARY KEY (`kundennummer`);

--
-- Indizes für die Tabelle `kunden_interessen`
--
ALTER TABLE `kunden_interessen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kunde_id` (`kunde_id`);

--
-- Indizes für die Tabelle `kunden_transaktionen`
--
ALTER TABLE `kunden_transaktionen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kunde_id` (`kunde_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `artikel`
--
ALTER TABLE `artikel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2850;

--
-- AUTO_INCREMENT für Tabelle `fahrzeug`
--
ALTER TABLE `fahrzeug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `kunden`
--
ALTER TABLE `kunden`
  MODIFY `kundennummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `kunden_interessen`
--
ALTER TABLE `kunden_interessen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `kunden_transaktionen`
--
ALTER TABLE `kunden_transaktionen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `kunden_interessen`
--
ALTER TABLE `kunden_interessen`
  ADD CONSTRAINT `kunden_interessen_ibfk_1` FOREIGN KEY (`kunde_id`) REFERENCES `kunden` (`kundennummer`);

--
-- Constraints der Tabelle `kunden_transaktionen`
--
ALTER TABLE `kunden_transaktionen`
  ADD CONSTRAINT `kunden_transaktionen_ibfk_1` FOREIGN KEY (`kunde_id`) REFERENCES `kunden` (`kundennummer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

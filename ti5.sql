-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 08. Mrz 2019 um 20:52
-- Server-Version: 10.1.37-MariaDB
-- PHP-Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `ti5`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `article`
--

CREATE TABLE `article` (
  `article_id` int(255) NOT NULL,
  `article_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` enum('Hardware','Software') COLLATE utf8_unicode_ci DEFAULT NULL,
  `os` enum('Windows','Mac') COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','hidden') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `article`
--

INSERT INTO `article` (`article_id`, `article_name`, `description`, `price`, `stock`, `picture`, `category`, `os`, `status`) VALUES
(2, 'test1', 'test123', '12.50', 11, 'img\\articles\\magnet_1.jpg', 'Hardware', 'Windows', 'active'),
(4, 'test2', 'test123', '11.50', 11, 'img\\articles\\magnet_1.jpg', 'Hardware', 'Windows', 'active'),
(5, 'test3', 'test123', '102.50', 11, 'img\\articles\\magnet_1.jpg', 'Hardware', 'Windows', 'active'),
(6, 'test4', 'test123', '12.50', 0, 'img\\articles\\magnet_1.jpg', 'Software', 'Mac', 'active'),
(7, 'test5', 'test123', '122.50', 11, 'img\\articles\\magnet_1.jpg', 'Hardware', 'Mac', 'active'),
(8, 'test6', 'test123', '12.50', 11, 'img\\articles\\magnet_1.jpg', 'Software', 'Windows', 'active');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `currency`
--

INSERT INTO `currency` (`currency_id`, `currency`, `rate`) VALUES
(1, 'EUR', '1.00'),
(2, 'CHF', '1.13'),
(3, 'USD', '1.12'),
(4, 'JPY', '124.72');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plz` int(10) NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `customer`
--

INSERT INTO `customer` (`customer_id`, `username`, `email`, `pass`, `gname`, `surname`, `address`, `plz`, `city`, `currency_id`) VALUES
(3, 'test1', 'test1@test1.ch', '$2y$10$YR3a6yv4r3Rc0fUwnKtKZe0pIYdAeprZM9nKC3Sr5Z7gpTrlN7i8u', 'test1', 'test1', 'test1', 1, 'test1', 3),
(4, 'test2', 'test2@test2.ch', '$2y$10$hUb7pDxOdmyqtnaWFd7xeu5qduSNFhvpq0HCIZJ1rHIOknGW9mC06', 'test2', 'test2', 'test2', 2, 'test2', 4),
(5, 'Luca', 'l.colagiorgio@dhdhsdh.ch', '$2y$10$qoqqNUoqF/MnPeDzlNk7mu1dLmRhYIGPUlZOqB.YvkQNZFW92P9GS', 'Luca', 'Colagiorgio', 'Im Dreispitz 4', 8152, 'Glattbrugg', 3),
(6, 'alert(\'\');', 'dasdasd@asdasd.ch', '$2y$10$Zpsi4JHT32DGsSu19qD3F.W8IkKJnhayOVyyGqZLk9M3KSaHfvUoy', 'asd', 'asd', 'asd', 2, 'asd', 1);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `customer_currency`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `customer_currency` (
`customer_id` int(255)
,`currency_id` int(11)
,`currency` varchar(10)
,`rate` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `hardware`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `hardware` (
`article_id` int(255)
,`article_name` varchar(200)
,`description` varchar(2000)
,`price` decimal(10,2)
,`stock` int(11)
,`picture` varchar(255)
,`category` enum('Hardware','Software')
,`os` enum('Windows','Mac')
);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `hardware_mac`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `hardware_mac` (
`article_id` int(255)
,`article_name` varchar(200)
,`description` varchar(2000)
,`price` decimal(10,2)
,`stock` int(11)
,`picture` varchar(255)
,`category` enum('Hardware','Software')
,`os` enum('Windows','Mac')
);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `hardware_windows`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `hardware_windows` (
`article_id` int(255)
,`article_name` varchar(200)
,`description` varchar(2000)
,`price` decimal(10,2)
,`stock` int(11)
,`picture` varchar(255)
,`category` enum('Hardware','Software')
,`os` enum('Windows','Mac')
);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachbestellungen`
--

CREATE TABLE `nachbestellungen` (
  `nachbestell_id` int(255) NOT NULL,
  `article_id` int(11) NOT NULL,
  `bestell_menge` int(11) NOT NULL,
  `lieferdatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `new_article`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `new_article` (
`article_id` int(255)
,`article_name` varchar(200)
,`description` varchar(2000)
,`price` decimal(10,2)
,`stock` int(11)
,`picture` varchar(255)
,`category` enum('Hardware','Software')
);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orderlist`
--

CREATE TABLE `orderlist` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `shipment` date NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `orderlist`
--

INSERT INTO `orderlist` (`order_id`, `customer_id`, `article_id`, `quantity`, `shipment`, `price`) VALUES
(17, 4, 8, 3, '2019-03-15', '13.00'),
(18, 4, 7, 1, '2019-03-15', '123.00');

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `order_detail`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `order_detail` (
`order_id` int(11)
,`article_name` varchar(200)
,`customer_id` int(11)
,`quantity` int(11)
,`shipment` date
,`price` decimal(20,2)
);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `shoppingcart_info`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `shoppingcart_info` (
`customer_id` int(255)
,`article_id` int(11)
,`article_name` varchar(200)
,`picture` varchar(255)
,`description` varchar(2000)
,`quantity` int(11)
,`price` decimal(20,2)
);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `software`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `software` (
`article_id` int(255)
,`article_name` varchar(200)
,`description` varchar(2000)
,`price` decimal(10,2)
,`stock` int(11)
,`picture` varchar(255)
,`category` enum('Hardware','Software')
,`os` enum('Windows','Mac')
);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `software_mac`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `software_mac` (
`article_id` int(255)
,`article_name` varchar(200)
,`description` varchar(2000)
,`price` decimal(10,2)
,`stock` int(11)
,`picture` varchar(255)
,`category` enum('Hardware','Software')
,`os` enum('Windows','Mac')
);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `software_windows`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `software_windows` (
`article_id` int(255)
,`article_name` varchar(200)
,`description` varchar(2000)
,`price` decimal(10,2)
,`stock` int(11)
,`picture` varchar(255)
,`category` enum('Hardware','Software')
,`os` enum('Windows','Mac')
);

-- --------------------------------------------------------

--
-- Struktur des Views `customer_currency`
--
DROP TABLE IF EXISTS `customer_currency`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customer_currency`  AS  select `customer`.`customer_id` AS `customer_id`,`customer`.`currency_id` AS `currency_id`,`currency`.`currency` AS `currency`,`currency`.`rate` AS `rate` from (`customer` join `currency`) where (`customer`.`currency_id` = `currency`.`currency_id`) ;

-- --------------------------------------------------------

--
-- Struktur des Views `hardware`
--
DROP TABLE IF EXISTS `hardware`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hardware`  AS  select `article`.`article_id` AS `article_id`,`article`.`article_name` AS `article_name`,`article`.`description` AS `description`,`article`.`price` AS `price`,`article`.`stock` AS `stock`,`article`.`picture` AS `picture`,`article`.`category` AS `category`,`article`.`os` AS `os` from `article` where (`article`.`category` = 'Hardware') ;

-- --------------------------------------------------------

--
-- Struktur des Views `hardware_mac`
--
DROP TABLE IF EXISTS `hardware_mac`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hardware_mac`  AS  select `article`.`article_id` AS `article_id`,`article`.`article_name` AS `article_name`,`article`.`description` AS `description`,`article`.`price` AS `price`,`article`.`stock` AS `stock`,`article`.`picture` AS `picture`,`article`.`category` AS `category`,`article`.`os` AS `os` from `article` where ((`article`.`category` = 'Hardware') and (`article`.`os` = 'Mac')) ;

-- --------------------------------------------------------

--
-- Struktur des Views `hardware_windows`
--
DROP TABLE IF EXISTS `hardware_windows`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hardware_windows`  AS  select `article`.`article_id` AS `article_id`,`article`.`article_name` AS `article_name`,`article`.`description` AS `description`,`article`.`price` AS `price`,`article`.`stock` AS `stock`,`article`.`picture` AS `picture`,`article`.`category` AS `category`,`article`.`os` AS `os` from `article` where ((`article`.`category` = 'Hardware') and (`article`.`os` = 'Windows')) ;

-- --------------------------------------------------------

--
-- Struktur des Views `new_article`
--
DROP TABLE IF EXISTS `new_article`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `new_article`  AS  select `article`.`article_id` AS `article_id`,`article`.`article_name` AS `article_name`,`article`.`description` AS `description`,`article`.`price` AS `price`,`article`.`stock` AS `stock`,`article`.`picture` AS `picture`,`article`.`category` AS `category` from `article` order by `article`.`article_id` desc limit 5 ;

-- --------------------------------------------------------

--
-- Struktur des Views `order_detail`
--
DROP TABLE IF EXISTS `order_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_detail`  AS  select `orderlist`.`order_id` AS `order_id`,`article`.`article_name` AS `article_name`,`orderlist`.`customer_id` AS `customer_id`,`orderlist`.`quantity` AS `quantity`,`orderlist`.`shipment` AS `shipment`,(`orderlist`.`price` * `orderlist`.`quantity`) AS `price` from (`orderlist` join `article`) where (`orderlist`.`article_id` = `article`.`article_id`) ;

-- --------------------------------------------------------

--
-- Struktur des Views `shoppingcart_info`
--
DROP TABLE IF EXISTS `shoppingcart_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shoppingcart_info`  AS  select `customer`.`customer_id` AS `customer_id`,`shopping_cart`.`article_id` AS `article_id`,`article`.`article_name` AS `article_name`,`article`.`picture` AS `picture`,`article`.`description` AS `description`,`shopping_cart`.`quantity` AS `quantity`,(`shopping_cart`.`quantity` * `article`.`price`) AS `price` from ((`article` join `shopping_cart`) join `customer`) where ((`shopping_cart`.`customer_id` = `customer`.`customer_id`) and (`shopping_cart`.`article_id` = `article`.`article_id`)) ;

-- --------------------------------------------------------

--
-- Struktur des Views `software`
--
DROP TABLE IF EXISTS `software`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `software`  AS  select `article`.`article_id` AS `article_id`,`article`.`article_name` AS `article_name`,`article`.`description` AS `description`,`article`.`price` AS `price`,`article`.`stock` AS `stock`,`article`.`picture` AS `picture`,`article`.`category` AS `category`,`article`.`os` AS `os` from `article` where (`article`.`category` = 'Software') ;

-- --------------------------------------------------------

--
-- Struktur des Views `software_mac`
--
DROP TABLE IF EXISTS `software_mac`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `software_mac`  AS  select `article`.`article_id` AS `article_id`,`article`.`article_name` AS `article_name`,`article`.`description` AS `description`,`article`.`price` AS `price`,`article`.`stock` AS `stock`,`article`.`picture` AS `picture`,`article`.`category` AS `category`,`article`.`os` AS `os` from `article` where ((`article`.`category` = 'Software') and (`article`.`os` = 'Mac')) ;

-- --------------------------------------------------------

--
-- Struktur des Views `software_windows`
--
DROP TABLE IF EXISTS `software_windows`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `software_windows`  AS  select `article`.`article_id` AS `article_id`,`article`.`article_name` AS `article_name`,`article`.`description` AS `description`,`article`.`price` AS `price`,`article`.`stock` AS `stock`,`article`.`picture` AS `picture`,`article`.`category` AS `category`,`article`.`os` AS `os` from `article` where ((`article`.`category` = 'Software') and (`article`.`os` = 'Windows')) ;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD UNIQUE KEY `article_name` (`article_name`);

--
-- Indizes für die Tabelle `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indizes für die Tabelle `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indizes für die Tabelle `nachbestellungen`
--
ALTER TABLE `nachbestellungen`
  ADD PRIMARY KEY (`nachbestell_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indizes für die Tabelle `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`order_id`);

--
-- Indizes für die Tabelle `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `article_id` (`article_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT für Tabelle `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `nachbestellungen`
--
ALTER TABLE `nachbestellungen`
  ADD CONSTRAINT `fk_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`);

--
-- Constraints der Tabelle `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `shopping_cart_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

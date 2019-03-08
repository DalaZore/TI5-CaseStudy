-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2019 at 05:19 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ti5`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(255) NOT NULL,
  `article_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` enum('Hardware','Software') COLLATE utf8_unicode_ci DEFAULT NULL,
  `os` enum('Windows','Mac') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_name`, `description`, `price`, `stock`, `picture`, `category`, `os`) VALUES
(2, 'test1', 'test123', '12.50', 11, 'img\\articles\\magnet_1.jpg', 'Hardware', 'Windows'),
(4, 'test2', 'test123', '11.50', 11, 'img\\articles\\magnet_1.jpg', 'Hardware', 'Windows'),
(5, 'test3', 'test123', '102.50', 11, 'img\\articles\\magnet_1.jpg', 'Hardware', 'Windows'),
(6, 'test4', 'test123', '12.50', 0, 'img\\articles\\magnet_1.jpg', 'Software', 'Mac'),
(7, 'test5', 'test123', '122.50', 11, 'img\\articles\\magnet_1.jpg', 'Hardware', 'Mac'),
(8, 'test6', 'test123', '12.50', 11, 'img\\articles\\magnet_1.jpg', 'Software', 'Windows');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency`, `rate`) VALUES
(1, 'EUR', 1),
(2, 'CHF', 1.1324),
(3, 'USD', 1.1222),
(4, 'JPY', 124.72);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
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
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `username`, `email`, `pass`, `gname`, `surname`, `address`, `plz`, `city`, `currency_id`) VALUES
(3, 'test1', 'test1@test1.ch', '$2y$10$YR3a6yv4r3Rc0fUwnKtKZe0pIYdAeprZM9nKC3Sr5Z7gpTrlN7i8u', 'test1', 'test1', 'test1', 1, 'test1', 3),
(4, 'test2', 'test2@test2.ch', '$2y$10$hUb7pDxOdmyqtnaWFd7xeu5qduSNFhvpq0HCIZJ1rHIOknGW9mC06', 'test2', 'test2', 'test2', 2, 'test2', 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `customer_currency`
-- (See below for the actual view)
--
CREATE TABLE `customer_currency` (
`customer_id` int(255)
,`currency_id` int(11)
,`currency` varchar(10)
,`rate` float
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `hardware`
-- (See below for the actual view)
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
-- Stand-in structure for view `hardware_mac`
-- (See below for the actual view)
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
-- Stand-in structure for view `hardware_windows`
-- (See below for the actual view)
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
-- Table structure for table `nachbestellungen`
--

CREATE TABLE `nachbestellungen` (
  `nachbestell_id` int(255) NOT NULL,
  `article_id` int(11) NOT NULL,
  `bestell_menge` int(11) NOT NULL,
  `lieferdatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `new_article`
-- (See below for the actual view)
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
-- Stand-in structure for view `shoppingcart_info`
-- (See below for the actual view)
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
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `customer_id`, `article_id`, `quantity`, `price`) VALUES
(1, 4, 8, 4, 0),
(4, 4, 7, 2, 0),
(5, 4, 6, 2, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `software`
-- (See below for the actual view)
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
-- Stand-in structure for view `software_mac`
-- (See below for the actual view)
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
-- Stand-in structure for view `software_windows`
-- (See below for the actual view)
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
-- Structure for view `customer_currency`
--
DROP TABLE IF EXISTS `customer_currency`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customer_currency`  AS  select `customer`.`customer_id` AS `customer_id`,`customer`.`currency_id` AS `currency_id`,`currency`.`currency` AS `currency`,`currency`.`rate` AS `rate` from (`customer` join `currency`) where (`customer`.`currency_id` = `currency`.`currency_id`) ;

-- --------------------------------------------------------

--
-- Structure for view `hardware`
--
DROP TABLE IF EXISTS `hardware`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hardware`  AS  select `article`.`article_id` AS `article_id`,`article`.`article_name` AS `article_name`,`article`.`description` AS `description`,`article`.`price` AS `price`,`article`.`stock` AS `stock`,`article`.`picture` AS `picture`,`article`.`category` AS `category`,`article`.`os` AS `os` from `article` where (`article`.`category` = 'Hardware') ;

-- --------------------------------------------------------

--
-- Structure for view `hardware_mac`
--
DROP TABLE IF EXISTS `hardware_mac`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hardware_mac`  AS  select `article`.`article_id` AS `article_id`,`article`.`article_name` AS `article_name`,`article`.`description` AS `description`,`article`.`price` AS `price`,`article`.`stock` AS `stock`,`article`.`picture` AS `picture`,`article`.`category` AS `category`,`article`.`os` AS `os` from `article` where ((`article`.`category` = 'Hardware') and (`article`.`os` = 'Mac')) ;

-- --------------------------------------------------------

--
-- Structure for view `hardware_windows`
--
DROP TABLE IF EXISTS `hardware_windows`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hardware_windows`  AS  select `article`.`article_id` AS `article_id`,`article`.`article_name` AS `article_name`,`article`.`description` AS `description`,`article`.`price` AS `price`,`article`.`stock` AS `stock`,`article`.`picture` AS `picture`,`article`.`category` AS `category`,`article`.`os` AS `os` from `article` where ((`article`.`category` = 'Hardware') and (`article`.`os` = 'Windows')) ;

-- --------------------------------------------------------

--
-- Structure for view `new_article`
--
DROP TABLE IF EXISTS `new_article`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `new_article`  AS  select `article`.`article_id` AS `article_id`,`article`.`article_name` AS `article_name`,`article`.`description` AS `description`,`article`.`price` AS `price`,`article`.`stock` AS `stock`,`article`.`picture` AS `picture`,`article`.`category` AS `category` from `article` order by `article`.`article_id` desc limit 5 ;

-- --------------------------------------------------------

--
-- Structure for view `shoppingcart_info`
--
DROP TABLE IF EXISTS `shoppingcart_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shoppingcart_info`  AS  select `customer`.`customer_id` AS `customer_id`,`shopping_cart`.`article_id` AS `article_id`,`article`.`article_name` AS `article_name`,`article`.`picture` AS `picture`,`article`.`description` AS `description`,`shopping_cart`.`quantity` AS `quantity`,(`shopping_cart`.`quantity` * `article`.`price`) AS `price` from ((`article` join `shopping_cart`) join `customer`) where ((`shopping_cart`.`customer_id` = `customer`.`customer_id`) and (`shopping_cart`.`article_id` = `article`.`article_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `software`
--
DROP TABLE IF EXISTS `software`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `software`  AS  select `article`.`article_id` AS `article_id`,`article`.`article_name` AS `article_name`,`article`.`description` AS `description`,`article`.`price` AS `price`,`article`.`stock` AS `stock`,`article`.`picture` AS `picture`,`article`.`category` AS `category`,`article`.`os` AS `os` from `article` where (`article`.`category` = 'Software') ;

-- --------------------------------------------------------

--
-- Structure for view `software_mac`
--
DROP TABLE IF EXISTS `software_mac`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `software_mac`  AS  select `article`.`article_id` AS `article_id`,`article`.`article_name` AS `article_name`,`article`.`description` AS `description`,`article`.`price` AS `price`,`article`.`stock` AS `stock`,`article`.`picture` AS `picture`,`article`.`category` AS `category`,`article`.`os` AS `os` from `article` where ((`article`.`category` = 'Software') and (`article`.`os` = 'Mac')) ;

-- --------------------------------------------------------

--
-- Structure for view `software_windows`
--
DROP TABLE IF EXISTS `software_windows`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `software_windows`  AS  select `article`.`article_id` AS `article_id`,`article`.`article_name` AS `article_name`,`article`.`description` AS `description`,`article`.`price` AS `price`,`article`.`stock` AS `stock`,`article`.`picture` AS `picture`,`article`.`category` AS `category`,`article`.`os` AS `os` from `article` where ((`article`.`category` = 'Software') and (`article`.`os` = 'Windows')) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD UNIQUE KEY `article_name` (`article_name`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `nachbestellungen`
--
ALTER TABLE `nachbestellungen`
  ADD PRIMARY KEY (`nachbestell_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `article_id` (`article_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nachbestellungen`
--
ALTER TABLE `nachbestellungen`
  ADD CONSTRAINT `fk_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `shopping_cart_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

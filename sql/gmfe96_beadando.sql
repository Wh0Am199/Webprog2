-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2020. Máj 12. 14:19
-- Kiszolgáló verziója: 10.4.10-MariaDB
-- PHP verzió: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `gmfe96_beadando`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `reserved_vehicles`
--

DROP TABLE IF EXISTS `reserved_vehicles`;
CREATE TABLE IF NOT EXISTS `reserved_vehicles` (
  `reservedid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `vehicleid` int(11) NOT NULL,
  PRIMARY KEY (`reservedid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `reserved_vehicles`
--

INSERT INTO `reserved_vehicles` (`reservedid`, `uid`, `vehicleid`) VALUES
(1, 1, 1),
(2, 1, 12),
(3, 1, 13),
(4, 2, 8);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `firstName` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `lastName` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `additionalAddress` varchar(250) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `birthDate` date NOT NULL,
  `city` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `state` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`uid`, `username`, `firstName`, `lastName`, `email`, `password`, `address`, `additionalAddress`, `birthDate`, `city`, `state`, `zip`, `isAdmin`) VALUES
(1, 'Stringer', 'Bálint', 'Bárdos', 'balintb99@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Damjanich út 13.', NULL, '1999-11-09', 'Füzesabony', 'Heves', 3390, 1),
(2, 'GMFE96', 'Bálint', 'Bárdos', 'balintbardos@gmail.com', 'bfe54caa6d483cc3887dce9d1b8eb91408f1ea7a', 'Damjanich út 13.', '', '1999-11-09', 'Füzesabony', 'Heves', 3390, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` longtext COLLATE utf8_hungarian_ci DEFAULT NULL,
  `brand` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `carType` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `plateNumber` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `fuelType` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `manufacturingDate` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `details` longtext COLLATE utf8_hungarian_ci NOT NULL,
  `isReserved` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `vehicles`
--

INSERT INTO `vehicles` (`id`, `image`, `brand`, `carType`, `plateNumber`, `fuelType`, `manufacturingDate`, `price`, `details`, `isReserved`) VALUES
(1, './public/db_images/20191211140552.jpg', 'Mercedes', 'AMG GTR', 'NVB-423', 'Gas', 2018, 15000, 'BRAND NEW!\r\n\r\nFrom the Mercedes Company freshly!\r\n500HP Pure power!', 1),
(8, './public/db_images/img-3351_kk1f0d5g.jpg', 'Porsche', '911 Sport', 'BHD-342', 'Gas', 2010, 12000, 'Brand New! Porsche 911 Sport', 1),
(14, './public/db_images/IMG_20191218_100221-500x500.jpg', 'Mercedes', 'G43', 'HGZ-352', 'Diesel', 2010, 2000, 'Used car, needs rebuild\r\n', 0),
(15, './public/db_images/photo-1542362567-b07e54358753.jpg', 'McLaren', 'P1', 'NNN-987', 'Gas', 2010, 50000, 'Brand new from a British dealership!', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

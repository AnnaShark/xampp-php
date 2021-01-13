-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 13, 2021 at 02:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Banco`
--

-- --------------------------------------------------------

--
-- Table structure for table `CLIENTES`
--

CREATE TABLE `CLIENTES` (
  `TITULAR` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Cuentas`
--

CREATE TABLE `Cuentas` (
  `N_CUENTA` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `TITULAR` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SALDO` decimal(10,2) DEFAULT 0.00,
  `INTERES` decimal(3,2) DEFAULT 0.00,
  `APERTURA` datetime NOT NULL,
  `BLOQUEADA` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Cuentas`
--

INSERT INTO `Cuentas` (`N_CUENTA`, `TITULAR`, `SALDO`, `INTERES`, `APERTURA`, `BLOQUEADA`) VALUES
('23454543', 'Anya Sharkova', '47.00', '0.20', '2021-01-04 22:12:08', 0),
('23454545', 'Anya Sharkova', '34.00', '1.00', '2021-01-04 21:44:10', 1),
('23454578', 'Joseba Elcano', '11.00', '0.06', '2021-01-04 22:32:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Movimientos`
--

CREATE TABLE `Movimientos` (
  `CANTIDAD` int(11) NOT NULL,
  `CONCEPTO` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `N_CUENTA` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `FECHA` datetime NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Movimientos`
--

INSERT INTO `Movimientos` (`CANTIDAD`, `CONCEPTO`, `N_CUENTA`, `FECHA`, `ID`) VALUES
(24, 'jhfkjhdg', '23454543', '2021-01-08 17:01:01', 1),
(4, 'php class', '23454578', '2021-01-08 17:02:21', 2),
(-5, 'TRASPASO A 23454578', '23454543', '2021-01-08 17:29:26', 3),
(5, 'TRASPASO DESDE 23454543', '23454578', '2021-01-08 17:29:26', 4),
(-3, 'TRASPASO A 23454543', '23454578', '2021-01-08 17:32:09', 5),
(3, 'TRASPASO DESDE 23454578', '23454543', '2021-01-08 17:32:09', 6),
(-3, 'TRASPASO A 23454543', '23454578', '2021-01-09 19:49:32', 7),
(3, 'TRASPASO DESDE 23454578', '23454543', '2021-01-09 19:49:32', 8),
(2, 'test', '23454543', '2021-01-13 14:33:49', 9),
(3, 'test2', '23454543', '2021-01-13 14:34:19', 10),
(-4, 'test3', '23454543', '2021-01-13 14:34:37', 11);

-- --------------------------------------------------------

--
-- Table structure for table `USUARIOS`
--

CREATE TABLE `USUARIOS` (
  `USUARIO` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `CLAVE` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ADMINISTRADOR` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `USUARIOS`
--

INSERT INTO `USUARIOS` (`USUARIO`, `CLAVE`, `ADMINISTRADOR`) VALUES
('Anna', '123', 1),
('Joseba', '234', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CLIENTES`
--
ALTER TABLE `CLIENTES`
  ADD PRIMARY KEY (`TITULAR`);

--
-- Indexes for table `Cuentas`
--
ALTER TABLE `Cuentas`
  ADD PRIMARY KEY (`N_CUENTA`);

--
-- Indexes for table `Movimientos`
--
ALTER TABLE `Movimientos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CUENTA` (`N_CUENTA`);

--
-- Indexes for table `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`USUARIO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Movimientos`
--
ALTER TABLE `Movimientos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Movimientos`
--
ALTER TABLE `Movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`N_CUENTA`) REFERENCES `Cuentas` (`N_CUENTA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

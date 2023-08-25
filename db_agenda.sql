-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-08-2023 a las 12:03:39
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_agenda`
--
CREATE DATABASE IF NOT EXISTS `db_agenda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_agenda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `cod_contacto` int(11) NOT NULL,
  `nom_contacto` varchar(200) NOT NULL,
  `ape_contacto` varchar(200) NOT NULL,
  `tel_contacto` varchar(50) NOT NULL,
  `correo_contacto` varchar(100) NOT NULL,
  `persona_cod_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`cod_contacto`, `nom_contacto`, `ape_contacto`, `tel_contacto`, `correo_contacto`, `persona_cod_persona`) VALUES
(1, 'Leonardo', 'Celi', '0964581693', 'beraslasd@gmail.com', 1),
(2, 'Juancy', 'Ortiz', '09654132168', 'gatoss@hotmail.com', 1),
(3, 'Passy', 'Lazzy', '085321321', 'pazyl@mail.com', 3),
(4, 'Bernardo', '' , '53242345', ' ', 1),
(5, 'Quishpé', 'Perez', '53242345', 'qqeraslasd@gmail-com', 1);


--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `cod_persona` int(11) NOT NULL,
  `ci_persona` varchar(20) NOT NULL,
  `nom_persona` varchar(200) NOT NULL,
  `ape_persona` varchar(200) NOT NULL,
  `dir_persona` varchar(200) NOT NULL,
  `tel_persona` varchar(20) DEFAULT NULL,
  `usu_persona` varchar(200) NOT NULL,
  `cia_persona` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`cod_persona`, `ci_persona`, `nom_persona`, `ape_persona`, `dir_persona`, `tel_persona`, `usu_persona`, `cia_persona`) VALUES
(1, '265203580', 'Hobard', 'Foldes', 'Suite 16', '417 707 6370', 'hfoldes1a', 'Afghanistan'),
(2, '280567831', 'Rollin', 'Teck', 'Suite 70', '360 918 2876', 'rteckv', 'Japan'),
(3, '775227202', 'Constantina', 'MacGall', '3rd Floor', '224 262 3330', 'cmacgallw', 'Greece'),
(4, '109424502', 'Bridgette', 'Imlock', '20th Floor', '970 937 9596', 'bimlockx', 'Croatia'),
(5, '650395344', 'Flory', 'Bruntjen', 'Suite 20', '834 408 9819', 'fbruntjeny', 'China'),
(6, '334667189', 'Fidelity', 'Mushrow', 'Apt 1773', '622 557 0127', 'fmushrowz', 'China'),
(7, '626579657', 'Lavina', 'Elix', 'Apt 1284', '939 674 6237', 'lelix10', 'China'),
(8, '643850786', 'Lethia', 'Mallinar', 'Apt 1327', '138 428 1397', 'lmallinar11', 'Vietnam'),
(9, '716376193', 'Stavro', 'Figgs', 'Apt 1884', '456 635 0761', 'sfiggs12', 'Nigeria'),
(10, '169901870', 'Raquela', 'Minchin', 'Room 1389', '173 566 6170', 'rminchin13', 'China'),
(11, '644913571', 'Don', 'Ruddiforth', 'Room 757', '358 750 2498', 'druddiforth14', 'Panama'),
(12, '747429894', 'Ermina', 'Woodroff', 'Room 1246', '685 822 6328', 'ewoodroff15', 'Czech Republic'),
(13, '675182168', 'Mahalia', 'Benny', 'Suite 91', '413 892 7163', 'mbenny16', 'China'),
(14, '874391508', 'Modestia', 'Orsi', 'Room 1250', '263 751 8991', 'morsi17', 'Portugal'),
(15, '304175034', 'Myrtie', 'Wynn', 'PO Box 53772', '269 840 9774', 'mwynn18', 'China'),
(16, '432646423', 'Hester', 'Gaydon', 'Room 941', '311 914 7536', 'hgaydon19', 'China');



--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`cod_contacto`),
  ADD KEY `persona_cod_persona` (`persona_cod_persona`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`cod_persona`),
  ADD UNIQUE KEY `ci_persona` (`ci_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `cod_contacto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `cod_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `contacto_ibfk_1` FOREIGN KEY (`persona_cod_persona`) REFERENCES `persona` (`cod_persona`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

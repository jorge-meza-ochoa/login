-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2021 a las 05:47:46
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `fono` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `user`, `pass`, `correo`, `dni`, `fono`) VALUES
(1, 'JORGE', 'MEZA OCHOA', 'jorge', '202cb962ac59075b964b07152d234b70', 'jorge0920520@gmail.com', '41367271', '933158780'),
(2, 'MARCOS', 'MEZA OCHOA', 'marcos', '202cb962ac59075b964b07152d234b70', 'marcos4521@gmail.com', '45254225', '985641255'),
(3, 'PRESY', 'MOSCOSO AREVALO', 'presy', '202cb962ac59075b964b07152d234b70', 'presy_moscoso_arevalo@gmail.com', '45845215', '995412541'),
(4, 'OMAR', 'MORI MORI', 'omar', '202cb962ac59075b964b07152d234b70', 'omar_mori@gmail.com', '45215132', '995412512'),
(5, 'MARIA', 'SANCHEZ PERALTA', 'maria', '202cb962ac59075b964b07152d234b70', 'maria@gmail.com', '45262142', '985645121'),
(6, 'CAROLINA', 'MINAYA DAYANA', 'carolina', '202cb962ac59075b964b07152d234b70', 'carolina_1251@gmail.com', '45215262', '985415212'),
(7, 'ALEJANDRO', 'RAMOS DAVILA', 'alejandro', '202cb962ac59075b964b07152d234b70', 'alejandro_12_14@hotmail.com', '25125412', '985412512'),
(8, 'KATERINE', 'SALAS GARCIA', 'katy', '202cb962ac59075b964b07152d234b70', 'katerine_salas@gmail.com', '45127855', '985555545'),
(9, 'DAELIN', 'COLLASO MANTALOS', 'daelin', '202cb962ac59075b964b07152d234b70', 'daelin@gmail.com', '45287515', '985412541'),
(10, 'ANDRES', 'GRANDIE VERALLES', 'andres', '202cb962ac59075b964b07152d234b70', 'andres_1254@hotmail.com', '65231524', '985412514'),
(11, 'KASUYA', 'MISHIMA', 'kasuya', '202cb962ac59075b964b07152d234b70', 'kasuya_2_14@gmail.com', '45218715', '985412515');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

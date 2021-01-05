-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2020 a las 23:22:29
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parking`
--

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `Calcular_cobro` (`c_id` INT) RETURNS INT(11) BEGIN 

	declare fecha DATE;
	declare x ,servicio, precio_x, N_dias, importe ,cost,Total integer;
	
	SELECT Cliente_ID into x FROM cliente WHERE Cliente_ID=c_id;
	SELECT Fecha_in into fecha FROM cliente where Cliente_ID=c_id;			-- obtenemos la fecha del cliente 
	
	SELECT Servicio_ID_fk into servicio FROM cliente WHERE Cliente_ID=c_id;	-- obtenemos el ID servicio del cliente 
	SELECT precio_s into precio_x FROM servicios WHERE Id_servicio=servicio;
	
	SELECT precio_id into importe FROM cliente WHERE Cliente_ID=c_id;
	SELECT costo into cost FROM precio where id_precio = importe; 
	
	
	SELECT TO_DAYS(CURRENT_DATE()) - TO_DAYS(fecha) INTO N_dias;						-- tenemos el numero de dias de hospedaje del cliente 
	
	if(N_dias = 0) then 
		set N_dias = 1;
	end if;
	UPDATE `cliente` SET `estado` = '1' WHERE `cliente`.`Cliente_ID` = c_id;	
	SET Total = N_dias*cost+precio_x;
	RETURN Total;
						-- N_dias numero de dias de hospedaje
						-- 40 precio por dia del parking 
						-- PRECIO es el precio del servicio 	
					-- retornamos el valor de precio de hospedaje
	-- 4dlls dia
	-- 80 pesos dia 
	-- query para calcular el numero de dias transcurridos.
	-- SELECT TO_DAYS( CURRENT_DATE) - TO_DAYS(Fecha_in) AS dias
	-- FROM cliente ORDER BY dias
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `Dolar_convert` (`valor` INT) RETURNS FLOAT BEGIN 
	
	
	declare total integer;
	
	set total = valor/22.50;	
	
	RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Cliente_ID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Fecha_in` date NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `precio_id` int(11) NOT NULL,
  `color` varchar(50) NOT NULL,
  `Servicio_ID_fk` int(10) NOT NULL,
  `NumSerie` varchar(4) NOT NULL,
  `Num_key` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Cliente_ID`, `Nombre`, `Apellido`, `Fecha_in`, `marca`, `modelo`, `precio_id`, `color`, `Servicio_ID_fk`, `NumSerie`, `Num_key`, `estado`) VALUES
(28, 'Eduardo', 'Gutierrez', '2020-05-27', 'Chevrolet', 'Camaro', 2, 'Negro', 4, '1234', '88', 1),
(29, 'Carmelito', 'Caramelo', '2020-05-28', 'Mercedes Benz', 'ML 320', 3, 'Amarillo', 2, '234h', '203', 1),
(30, 'Carmelito', 'Rodriguez', '2020-05-28', 'Toyota', 'Tacoma', 1, 'Morado', 4, 'AS23', '17', 0),
(31, 'Olivia', 'Duarte', '2020-05-29', 'ford', 'Mustang', 1, 'Negro', 1, '7765', '34', 0),
(32, 'Elvis', 'Presley', '2020-05-29', 'Toyota', 'Tacoma', 1, 'Negro', 1, '9088', '34', 1),
(33, 'a', 'b', '2020-05-29', 'Camro', 'Mustang', 2, 'Negro', 2, '22f5', '88', 1),
(34, 'c', 'c', '2020-05-29', 'ford', 'lobo', 1, 'Blanco', 4, '1111', '107', 1),
(35, 'd', 'Duarte', '2020-05-29', 'ford', 'Mustang', 2, 'Blanco', 4, '2222', '17', 1),
(36, 'e', 'e', '2020-05-29', 'Camro', 'C 120', 3, '', 4, '3333', '34', 1),
(37, 'vecinita', 'tiene antojo', '2020-05-29', 'sonic', 'ion', 1, 'Negro', 2, 'AS23', '88', 0),
(38, 'Enola', 'Rodriguez', '2020-05-29', 'ford', 'lobo', 2, 'Morado', 3, 'ssss', '17', 0);

--
-- Disparadores `cliente`
--
DELIMITER $$
CREATE TRIGGER `Fecha_valida_BI` BEFORE INSERT ON `cliente` FOR EACH ROW BEGIN 
		if new.fecha_in <> CURRENT_DATE() then
			SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "No vivies en el pasado o en el futuro Mc-Fly";
			end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE `precio` (
  `id_precio` int(11) NOT NULL,
  `costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `precio`
--

INSERT INTO `precio` (`id_precio`, `costo`) VALUES
(1, 40),
(2, 60),
(3, 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `ID_registro` int(11) NOT NULL,
  `Cliente_ID_fk` int(11) NOT NULL,
  `Usuario_ID_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `Id_servicio` int(10) NOT NULL,
  `Nom_Serv` varchar(50) NOT NULL,
  `precio_s` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`Id_servicio`, `Nom_Serv`, `precio_s`) VALUES
(1, 'Lavado', 150),
(2, 'Encerado de focos', 50),
(3, 'Aspirado', 75),
(4, 'Ninguno', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USR` int(11) NOT NULL,
  `Nombre_usuario` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USR`, `Nombre_usuario`, `Password`) VALUES
(1, 'Olivia', 'olivia1234'),
(2, 'Angel', 'Hernandez2020'),
(5, 'Eduardo', 'Elaltisimo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Cliente_ID`),
  ADD KEY `Servicio_ID_fk` (`Servicio_ID_fk`),
  ADD KEY `Servicio_ID_fk_2` (`Servicio_ID_fk`),
  ADD KEY `precio` (`precio_id`);

--
-- Indices de la tabla `precio`
--
ALTER TABLE `precio`
  ADD PRIMARY KEY (`id_precio`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`ID_registro`),
  ADD KEY `Cliente_ID_fk` (`Cliente_ID_fk`),
  ADD KEY `Usuario_ID_fk` (`Usuario_ID_fk`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`Id_servicio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USR`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Cliente_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `precio`
--
ALTER TABLE `precio`
  MODIFY `id_precio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `ID_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`Servicio_ID_fk`) REFERENCES `servicios` (`Id_servicio`),
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`precio_id`) REFERENCES `precio` (`id_precio`);

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_2` FOREIGN KEY (`Usuario_ID_fk`) REFERENCES `usuarios` (`ID_USR`),
  ADD CONSTRAINT `registro_ibfk_3` FOREIGN KEY (`Cliente_ID_fk`) REFERENCES `cliente` (`Cliente_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

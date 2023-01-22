-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2023 a las 02:44:54
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `noticenter`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(155) NOT NULL,
  `titulo` varchar(155) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `fecha` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `categoria`, `titulo`, `descripcion`, `imagen`, `fecha`) VALUES
(4, 'Tecnologia', 'La nueva era de los macbook de Apple', 'Sobre estos nuevos MacBook Pro no se esperan grandes sorpresas a nivel de diseño, pero sí introducirán los nuevos M2 Pro y M2 Max, las versiones más avanzadas de su segunda generación de chip propio. Mientras que el M2 estándar incorpora ocho núcleos y una GPU de 10 núcleos, el modelo M2 Max alcanzaría hasta los 12 núcleos de CPU y 38 núcleos para la GPU.', '1674326881_Macbook.png', '21/01/2023'),
(5, 'Gamer', 'Xbox la mejor consola del mundo', 'La gama gaming de ASUS llega bajo el apellido ROG (Republic of Games) y el ROG Raikiri Pro es su último mando de Xbox. Llega con un peculiar diseño y una pantalla OLED de 1.3 pulgadas integrada en su parte superior. Su resolución es de 128 x 40 y cuenta con varias funciones.\r\nEste panel permite cambiar perfiles durante los juegos, comprobar el estado de la carga del mando, el emparejamiento Bluetooth e incluso ejecutar fondos de pantalla con animaciones. No supone ninguna ventaja competitiva a l', '1674328660_xbox.jpg', '21/01/2023'),
(6, 'Moda', 'El nuevo gran emprendimiento del país ', 'Esta maravillosa idea de Ingrid Gutierrez, viene a comerse el mundo contagiando su gran idea de la moda, y sus grandes prendas de diversos colores, diseños.', '1674329342_KINGSLEIGH.png', '21/01/2023'),
(15, 'Politica', 'EL PRESIDENTE DE COLOMBIA', 'Presidente Petro de Colombia', '1674351710_petro.jpg', '21/01/2023'),
(16, 'Musica', 'LOS MEJORES DJS DEL MUNDO', 'El dúo de DJ de EDM compuesto por los hermanos Dimitri Thivaios y Michael Thivaios, o lo que es lo mismo, Dimitri Vegas & Like Mike, amplían el cartel de la próxima entrega de Medusa Sunbeach 2023, que se celebrará en la playa de Cullera del 9 al 14 de agosto. Los artistas belgas, fundadores del prestigioso sello discográfico Smash the House, actuarán junto a otros grandes nombres de la escena en la octava edición del festival.\r\n\r\nDimitri Vegas & Like Mike han ocupado varias veces el Top 1 de me', '1674351746_dimitri.jpg', '21/01/2023'),
(17, 'Musica', 'La nueva era de los macbook de Apple', 'Sobre estos nuevos MacBook Pro no se esperan grandes sorpresas a nivel de diseño, pero sí introducirán los nuevos M2 Pro y M2 Max, las versiones más avanzadas de su segunda generación de chip propio. Mientras que el M2 estándar incorpora ocho núcleos y una GPU de 10 núcleos, el modelo M2 Max alcanzaría hasta los 12 núcleos de CPU y 38 núcleos para la GPU.', '1674351772_Macbook.png', '21/01/2023'),
(18, 'Moda', 'Xbox la mejor consola del mundo', 'Esta maravillosa idea de Ingrid Gutierrez, viene a comerse el mundo contagiando su gran idea de la moda, y sus grandes prendas de diversos colores, diseños.', '1674351802_xbox.jpg', '21/01/2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(155) NOT NULL,
  `correo` varchar(155) NOT NULL,
  `nom_usuario` varchar(155) NOT NULL,
  `contrasenia` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `nom_usuario`, `contrasenia`) VALUES
(20, 'Sergio Andres', 'sergio@hotmail.com', 'admin', '123'),
(21, 'Ingrid Lizeth ', 'ingrid@hotmail.com', 'Lizi', '1301');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

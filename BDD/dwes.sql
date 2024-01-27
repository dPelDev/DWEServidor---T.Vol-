-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2024 a las 10:59:12
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dwes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre_categoria`) VALUES
(1, 'COMPLEMENTOS'),
(2, 'SUDADERAS'),
(3, 'ZAPATILLAS'),
(4, 'PANTALONES'),
(5, 'ABRIGOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `comentario` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `email`, `telefono`, `comentario`) VALUES
(1, 'Victoria', 'Saez', 's.hafax@hotmail.com', '620756982', 'esto es una prueba'),
(2, 'Daniel', 'Peláez Pino', 's.hafax@hotmail.com', '727736948', 'dfdf'),
(3, 'Juan', 'Galvéz Chiclana', 'juan@hotmail.com', '666555333', ''),
(4, 'asdsdf', 'dsfsdfsdf', 'fsdfs@adksmdkam.com', '620756982', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id` int(10) NOT NULL,
  `pedidos_id` int(11) NOT NULL,
  `prendas_id` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_pedidos`
--

INSERT INTO `detalle_pedidos` (`id`, `pedidos_id`, `prendas_id`, `precio`, `cantidad`, `estado`) VALUES
(1, 1, 19, 75, 1, 1),
(2, 1, 17, 70, 1, 1),
(3, 1, 16, 110, 1, 1),
(4, 2, 14, 76, 4, 1),
(5, 3, 17, 70, 1, 1),
(6, 3, 18, 40, 1, 1),
(7, 4, 19, 75, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `cliente_id`, `total`, `fecha`, `estado`) VALUES
(1, 1, 255, '2024-01-25', 1),
(2, 2, 304, '2024-01-25', 1),
(3, 3, 110, '2024-01-26', 1),
(4, 4, 75, '2024-01-26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prendas`
--

CREATE TABLE `prendas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria_id` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prendas`
--

INSERT INTO `prendas` (`id`, `nombre`, `descripcion`, `foto`, `precio`, `categoria_id`, `fecha`, `estado`) VALUES
(8, 'Gorro -STANCE-', 'Gorro pescador STANCE, buena calidad y comfort', 'jpgcompl-24,95.jpg', 24.99, 1, '2024-01-25', 1),
(9, 'Pantalones -DICKIES-', 'Pantalones tipo chino DICKIES. Color mostaza', 'jpgpanta-89.99.jpg', 89.99, 4, '2024-01-25', 1),
(10, 'Gorro -COOKIES-', 'Gorro de lana COOKIES. Color negro,  con capa interior de tercio pelo', 'jpgcompl-19,99.jpg', 19.99, 1, '2024-01-25', 1),
(11, 'Gorra -DICKES-', 'Gorra DICKIES de pana. Color Beige', 'jpgcompl-29,99.jpg', 29.99, 1, '2024-01-25', 1),
(12, 'Zapatillas -VANS-', 'Zapatillas VANS, Modelo Knnu Skol, Color Negro/Blanco', 'jpgzap1-89E.jpg', 89.95, 3, '2024-01-25', 1),
(13, 'Zapatilla (Bota Alta) -VANS-', 'Zapatillas de bota alta VANS x CONVERSE', 'jpgzap2-115E.jpg', 115.95, 3, '2024-01-25', 1),
(14, 'Sudadera -THRASHER-', 'Sudadera THRASHER unisex, Color Negro, con capucha', 'jpgsuda75E.jpg', 75.99, 2, '2024-01-25', 1),
(15, 'Chaquetón -COLUMBIA-', 'Chaquetón COLUMBIA extra largo, Color Marrón, con capucha ', 'jpgabrig-169,99.jpg', 169.99, 5, '2024-01-25', 1),
(16, 'Chaqueta -DICKIES-', 'Chaqueta DICKIES con botones centrales, Color Beige/Negro, con Borreguito ', 'jpgabrig-109,99.jpg', 109.99, 5, '2024-01-25', 1),
(17, 'Pantalones -VOLCOM-', 'Pantalones VOLCOM, tejido Vaqueros, Color Negro', 'jpgpanta-69.99.jpg', 69.99, 4, '2024-01-25', 1),
(18, 'Gorra -COAL-', 'Gorra COAL, tejido Terciopelo, Multicolor', 'jpgcompl-39,99.jpg', 39.99, 1, '2024-01-25', 1),
(19, 'Zapatilla -NIKE SB-', 'Zapatillas NIKE SB, modelo FORCE58, Color negro/gris/turquesa', 'jpgzap3-74,95.jpg', 74.95, 3, '2024-01-26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `clave`, `estado`) VALUES
(1, 'root', 'dwes.root', 1),
(2, 'DanielP', 'dwes.2024', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prendas`
--
ALTER TABLE `prendas`
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
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `prendas`
--
ALTER TABLE `prendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

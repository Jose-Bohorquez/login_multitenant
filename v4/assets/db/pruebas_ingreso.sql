-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-12-2024 a las 21:21:17
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebas_ingreso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int NOT NULL,
  `nombre_empresa` char(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `url` char(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `img` char(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nombre_empresa`, `url`, `img`) VALUES
(1, 'Servientrega', NULL, NULL),
(2, 'Servitel', NULL, NULL),
(3, 'Global', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int NOT NULL,
  `nombre_rol` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `tipo_doc_usu` char(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `num_doc_usu` bigint DEFAULT NULL,
  `nombre_usu` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellidos_usu` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono_usu` bigint DEFAULT NULL,
  `correo_usu` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `pwd` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `rol_usu` int DEFAULT NULL,
  `cargo` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `empresa_usu` int DEFAULT NULL,
  `ultimo_ingreso` timestamp NULL DEFAULT NULL,
  `fecha_crea` timestamp NULL DEFAULT NULL,
  `fecha_up` timestamp NULL DEFAULT NULL,
  `fecha_del` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `tipo_doc_usu`, `num_doc_usu`, `nombre_usu`, `apellidos_usu`, `telefono_usu`, `correo_usu`, `pwd`, `rol_usu`, `cargo`, `empresa_usu`, `ultimo_ingreso`, `fecha_crea`, `fecha_up`, `fecha_del`) VALUES
(1, 'CC', 1119217998, 'jose', 'bohorquez', 3178773186, 'bd@gmail.com', 'abc.123.', 1, 'Desarrollador', 2, '2024-12-02 21:39:52', '2024-12-02 21:39:55', '2024-12-02 21:39:56', NULL),
(2, 'CC', 1234567890, 'Juan', 'Perez', 3101234567, 'juan.perez@example.com', 'abc.123', 1, 'Director', 1, '2024-12-16 19:44:40', '2024-12-03 16:29:21', NULL, NULL),
(4, 'CC', 9876543210, 'Maria', 'Lopez', 3102345678, 'maria.lopez@example.com', 'abc.1234', 2, 'Supervisor', 3, NULL, '2024-12-04 23:00:00', NULL, NULL),
(5, 'CC', 1122334455, 'Carlos', 'Garcia', 3176549870, 'carlos.garcia@example.com', 'abc.12345', 2, 'Usuario', 1, NULL, '2024-12-05 19:30:15', NULL, NULL),
(6, 'CC', 1029384756, 'Ana', 'Martinez', 3145678901, 'ana.martinez@example.com', 'abc.1236', 2, 'Coordinadora', 2, '2024-12-16 19:44:41', '2024-12-06 14:10:25', NULL, NULL),
(7, 'CC', 1239874563, 'Laura', 'Gomez', 3106549876, 'laura.gomez@servientrega.com', 'adminservientrega', 1, 'Gerente de Operaciones', 1, NULL, '2024-12-16 17:45:00', NULL, NULL),
(8, 'CC', 1236549872, 'Ricardo', 'Martinez', 3198765432, 'ricardo.martinez@servientrega.com', 'user12345', 2, 'Auxiliar', 1, '2024-12-16 19:44:41', '2024-12-16 18:00:00', NULL, NULL),
(9, 'CC', 4567891230, 'Pedro', 'Fernandez', 3107891234, 'pedro.fernandez@servitel.com', 'adminservitel', 1, 'Coordinador', 2, NULL, '2024-12-16 18:15:00', NULL, NULL),
(10, 'CC', 9876543211, 'Sofia', 'Castro', 3123456789, 'sofia.castro@servitel.com', 'user6789', 2, 'Recepcionista', 2, NULL, '2024-12-16 18:30:00', NULL, NULL),
(11, 'CC', 7654321098, 'Julian', 'Serrano', 3190987654, 'julian.serrano@global.com', 'adminglobal', 1, 'Jefe de Logística', 3, '2024-12-16 19:44:43', '2024-12-16 18:45:00', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `num_doc_usu` (`num_doc_usu`),
  ADD UNIQUE KEY `telefono_usu` (`telefono_usu`),
  ADD UNIQUE KEY `correo_usu` (`correo_usu`),
  ADD KEY `FK_usuarios_roles` (`rol_usu`),
  ADD KEY `FK_usuarios_empresas` (`empresa_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_usuarios_empresas` FOREIGN KEY (`empresa_usu`) REFERENCES `empresas` (`id_empresa`),
  ADD CONSTRAINT `FK_usuarios_roles` FOREIGN KEY (`rol_usu`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

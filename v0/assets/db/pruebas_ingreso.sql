SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `empresas` (
  `id_empresa` int NOT NULL,
  `nombre_empresa` char(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `url` char(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `img` char(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
INSERT INTO `empresas` (`id_empresa`, `nombre_empresa`, `url`, `img`) VALUES
(1, 'Servitel', NULL, NULL),
(2, 'Servientrega', NULL, NULL),
(3, 'Global', NULL, NULL);
CREATE TABLE `roles` (
  `id_rol` int NOT NULL,
  `nombre_rol` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'Super-Admin'),
(2, 'Admin'),
(3, 'supervisor'),
(4, 'usuario');
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
INSERT INTO `usuarios` (`id_usuario`, `tipo_doc_usu`, `num_doc_usu`, `nombre_usu`, `apellidos_usu`, `telefono_usu`, `correo_usu`, `pwd`, `rol_usu`, `cargo`, `empresa_usu`, `ultimo_ingreso`, `fecha_crea`, `fecha_up`, `fecha_del`) VALUES
(1, 'CC', 1119217998, 'jose', 'bohorquez', 3178773186, 'bd@gmail.com', 'abc.123.', 1, 'Desarrollador', 1, '2024-12-02 21:39:52', '2024-12-02 21:39:55', '2024-12-02 21:39:56', NULL),
(2, 'CC', 1234567890, 'Juan', 'Perez', 3101234567, 'juan.perez@example.com', 'abc.123', 1, 'Director', 1, NULL, '2024-12-03 16:29:21', NULL, NULL);
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `num_doc_usu` (`num_doc_usu`),
  ADD UNIQUE KEY `telefono_usu` (`telefono_usu`),
  ADD UNIQUE KEY `correo_usu` (`correo_usu`),
  ADD KEY `FK_usuarios_roles` (`rol_usu`),
  ADD KEY `FK_usuarios_empresas` (`empresa_usu`);
ALTER TABLE `empresas`
  MODIFY `id_empresa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `roles`
  MODIFY `id_rol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_usuarios_empresas` FOREIGN KEY (`empresa_usu`) REFERENCES `empresas` (`id_empresa`),
  ADD CONSTRAINT `FK_usuarios_roles` FOREIGN KEY (`rol_usu`) REFERENCES `roles` (`id_rol`);
COMMIT;
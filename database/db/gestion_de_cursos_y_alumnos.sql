-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 31-07-2025 a las 13:36:03
-- Versión del servidor: 8.4.3
-- Versión de PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_de_cursos_y_alumnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` enum('masculino','femenino','otro') COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellido`, `dni`, `email`, `fecha_de_nacimiento`, `telefono`, `direccion`, `genero`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Diego', 'Aranda', '25987693', 'cuervo@sanlorenzo.com', '2000-02-20', '01141990269', 'avenida la plata 1708', 'masculino', 1, '2025-07-25 23:48:29', '2025-07-25 23:48:29'),
(2, 'Juan', 'Perez', '12546598', 'a@a.test', '1999-04-12', '01122334451', 'lomas1234', 'masculino', 1, '2025-07-26 02:28:49', '2025-07-26 02:28:49'),
(3, 'Josefa', 'alvarez', '11111112', 'a@a.test1', '1980-05-12', '01122334452', 'lomas12345', 'femenino', 1, '2025-07-26 02:31:06', '2025-07-26 02:31:06'),
(4, 'pipi', 'Romagnoli', '99887766', 'pipi@caslaCampeon.com', '2000-01-12', '01122334454', 'boedo 1', 'masculino', 1, '2025-07-26 03:37:02', '2025-07-26 03:37:02'),
(5, 'Mercedes', 'Mechi', '1122334450', 'merce@mechi.com', '1955-01-17', '01122334455', 'Lomas 1', 'femenino', 1, '2025-07-26 03:40:39', '2025-07-26 03:40:39'),
(6, 'Seba', 'Torrico', '1122334451', 'seba@cuervo.com', '1980-01-10', '01122334456', 'el torri 203', 'masculino', 1, '2025-07-26 03:42:49', '2025-07-26 03:42:49'),
(8, 'Clara', 'actualizada', '1122334453', 'clara.oaaa@oaa.com', '1963-04-10', '01122334457', 'boedo2', 'femenino', 1, '2025-07-26 03:51:41', '2025-07-26 04:40:41'),
(10, 'Jhohan', 'romania', '1122334455', 'jhohan@sl.com', '1995-02-10', '01122334458', 'boedo4', 'masculino', 0, '2025-07-26 04:09:21', '2025-07-26 04:27:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos_adjuntos`
--

CREATE TABLE `archivos_adjuntos` (
  `id` bigint UNSIGNED NOT NULL,
  `curso_id` bigint UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('tarea','material','guia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_subida` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `archivos_adjuntos`
--

INSERT INTO `archivos_adjuntos` (`id`, `curso_id`, `titulo`, `archivo_url`, `tipo`, `fecha_subida`, `created_at`, `updated_at`) VALUES
(1, 1, 'Documentacion de prueba', 'archivos/ofYC14qcIZMghTiJ7jHnsgIQeh1bQ3Yg4h93HuQ2.pdf', 'tarea', '2025-07-29', '2025-07-29 23:54:35', '2025-07-29 23:54:35'),
(2, 1, 'Documentacion de prueba2', 'archivos/itvqInNA2RHce4dVw8GQd5NbkSHlrtBnZuMxoz4B.png', 'material', '2025-07-29', '2025-07-30 01:54:15', '2025-07-30 01:54:15'),
(3, 1, 'Documentacion de prueba3', 'archivos/czFR1HSVPYbBie78IWGFKSl5pP9Yx8XwEf6Q8kxq.png', 'material', '2025-07-29', '2025-07-30 01:54:59', '2025-07-30 01:54:59'),
(4, 3, 'Documentacion de prueba4', 'archivos/PxQuLpt4JChPpO8qWN3mxcVeTiSTYN75Iuy98SdV.png', 'tarea', '2025-07-29', '2025-07-30 02:30:51', '2025-07-30 02:30:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` bigint UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` enum('activo','finalizado','cancelado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `modalidad` enum('presencial','virtual','hibrido') COLLATE utf8mb4_unicode_ci NOT NULL,
  `aula_virtual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cupos_maximos` int NOT NULL DEFAULT '30',
  `docente_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `titulo`, `descripcion`, `fecha_inicio`, `fecha_fin`, `estado`, `modalidad`, `aula_virtual`, `cupos_maximos`, `docente_id`, `created_at`, `updated_at`) VALUES
(1, 'Laravel', 'Aprende a construir aplicaciones web profesionales con Laravel, el framework PHP más popular. Desde la configuración inicial, rutas, controladores, vistas, hasta bases de datos, autenticación y APIs RESTful.', '2025-07-30', '2026-12-30', 'activo', 'virtual', 'AV1', 30, 1, '2025-07-26 19:15:55', '2025-07-26 19:40:25'),
(3, 'Payton', 'Aprende demasiado este lenguaje', '2026-07-30', '2026-08-10', 'activo', 'presencial', NULL, 30, 1, '2025-07-27 00:46:08', '2025-07-27 00:46:08'),
(6, 'Java Script', 'Lenguaje moderno', '2025-07-30', '2026-07-30', 'activo', 'virtual', 'AV1', 30, 2, '2025-07-30 02:52:55', '2025-07-30 02:52:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `nombre`, `apellido`, `dni`, `email`, `especialidad`, `telefono`, `direccion`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Bernardo', 'Romeo', '11111113', 'bernardoRomeo9@gmail.com', 'Informática', '01111111112', 'av boedo 9', 1, '2025-07-26 16:34:58', '2025-07-26 16:51:51'),
(2, 'Juan', 'Carlos', '11111114', 'juan@cartero.com', 'Matemáticas', '111111118', 'Las palmas 1234', 1, '2025-07-27 16:48:04', '2025-07-27 16:48:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `id` bigint UNSIGNED NOT NULL,
  `alumno_id` bigint UNSIGNED NOT NULL,
  `curso_id` bigint UNSIGNED NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota` tinyint NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evaluaciones`
--

INSERT INTO `evaluaciones` (`id`, `alumno_id`, `curso_id`, `descripcion`, `nota`, `fecha`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Primer parcial', 8, '2025-01-15', '2025-07-28 21:47:22', '2025-07-28 21:47:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` bigint UNSIGNED NOT NULL,
  `alumno_id` bigint UNSIGNED NOT NULL,
  `curso_id` bigint UNSIGNED NOT NULL,
  `fecha_inscripcion` date NOT NULL,
  `estado` enum('activo','aprobado','desaprobado') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota_final` tinyint DEFAULT NULL,
  `asistencias` int NOT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  `evaluado_por_docente` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `alumno_id`, `curso_id`, `fecha_inscripcion`, `estado`, `nota_final`, `asistencias`, `observaciones`, `evaluado_por_docente`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-07-26', 'activo', NULL, 0, NULL, 0, '2025-07-26 23:58:32', '2025-07-26 23:58:32'),
(2, 2, 1, '2025-07-26', 'activo', NULL, 0, NULL, 0, '2025-07-27 00:14:33', '2025-07-27 00:14:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_22_003341_create_alumnos_table', 1),
(5, '2025_07_22_212939_create_docentes_table', 1),
(6, '2025_07_22_224339_create_cursos_table', 1),
(7, '2025_07_23_170222_create_inscripciones_table', 1),
(8, '2025_07_24_000548_add_rol_to_users_table', 1),
(9, '2025_07_24_001810_create_evaluaciones_table', 1),
(10, '2025_07_24_010346_create_archivos_adjuntos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cAryHoh2RrRL3nrR7McMr0B6Zi7eHdzWZM0Nq5BS', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV1IyMmR4ZTR1YUM2Sm12bW00aGdIbmUwVnJ6MnBxNDgwVDZlS0lWcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jdXJzb3MiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1753968839),
('j5OMkXMRroyCjHJLB66wGyqouOG1Ue0LIAD42DdO', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVVRiaEoyaE5vdHpuSFJhM0N1MXRzcVBYcnM3RnI5eFNpNDRLZ3d4SSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb29yZGluYWRvci9ob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1753903982);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` enum('admin','coordinador') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'coordinador',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `rol`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Diego', 'diegoAdm@gmail.com', NULL, '$2y$12$8lpUdNIteqUNnigrXv.7oeEfXj1wG6wGNc/yz3BmfGUzGpDNNDdMG', 'admin', NULL, '2025-07-27 19:05:53', '2025-07-27 19:05:53'),
(2, 'Gaby', 'gabyCoordinador@gmail.com', NULL, '$2y$12$UpdXG6pjPMN8eTvjpU.O7eImEorpy4T/mvzozkeHL6I1UrGIh8kyW', 'coordinador', NULL, '2025-07-27 19:47:09', '2025-07-27 19:47:09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alumnos_dni_unique` (`dni`),
  ADD UNIQUE KEY `alumnos_email_unique` (`email`);

--
-- Indices de la tabla `archivos_adjuntos`
--
ALTER TABLE `archivos_adjuntos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archivos_adjuntos_curso_id_foreign` (`curso_id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursos_docente_id_foreign` (`docente_id`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `docentes_dni_unique` (`dni`),
  ADD UNIQUE KEY `docentes_email_unique` (`email`);

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluaciones_alumno_id_foreign` (`alumno_id`),
  ADD KEY `evaluaciones_curso_id_foreign` (`curso_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inscripciones_alumno_id_curso_id_unique` (`alumno_id`,`curso_id`),
  ADD KEY `inscripciones_curso_id_foreign` (`curso_id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `archivos_adjuntos`
--
ALTER TABLE `archivos_adjuntos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos_adjuntos`
--
ALTER TABLE `archivos_adjuntos`
  ADD CONSTRAINT `archivos_adjuntos_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_docente_id_foreign` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD CONSTRAINT `evaluaciones_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluaciones_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscripciones_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

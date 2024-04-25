-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2024 a las 11:34:23
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
-- Base de datos: `eliesflo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimiento`
--

CREATE TABLE `procedimiento` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `goal` text DEFAULT NULL,
  `picture1` varchar(255) DEFAULT NULL,
  `picture2` varchar(255) DEFAULT NULL,
  `id_tipoProcedimiento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `procedimiento`
--

INSERT INTO `procedimiento` (`id`, `name`, `price`, `description`, `goal`, `picture1`, `picture2`, `id_tipoProcedimiento`) VALUES
(1, 'Radiofrecuencia', 50, 'La radiofrecuencia es un tratamiento no invasivo utilizado en medicina estética y dermatología para mejorar la apariencia de la piel. Funciona mediante la aplicación de energía electromagnética en forma de ondas de radiofrecuencia, que penetran en las capas profundas de la piel, generando calor controlado en los tejidos subyacentes.', 'Reafirmación de la piel: El estímulo del colágeno y la elastina ayuda a mejorar la firmeza y la tensión de la piel, reduciendo la apariencia de la flacidez.\r\nReducción de arrugas y líneas finas: El aumento de colágeno mejora la estructura de la piel, suavizando las arrugas y líneas de expresión.\r\nMejora de la textura de la piel: La estimulación del colágeno también puede mejorar la textura general de la piel, haciéndola más suave y uniforme.\r\nReducción de la celulitis: La radiofrecuencia puede ayudar a mejorar la apariencia de la celulitis al aumentar la circulación sanguínea y la producción de colágeno en la zona afectada.\r\nResultados graduales y sin tiempo de inactividad: Los resultados de la radiofrecuencia suelen ser progresivos, con mejoras visibles a lo largo del tiempo. Además, no requiere tiempo de recuperación significativo, lo que permite a los pacientes retomar sus actividades normales de inmediato.', './img\\96034549-spa-terapia-de-radiofrecuencia-termólisis-activa-levantamiento-masaje-corporal-con.jpg', './img\\96034549-spa-terapia-de-radiofrecuencia-termólisis-activa-levantamiento-masaje-corporal-con.jpg', 1),
(2, 'Dermapen', 50, 'El Dermapen es un dispositivo de microagujas automatizado utilizado en tratamientos de rejuvenecimiento cutáneo. Consiste en un pequeño dispositivo con múltiples agujas esterilizadas que crean microperforaciones en la piel a diferentes profundidades y velocidades controladas.\n', 'Estimulación del colágeno: Las microagujas crean microlesiones en la piel, lo que activa el proceso de reparación y producción de colágeno.\r\nMejora de la textura de la piel: El aumento de colágeno y elastina mejora la suavidad y uniformidad de la piel, reduciendo la apariencia de irregularidades.\r\nReducción de cicatrices y marcas: El Dermapen puede ayudar a mejorar la apariencia de cicatrices de acné, quirúrgicas o traumáticas, así como marcas de estrías.\r\nTratamiento de arrugas y líneas finas: La estimulación del colágeno puede suavizar arrugas y líneas de expresión, mejorando la apariencia de la piel envejecida.\r\nMejora de la absorción de productos tópicos: Las microperforaciones permiten una mejor penetración de productos tópicos, como sueros o cremas, potenciando sus efectos.', './img\\descarga.jpg', './img\\descarga.jpg', 2),
(3, 'Indiba facial', 40, 'El tratamiento facial con INDIBA es una terapia no invasiva que utiliza radiofrecuencia capacitiva y resistiva para rejuvenecer la piel. INDIBA estimula la circulación sanguínea, mejora la oxigenación de los tejidos y estimula la producción de colágeno y elastina.', 'Rejuvenecimiento cutáneo: Estimula la producción de colágeno y elastina, mejorando la firmeza y elasticidad de la piel.\r\nReducción de arrugas y líneas de expresión: Suaviza las arrugas y líneas finas, proporcionando una apariencia más joven y revitalizada.\r\nMejora del tono y la textura de la piel: Promueve la regeneración celular, ayudando a mejorar la textura de la piel y a reducir la apariencia de poros dilatados.\r\nReducción de la hinchazón y bolsas bajo los ojos: Mejora la circulación linfática y sanguínea, lo que puede reducir la hinchazón y las bolsas en el área de los ojos.\r\nTratamiento de la flacidez cutánea: Ayuda a tensar la piel y a mejorar la flacidez en áreas como el cuello, la papada y los contornos faciales.\r\nReducción de la inflamación y el enrojecimiento: Calma la piel sensible, reduciendo la inflamación y el enrojecimiento causado por condiciones como la rosácea.', './img\\Indiba-facial-nueva.jpg', './img\\Indiba-facial-nueva.jpg', 2),
(4, 'Indiba facial', 40, 'El tratamiento facial con INDIBA es una terapia no invasiva que utiliza radiofrecuencia capacitiva y resistiva para rejuvenecer la piel. INDIBA estimula la circulación sanguínea, mejora la oxigenación de los tejidos y estimula la producción de colágeno y elastina.', 'Rejuvenecimiento cutáneo: Estimula la producción de colágeno y elastina, mejorando la firmeza y elasticidad de la piel.\r\nReducción de arrugas y líneas de expresión: Suaviza las arrugas y líneas finas, proporcionando una apariencia más joven y revitalizada.\r\nMejora del tono y la textura de la piel: Promueve la regeneración celular, ayudando a mejorar la textura de la piel y a reducir la apariencia de poros dilatados.\r\nReducción de la hinchazón y bolsas bajo los ojos: Mejora la circulación linfática y sanguínea, lo que puede reducir la hinchazón y las bolsas en el área de los ojos.\r\nTratamiento de la flacidez cutánea: Ayuda a tensar la piel y a mejorar la flacidez en áreas como el cuello, la papada y los contornos faciales.\r\nReducción de la inflamación y el enrojecimiento: Calma la piel sensible, reduciendo la inflamación y el enrojecimiento causado por condiciones como la rosácea.', './img\\1713885588Indiba-facial-nueva.jpg', './img\\1713885588Indiba-facial-nueva.jpg', 2),
(5, 'Indiba facial', 40, 'El tratamiento facial con INDIBA es una terapia no invasiva que utiliza radiofrecuencia capacitiva y resistiva para rejuvenecer la piel. INDIBA estimula la circulación sanguínea, mejora la oxigenación de los tejidos y estimula la producción de colágeno y elastina.', 'Rejuvenecimiento cutáneo: Estimula la producción de colágeno y elastina, mejorando la firmeza y elasticidad de la piel.\nReducción de arrugas y líneas de expresión: Suaviza las arrugas y líneas finas, proporcionando una apariencia más joven y revitalizada.\nMejora del tono y la textura de la piel: Promueve la regeneración celular, ayudando a mejorar la textura de la piel y a reducir la apariencia de poros dilatados.\nReducción de la hinchazón y bolsas bajo los ojos: Mejora la circulación linfática y sanguínea, lo que puede reducir la hinchazón y las bolsas en el área de los ojos.\nTratamiento de la flacidez cutánea: Ayuda a tensar la piel y a mejorar la flacidez en áreas como el cuello, la papada y los contornos faciales.\nReducción de la inflamación y el enrojecimiento: Calma la piel sensible, ', './img\\1713885640Indiba-facial-nueva.jpg', './img\\1713885640Indiba-facial-nueva.jpg', 2),
(6, 'Radiofrecuencia', 50, 'El tratamiento facial con INDIBA es una terapia no invasiva que utiliza radiofrecuencia capacitiva y resistiva para rejuvenecer la piel. INDIBA estimula la circulación sanguínea, mejora la oxigenación de los tejidos y estimula la producción de colágeno y elastina.', 'El tratamiento facial con INDIBA es una terapia no invasiva que utiliza radiofrecuencia capacitiva y resistiva para rejuvenecer la piel. INDIBA estimula la circulación sanguínea, mejora la oxigenación de los tejidos y estimula la producción de colágeno y elastina.', './img\\171394915696034549-spa-terapia-de-radiofrecuencia-termólisis-activa-levantamiento-masaje-corporal-con.jpg', './img\\171394915696034549-spa-terapia-de-radiofrecuencia-termólisis-activa-levantamiento-masaje-corporal-con.jpg', 1),
(7, 'Radiofrecuencia', 50, 'El tratamiento facial con INDIBA es una terapia no invasiva que utiliza radiofrecuencia capacitiva y resistiva para rejuvenecer la piel. INDIBA estimula la circulación sanguínea, mejora la oxigenación de los tejidos y estimula la producción de colágeno y elastina.', 'El tratamiento facial con INDIBA es una terapia no invasiva que utiliza radiofrecuencia capacitiva y resistiva para rejuvenecer la piel. INDIBA estimula la circulación sanguínea, mejora la oxigenación de los tejidos y estimula la producción de colágeno y elastina.', './img\\1713953902capilar.jpg', './img\\1713953902capilar.jpg', 3),
(8, 'Metaloterapia', 40, 'La metaloterapia es una técnica de medicina alternativa que utiliza metales para promover el bienestar físico y emocional. Su objetivo principal es equilibrar las energías del cuerpo y estimular su capacidad de autorregulación para mejorar la salud y el estado de ánimo.', 'Los beneficios de la metaloterapia incluyen la estimulación del sistema inmunológico, la reducción del estrés y la ansiedad, el alivio del dolor, la mejora de la circulación sanguínea y la revitalización de la energía vital. Además, se cree que ciertos metales tienen propiedades antimicrobianas y antiinflamatorias que pueden ayudar en el tratamiento de diversas afecciones de la piel y del sistema respiratorio.', './img\\metaloterapia12.jpg', './img\\metaloterapia12.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimientocomment`
--

CREATE TABLE `procedimientocomment` (
  `id_procedimiento` int(11) DEFAULT NULL,
  `id_comment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion` (
  `id_user` int(11) DEFAULT NULL,
  `id_procedimiento` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statusprocedimiento`
--

CREATE TABLE `statusprocedimiento` (
  `id` int(11) NOT NULL,
  `estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoprocedimiento`
--

CREATE TABLE `tipoprocedimiento` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoprocedimiento`
--

INSERT INTO `tipoprocedimiento` (`id`, `tipo`, `img`) VALUES
(1, 'corporal', './img\\corporal.jpg'),
(2, 'facial', './img\\facial.jpg'),
(3, 'capilar', './img\\capilar.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tokens`
--

CREATE TABLE `tokens` (
  `token` varchar(128) NOT NULL,
  `validation` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tokens`
--

INSERT INTO `tokens` (`token`, `validation`, `id_user`) VALUES
('662633d38b806', NULL, 1),
('662639dece59a', NULL, 2),
('66267ac401cf4', NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `active`, `level`) VALUES
(1, 'Jimmer Pavas', '$2y$10$2jk64rIbmoaYkzmaORkc7OOi8Pn4S3hdODORhxCdDQbDCGwYp0Lfe', 'achanta2621@gmail.com', 0, 1),
(2, 'Jimmer Pavas', '$2y$10$gWTk9uPg/eStJwQHBKHnK.Bsvc3sQzatb5BGll6.Et6LlDhY0KSLK', 'khepri26@gmail.com', 0, 1),
(3, 'Aroa espinosa', '$2y$10$pArF69o6nezzGsYAMNKUZeQoXd1AXVYRkw1YftxfNa3qH8KZn6cpK', 'Aroa123@gmail.com', 0, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipoProcedimiento` (`id_tipoProcedimiento`);

--
-- Indices de la tabla `procedimientocomment`
--
ALTER TABLE `procedimientocomment`
  ADD KEY `id_procedimiento` (`id_procedimiento`),
  ADD KEY `id_comment` (`id_comment`);

--
-- Indices de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_procedimiento` (`id_procedimiento`),
  ADD KEY `id_status` (`id_status`);

--
-- Indices de la tabla `statusprocedimiento`
--
ALTER TABLE `statusprocedimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoprocedimiento`
--
ALTER TABLE `tipoprocedimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`token`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `statusprocedimiento`
--
ALTER TABLE `statusprocedimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoprocedimiento`
--
ALTER TABLE `tipoprocedimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  ADD CONSTRAINT `procedimiento_ibfk_1` FOREIGN KEY (`id_tipoProcedimiento`) REFERENCES `tipoprocedimiento` (`id`);

--
-- Filtros para la tabla `procedimientocomment`
--
ALTER TABLE `procedimientocomment`
  ADD CONSTRAINT `procedimientocomment_ibfk_1` FOREIGN KEY (`id_procedimiento`) REFERENCES `procedimiento` (`id`),
  ADD CONSTRAINT `procedimientocomment_ibfk_2` FOREIGN KEY (`id_comment`) REFERENCES `comments` (`id`);

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservacion_ibfk_2` FOREIGN KEY (`id_procedimiento`) REFERENCES `procedimiento` (`id`),
  ADD CONSTRAINT `reservacion_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `statusprocedimiento` (`id`);

--
-- Filtros para la tabla `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

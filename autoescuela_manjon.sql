-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2023 a las 17:43:01
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `autoescuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `precio_practica` double NOT NULL,
  `vehiculo_practica` int(11) NOT NULL,
  `tipo_Carnet` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`dni`, `nombre`, `precio_practica`, `vehiculo_practica`, `tipo_Carnet`) VALUES
('00000000B', 'Jose Luis', 35, 1, 'B'),
('00000000C', 'Tomás', 25, 2, 'B'),
('00000000D', 'Jose Antonio', 40, 3, 'B'),
('00000000E', 'Alejandro', 36, 4, 'C'),
('00000000F', 'carlos', 50, 5, 'C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados_test`
--

CREATE TABLE `resultados_test` (
  `id` int(11) NOT NULL,
  `aciertos` int(11) NOT NULL,
  `usuario_dni` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resultados_test`
--

INSERT INTO `resultados_test` (`id`, `aciertos`, `usuario_dni`) VALUES
(28, 9, '00000000A'),
(29, 7, '00000000A'),
(30, 3, '00000000A'),
(31, 7, '00000000A'),
(32, 7, '00000000A'),
(33, 5, '00000000A'),
(34, 0, '00000000A'),
(35, 2, '00000000A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tests`
--

CREATE TABLE `tests` (
  `codigo` int(11) NOT NULL,
  `tipoCarnet` varchar(5) NOT NULL,
  `preguntas` text NOT NULL,
  `respuestas` text NOT NULL,
  `res_correcta` text NOT NULL,
  `numExam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tests`
--

INSERT INTO `tests` (`codigo`, `tipoCarnet`, `preguntas`, `respuestas`, `res_correcta`, `numExam`) VALUES
(1, 'B', 'Siempre que el recorrido hacia atrás no supere los 15 metros ni invada un cruce de vías, podrá circular marcha atrás...', 'como maniobra complementaria de la parada.|en autovías y autopistas que dicurran por poblado.|cuando no sea posible cambiar de dirección o sentido de la marcha.', 'como maniobra complementaria de la parada.', 1),
(2, 'B', 'Salvo que exista señal que lo prohíba, por los arcenes de las autovías se permite circular...', 'a conductores de bicicletas mayores de 14 años.|a peatones.|a vehículos de tracción animal.', 'a conductores de bicicletas mayores de 14 años.', 1),
(3, 'B', 'Si un vehículo de la policía de tráfico se sitúa detrás de usted y enciende un dispositivo con una luz amarilla intermitente hacia delante, ?qué debe hacer?', 'Detenerse en el lado izquierdo de la calzada, delante del vehículo policial.|Detenerse y, en su caso, seguir las instrucciones del agente.|Reducir la velocidad y apartarse a la derecha, para facilitar el adelantamiento', 'Detenerse y, en su caso, seguir las instrucciones del agente.', 1),
(4, 'B', 'Un estado psicofísico inadecuado puede aumentar el tiempo de reacción, como si conducimos...', 'usando gafas graduadas.|después de una comida ligera.|después de una fuerte discusión.', 'después de una fuerte discusión.', 1),
(5, 'B', 'Si circula por una vía interurbana insuficientemente iluminada a una velocidad inferior a 40km/h.¿Qué luces deberá llevar encendidas?', 'Las luces de corto alcance, al menos.|Las luces de largo alcance.|Las luces de posición solamente.', 'Las luces de corto alcance, al menos.', 1),
(6, 'B', 'Al estacionar un vehículo en pendiente ascendente, su conductor deberá...', 'apoyar una rueda delantera en el bordillo y orientarla hacia fuera de la calzada.|dejar accionado el freno de estacionamiento.|dejar seleccionada la marcha atrás.', 'dejar accionado el freno de estacionamiento.', 1),
(7, 'B', 'El alcohol puede detectarse en la sangre a partir de los 5 minutos de haberlo consumido, pero, ¿cuándo alcanza su máximo nivel (pico de alcoholemia)?', 'Entre los 30 y los 90 minutos después de haberlo consumido.|Entre los 120 y los 130 minutos después de haberlo consumido.|Entre las tres y las cuatro horas después de haberlo consumido.', 'Entre los 30 y los 90 minutos después de haberlo consumido.', 1),
(8, 'B', 'Respecto al uso del cinturón de seguridad, como norma general, el ocupante de un turismo distinto del conductor está obligado a...', 'llevarlo puesto y correctamente abrochado.|llevarlo puesto y sin abrochar, excepto si viaja en la plaza delantera.|llevarlo puesto y abrochado solo en vías interurbanas.', 'llevarlo puesto y correctamente abrochado.', 1),
(9, 'B', 'Buscar una emisora de radio o manipular el reproductor de música, ¿pueden distraer al conductor?', 'Solo si las emisoras de radio no están guardadas en memoria.|No.|Sí, aumentando el riesgo de accidente.', 'Sí, aumentando el riesgo de accidente.', 1),
(10, 'B', '¿Cuál es el numero máximo de plazas autorizadas, incluida la del conductor, que puede tener una furgoneta para poder circular?', '9 plazas.|3 plazas.|5 plazas.', '9 plazas.', 1),
(11, 'A1', 'Si la superficie de los espejos retrovisores de su motocicleta es algo convexa, los vehículos que circulan destrás se verán...', 'más grandes de su tamaño real, pareciendo que se encuentran muy próximos a la motocicleta.|más pequeños de su tamaño real, pareciendo que circulan muy alejados de la motocicleta.|en su tamaño real', 'más pequeños de su tamaño real, pareciendo que circulan muy alejados de la motocicleta.', 1),
(12, 'A1', 'El estilo de conducción de su motocicleta,¿puede influir en el consumo de combustible?', 'Si.|No.', 'Si.', 1),
(13, 'A1', 'El conductor debe inclinar su motocicleta hacia el interior de la curva. Esta inclinación debe aumentarse si...', 'se circula a poca velocidad.|los neumáticos son muy estrechos.|la curva es cerrada.', 'la curva es cerrada.', 1),
(14, 'A1', 'Una motocicleta, ¿puede arrastrar un remolque?', 'No, en ningún caso.|Sí pero solo remolques ligeros.|Sí, siempre que la masa del remolque no sea superior al 50% de la masa en vacío de la motocicleta', 'Sí, siempre que la masa del remolque no sea superior al 50% de la masa en vacío de la motocicleta', 1),
(15, 'A1', '¿Pueden evitarse los accidentes de tráfico?', 'No, la mayoría de las veces son inevitables.|No, porque siempre son debidos a factores externos al conductor.|Sí conociendo las causas que los provocan.', 'Sí conociendo las causas que los provocan.', 1),
(16, 'A1', 'Cualquier motocicleta debe llevar instalada...', 'la luz antiniebla trasera.|la luz de carretera.|la luz antiniebla delantera.', 'la luz de carretera.', 1),
(17, 'A1', 'Como norma general, con la mano derecha se acciona...', 'el freno delantero.|el embrague.|las luces y el claxon.', 'el freno delantero.', 1),
(18, 'A1', 'Si toma alcohol antes de circular con su motocicleta, debe saber que...', 'no afecta en ningún caso a la conducción de vehículos.|no afecta a la conducción de la motocicleta si antes ha comido algo.|existe mayor riesgo de accidente por el efecto del alcohol.', 'existe mayor riesgo de accidente por el efecto del alcohol.', 1),
(19, 'A1', 'Ante un accidente de tráfico, ¿Cuál es la primera medida a adoptar?', 'Identificar a los heridos inconscientes.|Señalizar y proteger la zona.|Taponar las hemorragias de los heridos', 'Señalizar y proteger la zona.', 1),
(20, 'A1', 'Al presentar la motocicleta a la inspección técnica periódica, entre otros, ¿qué documento debe presentar?', 'El justificante del pago del impuesto de circulación.|El justificante del seguro.|La tarjeta de inspección técnica.', 'La tarjeta de inspección técnica.', 1),
(21, 'AM', 'La carga transportada en un ciclomotor de dos ruedas no puede...', 'producir olores.|ocultar dispositivos de alumbrado del vehículo.|sobresalir por detrás del vehículo.', 'ocultar dispositivos de alumbrado del vehículo.', 1),
(22, 'AM', 'El tiempo de reacción puede aumentar debido...', 'al estado de los neumáticos.|a la fatiga.|al estado del pavimento.', 'a la fatiga.', 1),
(23, 'AM', 'Un ciclomotor podrá arrastrar un remolque siempre que, entre otras condiciones,...', 'la velocidad a la que circule quede reducida un 10 por ciento.|se circule exclusivamente por vías urbanas.|así conste en el permiso de conducción.', 'la velocidad a la que circule quede reducida un 10 por ciento.', 1),
(24, 'AM', 'En un paso a nivel, ¿está permitido adelantar?', 'Si, salvo que una señal lo prohíba.|Sí, en los pasos a nivel sin barreras.|No, como norma general.', 'No, como norma general.', 1),
(25, 'AM', 'Al frenar sobre una calzada mojada, la distancia de frenado...', 'es igual que si la calzada está seca.|es mayor que cuando la calzada está seca.|es menor que cuando la calzada está seca.', 'es mayor que cuando la calzada está seca.', 1),
(26, 'AM', 'Si el dibujo de los neumáticos de su ciclomotor ha desaparecido por el uso, ¿debe sustituirlos?', 'Sí, por otros en buen estado.|No, mientras no presenten cortes o deformaciones.|No, porque así el vehículo se desliza mejor y consume menos carburante.', 'Sí, por otros en buen estado.', 1),
(27, 'AM', 'Desde el punto de vista de la seguridad vial, los jóvenes forman un grupo...', 'que respeta siempre las normas y señalizaciones de circulación.|muy propenso a sufrir un accidente.|con mucha experiencia al volante', 'muy propenso a sufrir un accidente.', 1),
(28, 'AM', '¿Qué debe tener en cuenta a la hora de comprar un casco?', 'Fundamentalmente que sea estético.|Que quede muy holgado, porque es más cómodo.|Que tenga suficientes orificios de entrada y salida de aire para una buena ventilación.', 'Que tenga suficientes orificios de entrada y salida de aire para una buena ventilación.', 1),
(29, 'AM', 'De acuerdo con las reglas PAS, que recuerda las pautas da seguir en caso de accidente, ¿cuál es la primera actuación a realizar?', 'Auxiliar a las víctimas.|Protegerse y proteger la zona del accidente.|Avisar a los servicios de emergencia.', 'Protegerse y proteger la zona del accidente.', 1),
(30, 'AM', '¿Qué indica una señal cuadrada azul con un P en blanco?', 'Un lugar reservado al estacionamiento.|Una parada de autobuses.|Una parada de taxis.', 'Un lugar reservado al estacionamiento.', 1),
(31, 'C', 'En vehículos pesados se habla del factor W y factor K, cuando se hacer referencia a...', 'determinados elementos del aceite de la caja de cambios.|determinados factores utilizados para la evaluación de los heridos en accidentes de tráfico.|determinados elementos del tacógrafo.', 'determinados elementos del tacógrafo.', 1),
(32, 'C', '¿Cuándo se debe medir la presión de los neumáticos?', 'Solamente cuando estén desinflados.|Cuando estén calientes.|Cuando estén fríos.', 'Cuando estén fríos.', 1),
(33, 'C', 'Si conduce un camión de cuatro ejes, debe saber que la longitud máxima autorizada, incluida su carga, no podrá exceder, como norma general, de...', '12 metros.|16,50 metros.|15 metros.', '12 metros.', 1),
(34, 'C', 'El conductor de un camión, ¿qué puede hacer para evitar los accidentes de tráfico?', 'Nada, son inevitables.|Evitar los factores de riesgo que dependen del conductor.|Conducir únicamente de noche.', 'Evitar los factores de riesgo que dependen del conductor.', 1),
(35, 'C', 'Si un hombre y una mujer que tienes el mismo peso consumen idéntica cantidad de alcohol, el sexo del conductor, ¿es uno de los factores que puede influir en la tasa de alcoholemia?', 'No.|Sí, es más probable que el hombre tenga una tasa de alcoholemia más elevada.|Sí, es más probable que la mujer tenga una tasa de alcoholemia más elevada.', 'Sí, es más probable que la mujer tenga una tasa de alcoholemia más elevada.', 1),
(36, 'C', '¿Cuál es la función del filtro de aceite?', 'Mantener constante la presión y la temperatura del aceite.|Bombear el aceite hacia las partes móviles del motor.|Mantener libre de impurezas el circuito de lubricación.', 'Mantener libre de impurezas el circuito de lubricación.', 1),
(37, 'C', 'La escala del mapa de carreteras que usa es de 1:300.000. ¿A qué distancia equivales un centímetro en el mapa?', '30Km.|3Km.|300 metros.', '3Km.', 1),
(38, 'C', 'La luz antiniebla trasera de un camión deberá ser utilizada, entre otras ocasiones,...', 'ante cualquier situcaión de niebla o humo.|ante nubes densas de humo, niebla espesa o lluvia muy intensa.|en vías estrechas, calzadas de 6,50 metros o inferiores, con muchas curvas.', 'ante nubes densas de humo, niebla espesa o lluvia muy intensa.', 1),
(39, 'C', 'Al calcular la masa máxima que puede cargar un camión, deberá tener en cuenta que si el vehículo es de dos ejes, su mas máxima autorizada no será superior a...', '18 toneladas.|24 toneladas.|25 toneladas.', '18 toneladas.', 1),
(40, 'C', 'Conduce un camión de 5.000Kg de M.M.A y pretende estacionar. ¿Cuándo se considera que el estacionamiento obstaculiza gravemente la circulación?', 'Cuando se obstaculice la utilización de vado, aunque no esté debidamente señalizado.|Cuando la distancia entre el vehículo y el borde opuesto de la calzada es superior a tres metros.|Cuando la distancia entre el vehículo y el borde opuesto de la calzada es inferior a tres metros.', 'Cuando la distancia entre el vehículo y el borde opuesto de la calzada es inferior a tres metros.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_ofertas`
--

CREATE TABLE `t_ofertas` (
  `cod_oferta` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_limite` date DEFAULT NULL,
  `descuento` double DEFAULT NULL,
  `dni_prof` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_ofertas`
--

INSERT INTO `t_ofertas` (`cod_oferta`, `descripcion`, `fecha_limite`, `descuento`, `dni_prof`) VALUES
(1, 'Debido a que eres una persona nueva, con esta oferta obtendrás un 20 % de descuento en la inscripción si realizas las practicas con el coche mostrado.             ', '2022-12-31', 20, '00000000C'),
(2, 'Si eliges realizar las practicas con este coche obtendrás un 15% de descuento en tu inscripción!!!', '2022-04-24', 15, '00000000E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `contrasena` varchar(60) NOT NULL,
  `rol` int(11) NOT NULL,
  `oferta` int(11) DEFAULT NULL,
  `dni_profesor` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre`, `contrasena`, `rol`, `oferta`, `dni_profesor`) VALUES
('00000000A', 'Paco', '$2y$10$GJUDlOwjYxtzsT5lJ2gUZ.jnEQuJN6rYO7c5.EiNgt6L.uw77LfV2', 0, 1, '00000000C'),
('53579485L', 'David Manjón Pérez', '$2y$04$EvGpv5VKnyDzWzDStcUjeeVSKQQeScUYS5S0mj/sUmJVJ1wDdJdvO', 1, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `marca` varchar(15) NOT NULL,
  `modelo` varchar(40) NOT NULL,
  `ref_img` varchar(50) NOT NULL,
  `carnet_necesario` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `tipo`, `marca`, `modelo`, `ref_img`, `carnet_necesario`) VALUES
(1, 'Turismo', 'Volkswagen', 'Golf VI', 'golf6.jpg', 'B'),
(2, 'Turismo', 'Nissan', 'Micra 2019', 'micra.jpg', 'B'),
(3, 'Turismo', 'Renault', 'Clio 2019', 'clio.jpg', 'B'),
(4, 'Turismo', 'Renault', 'Megane 2012', 'megane2012.jpg', 'B'),
(5, 'Camion', 'Man', 'TGL', 'tgl.jpg', 'C'),
(15, 'Turismo', 'Volkswaggen', 'Golf VII', 'golf_VII.jpg', 'B');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `vehiculo_practica` (`vehiculo_practica`);

--
-- Indices de la tabla `resultados_test`
--
ALTER TABLE `resultados_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resultados_test_ibfk_2` (`usuario_dni`);

--
-- Indices de la tabla `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `t_ofertas`
--
ALTER TABLE `t_ofertas`
  ADD PRIMARY KEY (`cod_oferta`),
  ADD KEY `dni_prof` (`dni_prof`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `oferta` (`oferta`),
  ADD KEY `dni_profesor` (`dni_profesor`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `resultados_test`
--
ALTER TABLE `resultados_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`vehiculo_practica`) REFERENCES `vehiculos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `resultados_test`
--
ALTER TABLE `resultados_test`
  ADD CONSTRAINT `resultados_test_ibfk_2` FOREIGN KEY (`usuario_dni`) REFERENCES `usuarios` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t_ofertas`
--
ALTER TABLE `t_ofertas`
  ADD CONSTRAINT `t_ofertas_ibfk_1` FOREIGN KEY (`dni_prof`) REFERENCES `profesores` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`oferta`) REFERENCES `t_ofertas` (`cod_oferta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

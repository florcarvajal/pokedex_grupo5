-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2024 a las 01:41:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pokedex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemones`
--

CREATE TABLE `pokemones` (
  `id` int(11) NOT NULL,
  `id_unico` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `pokemones`
--

INSERT INTO `pokemones` (`id`, `id_unico`, `imagen`, `nombre`, `tipo_id`, `descripcion`) VALUES
(1, 'P001', 'pikachu.png', 'Pikachu', 1, 'Cuando se enfada, este Pokémon descarga la energía que almacena en el interior de las bolsas de las mejillas.'),
(2, 'P002', 'bulbasur.png', 'Bulbasur', 4, 'Tras nacer, crece alimentándose durante un tiempo de los nutrientes que contiene el bulbo de su lomo.'),
(3, 'P003', 'charmander.png', 'Charmander', 3, 'La llama de su cola indica su fuerza vital. Si está débil, la llama arderá más tenue.'),
(4, 'P004', 'squirtle.png', 'Squirtle', 2, 'Cuando retrae su largo cuello en el caparazón, dispara agua a una presión increíble.'),
(5, 'P005', 'chikorita.png', 'Chikorita', 4, 'Chikorita es un Pokémon de tipo planta conocido por su naturaleza tranquila.'),
(6, 'P006', 'poliwhirl.png', 'Poliwhirl', 2, 'Poliwhirl es un Pokémon de tipo agua que evoluciona de Poliwag.'),
(7, 'P007', 'pidgey.png', 'Pidgey', 1, 'Es muy común. Cuando vuela levantando arena, se camufla para escapar.'),
(8, 'P008', 'rattata.png', 'Rattata', 1, 'Se cuela por cualquier rendija. Tiene unas colmillos fuertes y mordisquea lo que encuentra.'),
(9, 'P009', 'spearow.png', 'Spearow', 1, 'Puede volar durante todo el día a gran velocidad para cazar a sus presas.'),
(10, 'P010', 'vaporeon.png', 'Vaporeon', 2, 'Vaporeon es un Pokémon de tipo agua que puede manipular agua en su entorno.'),
(11, 'P011', 'gyarados.png', 'Gyarados', 2, 'Gyarados es un Pokémon de tipo agua que se transforma de Magikarp.'),
(12, 'P012', 'sandshrew.png', 'Sandshrew', 4, 'Su cuerpo, que se asemeja a la arena, le permite camuflarse en el desierto.'),
(13, 'P013', 'blastoise.png', 'Blastoise', 2, 'Blastoise es un Pokémon de tipo agua conocido por sus potentes cañones de agua.'),
(14, 'P014', 'charmeleon.png', 'Charmeleon', 3, 'Charmeleon es un Pokémon de tipo fuego que evoluciona de Charmander.'),
(15, 'P015', 'clefairy.png', 'Clefairy', 2, 'Se dice que su piel es suave y tierna, como la más esponjosa de las nubes.'),
(16, 'P016', 'vulpix.png', 'Vulpix', 3, 'Tiene seis hermosas colas que van creciendo y se retuercen grácilmente.'),
(17, 'P017', 'jigglypuff.png', 'Jigglypuff', 2, 'Canta una melodía relajante que arrulla a los enemigos y los hace dormir.'),
(18, 'P018', 'magmar.png', 'Magmar', 3, 'Magmar es un Pokémon de tipo fuego que tiene un cuerpo de fuego.'),
(19, 'P019', 'oddish.png', 'Oddish', 4, 'Durante la noche, este Pokémon planta su cuerpo en el suelo para absorber nutrientes.'),
(20, 'P020', 'paras.png', 'Paras', 4, 'Los hongos que crecen en su espalda tienen propiedades medicinales.'),
(21, 'P021', 'charizard.png', 'Charizard', 3, 'Charizard vuela a altas temperaturas y es muy poderoso en batalla.'),
(22, 'P022', 'diglett.png', 'Diglett', 4, 'Vive bajo tierra. Al excavar, mejora la calidad del suelo para las plantas.'),
(23, 'P023', 'meowth.png', 'Meowth', 1, 'Es un amante del dinero y los objetos brillantes. Deambula por la noche.'),
(24, 'P024', 'psyduck.png', 'Psyduck', 2, 'Sufre constantes dolores de cabeza que le otorgan poderes psíquicos.'),
(25, 'P025', 'mankey.png', 'Mankey', 1, 'Es de mal temperamento. Si lo molestan, no dudará en entrar en una furia desenfrenada.'),
(26, 'P026', 'growlithe.png', 'Growlithe', 3, 'Este Pokémon es ferozmente leal y nunca traicionará a su entrenador.'),
(27, 'P027', 'poliwag.png', 'Poliwag', 2, 'Su piel es tan delgada que se pueden ver los órganos internos.'),
(28, 'P028', 'charmeleon.png', 'Charmeleon', 3, 'Charmeleon es un Pokémon de tipo fuego que evoluciona de Charmander.'),
(29, 'P029', 'machop.png', 'Machop', 1, 'Es tan fuerte que puede cargar rocas gigantes durante todo el día sin cansarse.'),
(30, 'P030', 'bellsprout.png', 'Bellsprout', 4, 'Su cuerpo es muy flexible, lo que le permite esquivar ataques fácilmente.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `tipo`, `imagen`) VALUES
(1, 'ELECTRICO', 'electrico.png'),
(2, 'AGUA', 'agua.png'),
(3, 'FUEGO', 'fuego.png'),
(4, 'PLANTA', 'planta.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `usuario`, `password`) VALUES
(1, 'admin@admin.com', 'Administrador', '00f7225b7be554fea9883fe99fd628df');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pokemones`
--
ALTER TABLE `pokemones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipo` (`tipo_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pokemones`
--
ALTER TABLE `pokemones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2023 a las 07:33:08
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `api_estudiantes_tareas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `enrollment` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `tel` int(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `full_name`, `age`, `enrollment`, `address`, `tel`, `email`, `gender`, `comments`) VALUES
(1, 'José Luis Gómez', 22, '84JS23KJ53SA', 'CDMX', 55095436, 'j.luisgomez@gmail.com', 'Masculino', 'Morning Student'),
(2, 'Armando Hernandez Hernandez', 27, '98FGJKTY', 'TOLUCA', 520967568, 'armando.hdz@gmail.com', 'Masculino', 'Afternoon Student'),
(3, 'Alejandro González', 21, '2022001', 'Av. Reforma #123, Ciudad de México', 52, 'alejandro.g@example.com', 'Masculino', 'Estudiando Ingeniería Civil'),
(4, 'Sofía Ramírez', 20, '2022002', 'Calle Juárez #456, Guadalajara', 52, 'sofia.r@example.com', 'Femenino', 'Carrera en Medicina'),
(5, 'Diego López', 22, '2022003', 'Blvd. Constitución #789, Monterrey', 52, 'diego.l@example.com', 'Masculino', 'Interesado en Ciencias de la Computación'),
(6, 'Valentina Herrera', 19, '2022004', 'Av. Hidalgo #567, Puebla', 52, 'valentina.h@example.com', 'Femenino', 'Enfoque en Literatura y Escritura Creativa'),
(7, 'Joaquín Torres', 21, '2022005', 'Calle Morelos #234, Mérida', 52, 'joaquin.t@example.com', 'Masculino', 'Apasionado por la Arqueología'),
(8, 'Isabella Pérez', 20, '2022006', 'Paseo de la Reforma #678, Tijuana', 52, 'isabella.p@example.com', 'Femenino', 'Estudios en Economía'),
(9, 'Matías Sánchez', 22, '2022007', 'Av. Insurgentes #123, Querétaro', 52, 'matias.s@example.com', 'Masculino', 'Activo en el Club de Ajedrez'),
(10, 'Camila Mendoza', 19, '2022008', 'Calle Bravo #345, Guanajuato', 52, 'camila.m@example.com', 'Femenino', 'Interesada en Ecología y Conservación'),
(11, 'Lucas Castro', 20, '2022009', 'Av. Benito Juárez #567, Toluca', 52, 'lucas.c@example.com', 'Masculino', 'Pasatiempo en el Teatro'),
(12, 'María Fernández', 18, '2022010', 'Calle Allende #456, Chihuahua', 52, 'maria.f@example.com', 'Femenino', 'Especialización en Psicología Infantil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `student_id`, `grade`) VALUES
(1, 'Mathematics Assignment', 'Solve algebra problems', 1, '85'),
(2, 'History Assignment', 'Research the Second World War', 1, '92'),
(3, 'Create an CRUD', 'Create Students and Assignment CRUD System', 2, '0'),
(4, 'Create an CRUD in PHP', 'Create Students and Assignment CRUD System in PHP', 1, '87'),
(5, 'Create an API', 'Create Students and Assignment API', 1, '90'),
(6, 'Science Experiment', 'Conduct an experiment on density', 1, '78'),
(7, 'Literature Assignment', 'Read the book \"One Hundred Years of Solitude\"', 2, '88'),
(8, 'Computer Science Project', 'Develop a simple website', 2, '94'),
(9, 'Art Project', 'Create an abstract painting', 2, '76'),
(10, 'Tarea de Matemáticas', 'Resolver problemas de cálculo', 3, '88'),
(11, 'Tarea de Física', 'Realizar experimentos sobre energía cinética', 3, '92'),
(12, 'Tarea de Química', 'Investigar sobre reacciones químicas', 3, '78'),
(13, 'Tarea de Historia', 'Estudiar la Revolución Mexicana', 4, '85'),
(14, 'Tarea de Literatura', 'Analizar una novela clásica', 4, '75'),
(15, 'Tarea de Ciencias Sociales', 'Investigar sobre culturas antiguas', 5, '91'),
(16, 'Tarea de Música', 'Aprender a tocar una canción en guitarra', 5, '89'),
(17, 'Tarea de Educación Física', 'Preparar una presentación sobre un deporte', 5, '82'),
(18, 'Tarea de Álgebra Lineal', 'Resolver sistemas de ecuaciones', 6, '87'),
(19, 'Tarea de Biología', 'Estudiar la genética', 6, '93'),
(20, 'Tarea de Arte', 'Crear una obra de arte abstracto', 6, '79'),
(21, 'Tarea de Informática', 'Desarrollar una aplicación móvil', 7, '94'),
(22, 'Tarea de Inglés', 'Preparar una presentación sobre cultura británica', 7, '76'),
(23, 'Tarea de Psicología', 'Realizar un estudio de caso', 8, '86'),
(24, 'Tarea de Educación Ambiental', 'Participar en una campaña de reciclaje', 8, '90'),
(25, 'Tarea de Deportes', 'Entrenar para una competencia de atletismo', 8, '75'),
(26, 'Tarea de Filosofía', 'Analizar una obra filosófica', 9, '92'),
(27, 'Tarea de Arte Dramático', 'Participar en una obra de teatro', 9, '89'),
(28, 'Tarea de Biología Marina', 'Estudiar la vida marina', 9, '84'),
(29, 'Tarea de Programación', 'Desarrollar una aplicación web', 10, '91'),
(30, 'Tarea de Literatura Clásica', 'Analizar una obra literaria clásica', 10, '87'),
(31, 'Tarea de Historia del Arte', 'Estudiar el arte renacentista', 10, '80'),
(32, 'Tarea de Astronomía', 'Observar el cielo nocturno', 11, '89'),
(33, 'Tarea de Arqueología', 'Excavar un sitio arqueológico', 11, '85'),
(34, 'Tarea de Filología', 'Analizar un texto antiguo', 12, '86'),
(35, 'Tarea de Fotografía', 'Crear una serie de fotografías artísticas', 12, '92'),
(36, 'Tarea de Ciencias Políticas', 'Investigar sobre sistemas políticos', 12, '79');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

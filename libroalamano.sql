-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2016 a las 00:25:47
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libroalamano`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `fecha` datetime NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `codigolibro` varchar(50) NOT NULL,
  `mensaje` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deseos`
--

CREATE TABLE `deseos` (
  `usuario` varchar(50) NOT NULL,
  `codigolibro` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `codigolibro` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leidos`
--

CREATE TABLE `leidos` (
  `usuario` varchar(50) NOT NULL,
  `codigolibro` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `codigo` varchar(20) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `portada` varchar(200) NOT NULL,
  `fechaHora` datetime DEFAULT NULL,
  `actividad` int(11) DEFAULT NULL,
  `persona3` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`codigo`, `titulo`, `autor`, `genero`, `portada`, `fechaHora`, `actividad`, `persona3`) VALUES
('-KAdDAAAQBAJ', 'La lista de Oliva', 'Neïra', 'romantica', 'http://books.google.com.co/books/content?id=-KAdDAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('-mVZrgEACAAJ', 'Donde aúllan las colinas', 'Francisco Narla', 'novela negra', 'http://books.google.com.co/books/content?id=-mVZrgEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', NULL, NULL, NULL),
('0lXYCgAAQBAJ', 'Tú de menta y yo de fresa', 'Olivia Ardey', 'romantica', 'http://books.google.com.co/books/content?id=0lXYCgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('1Ij-AgAAQBAJ', 'El juego de Ender', 'Orson Scott Card', 'ciencia ficcion', 'http://books.google.com.co/books/content?id=1Ij-AgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('1o_GrN3vewYC', 'El viaje de Argos', 'Alejandro Polanco Masa', 'fantasia', 'http://books.google.com.co/books/content?id=1o_GrN3vewYC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('2hs7CwAAQBAJ', 'El Golfo de Cádiz y la Estrecha de Gibraltar', 'Lara Smirnov', 'romantica', 'http://books.google.com.co/books/content?id=2hs7CwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('48xwXsgm9owC', 'La torre prohibida', 'Ángel Gutiérrez,David Zurdo', 'fantasia', 'http://books.google.com.co/books/content?id=48xwXsgm9owC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('4Q8zAAAAQBAJ', 'Los asesinos del emperador', 'Santiago Posteguillo', 'novela historica', 'http://books.google.com.co/books/content?id=4Q8zAAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('6JceCgAAQBAJ', 'Todo ese fuego', 'Ángeles Caso', 'romantica', 'http://books.google.com.co/books/content?id=6JceCgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('8gyfeYWDTfwC', 'El ritual', 'Adam Nevill', 'fantasia', 'http://books.google.com.co/books/content?id=8gyfeYWDTfwC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('8uKZsevlIU4C', 'Alejandro Magno y las águilas de Roma', 'Javier Negrete', 'novela historica', 'http://books.google.com.co/books/content?id=8uKZsevlIU4C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('8uyUmLOi934C', 'Lo que la ciudad esconde', 'Pablo Caralps', 'accion y aventuras', 'http://books.google.com.co/books/content?id=8uyUmLOi934C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('8xa5DAAAQBAJ', 'Calendar Girl 2 Abril-mayo-junio (Edición Colombia', 'Audrey Carlan', 'romantica', 'http://books.google.com.co/books/content?id=8xa5DAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('8_H_CwAAQBAJ', 'Lady Midnight. Cazadores de sombras: Renacimiento', 'Cassandra Clare', 'juvenil', 'http://books.google.com.co/books/content?id=8_H_CwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('93kKC3eBH7oC', 'El informe San Marcos', 'Fermín Bocos', 'accion y aventuras', 'http://books.google.com.co/books/content?id=93kKC3eBH7oC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('96ABBAAAQBAJ', 'La pirámide inmortal', 'Javier Sierra', 'narrativa contemporanea', 'http://books.google.com.co/books/content?id=96ABBAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('9KChDAAAQBAJ', 'Soy una mamá', 'Megan Maxwell', 'romantica', 'http://books.google.com.co/books/content?id=9KChDAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('9XVOm8Xh-UQC', 'Delfines', 'Alberto Vázquez-Figueroa', 'accion y aventuras', 'http://books.google.com.co/books/content?id=9XVOm8Xh-UQC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('A0mgCwAAQBAJ', 'Olvidé decirte quiero', 'Mónica Carrillo', 'contemporanea', 'http://books.google.com.co/books/content?id=A0mgCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('axs7CwAAQBAJ', 'No me prives de tu piel', 'Patricia Geller', 'romantica', 'http://books.google.com.co/books/content?id=axs7CwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('BataLIoNLn8C', 'Los hombres que no amaban a las mujeres (Serie Mil', 'Stieg Larsson', 'novela negra', 'http://books.google.com.co/books/content?id=BataLIoNLn8C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('bTURDAAAQBAJ', 'Los Austrias. El vuelo del águila', 'José Luis Corral', 'novela historica', 'http://books.google.com.co/books/content?id=bTURDAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('cjvM-pnXjwEC', 'El Libro de los Portales', 'Laura Gallego', 'fantasia', 'http://books.google.com.co/books/content?id=cjvM-pnXjwEC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('Clv4AwAAQBAJ', 'Ciudad del fuego celestial. Cazadores de sombras 6', 'Cassandra Clare', 'Fantasía', 'http://books.google.com.co/books/content?id=Clv4AwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE72QxmH9OkwTs7lYqMOLFElcwQ-2HqAh2frPnyJ9MiEu-TFKb-fUG1pEc6vhXIVg75WVYJtiratJZiGGQxRcGYYZq6', NULL, NULL, NULL),
('cR07CwAAQBAJ', 'La legión perdida', 'Santiago Posteguillo', 'contemporanea', 'http://books.google.com.co/books/content?id=cR07CwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('CYOeCwAAQBAJ', 'You 2. Need you', 'Estelle Maskame', 'juvenil', 'http://books.google.com.co/books/content?id=CYOeCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('ddwxAAAAQBAJ', 'Un recuerdo de luz', 'Robert Jordan,Brandon Sanderso', 'fantasia', 'http://books.google.com.co/books/content?id=ddwxAAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('dMrbQls1mo0C', 'Ciudad de Hueso', 'Cassandra Clare', 'juvenil', 'http://books.google.com.co/books/content?id=dMrbQls1mo0C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('dOyMCwAAQBAJ', 'La Elección', 'Alissa Brontë', 'romantica', 'http://books.google.com.co/books/content?id=dOyMCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('dYh1CQAAQBAJ', 'El secreto de Vesalio. Edición colombiana', 'Jordi Llobregat', 'novela historica', 'http://books.google.com.co/books/content?id=dYh1CQAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('e-FNQAAACAAJ', 'La profecía 2013', 'Francesc Miralles', 'accion y aventuras', 'http://books.google.com.co/books/content?id=e-FNQAAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', NULL, NULL, NULL),
('e09ems4_SSIC', 'Lo que esconde tu nombre', 'Clara Sánchez', 'contemporanea', 'http://books.google.com.co/books/content?id=e09ems4_SSIC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('fC30CwAAQBAJ', 'Una libra de carne', 'Sophie Jackson', 'romantica', 'http://books.google.com.co/books/content?id=fC30CwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('Fou8rQEACAAJ', 'Sinsajo', 'Suzanne Collins', 'Fantasía', 'http://books.google.com.co/books/content?id=Fou8rQEACAAJ&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE71vWCZ4BNhoX5a0EV_g0ZUjjWbgt-OxlenTlf8w4XFTTuTqm47MknuyrQf3dEtY1DuDvreOZ7iesUMYcciADy4JGPoBLt-97YEa', NULL, NULL, NULL),
('FpseCgAAQBAJ', 'Una pasión rusa', 'Reyes Monforte', 'novela historica', 'http://books.google.com.co/books/content?id=FpseCgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('h-XiCwAAQBAJ', 'Tragamundos', 'Sarinha,Luh', 'juvenil', 'http://books.google.com.co/books/content?id=h-XiCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('H6IBBAAAQBAJ', 'Los caminantes', 'Carlos Sisí', 'terror', 'http://books.google.com.co/books/content?id=H6IBBAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('hHlDCwAAQBAJ', 'Alguien inesperado', 'Eva P. Valencia', 'romantica', 'http://books.google.com.co/books/content?id=hHlDCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('hm3NrQEACAAJ', 'Los juegos del hambre', 'Suzanne Collins', 'Fantasía', 'http://books.google.com.co/books/content?id=hm3NrQEACAAJ&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE73AlVb0E4rDModVZqXntTma8RwTZNqLh4GfVaaMbQAJC22LSIrzspGprd5P67UJjTwrSVS31Cjl2SFnn6a12BgCGBJxu2bBTs70', NULL, NULL, NULL),
('HTL4CwAAQBAJ', 'La viuda', 'Fiona Barton', 'novela negra', 'http://books.google.com.co/books/content?id=HTL4CwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('hU86pDEnw5MC', 'El último Catón', 'Matilde Asensi', 'novela historica', 'http://books.google.com.co/books/content?id=hU86pDEnw5MC&printsec=frontcover&img=1&zoom=1&source=gbs_api', NULL, NULL, NULL),
('iCpEDAAAQBAJ', 'Manhattan Lola Love', 'Cristina Prada', 'romantica', 'http://books.google.com.co/books/content?id=iCpEDAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('iEzSCQAAQBAJ', 'Lo que no te mata te hace más fuerte (Serie Millen', 'David Lagercrantz', 'novela negra', 'http://books.google.com.co/books/content?id=iEzSCQAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('IqZhCwAAQBAJ', 'Oye, morena, ¿tú qué miras?', 'Megan Maxwell', 'romantica', 'http://books.google.com.co/books/content?id=IqZhCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('Itfec9oaPNgC', 'Cincuenta sombras de Grey (Cincuenta sombras 1)', 'E.L. James', 'Romance', 'http://books.google.com.co/books/content?id=Itfec9oaPNgC&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE70Hg8S2ur7OGacxcVRn2H088UkAIevx35oinkRNxCziQZd7-Dk-xk-baMD8TLRcecOSjTtefvQk9A-YPlpeBCIU34kEsu90aIMn', NULL, NULL, NULL),
('JBm2AwAAQBAJ', 'Pacto de lealtad', 'Gonzalo Giner', 'novela historica', 'http://books.google.com.co/books/content?id=JBm2AwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('JmJRDAAAQBAJ', 'Lo que el alcohol ha unido que no lo separe la res', 'García de Saura', 'romantica', 'http://books.google.com.co/books/content?id=JmJRDAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('jV0DOhuJsq0C', 'El mar en llamas', 'Alberto Vázquez-Figueroa', 'accion y aventuras', 'http://books.google.com.co/books/content?id=jV0DOhuJsq0C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('l0mgCwAAQBAJ', 'El silencio de la ciudad blanca', 'Eva García Saénz de Urturi', 'novela negra', 'http://books.google.com.co/books/content?id=l0mgCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('lKh9DAAAQBAJ', 'No está el horno para cruasanes', 'Shirin Klaus', 'romantica', 'http://books.google.com.co/books/content?id=lKh9DAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('Ls9RPgAACAAJ', 'El Templo de la Luna', 'Fernando J. López del Oso', 'fantasia', 'http://books.google.com.co/books/content?id=Ls9RPgAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', NULL, NULL, NULL),
('LW2fCwAAQBAJ', 'Todo Bajo el Cielo', 'Matilde Asensi', 'accion y aventuras', 'http://books.google.com.co/books/content?id=LW2fCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('LzymDAAAQBAJ', 'Crímenes duplicados', 'Michael Hjorth,Hans Rosenfeldt', 'novela negra', 'http://books.google.com.co/books/content?id=LzymDAAAQBAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', NULL, NULL, NULL),
('MMInCwAAQBAJ', 'After. Antes de ella (Serie After 0) Edición colom', 'Anna Todd', 'juvenil', 'http://books.google.com.co/books/content?id=MMInCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('MTh6BgAAQBAJ', 'La Templanza', 'María Dueñas', 'contemporanea', 'http://books.google.com.co/books/content?id=MTh6BgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('mWAdBgAAQBAJ', 'Te esperaré toda mi vida', 'Megan Maxwell', 'romantica', 'http://books.google.com.co/books/content?id=mWAdBgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('n__3JkeBkP0C', 'Calendar Girl', 'James Ellison', 'romantica', 'http://books.google.com.co/books/content?id=n__3JkeBkP0C&printsec=frontcover&img=1&zoom=1&source=gbs_api', NULL, NULL, NULL),
('P1D2CwAAQBAJ', 'PD. Todavía te quiero', 'Jenny Han', 'juvenil', 'http://books.google.com.co/books/content?id=P1D2CwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('PFKtCwAAQBAJ', 'La hija del capitán Groc', 'Víctor Amela', 'contemporanea', 'http://books.google.com.co/books/content?id=PFKtCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('PjRm8EumZfcC', 'Apartamento 16', 'Adam Nevill', 'terror', 'http://books.google.com.co/books/content?id=PjRm8EumZfcC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('PpCocQAACAAJ', 'La plaga', 'Jeff Carlson', 'ciencia ficcion', 'http://books.google.com.co/books/content?id=PpCocQAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', NULL, NULL, NULL),
('qeTiCwAAQBAJ', 'Algo tan sencillo como darte un beso', 'Blue Jeans', 'juvenil', 'http://books.google.com.co/books/content?id=qeTiCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('Qk5i0HgSIlQC', '¡Buenos días, princesa!', 'Blue Jeans', 'contemporanea', 'http://books.google.com.co/books/content?id=Qk5i0HgSIlQC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('ql85nwEACAAJ', 'El Hobbit, edición de lujo', 'J. R. R. Tolkien', 'fantasia', 'http://books.google.com.co/books/content?id=ql85nwEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', NULL, NULL, NULL),
('qXlDCwAAQBAJ', 'Una heredera con muy malas pulgas', 'Silvia García Ruiz', 'romantica', 'http://books.google.com.co/books/content?id=qXlDCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('rbuNNfIFcPAC', 'Venganza en Sevilla', 'Matilde Asensi', 'accion y aventuras', 'http://books.google.com.co/books/content?id=rbuNNfIFcPAC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('rNYhswEACAAJ', 'La sonata del silencio', 'Paloma Sánchez-Garnica', 'contemporanea', 'http://books.google.com.co/books/content?id=rNYhswEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', NULL, NULL, NULL),
('SZihXhhxSN0C', 'Circo Máximo', 'Santiago Posteguillo', 'contemporanea', 'http://books.google.com.co/books/content?id=SZihXhhxSN0C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('tkekCwAAQBAJ', 'Somos uno (Crossfire V)', 'Sylvia Day', 'contemporanea', 'http://books.google.com.co/books/content?id=tkekCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('tqZhCwAAQBAJ', 'La víspera de casi todo', 'Víctor del Árbol', 'contemporanea', 'http://books.google.com.co/books/content?id=tqZhCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('UZzvBQAAQBAJ', 'La última confidencia del escritor Hugo Mendoza', 'Joaquín Camps', 'novela negra', 'http://books.google.com.co/books/content?id=UZzvBQAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('vVwzCwAAQBAJ', 'No me mires así', 'Noe Casado', 'romantica', 'http://books.google.com.co/books/content?id=vVwzCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('vxaKBAAAQBAJ', 'Ofrenda a la tormenta', 'Dolores Redondo', 'novela negra', 'http://books.google.com.co/books/content?id=vxaKBAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('WsBPCwAAQBAJ', 'You 1. Love you', 'Estelle Maskame', 'juvenil', 'http://books.google.com.co/books/content?id=WsBPCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('X2MiTMHkiuwC', 'El cuarto reino', 'Francesc Miralles', 'accion y aventuras', 'http://books.google.com.co/books/content?id=X2MiTMHkiuwC&printsec=frontcover&img=1&zoom=1&source=gbs_api', NULL, NULL, NULL),
('X3lDCwAAQBAJ', 'Manhattan Exciting Love', 'Cristina Prada', 'romantica', 'http://books.google.com.co/books/content?id=X3lDCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('x3McbWQy5ggC', 'Los Mundos Magicos De El Senor De Los Anillos/The ', 'David Colbert', 'Fantasía', 'http://books.google.com.co/books/content?id=x3McbWQy5ggC&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE72_0MjresG_g1KQIClVF4inkxqD2JbYJmMY0Ee6n37Bprb14kqPay-mD5QkxCs5KSUotC15dQsj6CalKRP2bHc2vfdAVLb1939G', NULL, NULL, NULL),
('x4HdBQAAQBAJ', 'Crímenes que no olvidaré', 'Alicia Giménez Bartlett', 'novela negra', 'http://books.google.com.co/books/content?id=x4HdBQAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('xi2URRig7jYC', 'El Hobbit', 'J. R. R. Tolkien', 'Genero del libro', 'http://books.google.com.co/books/content?id=xi2URRig7jYC&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE715Aw1y4t_mJnUMDZbj1PV6Oxe8BGBo7Fx9MpDInvAtJ8xTqg00aXc6JUglUMkKlvdE-eUScqAh09Gan3yhSGbiCN', NULL, NULL, NULL),
('XjRjBgAAQBAJ', 'El coronel no tiene quien le escriba', 'Gabriel García Márquez', 'realismo magico', 'http://books.google.com.co/books/content?id=XjRjBgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('xkiOCwAAQBAJ', 'Wigetta', 'Willyrex,Vegetta777', 'juvenil', 'http://books.google.com.co/books/content?id=xkiOCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('XQm2CwAAQBAJ', 'Be Yourself', 'María Cadepe', 'juvenil', 'http://books.google.com.co/books/content?id=XQm2CwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('yr6CyVLtOmoC', 'Drácula (edición ilustrada)', 'Bram Stoker', 'Terror', 'http://books.google.com.co/books/content?id=yr6CyVLtOmoC&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE73JVY7Rb-_SFFfa5HQR8Xqd_7YA-04oGzbLTl94xSzFxvoaPDym9-6EkIeGYIrPJtLHEf_Gnvx5APwHyNF4g_4npt', NULL, NULL, NULL),
('yS70CwAAQBAJ', 'La maldición de la reina Leonor', 'Peridis', 'contemporanea', 'http://books.google.com.co/books/content?id=yS70CwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('YvL_CwAAQBAJ', 'Donde los escorpiones', 'Lorenzo Silva', 'novela negra', 'http://books.google.com.co/books/content?id=YvL_CwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('ZDH4CwAAQBAJ', 'El día que el cielo se caiga', 'Megan Maxwell', 'romantica', 'http://books.google.com.co/books/content?id=ZDH4CwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('zHFKKq4UUcMC', 'El país de los espíritus', 'Miguel Ruiz Montañez', 'accion y aventuras', 'http://books.google.com.co/books/content?id=zHFKKq4UUcMC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('ZOX7heyc6j8C', 'Shangri-La', 'Julio Murillo', 'accion y aventuras', 'http://books.google.com.co/books/content?id=ZOX7heyc6j8C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL),
('_iFoAgAAQBAJ', 'El guardián invisible', 'Dolores Redondo', 'novela negra', 'http://books.google.com.co/books/content?id=_iFoAgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `emisor` varchar(50) NOT NULL,
  `receptor` varchar(50) NOT NULL,
  `mensaje` varchar(250) NOT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `fecha`, `hora`, `emisor`, `receptor`, `mensaje`, `estado`) VALUES
(1, '2016-10-13', '10:15:11', 'cenixsoluciones@gmail.com', 'josefsoto@hotmail.es', 'cenix es una empresa en un impresionante crecimiento en tan solo un año', 'leido'),
(2, '2016-10-13', '10:15:11', 'cenixsoluciones@gmail.com', 'josefsoto@hotmail.es', 'cenix es una empresa en un impresionante crecimiento en tan solo un año', 'leido'),
(3, '2016-10-13', '10:19:09', 'josefsoto@hotmail.com', 'cenixsoluciones@gmail.com', 'ola ke ase', 'borrado'),
(4, '2016-10-12', '16:30:18', 'cenixsoluciones@gmail.com', 'jose@soto.co', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual', 'sinleer'),
(5, '2016-10-13', '10:19:09', 'josefsoto@hotmail.com', 'cenixsoluciones@gmail.com', 'ola ke ase', 'borrado'),
(6, '2016-10-12', '16:30:18', 'cenixsoluciones@gmail.com', 'jose@soto.co', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual', 'sinleer'),
(7, '2016-10-13', '12:21:28', 'jose@soto.com', 'cenixsoluciones@gmail.com', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system,', 'borrado'),
(8, '2016-10-11', '11:18:34', 'josefsoto@hotmail.es', 'jose@soto.com', 'mensaje de prueba sin cuenta', 'sinleer'),
(9, '2016-10-13', '12:21:28', 'jose@soto.com', 'cenixsoluciones@gmail.com', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system,', 'leido'),
(10, '2016-10-11', '11:18:34', 'josefsoto@hotmail.es', 'jose@soto.com', 'mensaje de prueba sin cuenta', 'sinleer'),
(18, '2016-10-15', '10:54:28', 'cenixsoluciones@gmail.com', 'josefsoto@hotmail.com', 'emailreceptoremailreceptoremailreceptoremailreceptoremailreceptor', 'sinleer'),
(19, '2016-10-15', '11:06:18', 'josefsoto@hotmail.es', 'cenixsoluciones@gmail.com', 'hola cenix gracias por tu mensaje te respondo como prueba numero 1 fecha 15 octubre 2016', 'borrado'),
(20, '2016-10-15', '15:20:02', 'josefsoto@hotmail.es', 'cenixsoluciones@gmail.com', '$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')', 'borrado'),
(21, '2016-10-15', '15:20:41', 'josefsoto@hotmail.es', 'cenixsoluciones@gmail.com', '$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(', 'borrado'),
(22, '2016-10-15', '15:21:34', 'josefsoto@hotmail.es', 'cenixsoluciones@gmail.com', '$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')', 'borrado'),
(23, '2016-10-15', '15:23:24', 'josefsoto@hotmail.es', 'cenixsoluciones@gmail.com', '$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')', 'leido'),
(24, '2016-10-15', '15:23:32', 'josefsoto@hotmail.es', 'cenixsoluciones@gmail.com', '$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')', 'leido'),
(25, '2016-10-15', '15:33:14', 'cenixsoluciones@gmail.com', 'josefsoto@hotmail.es', 'hola jose soto muy largo el mensaje rompe el layout 15 octubre 2016', 'leido'),
(26, '2016-10-15', '15:33:51', 'cenixsoluciones@gmail.com', 'jose@soto.com', '$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')$(''.mensaje_respuesta'').val('''')', 'sinleer'),
(27, '2016-10-15', '18:33:26', 'cenixsoluciones@gmail.com', 'josefsoto@hotmail.es', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'leido'),
(28, '2016-10-17', '15:47:02', 'josefsoto@hotmail.es', 'cenixsoluciones@gmail.com', 'probando mensajes el dia 17 octubre 2016', 'leido'),
(34, '2016-10-18', '17:03:38', 'cenixsoluciones@gmail.com', 'cenixsoluciones@gmail.com', 'prueba envió oferta numero 4 ', 'leido'),
(35, '2016-10-18', '17:11:23', 'cenixsoluciones@gmail.com', 'cenixsoluciones@gmail.com', 'prueba numero 5 fecha 18 octubre 2016', 'leido'),
(36, '2016-10-19', '12:23:41', 'cenixsoluciones@gmail.com', 'cenixsoluciones@gmail.com', 'probando envio de mensajes nueva tabla base de datos fecha 19 octubre 2016', 'leido'),
(37, '2016-10-19', '21:49:05', 'cenixsoluciones@gmail.com', 'cenixsoluciones@gmail.com', 'hola quiero este libro', 'borrado'),
(38, '2016-10-19', '21:57:07', 'cenixsoluciones@gmail.com', 'cenixsoluciones@gmail.com', 'me gusta que estes probando los mensajes pero me lo mandaste tarde', 'leido'),
(39, '2016-10-19', '22:03:01', 'josefsoto@hotmail.es', 'cenixsoluciones@gmail.com', 'me interesa el libro que estas vendiendo', 'leido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `librosrequeridos` varchar(200) NOT NULL,
  `estadolibro` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL,
  `codigo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id`, `usuario`, `precio`, `librosrequeridos`, `estadolibro`, `estado`, `codigo`) VALUES
(1, 'cenixsoluciones@gmail.com', 20000, 'cualquier libro', 'todos los libros estan en perfecto estado con algunas pequeñas arrugas', 3, '1Ij-AgAAQBAJ'),
(2, 'cenixsoluciones@gmail.com', 30000, '', 'en perfecto estado', 1, ''),
(3, 'cenixsoluciones@gmail.com', 0, 'cualquier libro', 'libro en perfecto estado', 2, '1Ij-AgAAQBAJ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `lugar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`fecha`, `hora`, `usuario`, `mensaje`, `lugar`) VALUES
('2016-09-29', '12:04:47', 'admin', 'hola como estas', 'page_principal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `genero` varchar(50) NOT NULL,
  `tipo_usuario` int(2) NOT NULL,
  `provedor_nombre` varchar(255) DEFAULT NULL,
  `provedor_id_user` varchar(255) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre`, `apellido`, `clave`, `foto`, `genero`, `tipo_usuario`, `provedor_nombre`, `provedor_id_user`, `fecha_registro`) VALUES
(1, 'josefsoto@hotmail.es', 'Jose', 'Soto', '15f9190338fba3c668086bc540e8b8d5', 'https://graph.facebook.com/345603152444016/picture?width=150&height=150', 'todos', 4, 'facebook', '345603152444016', '2016-10-09 22:15:58'),
(4, 'josefsoto@hotmail.com', 'jose', 'soto', '$2y$10$pybL7A5ox0gHA3tBItniA.oEKzZYQsrQ1j0UkyKWLiRjgqK2AOuEm', 'images/avatar.jpg', 'Terror', 4, 'registro_correo', '000000', '2016-10-10 09:21:44'),
(5, 'jose@soto.com', 'jose', 'soto', '$2y$10$N08D42rgm3ArViWnMzFfNOC2qp1m3HQaZf.HPxmwlDfPqdAefIgVe', 'images/avatar.jpg', 'Terror', 4, 'registro_correo', '000000', '2016-10-10 10:51:45'),
(6, 'jose@soto.co', 'jose', 'soto', '$2y$10$us4oW4vJk7T2AOZY7P/zou2gyrNr/RSbHYr21Wd8GaitIsRr3EsFG', 'images/avatar.jpg', 'Romántica', 4, 'registro_correo', '000000', '2016-10-10 11:08:12'),
(7, 'cenixsoluciones@gmail.com', 'Cenix', 'Soto', 'f663c39d8fa9b3bc6f9afb495867b0dc', 'https://graph.facebook.com/1787685054807438/picture?width=150&height=150', 'todos', 4, 'facebook', '1787685054807438', '2016-10-14 17:30:47'),
(8, 'libroalamano@gmail.com', 'Libroalamano', 'Comunidad', '84ec4411b49b54edafcbd13f864f0915', 'https://graph.facebook.com/104003816735103/picture?width=150&height=150', 'todos', 4, 'facebook', '104003816735103', '2016-10-17 15:44:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`fecha`,`usuario`);

--
-- Indices de la tabla `deseos`
--
ALTER TABLE `deseos`
  ADD PRIMARY KEY (`usuario`,`codigolibro`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `leidos`
--
ALTER TABLE `leidos`
  ADD PRIMARY KEY (`usuario`,`codigolibro`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emisor` (`emisor`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`emisor`) REFERENCES `usuarios` (`email`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD CONSTRAINT `ofertas_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`email`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

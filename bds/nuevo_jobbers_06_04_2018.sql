-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2018 a las 19:20:44
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nuevo_jobbers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_actividades_empresa`
--

CREATE TABLE `tbl_actividades_empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_actividades_empresa`
--

INSERT INTO `tbl_actividades_empresa` (`id`, `nombre`) VALUES
(1, 'Comercio Exterior'),
(2, 'Agropecuaria'),
(3, 'Arquitectura'),
(4, 'Banca / Financiera'),
(5, 'Consultoría'),
(6, 'Consumo masivo'),
(7, 'Comercio'),
(8, 'Aérea'),
(9, 'Defensa'),
(10, 'Educación'),
(11, 'Energía'),
(12, 'Farmacéutica'),
(13, 'Gobierno'),
(14, 'Internet'),
(15, 'Jurídica'),
(16, 'Manufactura'),
(17, 'Publicidad / Marketing / RRPP'),
(18, 'Minería / Petróleo / Gas'),
(19, 'Medios'),
(20, 'ONGs'),
(21, 'Transporte'),
(22, 'Otra'),
(23, 'Servicios'),
(24, 'Entretenimiento'),
(25, 'Diseño'),
(26, 'Financiera'),
(27, 'Química'),
(28, 'Seguros'),
(29, 'Supermercado / Hipermercado'),
(30, 'Pesca'),
(31, 'Forestal'),
(32, 'Biotecnología'),
(33, 'Telecomunicaciones'),
(34, 'Informática / Tecnología'),
(35, 'Construcción'),
(36, 'Automotriz'),
(37, 'Salud'),
(38, 'Turismo'),
(39, 'Hotelería'),
(40, 'Imprenta'),
(41, 'Holding'),
(42, 'Inmobiliaria'),
(43, 'Siderurgia'),
(44, 'Textil'),
(45, 'Agro-Industrial'),
(46, 'Gastronomía'),
(47, 'Alimenticia'),
(48, 'Artesanal'),
(49, 'Información e Investigación'),
(50, 'Correo'),
(51, 'Editorial'),
(52, 'Ganadería'),
(53, 'AFJP'),
(54, 'Higiene y Perfumería'),
(55, 'Papelera'),
(56, 'Laboratorio'),
(57, 'Petroquímica'),
(58, 'Retail'),
(59, 'Transportadora'),
(60, 'Tabacalera'),
(61, 'Plásticos'),
(62, 'Call Center');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_alertas`
--

CREATE TABLE `tbl_alertas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_oferta` int(11) NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_areas`
--

CREATE TABLE `tbl_areas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(64) DEFAULT NULL,
  `amigable` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_areas`
--

INSERT INTO `tbl_areas` (`id`, `nombre`, `amigable`) VALUES
(1, 'Administración, Contabilidad y Finanzas', 'administracion-contabilidad-y-finanzas'),
(2, 'Aduana y Comercio Exterior', 'aduana-y-comercio-exterior'),
(3, 'Abastecimiento y Logística', 'abastecimiento-y-logistica'),
(4, 'Ingeniería Civil y Construcción', 'ingenieria-civil-y-construccion'),
(5, 'Comercial, Ventas y Negocios', 'comercial-ventas-y-negocios'),
(6, 'Educación, Docencia e Investigación', 'educacion-docencia-e-investigacion'),
(7, 'Gastronomía y Turismo', 'gastronomia-y-turismo'),
(8, 'Gerencia y Dirección General', 'gerencia-y-direccion-general'),
(9, 'Legales', 'legales'),
(10, 'Marketing y Publicidad', 'marketing-y-publicidad'),
(11, 'Producción y Manufactura', 'produccion-y-manufactura'),
(12, 'Recursos Humanos y Capacitación', 'recursos-humanos-y-capacitacion'),
(13, 'Comunicación, Relaciones Institucionales y Públicas', 'comunicacion-relaciones-institucionales-y-publicas'),
(14, 'Tecnología, Sistemas y Telecomunicaciones', 'tecnologia-sistemas-y-telecomunicaciones'),
(15, 'Oficios y Otros', 'oficios-y-otros'),
(16, 'Salud, Medicina y Farmacia', 'salud-medicina-y-farmacia'),
(17, 'Atención al Cliente, Call Center y Telemarketing', 'atencion-al-cliente-call-center-y-telemarketing'),
(18, 'Secretarias y Recepción', 'secretarias-y-recepcion'),
(19, 'Seguros', 'seguros'),
(20, 'Minería, Petróleo y Gas', 'mineria-petroleo-y-gas'),
(21, 'Ingenierías', 'ingenierias'),
(22, 'Diseño', 'diseno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_areas_estudio`
--

CREATE TABLE `tbl_areas_estudio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `amigable` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_areas_estudio`
--

INSERT INTO `tbl_areas_estudio` (`id`, `nombre`, `amigable`) VALUES
(1, 'Organización Industrial', 'organizacion-industrial'),
(2, 'Abogacía / Derecho / Leyes', 'abogacia-derecho-leyes'),
(3, 'Geofísica', 'geofisica'),
(4, 'Adm. de Empresas', 'adm-de-empresas'),
(5, 'Ing. Comercial', 'ing-comercial'),
(6, 'Ing. Nuclear', 'ing-nuclear'),
(7, 'Arquitectura', 'arquitectura'),
(8, 'Seguros', 'seguros'),
(9, 'Bellas Artes', 'bellas-artes'),
(10, 'Tecnología de Alimentos', 'tecnologia-de-alimentos'),
(11, 'Biología', 'biologia'),
(12, 'Ciencias Políticas', 'ciencias-politicas'),
(13, 'Intérprete', 'interprete'),
(14, 'Ciencias Físicas', 'ciencias-fisicas'),
(15, 'Ciencias de la Educación', 'ciencias-de-la-educacion'),
(16, 'Computación / Informática', 'computacion-informatica'),
(17, 'Apoderado Aduanal', 'apoderado-aduanal'),
(18, 'Contabilidad / Auditoría', 'contabilidad-auditoria'),
(19, 'Asesoría Legal Internacional', 'asesoria-legal-internacional'),
(20, 'Construcción / Obras Civiles', 'construccion-obras-civiles'),
(21, 'Asistente de Tráfico', 'asistente-de-trafico'),
(22, 'Diseño Gráfico', 'diseno-grafico'),
(23, 'Capacitación Comercio Exterior', 'capacitacion-comercio-exterior'),
(24, 'Economía', 'economia'),
(25, 'Compras Internacionales/Importación', 'compras-internacionales-importacion'),
(26, 'Enfermería', 'enfermeria'),
(27, 'Consultorías Comercio Exterior', 'consultorias-comercio-exterior'),
(28, 'Finanzas Internacionales', 'finanzas-internacionales'),
(29, 'Asesoría en Comercio Exterior Jubilado', 'asesoria-en-comercio-exterior-jubilado'),
(30, 'Filosofía', 'filosofia'),
(31, 'Asesoría en Comercio Exterior', 'asesoria-en-comercio-exterior'),
(32, 'Fisioterapia', 'fisioterapia'),
(33, 'Mercadotecnia Internacional', 'mercadotecnia-internacional'),
(34, 'Fotografía', 'fotografia'),
(35, 'Tecnologías de la Información', 'tecnologias-de-la-informacion'),
(36, 'Ventas Internacionales/Exportación', 'ventas-internacionales-exportacion'),
(37, 'Historia', 'historia'),
(38, 'Administración Agropecuaria', 'administracion-agropecuaria'),
(39, 'Geografía', 'geografia'),
(40, 'Ing. Agropecuario', 'ing-agropecuario'),
(41, 'Hotelería', 'hoteleria'),
(42, 'Call Center', 'call-center'),
(43, 'Ing. Aerospacial', 'ing-aerospacial'),
(44, 'Ing. Industrial', 'ing-industrial'),
(45, 'Ing. Eléctrica', 'ing-electrica'),
(46, 'Ing. Electrónica', 'ing-electronica'),
(47, 'Ing. Hidraúlica', 'ing-hidraulica'),
(48, 'Ing. Informática', 'ing-informatica'),
(49, 'Ing. Naval', 'ing-naval'),
(50, 'Ing. Obras Civiles/Construcción', 'ing-obras-civiles-construccion'),
(51, 'Ing. Química', 'ing-quimica'),
(52, 'Ing. Sonido', 'ing-sonido'),
(53, 'Ing. Transporte', 'ing-transporte'),
(54, 'Medicina', 'medicina'),
(55, 'Matemáticas', 'matematicas'),
(56, 'Música', 'musica'),
(57, 'Odontología', 'odontologia'),
(58, 'Periodismo', 'periodismo'),
(59, 'Comunicación Social', 'comunicacion-social'),
(60, 'Publicidad', 'publicidad'),
(61, 'Química', 'quimica'),
(62, 'Relaciones Públicas', 'relaciones-publicas'),
(63, 'Secretariado', 'secretariado'),
(64, 'Sociología', 'sociologia'),
(65, 'Trabajo Social', 'trabajo-social'),
(66, 'Turismo', 'turismo'),
(67, 'Veterinaria', 'veterinaria'),
(68, 'Ing. Ambiental', 'ing-ambiental'),
(69, 'Ing. Matemática', 'ing-matematica'),
(70, 'Ing. Mecánica/Metalúrgica', 'ing-mecanica-metalurgica'),
(71, 'Ing. en Sistemas', 'ing-en-sistemas'),
(72, 'Ing. en Minas', 'ing-en-minas'),
(73, 'Acuicultura', 'acuicultura'),
(74, 'Adm. y Gestión Pública', 'adm-y-gestion-publica'),
(75, 'Agronegocios', 'agronegocios'),
(76, 'Análisis de Sistemas', 'analisis-de-sistemas'),
(77, 'Antropología', 'antropologia'),
(78, 'Arqueología', 'arqueologia'),
(79, 'Astronomía', 'astronomia'),
(80, 'Cartografía', 'cartografia'),
(81, 'Comercio Int./Ext.', 'comercio-int-ext'),
(82, 'Comunicación Audiovisual', 'comunicacion-audiovisual'),
(83, 'Dibujo Técnico', 'dibujo-tecnico'),
(84, 'Diseño Industrial', 'diseno-industrial'),
(85, 'Diseño de Vestuario / Textil / Modas', 'diseno-de-vestuario-textil-modas'),
(86, 'Ecología', 'ecologia'),
(87, 'Ing. Alimentos', 'ing-alimentos'),
(88, 'Ing. Forestal', 'ing-forestal'),
(89, 'Ing. Pesquera / Cultivos Marinos', 'ing-pesquera-cultivos-marinos'),
(90, 'Literatura', 'literatura'),
(91, 'Nutrición', 'nutricion'),
(92, 'Oceanografía', 'oceanografia'),
(93, 'Paisajismo', 'paisajismo'),
(94, 'Programación', 'programacion'),
(95, 'Bibliotecología', 'bibliotecologia'),
(96, 'Bioquímica', 'bioquimica'),
(97, 'Electrónica', 'electronica'),
(98, 'Ing. Telecomunicaciones', 'ing-telecomunicaciones'),
(99, 'Laboratorio (Mecánica) Dental', 'laboratorio-mecanica-dental'),
(100, 'Mecánica / Metalúrgica', 'mecanica-metalurgica'),
(101, 'Relaciones Internac.', 'relaciones-internac'),
(102, 'Seguridad Industrial', 'seguridad-industrial'),
(103, 'Terapia Ocupacional', 'terapia-ocupacional'),
(104, 'Electricidad', 'electricidad'),
(105, 'Estadística', 'estadistica'),
(106, 'Farmacia', 'farmacia'),
(107, 'Finanzas', 'finanzas'),
(108, 'Ingeniero vial', 'ingeniero-vial'),
(109, 'Gastronomía / Cocina', 'gastronomia-cocina'),
(110, 'Geología / Geomensura / Topografía', 'geologia-geomensura-topografia'),
(111, 'Hidráulica', 'hidraulica'),
(112, 'Ingeniero en construcción', 'ingeniero-en-construccion'),
(113, 'Enología', 'enologia'),
(114, 'Ing. Petróleo', 'ing-petroleo'),
(115, 'Marketing / Comercialización', 'marketing-comercializacion'),
(116, 'Medio Ambiente', 'medio-ambiente'),
(117, 'Minería / Petróleo / Gas', 'mineria-petroleo-gas'),
(118, 'Psicología', 'psicologia'),
(119, 'Psicopedagogía', 'psicopedagogia'),
(120, 'Recursos Humanos / Relac. Ind.', 'recursos-humanos-relac-ind'),
(121, 'Tecnología Médica / Laboratorio', 'tecnologia-medica-laboratorio'),
(122, 'Telecomunicaciones', 'telecomunicaciones'),
(123, 'Traducción ', 'traduccion'),
(124, 'Transporte', 'transporte'),
(125, 'Bachiller', 'bachiller'),
(126, 'Educacion', 'educacion'),
(127, 'Maestro Mayor de Obras', 'maestro-mayor-de-obras'),
(128, 'Perito Mercantil', 'perito-mercantil'),
(129, 'Tecnico', 'tecnico'),
(130, 'Ing. Agrónomo', 'ing-agronomo'),
(131, 'Ing. en Materiales', 'ing-en-materiales'),
(132, 'Fonoaudiologia', 'fonoaudiologia'),
(133, 'Diseño de Imagen y Sonido', 'diseno-de-imagen-y-sonido'),
(134, 'Ciencias del Ejercicio / Educacion Física', 'ciencias-del-ejercicio-educacion-fisica'),
(135, 'Actuaría', 'actuaria'),
(136, 'BioFisica', 'biofisica'),
(137, 'Otra', 'otra'),
(138, 'Ing. - otros', 'ing-otros'),
(139, 'Procesos / Calidad Total', 'procesos-calidad-total'),
(140, 'Biotecnología', 'biotecnologia'),
(141, 'Agrimensor', 'agrimensor'),
(142, 'Ing. Recursos Hídricos', 'ing-recursos-hidricos'),
(143, 'Bioingeniería', 'bioingenieria'),
(144, 'Kinesiología', 'kinesiologia'),
(145, 'Escribanía', 'escribania');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_areas_sectores`
--

CREATE TABLE `tbl_areas_sectores` (
  `id` int(11) NOT NULL,
  `id_area` int(11) DEFAULT NULL,
  `nombre` varchar(64) DEFAULT NULL,
  `amigable` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_areas_sectores`
--

INSERT INTO `tbl_areas_sectores` (`id`, `id_area`, `nombre`, `amigable`) VALUES
(1, 2, 'Apoderado Aduanal', 'apoderado-aduanal'),
(2, 2, 'Compras Internacionales/Importación', 'compras-internacionales-importacion'),
(3, 2, 'Consultorías Comercio Exterior', 'consultorias-comercio-exterior'),
(4, 2, 'Ventas Internacionales/Exportación', 'ventas-internacionales-exportacion'),
(5, 1, 'Administración', 'administracion'),
(6, 1, 'Análisis de Riesgos', 'analisis-de-riesgos'),
(7, 1, 'Auditoría', 'auditoria'),
(8, 1, 'Clearing', 'clearing'),
(9, 1, 'Consultoria', 'consultoria'),
(10, 1, 'Contabilidad', 'contabilidad'),
(11, 1, 'Control de Gestión', 'control-de-gestion'),
(12, 1, 'Corporate Finance / Banca Inversión', 'corporate-finance-banca-inversion'),
(13, 1, 'Créditos y Cobranzas', 'creditos-y-cobranzas'),
(14, 1, 'Cuentas Corrientes', 'cuentas-corrientes'),
(15, 1, 'Evaluación Económica', 'evaluacion-economica'),
(16, 1, 'Facturación', 'facturacion'),
(17, 1, 'Finanzas', 'finanzas'),
(18, 1, 'Finanzas Internacionales', 'finanzas-internacionales'),
(19, 1, 'Impuestos', 'impuestos'),
(20, 1, 'Inversiones / Proyectos de Inversión', 'inversiones-proyectos-de-inversion'),
(21, 1, 'Mercado de Capitales', 'mercado-de-capitales'),
(22, 1, 'Organización y Métodos', 'organizacion-y-metodos'),
(23, 1, 'Planeamiento económico-financiero', 'planeamiento-economico-financiero'),
(24, 1, 'Tesorería', 'tesoreria'),
(25, 4, 'Arquitectura', 'arquitectura'),
(26, 4, 'Construcción', 'construccion'),
(27, 4, 'Dirección de Obra', 'direccion-de-obra'),
(28, 4, 'Ingeniería Civil', 'ingenieria-civil'),
(29, 4, 'Instrumentación', 'instrumentacion'),
(30, 4, 'Operaciones', 'operaciones'),
(31, 4, 'Seguridad e Higiene', 'seguridad-e-higiene'),
(32, 4, 'Topografía', 'topografia'),
(33, 4, 'Urbanismo', 'urbanismo'),
(34, 3, 'Abastecimiento', 'abastecimiento'),
(35, 3, 'Almacén / Depósito / Expedición', 'almacen-deposito-expedicion'),
(36, 3, 'Asistente de Tráfico', 'asistente-de-trafico'),
(37, 3, 'Compras', 'compras'),
(38, 3, 'Distribución', 'distribucion'),
(39, 3, 'Logística', 'logistica'),
(40, 3, 'Transporte', 'transporte'),
(41, 5, 'Comercial', 'comercial'),
(42, 5, 'Comercio Exterior', 'comercio-exterior'),
(43, 5, 'Desarrollo de Negocios', 'desarrollo-de-negocios'),
(44, 5, 'Negocios Internacionales', 'negocios-internacionales'),
(45, 5, 'Planeamiento comercial', 'planeamiento-comercial'),
(46, 5, 'Ventas', 'ventas'),
(47, 6, 'Bienestar Estudiantil', 'bienestar-estudiantil'),
(48, 6, 'Educación', 'educacion'),
(49, 6, 'Educación especial', 'educacion-especial'),
(50, 6, 'Educación/ Docentes', 'educacion-docentes'),
(51, 6, 'Idiomas', 'idiomas'),
(52, 6, 'Investigación y Desarrollo', 'investigacion-y-desarrollo'),
(53, 6, 'Psicopedagogía', 'psicopedagogia'),
(54, 7, 'Camareros', 'camareros'),
(55, 7, 'Casinos', 'casinos'),
(56, 7, 'Gastronomia', 'gastronomia'),
(57, 7, 'Hotelería', 'hoteleria'),
(58, 7, 'Turismo', 'turismo'),
(59, 8, 'Dirección', 'direccion'),
(60, 8, 'Gerencia / Dirección General', 'gerencia-direccion-general'),
(61, 9, 'Asesoría Legal Internacional', 'asesoria-legal-internacional'),
(62, 9, 'Garantías', 'garantias'),
(63, 9, 'Legal', 'legal'),
(64, 10, 'Business Intelligence', 'business-intelligence'),
(65, 10, 'Community Management', 'community-management'),
(66, 10, 'Creatividad', 'creatividad'),
(67, 10, 'E-commerce', 'e-commerce'),
(68, 10, 'Marketing', 'marketing'),
(69, 10, 'Media Planning', 'media-planning'),
(70, 10, 'Mercadotecnia Internacional', 'mercadotecnia-internacional'),
(71, 10, 'Multimedia', 'multimedia'),
(72, 10, 'Producto', 'producto'),
(73, 11, 'Calidad', 'calidad'),
(74, 11, 'Mantenimiento', 'mantenimiento'),
(75, 11, 'Producción', 'produccion'),
(76, 11, 'Programación de producción', 'programacion-de-produccion'),
(77, 12, 'Administración de Personal', 'administracion-de-personal'),
(78, 12, 'Capacitación', 'capacitacion'),
(79, 12, 'Capacitación Comercio Exterior', 'capacitacion-comercio-exterior'),
(80, 12, 'Compensación y Planilla', 'compensacion-y-planilla'),
(81, 12, 'Recursos Humanos', 'recursos-humanos'),
(82, 12, 'Selección', 'seleccion'),
(83, 14, 'Administración de Base de Datos', 'administracion-de-base-de-datos'),
(84, 14, 'Análisis Funcional', 'analisis-funcional'),
(85, 14, 'Data Entry', 'data-entry'),
(86, 14, 'Data Warehousing', 'data-warehousing'),
(87, 14, 'Infraestructura', 'infraestructura'),
(88, 14, 'Internet', 'internet'),
(89, 14, 'Liderazgo de Proyecto', 'liderazgo-de-proyecto'),
(90, 14, 'Programación', 'programacion'),
(91, 14, 'Redes', 'redes'),
(92, 14, 'Seguridad Informática', 'seguridad-informatica'),
(93, 14, 'Sistemas', 'sistemas'),
(94, 14, 'Soporte Técnico', 'soporte-tecnico'),
(95, 14, 'Tecnologia / Sistemas', 'tecnologia-sistemas'),
(96, 14, 'Tecnologías de la Información', 'tecnologias-de-la-informacion'),
(97, 14, 'Telecomunicaciones', 'telecomunicaciones'),
(98, 14, 'Testing / QA / QC', 'testing-qa-qc'),
(99, 13, 'Comunicacion', 'comunicacion'),
(100, 13, 'Comunicaciones Externas', 'comunicaciones-externas'),
(101, 13, 'Comunicaciones Internas', 'comunicaciones-internas'),
(102, 13, 'Periodismo', 'periodismo'),
(103, 13, 'Relaciones Institucionales/Publicas', 'relaciones-institucionales-publicas'),
(104, 13, 'Responsabilidad Social', 'responsabilidad-social'),
(105, 15, 'Aeropuertos', 'aeropuertos'),
(106, 15, 'Arte y Cultura', 'arte-y-cultura'),
(107, 15, 'Back Office', 'back-office'),
(108, 15, 'Cadetería', 'cadeteria'),
(109, 15, 'Caja', 'caja'),
(110, 15, 'Estética y Cuidado Personal', 'estetica-y-cuidado-personal'),
(111, 15, 'Independientes', 'independientes'),
(112, 15, 'Jóvenes Profesionales', 'jovenes-profesionales'),
(113, 15, 'Mantenimiento y Limpieza', 'mantenimiento-y-limpieza'),
(114, 15, 'Oficios y Profesiones', 'oficios-y-profesiones'),
(115, 15, 'Otros', 'otros'),
(116, 15, 'Packaging', 'packaging'),
(117, 15, 'Pasantía / Trainee', 'pasantia-trainee'),
(118, 15, 'Planeamiento', 'planeamiento'),
(119, 15, 'Promotoras/es', 'promotoras-es'),
(120, 15, 'Prácticas Profesionales', 'practicas-profesionales'),
(121, 15, 'Seguridad', 'seguridad'),
(122, 15, 'Servicios', 'servicios'),
(123, 15, 'Trabajo Social', 'trabajo-social'),
(124, 15, 'Traduccion', 'traduccion'),
(125, 15, 'Transporte', 'transporte'),
(126, 17, 'Atención al Cliente', 'atencion-al-cliente'),
(127, 17, 'Call Center', 'call-center'),
(128, 17, 'Telemarketing', 'telemarketing'),
(129, 16, 'Bioquímica', 'bioquimica'),
(130, 16, 'Farmacéutica', 'farmaceutica'),
(131, 16, 'Laboratorio', 'laboratorio'),
(132, 16, 'Medicina', 'medicina'),
(133, 16, 'Química', 'quimica'),
(134, 16, 'Salud', 'salud'),
(135, 16, 'Veterinaria', 'veterinaria'),
(136, 18, 'Asistente', 'asistente'),
(137, 18, 'Recepcionista', 'recepcionista'),
(138, 18, 'Secretaria', 'secretaria'),
(139, 18, 'Telefonista', 'telefonista'),
(140, 19, 'Administracion de Seguros', 'administracion-de-seguros'),
(141, 19, 'Auditoría de Seguros', 'auditoria-de-seguros'),
(142, 19, 'Seguros', 'seguros'),
(143, 19, 'Tecnico de Seguros', 'tecnico-de-seguros'),
(144, 19, 'Venta de Seguros', 'venta-de-seguros'),
(145, 20, 'Exploración Minera y Petroquimica', 'exploracion-minera-y-petroquimica'),
(146, 20, 'Ingeniería Geológica', 'ingenieria-geologica'),
(147, 20, 'Ingeniería en Minas', 'ingenieria-en-minas'),
(148, 20, 'Ingeniería en Petróleo y Petroquímica', 'ingenieria-en-petroleo-y-petroquimica'),
(149, 20, 'Instrumentación Minera', 'instrumentacion-minera'),
(150, 20, 'Medio Ambiente', 'medio-ambiente'),
(151, 20, 'Mineria/Petroleo/Gas', 'mineria-petroleo-gas'),
(152, 20, 'Seguridad Industrial', 'seguridad-industrial'),
(153, 21, 'Ingeniería  Automotriz', 'ingenieria-automotriz'),
(154, 21, 'Ingeniería  Eléctrica y Electrónica', 'ingenieria-electrica-y-electronica'),
(155, 21, 'Ingeniería  Industrial', 'ingenieria-industrial'),
(156, 21, 'Ingeniería  Mecánica', 'ingenieria-mecanica'),
(157, 21, 'Ingeniería  Metalurgica', 'ingenieria-metalurgica'),
(158, 21, 'Ingeniería  Textil', 'ingenieria-textil'),
(159, 21, 'Ingeniería Agrónoma', 'ingenieria-agronoma'),
(160, 21, 'Ingeniería Electromecánica', 'ingenieria-electromecanica'),
(161, 21, 'Ingeniería Oficina Técnica / Proyecto', 'ingenieria-oficina-tecnica-proyecto'),
(162, 21, 'Ingeniería Química', 'ingenieria-quimica'),
(163, 21, 'Ingeniería de Procesos', 'ingenieria-de-procesos'),
(164, 21, 'Ingeniería de Producto', 'ingenieria-de-producto'),
(165, 21, 'Ingeniería de Ventas', 'ingenieria-de-ventas'),
(166, 21, 'Ingeniería en Alimentos', 'ingenieria-en-alimentos'),
(167, 21, 'Otras Ingenierias', 'otras-ingenierias'),
(168, 22, 'Diseño', 'diseno'),
(169, 22, 'Diseño Gráfico', 'diseno-grafico'),
(170, 22, 'Diseño Industrial', 'diseno-industrial'),
(171, 22, 'Diseño Multimedia', 'diseno-multimedia'),
(172, 22, 'Diseño Textil e Indumentaria', 'diseno-textil-e-indumentaria'),
(173, 22, 'Diseño Web', 'diseno-web'),
(174, 22, 'Diseño de Interiores / Decoración', 'diseno-de-interiores-decoracion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_candidatos_educacion`
--

CREATE TABLE `tbl_candidatos_educacion` (
  `id` int(11) NOT NULL,
  `id_trabajador` int(11) NOT NULL,
  `id_nivel_estudio` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `id_estado_estudio` int(11) NOT NULL,
  `id_area_estudio` int(11) NOT NULL,
  `nombre_institucion` varchar(255) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `mes_inicio` int(11) NOT NULL,
  `ano_inicio` int(11) NOT NULL,
  `mes_finalizacion` int(11) NOT NULL,
  `ano_finalizacion` int(11) NOT NULL,
  `materias_carrera` int(11) NOT NULL,
  `materias_aprobadas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_candidatos_hijos`
--

CREATE TABLE `tbl_candidatos_hijos` (
  `id` int(11) NOT NULL,
  `id_candidato` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `id_sexo` int(11) NOT NULL,
  `fecha_nac` date NOT NULL,
  `discapacidad` smallint(6) NOT NULL,
  `tmp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_candidatos_puntuacion`
--

CREATE TABLE `tbl_candidatos_puntuacion` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_candidato_calificaciones`
--

CREATE TABLE `tbl_candidato_calificaciones` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `calificacion` smallint(6) NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_candidato_cv_fisico`
--

CREATE TABLE `tbl_candidato_cv_fisico` (
  `id` int(11) NOT NULL,
  `archivo` varchar(50) NOT NULL,
  `mostrar` smallint(6) NOT NULL,
  `tmp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_candidato_datos_personales`
--

CREATE TABLE `tbl_candidato_datos_personales` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(65) NOT NULL,
  `apellido` varchar(65) NOT NULL,
  `fecha_nac` date NOT NULL,
  `id_sexo` int(11) NOT NULL,
  `id_nacionalidad` int(11) NOT NULL,
  `DNI` varchar(20) NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_candidato_experiencia_laboral`
--

CREATE TABLE `tbl_candidato_experiencia_laboral` (
  `id` int(11) NOT NULL,
  `nombre_empresa` varchar(60) NOT NULL,
  `desde` date NOT NULL,
  `hasta` date NOT NULL,
  `id_sector` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_candidato_foto_perfil`
--

CREATE TABLE `tbl_candidato_foto_perfil` (
  `id` int(11) NOT NULL,
  `id_candidato` int(11) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_candidato_info_contacto`
--

CREATE TABLE `tbl_candidato_info_contacto` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `id_localidad` int(11) NOT NULL,
  `barrio` varchar(50) NOT NULL,
  `n_habitacion` varchar(30) NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categoria_pregunta`
--

CREATE TABLE `tbl_categoria_pregunta` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_configuracion_sistema`
--

CREATE TABLE `tbl_configuracion_sistema` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_idioma` int(11) NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_conversacion_soporte`
--

CREATE TABLE `tbl_conversacion_soporte` (
  `id` int(11) NOT NULL,
  `id_tikect` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_tipo_mensaje` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_denuncias`
--

CREATE TABLE `tbl_denuncias` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_oferta` int(11) NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_disponibilidad`
--

CREATE TABLE `tbl_disponibilidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa`
--

CREATE TABLE `tbl_empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresas_pagos`
--

CREATE TABLE `tbl_empresas_pagos` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `informacion` text,
  `plan` int(11) DEFAULT NULL,
  `servicio` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa_calificacion`
--

CREATE TABLE `tbl_empresa_calificacion` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `tmp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa_puntuacion`
--

CREATE TABLE `tbl_empresa_puntuacion` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa_seguidores`
--

CREATE TABLE `tbl_empresa_seguidores` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `tmp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estados_civiles`
--

CREATE TABLE `tbl_estados_civiles` (
  `id` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estatus_soporte`
--

CREATE TABLE `tbl_estatus_soporte` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `tmp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estatus_usuario`
--

CREATE TABLE `tbl_estatus_usuario` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `id` int(11) NOT NULL,
  `id_categoria_pregunta` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `descripcion` text NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_idiomas`
--

CREATE TABLE `tbl_idiomas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `amigable` varchar(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_localidades`
--

CREATE TABLE `tbl_localidades` (
  `id` int(11) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `localidad` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_membresias`
--

CREATE TABLE `tbl_membresias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(64) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `moneda` varchar(16) DEFAULT NULL,
  `logo_home` tinyint(1) DEFAULT NULL,
  `curriculos_disponibles` int(11) DEFAULT NULL,
  `filtros_personalizados` tinyint(1) DEFAULT NULL,
  `link_empresa` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_nivel_estudio`
--

CREATE TABLE `tbl_nivel_estudio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_nivel_idioma`
--

CREATE TABLE `tbl_nivel_idioma` (
  `id` int(11) NOT NULL,
  `nombre` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_planes`
--

CREATE TABLE `tbl_planes` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `valor` double NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_provincias`
--

CREATE TABLE `tbl_provincias` (
  `id` int(10) NOT NULL,
  `provincia` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_provincias_localidades`
--

CREATE TABLE `tbl_provincias_localidades` (
  `id` int(11) NOT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  `id_localidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_publicacion`
--

CREATE TABLE `tbl_publicacion` (
  `id` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `id_sector` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `id_rango_salario` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `vistos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sectores`
--

CREATE TABLE `tbl_sectores` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ticket_soporte`
--

CREATE TABLE `tbl_ticket_soporte` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria_soporte` int(11) NOT NULL,
  `estatus` int(11) NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_mensaje`
--

CREATE TABLE `tbl_tipo_mensaje` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(15) NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_usuario`
--

CREATE TABLE `tbl_tipo_usuario` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `tmp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tokens`
--

CREATE TABLE `tbl_tokens` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `token` varchar(65) NOT NULL,
  `tmp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `correo` int(11) NOT NULL,
  `clave` int(11) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `token` varchar(70) NOT NULL,
  `id_estatus` int(11) NOT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_actividades_empresa`
--
ALTER TABLE `tbl_actividades_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_alertas`
--
ALTER TABLE `tbl_alertas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_areas`
--
ALTER TABLE `tbl_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_areas_estudio`
--
ALTER TABLE `tbl_areas_estudio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_areas_sectores`
--
ALTER TABLE `tbl_areas_sectores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_candidatos_educacion`
--
ALTER TABLE `tbl_candidatos_educacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trabajadores_educacion_fk` (`id_trabajador`);

--
-- Indices de la tabla `tbl_candidatos_hijos`
--
ALTER TABLE `tbl_candidatos_hijos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_candidatos_puntuacion`
--
ALTER TABLE `tbl_candidatos_puntuacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_candidato_calificaciones`
--
ALTER TABLE `tbl_candidato_calificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_candidato_cv_fisico`
--
ALTER TABLE `tbl_candidato_cv_fisico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_candidato_datos_personales`
--
ALTER TABLE `tbl_candidato_datos_personales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_candidato_experiencia_laboral`
--
ALTER TABLE `tbl_candidato_experiencia_laboral`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_candidato_foto_perfil`
--
ALTER TABLE `tbl_candidato_foto_perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_candidato_info_contacto`
--
ALTER TABLE `tbl_candidato_info_contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_categoria_pregunta`
--
ALTER TABLE `tbl_categoria_pregunta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_configuracion_sistema`
--
ALTER TABLE `tbl_configuracion_sistema`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_conversacion_soporte`
--
ALTER TABLE `tbl_conversacion_soporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_denuncias`
--
ALTER TABLE `tbl_denuncias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_disponibilidad`
--
ALTER TABLE `tbl_disponibilidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_empresas_pagos`
--
ALTER TABLE `tbl_empresas_pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `tbl_empresa_puntuacion`
--
ALTER TABLE `tbl_empresa_puntuacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_empresa_seguidores`
--
ALTER TABLE `tbl_empresa_seguidores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_estatus_soporte`
--
ALTER TABLE `tbl_estatus_soporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_estatus_usuario`
--
ALTER TABLE `tbl_estatus_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_idiomas`
--
ALTER TABLE `tbl_idiomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_localidades`
--
ALTER TABLE `tbl_localidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `localidad` (`localidad`);

--
-- Indices de la tabla `tbl_membresias`
--
ALTER TABLE `tbl_membresias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_nivel_estudio`
--
ALTER TABLE `tbl_nivel_estudio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_nivel_idioma`
--
ALTER TABLE `tbl_nivel_idioma`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_planes`
--
ALTER TABLE `tbl_planes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_provincias`
--
ALTER TABLE `tbl_provincias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_provincias_localidades`
--
ALTER TABLE `tbl_provincias_localidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_publicacion`
--
ALTER TABLE `tbl_publicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_sectores`
--
ALTER TABLE `tbl_sectores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_ticket_soporte`
--
ALTER TABLE `tbl_ticket_soporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_tipo_mensaje`
--
ALTER TABLE `tbl_tipo_mensaje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_tipo_usuario`
--
ALTER TABLE `tbl_tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_tokens`
--
ALTER TABLE `tbl_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_actividades_empresa`
--
ALTER TABLE `tbl_actividades_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT de la tabla `tbl_alertas`
--
ALTER TABLE `tbl_alertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_areas`
--
ALTER TABLE `tbl_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `tbl_areas_estudio`
--
ALTER TABLE `tbl_areas_estudio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT de la tabla `tbl_areas_sectores`
--
ALTER TABLE `tbl_areas_sectores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;
--
-- AUTO_INCREMENT de la tabla `tbl_candidatos_educacion`
--
ALTER TABLE `tbl_candidatos_educacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_candidatos_hijos`
--
ALTER TABLE `tbl_candidatos_hijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_candidatos_puntuacion`
--
ALTER TABLE `tbl_candidatos_puntuacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_candidato_calificaciones`
--
ALTER TABLE `tbl_candidato_calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_candidato_cv_fisico`
--
ALTER TABLE `tbl_candidato_cv_fisico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_candidato_datos_personales`
--
ALTER TABLE `tbl_candidato_datos_personales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_candidato_experiencia_laboral`
--
ALTER TABLE `tbl_candidato_experiencia_laboral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_candidato_info_contacto`
--
ALTER TABLE `tbl_candidato_info_contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_categoria_pregunta`
--
ALTER TABLE `tbl_categoria_pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_configuracion_sistema`
--
ALTER TABLE `tbl_configuracion_sistema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_conversacion_soporte`
--
ALTER TABLE `tbl_conversacion_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_denuncias`
--
ALTER TABLE `tbl_denuncias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_disponibilidad`
--
ALTER TABLE `tbl_disponibilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_empresas_pagos`
--
ALTER TABLE `tbl_empresas_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_empresa_puntuacion`
--
ALTER TABLE `tbl_empresa_puntuacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_empresa_seguidores`
--
ALTER TABLE `tbl_empresa_seguidores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_estatus_soporte`
--
ALTER TABLE `tbl_estatus_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_estatus_usuario`
--
ALTER TABLE `tbl_estatus_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_idiomas`
--
ALTER TABLE `tbl_idiomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_localidades`
--
ALTER TABLE `tbl_localidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_membresias`
--
ALTER TABLE `tbl_membresias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_nivel_estudio`
--
ALTER TABLE `tbl_nivel_estudio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_nivel_idioma`
--
ALTER TABLE `tbl_nivel_idioma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_planes`
--
ALTER TABLE `tbl_planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_provincias`
--
ALTER TABLE `tbl_provincias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_provincias_localidades`
--
ALTER TABLE `tbl_provincias_localidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_publicacion`
--
ALTER TABLE `tbl_publicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_sectores`
--
ALTER TABLE `tbl_sectores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_ticket_soporte`
--
ALTER TABLE `tbl_ticket_soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_mensaje`
--
ALTER TABLE `tbl_tipo_mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_usuario`
--
ALTER TABLE `tbl_tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_tokens`
--
ALTER TABLE `tbl_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

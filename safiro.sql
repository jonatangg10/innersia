-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2023 a las 05:31:42
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `safiro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `codigoCiudad` int(4) NOT NULL,
  `codigoDepartamento` int(2) NOT NULL,
  `nombreCiudad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`codigoCiudad`, `codigoDepartamento`, `nombreCiudad`) VALUES
(5001, 5, 'MEDELLÍN'),
(5002, 5, 'ABEJORRAL'),
(5004, 5, 'ABRIAQUÍ'),
(5021, 5, 'ALEJANDRÍA'),
(5030, 5, 'AMAGa'),
(5031, 5, 'AMALFI'),
(5034, 5, 'ANDES'),
(5036, 5, 'ANGELOPOLIS'),
(5038, 5, 'ANGOSTURA'),
(5040, 5, 'ANORÍ'),
(5042, 5, 'SANTAFÉ DE ANTIOQUIA'),
(5044, 5, 'ANZA'),
(5045, 5, 'APARTADÓ'),
(5051, 5, 'ARBOLETES'),
(5055, 5, 'ARGELIA'),
(5059, 5, 'ARMENIA'),
(5079, 5, 'BARBOSA'),
(5086, 5, 'BELMIRA'),
(5088, 5, 'BELLO'),
(5091, 5, 'BETANIA'),
(5093, 5, 'BETULIA'),
(5101, 5, 'CIUDAD BOLÍVAR'),
(5107, 5, 'BRICEÑO'),
(5113, 5, 'BURITICÁ'),
(5120, 5, 'CÁCERES'),
(5125, 5, 'CAICEDO'),
(5129, 5, 'CALDAS'),
(5134, 5, 'CAMPAMENTO'),
(5138, 5, 'CAÑASGORDAS'),
(5142, 5, 'CARACOLÍ'),
(5145, 5, 'CARAMANTA'),
(5147, 5, 'CAREPA'),
(5148, 5, 'CARMEN DE VIBORAL'),
(5150, 5, 'CAROLINA'),
(5154, 5, 'CAUCASIA'),
(5172, 5, 'CHIGORODÓ'),
(5190, 5, 'CISNEROS'),
(5197, 5, 'COCORNÁ'),
(5206, 5, 'CONCEPCIÓN'),
(5209, 5, 'CONCORDIA'),
(5212, 5, 'COPACABANA'),
(5234, 5, 'DABEIBA'),
(5237, 5, 'DON MATiAS'),
(5240, 5, 'EBÉJICO'),
(5250, 5, 'EL BAGRE'),
(5264, 5, 'ENTRERRIOS'),
(5266, 5, 'ENVIGADO'),
(5282, 5, 'FREDONIA'),
(5284, 5, 'FRONTINO'),
(5306, 5, 'GIRALDO'),
(5308, 5, 'GIRARDOTA'),
(5310, 5, 'GÓMEZ PLATA'),
(5313, 5, 'GRANADA'),
(5315, 5, 'GUADALUPE'),
(5318, 5, 'GUARNE'),
(5321, 5, 'GUATAPE'),
(5347, 5, 'HELICONIA'),
(5353, 5, 'HISPANIA'),
(5360, 5, 'ITAGUI'),
(5361, 5, 'ITUANGO'),
(5364, 5, 'JARDÍN'),
(5368, 5, 'JERICÓ'),
(5376, 5, 'LA CEJA'),
(5380, 5, 'LA ESTRELLA'),
(5390, 5, 'LA PINTADA'),
(5400, 5, 'LA UNIÓN'),
(5411, 5, 'LIBORINA'),
(5425, 5, 'MACEO'),
(5440, 5, 'MARINILLA'),
(5467, 5, 'MONTEBELLO'),
(5475, 5, 'MURINDÓ'),
(5480, 5, 'MUTATA'),
(5483, 5, 'NARIÑO'),
(5490, 5, 'NECOCLÍ'),
(5495, 5, 'NECHÍ'),
(5501, 5, 'OLAYA'),
(5541, 5, 'PEÑOL'),
(5543, 5, 'PEQUE'),
(5576, 5, 'PUEBLORRICO'),
(5579, 5, 'PUERTO BERRiO'),
(5585, 5, 'PUERTO NARE'),
(5591, 5, 'PUERTO TRIUNFO'),
(5604, 5, 'REMEDIOS'),
(5607, 5, 'RETIRO'),
(5615, 5, 'RIONEGRO'),
(5628, 5, 'SABANALARGA'),
(5631, 5, 'SABANETA'),
(5642, 5, 'SALGAR'),
(5647, 5, 'SAN ANDRÉS'),
(5649, 5, 'SAN CARLOS'),
(5652, 5, 'SAN FRANCISCO'),
(5656, 5, 'SAN JERÓNIMO'),
(5658, 5, 'SAN JOSÉ DE LA MONTAÑA'),
(5659, 5, 'SAN JUAN DE URABA'),
(5660, 5, 'SAN LUIS'),
(5664, 5, 'SAN PEDRO'),
(5665, 5, 'SAN PEDRO DE URABA'),
(5667, 5, 'SAN RAFAEL'),
(5670, 5, 'SAN ROQUE'),
(5674, 5, 'SAN VICENTE'),
(5679, 5, 'SANTA BaRBARA'),
(5686, 5, 'SANTA ROSA de osos'),
(5690, 5, 'SANTO DOMINGO'),
(5697, 5, 'SANTUARIO'),
(5736, 5, 'SEGOVIA'),
(5756, 5, 'SONSON'),
(5761, 5, 'SOPETRaN'),
(5789, 5, 'TÁMESIS'),
(5790, 5, 'TARAZÁ'),
(5792, 5, 'TARSO'),
(5809, 5, 'TITIRIBÍ'),
(5819, 5, 'TOLEDO'),
(5837, 5, 'TURBO'),
(5842, 5, 'URAMITA'),
(5847, 5, 'URRAO'),
(5854, 5, 'VALDIVIA'),
(5856, 5, 'VALPARAISO'),
(5858, 5, 'VEGACHÍ'),
(5861, 5, 'VENECIA'),
(5873, 5, 'VIGÍA DEL FUERTE'),
(5885, 5, 'YALÍ'),
(5887, 5, 'YARUMAL'),
(5890, 5, 'YOLOMBÓ'),
(5893, 5, 'YONDÓ'),
(5895, 5, 'ZARAGOZA'),
(8001, 8, 'BARRANQUILLA'),
(8078, 8, 'BARANOA'),
(8137, 8, 'CAMPO DE LA CRUZ'),
(8141, 8, 'CANDELARIA'),
(8296, 8, 'GALAPA'),
(8372, 8, 'JUAN DE ACOSTA'),
(8421, 8, 'LURUACO'),
(8433, 8, 'MALAMBO'),
(8436, 8, 'MANATi'),
(8520, 8, 'PALMAR DE VARELA'),
(8549, 8, 'PIOJÓ'),
(8558, 8, 'POLONUEVO'),
(8560, 8, 'PONEDERA'),
(8573, 8, 'PUERTO COLOMBIA'),
(8606, 8, 'REPELON'),
(8634, 8, 'Sabanagrande'),
(8638, 8, 'SABANALARGA'),
(8675, 8, 'SANTA LUCiA'),
(8685, 8, 'Santo Tomas'),
(8758, 8, 'SOLEDAD'),
(8770, 8, 'SUAN'),
(8832, 8, 'TUBARA'),
(8849, 8, 'USIACURi'),
(11001, 11, 'BOGOTA D.C.'),
(13001, 13, 'CARTAGENA'),
(13006, 13, 'ACHÍ'),
(13030, 13, 'ALTOS DEL ROSARIO'),
(13042, 13, 'ARENAL'),
(13052, 13, 'ARJONA'),
(13062, 13, 'ARROYOHONDO'),
(13074, 13, 'BARRANCO DE LOBA'),
(13140, 13, 'CALAMAR'),
(13160, 13, 'CANTAGALLO'),
(13188, 13, 'CICUCO'),
(13212, 13, 'CÓRDOBA'),
(13222, 13, 'CLEMENCIA'),
(13244, 13, 'CARMEN DE BOLÍVAR'),
(13248, 13, 'EL GUAMO'),
(13268, 13, 'EL PEÑON'),
(13300, 13, 'HATILLO DE LOBA'),
(13430, 13, 'MAGANGUÉ'),
(13433, 13, 'MAHATES'),
(13440, 13, 'MARGARITA'),
(13442, 13, 'MARÍA LA BAJA'),
(13458, 13, 'MONTECRISTO'),
(13468, 13, 'MOMPÓS'),
(13473, 13, 'MORALES'),
(13549, 13, 'PINILLOS'),
(13580, 13, 'REGIDOR'),
(13600, 13, 'RÍO VIEJO'),
(13620, 13, 'SAN CRISTOBAL'),
(13647, 13, 'SAN ESTANISLAO'),
(13650, 13, 'SAN FERNANDO'),
(13654, 13, 'SAN JACINTO'),
(13655, 13, 'SAN JACINTO DEL CAUCA'),
(13657, 13, 'SAN JUAN NEPOMUCENO'),
(13667, 13, 'SAN MARTIN DE LOBA'),
(13670, 13, 'SAN PABLO'),
(13673, 13, 'SANTA CATALINA'),
(13683, 13, 'SANTA ROSA DE LIMA'),
(13688, 13, 'SANTA ROSA DEL SUR'),
(13744, 13, 'SIMITÍ'),
(13760, 13, 'SOPLAVIENTO'),
(13780, 13, 'TALAIGUA NUEVO'),
(13810, 13, 'TIQUISIO'),
(13836, 13, 'TURBACO'),
(13838, 13, 'TURBANA'),
(13873, 13, 'VILLANUEVA'),
(13894, 13, 'ZAMBRANO'),
(15001, 15, 'TUNJA'),
(15022, 15, 'ALMEIDA'),
(15047, 15, 'AQUITANIA'),
(15051, 15, 'ARCABUCO'),
(15087, 15, 'BELÉN'),
(15090, 15, 'BERBEO'),
(15092, 15, 'BETÉITIVA'),
(15097, 15, 'BOAVITA'),
(15104, 15, 'BOYACÁ'),
(15106, 15, 'BRICEÑO'),
(15109, 15, 'BUENAVISTA'),
(15114, 15, 'BUSBANZÁ'),
(15131, 15, 'CALDAS'),
(15135, 15, 'CAMPOHERMOSO'),
(15162, 15, 'CERINZA'),
(15172, 15, 'CHINAVITA'),
(15176, 15, 'CHIQUINQUIRÁ'),
(15180, 15, 'CHISCAS'),
(15183, 15, 'CHITA'),
(15185, 15, 'CHITARAQUE'),
(15187, 15, 'CHIVATÁ'),
(15189, 15, 'CIÉNEGA'),
(15204, 15, 'CÓMBITA'),
(15212, 15, 'COPER'),
(15215, 15, 'CORRALES'),
(15218, 15, 'COVARACHÍA'),
(15223, 15, 'CUBARÁ'),
(15224, 15, 'CUCAITA'),
(15226, 15, 'CUÍTIVA'),
(15232, 15, 'CHÍQUIZA'),
(15236, 15, 'CHIVOR'),
(15238, 15, 'DUITAMA'),
(15244, 15, 'EL COCUY'),
(15248, 15, 'EL ESPINO'),
(15272, 15, 'FIRAVITOBA'),
(15276, 15, 'FLORESTA'),
(15293, 15, 'GACHANTIVÁ'),
(15296, 15, 'GAMEZA'),
(15299, 15, 'GARAGOA'),
(15317, 15, 'GUACAMAYAS'),
(15322, 15, 'GUATEQUE'),
(15325, 15, 'GUAYATÁ'),
(15332, 15, 'GÜICÁN'),
(15362, 15, 'IZA'),
(15367, 15, 'JENESANO'),
(15368, 15, 'JERICÓ'),
(15377, 15, 'LABRANZAGRANDE'),
(15380, 15, 'LA CAPILLA'),
(15401, 15, 'LA VICTORIA'),
(15403, 15, 'LA UVITA'),
(15407, 15, 'VILLA DE LEYVA'),
(15425, 15, 'MACANAL'),
(15442, 15, 'MARIPÍ'),
(15455, 15, 'MIRAFLORES'),
(15464, 15, 'MONGUA'),
(15466, 15, 'MONGUÍ'),
(15469, 15, 'MONIQUIRÁ'),
(15476, 15, 'MOTAVITA'),
(15480, 15, 'MUZO'),
(15491, 15, 'NOBSA'),
(15494, 15, 'NUEVO COLÓN'),
(15500, 15, 'OICATÁ'),
(15507, 15, 'OTANCHE'),
(15511, 15, 'PACHAVITA'),
(15514, 15, 'PÁEZ'),
(15516, 15, 'PAIPA'),
(15518, 15, 'PAJARITO'),
(15522, 15, 'PANQUEBA'),
(15531, 15, 'PAUNA'),
(15533, 15, 'PAYA'),
(15537, 15, 'PAZ DE RÍO'),
(15542, 15, 'PESCA'),
(15550, 15, 'PISBA'),
(15572, 15, 'PUERTO BOYACa'),
(15580, 15, 'QUÍPAMA'),
(15599, 15, 'RAMIRIQUÍ'),
(15600, 15, 'RÁQUIRA'),
(15621, 15, 'RONDÓN'),
(15632, 15, 'SABOYÁ'),
(15638, 15, 'SÁCHICA'),
(15646, 15, 'SAMACÁ'),
(15660, 15, 'SAN EDUARDO'),
(15664, 15, 'SAN JOSÉ DE PARE'),
(15667, 15, 'SAN LUIS DE GACENO'),
(15673, 15, 'SAN MATEO'),
(15676, 15, 'SAN MIGUEL DE SEMA'),
(15681, 15, 'SAN PABLO BORBUR'),
(15686, 15, 'SANTANA'),
(15690, 15, 'SANTA MARÍA'),
(15693, 15, 'SAN ROSA VITERBO'),
(15696, 15, 'SANTA SOFÍA'),
(15720, 15, 'SATIVANORTE'),
(15723, 15, 'SATIVASUR'),
(15740, 15, 'SIACHOQUE'),
(15753, 15, 'SOATÁ'),
(15755, 15, 'SOCOTÁ'),
(15757, 15, 'SOCHA'),
(15759, 15, 'SOGAMOSO'),
(15761, 15, 'SOMONDOCO'),
(15762, 15, 'SORA'),
(15763, 15, 'SOTAQUIRÁ'),
(15764, 15, 'SORACÁ'),
(15774, 15, 'SUSACÓN'),
(15776, 15, 'SUTAMARCHÁN'),
(15778, 15, 'SUTATENZA'),
(15790, 15, 'TASCO'),
(15798, 15, 'TENZA'),
(15804, 15, 'TIBANÁ'),
(15806, 15, 'TIBASOSA'),
(15808, 15, 'TINJACÁ'),
(15810, 15, 'TIPACOQUE'),
(15814, 15, 'TOCA'),
(15816, 15, 'TOGÜÍ'),
(15820, 15, 'TÓPAGA'),
(15822, 15, 'TOTA'),
(15832, 15, 'TUNUNGUÁ'),
(15835, 15, 'TURMEQUÉ'),
(15837, 15, 'TUTA'),
(15839, 15, 'TUTAZÁ'),
(15842, 15, 'UMBITA'),
(15861, 15, 'VENTAQUEMADA'),
(15879, 15, 'VIRACACHÁ'),
(15897, 15, 'ZETAQUIRA'),
(17001, 17, 'MANIZALES'),
(17013, 17, 'AGUADAS'),
(17042, 17, 'ANSERMA'),
(17050, 17, 'ARANZAZU'),
(17088, 17, 'BELALCÁZAR'),
(17174, 17, 'CHINCHINa'),
(17272, 17, 'FILADELFIA'),
(17380, 17, 'LA DORADA'),
(17388, 17, 'LA MERCED'),
(17433, 17, 'MANZANARES'),
(17442, 17, 'MARMATO'),
(17444, 17, 'MARQUETALIA'),
(17446, 17, 'MARULANDA'),
(17486, 17, 'NEIRA'),
(17495, 17, 'NORCASIA'),
(17513, 17, 'PÁCORA'),
(17524, 17, 'PALESTINA'),
(17541, 17, 'PENSILVANIA'),
(17614, 17, 'RIOSUCIO'),
(17616, 17, 'RISARALDA'),
(17653, 17, 'SALAMINA'),
(17662, 17, 'SAMANÁ'),
(17665, 17, 'SAN JOSÉ'),
(17777, 17, 'SUPÍA'),
(17867, 17, 'VICTORIA'),
(17873, 17, 'VILLAMARiA'),
(17877, 17, 'VITERBO'),
(18001, 18, 'FLORENCIA'),
(18029, 18, 'ALBANIA'),
(18094, 18, 'BELÉN DE LOS ANDAQUIES'),
(18150, 18, 'CARTAGENA DEL CHAIRÁ'),
(18205, 18, 'CURRILLO'),
(18247, 18, 'EL DONCELLO'),
(18256, 18, 'EL PAUJIL'),
(18410, 18, 'LA MONTAÑITA'),
(18460, 18, 'MILaN'),
(18479, 18, 'MORELIA'),
(18592, 18, 'PUERTO RICO'),
(18610, 18, 'SAN JOSE DEL FRAGUA'),
(18753, 18, 'SAN VICENTE DEL CAGUÁN'),
(18756, 18, 'SOLANO'),
(18785, 18, 'SOLITA'),
(18860, 18, 'VALPARAISO'),
(19001, 19, 'POPAYÁN'),
(19022, 19, 'ALMAGUER'),
(19050, 19, 'ARGELIA'),
(19075, 19, 'BALBOA'),
(19100, 19, 'BOLÍVAR'),
(19110, 19, 'BUENOS AIRES'),
(19130, 19, 'CAJIBÍO'),
(19137, 19, 'CALDONO'),
(19142, 19, 'CALOTO'),
(19212, 19, 'CORINTO'),
(19256, 19, 'EL TAMBO'),
(19290, 19, 'FLORENCIA'),
(19318, 19, 'GUAPI'),
(19355, 19, 'INZÁ'),
(19364, 19, 'JAMBALO'),
(19392, 19, 'LA SIERRA'),
(19397, 19, 'LA VEGA'),
(19418, 19, 'LOPEZ'),
(19450, 19, 'MERCADERES'),
(19455, 19, 'MIRANDA'),
(19473, 19, 'MORALES'),
(19513, 19, 'PADILLA'),
(19517, 19, 'PAEZ'),
(19532, 19, 'PATIA'),
(19533, 19, 'PIAMONTE'),
(19548, 19, 'PIENDAMO'),
(19573, 19, 'PUERTO TEJADA'),
(19585, 19, 'PURACE'),
(19622, 19, 'ROSAS'),
(19693, 19, 'SAN SEBASTIAN'),
(19698, 19, 'SANTANDER DE QUILICHAO'),
(19701, 19, 'SANTA ROSA'),
(19743, 19, 'Silvia'),
(19760, 19, 'SOTARA'),
(19780, 19, 'SUAREZ'),
(19785, 19, 'SUCRE'),
(19807, 19, 'TIMBIO'),
(19809, 19, 'TIMBIQUI'),
(19821, 19, 'TORIBIO'),
(19824, 19, 'TOTORO'),
(19845, 19, 'VILLA RICA'),
(20001, 20, 'VALLEDUPAR'),
(20011, 20, 'AGUACHICA'),
(20013, 20, 'AGUSTÍN CODAZZI'),
(20032, 20, 'ASTREA'),
(20045, 20, 'BECERRIL'),
(20060, 20, 'BOSCONIA'),
(20175, 20, 'CHIMICHAGUA'),
(20178, 20, 'CHIRIGUANA'),
(20228, 20, 'CURUMANÍ'),
(20238, 20, 'EL COPEY'),
(20250, 20, 'EL PASO'),
(20295, 20, 'GAMARRA'),
(20310, 20, 'GONZÁLEZ'),
(20383, 20, 'LA GLORIA'),
(20400, 20, 'LA JAGUA DE IBIRICO'),
(20443, 20, 'MANAURE'),
(20517, 20, 'PAILITAS'),
(20550, 20, 'PELAYA'),
(20570, 20, 'PUEBLO BELLO'),
(20614, 20, 'RÍO DE ORO'),
(20621, 20, 'LA PAZ'),
(20710, 20, 'SAN ALBERTO'),
(20750, 20, 'SAN DIEGO'),
(20770, 20, 'SAN MARTÍN'),
(20787, 20, 'TAMALAMEQUE'),
(23001, 23, 'MONTERÍA'),
(23068, 23, 'AYAPEL'),
(23079, 23, 'BUENAVISTA'),
(23090, 23, 'CANALETE'),
(23162, 23, 'CERETÉ'),
(23168, 23, 'CHIMÁ'),
(23182, 23, 'CHINÚ'),
(23189, 23, 'CIÉNAGA DE ORO'),
(23300, 23, 'COTORRA'),
(23350, 23, 'LA APARTADA'),
(23417, 23, 'LORICA'),
(23419, 23, 'LOS CÓRDOBAS'),
(23464, 23, 'MOMIL'),
(23466, 23, 'MONTELÍBANO'),
(23500, 23, 'MOÑITOS'),
(23555, 23, 'PLANETA RICA'),
(23570, 23, 'PUEBLO NUEVO'),
(23574, 23, 'PUERTO ESCONDIDO'),
(23580, 23, 'PUERTO LIBERTADOR'),
(23586, 23, 'PURÍSIMA'),
(23660, 23, 'SAHAGÚN'),
(23670, 23, 'SAN ANDRÉS SOTAVENTO'),
(23672, 23, 'SAN ANTERO'),
(23675, 23, 'SAN BERNARDO DEL VIENTO'),
(23678, 23, 'SAN CARLOS'),
(23686, 23, 'SAN PELAYO'),
(23807, 23, 'TIERRALTA'),
(23855, 23, 'VALENCIA'),
(25001, 25, 'AGUA DE DIOS'),
(25019, 25, 'ALBÁN'),
(25035, 25, 'ANAPOIMA'),
(25040, 25, 'ANOLAIMA'),
(25053, 25, 'ARBELÁEZ'),
(25086, 25, 'BELTRÁN'),
(25095, 25, 'BITUIMA'),
(25099, 25, 'BOJACÁ'),
(25120, 25, 'CABRERA'),
(25123, 25, 'CACHIPAY'),
(25126, 25, 'CAJICÁ'),
(25148, 25, 'CAPARRAPÍ'),
(25151, 25, 'CAQUEZA'),
(25154, 25, 'CARMEN DE CARUPA'),
(25168, 25, 'CHAGUANÍ'),
(25175, 25, 'CHÍA'),
(25178, 25, 'CHIPAQUE'),
(25181, 25, 'CHOACHÍ'),
(25183, 25, 'CHOCONTÁ'),
(25200, 25, 'COGUA'),
(25214, 25, 'COTA'),
(25224, 25, 'CUCUNUBÁ'),
(25245, 25, 'EL COLEGIO'),
(25258, 25, 'EL PEÑÓN'),
(25260, 25, 'EL ROSAL'),
(25269, 25, 'FACATATIVÁ'),
(25279, 25, 'FOMEQUE'),
(25281, 25, 'FOSCA'),
(25286, 25, 'FUNZA'),
(25288, 25, 'FÚQUENE'),
(25290, 25, 'FUSAGASUGÁ'),
(25293, 25, 'GACHALA'),
(25295, 25, 'GACHANCIPÁ'),
(25297, 25, 'GACHETA'),
(25299, 25, 'GAMA'),
(25307, 25, 'GIRARDOT'),
(25312, 25, 'GRANADA'),
(25317, 25, 'GUACHETÁ'),
(25320, 25, 'GUADUAS'),
(25322, 25, 'GUASCA'),
(25324, 25, 'GUATAQUÍ'),
(25326, 25, 'GUATAVITA'),
(25328, 25, 'GUAYABAL DE SIQUIMA'),
(25335, 25, 'GUAYABETAL'),
(25339, 25, 'GUTIÉRREZ'),
(25368, 25, 'JERUSALÉN'),
(25372, 25, 'JUNÍN'),
(25377, 25, 'LA CALERA'),
(25386, 25, 'LA MESA'),
(25394, 25, 'LA PALMA'),
(25398, 25, 'LA PEÑA'),
(25402, 25, 'LA VEGA'),
(25407, 25, 'LENGUAZAQUE'),
(25426, 25, 'MACHETA'),
(25430, 25, 'MADRID'),
(25436, 25, 'MANTA'),
(25438, 25, 'MEDINA'),
(25473, 25, 'MOSQUERA'),
(25483, 25, 'NARIÑO'),
(25486, 25, 'NEMOCoN'),
(25488, 25, 'NILO'),
(25489, 25, 'NIMAIMA'),
(25491, 25, 'NOCAIMA'),
(25506, 25, 'VENECIA'),
(25513, 25, 'PACHO'),
(25518, 25, 'PAIME'),
(25524, 25, 'PANDI'),
(25530, 25, 'PARATEBUENO'),
(25535, 25, 'PASCA'),
(25572, 25, 'PUERTO SALGAR'),
(25580, 25, 'PULI'),
(25592, 25, 'QUEBRADANEGRA'),
(25594, 25, 'QUETAME'),
(25596, 25, 'QUIPILE'),
(25599, 25, 'APULO'),
(25612, 25, 'RICAURTE'),
(25645, 25, 'SAN ANTONIO DE TEQUENDAMA'),
(25649, 25, 'SAN BERNARDO'),
(25653, 25, 'SAN CAYETANO'),
(25658, 25, 'SAN FRANCISCO'),
(25662, 25, 'SAN JUAN DE RÍO SECO'),
(25718, 25, 'SASAIMA'),
(25736, 25, 'SESQUILÉ'),
(25740, 25, 'SIBATÉ'),
(25743, 25, 'SILVANIA'),
(25745, 25, 'SIMIJACA'),
(25754, 25, 'SOACHA'),
(25758, 25, 'SOPÓ'),
(25769, 25, 'SUBACHOQUE'),
(25772, 25, 'SUESCA'),
(25777, 25, 'SUPATÁ'),
(25779, 25, 'SUSA'),
(25781, 25, 'SUTATAUSA'),
(25785, 25, 'TABIO'),
(25793, 25, 'TAUSA'),
(25797, 25, 'TENA'),
(25799, 25, 'TENJO'),
(25805, 25, 'TIBACUY'),
(25807, 25, 'TIBIRITA'),
(25815, 25, 'TOCAIMA'),
(25817, 25, 'TOCANCIPÁ'),
(25823, 25, 'TOPAIPI'),
(25839, 25, 'UBALÁ'),
(25841, 25, 'UBAQUE'),
(25843, 25, 'UBATE'),
(25845, 25, 'UNE'),
(25851, 25, 'ÚTICA'),
(25862, 25, 'VERGARA'),
(25867, 25, 'VIANÍ'),
(25871, 25, 'VILLAGOMEZ'),
(25873, 25, 'VILLAPINZÓN'),
(25875, 25, 'VILLETA'),
(25878, 25, 'VIOTÁ'),
(25885, 25, 'YACOPÍ'),
(25898, 25, 'ZIPACoN'),
(25899, 25, 'ZIPAQUIRÁ'),
(27001, 27, 'QUIBDÓ'),
(27006, 27, 'ACANDÍ'),
(27025, 27, 'ALTO BAUDÓ'),
(27050, 27, 'ATRATO'),
(27073, 27, 'BAGADÓ'),
(27075, 27, 'BAHÍA SOLANO'),
(27077, 27, 'BAJO BAUDÓ'),
(27086, 27, 'BELÉN DE BAJIRA'),
(27099, 27, 'BOJAYA'),
(27135, 27, 'CANTON DE SAN PABLO'),
(27150, 27, 'CARMÉN DEL DARIÉN'),
(27160, 27, 'CERTEGUI'),
(27205, 27, 'CONDOTO'),
(27245, 27, 'EL CARMEN DE ATRATO'),
(27250, 27, 'El Litoral del San Juan'),
(27361, 27, 'ITSMINA'),
(27372, 27, 'JURADÓ'),
(27413, 27, 'LLORÓ'),
(27425, 27, 'MEDIO ATRATO'),
(27430, 27, 'MEDIO BAUDÓ'),
(27450, 27, 'MEDIO SAN JUAN'),
(27491, 27, 'NÓVITA'),
(27495, 27, 'NUQUÍ'),
(27580, 27, 'RÍO FRÍO'),
(27600, 27, 'RIO QUITO'),
(27615, 27, 'RIOSUCIO'),
(27660, 27, 'SAN JOSÉ DEL PALMAR'),
(27745, 27, 'SIPÍ'),
(27787, 27, 'TADÓ'),
(27800, 27, 'UNGUÍA'),
(27810, 27, 'UNION PANAMERICANA'),
(41001, 41, 'NEIVA'),
(41006, 41, 'ACEVEDO'),
(41013, 41, 'AGRADO'),
(41016, 41, 'AIPE'),
(41020, 41, 'ALGECIRAS'),
(41026, 41, 'ALTAMIRA'),
(41078, 41, 'BARAYA'),
(41132, 41, 'CAMPOALEGRE'),
(41206, 41, 'COLOMBIA'),
(41244, 41, 'ELÍAS'),
(41298, 41, 'GARZÓN'),
(41306, 41, 'GIGANTE'),
(41319, 41, 'GUADALUPE'),
(41349, 41, 'HOBO'),
(41357, 41, 'IQUIRA'),
(41359, 41, 'ISNOS'),
(41378, 41, 'LA ARGENTINA'),
(41396, 41, 'LA PLATA'),
(41483, 41, 'NÁTAGA'),
(41503, 41, 'OPORAPA'),
(41518, 41, 'PAICOL'),
(41524, 41, 'PALERMO'),
(41530, 41, 'PALESTINA'),
(41548, 41, 'PITAL'),
(41551, 41, 'PITALITO'),
(41615, 41, 'RIVERA'),
(41660, 41, 'SALADOBLANCO'),
(41668, 41, 'SAN AGUSTÍN'),
(41676, 41, 'SANTA MARÍA'),
(41770, 41, 'SUAZA'),
(41791, 41, 'TARQUI'),
(41797, 41, 'TESALIA'),
(41799, 41, 'TELLO'),
(41801, 41, 'TERUEL'),
(41807, 41, 'TIMANÁ'),
(41872, 41, 'VILLAVIEJA'),
(41885, 41, 'YAGUARÁ'),
(44001, 44, 'RIOHACHA'),
(44035, 44, 'ALBANIA'),
(44078, 44, 'BARRANCAS'),
(44090, 44, 'DIBULLA'),
(44098, 44, 'DISTRACCION'),
(44110, 44, 'EL MOLINO'),
(44279, 44, 'FONSECA'),
(44378, 44, 'HATONUEVO'),
(44420, 44, 'LA JAGUA DEL PILAR'),
(44430, 44, 'MAICAO'),
(44560, 44, 'MANAURE'),
(44650, 44, 'SAN JUAN DEL CESAR'),
(44847, 44, 'URIBIA'),
(44855, 44, 'URUMITA'),
(44874, 44, 'VILLANUEVA'),
(47001, 47, 'SANTA MARTA'),
(47030, 47, 'ALGARROBO'),
(47053, 47, 'ARACATACA'),
(47058, 47, 'ARIGUANÍ'),
(47161, 47, 'CERRO SAN ANTONIO'),
(47170, 47, 'CHIBOLO'),
(47189, 47, 'CIÉNAGA'),
(47205, 47, 'CONCORDIA'),
(47245, 47, 'EL BANCO'),
(47258, 47, 'EL PIÑON'),
(47268, 47, 'EL RETEN'),
(47288, 47, 'FUNDACION'),
(47318, 47, 'GUAMAL'),
(47460, 47, 'NUEVA GRANADA'),
(47541, 47, 'PEDRAZA'),
(47545, 47, 'PIJIÑO DEL CARMEN'),
(47551, 47, 'PIVIJAY'),
(47555, 47, 'PLATO'),
(47570, 47, 'PUEBLO VIEJO'),
(47605, 47, 'REMOLINO'),
(47660, 47, 'SABANAS DE SAN ANGEL'),
(47675, 47, 'SALAMINA'),
(47692, 47, 'SAN SEBASTIAN DE BUENAVISTA'),
(47703, 47, 'SAN ZENON'),
(47707, 47, 'SANTA ANA'),
(47720, 47, 'SANTA BARBARA DE PINTO'),
(47745, 47, 'SITIONUEVO'),
(47798, 47, 'TENERIFE'),
(47960, 47, 'ZAPAYAN'),
(47980, 47, 'ZONA BANANERA'),
(50001, 50, 'VILLAVICENCIO'),
(50006, 50, 'ACACiAS'),
(50110, 50, 'BARRANCA DE UPIA'),
(50124, 50, 'CABUYARO'),
(50150, 50, 'CASTILLA LA NUEVA'),
(50223, 50, 'SAN LUIS DE CUBARRAL'),
(50226, 50, 'CUMARAL'),
(50245, 50, 'EL CALVARIO'),
(50251, 50, 'EL CASTILLO'),
(50270, 50, 'EL DORADO'),
(50287, 50, 'FUENTE DE ORO'),
(50313, 50, 'GRANADA'),
(50318, 50, 'GUAMAL'),
(50325, 50, 'MAPIRIPaN'),
(50330, 50, 'MESETAS'),
(50350, 50, 'LA MACARENA'),
(50370, 50, 'LA URIBE'),
(50400, 50, 'LEJANÍAS'),
(50450, 50, 'PUERTO CONCORDIA'),
(50568, 50, 'PUERTO GAITÁN'),
(50573, 50, 'PUERTO LoPEZ'),
(50577, 50, 'PUERTO LLERAS'),
(50590, 50, 'PUERTO RICO'),
(50606, 50, 'RESTREPO'),
(50680, 50, 'SAN CARLOS GUAROA'),
(50683, 50, 'SAN JUAN DE ARAMA'),
(50686, 50, 'SAN JUANITO'),
(50689, 50, 'SAN MARTÍN'),
(50711, 50, 'VISTA HERMOSA'),
(52001, 52, 'PASTO'),
(52019, 52, 'ALBAN'),
(52022, 52, 'ALDANA'),
(52036, 52, 'ANCUYA'),
(52051, 52, 'ARBOLEDA'),
(52079, 52, 'BARBACOAS'),
(52083, 52, 'BELEN'),
(52110, 52, 'BUESACO'),
(52203, 52, 'COLON'),
(52207, 52, 'CONSACA'),
(52210, 52, 'CONTADERO'),
(52215, 52, 'CÓRDOBA'),
(52224, 52, 'CUASPUD'),
(52227, 52, 'CUMBAL'),
(52233, 52, 'CUMBITARA'),
(52240, 52, 'CHACHAGUI'),
(52250, 52, 'EL CHARCO'),
(52254, 52, 'EL PEÑOL'),
(52256, 52, 'EL ROSARIO'),
(52258, 52, 'El Tablon de Gomez'),
(52260, 52, 'EL TAMBO'),
(52287, 52, 'FUNES'),
(52317, 52, 'GUACHUCAL'),
(52320, 52, 'GUAITARILLA'),
(52323, 52, 'GUALMATAN'),
(52352, 52, 'ILES'),
(52354, 52, 'IMUES'),
(52356, 52, 'IPIALES'),
(52378, 52, 'LA CRUZ'),
(52381, 52, 'LA FLORIDA'),
(52385, 52, 'LA LLANADA'),
(52390, 52, 'LA TOLA'),
(52399, 52, 'LA UNION'),
(52405, 52, 'LEIVA'),
(52411, 52, 'LINARES'),
(52418, 52, 'LOS ANDES'),
(52427, 52, 'Magui'),
(52435, 52, 'MALLAMA'),
(52473, 52, 'MOSQUERA'),
(52480, 52, 'NARIÑO'),
(52490, 52, 'OLAYA HERRERA'),
(52506, 52, 'OSPINA'),
(52520, 52, 'FRANCISCO PIZARRO'),
(52540, 52, 'POLICARPA'),
(52560, 52, 'POTOSÍ'),
(52565, 52, 'PROVIDENCIA'),
(52573, 52, 'PUERRES'),
(52585, 52, 'PUPIALES'),
(52612, 52, 'RICAURTE'),
(52621, 52, 'ROBERTO PAYAN'),
(52678, 52, 'SAMANIEGO'),
(52683, 52, 'SANDONÁ'),
(52685, 52, 'SAN BERNARDO'),
(52687, 52, 'SAN LORENZO'),
(52693, 52, 'SAN PABLO'),
(52694, 52, 'SAN PEDRO DE CARTAGO'),
(52696, 52, 'SANTA BaRBARA'),
(52699, 52, 'SANTA CRUZ'),
(52720, 52, 'SAPUYES'),
(52786, 52, 'TAMINANGO'),
(52788, 52, 'TANGUA'),
(52835, 52, 'TUMACO'),
(52838, 52, 'TUQUERRES'),
(52885, 52, 'YACUANQUER'),
(54001, 54, 'CÚCUTA'),
(54003, 54, 'ABREGO'),
(54051, 54, 'ARBOLEDAS'),
(54099, 54, 'BOCHALEMA'),
(54109, 54, 'BUCARASICA'),
(54125, 54, 'CÁCOTA'),
(54128, 54, 'CACHIRÁ'),
(54172, 54, 'CHINÁCOTA'),
(54174, 54, 'CHITAGÁ'),
(54206, 54, 'CONVENCIÓN'),
(54223, 54, 'CUCUTILLA'),
(54239, 54, 'DURANIA'),
(54245, 54, 'EL CARMEN'),
(54250, 54, 'EL TARRA'),
(54261, 54, 'EL ZULIA'),
(54313, 54, 'GRAMALOTE'),
(54344, 54, 'HACARÍ'),
(54347, 54, 'HERRÁN'),
(54377, 54, 'LABATECA'),
(54385, 54, 'LA ESPERANZA'),
(54398, 54, 'LA PLAYA'),
(54405, 54, 'LOS PATIOS'),
(54418, 54, 'LOURDES'),
(54480, 54, 'MUTISCUA'),
(54498, 54, 'OCAÑA'),
(54518, 54, 'PAMPLONA'),
(54520, 54, 'PAMPLONITA'),
(54553, 54, 'PUERTO SANTANDER'),
(54599, 54, 'RAGONVALIA'),
(54660, 54, 'SALAZAR'),
(54670, 54, 'SAN CALIXTO'),
(54673, 54, 'SAN CAYETANO'),
(54680, 54, 'SANTIAGO'),
(54720, 54, 'SARDINATA'),
(54743, 54, 'SILOS'),
(54800, 54, 'TEORAMA'),
(54810, 54, 'TIBÚ'),
(54820, 54, 'TOLEDO'),
(54871, 54, 'VILLA CARO'),
(54874, 54, 'VILLA DEL ROSARIO'),
(63001, 63, 'ARMENIA'),
(63111, 63, 'BUENAVISTA'),
(63130, 63, 'CALARCA'),
(63190, 63, 'CIRCASIA'),
(63212, 63, 'CoRDOBA'),
(63272, 63, 'FILANDIA'),
(63302, 63, 'GeNOVA'),
(63401, 63, 'LA TEBAIDA'),
(63470, 63, 'Montengro'),
(63548, 63, 'PIJAO'),
(63594, 63, 'QUIMBAYA'),
(63690, 63, 'SALENTO'),
(66001, 66, 'PEREIRA'),
(66045, 66, 'APÍA'),
(66075, 66, 'BALBOA'),
(66088, 66, 'BELÉN DE UMBRÍA'),
(66170, 66, 'DOSQUEBRADAS'),
(66318, 66, 'GUÁTICA'),
(66383, 66, 'LA CELIA'),
(66400, 66, 'LA VIRGINIA'),
(66440, 66, 'MARSELLA'),
(66456, 66, 'MISTRATÓ'),
(66572, 66, 'PUEBLO RICO'),
(66594, 66, 'QUINCHiA'),
(66682, 66, 'SANTA ROSA DE CABAL'),
(66687, 66, 'SANTUARIO'),
(68001, 68, 'BUCARAMANGA'),
(68013, 68, 'AGUADA'),
(68020, 68, 'ALBANIA'),
(68051, 68, 'ARATOCA'),
(68077, 68, 'BARBOSA'),
(68079, 68, 'BARICHARA'),
(68081, 68, 'BARRANCABERMEJA'),
(68092, 68, 'BETULIA'),
(68101, 68, 'BOLÍVAR'),
(68121, 68, 'CABRERA'),
(68132, 68, 'CALIFORNIA'),
(68147, 68, 'CAPITANEJO'),
(68152, 68, 'CARCASÍ'),
(68160, 68, 'CEPITÁ'),
(68162, 68, 'CERRITO'),
(68167, 68, 'CHARALÁ'),
(68169, 68, 'CHARTA'),
(68176, 68, 'CHIMA'),
(68179, 68, 'CHIPATÁ'),
(68190, 68, 'CIMITARRA'),
(68207, 68, 'CONCEPCIÓN'),
(68209, 68, 'CONFINES'),
(68211, 68, 'CONTRATACIÓN'),
(68217, 68, 'COROMORO'),
(68229, 68, 'CURITÍ'),
(68235, 68, 'EL CARMEN DE CHUCURÍ'),
(68245, 68, 'EL GUACAMAYO'),
(68250, 68, 'EL PEÑÓN'),
(68255, 68, 'EL PLAYÓN'),
(68264, 68, 'ENCINO'),
(68266, 68, 'ENCISO'),
(68271, 68, 'FLORIÁN'),
(68276, 68, 'FLORIDABLANCA'),
(68296, 68, 'GALÁN'),
(68298, 68, 'GAMBITA'),
(68307, 68, 'GIRÓN'),
(68318, 68, 'GUACA'),
(68320, 68, 'GUADALUPE'),
(68322, 68, 'GUAPOTÁ'),
(68324, 68, 'GUAVATÁ'),
(68327, 68, 'GuEPSA'),
(68344, 68, 'HATO'),
(68368, 68, 'JESÚS MARÍA'),
(68370, 68, 'JORDÁN'),
(68377, 68, 'LA BELLEZA'),
(68385, 68, 'LANDÁZURI'),
(68397, 68, 'LA PAZ'),
(68406, 68, 'LEBRÍJA'),
(68418, 68, 'LOS SANTOS'),
(68425, 68, 'MACARAVITA'),
(68432, 68, 'MÁLAGA'),
(68444, 68, 'MATANZA'),
(68464, 68, 'MOGOTES'),
(68468, 68, 'MOLAGAVITA'),
(68498, 68, 'OCAMONTE'),
(68500, 68, 'OIBA'),
(68502, 68, 'ONZAGA'),
(68522, 68, 'PALMAR'),
(68524, 68, 'PALMAS DEL SOCORRO'),
(68533, 68, 'PÁRAMO'),
(68547, 68, 'PIEDECUESTA'),
(68549, 68, 'PINCHOTE'),
(68572, 68, 'PUENTE NACIONAL'),
(68573, 68, 'PUERTO PARRA'),
(68575, 68, 'PUERTO WILCHES'),
(68615, 68, 'RIONEGRO'),
(68655, 68, 'SABANA DE TORRES'),
(68669, 68, 'SAN ANDRÉS'),
(68673, 68, 'SAN BENITO'),
(68679, 68, 'SAN GIL'),
(68682, 68, 'SAN JOAQUÍN'),
(68684, 68, 'SAN JOSÉ DE MIRANDA'),
(68686, 68, 'SAN MIGUEL'),
(68689, 68, 'SAN VICENTE DE CHUCURÍ'),
(68705, 68, 'SANTA BÁRBARA'),
(68720, 68, 'SANTA HELENA DEL OPÓN'),
(68745, 68, 'SIMACOTA'),
(68755, 68, 'SOCORRO'),
(68770, 68, 'SUAITA'),
(68773, 68, 'SUCRE'),
(68780, 68, 'SURATA'),
(68820, 68, 'TONA'),
(68855, 68, 'VALLE DE SAN JOSÉ'),
(68861, 68, 'VÉLEZ'),
(68867, 68, 'VETAS'),
(68872, 68, 'VILLANUEVA'),
(68895, 68, 'ZAPATOCA'),
(70001, 70, 'SINCELEJO'),
(70110, 70, 'BUENAVISTA'),
(70124, 70, 'CAIMITO'),
(70204, 70, 'COLOSO'),
(70215, 70, 'COROZAL'),
(70221, 70, 'COVEÑAS'),
(70230, 70, 'CHALÁN'),
(70233, 70, 'EL ROBLE'),
(70235, 70, 'GALERAS'),
(70265, 70, 'GUARANDA'),
(70400, 70, 'LA UNIÓN'),
(70418, 70, 'LOS PALMITOS'),
(70429, 70, 'MAJAGUAL'),
(70473, 70, 'MORROA'),
(70508, 70, 'OVEJAS'),
(70523, 70, 'PALMITO'),
(70670, 70, 'SAMPUÉS'),
(70678, 70, 'SAN BENITO ABAD'),
(70702, 70, 'SAN JUAN BETULIA'),
(70708, 70, 'SAN MARCOS'),
(70713, 70, 'SAN ONOFRE'),
(70717, 70, 'SAN PEDRO'),
(70742, 70, 'SINCÉ'),
(70771, 70, 'SUCRE'),
(70820, 70, 'SANTIAGO DE TOLÚ'),
(70823, 70, 'TOLÚ VIEJO'),
(73001, 73, 'IBAGUe'),
(73024, 73, 'ALPUJARRA'),
(73026, 73, 'ALVARADO'),
(73030, 73, 'AMBALEMA'),
(73043, 73, 'ANZOÁTEGUI'),
(73055, 73, 'ARMERO'),
(73067, 73, 'ATACO'),
(73124, 73, 'CAJAMARCA'),
(73148, 73, 'CARMEN DE APICALÁ'),
(73152, 73, 'CASABIANCA'),
(73168, 73, 'CHAPARRAL'),
(73200, 73, 'COELLO'),
(73217, 73, 'COYAIMA'),
(73226, 73, 'CUNDAY'),
(73236, 73, 'DOLORES'),
(73268, 73, 'ESPINAL'),
(73270, 73, 'FALAN'),
(73275, 73, 'FLANDES'),
(73283, 73, 'FRESNO'),
(73319, 73, 'GUAMO'),
(73347, 73, 'HERVEO'),
(73349, 73, 'HONDA'),
(73352, 73, 'ICONONZO'),
(73408, 73, 'LeRIDA'),
(73411, 73, 'LiBANO'),
(73443, 73, 'MARIQUITA'),
(73449, 73, 'MELGAR'),
(73461, 73, 'MURILLO'),
(73483, 73, 'NATAGAIMA'),
(73504, 73, 'ORTEGA'),
(73520, 73, 'PALOCABILDO'),
(73547, 73, 'PIEDRAS'),
(73555, 73, 'PLANADAS'),
(73563, 73, 'PRADO'),
(73585, 73, 'PURIFICACIÓN'),
(73616, 73, 'RIOBLANCO'),
(73622, 73, 'RONCESVALLES'),
(73624, 73, 'ROVIRA'),
(73671, 73, 'SALDAÑA'),
(73675, 73, 'SAN ANTONIO'),
(73678, 73, 'SAN LUIS'),
(73686, 73, 'SANTA ISABEL'),
(73770, 73, 'SUÁREZ'),
(73854, 73, 'VALLE DE SAN JUAN'),
(73861, 73, 'VENADILLO'),
(73870, 73, 'VILLAHERMOSA'),
(73873, 73, 'VILLARRICA'),
(76001, 76, 'CALI'),
(76020, 76, 'ALCALa'),
(76036, 76, 'ANDALUCÍA'),
(76041, 76, 'ANSERMANUEVO'),
(76054, 76, 'ARGELIA'),
(76100, 76, 'BOLÍVAR'),
(76109, 76, 'BUENAVENTURA'),
(76111, 76, 'BUGA'),
(76113, 76, 'BUGALAGRANDE'),
(76122, 76, 'CAICEDONIA'),
(76126, 76, 'CALIMA'),
(76130, 76, 'CANDELARIA'),
(76147, 76, 'CARTAGO'),
(76233, 76, 'DAGUA'),
(76243, 76, 'EL ÁGUILA'),
(76246, 76, 'EL CAIRO'),
(76248, 76, 'EL CERRITO'),
(76250, 76, 'EL DOVIO'),
(76275, 76, 'FLORIDA'),
(76306, 76, 'GINEBRA'),
(76318, 76, 'GUACARÍ'),
(76364, 76, 'JAMUNDÍ'),
(76377, 76, 'LA CUMBRE'),
(76400, 76, 'LA UNIÓN'),
(76403, 76, 'LA VICTORIA'),
(76497, 76, 'OBANDO'),
(76520, 76, 'PALMIRA'),
(76563, 76, 'PRADERA'),
(76606, 76, 'RESTREPO'),
(76616, 76, 'RIOFRIO'),
(76622, 76, 'ROLDANILLO'),
(76670, 76, 'SAN PEDRO'),
(76736, 76, 'SEVILLA'),
(76823, 76, 'TORO'),
(76828, 76, 'TRUJILLO'),
(76834, 76, 'TULUÁ'),
(76845, 76, 'ULLOA'),
(76863, 76, 'VERSALLES'),
(76869, 76, 'VIJES'),
(76890, 76, 'YOTOCO'),
(76892, 76, 'YUMBO'),
(76895, 76, 'ZARZAL'),
(81001, 81, 'ARAUCA'),
(81065, 81, 'ARAUQUITA'),
(81220, 81, 'CRAVO NORTE'),
(81300, 81, 'FORTUL'),
(81591, 81, 'PUERTO RONDÓN'),
(81736, 81, 'SARAVENA'),
(81794, 81, 'TAME'),
(85001, 85, 'YOPAL'),
(85010, 85, 'AGUAZUL'),
(85015, 85, 'CHAMEZA'),
(85125, 85, 'HATO COROZAL'),
(85136, 85, 'LA SALINA'),
(85139, 85, 'MANÍ'),
(85162, 85, 'MONTERREY'),
(85225, 85, 'NUNCHÍA'),
(85230, 85, 'OROCUÉ'),
(85250, 85, 'PAZ DE ARIPORO'),
(85263, 85, 'PORE'),
(85279, 85, 'RECETOR'),
(85300, 85, 'SABANALARGA'),
(85315, 85, 'SÁCAMA'),
(85325, 85, 'SAN LUIS DE PALENQUE'),
(85400, 85, 'TÁMARA'),
(85410, 85, 'TAURAMENA'),
(85430, 85, 'TRINIDAD'),
(85440, 85, 'VILLANUEVA'),
(86001, 86, 'MOCOA'),
(86219, 86, 'COLÓN'),
(86320, 86, 'ORITO'),
(86568, 86, 'PUERTO ASIS'),
(86569, 86, 'PUERTO CAICEDO'),
(86571, 86, 'PUERTO GUZMAN'),
(86573, 86, 'PUERTO LEGUIZAMO'),
(86749, 86, 'SIBUNDOY'),
(86755, 86, 'SAN FRANCISCO'),
(86757, 86, 'SAN MIGUEL'),
(86760, 86, 'SANTIAGO'),
(86865, 86, 'VALLE DEL GUAMUEZ'),
(86885, 86, 'VILLA GARZON'),
(88001, 88, 'SAN ANDReS'),
(88564, 88, 'PROVIDENCIA Y SANTA CATALINA'),
(91001, 91, 'LETICIA'),
(91263, 91, 'EL ENCANTO'),
(91405, 91, 'LA CHORRERA'),
(91407, 91, 'LA PEDRERA'),
(91430, 91, 'LA VICTORIA'),
(91460, 91, 'MIRITI - PARANÁ'),
(91530, 91, 'PUERTO ALEGRIA'),
(91536, 91, 'PUERTO ARICA'),
(91540, 91, 'PUERTO NARIÑO'),
(91669, 91, 'PUERTO SANTANDER'),
(91798, 91, 'TARAPACÁ'),
(94001, 94, 'INÍRIDA'),
(94343, 94, 'BARRANCO MINA'),
(94663, 94, 'MAPIRIPaN'),
(94883, 94, 'SAN FELIPE'),
(94884, 94, 'PUERTO COLOMBIA'),
(94885, 94, 'LA GUADALUPE'),
(94886, 94, 'CACAHUAL'),
(94887, 94, 'PANA PANA'),
(94888, 94, 'MORICHAL'),
(95001, 95, 'SAN JOSÉ DEL GUAVIARE'),
(95015, 95, 'CALAMAR'),
(95025, 95, 'EL RETORNO'),
(95200, 95, 'MIRAFLORES'),
(97001, 97, 'MITÚ'),
(97161, 97, 'CARURU'),
(97511, 97, 'PACOA'),
(97666, 97, 'TARAIRA'),
(97777, 97, 'PAPUNAHUA'),
(97889, 97, 'YAVARATÉ'),
(99001, 99, 'PUERTO CARREÑO'),
(99524, 99, 'LA PRIMAVERA'),
(99624, 99, 'SANTA ROSALÍA'),
(99773, 99, 'CUMARIBO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `nDocu` int(11) NOT NULL,
  `comentario` varchar(350) NOT NULL,
  `puntuacion` int(1) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `nDocu`, `comentario`, `puntuacion`, `fecha`) VALUES
(2, 145368930, 'Hola mundo', 5, '2023-07-04 01:04:11'),
(4, 124567540, 'bien', 5, '2023-12-01 20:05:19'),
(5, 124567540, 'bien', 4, '2023-12-04 20:12:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `celular` double NOT NULL,
  `asunto` varchar(50) NOT NULL,
  `mensaje` varchar(450) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombres`, `apellidos`, `correo`, `celular`, `asunto`, `mensaje`, `fecha`) VALUES
(1, 'Jonatan', 'Gutierrez', 'jonatan@gmail.com', 3142975647, 'Prueba', 'Hola mundo', '2023-01-05 01:01:46'),
(3, 'Jonatan', 'Gutierrez', 'jonatan@gmail.com', 5442021111, 'Prueba precauccion', 'Hola', '2023-07-05 05:40:19'),
(4, 'Maria', 'Gutierrez', '55@gmail.com', 2222222222, 'Prueba', 'Hola', '2023-07-05 05:46:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatorias`
--

CREATE TABLE `convocatorias` (
  `id` int(2) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `tCurso` int(2) NOT NULL,
  `codigo` int(8) NOT NULL,
  `id_jornada` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `descripcion` varchar(750) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `nDoc_responsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `convocatorias`
--

INSERT INTO `convocatorias` (`id`, `nombre`, `tCurso`, `codigo`, `id_jornada`, `fecha_inicio`, `fecha_fin`, `descripcion`, `foto`, `nDoc_responsable`) VALUES
(1, 'Cultura física ', 3, 2563486, 1, '2023-05-15', '2023-12-05', 'Recreación en la cultura física y el cuidado del cuerpo ', 'Curso_2563486.jpg', 123902050),
(2, 'Peluquería y estilos', 3, 2505929, 2, '2023-05-29', '2023-12-31', 'Tratamientos capilares que, en su mayoría, tienen que ver con el embellecimiento del cabello y con la restauración de su fortaleza.', 'Curso_2505929.jpg', 123902050),
(3, 'Analisis y desarrollo en software', 2, 2505967, 3, '2023-10-06', '2023-12-06', 'El desarrollo de software es algo similar. Se aprenden lenguajes de programación, se aprende la estructura de datos, se aprenden técnicas de análisis de complejidad de los algoritmos, se aprenden las mejores prácticas seguidas por la industria y se aprende a trabajar en equipo', 'Curso_2505967.jpg', 123902050);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `codigoDepartamento` int(2) NOT NULL,
  `nombreDepartamento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`codigoDepartamento`, `nombreDepartamento`) VALUES
(5, 'Antioquia'),
(8, 'Atlantico'),
(11, 'Bogota D.C'),
(13, 'Bolivar'),
(15, 'Boyaca'),
(17, 'Caldas'),
(18, 'Caqueta'),
(19, 'Cauca'),
(20, 'Cesar'),
(23, 'Cordoba'),
(25, 'Cundinamarca'),
(27, 'Chocó'),
(41, 'Huila'),
(44, 'La Guajira'),
(47, 'Magdalena'),
(50, 'Meta'),
(52, 'Nariño'),
(54, 'Norte de Santander'),
(63, 'Quindio'),
(66, 'Risaralda'),
(68, 'Santander'),
(70, 'Sucre'),
(73, 'Tolima '),
(76, 'Valle del Cauca'),
(81, 'Arauca'),
(85, 'Casanare'),
(86, 'Putumayo'),
(88, 'San Andres'),
(91, 'Amazonas'),
(94, 'Guainía'),
(95, 'Guaviare'),
(97, 'Vaupés'),
(99, 'Vichada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estructuracurri`
--

CREATE TABLE `estructuracurri` (
  `id` int(11) NOT NULL,
  `nombreEs` varchar(150) NOT NULL,
  `tCompetencia` int(11) NOT NULL,
  `nResultados` int(11) NOT NULL,
  `totalHoras` int(11) NOT NULL,
  `ficha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estructuracurri`
--

INSERT INTO `estructuracurri` (`id`, `nombreEs`, `tCompetencia`, `nResultados`, `totalHoras`, `ficha`) VALUES
(2, 'EspecificaciÓn de requisitos del software', 1, 4, 144, 2563486),
(3, 'AdopciÓn de buenas prÁcticas en el proceso de desarrollo de software', 1, 3, 144, 2563486),
(4, 'ConstrucciÓn del software', 1, 5, 1008, 2563486),
(5, 'ImplantaciÓn del software', 1, 4, 144, 2563486),
(6, 'Modelado de los artefactos del software', 1, 4, 336, 2563486),
(7, 'ElaboraciÓn de la propuesta tÉcnica del software', 1, 3, 144, 2563486),
(8, 'AnÁlisis de la especificaciÓn de requisitos del software', 1, 4, 288, 2563486),
(9, 'Jonatan becerra', 2, 2, 22, 2563486),
(11, 'Eee', 1, 2, 11, 2563486),
(12, 'Ttt', 1, 2, 11, 2563486),
(13, 'Mata', 1, 2, 11, 2563486),
(14, 'Nueva', 2, 2, 34, 2563486);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudio`
--

CREATE TABLE `estudio` (
  `id` int(11) NOT NULL,
  `dias` int(11) NOT NULL,
  `nombreMes` int(11) NOT NULL,
  `año` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudio`
--

INSERT INTO `estudio` (`id`, `dias`, `nombreMes`, `año`) VALUES
(4, 16, 4, 2022),
(5, 21, 5, 2022),
(6, 20, 6, 2022),
(7, 10, 7, 2022),
(8, 22, 8, 2022),
(9, 22, 9, 2022),
(10, 17, 10, 2022),
(11, 20, 11, 2022),
(12, 11, 12, 2022),
(13, 7, 1, 2023),
(14, 20, 2, 2023),
(15, 22, 3, 2023),
(16, 18, 4, 2023),
(17, 21, 5, 2023),
(19, 20, 6, 2023),
(20, 19, 7, 2023),
(21, 21, 8, 2023),
(22, 21, 9, 2023),
(23, 21, 10, 2023),
(24, 21, 11, 2023),
(25, 10, 12, 2023);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `fecha`, `descripcion`, `foto`) VALUES
(1, 'Día del Hombre', '2023-12-09', 'En algunos países, como Colombia, el 19 de marzo se celebra el Día del Hombre debido a que ese mismo día se festeja a San José de Nazaret, padre adoptivo de Jesús. También en Bolivia y Honduras.', 'events-1.jpg'),
(2, 'Dia de la mujer', '2023-03-08', 'El Día Internacional de la Mujer, antes denominado Día Internacional de la Mujer Trabajadora, conmemora en cada 8 de marzo la lucha de las mujeres por su participación en la sociedad y su desarrollo íntegro como persona, en pie de igualdad con el hombre.', 'events-2.jpg'),
(3, 'Entrega proyecto', '2023-09-30', 'Una entrega es un elemento de salida en el ámbito de un proyecto. Puede haber una o varias entregas dentro de un solo proyecto. Las entregas pueden ser elementos que se supone que deben enviarse de forma externa a un cliente o simplemente a un gestor interno.', 'events-3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id`, `nombre`, `descripcion`, `foto`) VALUES
(1, 'a', 'prueba 1', 'sena1.jpeg'),
(2, 'b', 'prueba 2', 'sena2.jpg'),
(3, 'Carro', 'prueba3', 'sena3.jpeg'),
(4, 'd', 'prueba4', 'sena4.png'),
(5, 'e', 'prueba5', 'sena5.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `nombregen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `nombregen`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Indefinido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
  `id` int(11) NOT NULL,
  `nombrejor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jornada`
--

INSERT INTO `jornada` (`id`, `nombrejor`) VALUES
(1, 'Dia'),
(2, 'Tarde'),
(3, 'Noche'),
(4, 'Virtual'),
(5, 'Fines de semana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

CREATE TABLE `meses` (
  `id` int(11) NOT NULL,
  `nombremes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `meses`
--

INSERT INTO `meses` (`id`, `nombremes`) VALUES
(1, 'Enero'),
(2, 'Febrero'),
(3, 'Marzo'),
(4, 'Abril'),
(5, 'Mayo'),
(6, 'Junio'),
(7, 'Julio'),
(8, 'Agosto'),
(9, 'Septiembre'),
(10, 'Octubre'),
(11, 'Noviembre'),
(12, 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nosotros`
--

CREATE TABLE `nosotros` (
  `id` int(11) NOT NULL,
  `fotoPrincipal` varchar(100) NOT NULL,
  `primerTexto` varchar(300) NOT NULL,
  `segundoTexto` varchar(300) NOT NULL,
  `fotoSegundaria` varchar(100) NOT NULL,
  `linkVideo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nosotros`
--

INSERT INTO `nosotros` (`id`, `fotoPrincipal`, `primerTexto`, `segundoTexto`, `fotoSegundaria`, `linkVideo`) VALUES
(1, 'fotoPrincipal.jpg', 'El SENA cuenta con una plataforma virtual llamada, SOFIAPlus: es la abreviación de Sistema Optimizado para la Formación Integral del Aprendizaje Activo; permite a cualquier persona acceder a un programa de formación complementaria y titulada', 'Con este buscador puede encontrar el tipo de formación que desea, digite las palabras claves, el lugar y presione en el botón buscar, lo redireccionará a la plataforma SOFIA PLUSSSS.', 'fotoSegundaria.jpg', 'https://youtu.be/SJm6I82Msz8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `docuemisor` int(11) NOT NULL,
  `docureceptor` int(11) NOT NULL,
  `titulomensaje` varchar(50) NOT NULL,
  `mensaje` varchar(150) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `fechaenvio` datetime NOT NULL,
  `estado` varchar(30) NOT NULL,
  `fechaleido` datetime DEFAULT NULL,
  `tipomensaje` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `docuemisor`, `docureceptor`, `titulomensaje`, `mensaje`, `foto`, `fechaenvio`, `estado`, `fechaleido`, `tipomensaje`) VALUES
(8, 123902050, 145368930, 'Las pruebas de aprendizaj', 'perro lambon', 'perfil.jpg', '2023-06-05 02:11:41', 'leido', '2023-06-14 04:01:32', 'previo'),
(17, 123902050, 124567540, 'Quiero una hambuerguesa', 'Traigame una hamburguesa urgente', 'fu_50.JPG', '2023-06-14 04:33:44', 'leido', '2023-06-14 05:24:07', 'urgente'),
(18, 102301010, 124567540, 'Falta una competencia', 'vas a ser expulsado', 'fu_10.jpg', '2023-06-14 04:34:24', 'leido', '2023-06-14 10:06:36', 'aviso'),
(22, 102301010, 123902050, 'holaaaa', 'holaaaa', 'fu_10.jpg', '2023-11-27 10:18:42', 'no leido', NULL, 'urgente'),
(23, 102301010, 123902050, 'hola', 'hola', 'fu_10.jpg', '2023-12-04 07:51:36', 'no leido', NULL, 'aviso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `nDoc` int(11) NOT NULL,
  `tDoc` int(2) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `genero` int(2) NOT NULL,
  `numerocel` double NOT NULL,
  `correo` varchar(150) NOT NULL,
  `rol` int(2) NOT NULL,
  `tpoblacion` int(11) DEFAULT NULL,
  `fechaper` date NOT NULL,
  `fechanacimiento` date NOT NULL,
  `documentoPdf` varchar(150) DEFAULT NULL,
  `registraduriaDocu` varchar(150) DEFAULT NULL,
  `contrasena` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL DEFAULT 'perfil.jpg',
  `id_depa` int(2) NOT NULL,
  `id_muni` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `person`
--

INSERT INTO `person` (`id`, `nDoc`, `tDoc`, `nombre`, `apellidos`, `genero`, `numerocel`, `correo`, `rol`, `tpoblacion`, `fechaper`, `fechanacimiento`, `documentoPdf`, `registraduriaDocu`, `contrasena`, `foto`, `id_depa`, `id_muni`) VALUES
(1, 102301010, 2, 'Jonatan Stiven', 'Gutierrez Nieto', 1, 3142945647, 'jonatangg@gmail.com', 3, 30, '2023-04-23', '2003-09-10', 'Documento_10.pdf', 'Certificacion_Documento_10.pdf', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'fu_10.jpg', 5, 5001),
(2, 123902050, 2, 'Jonatan', 'Becerra', 1, 3215698844, 'becerra@gmail.com', 1, 30, '2023-05-15', '1999-02-10', 'Documento_1005956188.pdf', 'Certificacion_Documento_1005956188.pdf', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'perfil.jpg', 25, 25875),
(3, 124567540, 2, 'Matica', 'Bermudez', 1, 3212564896, 'matica@gmail.com', 2, 17, '2023-05-16', '2006-02-10', 'Documento_1005956188.pdf', 'Certificacion_Documento_1000000000.pdf', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'fu_40.jpg', 41, 41001),
(4, 145368930, 2, 'Francisco', 'Carvajal', 1, 3000258741, 'messi@gmail.com', 2, 15, '2023-05-17', '1996-06-10', 'Documento_145368930.pdf', 'Certificacion_Documento_145368930.pdf', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'perfil.jpg', 25, 25175),
(5, 137645860, 2, 'Jaime', 'Jimenez', 1, 3200000000, 'messi@gmail.com', 4, 30, '2023-06-09', '1987-05-10', 'Documento_1023555555.pdf', 'Certificacion_Documento_1023555555.pdf', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'perfil.jpg', 95, 95025),
(6, 100002222, 2, 'Camilo', 'Torres', 1, 3215698568, 'myke@gmail.com', 2, 15, '2023-06-14', '1988-06-06', 'Documento_1000022222.pdf', 'Certificacion_Documento_1000022222.pdf', '5dd3770a6852536fadbc5c0581d6509d06c08b30', 'perfil.jpg', 94, 94884),
(20, 2147483647, 2, 'Camila', 'Andrea', 3, 3333333333, 'valorant@gmail.com', 2, 18, '2023-06-14', '2000-02-05', 'Documento_2222222234.pdf', 'Certificacion_Documento_2222222234.pdf', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'perfil.jpg', 41, 41396),
(21, 1111110000, 2, 'Andres', 'Jaime', 2, 3192588638, 'jonatanbecerra7@gmail.com', 2, 7, '2023-06-14', '2023-06-14', 'Documento_1111110000.pdf', 'Certificacion_Documento_1111110000.pdf', '952a7c238933b79813ee1e70179d52635c0b6c7c', 'perfil.jpg', 27, 27361),
(22, 1233454, 1, 'Jaime', 'Beltran', 1, 3192588638, 'jonatanbecerra7@gmail.com', 2, 16, '2023-06-14', '1990-12-12', 'Documento_1233454.pdf', 'Certificacion_Documento_1233454.pdf', '048e01bc60f0ed6abc43fda887d1b9646230038a', 'perfil.jpg', 19, 19022),
(28, 12224500, 2, 'alvaro', ' velez', 3, 3215536658, 'paraco@gmail.com', 1, 19, '2023-06-21', '1970-02-22', 'Documento_2222144255.pdf', 'Certificacion_Documento_2222144255.pdf', '7cd2714259c8bf587676c8121c2244434d156c2f', 'perfil.jpg', 95, 95001),
(29, 32565, 2, 'Jaramillo', 'velez', 1, 3215536658, 'paraco@gmail.com', 1, 19, '2023-06-21', '1970-02-22', 'Documento_32565.pdf', 'Certificacion_Documento_32565.pdf', 'c9dfc5c52e408003f0753dfe72344c6235d4b6ef', 'perfil.jpg', 23, 23570),
(30, 55234442, 2, 'Fabian', 'Jimenez', 1, 3256584475, 'feid@gmail.com', 1, 5, '2023-06-22', '2000-02-01', 'Documento_55234442.pdf', 'Certificacion_Documento_55234442.pdf', '42fc8411cae7e123be9bc048cdf9f901b1eafa78', 'perfil.jpg', 95, 95025),
(34, 54441002, 1, 'Pedro', 'Arevalo', 1, 3002144556, 'bob@gmail.com', 2, 7, '2023-06-26', '2006-02-10', 'Documento_5444100202.pdf', 'Certificacion_Documento_5444100202.pdf', '1776c48433b904d35e4f0452cba1b4b1ca933733', 'perfil.jpg', 27, 27413),
(37, 2156745, 2, 'Juan', 'Martinez', 1, 3201145788, 'free@gmail.com', 2, 17, '2023-06-26', '2006-02-20', 'Documento_2156745.pdf', 'Certificacion_Documento_2156745.pdf', 'c9b626caf9f37d9e35532a53806fd1d79cb4ae05', 'perfil.jpg', 94, 94343),
(38, 1003585877, 2, 'Jorge', 'Carrascal', 3, 3215693254, 'jorge@gmail.com', 2, 6, '2023-07-05', '2007-06-05', 'Documento_1003585877.pdf', 'Certificacion_Documento_1003585877.pdf', 'b2f3e316bd600a2f582d70f86336edeacc5cca36', 'perfil.jpg', 25, 25875),
(39, 2111444786, 1, 'Pepe', 'Jimenez', 3, 2565654546, 'pepito@gmail.com', 2, 7, '2023-07-05', '2008-02-10', 'Documento_2111444786.pdf', 'Certificacion_Documento_2111444786.pdf', '91e0835e8d5d7b6f0c4b8be6a61e0ca884afc8ab', 'perfil.jpg', 25, 25875),
(40, 1200036644, 2, 'Jonatan', 'Gutierrez', 1, 3103298033, 'jonatan@gmail.com', 2, 7, '2023-07-09', '2000-02-02', 'Documento_1200036644.pdf', 'Certificacion_Documento_1200036644.pdf', '91cd097b0e4bdb2ac3d320d2b239ec5408f4364a', 'perfil.jpg', 94, 94343),
(41, 1158742588, 2, 'Maria', 'Nieto', 1, 3225669888, 'jonatan@gmail.com', 2, 6, '2023-07-09', '2023-07-09', 'Documento_1158742588.pdf', 'Certificacion_Documento_1158742588.pdf', '504a9b86fc3337a1c63e1ef586996642138ab66d', 'perfil.jpg', 95, 95025),
(42, 1003510987, 2, 'Martin', 'San juan', 1, 3213254444, 'maluma@gmail.com', 2, 6, '2023-07-10', '2000-02-10', 'Documento_1003510987.pdf', 'Certificacion_Documento_1003510987.pdf', 'c09e33f2d5cc1c78828f729c94feb27c5fbd5607', 'perfil.jpg', 25, 25875),
(43, 1003520999, 2, 'Jose', 'Becerra', 1, 3213240101, 'anuel@gmail.com', 2, 30, '2023-07-10', '2000-02-10', 'Documento_1003520999.pdf', 'Certificacion_Documento_1003520999.pdf', 'a2d5af9dd1b09d9bd475f6342fd81c709bf628ca', 'perfil.jpg', 25, 25875),
(45, 10056677, 2, 'Carlos', 'Florez', 1, 3192588638, 'carlos@gmail.com', 1, 6, '2023-11-27', '2000-06-27', 'Documento_10056677.pdf', 'Certificacion_Documento_10056677.pdf', '52753fdbf7161f499ccf59ea9114e418d8fe6506', 'perfil.jpg', 91, 91263),
(76, 211392111, 1, 'julian', 'Camilo', 2, 1, 'riquelme@gmail.com', 2, 1, '2023-11-30', '2023-10-10', NULL, NULL, '3f397e0a0bac036bfbdd58dbb5dbec898d9a4492', 'perfil.jpg', 5, 5001),
(77, 31122220, 3, 'pedro', 'Perez', 1, 3, 'juan@gmail.com', 1, 1, '2023-11-30', '2023-10-11', NULL, NULL, 'ca06a298a5b6175b00df671d4b7069a5b8d2bee1', 'perfil.jpg', 5, 5001),
(78, 1007418534, 2, 'Jonatan Andres', 'Sanchez', 1, 3192588638, 'jonatanbecerra@gmail.com', 2, 30, '2023-12-05', '2007-08-20', 'Documento_1007418534.pdf', 'Certificacion_Documento_1007418534.pdf', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'perfil.jpg', 25, 25875),
(79, 1007418536, 2, 'Juan Esteban', 'Gutierrez', 1, 3192588434, 'Juan@gmail.com', 2, 30, '2023-12-06', '2000-09-20', 'Documento_1007418536.pdf', 'Certificacion_Documento_1007418536.pdf', 'f8c0ab78625264a887a1d4a346fe8846c5d3c656', 'perfil.jpg', 25, 25875);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poblacion`
--

CREATE TABLE `poblacion` (
  `id` int(11) NOT NULL,
  `nombrepob` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `poblacion`
--

INSERT INTO `poblacion` (`id`, `nombrepob`) VALUES
(1, 'ABANDONO O DESPOJO FORZADO DE TIERRAS'),
(2, 'ACTOS TERRORISTA/ATENTADOS/COMBATES/ENFRENTAMIENTOS/HOSTIGAMIENTOS'),
(3, 'ADOLESCENTE DESVINCULADO DE GRUPOS ARMADOS ORGANIZ'),
(4, 'ADOLESCENTE EN CONFLICTO CON LA LEY PENAL'),
(5, 'ADOLESCENTE TRABAJADOR'),
(6, 'AMENAZA'),
(7, 'ARTESANOS'),
(8, 'DELITOS CONTRA LA LIBERTAD Y LA INTEGRIDAD SEXUAL EN DESARROLLO DEL CONFLICTO ARMADO'),
(9, 'DESAPARICIÓN FORZADA'),
(10, 'DESPLAZADOS DISCAPACITADOS'),
(11, 'DESPLAZADOS POR FENOMENOS NATURALES'),
(12, 'DESPLAZADOS POR FENÓMENOS NATURALES CABEZA DE FAMI'),
(13, 'DESPLAZADOS POR LA VIOLENCIA'),
(14, 'DESPLAZADOS POR LA VIOLENCIA CABEZA DE FAMILIA'),
(15, 'DISCAPACIDAD INTELECTUAL'),
(16, 'DISCAPACIDAD AUDITIVA'),
(17, 'DISCAPACIDAD FÍSICA'),
(18, 'DISCAPACIDAD VISUAL'),
(19, 'DISCAPACIDAD PSICOSOCIAL'),
(20, 'DISCAPACIDAD MÚLTIPLE'),
(21, 'SORDOCEGUERA'),
(22, 'EMPRENDEDORES'),
(23, 'HERIDO'),
(24, 'HOMICIDIO / MASACRE'),
(25, 'INPEC'),
(26, 'JOVENES VULNERABLES'),
(27, 'MICROEMPRESAS'),
(28, 'MINAS ANTIPERSONAL, MUNICIÓN SIN EXPLOTAR, Y ARTEFACTO «EXPLOSIVO IMPROVISADO'),
(29, 'MUJER CABEZA DE FAMILIA'),
(30, 'NINGUNA'),
(31, 'PERSONAS EN PROCESO DE REINTEGRACIÓN'),
(32, 'RECLUTAMIENTO FORZADO'),
(33, 'REMITIDOS POR EL CIE'),
(34, 'REMITIDOS POR EL PAL'),
(35, 'SECUESTRO'),
(36, 'SOBREVIVIENTES MINAS ANTIPERSONALES'),
(37, 'SOLDADOS CAMPESINOS'),
(38, 'TERCERA EDAD'),
(39, 'TORTURA'),
(40, 'VINCULACIÓN DE NIÑOS, NIÑAS Y ADOLESCENTES A ACTIVIDADES RELACIONADAS CON GRUPOS ARMADOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroconv`
--

CREATE TABLE `registroconv` (
  `id` int(11) NOT NULL,
  `nDocreg` int(11) NOT NULL,
  `convocatorias` int(11) NOT NULL,
  `fechareg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registroconv`
--

INSERT INTO `registroconv` (`id`, `nDocreg`, `convocatorias`, `fechareg`) VALUES
(11, 1007418536, 2563486, '2023-12-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombrerol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombrerol`) VALUES
(1, 'Instructor'),
(2, 'Aprendiz'),
(3, 'Coordinador'),
(4, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocurso`
--

CREATE TABLE `tipocurso` (
  `id` int(11) NOT NULL,
  `tipoCurso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipocurso`
--

INSERT INTO `tipocurso` (`id`, `tipoCurso`) VALUES
(1, 'Tecnico'),
(2, 'Tecnologo'),
(3, 'Complementario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `id` int(11) NOT NULL,
  `nombretd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`id`, `nombretd`) VALUES
(1, 'Tarjeta de identidad'),
(2, 'Cedula de ciudadania'),
(3, 'Pasaporte'),
(4, 'Registro civil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoestructura`
--

CREATE TABLE `tipoestructura` (
  `id` int(11) NOT NULL,
  `TEnombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoestructura`
--

INSERT INTO `tipoestructura` (`id`, `TEnombre`) VALUES
(1, 'Técnica'),
(2, 'Básica'),
(3, 'Inducción O Etapa Productiva');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`codigoCiudad`),
  ADD KEY `codigoDepartamento` (`codigoDepartamento`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nDocu` (`nDocu`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `convocatorias`
--
ALTER TABLE `convocatorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jornada` (`id_jornada`),
  ADD KEY `nDoc_responsable` (`nDoc_responsable`),
  ADD KEY `tipoCurso` (`tCurso`),
  ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`codigoDepartamento`);

--
-- Indices de la tabla `estructuracurri`
--
ALTER TABLE `estructuracurri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ficha` (`ficha`),
  ADD KEY `tCompetencia` (`tCompetencia`);

--
-- Indices de la tabla `estudio`
--
ALTER TABLE `estudio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombreMes` (`nombreMes`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nosotros`
--
ALTER TABLE `nosotros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docuemisor` (`docuemisor`),
  ADD KEY `docureceptor` (`docureceptor`);

--
-- Indices de la tabla `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nDoc` (`nDoc`),
  ADD KEY `rol` (`rol`),
  ADD KEY `tDoc` (`tDoc`),
  ADD KEY `id_depa` (`id_depa`),
  ADD KEY `id_muni` (`id_muni`),
  ADD KEY `tpoblacion` (`tpoblacion`),
  ADD KEY `genero` (`genero`);

--
-- Indices de la tabla `poblacion`
--
ALTER TABLE `poblacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registroconv`
--
ALTER TABLE `registroconv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `convocatorias` (`convocatorias`),
  ADD KEY `nDocreg` (`nDocreg`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipocurso`
--
ALTER TABLE `tipocurso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoestructura`
--
ALTER TABLE `tipoestructura`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `convocatorias`
--
ALTER TABLE `convocatorias`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estructuracurri`
--
ALTER TABLE `estructuracurri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `estudio`
--
ALTER TABLE `estudio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `jornada`
--
ALTER TABLE `jornada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `meses`
--
ALTER TABLE `meses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `nosotros`
--
ALTER TABLE `nosotros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `poblacion`
--
ALTER TABLE `poblacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `registroconv`
--
ALTER TABLE `registroconv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipocurso`
--
ALTER TABLE `tipocurso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipoestructura`
--
ALTER TABLE `tipoestructura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`codigoDepartamento`) REFERENCES `departamentos` (`codigoDepartamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`nDocu`) REFERENCES `person` (`nDoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `convocatorias`
--
ALTER TABLE `convocatorias`
  ADD CONSTRAINT `convocatorias_ibfk_1` FOREIGN KEY (`id_jornada`) REFERENCES `jornada` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `convocatorias_ibfk_2` FOREIGN KEY (`nDoc_responsable`) REFERENCES `person` (`nDoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `convocatorias_ibfk_3` FOREIGN KEY (`tCurso`) REFERENCES `tipocurso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estructuracurri`
--
ALTER TABLE `estructuracurri`
  ADD CONSTRAINT `estructuracurri_ibfk_1` FOREIGN KEY (`ficha`) REFERENCES `convocatorias` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estructuracurri_ibfk_2` FOREIGN KEY (`tCompetencia`) REFERENCES `tipoestructura` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudio`
--
ALTER TABLE `estudio`
  ADD CONSTRAINT `estudio_ibfk_1` FOREIGN KEY (`nombreMes`) REFERENCES `meses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`docuemisor`) REFERENCES `person` (`nDoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notificaciones_ibfk_2` FOREIGN KEY (`docureceptor`) REFERENCES `person` (`nDoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `person_ibfk_2` FOREIGN KEY (`tDoc`) REFERENCES `tipodocumento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `person_ibfk_3` FOREIGN KEY (`id_depa`) REFERENCES `departamentos` (`codigoDepartamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `person_ibfk_4` FOREIGN KEY (`id_muni`) REFERENCES `ciudad` (`codigoCiudad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `person_ibfk_5` FOREIGN KEY (`tpoblacion`) REFERENCES `poblacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `person_ibfk_6` FOREIGN KEY (`genero`) REFERENCES `genero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registroconv`
--
ALTER TABLE `registroconv`
  ADD CONSTRAINT `registroconv_ibfk_1` FOREIGN KEY (`nDocreg`) REFERENCES `person` (`nDoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registroconv_ibfk_2` FOREIGN KEY (`convocatorias`) REFERENCES `convocatorias` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

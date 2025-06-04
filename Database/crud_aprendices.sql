/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `crud_aprendices` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `crud_aprendices`;

CREATE TABLE IF NOT EXISTS `aprendices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id_tipo_documento` int NOT NULL DEFAULT '0',
  `n_documento` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_g_sanguineo` int NOT NULL DEFAULT '0',
  `id_f_sanguineo` int NOT NULL DEFAULT '0',
  `id_genero` int NOT NULL,
  `id_programa` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_aprendices_tipos_documento` (`id_tipo_documento`),
  KEY `FK_aprendices_grupos_sanguineos` (`id_g_sanguineo`),
  KEY `FK_aprendices_factores_sanguineos` (`id_f_sanguineo`),
  KEY `FK_aprendices_generos` (`id_genero`),
  KEY `FK_aprendices_programas_formacion` (`id_programa`),
  CONSTRAINT `FK_aprendices_factores_sanguineos` FOREIGN KEY (`id_f_sanguineo`) REFERENCES `factores_sanguineos` (`id`),
  CONSTRAINT `FK_aprendices_generos` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`),
  CONSTRAINT `FK_aprendices_grupos_sanguineos` FOREIGN KEY (`id_g_sanguineo`) REFERENCES `grupos_sanguineos` (`id`),
  CONSTRAINT `FK_aprendices_programas_formacion` FOREIGN KEY (`id_programa`) REFERENCES `programas_formacion` (`id`),
  CONSTRAINT `FK_aprendices_tipos_documento` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipos_documento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `aprendices` (`id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `fecha_nacimiento`, `id_tipo_documento`, `n_documento`, `id_g_sanguineo`, `id_f_sanguineo`, `id_genero`, `id_programa`) VALUES
	(40, 'Nicolás', 'Antonio', 'Arrieta', 'Lagos', '2004-10-29', 1, '1099735735', 4, 1, 1, 1);

CREATE TABLE IF NOT EXISTS `factores_sanguineos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `factor` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `factores_sanguineos` (`id`, `factor`) VALUES
	(1, '+'),
	(2, '-');

CREATE TABLE IF NOT EXISTS `generos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_genero` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `generos` (`id`, `nombre_genero`) VALUES
	(1, 'MASCULINO'),
	(2, 'FEMENINO'),
	(3, 'OTRO');

CREATE TABLE IF NOT EXISTS `grupos_sanguineos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grupo` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `grupos_sanguineos` (`id`, `grupo`) VALUES
	(1, 'A'),
	(2, 'B'),
	(3, 'AB'),
	(4, 'O');

CREATE TABLE IF NOT EXISTS `programas_fichas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_programa` int NOT NULL,
  `fecha_inicio` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__programas_formacion` (`id_programa`),
  CONSTRAINT `FK__programas_formacion` FOREIGN KEY (`id_programa`) REFERENCES `programas_formacion` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `programas_fichas` (`id`, `id_programa`, `fecha_inicio`) VALUES
	(1, 1, '2024-04-15'),
	(2, 2, '2024-04-13'),
	(3, 3, '2024-05-14'),
	(4, 1, '2025-02-09');

CREATE TABLE IF NOT EXISTS `programas_formacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `programa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_tipo_programa` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_programas_formacion_tipos_programas` (`id_tipo_programa`),
  CONSTRAINT `FK_programas_formacion_tipos_programas` FOREIGN KEY (`id_tipo_programa`) REFERENCES `tipos_programas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `programas_formacion` (`id`, `programa`, `id_tipo_programa`) VALUES
	(1, 'ADSO', 2),
	(2, 'TALENTO HUMANO', 2),
	(3, 'SST', 2);

CREATE TABLE IF NOT EXISTS `tipos_documento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tipos_documento` (`id`, `tipo`) VALUES
	(1, 'CÉDULA DE CIUDADANÍA'),
	(2, 'TARJETA DE IDENTIDAD'),
	(3, 'REGISTRO CIVIL '),
	(4, 'CÉDULA DE EXTRANJERÍA'),
	(5, 'PASAPORTE');

CREATE TABLE IF NOT EXISTS `tipos_programas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tipos_programas` (`id`, `nombre_tipo`) VALUES
	(1, 'TÉNICO'),
	(2, 'TECNÓLOGO'),
	(3, 'OPERARIO'),
	(4, 'COMPLEMENTARIO'),
	(5, 'AUXILIAR'),
	(6, 'CURSO');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */; ddd


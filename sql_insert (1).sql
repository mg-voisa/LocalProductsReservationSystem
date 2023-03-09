-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_local_prod
CREATE DATABASE IF NOT EXISTS `db_local_prod` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_local_prod`;

-- Dumping structure for table db_local_prod.categorii
CREATE TABLE IF NOT EXISTS `categorii` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `denumire` varchar(100) DEFAULT NULL,
  `active` varchar(100) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_local_prod.categorii: ~0 rows (approximately)
/*!40000 ALTER TABLE `categorii` DISABLE KEYS */;
INSERT INTO `categorii` (`id`, `denumire`, `active`) VALUES
	(1, 'produse din lapte', '1'),
	(2, 'produse din carne', '1'),
	(3, 'produse cu oua', '1'),
	(4, 'dulceturi', '1'),
	(5, 'compoturi', '1'),
	(6, 'siropuri', '1'),
	(7, 'plante medicinale', '1'),
	(8, 'bauturi', '1'),
	(9, 'sosuri', '1'),
	(10, 'muraturi', '1'),
	(11, 'conserve', '1'),
	(12, 'prajituri', '1'),
	(13, 'cadouri', '1'),
	(14, 'condimente', '1'),
	(15, 'faina', '1'),
	(16, 'legume', '1'),
	(17, 'fructe', '1');
/*!40000 ALTER TABLE `categorii` ENABLE KEYS */;

-- Dumping structure for table db_local_prod.comenzi
CREATE TABLE IF NOT EXISTS `comenzi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nr_comanda` varchar(100) DEFAULT NULL,
  `valoare` decimal(10,2) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `data_comanda` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `trimisa` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `comenzi_FK` (`id_user`),
  CONSTRAINT `comenzi_FK` FOREIGN KEY (`id_user`) REFERENCES `utilizatori` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_local_prod.comenzi: ~0 rows (approximately)
/*!40000 ALTER TABLE `comenzi` DISABLE KEYS */;
/*!40000 ALTER TABLE `comenzi` ENABLE KEYS */;

-- Dumping structure for table db_local_prod.comenzi_produse
CREATE TABLE IF NOT EXISTS `comenzi_produse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_comanda` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `comenzi_produse_FK` (`id_comanda`),
  KEY `comenzi_produse_FK_1` (`id_produs`),
  CONSTRAINT `comenzi_produse_FK` FOREIGN KEY (`id_comanda`) REFERENCES `comenzi` (`id`),
  CONSTRAINT `comenzi_produse_FK_1` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_local_prod.comenzi_produse: ~0 rows (approximately)
/*!40000 ALTER TABLE `comenzi_produse` DISABLE KEYS */;
/*!40000 ALTER TABLE `comenzi_produse` ENABLE KEYS */;

-- Dumping structure for table db_local_prod.ingrediente
CREATE TABLE IF NOT EXISTS `ingrediente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(100) COLLATE utf16_romanian_ci DEFAULT NULL,
  `qty` decimal(20,6) DEFAULT NULL,
  `um` varchar(50) COLLATE utf16_romanian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf16 COLLATE=utf16_romanian_ci;

-- Dumping data for table db_local_prod.ingrediente: ~0 rows (approximately)
/*!40000 ALTER TABLE `ingrediente` DISABLE KEYS */;
/*!40000 ALTER TABLE `ingrediente` ENABLE KEYS */;

-- Dumping structure for table db_local_prod.istoric
CREATE TABLE IF NOT EXISTS `istoric` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nr_produse` decimal(10,0) NOT NULL,
  `valoare` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_local_prod.istoric: ~0 rows (approximately)
/*!40000 ALTER TABLE `istoric` DISABLE KEYS */;
/*!40000 ALTER TABLE `istoric` ENABLE KEYS */;

-- Dumping structure for table db_local_prod.produse
CREATE TABLE IF NOT EXISTS `produse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) DEFAULT NULL,
  `produs` varchar(100) DEFAULT NULL,
  `pret` decimal(10,0) DEFAULT NULL,
  `poza` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `url_img` varchar(100) DEFAULT NULL,
  `sters` int(11) DEFAULT '0',
  `ingrediente` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_local_prod.produse: ~0 rows (approximately)
/*!40000 ALTER TABLE `produse` DISABLE KEYS */;
INSERT INTO `produse` (`id`, `id_categorie`, `produs`, `pret`, `poza`, `created_at`, `modified_at`, `url_img`, `sters`, `ingrediente`) VALUES
	(1, 1, 'pita', 3, 'image.png', '2023-02-22 15:37:42', '2023-02-22 15:39:29', 'path/to/img', 0, NULL);
/*!40000 ALTER TABLE `produse` ENABLE KEYS */;

-- Dumping structure for table db_local_prod.produse_ingrediente
CREATE TABLE IF NOT EXISTS `produse_ingrediente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produs` int(11) DEFAULT NULL,
  `activ_status` int(11) DEFAULT NULL,
  `id_ingrediente` int(11) DEFAULT NULL,
  `qty` decimal(20,6) DEFAULT NULL,
  `um` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__produse` (`id_produs`),
  KEY `FK__ingrediente` (`id_ingrediente`),
  CONSTRAINT `FK__ingrediente` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingrediente` (`id`),
  CONSTRAINT `FK__produse` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table db_local_prod.produse_ingrediente: ~0 rows (approximately)
/*!40000 ALTER TABLE `produse_ingrediente` DISABLE KEYS */;
/*!40000 ALTER TABLE `produse_ingrediente` ENABLE KEYS */;

-- Dumping structure for table db_local_prod.tip_utilizator
CREATE TABLE IF NOT EXISTS `tip_utilizator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `denumire` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_local_prod.tip_utilizator: ~0 rows (approximately)
/*!40000 ALTER TABLE `tip_utilizator` DISABLE KEYS */;
INSERT INTO `tip_utilizator` (`id`, `denumire`) VALUES
	(1, 'superadmin'),
	(2, 'admin'),
	(3, 'producator'),
	(4, 'cumparator');
/*!40000 ALTER TABLE `tip_utilizator` ENABLE KEYS */;

-- Dumping structure for table db_local_prod.utilizatori
CREATE TABLE IF NOT EXISTS `utilizatori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(100) DEFAULT NULL,
  `prenume` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `parola` varchar(100) DEFAULT NULL,
  `tip` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_local_prod.utilizatori: ~0 rows (approximately)
/*!40000 ALTER TABLE `utilizatori` DISABLE KEYS */;
INSERT INTO `utilizatori` (`id`, `nume`, `prenume`, `email`, `parola`, `tip`, `created_at`) VALUES
	(1, 'voisa', 'gigel', 'voisa.gigel@gmail.com', '1234', 1, '2023-02-22 15:47:10'),
	(2, 'voisa', 'gabriel', NULL, NULL, NULL, '2023-02-22 15:47:36');
/*!40000 ALTER TABLE `utilizatori` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

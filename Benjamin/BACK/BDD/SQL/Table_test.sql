DROP DATABASE IF EXISTS Table_test;
CREATE DATABASE Table_test;
USE Table_test;

CREATE TABLE `station` (
	`sta_num` varchar(50) NOT NULL,
	`sta_nom` varchar(50) NOT NULL,
	KEY `Index 1` (`sta_num`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;
CREATE TABLE `client` (
	`cli_adress` varchar(50) NOT NULL,
	`cli_nom` varchar(50) NOT NULL,
	`cli_prenom` varchar(50) NOT NULL,
	`cli_num` varchar(50) NOT NULL,
	KEY `Index 1` (`cli_num`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;
CREATE TABLE `hotel` (
	`hot_capacite` SMALLINT(6) NOT NULL DEFAULT '0',
	`hot_categorie` TINYINT(4) NOT NULL DEFAULT '0',
	`hot_nom` VARCHAR(50) NOT NULL,
	`hot_adresse` VARCHAR(50) NOT NULL,
	`hot_num` varchar(50) NOT NULL,
	`hot_stationNum` varchar(50) NOT NULL,
	KEY `Index 1` (`hot_num`),
    KEY `Index 2` (`hot_stationNum`),
	CONSTRAINT `FK_hotel_station` FOREIGN KEY (`hot_stationNum`) REFERENCES `station` (`sta_num`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;
CREATE TABLE `chambre` (
	`cha_capacite` TINYINT(4) NOT NULL,
	`cha_confort` TINYINT(4) NOT NULL,
	`cha_exposition` CHAR(50) NOT NULL,
	`cha_type` CHAR(50) NOT NULL,
	`cha_num` SMALLINT(6) NOT NULL,
	`cha_hotelNum` varchar(50) NOT NULL,
	KEY `Index 1` (`cha_num`),
 	KEY `Index 2` (`cha_hotelNum`),
  	CONSTRAINT `FK_chambre_hotel` FOREIGN KEY (`cha_hotelNum`) REFERENCES `hotel` (`hot_num`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;
CREATE TABLE `reservation` (
	`res_numChambre` SMALLINT(6) NOT NULL,
	`res_numClient` varchar(50) NOT NULL,
	`res_dateDebut` DATE NOT NULL,
	`res_dateFin` DATE NOT NULL,
	`res_dateRes` DATE NOT NULL,
	`res_montantArrhes` FLOAT NOT NULL DEFAULT '0',
	`res_prixTotal` FLOAT NOT NULL DEFAULT '0',
	KEY `Index 1` (`res_numChambre`),
  	KEY `Index 2` (`res_numClient`),
  	CONSTRAINT `FK_reservation_client` FOREIGN KEY (`res_numClient`) REFERENCES `client` (`cli_num`),
  	CONSTRAINT `chambre_reservation` FOREIGN KEY (`res_numChambre`) REFERENCES `chambre` (`cha_num`)
	
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;



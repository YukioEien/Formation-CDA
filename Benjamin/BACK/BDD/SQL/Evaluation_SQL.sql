DROP DATABASE IF EXISTS HOTEL;
CREATE DATABASE HOTEL;
USE HOTEL;

CREATE TABLE `Client` (
    `cli_num` INT(11) NOT NULL,
    `cli_nom` VARCHAR(50) NOT NULL,
    `cli_adresse` VARCHAR(50) NOT NULL,
    `cli_tel` VARCHAR(30) NOT NULL,
    KEY (`cli_num`),
    INDEX (`cli_nom`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;

CREATE TABLE `Produit`(
    `pro_num` INT (11) NOT NULL,
    `pro_libelle` VARCHAR(50) NOT NULL,
    `pro_description` VARCHAR(50) NOT NULL,
    KEY (`pro_num`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;

CREATE TABLE `Commande`(
    `com_num` INT(11) NOT NULL,
    `cli_num` INT(11) NOT NULL,
    `com_date` DATETIME,
    `com_obs` VARCHAR(50) NOT NULL,
    KEY (`com_num`),
    FOREIGN KEY (`cli_num`) REFERENCES `client`(`cli_num`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;
CREATE TABLE `est_compose`(
    `cli_num` INT(11) NOT NULL,
    `pro_num` INT(11) NOT NULL,
    `est_qte` INT(11) NOT NULL,
    FOREIGN KEY (`cli_num`) REFERENCES `Commande`(`cli_num`),
        KEY (`cli_num`),
    FOREIGN KEY (`pro_num`) REFERENCES `Produit`(`pro_num`),
        KEY (`pro_num`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;
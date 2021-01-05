DROP DATABASE if EXISTS exo1 ;
CREATE DATABASE `exo1`;
USE `exo1`;
CREATE TABLE Personne(
   per_num INT not NULL AUTO_INCREMENT,
   per_nom VARCHAR(50),
   per_prenom VARCHAR(50),
   per_adresse VARCHAR(50),
   per_ville VARCHAR(50),
   PRIMARY KEY(per_num)
);

CREATE TABLE Groupe(
   gro_num INT,
   gro_libelle VARCHAR(50),
   PRIMARY KEY(gro_num)
);

CREATE TABLE Appartient(
   per_num INT,
   gro_num INT,
   PRIMARY KEY(per_num, gro_num),
   FOREIGN KEY(per_num) REFERENCES `Personne`(per_num),
   FOREIGN KEY(gro_num) REFERENCES `Groupe`(gro_num)
);

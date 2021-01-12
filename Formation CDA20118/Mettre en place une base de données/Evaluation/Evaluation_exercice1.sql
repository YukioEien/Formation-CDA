DROP DATABASE if EXISTS exercice1 ;
CREATE DATABASE `exercice1`;
USE `exercice1`;
CREATE TABLE Client(
   cli_num INT,
   cli_nom VARCHAR(50),
   cli_adresse VARCHAR(50),
   cli_tel VARCHAR(30),
   PRIMARY KEY(cli_num)
);
CREATE INDEX cli_nom ON exercice1;
CREATE TABLE Commande(
   com_num INT,
   cli_num INT,
   com_date DATETIME,
   com_obs VARCHAR(50),
   PRIMARY KEY(com_num)
);

CREATE TABLE Produit(
   pro_num INT,
   pro_libelle VARCHAR(50),
   pro_description VARCHAR(50),
   PRIMARY KEY(pro_num)
);

CREATE TABLE est_compose(
   com_num INT,
   pro_num INT,
   est_qte INT,
   PRIMARY KEY(com_num, pro_num),
   FOREIGN KEY(com_num) REFERENCES Commande(com_num),
   FOREIGN KEY(pro_num) REFERENCES Produit(pro_num)
);

CREATE TABLE FK3(
   cli_num INT,
   com_num INT,
   PRIMARY KEY(cli_num, com_num),
   FOREIGN KEY(cli_num) REFERENCES Client(cli_num),
   FOREIGN KEY(com_num) REFERENCES Commande(com_num)
);

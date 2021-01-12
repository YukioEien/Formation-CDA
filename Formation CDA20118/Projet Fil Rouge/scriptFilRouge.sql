DROP DATABASE if exists filrouge;
CREATE DATABASE filrouge;
USE filrouge;

CREATE TABLE Produit(
   pro_id INT,
   pro_prix DECIMAL(15,2),
   pro_rubrique_id INT,
   pro_sous_rubrique_id INT,
   pro_mini_desc VARCHAR(40),
   pro_desc VARCHAR(200),
   pro_photo VARCHAR(50),
   pro_valide BOOLEAN,
   PRIMARY KEY(pro_id)
);

CREATE TABLE Constructeur(
   cons_pro_id INT,
   cons_nom VARCHAR(50),
   cons_adresse VARCHAR(60),
   PRIMARY KEY(cons_pro_id)
);

CREATE TABLE Rubrique(
   pro_id INT,
   rub_nom VARCHAR(50),
   PRIMARY KEY(pro_id),
   FOREIGN KEY(pro_id) REFERENCES Produit(pro_id)
);

CREATE TABLE Sous_rubrique(
   pro_id INT,
   sous_nom VARCHAR(50),
   PRIMARY KEY(pro_id),
   FOREIGN KEY(pro_id) REFERENCES Produit(pro_id)
);

CREATE TABLE Client(
   cli_nom VARCHAR(50),
   cli_prenom VARCHAR(50),
   cli_adresse VARCHAR(50),
   cli_telephone VARCHAR(10),
   cli_pays VARCHAR(50),
   cli_pro BOOLEAN,
   PRIMARY KEY(cli_nom)
);

CREATE TABLE Commande(
   com_id INT,
   com_adresse_livraison VARCHAR(50),
   com_adresse_facturation VARCHAR(50),
   com_plus_de_3ans BOOLEAN,
   cli_nom VARCHAR(50) NOT NULL,
   PRIMARY KEY(com_id),
   UNIQUE(cli_nom),
   FOREIGN KEY(cli_nom) REFERENCES Client(cli_nom)
);

CREATE TABLE stock(
   stock_id INT,
   stock_min INT,
   stock_max INT,
   stock_reel INT,
   PRIMARY KEY(stock_id)
);

CREATE TABLE Facture(
   fac_id INT,
   fac_total DECIMAL(15,2),
   fac_coef DECIMAL(2,2),
   fac_differe BOOLEAN,
   cli_nom VARCHAR(50) NOT NULL,
   PRIMARY KEY(fac_id),
   FOREIGN KEY(cli_nom) REFERENCES Client(cli_nom)
);

CREATE TABLE LivraisonClient(
   liv_id INT,
   liv_date DATETIME,
   liv_total DECIMAL(15,2),
   fac_id INT NOT NULL,
   com_id INT NOT NULL,
   PRIMARY KEY(liv_id),
   FOREIGN KEY(fac_id) REFERENCES Facture(fac_id),
   FOREIGN KEY(com_id) REFERENCES Commande(com_id)
);

CREATE TABLE Commande_fournisseur(
   com_fournisseur_num INT,
   com_importateur_date DATETIME,
   cons_pro_id INT NOT NULL,
   PRIMARY KEY(com_fournisseur_num),
   FOREIGN KEY(cons_pro_id) REFERENCES Constructeur(cons_pro_id)
);

CREATE TABLE Paiement_Fournisseur(
   paie_id INT,
   paie_date DATE,
   paie_total DECIMAL(15,2),
   PRIMARY KEY(paie_id)
);

CREATE TABLE Facture_achat(
   fac_id INT,
   fac_Date DATETIME,
   fac_montant DECIMAL(15,2),
   fac_coef DECIMAL(2,2),
   paie_id INT NOT NULL,
   cons_pro_id INT NOT NULL,
   PRIMARY KEY(fac_id),
   FOREIGN KEY(paie_id) REFERENCES Paiement_Fournisseur(paie_id),
   FOREIGN KEY(cons_pro_id) REFERENCES Constructeur(cons_pro_id)
);

CREATE TABLE Livraison_fournisseur(
   four_id INT,
   four_nom VARCHAR(50),
   four_adresse VARCHAR(100),
   fac_id INT NOT NULL,
   com_fournisseur_num INT NOT NULL,
   PRIMARY KEY(four_id),
   FOREIGN KEY(fac_id) REFERENCES Facture_achat(fac_id),
   FOREIGN KEY(com_fournisseur_num) REFERENCES Commande_fournisseur(com_fournisseur_num)
);

CREATE TABLE compte(
   pro_id INT,
   stock_id INT,
   PRIMARY KEY(pro_id, stock_id),
   FOREIGN KEY(pro_id) REFERENCES Produit(pro_id),
   FOREIGN KEY(stock_id) REFERENCES stock(stock_id)
);

CREATE TABLE commandeClient(
   pro_id INT,
   com_id INT,
   quantite_commande_client INT,
   PRIMARY KEY(pro_id, com_id),
   FOREIGN KEY(pro_id) REFERENCES Produit(pro_id),
   FOREIGN KEY(com_id) REFERENCES Commande(com_id)
);

CREATE TABLE ligne_livraisonClient(
   pro_id INT,
   liv_id INT,
   quantite_livre_client INT,
   nombre_produit_livre INT,
   total_prix_quantite_livre VARCHAR(50),
   PRIMARY KEY(pro_id, liv_id),
   FOREIGN KEY(pro_id) REFERENCES Produit(pro_id),
   FOREIGN KEY(liv_id) REFERENCES LivraisonClient(liv_id)
);

CREATE TABLE Ligne_Livraison_Importateur(
   pro_id INT,
   four_id INT,
   quantite_livre_importateur INT,
   nombre_produit_livre_importateur INT,
   total_prix_quantite_livre DECIMAL(15,2),
   PRIMARY KEY(pro_id, four_id),
   FOREIGN KEY(pro_id) REFERENCES Produit(pro_id),
   FOREIGN KEY(four_id) REFERENCES Livraison_fournisseur(four_id)
);
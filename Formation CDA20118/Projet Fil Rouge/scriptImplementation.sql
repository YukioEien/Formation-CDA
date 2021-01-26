INSERT INTO produit (pro_id, pro_prix, pro_rubrique_id, pro_sous_rubrique_id, pro_mini_desc, pro_desc, pro_photo, pro_valide)
VALUES (24.99, NULL, NULL, 'Mini description a compléter', 'Description a completer', 1, True),
       (19.99, NULL, NULL, 'Mini description a compléter', 'Description a completer', 1, True),
       (7.99, NULL, NULL, 'Mini description a compléter', 'Description a completer', 1, False),
       (39.99, NULL, NULL, 'Mini description a compléter', 'Description a completer', 1, True),
       (29.99, NULL, NULL, 'Mini description a compléter', 'Description a completer', 1, True),
       (14.99, NULL, NULL, 'Mini description a compléter', 'Description a completer', 1, True),
       (240, NULL, NULL, 'Mini description a compléter', 'Description a completer', 1, False),
       (149.99, NULL, NULL, 'Mini description a compléter', 'Description a completer', 1, False),
       (99.99, NULL, NULL, 'Mini description a compléter', 'Description a completer', 1, True),
       (9.99, NULL, NULL, 'Mini description a compléter', 'Description a completer', 1, True);

       INSERT INTO stock (stock_min, stock_max, stock_reel)
VALUES (0, 25, 4),
       (0, 25, 14),
       (0, 50, 0),
       (0, 15, 14),
       (0, 15, 12),
       (0, 30, 24),
       (0, 8, 0),
       (0, 10, 0),
       (0, 10, 6),
       (0, 25, 24);

       INSERT INTO Commande (com_adresse_livraison, com_adresse_facturation, com_plus_de_3ans)
VALUES ('1 rue des vignes 75000 Paris', '1 rue des vignes 75000 Paris', False),
       ('2 rue des vignes 75000 Paris', '2 rue des vignes 75000 Paris', False),
       ('3 rue des vignes 75000 Paris', '3 rue des vignes 75000 Paris', False),
       ('4 rue des vignes 75000 Paris', '4 rue des vignes 75000 Paris', False),
       ('5 rue des vignes 75000 Paris', '5 rue des vignes 75000 Paris', True),
       ('6 rue des vignes 75000 Paris', '6 rue des vignes 75000 Paris', False),
       ('7 rue des vignes 75000 Paris', '7 rue des vignes 75000 Paris', False);

INSERT INTO Client (cli_nom, cli_prenom, cli_adresse, cli_telephone, cli_pays, cli_pro)
VALUES ('Jean', 'Martin', '2 rue a coté 75000', '0321232123', 'France', False),
       ('Philippe', 'Maurice', '6 rue pas beaucoup plus loin 75000', '0321232123', 'France', False),
       ('Etienne', 'Maurice', '7 rue a deux pas 75000', '0321232123', 'France', True),
       ('Jean', 'Claude', '4 rue vers la bas 75000', '0321232123', 'France', False),
       ('Jean', 'Marty', '1 rue juste a droite 75000', '0321232123', 'France', True),
       ('Jean', 'Malou', '14 rue tout en haut 75000', '0321232123', 'France', False);

INSERT INTO Facture (fac_total, fac_coef, fac_differe)
VALUES (149.99, 1, False),
       (210, 1, False),
       (49.99, 1, True),
       (29.99, 1, False),
       (109.98, 1, False);

INSERT INTO livraisonClient (liv_date, liv_total)
Values ('12/01/2019', 159.99),
       ('18/06/2020', 220),
       ('24/01/2019', 44.99),
       ('21/04/2018', 34.99),
       ('13/01/2021', 119.98);

Insert INTO Ligne_LivraisonClient (quantite_livre_client, nombre_produit_livre, total_prix_quantite_livre)
VALUES (4, 4, 159.99),
       (2, 2, 220),
       (1, 1, 44.99),
       (1, 1, 29.99),
       (2, 2, 119.98);
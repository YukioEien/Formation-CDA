--N°1 : Selectionner les contacts Français. (par ordre alphabétique comme le montre le screenshot)
SELECT CompanyName,ContactName,ContactTitle,Phone 
FROM `northwind`.`customers`
WHERE (Country) = 'France'
ORDER BY CompanyName ASC;
--N°2 : Selectionner les produits vendues par le fournisseur "Exotic Liquids".
SELECT ProductName,UnitPrice FROM `northwind`.`products` WHERE (SupplierID) = '1';
--N°3 : Selectionner le nombre de produits vendus par les fournisseurs Français dans l'ordre décroissant:

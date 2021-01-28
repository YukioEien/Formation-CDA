--N°1 : Selectionner les contacts Français. (par ordre alphabétique comme le montre le screenshot)
SELECT `CompanyName` AS 'Société',`ContactName` AS 'Contact',`ContactTitle` AS 'Fonction',`Phone` AS 'Téléphone'
FROM `northwind`.`customers`
WHERE `Country` = 'France'
ORDER BY `CompanyName` ASC;

--N°2 : Selectionner les produits vendues par le fournisseur "Exotic Liquids".
SELECT `ProductName` AS 'Produit',`UnitPrice` AS 'Prix'
FROM `northwind`.`products`
WHERE `SupplierID` = '1';

--N°3 : Selectionner le nombre de produits vendus par les fournisseurs Français dans l'ordre décroissant:
SELECT `CompanyName` AS 'Fournisseur', COUNT(`products`.`SupplierID`) AS 'Nbre produits'
FROM `suppliers`
JOIN `products` on `products`.`SupplierID` = `suppliers`.`SupplierID`
WHERE `Country` = 'France'
GROUP BY `CompanyName`
ORDER BY COUNT(`SupplierID`) DESC;

--N°4 : Selectionner la liste des clients Français ayant plus de 10 commandes :
SELECT `Shipname` AS 'Client',COUNT(`ShipName`) AS 'Nbre commandes'
FROM `orders` 
WHERE `ShipCountry` = 'France'
GROUP BY `Shipname` 
HAVING COUNT(`Shipname`) > 10
ORDER BY `Shipname` ;

--N°5 : Selectionner la liste des clients ayant un chiffre d’affaires supérieur à 30.000 :

--ici, je n'ai pas trouvé les données qu'il fallait pour trouver le bon résultat, j'ai utilisé la clause WHERE (qui je pense était le but de l'exercice donné)
SELECT CompanyName , UnitPrice * Quantity AS 'CA', country FROM  `order details`
JOIN orders on orders.orderID = `order details`.orderID
JOIN customers ON customers.customerID = orders.customerID
WHERE UnitPrice * Quantity > 30000
GROUP BY orders.CustomerID
order BY CA DESC

--N°6 : Selectionner la liste des pays dont les clients ont passé commande de produits fournis par « Exotic Liquids » :

SELECT ShipCountry AS 'Pays'FROM ORDERS
LEFT JOIN suppliers ON suppliers.Country = orders.ShipCountry
LEFT JOIN products ON products.SupplierID = suppliers.supplierID
LEFT JOIN `order details` ON `order details`.productID = products.ProductID
WHERE products.SupplierID = 1 OR products.SupplierID = 2  OR products.SupplierID = 3
GROUP BY shipcountry

--N°7 : Selectionner le montant des ventes de 1997 :

SELECT Sum(UnitPrice * Quantity) AS 'Montant Ventes 1997' 
FROM orders JOIN `order details`
ON orders.OrderID = `order details`.OrderID
WHERE orderdate 
BETWEEN '1997-01-01 00:00:00' AND '1997-12-31 23:59:59'

--N°8 : Selectionner le montant des ventes de 1997 mois par mois :

SELECT
	EXTRACT(MONTH FROM orderdate) 'Mois 97',
	sum(UnitPrice * Quantity) AS 'Montant ventes'
FROM orders 
JOIN `order details` ON orders.orderID = `order details`.OrderID
WHERE EXTRACT(YEAR FROM orderdate) = 1997
GROUP BY
	EXTRACT(MONTH FROM orderdate)
ORDER BY 
	1,2;
	
--N°9 : Selectionner depuis quelle date le client « Du monde entier » n’a plus commandé ?

SELECT orders.OrderDate AS `Date de la dernière commande`
FROM northwind.orders
JOIN northwind.`order details` ON northwind.`order details`.OrderID = orders.OrderID
WHERE orders.OrderDate = (SELECT MAX(orders.OrderDate) FROM orders) 
GROUP BY orders.OrderDate;

--N°10 : Selectionner le délai moyen de livraison en jours :

SELECT ROUND(AVG(DATEDIFF(shippeddate, orderdate))) AS 'Délai moyen de livraison en jours' FROM orders

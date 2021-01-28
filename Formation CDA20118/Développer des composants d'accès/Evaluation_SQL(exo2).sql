--Depuis quelle date le client « Du monde entier » n’a plus commandé ?
DELIMITER |
CREATE PROCEDURE northwind.`requete1`( IN ShipName VARCHAR(20))
BEGIN 
SELECT orders.OrderDate AS `Date de la dernière commande`
FROM orders
JOIN northwind.`order details` ON northwind.`order details`.OrderID = orders.OrderID
WHERE orders.OrderDate = (SELECT MAX(orders.OrderDate) FROM orders) 
GROUP BY orders.OrderDate;
END 

DELIMITER ;

<?php

//Connexion a la BDD
try
{
    $db = new PDO("mysql:host=localhost; charset=utf8; dbname=record; port=8080", "root", "");

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die('Fin du script');
}
?>
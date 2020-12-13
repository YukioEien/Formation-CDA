<?php
try{
    // Connexion à la base
    $db = new PDO('mysql:host=localhost;dbname=nbenj', 'nbenj', 'nb20114');
    $db->exec('SET NAMES "UTF8"');
} catch (PDOException $e){
    echo 'Erreur : '. $e->getMessage();
    die();
}
<?php
session_start();

            
                    
                    require_once('connect.php');

                    $pro_id = strip_tags($_GET['pro_id']);

                    $sql = 'SELECT * FROM `produits` WHERE `pro_id` =:id;';

                    $query = $db->prepare($sql);

                    $query->bindvalue(':id', $pro_id, PDO::PARAM_INT);

                    $query->execute();

                    $produit = $query->fetch();

                    if (!$produit)
                            {
                                $_SESSION['erreur'] = 'Cet ID n\'existe pas';
                               
                                die();
                            }

                    $sql = 'DELETE FROM `produits` WHERE `pro_id` =:id;';

                    $query = $db->prepare($sql);

                    $query->bindvalue(':id', $pro_id, PDO::PARAM_INT);

                    $query->execute();

                    $_SESSION['message'] = 'Produit supprimé';
                    header('Location: index.php');
                    
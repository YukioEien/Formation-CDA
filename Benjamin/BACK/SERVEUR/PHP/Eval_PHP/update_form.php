<?php
// On démarre une session
session_start();

if (isset($_GET['pro_id']) && !empty($_GET['pro_id']))
                    {
                    require_once('connect.php');

                    $pro_id = strip_tags($_GET['pro_id']);

                    $sql = 'SELECT * FROM `produits` WHERE `pro_id` = :id;';

                    $query = $db->prepare($sql);

                    $query->bindvalue(':id', $pro_id, PDO::PARAM_INT);

                    $query->execute();

                    $produit = $query->fetch();

                    if (!$produit)
                            {
                                $_SESSION['erreur'] = 'Cet ID n\'existe pas';
                                header('Location: index.php');
                            }
                        }

if($_POST){
    if(isset($_POST['pro_ref']) && !empty($_POST['pro_ref'])
    && isset($_POST['pro_id']) && !empty($_POST['pro_id'])
    && isset($_POST['pro_description']) && !empty($_POST['pro_description'])
    && isset($_POST['pro_prix']) && !empty($_POST['pro_prix'])
    && isset($_POST['pro_stock']) && !empty($_POST['pro_stock'])
    && isset($_POST['pro_couleur']) && !empty($_POST['pro_couleur'])
    && isset($_POST['pro_bloque']) && !empty($_POST['pro_bloque'])
    && isset($_POST['pro_d_ajout']) && !empty($_POST['pro_d_ajout'])){
        // On inclut la connexion à la base
       
            try{

    // Connexion à la base


                $db = new PDO('mysql:host=localhost;dbname=jarditou', 'root', '');
                $db->exec('SET NAMES "UTF8"');
                } catch (PDOException $e){
                    echo 'Erreur : '. $e->getMessage();
                    die();}}
                    
        // On nettoie les données envoyées
        $pro_ref = strip_tags($_POST['pro_ref']);
        $pro_id = strip_tags($produit['pro_id']);
        $pro_description = strip_tags($_POST['pro_description']);
        $pro_prix = strip_tags($_POST['pro_prix']);
        $pro_stock = strip_tags($_POST['pro_stock']);
        $pro_couleur = strip_tags($_POST['pro_couleur']);
        $pro_bloque = strip_tags($_POST['pro_bloque']);
       
       

        $stmt = $db->prepare("UPDATE produits SET pro_ref =:pro_ref, pro_description =:pro_description, pro_prix =:pro_prix,pro_stock =:pro_stock,pro_couleur =:pro_couleur,pro_bloque =:pro_bloque,pro_d_ajout =:pro_d_ajout,pro_d_modif =:pro_d_modif WHERE pro_id=:pro_id");

        $arrayValues = array(
            'pro_id' => $pro_id,
            'pro_ref' => $pro_ref,
            'pro_description' => $pro_description,
            'pro_prix' => $pro_prix,
            'pro_stock' => $pro_stock,
            'pro_couleur' => $pro_couleur,
            'pro_bloque' => $pro_bloque,
            'pro_d_ajout' => $produit['pro_d_ajout'],
            'pro_d_modif' => date("y-m-d h-i-s")
              );

        $stmt-> execute($arrayValues);
        header('Location: index.php');
       

       $_SESSION['message'] = 'Produit modifié';
       require_once('close.php');
}

?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <title>Bienvenue sur le site JARDITOU</title>
  </head>



      <!--Debut BODY/HEADER-->



      <body><header>
          <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-2">
              <div class="Banniere">
                  <img class="img-fluid" alt="jarditou logo" src="jarditou_css/src/img/jarditou_logo.jpg"></div></div>
                  <div class="col-10 text-right"><h1 class="display-4">Tout le jardin</h1></div>


  <!--MOBILE NAVBAR-->

                  
                      <nav class="navbar navbar-light bg-faded col-12 col-sm-6 col-md-7 col-lg-8 d-block d-xl-none">
                          <a class="navbar-brand" href="#" data-abc="true">Jarditou.com</a> 
                        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header">
                          &#9776;
                        </button>
                        <div class="collapse navbar-toggleable-xs" id="navbar-header">
                          <ul class="nav navbar-nav">
                            <li class="nav-item">
                              <a class="nav-link" href="index.html">Accueil</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="index.php">Tableau</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="contact.html">Contact</a>
                            </li>
                          </ul>
                          <form class="form-inline pull-xs-right">
                            <input class="form-control" type="text" placeholder="Votre Promotion">
                            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Rechercher</button>
                          </form>
                        </div>
                      </nav> <!-- /navbar -->
                

  <!--MOBILE NAVBAR-->
  <!--PC/TABLET NAVBAR-->

                  <nav class="navbar navbar-expand navbar-light -sm bg-light d-none d-xl-block">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                      <div class="collapse navbar-collapse" id="navbarColor02">
                          <ul class="navbar-nav mr-auto">
                              <li class="nav-item"> <a class="navbar-brand" href="#">Jarditou.com</a> </li>
                              <li class="nav-item"> <a class="nav-link" href="index.html">Accueil</a> </li>
                              <li class="nav-item"> <a class="nav-link" href="index.php">Tableau</a> </li>
                              <li class="nav-item"> <a class="nav-link" href="contact.html">Contact</a> </li>
                          </ul>
                          <form class="form-inline my-2 my-lg-0"> <input class="form-control mr-sm-2" type="text" placeholder="Votre Promotion">
                              <button class="btn btn-secondary my-2 my-sm-0" type="submit">Rechercher</button></form>
                      </div>
                  </nav>


  <!--PC/TABLET NAVBAR-->
                </header>
                      <div class="container-fluid"> 
                          <div class="row">
                              <img class="img-fluid col-12" src="jarditou_css/src/img/promotion.jpg" alt="Promotion sur lames de terasse">

                      <!--Fin HEADER-->
            <div class="col-12">
                      <form method="post">

                        <div class="form-group">
                            <label for="pro_ref">Référence: </label>
                                <input type="text" name="pro_ref" id="pro_ref" class="form-control" value="<?= $produit['pro_ref'] ?>">
                        </div>
                            <div class="form-group">
                            <label for="pro_id">ID</label>
                                <input type="text" name="pro_id" id="pro_id" class="form-control" value="<?= $produit['pro_id'] ?>" disabled>
                            </div>
                        <div class="form-group">
                            <label for="pro_description">Description</label>
                                <textarea name="pro_description" maxlength="1000" id="pro_description" class="form-control" required title="Vous devez renseigner ce champ"><?= $produit['pro_description'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pro_prix">Prix</label>
                                <input type="text" name="pro_prix" id="pro_prix" class="form-control" value="<?= $produit['pro_prix'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="pro_stock">Stock</label>
                                <input type="text" name="pro_stock" id="pro_stock" class="form-control" value="<?= $produit['pro_stock'] ?>">    
                        </div>
                        <div class="form-group">
                            <label for="pro_couleur">Couleur</label>
                            <input type="text" name="pro_couleur" id="pro_couleur" class="form-control" value="<?= $produit['pro_couleur'] ?>">
                        </div> 
                        <div class="form-group">
                            <label for="pro_bloque">Bloqué?</label>
                            <input type="radio" name="pro_bloque" id="pro_bloque" value="1" <?php if ($produit['pro_bloque']==1){echo "checked"; }?>> Oui
                               <input type="radio" name="pro_bloque" id="pro_bloque" value="0" <?php if ($produit['pro_bloque']==0){echo "checked"; }?>> Non 
                        </div>
                        <div class="form-group">
                            <label for="pro_d_ajout">Date d'ajout</label>
                                <input type="text" name="pro_d_ajout" id="pro_d_ajout" value="<?= $produit['pro_d_ajout'] ?>" class="form-control" disabled>     
                        </div>
                        <div class="form-group">
                            <label for="pro_d_modif">Date de modification</label>
                                <input type="text" name="pro_d_modif" id="pro_d_modif" class="form-control" value="<?php $today = date("y-m-d H:i:s");echo $today;?>" disabled>     
                        </div>
                         <a class="btn btn-secondary" href="index.php">Retour</a><button type="submit" value="submit" class="btn btn-success">Envoyer</button>
                               </form> 
                               <?php 
                               if(isset($_POST['submit']))
                               {header('Location: index.php');
                               }
                               ?>
                               </div>
                              
                              
                               </div>
                            
        </div></div>
    </main>
                          <!--Debut FOOTER-->



                          <footer>
              <nav class="navbar navbar-expand navbar-dark -sm bg-dark">
                  <ul class=navbar-nav><li class="nav-item active">
                      <a class="navbar-brand" href="Index.html">Jarditou.com</a></li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Mentions légales</a></li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Horaires</a></li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Plan du site</a></li></ul>
              </nav>
        </footer>


                  <!--Fin FOOTER-->



  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      </body>


                  <!-- Fin BODY-->


                  
  </html>
</body>
</html>
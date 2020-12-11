<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Bienvenue sur le site JARDITOU</title>
</head>  


                <!--Debut BODY/HEADER-->



                <body>
        <header>
            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-2">
                <div class="Banniere">
                    <img class="img-fluid" alt ="jarditou logo" src="jarditou_css/src/img/jarditou_logo.jpg"></div></div>
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
                          <li class="nav-item active">
                            <a class="nav-link" href="#">Tableau</a>
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
                    </nav>
              


<!--MOBILE NAVBAR-->
<!--PC/TABLET NAVBAR-->

                    <nav class="navbar navbar-expand navbar-light -sm bg-light d-none d-xl-block">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbarColor02">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"> <a class="navbar-brand" href="#">Jarditou.com</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="index.html">Accueil </a> </li>
                                <li class="nav-item active"> <a class="nav-link" href="#" data-abc="true">Tableau</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="contact.html">Contact</a> </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0"> <input class="form-control mr-sm-2" type="text" placeholder="Votre Promotion">
                                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Rechercher</button></form>
                        </div>
                    </nav></header>  
                    <div class="container-fluid"> 
                        <div class="row"> 
                            <img class="img-fluid col-12" src="jarditou_css/src/img/promotion.jpg" alt="Promotion sur lames de terasse">

<!--PC/TABLET NAVBAR-->

                <!--FIN HEADER-->

                
                                 
                    
        <div class="table-responsive">
    <div class="container"><table class="table table-striped table-hover table-bordered">
        <h1 class="display-4">Tableau</h1><hr>
        <thead>
            <th><h1 class="display-5">Photo</th></h1>
            <th><h1 class="display-5">ID</th></h1>
            <th><h1 class="display-5">Référence</th></h1>
            <th><h1 class="display-5">Libellé</th></h1>
            <th><h1 class="display-5">Prix</th></h1>
            <th><h1 class="display-5">Stock</th></h1>
            <th><h1 class="display-5">Couleur</th></h1>
            <th><h1 class="display-5">Date d'ajout</th></h1>
            <th><h1 class="display-5">Modif</th></h1>
            <th><h1 class="display-5">Bloqué</th></h1>
            <th><h1 class="display-5">Action</th></h1>

</thead>
<p><a href="create.php" class="btn btn-success">Create</a></p>
        <?php   
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM produits ORDER BY pro_id ASC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td></td>';
                            echo '<td>'. $row['pro_id'] . '</td>';
                            echo '<td>'. $row['pro_ref'] . '</td>';
                            echo '<td>'. $row['pro_libelle'] . '</td>';
                            echo '<td>'. $row['pro_prix'] . '€' .   '</td>';
                            echo '<td>'. $row['pro_stock'] . '</td>';
                            echo '<td>'. $row['pro_couleur'] . '</td>';
                            echo '<td>'. $row['pro_d_ajout'] . '</td>';
                            echo '<td>'. $row['pro_d_modif'] . '</td>';
                            echo '<td>'. $row['pro_bloque'] . '</td>';
                            echo '<td><a class="btn" href="read.php?id='.$row['id'].'">Read</a></td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
    
    </table></div></div></div></div>
    
<hr><br>


            <!--Debut FOOTER-->

            
         <footer>
            <nav class="navbar navbar-expand navbar-dark -sm bg-dark">
                <ul class=navbar-nav><li class="nav-item active">
                    <a class="navbar-brand" href="Index.html">Jarditou.com</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mentions légales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Horaires</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Plan du site</a>
                </li></ul>
              </nav>
        </footer>


            <!--Fin FOOTER-->



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
    </html>
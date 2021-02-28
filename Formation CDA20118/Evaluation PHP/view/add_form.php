<?php
include "../controllers/dbconnect.php" ;
include('../include/header.php');
include('../controllers/add_script.php');

// requete permettant l'affichage des artistes dans le select
try {
    $requete = $db->prepare('SELECT * FROM artist ORDER BY artist_name');
    $requete->execute();
    $artistList = $requete->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

<body>
<div class="container-fluid">

        <!--  Je recupere les message d'erreur avec une balise span et une variable tableau -->
    <section>
        <div class="col-12">

            <h2 style="text-align: center">Ajouter un album</h2>
            <div class="row justify-content-center">
                <form enctype="multipart/form-data" id="formAdd" action="" method="POST"   onsubmit="return verif(this)">
                <label class="col col-form-label font-weight-bold" for="artist_name">Artiste :</label>
                <span class="error"><?= isset($tabError['addTitle']) ? $tabError['addTitle'] : '' ?></span>
            

                <div>
                    <select type="text" class="select form-control" id="artist_name" name="artist">
                        <?php
                        // Boucle pour récupérer les données et les afficher dans le tableau
                        foreach ($artistList as $artist) {
                            ?>
                            <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <span class="error"><?= isset($tabError['missArtist']) ? $tabError['missArtist'] : '' ?></span>
                </div>

                <label class="col col-form-label font-weight-bold">Titre :</label>
                <input type="text" name="addTitle" id="addTitle" class="form-control" placeholder="Entrez le titre">
                <span id="missTitre" class="hint missTitre"></span>
                <span class="error"><?= isset($tabError['missTitle']) ? $tabError['missTitle'] : '' ?></span>

                <label class="col col-form-label font-weight-bold">Label :</label>
                <input type="text" name="addLabel" id="addLabel" class="form-control" placeholder="Entrez le label">
                <span id="missLabel" class="hint missLabel"></span>
                <span class="error"><?= isset($tabError['missLabbel']) ? $tabError['missLabbel'] : '' ?></span>

                <label class="col col-form-label font-weight-bold">Année :</label>
                <input type="number" name="addYear" id="addYear" class="form-control" placeholder="Entrez l'année">
                <span id="missYear" class="hint missYear"></span>
                <span class="error"><?= isset($tabError['missYear']) ? $tabError['missYear'] : '' ?></span>


                <label class="col col-form-label font-weight-bold">Genre :</label>
                <input type="text" name="addGender" id="addGender" class="form-control" placeholder="Entrez le genre">
                <span id="missGender" class="hint missGender"></span>
                <span class="error"><?= isset($tabError['missGender']) ? $tabError['missGender'] : '' ?></span>


                <label class="col col-form-label font-weight-bold">Prix :</label>
                <input type="number" name="addPrice" id="addPrice" class="form-control" placeholder="Entrez le prix">
                <span id="missPrice" class="hint missPrice"></span>
                <span class="error"><?= isset($tabError['missPrix']) ? $tabError['missPrix'] : '' ?></span>


                <!-- Uploader une image -->
                <fieldset>
                    <p>
                        <label for="fichier" title="" class="col col-form-label font-weight-bold">Jaquette :</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value=""/>
                        <input name="fichier" type="file" id="fichier" class="form-control"/>
                        <span class="error"><?= isset($tabError['missfichier']) ? $tabError['missfichier'] : '' ?></span>
                    </p>
                </fieldset>
                <!-- FIN Uploader une image -->

                <div class="text-center">
                    <input id="ajout" type="submit" class="logBtn btn btn-primary" name="submit">
                    <a href="../index.php" class="logBtn btn btn-primary">Retour</a>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php

include('../include/footer.php');
?>


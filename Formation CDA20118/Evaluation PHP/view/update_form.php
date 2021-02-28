<?php
include "../controllers/dbconnect.php";
include('../include/header.php');
include('../controllers/update_script.php');

try {
    $requete = $db->prepare('SELECT * FROM artist ORDER BY artist_name');
    $requete->execute();
    $artistList = $requete->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

$requete2 = $db->prepare('SELECT * FROM artist JOIN disc ON artist.artist_id = disc.artist_id WHERE disc_id = :id');
$requete2->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
$requete2->execute();
$disc = $requete2->fetch(PDO::FETCH_OBJ);


$id = $_GET['id'];

?>

<body>
<div class="container-fluid">
    <div class="container">
        <section>
            <div class="text-center">
                <h1>Modifier un album</h1>
            </div>


            <form enctype="multipart/form-data" action="#" method="POST" >
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <label class="font-weight-bold" for="artist_name">Titre :</label>
                    </div>
                    <div class="col-lg-12">
                        <input type="text" class="forUpdate2 form-control" name="upTitle" id="disc_title"
                               value="<?= $disc->disc_title ?>">
                        <span class="error"><?= isset($tabError['missTitle']) ? $tabError['missTitle'] : '' ?></span>
                    </div>
                </div>

                <div class="row">
                    <div class=col-md-12>
                        <label class="font-weight-bold" for="artist_name">Artiste :</label>
                    </div>
                    <div class="col-lg-12">
                        <select type="text" class="select form-control" id="artist_name" name="upArtist">
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
                </div>
                <div class=row>
                    <div class="col-md-12">
                        <label class="font-weight-bold" for="disc_label">Label :</label>
                    </div>
                    <div class="col-lg-12">
                        <input type="text" class="forUpdate form-control" name="upLabel" id="disc_label"
                               value="<?= $disc->disc_label ?>">
                        <span class="error"><?= isset($tabError['missLabbel']) ? $tabError['missLabbel'] : '' ?></span>
                    </div>
                </div>

                <div class=row>
                    <div class="col-md-12">
                        <label class="font-weight-bold" for="disc_year">Année :</label>
                    </div>
                    <div class="col-lg-12">
                        <input type="number" class="forUpdate form-control" name="upYear" id="disc_year"
                               value="<?= $disc->disc_year ?>">
                        <span class="error"><?= isset($tabError['missYear']) ? $tabError['missYear'] : '' ?></span>
                    </div>
                </div>

                <div class=row>
                    <div class="col-md-12">
                        <label class="font-weight-bold" for="disc_genre">Genre :</label>
                    </div>
                    <div class="col-lg-12">
                        <input type="text" class="forUpdate form-control" name="upGender" id="disc_genre"
                               value="<?= $disc->disc_genre ?>">
                        <span class="error"><?= isset($tabError['missGender']) ? $tabError['missGender'] : '' ?></span>
                    </div>
                </div>

                <div class=row>
                    <div class="col-md-12">
                        <label class="font-weight-bold" for="disc_price">Prix :</label>
                    </div>
                    <div class="col-lg-12">
                        <input type="number" class="forUpdate form-control" name="upPrice" id="disc_price"
                               value="<?= $disc->disc_price ?>">
                        <span class="error"><?= isset($tabError['missPrix']) ? $tabError['missPrix'] : '' ?></span>
                    </div>
                </div>


                <!-- Uploader une image -->
                <fieldset>
                    <p>
                        <label for="fichier" title="" class="col-form-label font-weight-bold">Jaquette :</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value=""/>
                        <input name="fichier" type="file" id="fichier" class="form-control" required >
                        <span class="error"><?= isset($tabError['missfichier']) ? $tabError['missfichier'] : '' ?></span>

                    </p>
                </fieldset>
                <!-- FIN Uploader une image -->

                <div class="col-md-12 justify-content-center text-center">
                    <img class="photo" title="<?= $disc->disc_picture ?>" src="../src/img/<?= $disc->disc_picture ?>" alt="<?= $disc->disc_picture ?>">
                </div>

                <div class="text-center">
                    <input type="submit" id="update" name="update" class="logBtn btn btn-primary" value="Valider">
                    <a href="../index.php" class="logBtn btn btn-primary">Retour</a>
                </div>
            </form>
        </section>
    </div>
</div>

<?php
include('../include/footer.php');
?>
</body>
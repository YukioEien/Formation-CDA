<?php
include "../controllers/dbconnect.php";
include('../include/header.php');

include('../controllers/delete_script.php');

$id = $_GET['id'];
$nomImage = $_GET['disc_picture'];
$disc_picture = $_GET['disc_picture'];
$disc_title = $_GET['disc_title'];
?>

    <body>
    <div class="container-fluid">
        <section class="container">
            <div class="text-center">
                <div class="col-12">
                    <div class="col-12">
                        <p class="font-weight-bold"><u>Title :</u></p>
                        <p class="bg-light border mt-2"><?= $disc_title ?></p>
                    </div>
                    <div class="col-12">
                        <p class="font-weight-bold"><u>Picture :</u></p>
                        <img class="photo" alt="photo" title="photo" src="../src/img/<?= $disc_picture ?>">
                    </div>
                </div>


                <div class="col-12 justify-content-center text-center">
                    <form action="" method="POST">
                        <input type="hidden" id="id_delete" name="id_delete" value="<?= $id ?>">
                        <input type="submit" id="delete" name="delete" class="logBtn btn btn-primary" value="Confirmer">
                        <a href="../index.php" class="logBtn btn btn-primary">Annuler</a>
                    </form>
                </div>


        </section>
    </div>

<?php
include('../include/footer.php');
?>
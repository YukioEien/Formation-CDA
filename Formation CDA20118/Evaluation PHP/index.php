<?php
include('./include/header.php');
include "./controllers/dbconnect.php";


$requete1 = $db->prepare("select * from artist JOIN disc ON artist.artist_id = disc.artist_id ORDER BY artist_name");
$requete1->execute();
//Je creé une variable pour recuperer le total de row pour l'index
$total = $requete1->rowcount();


//requête pour les donnéees dans l'index
$requeteIn = $db->prepare("select * from artist JOIN disc ON artist.artist_id = disc.artist_id ORDER BY artist_name");

if (!empty($key) && !empty($value)) {
    $requeteIn->bindParam(":" . $key . "", $value);
} elseif (!empty($key) && !empty($value)) {

    $requeteIn->bindValue(":" . $key . "", "%" . $value . "%");
}
$requeteIn->execute();
while ($index = $requeteIn->fetch(PDO::FETCH_OBJ)) {
    $row[] = $index;
}

?>

<nav>
    <nav class="navbar navbar-light bg-light">
        <h1 class="h1">Liste des disques ( <?= $total ?> )</h1>
        <a class="btn btn1 btn-primary" href="view/add_form.php">Ajouter</a>
    </nav>
</nav>

<body>
<section>
    <table class="container-fluid">
        <thread>
            <tr class="col-12">
                <th></th>
                <th></th>
            </tr>
        </thread>
        <tbody>
        <tr>
            <?php
            $i = 0;
            foreach ($row

            as $key => $value){
            if (($i % 2) == 0) {
            ?>
        <tr class="row">
            <td class="col-md-6 mb-3">
                <img class="photo" alt="photo" title="photo" src="./src/img/<?= $value->disc_picture ?>" align="left">
                <p><?= $value->disc_title ?></p>
                <p><?= $value->artist_name ?></p>
                <p>Labelle : <?= $value->disc_label ?></p>
                <p>Année : <?= $value->disc_year ?></p>
                <p>Genre : <?= $value->disc_genre ?></p>
                </div>
                <div>
                    <form action="./view/detail.php" method='get' class=" bottom">
                        <input type="hidden" name='id' value='<?= $value->disc_id ?>'>
                        <input type='submit' class="btn btn-primary" value='Détails'>
                    </form>
                </div>
            </td>
            <?php
            $i++;
            } else 
            {
            ?>
            <td class="col-md-6 mb-3">
                <img class="photo" alt="photo" title="photo" src="./src/img/<?= $value->disc_picture ?>" align="left">
                <p><?= $value->disc_title ?></p>
                <p><?= $value->artist_name ?></p>
                <pre>Labelle : <?= $value->disc_label ?></pre>
                <pre>Année : <?= $value->disc_year ?></pre>
                <pre>Genre : <?= $value->disc_genre ?></pre>
                </div>
                <div>
                    <form action="./view/detail.php" method='get' class=" bottom">
                        <input type="hidden" name='id' value='<?= $value->disc_id ?>'>
                        <input type='submit' class="btn btn-primary" value='Détails'>
                    </form>
                </div>
            </td>
        </tr>
        <?php
        $i++;
        }
        }
        ?>
        </tbody>
    </table>
</section>

<?php
include('./include/footer.php');
?>

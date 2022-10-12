<?php
// indiqué le chemin de votre fichier JSON, il peut s'agir d'une URL

$fileNane="data.json";
$article=array();
if (file_exists ($fileName)) {
    
}
$data = file_get_contents("$fileName");


var_dump(json_decode($json));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once './includes/head.php' ?>
    <title>Blog</title>
    <link href="  assets/css/index.css" rel="stylesheet">
</head>

<body>
    <?php require_once './includes/header.php' ?>

    <!-- liste cards -->
    <div class="container">
        <div class="row align-items-center justify-content-center-between">
            <!--  card-01 -->
            <div class="col-md-4 text-center">
                <div class="card" style="width: 18rem;">
                    <img src="assets/img/gallery-10.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Titre</h5>
                        <a href="#" class="btn btn-primary">détail</a>
                    </div>
                </div>
            </div>
            <!--  card-02 -->
            <div class="col-md-4 text-center">
                <div class="card" style="width: 18rem;">
                    <img src="assets/img/gallery-10.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Titre</h5>
                        <a href="#" class="btn btn-primary">détail</a>
                    </div>
                </div>
            </div>
            <!--  card-03 -->
            <div class="col-md-4 text-center">
                <div class="card" style="width: 18rem;">
                    <img src="assets/img/gallery-10.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Titre</h5>
                        <a href="#" class="btn btn-primary">détail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--     fin card -->
    </div>

    </div>
</body>

</html>
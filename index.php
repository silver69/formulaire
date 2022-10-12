<?php
// indiqué le chemin de votre fichier JSON

$toto="data.json";
$article=array();
if (file_exists($toto)) {
    $articles = json_decode(file_get_contents($toto));
}

print_r ($toto)


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once './includes/head.php' ?>
    <title>Blog</title>
    <link href="assets/css/index.css" rel="stylesheet">
</head>

<body>
    <?php require_once './includes/header.php' ?>

    <!-- liste cards -->
    <div class="container">
        <div class="content">
            <!-- <?php if($articles){ ?> -->
            <?php foreach ($articles as $article) { ?>
            <div class="article">
                <div class="imageArticle">
                    <img src="<?=$article->image?>">
                </div>
                <div class="infoArticle">
                    <span>
                        <?= $article->title?>
                        <!--                   </span>
                    <form action="./article.php" method="POST" class="m-0">
                        <input type="hidden" name="id" value="<?= $article->id ?>">
                        <input type="hidden" name="action" value="detail">
                        <button type="submit" class="btn btn-primary">Détail</button>
                    </form> -->
                </div>
            </div>
            <?php } ?>
            <?php } ?>
        </div>


    </div>

    </div>
</body>

</html>
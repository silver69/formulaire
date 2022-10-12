<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once './includes/head.php' ?>
    <title>Blog</title>
    <link href="  assets/css/index.css" rel="stylesheet">
</head>

<body>
    <?php require_once './includes/header.php' ?>
    <div class="container">

        <div class="content">
            <?php
// indiqué le chemin de votre fichier JSON, il peut s'agir d'une URL
$json = file_get_contents("data.json");

var_dump(json_decode($json));
?>
            Content
        </div>
    </div>
</body>

</html>
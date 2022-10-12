<?php



require_once "includes/error.php";
$error=[
    "titre"=> "",
    "image"=> "",
    "description" =>"",
    
    
];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_POST = filter_input_array(INPUT_POST, [
        'image' => [
            'filter' =>  FILTER_SANITIZE_URL,
          
        ],
        'description' => [
            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'flags' => FILTER_FLAG_NO_ENCODE_QUOTES | FILTER_FLAG_STRIP_BACKTICK,
        ],
        'titre' => [
            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'flags' => FILTER_FLAG_NO_ENCODE_QUOTES | FILTER_FLAG_STRIP_BACKTICK,
        ],
        'categorie' => [
            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        ],
       
    ]);
$formdata= $_POST;

/* print_r($formdata); */

if ($formdata){
    if(!$formdata["titre"]){
        $error["titre"]=ERROR_REQUIRED;
    }
    elseif (strlen($formdata["titre"])<50){
        $error["titre"]=ERROR_TITRE;
    }

    /*image*/
    if (!$formdata["image"]) {
        $error["image"]=ERROR_REQUIRED;
    }

        /*description*/
    if(!$formdata["description"]){
        $error["description"]=ERROR_REQUIRED;
    }
    elseif (strlen($formdata["description"])<200){
        $error["description"]=ERROR_TOO_LONG;
    }
}
/* var_dump($formdata); */

/* recup data */
function get_data() {
    $name = $_POST['name'];
    $file_name='data'. '.json';

    if(file_exists("$file_name")) { 
        $current_data=file_get_contents("$file_name");
        $array_data=json_decode($current_data, true);
                           
        $extra=array(
            'Titre' => $_POST['titre'],
            'image' => $_POST['image'],
            'description' => $_POST['description'],
            'categorie' => $_POST['categorie'],
        );
        $array_data[]=$extra;
        echo "file exist<br/>";
        return json_encode($array_data);
    }
    else {
        $datae=array();
        $datae[]=array(
            'Titre' => $_POST['titre'],
            'image' => $_POST['image'],
            'description' => $_POST['description'],
            'categorie' => $_POST['categorie'],
        );
        echo "file not exist<br/>";
        return json_encode($datae);   
    }
}

$file_name='data'. '.json';
  
if(file_put_contents("$file_name", get_data())) {
    echo 'success';
}                
else {
    echo 'There is some error';                
}
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once './includes/head.php' ?>
    <title>Créer votre article</title>
    <link href="  assets/css/add-article.css" rel="stylesheet">
</head>

<body>
    <?php require_once './includes/header.php' ?>
    <div class="container">
        <div class="content">


            <form class="form-control" method="POST" action="">

                <!-- titre -->


                <label for="titre">Entrer votre titre: </label>
                <input type="text" id="name" name="titre">
                <?php if ($error["titre"]): ?>
                <p class="text-warning"><?= $error["titre"] ?></p>
                <?php endif; ?>
                <!--  image -->
                <div>
                    <label for="image" class="form-control label">image:</label>

                    <input type="text" id="image" name="image">

                    <?php if ($error["image"]): ?>
                    <p class="text-warning"><?= $error["image"] ?></p>
                    <?php endif; ?>
                </div>
                <!-- description -->
                <div class="form-control">
                    <label for="description" class="form-control label">description:</label>
                    <textarea id="description" name="description">
                    </textarea>
                    <?php if ($error["description"]): ?>
                    <p class="text-warning"><?= $error["description"] ?></p>
                    <?php endif; ?>
                </div>
                <!-- categorie -->
                <div class="form-control">
                    <label for="categorie" class="form-control label">Choisir une catégorie:</label>

                    <select name="categorie" id="categorie">
                        <option value="" disabled selected>--merci de choisir une catégorie--</option>
                        <option value="Nature">Nature</option>
                        <option value="Technologie">Technologie</option>
                        <option value="Politique">Politique</option>
                    </select>
                </div>
                <!--  Bouton sauvegarde -->

                <div class="btn btn-primary">
                    <input class="form-control input" type="submit" id="sauvegarde">
                    </button>
                </div>

                <!--  Bouton annuler -->
                <div class="btn btn-primary">
                    <input type="reset" class="form-control input" value="Reset">
                    </button>

                </div>
            </form>



        </div>
    </div>
</body>


</html>
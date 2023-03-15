<?php

// j'importe ma boite a outils.
include_once('./utils/connexion.php');
require_once('./utils/fonction.php');
include_once('./utils/Session.php');
include_once('./Food.php');







$db = new Database();


if (isset($_POST["food"])){

    $session = new Session();

    if (isset($_POST["food"])) {
        $repas = $_POST['repas'];
        $kcal = $_POST['kcal'];
        $user_id = $_SESSION["email"];
    
        if (!empty($repas) && !empty($kcal)) {
            $food = new Food($repas, $kcal, $user_id);
            $food->save();
            header("Location: index.php");
        }
    }
}





$page = [
    "title" => "Track Calorie - Ajoute un repas"
];


include_once('includes/header.php');
 


?>

<header>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Ajoute un repas !</h1>
</header>
</div>

<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST">
                    <div class="mb-3">
                        <label for="text" class="form-label">Ton repas</label>
                        <input type="text" name="repas" class="form-control" id="repas" aria-describedby="food">
                    </div>

                    <div class="mb-3">
                        <label for="number" class="form-label">kcal</label>
                        <input type="number" name="kcal" class="form-control" id="kcal" aria-describedby="kcal">
                    </div>

                    <button type="submit" name="food" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-primary"><a href="index.php">Retour</a></button>
                </form>


            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

</main>
<footer>

</footer>

<?php include_once('includes/footer.php'); ?>
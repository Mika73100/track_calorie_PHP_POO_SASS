<?php
require'./utils/connexion.php';
require_once'./utils/fonction.php';
include_once('includes/head.php');

/*

Ce code PHP gère la mise à jour d'un utilisateur dans la base de données. Il est exécuté lorsque le formulaire de mise à jour est soumis.
Il instancie d'abord une nouvelle instance de la classe Database, qui se connecte à la base de données.
Ensuite, il vérifie si le formulaire a été soumis en utilisant l'instruction if (isset($_POST['submit'])). Si le formulaire a été soumis, les données du formulaire sont stockées dans des variables ($prenom, $age, $sexe, $poids, $taille).
Ensuite, une requête SQL de mise à jour est préparée en utilisant la méthode prepare() de l'objet $db. 
a requête met à jour les informations de l'utilisateur en utilisant les valeurs stockées dans les variables et l'ID de l'utilisateur, 
qui est passé en tant que paramètre $_GET['id'].

*/



$db = new Database();

if (isset($_POST['submit'])) {
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $sexe = $_POST['sexe'];
    $poids = $_POST['poids'];
    $taille = $_POST['taille'];

    $stmt = $db->prepare("UPDATE users SET prenom=:prenom, age=:age, sexe=:sexe, poids=:poids, taille=:taille WHERE email=:id");
    $count = $stmt->execute(array(':prenom' => $prenom, ':age' => $age, ':sexe' => $sexe, ':poids' => $poids, ':taille' => $taille, ':id' => $_GET['id']));
    if ($count > 0) {
        // update was successful
        header("Location: dashboard.php");
        exit;
    } else {
        // update was not successful
        echo 'Update failed';
    }
}



?>



<style>

/* Set the background color to white */
body {
    background-color: white;
}

/* Add a subtle box shadow to the form */
form {
    box-shadow: 0px 0px 10px #ccc;
}

/* Add some spacing to the form */
form {
    padding: 20px;
    margin: 20px;
}

/* Style the labels */
label {
    font-weight: bold;
}

/* Style the inputs */
input {
    padding: 12px;
    font-size: 16px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

/* Style the submit button */
button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

/* Style the submit button on hover */
button[type="submit"]:hover {
    background-color: #45a049;
}


</style>





<form method="post" action="">
    <div class="form-group">
        <label for="prenom">Prenom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $user['prenom']; ?>">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="text" class="form-control" id="age" name="age" value="<?php echo $user['age']; ?>">
    </div>
    <div class="form-group">
        <label for="sexe">Sexe</label>
        <input type="text" class="form-control" id="sexe" name="sexe" value="<?php echo $user['sexe']; ?>">
    </div>
    <div class="form-group">
        <label for="poids">Poids</label>
        <input type="text" class="form-control" id="poids" name="poids" value="<?php echo $user['poids']; ?>">
        </div>
<div class="form-group">
    <label for="taille">Taille</label>
    <input type="text" class="form-control" id="taille" name="taille" value="<?php echo $user['taille']; ?>">
</div>

<button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
<?php include_once('includes/footer.php'); ?>
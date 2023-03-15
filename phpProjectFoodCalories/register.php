<?php

require './utils/connexion.php';
require './utils/fonction.php';
include_once('./utils/Session.php');


$session = new Session();
$db = new Database();



if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $sexe = $_POST['sexe'];
    $poids = $_POST['poids'];
    $taille = $_POST['taille'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check_email = "SELECT email FROM users WHERE email = :email";
    $stmt = $db->prepare($check_email);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
        echo "Sorry, this email is already in use.";
    } elseif (true) {

        if (valid_donnees($email)) {
            $query = "INSERT INTO users (email, prenom, age, sexe, poids, taille, password) VALUES (:email, :prenom, :age, :sexe, :poids, :taille, :password)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':sexe', $sexe);
            $stmt->bindParam(':poids', $poids);
            $stmt->bindParam(':taille', $taille);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            $session->set('email', $email);
            if ($result = $stmt->fetch() && empty($_SESSION['user'])){
                $session->set('user', $result);
            }
            header("Location: index.php");
        }
    }
}

$page = [
    "title" => "register"
];

include_once('./includes/header.php');
?>
<header>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Register Page!</h1>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="prenom" class="form-control" id="prenom">
                </div>
                <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password">
</div>

                <div class="mb-3">
    <label for="sexe" class="form-label">Sexe</label>
    <select class="form-select" name="sexe" id="sexe">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>
</div>
<div class="mb-3">
    <label for="age" class="form-label">Age</label>
    <input type="number" name="age" class="form-control" id="age">
</div>
<div class="mb-3">
    <label for="poids" class="form-label">Poids</label>
    <input type="text" name="poids" class="form-control" id="poids">
</div>
<div class="mb-3">
    <label for="taille" class="form-label">Taille</label>
    <input type="text" name="taille" class="form-control" id="taille">
</div>
<div class="form-group">
    <input type="submit" name="register" value="Register" class="btn btn-primary">
    <a href="login.php" class="btn btn-secondary">Already have an account? Login</a>
</div>
</form>
</div>
</div>
</div>
</main>
<?php
include_once('./includes/footer.php');
?>
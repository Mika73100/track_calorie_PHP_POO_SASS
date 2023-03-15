<?php


require './utils/connexion.php';
require_once './utils/fonction.php';
include_once('./utils/Session.php');

$session = new Session();
$db = new Database();


if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = stripslashes($_REQUEST['email']);
    $password = stripslashes($_REQUEST['password']);

    $sql = "SELECT * FROM users WHERE email='$email'";
    $select = $db->prepare($sql);
    $select->execute();
    $result = $select->fetch();
    $session->set('user', $result);
    $count = $select->rowCount();
    if ($count === 1) {
        // check if the password is correct
        if (password_verify($password, $result['password'])) {
           $session->set('email', $email);
           if ($select->execute() && $result = $select->fetch() && empty($_SESSION['user'])){
            $session->set('user', $result);
        }
            header("Location: index.php");
        } else {
            echo "Le nom d'utilisateur ou le mot de passe est incorrect.";
        }

    }
}

$page = [
    "title" => "Track Calorie Login"
];

include_once('includes/header.php');


?>


<header>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Login Page!</h1>
</header>
</div>
<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="" method="post" name="login">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password">
</div>
                    <div class="text-center">
                    <button type="submit" id="submit" value="login" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-primary"><a href="register.php">Register</a></button>
                    </div>
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
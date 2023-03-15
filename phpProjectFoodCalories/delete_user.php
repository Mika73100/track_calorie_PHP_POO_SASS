<?php


/*

Lorsqu'un utilisateur essaie de supprimer un utilisateur en cliquant sur un lien avec son adresse e-mail, le code vérifie si l'utilisateur connecté est celui qui essaie d'être supprimé.
Si ce n'est pas le cas, le code exécute une instruction DELETE pour supprimer l'utilisateur correspondant à l'adresse e-mail fournie.
Si l'utilisateur connecté est celui qui essaie d'être supprimé, un message d'erreur est affiché indiquant que l'utilisateur connecté ne peut pas se supprimer lui-même.

*/




require './utils/connexion.php';
include_once('includes/head.php');
$db = new Database();



    if ($email != $_SESSION['email']){
        $stmt = $db->prepare("DELETE FROM users WHERE email = :email");
        $stmt->execute(array(':email' => $_GET['id']));
        header("Location: dashboard.php");
    }

    else {
    echo 'YOU CANT DELETE A USER WHO IS LOGGED IN';
    }

?>



<?php include_once('includes/footer.php'); ?>

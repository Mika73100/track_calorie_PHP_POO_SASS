<?php

include_once('./utils/Session.php');




$session = new Session();

$db = new Database();

$username = $session->get('email');

$stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
$stmt->bindParam(':email', $username);
$stmt->execute();
$user = $stmt->fetch();



$page=[
    "title" => "UPDATE A USER "
];

include_once('includes/header.php');





?>









<header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h1>Track Calories</h1>
                </div>
                <div class="col-auto">
                    <div class="profil"><a href="profile.php"><button type="button" class="btn btn-dark">
                        <i class="bi bi-person"></i></button></a>
                    </div>
                    <?php if ($user??['isAdmin'] == 1) { ?>
            <button type="button" class="btn btn-secondary"><a href="dashboard.php">Dashboard</a></button>
        <?php } ?>
    </div>

                    <?php echo $username; ?>
                </div>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </header>
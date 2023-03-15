<?php

// connexion à la BDD
require'./utils/connexion.php';
require_once'./utils/fonction.php';
include_once('includes/head.php');
include_once('./utils/Session.php');


$db = new Database();


if(!$_SESSION['email']){
    header("Location: login.php");
}






$sql = $db->prepare("SELECT repas, kcal FROM food where user_id = :user_id");
$sql->bindParam(':user_id', $_SESSION["email"], PDO::PARAM_STR);
$sql->execute();

/* Fetch all of the remaining rows in the result set */
//print("Fetch all of the remaining rows in the result set:\n");
$result = $sql->fetchAll();



$kcal = 0;
foreach ($result as $row) {
$repas_kcal = (int) $row['kcal'];
if($repas_kcal){
$kcal += $repas_kcal;
}
}




$page=[
    "title" => "Track Calorie - Accueil"
];

include_once('includes/header.php');

?>

<div class="containerApp">

    <main>

        <section class="dataUser">

            <div class="doughnut">
                <canvas id="myChart"></canvas>
                <div class="kcal"><?php echo $kcal , ' Kcal'?></div>
            </div>

            <div>IMC</div>
  
            <div class="custom-shape-divider-bottom-1671192619">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                    preserveAspectRatio="none">
                    <path
                        d="M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z"
                        class="shape-fill"></path>
                </svg>
            </div>
        </section>

        <section class="date">
            <div class="text-center py-3"><?php

        $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::FULL);
        echo $formatter->format(time()); ?>
        


                <?php echo date('l d M Y'); ?></div>

        </section>
      

      
        <section class="list">
    <div class="container">
        <?php
            foreach ($result as $row) {
                echo '<div class="row">';
                echo '<div class="col">';
                echo '<div class="food">';
                echo '<div class="titleFood"><h3>' . $row['repas'] . '</h3></div>';
                echo '<div class="calorieFood"><p>' . $row['kcal'] . '</p></div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        ?>
    </div>
</section>

         

    </main>

    <footer class="py-3">
        <div class="text-center">
            <button type="button" class="btn btn-primary"><a href="modale.php">+</a></button>
        </div>
    </footer>

</div>

<?php include_once('includes/footer.php'); ?>




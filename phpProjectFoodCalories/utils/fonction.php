<?php

//sécurisation des données, j'utilise un système de filtre
//la function s'appel valid données.
//j'appel cette page sur toutes mes pages afin de sécurisé mon formulaire.

//htmlspecialchars : Convertit les caractères spéciaux en entités HTML
//stripslashes :
//Supprime les antislashs d'une chaîne de caractère.


function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    $donnees = strip_tags($donnees);
    return $donnees;
}

?>
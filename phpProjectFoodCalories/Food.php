<?php
/*

Cette classe PHP définit une classe nommée "Food". 
Cette classe a des propriétés publiques pour stocker l'ID, 
le nom du repas, les calories et l'ID de l'utilisateur associé à ce repas. 
Il existe également une méthode publique "__construct" qui permet d'initialiser 
les propriétés de la classe avec des valeurs lors de la création d'une nouvelle instance de la classe.

La méthode "save" enregistre les détails du repas dans une base de données en utilisant une instance de la classe "Database". 
Le code exécute une requête SQL "INSERT" pour ajouter les détails du repas dans la table "food" de la base de données.

*/


class Food {
    public $id;
    public $repas;
    public $kcal;
    public $user_id;


    
    public function __construct($repas, $kcal, $user_id) {
        $this->id = uniqid();
        $this->repas = $repas;
        $this->kcal = $kcal;
        $this->user_id = $user_id;
    }



    public function save() {
        $db = new Database();
        $sql = "INSERT INTO food VALUES (:id, :repas, :kcal, :user_id)";
        $sql = $db->prepare($sql);
        $sql->execute([
            'id' => $this->id,
            'repas' => $this->repas,
            'kcal' => $this->kcal,
            'user_id' => $this->user_id
        ]);
    }
}


?>
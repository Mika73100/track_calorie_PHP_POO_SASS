<?php

/*
Ce code crée une classe appelée "Database" 
qui se connecte à une base de données MySQL. 
Elle définit les informations de connexion 
(nom de serveur, nom de la base de données, nom d'utilisateur et mot de passe) 
et utilise la bibliothèque PDO pour établir une connexion à la base de données. 
Si une erreur de connexion se produit, un message d'erreur sera affiché. 
La classe a également une méthode "prepare" qui peut être utilisée 
pour préparer des requêtes SQL à exécuter sur la base de données.
*/


class Database {
    private $servername;
    private $dbname;
    private $user;
    private $pass;
    private $pdo;



    public function __construct() {
        
        $this->servername = "localhost";
        $this->dbname = "food";
        $this->user = "root";
        $this->pass = "root";
        try {
            $this->pdo = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
       public function prepare($query) {
        return $this->pdo->prepare($query);
    }
}

    
?>
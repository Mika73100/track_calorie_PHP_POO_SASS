<?php
    abstract class Utilisateur{
        protected $user_name;
        protected $user_region;
        protected $prix_abo;
        protected $user_pass;
        public const ABONNEMENT = 15;
        
        public function __construct()
        {
            //Du code à exécuter
        }
        

        abstract public function setPrixAbo();
        
        public function getNom(){
            return  $this->user_name;
        }
        
        public function setNom($nom){
          $this->user_name = $nom;
        }


        public function getPrixAbo(){
            echo $this->prix_abo;
        }
    }
?>

<?php
    class Admin extends Utilisateur{
        protected static $ban;

        protected int $salaire;
        
        public function __construct($n, $p, $r , $k){
            $this->user_name = strtoupper($n);
            $this->user_pass = $p;
            $this->user_region = $r;
            $this->salaire = $k;
        }
        
        public function setBan(...$b){
            foreach($b as $banned){
                self::$ban[].= $banned;
            }
        }
        public function getBan(){
            echo 'Utilisateurs bannis : ';
            foreach(self::$ban as $valeur){
                echo $valeur .', ';
            }
        }
        
        public function setPrixAbo(){
            if($this->user_region === 'Sud'){
                return $this->prix_abo = parent::ABONNEMENT / 6;
            }else{
                return $this->prix_abo = parent::ABONNEMENT / 3;
            }
        }
    }
?>

<?php
    class Abonne extends Utilisateur{

        
        public function __construct($n, $p, $r){
            $this->user_name = $n;
            $this->user_pass = $p;
            $this->user_region = $r;
        }
        
        public function setPrixAbo(){
            if($this->user_region === 'Sud'){
                return $this->prix_abo = parent::ABONNEMENT / 2;
            }else{
                return $this->prix_abo = parent::ABONNEMENT;
            }
        }
    }
?>


<?php


const u1 = new Utilisateur('salem', 'Paris', 15, 123456);


const admin1 = new Admin('salem', 'Paris', 15, 123456 , 3000);


echo u1->getNom();

u1->setNom("salemv2");








?>
<?php 



// class abstraite animaux
abstract class Animaux {
    public function __construct() {
        echo "C'est un animal";
    }
    abstract public function seDeplacer();

    abstract public function nombreDesPieds();
}
// héritage avec implémentation de l'interface
class Oiseau extends Animaux  {
    public function seDeplacer() { // visibilité SUPERIEUR qui génère une erreur fatale
        echo 'Un oiseau se déplace en volant';
    }

    public function nombreDesPieds(){
      // visibilité SUPERIEUR qui génère une erreur fatale
        echo 'Un oiseau a 2 pieds';
    }


    public function voler(){
        echo "Un oiseau avec ses plumes";
    }
}
// class abstraite avion
abstract class Avion {
    public function __construct() {
        echo "C'est un avion";
    }
    abstract public function seDeplacer();
}
// héritage avec implémentation de l'interface
class Drone extends Avion  {
    public function seDeplacer() { // visibilité SUPERIEUR qui génère une erreur fatale
        echo 'Le drone se déplace en volant';
    }
    public function voler(){
        echo "je vole avec des hélices";
    }
}
$pigeon = new Oiseau;
echo '<br>';
$pigeon->seDeplacer();
echo '<br>';
$pigeon->voler();
echo '<br>';
$drone = new Drone;
echo '<br>';
$drone->seDeplacer();
echo '<br>';
$drone->voler();

?>




<?


/*

Ceci est un code PHP qui définit une classe appelée "User". Cette classe possède plusieurs méthodes qui sont utilisées pour interagir avec un utilisateur enregistré dans une base de données.

La classe a un constructeur qui reçoit une connexion à une base de données (variable $pdo) et stocke le courriel d'utilisateur actuel dans la session ($email).

Les méthodes incluent:

getUserByEmail: Cela sélectionne un utilisateur de la base de données en utilisant l'email de l'utilisateur actuel et le retourne.
getUserDataByEmail: Cela sélectionne un utilisateur de la base de données en utilisant un email spécifié en entrée et le retourne.
isAdmin: Cela vérifie si l'utilisateur actuel est un administrateur en regardant si la valeur 'isAdmin' dans la base de données est égale à 1.
logout: Cela déconnecte l'utilisateur en effaçant les données de session et en redirigeant vers la page de connexion.

*/ 



require './utils/connexion.php';
require_once './utils/fonction.php';

class User {
    private $pdo;
    private $email;

    private $data;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->email = $_SESSION['email'];
        $this->data = $_SESSION['user'];
    }

    public function getUserByEmail() {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getUserDataByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $_SESSION['user'] = $stmt->fetch();
        return $stmt->fetch();
    }



    public function isAdmin() {
        $user = $this->getUserByEmail();
        return $user['isAdmin'] == 1;
    }

    public function logout() {
        unset($_SESSION);
        header("Location: login.php");
        exit;
    }
}



?>
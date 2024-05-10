<?php
require_once "../config.php";

class crud_enseignant {
    private $pdo;

    public function __construct() {
        $connexion = new connexion();
        $this->pdo = $connexion->getConnexion();
    }

    public function loginEnseignant($cin, $password) {
        try {
            $sqlAdmin = "SELECT * FROM enseignant WHERE cin= ?";
            $stmtAdmin = $this->pdo->prepare($sqlAdmin);
            $stmtAdmin->execute([$cin]);
            $admin = $stmtAdmin->fetch();

            if ($admin && $password == $admin['password']) {
                return $admin;
            }

            return false;
        } catch (PDOException $e) {
            throw new Exception("Une erreur s'est produite lors de la connexion: " . $e->getMessage());
        }
    }
}
?>

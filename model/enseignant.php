<?php
require_once "../model/crud.php";
class enseignant
{
    private $cin;
    private $password;
    private $nom_prenom;
    private $pdo; // Ajoutez la propriété $pdo
    private $mail;
   

    // Définissez le constructeur pour initialiser $pdo
    public function __construct()
    {
        $obj = new connexion();
        $this->pdo = $obj->getConnexion();
    }

    // La méthode findAll() peut maintenant utiliser $pdo
    public function findAll()
    {
        $sql = "SELECT * FROM enseignant";
        $res = $this->pdo->query($sql);
        return $res->fetchAll(PDO::FETCH_NUM);
    }


    public function find_enseignant($nom)
    {
        $sql = "SELECT * FROM enseignant WHERE nom_prenom LIKE :nom";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nom', '%' . $nom . '%');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_NUM);
    }
    
    public function find($cin)
    {
        $sql = "SELECT * FROM enseignant WHERE cin = :cin";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':cin', $cin);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updateEmail($cin, $newEmail) {
        $sql = "UPDATE enseignant SET mail = :newEmail WHERE cin = :cin";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':newEmail', $newEmail);
        $stmt->bindValue(':cin', $cin);
        $stmt->execute();
        return $stmt->rowCount();
    }
    

    public function addEnseignant($cin, $nom_prenom, $email, $password) {
        // Correction de l'ordre des paramètres dans la requête SQL
        $sql = "INSERT INTO enseignant (cin, password, nom_prenom, mail) VALUES (:cin, :password, :nom_prenom, :email)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':cin', $cin);
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':nom_prenom', $nom_prenom);
        $stmt->bindValue(':email', $email);
        return $stmt->execute();
    }
    
    

    public function deleteEnseignant($cin) {
        $sql = "DELETE FROM enseignant WHERE cin = :cin";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':cin', $cin);
        return $stmt->execute();
    }
    

    
    
}

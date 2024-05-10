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
        $sql = "SELECT * FROM enseignant WHERE nom_prenom = :nom";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_NUM);
    }

    public function find($cin)
    {
        $sql = "SELECT * FROM enseignant WHERE cin = :cin";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':cin', $cin);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_NUM);
    }
    




    public function updateens($ancienCIN, $nomprenom, $password, $mail) {
      
        $sql = "UPDATE enseignant SET nom_prenom = :nomprenom, password = :password, mail = :mail WHERE cin = :ancienCIN";
    
        $stmt = $this->pdo->prepare($sql);
    
        $stmt->bindValue(':ancienCIN', $ancienCIN);
        $stmt->bindValue(':nomprenom', $nomprenom);
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':mail', $mail);
    
        $stmt->execute();
    
        $rowCount = $stmt->rowCount();
        return $rowCount > 0; // Retourne true si au moins une ligne a été mise à jour, sinon false
    }
    
}

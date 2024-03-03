<?php
require_once "../model/etudiant.php";
require_once "../model/crud.php";

class crud_etudiant extends crud
{
    protected $table = 'etudiant';

    function remplit_etud($cin_etudiant1, $nom_prenom_etud1, $email_etud1, $groupe_etud1, $cin_etud2, $nom_prenom_etud2, $email_etud2, $groupe_etud2) {
        try {
            $sql = "UPDATE etudiant SET 
                    nom_prenom_etud1 = :nom_prenom_etud1, 
                    email_etud1 = :email_etud1, 
                    groupe_etud1 = :groupe_etud1, 
                    cin_etud2 = :cin_etud2, 
                    nom_prenom_etud2 = :nom_prenom_etud2, 
                    eamil_etud2 = :email_etud2, 
                    groupe_etud2 = :groupe_etud2
                    WHERE cin_etudiant1 = :cin_etudiant1";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':nom_prenom_etud1', $nom_prenom_etud1);
            $stmt->bindParam(':email_etud1', $email_etud1);
            $stmt->bindParam(':groupe_etud1', $groupe_etud1);
            $stmt->bindParam(':cin_etud2', $cin_etud2);
            $stmt->bindParam(':nom_prenom_etud2', $nom_prenom_etud2);
            $stmt->bindParam(':email_etud2', $email_etud2);
            $stmt->bindParam(':groupe_etud2', $groupe_etud2);
            $stmt->bindParam(':cin_etudiant1', $cin_etudiant1);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception("Une erreur s'est produite lors de la mise à jour du projet: " . $e->getMessage());
        }
    }

    function inscrit($cin, $email, $p) {
        try {
            $sql = "UPDATE etudiant SET password = :password, email_etud1 = :email WHERE cin_etudiant1 = :cin";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array(':password' => $p, ':email' => $email, ':cin' => $cin));

            // Check if the query was successful
            $res = $stmt->rowCount();
            if ($res === 0) {
                throw new Exception("Vous êtes déjà inscrit à cette formation.");
            }

            return $res;
        } catch (PDOException | Exception $e) {
            throw new Exception("Une erreur s'est produite lors de l'inscription: " . $e->getMessage());
        }
    }
}
?>

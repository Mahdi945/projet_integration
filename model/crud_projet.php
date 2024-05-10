<?php
require_once "../model/projet.php";
require_once "../model/crud.php";

class crud_projet extends crud
{
    protected $table = 'projet';
    function remplit_projet($titre_projet, $encadreur_iset, $encadreur_entreprise, $nom_entreprise, $fiche, $cin_etudiant1, $cin_etudiant2) {
        try {
            $sql = "INSERT INTO projet (titre, encadreur_iset, nom_entreprise, encadreur_entreprise, cin_etudiant1, cin_etudiant2, fiche) 
                    VALUES (:titre, :encadreur_iset, :nom_entreprise, :encadreur_entreprise, :cin_etudiant1, :cin_etudiant2, :fiche)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':titre', $titre_projet);
            $stmt->bindParam(':encadreur_iset', $encadreur_iset);
            $stmt->bindParam(':nom_entreprise', $nom_entreprise);
            $stmt->bindParam(':encadreur_entreprise', $encadreur_entreprise);
            $stmt->bindParam(':cin_etudiant1', $cin_etudiant1);
            $stmt->bindParam(':cin_etudiant2', $cin_etudiant2);
            $stmt->bindParam(':fiche', $fiche);

            $stmt->execute();

            return true;
        } catch (PDOException | Exception $e) {
            throw new Exception("An error occurred while inserting project: " . $e->getMessage());
        }}
   

    function count(){
        $sql = "SELECT COUNT(*) FROM projet";
        $res = $this->pdo->query($sql);
        return $res->fetchColumn();
    }

    function findAll()
    {
        $sql = "SELECT * FROM  projet join etudiant on projet.cin_etudiant1=etudiant.cin_etudiant1";
        $res = $this->pdo->query($sql);
        return $res->fetchAll(PDO::FETCH_NUM);
    }
    function delete_projet($cin_etudiant1)
    {
        try {
            $sql = "DELETE FROM projet WHERE cin_etudiant1 = :cin_etudiant1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':cin_etudiant1', $cin_etudiant1);
            $stmt->execute();
        } catch (PDOException | Exception $e) {
            throw new Exception("An error occurred while deleting project: " . $e->getMessage());
        }
    }
    
    function updateEtatProjet($id_projet, $etat) {
        try {
            $query = "UPDATE projet SET etat = :etat WHERE id_projet = :id_projet";
            $stmt = $this->connexion->prepare($query);
            $stmt->execute(array(':etat' => $etat, ':id_projet' => $id_projet));
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
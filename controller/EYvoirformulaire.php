<?php
require_once "../model/crud_projet.php";

// Initialisez les variables
$n = 0;
$l = [];
$search_results = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si le champ de recherche n'est pas vide
    if (!empty($_POST['nom_entreprise'])) {
        // Récupère la valeur entrée par l'utilisateur
        $search_term = $_POST['nom_entreprise'];

        // Construit la requête SQL avec la clause WHERE pour filtrer les résultats
        $sql = "SELECT * FROM projet 
        JOIN etudiant ON projet.cin_etudiant1 = etudiant.cin_etudiant1 
        WHERE etudiant.nom_prenom_etud1 LIKE :search_term 
        OR etudiant.nom_prenom_etud2 LIKE :search_term 
        OR etudiant.cin_etudiant1 LIKE :search_term 
        OR etudiant.cin_etud2 LIKE :search_term 
        OR etudiant.email_etud1 LIKE :search_term 
        OR etudiant.eamil_etud2 LIKE :search_term";

        // Créer une nouvelle connexion PDO
        require_once "../config.php";
        $connexion = new connexion();
        $pdo = $connexion->getConnexion();

        // Exécute la requête avec le terme de recherche
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':search_term' => "%$search_term%"));

        // Récupère les résultats de la requête
        $search_results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($search_results);
        // Compte le nombre de résultats
        $n = count($search_results);
    }
}

$crud_projet = new crud_projet();

// Si aucune recherche n'a été effectuée, récupérez la liste complète des étudiants
if (empty($search_results)) {
    $n = $crud_projet->count();
    $l = $crud_projet->findAll(); //liste
    var_dump($l);
    
}

include "../view/voirformulaire.php";
?>
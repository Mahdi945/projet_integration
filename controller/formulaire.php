<?php
include "../model/crud_projet.php";
include "../model/crud_etudiant.php";
require_once '../config.php';

$connexion = new connexion();
$pdo = $connexion->getConnexion();

if(isset($_POST['submit']) && $_POST['submit'] === 'Supprimer') {
    $cin_etudiant2 = $_POST['etudiant2_cin'];
    $cin_etudiant1 = $_POST['etudiant1_cin'];
    $crud_projet = new crud_projet(); // Instanciation de l'objet CRUD pour le projet
    $deleterojet = $crud_projet->delete_projet($cin_etudiant1);
    $crud_etudiant = new crud_etudiant(); // Instanciation de l'objet CRUD pour les étudiants
    $addetud = $crud_etudiant->delete_etud($cin_etudiant1);
} else {
    if(isset($_POST['etudiant1_nom']) && isset($_POST['etudiant1_groupe']) && isset($_POST['etudiant1_email']) && isset($_POST['etudiant2_groupe']) 
    && isset($_POST['etudiant2_email']) && isset($_POST['etudiant2_nom']) && isset($_POST['titre_projet'])
    && isset($_POST['encadreur_iset']) && isset($_POST['nom_entreprise']) && isset($_POST['encadreur_entreprise'])
    && isset($_POST['etudiant1_cin']) && isset($_POST['etudiant2_cin']) && isset($_FILES['fiche_pfe'])) {
        $etudiant1_nom = $_POST['etudiant1_nom'];
        $etudiant1_groupe = $_POST['etudiant1_groupe'];
        $email_etudiant1 = $_POST['etudiant1_email'];
        $etudiant2_groupe = $_POST['etudiant2_groupe'];
        $email_etudiant2 = $_POST['etudiant2_email'];
        $etudiant2_nom = $_POST['etudiant2_nom'];
        $titre_projet = $_POST['titre_projet'];
        $encadreur_iset = $_POST['encadreur_iset'];
        $nom_entreprise = $_POST['nom_entreprise'];
        $encadreur_entreprise = $_POST['encadreur_entreprise'];
        $cin_etudiant2 = $_POST['etudiant2_cin'];
        $cin_etudiant1 = $_POST['etudiant1_cin'];

        // File upload handling
        $uploadDir = '../uploads/';
        $filename = basename($_FILES['fiche_pfe']['name']);

        // Check if file is a PDF
        $fileType = pathinfo($filename, PATHINFO_EXTENSION);
        if(strtolower($fileType) !== 'pdf') {
        echo "Le fichier doit être un PDF.";
        exit;
        }

        // Check if upload directory exists and is writable
        if (!is_dir($uploadDir) || !is_writable($uploadDir)) {
            echo "Le dossier d'upload n'existe pas ou n'est pas accessible en écriture.";
            exit;
        }

        // Check if file was uploaded without errors
        if (!is_uploaded_file($_FILES['fiche_pfe']['tmp_name'])) {
            echo "Une erreur s'est produite lors du téléchargement du fichier.";
            exit;
        }

        // Check if file size is not too large
        if ($_FILES['fiche_pfe']['size'] > 5000000) { // Change this to the maximum file size you want to allow
            echo "Le fichier est trop grand.";
            exit;
        }

        $uploadFile = $uploadDir . $filename;
        if (move_uploaded_file($_FILES['fiche_pfe']['tmp_name'], $uploadFile)) {
            $fiche = $filename;
            try {
                $crud_projet = new crud_projet(); // Instanciation de l'objet CRUD pour le projet
                $addprojet = $crud_projet->remplit_projet($titre_projet, $encadreur_iset, $encadreur_entreprise, $nom_entreprise, $fiche, $cin_etudiant1, $cin_etudiant2);

                $crud_etudiant = new crud_etudiant(); // Instanciation de l'objet CRUD pour les étudiants
                $addetud = $crud_etudiant->remplit_etud($cin_etudiant1, $etudiant1_nom, $email_etudiant1, $etudiant1_groupe, $cin_etudiant2, $etudiant2_nom, $email_etudiant2, $etudiant2_groupe);

                header("Location: ../view/loginEtudiant.php?success=Formulaire envoyé, veuillez attendre la confirmation de l'encadrant.");
                exit;
            } catch (Exception $e) {
                // Afficher un message d'erreur convivial
                echo $e->getMessage();
            }
        } else {
            echo "Une erreur s'est produite lors du déplacement du fichier vers le dossier d'upload.";
        }
    }
}
?>

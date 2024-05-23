<?php
require_once "../model/enseignant.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cin']) && isset($_POST['nom_prenom']) && isset($_POST['email']) && isset($_POST['password'])) {
        $cin = $_POST['cin'];
        $nom_prenom = $_POST['nom_prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $crud = new enseignant();
        $result = $crud->addEnseignant($cin, $nom_prenom, $email, $password); // Ajout de $password

        if ($result) {
            $message = "Enseignant ajouté avec succès";
            header("Location: ../view/accueiladmin.php?success=" . urlencode($message));
            exit;
        } else {
            echo "Erreur lors de l'ajout de l'enseignant.";
        }
    } else {
        echo "Tous les champs sont obligatoires.";
    }
}
?>

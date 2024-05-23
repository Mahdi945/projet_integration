<?php
require_once "../model/enseignant.php";

$cin = $nom_prenom = $email = ''; // Initialisation des variables
$crud = new enseignant(); // Initialize $crud object

if (isset($_GET['id']) && isset($_POST['email'])) {
    $cin = $_GET['id'];
    $newEmail = $_POST['email'];

    // Debugging: print the received data
    var_dump($cin, $newEmail);

    $crud = new enseignant();
    $affectedRows = $crud->updateEmail($cin, $newEmail);

    if ($affectedRows > 0) {
        $message = "Enseignant modifié avec succès";
        header("Location: ../view/accueiladmin.php?success=" . urlencode($message));
        exit;
    } else {
        echo "Échec de la mise à jour de l'email.";
    }
} else {
    echo "Les paramètres requis sont manquants.";
    exit;
}


require_once "../view/modifier.php";

   
   
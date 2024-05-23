<?php
require_once "../model/enseignant.php";

if (isset($_GET['id'])) {
    $cin = $_GET['id'];
    $crud = new enseignant();
    $result = $crud->deleteEnseignant($cin);

    if ($result) {
        $message = "Enseignant supprimé avec succès";
        header("Location: ../view/accueiladmin.php?success=" . urlencode($message));
        exit;
    } else {
        echo "Erreur lors de la suppression de l'enseignant.";
    }
} else {
    echo "Le paramètre ID est manquant.";
}
?>

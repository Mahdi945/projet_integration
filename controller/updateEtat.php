<?php
require_once "../model/projet.php";
require_once "../model/crud.php";
// Vérifier si les données nécessaires ont été envoyées
if(isset($_POST['id_projet']) && isset($_POST['etat'])) {
$crud_projet = new crud_projet();
$crud_projet->updateEtatProjet($_POST['id_projet'], $_POST['etat']);
}
else {
}
?>

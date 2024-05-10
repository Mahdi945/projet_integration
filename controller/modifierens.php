<?php
require_once "../model/enseignant.php";

$crud = new enseignant() ;

// les données du formulaire  ont  été modifé on reçoit via post
//les nouvelles données  
if (!isset($_POST['ok'])) {
    $id= $_GET['id'];
$ens= $crud->find($id);


    
include "../view/modifier.php";
}?>

 <?php   

if (isset($_POST['ok'])) {
        $cin = $_POST['id'];
        $nomprenom = $_POST['nom'];
        $password = $_POST['prenom'];
        $mail= $_POST['image'];
        
    $res = $crud->updateens($cin, $nomprenom,$password,$mail);
    if ($res) { ?>
        <div class="alert alert-success" role="alert">
        enseignant modifié avec succée
        </div>
        
        <?php
        require_once "../view/modifier.php";
   
    }}
?>  
<?php 
session_start();
include "../config.php";
require_once "../model/crud_etudiant.php";
require_once "../model/crud_enseignant.php";

if(isset($_POST['uname']) && isset($_POST['pass'])){
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    
    if(empty($uname)){
        $em = "User name is required";
        header("Location: ../view/signup.php?error=$em");
        exit;
    } elseif(empty($pass)){
        $em = "Password is required";
        header("Location: ../view/signup.php?error=$em");
        exit;
    } else {
        $crud = new crud_etudiant();
        $etudiant = $crud->login($uname, $pass);
        
        if ($etudiant) {
            $_SESSION['id'] = $etudiant['id'];
            $_SESSION['username'] = $etudiant['nom_p'];
            // Redirect to formulaire.php for participants
            header("Location: ../view/formulaire.php?cin=$uname");
            exit;
        } else {
            $crudEnseignant = new crud_enseignant();
            $enseignant = $crudEnseignant->loginEnseignant($uname, $pass);
            
            if ($enseignant) {
                $_SESSION['admin_id'] = $enseignant['id'];
                $_SESSION['admin_name'] = $enseignant['nom_a'];
                // Redirect to homeadmin.php for admins
                header("Location: ../controller/voirformulaire.php");
                exit;
            } else {
                // Mot de passe incorrect, rediriger vers la même page
                header("Location: ../view/loginEtudiant.php?error=Invalid credentials");
                exit;
            }
        }
    }
} else {
    header("Location: ../view/signup.php?error=error");
    exit;
}
?>

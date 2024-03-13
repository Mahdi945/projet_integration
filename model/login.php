<?php 
session_start();
include "../config.php";
$conn = new connexion();
$pdo = $conn->getConnexion();

if(isset($_POST['uname']) && isset($_POST['pass'])){
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    if(empty($uname)){
        $em = "User name is required";
        header("Location: ../view/signup.php?error=$em");
        exit;
        
    } 
    elseif(empty($pass)){
        $em = "Password is required";
        header("Location: ../view/signup.php?error=$em");
        exit;
    } 
    else {
        $sqlParticipant = "SELECT * FROM etudiant WHERE cin_etudiant1 = ?";
        $stmtParticipant = $pdo->prepare($sqlParticipant);
        $stmtParticipant->execute([$uname]);
        if ($stmtParticipant->rowCount() == 1) {
            $etudiant = $stmtParticipant->fetch();
            $password = $etudiant['password'];
            if (password_verify($pass, $password)) {
                $_SESSION['id'] = $participant['id'];
                $_SESSION['username'] = $participant['nom_p'];
                // Redirect to homeparticipant.php for participants
                header("Location: ../view/formulaire.php");
                exit;
            } else {
                // Mot de passe incorrect, rediriger vers la même page
                header("Location: ../view/loginEtudiant.php?error=Invalid password");
                exit;
            }
        }

        // Check if the user is an enseignant
        $sqlAdmin = "SELECT * FROM enseignant WHERE cin= ?";
        $stmtAdmin = $pdo->prepare($sqlAdmin);
        $stmtAdmin->execute([$uname]);
        if ($stmtAdmin->rowCount() == 1) {
            $admin = $stmtAdmin->fetch();
            $password = $admin['password'];
            if (password_verify($pass, $password)) {
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_name'] = $admin['nom_a'];
                // Redirect to homeadmin.php for admins
                header("Location: ../controller/voirformulaire.php");
                exit;
            } else {
                // Mot de passe incorrect, rediriger vers la même page
                header("Location: ../view/loginEtudiant.php?error=Invalid password");
                exit;
            }
        }
    }
}
else {
    header("Location: ../view/signup.php?error=error");
    exit;
}
?>

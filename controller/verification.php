<?php
session_start();
include "../config.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["verify"])){
    $otp = $_SESSION['otp'];
    $email = $_SESSION['email'];
    $otp_code = $_POST['otp_code'];

    if($otp != $otp_code){
        ?>
       <script>
           alert("Code OTP incorrect");
           window.location.replace("../view/verification.php");
       </script>
       <?php
    }else{
        $connexion = new connexion(); // Créer une instance de la classe connexion
        $conn = $connexion->getConnexion(); // Récupérer la connexion à la base de données
        $stmt = $conn->prepare("UPDATE etudiant SET status = 1 WHERE email_etud1 = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        ?>
         <script>
             alert("Compte vérifié, vous pouvez maintenant vous connecter");
             window.location.replace("../view/loginEtudiant.php");
         </script>
         <?php
    }
} else {
    header("Location: ../view/verification.php");
    exit;
}
?>

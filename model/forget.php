<?php
session_start();
include "../config.php";
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';
require_once '../PHPMailer/src/Exception.php';
include "../model/crud_etudiant.php"; // Inclure le fichier contenant la classe crud_etudiant

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$connexion = new connexion();
$pdo = $connexion->getConnexion();

$crud_etudiant = new crud_etudiant(); // Instancier la classe crud_etudiant

if(isset($_POST['email'])) {
    $email = $_POST['email'];

    // Vérifier si l'e-mail existe dans la table etudiant
    if ($crud_etudiant->emailExists($email)) {
        // Générer un code OTP
        $otp = mt_rand(100000, 999999);

        // Enregistrer le code OTP dans la session
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;

        // Envoyer l'e-mail de réinitialisation
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Serveur SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'mahdibeyy@gmail.com'; // Votre adresse email SMTP
        $mail->Password = 'vezrnllldvzwiclg'; // Mot de passe SMTP
        $mail->SMTPSecure = 'tls'; // Protocole de sécurité
        $mail->Port = 587; // Port SMTP

        $mail->setFrom('mahdibeyy@gmail.com', 'mahdi bey '); // Votre adresse email
        $mail->addAddress($email); // Email du destinataire

        $mail->isHTML(true); // Format de l'email en HTML
        $mail->Subject = 'Reinitialisation de mot de passe'; // Sujet de l'email
        $mail->Body = 'Votre code OTP pour réinitialiser votre mot de passe est : ' . $otp; // Corps de l'email

        if($mail->send()) {
            header("Location: ../view/otp.php");
            exit;
        } else {
            echo 'Erreur lors de l\'envoi de l\'email : ' . $mail->ErrorInfo;
        }
    } else {
        echo '<script>alert("L\'adresse e-mail n\'existe pas dans la base de données."); window.location.href="../view/forget.php";</script>';
    }
}
?>

<?php
session_start();
include "../model/crud_etudiant.php";
require_once '../config.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';
require_once '../PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$connexion = new connexion();
$pdo = $connexion->getConnexion();

if(isset($_POST['cin']) && isset($_POST['email']) && isset($_POST['Password']) && isset($_POST['Conf-Password'])){
    $fcin = $_POST['cin'];
    $fEmail = $_POST['email'];
    $fPassword = $_POST['Password'];
    $fConf_Password = $_POST['Conf-Password'];

    if (empty($fcin)) {
        $em = "CIN is required";
        header("Location: ../index.php?error=$em");
        exit;
    } elseif(empty($fEmail)) {
        $em = "Email is required";
        header("Location: ../index.php?error=$em");
        exit;
    } elseif(empty($fPassword)) {
        $em = "Password is required";
        header("Location: ../index.php?error=$em");
        exit;
    } elseif(empty($fConf_Password)) {
        $em = "Confirmation Password is required";
        header("Location: ../index.php?error=$em");
        exit;
    } elseif ($fPassword !== $fConf_Password) {
        $em = "Passwords do not match";
        header("Location: ../index.php?error=$em");
        exit;
    } else {
        $sql = "SELECT cin_etudiant1 FROM etudiant WHERE cin_etudiant1 = :cin";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['cin' => $fcin]);
        if($stmt->rowCount() == 0) {
            $em = "Vous ne faites pas partie des étudiants de L3";
            header("Location: ../index.php?error=$em");
            exit;
        } else {
            try {
                $hashedPassword = password_hash($fPassword, PASSWORD_DEFAULT);
                $crud_etudiant = new crud_etudiant();
                $addlaformation = $crud_etudiant->inscrit($fcin, $fEmail, $hashedPassword);
                
                // Générer un code OTP
                $otp = mt_rand(100000, 999999);
                
                // Enregistrer l'OTP dans la session
                $_SESSION['otp'] = $otp;
                $_SESSION['email'] = $fEmail;
                
                // Envoyer l'email de vérification
                $mail = new PHPMailer(true);
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Serveur SMTP
                $mail->SMTPAuth = true;
                $mail->Username = 'mahdibeyy@gmail.com'; // Votre adresse email SMTP
                $mail->Password = 'vezrnllldvzwiclg'; // Mot de passe SMTP
                $mail->SMTPSecure = 'tls'; // Protocole de sécurité
                $mail->Port = 587; // Port SMTP
                
                $mail->setFrom('mahdibeyy@gmail.com', 'Mahdi Bey'); // Votre adresse email
                $mail->addAddress($fEmail); // Email du destinataire
                
                $mail->isHTML(true); // Format de l'email en HTML
                $mail->Subject = 'Code de vérification'; // Sujet de l'email
                $mail->Body = 'Votre code OTP est : ' . $otp; // Corps de l'email
                
                $mail->send(); // Envoyer l'email
                
                header("Location: ../view/verification.php");
                exit;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
} else {
    header("Location: ../signup.php?error=error");
    exit;
}
?>

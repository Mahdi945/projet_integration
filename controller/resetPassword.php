<?php
session_start();
include "../config.php";
$connexion = new connexion();
$pdo = $connexion->getConnexion();

if (!isset($_SESSION['reset_token']) || !isset($_SESSION['reset_email'])) {
    // Rediriger vers une page d'erreur ou une autre page appropriée si le token ou l'e-mail n'est pas défini
    header("Location: ../view/loginEtudiant.php");
    exit;
}

if (isset($_POST['otp']) && isset($_POST['newPassword'])) {
    $otp = $_POST['otp'];
    $newPassword = $_POST['newPassword'];
    if (empty($otp) || empty($newPassword)) {
        $em = "OTP and New Password are required";
        header("Location: ../view/resetPassword.php?error=$em");
        exit;
    } elseif ($_SESSION['otp'] !== $otp) {
        $em = "Invalid OTP";
        header("Location: ../view/resetPassword.php?error=$em");
        exit;
    } else {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE etudiant SET password = :password WHERE email_etud1 = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['password' => $hashedPassword, 'email' => $_SESSION['reset_email']]);
        unset($_SESSION['otp']);
        unset($_SESSION['reset_token']);
        unset($_SESSION['reset_email']);
        header("Location: ../index.php?success=Password reset successfully");
        exit;
    }
} else {
    header("Location: ../view/resetPassword.php?error=error");
    exit;
}
?>

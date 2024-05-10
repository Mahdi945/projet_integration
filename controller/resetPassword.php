<?php
include('../config.php');
include('../model/crud_etudiant.php');
$crud_etudiant = new crud_etudiant();

if (isset($_POST['newPassword']) && isset($_POST['confirmPassword'])) {
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if (empty($newPassword) || empty($confirmPassword)) {
        $em = "New Password and Confirm Password are required";
        header("Location: ../view/resetPassword.php?error=$em");
        exit;
    } elseif ($newPassword !== $confirmPassword) {
        $em = "Passwords do not match";
        header("Location: ../view/resetPassword.php?error=$em");
        exit;
    } else {
        try {
            $crud_etudiant->reinitialiserMotDePasse($_SESSION['reset_email'], $newPassword);
            unset($_SESSION['reset_email']);
            header("Location: ../view/loginEtudiant.php?success=Password reset successfully");
            exit;
        } catch (Exception $e) {
            $em = "Error resetting password: " . $e->getMessage();
            header("Location: ../view/resetPassword.php?error=$em");
            exit;
        }
    }
} else {
    header("Location: ../view/resetPassword.php?error=error");
    exit;
}

?>

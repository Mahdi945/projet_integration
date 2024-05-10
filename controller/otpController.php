<?php
session_start();
include "../config.php";

if (!isset($_SESSION['otp']) || !isset($_SESSION['email'])) {
    // Redirect to an error page if the OTP code or email is not set
    header("Location: ../view/otp.php?error=error");
    exit;
}

if (isset($_POST['otp'])) {
    $otp = (int)$_POST['otp']; // Cast the OTP to an integer
    if (empty($otp)) {
        $em = "OTP is required";
        header("Location: ../view/otp.php?error=$em");
        exit;
    } elseif ($_SESSION['otp'] !== $otp) {
        $em = "Invalid OTP";
        header("Location: ../view/otp.php?error=$em");
        exit;
    } else {
        // The OTP code is correct, you can store the reset email in the session
        $_SESSION['reset_email'] = $_SESSION['email'];
        unset($_SESSION['otp']);
        unset($_SESSION['email']);
        header("Location: ../view/resetPassword.php?success=1");
        exit;
    }
} else {
    header("Location: ../view/otp.php?error=error");
    exit;
}
?>
<?php
require_once "../model/crud_projet.php";
require_once "../config.php";
require_once "../PHPMailer/src/PHPMailer.php";
require_once "../PHPMailer/src/SMTP.php";
require_once "../PHPMailer/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$crud_projet = new crud_projet();
$n = $crud_projet->count();
$l = $crud_projet->findAll(); //liste

// Traitement de la soumission du formulaire de refus
if (isset($_POST['avis']) && $_POST['avis'] === 'refus') {
    // Vérifier si le champ de raison de refus est vide
    if (empty($_POST['raison_refus'])) {
        echo "Veuillez saisir une raison de refus.";
    } else {
        // Récupérer la raison de refus saisie par le professeur
        $raison_refus = $_POST['raison_refus'];

        // Récupérer les adresses e-mail des étudiants
        $id_projet = $_POST['id_projet'];
        $sqlEmails = "SELECT email_etud1, email_etud2 FROM etudiant WHERE id_projet = ?";
        $stmtEmails = $pdo->prepare($sqlEmails);
        $stmtEmails->execute([$id_projet]);
        $emails = $stmtEmails->fetch(PDO::FETCH_ASSOC);

        $emailBinome1 = $emails['email_etud1'];
        $emailBinome2 = $emails['email_etud2'];

        // Envoyer un e-mail aux étudiants
        require_once "../PHPMailer/src/PHPMailer.php";
        require_once "../PHPMailer/src/SMTP.php";
        require_once "../PHPMailer/src/Exception.php";

        // Créer une instance de PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Paramètres SMTP
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'mahdibeyy@gmail.com'; // Votre adresse email SMTP
            $mail->Password = 'vezrnllldvzwiclg';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Paramètres de l'email
            $mail->setFrom('mahdibeyy@gmail.com', 'Mahdi Bey');
            $mail->addAddress($emailBinome1);
            $mail->addAddress($emailBinome2);

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = 'Refus du projet';
            $mail->Body = "Votre projet a été refusé pour la raison suivante : $raison_refus";

            // Envoyer l'e-mail
            $mail->send();
            echo 'E-mail envoyé avec succès.';
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
        }
    }
}

// Inclure le fichier vue
include "../view/voirformulaire.php";
?>
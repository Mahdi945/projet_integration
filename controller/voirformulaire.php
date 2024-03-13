<?php
require_once "../model/crud_projet.php";
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';
require_once '../PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$n = 0;
$l = [];
$search_results = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si le champ de recherche n'est pas vide
    if (!empty($_POST['nom_entreprise'])) {
        // Récupère la valeur entrée par l'utilisateur
        $search_term = $_POST['nom_entreprise'];

        // Construit la requête SQL avec la clause WHERE pour filtrer les résultats
        $sql = "SELECT * FROM projet 
        JOIN etudiant ON projet.cin_etudiant1 = etudiant.cin_etudiant1 
        WHERE etudiant.nom_prenom_etud1 LIKE :search_term 
        OR etudiant.nom_prenom_etud2 LIKE :search_term 
        OR etudiant.cin_etudiant1 LIKE :search_term 
        OR etudiant.cin_etud2 LIKE :search_term 
        OR etudiant.email_etud1 LIKE :search_term 
        OR etudiant.eamil_etud2 LIKE :search_term";

        // Créer une nouvelle connexion PDO
        require_once "../config.php";
        $connexion = new connexion();
        $pdo = $connexion->getConnexion();

        // Exécute la requête avec le terme de recherche
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':search_term' => "%$search_term%"));

        // Récupère les résultats de la requête
        $search_results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Compte le nombre de résultats
        $n = count($search_results);
    }
}

$crud_projet = new crud_projet();

// Si aucune recherche n'a été effectuée, récupère la liste complète des étudiants
if (empty($search_results)) {
    $n = $crud_projet->count();
    $l = $crud_projet->findAll(); //liste
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['avis']) && $_POST['avis'] == 'refus') {
    // Récupérer la raison de refus et les adresses e-mail depuis le formulaire
    $raisonRefus = $_POST['raison_refus'];
    $emailEtud1 = $_POST['email_etud1'];
    $emailEtud2 = $_POST['email_etud2'];

    // Envoyer un e-mail aux étudiants
    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Serveur SMTP
        $mail->SMTPAuth   = true;
        $mail->Username = 'mahdibeyy@gmail.com'; // Votre adresse e-mail SMTP
        $mail->Password = 'vezrnllldvzwiclg'; // Mot de passe SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Activer le cryptage TLS
        $mail->Port       = 587; // Port SMTP

        // Contenu de l'e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Raison de refus';
        $mail->Body    = 'Raison de refus : ' . $raisonRefus;

        // Ajouter les adresses e-mail des étudiants
        $mail->addAddress($emailEtud1);
        $mail->addAddress($emailEtud2);

        // Envoyer l'e-mail
        $mail->send();

        $emailEnvoye = true; // Définir la variable à true après avoir envoyé l'e-mail
        
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    }
}
$emailEnvoyee = false;
// Nouvelle fonction pour l'envoi d'email de validation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['avis']) && $_POST['avis'] == 'valider') {
    $emailEtud1 = $_POST['email_etud1'];
    $emailEtud2 = $_POST['email_etud2'];

    // Envoyer un e-mail de validation aux étudiants
    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Serveur SMTP
        $mail->SMTPAuth   = true;
        $mail->Username = 'mahdibeyy@gmail.com'; // Votre adresse e-mail SMTP
        $mail->Password = 'vezrnllldvzwiclg'; // Mot de passe SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Activer le cryptage TLS
        $mail->Port       = 587; // Port SMTP

        // Contenu de l'e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Validation de PFE';
        $mail->Body    = 'Votre PFE a été validé. Félicitations !';

        // Ajouter les adresses e-mail des étudiants
        $mail->addAddress($emailEtud1);
        $mail->addAddress($emailEtud2);

        // Envoyer l'e-mail
        $mail->send();

        $emailEnvoyee = true; // Définir la variable à true après avoir envoyé l'e-mail
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit;
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    }
}

include "../view/voirformulaire.php";

?>
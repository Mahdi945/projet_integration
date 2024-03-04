<?php
require_once "../model/crud_projet.php";
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';
require_once '../PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Initialisez les variables
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

// Si aucune recherche n'a été effectuée, récupérez la liste complète des étudiants
if (empty($search_results)) {
    $n = $crud_projet->count();
    $l = $crud_projet->findAll(); //liste
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['avis']) && $_POST['avis'] == 'refus') {
    // Récupérer les adresses e-mail des étudiants
    $projetId = $_POST['id_projet']; // ID du projet à partir du formulaire

    $crud_projet = new crud_projet();
    $projet = $crud_projet->findById($projetId); // Supposons que findById retourne un tableau avec les détails du projet, y compris les adresses e-mail des étudiants

    $emailEtud1 = $projet['email_etud1']; // Supposons que 'email_etud1' contient l'adresse e-mail du premier étudiant
    $emailEtud2 = $projet['eamil_etud2']; // Supposons que 'email_etud2' contient l'adresse e-mail du deuxième étudiant

    // Récupérer la raison de refus depuis le formulaire
    $raisonRefus = $_POST['raison_refus'];

    // Envoyer un e-mail aux étudiants
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Serveur SMTP
        $mail->SMTPAuth   = true;
        $mail->Username = 'mahdibeyy@gmail.com'; // Votre adresse email SMTP
        $mail->Password = 'vezrnllldvzwiclg'; // Mot de passe SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Activer le cryptage TLS
        $mail->Port       = 587; // Port SMTP

        //Recipients
        $mail->setFrom('mahdibeyy@gmail.com', 'mahdi bey');
        $mail->addAddress($emailEtud1); // Ajouter l'adresse e-mail du premier étudiant
        $mail->addAddress($emailEtud2); // Ajouter l'adresse e-mail du deuxième étudiant

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Raison de refus';
        $mail->Body    = 'Raison de refus : ' . $raisonRefus;

        $mail->send();
        echo 'E-mail envoyé avec succès';
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    }
}


include "../view/voirformulaire.php";
?>

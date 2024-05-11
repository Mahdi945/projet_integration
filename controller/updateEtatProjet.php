<?php
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_projet']) && isset($_POST['etat'])) {
        $id_projet = $_POST['id_projet'];
        $etat = $_POST['etat'];

        if (!empty($id_projet) && !empty($etat)) {
            try {
                $connexion = new connexion(); // Créer une instance de la classe connexion
                $conn = $connexion->getConnexion(); // Récupérer la connexion à la base de données

                $query = "UPDATE projet SET etat = :etat WHERE id_projet = :id_projet";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':etat', $etat);
                $stmt->bindParam(':id_projet', $id_projet);
                $stmt->execute();

                echo json_encode(['success' => true]);
            } catch (PDOException $e) {
                echo json_encode(['success' => false, 'error' => $e->getMessage()]);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Project ID or state is empty']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Missing project ID or state']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>
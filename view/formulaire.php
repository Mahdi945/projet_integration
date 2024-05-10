<?php
require_once '../config.php';
$connexion = new connexion();
$pdo = $connexion->getConnexion();
$cin = isset($_GET['cin']) ? $_GET['cin'] : null; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inscription PFE <?php echo get_annee_universitaire(); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],input[type="email"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="file"] {
            margin-top: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
$sql = "SELECT * FROM projet JOIN etudiant ON projet.cin_etudiant1 = etudiant.cin_etudiant1 WHERE etudiant.cin_etudiant1 = ? AND etudiant.cin_etud2 IS NOT NULL LIMIT 1";
$stmt =$pdo->prepare($sql);
$stmt->execute([$cin]);
$rowCount = $stmt->rowCount(); // Récupérer le nombre de lignes retournées

// Vérifier si la requête a retourné au moins une ligne
if ($rowCount > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC); // Récupérer la première ligne de résultat

// Maintenant, vous pouvez utiliser les valeurs de $row pour remplir les champs du formulaire

?>
<h1>Inscription PFE <?php echo get_annee_universitaire(); ?></h1>
<form action="../controller/formulaire.php" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir soumettre ce formulaire ?');" enctype="multipart/form-data">
    <label for="etudiant1_nom">Étudiant 1* :</label>
    <input type="text" id="etudiant1_nom" name="etudiant1_nom" value="<?php echo $row['nom_prenom_etud1']; ?>" placeholder="Nom et Prénom" required><br>
    <label for="etudiant1_groupe">Groupe Étudiant 1* :</label>
    <select id="etudiant1_groupe" name="etudiant1_groupe" required>
    <option value="" disabled>Choisissez votre classe</option>
    <option value="L3-DSI1" <?php echo ($row['groupe_etud1'] == 'L3-DSI1') ? 'selected' : ''; ?>>L3-DSI1</option>
    <option value="L3-DSI2" <?php echo ($row['groupe_etud1'] == 'L3-DSI2') ? 'selected' : ''; ?>>L3-DSI2</option>
    <option value="L3-DSI3" <?php echo ($row['groupe_etud1'] == 'L3-DSI3') ? 'selected' : ''; ?>>L3-DSI3</option>
    <option value="autre" <?php echo ($row['groupe_etud1'] == 'autre') ? 'selected' : ''; ?>>Autre</option>
</select><br>

        <label for="email_etudiant1">Email Étudiant 1*</label>
        <input type="email" name="etudiant1_email" value="<?php echo $row['email_etud1']; ?>"id="etudiant1_email" required><br>
        <label for="email_etudiant2">CIN Étudiant1</label>
        <input type="text" name="etudiant1_cin" value="<?php echo $row['cin_etudiant1']; ?>" id="etudiant2_cin" ><br>
        <label for="etudiant2_nom">Étudiant 2 :<label>
        <input type="text" id="etudiant2_nom" name="etudiant2_nom" placeholder="Nom" value="<?php echo $row['nom_prenom_etud2']; ?>"><br>
        <label for="etudiant2_groupe">Groupe Étudiant 2 :</label>
        <select id="etudiant2_groupe" name="etudiant2_groupe" required>
    <option value="" disabled>Choisissez votre classe</option>
    <option value="L3-DSI1" <?php echo ($row['groupe_etud2'] == 'L3-DSI1') ? 'selected' : ''; ?>>L3-DSI1</option>
    <option value="L3-DSI2" <?php echo ($row['groupe_etud2'] == 'L3-DSI2') ? 'selected' : ''; ?>>L3-DSI2</option>
    <option value="L3-DSI3" <?php echo ($row['groupe_etud2'] == 'L3-DSI3') ? 'selected' : ''; ?>>L3-DSI3</option>
    <option value="autre" <?php echo ($row['groupe_etud2'] == 'autre') ? 'selected' : ''; ?>>Autre</option>
</select><br>
        <label for="email_etudiant2">Email Étudiant 2</label>
        <input type="email" name="etudiant2_email" id="etudiant2_email" value="<?php echo $row['eamil_etud2']; ?>"><br>
        <label for="email_etudiant2">CIN Étudiant2</label>
        <input type="text" name="etudiant2_cin" id="etudiant2_cin" value="<?php echo $row['cin_etud2']; ?>"><br>
        <label for="titre_projet">Titre du projet* :</label>
        <input type="text" id="titre_projet" name="titre_projet" placeholder="Titre du projet" required onkeyup="capitalizeFirstLetter(this)"value="<?php echo $row['titre']; ?>"><br>
        <label for="encadreur_iset">Encadreur ISET* :</label>
        <input type="text" id="encadreur_iset" name="encadreur_iset" placeholder="Encadreur ISET" required value="<?php echo $row['encadreur_iset']; ?>"><br>
        <label for="nom_entreprise">Nom de l'entreprise* :</label>
        <input type="text" id="nom_entreprise" name="nom_entreprise" placeholder="Nom de l'entreprise" required value="<?php echo $row['nom_entreprise']; ?>"><br>
        <label for="encadreur_entreprise">Encadreur entreprise* :</label>
        <input type="text" id="encadreur_entreprise" name="encadreur_entreprise" placeholder="Encadreur entreprise"  value="<?php echo $row['encadreur_entreprise']; ?>"required><br>
        <label for="fichier_pfe">Importer le fichier PFE :</label>
        <input type="file" id="fiche" name="fiche" value="<?php echo $row['fiche']; ?>"><br> <br>
    
    <input type="submit" name="submit" value="Soumettre">
    <input type="submit" name="submit" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?');">
</form>
<?php 
}else{ ?>
    <h1>Inscription PFE <?php echo get_annee_universitaire(); ?></h1>
    <form action="../controller/formulaire.php" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir soumettre ce formulaire ?');">
        <label for="etudiant1_nom">Étudiant 1* :</label>
        <input type="text" id="etudiant1_nom" name="etudiant1_nom" placeholder="Nom et Prénom" required><br>
        <label for="etudiant1_groupe">Groupe Étudiant 1* :</label>
        <select id="etudiant1_groupe" name="etudiant1_groupe" required>
            <option value="" disabled selected>Choisissez votre classe</option>
            <option value="L3-DSI1">L3-DSI1</option>
            <option value="L3-DSI2">L3-DSI2</option>
            <option value="L3-DSI3">L3-DSI3</option>
            <option value="autre">Autre</option>
        </select><br>
        <label for="email_etudiant1">Email Étudiant 1*</label>
        <input type="email" name="etudiant1_email" id="etudiant1_email" required><br>
        <label for="email_etudiant2">CIN Étudiant1</label>
        <input type="text" name="etudiant1_cin" id="etudiant2_cin" ><br>
        <label for="etudiant2_nom">Étudiant 2 :<label>
        <input type="text" id="etudiant2_nom" name="etudiant2_nom" placeholder="Nom"><br>
        <label for="etudiant2_groupe">Groupe Étudiant 2 :</label>
        <select id="etudiant2_groupe" name="etudiant2_groupe">
            <option value="" disabled selected>Choisissez votre classe</option>
            <option value="L3-DSI1">L3-DSI1</option>
            <option value="L3-DSI2">L3-DSI2</option>
            <option value="L3-DSI3">L3-DSI3</option>
            <option value="autre">Autre</option>
        </select><br>
        <label for="email_etudiant2">Email Étudiant 2</label>
        <input type="email" name="etudiant2_email" id="etudiant2_email" ><br>
        <label for="email_etudiant2">CIN Étudiant2</label>
        <input type="text" name="etudiant2_cin" id="etudiant2_cin" ><br>
        <label for="titre_projet">Titre du projet* :</label>
        <input type="text" id="titre_projet" name="titre_projet" placeholder="Titre du projet" required onkeyup="capitalizeFirstLetter(this)"><br>
        <label for="encadreur_iset">Encadreur ISET* :</label>
        <input type="text" id="encadreur_iset" name="encadreur_iset" placeholder="Encadreur ISET" required><br>
        <label for="nom_entreprise">Nom de l'entreprise* :</label>
        <input type="text" id="nom_entreprise" name="nom_entreprise" placeholder="Nom de l'entreprise" required><br>
        <label for="encadreur_entreprise">Encadreur entreprise* :</label>
        <input type="text" id="encadreur_entreprise" name="encadreur_entreprise" placeholder="Encadreur entreprise" required><br>
        <label for="fichier_pfe">Importer le fichier PFE :</label>
        <input type="file" id="fiche" name="fiche"><br> <br>
        <input type="submit" name="submit" value="Soumettre">
        <input type="submit" name="submit" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?');">
    </form>
    <script>
        function capitalizeFirstLetter(input) {
            input.value = input.value.charAt(0).toUpperCase() + input.value.slice(1);
        }
        
      </script>
</body>
</html>
<?php }

function get_annee_universitaire() {
    $annee = date('Y');
    $mois = date('m');
    if ($mois < 9) {
        $annee = $annee - 1;
    }
    return $annee . '-' . ($annee + 1);
}

?>


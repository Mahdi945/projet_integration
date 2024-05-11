<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../styleProfesseur.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <title>La Liste de tous les étudiants</title>
</head>

<body>
    <div class="container">
        <h1>La Liste de tous les étudiants</h1>

        <form class="navbar-form navbar-left" role="search" method="post" action="">
            <div class="form-group">
                <input type="text" name="nom_entreprise" class="form-control" placeholder="nom de l'etudiant"
                    style="width: 200px;">
                <button type="submit" class="btn btn-default">Rechercher</button>
            </div>
            <?php 
            if (isset($n)) {
                echo "<h1>il y a $n binomes</h1>";
            }
            ?>
        </form>
        <?php 
        if (!empty($search_results)) {
            echo "<table class='table' id='example'>
                <thead>
                    <tr class='table-header'>
                        <th>Nom Binôme 1</th>
                        <th>Nom Binôme 2</th>
                        <th>CIN Binôme 1</th>
                        <th>CIN Binôme 2</th>
                        <th>Email Binôme 1</th>
                        <th>Email Binôme 2</th>
                        <th>Titre du Projet</th>
                        <th>Nom de l'Entreprise</th>
                        <th>Encadreur Entreprise</th>
                        <th>Encadreur ISET</th>
                        <th>Fiche</th>
                        <th colspan='2' class='text-center'>Decision</th>
                        <th>État</th>
                    </tr>
                </thead>
                <tbody>";
                foreach ($search_results as $par) {
                    echo "<tr class='table-data'>";
                    echo "<td>" . (isset($par['nom_prenom_etud1']) ? $par['nom_prenom_etud1'] : '') . "</td>";
                    echo "<td>" . (isset($par['nom_prenom_etud2']) ? $par['nom_prenom_etud2'] : '') . "</td>";
                    echo "<td>" . (isset($par['cin_etudiant1']) ? $par['cin_etudiant1'] : '') . "</td>";
                    echo "<td>" . (isset($par['cin_etudiant2']) ? $par['cin_etudiant2'] : '') . "</td>";
                    echo "<td>" . (isset($par['email_etud1']) ? $par['email_etud1'] : '') . "</td>";
                    echo "<td>" . (isset($par['eamil_etud2']) ? $par['eamil_etud2'] : '') . "</td>";
                    echo "<td>" . (isset($par['titre']) ? $par['titre'] : '') . "</td>";
                    echo "<td>" . (isset($par['nom_entreprise']) ? $par['nom_entreprise'] : '') . "</td>";
                    echo "<td>" . (isset($par['encadreur_entreprise']) ? $par['encadreur_entreprise'] : '') . "</td>";
                    echo "<td>" . (isset($par['encadreur_iset']) ? $par['encadreur_iset'] : '') . "</td>";
                    echo "<td><a href='../uploads/" . (isset($par['fiche']) ? $par['fiche'] : '') . "' download>Télécharger</a></td>";
                    echo "<td><button type='button' class='btn' onclick='validerProjet(this)'>Valider</button></td>";
                    echo "<td><button type='button' class='btn' onclick='showRefusForm(this)'>Refuser</button></td>";
                   
                    echo "<td></i><i id='checkIcon' class='fas fa-check' style='color: green; display: none;'></i><i id='crossIcon' class='fas fa-times' style='color: red; display: none;'></i></td>"; // Nouvelle colonne État
                   
                    echo "</tr>";
                }
                
            echo "</tbody></table>";
        } elseif (!empty($l)) {
            echo "<table class='table' id='example'>
                <thead>
                    <tr class='table-header'>
                        
                        <th>Nom Binôme 1</th>
                        <th>Nom Binôme 2</th>
                        <th>CIN Binôme 1</th>
                        <th>CIN Binôme 2</th>
                        <th>Email Binôme 1</th>
                        <th>Email Binôme 2</th>
                        <th>Titre du Projet</th>
                        <th>Nom de l'Entreprise</th>
                        <th>Encadreur Entreprise</th>
                        <th>Encadreur ISET</th>
                        <th>Fiche</th>
                        <th colspan='2' class='text-center'>Decision</th>
                        <th>État</th>
                        
                       
                    </tr>
                </thead>
                <tbody>";
                foreach ($l as $par) {
                    echo "<tr class='table-data'>";//$par[8] etat
                   
                    echo "<td>" . (isset($par[10]) ? $par[10] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td>" . (isset($par[14]) ? $par[14] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td>" . (isset($par[9]) ? $par[9] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td>" . (isset($par[13]) ? $par[13] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td>" . (isset($par[11]) ? $par[11] : '') . "</td>"; // Vérifie si la clé existe

                    echo "<td>" . (isset($par[15]) ? $par[15] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td>" . (isset($par[1]) ? $par[1] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td>" . (isset($par[4]) ? $par[4] : '') . "</td>"; // Vérifie si la clé existe
                    
                    echo "<td>" . (isset($par[3]) ? $par[3] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td>" . (isset($par[2]) ? $par[2] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td><a href='../uploads/" . (isset($par[5]) ? $par[5] : '') . "' download>Télécharger</a></td>";
                    echo "<td><button type='button' class='btn' onclick='validerProjet(this)' >Valider</button></td>";
                    echo "<td><button type='button' class='btn' onclick='showRefusForm(this)'>Refuser</button></td>";
                    
                    
                   if($par[8] == 'validé'){
                    echo "<td>
                    <i class='fas fa-check' style='color: green;'></i>
                    </td>";
                   }
                   else 
                  if($par[8] == 'refusé'){
                    echo "<td>
                    <i class='fas fa-times' style='color: red;'></i>
                    </td>";
                   }
                   else
                   echo "<td><i class='fas fa-hourglass' style='color: grey;'></i></td>"; 

                     // Nouvelle colonne État
                    
                    

                    echo "</tr>";
                }
                echo "</tbody></table>";
        } else {
            echo "Aucun résultat trouvé.";
        }
        ?>
  
        <div id="refusForm" style="display: none;">
            <span class="close-icon" onclick="closeRefusForm()"><i class="fas fa-times"></i></span>
            <h2>Raison de refus</h2>
            <form action="../controller/voirformulaire.php" method="post">
                <input type="hidden" id="idProjetRefus" name="id_projet">
                <input type="hidden" id="emailEtud1" name="email_etud1">
                <input type="hidden" id="emailEtud2" name="email_etud2">
                <textarea name="raison_refus" id="raisonRefus" cols="30" rows="5"></textarea><br>
                <button type="submit" name="avis" value="refus" class="btn" onclick="refuserProjet(this)">Envoyer</button>
            </form>
        </div> <br>
        <button id="exportExcelBtn" class="btn btn-primary" onclick="extraireExcel()">Extraire Excel</button>
    </div>
    <script src ="../etat.js">
</script>

</body>

</html>

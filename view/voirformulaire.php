<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <title>La Liste de tous les étudiants</title>
    <style>
     body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    padding: 20px;
}

.container {
    max-width: 1400px; /* Augmenter la valeur de la largeur maximale */
    margin: 0 auto; /* Ajouter une marge automatique à gauche et à droite */
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.form-control {
    flex: 1;
    padding: 8px;
    margin-right: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.btn {
    background-color: #3498db;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn:hover {
    background-color: #2980b9;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th, .table td {
    padding: 4px; /* Réduire la taille du padding */
    border: 1px solid #ddd;
    max-width: 100px; /* Largeur maximale des cellules */
    white-space: nowrap; /* Empêcher le texte de se retourner à la ligne */
    overflow: hidden; /* Cacher le contenu qui dépasse */
    text-overflow: ellipsis; /* Afficher des points de suspension (...) pour indiquer un contenu coupé */
}

.table th {
    background-color: #f5f5f5;
}

.close-icon {
    float: right;
    cursor: pointer;
    color: #888;
}

.close-icon:hover {
    color: #555;
}

#refusForm {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    z-index: 999;
}

#refusForm h2 {
    margin-bottom: 10px;
}

#refusForm textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    height: 300px;
    width: 400px;
}
    </style>
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
                        <th>Décision</th>
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
                    echo "<td>" . (isset($par['fiche']) ? $par['fiche'] : '') . "</td>";
                    echo "<td><button type='button' class='btn' onclick='validerProjet(this)'>Valider</button></td>";
                    echo "<td><button type='button' class='btn' onclick='showRefusForm(this)'>Refuser</button></td>";
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
                       
                    </tr>
                </thead>
                <tbody>";
                foreach ($l as $par) {
                    echo "<tr class='table-data'>";
                    echo "<td>" . (isset($par[8]) ? $par[8] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td>" . (isset($par[12]) ? $par[12] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td>" . (isset($par[7]) ? $par[7] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td>" . (isset($par[11]) ? $par[11] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td>" . (isset($par[9]) ? $par[9] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td>" . (isset($par[13]) ? $par[13] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td>" . (isset($par[0]) ? $par[0] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td>" . (isset($par[3]) ? $par[3] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td>" . (isset($par[2]) ? $par[2] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td>" . (isset($par[1]) ? $par[1] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td>" . (isset($par[4]) ? $par[4] : '') . "</td>"; // Vérifie si la clé existe
                    echo "<td><button type='button' class='btn' onclick='validerProjet(this)' >Valider</button></td>";
                    echo "<td><button type='button' class='btn' onclick='showRefusForm(this)'>Refuser</button></td>";
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
            <form action="" method="post">
                <input type="hidden" id="idProjetRefus" name="id_projet">
                <input type="hidden" id="emailEtud1" name="email_etud1">
                <input type="hidden" id="emailEtud2" name="email_etud2">
                <textarea name="raison_refus" id="raisonRefus" cols="30" rows="5"></textarea><br>
                <button type="submit" name="avis" value="refus" class="btn">Envoyer</button>
            </form>
        </div>
        <button id="exportExcelBtn" class="btn btn-primary" onclick="extraireExcel()">Extraire Excel</button>

        
    </div>

    <script>
        function showRefusForm(button) {
            var idProjet = button.parentNode.parentNode.querySelector('td:first-child').innerText;
            var emailEtud1 = button.parentNode.parentNode.querySelector('td:nth-child(5)').innerText;
            var emailEtud2 = button.parentNode.parentNode.querySelector('td:nth-child(6)').innerText;

            document.getElementById("idProjetRefus").value = idProjet;
            document.getElementById("emailEtud1").value = emailEtud1;
            document.getElementById("emailEtud2").value = emailEtud2;

            document.getElementById("refusForm").style.display = "block";
        }

        function closeRefusForm() {
            document.getElementById("refusForm").style.display = "none";
        }
       
     function afficherMessageValidation() {
            alert("Étudiants validés avec succès !");
        }
    function validerProjet(button) {
    var emailEtud1 = button.parentElement.parentElement.cells[4].innerText;
    var emailEtud2 = button.parentElement.parentElement.cells[5].innerText;

    // Envoyer un e-mail de validation aux adresses e-mail des deux étudiants
    var formData = new FormData();
    formData.append('email_etud1', emailEtud1);
    formData.append('email_etud2', emailEtud2);
    formData.append('avis', 'valider');

    fetch('../controller/voirformulaire.php', {
        method: 'POST',
        body: formData
    })
    
    .then(response => {
        if (!response.ok) {
            throw new Error('Erreur lors de la requête');
        }
        return response.json();
    })  
    .then(data => {
        if (data.success) {
             afficherMessageValidation();
        }
    })
    .then(data => {
    if (data.success) {
        // Afficher le message de validation
        var validationMessage = document.getElementById('validationMessage');
        validationMessage.style.display = 'block';
        afficherMessageValidation();
        // Rediriger après 5 secondes
        setTimeout(function() {
            window.location.href = '../view/loginEtudiant.php';
        }, 5000);
    } else {
        throw new Error('Erreur lors de la validation');
    }
})

   
    .catch(error => {
        console.error('Erreur:', error);
    });
}
function extraireExcel() {
    var data = [
        ["Titre du Projet", "Nom Binôme 1",  "Nom Binôme 2",     "État"]
        // Ajoutez ici les données de votre tableau
    ];

    var tableRows = document.querySelectorAll('.table-data');

    tableRows.forEach(function(row) {
        var rowData = [
            row.cells[6].innerText, // Titre du Projet
            row.cells[0].innerText, // Nom Binôme 1
            
            row.cells[1].innerText, // Nom Binôme 2
            
            "" // État
        ];
        data.push(rowData);
    });

    var today = new Date();
    var dateStr = today.getFullYear() + "-" + (today.getMonth() + 1) + "-" + today.getDate() +
        " (" + today.getHours() + ":" + today.getMinutes() + ")";

    var wb = XLSX.utils.book_new();
    var ws = XLSX.utils.aoa_to_sheet(data);

    XLSX.utils.book_append_sheet(wb, ws, "Liste PFE (" + dateStr + ")");
    XLSX.writeFile(wb, "Liste PFE (" + dateStr + ").xlsx");
}


        <?php if(isset($emailEnvoye) && $emailEnvoye): ?>
        alert("E-mail de refus envoyé avec succès");
        <?php endif; ?>
        
        
    </script>
</body>

</html>
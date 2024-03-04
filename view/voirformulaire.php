<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>La Liste de tous les étudiants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
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
            padding: 10px 20px;
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

        .table-header {
            background-color: #f5f5f5;
        }

        .table-data td {
            padding: 8px;
            border: 1px solid #ddd;
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
                <input type="text" name="nom_entreprise" class="form-control" placeholder="nom de l'etudiant" style="width: 200px;">
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
                    echo "<td><button type='button' class='btn'>Valider</button></td>";
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
                        <th colspan='2'>Decision</th>
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
                    echo "<td><button type='button' class='btn'>Valider</button></td>";
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
                <textarea name="raison_refus" id="raisonRefus" cols="30" rows="5"></textarea><br>
                <button type="submit" name="avis" value="refus" class="btn">Envoyer</button>
            </form>
        </div>
    </div>

    <script>
        function showRefusForm(button) {
            var idProjet = button.parentNode.parentNode.querySelector('td:first-child').innerText;
            document.getElementById("idProjetRefus").value = idProjet;
            document.getElementById("refusForm").style.display = "block";
        }
        function closeRefusForm() {
            document.getElementById("refusForm").style.display = "none";
        }
    </script>
</body>

</html>

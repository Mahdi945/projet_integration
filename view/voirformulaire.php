<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
    <title>Page d'accueil</title>
    <style>
        /* Ajoutez votre CSS personnalisé ici */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .table-header {
            font-weight: bold;
            color: #333;
        }

        .table-data:nth-child(even) {
            background-color: #f9f9f9;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
        }

        .btn-group button {
            padding: 8px 16px;
            border-radius: 4px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-group button:hover {
            background-color: #0056b3;
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
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 80%; /* Largeur de la zone de texte */
    max-width: 600px; /* Largeur maximale de la zone de texte */
    max-height: 80%; /* Hauteur maximale de la zone de texte */
    overflow-y: auto; /* Activation du défilement vertical si nécessaire */
}

#refusForm h2 {
    margin-bottom: 10px; /* Marge inférieure du titre */
}

#refusForm textarea {
    width: 100%;
    height: 100%;
    resize: vertical; /* Redimensionnement vertical uniquement */
    border: 1px solid #ddd; /* Bordure de la zone de texte */
    border-radius: 4px; /* Bord arrondi */
    padding: 8px; /* Espacement intérieur de la zone de texte */
    margin-bottom: 10px; /* Marge inférieure de la zone de texte */
}

#refusForm button {
    padding: 8px 16px;
    border-radius: 4px;
    border: none;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
}

#refusForm button:hover {
    background-color: #0056b3;
}
.close-icon {
            position: absolute;
            top: 5px;
            left: 5px;
            cursor: pointer;
            color: #999;
        }

        .close-icon:hover {
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>La Liste de tous les étudiants</h1>
        <form class="navbar-form navbar-left" role="search" method="post" action="">
            <div class="form-group">
                <input type="text" name="nom_entreprise" class="form-control" placeholder="Nom de l'étudiant">
                <button type="submit" class="btn btn-default">Rechercher</button>
                <?php 
                if (isset($n)) {
                    echo "<h1>il y a $n binômes </h1>";
                }
                ?>
            </div>
        </form>
        <?php 
        if (isset($l) && !empty($l)) {
            echo "<table class='table' id='example'>
                <thead>
                    <tr class='table-header'>
                        <th>Nom Binôme 1</th>
                        <th>Nom Binôme 2</th>
                        <th>CIN Binôme 1</th>
                        <th>CIN Binôme 2</th>
                        <th>Email Binôme 1</th>
                        <th>Email Binôme 2</th>
                        <th>Fiche</th>
                        <th>Decision Enseignant</th>
                    </tr>
                </thead>
                <tbody>";
            foreach ($l as $par) {
                echo "<tr class='table-data'>
                        <td>" . ($par[6] ?? '') . "</td>
                        <td>" . ($par[7] ?? '') . "</td>
                        <td>" . ($par[9] ?? '') . "</td>
                        <td>" . ($par[13] ?? '') . "</td>
                        <td>" . ($par[16] ?? '') . "</td>
                        <td>" . ($par[17] ?? '') . "</td>
                        <td>" . ($par[18] ?? '') . "</td>
                        <td class='btn-group'>
                        <form action='' method='post'>
                        <input type='hidden' name='id_projet' value='" . ($par[0] ?? '') . "'>
                        <button type='submit' name='avis' value='validation'>Validation</button>
                        </form>
                        <span style='margin-right: 10px;'></span> <!-- Espace entre les boutons -->
                        <form action='' method='post'>
                        <input type='hidden' name='id_projet' value='" . ($par[0] ?? '') . "'>
                        <button type='button' onclick='showRefusForm(this)' data-id='" . ($par[0] ?? '') . "'>Refus</button>
                        </form>
                        </td>
                    </tr>";
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
                <button type="submit" name="avis" value="refus">Envoyer</button>
            </form>
        </div>
    </div>

    <script>
        function showRefusForm(button) {
            var idProjet = button.getAttribute("data-id");
            document.getElementById("idProjetRefus").value = idProjet;
            document.getElementById("refusForm").style.display = "block";
        }
        function closeRefusForm() {
            document.getElementById("refusForm").style.display = "none";
        }
    </script>
</body>

</html>

<?php

require_once '../controller/listeEnseignant.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 1400px;
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

        .table th,
        .table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .table th {
            background-color: #f5f5f5;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table th:nth-child(5),
        .table td:nth-child(5),
        .table th:nth-child(6),
        .table td:nth-child(6) {
            display: none;
        }

        .etat-column {
            text-align: center;
        }

        .etat-column i {
            cursor: pointer;
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

        .fa-times-circle {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">


    <form class="navbar-form navbar-left" role="search" method="post" action="">
                    <div class="form-group">
                        <input type="text"name="enseignant"  class="form-control" placeholder="nom de l'enseignant">
                    </div>
                    <button type="submit" class="btn btn-default">Rechercher</button>
                </form>
                <?php

if (isset($_POST['enseignant'])) {
    $ens = $_POST['enseignant'];
    $t = $crud->find_enseignant($ens);
?>
     <br> <br><br> <br>
     <h1>La liste des enseignants ayant le nom <span style="color: blue; font-weight: bold;"><?php echo $ens ?></span></h1>

     <br>
     <?php
    if (count($t) > 0) { // Vérifie s'il y a des résultats
?>
    <table class="table" id="example">
        <thead>
            <tr class="table-header">
                <th>cin</th>
            <th>nom et prenom </th>
           
            <th>mail</th>
            <th></th>
         </tr>
        </thead>
        <tbody>
            <?php
            foreach ($t as $par) {
                echo "<tr class='table-data'>
               <td>$par[0]</td>
                <td>$par[2]</td>
                <td>$par[3]</td>
                
                <td><a href='../controller/modifierens.php?id=$par[0]'>modifier enseignant</a></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
<?php
    } else {
        echo "<p>Aucun enseignant trouvé .</p>";
    }
}
?>




<h1>La Liste de toutes les formations</h1>
<table class="table" id="example">
    <thead>
        <tr class="table-header">
      
            <th>cin</th>
             <th>nom et prénom</th>
            <th>mail</th>
            <th>modifier</th>
            
         </tr>
    </thead>
    <tbody>
        
        <?php
       /*foreach ($lesenseignants as $key => $value) {
        echo "Numéro de colonne : $key <br>";
        foreach ($value as $subKey => $subValue) {
            echo "   Sous-colonne : $subKey, Contenu : $subValue <br>";
        }
    }
    */
        
        foreach ($lesenseignants as $forma) {
            echo "<tr class='table-data'>
                <td>$forma[0]</td>
                <td>$forma[2]</td>
                <td>$forma[3]</td>
                <td><a href='../controller/modifierens.php?id=$forma[0]'>modifier enseignant</a></td>
                
            </tr>";
        }

        echo "</tbody></table>";
       
?>


</div>
</body>

</html>
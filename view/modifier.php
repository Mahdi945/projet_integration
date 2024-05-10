<?php
ob_start();
echo "<h1>Mettre à jour un enseignant</h1>";
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
    </style>
</head>

<body>
    <div class="container">
        <form action="../controller/modifierens.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Identifiant formateur">cin enseignant</label>
                    <input type="text" name="id" id="Identifiant formateur" value="<?= $ens[0] ?>"  ></br>
                </div>
                <div class="form-group col-md-6">
                    <label for="nom">nom et prenom:</label>
                    <input type="text" name="nom" id="nom" value="<?= $ens[2] ?>"></br>
                </div> 
                <div class="form-group col-md-6">
                    <label for="prenom">password</label>
                    <input type="text" name="prenom" id="prenom" value="<?= $ens[1] ?>"></br>
                </div>    
                <div class="form-group col-md-6">
                    <label for="image">mail</label>
                    <input type="text" name="image" id="image" value="<?= $ens[3] ?>"></br>
                </div>    
            </div> 
            <input type="submit" value="Edit" name="ok" class="btn btn-default">

        </form>
    </div>
</body>

</html>

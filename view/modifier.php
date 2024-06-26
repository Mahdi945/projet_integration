<?php
ob_start();
echo "<h1>Mettre à jour un enseignant</h1>";
require_once "../model/enseignant.php";
$crud = new enseignant();
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
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #3498db;
        }

        .btn {
            display: block;
            width: 100%;
            background-color: #3498db;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<?php
$id = $_GET['id'];
$a = $crud->find($id);
$nom = $a['nom_prenom'];
$mail = $a['mail'];
?>
<body>
    <div class="container">
        <form action="../controller/modifierens.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="cin">CIN :</label>
                <input type="text" id="cin" name="cin" class="form-control" value="<?php echo $id; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nom_prenom">Nom et Prénom :</label>
                <input type="text" id="nom_prenom" name="nom_prenom" class="form-control" value="<?php echo $nom; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="email">Nouvel Email :</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo $mail; ?>">
            </div>
            <button type="submit" class="btn">Modifier Email</button>
        </form>
    </div>
</body>

</html>


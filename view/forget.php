<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mot de passe oublié</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="email"],
        button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1>Mot de passe oublié</h1>
        <form action="../model/forget.php" method="POST">
            <label for="email">Entrez votre adresse e-mail :</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <button type="submit">Réinitialiser le mot de passe</button>
        </form>
    </div>
</body>

</html>
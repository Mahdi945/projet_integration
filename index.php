<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Page d'accueil</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-image: url('assets/images/photo_iset.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background-color: rgba(0, 123, 255, 0.9);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
            transition: color 0.3s;
        }

        .navbar a:hover {
            color: #ffdd57;
        }

        .navbar img {
            height: 50px;
            margin-right: 20px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 700px;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .welcome {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #007bff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
            <img src="assets/images/logo_isetrades_0.jpg" alt="Logo">
        </a>
        <div class="navbar-nav">
            <a class="nav-link" href="view/loginEtudiant.php">Espace étudiant</a>
            <a class="nav-link" href="view/loginProfesseur.php">Espace enseignant</a>
        </div>
    </nav>
    <div class="container">
        <div class="welcome">Bienvenue au site de gestion de PFE pour ISET Rades</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

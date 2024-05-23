<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css" />
    <title>Inscription</title>
    <style>
        .alert {
            padding: 1rem;
            border-radius: 5px;
            color: white;
            margin: 1rem 0;
            font-weight: 500;
            width: 65%;
        }

        .alert-danger {
            background-color: #fc5555;
        }
    </style>
</head>

<body>
    <div class="container sign-up-mode">
        <div class="forms-container">
            <div class="signin-signup">
                <form id="signUpForm" action="../controller/signup.php" method="POST" class="sign-up-form">
                    <h2 class="title">Inscription</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="cin" placeholder="CIN" />
                    </div>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" />
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="Password" placeholder="Mot De Passe" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="Conf-Password" placeholder="Confirmer Mot De Passe" />
                    </div>
                    <?php
                    $errorMessages = [
                        'CIN is required' => 'Le CIN est requis',
                        'Email is required' => 'L\'email est requis',
                        'Password is required' => 'Le mot de passe est requis',
                        'Confirmation Password is required' => 'La confirmation du mot de passe est requise',
                        'Passwords do not match' => 'Les mots de passe ne correspondent pas',
                        'Email déja utilisé' => 'L\'email est déjà utilisé',
                        'Vous ne faites pas partie des étudiants de L3' => 'Vous ne faites pas partie des étudiants de L3'
                    ];

                    $error = isset($_GET['error']) ? $_GET['error'] : '';
                    ?>
                    <div id="error-message" class="alert alert-danger" style="display:<?php echo $error ? 'block' : 'none'; ?>;">
                        <?php echo isset($errorMessages[$error]) ? $errorMessages[$error] : 'Une erreur inconnue s\'est produite'; ?>
                    </div>
                    <input type="submit" class="btn" value="s'inscrire" />

                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>etudiant de l'iset ?</h3>
                    <p>
                        Si vous êtes un étudiant de l'iset, veuillez vous connecter pour accéder à votre espace.
                    </p>
                    <a href="../view/loginEtudiant.php" class="btn transparent" id="sign-in-btn" style="padding:10px 20px;text-decoration:none">
                        Se Connecter
                    </a>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('signUpForm').addEventListener('submit', function(event) {
    const password = document.getElementById('password').value;
    const cin = document.querySelector('input[name="cin"]').value;
    const email = document.querySelector('input[name="email"]').value;
    const alert = document.getElementById('error-message');
    const passwordPattern = /^(?=.*\d).{8,}$/;
    const cinPattern = /^\d{8}$/;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let errorMessage = '';

    if (!passwordPattern.test(password)) {
        errorMessage += 'Votre mot de passe doit comporter au moins 8 caractères et contenir au moins un chiffre.\n';
    }

    if (!cinPattern.test(cin)) {
        errorMessage += 'Le CIN doit comporter exactement 8 chiffres.\n';
    }

    if (!emailPattern.test(email)) {
        errorMessage += 'Veuillez entrer une adresse email valide.\n';
    }

    if (errorMessage !== '') {
        event.preventDefault();
        alert.style.display = 'block';
        alert.textContent = errorMessage;
    } else {
        alert.style.display = 'none';
    }
});

    </script>
</body>

</html>

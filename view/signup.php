<!DOCTYPE html>
<html lang="en">

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

        .alert-success {
            background-color: #42ba96;
        }

        .alert-danger {
            background-color: #fc5555;
        }

        .alert-info {
            background-color: #2E9AFE;
        }

        .alert-warning {
            background-color: #ff9966;
        }
    </style>
</head>

<body>
    <div class="container sign-up-mode">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="../controller/signup.php" method="POST" class="sign-up-form">
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
                        <input type="password" name="Password" placeholder="Mot De Passe" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="Conf-Password" placeholder="Confirmer Mot De Passe" />
                    </div>
                    <input type="submit" name="submit" class="btn" value="s'inscrire" />
                    
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                        laboriosam ad deleniti.
                    </p>
                    <a href="../view/loginEtudiant.php" class="btn transparent" id="sign-in-btn" style="padding:10px 20px;text-decoration:none">
                        Se Connecter
                    </a>
                </div>
                
            </div>
        </div>
    </div>
    </div>
</body>

</html>

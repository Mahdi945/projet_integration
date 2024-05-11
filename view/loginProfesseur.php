<?php



include('../config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../style.css" />
  <title>Connexion Professeur</title>
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
    .Forget-Pass{
      display: flex;
      width: 65%;
    }
    .Forget{
      color: #2E9AFE;
      font-weight: 500;
      text-decoration: none;
      margin-left: auto;
      
    }
  </style>
</head>



<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="../model/login.php" method="POST" class="sign-in-form">
          <h2 class="title">Se connecter</h2>
          <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
            </div>
          <?php } ?>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="uname" placeholder="ID" value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>"/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" class="form-control"name="pass" placeholder="Mot de passe">
          </div>
          <div class="Forget-Pass">
            <a href="Forget.php" class="Forget">Mot de passe oublié ?</a>
          </div>
          <button type="submit" class="btn solid">Se connecter</button>
          <p class="social-text">Ou se connecter avec des plateformes sociales</p>
          <div class="social-media">
            <a href="https://www.facebook.com/isetrades2018/?locale=ar_AR" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="http://www.isetr.rnu.tn/" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="https://www.linkedin.com/company/institut-sup%C3%A9rieur-des-etudes-technologiques-de-rades-iset-rades?trk=ppro_cprof&originalSubdomain=fr" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
         
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Nouveau ici ?</h3>
          <p>
            Bonjour, bienvenue sur le site de consultation des sujets PFE à l'ISET Rades
          </p>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
    </div>
  </div>
  <script src="app.js"></script>
</body>

</html>
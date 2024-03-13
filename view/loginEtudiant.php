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
  <title>Sign in & Sign up Etudiant</title>
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
    .validation-message {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #42ba96;
    color: white;
    padding: 20px;
    border-radius: 8px;
    z-index: 999;
}

  </style>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      
      <div class="signin-signup">
        <form action="../model/login.php" method="POST" class="sign-in-form">
            
          <h2 class="title">Sign in</h2>
          <?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="uname" placeholder="CIN" value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>"/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" class="form-control"name="pass" placeholder="Password">
          </div>
          <div class="Forget-Pass">
          <a href="../view/forget.php" class="Forget">Forget Password ?</a></div>
          
          <button type="submit" class="btn solid">  Login  </button>
          <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>
          <a href="../view/signup.php" class="btn transparent" id="sign-in-btn" style="padding:10px 20px;text-decoration:none">
          SignUp
          </a>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="app.js"></script>
</body>

</html>
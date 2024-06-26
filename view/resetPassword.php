<?php include('../config.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <title>Réinitialiser le mot de passe</title>
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
      width: 400px;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    input[type="text"],
    input[type="password"],
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

    .input-field {
      position: relative;
    }

    .input-field i {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      left: 10px;
      color: #777;
    }

    .input-field input {
      padding-left: 30px;
    }
  </style>
</head>

<body>
  <div class="container">
    <form action="../controller/resetPassword.php" method="POST">
      <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" name="newPassword" id="newPassword" placeholder="Entrez le nouveau mot de passe" />
      </div>
      <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirmez le nouveau mot de passe" />
      </div>
      <button type="submit" class="btn solid" onclick="return validatePassword()">Réinitialiser le mot de passe</button>
    </form>
  </div>

  <script>
    function validatePassword() {
      var newPassword = document.getElementById('newPassword').value;
      var confirmPassword = document.getElementById('confirmPassword').value;

      if (newPassword !== confirmPassword) {
        alert('Les mots de passe ne correspondent pas.');
        return false;
      }

      return true;
    }
  </script>
</body>
</html>


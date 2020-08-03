<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: ./../php/user.php');
  }
  require './../php/database.php';

  if (!empty($_POST['correo']) && !empty($_POST['psw'])) {
    $valor=$_POST['correo'];
    $records = $conn->prepare("SELECT * FROM Usuario where correo_cliente='$valor'");
    $records->bindParam(':correo', $_POST['correo']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['psw'], $results['clave_cliente'])) {
      $_SESSION['user_id'] = $results['correo_cliente'];
      header("Location: ./../../CodigoGaleria/php/user.php");
    } else {
      $message = 'disculpe ese usuario no existe';
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LegalID</title>
    <link type="text/css" rel="stylesheet" href="../CSS/CSS.css">
</head>
<body>


    <div id="id01" class="modal">




        <form class="modal-content animate" action="login.php" method="post">
          <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal"></span>
            <img src="https://drive.google.com/uc?export=view&id=1sA8vUUymt6J57txIMfG0oUOikQexMqp4" alt="Avatar" class="avatar">
          </div>

          <div class="container">
            <label for="uname"><b>Correo</b></label>
            <input type="text" placeholder="Correo" name="correo" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
            <label>
              <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
            <?php if(!empty($message)): ?>
            <p> <?= $message ?></p>
            <?php endif; ?>
          </div>

          <div class="container" style="background-color:#f1f1f1">
            <button type="button"  onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button></a>
            <span class="psw">Forgot <a href="#">password?</a></span>
            <span class="psw">sign <a href="./../php/signup.php">UP </a></span>
          </div>
        </form>
      </div>

</body>
</html>
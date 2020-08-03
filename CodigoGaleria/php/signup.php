<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['correo']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO Usuario (nombre_cliente, telefono_cliente,direccion_cliente,ciudad_cliente,correo_cliente,clave_cliente ) VALUES (:nombre,:telefono,:direccion,:ciudad,:correo,:password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':telefono', $_POST['telefono']);
    $stmt->bindParam(':direccion', $_POST['direccion']);
    $stmt->bindParam(':ciudad', $_POST['ciudad']);
    $stmt->bindParam(':correo', $_POST['correo']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
  
    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
        $message = 'no se hizo';
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./../CSS/CSS.css">
  </head>
  <body>


    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>or <a href="./../html/login.php">Login</a></span>
    <form action="signup.php" method="POST">
        <input name="nombre" type="text" placeholder="Enter your name">
        <input name="telefono" type="text" placeholder="Enter your phone">
        <input name="direccion" type="text" placeholder="Enter your dir">
        <input name="ciudad" type="text" placeholder="Enter your city">
        <input name="correo" type="text" placeholder="Enter your email">
        <input name="password" type="password" placeholder="Enter your Password">
        <input name="confirm_password" type="password" placeholder="Confirm Password">
        <input type="submit" value="Submit">
    </form>

  </body>
</html>
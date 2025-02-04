<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Se creo el nuevo usuario con exito';
    } else {
      $message = 'Existe un problema con la cuenta creada, verifica datos o contacta al jefe del departamento';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Crear cuenta</h1>
    <span>o <a href="login.php">Iniciar sesion</a></span>

    <form action="signup.php" method="POST">
      <input name="email" type="text" placeholder="Escribe tu cuenta">
      <input name="password" type="password" placeholder="Escribe tu matricula">
      <input name="confirm_password" type="password" placeholder="Confirma tu matricula">
      <input type="submit" value="Enviar">
    </form>

  </body>
</html>

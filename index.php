<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido a la pagina de inicio de SESSEyE</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> ¡Bienvenido! <?= $user['email']; ?>
      <br> Lograste conectarte
      <a href="logout.php">
        Salir
      </a>
    <?php else: ?>
      <h1>Por favor, inicia secion o inicia cuenta</h1>

      <a href="login.php">Iniciar sesion</a> or
      <a href="signup.php">Crear cuenta</a>
    <?php endif; ?>
  </body>
</html>

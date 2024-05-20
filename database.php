<?php

$server = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'login';

try {
  $conn = new PDO("heidisql:host=$server;dbname=$login;", $nombre, $contraseña);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>

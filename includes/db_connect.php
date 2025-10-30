<?php
$host = 'localhost';
$user = 'root';      // pas dit aan als nodig
$pass = '';          // je wachtwoord
$db   = 'motoren_catalogus';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die('Databaseverbinding mislukt: ' . $conn->connect_error);
}
?>

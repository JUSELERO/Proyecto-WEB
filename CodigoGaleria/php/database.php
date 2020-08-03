<?php

$server = 'localhost';
$username = 'root';
$password = 'xcocuy32@';
$database = 'LegalID';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  
}

?>
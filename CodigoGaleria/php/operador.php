<?php
session_start(); 
$clavemyadmi="xcocuy32@";
$servername = "localhost";
$username = "root";
$password = "xcocuy32@";
$dbname = "LegalID";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$correo=$_POST['correo'];
$clave=$_POST['psw'];

$UserSQL="SELECT * FROM Usuario where correo_cliente='$correo'";
$result = $conn->query($UserSQL);

if ($result->num_rows>0){
  $lola=$result->fetch_assoc();
 if (($correo==$lola['correo_cliente'])&&($clave==$lola['id_cliente'])){
  session_start();
  $_SESSION['regName'] =$lola['correo_cliente'];
  $_SESSION['regName1'] =$lola['nombre_cliente'];
  include("./../../user.php");
  header("Location: ./../../CodigoGaleria/html/user.php");
  }
} else{
  echo "0 results";
}

?>

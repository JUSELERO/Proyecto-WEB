<?php

$server = 'localhost';
$username = '20201B106';
$password = 'Eu-6dFvoEk';
$database = 'LegalID';


$conn = new mysqli($server,$username,$password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
// Create database
$sql = "CREATE database  LegalID;
";

if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$sqla="use LegalID;
create table Usuario
(id_cliente int,
nombre_cliente varchar(45),
telefono_cliente varchar(45),
direccion_cliente varchar(45),
ciudad_cliente varchar(45),
correo_cliente varchar(45) primary key not null,
clave_cliente varchar(60)
);";

if ($conn->query($sqla) === TRUE) {
    echo "Database created successfully";
  } else {
    echo "Error creating la tablaaaaaa: " . $conn->error;
  }



$conn->close();



?>
<?php
$host = "localhost";  
$usuario = "root";   
$password = "";      
$base_datos = "pokedex";  

// Crea la conexión
$conn = new mysqli($host, $usuario, $password, $base_datos);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

<?php
$host = "localhost";  // El host donde está tu base de datos (normalmente localhost)
$usuario = "root";    // El usuario de MySQL (normalmente root)
$password = "";       // La contraseña de MySQL (si no tiene, deja en blanco)
$base_datos = "pokedex";  // El nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($host, $usuario, $password, $base_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

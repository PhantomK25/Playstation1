<?php
$servername = "localhost"; // Servidor
$username = "root";        // Usuario de XAMPP
$password = "";            // Contraseña (vacía por defecto en XAMPP)
$dbname = "playstation_users"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

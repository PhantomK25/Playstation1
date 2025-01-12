<?php
include('db_connect.php'); // Incluye la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario de registro
    $emailCreate = $_POST['emailCreate'];
    $passwordCreate = $_POST['passwordCreate'];
    $dob = $_POST['dob'];
    $region = $_POST['region'];

    // Consulta para insertar el nuevo usuario en la base de datos
    $sql = "INSERT INTO usuarios (email, password, fecha_nacimiento, region) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $emailCreate, $passwordCreate, $dob, $region);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Registro exitoso";
        // Aquí podrías redirigir al usuario a la página de login
    } else {
        echo "Error al registrar la cuenta";
    }
}
?>

<?php
include('db_connect.php'); // Incluye la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta para obtener el usuario con el email ingresado
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si el usuario existe
    if ($result->num_rows > 0) {
        // Obtener los datos del usuario
        $user = $result->fetch_assoc();

        // Verificar si la contraseña coincide con la almacenada
        if ($password == $user['password']) {
            echo "Inicio de sesión exitoso";
            // Aquí puedes redirigir al usuario a otra página, por ejemplo, al panel de usuario
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "No se encontró un usuario con ese correo";
    }
}
?>

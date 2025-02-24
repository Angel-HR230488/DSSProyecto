<?php
include 'config/database.php';
include 'modules/auth.php';

session_start(); // Iniciar sesión si aún no está iniciada

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['reg_username'];
    $password = $_POST['reg_password'];
    $email = $_POST['reg_email'];

    if (register($username, $password, $email, $conn)) {
        echo "¡Registro exitoso!";
    } else {
        echo "Error al registrar el usuario.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Registrar Nuevo Usuario</h2>
        <form method="post" action="">
            <label for="reg_username">Nombre de Usuario:</label>
            <input type="text" id="reg_username" name="reg_username" required>
            <br>
            <label for="reg_password">Contraseña:</label>
            <input type="password" id="reg_password" name="reg_password" required>
            <br>
            <label for="reg_email">Correo Electrónico:</label>
            <input type="email" id="reg_email" name="reg_email" required>
            <br>
            <input type="submit" value="Registrar">
        </form>
        <p><a href="index.php">Volver</a></p>
    </div>
</body>
</html>

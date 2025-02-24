<?php
include 'config/database.php';
include 'modules/auth.php';

session_start(); // Iniciar sesión si aún no está iniciada

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (login($username, $password, $conn)) {
            echo "¡Inicio de sesión exitoso!";
        } else {
            echo "Nombre de usuario o contraseña incorrectos.";
        }
    } elseif (isset($_POST['register'])) {
        $username = $_POST['reg_username'];
        $password = $_POST['reg_password'];
        $email = $_POST['reg_email'];

        if (register($username, $password, $email, $conn)) {
            echo "¡Registro exitoso!";
        } else {
            echo "Error al registrar el usuario.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión y Registro</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <?php if (!isset($_SESSION['username'])): ?>
            <h2>Iniciar Sesión</h2>
            <form method="post" action="">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" required>
                <br>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <br>
                <input type="submit" name="login" value="Iniciar Sesión">
            </form>
        <?php else: ?>
            <h2>Bienvenido, <?php echo $_SESSION['username']; ?></h2>
            <p><a href="register.php">Registrar Nuevo Usuario</a></p>
            <p><a href="logout.php">Cerrar Sesión</a></p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
include '../config/database.php'; // Ruta correcta para incluir el archivo de configuración

// Función para iniciar sesión
function login($username, $password, $conn) {
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuario autenticado
        session_start();
        $_SESSION['username'] = $username;
        return true;
    } else {
        // Fallo de autenticación
        return false;
    }
}

// Función para registrar un nuevo usuario
function register($username, $password, $email, $conn) {
    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $email);
    return $stmt->execute();
}

// Función para cerrar sesión
function logout() {
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<?php
// registrar.php

// Conexión a la base de datos
$servername = "localhost"; // Cambia esto si es necesario
$username = ""; // Cambia esto por tu usuario de MySQL
$password = ""; // Cambia esto por tu contraseña de MySQL
$dbname = "mi_red_social";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecha_nacimiento = $_POST['anio'] . '-' . $_POST['mes'] . '-' . $_POST['dia']; // Formato YYYY-MM-DD
$genero = $_POST['genero'];
$correo = $_POST['correo'];
$contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Encriptar la contraseña

// Preparar y ejecutar la inserción
$sql = "INSERT INTO usuarios (nombre, apellido, fecha_nacimiento, genero, correo, contraseña) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $nombre, $apellido, $fecha_nacimiento, $genero, $correo, $contraseña);

if ($stmt->execute()) {
    echo "Registro exitoso.";
    // Redirigir al usuario a la página de inicio o login
    header("Location: login.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>

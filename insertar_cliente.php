<?php
require_once 'conexion.php';

$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$direccion = isset($_POST['direccion']) ? trim($_POST['direccion']) : '';

if ($nombre === "" || $email === "" || !strpos($email, '@')) {
    die("Datos inválidos. Verifique e intente nuevamente.");
}

$stmt = $conexion->prepare("INSERT INTO CLIENTE (nombre, email, direccion) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $email, $direccion);

if ($stmt->execute()) {
    echo "Cliente registrado con éxito.<br>";
} else {
    echo "Error al registrar el cliente: " . $conexion->error;
}

echo "<a href='mostrar_clientes.php'>Ver Clientes</a>";

<?php
require_once 'conexion.php';

// Validación básica del lado del servidor
$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : '';
$precio = isset($_POST['precio']) ? trim($_POST['precio']) : '';
$stock = isset($_POST['stock']) ? trim($_POST['stock']) : '';

if ($nombre === "" || !is_numeric($precio) || floatval($precio) <= 0 || !is_numeric($stock) || intval($stock) < 0) {
    die("Datos inválidos. Verifique e intente nuevamente.");
}

// Insertar en la base de datos
$stmt = $conexion->prepare("INSERT INTO PRODUCTO (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssdi", $nombre, $descripcion, $precio, $stock);

if ($stmt->execute()) {
    echo "Producto registrado con éxito.<br>";
} else {
    echo "Error al registrar el producto: " . $conexion->error;
}

echo "<a href='mostrar_productos.php'>Ver Productos</a>";

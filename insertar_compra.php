<?php
require_once 'conexion.php';

$id_cliente = isset($_POST['id_cliente']) ? (int)$_POST['id_cliente'] : 0;
$id_producto = isset($_POST['id_producto']) ? (int)$_POST['id_producto'] : 0;
$cantidad = isset($_POST['cantidad']) ? (int)$_POST['cantidad'] : 0;

if ($id_cliente <= 0 || $id_producto <= 0 || $cantidad <= 0) {
    die("Datos inválidos.");
}

// Obtener información del producto
$stmt = $conexion->prepare("SELECT precio, stock FROM PRODUCTO WHERE id_producto=?");
$stmt->bind_param("i", $id_producto);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Producto no encontrado.");
}

$producto = $result->fetch_assoc();
$precio = $producto['precio'];
$stock_actual = $producto['stock'];

if ($cantidad > $stock_actual) {
    die("No hay suficiente stock para esta cantidad.");
}

// Calcular total
$total = $precio * $cantidad;
$fecha = date('Y-m-d');

// Insertar la compra
$stmt2 = $conexion->prepare("INSERT INTO COMPRA (cantidad, total, fecha, id_producto, id_cliente) VALUES (?, ?, ?, ?, ?)");
$stmt2->bind_param("idsii", $cantidad, $total, $fecha, $id_producto, $id_cliente);

if ($stmt2->execute()) {
    echo "Compra registrada con éxito.<br>";
    // Actualizar stock del producto
    $nuevo_stock = $stock_actual - $cantidad;
    $stmt3 = $conexion->prepare("UPDATE PRODUCTO SET stock=? WHERE id_producto=?");
    $stmt3->bind_param("ii", $nuevo_stock, $id_producto);
    $stmt3->execute();
} else {
    echo "Error al registrar la compra: " . $conexion->error;
}

echo "<a href='mostrar_compras.php'>Ver Compras</a>";

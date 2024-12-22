<?php
require_once 'conexion.php';
$result = $conexion->query("SELECT * FROM COMPRA");
echo "<h1>Compras Registradas</h1>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Cantidad</th><th>Total</th><th>Fecha</th><th>ID Producto</th><th>ID Cliente</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['id_compra']."</td>";
    echo "<td>".$row['cantidad']."</td>";
    echo "<td>".$row['total']."</td>";
    echo "<td>".$row['fecha']."</td>";
    echo "<td>".$row['id_producto']."</td>";
    echo "<td>".$row['id_cliente']."</td>";
    echo "</tr>";
}
echo "</table>";

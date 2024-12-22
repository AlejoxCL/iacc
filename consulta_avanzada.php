<?php
require_once 'conexion.php';

echo "<h1>Clientes con más de dos compras</h1>";
$sql = "SELECT c.id_cliente, c.nombre, COUNT(co.id_compra) AS total_compras
        FROM CLIENTE c
        JOIN COMPRA co ON c.id_cliente = co.id_cliente
        GROUP BY c.id_cliente, c.nombre
        HAVING COUNT(co.id_compra) > 2";

$result = $conexion->query($sql);

echo "<table border='1'>";
echo "<tr><th>ID Cliente</th><th>Nombre</th><th>Total Compras</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['id_cliente']."</td>";
    echo "<td>".$row['nombre']."</td>";
    echo "<td>".$row['total_compras']."</td>";
    echo "</tr>";
}
echo "</table>";

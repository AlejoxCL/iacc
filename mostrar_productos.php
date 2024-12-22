<?php
require_once 'conexion.php';

$result = $conexion->query("SELECT * FROM PRODUCTO");
echo "<h1>Productos Registrados</h1>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Stock</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['id_producto']."</td>";
    echo "<td>".$row['nombre']."</td>";
    echo "<td>".$row['descripcion']."</td>";
    echo "<td>".$row['precio']."</td>";
    echo "<td>".$row['stock']."</td>";
    echo "</tr>";
}
echo "</table>";

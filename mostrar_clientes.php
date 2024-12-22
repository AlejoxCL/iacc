<?php
require_once 'conexion.php';

$result = $conexion->query("SELECT * FROM CLIENTE");
echo "<h1>Clientes Registrados</h1>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Dirección</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['id_cliente']."</td>";
    echo "<td>".$row['nombre']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['direccion']."</td>";
    echo "</tr>";
}
echo "</table>";

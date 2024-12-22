<?php
$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "TIENDA";

// Se recomienda usar mysqli o PDO. Aquí un ejemplo con mysqli.
$conexion = new mysqli($host, $user, $pass, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Ajustar el charset
$conexion->set_charset("utf8");
?>

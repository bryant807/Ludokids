<?php
$host = "localhost";
$usuario = "root";
$contraseña = "";
$bd = "ludokids"; 

$conexion = new mysqli($host, $usuario, $contraseña, $bd);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$conexion->set_charset("utf8mb4");

// Permite conservar los materiales en el perfil del profesor cuando se retiran de la vista pública.
$columnaVisible = $conexion->query(
    "SELECT 1 FROM information_schema.COLUMNS
     WHERE TABLE_SCHEMA = DATABASE()
       AND TABLE_NAME = 'material'
       AND COLUMN_NAME = 'visible'
     LIMIT 1"
);

if ($columnaVisible && $columnaVisible->num_rows === 0) {
    $conexion->query("ALTER TABLE material ADD COLUMN visible TINYINT(1) NOT NULL DEFAULT 1");
}
?>
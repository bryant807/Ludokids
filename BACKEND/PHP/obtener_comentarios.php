<?php
include 'conexion.php';

header('Content-Type: application/json');

$sql = "SELECT nombre, calificacion, comentario, fecha FROM comentario ORDER BY id_comentario DESC";
$resultado = $conexion->query($sql);

$comentarios = [];

if ($resultado && $resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $comentarios[] = $row;
    }
}

echo json_encode($comentarios);
$conexion->close();
?>
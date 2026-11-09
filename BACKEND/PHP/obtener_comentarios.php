<?php
include('conexion.php');

$sql = "SELECT id_comentario, nombre, calificacion, comentario FROM comentario ORDER BY id_comentario DESC";
$resultado = $conexion->query($sql);

$comentarios = [];

if ($resultado && $resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $comentarios[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($comentarios);

$conexion->close();
?>
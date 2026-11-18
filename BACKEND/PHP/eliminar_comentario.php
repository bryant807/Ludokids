<?php
session_start();
include('conexion.php');

// Solo los profesores pueden eliminar comentarios.
$rol = $_SESSION['rol'] ?? '';
if (!isset($_SESSION['id_usuario']) || !is_string($rol) || strcasecmp($rol, 'profesor') !== 0) {
    http_response_code(403);
    echo "<script>alert('Acceso denegado. Solo los profesores pueden eliminar comentarios.'); window.location.href = '../../FRONTED/INDEX/PRINCIPALES/Inicio.html';</script>";
    exit();
}

if (isset($_GET['id'])) {
    $id_comentario = intval($_GET['id']);

    $sql = "DELETE FROM comentario WHERE id_comentario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_comentario);

    if ($stmt->execute()) {
        echo "<script>alert('Comentario eliminado con éxito.'); window.history.back();</script>";
    } else {
        echo "<script>alert('Error al eliminar el comentario.'); window.history.back();</script>";
    }

    $stmt->close();
} else {
    header("Location: ../../FRONTED/INDEX/PRINCIPALES/PROFESORES/comentarios.php");
    exit();
}
$conexion->close();
?>
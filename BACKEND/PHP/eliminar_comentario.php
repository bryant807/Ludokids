<?php
session_start();
include('conexion.php');

// Verificación estricta de seguridad
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'admin') {
    echo "<script>alert('Acceso denegado. No tienes permisos de administrador.'); window.location.href = '../../FRONTED/INDEX/PRINCIPALES/Inicio.html';</script>";
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
    window.history.back();
}
$conexion->close();
?>
<?php
session_start();
include('conexion.php');

// Solo los profesores pueden eliminar material.
$rol = $_SESSION['rol'] ?? '';
if (!isset($_SESSION['id_usuario']) || !is_string($rol) || strcasecmp($rol, 'profesor') !== 0) {
    http_response_code(403);
    echo "<script>alert('Acceso denegado. Solo los profesores pueden eliminar material.'); window.location.href = '/Ludokids 3 de noviembre/FRONTED/INDEX/PRINCIPALES/Inicio.html';</script>";
    exit();
}

if (isset($_GET['id'])) {
    $id_material = intval($_GET['id']);

    // Retirarlo de la vista pública sin borrar el registro ni el archivo del perfil del profesor.
    $sql = "UPDATE material SET visible = 0 WHERE id_material = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_material);

    if ($stmt->execute()) {
        // Redirección absoluta corregida hacia subir_material.php
        echo "<script>alert('Material eliminado correctamente.'); window.location.href = '/Ludokids 3 de noviembre/FRONTED/INDEX/PRINCIPALES/Profesores/subir_material.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el material.'); window.history.back();</script>";
    }

    $stmt->close();
} else {
    header("Location: /Ludokids 3 de noviembre/FRONTED/INDEX/PRINCIPALES/Profesores/subir_material.php");
}
$conexion->close();
?>
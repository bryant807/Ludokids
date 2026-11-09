<?php
session_start();
include('conexion.php');

// Verificación estricta: Solo el administrador puede pasar de aquí
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'admin') {
    echo "<script>alert('Acceso denegado. No tienes permisos de administrador.'); window.location.href = '/Ludokids 3 de noviembre/FRONTED/INDEX/PRINCIPALES/Inicio.html';</script>";
    exit();
}

if (isset($_GET['id'])) {
    $id_material = intval($_GET['id']);

    // Buscar el nombre del archivo en la BD para borrarlo de la carpeta 'uploads'
    $sql_archivo = "SELECT archivo FROM material WHERE id_material = ?";
    $stmt_arch = $conexion->prepare($sql_archivo);
    $stmt_arch->bind_param("i", $id_material);
    $stmt_arch->execute();
    $resultado = $stmt_arch->get_result();
    
    if ($row = $resultado->fetch_assoc()) {
        $rutaArchivo = "../uploads/" . $row['archivo'];
        if (file_exists($rutaArchivo)) {
            unlink($rutaArchivo); // Borra el archivo físico del servidor
        }
    }
    $stmt_arch->close();

    // Eliminar el registro de la base de datos
    $sql = "DELETE FROM material WHERE id_material = ?";
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
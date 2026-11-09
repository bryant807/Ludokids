<?php
session_start();
include 'conexion.php';

header('Content-Type: application/json');

// Depuración de errores en vivo
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verificamos si hay sesión activa
if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(["exito" => false, "mensaje" => "Error: No hay sesión activa. id_usuario no encontrado en la sesión."]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_SESSION['id_usuario'];
    $nombre = trim($_POST['nombre'] ?? '');
    $calificacion = intval($_POST['calificacion'] ?? 0);
    $comentario = trim($_POST['comentario'] ?? '');

    if (empty($nombre) || empty($comentario) || $calificacion < 1 || $calificacion > 5) {
        echo json_encode(["exito" => false, "mensaje" => "Datos incompletos o calificación inválida."]);
        exit();
    }

    // Consulta SQL exacta a tu tabla
    $sql = "INSERT INTO comentario (id_usuario, nombre, calificacion, comentario, fecha) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conexion->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("isis", $id_usuario, $nombre, $calificacion, $comentario);
        
        if ($stmt->execute()) {
            echo json_encode(["exito" => true, "mensaje" => "¡Comentario guardado con éxito!"]);
        } else {
            echo json_encode(["exito" => false, "mensaje" => "Error al ejecutar SQL: " . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(["exito" => false, "mensaje" => "Error en la preparación SQL: " . $conexion->error]);
    }
    
    $conexion->close();
} else {
    echo json_encode(["exito" => false, "mensaje" => "Método no permitido."]);
}
?>
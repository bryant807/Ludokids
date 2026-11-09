<?php
session_start();
include('conexion.php');

header('Content-Type: application/json');

// Verificar que el usuario haya iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(['exito' => false, 'mensaje' => 'No hay una sesión activa.']);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_SESSION['id_usuario'];
    $nombre = trim($_POST['nombre'] ?? $_SESSION['nombre']);
    $calificacion = intval($_POST['calificacion'] ?? 0);
    $comentario = trim($_POST['comentario'] ?? '');

    if (empty($comentario) || $calificacion < 1 || $calificacion > 5) {
        echo json_encode(['exito' => false, 'mensaje' => 'Datos incompletos o calificación inválida.']);
        exit();
    }

    // Consulta SQL adaptada (si tu tabla guarda el id_usuario o solo el nombre)
    // Asegúrate de que los nombres de columnas coincidan con tu base de datos
    $sql = "INSERT INTO comentario (id_usuario, nombre, calificacion, comentario) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("isis", $id_usuario, $nombre, $calificacion, $comentario);
        
        if ($stmt->execute()) {
            echo json_encode(['exito' => true, 'mensaje' => 'Comentario guardado con éxito.']);
        } else {
            echo json_encode(['exito' => false, 'mensaje' => 'Error al ejecutar la consulta: ' . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['exito' => false, 'mensaje' => 'Error en la preparación de la consulta: ' . $conexion->error]);
    }

    $conexion->close();
} else {
    echo json_encode(['exito' => false, 'mensaje' => 'Método no permitido.']);
}
?>
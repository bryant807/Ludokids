<?php
session_start();
include 'conexion.php';

header('Content-Type: application/json');

if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(["exito" => false, "mensaje" => "No hay una sesión activa."]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_SESSION['id_usuario'];
    $actual = $_POST['contrasenaActual'] ?? '';
    $nueva = $_POST['nuevaContrasena'] ?? '';
    $confirmar = $_POST['confirmarContrasena'] ?? '';

    if (empty($actual) || empty($nueva) || empty($confirmar)) {
        echo json_encode(["exito" => false, "mensaje" => "Por favor, completa todos los campos."]);
        exit();
    }

    if ($nueva !== $confirmar) {
        echo json_encode(["exito" => false, "mensaje" => "Las nuevas contraseñas no coinciden."]);
        exit();
    }

    if (strlen($nueva) < 6) {
        echo json_encode(["exito" => false, "mensaje" => "La nueva contraseña debe tener al menos 6 caracteres."]);
        exit();
    }

    // Consultamos la contraseña en la tabla usuario
    $sql = "SELECT contraseña FROM usuario WHERE id_usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $row = $resultado->fetch_assoc();
        $hashAlmacenado = $row['contraseña'];

        // Validar contraseña (soporta texto plano o encriptada)
        $contrasenaValida = false;
        if (password_verify($actual, $hashAlmacenado) || $actual === $hashAlmacenado) {
            $contrasenaValida = true;
        }

        if ($contrasenaValida) {
            $nuevoHash = password_hash($nueva, PASSWORD_DEFAULT);

            $updateSql = "UPDATE usuario SET contraseña = ? WHERE id_usuario = ?";
            $updateStmt = $conexion->prepare($updateSql);
            $updateStmt->bind_param("si", $nuevoHash, $id_usuario);

            if ($updateStmt->execute()) {
                echo json_encode(["exito" => true, "mensaje" => "¡Contraseña actualizada con éxito!"]);
            } else {
                echo json_encode(["exito" => false, "mensaje" => "Error al actualizar en la base de datos."]);
            }
            $updateStmt->close();
        } else {
            echo json_encode(["exito" => false, "mensaje" => "La contraseña actual es incorrecta."]);
        }
    } else {
        echo json_encode(["exito" => false, "mensaje" => "Usuario no encontrado."]);
    }

    $stmt->close();
    $conexion->close();
}
?>
<?php
include 'conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    
    // Si en tu formulario el input es <input name="contrasena">, cambia 'password' por 'contrasena'
    $password = $_POST['password'] ?? $_POST['contrasena'] ?? '';
    
    // Recogemos el rol de forma segura
    $rol = $_POST['rol'] ?? 'profesor';
    $rolesPermitidos = ['profesor', 'otro'];
    if (!in_array($rol, $rolesPermitidos)) {
        $rol = 'profesor';
    }

    if (!empty($nombre) && !empty($correo) && !empty($password)) {
        
        // 1. Verificar si el correo ya existe en la base de datos[cite: 3]
        $sql_verificar = "SELECT id_usuario FROM usuario WHERE correo = ?";
        $stmt_verificar = $conexion->prepare($sql_verificar);
        $stmt_verificar->bind_param("s", $correo);
        $stmt_verificar->execute();
        $stmt_verificar->store_result();

        if ($stmt_verificar->num_rows > 0) {
            echo "<script>
                alert('Este correo ya está registrado. Por favor, inicia sesión.');
                window.location.href = '../../FRONTED/INDEX/LOGIN/InicioDeSesion.php';
            </script>";
            $stmt_verificar->close();
            $conexion->close();
            exit();
        }
        $stmt_verificar->close();

        // 2. Cifrar la contraseña e insertar[cite: 3]
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuario (nombre, correo, `contraseña`, rol) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssss", $nombre, $correo, $password_hash, $rol);
            if ($stmt->execute()) {
                echo "<script>
                    alert('¡Cuenta creada con éxito! Ya puedes iniciar sesión.');
                    window.location.href = '../../FRONTED/INDEX/LOGIN/InicioDeSesion.php';
                </script>";
                exit();
            } else {
                echo "<script>alert('Error al registrar: " . $stmt->error . "'); window.history.back();</script>";
            }
            $stmt->close();
        }
    }
}
?>
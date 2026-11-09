<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST['correo']);
    $password = $_POST['password'];

    if (empty($correo) || empty($password)) {
        echo "<script>alert('Por favor, completa todos los campos.'); window.history.back();</script>";
        exit();
    }

    $sql = "SELECT id_usuario, nombre, correo, `contraseña` FROM usuario WHERE correo = ?";
    $stmt = $conexion->prepare($sql);
    
    if (!$stmt) {
        die("Error en la consulta: " . $conexion->error);
    }

    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        
        if (password_verify($password, $usuario['contraseña'])) {
            // Guardamos los datos del usuario en la sesión
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['correo'] = $usuario['correo'];

            echo "<script>
                alert('¡Bienvenido de nuevo, " . $usuario['nombre'] . "!');
                window.location.href = '/Ludokids 3 de noviembre/FRONTED/INDEX/LOGIN/Perfil.php';
            </script>";
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta. Inténtalo de nuevo.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('No existe una cuenta registrada con este correo.'); window.history.back();</script>";
    }

    $stmt->close();
    $conexion->close();
} else {
    header("Location: ../../FRONTED/INDEX/LOGIN/InicioDeSesion.php");
    exit();
}
?>
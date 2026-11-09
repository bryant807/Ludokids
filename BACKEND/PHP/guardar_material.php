<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    echo "<script>alert('Debes iniciar sesión para subir material.'); window.location.href = '../../FRONTED/INDEX/LOGIN/InicioDeSesion.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST['nombreMaterial']);
    $id_usuario = $_SESSION['id_usuario'];
    
    if (isset($_FILES['archivoMaterial']) && $_FILES['archivoMaterial']['error'] === UPLOAD_ERR_OK) {
        $archivoTmp = $_FILES['archivoMaterial']['tmp_name'];
        $nombreOriginal = basename($_FILES['archivoMaterial']['name']);
        
        $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
        $nombreUnico = uniqid('mat_') . '.' . $extension;
        
        $carpetaDestino = "../uploads/";
        
        if (!is_dir($carpetaDestino)) {
            mkdir($carpetaDestino, 0777, true);
        }
        
        $rutaArchivo = $carpetaDestino . $nombreUnico;
        
        if (move_uploaded_file($archivoTmp, $rutaArchivo)) {
            $sql = "INSERT INTO material (id_usuario, titulo, archivo, fecha_publicacion) VALUES (?, ?, ?, NOW())";
            $stmt = $conexion->prepare($sql);
            
            if ($stmt) {
                $stmt->bind_param("iss", $id_usuario, $titulo, $nombreUnico);
                
                // Corrección aplicada aquí: flecha correcta ->
                if ($stmt->execute()) {
                    echo "<script>
                        alert('¡Material subido y guardado con éxito!');
                        window.location.href = '../../FRONTED/INDEX/PRINCIPALES/PROFESORES/subir_material.php';
                    </script>";
                } else {
                    echo "<script>alert('Error al guardar en la base de datos: " . $stmt->error . "'); window.history.back();</script>";
                }
                $stmt->close();
            } else {
                echo "<script>alert('Error en el prepare: " . $conexion->error . "'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Error al mover el archivo al servidor.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Por favor, selecciona un archivo válido.'); window.history.back();</script>";
    }
    
    $conexion->close();
} else {
    header("Location: ../../FRONTED/INDEX/PRINCIPALES/Profesores.php");
    exit();
}
?>
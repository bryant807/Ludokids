<?php
session_start();

// Si no ha iniciado sesión, lo redirigimos al login
if (!isset($_SESSION['id_usuario'])) {
    header("Location: InicioDeSesion.php");
    exit();
}

// Incluimos la conexión a la base de datos usando ruta absoluta desde la raíz del servidor
include($_SERVER['DOCUMENT_ROOT'] . '/Ludokids 3 de noviembre/BACKEND/PHP/conexion.php');

$id_usuario = $_SESSION['id_usuario'];

// Consultamos solo los materiales subidos por ESTE usuario específico
$sqlMisMateriales = "SELECT * FROM material WHERE id_usuario = ? ORDER BY fecha_publicacion DESC";
$stmt = $conexion->prepare($sqlMisMateriales);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$resultado = $stmt->get_result();

$totalArchivos = $resultado->num_rows;
$totalPDF = 0; // Podrías contar si la extensión es pdf si lo deseas
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoKids - Mis Actividades</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../CSS/Index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@700&display=swap" rel="stylesheet">
</head>

<body>
      <header class="header-ALL">
        <div class="Encabezado-De-Paginas">
            <div class="elmo-DiferenteH2">
                <img src="../../ELEMENTOS/mario_header2-removebg-preview.webp" alt="figurita de elmo">
            </div>
            <div class="letrero-Del-H2">
                <img src="../../ELEMENTOS/letrero-header-2.png" alt="slogan">
            </div>
            <div class="texto-elmo">
                <img src="../../ELEMENTOS/logo_principal-removebg-preview.webp" alt="texto sobre la pagina">
            </div>
        </div>
        <nav class="menu">
            <a href="../PRINCIPALES/Inicio.html"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
            <a href="../PRINCIPALES/Juegos.php"><i class="fa-solid fa-gamepad"></i><span>Juegos</span></a>
            <a href="../PRINCIPALES/Cuentos.php"><i class="fa-solid fa-book-open"></i><span>Cuentos</span></a>
            <a href="../PRINCIPALES/Profesores.php"><i class="fa-solid fa-chalkboard-user"></i><span>Profesores</span></a>
            <a href="../PRINCIPALES/Recreo.php"><i class="fa-solid fa-puzzle-piece"></i><span>Recreo</span></a>

            <?php if (isset($_SESSION['id_usuario'])): ?>
                <a href="Perfil.php" class="btn-login-nav activo" aria-label="Ver Perfil">
                    <i class="fa-solid fa-user-check"></i>
                </a>
            <?php else: ?>
                <a href="InicioDeSesion.php" class="btn-login-nav" aria-label="Iniciar sesión">
                    <i class="fa-solid fa-user"></i>
                </a>
            <?php endif; ?>
        </nav>
    </header>

    <main class="contenedor">

        <aside class="barra-lateral">
            <figure class="foto-perfil">
                <img src="img/img_predeterminada.jpg" alt="Foto de perfil">
            </figure>

            <nav>
    <a href="Perfil.php" class="opcion">Perfil</a>
    <a href="Actividades.php" class="opcion activa">Mis Actividades</a>
    <!-- Enlace directo para destruir la sesión -->
    <a href="/Ludokids 3 de noviembre/BACKEND/PHP/logout.php" class="opcion" style="color: #e74c3c;">
        <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
    </a>
</nav>
        </aside>

        <section class="contenido">
            <h2 class="titulo">Mis Actividades</h2>

            <section class="estadisticas">
                <article class="estadistica">
                    <span class="estadistica-icono">📁</span>
                    <div>
                        <p>Archivos subidos</p>
                        <h3 id="totalArchivos"><?php echo $totalArchivos; ?></h3>
                    </div>
                </article>

                <article class="estadistica">
                    <span class="estadistica-icono">📄</span>
                    <div>
                        <p>Documentos Propios</p>
                        <h3 id="totalPDF"><?php echo $totalArchivos; ?></h3>
                    </div>
                </article>
            </section>

            <section class="panel-archivos">
                <div class="encabezado-archivos">
                    <h3>Materiales guardados</h3>
                    <span id="fechaActual"><?php echo date("d/m/Y"); ?></span>
                </div>

                <div id="listaArchivos" class="lista-archivos" style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
                    <?php if ($totalArchivos > 0): ?>
                        <?php while ($row = $resultado->fetch_assoc()): ?>
                            <div style="display: flex; justify-content: space-between; align-items: center; background: #f9f9f9; padding: 15px 20px; border-radius: 10px; border-left: 5px solid #b6207d; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                                <div>
                                    <h4 style="margin: 0 0 5px 0; color: #333; font-size: 1.1rem;"><?php echo htmlspecialchars($row['titulo']); ?></h4>
                                    <small style="color: #666;">Subido el: <?php echo $row['fecha_publicacion']; ?></small>
                                </div>
                                <a href="/Ludokids 3 de noviembre/BACKEND/uploads/<?php echo htmlspecialchars($row['archivo']); ?>" target="_blank" style="background: #b6207d; color: white; padding: 8px 15px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 0.9rem;" download>
                                    <i class="fa-solid fa-download"></i> Descargar
                                </a>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <!-- Mensaje vacío que se muestra solo si no tiene archivos -->
                        <div id="mensajeVacio" class="mensaje-vacio" style="text-align: center; padding: 40px;">
                            <div class="icono-vacio" style="font-size: 3rem; margin-bottom: 10px;">📂</div>
                            <h3>Todavía no tienes archivos</h3>
                            <p>Cuando subas un material desde tu perfil o profesores, aparecerá aquí.</p>
                            <a href="../PRINCIPALES/PROFESORES/subir_material.php" class="boton-perfil" style="display: inline-block; margin-top: 15px; background: #b6207d; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold;">Subir material</a>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

        </section>
    </main>

    <footer class="main-footer">
    <div class="footer-container">
        <div class="footer-column">
            <h4>Información</h4>
            <ul class="footer-links">
                <li><a href="../FOOTER_INDEX/Politicas.php">Política de privacidad</a></li>
                <li><a href="../FOOTER_INDEX/Nosotros.php">Sobre nosotros</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>Contáctanos</h4>
            <address class="footer-contact">
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=ieca.ludokids@gmail.com" target="_blank" rel="noopener noreferrer">
                    <i class="fa-solid fa-envelope"></i> ieca.ludokids@gmail.com
                </a>
            </address>
        </div>
        <div class="footer-column">
            <h4>Síguenos</h4>
            <div class="social-icons">
                <a href="https://www.tiktok.com" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                    <i class="fa-brands fa-tiktok fa-2x"></i>
                </a>
                <a href="https://www.instagram.com/ieca.ludokids/?utm_source=ig_web_button_share_sheet" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                    <i class="fa-brands fa-instagram fa-2x"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; <time datetime="2026">2026</time> LudoKids. Todos los derechos reservados.</p>
    </div>
</footer>
</body>
</html>
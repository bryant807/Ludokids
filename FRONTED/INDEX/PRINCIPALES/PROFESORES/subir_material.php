<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoKids - Subir Material</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../../CSS/Index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@700&display=swap" rel="stylesheet">
    <style>
        /* Estilos para el botón grande central y la ventana modal */
        .contenedor-subida-central {
            text-align: center;
            padding: 60px 20px;
        }
        .btn-abrir-modal {
            background-color: #b6207d;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            padding: 20px 40px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
            transition: background 0.3s, transform 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 15px;
        }
        .btn-abrir-modal:hover {
            background-color: #951764;
            transform: scale(1.05);
        }

        /* Fondo oscuro de la ventana modal */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        /* Contenedor de la ventanita flotante */
        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 20px;
            width: 90%;
            max-width: 450px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            position: relative;
            animation: fadeIn 0.3s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .modal-content h3 {
            color: #b6207d;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
        .modal-content label {
            display: block;
            text-align: left;
            font-weight: bold;
            margin-bottom: 5px;
            color: #444;
        }
        .modal-content input[type="text"],
        .modal-content input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
        }
        .modal-acciones {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
        .btn-guardar {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-cerrar {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header class="header-ALL">
        <div class="Encabezado-De-Paginas">
            <div class="elmo-DiferenteH2">
                <img src="../../../ELEMENTOS/mario_header2-removebg-preview.webp" alt="figurita de elmo" >
            </div>
            <div class="texto-elmo">
                <img src="../../../ELEMENTOS/logo_principal-removebg-preview.webp" alt="Logo de la página">
            </div>
            <div class="letrero-Del-H2">
                <img src="../../../ELEMENTOS/letrero-header-2.png" alt="slogan">
            </div>
        </div>
        <nav class="menu">
            <a href="../Inicio.html"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
            <a href="../Juegos.php"><i class="fa-solid fa-gamepad"></i><span>Juegos</span></a>
            <a href="../Cuentos.php"><i class="fa-solid fa-book-open"></i><span>Cuentos</span></a>
            <a href="../Profesores.php" class="activo"><i class="fa-solid fa-chalkboard-user"></i><span>Profesores</span></a>
            <a href="../Recreo.php"><i class="fa-solid fa-puzzle-piece"></i><span>Recreo</span></a>

            <?php if (isset($_SESSION['id_usuario'])): ?>
                <a href="../../LOGIN/Perfil.php" class="btn-login-nav activo" aria-label="Ver Perfil">
                    <i class="fa-solid fa-user-check"></i>
                </a>
            <?php else: ?>
                <a href="../../LOGIN/InicioDeSesion.php" class="btn-login-nav" aria-label="Iniciar sesión">
                    <i class="fa-solid fa-user"></i>
                </a>
            <?php endif; ?>
        </nav>
    </header>
    <div class="section-transition"></div>

    <main>
        <div class="contenedor-subida-central">
            <h1>Gestión de Material Educativo</h1>
            <p style="color: #666; margin-bottom: 30px;">Comparte y visualiza recursos educativos para los estudiantes.</p>
            
            <!-- Botón grande para abrir la ventana modal -->
            <button type="button" class="btn-abrir-modal" id="abrirModal">
                <i class="fa-solid fa-plus-circle"></i> Subir material nuevo
            </button>
        </div>

        <!-- SECCIÓN PÚBLICA: Lista de materiales guardados para cualquier usuario -->
        <section style="max-width: 900px; margin: 0 auto 50px auto; padding: 20px; background: white; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
            <h2 style="color: #b6207d; margin-bottom: 20px; border-bottom: 2px solid #eee; padding-bottom: 10px;">
                <i class="fa-solid fa-folder-open"></i> Materiales Disponibles
            </h2>
            
            <div style="display: grid; gap: 15px;">
                <?php
                // Incluimos la conexión para listar el contenido
                include($_SERVER['DOCUMENT_ROOT'] . '/Ludokids 3 de noviembre/BACKEND/PHP/conexion.php');                
                $sqlListar = "SELECT m.titulo, m.archivo, m.fecha_publicacion, u.nombre AS profesor 
                                FROM material m 
                                JOIN usuario u ON m.id_usuario = u.id_usuario 
                                ORDER BY m.fecha_publicacion DESC";
                
                $resultado = $conexion->query($sqlListar);
                
                if ($resultado && $resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo '<div style="display: flex; justify-content: space-between; align-items: center; background: #f9f9f9; padding: 15px 20px; border-radius: 10px; border-left: 5px solid #b6207d;">';
                        echo '<div>';
                        echo '<h4 style="margin: 0 0 5px 0; color: #333; font-size: 1.1rem;">' . htmlspecialchars($row['titulo']) . '</h4>';
                        echo '<small style="color: #666;">Subido por: <strong>' . htmlspecialchars($row['profesor']) . '</strong> el ' . $row['fecha_publicacion'] . '</small>';
                        echo '</div>';
                        // Cambia la línea del enlace de descarga por esta:
                        echo '<a href="/Ludokids 3 de noviembre/BACKEND/uploads/' . htmlspecialchars($row['archivo']) . '" target="_blank" style="background: #b6207d; color: white; padding: 8px 15px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 0.9rem;" download>';
                        echo '<i class="fa-solid fa-download"></i> Descargar';
                        echo '</a>';
                        echo '</div>';
                    }
                } else {
                    echo '<p style="color: #777; text-align: center; padding: 20px;">No hay materiales subidos todavía. ¡Sé el primero en compartir uno!</p>';
                }
                
                $conexion->close();
                ?>
            </div>
        </section>

        <!-- Ventana Modal Oculta para subir -->
        <div class="modal-overlay" id="modalSubida">
            <div class="modal-content">
                <h3>Subir Material</h3>
                <form action="/Ludokids 3 de noviembre/BACKEND/PHP/guardar_material.php" method="POST" enctype="multipart/form-data">
                <label for="nombreMaterial">Nombre del material</label>
                <input type="text" id="nombreMaterial" name="nombreMaterial" placeholder="Ej: Fichas de sumas y restas" required>

                <label for="archivoMaterial">Seleccionar archivo</label>
                <input type="file" id="archivoMaterial" name="archivoMaterial" accept=".pdf,.doc,.docx,.png,.jpg" required>

                <div class="modal-acciones">
                    <button type="button" class="btn-cerrar" id="cerrarModal">Cancelar</button>
                    <button type="submit" class="btn-guardar">Subir</button>
                </div>
            </form>
            </div>
        </div>
    </main>

    <footer class="main-footer">
        <div class="footer-container">
            <div class="footer-column">
                <h4>Información</h4>
                <ul class="footer-links">
                    <li><a href="../../FOOTER_INDEX/Politicas.php">Política de privacidad</a></li>
                    <li><a href="../../FOOTER_INDEX/Nosotros.php">Sobre nosotros</a></li>
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
                    <a href="https://www.tiktok.com/@ludokids01?lang=es" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
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

    <!-- Script JavaScript para controlar que la ventana modal abra y cierre -->
    <script>
        const btnAbrir = document.getElementById('abrirModal');
        const btnCerrar = document.getElementById('cerrarModal');
        const modal = document.getElementById('modalSubida');

        btnAbrir.addEventListener('click', () => {
            modal.style.display = 'flex';
        });

        btnCerrar.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        // Cierra la ventana si hacen clic fuera del recuadro blanco
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    </script>
</body>
</html>
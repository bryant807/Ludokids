<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoKids - Trazos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../../CSS/Index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header-ALL">
        <div class="Encabezado-De-Paginas">
            <div class="elmo-DiferenteH2">
                <img src="../../../ELEMENTOS/mario_header2-removebg-preview.webp" alt="figurita de elmo" >
            </div>
            <div class="letrero-Del-H2">
                <img src="../../../ELEMENTOS/letrero-header-2.png" alt="slogan">
            </div>
            <div class="texto-elmo">
                <img src="../../../ELEMENTOS/logo_principal-removebg-preview.webp" alt="texto sobre la pagina">
            </div>
        </div>
        <nav class="menu">
    <a href="../Inicio.html"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
    <a href="../Juegos.php"><i class="fa-solid fa-gamepad"></i><span>Juegos</span></a>
    <a href="../Cuentos.php"><i class="fa-solid fa-book-open"></i><span>Cuentos</span></a>
    <a href="../Profesores.php"class="activo"><i class="fa-solid fa-chalkboard-user"></i><span>Profesores</span></a>
    <a href="../Recreo.php"><i class="fa-solid fa-puzzle-piece"></i><span>Recreo</span></a>

    <?php if (isset($_SESSION['id_usuario'])): ?>
        <!-- SI HAY SESIÓN INICIADA: Muestra el icono con check y manda al Perfil -->
        <a href="../LOGIN/Perfil.php" class="btn-login-nav activo" aria-label="Ver Perfil">
            <i class="fa-solid fa-user-check"></i>
        </a>
    <?php else: ?>
        <!-- SI NO HAY SESIÓN: Muestra el icono normal y manda al Login -->
        <a href="../LOGIN/InicioDeSesion.php" class="btn-login-nav" aria-label="Iniciar sesión">
            <i class="fa-solid fa-user"></i>
        </a>
    <?php endif; ?>
</nav>
    </header>
    <div class="section-transition"></div>
<main>
    
<section class="contenido-subpagina">
    <h1>¡Escritura!</h1>


    <!-- Contenedor de Tarjetas -->
    <div class="contenedor-material" id="contenedorMateriales">

        <a href="../../../ELEMENTOS/Img-material-profes/trazos (1).png"
            class="tarjeta-material"
            download="Trazos-1.png">
            <img src="../../../ELEMENTOS/Img-material-profes/trazos (1).png"
                alt="Actividad de trazos">
            <div class="titulo-material">Escritura 1</div>
            <div class="titulo-material">Descargar imagen</div>
        </a>

        <a href="../../../ELEMENTOS/Img-material-profes/trazos (2).png"
            class="tarjeta-material"
            download="Trazos-2.png">
            <img src="../../../ELEMENTOS/Img-material-profes/trazos (2).png"
                alt="Actividad de trazos">
            <div class="titulo-material">Escritura 2</div>
            <div class="titulo-material">Descargar imagen</div>
        </a>

        <a href="../../../ELEMENTOS/Img-material-profes/trazos (3).png"
            class="tarjeta-material"
            download="Trazos-3.png">
            <img src="../../../ELEMENTOS/Img-material-profes/trazos (3).png"
                alt="Actividad de trazos">
            <div class="titulo-material">Escritura 3</div>
            <div class="titulo-material">Descargar imagen</div>
        </a>

        <a href="../../../ELEMENTOS/Img-material-profes/trazos (4).png"
            class="tarjeta-material"
            download="Trazos-4.png">
            <img src="../../../ELEMENTOS/Img-material-profes/trazos (4).png"
                alt="Actividad de trazos">
            <div class="titulo-material">Escritura 4</div>
            <div class="titulo-material">Descargar imagen</div>
        </a>

    </div>
</section>

<div class="contenedor-volver">
    <a class="btn-volver" href="../../PRINCIPALES/Profesores.php">
        <i class="fa-solid fa-arrow-left"></i> Volver a Profesores
    </a>
</div>
</main>

    <footer class="main-footer">
        <!-- Footer existente sin cambios -->
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

    <!-- Script para la gestión del modal y la inserción dinámica de tarjetas -->
    <script>
        const modal = document.getElementById('uploadModal');
        const contenedorMateriales = document.getElementById('contenedorMateriales');

        function openModal() {
            modal.style.display = 'flex';
        }

        function closeModal() {
            modal.style.display = 'none';
            document.getElementById('uploadForm').reset();
        }

        function handlePublish(event) {
            event.preventDefault();

            const title = document.getElementById('materialTitle').value;
            const fileInput = document.getElementById('materialImage').files[0];

            if (!fileInput) return;

            // Generar URL temporal para la imagen y la descarga
            const fileUrl = URL.createObjectURL(fileInput);
            const fileName = fileInput.name;

            // Crear el elemento de la tarjeta respetando la estructura original de LudoKids
            const tarjeta = document.createElement('a');
            tarjeta.className = 'tarjeta-material';
            tarjeta.href = fileUrl;
            tarjeta.download = fileName;

            tarjeta.innerHTML = `
                <img src="${fileUrl}" alt="${title}">
                <div class="titulo-material">${title}</div>
                <div class="titulo-material">Descargar imagen</div>
            `;

            // Agregar la tarjeta al contenedor principal
            contenedorMateriales.appendChild(tarjeta);

            // Cerrar y limpiar el formulario
            closeModal();
        }
    </script>
</body>
</html>
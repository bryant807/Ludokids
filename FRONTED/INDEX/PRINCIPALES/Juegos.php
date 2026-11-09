<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ludokids-juegos</title>
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
                <img src="../../ELEMENTOS/mario_header2-removebg-preview.webp" alt="figurita de elmo" >
            </div>
            <div class="letrero-Del-H2">
                <img src="../../ELEMENTOS/letrero-header-2.png" alt="slogan">
            </div>
            <div class="texto-elmo">
                <img src="../../ELEMENTOS/logo_principal-removebg-preview.webp" alt="texto sobre la pagina">
            </div>
        </div>
        <nav class="menu">
    <a href="Inicio.html"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
    <a href="Juegos.php"class="activo"><i class="fa-solid fa-gamepad"></i><span>Juegos</span></a>
    <a href="Cuentos.php"><i class="fa-solid fa-book-open"></i><span>Cuentos</span></a>
    <a href="Profesores.php"><i class="fa-solid fa-chalkboard-user"></i><span>Profesores</span></a>
    <a href="Recreo.php"><i class="fa-solid fa-puzzle-piece"></i><span>Recreo</span></a>

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
    <main class="contenido-prin">
        <h1>Juegos</h1>
        <div class="fila-juegos">
            <a href="../../INDEX/JUEGOS/EDUCATIVOS/TRANSPORTES.php" class="tarjeta-juego">
                <p class="titulo-tarjeta">Los medios de transporte</p>
                <img src="../../ELEMENTOS/LosTransportes-Juegos.jpg" alt="Los medios de transporte">
            </a>
            <a href="../../INDEX/JUEGOS/EDUCATIVOS/PROFECIONES.php" class="tarjeta-juego">
                <p class="titulo-tarjeta">Las <br> profesiones</p>
                <img src="../../ELEMENTOS/LosProfesiones-Juegos.jpg" alt="Las profesiones">
            </a>
            <a href="../../INDEX/JUEGOS/EDUCATIVOS/numeros.html" class="tarjeta-juego">
                <p class="titulo-tarjeta">Los <br> números</p>
                <img src="../../ELEMENTOS/NUMEROS.webp" alt="Los números">
            </a>
            <a href="../../INDEX/JUEGOS/EDUCATIVOS/VOCALES.html" class="tarjeta-juego">
                <p class="titulo-tarjeta">Las vocales</p>
                <img src="../../ELEMENTOS/vocales.webp" alt="Las vocales">
            </a>
        </div>

        <div class="fila-juegos">
            <a href="../../INDEX/JUEGOS/EDUCATIVOS/SISTEMASOLAR.php" class="tarjeta-juego">
                <p class="titulo-tarjeta">El <br> sistema solar</p>
                <img src="../../ELEMENTOS/ElSistemaSolar-Juegos.jpg" alt="El sistema solar">
            </a>
            <a href="../../INDEX/JUEGOS/EDUCATIVOS/CUERPO.php" class="tarjeta-juego">
                <p class="titulo-tarjeta">Partes del <br> cuerpo</p>
                <img src="../../ELEMENTOS/PartesDelCuerpo-Juegos.jpg" alt="Partes del cuerpo">
            </a>
            <a href="../../INDEX/JUEGOS/EDUCATIVOS/COLORES.php" class="tarjeta-juego">
                <p class="titulo-tarjeta">Los <br> colores</p>
                <img src="../../ELEMENTOS/LosColores-Juegos.jpg" alt="Los colores">
            </a>
            <a href="../../INDEX/JUEGOS/EDUCATIVOS/ANIMALES.html" class="tarjeta-juego">
                <p class="titulo-tarjeta">Los animales</p>
                <img src="../../ELEMENTOS/LaGranja-Juegos.jpg" alt="Los animales">
            </a>
        </div>
    </main>
    <footer class="main-footer">
    <div class="footer-container">
        
        <!-- Columna 1: Enlaces legales e información -->
        <div class="footer-column">
            <h4>Información</h4>
            <ul class="footer-links">
                <li><a href="../FOOTER_INDEX/Politicas.php">Política de privacidad</a></li>
                <li><a href="../FOOTER_INDEX/Nosotros.php">Sobre nosotros</a></li>
            </ul>
        </div>

        <!-- Columna 2: Contacto -->
        <div class="footer-column">
            <h4>Contáctanos</h4>
            <address class="footer-contact">
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=ieca.ludokids@gmail.com" target="_blank" rel="noopener noreferrer">
                    <i class="fa-solid fa-envelope"></i> ieca.ludokids@gmail.com
                </a>
            </address>
        </div>

        <!-- Columna 3: Redes Sociales -->
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

    <!-- Barra inferior para Derechos de Autor -->
    <div class="footer-bottom">
        <p>&copy; <time datetime="2026">2026</time> LudoKids. Todos los derechos reservados.</p>
    </div>
</footer>
</body>
</html>
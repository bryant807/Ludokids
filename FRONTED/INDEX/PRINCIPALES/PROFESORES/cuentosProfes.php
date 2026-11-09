<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoKids - cuentos</title>
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
    <h1>Cuentos!</h1>

    <div class="contenedor-material">

        <a class="tarjeta-material"
           href="../../../ELEMENTOS/Img-material-profes/cuento1.png"
           download="cuento1-para-los-niños.png">

            <img src="../../../ELEMENTOS/Img-material-profes/cuento1.png"
                 alt="El perrito y el gatito">

            <div class="titulo-material">El perrito y el gatito</div>
            <div class="titulo-material">Descargar imagen</div>
        </a>

        <a class="tarjeta-material"
           href="../../../ELEMENTOS/Img-material-profes/cuento2.png"
           download="cuento2-para-los-niños.png">

            <img src="../../../ELEMENTOS/Img-material-profes/cuento2.png"
                 alt="Tito la tortuguita">

            <div class="titulo-material">Tito la tortuguita</div>
            <div class="titulo-material">Descargar imagen</div>
        </a>

        <a class="tarjeta-material"
           href="../../../ELEMENTOS/Img-material-profes/cuento3.png"
           download="cuento3-para-los-niños.png">

            <img src="../../../ELEMENTOS/Img-material-profes/cuento3.png"
                 alt="El conejito y su zanahoria">

            <div class="titulo-material">El conejito y su zanahoria</div>
            <div class="titulo-material">Descargar imagen</div>
        </a>

        <a class="tarjeta-material"
           href="../../../ELEMENTOS/Img-material-profes/cuento4.png"
           download="cuento4-para-los-niños.png">

            <img src="../../../ELEMENTOS/Img-material-profes/cuento4.png"
                 alt="El patito que quería volar">

            <div class="titulo-material">El patito que quería volar</div>
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
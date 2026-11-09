<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre nosotros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../../FRONTED/CSS/Index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@700&display=swap" rel="stylesheet">
    <style>

        /* Títulos */
        .titulo-seccion-quienes { font-size: clamp(2.2rem, 1.2rem + 2vw, 3.2rem); }
        .titulo-equipo          { font-size: clamp(2.2rem, 1.2rem + 2vw, 3.2rem); }
        .caja-mision h2,
        .caja-vision h2         { font-size: clamp(1.8rem, 1rem + 1.6vw, 2.6rem); }

        /* Textos principales */
        .texto-presentacion p,
        .caja-mision p,
        .caja-vision p {
            font-size: clamp(1.25rem, 0.9rem + 1.1vw, 1.9rem);
            line-height: 1.6;
        }

        /* Equipo desarrollador */
        .nombre-integrante {
            font-size: clamp(1.15rem, 0.9rem + 0.7vw, 1.6rem);
            line-height: 1.3;
            font-weight: bold;
        }
        .rol-integrante {
            font-size: clamp(0.95rem, 0.8rem + 0.45vw, 1.25rem);
        }

        /* Pie de página */
        .footer-column h4 { font-size: clamp(1.3rem, 1rem + 0.8vw, 1.8rem); }
        .footer-links a,
        .footer-contact a { font-size: clamp(1.1rem, 0.9rem + 0.6vw, 1.5rem); }
        .footer-bottom p  { font-size: clamp(1rem, 0.85rem + 0.4vw, 1.25rem); }

        /* En pantallas medianas y grandes se amplían también los contenedores
            para que el texto grande no quede apretado. En celular no se tocan,
           así se respeta el diseño responsive existente. */
        @media (min-width: 769px) {
            .sobre-nosotros       { max-width: 1400px; }
            .imagen-presentacion  { width: 340px; height: 290px; }
            .contenedor-equipo    { gap: 50px; }
            .tarjeta-integrante   { width: 290px; }
            .tarjeta-integrante img { width: 150px; height: 150px; }
        }
    </style>
</head>
<body>
    <header class="header-ALL">
        <div class="Encabezado-De-Paginas">
            <div class="elmo-DiferenteH2">
                <img src="../../../FRONTED/Elementos/mario_header2-removebg-preview.webp" alt="figurita de Elmo" >
            </div>
            <div class="letrero-Del-H2">
                <img src="../../../FRONTED/Elementos/letrero-header-2.png" alt="slogan">
            </div>  
            <div class="texto-elmo">
                <img src="../../../FRONTED/Elementos/logo_principal-removebg-preview.webp" alt="texto sobre la página">
            </div>
        </div>
        <nav class="menu">
    <a href="../PRINCIPALES/Inicio.html"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
    <a href="../PRINCIPALES/Juegos.php"><i class="fa-solid fa-gamepad"></i><span>Juegos</span></a>
    <a href="../PRINCIPALES/Cuentos.php"><i class="fa-solid fa-book-open"></i><span>Cuentos</span></a>
    <a href="../PRINCIPALES/Profesores.php"><i class="fa-solid fa-chalkboard-user"></i><span>Profesores</span></a>
    <a href="../PRINCIPALES/Recreo.php"><i class="fa-solid fa-puzzle-piece"></i><span>Recreo</span></a>

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
    <main style="background-color: #f5cded; padding: 20px;">
    <section class="sobre-nosotros">
        <h1 class="titulo-seccion-quienes">¿Quiénes somos?</h1>

        <div class="tarjeta-presentacion">
            <img src="../../ELEMENTOS/ImgPrinNosotros.webp" alt="Niños jugando" class="imagen-presentacion">
            <div class="texto-presentacion">
                <p>Somos un equipo de estudiantes de la Institución Educativa Ciudadela Las Américas de la ciudad de Medellín, pertenecientes al programa de media técnica en desarrollo de software (en convenio con la Institución Universitaria Pascual Bravo).</p>
                <p>Ludokids nace como una iniciativa pedagógica y tecnológica diseñada para dar respuesta a las necesidades de aprendizaje de los niños y niñas de preescolar. Al identificar que los estudiantes más pequeños suelen presentar dificultades de concentración o falta de motivación con las metodologías tradicionales, decidimos crear una posible solución digital en español, interactiva, accesible y totalmente gratuita.</p>
            </div>
        </div>

        <div class="contenedor-mision-vision">
            <div class="caja-mision">
                <h2>MISIÓN</h2>
                <p>Transformar la educación inicial en preescolar a través del juego, recursos interactivos que faciliten el aprendizaje.  </p>
            </div>
            <div class="caja-vision">
                <h2>VISIÓN</h2>
                <p>Fomentar en los niños el interés por la tecnología y el aprendizaje dinámico, promoviendo el desarrollo cognitivo desde la primera infancia.</p>
            </div>
        </div>
    </section>
 
    <section class="equipo-desarrollador">
        <h2 class="titulo-equipo">Equipo desarrollador</h2>
        <div class="contenedor-equipo">
            <div class="tarjeta-integrante">
                <img src="../../ELEMENTOS/Aleja-A.webp" alt="Foto de María Alejandra Álvarez Usma">
                <p class="nombre-integrante">Álvarez Usma María<br>Alejandra</p>
                <span class="rol-integrante">Scrum master</span>
            </div>
            <div class="tarjeta-integrante">
                <img src="../../ELEMENTOS/Bryant-M.webp" alt="Foto de Bryant Esteban Mejía Duque">
                <p class="nombre-integrante">Mejía Duque Bryant<br>Esteban</p>
                <span class="rol-integrante">Desarrollador back-end</span>
            </div>
            <div class="tarjeta-integrante">
                <img src="../../ELEMENTOS/Nicole-T.webp" alt="Foto de Nicole Sofía Fabares Mazo">
                <p class="nombre-integrante">Tabares Mazo Nicole<br>Sofía</p>
                <span class="rol-integrante">Diseñadora UX/UI</span>
            </div>
            <div class="tarjeta-integrante">
                <img src="../../ELEMENTOS/Jeronimo-Z.webp" alt="Foto de Jerónimo Zapata Álvarez">
                <p class="nombre-integrante">Zapata Álvarez<br>Jerónimo</p>
                <span class="rol-integrante">Desarrollador Front-end</span>
            </div>
        </div>
    </section>
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
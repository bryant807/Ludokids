<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoKids - Profesores</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../CSS/Index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@700&display=swap" rel="stylesheet">
</head>
<style>
    .Ayuda-Agregar {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 3px dashed #b6207d;
            background: #fff0f6;
            border-radius: 15px;
            text-decoration: none;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
        }
        .Ayuda-Agregar:hover {
            background: #ffe3e8;
            transform: translateY(-5px);
        }
        .Ayuda-Agregar i {
            font-size: 4rem;
            color: #b6207d;
            margin-bottom: 15px;
        }
        .Ayuda-Agregar h2 {
            color: #b6207d;
            font-size: 1.3rem;
            margin-bottom: 5px;
        }
        .Ayuda-Agregar p {
            color: #666;
            font-size: 0.95rem;
        }
</style>
<body>
    <header class="header-ALL">
        <div class="Encabezado-De-Paginas">
            <div class="elmo-DiferenteH2">
                <img src="../../ELEMENTOS/mario_header2-removebg-preview.webp" alt="figurita de elmo" >
            </div>
            <div class="texto-elmo">
                <img src="../../ELEMENTOS/logo_principal-removebg-preview.webp" alt="Logo de la página">
            </div>
            <div class="letrero-Del-H2">
                <img src="../../ELEMENTOS/letrero-header-2.png" alt="slogan">
            </div>
        </div>
        <nav class="menu">
            <a href="Inicio.html"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
            <a href="Juegos.php"><i class="fa-solid fa-gamepad"></i><span>Juegos</span></a>
            <a href="Cuentos.php"><i class="fa-solid fa-book-open"></i><span>Cuentos</span></a>
            <a href="Profesores.php" class="activo"><i class="fa-solid fa-chalkboard-user"></i><span>Profesores</span></a>
            <a href="Recreo.php"><i class="fa-solid fa-puzzle-piece"></i><span>Recreo</span></a>

            <?php if (isset($_SESSION['id_usuario'])): ?>
                <a href="../LOGIN/Perfil.php" class="btn-login-nav activo" aria-label="Ver Perfil">
                    <i class="fa-solid fa-user-check"></i>
                </a>
            <?php else: ?>
                <a href="../LOGIN/InicioDeSesion.php" class="btn-login-nav" aria-label="Iniciar sesión">
                    <i class="fa-solid fa-user"></i>
                </a>
            <?php endif; ?>
        </nav>
    </header>
    <div class="section-transition"></div>
    <main>
        <section class="Contenido-Profesores">
            <h1>Profesores</h1>
            <div class="Contenedor-Ayuda-Profes">
                <a class="Ayuda" href="PROFESORES/trazos.php">
                    <img src="../../ELEMENTOS/imagen-profes.jpeg" class="botton-PRO" alt="ayuda 1">
                    <h2>Escritura para imprimir</h2>
                    <p>Impresiones para que los niños puedan practicar y aprender.</p>
                </a>
                <a class="Ayuda" href="PROFESORES/cuentosProfes.php">
                    <img src="../../ELEMENTOS/imagen-profesBuho.jpeg" class="botton-PRO" alt="ayuda 2">
                    <h2>Cuentos para imprimir</h2>
                    <p>Historias para que los niños puedan leer y disfrutar.</p>
                </a>
                <a class="Ayuda" href="PROFESORES/numeros.php">
                    <img src="../../ELEMENTOS/imagen-profesTeacher.jpeg" class="botton-PRO" alt="ayuda 3">
                    <h2>Números para imprimir</h2>
                    <p>Material para que los niños puedan aprender a contar.</p>
                </a>
                <a class="Ayuda" href="PROFESORES/letras.php">
                    <img src="../../ELEMENTOS/imagen-profesRecreo.jpeg" class="botton-PRO" alt="ayuda 4">
                    <h2>Letras para imprimir</h2>
                    <p>Material para que los niños puedan aprender a leer.</p>
                </a>
                <a class="Ayuda" href="PROFESORES/comentarios.php">
                    <img src="../../ELEMENTOS/imagen-profesJuegos.jpeg" class="botton-PRO" alt="ayuda 5">
                    <h2>Comentarios y sugerencias</h2>
                    <p>Material para que los niños puedan practicar su escritura.</p>
                </a>

                <!-- NUEVO RECUADRO: Subir Material con el icono de más -->
                <a class="Ayuda-Agregar" href="PROFESORES/subir_material.php">
                    <i class="fa-solid fa-circle-plus"></i>
                    <h2>Subir material</h2>
                    <p>Comparte contenido nuevo para los estudiantes.</p>
                </a>
            </div>
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
</body>
</html>
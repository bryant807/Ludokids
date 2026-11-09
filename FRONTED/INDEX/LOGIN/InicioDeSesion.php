<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoKids - Iniciar sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../CSS/Index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@700&display=swap" rel="stylesheet">
    <style>
        .Comentarios-Form label { font-weight: bold; color: #555; }
        .mensaje-confirmacion { display: none; text-align: center; font-weight: bold; padding: 10px; border-radius: 12px; margin-top: 10px; }
        .mensaje-confirmacion.visible { display: block; }
        .mensaje-confirmacion.exito { background: #d4edda; color: #155724; }
        .mensaje-confirmacion.error { background: #f8d7da; color: #721c24; }
        .auth-enlace { text-align: center; margin-top: 15px; color: #444; }
        .auth-enlace a { color: #b6207d; font-weight: bold; text-decoration: underline; }
        .campo-password { position: relative; display: flex; }
        .campo-password input { width: 100%; padding-right: 48px; }
        .btn-ver-password { position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; font-size: 1.1rem; color: #555; }
    </style>
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
            <a href="InicioDeSesion.php" class="btn-login-nav activo" aria-label="Iniciar sesión"><i class="fa-solid fa-user"></i></a>
        </nav>
    </header>
    <div class="section-transition"></div>

    <main>
        <section class="Contenido-Profesores">
            <h1 class="titulo-comentarios">Iniciar sesión</h1>
            <div class="Comentarios-Contenedor">
                <p class="Comentarios-Intro">¡Qué bueno verte! Ingresa tus datos para continuar.</p>
                
                <!-- El formulario ahora envía los datos por POST a login.php -->
                <form class="Comentarios-Form" action="/Ludokids 3 de noviembre/BACKEND/PHP/login.php" method="POST" id="formLogin">                    <label for="correo">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" placeholder="tucorreo@correo.com" autocomplete="email" required>

                    <label for="password">Contraseña</label>
                    <div class="campo-password">
                        <input type="password" id="password" name="password" placeholder="Tu contraseña" autocomplete="current-password" required>
                        <button type="button" class="btn-ver-password" id="verPassword" aria-label="Mostrar contraseña">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>

                    <button type="submit" class="Comentarios-Btn">
                        <i class="fa-solid fa-right-to-bracket"></i> Entrar
                    </button>
                </form>

                <p class="auth-enlace">¿No tienes cuenta? <a href="Registro.php">Regístrate aquí</a></p>
            </div>
        </section>
        <div class="contenedor-volver-comentarios">
            <a class="btn-volver" href="../PRINCIPALES/Inicio.html">
                <i class="fa-solid fa-arrow-left"></i>
                Volver al inicio
            </a>
        </div>
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

    <script>
        // Script para mostrar u ocultar la contraseña
        const inputPassword = document.getElementById('password');
        const btnVer = document.getElementById('verPassword');

        btnVer.addEventListener('click', () => {
            const oculto = inputPassword.type === 'password';
            inputPassword.type = oculto ? 'text' : 'password';
            btnVer.innerHTML = oculto ? '<i class="fa-solid fa-eye-slash"></i>' : '<i class="fa-solid fa-eye"></i>';
        });
    </script>
</body>
</html>
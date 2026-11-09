<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoKids - Registro de Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../CSS/Index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@500;700&family=Baloo+2:wght@600;800&display=swap" rel="stylesheet">
    <style>
        .auth-container {
            max-width: 450px;
            margin: 50px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 3px solid var(--azul);
        }
        .auth-container h2 {
            font-family: 'Baloo 2', cursive;
            color: #6c5ce7;
            text-align: center;
            margin-bottom: 25px;
            font-size: 2rem;
        }
        .auth-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        .auth-container input, 
        .auth-container select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
        }
        .auth-container button {
            width: 100%;
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        .auth-container button:hover {
            background-color: #219653;
        }
        .auth-links {
            text-align: center;
            margin-top: 15px;
        }
        .auth-links a {
            color: #6c5ce7;
            text-decoration: none;
            font-weight: bold;
        }
        .auth-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header class="header-ALL">
        <div class="Encabezado-De-Paginas">
            <div class="elmo-DiferenteH2">
                <img src="../../ELEMENTOS/mario_header2-removebg-preview.webp" alt="Elmo">
            </div>
            <div class="letrero-Del-H2">
                <img src="../../ELEMENTOS/letrero-header-2.png" alt="slogan">
            </div>  
            <div class="texto-elmo">
                <img src="../../ELEMENTOS/logo_principal-removebg-preview.webp" alt="logo">
            </div>
        </div>
        <nav class="menu">
            <a href="/Ludokids 3 de noviembre/FRONTED/INDEX/PRINCIPALES/Inicio.html"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
            <a href="/Ludokids 3 de noviembre/FRONTED/INDEX/PRINCIPALES/Juegos.php"><i class="fa-solid fa-gamepad"></i><span>Juegos</span></a>
            <a href="/Ludokids 3 de noviembre/FRONTED/INDEX/PRINCIPALES/Cuentos.php"><i class="fa-solid fa-book-open"></i><span>Cuentos</span></a>
            <a href="/Ludokids 3 de noviembre/FRONTED/INDEX/PRINCIPALES/Profesores.php"><i class="fa-solid fa-chalkboard-user"></i><span>Profesores</span></a>
            <a href="/Ludokids 3 de noviembre/FRONTED/INDEX/PRINCIPALES/Recreo.php"><i class="fa-solid fa-puzzle-piece"></i><span>Recreo</span></a>
            <a href="InicioDeSesion.php" class="btn-login-nav"><i class="fa-solid fa-user"></i></a>
        </nav>
    </header>

    <main>
        <div class="auth-container">
            <h2>Crear Cuenta</h2>
            <form action="/Ludokids 3 de noviembre/BACKEND/PHP/registro.php" method="POST">
                <label for="nombre">Nombre completo</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ej. Ana María" required>

                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo" placeholder="correo@ejemplo.com" required>

                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" placeholder="Crea una contraseña segura" required>

                <label for="rol">Selecciona tu rol</label>
                <select id="rol" name="rol" required>
                    <option value="profesor">Profesor / Docente</option>
                    <option value="otro">Otro</option>
                </select>

                <button type="submit">Registrarse</button>
            </form>
            <div class="auth-links">
                <p>¿Ya tienes una cuenta? <a href="InicioDeSesion.php">Inicia sesión aquí</a></p>
            </div>
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
</body>
</html>
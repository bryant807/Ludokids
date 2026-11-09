<?php
session_start();

// Si el usuario no ha iniciado sesión, lo devolvemos al login por seguridad
if (!isset($_SESSION['id_usuario'])) {
    header("Location: InicioDeSesion.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoKids - Perfil</title>
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
        <!-- barra lateral -->
        <!-- barra lateral -->
<aside class="barra-lateral">
  <!-- Reemplazamos la foto y el botón por un encabezado estético con emoji -->
  <div class="tarjeta-avatar-perfil" style="text-align: center; padding: 20px 0; margin-bottom: 20px;">
     <span style="font-size: 3.5rem; display: block; margin-bottom: 10px;">👤</span>
     <h3 style="color: #333; font-size: 1.2rem; margin: 0;">Mi perfil</h3>
  </div>

  <nav>
      <a href="Perfil.php" class="opcion <?php echo basename($_SERVER['PHP_SELF']) == 'Perfil.php' ? 'activa' : ''; ?>">Perfil</a>
      <a href="Actividades.php" class="opcion <?php echo basename($_SERVER['PHP_SELF']) == 'Actividades.php' ? 'activa' : ''; ?>">Mis Actividades</a>
      <a href="/Ludokids 3 de noviembre/BACKEND/PHP/logout.php" class="opcion" style="color: #e74c3c;">
          <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
      </a>
  </nav>
</aside>

        <section class="contenido">
            <h2 class="titulo">Mi Perfil</h2>
            
            <!-- Tarjeta de Nombre -->
            <article class="tarjeta nombre">
                <div class="icono">😊</div>
                <div class="informacion">
                    <h3>Nombre de usuario</h3>
                    <input type="text" value="<?php echo htmlspecialchars($_SESSION['nombre']); ?>" readonly style="background-color: #f9f9f9; cursor: not-allowed;">
                </div>
            </article>

            <!-- Tarjeta de Correo -->
            <article class="tarjeta nombre">
                <div class="icono">✉️</div>
                <div class="informacion">
                    <h3>Correo electrónico</h3>
                    <input type="text" value="<?php echo htmlspecialchars($_SESSION['correo']); ?>" readonly style="background-color: #f9f9f9; cursor: not-allowed;">
                </div>
            </article>

            <!-- Tarjeta de Cambio de Contraseña Funcional -->
            <article class="tarjeta contraseña">
                <div class="icono">🔒</div>
                <div class="informacion">
                    <h3>Cambiar Contraseña</h3>

                    <form id="formContrasena">
                        <label for="contrasenaActual">Contraseña actual</label>
                        <input type="password" id="contrasenaActual" name="contrasenaActual" placeholder="Contraseña actual" autocomplete="current-password" required>

                        <label for="nuevaContrasena">Nueva contraseña</label>
                        <input type="password" id="nuevaContrasena" name="nuevaContrasena" placeholder="Nueva contraseña (mínimo 6 caracteres)" autocomplete="new-password" minlength="6" required>

                        <label for="confirmarContrasena">Confirmar contraseña</label>
                        <input type="password" id="confirmarContrasena" name="confirmarContrasena" placeholder="Confirmar contraseña" autocomplete="new-password" minlength="6" required>

                        <button type="submit" class="actualizar">Actualizar</button>
                        <p id="mensajeContrasena" class="mensaje" aria-live="polite" style="margin-top: 10px; font-weight: bold;"></p>
                    </form>
                </div>
            </article>
        </section>
    </main>

    <!-- Script funcional para el cambio de contraseña -->
    <script>
        document.getElementById('formContrasena').addEventListener('submit', function(e) {
            e.preventDefault();

            const actual = document.getElementById('contrasenaActual').value;
            const nueva = document.getElementById('nuevaContrasena').value;
            const confirmar = document.getElementById('confirmarContrasena').value;
            const mensaje = document.getElementById('mensajeContrasena');

            mensaje.textContent = '';
            mensaje.style.color = '#333';

            if (!actual || !nueva || !confirmar) {
                mensaje.textContent = '❌ Por favor, completa todos los campos.';
                mensaje.style.color = '#e74c3c';
                return;
            }

            if (nueva !== confirmar) {
                mensaje.textContent = '❌ Las nuevas contraseñas no coinciden.';
                mensaje.style.color = '#e74c3c';
                return;
            }

            if (nueva.length < 6) {
                mensaje.textContent = '❌ La nueva contraseña debe tener al menos 6 caracteres.';
                mensaje.style.color = '#e74c3c';
                return;
            }

            const datos = new FormData(this);

            // Cambia esto:
// fetch('../../BACKEND/PHP/actualizar_contrasena.php', { ...

// Por esto (Ruta absoluta):
fetch('/Ludokids 3 de noviembre/BACKEND/PHP/actualizar_contrasena.php', {
    method: 'POST',
    body: datos
})
            .then(res => res.json())
            .then(data => {
                if (data.exito) {
                    mensaje.textContent = '✅ ' + data.mensaje;
                    mensaje.style.color = '#27ae60';
                    document.getElementById('formContrasena').reset();
                } else {
                    mensaje.textContent = '❌ ' + data.mensaje;
                    mensaje.style.color = '#e74c3c';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                mensaje.textContent = '❌ Ocurrió un error al procesar la solicitud.';
                mensaje.style.color = '#e74c3c';
            });
        });
    </script>

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
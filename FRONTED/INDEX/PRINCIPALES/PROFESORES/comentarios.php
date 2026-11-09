<?php
session_start();
// Definimos si el usuario actual es admin para usarlo en JavaScript
$esAdmin = (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') ? 'true' : 'false';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoKids - Comentarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../../CSS/Index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <div style="background: yellow; color: black; padding: 10px; text-align: center; font-weight: bold;">
    Rol actual en sesión: <?php echo isset($_SESSION['rol']) ? $_SESSION['rol'] : 'No hay rol definido'; ?>
</div>
    <header class="header-ALL">
        <div class="Encabezado-De-Paginas">
            <div class="elmo-DiferenteH2">
                <img src="../../../ELEMENTOS/mario_header2-removebg-preview.webp" alt="figurita de elmo">
            </div>
            <div class="letrero-Del-H2">
                <img src="../../../ELEMENTOS/letrero-header-2.png" alt="slogan">
            </div>
            <div class="texto-elmo">
                <img src="../../../ELEMENTOS/logo_principal-removebg-preview.webp" alt="texto sobre la pagina">
            </div>
        </div>
        <nav class="menu">
            <a href="/Ludokids 3 de noviembre/FRONTED/INDEX/PRINCIPALES/Inicio.html"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
            <a href="/Ludokids 3 de noviembre/FRONTED/INDEX/PRINCIPALES/Juegos.php"><i class="fa-solid fa-gamepad"></i><span>Juegos</span></a>
            <a href="/Ludokids 3 de noviembre/FRONTED/INDEX/PRINCIPALES/Cuentos.php"><i class="fa-solid fa-book-open"></i><span>Cuentos</span></a>
            <a href="/Ludokids 3 de noviembre/FRONTED/INDEX/PRINCIPALES/Profesores.php" class="activo"><i class="fa-solid fa-chalkboard-user"></i><span>Profesores</span></a>
            <a href="/Ludokids 3 de noviembre/FRONTED/INDEX/PRINCIPALES/Recreo.php"><i class="fa-solid fa-puzzle-piece"></i><span>Recreo</span></a>

            <?php if (isset($_SESSION['id_usuario'])): ?>
                <a href="/Ludokids 3 de noviembre/FRONTED/INDEX/LOGIN/Perfil.php" class="btn-login-nav activo" aria-label="Ver Perfil">
                    <i class="fa-solid fa-user-check"></i>
                </a>
            <?php else: ?>
                <a href="/Ludokids 3 de noviembre/FRONTED/INDEX/LOGIN/InicioDeSesion.php" class="btn-login-nav" aria-label="Iniciar sesión">
                    <i class="fa-solid fa-user"></i>
                </a>
            <?php endif; ?>
        </nav>
    </header>
    <div class="section-transition"></div>

    <main>
        <section class="Contenido-Profesores">
            <h1 class="titulo-comentarios">💬 Comentarios de profesores</h1>
            <div class="Comentarios-Contenedor">
                <p class="Comentarios-Intro">Cuéntanos qué crees que deberíamos cambiar o mejorar en LudoKids.</p>

                <form class="Comentarios-Form" id="formComentarios">
                    <label for="nombre">Tu nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre del profesor" required
                           value="<?php echo isset($_SESSION['nombre']) ? htmlspecialchars($_SESSION['nombre']) : ''; ?>">
                    
                    <label>¿Cómo calificas LudoKids?</label>

                    <div class="calificacion-estrellas" id="calificacionEstrellas">
                        <button type="button" class="estrella" data-valor="1" aria-label="1 estrella">★</button>
                        <button type="button" class="estrella" data-valor="2" aria-label="2 estrellas">★</button>
                        <button type="button" class="estrella" data-valor="3" aria-label="3 estrellas">★</button>
                        <button type="button" class="estrella" data-valor="4" aria-label="4 estrellas">★</button>
                        <button type="button" class="estrella" data-valor="5" aria-label="5 estrellas">★</button>
                    </div>

                    <input type="hidden" id="calificacion" name="calificacion" value="0">
                    <p id="textoCalificacion">Selecciona una calificación</p>

                    <label for="comentario">Tu comentario</label>
                    <textarea id="comentario" name="comentario" rows="5" placeholder="Escribe aquí tu sugerencia..." required></textarea>
                    
                    <button type="submit" class="Comentarios-Btn">
                        <i class="fa-solid fa-paper-plane"></i> Enviar comentario
                    </button>
                    <p id="mensajeConfirmacion" class="mensaje-confirmacion" role="status" aria-live="polite"></p>
                </form>

                <div class="Comentarios-Encabezado">
                    <h3 class="Comentarios-Titulo">Comentarios recibidos</h3>
                    <span class="Comentarios-Contador" id="contadorComentarios">0</span>
                </div>

                <div class="Comentarios-Lista" id="listaComentarios"></div>
            </div>
        </section>
        <div class="contenedor-volver-comentarios">
            <a class="btn-volver" href="../../PRINCIPALES/Profesores.php">
                <i class="fa-solid fa-arrow-left"></i>
                Volver a Profesores
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

    <script>
        // Variable inyectada desde PHP para saber si el usuario conectado es admin
        const esUsuarioAdmin = <?php echo $esAdmin; ?>;

        const form = document.getElementById('formComentarios');
        const lista = document.getElementById('listaComentarios');
        const contador = document.getElementById('contadorComentarios');

        const estrellas = document.querySelectorAll('.estrella');
        const campoCalificacion = document.getElementById('calificacion');
        const textoCalificacion = document.getElementById('textoCalificacion');
        const mensajeConfirmacion = document.getElementById('mensajeConfirmacion');

        const nombresCalificacion = [
            '',
            'Muy mala',
            'Mala',
            'Regular',
            'Buena',
            '¡Excelente!'
        ];

        const palabrasProhibidas = [
            'puta', 'mierda', 'estupido', 'estúpido', 'pendejo', 
            'cabron', 'cabrón', 'marica', 'zorra', 'culo', 'verga', 'idiota'
        ];

        function contienePalabrasProhibidas(texto) {
            const textoLower = texto.toLowerCase();
            return palabrasProhibidas.some(palabra => textoLower.includes(palabra));
        }

        // Selección interactiva de estrellas
        estrellas.forEach((estrella) => {
            estrella.addEventListener('click', () => {
                const valor = Number(estrella.dataset.valor);

                campoCalificacion.value = valor;
                textoCalificacion.textContent = `${valor} de 5 estrellas: ${nombresCalificacion[valor]}`;

                estrellas.forEach((otraEstrella) => {
                    const seleccionada = Number(otraEstrella.dataset.valor) <= valor;

                    otraEstrella.classList.toggle('seleccionada', seleccionada);
                    otraEstrella.setAttribute('aria-pressed', seleccionada ? 'true' : 'false');
                });
            });
        });

        // Función para renderizar una tarjeta de comentario en la interfaz con opción de borrar si es admin
        function agregarComentarioUI(idComentario, nombre, calificacion, comentario) {
            const vacio = lista.querySelector('.Comentarios-Vacio');
            if (vacio) {
                vacio.remove();
            }

            const tarjeta = document.createElement('div');
            tarjeta.className = 'Comentario-Item';
            tarjeta.style.cssText = "background: #f9f9f9; padding: 15px; border-radius: 10px; margin-bottom: 10px; border-left: 5px solid #6c5ce7; position: relative;";

            const cabecera = document.createElement('div');
            cabecera.className = 'Comentario-Cabecera';
            cabecera.style.cssText = "display: flex; justify-content: space-between; align-items: center;";

            const nombreEl = document.createElement('strong');
            nombreEl.textContent = nombre;
            cabecera.append(nombreEl);

            // Si es admin, añadimos el botón de eliminar en la cabecera del comentario
            if (esUsuarioAdmin && idComentario) {
                const btnEliminar = document.createElement('a');
                btnEliminar.href = `/Ludokids 3 de noviembre/BACKEND/PHP/eliminar_comentario.php?id=${idComentario}`;
                btnEliminar.innerHTML = '<i class="fa-solid fa-trash"></i> Eliminar';
                btnEliminar.style.cssText = "background: #e74c3c; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none; font-size: 0.8rem; font-weight: bold;";
                btnEliminar.onclick = () => confirm('¿Estás seguro de eliminar este comentario?');
                cabecera.append(btnEliminar);
            }

            tarjeta.appendChild(cabecera);

            if (calificacion >= 1 && calificacion <= 5) {
                const calificacionEl = document.createElement('p');
                calificacionEl.className = 'Comentario-Calificacion';
                calificacionEl.style.color = '#f1c40f';
                calificacionEl.style.margin = '5px 0';
                calificacionEl.textContent = '★'.repeat(calificacion) + '☆'.repeat(5 - calificacion) + ` (${calificacion}/5)`;
                tarjeta.appendChild(calificacionEl);
            }

            const textoEl = document.createElement('p');
            textoEl.textContent = comentario;
            textoEl.style.margin = '5px 0 0 0';

            tarjeta.appendChild(textoEl);
            lista.appendChild(tarjeta);
        }

        // Cargar comentarios guardados desde la base de datos MySQL de forma sincronizada
        function cargarComentarios() {
            fetch('/Ludokids 3 de noviembre/BACKEND/PHP/obtener_comentarios.php')
                .then(response => response.json())
                .then(comentarios => {
                    if (Array.isArray(comentarios)) {
                        contador.textContent = comentarios.length;
                        lista.replaceChildren();

                        if (comentarios.length > 0) {
                            comentarios.forEach((c) => {
                                agregarComentarioUI(c.id_comentario, c.nombre, Number(c.calificacion), c.comentario);
                            });
                        } else {
                            lista.innerHTML = '<p style="color: #777; text-align: center; padding: 20px;">No hay comentarios todavía. ¡Sé el primero en opinar!</p>';
                        }
                    }
                })
                .catch(err => console.error("Error al cargar comentarios:", err));
        }

        // Manejo del envío del formulario
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            <?php if (!isset($_SESSION['id_usuario'])): ?>
                alert('¡Debes iniciar sesión para poder enviar tu comentario!');
                window.location.href = '/Ludokids 3 de noviembre/FRONTED/INDEX/LOGIN/InicioDeSesion.php';
                return;
            <?php endif; ?>

            mensajeConfirmacion.textContent = '';
            mensajeConfirmacion.classList.remove('visible');

            const nombre = document.getElementById('nombre').value.trim();
            const texto = document.getElementById('comentario').value.trim();
            const calificacion = Number(campoCalificacion.value);

            if (!nombre || !texto) {
                form.reportValidity();
                return;
            }

            if (calificacion < 1 || calificacion > 5) {
                mensajeConfirmacion.textContent = '⭐ Por favor, selecciona una calificación antes de enviar.';
                mensajeConfirmacion.classList.add('visible');
                return;
            }

            if (contienePalabrasProhibidas(nombre) || contienePalabrasProhibidas(texto)) {
                mensajeConfirmacion.textContent = '⚠️ Por favor, mantén un vocabulario respetuoso en tu comentario.';
                mensajeConfirmacion.classList.add('visible');
                return;
            }

            const datosForm = new FormData();
            datosForm.append('nombre', nombre);
            datosForm.append('calificacion', calificacion);
            datosForm.append('comentario', texto);

            fetch('/Ludokids 3 de noviembre/BACKEND/PHP/guardar_comentario.php', {
                method: 'POST',
                body: datosForm
            })
            .then(res => res.json())
            .then(data => {
                if (data.exito) {
                    cargarComentarios(); // Recargamos la lista y contador con datos reales

                    form.reset();
                    campoCalificacion.value = 0;
                    estrellas.forEach((estrella) => {
                        estrella.classList.remove('seleccionada');
                        estrella.setAttribute('aria-pressed', 'false');
                    });
                    textoCalificacion.textContent = 'Selecciona una calificación';
                    mensajeConfirmacion.textContent = '🎉 ¡Gracias por tu sugerencia! Se ha publicado correctamente.';
                    mensajeConfirmacion.classList.add('visible');
                } else {
                    console.error("Error del servidor:", data.mensaje);
                    alert("No se guardó: " + data.mensaje);
                }
            })
            .catch(err => {
                console.error("Error de red o de sintaxis JSON:", err);
            });
        });

        // Cargar comentarios al abrir la página
        cargarComentarios();
    </script>
</body>
</html>
// ===== MATERIAL SUBIDO =====

const inputArchivo = document.getElementById("archivoPDF");
const nombreArchivo = document.getElementById("nombreArchivo");
const enlaceVerArchivo = document.getElementById("verArchivo");
const botonSubir = document.getElementById("subirPDF");
const mensajeArchivo = document.getElementById("mensajeArchivo");

let archivoSeleccionado = null;
let urlArchivoActual = null;

// Seleccionar archivo
inputArchivo.addEventListener("change", () => {
    const archivo = inputArchivo.files[0];

    mensajeArchivo.textContent = "";
    mensajeArchivo.className = "mensaje";

    archivoSeleccionado = null;
    botonSubir.disabled = true;

    if (urlArchivoActual) {
        URL.revokeObjectURL(urlArchivoActual);
        urlArchivoActual = null;
    }

    if (!archivo) {
        nombreArchivo.textContent = "Ningún archivo seleccionado";
        enlaceVerArchivo.removeAttribute("href");
        enlaceVerArchivo.classList.add("deshabilitado");
        enlaceVerArchivo.setAttribute("aria-disabled", "true");
        return;
    }

    const esPDF =
        archivo.type === "application/pdf" ||
        archivo.name.toLowerCase().endsWith(".pdf");

    if (!esPDF) {
        inputArchivo.value = "";
        nombreArchivo.textContent = "Ningún archivo seleccionado";
        enlaceVerArchivo.removeAttribute("href");
        enlaceVerArchivo.classList.add("deshabilitado");
        enlaceVerArchivo.setAttribute("aria-disabled", "true");

        mensajeArchivo.textContent =
            "Por favor, selecciona un archivo PDF.";
        mensajeArchivo.classList.add("error");
        return;
    }

    archivoSeleccionado = archivo;
    urlArchivoActual = URL.createObjectURL(archivo);

    nombreArchivo.textContent = archivo.name;

    enlaceVerArchivo.href = urlArchivoActual;
    enlaceVerArchivo.target = "_blank";
    enlaceVerArchivo.classList.remove("deshabilitado");
    enlaceVerArchivo.setAttribute("aria-disabled", "false");

    botonSubir.disabled = false;

    mensajeArchivo.textContent =
        "Archivo seleccionado correctamente.";
    mensajeArchivo.classList.add("exito");
});


// Guardar el PDF al presionar SUBIR
botonSubir.addEventListener("click", async () => {

    if (!archivoSeleccionado) {
        return;
    }

    try {
        await guardarArchivo(archivoSeleccionado);

        mensajeArchivo.textContent =
            "¡Archivo subido correctamente!";
        mensajeArchivo.className = "mensaje exito";

        inputArchivo.value = "";
        nombreArchivo.textContent = "Ningún archivo seleccionado";

        archivoSeleccionado = null;
        botonSubir.disabled = true;

        enlaceVerArchivo.removeAttribute("href");
        enlaceVerArchivo.classList.add("deshabilitado");
        enlaceVerArchivo.setAttribute("aria-disabled", "true");

        if (urlArchivoActual) {
            URL.revokeObjectURL(urlArchivoActual);
            urlArchivoActual = null;
        }

    } catch (error) {
        console.error(error);

        mensajeArchivo.textContent =
            "No se pudo guardar el archivo. Inténtalo de nuevo.";
        mensajeArchivo.className = "mensaje error";
    }
});

// ===== CAMBIAR CONTRASEÑA =====

// Contraseña temporal para realizar pruebas
// Puedes modificarla cuando quieras.
let contrasenaDemo = "123456";

const formularioContrasena =
    document.getElementById("formContrasena");

const campoActual =
    document.getElementById("contrasenaActual");

const campoNueva =
    document.getElementById("nuevaContrasena");

const campoConfirmar =
    document.getElementById("confirmarContrasena");

const mensajeContrasena =
    document.getElementById("mensajeContrasena");


// Evento del botón actualizar
formularioContrasena.addEventListener("submit", (evento) => {

    evento.preventDefault();

    mensajeContrasena.textContent = "";
    mensajeContrasena.className = "mensaje";

    // Validar campos vacíos
    if (
        !campoActual.value ||
        !campoNueva.value ||
        !campoConfirmar.value
    ) {
        mostrarMensajeContrasena(
            "Completa todos los campos.",
            "error"
        );
        return;
    }

    // Validar contraseña actual
    if (campoActual.value !== contrasenaDemo) {
        mostrarMensajeContrasena(
            "La contraseña actual no es correcta.",
            "error"
        );
        return;
    }

    // Validar longitud
    if (campoNueva.value.length < 6) {
        mostrarMensajeContrasena(
            "La nueva contraseña debe tener al menos 6 caracteres.",
            "error"
        );
        return;
    }

    // Validar confirmación
    if (campoNueva.value !== campoConfirmar.value) {
        mostrarMensajeContrasena(
            "Las nuevas contraseñas no coinciden.",
            "error"
        );
        return;
    }

    // Evitar que sea igual a la anterior
    if (campoActual.value === campoNueva.value) {
        mostrarMensajeContrasena(
            "La nueva contraseña debe ser diferente a la actual.",
            "error"
        );
        return;
    }

    // Actualizar contraseña temporal
    contrasenaDemo = campoNueva.value;

    formularioContrasena.reset();

    mostrarMensajeContrasena(
        "¡Contraseña actualizada correctamente!.",
        "exito"
    );

});

// ===== FUNCIÓN PARA MOSTRAR MENSAJES =====
function mostrarMensajeContrasena(texto, tipo) {

    mensajeContrasena.textContent = texto;
    mensajeContrasena.className = `mensaje ${tipo}`;
}

function cerrarSesion() {
        document.getElementById('cerrarSesion').addEventListener('click', (event) => {
            event.preventDefault(); // Prevenir la acción predeterminada del enlace
            // Eliminar la cookie de token
            document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            // Redirigir al usuario a la página de inicio
            window.location.href = "/";
        });
    }

    cerrarSesion(); // Llama a la función para cerrar sesión
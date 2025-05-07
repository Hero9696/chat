let timeout;

function cerrarSesionPorInactividad() {
    const confirmBox = document.createElement('div');
    confirmBox.innerHTML = `
        <div class="position-fixed top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-dark bg-opacity-50" style="z-index: 9999;">
            <div class="bg-white p-4 rounded shadow text-center">
                <p class="mb-3">¿Quieres seguir en el chat?</p>
                <button id="continuarBtn" class="btn btn-success me-2">Sí</button>
                <button id="salirBtn" class="btn btn-danger">No</button>
            </div>
        </div>
    `;
    document.body.appendChild(confirmBox);

    document.getElementById('continuarBtn').onclick = () => {
        document.body.removeChild(confirmBox);
        reiniciarTemporizador(); // reinicia el temporizador
    };

    document.getElementById('salirBtn').onclick = () => {
        document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        window.location.href = "/";
    };
}

function reiniciarTemporizador() {
    clearTimeout(timeout);
    timeout = setTimeout(cerrarSesionPorInactividad, 1 * 60 * 1000); // 10 minutos
}

// Eventos que reinician el temporizador
['click', 'keypress', 'scroll', 'touchstart'].forEach(evt => {
    document.addEventListener(evt, reiniciarTemporizador, true);
});

reiniciarTemporizador(); // Inicializa




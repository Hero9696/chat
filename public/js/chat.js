function cargarMensajes() {
    fetch('/read')
        .then(res => res.json())
        .then(data => {
            const chatBox = document.getElementById('chat-box');
            chatBox.innerHTML = "";
            data.forEach(m => {
                chatBox.innerHTML += `<b>${m.usuario}</b>: ${m.mensaje}<br>`;
            });
            chatBox.scrollTop = chatBox.scrollHeight;
        });
}

function enviarMensaje() {
    const mensaje = document.getElementById('mensaje').value;
    if (!mensaje.trim()) return;
    fetch('/send', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'mensaje=' + encodeURIComponent(mensaje)
    }).then(() => {
        document.getElementById('mensaje').value = "";
        cargarMensajes();
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('mensaje');

    input.addEventListener('keydown', function (event) {
        if (event.key === 'Enter' && input.value.trim() !== '') {
            event.preventDefault(); // Evita que el formulario se envíe si está dentro de un <form>
            enviarMensaje();
            input.value = ''; // Limpia el campo
        }
    });
});


setInterval(cargarMensajes, 2000);
window.onload = cargarMensajes;

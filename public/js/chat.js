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

setInterval(cargarMensajes, 2000);
window.onload = cargarMensajes;

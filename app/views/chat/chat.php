<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light vh-100 d-flex align-items-center justify-content-center">

    <div class="card shadow p-4 w-100" style="max-width: 600px;">
        <h4 class="mb-3">Bienvenido, <span class="text-primary"><?php echo $_SESSION['username']; ?></span></h4>

        <div id="chat-box" class="border rounded p-3 mb-3 bg-white" style="height: 300px; overflow-y: auto;">
            <!-- Aquí se mostrarán los mensajes -->
        </div>

        <div class="input-group">
            <input type="text" id="mensaje" class="form-control" placeholder="Escribe un mensaje...">
            <button onclick="enviarMensaje()" class="btn btn-primary">Enviar</button>
        </div>
    </div>

    <script src="/js/chat.js"></script>
    <script src="/js/inactividad.js"></script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-5">
    <h3>Bienvenido, <?php echo $_SESSION['username']; ?></h3>
    <div id="chat-box" class="border p-3 mb-3" style="height:300px; overflow-y:scroll;"></div>
    <div class="input-group">
        <input type="text" id="mensaje" class="form-control" placeholder="Escribe un mensaje...">
        <button onclick="enviarMensaje()" class="btn btn-primary">Enviar</button>
    </div>
    <script src="/js/chat.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <h2>Registro de Usuario</h2>
    <form action="/register" method="POST">
        <div class="mb-3">
            <label>Usuario:</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Contraseña:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-success">Registrarse</button>
        <a href="/" class="btn btn-secondary">Volver al login</a>
    </form>
</body>
</html>

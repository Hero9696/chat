<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-5">
    <h2>Iniciar Sesión</h2>
    <form action="/login" method="POST">
        <input name="username" class="form-control mb-2" placeholder="Usuario" required>
        <input name="password" type="password" class="form-control mb-2" placeholder="Contraseña" required>
        <button class="btn btn-primary">Ingresar</button>
    </form>
    <hr>
    <h4>Registrarse</h4>
    <form action="/register" method="POST">
        <input name="username" class="form-control mb-2" placeholder="Usuario" required>
        <input name="password" type="password" class="form-control mb-2" placeholder="Contraseña" required>
        <button class="btn btn-secondary">Registrar</button>
    </form>
</body>
</html>

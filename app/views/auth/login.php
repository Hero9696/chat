<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card shadow p-4" style="width: 350px;">
    <h4 class="text-center mb-4">Iniciar Sesión</h4>
    <form action="/login" method="POST">
        <div class="mb-3">
            <input name="username" class="form-control" placeholder="Usuario" required>
        </div>
        <div class="mb-3">
            <input name="password" type="password" class="form-control" placeholder="Contraseña" required>
        </div>
        <button class="btn btn-primary w-100">Ingresar</button>
    </form>
    <a href="/registrer" class="btn btn-outline-secondary w-100 mt-3">Registrarse</a>
</div>

</body>
</html>

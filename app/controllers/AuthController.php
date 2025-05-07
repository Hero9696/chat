<?php
require_once __DIR__ . '/../models/Usuario.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController {

    // Método para mostrar la página de login
    public function login() {
        $content = $this->render('auth/login.php');  // Renderiza la vista del login
        $title = 'Login';  // Establece el título de la página
        require_once __DIR__ . '/../layout/layout.php';  // Incluye el layout con el contenido
    }

    // Método para manejar el login
    public function handleLogin() {
        $user = new Usuario();
        if ($user->verificar($_POST['username'], $_POST['password'])) {
            $key = "clave_secreta_segura";
            $payload = [
                "username" => $_POST['username'],
                "exp" => time() + 60 // 1 minutos
            ];
    
            $jwt = JWT::encode($payload, $key, 'HS256');
            setcookie("token", $jwt, time() + 60, "/"); // cookie válida por 1 min
    
            header("Location: /chat");
        } else {
            echo "<script>alert('Usuario o contraseña incorrectos'); window.location.href='/'</script>";
        }
    }
    // Método para registrar un usuario
    public function register() {
        $user = new Usuario();
        $user->registrar($_POST['username'], $_POST['password']);
        header("Location: /");  // Redirige al login después de registrar al usuario
    }

    // Método para mostrar la página de registro
    public function registrer() {
        $content = $this->render('auth/registrer.php');  // Renderiza la vista del registro
        $title = 'Registro';  // Establece el título de la página
        require_once __DIR__ . '/../layout/layout.php';  // Incluye el layout con el contenido
    }

    // Método para renderizar la vista
    private function render($view) {
        ob_start();  // Inicia la captura de salida
        require_once __DIR__ . '/../views/' . $view;  // Incluye la vista especificada
        return ob_get_clean();  // Devuelve el contenido generado
    }
}

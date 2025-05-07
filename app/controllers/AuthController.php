<?php
require_once __DIR__ . '/../models/Usuario.php';

class AuthController {
    public function login() {
        require __DIR__ . '/../views/auth/login.php';
    }

    public function handleLogin() {
        $user = new Usuario();
        if ($user->verificar($_POST['username'], $_POST['password'])) {
            $_SESSION['username'] = $_POST['username'];
            header("Location: /chat");
        } else {
            echo "Login incorrecto";
        }
    }

    public function register() {
        $user = new Usuario();
        $user->registrar($_POST['username'], $_POST['password']);
        header("Location: /");
    }
}

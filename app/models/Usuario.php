<?php
require_once __DIR__ .'/../../config/database.php';

class Usuario {
    public function registrar($usuario, $clave) {
        global $conn;
        $claveHash = password_hash($clave, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO usuarios (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $usuario, $claveHash);
        $stmt->execute();
    }

    public function verificar($usuario, $clave) {
        global $conn;
        $stmt = $conn->prepare("SELECT password FROM usuarios WHERE username = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($hash);
        if ($stmt->fetch() && password_verify($clave, $hash)) {
            return true;
        }
        return false;
    }
}

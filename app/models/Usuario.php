<?php
require_once __DIR__ .'/../../config/database.php';

class Usuario {
    public function registrar($usuario, $clave) {
        global $conn;
    
        // Validar fortaleza de la contraseña
        if (
            strlen($clave) < 8 ||
            !preg_match('/[a-z]/', $clave) ||
            !preg_match('/[A-Z]/', $clave) ||
            !preg_match('/[0-9]/', $clave) ||
            !preg_match('/[\W]/', $clave) // Caracter especial
        ) {
            echo "<script>alert('La contraseña debe tener al menos 8 caracteres, incluir una mayúscula, una minúscula, un número y un símbolo.'); window.location.href = '/registrer';</script>";
            exit;
        }
    
        // Encriptar y guardar
        $claveHash = password_hash($clave, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO usuarios (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $usuario, $claveHash);
    
        if ($stmt->execute()) {
            echo "<script>alert('Usuario registrado exitosamente.'); window.location.href = '/';</script>";
        } else {
            echo "<script>alert('Error al registrar el usuario. Puede que ya exista.'); window.location.href = '/registrer';</script>";
        }
    }
    

    public function verificar($usuario, $clave) {
        global $conn;
        $stmt = $conn->prepare("SELECT password FROM usuarios WHERE username = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($hash);
        if ($stmt->fetch() && password_verify($clave, $hash)) {
            return true;
        } else {
            echo "<script>alert('Usuario o contraseña incorrectos'); window.location.href = '/';</script>";
        }
        return false;
    }
}

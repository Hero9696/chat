<?php
require_once __DIR__ .'/../models/Mensaje.php';

class ChatController {
    public function index() {
       
        if (!isset($_SESSION['username'])) {
            header("Location: /");
            exit();
        }

        require __DIR__ . '/../views/chat/chat.php';
    }

    public function send() {
        session_start();
        if (!isset($_SESSION['username']) || empty($_POST['mensaje'])) {
            http_response_code(403);
            echo "No autorizado o mensaje vacío.";
            return;
        }

        $mensaje = new Mensaje();
        $mensaje->guardar($_SESSION['username'], $_POST['mensaje']);
    }

    public function read() {
        $mensaje = new Mensaje();
        $mensajes = $mensaje->obtenerTodos();

        header('Content-Type: application/json');
        echo json_encode($mensajes);
    }
}

<?php
require_once __DIR__ . '/../models/Mensaje.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ChatController {

    // Método para mostrar la página principal del chat
    public function index() {
       
    if (!isset($_COOKIE['token'])) {
        header("Location: /");
        exit();
    }

    require_once __DIR__ . '/../../vendor/autoload.php';
   

    try {
        $decoded = JWT::decode($_COOKIE['token'], new Key('clave_secreta_segura', 'HS256'));
        // Token válido, muestra la vista
        ob_start();
        require __DIR__ . '/../views/chat/chat.php';
        $content = ob_get_clean();
        $title = "Chat";
        require_once __DIR__ . '/../layout/layout.php';
    } catch (Exception $e) {
        // Token expirado o inválido
        echo "<script>
                alert('Su sesión ha expirado. Será redirigido al login.');
                window.location.href = '/';
              </script>";
        exit();
    }
        
        // Renderiza la vista del chat
       // $content = $this->render('chat/chat.php');
       // $title = 'Chat';  // Establece el título de la página
       // require_once __DIR__ . '/../layout/layout.php';  // Incluye el layout con el contenido
    }

    // Método para enviar un mensaje
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

    // Método para leer los mensajes
    public function read() {
        $mensaje = new Mensaje();
        $mensajes = $mensaje->obtenerTodos();

        header('Content-Type: application/json');
        echo json_encode($mensajes);
    }

    // Método para renderizar las vistas
    private function render($view) {
        ob_start();  // Inicia la captura de salida
        require_once __DIR__ . '/../views/' . $view;  // Incluye la vista especificada
        return ob_get_clean();  // Devuelve el contenido generado
    }
}

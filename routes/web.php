<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
    case '/':
        require_once __DIR__ . '/../app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->login();
        break;
    case '/login':
        require_once __DIR__ . '/../app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->handleLogin();
        break;
    case '/register':
        require_once __DIR__ . '/../app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->register();
        break;
        case '/registrer':
            require_once __DIR__ . '/../app/controllers/AuthController.php';
            $controller = new AuthController();
            $controller->registrer();
            break;
    case '/chat':
        require_once __DIR__ . '/../app/controllers/ChatController.php';
        $controller = new ChatController();
        $controller->index();
        break;
    case '/send':
        require_once __DIR__ . '/../app/controllers/ChatController.php';
        $controller = new ChatController();
        $controller->send();
        break;
    case '/read':
        require_once __DIR__ . '/../app/controllers/ChatController.php';
        $controller = new ChatController();
        $controller->read();
        break;
    default:
        http_response_code(404);
        echo "Página no encontrada";
        break;
}

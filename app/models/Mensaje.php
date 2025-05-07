<?php
class Mensaje {
    public function guardar($usuario, $mensaje) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO mensajes (usuario, mensaje) VALUES (?, ?)");
        $stmt->bind_param("ss", $usuario, $mensaje);
        $stmt->execute();
    }

    public function obtenerTodos() {
        global $conn;
        $result = $conn->query("SELECT usuario, mensaje, fecha FROM mensajes ORDER BY id DESC LIMIT 20");
        $mensajes = [];
        while ($row = $result->fetch_assoc()) {
            $mensajes[] = $row;
        }
        return array_reverse($mensajes);
    }
}

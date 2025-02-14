<?php
class Tarea {
    private $mysqli;

    public function __construct($conexion) {
        $this->mysqli = $conexion; // Asignar la conexión mysqli
    }

    // Función para agregar tarea
    public function agregarTask($usuarioId, $nombre, $descripcion) {
        $stmt = $this->mysqli->prepare("INSERT INTO tarea (nombre, descripcion, estado, usuario_id) VALUES (?, ?, 'pendiente', ?)");
        $stmt->bind_param('ssi', $nombre, $descripcion, $usuarioId);
        if (!$stmt->execute()) {
            throw new Exception("Error al agregar la tarea: " . $stmt->error);
        }
    }

    // Función para obtener tareas por usuario
    public function getTareaByUser ($usuarioId) {
        $stmt = $this->mysqli->prepare("SELECT * FROM tarea WHERE usuario_id = ?");
        $stmt->bind_param('i', $usuarioId);
        $stmt->execute();
        $result = $stmt->get_result(); // Obtener el resultado

        $tareas = [];
        while ($row = $result->fetch_assoc()) { // Usar fetch_assoc para obtener cada fila
            $tareas[] = $row;
        }
        return $tareas; // Devolver todas las tareas
    }

    // Función para marcar tarea como completada
    public function Tareacompletada($tareaId) {
        $stmt = $this->mysqli->prepare("UPDATE tarea SET estado = 'completada' WHERE id = ?");
        $stmt->bind_param('i', $tareaId);
        if (!$stmt->execute()) {
            throw new Exception("Error al completar la tarea: " . $stmt->error);
        }
    }

    // Función para eliminar tarea
    public function eliminarTarea($tareaId) {
        $stmt = $this->mysqli->prepare("DELETE FROM tarea WHERE id = ?");
        $stmt->bind_param('i', $tareaId);
        if (!$stmt->execute()) {
            throw new Exception("Error al eliminar la tarea: " . $stmt->error);
        }
    }
}
?>
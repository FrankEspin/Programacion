<?php
class Tarea {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function agregarTask($usuarioId, $tarea) {
        $stmt = $this->pdo->prepare("INSERT INTO tareas (usuario_id, tarea) VALUES (?, ?)");
        $stmt->execute([$usuarioId, $tarea]);
    }

    public function getTareaByUser($usuarioId) {
        $stmt = $this->pdo->prepare("SELECT * FROM tareas WHERE usuario_id = ?");
        $stmt->execute([$usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Tareacompletada($tareaId) {
        $stmt = $this->pdo->prepare("UPDATE tareas SET completed = 'completa' WHERE id = ?");
        $stmt->execute([$tareaId]);
    }

    public function eliminarTarea($tareaId) {
        $stmt = $this->pdo->prepare("DELETE FROM tareas WHERE id = ?");
        $stmt->execute([$tareaId]);
    }
}
?>

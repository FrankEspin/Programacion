<?php
class Usuario {
    private $mysqli;

    public function __construct($conexion) {
        $this->mysqli = $conexion; // Asignar la conexión mysqli
    }

    public function isEmailTaken($email) {
        $stmt = $this->mysqli->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0; // Verificar si hay filas
    }

    public function register($nombre, $apellido, $email, $password) {
        $stmt = $this->mysqli->prepare("INSERT INTO usuarios (nombre, apellido, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $nombre, $apellido, $email, $password);
        
        if (!$stmt->execute()) {
            throw new Exception("Error durante el registro: " . $stmt->error);
        }
    }

    public function login($email, $password) {
        $stmt = $this->mysqli->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Verificar si el usuario existe y la contraseña es correcta
        if ($user && $user['password'] === $password) {
            $_SESSION['usuario_id'] = $user['id']; // Guardar el ID del usuario en la sesión
            return true;
        } else {
            return false;  // Credenciales incorrectas
        }
    }
}
?>
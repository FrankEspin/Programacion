<?php
require_once 'C:\xampp\htdocs\programacion\Programacion_H1_2T_FrankEspin/configuracion/conexion.php';

class Socio {
    private $conexion;

    // Constructor que recibe la conexión
    public function __construct() {
        // Instanciar la conexión a la base de datos
        $this->conexion = new Conexion();
    }

    // Método para agregar un nuevo socio
    public function agregarSocio($nombre, $apellido, $email, $tipo_plan, $paquete_adicional, $duracion_suscripcion) {
        $query = "INSERT INTO socios (nombre, apellido, email, tipo_de_plan, paquetes_adicionales, duracion_de_suscripcion) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssssss", $nombre, $apellido, $email, $tipo_plan, $paquete_adicional, $duracion_suscripcion);

        if ($stmt->execute()) {
            echo "Socio agregado con éxito.";
        } else {
            echo "Error al agregar socio: " . $stmt->error;
        }

        $stmt->close();
    }

    // Método para obtener todos los socios
    public function obtenerSocios() {
        $query = "SELECT * FROM socios";
        $resultado = $this->conexion->conexion->query($query);
        $socios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $socios[] = $fila;
        }
        return $socios;
    }

    // Método para obtener un socio por su ID
    public function obtenerSocioPorId($id_socio) {
        $query = "SELECT * FROM socios WHERE id_socio = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_socio);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    // Método para actualizar un socio
    public function actualizarSocio($id_socio, $nombre, $apellido, $email, $tipo_de_plan, $paquete_adicional, $duracion_suscripcion) {
        $query = "UPDATE socios SET nombre = ?, apellido = ?, email = ?, tipo_de_plan = ?, paquetes_adicionales = ?, duracion_de_suscripcion = ? WHERE id_socio = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param('ssssssi', $nombre, $apellido, $email, $tipo_de_plan, $paquete_adicional, $duracion_suscripcion, $id_socio);
    
        if ($stmt->execute()) {
            return true; // Si la actualización es exitosa
        } else {
            return false; // Si hay un error
        }
    
        $stmt->close();
    }

    // Método para eliminar un socio por ID
    public function eliminarSocio($id_socio, $nombre, $apellido) {
        $query = "DELETE FROM socios WHERE id_socio = ? AND nombre = ? AND apellido = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sss", $id_socio, $nombre, $apellido);

        if ($stmt->execute()) {
            echo "Socio eliminado con éxito.";
        } else {
            echo "Error al eliminar socio: " . $stmt->error;
        }

        $stmt->close();
    }

    // Método para eliminar un socio por correo
    public function eliminarSocioPorCorreo($correo) {
        // Verificar que el correo no esté vacío
        if (empty($correo)) {
            echo "El correo no puede estar vacío.";
            return false;
        }

        // Consulta SQL para eliminar al socio por correo
        $query = "DELETE FROM socios WHERE correo = ?";
        $stmt = $this->conexion->conexion->prepare($query);

        // Verificar si la consulta fue preparada correctamente
        if ($stmt === false) {
            die('Error en la preparación de la consulta: ' . $this->conexion->conexion->error);
        }

        // Vincular el parámetro
        $stmt->bind_param("s", $correo);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return true; // Socio eliminado con éxito
        } else {
            return false; // Error al eliminar
        }

        $stmt->close();
    }
}
?>

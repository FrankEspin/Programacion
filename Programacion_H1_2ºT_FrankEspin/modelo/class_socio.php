<?php
require_once 'C:/xampp/htdocs/programacion/Programacion_H1_2ºT_FrankEspin/configuracion/conexion.php';

class Socio {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function agregarSocio($nombre, $apellido, $email, $tipo_plan, $paquete_adicional, $duracion_suscripcion) {
        $query = "INSERT INTO socios (nombre, apellido, email, tipo_plan, paquete_adicional, duracion_suscripcion) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssss", $nombre, $apellido, $email, $tipo_plan, $paquete_adicional, $duracion_suscripcion);

        if ($stmt->execute()) {
            echo "Socio agregado con éxito.";
        } else {
            echo "Error al agregar socio: " . $stmt->error;
        }

        $stmt->close();
    }

    public function obtenerSocios() {
        $query = "SELECT * FROM socios";
        $resultado = $this->conexion->conexion->query($query);
        $socios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $socios[] = $fila;
        }
        return $socios;
    }

    public function obtenerSocioPorId($id_socio) {
        $query = "SELECT * FROM socios WHERE id_socio = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_socio);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }
    public function actualizarSocio($id_socio, $nombre, $apellido, $email, $tipo_de_plan, $paquete_adicional, $duracion_suscripcion) {
        $query = "UPDATE socios SET nombre = ?, apellido = ?, email = ?, tipo_de_plan = ?, paquetes_adicionales = ?, duracion_de_suscripcion = ? WHERE id_socio = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param('ssssssi', $nombre, $apellido, $email, $tipo_de_plan, $paquete_adicional, $duracion_suscripcion, $id_socio);
    
        if ($stmt->execute()) {
            // Si la actualización es exitosa, retornamos true
            return true;
        } else {
            // Si hay un error, retornamos false
            return false;
        }
    
        $stmt->close();
    }

    public function eliminarSocio($id_socio) {
        $query = "DELETE FROM socios WHERE id_socio = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_socio);

        if ($stmt->execute()) {
            echo "Socio eliminado con éxito.";
        } else {
            echo "Error al eliminar socio: " . $stmt->error;
        }

        $stmt->close();
    }

    public function editarSocio($id_socio, $nombre, $apellido, $email, $tipo_plan, $paquete_adicional, $duracion_suscripcion) {
                $query = "UPDATE socios SET 
                nombre = : ?, apellido = : ?, email = : ?, tipo_de_plan = : ?, paquetes_adicionales = : ?, duracion_de_suscripcion = : ?
                WHERE id_socio = : ?";
                $stmt = $this->conexion->conexion->prepare($query);
                $stmt->bind_param("ssssssi", $nombre, $apellido, $email, $tipo_plan, $paquete_adicional, $duracion_suscripcion, $id_socio);
        if ($stmt->execute()){
            echo "El socio ha sido actualizado";
        } else {
            echo "Error al actualizar el socio. Intentalo de nuevo";
        }
}

public function guardarEdicionSocio($id_socio, $nombre, $apellido, $email, $tipo_de_plan, $paquetes_adicionales, $duracion_de_suscripcion) {
    return $this->actualizarSocio($id_socio, $nombre, $apellido, $email, $tipo_de_plan, $paquetes_adicionales, $duracion_de_suscripcion);
}
public function guardarAlta($nombre, $apellido, $email, $tipo_de_plan, $paquetes_adicionales, $duracion_de_suscripcion) {
   // Verificamos si la duracion es correcta (mensual o anual)
    if ($duracion_de_suscripcion != 'mensual' && $duracion_de_suscripcion != 'anual') {
        $duracion_de_suscripcion = 'mensual';  // Asignar un valor por defecto si es inválido
    }
   
    // Consulta SQL para insertar un nuevo socio
    $query = "INSERT INTO socios (nombre, apellido, email, tipo_de_plan, paquetes_adicionales, duracion_de_suscripcion) 
              VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->conexion->conexion->prepare($query);
    // Verificar si la consulta esta correctamente
    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . $this->conexion->conexion->error);
    }

    // Vincular los parámetros a la consulta preparada
    $stmt->bind_param("sssssi", $nombre, $apellido, $email, $tipo_de_plan, $paquetes_adicionales, $duracion_de_suscripcion);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "El socio ha sido registrado con éxito.";
    } else {
        echo "Error al registrar al socio. Intenta de nuevo. Error: " . $stmt->error;
    }

    // Cerrar la sentencia
    $stmt->close();
}
}
?>
<?php
require_once '../modelo/class_socio.php';

class controlador_socios {
    private $modelo;

    public function __construct() {
        $this->modelo = new Socio(); // Instanciamos el modelo
    }

    // Método para agregar un nuevo socio
    public function agregarSocio($nombre, $apellido, $email, $tipo_plan, $paquete_adicional, $duracion_suscripcion) {
        $exito = $this->modelo->agregarSocio($nombre, $apellido, $email, $tipo_plan, $paquete_adicional, $duracion_suscripcion);
        return $exito ? "Socio agregado con éxito." : "Error al agregar socio.";
    }

    // Método para listar todos los socios
    public function listarSocios() {
        return $this->modelo->obtenerSocios();
    }

    // Método para obtener un socio por ID
    public function obtenerSocioPorId($id_socio) {
        return $this->modelo->obtenerSocioPorId($id_socio);
    }

    // Método para actualizar la información de un socio
    public function actualizarSocio($id_socio, $nombre, $apellido, $email, $tipo_plan, $paquete_adicional, $duracion_suscripcion) {
        $exito = $this->modelo->actualizarSocio($id_socio, $nombre, $apellido, $email, $tipo_plan, $paquete_adicional, $duracion_suscripcion);
        return $exito ? "Socio actualizado con éxito." : "Error al actualizar socio.";
    }

    // Método para eliminar un socio por ID
    public function eliminarSocio($id_socio, $nombre, $apellido) {
        $exito = $this->modelo->eliminarSocio($id_socio, $nombre, $apellido);
        return $exito ? "Socio eliminado con éxito." : "Error al eliminar socio.";
    }

    // Método para eliminar un socio por correo electrónico
    public function eliminarSocioPorCorreo($correo) {
        $exito = $this->modelo->eliminarSocioPorCorreo($correo);
        return $exito ? "Socio eliminado con éxito." : "No se pudo eliminar el socio con correo: $correo.";
    }

    // Método para guardar la edición de un socio
    public function guardarEdicionSocio($id_socio, $nombre, $apellido, $email, $tipo_de_plan, $paquetes_adicionales, $duracion_de_suscripcion) {
        return $this->modelo->actualizarSocio($id_socio, $nombre, $apellido, $email, $tipo_de_plan, $paquetes_adicionales, $duracion_de_suscripcion);
    }

    // Método para guardar un nuevo socio (alta)
    public function guardarNuevoSocio($nombre, $apellido, $email, $tipo_de_plan, $paquetes_adicionales, $duracion_de_suscripcion) {
        return $this->modelo->agregarSocio($nombre, $apellido, $email, $tipo_de_plan, $paquetes_adicionales, $duracion_de_suscripcion);
    }
}
?>

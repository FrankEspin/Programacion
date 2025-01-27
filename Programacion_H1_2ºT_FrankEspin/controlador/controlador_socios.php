<?php
require_once '../modelo/class_socio.php';

class controlador_socios{
    private $modelo;

    public function __construct() {
        $this->modelo = new Socio();
    }

    public function agregarSocio($nombre, $apellido, $email, $tipo_plan, $paquete_adicional, $duracion_suscripcion) {
        $this->modelo->agregarSocio($nombre, $apellido, $email, $tipo_plan, $paquete_adicional, $duracion_suscripcion);
    }

    public function listarSocios() {
        return $this->modelo->obtenerSocios();
    }
    public function obtenerSocioPorId($id_socio) {
        return $this->modelo->obtenerSocioPorId($id_socio);
    }

    public function actualizarSocio($id_socio, $nombre, $apellido, $email, $tipo_plan, $paquete_adicional, $duracion_suscripcion) {
        $this->modelo->actualizarSocio($id_socio, $nombre, $apellido, $email, $tipo_plan, $paquete_adicional, $duracion_suscripcion);
    }

    public function eliminarSocio($id_socio) {
        $this->modelo->eliminarSocio($id_socio);
    }

    public function guardarEdicionSocio($id_socio ,$nombre, $apellido, $email, $tipo_de_plan, $paquetes_adicionales, $duracion_de_suscripcion) {
        return $this->modelo->guardarEdicionSocio($id_socio, $nombre, $apellido, $email, $tipo_de_plan, $paquetes_adicionales, $duracion_de_suscripcion);
    }

}
?>
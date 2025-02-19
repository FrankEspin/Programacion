<?php
require_once '../modelo/class_receta.php';

class RecetasController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Receta();
    }

    public function agregarReceta($nombre, $descripcion, $categoria, $tiempo_preparacion) {
        $this->modelo->agregarReceta($nombre, $descripcion, $categoria, $tiempo_preparacion);
    }

    public function listarRecetas() {
        return $this->modelo->listarRecetas();
    }
    public function obtenerReceta($id_recetas) {
        return $this->modelo->obtenerReceta($id_recetas);
    }

    public function editarReceta($id_recetas) {
        $this->modelo->editarReceta($id_recetas);
    }

    public function eliminarReceta($id_socio) {
        $this->modelo->eliminarReceta($id_socio);
    }
}
?>
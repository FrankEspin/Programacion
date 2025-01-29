<?php

class modelo_socios {

    // Método para guardar un nuevo socio
    public function guardarAlta($nombre, $apellido, $email, $tipo_de_plan, $paquetes_adicionales, $duracion_de_suscripcion) {
        // Configuración de la conexión a la base de datos
        $servername = "localhost"; // Cambia si es necesario
        $username = "root"; // Usuario de la base de datos
        $password = "curso"; // Contraseña de la base de datos
        $dbname = "sttreaming"; // Nombre de tu base de datos

        // Crear la conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Escapar los datos para evitar inyecciones SQL
        $nombre = $conn->real_escape_string($nombre);
        $apellido = $conn->real_escape_string($apellido);
        $email = $conn->real_escape_string($email);
        $tipo_de_plan = $conn->real_escape_string($tipo_de_plan);
        $paquetes_adicionales = $conn->real_escape_string($paquetes_adicionales);
        $duracion_de_suscripcion = $conn->real_escape_string($duracion_de_suscripcion);

        // Insertar el nuevo socio en la base de datos
        $sql = "INSERT INTO socios (nombre, apellido, email, tipo_de_plan, paquetes_adicionales, duracion_de_suscripcion) 
                VALUES ('$nombre', '$apellido', '$email', '$tipo_de_plan', '$paquetes_adicionales', '$duracion_de_suscripcion')";

        if ($conn->query($sql) === TRUE) {
            // Si la inserción fue exitosa, retornar true
            return true;
        } else {
            // Si ocurrió un error, retornar false
            return false;
        }

        // Cerrar la conexión
        $conn->close();
    }
}

?>

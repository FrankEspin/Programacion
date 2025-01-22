<?php
//EJERCICIO 1
echo "\n" . "EJERCICIO 1" . "\n";

class CuentaBancaria{
    public $titular;
    public $saldo;
    public $tipoDeCuenta;

    public function __construct($titular_ext, $saldo_ext,$tipoDeCuenta_ext){
        $this->titular=$titular_ext;
        $this->saldo=$saldo_ext;
        $this->tipoDeCuenta=$tipoDeCuenta_ext;
    }
// DEPOSITAR DINERO
    public function depositar($cantidad){
        if ($cantidad > 0 ){
            $this->saldo += $cantidad;
            echo "Se ha depositado $cantidad. El saldo actual es de: $this->saldo\n";
        } else{
            echo "La cantidad a depositar debe ser mayor que 0.\n";
        }
    } 

// RETIRAR DINERO
    public function retirar($cantidad){
        if ($cantidad>0){
                if ($cantidad<= $this->saldo){
                    $this->saldo -=$cantidad;
                    echo"Se  ha retirado $cantidad. El saldo actual es de $this->saldo\n";
                } else{
                    echo "No hay suficiente saldo para retirar essa cantidad de dinero \n";
                } 
                    }else{ 
                    echo "La cantidad a retirar debe ser mayor de 0. Intentalo de nuevo";
                }
        }
// MOSTRAR INFORMACION DE LA CUENTA
public function mostrarInfo(){
    echo "Titular: $this->titular\n";
    echo "Tipo de Cuenta: $this->tipoDeCuenta\n";
    echo "Saldo actual: $this->saldo\n";
}
}

//INSTANCIA CUENTA BANCARIA
$cuenta1 = new CuentaBancaria("Alejandro Esteban", 500,"Ahorros" );
$cuenta1->depositar(200);
$cuenta1->retirar(100);
$cuenta1->mostrarInfo();

// EJERCICIO 2
echo "\n" . "EJERCICIO 2" . "\n";

class Tarea {
    public $nombre;
    public $descripcion;
    public $fechaLimite;
    public $estado;

    public function __construct($nombre_ext, $descripcion_ext, $fechaLimite_ext, $estado_ext="pendiente") {
        $this->nombre = $nombre_ext;
        $this->descripcion = $descripcion_ext;
        $this->fechaLimite = $fechaLimite_ext;
        $this->estado = $estado_ext;
    }

    public function marcarComoCompleta() {
        $this->estado = "completa" . "\n";
    }

    public function editarDescripcion($nuevaDescripcion) {
        $this->descripcion = $nuevaDescripcion;
        echo "La descripcion de la tarea ha cambiado. Ahora es: $nuevaDescripcion " . "\n";
    }

    public function mostrarTarea() {
        echo "El nombre de la tarea es: $this->nombre " . "\n";
        echo "La descripcion de la tarea es: $this->descripcion " . "\n";
        echo "La fecha limite de la tarea es: $this->fechaLimite " . "\n";
        echo "El estado de la tarea es: $this->estado " . "\n";
    }
}

// Array de tareas
$tareas = [
    new Tarea("Hacer la compra", "Comprar alimentos y productos de limpieza", "2025-01-22"),
    new Tarea("Terminar proyecto", "Finalizar el proyecto de desarrollo web", "2025-01-25"),
    new Tarea("Llamar al cliente", "Realizar una llamada para confirmar la reunión", "2025-01-21"),
];

// Mostrar las tareas antes de marcar como completadas
echo "Tareas iniciales: ";
foreach ($tareas as $tarea) {
    $tarea->mostrarTarea();
}

// Marcar algunas tareas como completadas
echo "Marcar algunas tareas como completadas: ";
$tareas[0]->marcarComoCompleta(); 
$tareas[1]->marcarComoCompleta(); 

// Mostrar las tareas después de marcar como completadas
foreach ($tareas as $tarea) {
    $tarea->mostrarTarea();
}

// Editar la descripción de una tarea
echo "Editar la descripción de la tarea 'Llamar al cliente': ";
$tareas[2]->editarDescripcion("Realizar una llamada para confirmar la reunión y preguntar sobre el progreso.");
$tareas[2]->mostrarTarea(); // Mostrar tarea después de editar la descripción



//EJERCICIO 3
echo "\n" . "EJERCICIO 3" . "\n";

class Empleado {
    public $nombre;
    public $sueldo;
    public $aniosExperiencia;

    // Constructor 
    public function __construct($nombre_ext2, $sueldo_ext2, $aniosExperiencia_ext2) {
        $this->nombre = $nombre_ext2;
        $this->sueldo = $sueldo_ext2;
        $this->aniosExperiencia = $aniosExperiencia_ext2;
    }

    public function calcularBonus() {
        return ($this->sueldo * 0.05) * floor($this->aniosExperiencia / 2);
    }

    public function mostrarDetalles() {
        echo "El nombre del empleado es: " . $this->nombre . "\n";
        echo "El sueldo del empleado es: " . $this->sueldo . "\n";
        echo "Los años de experiencia del empleado son: " . $this->aniosExperiencia . "\n";
        echo "El bonus del empleado es: " . $this->calcularBonus() . "\n";
    }
}

class Consultor extends Empleado {
    public $horasPorProyecto;

    public function __construct($nombre_ext2, $sueldo_ext2, $aniosExperiencia_ext2, $horasPorProyecto) {
        parent::__construct($nombre_ext2, $sueldo_ext2, $aniosExperiencia_ext2);
        $this->horasPorProyecto = $horasPorProyecto;
    }

    public function calcularBonus() {
        $bonusBase = ($this->sueldo * 0.05) * floor($this->aniosExperiencia / 2);

        if ($this->horasPorProyecto > 100) {
            $bonusAdicional = $this->sueldo * 0.10;
            return $bonusBase + $bonusAdicional;
        }
        return $bonusBase;
    }

    public function mostrarDetalles() {
        parent::mostrarDetalles();
        echo "Horas por proyecto: " . $this->horasPorProyecto . "\n";
    }
}

// Instancia del empleado y consultor
$empleado = new Empleado("Carlos Pérez", 3000, 4);
$consultor = new Consultor("Juan García", 3000, 4, 120);

echo "Detalles del empleado:\n";
$empleado->mostrarDetalles();

echo "\nDetalles del consultor:\n";
$consultor->mostrarDetalles();

// Comparar bonificaciones
echo "\nComparación de bonificaciones:\n";
echo "Bonus del empleado: " . $empleado->calcularBonus() . "\n";
echo "Bonus del consultor: " . $consultor->calcularBonus() . "\n";

//EJERCICIO 4
echo "\n" . "EJERCICIO 4" . "\n";

class Carrito {
    // Propiedad para almacenar los productos en el carrito
    public $productos = [];

    // Método para agregar un producto al carrito
    public function agregarProducto($nombre, $precio, $cantidad) {
        // Añadir el producto como un array asociativo
        $this->productos[] = [
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => $cantidad
        ];
    }

    // Método para quitar un producto del carrito por su nombre
    public function quitarProducto($nombre) {
        // Buscar el producto en el carrito
        foreach ($this->productos as $index => $producto) {
            if ($producto['nombre'] === $nombre) {
                // Eliminar el producto si coincide el nombre
                unset($this->productos[$index]);
                echo "Producto '$nombre' eliminado del carrito.\n";
                return;
            }
        }
        echo "Producto '$nombre' no encontrado en el carrito.\n";
    }

    // Método para calcular el precio total del carrito
    public function calcularTotal() {
        $total = 0;
        foreach ($this->productos as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }
        return $total;
    }

    // Método para mostrar los detalles del carrito
    public function mostrarDetalleCarrito() {
        if (empty($this->productos)) {
            echo "El carrito está vacío.\n";
            return;
        }
        
        foreach ($this->productos as $producto) {
            echo "Producto: " . $producto['nombre'] . " | Precio: " . $producto['precio'] . " | Cantidad: " . $producto['cantidad'] . "\n";
        }
    }
}

// Simulando agregar y quitar productos en el carrito
// Crear una instancia de Carrito
$carrito = new Carrito();

// Agregar productos
$carrito->agregarProducto("Manzanas", 2.50, 3);
$carrito->agregarProducto("Plátanos", 1.80, 5);
$carrito->agregarProducto("Naranjas", 3.00, 2);

// Mostrar los detalles del carrito
echo "Detalles del carrito:\n";
$carrito->mostrarDetalleCarrito();

// Calcular el total
echo "\nEl total del carrito es: " . $carrito->calcularTotal() . "\n";

// Quitar un producto
echo "\nQuitando el producto 'Plátanos':\n";
$carrito->quitarProducto("Plátanos");

// Mostrar los detalles del carrito después de quitar el producto
echo "\nDetalles del carrito después de quitar el producto:\n";
$carrito->mostrarDetalleCarrito();

// Calcular el nuevo total
echo "\nEl nuevo total del carrito es: " . $carrito->calcularTotal() . "\n";


//EJERCICIO 5
echo "\n" . "EJERCICIO 5" . "\n";

class Personaje {
    // Propiedades del personaje
    public $nombre;
    public $nivel;
    public $puntosVida;
    public $puntosAtaque;

    // Constructor de la clase
    public function __construct($nombre, $nivel = 1, $puntosVida = 100, $puntosAtaque = 10) {
        $this->nombre = $nombre;
        $this->nivel = $nivel;
        $this->puntosVida = $puntosVida;
        $this->puntosAtaque = $puntosAtaque;
    }

    // Método para atacar a otro personaje
    public function atacar(Personaje $objetivo) {
        // Resta puntos de vida al objetivo
        $objetivo->puntosVida -= $this->puntosAtaque;
        echo "{$this->nombre} ataca a {$objetivo->nombre} y le resta {$this->puntosAtaque} puntos de vida.\n";
    }

    // Método para curarse
    public function curarse() {
        $curacion = 20; // Puntos de vida restaurados al curarse
        $this->puntosVida += $curacion;
        echo "{$this->nombre} se cura y restaura {$curacion} puntos de vida.\n";
    }

    // Método para subir de nivel
    public function subirNivel() {
        $this->nivel++;
        $this->puntosVida += 20; // Mejora los puntos de vida
        $this->puntosAtaque += 5; // Mejora los puntos de ataque
        echo "{$this->nombre} sube al nivel {$this->nivel} y mejora sus puntos de vida y ataque.\n";
    }

    // Método para mostrar el estado del personaje
    public function mostrarEstado() {
        echo "{$this->nombre} - Nivel: {$this->nivel}, Vida: {$this->puntosVida}, Ataque: {$this->puntosAtaque}\n";
    }
}

// Crear personajes
$personaje1 = new Personaje("Guerrero", 1, 100, 15);
$personaje2 = new Personaje("Mago", 1, 80, 10);

// Mostrar el estado inicial de los personajes
echo "Estado inicial:\n";
$personaje1->mostrarEstado();
$personaje2->mostrarEstado();

// Simulación de batalla
echo "\nComienza la batalla...\n";

// El Guerrero ataca al Mago
$personaje1->atacar($personaje2);
$personaje2->mostrarEstado(); // Ver el estado después del ataque

// El Mago se cura
$personaje2->curarse();
$personaje2->mostrarEstado(); // Ver el estado después de curarse

// El Mago ataca al Guerrero
$personaje2->atacar($personaje1);
$personaje1->mostrarEstado(); // Ver el estado después del ataque

// El Guerrero sube de nivel
$personaje1->subirNivel();
$personaje1->mostrarEstado(); // Ver el estado después de subir de nivel

// Fin de la batalla
echo "\nFin de la batalla.\n";
$personaje1->mostrarEstado();
$personaje2->mostrarEstado();

?>
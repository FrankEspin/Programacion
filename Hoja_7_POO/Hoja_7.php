<?php
echo "\n" . "Ejercicio 1" . "\n";
class Persona{
    public $nombre;
    public $edad;
    public $genero;

public function __construct($nombre_ext, $edad_ext, $genero_ext){
    $this->nombre=$nombre_ext;
    $this->edad=$edad_ext;
    $this->genero=$genero_ext;

}
    
    public function presentar(){
        echo "El nombre es: ". $this->nombre . "\n";
        echo "La edad es: ".$this->edad . "\n";
        echo "El genero de esta persona es: ".$this->genero;
    }
}

//Instancia persona

$persona = new Persona("Frank", "21", "Masculino");
$persona->presentar();

//EJERCICIO 2
echo "\n" . "Ejercicio 2" . "\n";

class Rectangulo{
    public $base;
    public $altura;


public function CalcularArea(){
    return $this->base * $this->altura;
}
}

// Instancia rectangulo
$rectangulo = new Rectangulo();
$rectangulo->base = 10;
$rectangulo->altura = 5;
$area = $rectangulo->CalcularArea();
echo "El area del rectangulo es: " . $area;

//EJERCICIO 3
echo "\n" . "Ejercicio 3" . "\n";

class Animal{
    public $especie;


public function EmitirSonido(){
    echo "El animal de la especie " . $this->especie . "emite un sonido";
}
}
class Perro extends Animal{
    public $raza;

    public function __construct($especie_ext, $raza_ext){
        $this->especie=$especie_ext;
        $this->raza=$raza_ext;
    }
}

//Instancia perro
$perro= new perro("Pastor Aleman ", "Pastos Aleman ");
$perro-> EmitirSonido();

//EJERCICIO 4 
echo "\n" . "Ejercicio 4" . "\n";

class Producto{
    public $nombre;
    public $precio;

public function __construct($nombre_ext, $precio_ext){
    $this->nombre=$nombre_ext;
    $this->precio=$precio_ext;
}
}

class Electrodomestico extends Producto{
    public $consumo;


public function __construct($nombre_ext, $precio_ext, $consumo_ext){
   parent::__construct($nombre_ext, $precio_ext);
    $this->consumo = $consumo_ext;
}
public function mostrarDetalles(){
    echo "El nombre del producto es: " . $this->nombre . "\n";
    echo "El precio del producto es: " . $this->precio . "\n";
    echo "El consumo del electrodomestico es: ". $this->consumo . "\n";
}
}

//Instancia de producto
$producto = new Electrodomestico("Lavadora",500,"35kw");
$producto ->mostrarDetalles();

//EJERCICIO 5 
echo "\n" . "Ejercicio 5" . "\n";

class ConvesorMoneda{
    public $dolares;
    public $euros;

public function DolaresAEuros($dolares_ext){
    $this->dolares=$dolares_ext;
    echo "El cambio de Dolares a Euros es de: " . $dolares_ext * 0.631 ;
}

public function EurosADolares($euros_ext){
    $this->euros=$euros_ext;
    echo"\n" . "El cambio de Euros a Dolares es de: " . $euros_ext/ 0.631;
}
}

//Instancia Dolares 
$dolares = new ConvesorMoneda();
$dolares->DolaresAEuros(100);
//Instancia Euros
$euros =new ConvesorMoneda();
$euros->EurosADolares(100);

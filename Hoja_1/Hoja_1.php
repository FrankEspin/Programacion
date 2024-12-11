<?php
// error_reporting(E_ALL);
// error_reporting(0);
echo "EJERCICIO 1";

$numero1 = readline("Dame el primer numero: ");
$numero2 = readline("Dame el segundo numero: ");

function suma($a, $b){
    return $a + $b;
}

function resta($a,$b){
    return $a-$b;
}

function multiplicacion($a,$b){
    return $a*$b;
}

function division($a, $b) {
    if ($b == 0) {  // No debe haber un punto y coma aquí
        return "No se puede dividir entre 0, Escoge otro numero:";
    } else {
        return $a / $b;
    }
}


// Escogemos la operacion correspondiente
switch ($operacion){
    case '1';
    $resultado = suma ($a + $b);
    break;
    case '2';
    $resultado = resta ($a - $b);
    break;
    case '3';
    $resultado = multiplicacion ($a * $b);
    break;
    case '4';
    $resultado = division ($a/$b);
    break;
    default:
    $resultado = 'Opcion No Valida'; 
    break;
}

// EJERCICIO 2
echo "EJERCICIO 2";

$numero = readline("Ingrese el primer numero: "); 


for ($i = 1; $i <= 10; $i++){
    $resultado = $numero * $i;
    echo "$numero x $i = $resultado\n";
}

// EJERCICIO 3
echo "EJERCICIO 3";

$numero_ingresado = readline("Ingrese el primer numero: "); 

if ($numero_ingresado <=1){
    echo "$numero_ingresado no es un numero primo.\n";
} else {
    $es_primo = true;
    for ($i = 2; $i <= $numero_ingresado / 2; $i++) {
        if ($numero_ingresado % $i == 0){
            $es_primo = false;
            break;
        }
    }

    if ($es_primo){
        echo "$numero_ingresado es numero primo. \n";
    } else {
        echo "$numero_ingresado no es un numero primo. \n";
    }
}

// EJERCICIO 4
echo "EJERCICIO 4";

$numero_secreto = rand(1, 100);

// Paso 2: Inicializar variables para el juego
$intentos = 0;
$adivinado = false;

// Paso 3: Bucle while para repetir el proceso hasta que el usuario adivine el número
echo "¡Bienvenido al juego! Adivina el número secreto entre 1 y 100.\n";

while (!$adivinado) {
    // Pedir al usuario que ingrese un número
    echo "Ingresa un número: ";
    $numero_usuario = trim(fgets(STDIN)); // Leemos la entrada del usuario

    // Aumentar el contador de intentos
    $intentos++;

    if ($numero_usuario > $numero_secreto) {
        echo "¡Demasiado alto! Intenta con un número más bajo.\n";
    } elseif ($numero_usuario < $numero_secreto) {
        echo "¡Demasiado bajo! Intenta con un número más alto.\n";
    } else {
        echo "¡Felicidades! Adivinaste el número secreto en $intentos intentos.\n";
        $adivinado = true; // Termina el bucle si el número es correcto
    }
}
?>
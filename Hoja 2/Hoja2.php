<?php
// EJERCICIO 1
echo "EJERCICIO 1";

echo "Ingresa una palabra: ";
$frase = readline("ingrese una frase: ");

// Contador
$contador_palabras = 0;

$longitud = strlen($frase);

for ($i =0; $i< $longitud; $i++ ){
    if ( $frase [$i] == '' ){
        $contador_palabras++; 
    }
}
$contador_palabras++;

echo "El numero total de palabras en la frase es : " . $contador_palabras . "\n";


// EJERCICIO 2
echo "EJERCICIO 2";

$array = [];
for ($i = 0; $i<10; $i++) {
    $array[] = rand(1,100); // Numero Aleatorio
}

$n = count($array); // Obtener el tamaño del array
for ($i = 0; $i < $n - 1; $i++) {
    for ($j = 0; $j < $n - $i - 1; $j++) {
        // Si el elemento actual es mayor que el siguiente, los intercambiamos
        if ($array[$j] > $array[$j + 1]) {
            // Intercambio de valores
            $temp = $array[$j];
            $array[$j] = $array[$j + 1];
            $array[$j + 1] = $temp;
        }
    }
}

echo "Array ordenado (ascendente): \n";
echo ($array);

// EJERCICIO 3
echo "EJERCICIO 3";

echo "Ingrese una contraseña";
$contraseña = readline("Ingrese la contraseña");

// Contador de caracteres
$contador_de_caracteres = 0;
$longitud_contraseña = strlen($contraseña);

for ($i =0; $i< $longitud; $i++ ){
    if ( $contraseña [$i] == '' ){
        $longitud_contraseña++; 
    }
}
$longitud_contraseña++;

echo "El numero total de palabras en la frase es : " . $contador_de_carcteres . "\n";

// Verificar si tiene almenos una letra mayuscula, minuscula y un numero
function verificar_contraseña($contraseña) {
    if (preg_match('/[A-Z]/', $contraseña) &&
    preg_match('/[a-z]/', $contraseña)&&
    preg_match('/\d/', $contraseña)) {
        return true;
    } else {
        return false;
    }
}

if ($verificar_contraseña($contraseña)) {
    echo "La contraseña es válida.";
} else {
    echo "La contraseña no es valida.";
}

// EJERCICIO 4
echo "EJERCICIO 4";
$nombre = ["Carlos", "Jaime", "Adrian", "Eduardo", "Ana", "Luis", "Maria", "Javier"];
$apellido = ["Pérez", "González", "Rodríguez", "Fernández", "Lopez", "Martínez", "Sanchez", "Escalona"];

//Numeros Aleatorios para el nombre y el apellido

$numero_nombre = rand(0,count($nombre)-1);
$numero_apellido = rand(0,count($apellido)-1);

// Sacar el nombre completo concatenando 
$nombre_completo = $nombre[$numero_nombre]. " " . $apellido[$numero_apellido];
echo "El nombre aleatorio que se ha generado es: " . $nombre_completo;

// EJERCICIO 5
echo "EJERCICIO 5";

$numero_del_dado = rand(1,6);
echo "El numero del lanzamiento del dado es: " . $numero_del_dado;

?>
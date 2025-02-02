<?php

//funciones anonimas 

function suma(int|float $a, int|float $b): int|float{
    return $a + $b;
};

$n1 = 100;
$n2 = 456.78;

echo "<br> La suma de n1 y n2 es: " .suma($n1,$n2);

$suma = function(int|float $a, int|float $b): int|float{
    return $a + $b;
};

echo "<br>La suma de n1 y n2 es: ".$suma($n1,$n2);  // lo llamo distinto y le paso por parametro variables (y no le damos nombre tampoco)


/* 
    funciones flecha solo (a fecha de hoy) para funciones anonima de una sola linea y que 
    !!!- SI O SI DEVUELVEN UN VALOR -!!!
*/

$suma1 = fn(int|float $a, int|float $b) => $a+$b;

echo "<br> La suma de n1 y n2 es: " .$suma1($n1,$n2);

//---------------------------------------------------------------------------------------

$pares = fn(int $n) => ($n%2 == 0);

$multTres = fn(int $n)=> ($n%3 == 0);

$primos = function(int $n){
if($n < 1) return false;
 for($i=2; $i<$n; $i++) {
    if($n%$i == 0) return false;

 }
 return true;
};

$numeros = range(1,100);

// Filtraremos $numeros por el la condicion que queramos 
function filtrarArray(array $array, callable $filtro) : array{
    $numerosFiltrados = [];
    foreach ($array as $valor){
        if($filtro($valor)) $numerosFiltrados[]=$valor;
    }
    return $numerosFiltrados;
}

$array_primos = filtrarArray($numeros,$primos); 
var_dump($array_primos);

$array_pares= filtrarArray($numeros,$pares); 
var_dump($array_pares);

// si quiero ahora por ejemplo filtrar numeros multiplos de 7 podria hacer esto sin complicarme

$array_mul7 = filtrarArray($numeros,function($n){
    return ($n%7 == 0);
});

$array_mult10 = filtrarArray($numeros, fn($n)=> ($n % 10 == 0));

var_dump($array_mul7);
var_dump($array_mult10);
// el array_Filter --- busca condicion de filtrado y devuelve array que cumple x condiciones
$misPrimos = array_filter($numeros, $primos);
var_dump($misPrimos);
// el array map aplica  y trasforma todos los elementos de un array
$arrayDobles = array_map(fn($n) => $n*2, $numeros);

$nombres= ['juan','Ana','lucas','maria'];
$nombresBuenos = array_map(fn(string $n)=> ucfirst($n),$nombres); // ucwords (va donde ucfirst) pone cada letra de cada palabra en mayus y ucfirst es solamente la primera

var_dump($nombresBuenos);

//Ejercicio nuestra copia de la funcion array_map

function miArrayMap(array $array, callable $operacion) {
    $arrayCambiado=[]; // no hace falta inicializarlo pero si lo haces por si acaso te quitas de rollos
    foreach($array as $item) {
        $var=$operacion($item);
        $arrayCamviado[]=$var;
    }
    return $arrayCambiado;
}

$misNombres = miArrayMap($nombres, fn($v)=> ucwords($v));
var_dump($misNombres);
$triples = miArrayMap($numeros, fn(int $n)=> 3*$n);
var_dump($triples);
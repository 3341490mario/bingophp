<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


/* $prueba = array();
  $prueba1 = array();
  for ($i = 0; $i <= 10; $i++) {
  if (sizeof($prueba) < 5) {
  array_push($prueba, $i);
  } elseif (sizeof($prueba) == 5 && sizeof($prueba1) < 5){
  array_push($prueba1, $i);
  }
  var_dump($prueba);
  var_dump($prueba1);
  } */

include './Linea.php';

$decenas[0] = range(1, 9);
$decenas[1] = range(10, 19);
$decenas[2] = range(20, 29);
$decenas[3] = range(30, 39);
$decenas[4] = range(40, 49);
$decenas[5] = range(50, 59);
$decenas[6] = range(60, 69);
$decenas[7] = range(70, 79);
$decenas[8] = range(80, 90);

$numDecTotal = array();
$decF1 = array();
$decF2 = array();
$decF3 = array();
$numFila1 = array();
$numFila2 = array();
$numFila3 = array();

while ((sizeof($numFila1) + sizeof($numFila2) + sizeof($numFila3)) < 15) {

    $randomDecena = random_int(0, 8);
    $aparicionesDecenas = array_count_values($numDecTotal);

    if (!in_array($randomDecena, $numDecTotal) || (in_array($randomDecena, $numDecTotal) && $aparicionesDecenas[$randomDecena] < 2)) {    // Check decena usada menos de 2 veces
        array_push($numDecTotal, $randomDecena);

        if ($randomDecena == 0) {
            $randomNumero = random_int(0, 8);
        } elseif ($randomDecena == 8) {
            $randomNumero = random_int(0, 10);
        } else {
            $randomNumero = random_int(0, 9);
        }

        if (sizeof($numFila1) < 5) {                                        // Completar fila 1
            if (!in_array($randomDecena, $decF1)) {
                array_push($numFila1, $decenas[$randomDecena][$randomNumero]);
            }
        } elseif (sizeof($numFila1) == 5 && sizeof($numFila2) < 5) {                 // Completar fila 2
            if (!in_array($randomDecena, $decF2)) {
                array_push($numFila2, $decenas[$randomDecena][$randomNumero]);
            }
        } elseif (sizeof($numFila1) == 5 && sizeof($numFila2) == 5 && sizeof($numFila3) < 5) {     // Completar fila 3
            if (!in_array($randomDecena, $decF3)) {
                array_push($numFila3, $decenas[$randomDecena][$randomNumero]);
            }
        }

    }

    sort($numFila1);
    sort($numFila2);
    sort($numFila3);
    var_dump($aparicionesDecenas);

    echo "Decena actual: " . $randomDecena;
}

echo "BVBB";
var_dump($aparicionesDecenas);
echo "ULTIMA DECENA";
var_dump($randomDecena);
echo "ULTIMO NUMERO";
var_dump($randomNumero);
echo "AAAA";

$linea1 = new Linea($numFila1);
$linea2 = new Linea($numFila2);
$linea3 = new Linea($numFila3);

var_dump($linea1);
echo "LINEA 1";
var_dump($linea2);
echo "LINEA 2";
var_dump($linea3);
echo "LINEA 3";















/*$linea = new Linea($numerosFila);

var_dump($linea); 

$decFila = array();
$numerosFila = array();

while(sizeof($numerosFila)<5) { // generar 1 fila correctamente

    $randomDecena = random_int(0, 8);
    $randomNumero = 0;

    if (!in_array($randomDecena, $decFila)) {
        array_push($decFila, $randomDecena);

        if ($randomDecena == 0) {
            $randomNumero = random_int(0, 8);
        } elseif ($randomDecena == 8) {
            $randomNumero = random_int(0, 10);
        } else {
            $randomNumero = random_int(0, 9);
        }   
        array_push($numerosFila, $decenas[$randomDecena][$randomNumero]);
    }
} CREACION DE UNA FILA

$prueba = array(1,3,1,29,58,31);

$apariciones = array_count_values($prueba);

var_dump($apariciones);
*/
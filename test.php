<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include './Linea.php';
include './Carton.php';

$decenas[0] = range(1, 9);
$decenas[1] = range(10, 19);
$decenas[2] = range(20, 29);
$decenas[3] = range(30, 39);
$decenas[4] = range(40, 49);
$decenas[5] = range(50, 59);
$decenas[6] = range(60, 69);
$decenas[7] = range(70, 79);
$decenas[8] = range(80, 90);

$decFila = array();
$numerosFila = array();
$linea1 = new Linea();
$linea2 = new Linea();
$linea3 = new Linea();

while(sizeof($numerosFila)<5) {

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
}

/*$linea = new Linea($numerosFila);

var_dump($linea);

while(sizeof($numerosFila)<5) {

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
} CREACION DE UNA FILA*/
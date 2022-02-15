<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Carton
 *
 * @author mario
 */
include './Linea.php';

class Carton {

    private $lineas = array();

    public function __construct() {
        $decenas[0] = range(1, 9);
        $decenas[1] = range(10, 19);
        $decenas[2] = range(20, 29);
        $decenas[3] = range(30, 39);
        $decenas[4] = range(40, 49);
        $decenas[5] = range(50, 59);
        $decenas[6] = range(60, 69);
        $decenas[7] = range(70, 79);
        $decenas[8] = range(80, 90);

        $decenasUsadas = array();
        $decF1 = array();
        $decF2 = array();
        $decF3 = array();
        $numFila1 = array();
        $numFila2 = array();
        $numFila3 = array();

        while ((sizeof($numFila1) + sizeof($numFila2) + sizeof($numFila3)) < 15) {

            $randomDecena = random_int(0, 8);
            $aparicionesDecenas = array_count_values($decenasUsadas);

            if (!in_array($randomDecena, $decenasUsadas) || (in_array($randomDecena, $decenasUsadas) && $aparicionesDecenas[$randomDecena] < 2)) {    // Check decena usada menos de 2 veces
                if ($randomDecena == 0) {
                    $randomNumero = random_int(0, 8);
                } elseif ($randomDecena == 8) {
                    $randomNumero = random_int(0, 10);
                } else {
                    $randomNumero = random_int(0, 9);
                }

                if (sizeof($numFila1) < 5) {                                        // Completar fila 1
                    if (!in_array($randomDecena, $decF1)) {
                        array_push($decF1, $randomDecena);
                        array_push($numFila1, $decenas[$randomDecena][$randomNumero]);
                        array_push($decenasUsadas, $randomDecena);
                    }
                } elseif (sizeof($numFila1) == 5 && sizeof($numFila2) < 5) {                 // Completar fila 2
                    if (!in_array($randomDecena, $decF2) && !in_array($decenas[$randomDecena][$randomNumero], $numFila1)) {
                        array_push($decF2, $randomDecena);
                        array_push($numFila2, $decenas[$randomDecena][$randomNumero]);
                        array_push($decenasUsadas, $randomDecena);
                    }
                } elseif (sizeof($numFila1) == 5 && sizeof($numFila2) == 5 && sizeof($numFila3) < 5) {     // Completar fila 3
                    if (!in_array($randomDecena, $decF3) && !in_array($decenas[$randomDecena][$randomNumero], $numFila1) && !in_array($decenas[$randomDecena][$randomNumero], $numFila2)) {
                        array_push($decF3, $randomDecena);
                        array_push($numFila3, $decenas[$randomDecena][$randomNumero]);
                        array_push($decenasUsadas, $randomDecena);
                    }
                }
            }
        }
        sort($numFila1) && sort($numFila2) && sort($numFila3);
        $linea1 = new Linea($numFila1);
        $linea2 = new Linea($numFila2);
        $linea3 = new Linea($numFila3);
        
        $lineas = array($linea1,$linea2,$linea3);
        
        $this->setLineas($lineas);
    }

    public function getLineas() {
        return $this->lineas;
    }

    public function setLineas($lineas): void {
        $this->lineas = $lineas;
    }

    public function marcar($numero): int {
        $lineas = $this->getLineas();
        $lineasCompletas = 0;
        
        for ($i = 0; $i < 3; $i++) {         
            for ($j = 0; $j < 5; $j++) {
                if ($lineas[$i]->getNumeros()[$j] == $numero) {
                    $lineas[$i]->marcar($numero);
                }
            }
            
            if($lineas[$i]->marcar($numero)){
                $lineasCompletas++;
            }
        }
        
        return $lineasCompletas;
    }

    public function bingo(): bool {
        $lineas = $this->getLineas();
        $lineasCompletas = 0;

        for ($i = 0; $i < 3; $i++) {
            if ($lineas[$i]->completo()) {
                $lineasCompletas++;
            }
        }

        return $lineasCompletas == 3;
    }
}
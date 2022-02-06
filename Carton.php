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

    public function __construct($lineas) {
        $this->lineas = $lineas;
    }
    
    public function getLineas() {
        return $this->lineas;
    }

    public function setLineas($lineas): void {
        $this->lineas = $lineas;
    }

    public function marcar($numero) : void {
        $lineas = $this->getLineas();
        
        for ($i = 0;$i < 3;$i++){
            for($j = 0;$j < 5;$j++){
                if($lineas[$i]->getNumeros()[$j] == $numero){
                    $lineas[$i]->marcar($numero);
                }
            }
        }   
    }
        
    public function bingo(): bool {
        $lineas = $this->getLineas();
        $lineasCompletas = 0;
        
        for ($i = 0;$i < 3;$i++){
            if($lineas[$i]->completo() == true){
                $lineasCompletas++;
            }
        }
        
        if($lineasCompletas == 3){
            return true;
        }
    }
}

$numeros1 = array(1, 10, 39, 86, 90);
$numeros2 = array(2, 20, 69, 76, 87);
$numeros3 = array(3, 30, 55, 66, 80);

$linea1 = new Linea($numeros1);
$linea2 = new Linea($numeros2);
$linea3 = new Linea($numeros3);

$lineas = array($linea1, $linea2, $linea3);
$carton = new Carton($lineas);

$linea1carton = $carton->getLineas()[0];

$carton->marcar(1);
$carton->marcar(2);
$carton->marcar(3);
$carton->marcar(10);
$carton->marcar(20);
$carton->marcar(30);
$carton->marcar(55);
$carton->marcar(39);
$carton->marcar(69);
$carton->marcar(86);
$carton->marcar(90);
$carton->marcar(80);
$carton->marcar(87);
$carton->marcar(66);
$carton->marcar(76);


var_dump($carton->getLineas());

var_dump($carton->bingo());

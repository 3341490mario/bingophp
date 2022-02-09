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
class Linea {

    private $numeros = array();
    private $marcados = array(false, false, false, false, false);

    public function __construct($numeros) {
        $this->numeros = $numeros;
    }

    public function getNumeros() {
        return $this->numeros;
    }

    public function getMarcados() {
        return $this->marcados;
    }

    public function setNumeros($numeros): void {
        $this->numeros = $numeros;
    }

    public function setMarcados($posicion): void {
        $this->marcados[$posicion] = true;
    }

    public function completo(): bool {
        $contadorCompleto = 0;

        for ($i = 0; $i <= 4; $i++) {
            if ($this->getMarcados()[$i] == true) {
                $contadorCompleto++;
            }
        }

        if ($contadorCompleto == 5) {
            return true;
        } else {
            return false;
        }
    }

    public function marcar($number): bool {
        for ($i = 0; $i <= 4; $i++) {
            if ($this->getNumeros()[$i] == $number && $this->getMarcados()[$i] == false) {
                $this->setMarcados($i);
            }
        }
        
        if($this->completo() == true){
            return true;
        } else {
            return false;
        }
    }

}

/*$numPrueba = array(2, 15, 33, 54, 68);
$prueba = new Linea($numPrueba);

var_dump($prueba);
printf("Sin números marcados");

$prueba->marcar(54);
$prueba->marcar(68);

var_dump($prueba);
printf("Números 54 y 68 marcados");

var_dump($prueba->completo());*/


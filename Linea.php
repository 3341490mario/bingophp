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
            if ($this->getMarcados()[$i]) {
                $contadorCompleto++;
            }
        }

        return $contadorCompleto == 5;
    }   
            
    public function marcar($number): bool {
        for ($i = 0; $i <= 4; $i++) {
            if ($this->getNumeros()[$i] == $number && !$this->getMarcados()[$i]) {
                $this->setMarcados($i);
            }
        }
        
        return $this->completo();
    }

}
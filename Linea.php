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

    public function completo(): bool {      // Compruebo si toda la linea tiene marcados los números, con un contador. Si llega a 5 deuelve true porque está completa
        $contadorCompleto = 0;

        for ($i = 0; $i <= 4; $i++) {
            if ($this->getMarcados()[$i]) { 
                $contadorCompleto++;
            }
        }
        
        return $contadorCompleto == 5;
    }   
            
    public function marcar($number): bool {     // comprobar si el numero no está marcado, si no lo está lo añadimos con setMarcados
        for ($i = 0; $i <= 4; $i++) {
            if ($this->getNumeros()[$i] == $number && !$this->getMarcados()[$i]) {  
                $this->setMarcados($i); 
            }
        }
        
        return $this->completo();
    }
}
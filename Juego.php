<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Bingo
 *
 * @author mario
 */
include './Carton.php';

class Juego {

    //put your code here
    private $cartones = array();
    private $bolas = array();
    private $lineaCantada = false;

    public function __construct() {
        $carton1 = new Carton();
        $carton2 = new Carton();
        $carton3 = new Carton();
        $cJuego = array($carton1, $carton2, $carton3);

        $this->setCartones($cJuego);
    }

    public function getBolas() {
        return $this->bolas;
    }

    public function setNuevaBola($bola): void {
        array_push($this->bolas, $bola);
    }

    public function getCartones() {
        return $this->cartones;
    }

    public function setCartones($cartones): void {
        $this->cartones = $cartones;
    }

    public function getLineaCantada(): bool {
        return $this->lineaCantada;
    }

    public function setLineaCantada(): void {
        $this->lineaCantada = true;
    }

    public function bola(): int {
        $cartonesLinea = array();
        $cartonesBingo = array();
        $resultado = 0;
        $nuevaBola = array_pop($_SESSION['numeros']);

        if (!in_array($nuevaBola, $this->getBolas())) {
            $this->setNuevaBola($nuevaBola);

            for ($i = 0; $i < 3; $i++) {
                if (!$this->getLineaCantada() && $this->getCartones()[$i]->marcar($nuevaBola) == 1) {
                    $this->setLineaCantada();
                    array_push($cartonesLinea, $i);
                    $resultado = $cartonesLinea[0];
                    var_dump($i);
                } elseif ($this->getLineaCantada() && $this->getCartones()[$i]->marcar($nuevaBola) == 3) {
                    array_push($cartonesBingo, $i);
                    $resultado = $cartonesBingo[0];
                }
            }
        }
        
        return $resultado+1;
    }

    public function imprimir($carton): void {
        $lines = $carton->getLineas();
        
        echo "<table border=1>
    <tr>
        <th colspan=10>Cartón</th>
    </tr>";
        for ($i = 0; $i < 3; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 5; $j++) {
                $numero = $lines[$i]->getNumeros()[$j];
                if(in_array($numero, $this->getBolas())){
                    echo "<td style='padding: 0.5rem; text-align: center; color:red;'>" . $numero . '</td>';
                } else {
                    echo "<td style='padding: 0.5rem; text-align: center;'>" . $numero . '</td>';
                }           
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
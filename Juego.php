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
        $cJuego = array($carton1,$carton2,$carton3);
        
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

        
    public function bola() : int{
        $this->getCartones();
        $cartonesLinea = array();
        $cartonesBingo = array();
        $nuevaBola = random_int(1, 90);
        
        if (!in_array($nuevaBola, $this->getBolas())){
            $this->setNuevaBola($nuevaBola);
        
            for($i = 0;$i < 3;$i++){
                if(!$this->getLineaCantada() && $this->getCartones()[$i]->marcar($nuevaBola) == 1){
                    $this->setLineaCantada();
                    array_push($cartonesLinea, $i);
                    $resultado = $cartonesLinea[0];
                } elseif ($this->getLineaCantada() && $this->getCartones()[$i]->marcar($nuevaBola) == 3){
                    array_push($cartonesBingo, $i);
                    $resultado = $cartonesBingo[0];
                } else {
                    $resultado = 0;
                }
            }
            
            return $resultado;
        } else {
            return 0;
        }
    }
}


$prueba = new Juego();
var_dump($prueba);


while(sizeof($prueba->getBolas()) < 90){
    $prueba->bola();
}
echo "hola";
$balls = $prueba->getBolas();
sort($balls);
var_dump($balls);

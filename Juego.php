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
class Juego {
    //put your code here
    private $cartones = array();
    private $bolas = array();
    private $lineaCantada = bool;
    
    public function bola() : int{
        $nuevaBola = random_int(1, 90);
        
        if (!in_array($nuevaBola, $this->getBolas())){
            array_push($this->bolas, $nuevaBola);
            return 0;
        }
        
        
    }
}

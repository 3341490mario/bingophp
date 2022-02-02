<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bingo MLA</title>
        <meta name="author" content="Mario Lasheras Almeda">
    </head>
    <body>
        <?php
        // put your code here
        
            // LINEA
        
            class Linea {
                private $numeros = array(4);
                private $marcados = array(false,false,false,false,false);
                
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

                public function setMarcados($marcados): void {
                    $this->marcados = $marcados;
                }

                public function marcar($number): void {
                    for($i=0;$i<=4;$i++){
                        if($this->getNumeros()[$i] == $number && $this->getMarcados()[$i] == false){
                            array_push($this->marcados[$i],$number);
                            $this->marcados[$i] = true;
                        }
                    }
                }

                public function completo(): bool {
                    $contadorCompleto = 0;
                    
                    for($i=0;$i<=4;$i++){
                        if($this->marcados[$i] == true){
                            $contadorCompleto++;
                        }
                    }
                    
                    if ($contadorCompleto == 5){
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            
            // CARTON
            
            class Carton {
                private $lineas = array(2);
                
                public function __construct($lineas) {
                    $this->lineas = $lineas;
                }

                public function getLineas() {
                    return $this->lineas;
                }

                public function setLineas($lineas): void {
                    $this->lineas = $lineas;
                }

                
            }
            
            
            $numPrueba = array(2,15,33,58,68);
            $prueba = new Linea($numPrueba);
            
    
            var_dump($prueba);
            printf("Sin números marcados");
            
            $prueba->marcar(15);
            var_dump($prueba);
            printf("Número 15 marcado en la 2 posicion");
            $prueba->marcar(68);
            var_dump($prueba);
            printf("Número 68 marcado en la última posición");
            
            var_dump($prueba->completo());
            
            
        ?>
    </body>
</html>

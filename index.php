<?php

include './Juego.php';

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
session_start();

$numDecenas[0]=range(1,10);
$numDecenas[1]=range(11,20);
$numDecenas[2]=range(21,30);
$numDecenas[3]=range(31,40);
$numDecenas[4]=range(41,50);
$numDecenas[5]=range(51,60);
$numDecenas[6]=range(61,70);
$numDecenas[7]=range(71,80);
$numDecenas[8]=range(81,90);

$_SESSION['game'] = new Juego();
$game = $_SESSION['game'];
$_SESSION['carton1'] = $game->getCartones()[0];
$_SESSION['carton2'] = $game->getCartones()[1];
$_SESSION['carton3'] = $game->getCartones()[2];
$carton1 = $_SESSION['carton1'];
$carton2 = $_SESSION['carton2'];
$carton3 = $_SESSION['carton3'];


if(isset($_GET['sacaBola'])){
    $game->bola();
}

echo '<form>'
. '<button type="submit" name="sacaBola">Sacar bola</button>'
        .'<input type="text" name="bolaActual" value='.end($game->getBolas()).'>'
        . '</form><br>';

// Tablero de números

echo "<table border=1>
    <tr>
        <th colspan=10>Tablero de números</th>
    </tr>";
    for($i=0;$i<9;$i++){
        echo "<tr>";
        for($j=0;$j<10;$j++){
            echo "<td style='padding: 0.5rem; text-align: center'>".$numDecenas[$i][$j]."</td>";
        }
        echo "</tr>";
    }
echo "</table>";

$carton1->imprimir();
$carton2->imprimir();
$carton3->imprimir();
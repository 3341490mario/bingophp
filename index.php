<?php

include './Juego.php';

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
session_start();

$numDecenas[0] = range(1, 10);
$numDecenas[1] = range(11, 20);
$numDecenas[2] = range(21, 30);
$numDecenas[3] = range(31, 40);
$numDecenas[4] = range(41, 50);
$numDecenas[5] = range(51, 60);
$numDecenas[6] = range(61, 70);
$numDecenas[7] = range(71, 80);
$numDecenas[8] = range(81, 90);

if (!isset($_SESSION['game'])) {
    $_SESSION['game'] = new Juego();
    $game = $_SESSION['game'];
    $_SESSION['carton1'] = $game->getCartones()[0];
    $_SESSION['carton2'] = $game->getCartones()[1];
    $_SESSION['carton3'] = $game->getCartones()[2];
    $numTablero = range(1, 90);
    shuffle($numTablero);
    $_SESSION['numeros'] = $numTablero;
}

$game = $_SESSION['game'];
$carton1 = $_SESSION['carton1'];
$carton2 = $_SESSION['carton2'];
$carton3 = $_SESSION['carton3'];

if (isset($_GET['sacaBola'])) {
    $lineaCantada = $game->bola();
    $bolas = $game->getBolas();
    $bola = end($bolas);
    $carton1->marcar($bola);
    $carton2->marcar($bola);
    $carton3->marcar($bola);
} else {
    $bolas = $game->getBolas();
}

echo '<form>'
 . '<button type="submit" name="sacaBola">Sacar bola</button>'
 . '<input type="text" name="bolaActual" value=' . end($bolas) . '>'
 . '</form><br>';

// Tablero de números

echo "<table border=1>
    <tr>
        <th colspan=10>Tablero de números</th>
    </tr>";

for ($i = 0; $i < 9; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 10; $j++) {
        $numero = $numDecenas[$i][$j];
        if (in_array($numero, $game->getBolas())) {
            echo "<td style='padding: 0.5rem; text-align: center; color: red;'>" . $numero . "</td>";
        } else {
            echo "<td style='padding: 0.5rem; text-align: center'>" . $numero . "</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";

$game->imprimir($carton1);
$game->imprimir($carton2);
$game->imprimir($carton3);

if ($game->getLineaCantada()) {
    echo "Línea cantada por el cartón: " . $lineaCantada . ".<br>";
}

if ($carton1->bingo()) {
    echo "<h1>¡BINGO! Ha ganado el cartón 1.</h1><br>";
    echo '<h3>Pulsa "SACAR BOLA" para empezar un nuevo juego.</h3>';
    session_destroy();
} elseif ($carton2->bingo()) {
    echo "<h1>¡BINGO! Ha ganado el cartón 2.</h1><br>";
    echo '<h3>Pulsa "SACAR BOLA" para empezar un nuevo juego.</h3>';
    session_destroy();
} elseif ($carton3->bingo()) {
    echo "<h1>¡BINGO! Ha ganado el cartón 3.</h1><br>";
    echo '<h3>Pulsa "SACAR BOLA" para empezar un nuevo juego.</h3>';
    session_destroy();
}
<?php
session_start();
?>
<html>

    <head>
        <title>ex1aEval</title>

    </head>

    <body>
        <h1>Examen 1a Evaluación</h1>
        <h2>Adrian Maceda Herrero</h2>
        <!--formulario para recoger las filas y columnas de inicio y fin-->
    </body>

</html>
<form method="POST" action="">
    <label for="lineStart">Fila inicio:</label>
    <input type="number" id="lineStart" name="lineStart" required><br>
    <label for="ColumnStart">Columna inicio:</label>
    <input type="number" id="columnStart" name="columnStart" required><br>
    <label for="lineEnd">Fila fin:</label>
    <input type="number" id="lineEnd" name="lineEnd" required><br>
    <label for="columnEnd">Columna fin:</label>
    <input type="number" id="columnEnd" name="columnEnd" required><br>
    <button type="submit">prueba</button>
</form>

<?php
$numbers = [1, 2, 3, 4, 5, 6];
$colours = ['RED', 'YEL', 'GRE', 'BLU', 'BLA', 'WHI'];
//*usa esto si no los generas tú*/
//$combinaciones = [[1, 'RED'], [1, 'YEL'], [1, 'GRE'], [1, 'BLU'], [1, 'BLA'], [1, 'WHI'], [2, 'RED'], [2, 'YEL'], [2, 'GRE'], [2, 'BLU'], [2, 'BLA'], [2, 'WHI'], [3, 'RED'], [3, 'YEL'], [3, 'GRE'], [3, 'BLU'], [3, 'BLA'], [3, 'WHI'], [4, 'RED'], [4, 'YEL'], [4, 'GRE'], [4, 'BLU'], [4, 'BLA'], [4, 'WHI'], [5, 'RED'], [5, 'YEL'], [5, 'GRE'], [5, 'BLU'], [5, 'BLA'], [5, 'WHI'], [6, 'RED'], [6, 'YEL'], [6, 'GRE'], [6, 'BLU'], [6, 'BLA'], [6, 'WHI']];
//$tablero = [[17, 8, 33, 0, 26, 28], [16, 9, 1, 18, 3, 34], [19, 21, 2, 10, 27, 32], [20, 35, 4, 30, 11, 31], [22, 7, 6, 13, 25, 12], [23, 24, 15, 14, 29, 5]];

$combinations = generarteCombinations($numbers, $colours);
$gameTable = generateBoard();
printGame($combinations, $gameTable);
$_SESSION['tablero'] = $gameTable;

//FUNCIONES
function  generarteCombinations(array $numbers, array $colours): array
{
    $combinations = [];//iniciamos array vacio para almacenar las combinaciones

    // Crear combinaciones de números y colores, 
    foreach ($numbers as $number) {
        foreach ($colours as $colour) {
            $combinations[] = [$number, $colour];//Agregar la combinaciones de numero y color en el array
        }
    }

    return $combinations;//Devuelta del array BIDIMENSIONAL con las combinaciones creadas
}

function generateBoard(): array
{//Generacion de tablero
    $positions = range(0, 35);//Numero de posiciones que va a tener
    shuffle($positions);//Mezclar las posiciones
    $gameTable = [];//Asignar una variable vacia
    for ($i = 0; $i < 6; $i++) {//crear un array para rellenar posiciones del array
        $gameTable[$i] = array_slice($positions, $i * 6, 6);

    }
    return $gameTable;

}

function printGame($combinations, &$gameTable)// Asegurarte de que gameTable tenga el mismo número de elementos que combinaciones
{
    foreach ($gameTable as &$row) {
        foreach ($row as &$cell) {
            shuffle($combinations);
            $cell = array_shift($combinations); // Asignamos una combinación única a cada celda.
        }
    }
}

echo "<table border='1' cellpadding='5' cellspacing='0'>";
foreach ($gameTable as $row) {
    echo "<tr>";
    foreach ($row as $cell) {
        echo "<td>{$cell[0]} - {$cell[1]}</td>"; // Mostrando cada combinación de número y color
    }
    echo "</tr>";
}
echo "</table>";
function tiradaValida()
{

}

function tiradaPermitida()
{

}


?>
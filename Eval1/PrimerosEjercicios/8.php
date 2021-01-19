<!DOCTYPE html>
<html>
    <head>
        <title>
            Ej 8
        </title>
    </head>
    <body>
        <?php
include "funciones.php";
$primos = primos(1000);
$fibonacci = fibonacci(1000);
for ($i = 1; $i <= 100; $i++) {
    echo "$i =>" . (esPar($i) ? "PAR" : "IMPAR") . " - " . (in_array($i, $primos) ? "PRIMO" : "NO PRIMO") . " - " .
        (in_array($i, $fibonacci) ? "FIBONACCI" : "NO FIBONACCI") . "<br>";
}

?>


    </body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>
    Ej 7
    </title>
</head>
<body>
<?php
$animales = array("Lagartija", "Araña", "Perra", "Gata", "Raton");
$numeros = array("12", "34", "49", "53", "12");
$arboles = array("Sauce", "Pino", "Naranjo", "Chopa", "Perro", "34");
$todo = array_merge($animales, $numeros, $arboles);
echo "<h1>Elementos del array \$todo:</h1><br>";
foreach ($todo as $el) {
    echo "$el<br>";
}

?>
</body>
</html>

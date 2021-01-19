<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>
    Ej 6
    </title>
</head>
<body>
<?php
$ciudades = array(
    "MD" => "Madrid",
    "BC" => "Barcelona",
    "LND" => "Londres",
    "NY" => "New York",
    "LA" => "Los Angeles",
    "CH" => "Chicago",
);
foreach ($ciudades as $indice => $ciudad) {
    echo "La clave del array asociativo que tiene como valor $ciudad es $indice<br>";
}

var_dump($ciudades);
?>
</body>
</html>

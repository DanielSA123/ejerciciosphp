<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>
    Ej 5
    </title>
</head>
<body>
<?php
$ciudades = array(
    "Madrid", "Barcelona", "Londres", "New York", "Los Angeles", "Chicago",
);
foreach ($ciudades as $indice => $ciudad) {
    echo "La ciudad con indice $indice tiene el nombre $ciudad<br>";
}

?>
</body>
</html>

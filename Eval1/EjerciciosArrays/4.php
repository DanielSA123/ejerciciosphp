<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>
    Ej 4
    </title>
</head>
<body>
<?php
$persona = array(
    'Nombre' => "Pedro Torres",
    "Direccion" => "C/Mayor,37",
    "Telefono" => "123456789",
);
foreach ($persona as $clave => $valor) {
    echo "$clave : $valor<br>";
}

?>
</body>
</html>

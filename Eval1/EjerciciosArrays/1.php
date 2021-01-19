<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>
    Ej 1
    </title>
</head>
<body>
<?php
$numeros = range(1, 10);
array_walk($numeros, function ($el) {
    echo "$el<br>";
})
?>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>
    Ej 3
    </title>
</head>
<body>
<?php
$vistas = [
    9, 20, 0, 17,
];
foreach ($vistas as $value) {
    if ($value) {
        echo "$value<br>";
    }
}
$avistas = [
    'enero' => 9,
    "febrero" => 20,
    "marzo" => 0,
    "abril" => 17,
];?>
<h1>Con array asociativo</h1>
<?php
foreach ($avistas as $key => $value) {
    if ($value) {
        echo "$key => $value<br>";
    }
}
?>
</body>
</html>

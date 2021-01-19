<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>
    Ej 10
    </title>
</head>
<body>
    <?php
$numeros = [5 => 1,
    12 => 2,
    13 => 56,
    'x' => 42];
print_r($numeros);
echo "<br> El array tiene " . count($numeros) . " elementos<br>";
unset($numeros[5]);
print_r($numeros);
unset($nuemros);
print_r($nuemros);
?>

</body>
</html>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>
        Ej 13
    </title>
</head>

<body>
    <?php
$amigos = [
    'Madrid' => [[
        'nombre' => 'Predo',
        'edad' => 32,
        'telefono' => '91-999.99.99']],
    'Barcelona' => [[
        'nombre' => 'Susana',
        'edad' => 34,
        'telefono' => '93-000.00.00']],
    'Toledo' => [[
        'nombre' => 'Sonia',
        'edad' => 42,
        'telefono' => '925-09-09-09']],
];
if (isset($_POST['ciudad'])) {
    $ciudad = $_POST['ciudad'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $tlf = $_POST['tlf'];

    $amigos[$ciudad][] = ['nombre' => $nombre, 'edad' => $edad, 'telefono' => $tlf];
}
foreach ($amigos as $ciudad => $amigo) {
    echo "En $ciudad : ";
    foreach ($amigo as $num => $cual) {
        foreach ($cual as $dato => $valor) {
            echo $dato . " " . $valor . ", ";
        }
        echo "<br>";
    }

}
?>
</body>

</html>
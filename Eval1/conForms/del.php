<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej13</title>
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

//if (isset($_POST['del'])):
?>
    <form action="#" name="borrar" method="post">
        <select name="amigoBorrar" id="amigoBorrar">
            <?php
foreach ($amigos as $ciudad => $value) {
    foreach ($value as $key => $amigo) {
        echo '<option value="' . $ciudad . '-' . $key . '">' . $amigo["nombre"] . '-' . $ciudad . '</option>';
    }
}
?>
        </select>

        <input type="submit" name="eliminando" value="Eliminar">
    </form>

    <?php //endif;

if (isset($_POST["eliminando"])) {
    $amigoBorrar = $_POST["amigoBorrar"];
    $parteBorrar = explode('-', $amigoBorrar);

    unset($amigos[$parteBorrar[0]][$parteBorrar[1]]);

    foreach ($amigos as $ciudad => $amigo) {
        echo "En $ciudad : ";
        foreach ($amigo as $num => $cual) {
            foreach ($cual as $dato => $valor) {
                echo $dato . " " . $valor . ", ";

            }
            echo "<br>";
        }
        echo "<br>";
    }
}
?>


</body>

</html>
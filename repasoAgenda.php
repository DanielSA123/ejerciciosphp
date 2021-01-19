<?php
$agenda =   [
    'Madrid' => [
        ['Nombre' => 'Jose', 'Edad' => 32, 'Tlfno' => '919999999'],
        ['Nombre' => 'Luis', 'Edad' => 28, 'Tlfno' => '918888888'],
    ],
    'Barcelona' => [
        ['Nombre' => 'Pepe', 'Edad' => 23, 'Tlfno' => '939999999'],
    ],
    'Toledo' => [],
];
// P: ¿En php cuando existe una variable?
// R: La primera vez que la encuentra y tiene asignado algo
function pintarTabla($agenda)
{
    echo '<h2>Lista de amigos</h2>';
    echo '<table>';
    foreach ($agenda as $ciudad => $lista) :
        echo '<tr><th colspan=3>' . $ciudad . '</th></tr>';
        if (isset($lista[0])) {
            echo '<tr>';
            foreach ($lista[0] as $key => $value) {
                echo '<th>' . $key . '</th>';
            }
            echo '<tr>';
        }
        foreach ($lista as $amigo) :
            echo '<tr>';
            foreach ($amigo as $valor) :
                echo '<td>' . $valor . '</td>';
            endforeach;
            echo '</tr>';
        endforeach;
    endforeach;
    echo '</table>';
}

function pintarDatosAmigo($amigo)
{
    echo '<h2>Datos de ' . $amigo['Nombre'] . '</h2>';
    echo '<table>';
    foreach ($amigo as $clave => $valor) :
        echo '<tr><td>' . $clave . '</td><td>' . $valor . '</td></tr>';
    endforeach;
    echo '</table>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table,
    td,
    th {
        border: 1px solid black;
        text-align: center;
        padding: 5px;
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <?php


    // Ver estructura de la agenda
    pintarTabla($agenda);
    // var_dump($agenda);

    // Mostrar informacion de Luis
    pintarDatosAmigo($agenda['Madrid'][1]);
    // var_dump($agenda['Madrid'][1]);

    // edad de Jose
    echo '<p> Edad de Jose: ' . $agenda['Madrid'][0]['Edad'] . '</p>';
    // var_dump($agenda['Madrid'][0]['Edad']);

    // añadir a Juana a la agenda y mostrarla
    $agenda['Madrid'][] = [
        'Nombre' => 'Juana',
        'Edad' => 35,
        'Tlfno' => '915555555'
    ];
    pintarDatosAmigo($agenda['Madrid'][2]);
    // var_dump($agenda['Madrid'][2]);

    // Modificar la edad de Juana
    $agenda['Madrid'][2]['Edad'] = 40;
    pintarDatosAmigo($agenda['Madrid'][2]);
    // var_dump($agenda['Madrid'][2]);

    // Añadir a carla a Barcelona
    $agenda['Barcelona'][] = [
        'Nombre' => 'Carla',
        'Edad' => 30,
        'Tlfno' => '935555555'
    ];
    pintarDatosAmigo($agenda['Barcelona'][1]);
    // var_dump($agenda['Barcelona'][1]);

    // Agregar a Banae a Toledo

    $agenda['Toledo'][] = [
        'Nombre' => 'Danae',
        'Edad' => 25,
        'Tlfno' => '925555555'
    ];
    pintarDatosAmigo($agenda['Toledo'][0]);
    // var_dump($agenda['Toledo'][0]);

    // Mostrar edad de Danae
    echo '<p> Edad de Danae: ' . $agenda['Toledo'][0]['Edad'] . '</p>';
    // echo $agenda['Toledo'][0]['Edad'];

    // Agregar Pamplona a la agenda
    $agenda['Pamplona'] = [];
    pintarTabla($agenda);
    // var_dump($agenda);

    // Agregar a Juan a Pamplona
    $agenda['Pamplona'][] = [
        'Nombre' => 'Juan',
        'Edad' => 28,
        'Tlfno' => '948999999'
    ];
    pintarDatosAmigo($agenda['Pamplona'][0]);
    // var_dump($agenda['Pamplona'][0]);

    // agregar a Pedro en Oviedo
    $agenda['Oviedo'][] = [
        'Nombre' => 'Pedro',
        'Edad' => 23,
        'Tlfno' => '989999999'
    ];
    pintarDatosAmigo($agenda['Oviedo'][0]);
    // var_dump($agenda['Oviedo'][0]);

    pintarTabla($agenda);
    ?>



</body>

</html>
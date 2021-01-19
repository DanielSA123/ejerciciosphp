<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>
        Ej 11
    </title>
</head>

<body>
    <?php
$familia = [
    'Los Simpson' => [
        'padre' => 'Homer',
        'madre' => 'Marge',
        'hijos' => ['Bart', 'Lisa', 'Maggie'],
    ],
    'Los Griffin' => [
        'padre' => 'Peter',
        'madre' => 'Lois',
        'hijos' => ['Chris', 'Meg', 'Stewie'],
    ],
];

function pintar($arr)
{

    foreach ($arr as $key => $value) {
        echo "<ul>".$key.":";
        if (is_array($value)) {
            pintar($value);
        } else {
            echo "<li>" . $value . "</li>";
        }
        echo "</ul>";
    }
};


pintar($familia);
?>

</body>

</html>
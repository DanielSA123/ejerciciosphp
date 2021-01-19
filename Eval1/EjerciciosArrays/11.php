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

foreach ($familia as $nombre => $fam) {
    echo "<h1>$nombre</h1>";
    echo "<ul>";
    foreach ($fam as $rol => $nombre) {
        echo "<li>" . (is_array($nombre) ? join(",", $nombre) : $nombre) . "</li>";
    }
    echo "</ul>";
}
?>

</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>
    Ej 8
    </title>
</head>
<body>
    <table>
        <tbody>
        <tr>
            <th>Equipo</th>
            <th>Campo</th>
        </tr>

<?php
$estadiosFutbol = ['Barcelona' => 'Camp Nou',
    'Real Madrid' => 'Santiago Bernabeu',
    'Valencia' => 'Mestalla',
    'Real Sociedad' => 'Anoeta'];
foreach ($estadiosFutbol as $equipo => $campo):
?>
    <tr>
    <td><?=$equipo?></td>
    <td><?=$campo?></td>
    </tr>
<?php endforeach?>
        </tbody>
    </table>
<?php
$estadiosFutbol['Real Madrid'] = null;
?>
<ul>
    <?php foreach ($estadiosFutbol as $value) {
    echo "<li> $value </li>";
}?>
</ul>
</body>
</html>

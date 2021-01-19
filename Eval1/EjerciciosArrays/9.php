<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>
    Ej 9
    </title>
</head>
<body>
    <?php
$numeros = [3, 2, 8, 123, 5, 1];
asort($numeros);
?>
    <table>
        <tbody>
            <tr>
                <th>Indice</th>
                <th>Valor</th>
            </tr>
            <?php
foreach ($numeros as $key => $value) {
    echo "<tr>";
    echo "<td>$key</td>";
    echo "<td>$value</td>";
    echo "</tr>";
}

?>
        </tbody>
    </table>
</body>
</html>

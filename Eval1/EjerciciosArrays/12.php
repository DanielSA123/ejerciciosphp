<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>
    Ej 12
    </title>
</head>
<body>
    <?php
$deportes = ['futbol', 'baloncesto', 'natacion', 'tenis'];
for ($i = 0; $i < sizeof($deportes); $i++) {
    echo "$deportes[$i] ";
}
echo "<br>";
echo count($deportes);
echo "<br>";
echo reset($deportes);
echo "<br>";
echo next($deportes);
echo "<br>";
echo end($deportes);
echo "<br>";
echo prev($deportes);
?>
</body>
</html>

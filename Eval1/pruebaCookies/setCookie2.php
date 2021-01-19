<?php
if (!isset($_COOKIE["sesion"])) {
    $sesion = sha1(uniqid(rand()));
    $fecha = date('\e\l d/m/Y\ \a\ \l\a\s\ H:i:s');
    setcookie('sesion', $sesion);
    setcookie('fecha', $fecha);
    $mensaje = "Nueva sesion: $sesion - $fecha";
} else {
    $sesion = $_COOKIE['sesion'];
    $fecha = $_COOKIE['fecha'];
    $mensaje = "sesion ya iniciada $sesion - $fecha";
}
$actual = 'hoy es el dia ' . date('d/m/Y') .
'; son las ' . date('H:i:s');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <strong>pag2</strong><br>
    <?=$actual?><br>
    <?=$mensaje?><br>
    <a href="prueba3.php">Pag1</a>
</body>

</html>
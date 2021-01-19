<?php
if (!isset($_GET["vuelta"])) {
    setcookie("prueba", "prueba");
    header("Location: prueba2.php?vuelta=1");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
if (isset($_COOKIE["prueba"])) {
    echo "Cookie aceptada";
} else {
    echo "no aceptada";
}
?>
</body>

</html>
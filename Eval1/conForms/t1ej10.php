<!DOCTYPE html>
<html>

<head>
    <title>
        Ej 10
    </title>
</head>
<?php
include "../funciones.inc";
if (isset($_POST['numero'])) {
    $num = $_POST['numero'];
    if (empty($num)) {
        $error['value'] = 'Dato obligatorio, debe introducir un valor numerico';
    }
    if (ctype_digit($num)) {
        $cars = strlen($num);
        if ($cars < 4 || $cars > 6) {
            $error['length'] = 'El numero debe tener entre 4 y 6 digitos';
        }
        echo join(", ", divisores($num));
    }

}

?>

<body>
    <h1>
        <form name="numero" action="<?php htmlentities($_SERVER['PHP_SELF'])?>" method="post">
            <label for="numero">Numero:</label>
            <input type="number" name="numero" value="<?php isset($num) ? $num : ''?>">
            <?php
echo (isset($error['value']) ? $error['value'] : "");
echo (isset($error['length']) ? $error['length'] : ""); ?>
            <button type="submit">Enviar</button>
        </form>
    </h1>

</body>

</html>
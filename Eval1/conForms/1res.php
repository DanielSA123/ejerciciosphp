<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Res1</title>
</head>

<body>

    <?php
if (isset($_POST['ok'])):
    if (isset($_POST['num1']) && isset($_POST['num2'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        if (is_numeric($num1) && is_int((int) $num1)
        && is_numeric($num2) && is_int((int) $num2)) {
            $suma = (int) ($num1 + $num2);
            $resta = (int) $num1 - $num2;
            $multi = (int) $num1 * $num2;
            $divE = (int) ($num1 / $num2);
            $divR = (float) $num1 / $num2;
            $resto = (int) $num1 % $num2;
        }
    }
    ?>
    <p>Los numeros son: <?=$num1 . " y " . $num2;?> </p>
    <p>La suma es: <?=$suma?></p>
    <p>La resta es: <?=$resta?></p>
    <p>La multiplicación es: <?=$multi?></p>
    <p>La división real es: <?=$divR?></p>
    <p>La división entera es: <?=$divE?></p>
    <p>El resto es: <?=$resto?></p>
    <?php else: ?>
    <p>Los datos introducidos no son valiods, debe introducir dos numeros enteros</p>
    <a href="1form.php">Volver al formulario</a>

    <?php endif;?>
</body>

</html>
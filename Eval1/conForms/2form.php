<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form2</title>
</head>

<body>
    <form name="formCilindro" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <label>Altura del cilindro:</label>
        <input type="text" name="altura"> <span>m</span><br>
        <label>Diametro del cilindro:</label>
        <input type="text" name="diametro"><span>m</span><br>

        <input type="submit" value="Calcular" name="ok">
    </form>
    <?php
if (isset($_POST['ok'])):
    if (isset($_POST['altura']) && isset($_POST['diametro'])):
        $altura = $_POST['altura'];
        $diametro = $_POST['diametro'];
        if (is_numeric($altura) && is_int((int) $altura)
    && is_numeric($diametro) && is_int((int) $diametro)):
            $vol = 3.141596 * $diametro * $diametro * $altura;
            $vol = number_format($vol, 2);?>
			    <p>El volumen del cilindro es: <?=$vol?> m^2</p>
			    <?php
        else:
            $error['value'] = 'Los valores deben ser números enteros';
        endif;
    else:
        $error['vacio'] = 'Error, los campos no pueden estar vacios';
    endif;
endif;?>
    <p style="color: red">
        <?php echo isset($error['vacio']) ? $error['vacio'] : ''; ?>
        <?php echo isset($error['value']) ? $error['value'] : ''; ?></p>
</body>

</html>
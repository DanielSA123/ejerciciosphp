<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form3</title>
</head>

<body>
    <form action="#" method="post">
        <label>Precio en tienda1:</label>
        <input type="text" name="precio1" value="<?php echo isset($precios[0])? $precios[0]:''; ?>"><br>

        <label>Precio en tienda2:</label>
        <input type="text" name="precio2" value="<?php isset($precios[1])? $precios[1]:''; ?>"><br>

        <label>Precio en tienda3:</label>
        <input type="text" name="precio3" value="<?php isset($precios[2])? $precios[2]:''; ?>"><br>

        <input type="submit" name="ok" value="Enviar">
    </form>

    <?php
if (isset($_POST['ok'])):
    if ($_POST['precio1']!="" && $_POST['precio2']!=""
    && $_POST['precio3']!=""):
        $precios[] = $_POST['precio1'];
        $precios[] = $_POST['precio2'];
        $precios[] = $_POST['precio3'];
        
        if (is_numeric($precios[0]) && is_float((float) $precios[0])
    && is_numeric($precios[1]) && is_float((float) $precios[1])
    && is_numeric($precios[2]) && is_float((float) $precios[2])):
        ?>
    <p>El precio medio del producto es: <?= (array_sum($precios) / (count($precios)))?></p>
    <?php
    else:
        $error['value'] = 'Los valores deben ser números';
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
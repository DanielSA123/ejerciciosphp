<?php
include "usuario.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar pedido</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>PizzaNet Dani</h1>
    </header>
    <?php
if (isset($_POST["enviar"])):
    function generarNombre()
{
        $nombres = ["Pedro", "Juan", "Adrian", "Pablo", "Paula", "Maria", "Daniel", "Sara", "David", "Javier", "Andrea"];
        return $nombres[rand(0, sizeof($nombres) - 1)];
    }
    function generarTiempo()
{
        return rand(5, 60);
    }
    ?>
    <div class="wrapper">
        <h2>Pedido realizado por <?=$_SESSION["usuario"]->getNombre()?></h2>
        <p>En <?=generarTiempo()?> minutos el repartidor/repartidora <?=generarNombre()?> realizará la entraga en
            <?=$_SESSION["usuario"]->getDireccion()?></p>
        <h3>GRACIAS POR CONFIAR EN NOSOSTROS</h3>
    </div>
    <?php
elseif (isset($_POST["cancelar"])): ?>
    <div class="wrapper">
        <h2>El pedido ha sido cancelado.</h2>
        <p>Cual ha sido el motivo de la cancelación</p>
        <form action="<?=htmlspecialchars("index.php")?>">
            <textarea name="motivoCancel" id="motivoCancel" cols="100" rows="15"
                placeholder="Escriba aqui sus motivos, porfavor..."></textarea>
            <br>
            <button type="submit" name="fin" value="Enviar">Enviar</button>

        </form>
    </div>
    <?php
else: ?>
    <div class="wrapper">
        <h2>Ha ocurrido un error, inténtelo más tarde.</h2>
        <h3>Sentimos las molestias ocasionadas.</h3>
    </div>
    <?php
endif;

?>

</body>

</html>
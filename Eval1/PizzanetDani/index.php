<!DOCTYPE html>
<html lang="en">
<?php
include 'usuario.php';
include 'pizza.php';
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PizzaNet Dani</title>
</head>

<body>

    <header>
        <h1>PizzaNet Dani</h1>
    </header>
    <div class="wrapper">
        <?php
if (isset($_POST["ok"])):
    $usuario = new Usuario($_POST["nombre"], $_POST["direccion"], $_POST["telefono"], $_POST["email"]);
    $errores = $usuario->getErrores();
    $pizzas = [];
    $total = 0;
    for ($i = 1; $i <= $_SESSION["nPizzas"]; $i++) {
        try {
            $pizzas[$i] = new Pizza();
            $actual = $_POST["pizza" . $i];
            $pizzas[$i]->setTipo($actual["tipo"]);
            $pizzas[$i]->setTamanio($actual["tamanio"]);
            $pizzas[$i]->setMasa(isset($actual["masa"]) ? $actual["masa"] : "");
            $extras = [];
            {
                isset($actual["queso"]) ? $extras[] = $actual["queso"] : "";
                isset($actual["pimiento"]) ? $extras[] = $actual["pimiento"] : "";
                isset($actual["cebolla"]) ? $extras[] = $actual["cebolla"] : "";
                isset($actual["jamon"]) ? $extras[] = $actual["jamon"] : "";
                isset($actual["pollo"]) ? $extras[] = $actual["pollo"] : "";
            }
            $pizzas[$i]->setExtras($extras);
            $pizzas[$i]->setCantidad($actual["cantidad"]);
            $total += $pizzas[$i]->precio();
        } catch (Exception $e) {
            $errores[] = $e->getMessage();
        }

    }
    if (!isset($errores[0])):
        $_SESSION['usuario'] = $usuario;
        ?>

        <h2>Resumen del pedido</h2>
        <h3>Datos del cliente</h3>
        <ul>
            <li><b>Nombre: </b><?=$usuario->getNombre()?></li>
            <li><b>Dirección: </b><?=$usuario->getDireccion()?></li>
            <li><b>Teléfono: </b><?=$usuario->getTelefono()?></li>
            <li><b>Email: </b><?=$usuario->getEmail()?></li>
        </ul>
        <h3>Pizzas en el pedido</h3>
        <ul>
            <?php
        foreach ($pizzas as $pizza):
        ?>
            <li>
                <?=$pizza->getCantidad() . " de " . $pizza->getTipo() . " tamaño " . $pizza->getTamanio() . ", con masa " . $pizza->getMasa()?>
                <?php
        if (!empty($pizza->getExtras())):
            echo " y con extra " . join(",", $pizza->getExtras());
        endif;
        echo '<span class="derecha">' . $pizza->precio() . "€</span>";
        ?>

            </li>
            <?php
    endforeach;

    ?>
        </ul>
        <h4><i>El precio total es <?=$total?>€</i></h4>
        <form action="envio.php" method="post">
            <button type="submit" id="enviar" name="enviar">Enviar</button>
            <button type="submit" id="cancelar" name="cancelar">Cancelar</button>
        </form>
        <?php else:
    foreach ($errores as $error) {
        echo '<p class="error">' . $error . '</p>';
    }
    include 'form.php';

endif;
else:
    include 'form.php';
endif;
?>
    </div>
</body>

</html>
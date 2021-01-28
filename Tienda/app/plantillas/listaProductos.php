<?php ob_start() ?>

<div style="background: gray">

    <br>
    <h4 class="container text-center mt-4 font-weight-bold">Tienda onLine</h4>
    <div class="container mt-3">
        <form class="form-inline" name="vaciar" method="POST" action='<?php echo $_SERVER['PHP_SELF']; ?>'>
            <a href="cesta.php" class="btn btn-success mr-2">Ir a Cesta</a>
            <input type='submit' value='Vaciar Carro' class="btn btn-danger" name="vaciar">
        </form>
        <table class="table table-striped table-dark mt-3">
            <thead>
                <tr class="text-center">
                    <th scope="col">Añadir</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Añadido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($respuesta as $filas) : ?>
                    <tr>
                        <th scope='row' class='text-center'>
                            <form action='<?= $_SERVER[' PHP_SELF'] ?>' method='POST'>
                                <input type='hidden' name='id' value='<?= $filas->id ?>'>
                                <input type='submit' class='btn btn-primary' name='comprar' value='Añadir'>
                            </form>
                        </th>
                        <td><?= $filas->nombre ?>, Precio: <?= $filas->pvp ?> (€)</td>
                        <td class='text-center'>
                            <?php
                            if (isset($_SESSION['cesta'][$filas->id])) : ?>
                                <i class='fas fa-check fa-2x'></i>
                            <?php else : ?>
                                <i class='far fa-times-circle fa-2x'></i>
                            <?php
                            endif;
                            ?>
                        <td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>

    </div>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
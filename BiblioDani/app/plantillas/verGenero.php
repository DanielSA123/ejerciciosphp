<?php ob_start() ?>

<div id="infoGenero">
    <?php if (isset($vacio)) : ?>
        <p><?= $vacio ?></p>
    <?php else : ?>
        <p><strong>Nombre del genero:</strong>
            <?= $genero["nombre"] ?>
        </p>
        <p> <strong>Descripcion:</strong>
            <?= $genero["descripcion"] ?>
        </p>
    <?php endif; ?>
    <p class="centrado"><a href="index.php">Volver</a></p>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
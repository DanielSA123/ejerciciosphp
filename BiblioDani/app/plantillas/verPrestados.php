<?php ob_start() ?>


<div id="misLibros">
    <?php
    if (empty($misLibros)) : ?>
    <h2>En este momento no tienes ningun libro prestado</h2>
    <?php else : ?>
    <table class="centrado">
        <tr>
            <th>Titulo</th>
            <th>Devolver</th>
        </tr>
        <?php foreach ($misLibros as $value) : ?>
        <tr>
            <form action="index.php?ctl=devolver" method="post">
                <input type="hidden" name="ejemplar" value="<?= $value['idEjemplar'] ?>">
                <input type="hidden" name="usuario" value="<?= $value['idUsuario'] ?>">
                <td><?= $value['titulo'] ?></td>
                <td><input type="submit" name="devolver" value="Devolver"></td>
            </form>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>

    <p class="centrado"><a href="index.php">Volver</a></p>
</div>


<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
<?php ob_start() ?>


<div id="misLibros">
    <?php
    if (empty($misLibros)) : ?>
        <h2>En este momento no tienes ningun libro prestado</h2>
    <?php else : ?>
        <table class="centrado">
            <tr>
                <th>Titulo</th>
            </tr>
            <?php foreach ($misLibros as $value) : ?>
                <tr>
                    <td><?= $value['titulo'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <p class="centrado"><a href="index.php">Volver</a></p>
</div>


<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
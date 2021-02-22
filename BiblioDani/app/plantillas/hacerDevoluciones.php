<?php ob_start() ?>
<div id="misLibros">
    <?php if (empty($prestados)) : ?>
        <p class="centrado">No hay prestamos en este momento</p>
    <?php else : ?>
        <table class="centrado">
            <thead>
                <tr>
                    <th>Libro</th>
                    <th>Usuario</th>
                    <th>Ejemplar</th>
                    <th>Devolver</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prestados as $value) : ?>
                    <tr>
                        <td><?= $value['titulo'] ?></td>
                        <td>
                            <?= $value['nombre'] ?>
                        </td>
                        <td><?= $value['idEjemplar'] ?></td>
                        <td><a href="index.php?ctl=devolver&ejemplar=<?= $value['idEjemplar'] ?>">Devolver</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <br>
    <p class="centrado"><a href="index.php">Volver</a></p>
</div>
<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
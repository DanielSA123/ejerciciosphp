<?php ob_start() ?>

<div id="misLibros">
    <?php if (empty($reservas)) : ?>
        <p class="centrado">No hay reservas en este momento</p>
    <?php else : ?>
        <table class="centrado">
            <thead>
                <tr>
                    <th>Libro</th>
                    <th>Usuario</th>
                    <th>Ejemplar</th>
                    <th>Aceptar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $value) : ?>
                    <tr>
                        <td><?= $value['titulo'] ?></td>
                        <td>
                            <?= $value['nombre'] ?>
                        </td>
                        <td><?= $value['idEjemplar'] ?></td>
                        <td>
                            <form action="index.php?ctl=aceptar" method="POST">
                                <input type="hidden" name="usuario" value="<?= $value['idUsuario'] ?>">
                                <input type="hidden" name="ejemplar" value="<?= $value['idEjemplar'] ?>">
                                <input type="hidden" name="reserva" value="<?= $value['idReserva'] ?>">
                                <input type="submit" name="aceptar" value="Aceptar">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>
    <p class="centrado"><a href="index.php">Volver</a></p>
</div>
<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
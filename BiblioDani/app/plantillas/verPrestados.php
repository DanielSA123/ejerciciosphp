<?php ob_start() ?>

<table>
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


<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
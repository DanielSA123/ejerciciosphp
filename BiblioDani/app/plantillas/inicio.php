<?php ob_start() ?>

<div id="listaLibros">
    <?php foreach ($libros as $value) : ?>
        <form action="index.php?ctl=verEjemplares" method="post">
            <div>
                <p><strong>Título:</strong>
                    <?= $value['titulo'] ?>.</p>
                <p><strong>Género:</strong>
                    <?= $value['nombre'] ?>.
                </p>
                <p><strong>Autor:</strong>
                    <?= $value['autor'] ?>.</p>
                <p><strong>Idioma:</strong>
                    <?= $value['idioma'] ?>.</p>
                <p><strong>Resumen:</strong>
                    <?= $value['resumen'] ?>.</p>
                <input type="hidden" name="idLibro" value="<?= $value['idLibro'] ?>">
                <input type="submit" name="verEjemplares" value="Reservar">
            </div>
        </form>
    <?php endforeach; ?>
</div>


<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
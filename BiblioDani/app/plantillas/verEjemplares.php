<?php ob_start() ?>
<div id="listaEjemplares">
    <h2>Hay <?= count($ejemplares) ?> ejemplares disponibles del libro</h2>

    <?php for ($i = 1; $i <= count($ejemplares); $i++) : ?>
        <form action="index.php?ctl=reservar" method="post">

            Ejemplar <?= $i ?>:<input type="submit" name="reservar" value="Reservar">

        </form>
    <?php endfor; ?>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
<?php ob_start() ?>

<?php if (isset($_SESSION['reservado'])) {
    echo '<p class="reservado">' . $_SESSION['reservado'] . '</p>';
    unset($_SESSION['reservado']);
} ?>
<?php if (isset($_SESSION['devolver'])) {
    echo '<p class="devolver">' . $_SESSION['devolver'] . '</p>';
    unset($_SESSION['devolver']);
} ?>

<div id="busqueda">
    <form action="index.php?ctl=buscarLibro" method="post">
        <input type="text" name="titulo" value="" placeholder="Titulo">
        <input type="text" name="autor" value="" placeholder="Autor">
        <select name="genero">
            <option value="">Elige un genero</option>
            <?php
            foreach ($generos as $value) :
            ?>
            <option value="<?= $value['nombre'] ?>"><?= $value['nombre'] ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <select name="idioma">
            <option value="">Elige un idioma</option>
            <?php
            foreach ($idiomas as $value) :
            ?>
            <option value="<?= $value['idioma'] ?>"><?= $value['idioma'] ?></option>
            <?php
            endforeach;
            ?>
        </select>

        <input type="submit" value="Buscar" name="buscar">
    </form>
</div>

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
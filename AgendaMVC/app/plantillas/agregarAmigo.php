<?php ob_start() ?>

<form action="" method="post">
    <fieldset>
        <legend>Agregar un amigo a la agenda</legend>
        <label>Ciudad:
            <select name="datos[ciudad]">
                <?php if (!empty($datos['ciudad'])) : ?>
                    <option value="<?= $datos['ciudad'] ?>" selected><?= $datos['ciudad'] ?></option>
                <?php else : ?>
                    <option value="">Selecciona una ciudad</option>
                <?php endif; ?>
                <?php foreach ($provincias as $value) : ?>
                    <option value="<?= $value['nombre'] ?>"><?= $value['nombre'] ?></option>
                <?php endforeach; ?>
            </select>
        </label><br>
        <label>Nombre:
            <input type="text" name="datos[nombre]" value="<?= !empty($datos['nombre']) ? $datos['nombre'] : '' ?>">
        </label><?= (isset($errores['nombre'])) ? "<span class='error'> * {$errores['nombre']}</span>" : '' ?>
        <br>
        <label>Edad:
            <input type="text" name="datos[edad]" value="<?= !empty($datos['edad']) ? $datos['edad'] : '' ?>">
        </label><?= (isset($errores['edad'])) ? "<span class='error'> * {$errores['edad']}</span>" : '' ?>
        <br>
        <label>Teléfono:
            <input type="text" name="datos[tlfno]" value="<?= !empty($datos['tlfno']) ? $datos['tlfno'] : '' ?>">
        </label><?= (isset($errores['tlfno'])) ? "<span class='error'> * {$errores['tlfno']}</span>" : '' ?>
        <br>
        <input type="submit" name="ok" value="Guardar">
    </fieldset>
</form>

<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
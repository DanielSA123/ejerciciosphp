<?php ob_start();
$j = count($datos);
if ($j) :

    $claves = array_keys($datos[0]);
    $k = count($claves) - 1;
?>
    <form action="" method="POST">
        <table>
            <caption>Listado telefónico de amigos</caption>
            <tr>
                <?php for ($i = 0; $i < $k; $i++) : ?>
                    <th><?= $claves[$i] ?></th>
                <?php endfor; ?>
            </tr>
            <?php for ($i = 0; $i < $j; $i++) : ?>
                <tr>
                    <?php for ($l = 0; $l < $k; $l++) : ?>
                        <td><?= $datos[$i][$claves[$l]] ?></td>
                    <?php endfor; ?>
                    <td><input type="checkbox" name="borrar[<?= $i ?>]" value="<?= $datos[$i][$claves[$k]] ?>"></td>
                </tr>
            <?php endfor; ?>
            <tr>
                <td colspan="<?= $k + 1 ?>"><input type="submit" name="ok" value="Borrar"></td>
            </tr>
        </table>
    </form>
<?php
endif;
$contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
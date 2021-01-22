<?php ob_start();
$j = count($datos);
if ($j) :

    $claves = array_keys($datos[0]);
?>
    <table>
        <caption>Listado telefónico de amigos</caption>
        <tr>
            <?php foreach ($claves as $value) : ?>
                <th><?= $value ?></th>
            <?php endforeach; ?>
        </tr>
        <?php foreach ($datos as $valor) : ?>
            <tr>
                <?php foreach ($valor as $va) : ?>
                    <td><?= $va ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>

<?php
endif;
$contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
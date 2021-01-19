<?php
session_start();
if (isset($_GET['accion']))
  $accion = $_GET['accion'];
else
  $accion = 'mostrar';


$dfn = "sqlsrv:server=(local);Database=Agenda";
$sql = "SELECT a.Nombre, Edad, Telefono, p.Nombre as Provincia 
from agenda a INNER JOIN provincia p on p.codProvincia=a.codProvincia";
$sql2 = "SELECT codProvincia, Nombre from provincia";


//var_dump($agenda);
if (isset($_POST['ok'])) {
  $ciudad = $_POST['ciudad'];
  $datos = $_POST['datos'];
  //var_dump($datos);
  include 'amigo.inc';
  try {
    $objeto = new Amigo($ciudad, $datos);
    $agenda[$ciudad][] = $datos;
    $agenda[$objeto->getCiudad()][] = [$objeto->getNombre(), $objeto->getEdad(), $objeto->getTlfno()];
    $_SESSION['agenda'] = $agenda;
  } catch (AmigoException $ex) {
    $accion = "modificar";
    $errores = $ex->getErrores();
    //var_dump($errores);
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <style>
    .error {
        color: red;
    }

    table {
        margin: auto;
    }

    th {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 1.2rem;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }
    </style>
</head>

<body>
    <header>
        <h1>Agenda telefónica de los amigos</h1>
        <nav>
            <a href="?accion=modificar">Agregar un amigo</a> | <a href="?accion=mostrar">Ver los amigos</a> |
            <a href="?accion=eliminar">Quitar un amigo</a>
        </nav>
    </header>
    <?php if ($accion == 'mostrar') : ?>

    <?php
    try {
      $con = new PDO($dfn);
      $stm = $con->prepare($sql);
      $stm->execute();
      $agenda = $stm->fetchAll(PDO::FETCH_ASSOC);
      $claves = array_keys($agenda[0]);
    ?>
    <table>
        <caption>Listado telefónico de amigos</caption>
        <tr>
            <?php foreach ($claves as $value) : ?>
            <th><?= $value ?></th>
            <?php endforeach; ?>
        </tr>
        <?php foreach ($agenda as $valor) : ?>
        <tr>
            <?php foreach ($valor as $va) : ?>
            <td><?= $va ?></td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
        <?php
    } catch (PDOException $ex) {
      die(print_r($ex->getMessage()));
    } finally {
      $stm = null;
      $con = null;
    }
      ?>
    </table>
    <?php else : ?>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post"
        <?= $accion == 'modificar' ? '' : 'hidden' ?>>
        <fieldset>
            <legend>Agregar un amigo a la agenda</legend>
            <label>Ciudad:

                <?php
            try {
              $con = new PDO($dfn);
              $stm = $con->prepare($sql2);
              $stm->execute();
              $provincias = $stm->fetchAll(PDO::FETCH_ASSOC); ?>
                <select name="ciudad">
                    <?php if (!empty($ciudad)) : ?>
                    <option value="<?= $ciudad ?>" selected><?= $ciudad ?></option>
                    <?php else : ?>
                    <option value="">Selecciona una provincia</option>
                    <?php endif; ?>
                    <?php foreach ($provincias as $value) :
                ?>
                    <option value="<?= $value["codProvincia"] ?>"><?= $value["Nombre"] ?></option>
                    <?php endforeach; ?>
                </select>
                <?php
            } catch (PDOException $ex) {
              print_r($ex->getMessage());
            } finally {
              $stm = null;
              $con = null;
            }
            ?>

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
    <form action="" <?= $accion == 'eliminar' ? '' : 'hidden' ?>>
        <fieldset>
            <legend>Eliminar amigo de la agenda</legend>
            <table>
                <caption>Listado telefónico de amigos</caption>
                <?php foreach ($agenda as $key => $value) : ?>
                <tr>
                    <th colspan="3"><?= $key ?></th>
                </tr>
                <?php if (isset($value[0])) :
                $cabecera = array_keys($value[0]); ?>
                <tr>
                    <?php foreach ($cabecera as $val) : ?>
                    <th><?= $val ?></th>
                    <?php endforeach; ?>

                </tr>
                <?php foreach ($value as $clave => $valor) : ?>
                <tr>
                    <?php foreach ($valor as $cla => $va) : ?>
                    <td><?= $va ?></td>
                    <?php endforeach; ?>
                    <td><a href="?ciudad=<?= $key ?>&elemento=<?= $clave ?>">Borrar <?= $key . ' ' . $clave ?></a></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
                <?php endforeach; ?>
            </table>
        </fieldset>
    </form>
    <?php endif; ?>
</body>

</html>
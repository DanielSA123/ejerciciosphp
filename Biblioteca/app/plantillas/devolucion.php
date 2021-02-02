<?php
/* Ejemplo de plantilla que se mostrará dentro de la plantilla principal
  ob_start() activa el almacenamiento en buffer de la página. Mientras se
             almacena en el buffer no se produce salida alguna hacia el
             navegador del cliente
  luego viene el código html y/o php que especifica lo que debe aparecer en
     el cliente web
  ob_get_clean() obtiene el contenido del buffer (que se pasa a la variable
             $contenido) y elimina el contenido del buffer
  Por último se incluye la página que muestra la imagen común de la aplicación
    (en este caso base.php) la cual contiene una referencia a la variable
    $contenido que provocará que se muestre la salida del buffer dentro dicha
    página "base.php"
*/
 ?>
<?php ob_start() ?>

<form action="index.php?ctl=devolverLibros" method="post">
  Ejemplar a devolver:
  <select name="ejemplarDevuelto">
    <option value=""></option>
    <?php foreach ($lista as $key => $value): ?>
      <option value="<?= $value['id'] ?>"><?= $value['id'] ?></option>
    <?php endforeach; ?>
  </select>
  <br><br>
  <input type="submit" name="devolver" value="Devolver libro">
</form> <br><br>
<?php
  var_dump($_SESSION);
  if (isset($_POST['devolver'])) {
    echo "<pre>";
    var_dump($_POST['ejemplarDevuelto']);
    echo "</pre>";
    if ($dev == true) {
      echo "Libro devuelto";
    } else {
      echo "Libro no devuelto";
    }
  }
?>
 <?php $contenido = ob_get_clean() ?>

 <?php include 'base.php' ?>

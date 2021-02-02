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

<form action="index.php?ctl=registroUsuario" method="post">
  <strong><label>Nombre: </label></strong>
  <input type="text" name="nombre" value=""><br><br>
  <strong><label>Dirección: </label></strong>
  <input type="text" name="direccion" value=""><br><br>
  <input type="submit" name="registrar" value="Registrar">
</form> <br><br>

<?php
  if (isset($_POST['registrar'])) {
    if (isset($_SESSION['errores']['registro'])) {
      $errores = $_SESSION['errores']['registro'];
      echo "<span style='color:red'> $errores </span>";
    } else{
      echo "<span style='color:green'> Registro completado </span> ";
    }
  }
 ?>
 <?php $contenido = ob_get_clean() ?>

 <?php include 'base.php' ?>

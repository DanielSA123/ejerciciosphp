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
$reserva = "";
 ?>
<?php ob_start() ?>
<pre>
<?php
  //var_dump($_SESSION);
  $usu="";
?>
</pre>
 <div>
   <form action="index.php?ctl=inicioSesion" method="post">
     <fieldset style="border: 1px solid black; padding: 10px; width:200px; float: right;">
     <legend><strong>Inicio de sesión</strong></legend>
     <label>Usuario: </label><br>
     <input type="number" name="idUsuario" value=""><br><br>
     <input type="submit" name="entrar" value="Entrar">
     <a href="index.php?ctl=registroForm">Registrate</a><br><br>
     <!-- <?php //if (isset($_SESSION['errores']['usu'])): ?>
       <?php //$errores = $_SESSION['errores']['usu']; ?>
       <span style='color:red'> <?php //$errores?> </span> <br>
     <?php //endif; ?> -->
     <?php
     if (isset($_POST['entrar'])) {
       if (isset($_SESSION['errores']['usu'])) {
         $errores = $_SESSION['errores']['usu'];
         echo "<span style='color:red'> $errores </span> <br>";
       } else{
         echo "<span style='color:green'> Usuario conectado </span> <br>";
       }
     }
     ?>
     </fieldset>
   </form>
 </div>
  <?php
    if (!isset($_POST['enviar'])) {
      ?>
      <form action="index.php?ctl=reservar" method="post">
        <fieldset style="border: 1px solid black; padding: 10px; width:200px;"s>
          <legend><strong>Ejemplares disponibles</strong></legend>
          <label>Seleccione el que desea: </label><br><br>
          Ejemplar
          <select name="idEjemplar">
            <option value=""></option>
          <?php foreach ($_SESSION['ids'] as $key => $value): ?>
            <option value="<?= $value['id'] ?>"><?=$value['id']?></option>
          <?php endforeach; ?>
          </select>
          <br><br>
          <input type="submit" name="enviar" value="Reservar">
        </fieldset>
      </form>
      <?php
    }
    /*if (isset($_POST['entrar'])) {
      if ($usu) {
        //echo "Logging correcto <br>";
      } else{
        //echo "No se ha podido iniciar sesion <br>";
      }
    }*/
    if (isset($_POST['enviar'])) {
      if ($reserva) {
        echo "Reserva realizada <br>";
      } else{
        if (!$usu) {
            //var_dump($_SESSION['ids']);
            ?>
            <form action="index.php?ctl=reservar" method="post">
              <fieldset style="border: 1px solid black; padding: 10px; width:200px;"s>
                <legend><strong>Ejemplares disponibles</strong></legend>
                <label>Seleccione el que desea: </label><br><br>
                Ejemplar
                <select name="idEjemplar">
                  <option value=""></option>
                  <?php foreach ($_SESSION['ids'] as $key => $value): ?>
                    <option value="<?= $value['id'] ?>"><?=$value['id']?></option>
                  <?php endforeach; ?>
                </select>
                <br><br>
                <input type="submit" name="enviar" value="Reservar">
              </fieldset>
              <br>
              <?php //if (isset($_SESSION['errores']['reserva'])): ?>
                <?php //$errores = $_SESSION['errores']['reserva']; ?>
                <!-- <span style='color:red'> <?php //$errores?> </span> <br> -->
              <?php //endif; ?>
              <?php
                if (isset($_SESSION['errores']['reserva'])) {
                  $errores = $_SESSION['errores']['reserva'];
                  echo "<span style='color:red'> $errores </span> <br>";
                } else {
                  echo "<span style='color:green'> Reserva realizada </span> <br>";
                }
              ?>
            </form>
            <?php
        }
      }
    }
  ?>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'base.php' ?>

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
<?php
  //var_dump($librosDisponibles[0]);
?>

  <form action="index.php?ctl=hacerReserva" method="post">
    <div style="border:1px solid; padding: 10px;">
      <p><strong>Título:</strong>
      <?= $librosDisponibles[0]['titulo']?>.</p>
      <p><strong>Género:</strong>
      <?= $librosDisponibles[0]['genero'] ?>.
      <details>
        <summary>Descripción</summary>
        <?= $librosDisponibles[0]['resumen'] ?>.
      </details></p>
      <p><strong>Autor:</strong>
      <?= $librosDisponibles[0]['autor'] ?>.</p>
      <p><strong>Idioma:</strong>
      <?= $librosDisponibles[0]['idioma'] ?>.</p>
      <p><strong>Resumen:</strong>
      <?= $librosDisponibles[0]['resumen'] ?>.</p>
      <p><strong>Ejemplares disponibles: </strong>
        <?php foreach ($librosDisponibles as $key => $value): ?>
          <?php
          if ($value == 'idUsuario') {
            if($value == null){
              $num++;
            }
          }
          ?>
        <?php endforeach; ?>

        <?php
        $num = 0;
        foreach ($librosDisponibles as $clave => $valor) {
          foreach($valor as $key => $value){
            if ($key == 'idUsuario') {
              if($value == null){
                $num++;
              }
            }
          }
        }
        if ($num != 0) {
          echo "$num";
          //var_dump($_SESSION);
        } else{
          echo "<span style='color:red'>No hay ejemplares disponibles.</span>";
        }
        ?>
      </p>
      <input type="hidden" name="idLibro" value="<?= $value['id'] ?>">
      <input type="submit" name="reserva" value="Reservar">
    </div>
  </form>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'base.php' ?>

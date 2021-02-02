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
<form action="index.php?ctl=busqueda" method="post">
  Género:
  <input type="text" name="genero" value="">
  Título:
  <input type="text" name="titulo" value="">
  Idioma:
  <input type="text" name="idioma" value="">
  Autor:
  <input type="text" name="autor" value="">
  <input type="submit" name="buscar" value="Buscar">
</form> <br><br>

  <?php
    if (!isset($_POST['buscar'])) {
      ?>
        <?php foreach ($todos as $key => $value): ?>
          <form action="index.php?ctl=verReservas" method="post">
            <div style="border:1px solid; padding: 10px;">
              <p><strong>Título:</strong>
              <?= $value['titulo']?>.</p>
              <p><strong>Género:</strong>
              <?= $value['genero'] ?>.
              <details>
                <summary>Descripción</summary>
                <?= $value['descripcion'] ?>.
              </details></p>
              <p><strong>Autor:</strong>
              <?= $value['autor'] ?>.</p>
              <p><strong>Idioma:</strong>
              <?= $value['idioma'] ?>.</p>
              <p><strong>Resumen:</strong>
              <?= $value['resumen'] ?>.</p>
              <input type="hidden" name="idLibro" value="<?= $value['id'] ?>">
              <input type="submit" name="reserva" value="Reservar">
            </div>
          </form>
        <?php endforeach; ?>
      <?php
    }
   ?>

    <?php
    if (isset($_POST['buscar'])) {
      ?>
        <?php foreach ($datos as $key => $value): ?>
          <form action="index.php?ctl=verReservas" method="post">
            <div style="border:1px solid; padding: 10px;">
              <p><strong>Título:</strong>
              <?= $value['titulo']?>.</p>
              <p><strong>Género:</strong>
              <?= $value['genero'] ?>.
              <details>
                <summary>Descripción</summary>
                <?= $value['descripcion'] ?>.
              </details></p>
              <p><strong>Autor:</strong>
              <?= $value['autor'] ?>.</p>
              <p><strong>Idioma:</strong>
              <?= $value['idioma'] ?>.</p>
              <p><strong>Resumen:</strong>
              <?= $value['resumen'] ?>.</p>
              <input type="hidden" name="idLibro" value="<?= $value['id'] ?>">
              <input type="submit" name="reserva" value="Reservar">
            </div>
          </form>
        <?php endforeach; ?>
      <?php
    }
    ?>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'base.php' ?>

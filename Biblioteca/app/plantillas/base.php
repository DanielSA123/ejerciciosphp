<!-- Vista común a la mayoría (sino todas) las vistas de la aplicación
     Suele contener la imagen corporativa de la apliación Web
     Concretamente esta página contiene el nombre de la empresa
     "Cadena Tiendas Media" y una barra de hiperenlaces con un enalace a la
     página home, llamado "inicio"
     El nombre del archivo es indiferente: layout, comun, etc.
-->
<!DOCTYPE html>
<html>
  <head>
    <title>Biblioteca</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href='web/css/resposnive.css' />
  </head>
  <body>
    <header>
      <h1>Bienvenido a nuestra biblioteca</h1>
      <h3>Podrá encontrar libros de todo tipo, que los disfrute</h3>
    </header>
    <nav>
      <hr>
      <a href="index.php?ctl=inicio">Inicio</a> |
      <?php if ($_SESSION['usuario'] && (isset($_POST['entrar']) || isset($_POST['devolver']))): ?>
        <a href="index.php?ctl=dejarLibros">Devolver libro</a> |
        <a href="index.php?ctl=resetSesion">Cerrar sesión</a> |
      <?php endif; ?>

      <hr>
    </nav>
    <div id="contenido">
      <?php
        //var_dump($_SESSION);
      ?>

      <?= $contenido ?>
    </div>
    <footer>
      <hr>
      <p align="center">- Pie de página -</p>
    </footer>
  </body>
</html>

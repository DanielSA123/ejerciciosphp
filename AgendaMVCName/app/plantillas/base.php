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
    <title>Agenda</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href='web/css/resposnive.css' />


</head>

<body>
    <header class="headerBase">
        <h1>Agenda de amigos</h1>
    </header>
    <nav>
        <hr>
        <!-- Observa cómo el enlace agrega el valor de la variable GET 'ctl'
           que será analizado en la página index.php, en este caso le da el
           valor 'inicio' para que la vista cambie a la página home de la
           aplicación
       -->
        <a href="index.php?ctl=inicio">Inicio</a> |
        <!-- En general, la mayoría de los enlaces serán a la página index.php
           y una asignación a la variable 'ctl'. El valor de la variable deberá
           ser analizada en la página index.php de cara a encontrar la ruta del
           controlador (y método) que debe procesar la petición
      -->
        <?php if (isset($_SESSION['login'])) : ?>
            <a href="index.php?ctl=agregar">Agregar amigo</a> |
            <a href="index.php?ctl=ver">Ver la agenda</a> |
            <a href="index.php?ctl=quitar">Eliminar amigo</a>|
            <a href="index.php?ctl=logout">Cerrar Sesion</a>
            <form action="index.php?ctl=buscar" method="post">
                <input type="text" name="nombreBuscar" placeholder="Buscar Amigo/Provincia" value="<?= isset($_POST['nombreBuscar']) ? $_POST['nombreBuscar'] : '' ?>">
                <input type="submit" value="Buscar" name="busca">
            </form>
        <?php else : ?>
            <a href="index.php?ctl=login">Iniciar Sesion</a> |
            <a href="index.php?ctl=signin">Registrarse</a>
        <?php endif; ?>
        <?= isset($_SESSION["usuario"]) ? '<div class="saludo">Bienvenido/a ' . $_SESSION['nombreUsuario'] . '</div>' : '' ?>
        <hr>
    </nav>
    <div id="contenido">
        <!-- el id css facilita (si se define) la definición del aspecto visual
           de su contenido
           La variable $contenido hará que se muestre la plantilla concreta, el
           contenido concreto, según la solicitud realizada por el usuario
      -->
        <?= $contenido ?>
    </div>
    <footer>
        <hr>
        <p style="text-align:center">- Pie de página -</p>
        <address>
            Juan Hilda <br>
            Esctibeme a <a href="juan@gmail.com">juan@gmail.com</a>
        </address>
    </footer>
</body>

</html>
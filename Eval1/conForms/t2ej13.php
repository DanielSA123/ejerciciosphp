<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>
        Ej 13
    </title>
</head>

<body>
    <h1>Añadir amigo</h1>
    <form name="Add" action="mostrar.php" method="post">
        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" id="ciudad" required><br><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>
        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" required><br><br>
        <label for="tlf">Telefono:</label>
        <input type="tel" name="tlf" id="tlf" required><br><br>
        <button type="submit">Añadir y mostrar todos</button>

    </form>
    <br>

    <a href="mostrar.php"><button type="submit">Mostrar agenda</button></a>


</body>

</html>
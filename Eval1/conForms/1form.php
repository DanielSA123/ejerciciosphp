<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form1</title>
</head>
<body>
    <form name="envioNums" action="1res.php" method="post">
        <label>Introduce un número:</label>
        <input type="number" name="num1" id="num1" required><br>
        <label>Introduce otro número:</label>
        <input type="number" name="num2" id="num2" required><br>
        <input type="submit" name="ok" value="Enviar">
    </form>
</body>
</html>
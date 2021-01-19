<!DOCTYPE html>
<html>
    <head>
        <title>
            Prueba 4
        </title>
    </head>
    <body>
    
        <h1>Prueba 4<br></h1>
        <?php 
        $foo = 'Bob';
        $bar = &$foo;
        $bar = "Mi nombre es $bar";
        echo $bar;
        echo "<br>";
        echo $foo;

         ?>
    </body>
</html>
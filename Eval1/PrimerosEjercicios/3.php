<!DOCTYPE html>
<html>
    <head>
        <title>
            Ej 3
        </title>
    </head>
    <body>        
        <?php 
            $var1 = 5;
            $var2 = 10;
            echo 'Tipo de la varaible $var1: '. gettype($var1);
            echo '<br>Tipo de la variable $var2: '. gettype($var2);
            echo '<br>Valor de $var1: '. $var1;
            echo '<br>Valor de $var2: '. $var2;
            echo "<br>$var1 + $var2 son " . ($var1+$var2);
            echo "<br>$var1 * $var2 son " . ($var1*$var2);
            echo "<br>$var1 / $var2 es " . (int)($var1/$var2);
            echo "<br>$var1 / $var2 es " . (float)($var1/$var2);
            echo "<br>$var1 modulo $var2 es " . ($var1%$var2);            
         ?>
    </body>
</html>
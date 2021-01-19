<!DOCTYPE html>
<html>
    <head>
        <title>
            Ej 9
        </title>
    </head>
    <body>        
        <?php 
            $var1= 10;
            $var2 = 5;
            $var3 = 6.2;            
            echo "Orden antes: \$var1 = $var1, \$var2 = $var2, \$var3 = $var3<br>";
            
            $array = array($var1,$var2,$var3);

            sort($array);
            $var1 = $array[0];
            $var2 = $array[1];
            $var3 = $array[2];
            echo "Orden despues: \$var1 = $var1, \$var2 = $var2, \$var3 = $var3";
            ?>         
    </body>
</html>
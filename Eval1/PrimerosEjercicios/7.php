<!DOCTYPE html>
<html>
    <head>
        <title>
            Ej 7
        </title>
    </head>
    <body>        
        <?php 
            define("PI","3.141597");
            $r = 5;   
            echo "El radio del circulo es $r cm. <br>";
            echo "La longitud del circulo vale <b>2*PI*r</b> = " . (float)(2*constant('PI')*$r) ."cm.<br>";
            echo "El area del circulo vale <b>PI*r^2</b> = " . (float)($r*constant('PI')*$r) . "cm^2";
         ?>

         
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Ej 6
        </title>
    </head>
    <body>        
        <?php 
            define('VALOR_EURO','166.386');
            $monedas = array(1,5,10,25,50,100,200,500,1000,2000,5000);
            echo "<h1>Bucle for</h1>";
            for($i=0;$i<count($monedas);$i++){
                echo "El valor real es $monedas[$i] pts =  " . (float)($monedas[$i]/constant('VALOR_EURO')) . "€<br>" ; 
                echo "El valor aproximado es $monedas[$i] pts =  " .
                 number_format((float)($monedas[$i]/constant('VALOR_EURO')),2) . "€<br><br>" ; 
            }
            echo "<h1>Bucle while</h1>";
            $cont1 = 0;
            while($cont1 < count($monedas)){
                echo "El valor real es $monedas[$cont1] pts =  " . (float)($monedas[$cont1]/constant('VALOR_EURO')) . "€<br>" ; 
                echo "El valor aproximado es $monedas[$cont1] pts =  " .
                 number_format((float)($monedas[$cont1]/constant('VALOR_EURO')),2) . "€<br><br>" ; 
                $cont1++;
            }
            echo "<h1>Bucle do-while</h1>";
            $cont2 = 0;
            do{
                echo "El valor real es $monedas[$cont2] pts =  " . (float)($monedas[$cont2]/constant('VALOR_EURO')) . "€<br>" ; 
                echo "El valor aproximado es $monedas[$cont2] pts =  " .
                 number_format((float)($monedas[$cont2]/constant('VALOR_EURO')),2) . "€<br><br>" ; 
                $cont2++;
            }while($cont2<count($monedas));
         ?>
    </body>
</html>
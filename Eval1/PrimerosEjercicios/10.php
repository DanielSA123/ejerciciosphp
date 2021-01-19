<!DOCTYPE html>
<html>
    <head>
        <title>
            Ej 10
        </title>
    </head>
    <body>        
        <?php             
            function perfecto($n){
                $suma = 0;
                for($i=1;$i<$n;$i++){
                    if($n%$i == 0){
                        $suma += $i;
                    }
                }
                if($suma == $n){
                    return "$n ";
                }
            }
            for($i=1;$i<=1000;$i++){
                echo "" . perfecto($i);
            }
        ?>         
    </body>
</html>
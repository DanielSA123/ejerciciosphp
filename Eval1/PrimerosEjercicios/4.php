<!DOCTYPE html>
<html>
    <head>
        <title>
            Ej 4
        </title>
    </head>
    <body>        
        <?php 
            $array = array(
            "var1" => 5,
            "var2" => 5.0,
            "var3" => "5",
            "var4" => "5.0",);            

            var_dump($array);
            echo "<br><br>";
            
            foreach($array as $key => $value){
                foreach($array as $clave => $valor){
                    echo "La sentencia $key == $clave es " . ($value==$valor? "true":"false")."<br>";
                    echo "La sentencia $key === $clave es " . ($value===$valor? "true":"false")."<br>";
                    echo "La sentencia $key <> $clave es " . ($value<>$valor? "true":"false")."<br>";
                    echo "La sentencia $key != $clave es " . ($value!=$valor? "true":"false")."<br>";
                    echo "La sentencia $key !== $clave es " . ($value!==$valor? "true":"false")."<br>";
                    echo "<br>";
                }
            }
         ?>
    </body>
</html>
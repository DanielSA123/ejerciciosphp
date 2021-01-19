<!DOCTYPE html>
<html>
    <head>
        <title>
            Ej 5
        </title>
    </head>
    <body>        
        <?php 
            $array = array("var1"=>30,
            "var2" => 70,
            "var3"=>4);

            foreach($array as $key=> $value){
                if($value==min($array)){
                    echo "La menor variable es $key y vale $value <br>";
                }
                if($value==max($array)){
                    echo "La mayoy variable es $key y vale $value <br>";
                }
            }
         ?>
    </body>
</html>
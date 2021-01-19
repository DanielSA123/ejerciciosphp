<?php
    function esPar($num):bool{
        if($num % 2 == 0){
            return true;
        }
        else{
            return false;
        }
    }

    function primos($hasta):array{
        $numPrimos = [1,];
        for($i=0;$i<=$hasta;$i++){
            $primo = true;
            $j = 2;
            while($j<sqrt($i) && $primo){
                if($i%$j==0){
                    $primo = false;
                }
                $j++;
            }
            if($primo){
                $numPrimos[]= $i;
            }
        }
        return $numPrimos;
    }

    function fibonacci($hasta):array{
        $numFibonacci = [0,1,];
        $actual = 1;
        $anterior = 0;
        while($actual <= $hasta){
            $apoyo = $actual;
            $actual += $anterior;
            $anterior = $apoyo;
            $numFibonacci[]=$actual;
        }
        return $numFibonacci;
    }
	function divisores($numero): array
{
    $divisores = [];
    $primo = true;
    $j = 1;
    while ($j <= sqrt($numero)) {
        if ($numero % $j == 0) {
            $divisores[] = $j;
            $divisores[] = $numero / $j;
        }
        $j++;
    }
    return $divisores;
}
?>
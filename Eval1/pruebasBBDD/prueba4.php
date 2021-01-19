<?php
$db = "IngenieriayDesarrollo";
$srv = "(local)";

$con = new PDO("sqlsrv:server=$srv;Database=$db");
$input = "bb";
$stm = $con->prepare("select ? =count(*) from departamento");
$stm->bindParam(1, $input, PDO::PARAM_INT, 4);
$stm->execute();
echo $input;
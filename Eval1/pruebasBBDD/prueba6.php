<?php
$db = "IngenieriayDesarrollo";
$srv = "(local)";

$con = new PDO("sqlsrv:server=$srv,1433;Database=$db");
$con->query("IF OBJECT_ID('dbo.sp_reverseString','P') IS NOT NULL DROP PROCEDURE dbo.sp_reverseString");
$con->query("CREATE PROCEDURE dbo.sp_reverseString @String
 as NVARCHAR(2048) OUTPUT as SELECT @String = REVERSE(@STRING);");

$stm = $con->prepare("exec sp_reverseString ?;");
$string= "123456";
$stm->bindParam(1, $string, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 2048);
$stm->execute();
echo $string;
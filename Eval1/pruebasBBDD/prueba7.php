<?php
$db = "IngenieriayDesarrollo";
$srv = "(local)";

$con = new PDO("sqlsrv:server=$srv,1433;Database=$db");
$con->beginTransaction();
$ret = $con->exec("insert into centro values(N'SEDE CENTRALO'
,N'C/ ALCALA'
,N'822'
,N'28002'
,N'MADRID'
,N'MADRID')");
$ret = $con->exec("insert into centro values(N'SEDE CENTRALES'
,N'C/ ALCALA'
,N'822'
,N'28002'
,N'MADRID'
,N'MADRID')");
$ret= $con->exec("delete from centro where nombre= 'SEDE CENTRALES'");

$con->commit();
//$con->rollBack();

echo $ret;
<?php
$dsn = "sqlsrv:server=(local),1433;database=IngenieriayDesarrollo";
$opc = [PDO::SQLSRV_ATTR_ENCODING => PDO::SQLSRV_ENCODING_UTF8,
    PDO::SQLSRV_ATTR_DIRECT_QUERY => true];
$con = new PDO($dsn, "", "", $opc);
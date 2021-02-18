<?php
require 'operaciones.php';
$uri = 'http://localhost/ejerciciosphp/serviciosWeb';
$parametros = ['uri' => $uri];
try {
    $server = new SoapServer(NULL, $parametros);
    $server->setClass('Operaciones');
    $server->handle();
} catch (SoapFault $f) {
    die("error en server: " . $f->getMessage());
}

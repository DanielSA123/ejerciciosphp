<?php
require_once "libros.inc";

$server=new SoapServer(null, ['uri'=>'biblioteca.edu/servicioWeb/servicio.php']);

$server->setClass('Libros');

$server->handle();

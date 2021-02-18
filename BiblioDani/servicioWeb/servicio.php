<?php
require_once "libros.inc";

$server=new SoapServer(null, ['uri'=>'localhost/Biblioteca/servicioWeb/servicio.php']);

$server->setClass('Libros');

$server->handle(); ?>

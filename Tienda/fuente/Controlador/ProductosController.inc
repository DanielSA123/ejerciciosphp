<?php
class ProductosController
{
    public function listarProductos()
    {
        require_once __DIR__ . '/../Repositorio/ProductosRepositorio.inc';
        $respuesta = (new ProductosRepositorio())->findAllProductos();
        include __DIR__ . '/../../app/plantillas/listaProductos.php';
    }
}

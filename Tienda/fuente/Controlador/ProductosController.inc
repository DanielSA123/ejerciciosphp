<?php
class ProductosController
{
    public function listarProductos()
    {
        if (isset($_POST['vaciar'])) {
            unset($_SESSION['cesta']);
        }
        require_once __DIR__ . '/../Repositorio/ProductosRepositorio.inc';
        $productosRepositorio = new ProductosRepositorio();
        if (isset($_POST['comprar'])) {
            $datos = $productosRepositorio->findProductoById($_POST['id']);
            $_SESSION['cesta'][$datos->id] = $datos->id;
        }
        $respuesta = $productosRepositorio->findAllProductos();
        include __DIR__ . '/../../app/plantillas/listaProductos.php';
    }

    public function mostrarCesta()
    {
    }
}
<?php
class ejemplaresController
{
    public function verEjemplares()
    {
        if (isset($_POST['verEjemplares'])) {
            $id = $_POST['idLibro'];
            require_once __DIR__ . '/../Repositorio/BibliotecaRepositorio.inc';
            $ejemplares = (new BibliotecaRepositorio())->findEjemplaresByIdLibro($id);
            include __DIR__ . '/../../app/plantillas/verEjemplares.php';
        }
    }
}

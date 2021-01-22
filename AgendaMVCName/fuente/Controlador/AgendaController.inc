<?php
class AgendaController
{
    public function verTodaAgenda()
    {
        require_once __DIR__ . '/../Repositorio/AgendaRepositorio.inc';
        $datos = (new AgendaRepositorio())->findAllAmigos();
        require __DIR__ . '/../../app/plantillas/mostrarTodos.php';
    }
    public function quitarAmigos()
    {
        require_once __DIR__ . '/../Repositorio/AgendaRepositorio.inc';
        $repoAgenda = new AgendaRepositorio();
        if (!isset($_POST['ok'])) {
            $datos = $repoAgenda->findAllAmigos(true);
            require __DIR__ . '/../../app/plantillas/quitarAmigos.php';
        } else {
            //boton de confirmacion de eliminar
            $aEliminar = $_POST['borrar'];
            foreach ($aEliminar as $id) {
                if (!$repoAgenda->deleteAmigo((int) $id)) {
                    /* No se elimina el amigo*/
                }
            }
            header("location: index.php");
            $this->verTodaAgenda();
        }
    }
    public function agregarAmigo()
    {
        if (isset($_POST['ok'])) {
            require_once __DIR__ . '/../Modelo/amigo.inc';
            $datos = $_POST['datos'];
            try {
                $amigo = new Amigo($datos);
                require_once __DIR__ . '/../Repositorio/AgendaRepositorio.inc';
                try {
                    if (!(new AgendaRepositorio)->addAmigo($amigo)) {
                        /* no se puede insertar */
                    }
                    unset($datos);
                    unset($amigo);
                } catch (PDOException $ex) {
                    //tratar excepcion
                } catch (Exception $ex) {
                    //tratar excepcion
                }
            } catch (AmigoException $ex) {
                $errores = $ex->getErrores();
            }
        }
        require_once __DIR__ . '/../Repositorio/ProvinciaRepositorio.inc';
        $provincias = (new ProvinciaRepositorio)->findAllProvincias();
        require __DIR__ . '/../../app/plantillas/agregarAmigo.php';
    }

    public function buscarAmigo()
    {
        if (isset($_POST['busca'])) {
            $nombre = $_POST['nombreBuscar'];
            require_once __DIR__ . '/../Repositorio/AgendaRepositorio.inc';
            try {
                $datos = (new AgendaRepositorio)->findAllByNombreOrProvincia($nombre);
                require __DIR__ . '/../../app/plantillas/busquedaAmigos.php';
            } catch (PDOException $ex) {
                var_dump($ex);
                //tratar excepcion
            } catch (Exception $ex) {
                echo "error2";
                //tratar excepcion
            }
        }
    }
}
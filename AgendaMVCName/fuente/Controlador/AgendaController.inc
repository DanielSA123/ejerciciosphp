<?php

namespace miId\App\fuente\Controlador;

use miId\App\fuente\Repositorio;
use miId\App\fuente\Modelo\Amigo;
use miId\App\fuente\Modelo\AmigoException as AE;

class AgendaController
{
    public function verTodaAgenda()
    {
        if (isset($_SESSION['ususario'])) {
            // require_once __DIR__ . '/../Repositorio/AgendaRepositorio.inc';
            $datos = (new Repositorio\AgendaRepositorio())->findAllAmigos();
            require __DIR__ . '/../../app/plantillas/mostrarTodos.php';
        } else {
            header('location:index.php?ctl=login');
        }
    }
    public function quitarAmigos()
    {
        // require_once __DIR__ . '/../Repositorio/AgendaRepositorio.inc';
        $repoAgenda = new Repositorio\AgendaRepositorio();
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
                // require_once __DIR__ . '/../Repositorio/AgendaRepositorio.inc';
                try {
                    if (!(new Repositorio\AgendaRepositorio)->addAmigo($amigo)) {
                        /* no se puede insertar */
                        var_dump("error");
                    }
                    unset($datos);
                    unset($amigo);
                } catch (\PDOException $ex) {
                    var_dump($ex);
                    //tratar excepcion
                } catch (\Exception $ex) {
                    var_dump($ex);
                    //tratar excepcion
                }
            } catch (AE $ex) {
                $errores = $ex->getErrores();
            }
        }
        // require_once __DIR__ . '/../Repositorio/ProvinciaRepositorio.inc';
        $provincias = (new Repositorio\ProvinciaRepositorio)->findAllProvincias();
        require __DIR__ . '/../../app/plantillas/agregarAmigo.php';
    }

    public function buscarAmigo()
    {
        if (isset($_POST['busca'])) {
            $nombre = $_POST['nombreBuscar'];
            // require_once __DIR__ . '/../Repositorio/AgendaRepositorio.inc';
            try {
                $datos = (new Repositorio\AgendaRepositorio)->findAllByNombreOrProvincia($nombre);
                require __DIR__ . '/../../app/plantillas/busquedaAmigos.php';
            } catch (\PDOException $ex) {
                var_dump($ex);
                //tratar excepcion
            } catch (\Exception $ex) {
                echo "error2";
                //tratar excepcion
            }
        }
    }
}

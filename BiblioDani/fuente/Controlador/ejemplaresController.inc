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

    public function reservarEjemplar()
    {
        if (isset($_SESSION['usuario'])) {
            if (isset($_POST['reservar'])) {
                $ejemplar = $_POST['ejemplar'];
                try {
                    require_once __DIR__ . '/../Repositorio/BibliotecaRepositorio.inc';
                    if ((new BibliotecaRepositorio())->addReserva($ejemplar, $_SESSION['idUsuario'])) {
                        $_SESSION['reservado'] = "La reserva se ha realizado correctamente";
                        header('Location:index.php');
                    }
                } catch (PDOException $ex) {
                    var_dump($ex);
                    //errores PDO
                } catch (Exception $ex) {
                    //errores
                }
            }
        } else {
            header('Location: index.php?ctl=acceder');
        }
    }

    public function verPrestados()
    {
        try {
            require_once __DIR__ . '/../Repositorio/BibliotecaRepositorio.inc';
            $prestados = (new BibliotecaRepositorio())->getPrestados();
            include __DIR__ . '/../../app/plantillas/hacerDevoluciones.php';
        } catch (PDOException $ex) {
            die(var_dump($ex));
        } catch (Exception $ex) {
            die(var_dump($ex));
        }
    }

    public function devolverEjemplar()
    {
        if (isset($_GET['ejemplar'])) {
            $ejemplar = $_GET['ejemplar'];
            try {
                require_once __DIR__ . '/../Repositorio/BibliotecaRepositorio.inc';
                if ((new BibliotecaRepositorio())->devolverEjemplar($ejemplar)) {
                    $_SESSION['devolver'] = "El libro se ha devuelto a la biblioteca";
                    header('Location: index.php');
                }
            } catch (PDOException $ex) {
                die(var_dump($ex));
                //errores PDO
            } catch (Exception $ex) {
                die(var_dump($ex));
                //errores
            }
        }
    }

    public function verReservas()
    {
        try {
            require_once __DIR__ . '/../Repositorio/BibliotecaRepositorio.inc';
            $reservas = (new BibliotecaRepositorio())->getReservas();
            include __DIR__ . '/../../app/plantillas/aceptarReservas.php';
        } catch (PDOException $ex) {
            var_dump($ex);
        } catch (Exception $ex) {
            var_dump($ex);
        }
    }

    public function aceptarReserva()
    {
        if (isset($_POST['aceptar'])) {
            $ejemplar = $_POST['ejemplar'];
            $usuario = $_POST['usuario'];
            $reserva = $_POST['reserva'];
            try {
                require_once __DIR__ . '/../Repositorio/BibliotecaRepositorio.inc';
                if ((new BibliotecaRepositorio())->prestarEjemplar($ejemplar, $usuario, $reserva)) {
                    header('Location: index.php?ctl=verReservas');
                }
            } catch (PDOException $ex) {
                var_dump($ex);
            } catch (Exception $ex) {
                var_dump($ex);
            }
        }
    }
}

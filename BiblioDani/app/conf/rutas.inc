<?php

// Vector multidimensional con rutas a controlador y método que debe
// atender cada enlace
/* formato:
    Primera dimensaión: nombre del enlace pasado mediante variable GET 'ctl'
     'nombreEnlace' => array() segunda dimesion con información del controlador
                       que atiende esa petición, clave 'controller', y del
                       método concreto que está especializado en su tratamiento,
                       clave 'action'
  Se debe agregar una ruta por cada valor diferente que tome la variable 'ctl'.
  La clave 'inicio' referencia la página home de la aplicación y especifica
    el controlador que debe decidir cuál es la vista que se debe mostrar
*/
$mapeoRutas =
  array(
    'inicio' =>
    array('controller' => 'defaultController', 'action' => 'inicio'),
    'verGenero' =>
    array('controller' => 'defaultController', 'action' => 'verGenero'),
    'verEjemplares' =>
    array('controller' => 'ejemplaresController', 'action' => 'verEjemplares'),
    'verMisPrestados' =>
    array('controller' => 'defaultController', 'action' => 'misLibros'),
    'buscarLibro' =>
    array('controller' => 'defaultController', 'action' => 'buscarLibro'),
    'verReservas' =>
    array('controller' => 'ejemplaresController', 'action' => 'verReservas'),
    'reservar' =>
    array('controller' => 'ejemplaresController', 'action' => 'reservarEjemplar'),
    'aceptar' =>
    array('controller' => 'ejemplaresController', 'action' => 'aceptarReserva'),
    'verPrestados' =>
    array('controller' => 'ejemplaresController', 'action' => 'verPrestados'),
    'devolver' =>
    array('controller' => 'ejemplaresController', 'action' => 'devolverEjemplar'),
    'acceder' =>
    array('controller' => 'usuarioController', 'action' => 'acceder'),
    'registrarse' =>
    array('controller' => 'usuarioController', 'action' => 'registrarse'),
    'salir' =>
    array('controller' => 'usuarioController', 'action' => 'salir'),
  );

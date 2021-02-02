<?php

// Vector multidimensional con rutas a controlador y método que debe
// atender cada enlace
/* formato:
    Primera dimensión: nombre del enlace pasado mediante variable GET 'ctl'
     'nombreEnlace' => array() segunda dimensión con información del controlador
                       que atiende esa petición, clave 'controller', y del
                       método concreto que está especializado en su tratamiento,
                       clave 'action'
  Se debe agregar una ruta por cada valor diferente que tome la variable 'ctl'.
  La clave 'inicio' referencia la página home de la aplicación y especifica
    el controlador que debe decidir cuál es la vista que se debe mostrar
*/
$mapeoRutas =
  array('inicio' =>
          array('controller' =>'defaultController', 'action' =>'inicio'),
        'resetSesion' =>
          array('controller' =>'SesionController', 'action' =>'sesionDestroy'),
        'busqueda' =>
          array('controller' =>'defaultController', 'action' =>'sacarDatos'),
        'verReservas' =>
          array('controller' =>'defaultController', 'action' =>'mostrarReserva'),
        'hacerReserva' =>
          array('controller' =>'defaultController', 'action' =>'hacerReserva'),
        'inicioSesion' =>
          array('controller' =>'SesionController', 'action' =>'iniciarSesion'),
        'registroForm' =>
          array('controller' =>'SesionController', 'action' =>'formRegistro'),
        'registroUsuario' =>
          array('controller' =>'SesionController', 'action' =>'registro'),
        'reservar' =>
          array('controller' =>'defaultController', 'action' =>'reserva'),
        'dejarLibros' =>
        array('controller' =>'devolucionController', 'action' =>'listaReservas'),
        'devolverLibros' =>
        array('controller' =>'devolucionController', 'action' =>'devolver'),
       );

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
    array('controller' => 'miId\App\fuente\Controlador\defaultController', 'action' => 'inicio'),
    'ver' =>
    array('controller' => 'miId\App\fuente\Controlador\AgendaController', 'action' => 'verTodaAgenda'),
    'quitar' =>
    array('controller' => 'miId\App\fuente\Controlador\AgendaController', 'action' => 'quitarAmigos'),
    'agregar' =>
    array('controller' => 'miId\App\fuente\Controlador\AgendaController', 'action' => 'agregarAmigo'),
    'buscar' =>
    array('controller' => 'miId\App\fuente\Controlador\AgendaController', 'action' => 'buscarAmigo'),
    'login' =>
    array('controller' => 'miId\App\fuente\Controlador\LoginController', 'action' => 'iniciarSesion'),
    'logout' =>
    array('controller' => 'miId\App\fuente\Controlador\LoginController', 'action' => 'cerrarSesion'),
    'signin' =>
    array('controller' => 'miId\App\fuente\Controlador\LoginController', 'action' => 'registrarUsuario'),

  );
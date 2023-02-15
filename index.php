<?php
require_once 'conexion/conexion.php';

$controller = 'coche';


if (!isset($_GET['c'])) {
    require_once "controlador/controlador$controller.php";
    $controller = 'Controlador' . ucwords($controller);
    $controller = new $controller;
    $controller->index();
} else {
    $controller = strtolower($_GET['c']);
    $accion = isset($_GET['a']) ? $_GET['a'] : 'Index';
    require_once "controlador/controlador$controller.php";
    $controller = 'Controlador' . ucwords($controller);
    $controller = new $controller;

    call_user_func(array($controller, $accion));
}

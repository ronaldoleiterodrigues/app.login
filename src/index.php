<?php 
use App\Controller\UsuarioController;
require_once "../vendor/autoload.php";

if($_GET):

    $controller = $_GET['controller'];
    $metodo = $_GET['metodo'];

    $objClass = 'App\\Controller\\'.$controller;

    $obj = new $objClass();
    $obj->$metodo();

else:
    $usuarioController = new UsuarioController();
    $usuarioController->autenticarUsuario();
endif;


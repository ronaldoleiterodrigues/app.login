<?php 
use App\Controller\UsuarioController;
require_once "../vendor/autoload.php";

$usuarioController = new UsuarioController();
$usuarioController->autenticarUsuario();
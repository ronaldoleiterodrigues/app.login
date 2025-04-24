<?php

namespace App\Controller;
session_start();

use App\Models\Notifications;
use App\Models\UsuarioDao;

class UsuarioController extends Notifications
{
    public function autenticarUsuario()
    {
        require_once "Views/usuario/autenticar.php";

        if ($_SERVER["REQUEST_METHOD"]  === "POST"):

            $usuario = $_POST["usuario"];
            $senha = $_POST["senha"];

            $dadosUsuario = (new UsuarioDao())->autenticar($usuario);

            if (!empty($dadosUsuario) && password_verify($senha, $dadosUsuario[0]->SENHA)):
                $this->gerarSessao($dadosUsuario);
                header("location:index.php?controller=UsuarioController&metodo=painel");
                exit;
            else:
                echo $this->loginError("Usuario ou senha incorreto!");
            endif;

        endif;
    }

    public function gerarSessao($usuario)
    {
        $_SESSION['nome'] = $usuario[0]->NOME;
    }

    public function painel()
    {
        require_once "Views/painel/index.php";
    }
}

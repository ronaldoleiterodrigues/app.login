<?php

namespace App\Models;
use App\Models\Contexto;

class UsuarioDao extends Contexto
{
    public function autenticar($usuario){
      return  $this->listar("USUARIO","WHERE USUARIO = '".$usuario." ' ");
    }
 
}

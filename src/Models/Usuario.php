<?php

namespace App\Models;

class Usuario
{
    private ?int $id;
    private ?string $nome;
    private ?string $usuario;
    private ?string $senha;
    private ?string $perfil;
    private ?string $email;
    private ?string $imagem;
    private ?string $ativo;

    public function __construct(int $id,string $nome,string $usuario, string $senha,string $perfil,string $email) {
        $this->id = $id;
        $this->nome = $nome;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->perfil = $perfil;
        $this->email = $email;
    }
    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    
    public function __set($chave, $valor){
       if(property_exists($this, $chave)):
        $this->chave = $valor;
       endif;
    }

    public function toArray(){
        return [
           "id" => $this->id,
           "nome" => $this->nome,
           "usuario" => $this->usuario,
           "senha" => $this->senha,
           "perfil" => $this->perfil,
           "email" => $this->email
        ];
    }

  public function atributosPreechidos(){
    return array_filter($this->toArray(), fn($value) => $value !== null && $value !== '');
  }

}
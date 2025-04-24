<?php

namespace App\Models;

use PDOException;
use PDO;

class Contexto
{
    private static $conexao;

    //  criando a conexao com o banco de dados utilizando o PDO
    protected static function getConexao()
    {
        if (self::$conexao === null):
            $inf = "mysql:host=localhost;dbname=applogin";
            try {
                self::$conexao = new PDO($inf, "root", "", [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erro ao cenectar com o banco de dado ' . $e->getMessage());
            }
        endif;
        return self::$conexao;
    }
    //   metodo responsavel por encerrar a conexao com o banco de dados
    protected static function closeConexao()
    {
        self::$conexao = null;
    }

    protected function executarConsulta($sql, $valores = [])
    {
        try {
            $stmt = self::getConexao()->prepare($sql);
            foreach ($valores as $key => $valor):
                $stmt->bindValue($key + 1, $valor);
            endforeach;
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            die('Erro ao executar consulta no banco de dados. ' . $e->getMessage());
        }
    }
    protected function listar($tabela, $condicao = "", $parametro = [])
    {
        $sql = "SELECT * FROM {$tabela} {$condicao} ORDER BY ID DESC ";
         $stmt = $this->executarConsulta($sql, $parametro);
         return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
<?php
class Conexao
{
    private $conexaoBD;
    
    public function getInstance(){
        $this->conexaoBD = new PDO("mysql:host=localhost;dbname=escola;
        charset=utf8", "root","");
        return $this->conexaoBD;
    }
    
}
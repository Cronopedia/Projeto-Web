<?php
require_once "Conexao.class.php";

class Pagina
{
    private static $ID = 100;
    private $autor;
    private $titulo;
    private $resumo;
    private $dataPub;
    private $conteudo;
    private $relevancia;

    public function __construct($autor, $titulo, $resumo, $conteudo, $dataPub, $relevancia)
    {
        $ID = +1;
        $this->autor = $autor;
        $this->titulo = $titulo;
        $this->resumo = $resumo;
        $this->dataPub = $dataPub;
        $this->conteudo = $conteudo;
        $this->relevancia = $relevancia;
    }

    // Setters

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setResumo($resumo)
    {
        $this->resumo = $resumo;
    }

    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;
    }

    public function setDataPub($data)
    {
        $this->dataPub = $data;
    }

    public function setRelevancia($relevancia)
    {
        $this->relevancia = $relevancia;
    }

    // Getters
    public function getID()
    {
        return $this->ID;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getResumo()
    {
        return $this->resumo;
    }

    public function getConteudo()
    {
        return $this->conteudo;
    }

    public function getDataPub()
    {
        return $this->dataPub;
    }

    public function getRelevancia()
    {
        return $this->relevancia;
    }

    // Crud

    public function create()
    {
        // Estabelecendo a conexão
        $con = new Conexao();
        $conexao = $con->getInstance();

        // Preparando a Query
        $stmt = $conexao->prepare("INSERT INTO `pagina`(`id`, `autor`, `conteudo`, `data_publicacao`, `relevancia`, `resumo`, `titulo`) VALUES (':id',':autor',':conteudo',':data',':relev',':resumo',':titulo')");

        // Binding
        $stmt->bindParam(':id', $this->getID());
        $stmt->bindParam(':autor', $this->getAutor());
        $stmt->bindParam(':conteudo', $this->getConteudo());
        $stmt->bindParam(':data', $this->getDataPub());
        $stmt->bindParam(':relev', $this->getRelevancia());
        $stmt->bindParam(':resumo', $this->getResumo());
        $stmt->bindParam(':titulo', $this->getTitulo());

        // Executanco o SQL
        $resultado = $stmt->execute();

        if (!$resultado) {
            header("Status: 406 Not Acceptable");;
        }

        header("Status: 201 Created");
    }
}

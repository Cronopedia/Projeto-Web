<?php
require_once "Conexao.class.php";

class Pagina
{
    private $Id;
    private $autor;
    private $titulo;
    private $resumo;
    private $dataPub;
    private $conteudo;
    private $relevancia;

    public function __construct($autor = "", $titulo = "", $resumo = "", $conteudo = "", $dataPub = "", $relevancia = "")
    {;
        $this->Id = self::getRandom();
        $this->autor = $autor;
        $this->titulo = $titulo;
        $this->resumo = $resumo;
        $this->dataPub = $dataPub;
        $this->conteudo = $conteudo;
        $this->relevancia = $relevancia;
    }

    public static function getRandom()
    {
        return rand(0, 10000);
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
        $stmt = $conexao->prepare("INSERT INTO `pagina`(`id`, `autor`, `conteudo`, `data_publicacao`, `relevancia`, `resumo`, `titulo`) VALUES (:id ,:autor, :conteudo, :dataPub, :relev, :resumo, :titulo)");

        // Binding
        $stmt->bindParam(':id', $this->Id);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':conteudo', $this->conteudo);
        $stmt->bindParam(':dataPub', $this->dataPub);
        $stmt->bindParam(':relev', $this->relevancia);
        $stmt->bindParam(':resumo', $this->resumo);
        $stmt->bindParam(':titulo', $this->titulo);

        // Executanco o SQL
        $resultado = $stmt->execute();

        if (!$resultado) {
            header("Status: 406 Not Acceptable");
        }

        // header("Status: 201 Created");
    }

    public function readAll()
    {
        // Estabelecendo a conexão
        $con = new Conexao();
        $conexao = $con->getInstance();


        // Preparando a Query
        $stmt = $conexao->prepare("SELECT * FROM pagina");

        // Executando o SQL
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$resultado) {
            header("Status: 406 Not Acceptable");
            exit;
        }

        header("Status: 200 OK");
        return $resultado;
    }

    public function read($id)
    {
        // Estabelecendo a conexão
        $con = new Conexao();
        $conexao = $con->getInstance();


        // Preparando a Query
        $stmt = $conexao->prepare("SELECT * FROM pagina WHERE id = :id");

        // Binding
        $stmt->bindParam(':id', $id);

        // Executando o SQL
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if (!$resultado) {
            header("Status: 406 Not Acceptable");
            exit;
        }

        header("Status: 200 OK");
        return $resultado;
    }

    public function delete($id)
    {
        // Estabelecendo a conexão
        $con = new Conexao();
        $conexao = $con->getInstance();

        // Preparando a Query
        $stmt = $conexao->prepare("DELETE FROM pagina WHERE id = :id");

        // Binding
        $stmt->bindParam(':id', $id);

        // Executanco o SQL
        $resultado = $stmt->execute();


        if (!$resultado) {
            header("Status: 406 Not Acceptable");
            exit;
        }

        header("Status: 200 OK");
    }

    public function update()
    {
        // Estabelecendo a conexão
        $con = new Conexao();
        $conexao = $con->getInstance();

        // Preparando a Query
        $stmt = $conexao->prepare("UPDATE `pagina` SET
        `id` = id,
        `autor` = ':autor',
        `conteudo` = ':conteudo',
        `data_publicacao` = ':dataPub',
        `relevancia` = ':relev',
        `resumo` = ':resumo',
        `titulo` = ':titulo'
        WHERE id = :id");

        // Binding
        $stmt->bindParam(':id', $this->Id);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':conteudo', $this->conteudo);
        $stmt->bindParam(':dataPub', $this->dataPub);
        $stmt->bindParam(':relev', $this->relevancia);
        $stmt->bindParam(':resumo', $this->resumo);
        $stmt->bindParam(':titulo', $this->titulo);

        // Executanco o SQL
        $resultado = $stmt->execute();

        if (!$resultado) {
            header("Status: 406 Not Acceptable");
            exit;
        }

        header("Status: 200 OK");
    }
}

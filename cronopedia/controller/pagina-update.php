<?php
require_once __DIR__ . "/../model/Pagina.class.php";

$data = json_decode(file_get_contents('php://input'), true);
$data = $data["data"];

$autor = $data["autor"];
$titulo = $data["titulo"];
$resumo = $data["resumo"];
$conteudo = $data["conteudo"];
$dataPub = $data["dataPub"];
$relevancia = $data["relevancia"];

var_dump($data);

$obj = new Pagina($autor, $titulo, $resumo, $conteudo, $dataPub, $relevancia);
$obj->update();

// localhost/cronopedia/controller/pagina-update.php?

// BODY:
// {
//     "data": {
//       "autor": "teste",
//       "titulo": "teste",
//       "resumo": "teste",
//       "conteudo": "teste",
//       "dataPub": "2000-01-01",
//       "relevancia": "0.0"
//     }
//  }
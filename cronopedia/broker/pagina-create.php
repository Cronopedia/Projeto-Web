<?php
require_once __DIR__ . "/../model/Pagina.class.php";

$autor = $_POST["autor"];
$titulo = $_POST["titulo"];
$resumo = $_POST["resumo"];
$conteudo = $_POST["conteudo"];
$dataPub = $_POST["dataPub"];
$relevancia = $_POST["relevancia"];

$obj = new Pagina($autor, $titulo, $resumo, $conteudo, $dataPub, $relevancia);
$obj->create();

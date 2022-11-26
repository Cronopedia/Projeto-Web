<?php
require_once __DIR__ . "/../model/Pagina.class.php";

$obj = new Pagina();
$ArrayPagina = $obj->read($_GET["id"]);
$ArrayPagina = json_encode($ArrayPagina);

echo ($ArrayPagina);

// localhost/cronopedia/controller/pagina-read-all.php?id=6325
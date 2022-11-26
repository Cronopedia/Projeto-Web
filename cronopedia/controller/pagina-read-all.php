<?php
require_once __DIR__ . "/../model/Pagina.class.php";

$obj = new Pagina();
$ArrayPaginas = $obj->readAll();
$ArrayPaginas = json_encode($ArrayPaginas);

echo ($ArrayPaginas);

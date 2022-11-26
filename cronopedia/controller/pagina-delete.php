<?php
require_once __DIR__ . "/../model/Pagina.class.php";

$obj = new Pagina();
$ArrayPaginas = $obj->delete($_GET["id"]);

// localhost/cronopedia/controller/pagina-delete.php?id=6325

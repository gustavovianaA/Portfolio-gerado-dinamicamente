<?php
require_once("config.php");
$lista = json_encode(Portfolio::listar());
$fp = fopen('lista.json', 'w');
fwrite($fp, $lista);
fclose($fp);
?>
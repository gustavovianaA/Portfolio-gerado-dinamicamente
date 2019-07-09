<?php
clearstatcache();
require_once("config.php");
$lista = json_encode(Portfolio::listar());
$fp = fopen('json/lista.json', 'w');
fwrite($fp, $lista);
fclose($fp);
?>
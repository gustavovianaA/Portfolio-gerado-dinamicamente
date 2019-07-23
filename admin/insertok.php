<?php
require_once("config.php");
if(isset($_POST['v']) && $_POST['v'] == '1'){

$titulo = $_POST['titulo'];
$tecnologias = $_POST['tec'];
$link = $_POST['link'];
$descricao = $_POST['desc'];
$imgCaminho = "img" . DIRECTORY_SEPARATOR . $_POST['img'];
$imgCaminho = str_replace(" ","_",$imgCaminho);
$novoItem = new Portfolio($titulo,$descricao,$tecnologias,$imgCaminho,$link);
$novoItem->insert();
}
?>
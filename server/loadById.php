<?php
if(isset($_POST['id'])){
$id = $_POST['id']; 
require_once('config.php');
$object = new Portfolio;
$object->loadById($id);
$fp = fopen('json/alvo.json', 'w');
fwrite($fp, $object);
fclose($fp);
}

?>
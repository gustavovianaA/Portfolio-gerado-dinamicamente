<?php
require_once("config.php");

function listarPortfolio(){
clearstatcache();
$lista = Portfolio::listar();
foreach($lista as $row){

    $html = "<div class='row'>";
    $html.= "<div class='col-5'>";
	$html.= "<img src=.." . DIRECTORY_SEPARATOR . $row['imgCaminho'] . " class='img-fluid'>";
	$html.= "</div>";
	$html.= "<div class='col-5'>";
	$html.= "<p><span class='tags'>Título:</span> " . $row['titulo'] . "</p>";
	$html.= "<p><span class='tags'>Descrição:</span> " . $row['descricao'] . "</p>";
	$html.= "<p><span class='tags'>Tecnologias:</span> " .$row['tecnologias'] . "</p>";
	$html.= "<p><span class='tags'>Link:</span><a href='//" . $row['link'] ."' target='_blank'> " . $row['link'] . "</a></p>";
	$html.= "</div>";
	$html.= "<div class='col-2'>";
	$html.= "<a href='edit.php?id=".$row['id']."'><button type='button' class='my-2 btn btn-success btn-block'>Editar</button></a>";
	$html.= "<a href='delete.php?id=".$row['id']."'><button type='button' class='my-2 btn btn-danger btn-block'>Deletar</button></a>";
	$html.= "</div>";
	$html.= "</div>";

echo $html . "<hr>";
}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Admin - Portfólio</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		.tags{
			font-weight: 700;}
		main{
			margin-top: 200px;}
		.inserir{
			width: 40%;}
	</style>
</head>
<body>
     
    <header class="fixed-top bg-white">
    	<div class="bg-secondary "><h1 class=" container bg-secondary text-white py-4">
    	Administrar Portfólio</h1></div>
    	<div class="row bg-white border-bottom pt-2 pb-3">
   		<div class="col-6 text-right"><a href="insert.php"><button type="button" class="inserir btn btn-info align-middle">Inserir</button></a></div>
		<div class="col-6">
			<form method="POST" action="search.php">
				<div>
					<input type="text" placeholder="Pesquisar" class="align-middle">
					<input type="submit" value="ok">
				</div>
			</form>
		</div>
    	</div>
    </header> 
	<main class="container">		
		<?php listarPortfolio()?>
	</main>

</body>
</html>
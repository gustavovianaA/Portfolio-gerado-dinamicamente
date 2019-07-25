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
		
	</style>
</head>
<body>
     
    <header class="fixed-top bg-white">
    	<div class="bg-secondary "><h1 class=" container bg-secondary text-white py-4">
    	Administrar Portfólio</h1></div>
    	<div class="row bg-white border-bottom pt-2 pb-3 px-4">
   		<div class="col-3"><a href="insert.php"><button type="button" class="inserir btn btn-info btn-block ">Inserir</button></a></div>
   		<div class="col-3"><button type="button" class="gerar btn btn-success btn-block btn-success ">Gerar HTML Estático</button></a></div>
		<div class="col-3">
			<form method="POST" action="search.php">
				<div>
					<input type="text" placeholder="Pesquisar" class="align-middle">
					<input type="submit" value="ok">
				</div>
			</form>
		</div>
		   		<a href="../" class="col-3"><span class="btn btn-danger btn-block">Sair</span></a>

    	</div>
    </header> 
	<main class="container">		
		<?php listarPortfolio()?>
	</main>


<!--bootstrap.js e jquery-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--Scripts da página-->
<script type="text/javascript">
$(document).ready(function(){
	$(".gerar").click(function(){
		$.ajax({

		url: "generate.php",
        type: "POST",
        data: "",
        dataType: "html",
        success: function(data){
        	console.log(data);
        }     
             });

 
	});
});	
</script>

</body>
</html>
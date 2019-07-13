<?php
require_once('config.php');
if(isset($_GET['id']) && $_GET['id'] != ''){
$id = $_GET['id'];
$target = new Portfolio;
$target->loadById($id);

if(isset($_POST['editar'])){
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$tecnologias = $_POST['tecnologias'];
$img = 'img/meuwebsite.png';
$link = $_POST['link'];


$target->edit($id,$titulo,$descricao,$tecnologias,$img,$link);
header("Location: index.php");
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
		.submain{
			margin-top: 120px;}
		.inserir{
			width: 40%;
			}
	</style>
</head>
<body>
     
    <header class="fixed-top bg-white">
    	<div class="bg-secondary "><h1 class=" container bg-secondary text-white py-4">
    	Administrar Portfólio</h1></div>
    	
    </header> 
	<main class="container submain">

		<h2>Editar item</h2>

		<form method="post">
		<div class="row">
		<div class="col-4">
		<div class="form-group">
		<label for="titulo">Título</label>	
		<input class="form-control" type="text" name="titulo" id="titulo" value=<?php echo $target->getTitulo();?>>
		</div>
		
		<div class="form-group">
		<label for="tecnologias">Tecnologias</label>
		<input  class="form-control" type="text" name="tecnologias" id="tecnologias" value=<?php echo $target->getTecnologias();?>>
		</div>

		<div class="form-group">
		<label for="link">Link </label>
		<input class="form-control" type="text" name="link" id="link" value=<?php echo $target->getLink();?>>
		</div>
		</div>
        
        <div class="col-4">
        <div class="form-group">
        <label for="descricao">Descrição</label>
		<textarea class="form-control" name="descricao" id="descricao" rows="8"><?php echo $target->getDescricao();?></textarea>
		</div>
		</div>
		</div>

        <input type="submit" id="editar" name="editar" class="btn btn-primary btn-block" value="Salvar">
        </form>
                <a href="index.php" ><button class="my-3 btn btn-danger btn-block">Voltar</button></a>
	
	</main>

<!--bootstrap.js e jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</body>
</html>
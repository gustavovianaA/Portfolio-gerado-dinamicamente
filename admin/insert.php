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

		<h2>Inserir item</h2>

		<form method="post">
		<div class="row">
		<div class="col-4">
		<div class="form-group">
		<label for="titulo">Título</label>	
		<input class="form-control" type="text" name="titulo" id="titulo">
		</div>
		
		<div class="form-group">
		<label for="tecnologias">Tecnologias</label>
		<input class="form-control" type="text" name="tecnologias" id="tecnologias">
		</div>

		<div class="form-group">
		<label for="link">Link </label>
		<input class="form-control" type="text" name="link" id="link">
		</div>
		</div>
        
        <div class="col-4">
        <div class="form-group">
        <label for="descricao">Descrição</label>
		<textarea class="form-control" name="descricao" id="descricao" rows="8"></textarea>
		</div>
		</div>
		</div>

        <input type="button" id="inserir" class="btn btn-primary btn-block" value="Inserir" >
        </form>
                <a href="index.php" ><button class="my-3 btn btn-danger btn-block">Voltar</button></a>
	
	</main>

<!--bootstrap.js e jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script type="text/javascript">
    $(document).ready(function(){
    	
            var itemData = new Array();

    	function validate(){
            itemData = [];
    		var validate = 0;

    		if($("#titulo").val() != ""){
    		validate++;	
   			itemData.push($("#titulo").val());
      		}

    		if($("#tecnologias").val() != ""){
    		validate++;
    		itemData.push($("#tecnologias").val());	
    		}

    		if($("#link").val() != ""){
    		validate++;
    		itemData.push($("#link").val());	
    		}

    		if($("#descricao").val() != ""){
    		validate++;
    		itemData.push($("#descricao").val());	
    		}

           
            console.log(validate);

            if(validate===4){
            return 1;	
            }else{
            return 0;	
            }

    	}
        



    	$("#inserir").click(function(){
	
		var valido = validate();

        if(valido == 1){
    	$.ajax({
        url: "insertok.php",
        type: "POST",
        data: "v="+valido+"&titulo="+itemData[0]+"&tec="+itemData[1]+"&link="+itemData[2]+"&desc="+itemData[3]+"&img=img/imgadmin.png",
        dataType: "html"
        }).done(function(resposta) {
        window.location.replace("index.php")
        });
    	}

    	});

    });
	</script>

</body>
</html>
<?php
require_once('config.php');
 

 if(isset($_GET['id']) && $_GET['id'] != ''){
$id = $_GET['id'];
$target = new Portfolio;
$target->loadById($id);
}


if(isset($_POST['v']) && $_POST['v'] ==  '1'  ){
 $id = intval($_POST['id']);

$target = new Portfolio;
$target->loadById($id);

$titulo = $_POST['titulo'];
$descricao = $_POST['desc']; 
$tecnologias = $_POST['tec'];

$img = $_POST['img'];
if($img === "default"){
$img = $target->getImgCaminho();    
}else{
$img  = "img" . DIRECTORY_SEPARATOR . $_POST['img'];
$img  = str_replace(" ","_",$img ); 
}

$link = $_POST['link'];

  
$target->edit($id,$titulo,$descricao,$tecnologias,$img,$link);
 
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
		#imagemTroca{
			display:none;
		}	
        #id{
            display: none;
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

        <span id="id" ><?php echo $target->getId()?></span>
		<div class="row">

			<div class="col-4">
			<img class="img-fluid" src="../<?php echo $target->getImgCaminho();?>" >
		</div>

		
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

		<div class="form-group ">
			<div id="trocarImagem" class="btn btn-info"  >Trocar Imagem</div>
		</div>

		<div class="form-group" id="imagemTroca">
        <label for="imgUpload">Imagem (png)</label>
        <input type="file" name="imgUpload" id="imgUpload">
        </div>

		</div>
        
        <div class="col-4">
        <div class="form-group">
        <label for="descricao">Descrição</label>
		<textarea class="form-control" name="descricao" id="descricao" rows="8"><?php echo $target->getDescricao();?></textarea>
		</div>
		</div>
		</div>

        
        </form>
        <button type="submit" id="editar" name="editar" class="btn btn-primary btn-block" >
        Salvar</button>        
                <a href="index.php" ><button class="my-3 btn btn-danger btn-block">Voltar</button></a>
	
	</main>

<!--bootstrap.js e jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript" >
$(document).ready(function(){
	$("#trocarImagem").click(function(){
		$("#imagemTroca").show();
	}); 
});	
</script> 

<script type="text/javascript">
    $(document).ready(function(){
    	
    		var imgUpload = '';
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

            var imgUpload = $('#imgUpload').val(); 
            if(imgUpload == "" )
 			imgUpload = "default";

            if(imgUpload != ""){
            validate++;
            var img = imgUpload.replace(/C:\\fakepath\\/i, '');
            itemData.push(img);    
            }

    		if($("#descricao").val() != ""){
    		validate++;
    		itemData.push($("#descricao").val());	
    		}

           
            console.log(validate);

            if(validate===5){
            return 1;	
            }else{
            return 0;	
            }

    	}
        



    	$("#editar").click(function(){

  
	
		var valido = validate();

     

        var file_data = $('#imgUpload').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
     

        if(valido){
            theId = $("#id").html();
           
              
        $.ajax({ 
        url: "uploadimg.php",	
        type: "POST",
        data:  form_data,
        contentType: false,
        cache: false,
        processData:false
        }); 

            
        $.ajax({ 
       // url: "editok.php",   
        type: "POST",
        data: "v="+valido+"&id="+theId+"&titulo="+itemData[0]+"&tec="+itemData[1]+"&link="+itemData[2]+"&img="+itemData[3]+"&desc="+itemData[4],
        dataType: "html",
        
    	
        }).done(function(resposta) {
        window.location.replace("index.php");
         
        })   
    	
        }

        });
     }); 


	</script>
 
</body>
</html>
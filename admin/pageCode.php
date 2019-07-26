<?php
function listarPortfolio($list){
$content = "<div class='portfolio row justify-content-center'>";

foreach($list as $row){



$contentView = "<div class='col-3 portfolioItem mx-0 px-0' id='" . $row['id'] . "'>";
$content.= $contentView;
$contentData  = "\n<!-- Dados do item -->\n";
$contentData .= "<div class='dataPort' id='" . $row['id']."'>";
$contentData .= "<span class='dataPortTitle' id='". $row['titulo'] ."'></span>";
$contentData .= "<span class='dataPortDesc' >".$row['descricao']."</span>";
$contentData .= "<span class='dataPortTec' >".$row['tecnologias'] ."</span>";
$contentData .= "<span class='dataPortImg' >". $row['imgCaminho'] ."</span>";
$contentData .= "<span class='dataPortLink' >". $row['link'] ."</span>";
$contentData .= "</div>";
$content .= $contentData;
$content .= "\n<!-- Visualização do item -->\n";
$contentView  = "<div class='portfolioContent'>";
$contentView .= "<div class='port portfolioTitulo'>". $row['titulo']."</div>";
$contentView .= "<img class='port potfolioImg img-fluid' src='".$row['imgCaminho']."'></div></div>";
$content .= $contentView;
}

$content.= "</div>";
$content.= "</main>";
return $content;}


function writePage($list){
$content = array();

$content['head'] ="<!DOCTYPE html>
<html>
<head>
	<title>Portfólio Dinâmico</title>
	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
	<meta charset='UTF-8'>
	
	<style>
		main{
		min-height: 1000px;	
		}
		.portfolioContent{
		position: relative;}
		.port{
		height: 200px;
		width: 100%;}
		.portfolioTitulo{
		background: rgba(0,0,0,0.7);
		color: #fff;
		text-align: center;
		font-weight: 700;
		font-size: 120%;
		z-index:1;	
		display:none;
		position: absolute;
		top:0;
		left:0;}
		.portfolioImg{
		position:relative;	
		top:0;
		left:0;}
		.alvo{
		height: 0px;
		visibility: hidden;
		transition: 1s;}
		.alvo-active{
		height: 350px;}
		#alvoimg{
		max-height: 340px;}
		.portfolioItem , .close{
		cursor:pointer;}
			.dataPort{
		display: none;}
	</style>
</head>";

$content['header'] = "<body>
<!--Área de Conteúdo -->
<main class='container-fluid'>
	
<div class='row justify-content-center'><h1>Portfólio</h1></div>";

$content['scriptDetails'] = "<div class='alvo row'>
<div class='col-6'>
<img src='' class='img-fluid' id='alvoimg'></div>
<div class='col-5'>
<h3>Titulo: <span id='alvotitulo'></span></h3>
<p>Tecnologias: <span id='alvotec'></span></p>
<p>Descrição: <span id='alvodesc'></span></p>
<p>Acesse: <a href='' id='alvolink'></a></p>		
</div>
<div class='col-1'><span class='close'>X</span>
</div>
</div>";


$content['itens'] = listarPortfolio($list);  

$content['scriptsGeneral'] = "<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>";

$content['scriptsItemAnim'] = "<script type='text/javascript'>
$(document).ready(function(){
$('.portfolioItem').mouseenter(function(){ 
$(this).find('.portfolioTitulo').fadeIn(400); 
});
$('.portfolioItem').mouseleave(function(){ 
$(this).find('.portfolioTitulo').fadeOut(400); 
});
});
</script>";

$content['scriptsItemDetail'] = "<script>
$('.portfolioItem').click(function(){
$('.alvo').css('visibility','visible');
$('.alvo').addClass('alvo-active');
var item = $(this).find('.dataPort');
var targetId = $(this).attr('id');
var titulo = item.find('.dataPortTitle').html();
var tecnologias = item.find('.dataPortTec').html();
var descricao = item.find('.dataPortDesc').html();
var link = item.find('.dataPortLink').html();
var img = item.find('.dataPortImg').html();


$('#alvotitulo').html(titulo);
$('#alvotec').html(tecnologias);
$('#alvodesc').html(descricao);
$('#alvolink').html(link);
$('#alvolink').attr('href',link);
$('#alvoimg').attr('src',img);

});	
</script>";

$content['footer'] = "</body>
</html>";  
return $content;}
?>
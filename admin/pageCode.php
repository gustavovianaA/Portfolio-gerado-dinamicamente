<?php
function listarPortfolio($list){
$content = "<div class='portfolio row justify-content-center'>";
foreach($list as $row){
$content .= "<div class='col-3 portfolioItem mx-0 px-0' id='" . $row['id'] . "'>";
$content .= "<div class='portfolioContent'>";
$content .= "<div class='port portfolioTitulo'>". $row['titulo']."</div>";
$content .= "<img class='port potfolioImg img-fluid' src='".$row['imgCaminho']."'></div></div>";
}
$content.= "</div>";
$content.= "</main>";
return $content;}

function listDetails($list){
$content = "";
foreach($list as $row){
$content .= "<div class='dataPort' id='" . $row['id']."'>";
$content .= "<span class='dataPortTitle' id='". $row['titulo'] ."'></span>";
$content .= "<span class='dataPortDesc' id='". $row['decricao'] ."'></span>";
$content .= "<span class='dataPortTec' id='". $row['tecnologias'] ."'></span>";
$content .= "<span class='dataPortImg' id='". $row['imgCaminho'] ."'></span>";
$content.= "</div>";
} 	
return $content;
}


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
		height: 400px;}
		#alvoimg{
		max-height: 390px;}
		.portfolioItem , .close{
		cursor:pointer;}
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
<h3 id='alvotitulo'>Titulo</h3>
<p id='alvotec'>Tecnologias: </p>
<p id='alvodesc'>Descrição: </p>
<p id='alvolink'>Acesse: <a href=''>link</a></p>	
</div>
<div class='col-1'><span class='close'>X</span>
</div>
</div>" . listDetails($list);


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
$('.alvo').addClass('alvo-active');
var targetId = $(this).attr('id');

$('.alvo').css('visibility','visible'); 
});	
</script>";

$content['footer'] = "</body>
</html>";  
return $content;}
?>
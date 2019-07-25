<?php



require_once("../admin/config.php");
$basedir = ".." . DIRECTORY_SEPARATOR . "generated" . DIRECTORY_SEPARATOR;
function listarPortfolio(){
clearstatcache();
$lista = Portfolio::listar();

$content = "<div class='portfolio row justify-content-center'>";
foreach($lista as $row){
$content .= "<div class='col-3 portfolioItem mx-0 px-0' id='" . $row['id'] . "'>";
$content .= "<div class='portfolioContent'>";
$content .= "<div class='port portfolioTitulo'>". $row['titulo']."</div>";
$content .= "<img class='port potfolioImg img-fluid' src='".$row['imgCaminho']."'></div></div>";
}
$content.= "</div>";
$content.= "</main>";

return $content;}

$head = "<!DOCTYPE html>
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

$header = "<body>
<!--Área de Conteúdo -->
<main class='container-fluid'>
	
<div class='row justify-content-center'><h1>Portfólio</h1></div>
<div class='alvo row'></div>
";

$content = listarPortfolio();

$footer = "<!--bootstrap.js e jquery-->
<script src='//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
<!--Scripts da página-->
</body>
</html>";


$content = $head . $header . $content . $footer;
$fp = fopen($basedir . 'gerado.html', 'w');
fwrite($fp, $content);
fclose($fp);
chmod($basedir . "gerado.html", 0777);



function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 

recurse_copy("../img" , $basedir . "img");
chmod($basedir . "img", 0777);


?>






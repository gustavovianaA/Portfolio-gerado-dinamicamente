<?php



require_once("config.php");
require_once("pageCode.php");

$basedir = ".." . DIRECTORY_SEPARATOR . "generated" . DIRECTORY_SEPARATOR;
$list = Portfolio::listar();


 
$contentArray = writePage($list);
$content = '';
foreach($contentArray as $c){
$content .= $c;
}

var_dump($lista);


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






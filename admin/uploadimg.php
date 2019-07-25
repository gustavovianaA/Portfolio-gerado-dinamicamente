<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
$file = $_FILES["file"];

if($file["error"]){
	throw new Exception("Error: " . $file['error']);

}

$name = $file["name"];
$ext = pathinfo($name,PATHINFO_EXTENSION);
$ext = strtolower($ext);

if(strstr('.jpg;.jpeg;.gif;.png',$ext)){

$dirUploads = ".." . DIRECTORY_SEPARATOR . "img";
$target_path = $dirUploads . DIRECTORY_SEPARATOR . $file["name"];
$target_path = str_replace(" ","_",$target_path);
if(!is_dir($dirUploads)){
	mkdir($dirUploads);
}	

if(move_uploaded_file($file["tmp_name"] , $target_path)){
	chmod($target_path, 0777);
	
	var_dump($file);
}else{
	throw new Exception("Não foi possível");
}
}else{
echo "formato não suportado";	
}
}

?>
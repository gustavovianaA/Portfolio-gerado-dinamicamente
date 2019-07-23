

<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
$file = $_FILES["file"];

if($file["error"]){
	throw new Exception("Error: " . $file['error']);

}

if($file["type"] === "image/png"){
$dirUploads = ".." . DIRECTORY_SEPARATOR . "img";
$target_path = $dirUploads . DIRECTORY_SEPARATOR . $file["name"];
$target_path = str_replace(" ","_",$target_path);
if(!is_dir($dirUploads)){
	mkdir($dirUploads);
}	

if(move_uploaded_file($file["tmp_name"] , $target_path)){
	chmod($target_path, 0777);
	//echo "Upload realizado com sucesso";
	var_dump($file);
}else{
	throw new Exception("Não foi possível");
}
}else{
echo "formato não suportado";	
}
}

?>
<?php
spl_autoload_register(function($class_name){

	$filename = "..".DIRECTORY_SEPARATOR."server".DIRECTORY_SEPARATOR."class".DIRECTORY_SEPARATOR.$class_name.".php";

	if (file_exists(($filename))) {
		require_once($filename);
	}

});
?>
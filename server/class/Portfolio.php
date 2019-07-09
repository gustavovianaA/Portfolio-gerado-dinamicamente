<?php

class Portfolio{

	private $id;
	private $titulo;
	private $descricao;
	private $tecnologias;
	private $imgCaminho;

	public function getId(){
		return $this->id;
	}

	public function setId($value){
		$this->id = $value;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($value){
		$this->titulo = $value;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($value){
		$this->descricao = $value;
	}

	public function getTecnologias(){
		return $this->tecnologias;
	}

	public function setTecnologias($value){
		$this->tecnologias = $value;
	}
	
	public function getImgCaminho(){
		return $this->imgCaminho;
	}

	public function setImgCaminho($value){
		$this->imgCaminho = $value;
	}	

	public static function listar(){
		$sql = new Database();
	    
	    return $sql->select("SELECT *FROM port_itens ORDER BY id;");
	}


	public static function exibirTudo(){
    	$lista = Portfolio::listar();

        $carousel_active = "<div class='itens row carousel-item active'>";
        $carousel = "<div class='itens row carousel-item'>";
        $k = 0; 

    	$output =  $carousel_active;

    	foreach($lista as $row){
    		$k++;

    		$output .= "<div class='col-3 d-inline-block mx-0 px-0'><img src='" . $row['imgCaminho'] ."' class='img-fluid d-iline'></div>";
    		

    		if(($k%3) == 0){
    		$output .= "</div>" . $carousel;	
    		}
	}

    	$output .= "</div>";

    	echo $output;
}


}

?>
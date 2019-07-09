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

    
    public function loadById($id){

		$sql = new Database();

		$results = $sql->select("SELECT * FROM port_itens WHERE id = :ID", array(
			":ID"=>$id
		));

		if (count($results) > 0) {
        
        $row = $results[0];
         

		$this->setId($row['id']);
		$this->setTitulo($row['titulo']);
		$this->setDescricao($row['descricao']);
		$this->setTecnologias($row['tecnologias']);
        $this->setImgCaminho($row['imgCaminho']);

		}

	}


	public function __toString(){

		return json_encode(array(
			"id"=>$this->getId(),
			"titulo"=>$this->getTitulo(),
			"descricao"=>$this->getDescricao(),
			"tecnologias"=>$this->getTecnologias(),
			"imgCaminho"=>$this->getImgCaminho()

		));

	}



}

?>
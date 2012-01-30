<?php
	
class Vendedor{
	private $id;
	private $nome;

	public function Vendedor(){

	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function toString(){
		return 'Id: '.$this->getId().' Nome: '.$this->getNome();
	}

}

?>
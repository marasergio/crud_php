<?php
include_once('../model/persistence/VendedorDao.php');
include_once('../model/persistence/Dao.php');
include_once('../model/entidades/Vendedor.php');

class VendedorController{
	private $vendedor;
	private $listVendedor;

	public function VendedorController(){
		$this->vendedor = new Vendedor();
	}

	public function getVendedor(){
		return $this->vendedor;
	}

	public function setVendedor(Vendedor $vendedor){
		$this->vendedor = $vendedor;
	}

	public function salvar(){
		$vDao = new VendedorDao();
		$vDao->salvar($this->vendedor);
	}

	public function delete(){
		$vDao = new VendedorDao();
		$vDao->delete($this->vendedor->getId());
	}
	public function update(){
		$vDao = new VendedorDao();
		$vDao->update($this->vendedor);
	}
	public function getListVendedor(){
		$vDao = new VendedorDao();
		$this->listVendedor = $vDao->getAll();
		return $this->listVendedor;
	}
	public function setListVendedor($vendedores){
		$this->listVendedor = $vendedores;
	}
	public function buscaPorId($id){
	//	$id = $this->vendedor->getId();
		$vDao = new VendedorDao();
		return $vDao->getVendedor($id);
	}
}

// =======================
// =  testando a classe  =
// =======================

	//$vendController = new VendedorController();
	//$v = new Vendedor();

	//$v->setId(2);
	//$vendController->getVendedor()->setId(3);

	//$v = $vendController->buscaPorId(4);

	//echo $v->toString();

	/*
	foreach ($vendController->getListVendedor() as $vendedor) {
       // $output = $vendedor->toString().'<br/>';

      	$output  = "ID -> ".$vendedor->getId().'<br/>Nome -> '.$vendedor->getNome(); 
        $output .= "<br/>----------------------------------<br>";

        echo $output;
    }
    */

?>
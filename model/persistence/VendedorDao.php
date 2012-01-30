<?php

class VendedorDao{

	public function VendedorDao(){

	}

	public function salvar($vendedor){
		try{
			$dao = new Dao();
		
			$sql  = " INSERT INTO tb_vendedor (vend_id, vend_nome) VALUES(null, :nome) ";
			
			$query = $dao->prepare($sql);
			$query->bindValue(':nome', $vendedor->getNome());
			$query->execute();
		
			$dao = null;
		}
		catch (PDOException $e) {
               echo $e->getMessage();
        }  
	}

	public function delete($id){
		try{
			$dao = new Dao();
			$sql = " DELETE FROM tb_vendedor WHERE vend_id = :id ";

			$query = $dao->prepare($sql);
			$query->bindValue(':id', $id);
			$query->execute();

			$dao = null;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function update($vendedor){
		try{
			$nome = $vendedor->getNome();
			$id = $vendedor->getId();

			$dao = new Dao();
			$sql = " UPDATE tb_vendedor SET vend_nome = ? WHERE vend_id = ? ";

			$query = $dao->prepare($sql);
			// 1 opção
			//$query->bindValue(1,$nome);
			//$query->bindValue(2,$id);
			//$query->execute();
			//2 opção
			$query->execute(Array($nome,$id));

			$dao = null;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function getAll(){
		$dao = new Dao();
		$result = $dao->query("SELECT * FROM tb_vendedor");
		
		$vendedores;
		$i = 0;

		foreach($result as $row){
			$vendedor = new Vendedor();
			$vendedor->setId($row['vend_id']);
			$vendedor->setNome($row['vend_nome']);

			$vendedores[$i] = $vendedor;

			$i++;					
		} 
		$dao = null;
		return $vendedores;
	}

	public function getVendedor($id){
		$dao = new Dao();
		$query = $dao->prepare(" SELECT * FROM tb_vendedor WHERE vend_id = :id "); 
		$query->bindValue(':id', $id);
		$query->execute();

		$result = $query->fetch(PDO::FETCH_ASSOC);

		$vendedor = new Vendedor();
		$vendedor->setId($result['vend_id']);
		$vendedor->setNome($result['vend_nome']);

		$dao = null;
		return $vendedor;
		
	}

}


// =======================
// =  testando a classe  =
// =======================

	//$vDao = new VendedorDao();
	//$v = new Vendedor();
	//$v->setNome("CRUD COMPLETO");
	//$v->setId(9);

	//$vDao->update($v);

	//exemplo listagem com array
	/*
	$vendedores = $vDao->getAll();


    foreach ($vendedores as $vendedor) {
       // $output = $vendedor->toString().'<br/>';

      	$output  = "ID -> ".$vendedor->getId().'<br/>Nome -> '.$vendedor->getNome(); 
        $output .= "<br/>----------------------------------<br>";

        echo $output;
    }
    */

    // teste listar somente 1 vendedor
   //$v = $vDao->getVendedor(1);
   //echo $v->toString();

?>
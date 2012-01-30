<?php
	include("../controller/VendedorController.php");

	$vControl = new VendedorController();	
/*
	if(isset($_POST['submit'])){
		$nome = $_POST['nome'];

		$v = new Vendedor();
		$v->setNome($nome);

		$vControl->setVendedor($v);
		$vControl->salvar();
	}
*/	
	$vendedores = $vControl->getListVendedor();
	
?>

 
<!DOCTYPE HTML>
<html lang="en-US">
<head>
        <title>Create</title>
        <meta charset="iso-8859-1">
</head>
<body>
        <h1>Vendedores</h1>
       
        <p>
        	<a href="./editVendedor.php">Novo Vendedor</a>
        </p>
        <table border="1">
        	<tr>
        		<th>ID</th>
        		<th>Nome</th>  
        	</tr>
        	<?php
        		foreach($vendedores as $vendedor){
        			$output  = '<tr>';
        			$output .= '<td>'.$vendedor->getId().'</td>';
        			$output .= '<td>'.$vendedor->getNome().'</td>';
        			$output .= '</tr>';

        			echo $output;
        		}
        	?>      	
        </table>
</body>
</html>
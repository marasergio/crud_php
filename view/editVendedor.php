<?php
	include("../controller/VendedorController.php");

	$vControl = new VendedorController();	
	$verifSalvar = false;

	if(isset($_POST['submit'])){
		$nome = $_POST['nome'];

		if($nome != ''){
			$v = new Vendedor();
			$v->setNome($nome);

			$vControl->setVendedor($v);
			$vControl->salvar();

			$verifSalvar = true;
		}
		else{
			echo "campo nome é requerido!";
		}
	}
	
?>

 
<!DOCTYPE HTML>
<html lang="en-US">
<head>
        <title>Create</title>
        <meta charset="iso-8859-1">
</head>
<body>
        <h1>Edit Vendedor</h1>
        <p>
        	<a href="./index.php">[Voltar]</a>
        </p>
        
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label for="nome">Nome</label><input type="text" name="nome" />
            <input type="submit" value="salvar" name="submit" />
        </form>

        <?php
        	if($verifSalvar){
        		echo "<p>Vendedor salvo com sucesso!</p>";
        	}
        ?>
</body>
</html>
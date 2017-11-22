<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Cadastro da empresa</title>
	<?php include '../Template/Header.php';?>
</head>
<body>
	<div class="container" style="width: 30%; margin-top: 10%">
    	<form method="post" action="#">
    		<label>Nome</label><br>
    		<input required placeholder="Digite o nome" name="nome" class="form-control"><br>
    		<label>CNPJ</label><br>
    		<input required placeholder="Digite o cnpj" name="cnpj" class="form-control"><br>
    		<label>Email</label><br>
    		<input required placeholder="Digite o e-mail" name="email" class="form-control"><br>
    		<label>Senha</label><br>
    		<input required placeholder="Crie uma senha" name="senha" class="form-control" type="password"></input><br><br>
    		<input class="btn btn-primary" type="reset" value="Cancelar">
    		<input class="btn btn-success" type="submit" value="Cadastrar" name="cadastrar">
    	</form>
    	<?php 
    		if(isset($_POST['cadastrar'])){
    			require_once '../Classes/Empresa.php';
    			$empresa = new Empresa();
    			$empresa->setNome($_POST['nome']);
    			$empresa->setCnpj($_POST['cnpj']);
    			$empresa->setSenha($_POST['senha']);
    			$empresa->setEmail($_POST['email']);
    			$row=$empresa->buscar($_POST['cnpj']);
    			if($row == null){
    				$empresa->incluir($empresa);
                    header("location: Login.php");
    			}else{
    				echo "<br><h5>CNPJ já existe no sistema!</h5><br><br><br><br><br>";
    			}
    		}
    	?>
	</div>
</body>
</html>
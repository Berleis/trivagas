<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Cadastro do usuário</title>
	<?php include '../Template/Header.php';?>
	<?php include '../Template/Footer.php';?>
</head>
<body>
	<div class="container" style="width: 30%; margin-top: 10%">
    	<form method="post" action="#">
    		<label>Nome completo</label><br>
    		<input required placeholder="Digite seu nome" name="nome" class="form-control"><br>
    		<label>CPF</label><br>
    		<input required placeholder="Digite seu cpf" name="cpf" class="form-control"><br>
    		<label>Senha</label><br>
    		<input required placeholder="Crie uma senha" name="senha" class="form-control" type="password"></input><br><br>
    		<input class="btn btn-primary" type="reset" value="Cancelar">
    		<input class="btn btn-success" type="submit" value="Cadastrar" name="cadastrar">
    	</form>
    	<?php 
    		if(isset($_POST['cadastrar'])){
    			require_once '../Classes/Usuario.php';
    			$usuario = new Usuario();
    			$usuario->setNome($_POST['nome']);
    			$usuario->setCpf($_POST['cpf']);
    			$usuario->setSenha($_POST['senha']);
    			$row=$usuario->buscar($_POST['cpf']);
    			if($row == null){
    				$usuario->incluir($usuario);
    				header("location: Listar.php");
    			}else{
    				echo "<br>CPF já existe no sistema!";
    			}
    		}
    	?>
	</div>
</body>
</html>
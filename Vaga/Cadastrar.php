<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Cadastro da vaga</title>
	<?php include '../Template/Header.php';?>
	<?php include '../Template/Footer.php';?>
	<?php
        session_start();
        if (!isset($_SESSION['empresa'])) {
            header('location: ../Index.php');
        }
    ?>
</head>
<body>
	<div class="container" style="width: 30%; margin-top: 25px">
    	<form method="post" action="#">
    		<label>Descrição da vaga</label><br>
    		<input required placeholder="Digite a descrição da vaga" name="descricao" class="form-control"><br>
    		<label>Horario</label><br>
    		<input required placeholder="Digite o horário" name="horario" class="form-control"><br>
    		<label>Salario</label><br>
    		<input required placeholder="Digite o salário" name="salario" class="form-control"></input><br>
			<label>Beneficios</label><br>
    		<input required placeholder="Digite os beneficios desta vaga" name="beneficios" class="form-control"></input><br>
			<label>Categoria</label><br>
    		<input required placeholder="Digite a categoria" name="categoria" class="form-control"></input><br><br>			
    		<input class="btn btn-primary" type="reset" value="Cancelar">
    		<input class="btn btn-success" type="submit" value="Cadastrar" name="cadastrar">
    	</form>
    	<?php 
    		if(isset($_POST['cadastrar'])){
    			require_once '../Classes/Vaga.php';
    			$vaga = new Vaga();
    			$vaga->setId_empresa($_SESSION['empresa']);
    			$vaga->setDescricao($_POST['descricao']);
    			$vaga->setHorario($_POST['horario']);
    			$vaga->setSalario($_POST['salario']);
    			$vaga->setBeneficios($_POST['beneficios']);
    			$vaga->setCategoria($_POST['categoria']);	
    			$vaga->incluir($vaga);
				header("location: ListarPorEmpresa.php");
    		}
    	?>
	</div>
</body>
</html>
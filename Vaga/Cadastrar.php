<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Cadastro da vaga</title>
	<?php include '../Template/Header.php';?>
	<?php
        session_start();
        if (!isset($_SESSION['empresa'])) {
            header('location: ../Index.php');
        }
    ?>
</head>
<body>
	<div class="container" style="width: 100%; margin-top: 10%">
    	<form method="post" action="#">
    		<div style="width: 35%; float: left; margin-left: 10%">
    			<label>Descrição da vaga</label><br>
	    		<input required placeholder="Digite a descrição da vaga" name="descricao" class="form-control"><br>
	    		<label>Horario</label><br>
	    		<input required placeholder="Digite o horário" name="horario" class="form-control"><br>
	    		<label>Salario</label><br>
	    		<input required placeholder="Digite o salário" name="salario" class="form-control"></input><br>
    		</div>
    		<div style="width: 35%; float: right; margin-right: 10%">
    			<label>Beneficios</label><br>
	    		<textarea required placeholder="Digite os beneficios desta vaga" name="beneficios" class="form-control"></textarea><br>
				<label>Categoria</label><br>
	    		<input required placeholder="Digite a categoria" name="categoria" class="form-control"></input><br><br>			
	    		<input class="btn btn-success" type="submit" value="Cadastrar" name="cadastrar" style="float: right">
	    		<input class="btn btn-primary" type="reset" value="Cancelar" style="float: right">
    		</div>			
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
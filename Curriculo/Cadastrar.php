<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Cadastro de curriculo</title>
	<?php include '../Template/Header.php';?>
	<?php include '../Template/Footer.php';?>
</head>
<body>
	<div class="container" style="width: 30%; margin-top: 10%">
    	<form method="post" action="#">
    		<label>Endereço</label><br>
    		<input required placeholder="Digite seu endereço" name="endereco" class="form-control"><br>
    		<label>Objetivo</label><br>
    		<input required placeholder="Digite seu objetivo" name="objetivo" class="form-control"><br>
    		<label>Formação</label><br>
    		<input required placeholder="Digite o nome da instituição bem como o nível do curso" 
			name="formacao" class="form-control"></input><br><br>
			<label>Habilidades</label><br/>
			<input required placeholder="Digite suas habilidades" name="habilidades" class="form-control"></input><br><br>
    		<input class="btn btn-primary" type="reset" value="Cancelar">
    		<input class="btn btn-success" type="submit" value="Cadastrar" name="cadastrar">
    	</form>
    	<?php 
    		if(isset($_POST['cadastrar'])){
    			require_once '../Classes/Curriculo.php';
    			$curriculo = new Curriculo();
    			$curriculo->setId_candidato(3);
    			$curriculo->setEndereco($_POST['endereco']);
    			$curriculo->setObjetivo($_POST['objetivo']);
    			$curriculo->setFormacao($_POST['formacao']);
				$curriculo->setHabilidades($_POST['habilidades']);
				$curriculo->incluir($curriculo);
				header("location: Listar.php");
    		}
    	?>
	</div>
</body>
</html>